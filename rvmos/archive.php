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

	<ul class="wp-block-latest-posts wp-block-latest-posts__list is-grid columns-3 has-dates rv-small-cards">
		<?php if (have_posts()) {
			while (have_posts()) {
				the_post(); ?>

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

		<?php	}// конец while ?>
		
		
		<?php 
		} //конец if 
		?>
	</ul>
	</div><!-- .entry-content -->
</main><!-- #main -->

<?php
get_footer();
