# ThemePlus Demo

A demonstration and test-harness WordPress theme for **[ThemePlus](https://github.com/fronttheme/themeplus)** — the React-powered theme options framework by [FrontTheme](https://www.fronttheme.com/).

Every field type ThemePlus ships is registered, configured, and rendered live on the front end. Change an option in the admin panel, save, refresh — and watch the matching demo panel (and often the whole page) change.

## What this theme does

- **Registers all 30 field types** with verified value shapes, sensible defaults, and the config arguments each field supports — making `inc/themeplus-sections.php` a copy-ready reference implementation.
- **Conditional Lab**: a dedicated section exercising every conditional-logic pattern — all 10 operators (`==`, `!=`, `>`, `<`, `>=`, `<=`, `contains`, `!contains`, `empty`, `!empty`), AND/OR relations, array values, and dot-notation sub-key targeting (`body_typography.font-family`). Flip the CONTROL fields and watch 17 dependent fields react live.
- **Admin-mirror demo frontend**: a sidebar of demo panels matching the admin sections 1:1. Each field is rendered as applied UI (colors painted, typography applied, repeater rows listed, gradients drawn) with a collapsible **Saved value** drawer showing the raw value and its PHP type — plus an **X-ray** toggle that opens every drawer at once.
- **White-label reference config**: `themeplus_framework_config()` set up the way a real theme should — the end user never sees the word "ThemePlus".
- **Extension example**: a subsection attached via `themeplus_add_subsection()` from a separate hook — the pattern child themes and plugins use to extend a parent theme's panel.
- **Light/dark theming** matching the ThemePlus admin palette, with a header toggle.

## Requirements

- WordPress 6.8+
- PHP 8.0+
- The [ThemePlus](https://github.com/fronttheme/themeplus) plugin, installed and activated

The theme degrades gracefully when ThemePlus is inactive — every integration point is guarded with `function_exists()` checks (also the pattern your own theme should copy).

## Installation

1. Install and activate the ThemePlus plugin.
2. Download this repository as a ZIP (or clone it into `wp-content/themes/themeplus-demo`).
3. Activate **ThemePlus Demo** under Appearance → Themes.
4. Open **Demo Settings** in the admin menu and hit **Save** once.
5. Visit the site front page and explore the sidebar.

## The experiment loop

1. Pick a section from the demo sidebar — the labels match the admin panel exactly.
2. Change anything in **Demo Settings** and save.
3. Refresh the front page — the matching panel reflects your saved options.

Try uploading a Site Logo (the demo header rebrands itself), changing the Primary Color or Hero Gradient, or dragging the Container Width slider.

## Structure

```
themeplus-demo/
├── functions.php                  # Setup, asset enqueueing
├── front-page.php                 # Demo shell: sidebar nav + panels
├── inc/
│   ├── themeplus-config.php       # White-label framework config
│   ├── themeplus-sections.php     # All 30 field types (reference implementation)
│   ├── themeplus-conditionals.php # Conditional Lab — every operator and format
│   └── template-functions.php     # tpd_option(), dynamic CSS, demo helpers
├── template-parts/demo/           # One panel per section + Welcome + All Values
└── assets/                        # Buildless: plain CSS + vanilla JS
```

No build step, no npm — by design. ThemePlus integration requires zero tooling, and this theme proves it.

## Conventions demonstrated

- Section/subsection `icon` takes the FontAwesome **name only** (`'pen'`); the icon **field** stores the **full class** (`'fa-brands fa-github'`).
- `select_image` options are an array of `value` / `label` / `image` rows; `select`, `radio`, `button_set`, and `checkbox` take a `'key' => 'Label'` map.
- Prefixes: `tpd_` (PHP), `tpd-` (CSS/BEM), text domain `themeplus-demo`.

## Links

- ThemePlus plugin: [github.com/fronttheme/themeplus](https://github.com/fronttheme/themeplus)
- Documentation: [fronttheme.com/docs/themeplus](https://www.fronttheme.com/docs/themeplus/)
- FrontTheme: [fronttheme.com](https://www.fronttheme.com/)

## License

GPL-2.0-or-later. See [LICENSE](LICENSE).
