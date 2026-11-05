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
    let html = tool.generate ? W.generatorLayout(tool, params, result) : tool.render(params);
    // Every generator with results gets a Save as PDF button and the print.css page layout.
    const pdf = Boolean(result && tool.generate);
    if (pdf) html = html.replace('<button type="button" id="print-results">Print</button>', '$&<button type="button" id="save-pdf">Save as PDF</button>');
    return { html, title: tool.title, stylesheet, pdf: pdf ? { route, now: params.pdf === '1', name: tool.title + (params.seed ? ' ' + params.seed : '') } : null };
  };
  W.pdfMode = function (pdf, on) {
    if (typeof document === 'undefined') return;
    const body = document.body;
    if (!body || !body.classList) return;
    body.classList.remove(...[...body.classList].filter(name => name.startsWith('pdf-') || name === 'pdf-mode'));
    if (pdf && on) body.classList.add('pdf-mode', 'pdf-' + pdf.route);
    // Absolutely positioned geomorph maps are scaled to fill a letter page (7.4in x 9.6in at 96px/in).
    for (const map of document.querySelectorAll('#results .geomorph-map')) {
      const width = parseFloat(map.style.width) || map.offsetWidth, height = parseFloat(map.style.height) || map.offsetHeight;
      map.style.zoom = pdf && on && width && height ? String(Math.min(700 / width, 880 / height)) : '';
    }
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
    // Changing the game redraws the form, since some options only exist for some games.
    form?.querySelector?.('select[name="game"]')?.addEventListener('change', () => {
      const query = new URLSearchParams(new FormData(form));
      for (const input of form.querySelectorAll('input[type="checkbox"]')) if (!input.checked) query.set(input.name, '0');
      location.hash = `#/${W.parseHash(location.hash).route}?${query}`;
    });
    document.getElementById('print-results')?.addEventListener('click', () => window.print());
    // Save as PDF uses the browser's own print-to-PDF; the document title becomes the suggested file name.
    W.pdfMode(result.pdf, result.pdf?.now);
    document.getElementById('save-pdf')?.addEventListener('click', () => {
      const title = document.title;
      W.pdfMode(result.pdf, true);
      document.title = result.pdf.name.replace(/[^\w &-]+/g, '');
      window.addEventListener('afterprint', () => { document.title = title; W.pdfMode(result.pdf, result.pdf.now); }, { once: true });
      window.print();
    });
  };
  if (typeof document !== 'undefined') {
    window.addEventListener('hashchange', W.navigate);
    W.navigate();
  }
})(window.WZ);
