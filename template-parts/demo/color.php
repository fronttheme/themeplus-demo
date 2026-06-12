<?php
/**
 * Demo tab: Color fields (color, gradient_picker).
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

$tpd_primary  = (string)tpd_option('color_primary', '#6f42c1');
$tpd_gradient = (string)tpd_option('color_hero_gradient', '');
?>

<?php tpd_demo_card_open(__('Color Picker — Primary Color', 'themeplus-demo')); ?>
<div class="tpd-swatch">
  <span class="tpd-swatch__chip" style="background: <?php echo esc_attr(sanitize_hex_color($tpd_primary) ?: '#6f42c1'); ?>;"></span>
  <code class="tpd-swatch__code"><?php echo esc_html($tpd_primary); ?></code>
</div>
<p class="tpd-demo-card__note"><?php esc_html_e('Applied site-wide as --tpd-primary: link hovers, active tab, accents — including this card set.', 'themeplus-demo'); ?></p>
<button type="button" class="tpd-primary-sample"><?php esc_html_e('A button painted with your primary color', 'themeplus-demo'); ?></button>
<?php tpd_demo_card_close(['color_primary']); ?>

<?php tpd_demo_card_open(__('Gradient Picker — Hero Gradient', 'themeplus-demo')); ?>
<div class="tpd-gradient-demo" style="background: <?php echo esc_attr($tpd_gradient); ?>;"></div>
<p class="tpd-demo-card__note"><?php esc_html_e('Returns a complete CSS gradient string — the hero at the top of this page uses it directly.', 'themeplus-demo'); ?></p>
<?php tpd_demo_card_close(['color_hero_gradient']); ?>
