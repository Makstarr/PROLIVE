<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
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
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) :
				?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
				<?php
			endif;
?>
<ul class="wp-block-latest-posts wp-block-latest-posts__list has-dates rv-small-cards">
	<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();?>
				<li class="small-card">

				<div class="wp-block-latest-posts__featured-image aligncenter gray">
				<a href="<?php the_permalink(); ?>">
				<?php the_post_thumbnail("thumbnail"); ?>
				</a> 
				</div>
	
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<div class="wp-block-latest-posts__post-excerpt"><?php the_excerpt("25"); ?></div>
			<time datetime="2020-12-05T14:57:25+03:00" class="wp-block-latest-posts__post-date"><?php the_time('d.m.y'); ?></time>
		</li>

			<?php endwhile;
?>
	</ul>
	<?php
			the_posts_pagination(); 

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</ul>
	</main><!-- #main -->

<?php
get_footer();
