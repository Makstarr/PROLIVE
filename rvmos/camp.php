<?php
/*
	Template Name: Лагерь
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
    <h2 class="rv-h2">Лагерь</h2>
</main>
<section class="slider-container">
    <div class="slider-slider">
        <?php
        // параметры по умолчанию
        $posts = get_posts(array(
            'numberposts' => 100,
            'order' => 'ASC',
            'orderby'     => 'title',
            'category'    => 9,
            'post_type'   => 'post',
            'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
        ));

        foreach ($posts as $post) {
            setup_postdata($post);
        ?>

            <div class="slider__item">

                <h2 class="rv-h2"><?php the_title(); ?></h2>
                <div class="wp-block-latest-posts__post-excerpt"><?php the_content(); ?></div>
            </div>
        <?php
        } ?>
        <?php
        wp_reset_postdata(); // сброс
        ?>
    </div>
</section>
<main id="primary" class="rv-main">
<section class="big-button-section">
    <a href="<?php echo esc_url(home_url('/contacts')); ?>" class="big-button">Контакты для участия</a>
    </section>
    </main>

<?php
get_footer();
