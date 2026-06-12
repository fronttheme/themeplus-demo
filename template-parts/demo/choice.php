<?php
/**
 * Demo tab: Choice fields (select, button_set, radio, checkbox, select_image).
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

$tpd_header_style = (string)tpd_option('choice_header_style', 'classic');
$tpd_sidebar      = (string)tpd_option('choice_sidebar_position', 'right');
$tpd_layout       = (string)tpd_option('choice_archive_layout', 'grid');
$tpd_meta         = (array)tpd_option('choice_post_meta', []);
$tpd_template     = (string)tpd_option('choice_blog_template', 'cards');
?>

<?php tpd_demo_card_open(__('Select — Header Style', 'themeplus-demo')); ?>
<span class="tpd-chip tpd-chip--accent"><?php echo esc_html($tpd_header_style); ?></span>
<?php tpd_demo_card_close(['choice_header_style']); ?>

<?php tpd_demo_card_open(__('Button Set — Sidebar Position', 'themeplus-demo')); ?>
<div class="tpd-sidebar-demo tpd-sidebar-demo--<?php echo esc_attr($tpd_sidebar); ?>">
  <?php if ('left' === $tpd_sidebar) : ?>
    <span class="tpd-sidebar-demo__aside"><?php esc_html_e('Sidebar', 'themeplus-demo'); ?></span>
  <?php endif; ?>
  <span class="tpd-sidebar-demo__main"><?php esc_html_e('Content', 'themeplus-demo'); ?></span>
  <?php if ('right' === $tpd_sidebar) : ?>
    <span class="tpd-sidebar-demo__aside"><?php esc_html_e('Sidebar', 'themeplus-demo'); ?></span>
  <?php endif; ?>
</div>
<?php tpd_demo_card_close(['choice_sidebar_position']); ?>

<?php tpd_demo_card_open(__('Radio — Archive Layout', 'themeplus-demo')); ?>
<span class="tpd-chip"><?php echo esc_html($tpd_layout); ?></span>
<p class="tpd-demo-card__note">
  <a href="<?php echo esc_url(get_post_type_archive_link('post') ?: home_url('/?p=0')); ?>">
    <?php esc_html_e('See it applied on the real blog archive →', 'themeplus-demo'); ?>
  </a>
</p>
<?php tpd_demo_card_close(['choice_archive_layout']); ?>

<?php tpd_demo_card_open(__('Checkbox — Post Meta Items', 'themeplus-demo')); ?>
<ul class="tpd-meta-demo">
  <?php foreach (['date', 'author', 'category', 'comments'] as $tpd_item) : ?>
    <li class="tpd-meta-demo__item <?php echo in_array($tpd_item, $tpd_meta, true) ? 'tpd-meta-demo__item--on' : 'tpd-meta-demo__item--off'; ?>">
      <?php echo esc_html($tpd_item); ?>
    </li>
  <?php endforeach; ?>
</ul>
<p class="tpd-demo-card__note"><?php esc_html_e('Returns an array — checked items render on blog cards.', 'themeplus-demo'); ?></p>
<?php tpd_demo_card_close(['choice_post_meta']); ?>

<?php tpd_demo_card_open(__('Select Image — Blog Template', 'themeplus-demo')); ?>
<figure class="tpd-template-demo">
  <img
      class="tpd-template-demo__img"
      src="<?php echo esc_url(TPD_URI . '/assets/img/tpl-' . sanitize_key($tpd_template) . '.svg'); ?>"
      alt="<?php echo esc_attr($tpd_template); ?>"
      loading="lazy"
  >
  <figcaption class="tpd-template-demo__caption"><?php echo esc_html($tpd_template); ?></figcaption>
</figure>
<?php tpd_demo_card_close(['choice_blog_template']); ?>
