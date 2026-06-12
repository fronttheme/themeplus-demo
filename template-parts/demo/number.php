<?php
/**
 * Demo tab: Number fields (number, spinner, slider).
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

$tpd_cols   = (int)tpd_option('num_posts_per_row', 3);
$tpd_words  = (int)tpd_option('num_excerpt_words', 24);
$tpd_width  = (int)tpd_option('num_container_width', 1140);
$tpd_lipsum = __('Design is intelligence made visible, and every option in this panel exists to make a theme feel intentionally crafted rather than accidentally assembled, from the first pixel of the header to the final line of the footer note.', 'themeplus-demo');
?>

<?php tpd_demo_card_open(__('Number — Posts Per Row', 'themeplus-demo')); ?>
<div class="tpd-cols" style="--tpd-demo-cols: <?php echo esc_attr((string)$tpd_cols); ?>;">
  <?php for ($tpd_i = 1; $tpd_i <= $tpd_cols; $tpd_i++) : ?>
    <div class="tpd-cols__box"><?php echo esc_html((string)$tpd_i); ?></div>
  <?php endfor; ?>
</div>
<p class="tpd-demo-card__note"><?php esc_html_e('Also drives the real blog archive grid.', 'themeplus-demo'); ?></p>
<?php tpd_demo_card_close(['num_posts_per_row']); ?>

<?php tpd_demo_card_open(__('Spinner — Excerpt Length', 'themeplus-demo')); ?>
<p class="tpd-specimen">
  <?php echo esc_html(wp_trim_words($tpd_lipsum, $tpd_words)); ?>
</p>
<p class="tpd-demo-card__note">
  <?php
  printf(
  /* translators: %d: word count. */
      esc_html__('Specimen paragraph trimmed to %d words.', 'themeplus-demo'),
      (int)$tpd_words
  );
  ?>
</p>
<?php tpd_demo_card_close(['num_excerpt_words']); ?>

<?php tpd_demo_card_open(__('Slider — Container Width', 'themeplus-demo')); ?>
<div class="tpd-measure">
  <span class="tpd-measure__bar"></span>
  <span class="tpd-measure__label"><?php echo esc_html($tpd_width . 'px'); ?></span>
</div>
<p class="tpd-demo-card__note"><?php esc_html_e('Applied for real: this whole page is constrained to that width via a CSS custom property.', 'themeplus-demo'); ?></p>
<?php tpd_demo_card_close(['num_container_width']); ?>
