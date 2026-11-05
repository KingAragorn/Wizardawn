(function (W) {
  'use strict';
  const games = [
    ['fantasy', 'Fantasy', 36], ['add', 'AD&D', 1], ['bdd', 'BD&D', 2], ['bfrpg', 'BFRPG', 3], ['urthe', 'Broken Urthe', 4], ['gamma', 'Gamma World', 5], ['lablord', 'Labyrinth Lord', 6], ['meta', 'Metamorphosis Alpha', 7], ['millen', 'Millenniums & Mutations', 8], ['mutfut', 'Mutant Future', 9], ['necro', 'Necropalyx', 10], ['osric', 'OSRIC', 11], ['ryft', 'Space Ryft', 12], ['sandw', 'Swords & Wizardry', 13], ['tt5e', 'Tunnels & Trolls 5th Edition', 14], ['tt7e', 'Tunnels & Trolls 7th Edition', 15], ['ttde', 'Tunnels & Trolls Deluxe', 173], ['ssxs', 'Swords & Six-Siders', 165], ['ww', 'Wizardry & Warriors', 147], ['apoc', 'Post-Apocalyptic', 39], ['scifi', 'Sci-Fi', 38], ['horror', 'Horror', 37]
  ];
  games.push(['data', 'Data', 'DATA']);
  W.games = Object.fromEntries(games.map(([slug, name, id]) => [slug, { slug, name, id }]));
  W.game = params => W.games[params.game] || games.map(([slug]) => W.games[slug]).find(g => g.name === (params.x_game || params.x_package || params.game)) || W.games.lablord;
  W.gameField = W.field('game', 'Game', 'select', { value: 'lablord', options: games.map(([slug, name]) => [slug, name]) });
  W.seedField = W.field('seed', 'Seed (optional)', 'text');
  W.countField = (label = 'Amount', value = 1) => W.field('n', label, 'number', { value, min: 1, max: 100 });
  W.count = (p, ...aliases) => W.number(p.n ?? aliases.map(key => p[key]).find(v => v != null), 1);
  W.toolGame = (tool, params) => {
    const field = tool.fields.find(field => field.name === 'game');
    if (!field) return W.games[tool.defaultGame || 'fantasy'];
    return W.game(params.game || params.x_game || params.x_package ? params : { game: field.value || tool.defaultGame || 'lablord' });
  };
  W.register = function (route, title, description, fields, generate) {
    W.routes[route] = { route, title, description, fields: [...fields, W.seedField], generate, defaultGame: route === 'basic-spells' ? 'lablord' : route === 'spells' ? 'osric' : 'fantasy' };
  };
  // Banner images the PHP tools print above their results (src/tool_*.php <img src="pics_tools/...">).
  const PA = ['mutfut', 'urthe', 'gamma', 'meta'];
  W.banners = {
    'tool_loot.php': g => PA.includes(g) ? 'tools_bomb_shelter_treasure_hoards.jpg' : 'tools_loot.jpg',
    'tool_encounter.php': g => PA.includes(g) ? 'tools_encounters_pa.jpg' : 'tools_encounters.jpg',
    'tool_wander.php': g => PA.includes(g) ? 'tools_wander_apoc.jpg' : 'tools_wander.jpg',
    'tool_coins.php': 'tools_coins.jpg', 'tool_books.php': 'tools_random_books.jpg', 'tool_alchemist.php': 'alchemy_shelf.jpg',
    'tool_brew.php': 'alchemy_potions.jpg', 'tool_names.php': 'tools_random_names.jpg', 'tool_llb_spells.php': 'tools_spell_book.jpg',
    'tool_packs.php': 'tools_gear.jpg', 'tool_potions.php': 'tools_potions.jpg', 'tool_tmap.php': 'tools_tmaps.jpg', 'tool_zombies.php': 'tools_zombies.jpg'
  };
  W.bannerFor = function (route, game) {
    const file = Object.keys(W.banners).find(name => W.routeFor?.(name) === route);
    const banner = file && W.banners[file];
    const image = typeof banner === 'function' ? banner(game) : banner;
    return image ? `<p class="tool-banner" align="center"><img border="0" src="pics_tools/${image}" alt=""></p>` : '';
  };
})(window.WZ);
