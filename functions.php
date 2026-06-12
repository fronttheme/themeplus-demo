<?php
/**
 * ThemePlus Demo — theme bootstrap.
 *
 * This theme is a test harness AND public demo for the ThemePlus framework:
 *  1. Configure ThemePlus (white-label) and register every field type + conditional pattern.
 *  2. Render every option on a tabbed front-page demo (applied UI + raw value/type).
 *  3. Apply options for real (color, typography, preloader, container width…)
 *     to prove the enqueueing / CSS-generation paths end to end.
 *
 * PHP prefix: tpd_   |   CSS/BEM prefix: tpd-   |   Text domain: themeplus-demo
 *
 * @package ThemePlus_Demo
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

define('TPD_VERSION', '1.0.0');
define('TPD_DIR', get_template_directory());
define('TPD_URI', get_template_directory_uri());

/**
 * Theme setup.
 */
function tpd_setup(): void {
  load_theme_textdomain('themeplus-demo', TPD_DIR . '/languages');

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);

  register_nav_menus(
    [
      'primary' => __('Primary Menu', 'themeplus-demo'),
    ]
  );
}

add_action('after_setup_theme', 'tpd_setup');

/**
 * Front-end assets.
 */
function tpd_enqueue_assets(): void {
  wp_enqueue_style(
    'tpd-main',
    TPD_URI . '/assets/css/main.css',
    [],
    TPD_VERSION
  );

  // Tabs only ship on the demo front page.
  if (is_front_page()) {
    wp_enqueue_script(
      'tpd-tabs',
      TPD_URI . '/assets/js/tabs.js',
      [],
      TPD_VERSION,
      true
    );
  }

  /*
   * Borrow the plugin's bundled FontAwesome so icon / social fields
   * render visually in the demo. Loads only when ThemePlus is active;
   * without it, icon names fall back to plain text.
   */
  if (function_exists('themeplus_is_active') && themeplus_is_active()) {
    wp_enqueue_style(
      'tpd-fontawesome',
      plugins_url('assets/fonts/fontawesome/css/all.min.css', 'themeplus/themeplus.php'),
      [],
      function_exists('themeplus_get_version') ? themeplus_get_version() : TPD_VERSION
    );
  }
}

add_action('wp_enqueue_scripts', 'tpd_enqueue_assets');

/*
 * ThemePlus integration: config (white-label) → sections → conditional lab.
 * Each file guards itself with function_exists(), so the theme degrades
 * gracefully when ThemePlus is deactivated.
 */
require_once TPD_DIR . '/inc/themeplus-config.php';
require_once TPD_DIR . '/inc/themeplus-sections.php';
require_once TPD_DIR . '/inc/themeplus-conditionals.php';

/* Template helpers: tpd_option(), dynamic CSS, demo cards, preloader. */
require_once TPD_DIR . '/inc/template-functions.php';
