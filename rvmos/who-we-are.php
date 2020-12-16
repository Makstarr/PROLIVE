<?php
/*
	Template Name: Кто мы
*/

get_header();
?>

<section class="hello-screen big-logo preloader">
  <div class="big-logo__ball">
    <img src="<?php echo get_template_directory_uri(); ?>/imgs/logo_ball.svg" alt="ЛОГОТИП РВ ШАРИК">
  </div>
  <p>Загрузка...</p>
</section>
<main id="primary" class="rv-main">

  <?php
  while (have_posts()) :
    the_post();

    get_template_part('template-parts/content', 'page');

    // If comments are open or we have at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) :
      comments_template();
    endif;

  endwhile; // End of the loop.
  ?>
  <h2 class="rv-h2">НАША КОМАНДА</h2>
  <ul class="wp-block-latest-posts wp-block-latest-posts__list has-dates rv-people">
    <?php
    // параметры по умолчанию
    $posts = get_posts(array(
      'numberposts' => 100,
      'category'    => 13,
      'post_type'   => 'post',
      'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    ));

    foreach ($posts as $post) {
      setup_postdata($post);
    ?>

      <li class="small-card">

        <div class="wp-block-latest-posts__featured-image aligncenter">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail("thumbnail"); ?>
          </a>
        </div>

        <h2><?php the_title(); ?></h2>
        <div class="wp-block-latest-posts__post-excerpt"><?php the_excerpt("25"); ?></div>
        <time datetime="2020-12-05T14:57:25+03:00" class="wp-block-latest-posts__post-date"><?php the_time('d.m.y'); ?></time>
      </li>
    <?php
    } ?>
    <?php
    wp_reset_postdata(); // сброс
    ?>

  </ul>
  <h3 class="rv-h3">Совет московского отделения МОО «РАВНЫЕ ВОЗМОЖНОСТИ»</h3>
  <ul class="wp-block-latest-posts wp-block-latest-posts__list has-dates rv-people">
    <?php
    // параметры по умолчанию
    $posts = get_posts(array(
      'numberposts' => 100,
      'category'    => 14,
      'post_type'   => 'post',
      'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    ));

    foreach ($posts as $post) {
      setup_postdata($post);
    ?>

      <li class="small-card">

        <div class="wp-block-latest-posts__featured-image aligncenter">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail("thumbnail"); ?>
          </a>
        </div>

        <h2><?php the_title(); ?></h2>
        <div class="wp-block-latest-posts__post-excerpt"><?php the_excerpt("25"); ?></div>
        <time datetime="2020-12-05T14:57:25+03:00" class="wp-block-latest-posts__post-date"><?php the_time('d.m.y'); ?></time>
      </li>
    <?php
    } ?>
    <?php
    wp_reset_postdata(); // сброс
    ?>

  </ul>

</main><!-- #main -->

<?php
get_footer();
