<?php
/**
 * ThemePlus framework configuration (white-label).
 *
 * This is the reference implementation of themeplus_framework_config().
 * The admin menu, browser title and option key belong to the THEME.
 * The panel itself keeps the ThemePlus brand.
 *
 * @package ThemePlus_Demo
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

add_action(
  'after_setup_theme',
  function (): void {

    if (!function_exists('themeplus_framework_config')) {
      return; // ThemePlus not active — theme keeps working without a panel.
    }

    themeplus_framework_config(
      [
        // Identity.
        'display_name'  => __('ThemePlus Demo', 'themeplus-demo'),
        'opt_name'      => 'tpd_options', // Unique DB key — never reuse across themes.

        // Admin menu.
        'menu_slug'     => 'tpd-settings',
        'menu_title'    => __('Demo Settings', 'themeplus-demo'),
        'page_title'    => __('ThemePlus Demo — Theme Options', 'themeplus-demo'),
        'menu_icon'     => 'dashicons-admin-customizer',
        'menu_position' => 61,
        'capability'    => 'edit_theme_options',

        // Features.
        'admin_bar'     => true,
        'show_search'   => true,
        'dev_mode'      => true, // Demo only: shows the Developer Panel in Playground. Leave it out of production themes.

        // i18n — the strings registered by THIS theme use the theme's domain.
        'text_domain'   => 'themeplus-demo',
      ]
    );
  },
  20 // After tpd_setup().
);
