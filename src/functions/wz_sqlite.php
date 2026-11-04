<?php
// Wizardawn static build: a small stand-in for the mysqli calls the original
// code made. The lookup tables live in a read-only SQLite file that the
// in-browser PHP (WebAssembly) opens; queries are translated from MySQL syntax.

class WzResult {
    public $rows; public $pos = 0; public $num_rows;
    function __construct($rows) { $this->rows = $rows; $this->num_rows = count($rows); }
}

function wz_connect($file) {
    $db = new SQLite3($file, SQLITE3_OPEN_READWRITE);
    $db->enableExceptions(false);
    $db->busyTimeout(1000);
    $db->createFunction('RAND', function () { return mt_rand() / mt_getrandmax(); }, 0, 0);
    $db->createFunction('TO_DAYS', function ($d) { return $d === null ? null : intdiv(strtotime(substr($d, 0, 10) . ' UTC'), 86400) + 719528; }, 1);
    $db->createFunction('DATE_FORMAT', function ($d, $f) {
        $t = strtotime($d);
        return strtr($f, array('%Y' => date('Y', $t), '%y' => date('y', $t), '%m' => date('m', $t), '%c' => date('n', $t), '%d' => date('d', $t), '%e' => date('j', $t), '%M' => date('F', $t), '%b' => date('M', $t), '%W' => date('l', $t), '%a' => date('D', $t), '%D' => date('jS', $t), '%H' => date('H', $t), '%i' => date('i', $t), '%s' => date('s', $t)));
    }, 2);
    $db->createFunction('CONCAT', function () { return implode('', func_get_args()); }, -1);
    return $db;
}

function wz_translate($sql) {
    $s = trim($sql);
    $s = preg_replace('/\bwizardawn\./i', '', $s);
    $s = preg_replace('/\bCURRENT_DATE\b(?!\s*\()/i', "date('now')", $s);
    $s = preg_replace('/^CREATE\s+TEMPORARY\s+TABLE\s+(IF\s+NOT\s+EXISTS\s+)?(`?\w+`?)\s+(\(\s*)?SELECT\b/i', 'CREATE TEMP TABLE $1$2 AS SELECT', $s);
    if (preg_match('/^CREATE\s+TEMP(ORARY)?\s+TABLE\s+(IF\s+NOT\s+EXISTS\s+)?`?\w+`?\s+AS\s+SELECT/i', $s)) {
        // MySQL allows "CREATE ... (SELECT ...)" with a closing paren.
        if (preg_match('/AS SELECT/', $s) && substr_count($s, '(') < substr_count($s, ')')) { $s = preg_replace('/\)\s*$/', '', $s); }
    } elseif (preg_match('/^CREATE\s+(TEMPORARY\s+)?TABLE/i', $s)) {
        $s = preg_replace('/^CREATE\s+TEMPORARY\s+TABLE/i', 'CREATE TEMP TABLE', $s);
        $s = preg_replace('/\b(INT|INTEGER|TINYINT|SMALLINT|BIGINT)\s*\(\d+\)\s*(UNSIGNED\s*)?/i', 'INTEGER ', $s);
        $s = preg_replace('/INTEGER\s+NOT\s+NULL\s+AUTO_INCREMENT/i', 'INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL', $s);
        $s = preg_replace('/\bAUTO_INCREMENT\b(\s*=\s*\d+)?/i', '', $s);
        $s = preg_replace('/,\s*PRIMARY\s+KEY\s*\(\s*`?\w+`?\s*\)/i', '', $s);
        $s = preg_replace('/\)\s*(ENGINE|TYPE|DEFAULT|CHARSET|COLLATE)[^)]*$/i', ')', $s);
        $s = preg_replace('/\b(CHARACTER SET|CHARSET)\s+\w+/i', '', $s);
    }
    $s = preg_replace('/^DROP\s+TEMPORARY\s+TABLE/i', 'DROP TABLE', $s);
    $s = preg_replace('/^DROP\s+TABLE\s+(?!IF\s)/i', 'DROP TABLE IF EXISTS ', $s);
    $s = preg_replace('/^TRUNCATE\s+(TABLE\s+)?/i', 'DELETE FROM ', $s);
    // MySQL allows unquoted names that start with a digit (e.g. temp table 1creatures0rifs2); SQLite needs quotes.
    $s = preg_replace_callback('/(\'(?:[^\'\\\\]|\\\\.)*\'|"(?:[^"\\\\]|\\\\.)*")|(?<![\w.`"])(\d+[A-Za-z_]\w*)/', function ($m) {
        return (isset($m[2]) && $m[2] !== '') ? '"' . $m[2] . '"' : $m[0];
    }, $s);
    // MySQL "LIMIT offset, count" is accepted by SQLite unchanged.
    return $s;
}

define('WZ_QUERY_LIMIT', 250000);
$GLOBALS['wz_last_error'] = '';
function wz_query($db, $sql) {
    // Like mysqli_query() under PHP 7.4: no valid link means a warning and NULL.
    if (!($db instanceof SQLite3)) { return null; }
    $q = wz_translate($sql);
    // Some generators loop forever on the original server too (an empty result
    // that a while() never leaves). Apache's time limit ended those; here a page
    // is stopped after WZ_QUERY_LIMIT queries instead.
    $GLOBALS['wz_n'] = (isset($GLOBALS['wz_n']) ? $GLOBALS['wz_n'] : 0) + 1;
    if ($GLOBALS['wz_n'] > WZ_QUERY_LIMIT) {
        echo "<p><b>Wizardawn stopped this page: the generator got stuck in a loop (it would loop forever on the original server too). Try different options.</b></p>";
        if (getenv('WZ_DEBUG')) { @file_put_contents('/tmp/wz_fatal.log', "query limit: " . $q . "\n", FILE_APPEND); }
        exit;
    }
    // MySQL cannot use a TEMPORARY table twice in one statement ("Can't reopen
    // table", error 1137), so on the original site statements like
    // "INSERT INTO t SELECT * FROM t" failed and did nothing. SQLite would run
    // them, which changes the results (and can make loops run much longer).
    if (preg_match('/^\s*INSERT\s+INTO\s+(\w+)\b.*\bFROM\s+\1\b/is', $q, $m)
        && $db->querySingle("SELECT 1 FROM sqlite_temp_master WHERE type='table' AND name='" . SQLite3::escapeString($m[1]) . "'")) {
        $GLOBALS['wz_last_error'] = "Can't reopen table: '" . $m[1] . "'";
        return false;
    }
    $res = @$db->query($q);
    if ($res === false) {
        $GLOBALS['wz_last_error'] = $db->lastErrorMsg();
        if (getenv('WZ_DEBUG') || isset($GLOBALS['WZ_DEBUG'])) { @file_put_contents('/tmp/wz_sql_errors.log', $db->lastErrorMsg() . "\n  " . $q . "\n", FILE_APPEND); }
        return false;
    }
    if ($res->numColumns() === 0) { $res->finalize(); return true; }
    $rows = array();
    while ($r = $res->fetchArray(SQLITE3_ASSOC)) {
        foreach ($r as $k => $v) { if ($v !== null && !is_string($v)) { $r[$k] = (string)$v; } }
        $rows[] = $r;
    }
    $res->finalize();
    return new WzResult($rows);
}
function wz_fetch_assoc($res) {
    if (!($res instanceof WzResult) || $res->pos >= $res->num_rows) { return null; }
    return $res->rows[$res->pos++];
}
function wz_fetch_array($res) {
    $r = wz_fetch_assoc($res);
    if ($r === null) { return null; }
    $out = array(); $i = 0;
    foreach ($r as $k => $v) { $out[$i++] = $v; $out[$k] = $v; }
    return $out;
}
function wz_num_rows($res) { return ($res instanceof WzResult) ? $res->num_rows : 0; }
function wz_error($db = null) { return $GLOBALS['wz_last_error']; }

if (getenv('WZ_DEBUG') || !empty($_SERVER['WZ_DEBUG'])) {
    $GLOBALS['WZ_DEBUG'] = 1;
    register_shutdown_function(function () {
        @file_put_contents('/tmp/wz_qcount.log', (isset($GLOBALS['wz_n']) ? $GLOBALS['wz_n'] : 0) . "\n", FILE_APPEND);
        $e = error_get_last();
        if ($e && in_array($e['type'], array(E_ERROR, E_PARSE, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR, E_RECOVERABLE_ERROR))) {
            @file_put_contents('/tmp/wz_fatal.log', $e['message'] . ' @ ' . $e['file'] . ':' . $e['line'] . "\n", FILE_APPEND);
        }
    });
}
