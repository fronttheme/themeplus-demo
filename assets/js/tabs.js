/**
 * ThemePlus Demo — front-page scripts.
 * Tabs (sidebar nav), X-ray toggle, dark-mode toggle. Buildless, ES6.
 */

/* ---------- Sidebar tabs ---------- */
(() => {
  'use strict';

  const nav = document.querySelector('[data-tpd-tabs]');
  if (!nav) {
    return;
  }

  const tabs   = [...nav.querySelectorAll('.tpd-tabs__tab')];
  const panels = [...document.querySelectorAll('.tpd-tab-panel')];

  const activate = (id, setHash) => {
    let found = false;

    tabs.forEach((tab) => {
      const active = tab.getAttribute('data-tab') === id;
      tab.classList.toggle('tpd-tabs__tab--active', active);
      tab.setAttribute('aria-selected', active ? 'true' : 'false');
      tab.setAttribute('tabindex', active ? '0' : '-1');
      if (active) {
        found = true;
      }
    });

    panels.forEach((panel) => {
      panel.hidden = panel.getAttribute('data-panel') !== id;
    });

    if (found && setHash && window.history.replaceState) {
      window.history.replaceState(null, '', `#${id}`);
    }

    return found;
  };

  tabs.forEach((tab) => {
    tab.addEventListener('click', () => activate(tab.getAttribute('data-tab'), true));
  });

  // Arrow-key navigation (roving tabindex).
  nav.addEventListener('keydown', (e) => {
    if (e.key !== 'ArrowDown' && e.key !== 'ArrowUp' && e.key !== 'ArrowRight' && e.key !== 'ArrowLeft') {
      return;
    }

    const current = tabs.indexOf(document.activeElement);
    if (current < 0) {
      return;
    }

    e.preventDefault();
    const forward = e.key === 'ArrowDown' || e.key === 'ArrowRight';
    const next    = (current + (forward ? 1 : -1) + tabs.length) % tabs.length;
    tabs[next].focus();
    activate(tabs[next].getAttribute('data-tab'), true);
  });

  // Initial tab: URL hash → first tab fallback.
  const initial = window.location.hash.replace('#', '');
  if (!initial || !activate(initial, false)) {
    activate(tabs[0].getAttribute('data-tab'), false);
  }

  window.addEventListener('hashchange', () => {
    const id = window.location.hash.replace('#', '');
    if (id) {
      activate(id, false);
    }
  });
})();

/* ---------- X-ray: open/close every "Saved value" drawer ---------- */
(() => {
  'use strict';

  const btn = document.querySelector('[data-tpd-xray]');
  if (!btn) {
    return;
  }

  btn.addEventListener('click', () => {
    const open = btn.getAttribute('aria-pressed') !== 'true';

    document.querySelectorAll('[data-tpd-values]').forEach((drawer) => {
      drawer.open = open;
    });

    btn.setAttribute('aria-pressed', open ? 'true' : 'false');
    btn.classList.toggle('tpd-xray--active', open);
    document.body.classList.toggle('tpd-xray-on', open);
  });
})();

/* ---------- Dark mode — mirrors the admin panel's theme switch ---------- */
(() => {
  'use strict';

  const KEY  = 'tpd_theme';
  const btn  = document.querySelector('[data-tpd-theme-toggle]');
  const icon = btn ? btn.querySelector('i') : null;

  const apply = (theme) => {
    document.documentElement.setAttribute('data-tpd-theme', theme);
    if (icon) {
      icon.className = `fa-solid ${theme === 'dark' ? 'fa-sun' : 'fa-moon'}`;
    }
  };

  apply(window.localStorage.getItem(KEY) || 'light');

  if (btn) {
    btn.addEventListener('click', () => {
      const next = document.documentElement.getAttribute('data-tpd-theme') === 'dark' ? 'light' : 'dark';
      window.localStorage.setItem(KEY, next);
      apply(next);
    });
  }
})();