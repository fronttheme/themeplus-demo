<?php
/**
 * Demo tab: Layout & Typography (typography, dimensions, spacing, border).
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

$tpd_typo    = (array)tpd_option('layout_body_typography', []);
$tpd_dims    = (array)tpd_option('layout_logo_dimensions', []);
$tpd_spacing = (array)tpd_option('layout_section_spacing', []);
$tpd_border  = (array)tpd_option('layout_card_border', []);

$tpd_dim_unit = (string)($tpd_dims['unit'] ?? 'px');
$tpd_sp_unit  = (string)($tpd_spacing['unit'] ?? 'px');
?>

<?php tpd_demo_card_open(__('Typography — Body', 'themeplus-demo')); ?>
<p class="tpd-specimen tpd-specimen--type">
  <?php esc_html_e('The quick brown fox jumps over the lazy dog — 0123456789. This paragraph (and the whole page) is set in your chosen family, size, and weight.', 'themeplus-demo'); ?>
</p>
<p class="tpd-demo-card__note">
  <?php
  printf(
      '%s · %s · %s',
      esc_html((string)($tpd_typo['font-family'] ?? '—')),
      esc_html((string)($tpd_typo['font-size'] ?? '—') . 'px'),
      esc_html((string)($tpd_typo['font-weight'] ?? '—'))
  );
  ?>
</p>
<?php tpd_demo_card_close(['layout_body_typography']); ?>

<?php tpd_demo_card_open(__('Dimensions — Logo Box', 'themeplus-demo')); ?>
<div
    class="tpd-dim-demo"
    style="width: <?php echo esc_attr((string)($tpd_dims['width'] ?? 160) . $tpd_dim_unit); ?>; height: <?php echo esc_attr((string)($tpd_dims['height'] ?? 48) . $tpd_dim_unit); ?>;"
>
  <?php echo esc_html(($tpd_dims['width'] ?? 160) . ' × ' . ($tpd_dims['height'] ?? 48) . ' ' . $tpd_dim_unit); ?>
</div>
<?php tpd_demo_card_close(['layout_logo_dimensions']); ?>

<?php tpd_demo_card_open(__('Spacing — Section Padding', 'themeplus-demo')); ?>
<div
    class="tpd-spacing-demo"
    style="padding: <?php echo esc_attr(sprintf('%1$s%5$s %2$s%5$s %3$s%5$s %4$s%5$s', $tpd_spacing['top'] ?? 0, $tpd_spacing['right'] ?? 0, $tpd_spacing['bottom'] ?? 0, $tpd_spacing['left'] ?? 0, $tpd_sp_unit)); ?>;"
>
  <div class="tpd-spacing-demo__inner">
    <?php
    printf(
        'T %1$s · R %2$s · B %3$s · L %4$s (%5$s)',
        esc_html((string)($tpd_spacing['top'] ?? 0)),
        esc_html((string)($tpd_spacing['right'] ?? 0)),
        esc_html((string)($tpd_spacing['bottom'] ?? 0)),
        esc_html((string)($tpd_spacing['left'] ?? 0)),
        esc_html($tpd_sp_unit)
    );
    ?>
  </div>
</div>
<?php tpd_demo_card_close(['layout_section_spacing']); ?>

<?php tpd_demo_card_open(__('Border — Card', 'themeplus-demo')); ?>
<div
    class="tpd-border-demo"
    style="border: <?php echo esc_attr(sprintf('%1$spx %2$s %3$s', $tpd_border['width'] ?? 1, $tpd_border['style'] ?? 'solid', $tpd_border['color'] ?? '#e2e4e9')); ?>; border-radius: <?php echo esc_attr((string)($tpd_border['radius'] ?? 8) . 'px'); ?>;"
>
  <?php
  printf(
      '%1$spx %2$s · radius %3$spx',
      esc_html((string)($tpd_border['width'] ?? 1)),
      esc_html((string)($tpd_border['style'] ?? 'solid')),
      esc_html((string)($tpd_border['radius'] ?? 8))
  );
  ?>
</div>
<?php tpd_demo_card_close(['layout_card_border']); ?>
