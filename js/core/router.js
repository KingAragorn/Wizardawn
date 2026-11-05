(function (W) {
  'use strict';
  W.parseHash = function (hash) {
    const [path, query = ''] = String(hash || '#/').replace(/^#\/?/, '').split('?');
    return { route: path.replace(/\/$/, ''), params: Object.fromEntries(new URLSearchParams(query)) };
  };
  W.renderRoute = function (hash) {
    const { route, params } = W.parseHash(hash);
    const tool = W.routes[route] || W.routes[''];
    W.rng = W.random(params.seed ?? Date.now() + ':' + Math.random());
    const result = tool.generate && (params.run === '1' || Object.keys(params).some(k => k !== 'game')) ? tool.generate(params) : '';
    const file = Object.keys(window.WZ_DATA.pages).find(file => W.routeFor(file) === route);
    const game = tool.generate ? W.toolGame(tool, params).slug : 'fantasy';
    const page = window.WZ_DATA.pages[tool.generate ? `rpg_${game}.php` : file];
    const stylesheet = page?.stylesheet || 'portal.css';
    return { html: tool.generate ? W.generatorLayout(tool, params, result) : tool.render(params), title: tool.title, stylesheet };
  };
  W.navigate = function () {
    const result = W.renderRoute(location.hash);
    const app = document.getElementById('app');
    app.innerHTML = result.html;
    app.onclick = event => {
      const save = event.target.closest?.('[data-map-export]');
      if (save) return W.exportMap(document.getElementById(save.dataset.mapExport) || save.previousElementSibling?.previousElementSibling || app.querySelector('.geomorph-map'));
      const link = event.target.closest?.('[data-scroll-site]');
      if (link) {
        event.preventDefault();
        document.getElementById('site-' + link.dataset.scrollSite)?.scrollIntoView({ behavior: 'smooth' });
      }
    };
    document.title = `${result.title.replaceAll('&amp;', '&')} — Wizardawn`;
    document.getElementById('portal-style')?.setAttribute('href', result.stylesheet);
    const form = document.getElementById('generator-form');
    if (form) form.addEventListener('submit', event => {
      event.preventDefault();
      const query = new URLSearchParams(new FormData(form));
      // Explicit zeroes preserve unchecked controls when their default is checked.
      for (const input of form.querySelectorAll('input[type="checkbox"]')) if (!input.checked) query.set(input.name, '0');
      query.set('run', '1');
      if (!query.get('seed')) query.set('seed', String(Math.floor(Math.random() * 0xFFFFFFFF)));
      const hash = `#/${W.parseHash(location.hash).route}?${query}`;
      if (location.hash === hash) W.navigate(); else location.hash = hash;
    });
    document.getElementById('print-results')?.addEventListener('click', () => window.print());
  };
  if (typeof document !== 'undefined') {
    window.addEventListener('hashchange', W.navigate);
    W.navigate();
  }
})(window.WZ);
