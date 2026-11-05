# Wizardawn (static)

The Wizardawn random generators for old-school RPGs, as a static site that runs
entirely in the browser.

## How it works

Wizardawn is about 170 PHP pages and a MySQL database. Rather than rewrite every
generator by hand (and risk changing their output), this build runs the original
PHP code unchanged in the browser:

- PHP 7.4 (the version the original Apache server used) compiled to WebAssembly,
  from WordPress Playground's `@php-wasm` packages.
- A service worker (`web/sw.mjs`) answers every request for a `.php` page by
  running it with that PHP. Images, CSS, scripts and PDFs are plain static files.
- The MySQL tables were exported to `data/json/*.json` and are turned into a
  SQLite file at build time. `src/functions/wz_sqlite.php` provides `wz_*`
  replacements for the `mysqli_*` calls and translates the few MySQL-only bits
  of SQL (RAND(), TO_DAYS, DATE_FORMAT, CREATE TEMPORARY TABLE ... SELECT, ...).
- Sessions (the chosen game system) work as before; they live in the service
  worker's memory for as long as the browser keeps it running.

Changes to the original source (`src/`):

- `db.php`: connects to SQLite instead of MySQL (the old connection line, which
  held the database password, is gone). `$webadd` points "Home" at `index.php`.
- every `mysqli_*` call renamed to the matching `wz_*` function.
- removed junk: `Thumbs.db`, `error_log`, `test.php`, a stray `html2canvas.js---`
  and stray PNGs in `functions/`.

Known limits:

- Bugs of the original are kept as they were on its PHP 7.4 server, for example:
  Hex Crawl loops forever when no game system is posted (the original was cut
  off by the server time limit; here the page is stopped after 40 MB of output
  or 250,000 database queries, with a note), the Apocalypse "Mundane Items" tool
  fails with Mutant Future (makePAItem() is called with too few arguments), and
  Wandering Monsters runs one INSERT that MySQL rejected too.
- First visit downloads about 17 MB (PHP runtime, sources, database). After that
  the browser cache is used.
- Needs a browser with service workers (any current browser, not private mode
  in some of them).
- "Download map as image" (`save_image.php`) runs in the browser's PHP too.

## Layout

    src/            original Wizardawn site (PHP + assets), lightly patched
    data/json/      the database, one JSON file per table
    build/          tsv2json.py (export), json2sqlite.py, build.mjs, fetch-docs.sh
    web/            service worker, PHP runner, index.html loader (opens the original index.php)
    tests/          node tests (PHP pages) and a headless-browser smoke test
    ops/deploy.sh   copy dist/ to a web directory

PDF and ZIP documents (rulebooks, modules, character sheets) are not kept in
git. `build/fetch-docs.sh` copies them read-only from the original server into
`src/`; the build includes whatever is present.

## Build, test, deploy

    npm install
    build/fetch-docs.sh          # optional: the PDF/ZIP documents
    npm run build                # -> dist/
    npm test                     # PHP pages under node
    npm run test:browser         # headless Chromium against a temporary local server
    ops/deploy.sh -n             # dry run
    ops/deploy.sh                # -> /Volumes/web/truculent.org/wizardawn
    ops/deploy.sh /some/dir/wizardawn

To try it locally, serve `dist/` with any static web server (service workers
need http://localhost or https, not file://), e.g.
`cd dist && python3 -m http.server 8000` and open http://localhost:8000/.

The deploy never copies `.php` files: a PHP-enabled host would run them on the
server, which this build does not want.

## Credits and licences

Wizardawn generators, text and art are by Wizardawn (wizardawn.com) and are
published under the licences and notices kept in `src/lic/` and
`src/notices.php` (Open Game License v1.0a, the Labyrinth Lord, Mutant Future,
OSRIC and Swords & Wizardry trademark licences). Product names are trademarks of
their owners.

PHP WebAssembly runtime: WordPress Playground `@php-wasm` (GPL-2.0-or-later);
PHP is under the PHP License.

The build scripts, service worker and loader page in this repo are new work for
this conversion.
