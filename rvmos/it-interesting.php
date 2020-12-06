<?php
/*
	Template Name: Это интересно
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
    <h2 class="rv-h2">ЭТО ИНТЕРЕСНО</h2>
   <p style="margin-bottom:30px"> Добро пожаловать в wordpress. К сожалению, ни панели приложения танк один и iPad. Изоляция ворот. Микроволновая печь была просто, таблетка мягкий кредит вам нужен, магазин ваш любимый раньше. Каждая не только мультяшная и веселая, но и иммиграционная поездка. Каждое массовое разоблачение, 
Добро пожаловать в wordpress. К сожалению, ни панели приложения танк один и iPad. Изоляция ворот. Микроволновая печь была просто, таблетка мягкий кредит вам нужен, магазин ваш любимый раньше. Каждая не только мультяшная и веселая, но и иммиграционная поездка. Каждое массовое разоблачение, 
</p>    
<ul class="wp-block-latest-posts wp-block-latest-posts__list has-dates rv-small-cards">
<?php
    // параметры по умолчанию
    $posts = get_posts( array(
        'numberposts' => 9,
        'post_type'   => 'post',
        'suppress_filters' => true, // подавление работы фильтров изменения SQL запроса
    ) );

    foreach( $posts as $post ){
        setup_postdata($post);
       ?>
    
	<li class="small-card">

<div class="wp-block-latest-posts__featured-image aligncenter gray">
<a href="<?php the_permalink(); ?>">
<?php the_post_thumbnail("thumbnail"); ?>
</a> 
</div>

<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
<div class="wp-block-latest-posts__post-excerpt"><?php the_excerpt("25"); ?></div>
<time datetime="2020-12-05T14:57:25+03:00" class="wp-block-latest-posts__post-date"><?php the_time('F jS, Y'); ?></time>
</li>
<?php 
} ?>
    <?php
    wp_reset_postdata(); // сброс
    ?>

    </ul>
	
    <h2 class="rv-h2" name="/press">Контакты для прессы</h2>

    <h2 class="rv-h2">Информационные партнёры</h2>
	</main><!-- #main -->

<?php
get_footer();
