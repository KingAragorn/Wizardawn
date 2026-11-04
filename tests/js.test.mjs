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

test('Tunnels & Trolls reference sheets retain all 69 effects and 58 brewable recipes', async () => {
  // The original sheet stops at Truthfulness: TTSaves(level) omits an unused
  // argument. Repair only the oracle's in-memory filesystem to compare the
  // complete reference table; src/ remains untouched.
  const savePath = '/var/www/html/functions/tt_saves.php';
  oracle.php.writeFile(savePath, oracle.php.readFileAsText(savePath).replace('$level,$game)', "$level,$game='')"));
  for (const [game, phpGame] of [['tt5e', 'Tunnels & Trolls 5th Edition'], ['tt7e', 'Tunnels & Trolls 7th Edition'], ['ttde', 'Tunnels & Trolls Deluxe']]) {
    const potions = W.routes.potions.generate({ game, n: 0 });
    const php = await phpResult('tool_potions.php', { x_game: phpGame, amount: 0 });
    assert.equal(occurrences(potions, /taste and smell/g), 69);
    assert.equal(occurrences(php, /taste and smell/g), 69);
    for (const label of ['Curare Poison', 'Dragon Venom', 'Naga Spittle', 'Manbane Paste', 'Wolfbane Powder', 'Youth', 'Life Giving']) {
      assert.ok(potions.includes(label), label); assert.ok(php.includes(label), label);
    }
    const brews = W.routes.brews.generate({ game, min: 1, max: 4 });
    const phpBrews = await phpResult('tool_brew.php', { x_game: phpGame, x_value1: 1, x_value2: 4 });
    assert.equal(occurrences(brews, /taste and smell/g), 58);
    assert.equal(occurrences(phpBrews, /taste and smell/g), 58);
    assert.equal(occurrences(brews, /L\d+SR vs\. INT<\/td>/g), 58);
    assert.match(brews, /Alchemists sell the below items/);
    const shelf = W.routes.alchemist.generate({ game, n: 8, potion: '100', min: 1, max: 1 });
    assert.equal(occurrences(shelf, /<td>Magic<\/td>/g), 8);
    assert.doesNotMatch(shelf, /undefined|NaN/);
  }
});
test('unusual books support every fantasy game and preserve requested counts', async () => {
  for (const game of ['lablord', 'osric', 'add', 'bdd', 'bfrpg', 'sandw', 'ssxs', 'tt5e', 'tt7e', 'ttde']) {
    W.rng = W.random('books-' + game);
    const output = W.routes.books.generate({ game, n: 100, unusual: '100' });
    assert.equal(occurrences(output, /<li>/g), 100);
    assert.equal(occurrences(output, /\{[^}]+\}/g), 100);
    assert.doesNotMatch(output, /undefined|NaN/);
    assert.match(output, /book contains|book is|book can|book sprouts/);
  }
  const php = await phpResult('tool_books.php', { x_game: 'Labyrinth Lord', amount: 5, unusual: 100 });
  assert.equal(occurrences(php, /\d+\.&nbsp;/g), 5);
  assert.equal(occurrences(php, /\{[^}]+\}/g), 5);
});
test('packs retain food, clothing, light, sleeping gear and currency', async () => {
  for (const eat of ['0', '1']) for (const count of [1, 4]) {
    const php = await phpResult('tool_packs.php', { x_game: 'Labyrinth Lord', x_packs: count, x_eat: eat });
    const js = W.routes.packs.generate({ game: 'lablord', n: count, eat });
    assert.equal(occurrences(php, /width='40' align='center' valign='top'/g), count);
    assert.equal(occurrences(js, /<tbody><tr>|<\/tr><tr>/g), count);
    for (const text of ['pouch|small sack', 'bedroll|blanket', 'lantern|torches|oil lamp|oil-burning torch', 'shirt|tunic', 'trousers|kilt']) assert.match(js, new RegExp(text));
    if (eat === '1') { assert.equal(occurrences(js, /rations \(/g), count); assert.equal(occurrences(php, /rations&nbsp;\(/g), count); }
  }
  for (let seed = 0; seed < 100; seed++) { W.rng = W.random(seed); assert.doesNotMatch(W.pack({ game: 'tt7e' }), /undefined|NaN/); }
});
const customFixture = 'Custom file\n--BEGIN--\nGoblin\tDG\t1\t3\tAC: 6; HD: 1\nDragon\tPM\t5\t1\tAC: 0; HD: 8\n--END--\nneedle trap\n--END--\nold chair\n--END--\nwood chest\n--END--\ncoins\t1\t1\n--END--\n10gp\t1\t0\n--END--';
test('custom data preserves terrain, level, weights, and loot sublists without SQL', () => {
  const data = W.parseData(customFixture, { terrain: 'dg', level: 2 });
  assert.equal(data.enemies.length, 1);
  assert.equal(data.enemies[0].weight, 3);
  assert.equal(W.dataEnemy(data).name, 'Goblin');
  assert.equal(W.dataTreasure(data), 'coins, 10gp');
  const cycle = W.parseData(customFixture.replace('10gp\t1\t0', '10gp\t1\t1'));
  assert.equal(W.dataTreasure(cycle), 'coins, 10gp');
  assert.equal(W.parseData('invalid').enemies.length, 0);
});
test('Random Area matches PHP section and area counts with pasted custom data', async () => {
  for (const n of [1, 3]) {
    const p = { x_area: 'Goblin Hall', x_areas: n, x_level: 2, x_code: 'DG', x_data: customFixture, x_c_c: 100, x_c_c_min: 1, x_c_c_max: 1, x_c_c_low: 0, x_u_c: 100, x_u_c_min: 1, x_u_c_max: 1, x_u_c_low: 0, x_l_c: 100, x_l_c_min: 1, x_l_c_max: 1, x_l_c_low: 0, x_t_c: 100, x_t_c_min: 2, x_t_c_max: 2, x_t_c_low: 0, x_rigged_chance: 100 };
    const php = await phpResult('tool_area.php', p);
    const js = W.routes.area.generate(p);
    assert.equal(occurrences(js, /class="area"/g), n);
    for (const section of ['ENCOUNTER:', 'CONTENTS', 'LOOT', 'ROOM TRAP:']) assert.equal(occurrences(js, new RegExp(section, 'g')), occurrences(php, new RegExp(section, 'g')), section);
    for (const content of ['Goblin', 'old chair', 'wood chest', 'needle trap', '10gp']) assert.ok(js.includes(content), content);
    assert.doesNotMatch(js, /Dragon|undefined|NaN/);
  }
  const output = W.renderRoute('#/area?run=1&dataset=data_ll&n=3&seed=area').html;
  assert.equal(occurrences(output, /class="area"/g), 3);
  assert.match(W.renderRoute('#/area').html, /<textarea/);
});

test('zombie hordes retain description counts and optional Necropalyx statistics', async () => {
  for (const n of [1, 4]) for (const game of ['Generic', 'Necropalyx']) {
    const php = await phpResult('tool_zombies.php', { game, amount: n });
    const js = W.routes.zombies.generate({ game: game === 'Generic' ? 'horror' : 'necro', n });
    assert.equal(occurrences(js, /class="zombie"/g), n);
    assert.equal(occurrences(js, / zombie that /g), n);
    assert.equal(occurrences(php, / zombie that /g), n);
    assert.equal(occurrences(js, /<th scope="col">Stamina<\/th>/g), game === 'Necropalyx' ? n : 0);
    assert.equal(occurrences(php, /Stamina:/g), game === 'Necropalyx' ? n : 0);
  }
});
test('all scavenging table cells render, including quantities and nested books/toys', () => {
  const pick = W.pick, die = W.d;
  try {
    W.d = () => 2; // prevent the optional generic/junk substitution
    for (const [type, rows] of Object.entries(context.WZ_DATA.scavenging)) {
      for (const row of rows) {
        W.pick = pool => pool === rows ? row : pool[0];
        const result = W.scavengeItem(type);
        assert.equal(typeof result, 'string');
        assert.ok(result.length > 0, type);
        assert.doesNotMatch(result, /undefined|NaN|mt_rand|zombieItems/);
      }
    }
  } finally { W.pick = pick; W.d = die; }
});
test('scavenging retains building, corpse, item and condition counts', async () => {
  for (const building of ['book_store', 'home', 'army_base', 'random']) {
    const p = { genre: 'zombies', building, sets: 2, amount1: 3, amount2: 3, csets: 1, camount1: 4, camount2: 4, condition: '1' };
    const php = await phpResult('tool_scavenge.php', p);
    const js = W.routes.scavenge.generate(p);
    assert.equal(occurrences(js, /class="scavenge-building"/g), 2);
    assert.equal(occurrences(js, /class="scavenge-corpse"/g), 1);
    assert.equal(occurrences(js, /condition\)|totally ruined\)/g), 10);
    assert.equal(occurrences(php, /condition\)|totally ruined\)/g), 10);
    assert.equal(occurrences(js, /<tbody><tr>|<\/tr><tr>/g), 10);
  }
});
test('world maps implement latitude schedules, inheritance, all border and color controls', () => {
  const map = W.worldMap({ climate: 1, width: 2, height: 5 });
  assert.equal(Array.from(map.latitudes).join(','), 'arctic,forest,jungle,desert,tropic');
  assert.ok(map.cells.some(c => c.row >= 16 && c.terrain === 'arctic'));
  for (const climate of [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]) for (const genre of ['Fantasy', 'Post-Apocalyptic', 'Sci-Fi', 'Exodus Spaceship', 'Post-Apocalyptic Fantasy', 'Empty']) {
    W.rng = W.random('world-' + climate + genre);
    const map = W.worldMap({ climate, genre, width: 2, height: 2, water_n: 2, water_e: 1, color: '1', colorl: '1', hull: genre === 'Exodus Spaceship' ? '1' : '0' });
    assert.equal(map.cells.length, 320);
    assert.ok(map.cells.some(c => c.overlay));
    for (const cell of map.cells) for (const asset of [cell.icon, cell.overlay].filter(Boolean)) assert.ok(existsSync(`${root}/js/land/${asset}`), asset);
    assert.doesNotMatch(map.html + map.legend, /undefined|NaN/);
    if (genre === 'Empty') assert.ok(map.cells.every(c => !'XWSU'.includes(c.symbol)));
  }
  const hull = W.worldMap({ genre: 'Exodus Spaceship', climate: 5, width: 2, height: 2, hull: '1' });
  assert.ok(hull.cells.some(c => c.symbol === 'T'));
  assert.match(W.renderRoute('#/world?run=1&seed=world&info=1&legend=1&color=1').html, /terrain-overlay/);
  assert.doesNotMatch(W.routes.world.generate({ info: '0', legend: '1' }), /<h3>Legend/);
});

test('monster tools retain game-specific fields, descriptions and T&T scaling', async () => {
  // Nested relative includes in this legacy file assume Apache's working
  // directory. Resolve the include in the oracle's memory-only copy so its
  // actual conversion formulas run under the Node PHP runtime too.
  const statPath = '/var/www/html/functions/stat_blocks.php';
  oracle.php.writeFile(statPath, oracle.php.readFileAsText(statPath).replaceAll('"functions/monsters_tt.php"', '__DIR__ . "/monsters_tt.php"'));
  for (const [game, phpGame] of [['tt5e', 'Tunnels & Trolls 5th Edition'], ['tt7e', 'Tunnels & Trolls 7th Edition'], ['ttde', 'Tunnels & Trolls Deluxe']]) {
    const monster = W.monsters({ game })[0];
    for (const ttlvl of ['9', '1', '4', '5']) {
      const p = { game, ttlvl };
      const stats = W.trollStats(monster, p);
      assert.ok(stats.rating > 0);
      const php = W.plainText(await phpResult('tool_encounter.php', { x_package: phpGame, x_enemy: monster.id, x_amount: 1, x_level: 1, x_characters: 1, x_ttlvl: ttlvl, tt_dice: 0, tt_adds: 0 }));
      const html = W.monsterStats(monster, true, p);
      assert.match(php, new RegExp('MR:\\s*' + stats.rating));
      assert.match(html, new RegExp('<b>MR:</b> ' + stats.rating));
      assert.equal(stats.adds, game === 'ttde' ? Math.floor(stats.rating / 2) : Math.ceil(stats.rating / 2));
      assert.doesNotMatch(html, /\bHURT\b|\bSAVE\b|\bundefined\b|\bNaN\b/);
      assert.equal('SPD' in stats.attributes, game !== 'tt5e');
    }
  }
  for (const game of ['lablord', 'bdd', 'bfrpg', 'osric', 'add', 'sandw', 'ssxs', 'urthe', 'gamma', 'meta', 'mutfut', 'ww', 'millen', 'fantasy']) {
    const creatures = W.monsters({ game });
    assert.ok(creatures.length > 100, game);
    for (const m of creatures) {
      const html = W.monsterStats(m, true, { game, mutate: '1' });
      assert.doesNotMatch(html, /\bundefined\b|\bNaN\b/, game + ': ' + m.name);
      assert.ok(html.includes('<strong>'));
    }
  }
});
test('monster listings support columns, difficulty sorting, terrain reports and custom files', async () => {
  const monsters = W.monsters({ game: 'lablord' });
  for (const statb of ['1', '2']) {
    const js = W.routes.lists.generate({ game: 'lablord', statb, sorting: '2', show_terrain: '1' });
    const php = await phpResult('tool_lists.php', { listing: 3, statb, sorting: 2, type: 1 });
    assert.equal(occurrences(js, /<tbody><tr>|<\/tr><tr>/g), monsters.length);
    assert.ok(php.toLowerCase().includes('pegasus'));
    assert.match(js, /THAC0/);
  }
  const grouped = W.routes.lists.generate({ game: 'lablord', type: '2', statb: '1' });
  for (const name of ['Forest', 'Hills', 'Mountains', 'Freshwater, Below', 'Sea, Above']) assert.ok(grouped.includes(name), name);
  const js = W.routes.wander.generate({ game: 'data', data: customFixture, terrain: 'DG', n: 3 });
  assert.equal(occurrences(js, /Goblin/g), 3);
  assert.doesNotMatch(js, /Dragon/);
  assert.equal(W.storage.get('wandering-enemies').rows.length, 3);
  assert.match(W.routes.wander.generate({ game: 'data', data: customFixture, terrain: 'none' }), /No Enemies Found/);
});
