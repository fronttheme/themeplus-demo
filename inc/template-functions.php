<?php
/**
 * ThemePlus Demo — template helpers.
 *
 * The "prove it works for real" layer: a safe option accessor, dynamic CSS
 * custom properties generated from saved options, the user's Custom CSS
 * field printed to wp_head, and the preloader driven by its toggle.
 *
 * @package ThemePlus_Demo
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

/**
 * Safe wrapper around themeplus_get_option().
 *
 * Lets every template call tpd_option() without worrying whether the
 * plugin is active. This is the pattern theme buyers should copy.
 *
 * @param string $key Option key. Empty string returns all options.
 * @param mixed $default Fallback when the plugin is inactive or key unset.
 * @return mixed
 */
function tpd_option(string $key = '', mixed $default = null): mixed {
  if (!function_exists('themeplus_get_option')) {
    return '' === $key ? [] : $default;
  }

  return '' === $key
      ? (array)themeplus_get_option()
      : themeplus_get_option($key, $default);
}

/**
 * All saved options, for the kitchen sink.
 *
 * @return array<string, mixed>
 */
function tpd_all_options(): array {
  return tpd_option('');
}

/**
 * Dynamic CSS custom properties from saved options.
 *
 * Verifies the option → CSS pipeline: primary color, container width,
 * typography (family/size/weight), spacing, and border all become
 * --tpd-* custom properties consumed by assets/css/main.css.
 */
function tpd_dynamic_css(): void {
  $primary   = (string)tpd_option('color_primary', '#6f42c1');
  $container = (int)tpd_option('num_container_width', 1140);
  $typo      = (array)tpd_option('layout_body_typography', []);
  $spacing   = (array)tpd_option('layout_section_spacing', []);
  $border    = (array)tpd_option('layout_card_border', []);

  $font_family = $typo['font-family'] ?? 'Inter';
  $font_size   = (int)($typo['font-size'] ?? 16);
  $font_weight = (int)($typo['font-weight'] ?? 400);

  $space_unit   = $spacing['unit'] ?? 'px';
  $space_top    = (int)($spacing['top'] ?? 64);
  $space_bottom = (int)($spacing['bottom'] ?? 64);

  $border_width = (int)($border['width'] ?? 1);
  $border_style = $border['style'] ?? 'solid';
  $border_color = $border['color'] ?? '#e2e4e9';

  $css = sprintf(
      ':root{--tpd-primary:%1$s;--tpd-container:%2$dpx;--tpd-font-family:"%3$s",system-ui,sans-serif;--tpd-font-size:%4$dpx;--tpd-font-weight:%5$d;--tpd-space-top:%6$d%8$s;--tpd-space-bottom:%7$d%8$s;--tpd-card-border:%9$dpx %10$s %11$s;}',
      sanitize_hex_color($primary) ?: '#6f42c1',
      $container,
      esc_attr((string)$font_family),
      $font_size,
      $font_weight,
      $space_top,
      $space_bottom,
      esc_attr((string)$space_unit),
      $border_width,
      esc_attr((string)$border_style),
      sanitize_hex_color((string)$border_color) ?: '#e2e4e9'
  );

  wp_add_inline_style('tpd-main', $css);
}

add_action('wp_enqueue_scripts', 'tpd_dynamic_css', 20);

/**
 * Print the Custom CSS code_editor field into wp_head.
 *
 * Verifies the code_editor field's round trip from panel to front end.
 */
function tpd_custom_css(): void {
  $css = (string)tpd_option('adv_custom_css', '');

  if ('' === trim($css)) {
    return;
  }

  printf(
      "<style id=\"tpd-custom-css\">\n%s\n</style>\n",
      wp_strip_all_tags($css) // phpcs:ignore WordPress.Security.EscapeOutput
  );
}

add_action('wp_head', 'tpd_custom_css', 99);

/**
 * Preloader — rendered only when its toggle is on.
 *
 * Verifies toggle → frontend behavior. The tiny inline script removes it
 * on window load; no JS file needed for a harness this small.
 */
function tpd_preloader(): void {
  if (!tpd_option('toggle_preloader', false)) {
    return;
  }
  ?>
  <div class="tpd-preloader" aria-hidden="true">
    <span class="tpd-preloader__spinner"></span>
  </div>
  <script>
    window.addEventListener('load', function () {
      const el = document.querySelector('.tpd-preloader');
      if (el) {
        el.classList.add('tpd-preloader--done');
        setTimeout(function () {
          el.remove();
        }, 400);
      }
    });
  </script>
  <?php
}

add_action('wp_body_open', 'tpd_preloader');

/**
 * Demo shortcode used by the shortcode field default ([tpd_year]).
 */
add_shortcode(
    'tpd_year',
    static fn(): string => gmdate('Y')
);

/**
 * Human-readable type label for the kitchen sink.
 *
 * @param mixed $value Any option value.
 */
function tpd_type_label(mixed $value): string {
  return match (gettype($value)) {
    'boolean' => 'bool',
    'integer' => 'int',
    'double' => 'float',
    'string' => 'string',
    'array' => 'array(' . count((array)$value) . ')',
    'NULL' => 'null',
    default => gettype($value),
  };
}

/**
 * Render one verification row (key / type badge / raw value) for an option.
 * Thin wrapper around the option-row template part, for use inside demo cards.
 *
 * @param string $key Option key.
 */
function tpd_value_row(string $key): void {
  get_template_part(
      'template-parts/option-row',
      null,
      [
          'key'   => $key,
          'value' => tpd_option($key),
      ]
  );
}

/**
 * Render a FontAwesome icon from a ThemePlus ICON FIELD value.
 *
 * Icon fields store the FULL FontAwesome class ('fa-brands fa-github') —
 * unlike section icons, which take the short name only. The class string
 * is sanitized to a safe character allowlist before output.
 *
 * @param string $class Full FontAwesome class, e.g. 'fa-solid fa-star'.
 */
function tpd_icon(string $class): void {
  $class = trim(preg_replace('/[^a-z0-9 \-]/i', '', $class) ?? '');

  if ('' === $class) {
    return;
  }

  printf('<i class="%s" aria-hidden="true"></i>', esc_attr($class));
}

/**
 * Open a demo card: title + applied-layer wrapper.
 *
 * @param string $title Card title (already translated).
 */
function tpd_demo_card_open(string $title): void {
  printf(
      '<article class="tpd-demo-card"><h3 class="tpd-demo-card__title">%s</h3><div class="tpd-demo-card__applied">',
      esc_html($title)
  );
}

/**
 * Close a demo card, printing the value rows for the given option keys.
 *
 * @param string[] $keys Option keys to show in the value layer.
 */
function tpd_demo_card_close(array $keys = []): void {
  echo '</div>';

  if ($keys) {
    printf(
        '<details class="tpd-demo-card__values" data-tpd-values><summary class="tpd-demo-card__values-toggle">%s</summary><div class="tpd-demo-card__values-rows">',
        esc_html__('Saved value', 'themeplus-demo')
    );
    foreach ($keys as $tpd_demo_key) {
      tpd_value_row($tpd_demo_key);
    }
    echo '</div></details>';
  }

  echo '</article>';
}
