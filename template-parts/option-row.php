<?php
/**
 * Template part: one kitchen-sink verification row.
 *
 * Expects $args = [ 'key' => string, 'value' => mixed ].
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

$tpd_key   = $args['key'] ?? '';
$tpd_value = $args['value'] ?? null;
$tpd_type  = tpd_type_label($tpd_value);

$tpd_is_array = is_array($tpd_value);
$tpd_modifier = $tpd_is_array ? ' tpd-sink__row--array' : '';

if (is_bool($tpd_value)) {
  $tpd_display = $tpd_value ? 'true' : 'false';
} elseif ($tpd_is_array) {
  $tpd_display = wp_json_encode($tpd_value, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
} else {
  $tpd_display = (string)$tpd_value;
}
?>
<div class="tpd-sink__row<?php echo esc_attr($tpd_modifier); ?>" role="row">
  <code class="tpd-sink__key" role="cell"><?php echo esc_html($tpd_key); ?></code>
  <span class="tpd-sink__type tpd-sink__type--<?php echo esc_attr(strtok($tpd_type, '(')); ?>" role="cell">
		<?php echo esc_html($tpd_type); ?>
	</span>
  <?php if ($tpd_is_array) : ?>
    <pre class="tpd-sink__value" role="cell"><?php echo esc_html((string)$tpd_display); ?></pre>
  <?php else : ?>
    <span class="tpd-sink__value" role="cell"><?php echo esc_html((string)$tpd_display); ?></span>
  <?php endif; ?>
</div>
