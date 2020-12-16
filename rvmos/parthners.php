<?php
/*
	Template Name: Партнеры
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

		get_template_part('template-parts/content', get_post_type());

	// ВЫКЛЮЧЕННАЯ НАВИГАЦИЯ
	/*the_post_navigation(
				array(
					'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Предыдущая:', 'rvmos' ) . '</span> <span class="nav-title">%title</span>',
					'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Следущая:', 'rvmos' ) . '</span> <span class="nav-title">%title</span>',
				)
			);*/

	// If comments are open or we have at least one comment, load up the comment template.
	// ВЫКЛЮЧЕННЫЕ КОММЕНТАРИИ
	/*if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;*/

	endwhile; // End of the loop.
	?>
<ul class="wp-block-latest-posts wp-block-latest-posts__list has-dates rv-small-cards parthners">
    <?php
    // Define custom query parameters
    $custom_query_args = array(
      'category__in' => 19
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
        <li class="small-card parthners__card">

          <div class="parthners__logo aligncenter">
              <?php the_post_thumbnail("thumbnail"); ?>
          </div>
          <!--<div class="wp-block-latest-posts__post-excerpt"><?php //the_excerpt(25); ?></div>-->
        </li>
    <?php endwhile;
    endif; ?>
  </ul>
</main><!-- #main -->

<?php
get_footer();
