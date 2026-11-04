(function (W, D) {
  'use strict';
  W.routes = {};
  W.aliases = { 'index.php': '', 'tool_coins.php': 'coins', 'tool_names.php': 'names', 'tool_brew.php': 'brews', 'tool_alchemist.php': 'alchemist', 'tool_door.php': 'doors', 'tool_bmbs.php': 'items', 'tool_loot.php': 'loot', 'tool_wander.php': 'wander', 'tool_encounter.php': 'encounters', 'tool_llb_spells.php': 'basic-spells', 'tool_osric_spells.php': 'spells', 'tool_ftown.php': 'town', 'tool_hexcrawl.php': 'hex-crawl', 'tool_world.php': 'world', 'tool_dmap.php': 'dungeon-map', 'tool_villg.php': 'settlement-map', 'tool_smap.php': 'sci-fi-map', 'tool_swmp.php': 'sewer-map', 'tool_suburb.php': 'suburb-map', 'tool_acity.php': 'ruined-city-map' };
  W.routeFor = file => W.aliases[file] ?? file.replace(/^(tool_|rpg_|game_|help_)/, (prefix) => ({ 'tool_': '', 'rpg_': 'game/', 'game_': 'rules/', 'help_': 'help/' }[prefix])).replace(/\.php$/, '').replace(/^lic\/lic_(.*)\.(?:html|pdf)$/, 'licence/$1');
  W.link = function (file, params = {}) {
    const path = W.routeFor(file.replaceAll('\\', '/'));
    const query = new URLSearchParams(params).toString();
    return `#/${path}${query ? '?' + query : ''}`;
  };
  W.rewriteLinks = (html, game = '') => html.replace(/href\s*=\s*(["'])(.*?)\1/gi, (whole, quote, href) => {
    const normalized = href.replaceAll('\\', '/').replaceAll('&amp;', '&');
    if (/^(?:https?:|mailto:|data:)/.test(normalized)) return whole;
    if (normalized === '#') return 'href="#/"';
    const [path, query = ''] = normalized.split('?');
    if (path === 'index.php' || path === './index.php') return 'href="#/"';
    if (/^(?:tool_|rpg_|game_|help_|data_).*\.php$|^lic\/lic_.*\.(?:html|pdf)$/.test(path)) {
      const params = Object.fromEntries(new URLSearchParams(query));
      if (game && path.startsWith('tool_') && !params.game) params.game = game;
      return `href="${W.link(path, params)}"`;
    }
    return whole;
  }).replace(/target\s*=\s*["']_blank["']/gi, '');
  const menus = D.menus.slice().sort((a, b) => a.mn_name.localeCompare(b.mn_name));
  W.menu = (title, filter, game = '') => `<section class="side-menu"><h2>${title}</h2>${menus.filter(filter).map(row => {
    const p = game && row.mn_group === 'Generators' ? { game } : {};
    return `<p><a href="${W.link(row.mn_link, p)}">${row.mn_name}</a></p>`;
  }).join('')}</section>`;
  W.layout = function (center, { left, right, credits, game = '' } = {}) {
    left ??= D.portal.left;
    right ??= D.portal.right;
    const parts = { menu_left: left, menu_right: right, menu_center: center, div_credit: credits ?? D.portal.credits };
    return W.rewriteLinks(D.portal.shell.replace(/\{\{(.*?)\}\}/g, (_, key) => parts[key]), game);
  };
  W.generatorLayout = (tool, params, result = '') => W.layout(`<h1>${tool.title}</h1><p>${tool.description}</p>${W.form(tool, params)}${result ? `<section id="results" class="report"><h2>${tool.title}</h2>${result}<button type="button" id="print-results">Print</button></section>` : ''}`, {
    left: W.menu('Generators', r => r.mn_group === 'Generators' && W.routes[W.routeFor(r.mn_link)]?.generate, params.game),
    right: W.menu('Choose A Game', r => r.mn_group === 'Game Choice'),
    game: W.toolGame(tool, params).slug,
    credits: (D.pages['rpg_' + W.toolGame(tool, params).slug + '.php']?.credits || D.portal.credits) + '<p style="text-align:center"><a href="#/licence/ogl">Open Game License v1.0a</a> · <a href="#/licence/osric">OSRIC Open License</a> · <a href="#/licence/ll">Labyrinth Lord</a> · <a href="#/licence/mf">Mutant Future</a> · <a href="#/licence/sw">Swords &amp; Wizardry</a></p>'
  });
  for (const [file, page] of Object.entries(D.pages)) {
    W.routes[W.routeFor(file)] = { title: D.menus.find(row => row.mn_link === file)?.mn_name || ({ 'help_about.php': 'About Wizardawn', 'help_navigate.php': 'Navigating Wizardawn', 'help_print.php': 'Maps & Printing', 'lic/lic_ogl.html': 'Open Game License', 'lic/lic_osric.html': 'OSRIC Open License', 'lic/lic_sw.html': 'Swords & Wizardry License' }[file] || 'Wizardawn'), render: () => W.layout(page.center, { left: page.left, right: page.right, credits: page.credits, game: file.startsWith('rpg_') ? file.slice(4, -4) : '' }) };
  }
  // All original menu/tool entries are tracked even before their implementation lands.
  for (const row of menus.filter(r => r.mn_link.endsWith('.php'))) {
    const route = W.routeFor(row.mn_link);
    W.routes[route] ??= { title: row.mn_name, render: () => W.layout(`<h1>${row.mn_name}</h1><p>This generator is still being ported. See <a href="PORTING.md">the porting checklist</a> for progress.</p>`) };
  }
  W.routes[''] = { title: 'Wizardawn', render: () => W.layout(D.portal.home) };
})(window.WZ, window.WZ_DATA);

(function (W) {
  for (const [key, label] of [['ll', 'Labyrinth Lord Trademark License'], ['mf', 'Mutant Future Trademark License']]) {
    W.routes['licence/' + key] = { title: label, render: () => W.layout(`<h1>${label}</h1><object data="lic/lic_${key}.pdf" type="application/pdf" width="600" height="800"><p><a href="./lic/lic_${key}.pdf">Open the original licence PDF</a>.</p></object>`) };
  }
})(window.WZ);
