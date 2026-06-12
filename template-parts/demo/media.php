<?php
/**
 * Demo tab: Media fields (image, gallery, icon, background).
 *
 * NOTE on value shapes: image/gallery rendering below handles both a plain
 * URL/ID and a structured array — adjust once the documented return shape
 * is final, then simplify to the canonical branch only.
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

/*
 * Confirmed value shapes (from ImageField/GalleryField components):
 * image   => { id, url, width, height, alt, title }  ({} when removed)
 * gallery => [ { id, url, alt }, ... ]
 */
$tpd_logo_value = (array)tpd_option('media_logo', []);
$tpd_logo       = (string)($tpd_logo_value['url'] ?? '');
$tpd_gallery    = (array)tpd_option('media_showcase_gallery', []);
$tpd_brand      = (string)tpd_option('media_brand_icon', 'star');
$tpd_bg         = (array)tpd_option('media_page_background', []);

/* Build the background CSS from the structured value, honoring its mode. */
$tpd_bg_mode = (string)($tpd_bg['mode'] ?? 'color');
if ('gradient' === $tpd_bg_mode && !empty($tpd_bg['gradient'])) {
  $tpd_bg_css = 'background: ' . $tpd_bg['gradient'] . ';';
} elseif ('image' === $tpd_bg_mode && !empty($tpd_bg['image'])) {
  $tpd_bg_css = sprintf(
      'background-color: %1$s; background-image: url(%2$s); background-position: %3$s; background-size: %4$s; background-repeat: %5$s; background-attachment: %6$s;',
      $tpd_bg['color'] ?? 'transparent',
      is_array($tpd_bg['image']) ? ($tpd_bg['image']['url'] ?? '') : (string)$tpd_bg['image'],
      $tpd_bg['position'] ?? 'center center',
      $tpd_bg['size'] ?? 'cover',
      $tpd_bg['repeat'] ?? 'no-repeat',
      $tpd_bg['attachment'] ?? 'scroll'
  );
} else {
  $tpd_bg_css = 'background: ' . ($tpd_bg['color'] ?? '#f6f7f9') . ';';
}
?>

<?php tpd_demo_card_open(__('Image — Site Logo', 'themeplus-demo')); ?>
<?php if ($tpd_logo) : ?>
  <img class="tpd-logo-demo" src="<?php echo esc_url($tpd_logo); ?>" alt="<?php echo esc_attr((string)($tpd_logo_value['alt'] ?? '') ?: __('Site logo', 'themeplus-demo')); ?>">
<?php else : ?>
  <p class="tpd-demo-card__note"><?php esc_html_e('No logo selected yet — pick one in Demo Settings → Media Fields.', 'themeplus-demo'); ?></p>
<?php endif; ?>
<?php tpd_demo_card_close(['media_logo']); ?>

<?php tpd_demo_card_open(__('Gallery — Showcase', 'themeplus-demo')); ?>
<?php if ($tpd_gallery) : ?>
  <div class="tpd-gallery-demo">
    <?php foreach ($tpd_gallery as $tpd_item) : ?>
      <?php $tpd_item_url = (string)($tpd_item['url'] ?? '');
      $tpd_item_alt       = (string)($tpd_item['alt'] ?? ''); ?>
      <?php if ($tpd_item_url) : ?>
        <img class="tpd-gallery-demo__img" src="<?php echo esc_url($tpd_item_url); ?>" alt="<?php echo esc_attr($tpd_item_alt); ?>" loading="lazy">
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
<?php else : ?>
  <p class="tpd-demo-card__note"><?php esc_html_e('Empty gallery — add a few images to see the grid.', 'themeplus-demo'); ?></p>
<?php endif; ?>
<?php tpd_demo_card_close(['media_showcase_gallery']); ?>

<?php tpd_demo_card_open(__('Icon — Brand Icon', 'themeplus-demo')); ?>
<span class="tpd-icon-demo"><?php tpd_icon($tpd_brand); ?></span>
<code class="tpd-swatch__code"><?php echo esc_html($tpd_brand); ?></code>
<?php tpd_demo_card_close(['media_brand_icon']); ?>

<?php tpd_demo_card_open(__('Background — Page Background', 'themeplus-demo')); ?>
<div class="tpd-bg-demo" style="<?php echo esc_attr($tpd_bg_css); ?>">
  <span class="tpd-chip"><?php echo esc_html($tpd_bg_mode); ?></span>
</div>
<p class="tpd-demo-card__note"><?php esc_html_e('Panel painted from the structured value — switch the mode between color, image, and gradient.', 'themeplus-demo'); ?></p>
<?php tpd_demo_card_close(['media_page_background']); ?>
