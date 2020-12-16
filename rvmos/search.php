<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package RVMOS
 */

get_header();
?>

	<main id="primary" class="rv-main">

		<?php if ( have_posts() ) : ?>


				<h2 class="rv-h2">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Результаты поиска для: %s', 'rvmos' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h2>
		
			<ul class="wp-block-latest-posts wp-block-latest-posts__list is-grid columns-3 has-dates rv-small-cards">	
			<?php

			/* Start the Loop */
			while ( have_posts() ) :
				the_post();
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
				
				<?php	
			endwhile;
?>
</ul>
<?php
			the_posts_pagination(); 

		else :?>
			<h2 class="rv-h2"><?php
		
			/* translators: %s: search query. */
			printf( esc_html__( 'Ничего не найдено по запросу: %s', 'rvmos' ), '<span>' . get_search_query() . '</span>' );
			?>
		</h2><?php
			

		endif;
		?>

	</main><!-- #main -->

<?php

get_footer();
