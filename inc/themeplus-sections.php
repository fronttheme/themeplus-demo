<?php
/**
 * ThemePlus Demo — master field registry.
 *
 * Registers EVERY ThemePlus field type at least once, organized into the
 * same categories as the admin panel. This file is the living test suite
 * AND the reference implementation users copy from.
 *
 * Conventions demonstrated here (verified against the field components):
 * - Section/subsection 'icon'  => FontAwesome NAME only ('pen').
 * - Icon FIELD default         => FULL FontAwesome class ('fa-brands fa-github').
 * - select_image 'options'     => array of rows: value / label / image.
 * - select, radio, button_set, checkbox 'options' => 'key' => 'Label' map.
 * - social_media value         => array of rows: platform / url.
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

    /* -----------------------------------------------------------------
     * 1. TEXT — Text, Textarea
     * -------------------------------------------------------------- */
    themeplus_add_section(
      [
        'id'       => 'tpd_text',
        'title'    => __('Text Fields', $td),
        'icon'     => 'pen', // FontAwesome name only — the part after 'fa-solid fa-'.
        'priority' => 10,
        'fields'   => [
          [
            'id'          => 'text_site_tagline',
            'type'        => 'text',
            'title'       => __('Hero Tagline', $td),
            'subtitle'    => __('Plain text — returns string. Rendered in the Welcome panel.', $td),
            'default'     => __('Options, verified end to end.', $td),
            'placeholder' => __('Enter a tagline…', $td),
          ],
          [
            'id'       => 'text_footer_note',
            'type'     => 'textarea',
            'title'    => __('Footer Note', $td),
            'subtitle' => __('Multi-line text — returns string with line breaks.', $td),
            'default'  => __("Built with ThemePlus.\nSecond line to verify newline handling.", $td),
            'rows'     => 3,
          ],
        ],
      ]
    );

    /* -----------------------------------------------------------------
     * 2. NUMBER — Number, Spinner (alias), Slider
     * -------------------------------------------------------------- */
    themeplus_add_section(
      [
        'id'       => 'tpd_number',
        'title'    => __('Number Fields', $td),
        'icon'     => 'hashtag',
        'priority' => 20,
        'fields'   => [
          [
            'id'      => 'num_posts_per_row',
            'type'    => 'number',
            'title'   => __('Posts Per Row', $td),
            'default' => 3,
            'min'     => 1,
            'max'     => 6,
          ],
          [
            'id'      => 'num_excerpt_words',
            'type'    => 'spinner', // Alias of number — kept to test the alias.
            'title'   => __('Excerpt Length', $td),
            'default' => 24,
            'min'     => 5,
            'max'     => 100,
            'step'    => 1,
            'unit'    => 'words',
          ],
          [
            'id'          => 'num_container_width',
            'type'        => 'slider',
            'title'       => __('Container Width', $td),
            'default'     => 1140,
            'min'         => 760,
            'max'         => 1600,
            'step'        => 10,
            'unit'        => 'px',
            'showTooltip' => true,
          ],
        ],
      ]
    );

    /* -----------------------------------------------------------------
     * 3. CHOICE — Select, Button Set, Radio, Checkbox, Select Image
     * -------------------------------------------------------------- */
    themeplus_add_section(
      [
        'id'       => 'tpd_choice',
        'title'    => __('Choice Fields', $td),
        'icon'     => 'list-check',
        'priority' => 30,
        'fields'   => [
          [
            'id'      => 'choice_header_style',
            'type'    => 'select',
            'title'   => __('Header Style', $td),
            'options' => [
              'classic'  => __('Classic', $td),
              'centered' => __('Centered', $td),
              'minimal'  => __('Minimal', $td),
            ],
            'default' => 'classic',
          ],
          [
            'id'      => 'choice_sidebar_position',
            'type'    => 'button_set',
            'title'   => __('Sidebar Position', $td),
            'options' => [
              'left'  => __('Left', $td),
              'none'  => __('None', $td),
              'right' => __('Right', $td),
            ],
            'default' => 'right',
          ],
          [
            'id'      => 'choice_archive_layout',
            'type'    => 'radio',
            'title'   => __('Archive Layout', $td),
            'options' => [
              'grid' => __('Grid', $td),
              'list' => __('List', $td),
            ],
            'default' => 'grid',
            'layout'  => 'horizontal',
          ],
          [
            'id'       => 'choice_post_meta',
            'type'     => 'checkbox',
            'title'    => __('Post Meta Items', $td),
            'subtitle' => __('Multi-check — returns an array of checked keys.', $td),
            'options'  => [
              'date'     => __('Date', $td),
              'author'   => __('Author', $td),
              'category' => __('Category', $td),
              'comments' => __('Comments', $td),
            ],
            'default'  => ['date', 'author'],
            'layout'   => 'horizontal',
            'compact'  => true,
          ],
          [
            'id'      => 'choice_blog_template',
            'type'    => 'select_image',
            'title'   => __('Blog Template', $td),
            'default' => 'cards',
            'options' => [
              [
                'value' => 'cards',
                'label' => __('Cards', $td),
                'image' => esc_url(TPD_URI . '/assets/img/tpl-cards.svg'),
              ],
              [
                'value' => 'masonry',
                'label' => __('Masonry', $td),
                'image' => esc_url(TPD_URI . '/assets/img/tpl-masonry.svg'),
              ],
              [
                'value' => 'rows',
                'label' => __('Rows', $td),
                'image' => esc_url(TPD_URI . '/assets/img/tpl-rows.svg'),
              ],
            ],
          ],
        ],
      ]
    );

    /* -----------------------------------------------------------------
     * 4. TOGGLE — Toggle, Switch (alias)
     * -------------------------------------------------------------- */
    themeplus_add_section(
      [
        'id'       => 'tpd_toggle',
        'title'    => __('Toggle Fields', $td),
        'icon'     => 'toggle-on',
        'priority' => 40,
        'fields'   => [
          [
            'id'       => 'toggle_preloader',
            'type'     => 'toggle',
            'title'    => __('Enable Preloader', $td),
            'subtitle' => __('Rendered for real on the front end — and drives the Conditional Lab.', $td),
            'default'  => true,
          ],
          [
            'id'      => 'toggle_back_to_top',
            'type'    => 'switch', // Alias of toggle — kept to test the alias.
            'title'   => __('Back-to-Top Button', $td),
            'default' => false,
            'on'      => __('Visible', $td),
            'off'     => __('Hidden', $td),
          ],
        ],
      ]
    );

    /* -----------------------------------------------------------------
     * 5. COLOR — Color Picker, Gradient Picker
     * -------------------------------------------------------------- */
    themeplus_add_section(
      [
        'id'       => 'tpd_color',
        'title'    => __('Color Fields', $td),
        'icon'     => 'palette',
        'priority' => 50,
        'fields'   => [
          [
            'id'       => 'color_primary',
            'type'     => 'color',
            'title'    => __('Primary Color', $td),
            'subtitle' => __('Applied live as --tpd-primary on the front end.', $td),
            'default'  => '#7F27FF', // ThemePlus brand purple.
          ],
          [
            'id'       => 'color_hero_gradient',
            'type'     => 'gradient_picker',
            'title'    => __('Hero Gradient', $td),
            'subtitle' => __('Returns a complete CSS linear-gradient() string.', $td),
            'default'  => 'linear-gradient(135deg, #7F27FF 0%, #17a2b8 100%)', // Brand gradient.
          ],
        ],
      ]
    );

    /* -----------------------------------------------------------------
     * 6. MEDIA — Image, Gallery, Icon, Background
     * -------------------------------------------------------------- */
    themeplus_add_section(
      [
        'id'       => 'tpd_media',
        'title'    => __('Media Fields', $td),
        'icon'     => 'image',
        'priority' => 60,
        'fields'   => [
          [
            'id'       => 'media_logo',
            'type'     => 'image',
            'title'    => __('Site Logo', $td),
            'subtitle' => __('Returns a structured array: id, url, width, height, alt, title. Replaces the demo header logo.', $td),
          ],
          [
            'id'       => 'media_showcase_gallery',
            'type'     => 'gallery',
            'title'    => __('Showcase Gallery', $td),
            'subtitle' => __('Returns an array of rows: id, url, alt.', $td),
          ],
          [
            'id'       => 'media_brand_icon',
            'type'     => 'icon',
            'title'    => __('Brand Icon', $td),
            'subtitle' => __('Stores the full FontAwesome class. Pick via the icon modal.', $td),
            'default'  => 'fa-brands fa-github',
          ],
          [
            'id'       => 'media_page_background',
            'type'     => 'background',
            'title'    => __('Page Background', $td),
            'subtitle' => __('All three modes enabled: color, image, gradient.', $td),
            'color'    => true,
            'image'    => true,
            'gradient' => true,
            'default'  => [
              'mode'       => 'color',
              'color'      => '#f6f7f9',
              'image'      => '',
              'position'   => 'center center',
              'size'       => 'cover',
              'repeat'     => 'no-repeat',
              'attachment' => 'scroll',
              'gradient'   => '',
            ],
          ],
        ],
      ]
    );

    /* -----------------------------------------------------------------
     * 7. LAYOUT — Typography (ALL controls on), Dimensions, Spacing, Border
     * -------------------------------------------------------------- */
    themeplus_add_section(
      [
        'id'       => 'tpd_layout',
        'title'    => __('Layout & Typography', $td),
        'icon'     => 'ruler-combined',
        'priority' => 70,
        'fields'   => [
          [
            'id'             => 'layout_body_typography',
            'type'           => 'typography',
            'title'          => __('Body Typography', $td),
            'subtitle'       => __('Every control enabled. Google/Standard/Custom font tabs; font enqueued on the front end.', $td),
            // Control toggles — only font-family and subsets are on by default.
            'font-size'      => true,
            'font-weight'    => true,
            'font-style'     => true,
            'line-height'    => true,
            'letter-spacing' => true,
            'text-transform' => true,
            'subsets'        => true,
            'default'        => [
              'font-family'    => 'Inter',
              'font-size'      => '16',
              'font-weight'    => '400',
              'font-style'     => 'normal',
              'line-height'    => '1.6',
              'letter-spacing' => '0',
              'text-transform' => 'none',
              'subsets'        => ['latin'],
            ],
          ],
          [
            'id'      => 'layout_logo_dimensions',
            'type'    => 'dimensions',
            'title'   => __('Logo Dimensions', $td),
            'default' => [
              'width'  => 160,
              'height' => 48,
              'unit'   => 'px',
            ],
          ],
          [
            'id'      => 'layout_section_spacing',
            'type'    => 'spacing',
            'title'   => __('Section Spacing', $td),
            'default' => [
              'top'    => 64,
              'right'  => 0,
              'bottom' => 64,
              'left'   => 0,
              'unit'   => 'px',
            ],
          ],
          [
            'id'      => 'layout_card_border',
            'type'    => 'border',
            'title'   => __('Card Border', $td),
            'default' => [
              'width'  => 1,
              'style'  => 'solid',
              'color'  => '#e2e4e9',
              'radius' => 8,
            ],
          ],
        ],
      ]
    );

    /* -----------------------------------------------------------------
     * 8. STRUCTURE & CONTENT — demonstrates inline SUBSECTIONS, plus
     *    Info, Section, Shortcode, Raw, Date Picker, Social Media
     * -------------------------------------------------------------- */
    themeplus_add_section(
      [
        'id'          => 'tpd_structure',
        'title'       => __('Structure & Content', $td),
        'icon'        => 'layer-group',
        'priority'    => 80,
        'fields'      => [],
        'subsections' => [
          [
            'id'     => 'tpd_structure_ui',
            'title'  => __('UI Structure', $td),
            'icon'   => 'object-group',
            'fields' => [
              [
                'id'    => 'struct_info_notice',
                'type'  => 'info',
                'title' => __('Heads up', $td),
                'desc'  => __('Info fields render content but store no value — verify they are absent from saved options.', $td),
                'style' => 'info',
              ],
              [
                'id'    => 'struct_divider_general',
                'type'  => 'section',
                'title' => __('General Settings Below', $td),
              ],
              [
                'id'      => 'struct_copyright_shortcode',
                'type'    => 'shortcode',
                'title'   => __('Footer Shortcode', $td),
                'default' => '[tpd_year]',
              ],
              [
                'id'      => 'struct_raw_html',
                'type'    => 'raw',
                'title'   => __('Raw Output', $td),
                'content' => '<p><strong>Raw HTML</strong> rendered inside the panel.</p>',
              ],
            ],
          ],
          [
            'id'     => 'tpd_structure_content',
            'title'  => __('Dates & Social', $td),
            'icon'   => 'calendar-days',
            'fields' => [
              [
                'id'       => 'struct_launch_date',
                'type'     => 'date_picker',
                'title'    => __('Launch Date', $td),
                'subtitle' => __('Stores Y-m-d.', $td),
                'default'  => '2026-06-01',
              ],
              [
                'id'       => 'struct_launch_datetime',
                'type'     => 'date_picker',
                'title'    => __('Launch Date & Time', $td),
                'subtitle' => __('showTime enabled — stores full ISO with time.', $td),
                'showTime' => true,
                'is12Hour' => true,
                'default'  => '2026-06-01T09:00:00',
              ],
              [
                'id'       => 'struct_social_links',
                'type'     => 'social_media',
                'title'    => __('Social Profiles', $td),
                'subtitle' => __('Array of rows: platform, url.', $td),
                'max'      => 10,
                'default'  => [
                  ['platform' => 'github', 'url' => 'https://github.com/fronttheme'],
                  ['platform' => 'dribbble', 'url' => 'https://dribbble.com/FrontTheme'],
                ],
              ],
            ],
          ],
        ],
      ]
    );

    /* -----------------------------------------------------------------
     * 9. ADVANCED — Code Editor, Repeater, Link, Group
     * -------------------------------------------------------------- */
    themeplus_add_section(
      [
        'id'       => 'tpd_advanced',
        'title'    => __('Advanced Fields', $td),
        'icon'     => 'code',
        'priority' => 90,
        'fields'   => [
          [
            'id'      => 'adv_custom_css',
            'type'    => 'code_editor',
            'title'   => __('Custom CSS', $td),
            'mode'    => 'css',
            'height'  => 220,
            'default' => "/* Printed into wp_head by the demo theme. */\n.tpd-demo-card { letter-spacing: 0.005em; }",
          ],
          [
            'id'           => 'adv_feature_list',
            'type'         => 'repeater',
            'title'        => __('Feature List', $td),
            'subtitle'     => __('Array of rows, each keyed by sub-field id. Rendered on the Advanced demo panel.', $td),
            'min'          => 0,
            'max'          => 8,
            'button_label' => __('Add Feature', $td),
            'fields'       => [
              [
                'id'    => 'feature_title',
                'type'  => 'text',
                'title' => __('Feature Title', $td),
              ],
              [
                'id'      => 'feature_icon',
                'type'    => 'icon',
                'title'   => __('Feature Icon', $td),
                'default' => 'fa-solid fa-circle-check',
              ],
              [
                'id'      => 'feature_enabled',
                'type'    => 'toggle',
                'title'   => __('Enabled', $td),
                'default' => true,
              ],
            ],
          ],
          [
            'id'      => 'adv_cta_link',
            'type'    => 'link',
            'title'   => __('CTA Link', $td),
            'default' => [
              'url'    => 'https://www.fronttheme.com/',
              'text'   => 'FrontTheme',
              'target' => '_blank',
              'rel'    => '',
            ],
          ],
          [
            'id'     => 'adv_seo_group',
            'type'   => 'group',
            'title'  => __('SEO Group', $td),
            'fields' => [
              [
                'id'    => 'seo_title',
                'type'  => 'text',
                'title' => __('Meta Title', $td),
              ],
              [
                'id'    => 'seo_description',
                'type'  => 'textarea',
                'title' => __('Meta Description', $td),
                'rows'  => 2,
              ],
              [
                'id'      => 'seo_noindex',
                'type'    => 'toggle',
                'title'   => __('Discourage Indexing', $td),
                'default' => false,
              ],
            ],
          ],
        ],
      ]
    );
  }
);

/*
 * Demonstrate themeplus_add_subsection(): attach a subsection to an
 * ALREADY-registered section from a separate hook — the pattern child
 * themes and extension plugins use to extend a parent theme's panel.
 */
add_action(
  'init',
  function (): void {

    if (!function_exists('themeplus_add_subsection')) {
      return;
    }

    $td = 'themeplus-demo';

    themeplus_add_subsection(
      'tpd_structure',
      [
        'id'     => 'tpd_structure_extended',
        'title'  => __('Extended (via API)', $td),
        'icon'   => 'puzzle-piece',
        'fields' => [
          [
            'id'    => 'struct_ext_note',
            'type'  => 'info',
            'title' => __('Added by themeplus_add_subsection()', $td),
            'desc'  => __('This subsection was attached from a separate init hook — the extension pattern for child themes and plugins.', $td),
            'style' => 'success',
          ],
          [
            'id'          => 'struct_ext_badge',
            'type'        => 'text',
            'title'       => __('Extension Badge Text', $td),
            'default'     => __('Extended!', $td),
            'placeholder' => __('Badge text…', $td),
          ],
        ],
      ]
    );
  },
  20 // After the section exists.
);
