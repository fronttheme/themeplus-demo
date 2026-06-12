<?php
/**
 * Demo tab: Structure & Content (shortcode, date_picker, social_media).
 *
 * The display-only fields (info, section, raw) live in the ADMIN panel by
 * design — they store no value, so this tab notes them rather than faking
 * a frontend rendering for them.
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

$tpd_shortcode = (string)tpd_option('struct_copyright_shortcode', '[tpd_year]');
$tpd_date      = (string)tpd_option('struct_launch_date', '');
$tpd_datetime  = (string)tpd_option('struct_launch_datetime', '');
$tpd_social    = (array)tpd_option('struct_social_links', []);
?>

<?php tpd_demo_card_open(__('Shortcode — Footer Shortcode', 'themeplus-demo')); ?>
<p class="tpd-specimen">
  <code><?php echo esc_html($tpd_shortcode); ?></code>
  <span class="tpd-arrow" aria-hidden="true">&rarr;</span>
  <strong><?php echo do_shortcode(wp_kses_post($tpd_shortcode)); ?></strong>
</p>
<p class="tpd-demo-card__note"><?php esc_html_e('Stored as text, executed with do_shortcode() — also live in the site footer.', 'themeplus-demo'); ?></p>
<?php tpd_demo_card_close(['struct_copyright_shortcode']); ?>

<?php tpd_demo_card_open(__('Date Picker — Launch Date', 'themeplus-demo')); ?>
<p class="tpd-specimen">
  <?php
  echo $tpd_date
      ? esc_html(date_i18n(get_option('date_format'), strtotime($tpd_date)))
      : esc_html__('No date selected.', 'themeplus-demo');
  ?>
</p>
<p class="tpd-demo-card__note"><?php esc_html_e('Raw stored value below; rendered above with the site date format via date_i18n().', 'themeplus-demo'); ?></p>
<?php tpd_demo_card_close(['struct_launch_date']); ?>

<?php tpd_demo_card_open(__('Date Picker — With Time (showTime)', 'themeplus-demo')); ?>
<p class="tpd-specimen">
  <?php
  echo $tpd_datetime
      ? esc_html(date_i18n(get_option('date_format') . ' ' . get_option('time_format'), strtotime($tpd_datetime)))
      : esc_html__('No date selected.', 'themeplus-demo');
  ?>
</p>
<p class="tpd-demo-card__note"><?php esc_html_e('showTime stores full ISO with time — rendered with the site date + time formats.', 'themeplus-demo'); ?></p>
<?php tpd_demo_card_close(['struct_launch_datetime']); ?>

<?php tpd_demo_card_open(__('Social Media — Profiles', 'themeplus-demo')); ?>
<?php if ($tpd_social) : ?>
  <ul class="tpd-social-demo">
    <?php foreach ($tpd_social as $tpd_row) : ?>
      <?php if (empty($tpd_row['url'])) {
        continue;
      } ?>
      <li class="tpd-social-demo__item">
        <a class="tpd-social-demo__link" href="<?php echo esc_url((string)$tpd_row['url']); ?>" target="_blank" rel="noopener">
          <i class="fa-brands fa-<?php echo esc_attr((string)($tpd_row['platform'] ?? 'link')); ?>" aria-hidden="true"></i>
          <span class="tpd-social-demo__name"><?php echo esc_html((string)($tpd_row['platform'] ?? '')); ?></span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
<?php else : ?>
  <p class="tpd-demo-card__note"><?php esc_html_e('No profiles yet — add a few rows in Demo Settings.', 'themeplus-demo'); ?></p>
<?php endif; ?>
<?php tpd_demo_card_close(['struct_social_links']); ?>

<div class="tpd-tab-note">
  <?php esc_html_e('The info, section divider, and raw HTML fields are admin-panel UI by design — they store no values. Open Demo Settings → Structure & Content to see them.', 'themeplus-demo'); ?>
</div>
