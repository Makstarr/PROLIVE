<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RVMOS
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
	<h2 class="rv-h2">События</h2>
	<ul class="wp-block-latest-posts wp-block-latest-posts__list has-dates rv-small-cards">
    <?php
    // Define custom query parameters
    $custom_query_args = array(
		'category__not_in' => array(15,16,13,7,8,11)
	  );
    // Get current page and append to custom query parameters array
    $custom_query_args['paged'] = get_query_var('paged') ? get_query_var('paged') : 1;

    // Instantiate custom query
    $custom_query = new WP_Query($custom_query_args);

    // Pagination fix
    $temp_query = $wp_query;
    $wp_query   = NULL;
    $wp_query   = $custom_query;

    // Output custom query loop
    if ($custom_query->have_posts()) :
      while ($custom_query->have_posts()) :
        $custom_query->the_post();
    ?>
        <li class="small-card">

          <div class="wp-block-latest-posts__featured-image aligncenter">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail("thumbnail"); ?>
            </a>
          </div>

          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <div class="wp-block-latest-posts__post-excerpt"><?php the_excerpt(25); ?></div>
          <time datetime="2020-12-05T14:57:25+03:00" class="wp-block-latest-posts__post-date"><?php the_time('d.m.y'); ?></time>
        </li>
    <?php endwhile;
    endif; ?>
  </ul>
  <?php
  // Reset postdata
  wp_reset_postdata();

  // Custom query loop pagination
  the_posts_pagination();

  // Reset main query object
  $wp_query = NULL;
  $wp_query = $temp_query;
  ?>

  </ul>
</main><!-- #main -->

<?php
get_footer();