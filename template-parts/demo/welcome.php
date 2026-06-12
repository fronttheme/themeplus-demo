<?php
/**
 * Demo panel: Welcome — the front door.
 *
 * Promotional hero (option-driven: gradient, tagline, CTA, brand
 * icon) plus orientation: what this site is and how to experiment.
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

$tpd_gradient = (string)tpd_option('color_hero_gradient', 'linear-gradient(135deg, #6f42c1 0%, #2271b1 100%)');
$tpd_cta      = (array)tpd_option('adv_cta_link', []);
$tpd_brand    = (string)tpd_option('media_brand_icon', '');
?>

<div class="tpd-welcome">

  <div class="tpd-welcome__hero" style="background: <?php echo esc_attr($tpd_gradient); ?>;">
    <?php if ($tpd_brand) : ?>
      <span class="tpd-welcome__icon"><?php tpd_icon($tpd_brand); ?></span>
    <?php endif; ?>

    <h1 class="tpd-welcome__title">
      <?php echo esc_html((string)tpd_option('text_site_tagline', __('Options, verified end to end.', 'themeplus-demo'))); ?>
    </h1>

    <p class="tpd-welcome__sub">
      <?php esc_html_e('Every pixel of this page is driven by ThemePlus options — including this gradient, that headline, and the icon above it.', 'themeplus-demo'); ?>
    </p>

    <?php if (!empty($tpd_cta['url'])) : ?>
      <a
          class="tpd-welcome__cta"
          href="<?php echo esc_url((string)$tpd_cta['url']); ?>"
          <?php echo ('_blank' === ($tpd_cta['target'] ?? '')) ? 'target="_blank" rel="noopener"' : ''; ?>
      >
        <?php echo esc_html((string)($tpd_cta['text'] ?? __('Learn more', 'themeplus-demo'))); ?>
      </a>
    <?php endif; ?>
  </div>

  <div class="tpd-welcome__steps">
    <div class="tpd-welcome__step">
      <span class="tpd-welcome__step-num">1</span>
      <p><?php esc_html_e('Pick a section from the sidebar — the labels match the admin panel exactly.', 'themeplus-demo'); ?></p>
    </div>
    <div class="tpd-welcome__step">
      <span class="tpd-welcome__step-num">2</span>
      <p>
        <?php
        printf(
        /* translators: %s: admin URL. */
            wp_kses_post(__('Change anything in <a href="%s">Demo Settings</a> and hit Save.', 'themeplus-demo')),
            esc_url(admin_url('admin.php?page=tpd-settings'))
        );
        ?>
      </p>
    </div>
    <div class="tpd-welcome__step">
      <span class="tpd-welcome__step-num">3</span>
      <p><?php esc_html_e('Refresh this page — watch the matching panel (and often the whole page) change.', 'themeplus-demo'); ?></p>
    </div>
  </div>

  <p class="tpd-welcome__hint">
    <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
    <?php esc_html_e('Start with the sidebar — every field type ThemePlus ships is rendered live in there.', 'themeplus-demo'); ?>
  </p>

</div>
