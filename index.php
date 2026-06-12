<?php
/**
 * Index — minimal fallback loop.
 *
 * Honors three options for real, so archives verify the choice fields:
 * archive layout (grid/list), posts per row, and the post-meta checkboxes.
 *
 * @package ThemePlus_Demo
 */

defined('ABSPATH') || exit;

get_header();

$tpd_layout = (string)tpd_option('choice_archive_layout', 'grid');
$tpd_cols   = (int)tpd_option('num_posts_per_row', 3);
$tpd_meta   = (array)tpd_option('choice_post_meta', ['date', 'author']);
?>

  <section class="tpd-archive tpd-archive--<?php echo esc_attr($tpd_layout); ?>" style="--tpd-cols: <?php echo esc_attr((string)$tpd_cols); ?>;">

    <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>
        <article <?php post_class('tpd-archive__card'); ?>>
          <h2 class="tpd-archive__title">
            <a class="tpd-archive__link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>

          <ul class="tpd-archive__meta">
            <?php if (in_array('date', $tpd_meta, true)) : ?>
              <li class="tpd-archive__meta-item"><?php echo esc_html(get_the_date()); ?></li>
            <?php endif; ?>
            <?php if (in_array('author', $tpd_meta, true)) : ?>
              <li class="tpd-archive__meta-item"><?php the_author(); ?></li>
            <?php endif; ?>
            <?php if (in_array('category', $tpd_meta, true)) : ?>
              <li class="tpd-archive__meta-item"><?php the_category(', '); ?></li>
            <?php endif; ?>
            <?php if (in_array('comments', $tpd_meta, true)) : ?>
              <li class="tpd-archive__meta-item"><?php comments_number(); ?></li>
            <?php endif; ?>
          </ul>

          <div class="tpd-archive__excerpt"><?php the_excerpt(); ?></div>
        </article>
      <?php endwhile; ?>

      <nav class="tpd-archive__pagination">
        <?php the_posts_pagination(); ?>
      </nav>

    <?php else : ?>
      <p class="tpd-archive__empty"><?php esc_html_e('No posts yet — add a few dummy posts to exercise the archive options.', 'themeplus-demo'); ?></p>
    <?php endif; ?>

  </section>

<?php
get_footer();
