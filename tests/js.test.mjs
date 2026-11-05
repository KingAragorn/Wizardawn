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
    const html = W.routes.items.generate({ game, n: 100, x_show_rt: '0', x_show_c: '0', x_show_ct: '0', x_show_ggj: '0', x_show_ei: '0', x_show_th: '0', x_show_en: '0' });
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

test('settlements number every building, keep residents local and respect race/population controls', async () => {
  for (const [route, page, game, phpGame] of [['town', 'tool_ftown.php', 'fantasy', 'Fantasy'], ['ttown', 'tool_ttown.php', 'tt5e', 'Tunnels & Trolls 5th Edition'], ['wtown', 'tool_wtown.php', 'osric', 'OSRIC'], ['mtown', 'tool_mtown.php', 'mutfut', 'Mutant Future']]) {
    const options = { game, x_game: phpGame, map_rooms: 12, empty: '1', rulers: '0', ruler: '0', stores: '0', guilds: '0', police: '0', church: '0', banks: '0', law: '0', x_race_human: '1', species_human: '1', species_mhuman: '0', species_insect: '0', species_animal: '0', species_plant: '0', species_robot: '0', race: 'Human', race_part: 100, seed: 'town-buildings', might1: 1, might2: 8 };
    const php = await phpResult(page, options);
    assert.equal(occurrences(php, route === 'mtown' ? /width="80"><font size="2">\d+<\/font>/g : /<font size="3">\d+<\/font>|<font size='3'>\d+<\/font>/g), 12, page);
    const js = W.renderRoute('#/' + route + '?' + new URLSearchParams({ ...options, run: '1' })).html;
    assert.equal(occurrences(js, /class="town-building"/g), 12, route);
    const town = W.storage.get('last-town');
    assert.equal(town.buildings.length, 12);
    for (const building of town.buildings.filter(b => b.owner)) assert.equal(building.owner.race.toLowerCase(), 'human', route);
    assert.doesNotMatch(js, /class="geomorph"|class="town-business"|ROYAL VAULT/);
  }
});
test('settlements assign each merchant and institution a distinct numbered building', () => {
  for (const route of ['town', 'ttown', 'wtown', 'mtown']) {
    W.rng = W.random(route);
    const js = W.routes[route].generate({ map_rooms: 50, empty: '0', stock: 100, shelf: '1', rulers: '0', law: '0' });
    const town = W.storage.get('last-town');
    assert.equal(town.buildings.length, 50);
    assert.equal(new Set(town.buildings.filter(b => b.type).map(b => b.number)).size, occurrences(js, /class="town-business"/g));
    assert.match(js, /In Stock/);
    assert.match(js, /Merchants/);
    assert.doesNotMatch(js, /undefined|NaN/);
    const owners = town.buildings.filter(b => b.type).map(b => b.owner.name);
    for (const name of owners) assert.ok(js.includes(W.escape(name)));
    if (route === 'ttown') assert.match(js, /STR:|CON:/);
  }
});

test('Adventurers Guild retains class counts, level caps and character sections', async () => {
  for (const [route, page] of [['bxadvg', 'tool_bxadvg.php'], ['ladvg', 'tool_ladvg.php'], ['oadvg', 'tool_oadvg.php']]) {
    const p = { x_qty_cleric: 2, x_qty_fighter: 1, x_qty_mage: 1, x_qty_thief: 1, x_lvl1: 3, x_lvl2: 3, x_sex: 'Female', x_output: 'Character Listing', x_name: '1', x_show_al: '1', x_show_sk: '1', x_show_eq: '1', x_show_ss: '1', x_lang_set: '1', x_maxhp: '1' };
    const php = await phpResult(page, p);
    const js = W.routes[route].generate(p);
    assert.equal(occurrences(js, /class="character"/g), 5);
    assert.match(php, /Cleric/i); assert.match(js, /Cleric/);
    assert.match(php, /Fighter/i); assert.match(js, /Fighter/);
    assert.match(js, /Saving Throws/); assert.match(js, /Attack Rolls/); assert.match(js, /Equipment:/);
    const characters = W.storage.get('last-characters').characters;
    for (const c of characters) { assert.equal(c.sex, 'Female'); assert.equal(c.level, 3); assert.ok(c.hitPoints > 0); assert.equal(c.saves.length, 5); }
  }
  for (const [className, limit] of [['Dwarf', 12], ['Elf', 10], ['Halfling', 8]]) {
    assert.equal(W.character({ x_lvl1: 20, x_lvl2: 20 }, 'll', className).level, limit);
  }
});
test('all basic class levels use original progression, saves and spell lists', () => {
  for (const rules of ['bx', 'll']) for (const className of ['Cleric', 'Dwarf', 'Elf', 'Fighter', 'Halfling', 'Magic-User', 'Thief']) for (let level = 1; level <= (rules === 'bx' ? 14 : 20); level++) {
    const c = W.character({ x_lvl1: level, x_lvl2: level, x_maxhp: '1' }, rules, className);
    assert.equal(c.stats.STR >= 3 && c.stats.STR <= 18, true);
    assert.ok(c.saves.every(n => Number.isInteger(n) && n > 0));
    assert.ok(c.xp >= 0);
    if (className === 'Magic-User' || className === 'Elf') assert.ok(c.spells.length > 0);
    assert.doesNotMatch(W.renderCharacter(c, { x_show_ss: '1' }), /undefined|NaN/);
  }
});

test('adventures keep room keys tied to maps and obey all disabled-content controls', async () => {
  for (const [route, page, game, phpGame] of [['ultimate', 'tool_ultimate.php', 'lablord', 'Labyrinth Lord'], ['uexfl', 'tool_uexfl.php', 'meta', 'Metamorphosis Alpha'], ['uruins', 'tool_uruins.php', 'mutfut', 'Mutant Future']]) {
    const options = { game, x_package: phpGame, x_area: 'Test Dungeon', map_rooms: 4, x_c_c: 0, x_t_c: 0, x_l_c: 0, x_u_c: 0, x_furnish: '0', x_weird: 0, atmo: 999, x_outside: '0', wandering: '0', map_numbers: 1 };
    const php = await phpResult(page, options);
    const js = W.routes[route].generate(options);
    assert.match(php, /Test Dungeon/);
    assert.equal(occurrences(js, /class="adventure-room"/g), 4);
    assert.doesNotMatch(js, /class="room-encounter"|class="room-trap"|class="room-treasure"|class="adventure-wandering"/);
    assert.equal(W.storage.get('last-adventure').rooms.length, 4);
  }
});
test('delve simple, complex and progressive modes create matching floor/room keys', () => {
  for (const mode of ['Simple', 'Complex', 'Progressive']) {
    W.rng = W.random('delve-' + mode);
    const js = W.routes.delve.generate({ game: 'lablord', width: 1, height: 1, x_delve: mode, x_c_c: 0, x_t_c: 0, x_l_c: 0, wandering: '0' });
    const adventure = W.storage.get('last-adventure');
    assert.equal(occurrences(js, /class="adventure-room"/g), adventure.rooms.length);
    assert.ok(adventure.rooms.length > 0);
    if (mode !== 'Simple') {
      assert.equal(occurrences(js, /class="delve-floor"/g), adventure.floors.length);
      assert.equal(adventure.floors.reduce((sum, floor) => sum + floor.rooms.length, 0), adventure.rooms.length);
      for (const floor of adventure.floors) for (const room of floor.rooms) assert.ok(adventure.rooms.some(r => r.floor === floor.number && r.number === room.number));
      if (mode === 'Progressive') assert.ok(adventure.floors.at(-1).level > adventure.floors[0].level);
    }
    assert.doesNotMatch(js, /undefined|NaN/);
  }
});
test('adventure contents honor forced counts and every fantasy trap table entry renders', () => {
  for (const game of ['lablord', 'tt5e', 'tt7e', 'ttde', 'ssxs', 'osric']) {
    for (let trap = 0; trap < 51; trap++) assert.doesNotMatch(W.trap({ game }, 'room', trap), /undefined|NaN|\[object Object\]/);
    const html = W.routes.ultimate.generate({ game, map_rooms: 2, x_c_c: 100, x_c_c_min: 2, x_c_c_max: 2, x_t_c: 100, x_t_c_min: 3, x_t_c_max: 3, x_l_c: 100, x_l_c_min: 2, x_l_c_max: 2, x_l_c_low: 0, x_weird: 0, wandering: '0' });
    assert.equal(occurrences(html, /class="room-encounter"/g), 4, game);
    assert.equal(occurrences(html, /class="room-trap"/g), 6, game);
    assert.equal(occurrences(html, /class="room-treasure"/g), 4, game);
  }
});

test('settlement stock uses original technology, edition, stock and boat filters', () => {
  const D = context.WZ_DATA;
  for (const game of ['tt5e', 'tt7e', 'ttde']) for (const simple of ['0', '1']) {
    const era = game === 'ttde' ? simple === '1' ? 'Deluxe' : 'Deluxes' : simple === '1' ? 'Simple' : 'Complex';
    for (let type = 1; type <= 14; type++) {
      const stock = W.townStock({ game, x_oldway: simple, stock: 100, water: '0' }, 'tt', type);
      for (const row of stock.filter(row => row.source)) {
        assert.ok(row.source.era === '' || row.source.era === era, game + ': ' + row.item);
        assert.notEqual(+row.source.qty, 2, row.item);
        assert.ok(D.storeItems.includes(row.source));
      }
    }
  }
  for (const game of ['mutfut', 'urthe', 'gamma', 'meta']) for (const techy of ['1', '2', '3']) {
    const stock = W.townStock({ game, stock: 100, techy }, 'post', 1);
    const tag = game === 'mutfut' ? 'MF' : game === 'urthe' ? 'BU' : 'PA';
    assert.ok(stock.length > 0);
    for (const row of stock) {
      assert.ok(row.source.game.split('x').includes(tag));
      if (techy !== '3') assert.ok(row.source.era === 'both' || row.source.era === (techy === '1' ? 'low' : 'hi'));
    }
  }
  assert.equal(W.townStock({ game: 'osric', stock: 0 }, 'rules', 4).length, 0);
  assert.equal(W.townStock({ game: 'fantasy', stock: 0 }, 'generic', 4).length, 1);
  assert.equal(W.townStock({ game: 'tt7e', stock: 0 }, 'tt', 4).length, 1);
});
test('OSRIC settlements retain five guilds, bank, guards and church in original order', () => {
  W.rng = W.random('osric-institutions');
  const html = W.routes.wtown.generate({ map_rooms: 40, rulers: '0', empty: '0', stores: '1', guilds: '1', banks: '1', guards: '1', church: '1', x_lvl1: 3, x_lvl2: 3 });
  const town = W.storage.get('last-town');
  assert.equal(town.buildings.filter(b => b.type).length, 22);
  for (const shop of [15, 16, 17, 18, 19, 20, 21, 22]) assert.equal(town.buildings.filter(b => b.type === shop).length, 1);
  for (const title of ['FIGHTERS GUILD LEADER', 'WIZARDS GUILD LEADER', 'THIEVES GUILD LEADER', 'RANGERS GUILD LEADER', 'ASSASSINS GUILD LEADER', 'BANK GUARD:', 'CHURCH LEADER:', 'Divine service', 'IRON CHEST #']) assert.ok(html.includes(title), title);
  assert.ok(html.indexOf('<h3>Guilds') < html.indexOf('<h3>Banks'));
  assert.doesNotMatch(html, /undefined|NaN/);
});
test('fantasy and T&T settlements use original owner titles, caretakers and church text', () => {
  for (const [route, spell] of [['town', '<i>Remove Curse</i> for 600gp'], ['ttown', '<i>Pygmalion</i> for 600gp']]) {
    W.rng = W.random('owner-titles-' + route);
    const html = W.routes[route].generate({ map_rooms: 40, rulers: '0', empty: '0', stores: '1', guilds: '1', police: '1', church: '1' });
    for (const title of ['<b>Bartender:</b>', '<b>Inn Keeper:</b>', '<b>Merchant:</b>', '<b>Caretaker:</b>', 'CHURCH LEADER:', 'CHURCH PRIEST:', '[Church]', '[Guardhouse]']) assert.ok(html.includes(title), route + ' ' + title);
    assert.match(html, /\[\d{1,3}(,\d{3})?gp\]/);
    assert.ok(html.indexOf(spell) > html.indexOf('CHURCH LEADER:'));
    assert.ok(html.indexOf(spell) < html.indexOf('CHURCH PRIEST:'), route);
    assert.doesNotMatch(html, /<b>Owner:<\/b>|CHURCH MEMBER|undefined|NaN/);
    assert.match(html, /data-shop="15"><h4>Building \d+<\/h4><h4>(The )?\w+ \w+ of [\w ]+ <small>/);
    assert.match(html, /<h4>(The )?(Fighters|Warriors|Champions|Soldiers|Gladiators|Defenders|Mercenaries|Legionnaires) (\w+ )?(Guild|Lodge|League|Order|Society|Clan|Fraternity|Circle|Ring|Union) <small>/);
    assert.match(html, /<i>\([2-7]sp per night\)<\/i>/);
  }
});
test('post-apocalyptic businesses use original owner titles and numbered vault contents', () => {
  W.rng = W.random('mtown-owners');
  const html = W.routes.mtown.generate({ game: 'gamma', map_rooms: 40, empty: '0', stores: '1', law: '0', money: 'dm' });
  for (const title of ['<b>Banker:</b>', '<b>Bartender:</b>', '<b>Doctor:</b>', '<b>Pawn Broker:</b>', '<b>Owner (Army Surplus):</b>', '<b>Owner (Vehicles):</b>']) assert.ok(html.includes(title), title);
  assert.match(html, /<b>VAULT #1:<\/b> (ruined|rough|average|good|perfect) /);
  assert.match(html, /filled with \[[\d,]+dm\]/);
  const numbers = [...html.matchAll(/VAULT #(\d+):/g)].map(m => +m[1]);
  assert.deepEqual(numbers, numbers.map((_, i) => i + 1));
  assert.doesNotMatch(html, /undefined|NaN|<b>Owner:<\/b>/);
});
test('B/X adventurers guild listing has the original preamble and AC never exceeds 9', () => {
  W.rng = W.random('bx-intro');
  const html = W.routes.bxadvg.generate({ x_qty_fighter: 3, x_show_al: 1 });
  assert.match(html, /^<p class="adventurer-intro">Each adventurer is listed below with their strength \(ST\), intelligence \(IN\)/);
  assert.match(html, /armor class \(AC\), alignment \(AL\), gender \(GD\)/);
  assert.match(html, /magic wand \(MW\), turn to stone or paralysis \(TP\)/);
  assert.doesNotMatch(W.routes.bxadvg.generate({ x_output: 'Character Sheets', x_qty_fighter: 1 }), /adventurer-intro/);
  for (let i = 0; i < 40; i++) assert.ok(W.character({ x_show_eq: 1 }, 'bx', 'Fighter').ac <= 9);
});
test('Labyrinth Lord adventurers guild listing uses its own preamble', () => {
  W.rng = W.random('ll-intro');
  const html = W.routes.ladvg.generate({ x_qty_fighter: 1, x_show_age: 1 });
  assert.match(html, /strength \(ST\), dexterity \(DX\), constitution \(CN\)/);
  assert.match(html, /gender \(GD\), age, and experience/);
  assert.match(html, /breath attacks \(BA\), poison or death \(PD\), petrify or paralyze \(PP\), wands \(WN\)/);
});
test('OSRIC adventurers guild listing uses the original preamble and save legend', () => {
  W.rng = W.random('osric-intro');
  const html = W.routes.oadvg.generate({ x_qty_fighter: 1 });
  assert.match(html, /^<p class="adventurer-intro">Each adventurer is listed below with their alignment \(<i>AL<\/i>\)/);
  assert.match(html, /<i>RSW<\/i> \(rod, staff, or wand\)/);
  assert.match(W.routes.oadvg.generate({ game: 'lablord', x_qty_fighter: 1 }), /<i>BA<\/i> \(breath attacks\)/);
});
test('ultimate dungeon atmosphere sounds use the original soundWhereRoom qualifiers', () => {
  W.rng = W.random('sounds');
  const sounds = W.range(600).map(() => W.atmosphere({ atmo: 50 })).filter(t => t.includes('You can make out'));
  assert.ok(sounds.length > 20);
  assert.ok(sounds.every(t => /You can make out (a faint|a loud|a quiet|an eerie|a strange|an odd|an echoey|a muffled|a distant|a close) \S/.test(t)));
});
test('uruins stranded vehicles follow VehicleRobotMaker wording', () => {
  W.rng = W.random('vehicles');
  const all = W.range(300).map(() => W.strandedVehicle({ game: 'gamma' }));
  assert.ok(all.every(v => /^[A-Z][^.]* \((totally ruined|poor condition|fair condition|good condition|excellent condition|perfect condition)\)( totally drained of fuel| with (10|20|30|40|50|60|70|80|90|100)% fuel)\.$/.test(v)));
  assert.ok(all.some(v => / Camouflage Military /.test(v)) && all.some(v => /Anti-grav Car/.test(v)));
  assert.ok(W.range(50).map(() => W.strandedVehicle({ game: 'meta' })).every(v => !/Military/.test(v)));
});
test('Broken Urthe stranded vehicles use the Urthe vehicle list', () => {
  W.rng = W.random('urthe-vehicles');
  const all = W.range(300).map(() => W.strandedVehicle({ game: 'urthe' }));
  assert.ok(all.some(v => /Semi Truck With Trailer|Dune Buggy|Moped|Hovercraft/.test(v)));
  assert.ok(all.every(v => !/Turbine Car|Bubble Car|Military/.test(v)));
});
test('VehicleRobotMaker robot text matches the original per-game lists', () => {
  W.rng = W.random('robots');
  const cond = '\\((totally ruined|poor condition|fair condition|good condition|excellent condition|perfect condition)\\)';
  const power = '( totally drained of power| with (10|20|30|40|50|60|70|80|90|100)% power)\\.$';
  const gw = W.range(100).map(() => W.vehicleRobot({ game: 'gamma' }, 0));
  assert.ok(gw.every(t => new RegExp(cond + power).test(t)) && gw.some(t => /Robotoid|Borg|Bot/.test(t)));
  assert.ok(W.range(60).map(() => W.vehicleRobot({ game: 'meta' }, 0)).some(t => /^Android /.test(t)));
  assert.ok(W.range(60).map(() => W.vehicleRobot({ game: 'mutfut' }, 0)).some(t => /Think Tank|Cargo Litter|Warbot/.test(t)));
  const bu = W.range(100).map(() => W.vehicleRobot({ game: 'urthe', x_level: 4 }, 0));
  assert.ok(bu.every(t => / (Droid|Bot|Mech) \(/.test(t) && / made mostly of .* and runs on .* for fuel\. It has Software (I|II) in [A-Z]\w+ installed and is/.test(t)), bu[0]);
  assert.ok(bu.some(t => /^[0-9A-Z]+(-[0-9A-Z]+)? /.test(t)));
  W.rng = W.random('ruin-robot');
  const html = W.routes.uruins.generate({ map_rooms: 8, x_frob: 100, x_fveh: 100 });
  assert.match(html, /STRANDED ROBOT (INSIDE|NEXT TO) THE BUILDING\.\.\.<\/b><br>[A-Z]/);
  assert.ok(html.indexOf('STRANDED VEHICLE') < html.indexOf('STRANDED ROBOT'));
});
test('fantasy locales use the original per-icon names and flags', () => {
  W.rng = W.random('locale-profiles');
  const names = icon => W.range(60).map(() => W.fantasySiteProfile({ game: 'lablord' }, icon, false, []));
  assert.ok(names('tower').every(r => /Tower$|^(\w+ )?Tower of /.test(r.name) && r.size === 0 && r.floors >= 3));
  assert.ok(names('cave').every(r => /(Cave|Grotto|Cavern)/.test(r.name) && !r.contents && r.kind === 'cave'));
  assert.ok(names('mine').every(r => /(Excavation|Mines|Pit|Quarry)/.test(r.name) && /(Silver|Gold|Diamond|Iron|Ore)/.test(r.name)));
  const boats = names('boat');
  assert.ok(boats.every(r => /Ship|The \w+ \w+/.test(r.name) && !r.map && r.wreck));
  assert.ok(names('temple').some(r => r.tomb === 1 && /(Crypt|Tomb)/.test(r.name)));
  assert.equal(W.fantasySiteProfile({}, 'pa_factory', false, []), null);
  W.rng = W.random('locale-route');
  const html = W.range(4).map(() => W.routes.locale.generate({ game: 'lablord', x_locale: 8, map_rooms: 2 })).join('');
  assert.match(html, /Tower/);
  W.rng = W.random('locale-boat');
  assert.match(W.routes.locale.generate({ game: 'lablord', x_locale: 6 }), /years ago and now rests [\d,]+ feet below the water`s surface/);
});
test('treasure maps follow the original header, Merchant victim and owner lines', () => {
  W.rng = W.random('tmap-format');
  const html = W.range(40).map(() => W.routes.tmap.generate({ amount: 1, level: 3 })).join('');
  assert.match(html, /<b>Treasure Map<\/b> \[ Type III \] (\[[^\]]+\] )?- The map is /);
  assert.match(html, / was known to have had:/);
  assert.match(html, /stealing this treasure from a (Merchant|Demon|Dragon) known as /);
  assert.doesNotMatch(html, /from a (?!Merchant|Demon|Dragon)\w+ known as/);
});
test('Ruined City, Building and Spaceship rooms use mapMood descriptions', () => {
  W.rng = W.random('map-mood');
  const ruins = W.range(300).map(() => W.mapMood('Ruined City', 50));
  assert.ok(ruins.some(t => /^This building (seems|appears|looks|is)/.test(t)) && ruins.some(t => /^The inside of this building /.test(t)));
  assert.ok(ruins.some(t => /\. There are \w+ \w+ [a-z ]+ growing /.test(t)) && ruins.some(t => /Tall grasses/.test(t)));
  const ship = W.range(300).map(() => W.mapMood('Spaceship', 50));
  assert.ok(ship.some(t => /type of ship|rest of the ship/.test(t)) && ship.some(t => /computer (panels|consoles)/.test(t)));
  const building = W.range(300).map(() => W.mapMood('Building', 50));
  assert.ok(building.some(t => /rest of the building/.test(t)) && building.every(t => !/computer/.test(t)));
  W.rng = W.random('map-mood-route');
  assert.match(W.routes.uruins.generate({ map_rooms: 6, atmo: 100 }), /This building (seems|appears|looks|is)/);
});
test('uexfl unusual rooms and uruins robots use the original headings', () => {
  W.rng = W.random('headings');
  const sci = W.routes.uexfl.generate({ map_rooms: 300, x_weird: 100 });
  const unusual = (sci.match(/SOMETHING UNUSUAL IN THE ROOM\.\.\./g) || []).length;
  assert.ok(unusual >= 1 && unusual < 25, 'uexfl uses a fixed 2% chance');
  assert.match(sci, /This area contains\.\.\.|Empty of mundane items\./);
  assert.doesNotMatch(sci, /UNUSUAL IN THE AREA/);
  const ruins = W.routes.uruins.generate({ map_rooms: 12, x_frob: 100, x_fveh: 100 });
  assert.match(ruins, /STRANDED VEHICLE NEXT TO THE BUILDING\.\.\./);
  if (/stranded-robot/.test(ruins)) assert.match(ruins, /STRANDED ROBOT (INSIDE|NEXT TO) THE BUILDING\.\.\./);
});
test('delve caverns use the original eight descriptions and dripping water', () => {
  W.rng = W.random('caves');
  const seen = new Set(); let drip = 0;
  for (let i = 0; i < 400; i++) { const t = W.furnishDetails({ x_furnish: 1 }, true).text; if (t.endsWith(' Water drips from up above in places.')) drip++; seen.add(t.replace(' Water drips from up above in places.', '')); }
  assert.equal(seen.size, 8);
  assert.ok(drip > 30 && drip < 110);
  assert.ok([...seen].every(t => t.startsWith('This is a cavernous area')));
});
test('T&T guild services follow leaders and post-apocalyptic officers carry duty weapons', () => {
  W.rng = W.random('tt-guild-text');
  const tt = W.routes.ttown.generate({ map_rooms: 40, rulers: '0', empty: '0', stores: '0', guilds: '1', police: '0', church: '0' });
  const wiz = tt.indexOf('WIZARDS GUILD LEADER'), text = tt.indexOf('to other wizards only');
  assert.ok(wiz >= 0 && text > wiz);
  assert.ok(tt.indexOf('appraise an item for 400gp') > tt.indexOf('ROGUES GUILD LEADER'));
  W.rng = W.random('mtown-law');
  const pa = W.routes.mtown.generate({ game: 'gamma', map_rooms: 30, empty: '1', stores: '0', law: '1', techy: 1 });
  assert.match(pa, /officials from the Constable to the Law Enforcement officers/);
  assert.match(pa, /<b>CONSTABLE:<\/b>/);
  assert.match(pa, /and carries a [a-z][^<]* while on duty\)/);
  assert.doesNotMatch(pa, /undefined|NaN/);
});
test('post-apocalyptic citizens use age-based hit dice and robot households do not have children', () => {
  const ranges = { child: [3, 9], young: [5, 12], mature: [7, 18], 'middle-aged': [6, 17], old: [4, 10] };
  for (const [age, [min, max]] of Object.entries(ranges)) for (const game of ['mutfut', 'gamma', 'meta']) {
    const stats = W.citizenStats({ game, might1: 8, might2: 8 }, 'Human', age, 'citizen', 'post');
    assert.ok(stats.HD >= min && stats.HD <= max);
    assert.equal(stats.HP, stats.HD * 8);
    if (game !== 'mutfut') assert.ok(stats['RAD RESIST'] >= min && stats['RAD RESIST'] <= max);
  }
  W.routes.mtown.generate({ map_rooms: 20, empty: '1', law: '0', stores: '0', species_human: '0', species_mhuman: '0', species_animal: '0', species_insect: '0', species_plant: '0', species_robot: '1' });
  for (const building of W.storage.get('last-town').buildings.filter(b => b.owner)) {
    assert.equal(building.owner.race, 'Robot');
    assert.equal(building.family.length, 0);
  }
});

test('delve interiors preserve small, medium, large and water-floor dimensions', () => {
  for (const [width, height, count] of [[0, 0, 4], [1, 1, 9], [2, 1, 12], [1, 2, 12]]) {
    const map = W.geomorphMap({ width, height, interior: '1', keyed: '1', type: 'Dungeon' }, 'dungeon');
    assert.equal(map.tiles.length, count);
    assert.ok(map.rooms.length > 0);
    assert.equal(map.width, width * 300 + 320);
  }
  const normal = W.geomorphMap({ width: 1, height: 1, type: 'Side View', complex: '1', x_floors: 0, keyed: '1' }, 'dungeon');
  assert.ok(normal.rooms.length > 0);
  // PHP compares roll >= threshold; 100 still permits a 1% floor chance.
  const roll = W.d;
  try {
    W.d = () => 1;
    const omitted = W.geomorphMap({ width: 1, height: 1, type: 'Side View', complex: '1', x_floors: 100, keyed: '1' }, 'dungeon');
    assert.equal(omitted.rooms.length, 0);
    assert.doesNotMatch(omitted.html, /class="map-number"/);
  } finally { W.d = roll; }
});
test('adventures use custom encounters, decorations, traps, containers and loot consistently', () => {
  for (const route of ['delve', 'ultimate', 'uexfl', 'uruins']) {
    W.rng = W.random('custom-adventure-' + route);
    const output = W.routes[route].generate({ game: 'data', data: customFixture, map_rooms: 3, x_level: 2, x_terrain: 'DG', x_c_c: 100, x_c_c_min: 1, x_c_c_max: 1, x_t_c: 100, x_t_c_min: 1, x_t_c_max: 1, x_l_c: 100, x_l_c_min: 1, x_l_c_max: 1, x_l_c_low: 0, x_rigged_chance: 100, wandering: '0', x_weird: 0 });
    assert.equal(occurrences(output, /class="adventure-room"/g), 3);
    for (const text of ['Goblin', 'old chair', 'needle trap', 'wood chest', '10gp']) assert.ok(output.includes(text), route + ': ' + text);
    assert.doesNotMatch(output, /Dragon|There are 0|undefined|NaN/);
    for (const room of W.storage.get('last-adventure').rooms) {
      assert.equal(room.encounters.length, 1);
      assert.equal(room.traps.length, 1);
      assert.equal(room.treasures.length, 1);
      assert.equal(room.treasures[0].trap, 'needle trap');
    }
  }
});
test('post-apocalyptic clutter renders every original room and spaceship table cell', () => {
  for (const game of ['mutfut', 'urthe', 'gamma', 'meta']) for (const type of ['Building', 'Spaceship']) {
    for (let i = 0; i < 144; i++) {
      const row = W.postRoomItem({ game, type }, i);
      assert.equal(typeof row.text, 'string');
      assert.ok(row.text.length > 0, game + ' ' + type + ' ' + i);
      assert.doesNotMatch(row.text, /undefined|NaN|\[object Object\]|mt_rand|conditionType/);
      assert.ok(row.size >= 0 && row.size <= 3);
    }
    for (let i = 0; i < 55; i++) {
      const trap = W.postTrap({ game, type, level: 20 }, 'room', i);
      assert.ok(trap.length > 15, game + ': trap ' + i);
      assert.doesNotMatch(trap, /undefined|NaN|\[object Object\]|mt_rand|save[1-5]/);
    }
  }
});
test('Apocalypse includes all original report sections, counts, rules and local assets', () => {
  for (const game of ['', 'mutfut', 'urthe', 'gamma', 'meta']) {
    W.rng = W.random('apocalypse-' + game);
    const output = W.routes.items.generate({ game, x_show_ru: '1' });
    const report = W.storage.get('last-apocalypse');
    assert.equal(occurrences(output, /class="apocalypse-section"/g), 8);
    assert.equal(Array.from(report.reports, part => part.rows.length).join(','), '100,20,20,20,100,100,20,100');
    assert.match(output, /solitaire game/);
    assert.doesNotMatch(output, /undefined|NaN|\[object Object\]|\{\{[^}]+\}\}|<\?php/);
    for (const m of output.matchAll(/src="([^"]+)"/g)) assert.ok(existsSync(`${root}/js/${m[1]}`), m[1]);
    const empty = W.routes.items.generate(Object.fromEntries(['mi', 'rt', 'c', 'ct', 'ggj', 'ei', 'th', 'en'].map(key => ['x_show_' + key, '0'])));
    assert.doesNotMatch(empty, /class="apocalypse-section"/);
  }
});
test('all exported technological artifact descriptions render in their game categories', () => {
  for (const [game, key] of [['mutfut', 'makePAItem'], ['urthe', 'makeBUItem'], ['gamma', 'makeGWItem'], ['meta', 'makeMAItem']]) {
    for (const [category, rows] of Object.entries(context.WZ_DATA.postTables.artifacts[key])) for (const row of rows) {
      const output = W.postArtifact({ game }, 3, category, row.index);
      assert.ok(output.length > 2);
      assert.doesNotMatch(output, /undefined|NaN|\[object Object\]|mt_rand|<i>/);
    }
  }
});

test('treasure maps preserve PHP map counts and rank labels with custom hoards', async () => {
  for (const amount of [1, 3]) {
    const php = await phpResult('tool_tmap.php', { x_game: 'Data', amount, level: 4, x_data: customFixture });
    const js = W.routes.tmap.generate({ game: 'data', amount, level: 4, data: customFixture });
    assert.equal(occurrences(php, /Type IV/g), amount);
    assert.equal(occurrences(js, /Type IV/g), amount);
    const maps = W.storage.get('last-treasure-maps').maps;
    for (const map of maps) {
      assert.ok(map.treasure.length >= 6 && map.treasure.length <= 14);
      assert.ok(map.treasure.every(item => item === 'coins, 10gp'));
      assert.equal(map.container, 'wood chest');
      assert.ok(!map.trap || map.trap === 'needle trap');
    }
    assert.doesNotMatch(js, /undefined|NaN/);
  }
});
test('all locale choices render inhabitants, underwater depth, floors and matching room keys', () => {
  for (const [game, count] of [['lablord', 16], ['mutfut', 36]]) for (let location = 1; location <= count; location++) {
    W.rng = W.random('locale-' + game + '-' + location);
    const output = W.routes.locale.generate({ game, x_locale: location, map_rooms: 2, x_c_c: 0, x_t_c: 0, x_l_c: 0, x_furnish: '0', x_weird: 0 });
    const site = W.storage.get('last-locale').site;
    assert.equal(occurrences(output, /class="hex-site"/g), 1);
    assert.equal(occurrences(output, /class="site-inhabitants"/g), 1);
    assert.equal(occurrences(output, /class="site-floor"/g), site.floors.length);
    assert.equal(occurrences(output, /class="adventure-room"/g), site.rooms.length);
    assert.ok(existsSync(`${root}/js/land/${site.icon}`), site.icon);
    assert.ok(site.floors.every(floor => floor.rooms.length === 2));
    if (site.submerged) assert.match(output, /feet below the (water`s )?surface/);
    assert.doesNotMatch(output, /undefined|NaN/);
  }
});
test('hex crawl keys expand to local site records and preserve every room option', () => {
  for (const game of ['lablord', 'tt5e', 'mutfut', 'gamma', 'meta']) {
    W.rng = W.random('crawl-site-' + game);
    const output = W.routes['hex-crawl'].generate({ game, n: 3, climate: 101, map_rooms: 2, x_level: 3, x_c_c: 100, x_c_c_min: 1, x_c_c_max: 1, x_t_c: 100, x_t_c_min: 1, x_t_c_max: 1, x_l_c: 100, x_l_c_min: 1, x_l_c_max: 1, x_l_c_low: 0, x_u_c: 0, x_furnish: '0', x_weird: 0, wandering: '0' });
    const saved = W.storage.get('last-hex-crawl');
    assert.equal(occurrences(output, /class="hex-site"/g), saved.sites.length);
    assert.equal(occurrences(output, /class="site-number"/g), saved.sites.length);
    assert.ok(saved.sites.length > 0);
    assert.equal(saved.cells.length, 320);
    for (const site of saved.sites) for (const room of site.rooms) {
      assert.equal(room.traps.length, 1);
      assert.equal(room.treasures.length, 1);
    }
    assert.doesNotMatch(output, /undefined|NaN/);
  }
  const empty = W.routes['hex-crawl'].generate({ game: 'data', data: 'Empty\n--BEGIN--\n--END--', n: 2, climate: 112 });
  assert.match(empty, /No enemies found|No Enemies Found/);
});
test('OSRIC classes use the original legal race ranges, level limits, THAC0 and thief tables', () => {
  for (const [race, details] of Object.entries(context.WZ_DATA.characterDetails.races)) for (const className of Object.keys(details.classes)) {
    const c = W.character({ x_lvl1: 20, x_lvl2: 20, x_maxhp: '1' }, 'osric', className, race);
    const ranges = { ...details.ranges, ...details.classes[className].ranges };
    assert.equal(c.race, race);
    for (const [ability, [min, max]] of Object.entries(ranges)) {
      assert.ok(c.stats[ability] >= min && c.stats[ability] <= max + (ability === 'STR' ? 1 : 0), `${race} ${className} ${ability}`);
    }
    assert.ok(c.level <= Math.max(...details.classes[className].caps));
    assert.equal(c.attacks[1], W.osricThaco(className, c.level));
    assert.ok(c.age > 15);
    assert.doesNotMatch(W.renderCharacter(c, { x_show_ss: '1' }), /undefined|NaN/);
  }
  assert.equal(W.osricThaco('Fighter', 1), 20);
  assert.equal(W.osricThaco('Fighter', 20), 1);
  assert.equal(W.osricThaco('Magic-User', 10), 19);
  assert.equal(W.osricThaco('Cleric', 7), 16);
  assert.equal(Array.from(W.thiefSkills('Human', 13, 1)).join(','), '85,25,10,20,20,35,35,1');
  assert.equal(W.character({ x_lvl1: 20, x_lvl2: 20 }, 'osric', 'Druid', 'Human').level, 14);
});
test('basic adventurers retain original age, racial languages and class-legal gear', () => {
  for (const rules of ['bx', 'll']) for (const className of ['Cleric', 'Dwarf', 'Elf', 'Fighter', 'Halfling', 'Magic-User', 'Thief']) {
    const c = W.character({ x_lvl1: 1, x_lvl2: 1, x_var_dmg: '1' }, rules, className);
    const age = ({ Cleric: [20, 25], Dwarf: [46, 66], Elf: [133, 168], Fighter: [18, 21], Halfling: [43, 48], 'Magic-User': [29, 36], Thief: [20, 23] })[className];
    assert.ok(c.age >= age[0] && c.age <= age[1]);
    if (className === 'Dwarf') assert.ok(c.languages.includes('Kobold'));
    if (className === 'Elf') assert.ok(c.languages.includes('Hobgoblin'));
    if (className === 'Magic-User') { assert.equal(c.armor, 'robes'); assert.match(c.weapon, /dagger|dart|sling/); }
    if (className === 'Thief') assert.doesNotMatch(c.armor, /chain|plate|shield/);
    assert.doesNotMatch(c.weapon + c.armor, /undefined|NaN/);
  }
});

test('basic character attack/save progression agrees with PHP functions', async () => {
  oracle.php.writeFile('/var/www/html/js-rule-oracle.php', `<?php
    require 'functions/bx_rules.php'; require 'functions/ll_rules.php';
    $rows = array();
    foreach (array('bx','ll') as $rules) {
      foreach (array('Cleric','Dwarf','Elf','Fighter','Halfling','Magic-User','Thief') as $class) {
        for ($level=1; $level<=($rules=='bx' ? 14 : 20); $level++) {
          if (($class=='Dwarf' && $level>12) || ($class=='Elf' && $level>10) || ($class=='Halfling' && $level>8)) continue;
          $attack=$rules.'_basic_attacks'; $save=$rules.'_basic_saves';
          $rows[]=array($rules,$class,$level,$attack($class,$level),$save($class,$level));
        }
      }
    }
    echo json_encode($rows);
  `);
  const result = await oracle.server.handle({ path: '/js-rule-oracle.php' });
  assert.equal(oracle.logs().fatal, '');
  const rows = JSON.parse(new TextDecoder().decode(result.bytes));
  assert.ok(rows.length > 150);
  for (const [rules, className, level, attacks, saves] of rows) {
    const c = W.character({ x_lvl1: level, x_lvl2: level, x_maxhp: '1' }, rules, className);
    assert.equal(Array.from(c.attacks).join('_'), Array.isArray(attacks) ? attacks.join('_') : attacks, `${rules} ${className} ${level} attacks`);
    assert.equal(Array.from(c.saves).join('_'), Array.isArray(saves) ? saves.join('_') : saves, `${rules} ${className} ${level} saves`);
  }
});

test('Apocalypse money and paired-container section counts agree with PHP', async () => {
  const p = { x_package: 'Mutant Future', x_level: 3, x_money: 'credits', x_show_c: 1, x_show_ggj: 1, x_show_mi: 0, x_show_rt: 0, x_show_ct: 0, x_show_ei: 0, x_show_th: 0, x_show_en: 0 };
  const php = await phpResult('tool_bmbs.php', p);
  const js = W.routes.items.generate(p);
  const containerPart = php.split('apoc_cont.jpg')[1].split('apoc_money.jpg')[0];
  const moneyPart = php.split('apoc_money.jpg')[1].split('</body>')[0];
  assert.equal(occurrences(containerPart, /<font size="2">\d+<\/font>/g), 40);
  assert.equal(occurrences(moneyPart, /<font size="2">\d+<\/font>/g), 100);
  const reports = W.storage.get('last-apocalypse').reports;
  assert.equal(reports[0].rows.length, 20);
  assert.ok(reports[0].rows.every(row => row.length === 3));
  assert.equal(reports[1].rows.length, 100);
  assert.ok(reports[1].rows.every(row => /credits/.test(row[1])));
  assert.doesNotMatch(js, /Mundane Items|Exceptional Items|undefined|NaN/);
});
test('settlement artwork choices and mutant family appearances follow original controls', () => {
  for (const use_maps of ['0', '1', '2']) {
    W.rng = W.random('post-town-' + use_maps);
    const output = W.routes.mtown.generate({ use_maps, width: 1, height: 1, empty: '0', law: '0', stores: '0' });
    const town = W.storage.get('last-town');
    assert.ok(town.tiles.length > 0);
    const center = town.tiles.find(tile => !tile.spot);
    assert.match(center.image, use_maps === '1' ? /ruin|acity/i : use_maps === '2' ? /villg|village/i : /cit|city/i);
    assert.doesNotMatch(output, /undefined|NaN/);
  }
  const parent = W.citizen({ game: 'mutfut', dose: '1' }, 'post', { race: 'Humanoid Animal' });
  const child = W.citizen({ game: 'mutfut', dose: '1' }, 'post', { race: parent.race, form: parent.form, body: parent.body, age: 'child' });
  assert.equal(child.form, parent.form);
  assert.equal(child.body, parent.body);
  assert.match(child.html, /arms|legs/);
  assert.doesNotMatch(child.html, /MUTATIONS:/);
  for (let i = 0; i < 50; i++) {
    const robot = W.citizen({ game: 'mutfut', might1: 8, might2: 8 }, 'post', { race: 'Robot' });
    assert.ok(robot.stats.HD >= 9 && robot.stats.HD <= 18);
    assert.equal(robot.stats.HP, robot.stats.HD * 8);
    assert.ok(['android', 'synthetic', 'replicant'].includes(robot.form));
  }
});
test('data listings provide every original category and correct nested-list metadata', () => {
  const choices = W.routes.data.fields.find(field => field.name === 'data_lists').options;
  assert.ok(choices.includes('T&T Deluxe Treasure'));
  for (const type of choices) {
    const html = W.routes.data.generate({ data_lists: type, data_amount: 12 });
    const text = W.storage.get('generated-data').text;
    assert.doesNotMatch(html, /undefined|NaN|\[object Object\]/);
    if (/Treasure|Simple/.test(type)) {
      const lists = text.split('--END--');
      assert.equal(lists.length, 3);
      assert.equal(lists[1].trim().split('\n').length, 4);
      assert.equal(lists[2].trim().split('\n').length, 8);
      assert.match(lists[0], /\t1\nItem\t1\t2/);
      if (/^T&T/.test(type)) assert.match(lists[0], /Riches\t5\t1/);
      if (/Post-Apocalyptic|Sci-Fi/.test(type)) assert.match(lists[0], /Money\t20\t1/);
    } else assert.equal(text.split('\n').length, 12);
  }
});
test('post-apocalyptic scavenging makes mutant corpses and game-specific exceptional finds', () => {
  for (const [genre, game] of [['urthe', 'urthe'], ['gammaworld', 'gamma'], ['metalpha', 'meta'], ['wasteland', 'mutfut']]) {
    W.rng = W.random('corpse-' + genre);
    const html = W.routes.scavenge.generate({ genre, game, sets: 0, csets: 2, camount1: 20, camount2: 20, condition: '1' });
    assert.equal(occurrences(html, /class="scavenge-corpse"/g), 2);
    assert.equal(occurrences(html, /condition\)|totally ruined\)/g), 40);
    assert.match(html, /bloody|decayed|rotted|half-eaten|mutilated/);
    assert.doesNotMatch(html, /undefined|NaN|\[object Object\]/);
  }
});

test('all original fantasy room, shelf and furnishing cells render with hiding metadata', () => {
  for (const game of ['lablord', 'osric', 'tt5e', 'ttde', 'ssxs']) {
    for (const shelf of [false, true]) for (let index = 0; index < (shelf ? 174 : 192); index++) {
      const text = W.fantasyMundane({ game }, shelf, index);
      assert.ok(text.length > 0, `${game}/${shelf}/${index}`);
      assert.doesNotMatch(text, /undefined|NaN|\[object Object\]|<\?php|\$\w+/);
    }
    for (const [kind, max] of [['wall', 27], ['near', 31], ['floor', 48], ['ceiling', 22]]) for (let index = 0; index <= max; index++) {
      const item = W.furnishing({ game }, kind, index);
      assert.ok(item.text.length > 0, `${game}/${kind}/${index}`);
      assert.doesNotMatch(item.text, /undefined|NaN/);
      if (item.size) assert.ok(item.place);
      assert.ok(item.size >= 0 && item.size <= 3);
    }
  }
  assert.equal(W.furnishing({}, 'wall', 6).fill, 8);
  assert.equal(W.furnishing({}, 'near', 29).fill, 7);
  assert.equal(W.furnishing({}, 'wall', 7).size, 0);
  assert.equal(W.furnishDetails({ x_furnish: '0' }).text, '');
});

test('adventure treasure can use furniture hiding places and hoards repeat custom finds', async () => {
  const x_data = customFixture.replace('coins\t1\t1', 'Root\t1\t1').replace('10gp\t1\t0', 'Emerald\t1\t0');
  const text = W.loot({ x_data, x_min: 4, x_max: 4 });
  assert.equal(text.split('; ').length, 4);
  assert.equal(W.loot({ x_data, x_min: 10, x_max: 2 }).split('; ').length, 2);
  const original = await phpResult('tool_loot.php', { x_package: 'Data', x_data, x_amount: 2, x_min: 4, x_max: 4 });
  assert.equal(occurrences(original, /Emerald/g), 8);
  const furnishing = W.furnishDetails;
  try {
    W.furnishDetails = () => ({ text: 'There is a chest.', hiding: [{ place: 'inside the chest', size: 2 }] });
    const room = W.adventureRoom({ game: 'lablord', x_c_c: 0, x_t_c: 0, x_l_c: 100, x_l_c_min: 1, x_l_c_max: 1 }, 1, 1);
    assert.equal(room.treasures[0].container, 'Located inside the chest');
    assert.equal(room.treasures[0].size, 2);
  } finally { W.furnishDetails = furnishing; }
});

test('basic attribute modifiers agree with PHP at every ability score and sheet variant', async () => {
  oracle.php.writeFile('/var/www/html/js-attribute-oracle.php', `<?php
    require 'functions/bx_rules.php'; require 'functions/ll_rules.php';
    $rows=array();
    foreach (array('bx','ll') as $rules) foreach (array('Cleric','Magic-User','Fighter') as $class) {
      foreach (array(0,1) as $sheet) for ($score=3; $score<=18; $score++) {
        foreach (array('Strength','Dexterity','Constitution','Intelligence','Wisdom','Charisma') as $type) {
          $fn=$rules.'_basic_stat'; $row=$fn($type,$score,$score,$class,$class,$sheet);
          $rows[]=array($rules,$class,$sheet,$score,$type,$row[1]);
        }
      }
    }
    echo json_encode($rows);
  `);
  const response = await oracle.server.handle({ path: '/js-attribute-oracle.php' });
  assert.equal(oracle.logs().fatal, '');
  const rows = JSON.parse(new TextDecoder().decode(response.bytes));
  const keys = { Strength: 'STR', Dexterity: 'DEX', Constitution: 'CON', Intelligence: 'INT', Wisdom: 'WIS', Charisma: 'CHA' };
  for (const [rules, className, advanced, score, type, expected] of rows) {
    assert.equal(W.basicAttribute(rules, keys[type], score, className, advanced === 1), W.plainText(expected), `${rules}/${className}/${advanced}/${score}/${type}`);
  }
});

test('basic sheets use original local artwork and preserve two pages per adventurer', async () => {
  for (const [route, page, gamePage, prefix] of [['bxadvg', 'tool_bxadvg.php', 'rpg_bdd.php', 'bx'], ['ladvg', 'tool_ladvg.php', 'rpg_lablord.php', 'll']]) {
    const p = { x_output: 'Character Sheets', x_qty_fighter: 1, x_qty_mage: 1, x_lvl1: 3, x_lvl2: 3, x_maxhp: 1, x_name: 1, x_show_sk: 1, x_show_eq: 1, x_show_age: 1, x_sex: 'Any', x_lang_set: 1 };
    const php = await phpResult(page, p, gamePage);
    const js = W.routes[route].generate(p);
    assert.equal(occurrences(js, /class="original-character-sheet"/g), occurrences(php, new RegExp('src="pics_tools/' + prefix + '_char_sheet', 'g')));
    for (const match of js.matchAll(/src="([^"]+)"/g)) assert.ok(existsSync(`${root}/js/${match[1]}`));
    assert.doesNotMatch(js, /undefined|NaN/);
  }
  const advanced = W.routes.ladvg.generate({ x_output: 'Character Sheets', x_qty_thief: 1, x_used_sh: 1, x_lvl1: 1, x_lvl2: 1 });
  assert.match(advanced, /ll_char_sheet_basic_aec.jpg/);
  assert.match(advanced, /Find\/Remove Traps/);
});

test('character spell slots include divine wisdom bonuses and both ranger spell classes', () => {
  assert.deepEqual(Array.from(W.osricSpellSlots('Cleric', 1, 18)[0].slots), [3, 2, 1, 1, 0, 0, 0]);
  assert.deepEqual(Array.from(W.osricSpellSlots('Druid', 14, 12)[0].slots), [6, 6, 6, 6, 5, 4, 3]);
  assert.deepEqual(Array.from(W.osricSpellSlots('Cleric', 24, 12)[0].slots), [9, 9, 9, 9, 9, 8, 3]);
  const ranger = W.character({ x_race: 'Human', x_lvl1: 14, x_lvl2: 14 }, 'osric', 'Ranger');
  assert.deepEqual(Array.from(ranger.spellGroups, group => group.className), ['Druid', 'Magic-User']);
  assert.ok(ranger.spells.some(row => row.className === 'Druid'));
  assert.ok(ranger.spells.some(row => row.className === 'Magic-User'));
  for (const rules of ['bx', 'll']) {
    const thief = W.character({ x_lvl1: 1, x_lvl2: 1 }, rules, 'Thief');
    assert.equal(thief.skills.filter(skill => /%|on 1d6/.test(skill)).length, 7);
    assert.doesNotMatch(thief.skills.join('; '), /\|/);
    assert.match(W.character({ x_lvl1: 3, x_lvl2: 3 }, rules, 'Cleric').skills.join('; '), /Turn undead:.*\[/);
  }
});

test('basic magic tables cover all original percentile outcomes, including charged and scroll items', () => {
  for (const category of ['sword', 'armor', 'weapon', 'potion', 'scroll', 'ring', 'wand', 'misc']) {
    for (let roll = 1; roll <= 100; roll++) {
      const item = W.basicMagic({ game: 'bdd' }, category, roll);
      assert.ok(item.length > 3, `${category}/${roll}`);
      assert.doesNotMatch(item, /undefined|NaN|\$\w+|mt_rand|\[object Object\]/);
    }
  }
  assert.match(W.basicMagic({ game: 'bdd' }, 'sword', 100), /Sword -2 cursed/);
  assert.match(W.basicMagic({ game: 'bdd' }, 'wand', 100), /Wand of Polymorph \{\d+ charges\}/);
  assert.match(W.basicMagic({ game: 'bdd' }, 'scroll', 35), /Spell Scrolls 7 \(.+\)/);
  assert.equal(W.loot({ game: 'bdd', min: 100, max: 100, type: 1 }).split('; ').length, 100);
});

test('science-fiction unusual features use all six original branches and valid room destinations', () => {
  const headings = [/food vending machine/, /teleports/, /plant/, /cloning tube/, /escape pod/, /computer terminal/];
  for (const game of ['mutfut', 'meta', 'urthe', 'gamma']) for (let i = 0; i < 6; i++) {
    const feature = W.postFeature({ game }, 8, i);
    assert.match(feature, headings[i]);
    assert.doesNotMatch(feature, /undefined|NaN/);
    const destination = feature.match(/room #(\d+)/);
    if (destination) assert.ok(+destination[1] >= 1 && +destination[1] <= 8);
  }
});

test('optional encounter hoards preserve PHP treasure sections and local encounter records', async () => {
  W.rng = W.random('encounter-hoards'); // own seed so earlier tests cannot change its draws
  for (const [game, phpGame] of [['lablord', 'Labyrinth Lord'], ['mutfut', 'Mutant Future'], ['tt7e', 'Tunnels & Trolls 7th Edition']]) {
    const monster = W.monsters({ game, level: 3 })[0];
    const options = { game, enemy: monster.id, n: 3, x_loot: '1', x_cut: 100, characters: 4, level: 2, tt_dice: 0 };
    const html = W.routes.encounters.generate(options);
    const record = W.storage.get('last-encounters');
    assert.equal(record.encounters.length, 3);
    assert.equal(occurrences(html, /class="encounter-treasure"/g), 3);
    assert.ok(record.encounters.every(encounter => encounter.treasure.length >= 1 && encounter.treasure.length <= 10));
    const php = await phpResult('tool_encounter.php', { x_package: phpGame, x_enemy: monster.id, x_amount: 3, x_loot: 1, x_cut: 100, x_level: 2, x_characters: 4, x_ttlvl: 1 });
    assert.equal(occurrences(php, /LYING ABOUT IN THE AREA IS|LOCATED IN A/g), 3);
    assert.doesNotMatch(html, /undefined|NaN/);
  }
  assert.equal(occurrences(W.routes.encounters.generate({ game: 'lablord', n: 2, x_loot: '0' }), /class="encounter-treasure"/g), 0);
});

test('settlement race descriptions, clothing and default game themes match their forms', () => {
  for (const [route, expected] of [['mtown', 'mutfut'], ['ttown', 'tt5e'], ['wtown', 'osric'], ['town', 'fantasy'], ['items', 'mutfut']]) {
    assert.equal(W.toolGame(W.routes[route], {}).slug, expected);
    assert.match(W.renderRoute('#/' + route).stylesheet, new RegExp('rpg_' + expected));
  }
  for (const mode of ['generic', 'tt']) {
    for (const race of ['elf', 'minotaur', 'centaur', 'slitheran', 'falcoran', 'human']) for (let i = 0; i < 20; i++) {
      const citizen = W.citizen({ game: 'tt7e', possessions: '0' }, mode, { race, sex: 'Male' });
      assert.doesNotMatch(citizen.html, /plain dress|gilded dress|fancy dress|bonnet/);
      if (['falcoran', 'slitheran', 'minotaur'].includes(race)) assert.doesNotMatch(citizen.html, / hair| is bald/);
      if (['minotaur', 'centaur', 'slitheran'].includes(race)) assert.doesNotMatch(citizen.html, / boots| shoes|sandals/);
    }
  }
});

test('original menu query options survive clean hash route conversion', () => {
  assert.equal(W.link('data_magestykc_run.php?id=mon&lvl=3&ttvs=7'), '#/data_magestykc_run?id=mon&lvl=3&ttvs=7');
  assert.equal(W.link('tool_loot.php?x_type=1', { game: 'lablord' }), '#/loot?x_type=1&game=lablord');
  assert.equal(W.routeFor('data_magestykc_run.php?id=kin&ttvs=5'), 'data_magestykc_run');
  assert.match(W.renderRoute('#/data_magestykc').html, /alternate world of Magestykc/);
});

test('Magestykc kindred and language supplements retain original names, counts and learning rules', async () => {
  for (const ttvs of [5, 7, 9]) {
    const response = await oracle.server.handle({ path: 'data_magestykc_run.php', search: '?id=kin&ttvs=' + ttvs });
    assert.equal(oracle.logs().fatal, '');
    const php = new TextDecoder().decode(response.bytes);
    const rows = W.magestykcKindred({ ttvs });
    const js = W.routes.data_magestykc_run.generate({ id: 'kin', ttvs });
    assert.equal(rows.length, occurrences(php, /<font size="4">/g));
    assert.equal(rows.length, occurrences(js, /class="kindred"/g));
    assert.equal(Object.keys(rows[0].modifiers).length, ttvs === 7 ? 9 : 8);
    assert.doesNotMatch(js, /undefined|NaN/);
  }
  const languages = W.magestykcLanguages();
  assert.equal(languages[0].name, 'Common');
  assert.equal(languages.find(row => row.name === 'Common').skill, 'L1SR');
  assert.equal(languages.find(row => row.name === 'Wizard Speech').skill, 'L18SR');
  assert.ok(languages.every(row => row.count > 0 && /^L\d+SR$/.test(row.skill)));
  assert.match(W.routes.data_magestykc_run.generate({ id: 'lang' }), /1d6 roll determines/);
  assert.ok(languages.length > 40);
  for (const ttvs of [5, 7, 9]) for (const lvl of [9, 1, 2, 3, 4, 5]) {
    const html = W.routes.data_magestykc_run.generate({ id: 'mon', ttvs, lvl });
    assert.equal(occurrences(html, /class="supplement-monster"/g), context.WZ_DATA.monsters_rpgs.filter(row => row.creator === 'TT').length);
    assert.doesNotMatch(html, /undefined|NaN/);
  }
});

test('OSRIC ability modifiers agree with independent PHP across scores, races and exceptional strength', async () => {
  const source = readFileSync(`${root}/src/functions/characters_osric.php`, 'utf8');
  const block = source.split('///// GET ABILITY BONUSES')[1].split('///// WHAT LEVEL ARE THEY')[0];
  oracle.php.writeFile('/var/www/html/js-osric-modifier-oracle.php', `<?php
    error_reporting(0); ini_set('display_errors','0');
    $rows=array();
    foreach (array('Fighter','Magic-User','Cleric','Assassin') as $p_class) foreach (array('Human','Dwarf','Gnome','Halfling','Elf') as $p_race) {
      for ($score=3;$score<=19;$score++) foreach (array(0,1,50,51,75,76,90,91,99) as $p_ab_str_xtra) {
        $p_ab_str=$p_ab_dex=$p_ab_con=$p_ab_int=$p_ab_wis=$p_ab_cha=$score; $p_sufn='They'; $p_sufx='them'; $p_notes='';
        ${block}
        $rows[]=array($p_class,$p_race,$score,$p_ab_str_xtra,$p_bhit+0,$p_bdmg+0,$p_minor_test,$p_major_test,-$x_my_acb,$p_bsrp+0,$p_brng+0,$x_bhps,$p_consv,$p_consh,$b_rcsb,$p_msvt+0);
      }
    }
    echo json_encode($rows);
  `);
  const response = await oracle.server.handle({ path: '/js-osric-modifier-oracle.php' });
  assert.equal(oracle.logs().fatal, '');
  const rows = JSON.parse(new TextDecoder().decode(response.bytes));
  for (const [className, race, score, exceptional, ...expected] of rows) {
    const m = W.osricModifiers({ STR: score, DEX: score, CON: score, INT: score, WIS: score, CHA: score }, className, race, exceptional);
    assert.deepEqual([m.hit, m.damage, m.minor, m.major, m.acAdjustment || 0, m.surprise, m.range, m.hp, m.resurrection + '%', m.systemShock + '%', m.racialSave, m.mentalSave], expected.map((value, i) => i === 4 ? value || 0 : value), `${className}/${race}/${score}/${exceptional}`);
  }
});

test('OSRIC equipment, racial defenses and class abilities flow into officials and character reports', () => {
  for (const className of ['Fighter', 'Cleric', 'Thief', 'Assassin', 'Magic-User', 'Illusionist', 'Druid', 'Paladin', 'Ranger']) {
    const c = W.character({ x_race: 'Human', x_lvl1: 14, x_lvl2: 14, x_maxhp: '1', x_relics: '0' }, 'osric', className);
    assert.ok(c.equipment.split(', ').length >= 7);
    assert.ok(c.ac >= -10 && c.ac <= 10);
    const html = W.renderCharacter(c, { x_show_me: '0' });
    assert.match(html, /Ability Modifiers/);
    assert.doesNotMatch(html, /undefined|NaN/);
    if (className === 'Druid') assert.match(c.armor, /leather/);
    if (className === 'Cleric') assert.doesNotMatch(c.weapon, /sword|axe|spear/);
    if (['Magic-User', 'Illusionist'].includes(className)) assert.equal(c.armor, 'robes');
    if (className === 'Paladin') assert.match(c.skills.join('; '), /heal 28 hit points/);
    if (className === 'Ranger') assert.match(c.skills.join('; '), /\+14 melee damage/);
  }
  const dwarf = W.character({ x_race: 'Dwarf', x_lvl1: 1, x_lvl2: 1 }, 'osric', 'Fighter');
  assert.ok(dwarf.languages.includes('Orc'));
  assert.match(dwarf.skills.join('; '), /magic and poison/);
});

test('random spell choices use original game, class, level and expansion tables', async () => {
  // Correct the duplicate Six-Siders case only in the in-memory PHP oracle,
  // matching the documented JS fix without modifying the original source.
  oracle.php.writeFile('/var/www/html/functions/spells.php', readFileSync(`${root}/src/functions/spells.php`, 'utf8').replace('case 38 : $spell = "Wall of Ice"', 'case 39 : $spell = "Wall of Ice"'));
  oracle.php.writeFile('/var/www/html/js-spell-choice-oracle.php', `<?php
    error_reporting(0); ini_set('display_errors','0'); require 'functions/spells.php';
    $rows=array();
    foreach (array('OSRIC','AD&D','BD&D','BFRPG','Labyrinth Lord','Swords & Wizardry','Swords & Six-Siders') as $game) {
      foreach (array('Cleric','Magic-User') as $class) foreach (array(1,4,7,10,13,16,19) as $level) foreach (array(0,1) as $expanded) {
        $_SESSION['SESSION_ADD_AEC']=$expanded; $_SESSION['SESSION_ADD_UA']=$expanded;
        $rows[]=array($game,$class,$level,$expanded,gameSpellChooser($game,$level,$class));
      }
    }
    echo json_encode($rows);
  `);
  const response = await oracle.server.handle({ path: '/js-spell-choice-oracle.php' });
  assert.equal(oracle.logs().fatal, '');
  const rows = JSON.parse(new TextDecoder().decode(response.bytes));
  for (const [game, className, casterLevel, expanded, text] of rows) {
    const slug = W.game({ game }).slug, match = /^level (\d+) (\w+) spell\.\.\.(.*)$/.exec(text);
    assert.ok(match, text);
    const table = context.WZ_DATA.spellChoices[slug][match[2]][match[1]];
    assert.ok((expanded && table.expanded || table.base).includes(match[3]), text);
    const spell = W.gameSpellRecord({ game: slug, aec: String(expanded), ua: String(expanded) }, casterLevel, className);
    assert.equal(spell.magic, match[2]);
    if (casterLevel < 16 || match[2] !== 'mage') assert.equal(spell.level, +match[1]);
    assert.ok(spell.name.length > 0);
    assert.match(W.gameSpell({ game: slug }, casterLevel, className), /^level \d+ \w+ spell\.\.\./);
  }
});
test('scifim ports Mutant Future robots and mutated animals with persistent PHP loop state', () => {
  for (let seed = 0; seed < 40; seed++) {
    W.rng = W.random('scifim-' + seed);
    const output = W.routes.scifim.generate({ game: 'mutfut', r_amount: 4, m_amount: 4 });
    assert.equal(occurrences(output, /class="scifi-creature scifi-robot"/g), 4);
    assert.equal(occurrences(output, /class="scifi-creature scifi-mutant"/g), 4);
    assert.match(output, /<h2>Robots<\/h2>[\s\S]*<h2>Mutants<\/h2>/);
    assert.match(output, /Value:<\/td><td>\$[\d,]+</);
    assert.match(output, /seem to be (a|an) [a-z ]+ of a [a-z -]+ and a [a-z -]+\./);
    assert.match(output, /THAC0:<\/td><td>\d+</);
    assert.doesNotMatch(output, /undefined|NaN/);
  }
  W.rng = W.random('scifim-none');
  assert.doesNotMatch(W.routes.scifim.generate({ game: 'mutfut', r_amount: 0, m_amount: 0 }), /Robots|Mutants/);
  const rows = context.WZ_DATA.scifim;
  assert.equal(rows.mutants.length, 127);
  assert.equal(rows.guns.map(list => list.length).join(), "10,34,34,43");
});
test('scifim ports the other-game robots with terrain filtering and level tables', () => {
  const slug = 'urthe';
  for (let seed = 0; seed < 40; seed++) {
    W.rng = W.random('scifir-' + seed);
    const output = W.routes.scifim.generate({ game: slug, r_amount: 3, m_amount: 0 });
    assert.equal(occurrences(output, /class="scifi-creature scifi-robot"/g), 3);
    assert.match(output, /Value:<\/td><td>[\d,]+xm</);
    assert.match(output, /Software:<\/td><td>[IVX]+ in \d/);
    assert.match(output, /Salvage:<\/td><td>\d+%</);
    assert.doesNotMatch(output, /undefined|NaN/);
    W.rng = W.random('scifiw-' + seed);
    const water = W.routes.scifim.generate({ game: slug, r_amount: 2, m_amount: 0, x_terrain: 'oceans' });
    assert.doesNotMatch(water, /Anywhere but Water/);
    assert.equal(occurrences(water, /Found In:<\/td><td>(Water|Outdoors) Only</g), 2);
  }
  const rows = context.WZ_DATA.scifim;
  assert.equal(rows.retroWeapons.map(list => list.length).join(), '17,16,15,11');
  assert.equal(rows.retroRobotLevels.length, 20);
});

test('scifim ports the other-game alien creatures with habitats, housing and terrain filtering', () => {
  for (const slug of ['urthe', 'gamma']) for (let seed = 0; seed < 40; seed++) {
    W.rng = W.random('scifia-' + slug + seed);
    const output = W.routes.scifim.generate({ game: slug, r_amount: 0, m_amount: 4 });
    assert.equal(occurrences(output, /class="scifi-creature scifi-alien"/g), 4);
    assert.match(output, /Defenses:<\/td><td>E:-?\d+&nbsp;\/&nbsp;M:/);
    assert.match(output, /is some type of /);
    assert.doesNotMatch(output, /undefined|NaN|not ported/);
    W.rng = W.random('scifiat-' + seed);
    const swamp = W.routes.scifim.generate({ game: slug, r_amount: 0, m_amount: 2, x_terrain: 'swamps & marshes' });
    assert.equal(occurrences(swamp, /Habitat:<\/td><td>Swamps & Marshes</g), 2);
  }
  W.rng = W.random('names');
  const names = W.scifiAlienNames(6);
  assert.equal(names.join(), [...names].sort().join());
});

test('hex crawl stranded robots and vehicles follow tool_hexcrawl.php placement', () => {
  W.random(91);
  const base = { game: 'gamma', x_frob: 100, x_fveh: 100, x_u_c: 0, x_weird: 0 };
  const cave = W.adventureRoom({ ...base, hexCave: true }, 1, 1, true, true).html;
  assert.match(cave, /STRANDED VEHICLE IN THE CAVE/);
  assert.match(W.adventureRoom({ ...base, hexCave: true, hexMappack: 'Spaceship' }, 1, 1, true, true).html, /DERELICT ROBOT IN THE CAVE/);
  assert.match(W.adventureRoom({ ...base, hexMappack: 'Ruined City' }, 1, 1, false, true).html, /STRANDED ROBOT (INSIDE|NEXT TO) THE BUILDING/);
  const ship = W.adventureRoom({ ...base, hexMappack: 'Spaceship', hexNoVehicle: true }, 1, 1, false, true).html;
  assert.doesNotMatch(ship, /STRANDED VEHICLE/);
  assert.match(ship, /DERELICT ROBOT IN THE ROOM/);
});

test('mtown economy passes reprint earlier businesses like tool_mtown.php', () => {
  W.random(17);
  const html = W.town({ game: 'gamma', map_rooms: 500, stores: '1', empty: '0' }, 'post');
  const count = (html.match(/class="town-business"/g) || []).length;
  assert.equal(count, 9 + 18);
  const small = W.town({ game: 'urthe', map_rooms: 50, stores: '1', empty: '0' }, 'post');
  assert.equal((small.match(/class="town-business"/g) || []).length, 11);
});

test('mtown junk shops use ucwords names and no shelf count', () => {
  W.random(5);
  const rows = W.townStock({ game: 'gamma', stock: 100, shelf: '1' }, 'post', 8);
  assert.equal(rows.length, 50);
  assert.ok(rows.every(r => r.qty === '' && !/(^|\s)[a-z]/.test(r.item)));
});

test('wander draws without replacement from the freq_code-weighted pool per pass', () => {
  W.random(3);
  const p = { game: 'labyrinth', terrain: 'DG', level: 1, x_amount: 30 };
  const candidates = W.monsters({ ...p, game: W.monsterGame(p) });
  const pool = candidates.reduce((n, m) => n + Math.max(1, +m.freq_code || 0), 0);
  const seen = [], stats = W.monsterStats;
  W.monsterStats = m => { seen.push(m); return ''; };
  try { W.routes.wander.generate(p); } finally { W.monsterStats = stats; }
  const first = seen.slice(0, Math.min(seen.length, pool));
  for (const m of new Set(first)) assert.ok(first.filter(x => x === m).length <= Math.max(1, +m.freq_code || 0));
  assert.equal(seen.length, 30);
});

test('oadvg character sheets render the tool_oadvg.php OSRIC table sheet', () => {
  W.random(4242);
  const html = W.routes.oadvg.generate({ x_qty_fighter: 2, x_output: 'Character Sheets', x_show_eq: '1', x_name: '1' });
  assert.equal((html.match(/osric-sheet/g) || []).length, 2);
  assert.equal((html.match(/ocsht_26\.jpg/g) || []).length, 2);
  assert.match(html, /ocsht_26\.jpg/);
  assert.match(html, /ocsht_25\.jpg/);
  assert.match(html, /Res: \d+% \/ Sys Shk: \d+%/);
  assert.match(html, /Hench: \d+/);
  assert.match(html, /page-break-after:always/);
  assert.doesNotMatch(html, /undefined|NaN/);
});

test('hex crawl prints the atmosphere.php weather table except underground', () => {
  W.random(77);
  const html = W.routes['hex-crawl'].generate({ game: 'osric', climate: 107, n: 3 });
  const block = html.match(/RANDOM WEATHER \(ROLL ONCE EACH DAY\)[\s\S]*?<\/section>/)[0];
  assert.equal((block.match(/The temperature feels (chilly|cold|frigid|freezing) and the sky /g) || []).length, 20);
  assert.match(block, />1d20</);
  assert.doesNotMatch(block, /drizzle|downpour|thunderstorm|undefined/);
  assert.doesNotMatch(W.routes['hex-crawl'].generate({ game: 'osric', climate: 112, n: 2 }), /RANDOM WEATHER/);
  W.random(5);
  for (let i = 0; i < 300; i++) assert.match(W.weather('desert'), /^The temperature feels (hot|mild|sweltering) and the sky is (sunny|clear|cloudy)\. The air (is breezy|is windy|has gusting winds|is quite calm), with (no precipitation for the day|slight rain falling .+|a sandstorm .+)\.$/);
});
test('hex crawl ground items and underwater encounters follow tool_hexcrawl.php', () => {
  W.random('ground');
  const land = W.routes['hex-crawl'].generate({ game: 'osric', climate: 101, n: 3 });
  assert.match(land, /RANDOM ITEMS FOUND ON THE GROUND/);
  assert.match(land, /RANDOM ITEM I<\/th>/);
  assert.match(land, /RANDOM ENCOUNTERS/);
  assert.doesNotMatch(land, /RANDOM UNDERWATER/);
  const sea = W.routes['hex-crawl'].generate({ game: 'osric', climate: 106, n: 3 });
  assert.match(sea, /RANDOM UNDERWATER ENCOUNTERS/);
  assert.doesNotMatch(sea, /FOUND ON THE GROUND/);
  assert.match(W.routes['hex-crawl'].generate({ game: 'tt5e', climate: 101, n: 2 }), /4d6/);
  assert.equal(W.fantasyGroundItem({ game: 'tt5e' }, 144), 'scroll with smudged writing');
  assert.match(W.fantasyGroundItem({ game: 'osric' }, 184), /\d+% chance/);
  assert.match(W.fantasyGroundItem({ game: 'ssxs' }, 184), /\d in 6 chance/);
  assert.match(W.fantasyGroundItem({ game: 'osric' }, 82), /CONTAINS:/);
  for (let i = 0; i < 206; i++) { const t = W.fantasyGroundItem({ game: 'lablord' }, i); assert.ok(t && !/undefined|NaN|\$/.test(t), i + ': ' + t); }
});
test('furnishings use furnish.php painting, torture, cage and cauldron helpers', () => {
  W.random('furnish-helpers');
  for (let i = 0; i < 30; i++) {
    assert.match(W.furnishing({}, 'wall', 16).text, /^is a ((torn|ruined) )?painting of /);
    assert.match(W.furnishing({}, 'wall', 17).text, /^is a ((torn|ruined) )?tapestry of /);
    assert.match(W.furnishing({}, 'near', 26).text, /^is (a torture rack|an iron maiden|a spiked torture chair|a pillory) made mostly of /);
    const cage = W.furnishing({}, 'near', 27);
    assert.match(cage.text, /^is a (small|medium-short|medium-sized|large) .*cage/);
    assert.equal(cage.place, 'inside the ' + cage.text.slice(3));
    assert.match(W.furnishing({}, 'ceiling', 19).text, /cage.* hanging$/);
    const pot = W.furnishing({}, 'near', 30);
    assert.equal(pot.text, 'is a broken cauldron');
    assert.equal(pot.place, 'inside the cauldron');
  }
});
test('Magestykc monster supplement follows data_magestykc_run.php layout', () => {
  const deluxe = W.routes.data_magestykc_run.generate({ id: 'mon', ttvs: '9', lvl: 4 });
  assert.match(deluxe, /determined for a heroic adventure/);
  assert.match(deluxe, /Lvl: <i>\d+<\/i>/);
  assert.match(deluxe, /Dice: <i>\d+&nbsp;\+&nbsp;\d+<\/i>/);
  assert.match(deluxe, /The areas they dwell are the [^.]+\./);
  assert.match(deluxe, /WIZ:\d+/);
  const five = W.routes.data_magestykc_run.generate({ id: 'mon', ttvs: '5', lvl: 9 });
  assert.match(five, /determined for a simple adventure/);
  assert.doesNotMatch(five, /Lvl: |WIZ:|SPD:/);
  assert.match(five, /page-break/);
});
