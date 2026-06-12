<?php
/**
 * Demo tab: All Values — the full verification table.
 *
 * Every saved option with its key, PHP type badge, and raw value.
 * This is the regression instrument: after save / reset / import,
 * each field's documented return shape is verifiable at a glance.
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

$tpd_options = tpd_all_options();
?>

<header class="tpd-sink__header">
  <h2 class="tpd-sink__heading"><?php esc_html_e('Saved Options — Value & Type Verification', 'themeplus-demo'); ?></h2>
  <p class="tpd-sink__count">
    <?php
    printf(
    /* translators: %d: number of saved options. */
        esc_html__('%d options in the database', 'themeplus-demo'),
        count($tpd_options)
    );
    ?>
  </p>
</header>

<?php if (empty($tpd_options)) : ?>

  <p class="tpd-sink__empty">
    <?php esc_html_e('No options saved yet. Open Demo Settings in wp-admin, hit Save, then reload this page.', 'themeplus-demo'); ?>
  </p>

<?php else : ?>

  <div class="tpd-sink__table" role="table">
    <div class="tpd-sink__row tpd-sink__row--head" role="row">
      <span role="columnheader"><?php esc_html_e('Option Key', 'themeplus-demo'); ?></span>
      <span role="columnheader"><?php esc_html_e('Type', 'themeplus-demo'); ?></span>
      <span role="columnheader"><?php esc_html_e('Value', 'themeplus-demo'); ?></span>
    </div>

    <?php
    ksort($tpd_options);

    foreach ($tpd_options as $tpd_key => $tpd_value) {
      get_template_part(
          'template-parts/option-row',
          null,
          [
              'key'   => (string)$tpd_key,
              'value' => $tpd_value,
          ]
      );
    }
    ?>
  </div>

<?php endif; ?>
