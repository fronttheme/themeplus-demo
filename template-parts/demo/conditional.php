<?php
/**
 * Demo tab: Conditional Lab.
 *
 * Conditional logic is evaluated live in the React admin — fields appear
 * and disappear as you flip the CONTROL fields. The frontend can only show
 * the stored control values, so this tab does exactly that and points the
 * visitor at the panel where the magic actually happens.
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

$tpd_controls = [
    'cond_master_toggle' => __('Master Toggle', 'themeplus-demo'),
    'cond_mode'          => __('Mode', 'themeplus-demo'),
    'cond_quantity'      => __('Quantity', 'themeplus-demo'),
    'cond_keywords'      => __('Keywords', 'themeplus-demo'),
];
?>

<?php tpd_demo_card_open(__('Current CONTROL values', 'themeplus-demo')); ?>
<dl class="tpd-group-demo">
  <?php foreach ($tpd_controls as $tpd_key => $tpd_label) : ?>
    <?php $tpd_val = tpd_option($tpd_key); ?>
    <dt><?php echo esc_html($tpd_label); ?></dt>
    <dd>
      <code>
        <?php
        if (is_bool($tpd_val)) {
          echo $tpd_val ? 'true' : 'false';
        } else {
          echo esc_html('' === (string)$tpd_val ? '""' : (string)$tpd_val);
        }
        ?>
      </code>
    </dd>
  <?php endforeach; ?>
</dl>
<?php tpd_demo_card_close(array_keys($tpd_controls)); ?>

<div class="tpd-tab-note">
  <?php
  if (is_user_logged_in() && current_user_can('edit_theme_options')) {
    printf(
    /* translators: %s: admin URL of the options panel. */
        wp_kses_post(__('The show/hide magic is live in the admin: open <a href="%s">Demo Settings → Conditional Lab</a> and flip the CONTROL fields — 17 dependent fields appear and disappear instantly, covering all 10 operators, AND/OR relations, array values, and dot-notation sub-key targeting.', 'themeplus-demo')),
        esc_url(admin_url('admin.php?page=tpd-settings'))
    );
  } else {
    esc_html_e('The show/hide magic is live in the admin Conditional Lab — 17 dependent fields react instantly to the CONTROL fields, covering all 10 operators, AND/OR relations, array values, and dot-notation targeting.', 'themeplus-demo');
  }
  ?>
</div>
