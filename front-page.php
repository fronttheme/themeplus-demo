<?php
/**
 * Front page
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

get_header();

$tpd_nav = [
    'welcome'     => [__('Welcome', 'themeplus-demo'), 'fa-hand-sparkles'],
    'text'        => [__('Text Fields', 'themeplus-demo'), 'fa-pen'],
    'number'      => [__('Number Fields', 'themeplus-demo'), 'fa-hashtag'],
    'choice'      => [__('Choice Fields', 'themeplus-demo'), 'fa-list-check'],
    'toggle'      => [__('Toggle Fields', 'themeplus-demo'), 'fa-toggle-on'],
    'color'       => [__('Color Fields', 'themeplus-demo'), 'fa-palette'],
    'media'       => [__('Media Fields', 'themeplus-demo'), 'fa-image'],
    'layout'      => [__('Layout & Typography', 'themeplus-demo'), 'fa-ruler-combined'],
    'structure'   => [__('Structure & Content', 'themeplus-demo'), 'fa-layer-group'],
    'advanced'    => [__('Advanced Fields', 'themeplus-demo'), 'fa-code'],
    'conditional' => [__('Conditional Lab', 'themeplus-demo'), 'fa-code-branch'],
    'all-values'  => [__('All Values', 'themeplus-demo'), 'fa-table-list'],
];
?>

  <div class="tpd-demo">

    <aside class="tpd-demo__sidebar">
      <nav class="tpd-nav tpd-tabs" data-tpd-tabs role="tablist" aria-label="<?php esc_attr_e('Field type demos', 'themeplus-demo'); ?>" aria-orientation="vertical">
        <?php foreach ($tpd_nav as $tpd_id => $tpd_item) : ?>
          <button
              type="button"
              class="tpd-nav__item tpd-tabs__tab"
              data-tab="<?php echo esc_attr($tpd_id); ?>"
              id="tab-<?php echo esc_attr($tpd_id); ?>"
              role="tab"
              aria-selected="false"
              aria-controls="panel-<?php echo esc_attr($tpd_id); ?>"
              tabindex="-1"
          >
            <i class="fa-solid <?php echo esc_attr($tpd_item[1]); ?> tpd-nav__icon" aria-hidden="true"></i>
            <span class="tpd-nav__label"><?php echo esc_html($tpd_item[0]); ?></span>
          </button>
        <?php endforeach; ?>
      </nav>
    </aside>

    <div class="tpd-demo__main">

      <div class="tpd-demo__toolbar">
        <p class="tpd-demo__loop">
          <i class="fa-solid fa-rotate" aria-hidden="true"></i>
          <?php
          printf(
          /* translators: %s: link to the admin options page. */
              wp_kses_post(__('Edit in <a href="%s">Demo Settings</a> &rarr; Save &rarr; refresh this page.', 'themeplus-demo')),
              esc_url(admin_url('admin.php?page=tpd-settings'))
          );
          ?>
        </p>
        <button type="button" class="tpd-xray" data-tpd-xray aria-pressed="false">
          <i class="fa-solid fa-magnifying-glass-chart" aria-hidden="true"></i>
          <span><?php esc_html_e('X-ray: show all values', 'themeplus-demo'); ?></span>
        </button>
      </div>

      <?php foreach (array_keys($tpd_nav) as $tpd_id) : ?>
        <section
            class="tpd-tab-panel"
            data-panel="<?php echo esc_attr($tpd_id); ?>"
            id="panel-<?php echo esc_attr($tpd_id); ?>"
            role="tabpanel"
            aria-labelledby="tab-<?php echo esc_attr($tpd_id); ?>"
            hidden
        >
          <?php get_template_part('template-parts/demo/' . $tpd_id); ?>
        </section>
      <?php endforeach; ?>

    </div>

  </div>

<?php
get_footer();
