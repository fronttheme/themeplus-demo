<?php
/**
 * Demo tab: Toggle fields (toggle, switch).
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

$tpd_preloader = (bool)tpd_option('toggle_preloader', false);
$tpd_top       = (bool)tpd_option('toggle_back_to_top', false);
?>

<?php tpd_demo_card_open(__('Toggle — Preloader', 'themeplus-demo')); ?>
<span class="tpd-chip <?php echo $tpd_preloader ? 'tpd-chip--on' : 'tpd-chip--off'; ?>">
		<?php echo $tpd_preloader ? esc_html__('ON', 'themeplus-demo') : esc_html__('OFF', 'themeplus-demo'); ?>
	</span>
<p class="tpd-demo-card__note">
  <?php
  echo $tpd_preloader
      ? esc_html__('You saw it: the spinner that covered this page while it loaded.', 'themeplus-demo')
      : esc_html__('Turn it on in Demo Settings, save, refresh — the page loads behind a spinner.', 'themeplus-demo');
  ?>
</p>
<?php tpd_demo_card_close(['toggle_preloader']); ?>

<?php tpd_demo_card_open(__('Switch — Back-to-Top Button', 'themeplus-demo')); ?>
<span class="tpd-chip <?php echo $tpd_top ? 'tpd-chip--on' : 'tpd-chip--off'; ?>">
		<?php echo $tpd_top ? esc_html__('ON', 'themeplus-demo') : esc_html__('OFF', 'themeplus-demo'); ?>
	</span>
<p class="tpd-demo-card__note">
  <?php
  echo $tpd_top
      ? esc_html__('A real button is fixed at the bottom-right corner of this page right now.', 'themeplus-demo')
      : esc_html__('When enabled, a real button appears fixed at the bottom-right of every page.', 'themeplus-demo');
  ?>
</p>
<?php tpd_demo_card_close(['toggle_back_to_top']); ?>

<?php if ($tpd_top) : ?>
  <a class="tpd-backtotop" href="#" aria-label="<?php esc_attr_e('Back to top', 'themeplus-demo'); ?>">&uarr;</a>
<?php endif; ?>
