<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
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

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
