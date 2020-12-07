<?php
/*
	Template Name: Главная
*/

get_header();
?>

<section class="hello-screen big-logo">
	<div class="big-logo__wrapper">
		<div class="big-logo__ball"><img class="" src=<?php echo get_template_directory_uri(); ?>/imgs/logo_ball.svg alt="ЛОГОТИП РВ ШАРИК"></div>
		<div class="big-logo__words">
			<h1><span>РАВНЫЕ</span> <span>ВОЗМОЖНОСТИ</span> <span>МОСКВА</span></h1>
		</div>
	</div>
	<p>Общественная организация в поддержку людей с ментальной инвалидностью, психофизическими нарушениями и их
		семей инвалидностью, психофизическими нарушениями и их семей</p>
</section>

<main class=rv-main id=primary>

	<?php
	if (have_posts()) :

		if (is_home() && !is_front_page()) :
	?>
			<header>
				<h1 class=" screen-reader-text"><?php single_post_title(); ?></h1>
			</header>
	<?php
		endif;

		/* Start the Loop */
		while (have_posts()) :
			the_post();

			/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
			get_template_part('template-parts/content', get_post_type());

		endwhile;

		the_posts_navigation();

	else :

		get_template_part('template-parts/content', 'none');

	endif;
	?>

</main><!-- #main -->

<?php
get_footer();
