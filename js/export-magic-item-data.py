"""Export makeMagicItem's literal case text (magic_item_fantasy.php, magic_item_properties.php).

Only the strings assigned inside each `switch` case are exported, in source order,
as template parts. Control flow (which switch runs, flags, overrides) is written by
hand in js/generators/magic-items.js.
"""
from pathlib import Path
import json
import re

ROOT = Path(__file__).resolve().parent.parent


def read(name):
    return (ROOT / 'src/functions' / (name + '.php')).read_text(encoding='cp1252')


def functions(text):
    return {m[1]: m[2] for m in re.finditer(r'(?m)^function\s+(\w+)([\s\S]*?)(?=^function\s+|\Z)', text)}


def scan(text, start, opening, closing):
    """Index of the bracket closing text[start], skipping PHP string literals."""
    depth, i = 0, start
    while i < len(text):
        c = text[i]
        if c in '"\'':
            i += 1
            while text[i] != c: i += 2 if text[i] == '\\' else 1
        elif c == opening: depth += 1
        elif c == closing:
            depth -= 1
            if depth == 0: return i
        i += 1


def close(text, start): return scan(text, start, '{', '}')


def balanced(expr, i): return scan(expr, i, '(', ')')


def template(expr):
    try: return concat(expr)
    except (ValueError, IndexError, TypeError): return [{'raw': re.sub(r'\s+', ' ', expr.strip())}]


def concat(expr):
    """PHP string concatenation -> list of text / {call,args} / {roll} / {var} / {expr}."""
    out = []
    expr = expr.strip()
    while expr:
        expr = expr.lstrip(' .\t\r\n')
        if not expr: break
        if expr[0] in '"\'':
            q = expr[0]; i = 1
            while expr[i] != q: i += 2 if expr[i] == '\\' else 1
            out.append(expr[1:i].replace('\\' + q, q)); expr = expr[i + 1:]; continue
        m = re.match(r'mt_rand\s*\((\d+),\s*(\d+)\)', expr)
        if m: out.append({'roll': [int(m[1]), int(m[2])]}); expr = expr[m.end():]; continue
        m = re.match(r'(\w+)\(', expr)
        if m:
            end = balanced(expr, m.end() - 1)
            out.append({'call': m[1], 'args': expr[m.end():end]}); expr = expr[end + 1:]; continue
        if expr[0] == '(':
            end = balanced(expr, 0)
            out.append({'expr': re.sub(r'\s+', '', expr[:end + 1])}); expr = expr[end + 1:]; continue
        m = re.match(r'\$(\w+)(\[\d+\])?', expr)
        if m: out.append({'var': m[1] + (m[2] or '')}); expr = expr[m.end():]; continue
        m = re.match(r'-?\d+', expr)
        if m: out.append(m[0]); expr = expr[m.end():]; continue
        raise ValueError('cannot read ' + expr[:80])
    # merge adjacent strings
    merged = []
    for part in out:
        if isinstance(part, str) and merged and isinstance(merged[-1], str): merged[-1] += part
        else: merged.append(part)
    return merged


def condition(text):
    text = text.strip()
    games = re.findall(r'\$game\s*(==|!=)\s*"([^"]+)"', text)
    if games and not re.search(r'mt_rand|\$(?!game)\w+', text):
        return {'games': [g for _, g in games], 'not': all(op == '!=' for op, _ in games)}
    m = re.fullmatch(r'\(?\s*mt_rand\((\d+),\s*(\d+)\)\s*(>=|>|<=|<|==)\s*(\d+)\s*\)?', text)
    if m: return {'rand': [int(m[1]), int(m[2])], 'op': m[3], 'n': int(m[4])}
    m = re.fullmatch(r'\(?\s*\$(\w+)\s*(>=|>|<=|<|==|!=)\s*"?([\w ]*)"?\s*\)?', text)
    if m: return {'v': m[1], 'op': m[2], 'n': int(m[3]) if m[3].isdigit() else m[3]}
    return {'raw': text}


def statements(body):
    """Assignments and if/else chains of one case, in source order."""
    out, i = [], 0
    while i < len(body):
        m = re.compile(r'\s*(else\s+if|if)\s*\(').match(body, i)
        if m and m[1] == 'if':
            chain = []
            while True:
                m = re.compile(r'\s*(else\s+if|if|else)\s*(\()?').match(body, i)
                if not m or (chain and m[1] == 'if') or (not chain and m[1] != 'if'): break
                if m[2]:
                    end = balanced(body, m.end() - 1)
                    cond, i = condition(body[m.end():end]), end + 1
                else:
                    cond, i = None, m.end()
                n = re.compile(r'\s*\{').match(body, i)
                if n:
                    end = close(body, n.end() - 1)
                    inner, i = body[n.end():end], end + 1
                else:
                    end = body.index(';', i)
                    inner, i = body[i:end + 1], end + 1
                chain.append({'cond': cond, 'body': statements(inner)})
            out.append({'chain': chain})
            continue
        m = re.compile(r'\s*\$(\w+)\s*=(?!=)\s*').match(body, i)
        if m:
            j = m.end()
            while body[j] != ';':
                if body[j] in '"\'':
                    q = body[j]; j += 1
                    while body[j] != q: j += 2 if body[j] == '\\' else 1
                elif body[j] == '(':
                    j = balanced(body, j)
                j += 1
            out.append({'set': m[1], 't': template(body[m.end():j])})
            i = j + 1
            continue
        i += 1
    return out


def mask(block):
    """Blank out nested switch blocks so only this switch's own cases are read."""
    for m in re.finditer(r'switch\s*\(', block):
        brace = block.index('{', m.end())
        end = close(block, brace)
        block = block[:m.start()] + ' ' * (end + 1 - m.start()) + block[end + 1:]
    return block


def cases(block):
    block = mask(block)
    rows = list(re.finditer(r'case\s+(\d+)\s*:', block))
    out, pending = {}, []
    for i, row in enumerate(rows):
        body = block[row.end():rows[i + 1].start() if i + 1 < len(rows) else len(block)]
        body = re.sub(r'\bbreak\s*;', '', body)
        if not body.strip():
            pending.append(int(row[1])); continue
        cell = statements(body)
        for label in pending + [int(row[1])]: out[label] = cell
        pending = []
    return out


def switches(body):
    found = []
    for m in re.finditer(r'switch\s*\(\s*(?:mt_rand\(([^,]+),\s*([^)]+)\)|\$(\w+))\s*\)\s*\{', body):
        end = close(body, m.end() - 1)
        found.append({'from': (m[1] or m[3]).strip(), 'to': (m[2] or '').strip(), 'cases': cases(body[m.end():end])})
    return found


main = read('magic_item_fantasy')
fantasy = main.split('else /// THIS STUFF BELOW IS SPECIFICALLY FOR THE TUNNELS')[0]
data = {'makeMagicItem': switches(fantasy)}
props = functions(read('magic_item_properties'))
for name, body in props.items():
    data[name] = switches(body)
HELPERS = {
    'descriptions': 'bardType woodenType tomeType abilityType rareCoins materialType designType animalType birdType dragonType giantType humanType undeadType elementalType'.split(),
    'rooms_fantasy': ['timesMaker', 'headMount'], 'containers': ['bagCreator'], 'names': ['castingName'],
    'item_fantasy': ['coinMaker', 'bottlePicker'],
}
for source, names in HELPERS.items():
    found = functions(read(source))
    for name in names: data[name] = switches(found[name])
data['headMountList'] = re.search(r"\$mount = array\(([^)]*)\)", functions(read('rooms_fantasy'))['headMount'])[1].replace("'", '').split(', ')
(ROOT / 'js/data/magicItemText.js').write_text('// Original Wizardawn literal tables; see export-magic-item-data.py.\nwindow.WZ_DATA = window.WZ_DATA || {};\nwindow.WZ_DATA.magicItemText = ' + json.dumps(data, ensure_ascii=False) + ';\n')
for name, rows in data.items():
    if name.endswith('List'): continue
    print(name, [(s['from'], s['to'], len(s['cases'])) for s in rows])
