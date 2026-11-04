import test from 'node:test';
import assert from 'node:assert/strict';
import vm from 'node:vm';
import { readFileSync, existsSync, readdirSync } from 'node:fs';
import { resolve } from 'node:path';
const root = resolve(import.meta.dirname, '..');
const index = readFileSync(`${root}/js/index.html`, 'utf8');
const scripts = [...index.matchAll(/<script src="([^"]+)"/g)].map(m => m[1]);
const context = vm.createContext({ URLSearchParams, console });
context.window = context;
for (const script of scripts) vm.runInContext(readFileSync(`${root}/js/${script}`, 'utf8'), context, { filename: script });
const W = context.WZ;
export { W, root };

test('classic scripts load without a server, modules, fetch, PHP or WASM', () => {
  assert.ok(scripts.length >= 6);
  for (const script of scripts) {
    assert.ok(existsSync(`${root}/js/${script}`));
    const code = readFileSync(`${root}/js/${script}`, 'utf8');
    assert.doesNotMatch(code, /\b(?:fetch\s*\(|XMLHttpRequest|import\s*\(|serviceWorker|WebAssembly)\b/);
  }
  assert.doesNotMatch(index, /type="module"/);
});
test('dice are reproducible and validate expressions', () => {
  const a = W.random('test'), b = W.random('test');
  for (let i = 0; i < 100; i++) assert.equal(a.roll('3d6+2'), b.roll('3d6+2'));
  for (let i = 0; i < 100; i++) assert.ok(W.d(6) >= 1 && W.d(6) <= 6);
  assert.throws(() => a.roll('nonsense'));
  assert.throws(() => a.d(0));
});
test('portal and help retain original content; unknown routes show the portal', () => {
  const home = W.renderRoute('#/').html;
  assert.match(home, /pics\/main.jpg/);
  assert.match(home, /wizardawn_banner.gif/);
  assert.match(home, /Choose A Game/);
  assert.equal(W.renderRoute('#/missing-route').html, home);
  for (const route of ['help/about', 'help/navigate', 'help/print', 'licence/ogl', 'licence/osric', 'licence/sw', 'game/lablord']) {
    const html = W.renderRoute('#/' + route).html;
    assert.ok(html.length > 1000, route);
    assert.doesNotMatch(html, /\{\{.*?\}\}/);
  }
});
test('portal local images, fonts and stylesheet references exist', () => {
  const html = W.renderRoute('#/').html + readFileSync(`${root}/js/portal.css`, 'utf8');
  for (const m of html.matchAll(/src=["']([^"']+)["']|url\(["']?([^)'"\s]+)/g)) {
    const file = m[1] || m[2];
    if (!/^(https?:|data:)/.test(file)) assert.ok(existsSync(`${root}/js/${file.split(/[?#]/)[0]}`), file);
  }
});
test('hash options round trip and user text is escaped', () => {
  assert.equal(W.parseHash('#/coins?game=lablord&n=3').params.n, '3');
  assert.equal(W.escape('<script>"'), '&lt;script&gt;&quot;');
});

// Run the original PHP as a development oracle, never as part of the client.
const { boot } = await import('./php-node.mjs');
const oracle = await boot();
async function phpResult(page, options, gamePage = 'rpg_lablord.php') {
  await oracle.server.handle({ path: gamePage });
  const result = await oracle.server.handle({ path: page, search: '?run=1', method: 'POST', headers: { 'content-type': 'application/x-www-form-urlencoded' }, body: new TextEncoder().encode(new URLSearchParams({ program_user: 1, ...options }).toString()) });
  assert.equal(oracle.logs().fatal, '', page);
  assert.equal(result.status, 200, page);
  return new TextDecoder().decode(result.bytes);
}
const occurrences = (html, pattern) => [...html.matchAll(pattern)].length;
for (const [route, tool] of Object.entries(W.routes).filter(([, tool]) => tool.generate)) {
  test(`${route} renders a form and seeded output for multiple option sets`, () => {
    assert.match(W.renderRoute('#/' + route).html, /id="generator-form"/);
    for (const options of ['run=1&n=3&seed=one&n_demon=1&n_holm_f=1&n_hb_stm=1', 'run=1&n=1&seed=two&game=osric&n_dwarf=1&n_tavern=1', 'run=1&n=4&seed=three&game=bfrpg&n_elf_f=1&n_spell=1']) {
      const hash = `#/${route}?${options}`;
      const output = W.renderRoute(hash).html;
      assert.equal(output, W.renderRoute(hash).html, hash);
      assert.match(output, /id="results"/);
      assert.doesNotMatch(output, /\b(?:undefined|NaN)\b/);
    }
  });
}
test('all 34 name categories retain section names and requested counts', async () => {
  const original = readFileSync(`${root}/src/tool_names.php`, 'utf8');
  const keys = [...original.matchAll(/name="(n_\w+)"/g)].map(m => m[1]);
  assert.equal(keys.length, 34);
  for (const count of [1, 3]) {
    const options = Object.fromEntries(keys.map(k => [k, '1']));
    const php = await phpResult('tool_names.php', { ...options, amount: count });
    const js = W.routes.names.generate({ ...options, n: count });
    assert.equal(occurrences(php, /&nbsp;-&nbsp;/g), keys.length * count);
    assert.equal(occurrences(js, /<li>/g), keys.length * count);
    assert.equal(occurrences(js, /class="name-category"/g), keys.length);
    assert.match(php, /Demon Names/); assert.match(js, /Demon Names/);
  }
});
test('coins and books retain requested number of results', async () => {
  for (const count of [1, 4]) {
    const coins = await phpResult('tool_coins.php', { x_game: 'Labyrinth Lord', x_pile: count, x_value1: 10, x_value2: 10 });
    const jsCoins = W.routes.coins.generate({ game: 'lablord', n: count, min: 10, max: 10 });
    assert.equal(occurrences(coins, /10gp/g), count);
    assert.equal(occurrences(jsCoins, /10gp/g), count);
    assert.equal(occurrences(jsCoins, /<tbody><tr>|<\/tr><tr>/g), count);
    const books = await phpResult('tool_books.php', { x_game: 'Labyrinth Lord', amount: count, unusual: 0 });
    const jsBooks = W.routes.books.generate({ n: count });
    assert.equal(occurrences(books, /\d+\.&nbsp;/g), count);
    assert.equal(occurrences(jsBooks, /<li>/g), count);
  }
});
test('potion appearance counts and full game lists match PHP', async () => {
  for (const [game, phpGame, amount, aec, ua] of [['lablord', 'Labyrinth Lord', 3, 0, 0], ['lablord', 'Labyrinth Lord', 0, 1, 0], ['osric', 'OSRIC', 0, 0, 0], ['add', 'AD&D', 0, 0, 1]]) {
    const php = await phpResult('tool_potions.php', { x_game: phpGame, amount, aec, ua });
    const js = W.routes.potions.generate({ game, n: amount, aec: String(aec), ua: String(ua) });
    assert.equal(occurrences(js, /taste and smell/g), occurrences(php, /taste and smell/g));
  }
});
test('alchemy shelf bottle counts and recipe/reagent sections match PHP', async () => {
  for (const n of [1, 4]) {
    const php = await phpResult('tool_alchemist.php', { x_game: 'Labyrinth Lord', x_amount: n, x_value1: 1, x_value2: 10, x_potion: 0 });
    const js = W.routes.alchemist.generate({ game: 'lablord', n, min: 1, max: 10 });
    assert.equal(occurrences(php, /<td NOWRAP width='40'/g), n);
    assert.equal(occurrences(js, /<tbody><tr>|<\/tr><tr>/g), n);
  }
  for (const [game, phpGame] of [['lablord', 'Labyrinth Lord'], ['osric', 'OSRIC'], ['bfrpg', 'BFRPG']]) {
    const php = await phpResult('tool_brew.php', { x_game: phpGame, x_value1: 1, x_value2: 10 });
    const js = W.routes.brews.generate({ game, min: 1, max: 10 });
    assert.equal(occurrences(js, /taste and smell/g), occurrences(php, /taste and smell/g));
    assert.match(js, /Alchemists sell the below items/); assert.match(php, /Alchemists sell the below items/);
  }
});
test('spell books retain selected names, levels, class filtering and descriptions', async () => {
  for (const [route, page, listing] of [['basic-spells', 'tool_llb_spells.php', 'Cleric'], ['spells', 'tool_osric_spells.php', 'Cleric']]) {
    for (const level of [1, 3]) {
      const p = { listing, level, mins: 0, sort: 1, extra: 1 };
      const php = await phpResult(page, p);
      const js = W.routes[route].generate({ ...p, extra: '1' });
      const names = [...js.matchAll(/<h3>(.*?)<\/h3>/g)].map(m => m[1].replace(/ <i>.*$/, ''));
      assert.ok(names.length > 2);
      for (const name of names) assert.ok(php.includes(name), `${page}: ${name}`);
      assert.equal(occurrences(php, route === 'basic-spells' ? /<b>Class:<\/b>/g : /Area of Effect:/g), names.length);
      assert.equal(occurrences(js, /class="spell"/g), names.length);
    }
  }
});
test('encounters retain creature counts and game source; wandering tables stay local', async () => {
  const target = W.monsters({ game: 'lablord' })[0];
  for (const n of [1, 3]) {
    const php = await phpResult('tool_encounter.php', { x_package: 'Labyrinth Lord', x_enemy: target.id, x_amount: n, x_level: 1, x_characters: 1 });
    const js = W.routes.encounters.generate({ game: 'lablord', enemy: target.id, n });
    assert.match(php, new RegExp(W.monsterName(target), 'i'));
    assert.ok(js.includes(W.monsterName(target)));
    assert.equal(occurrences(js, /<tbody><tr>|<\/tr><tr>/g), n);
  }
  const saved = new Map();
  context.localStorage = { setItem: (k, v) => saved.set(k, v), getItem: k => saved.get(k) };
  const js = W.routes.wander.generate({ game: 'lablord', terrain: 'DG', n: 5, level: 3 });
  assert.equal(occurrences(js, /<tbody><tr>|<\/tr><tr>/g), 5);
  assert.equal(W.storage.get('wandering-enemies').rows.length, 5);
  assert.match(W.routes.wander.generate({ game: 'lablord', terrain: 'impossible' }), /No Enemies Found/);
  delete context.localStorage;
});
test('Apocalypse mundane items terminate for Mutant Future and no selected game', () => {
  for (const game of ['', 'mutfut', 'gamma', 'meta']) {
    const html = W.routes.items.generate({ game, n: 100 });
    assert.match(html, /Mundane Items/);
    assert.equal(occurrences(html, /<tbody><tr>|<\/tr><tr>/g), 100);
    assert.doesNotMatch(html, /undefined|NaN/);
  }
});
test('geomorph maps retain PHP tile counts, borders and dimensions', async () => {
  const authors = Object.fromEntries(['dyson', 'risus', 'rorsch', 'stone', 'glenn', 'stuart', 'zero'].map(a => ['cave_' + a, 1]));
  for (const [route, page, type, kind] of [['dungeon-map', 'tool_dmap.php', 'dungeon', 'dungeon'], ['settlement-map', 'tool_villg.php', 'Village', 'settlement'], ['sci-fi-map', 'tool_smap.php', 'Building', 'scifi'], ['sewer-map', 'tool_swmp.php', 'sewer map', 'sewer'], ['suburb-map', 'tool_suburb.php', 'suburb map', 'suburb'], ['ruined-city-map', 'tool_acity.php', 'ruined city map', 'ruins']]) {
    for (const [width, height] of [[1, 1], [2, 3]]) {
      const p = { type, width, height, keyed: '1', start: 11, halls: 100, ...authors };
      const php = await phpResult(page, { type, map_wide: width, map_high: height, keyed: 1, map_numbers: 11, halls: 100, ...authors });
      const map = W.geomorphMap(p, kind);
      const count = (width + 2) * (height + 2);
      assert.equal(occurrences(php, /<img src='maps\//g), count, page);
      assert.equal(map.tiles.length, count, route);
      assert.equal(occurrences(map.html, /class="geomorph"/g), count);
      assert.equal(map.width, width * 300 + (kind === 'suburb' ? 170 : 320));
      assert.equal(map.height, height * 300 + (kind === 'suburb' ? 170 : 320));
      for (const tile of map.tiles) assert.ok(existsSync(`${root}/js/maps/${tile.image}`), tile.image);
      assert.equal(map.rooms[0]?.number, map.rooms.length ? 11 : undefined);
    }
  }
});
test('map variants have local images, labels and bounded empty selections', () => {
  for (const [kind, types] of [['dungeon', ['Dungeon', 'Cavernous', 'Cavernous Dungeon', 'Side View']], ['settlement', ['City', 'Keep', 'Village']], ['scifi', ['Building', 'Spaceship', 'Exodus Spaceship']]]) {
    for (const type of types) for (let seed = 1; seed <= 6; seed++) {
      W.rng = W.random(seed);
      const map = W.geomorphMap({ type, width: 3, height: 3, keyed: '1', geomorph_colored: '1' }, kind);
      assert.equal(map.tiles.length, 25, type);
      for (const tile of map.tiles) assert.ok(existsSync(`${root}/js/maps/${tile.image}`), tile.image);
      assert.equal(occurrences(map.html, /class="map-number"/g), map.rooms.length);
    }
  }
  const disabled = Object.fromEntries(['dyson', 'risus', 'rorsch', 'stone', 'glenn', 'stuart', 'zero'].map(a => ['cave_' + a, '0']));
  assert.match(W.geomorphMap(disabled, 'dungeon').html, /No matching geomorphs/);
});
test('world maps retain original grid block counts and local terrain assets', async () => {
  for (const [width, height] of [[1, 1], [2, 2]]) {
    const p = { map_wide: width, map_high: height, map_genre: 'Fantasy', map_climate: 5, map_equals: 6, info: 1, legend: 1 };
    const php = await phpResult('tool_world.php', p);
    const js = W.worldMap(p);
    assert.equal(occurrences(php, /src='land\/hexes.png'/g), width * height);
    assert.equal(occurrences(js.html, /src="land\/hexes.png"/g), width * height);
    assert.equal(js.cells.length, width * height * 80);
  }
  for (const climate of [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]) for (const genre of ['Fantasy', 'Post-Apocalyptic', 'Sci-Fi', 'Exodus Spaceship', 'Empty']) {
    const map = W.worldMap({ climate, genre, width: 2, height: 2, water_n: 1, water_w: 1 });
    for (const cell of map.cells) if (cell.icon) assert.ok(existsSync(`${root}/js/land/${cell.icon}`), cell.icon);
  }
});
test('hex crawl with no game or an empty enemy pool always terminates', () => {
  for (const game of ['', 'not-a-game', 'lablord', 'mutfut']) {
    W.rng = W.random('hex-regression');
    const html = W.routes['hex-crawl'].generate({ game, n: 5, climate: 106, level: 1 });
    assert.match(html, /Keyed Areas/);
    assert.equal(occurrences(html, /class="hex-grid"/g), 4);
    assert.ok(occurrences(html, /class="site-number"/g) <= 5);
    assert.doesNotMatch(html, /undefined|NaN/);
  }
});
test('results survive in memory when file-origin localStorage is unavailable', () => {
  Object.defineProperty(context, 'localStorage', { configurable: true, get() { throw new Error('storage denied'); } });
  W.storage.set('offline-regression', { map: 'saved' });
  assert.equal(W.storage.get('offline-regression').map, 'saved');
  delete context.localStorage;
});
test('game menu links preserve game choice and all licences have routes', () => {
  const page = W.renderRoute('#/game/lablord').html;
  assert.match(page, /#\/coins\?game=lablord/);
  for (const key of ['ogl', 'osric', 'sw', 'll', 'mf']) {
    assert.ok(W.routes['licence/' + key]);
    assert.doesNotMatch(W.renderRoute('#/licence/' + key).html, /still being ported/);
  }
});
test('router submits checked/unchecked options into a seeded bookmark', () => {
  const handlers = {}, location = { hash: '#/coins?game=lablord' }, app = {};
  const form = { addEventListener: (name, fn) => { handlers[name] = fn; }, querySelectorAll: () => [{ name: 'mixed', checked: false }] };
  const doc = { title: '', getElementById: id => ({ app, 'generator-form': form }[id] || null) };
  const stub = { window: null, WZ: { ...W }, WZ_DATA: context.WZ_DATA, location, document: doc, URLSearchParams, FormData: class { constructor() { return [['game', 'lablord'], ['n', '3'], ['seed', '']][Symbol.iterator](); } }, addEventListener: (name, fn) => { handlers[name] = fn; } };
  stub.window = stub;
  vm.runInNewContext(readFileSync(`${root}/js/core/router.js`, 'utf8'), stub);
  let prevented = false;
  handlers.submit({ preventDefault() { prevented = true; } });
  assert.ok(prevented);
  const params = new URLSearchParams(location.hash.split('?')[1]);
  assert.equal(params.get('game'), 'lablord');
  assert.equal(params.get('n'), '3');
  assert.equal(params.get('mixed'), '0');
  assert.equal(params.get('run'), '1');
  assert.ok(params.get('seed'));
});
test('combat sheets retain PHP set counts across dice ranges', async () => {
  for (const [min, max, n] of [[1, 2, 2], [3, 3, 4]]) {
    const php = await phpResult('tool_dice.php', { dice_min: min, dice_max: max, dice_num: n, tt_vs: 7 });
    const js = W.routes.dice.generate({ min, max, n, spite: '1' });
    assert.equal(occurrences(php, /Total:/g), (max - min + 1) * n);
    assert.equal(occurrences(js, /<tbody><tr>|<\/tr><tr>/g), (max - min + 1) * n);
    assert.match(js, /Spite Damage/);
  }
});
test('original game themes and font assets remain local', () => {
  assert.equal(W.renderRoute('#/coins?game=lablord').stylesheet, 'theme-rpg_lablord.css');
  assert.equal(W.renderRoute('#/game/gamma').stylesheet, 'theme-rpg_gamma.css');
  assert.equal(W.renderRoute('#/').stylesheet, 'portal.css');
  for (const file of readdirSync(`${root}/js`).filter(f => f.endsWith('.css'))) {
    const css = readFileSync(`${root}/js/${file}`, 'utf8');
    for (const m of css.matchAll(/url\(["']?([^)'"\s]+)/g)) assert.ok(existsSync(`${root}/js/${m[1].split(/[?#]/)[0]}`), `${file}: ${m[1]}`);
  }
});
