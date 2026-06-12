<?php
/**
 * Demo tab: Advanced fields (code_editor, repeater, link, group).
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

$tpd_css      = (string)tpd_option('adv_custom_css', '');
$tpd_features = (array)tpd_option('adv_feature_list', []);
$tpd_link     = (array)tpd_option('adv_cta_link', []);
$tpd_seo      = (array)tpd_option('adv_seo_group', []);
?>

<?php tpd_demo_card_open(__('Code Editor — Custom CSS', 'themeplus-demo')); ?>
<?php if (trim($tpd_css)) : ?>
  <pre class="tpd-code-demo"><code><?php echo esc_html($tpd_css); ?></code></pre>
  <p class="tpd-demo-card__note"><?php esc_html_e('Printed into wp_head right now — it is styling this very page.', 'themeplus-demo'); ?></p>
<?php else : ?>
  <p class="tpd-demo-card__note"><?php esc_html_e('Empty — add CSS in Demo Settings and it lands in wp_head.', 'themeplus-demo'); ?></p>
<?php endif; ?>
<?php tpd_demo_card_close(['adv_custom_css']); ?>

<?php tpd_demo_card_open(__('Repeater — Feature List', 'themeplus-demo')); ?>
<?php if ($tpd_features) : ?>
  <ul class="tpd-feature-demo">
    <?php foreach ($tpd_features as $tpd_row) : ?>
      <?php if (empty($tpd_row['feature_enabled'])) {
        continue;
      } ?>
      <li class="tpd-feature-demo__item">
        <span class="tpd-feature-demo__icon"><?php tpd_icon((string)($tpd_row['feature_icon'] ?? 'fa-solid fa-check')); ?></span>
        <span class="tpd-feature-demo__title"><?php echo esc_html((string)($tpd_row['feature_title'] ?? '')); ?></span>
      </li>
    <?php endforeach; ?>
  </ul>
  <p class="tpd-demo-card__note"><?php esc_html_e('Disabled rows are skipped — each row is an array keyed by its sub-field IDs.', 'themeplus-demo'); ?></p>
<?php else : ?>
  <p class="tpd-demo-card__note"><?php esc_html_e('No rows yet — add a few features in Demo Settings to render this list.', 'themeplus-demo'); ?></p>
<?php endif; ?>
<?php tpd_demo_card_close(['adv_feature_list']); ?>

<?php tpd_demo_card_open(__('Link — CTA', 'themeplus-demo')); ?>
<?php if (!empty($tpd_link['url'])) : ?>
  <a class="tpd-primary-sample" href="<?php echo esc_url((string)$tpd_link['url']); ?>"
      <?php echo ('_blank' === ($tpd_link['target'] ?? '')) ? 'target="_blank" rel="noopener"' : ''; ?>>
    <?php echo esc_html((string)($tpd_link['text'] ?: $tpd_link['url'])); ?>
  </a>
  <p class="tpd-demo-card__note"><?php esc_html_e('Same value powers the hero CTA at the top.', 'themeplus-demo'); ?></p>
<?php else : ?>
  <p class="tpd-demo-card__note"><?php esc_html_e('No URL set.', 'themeplus-demo'); ?></p>
<?php endif; ?>
<?php tpd_demo_card_close(['adv_cta_link']); ?>

<?php tpd_demo_card_open(__('Group — SEO', 'themeplus-demo')); ?>
<dl class="tpd-group-demo">
  <dt><?php esc_html_e('Meta Title', 'themeplus-demo'); ?></dt>
  <dd><?php echo esc_html((string)($tpd_seo['seo_title'] ?? '—')); ?></dd>
  <dt><?php esc_html_e('Meta Description', 'themeplus-demo'); ?></dt>
  <dd><?php echo esc_html((string)($tpd_seo['seo_description'] ?? '—')); ?></dd>
  <dt><?php esc_html_e('Discourage Indexing', 'themeplus-demo'); ?></dt>
  <dd><?php echo !empty($tpd_seo['seo_noindex']) ? esc_html__('Yes', 'themeplus-demo') : esc_html__('No', 'themeplus-demo'); ?></dd>
</dl>
<?php tpd_demo_card_close(['adv_seo_group']); ?>
