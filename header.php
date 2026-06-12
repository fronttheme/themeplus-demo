<?php
/**
 * Header
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

$tpd_logo     = (array)tpd_option('media_logo', []);
$tpd_logo_url = (string)($tpd_logo['url'] ?? '');
$tpd_logo_alt = (string)($tpd_logo['alt'] ?? '');
$tpd_logo_alt = '' !== $tpd_logo_alt ? $tpd_logo_alt : get_bloginfo('name');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>
<body <?php body_class('tpd-body'); ?>>
<?php wp_body_open(); ?>

<header class="tpd-header">
  <div class="tpd-header__inner">
    <a class="tpd-header__brand" href="<?php echo esc_url(home_url('/')); ?>">
      <img
          class="tpd-header__logo"
          src="<?php echo esc_url($tpd_logo_url ?: TPD_URI . '/assets/img/themeplus-logo.svg'); ?>"
          alt="<?php echo esc_attr($tpd_logo_alt); ?>"
      >
      <span class="tpd-header__tagline"><?php esc_html_e('Field Demo', 'themeplus-demo'); ?></span>
    </a>

    <nav class="tpd-header__actions" aria-label="<?php esc_attr_e('Demo links', 'themeplus-demo'); ?>">
      <button type="button" class="tpd-theme-toggle" data-tpd-theme-toggle aria-label="<?php esc_attr_e('Toggle dark mode', 'themeplus-demo'); ?>">
        <i class="fa-solid fa-moon" aria-hidden="true"></i>
      </button>
      <a class="tpd-header__btn tpd-header__btn--primary" href="<?php echo esc_url(admin_url('admin.php?page=tpd-settings')); ?>">
        <i class="fa-solid fa-sliders" aria-hidden="true"></i>
        <?php esc_html_e('Demo Settings', 'themeplus-demo'); ?>
      </a>
      <a class="tpd-header__btn" href="https://www.fronttheme.com/docs/themeplus/" target="_blank" rel="noopener">
        <i class="fa-solid fa-book" aria-hidden="true"></i>
        <?php esc_html_e('Docs', 'themeplus-demo'); ?>
      </a>
      <a class="tpd-header__btn" href="https://github.com/fronttheme/themeplus" target="_blank" rel="noopener">
        <i class="fa-brands fa-github" aria-hidden="true"></i>
        <?php esc_html_e('GitHub', 'themeplus-demo'); ?>
      </a>
    </nav>
  </div>
</header>

<main class="tpd-main">
