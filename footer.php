<?php
/**
 * Footer
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;
?>
</main>

<footer class="tpd-footer">
  <div class="tpd-footer__inner">
    <div class="tpd-footer__social" aria-label="<?php esc_attr_e('FrontTheme profiles', 'themeplus-demo'); ?>">
      <a class="tpd-footer__social-link" href="https://www.fronttheme.com/" target="_blank" rel="noopener" aria-label="<?php esc_attr_e('Website', 'themeplus-demo'); ?>"><i class="fa-solid fa-earth-americas" aria-hidden="true"></i></a>
      <a class="tpd-footer__social-link" href="https://github.com/fronttheme" target="_blank" rel="noopener" aria-label="GitHub"><i class="fa-brands fa-github" aria-hidden="true"></i></a>
      <a class="tpd-footer__social-link" href="https://x.com/FrontTheme" target="_blank" rel="noopener" aria-label="X"><i class="fa-brands fa-x-twitter" aria-hidden="true"></i></a>
      <a class="tpd-footer__social-link" href="https://dribbble.com/FrontTheme" target="_blank" rel="noopener" aria-label="Dribbble"><i class="fa-brands fa-dribbble" aria-hidden="true"></i></a>
    </div>

    <div class="tpd-footer__center">
      <p class="tpd-footer__note">
        <?php echo nl2br(esc_html((string)tpd_option('text_footer_note', ''))); ?>
      </p>
    </div>

    <p class="tpd-footer__credit">
      &copy; <?php echo do_shortcode(wp_kses_post((string)tpd_option('struct_copyright_shortcode', '[tpd_year]'))); ?>
      &middot; <?php esc_html_e('ThemePlus Demo', 'themeplus-demo'); ?> v<?php echo esc_html(TPD_VERSION); ?>
      &middot; <?php esc_html_e('Built with ThemePlus', 'themeplus-demo'); ?>
    </p>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
