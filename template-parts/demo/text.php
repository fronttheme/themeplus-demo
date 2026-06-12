<?php
/**
 * Demo tab: Text fields (text, textarea).
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;
?>

<?php tpd_demo_card_open(__('Text — Hero Tagline', 'themeplus-demo')); ?>
<blockquote class="tpd-specimen tpd-specimen--quote">
  <?php echo esc_html((string)tpd_option('text_site_tagline', '')); ?>
</blockquote>
<p class="tpd-demo-card__note"><?php esc_html_e('Also rendered live in the hero above.', 'themeplus-demo'); ?></p>
<?php tpd_demo_card_close(['text_site_tagline']); ?>

<?php tpd_demo_card_open(__('Textarea — Footer Note', 'themeplus-demo')); ?>
<p class="tpd-specimen">
  <?php echo nl2br(esc_html((string)tpd_option('text_footer_note', ''))); ?>
</p>
<p class="tpd-demo-card__note"><?php esc_html_e('Line breaks preserved — also rendered in the site footer.', 'themeplus-demo'); ?></p>
<?php tpd_demo_card_close(['text_footer_note']); ?>
