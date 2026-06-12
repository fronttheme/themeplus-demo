<?php
/**
 * ThemePlus Demo — Conditional Logic Lab.
 *
 * One dedicated section exercising every documented conditional pattern:
 * single condition, all 10 operators, AND relation, OR relation, and
 * dot-notation targeting of a sub-key inside an array field.
 *
 * Open this section in the panel and flip the "control" fields at the top —
 * every dependent field below should appear/disappear live, no reload.
 *
 * @package ThemePlus_Demo
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

add_action(
  'init',
  function (): void {

    if (!function_exists('themeplus_add_section')) {
      return;
    }

    $td = 'themeplus-demo';

    themeplus_add_section(
      [
        'id'       => 'tpd_conditional_lab',
        'title'    => __('Conditional Lab', $td),
        'icon'     => 'code-branch', // FontAwesome name only — the part after 'fa-solid fa-'.
        'priority' => 100,
        'fields'   => [

          /* ---- Control fields (drive everything below) ---------- */
          [
            'id'      => 'cond_master_toggle',
            'type'    => 'toggle',
            'title'   => __('CONTROL — Master Toggle', $td),
            'default' => true,
          ],
          [
            'id'      => 'cond_mode',
            'type'    => 'button_set',
            'title'   => __('CONTROL — Mode', $td),
            'options' => [
              'simple'   => __('Simple', $td),
              'advanced' => __('Advanced', $td),
              'expert'   => __('Expert', $td),
            ],
            'default' => 'simple',
          ],
          [
            'id'      => 'cond_quantity',
            'type'    => 'slider',
            'title'   => __('CONTROL — Quantity', $td),
            'default' => 5,
            'min'     => 0,
            'max'     => 10,
          ],
          [
            'id'       => 'cond_keywords',
            'type'     => 'text',
            'title'    => __('CONTROL — Keywords', $td),
            'subtitle' => __('Type "dark" to trigger the contains test. Clear it for the empty test.', $td),
            'default'  => '',
          ],

          /* ---- Single condition, == ----------------------------- */
          [
            'id'       => 'cond_dep_equals',
            'type'     => 'info',
            'title'    => __('Visible when Master Toggle == true', $td),
            'desc'     => __('Single condition, equality operator.', $td),
            'required' => ['cond_master_toggle', '==', true],
          ],

          /* ---- != ------------------------------------------------ */
          [
            'id'       => 'cond_dep_not_equals',
            'type'     => 'info',
            'title'    => __('Visible when Mode != expert', $td),
            'required' => ['cond_mode', '!=', 'expert'],
          ],

          /* ---- > / < / >= / <= ----------------------------------- */
          [
            'id'       => 'cond_dep_gt',
            'type'     => 'info',
            'title'    => __('Visible when Quantity > 7', $td),
            'required' => ['cond_quantity', '>', 7],
          ],
          [
            'id'       => 'cond_dep_lt',
            'type'     => 'info',
            'title'    => __('Visible when Quantity < 3', $td),
            'required' => ['cond_quantity', '<', 3],
          ],
          [
            'id'       => 'cond_dep_gte',
            'type'     => 'info',
            'title'    => __('Visible when Quantity >= 5', $td),
            'required' => ['cond_quantity', '>=', 5],
          ],
          [
            'id'       => 'cond_dep_lte',
            'type'     => 'info',
            'title'    => __('Visible when Quantity <= 5', $td),
            'required' => ['cond_quantity', '<=', 5],
          ],

          /* ---- contains / !contains ------------------------------ */
          [
            'id'       => 'cond_dep_contains',
            'type'     => 'info',
            'title'    => __('Visible when Keywords contains "dark"', $td),
            'required' => ['cond_keywords', 'contains', 'dark'],
          ],
          [
            'id'       => 'cond_dep_not_contains',
            'type'     => 'info',
            'title'    => __('Visible when Keywords !contains "light"', $td),
            'required' => ['cond_keywords', '!contains', 'light'],
          ],

          /* ---- empty / !empty ------------------------------------ */
          [
            'id'       => 'cond_dep_empty',
            'type'     => 'info',
            'title'    => __('Visible when Keywords is empty', $td),
            'required' => ['cond_keywords', 'empty'],
          ],
          [
            'id'       => 'cond_dep_not_empty',
            'type'     => 'info',
            'title'    => __('Visible when Keywords has a value', $td),
            'required' => ['cond_keywords', '!empty'],
          ],

          /* ---- Multiple AND -------------------------------------- */
          [
            'id'       => 'cond_dep_and',
            'type'     => 'info',
            'title'    => __('AND: Master Toggle ON + Mode != simple', $td),
            'desc'     => __('All conditions must pass (default relation).', $td),
            'required' => [
              ['cond_master_toggle', '==', true],
              ['cond_mode', '!=', 'simple'],
            ],
          ],

          /* ---- Multiple OR --------------------------------------- */
          [
            'id'       => 'cond_dep_or',
            'type'     => 'info',
            'title'    => __('OR: Mode == advanced OR Quantity > 8', $td),
            'required' => [
              'relation' => 'OR',
              ['cond_mode', '==', 'advanced'],
              ['cond_quantity', '>', 8],
            ],
          ],

          /* ---- Dot-notation sub-key targeting --------------------
           * Targets the 'font-family' sub-key inside the typography
           * array field registered in the Layout section.
           * -------------------------------------------------------- */
          [
            'id'       => 'cond_dep_dot_notation',
            'type'     => 'info',
            'title'    => __('Visible when Body Typography font-family == Inter', $td),
            'desc'     => __('Dot-notation: targets a sub-key of an array field in ANOTHER section.', $td),
            'required' => ['layout_body_typography.font-family', '==', 'Inter'],
          ],
          /* ---- Array of values: == ANY / != ALL (format 4) -------- */
          [
            'id'       => 'cond_dep_in_array',
            'type'     => 'info',
            'title'    => __('Visible when Mode == [simple, expert]', $td),
            'desc'     => __('Array value: matches ANY listed value.', $td),
            'required' => ['cond_mode', '==', ['simple', 'expert']],
          ],
          [
            'id'       => 'cond_dep_not_in_array',
            'type'     => 'info',
            'title'    => __('Visible when Mode != [simple, advanced]', $td),
            'desc'     => __('Array value: matches NONE of the listed values (only expert shows this).', $td),
            'required' => ['cond_mode', '!=', ['simple', 'advanced']],
          ],

          /* ---- Mixed AND + array values (format 5) ----------------- */
          [
            'id'       => 'cond_dep_mixed',
            'type'     => 'info',
            'title'    => __('AND + array: Toggle ON + Mode == [advanced, expert]', $td),
            'required' => [
              ['cond_master_toggle', '==', true],
              ['cond_mode', '==', ['advanced', 'expert']],
            ],
          ],
        ],

      ]
    );
  },
  20 // After the master sections file.
);
