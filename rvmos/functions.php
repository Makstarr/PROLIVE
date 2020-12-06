<?php
/**
 * RVMOS functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package RVMOS
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'rvmos_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function rvmos_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on RVMOS, use a find and replace
		 * to change 'rvmos' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'rvmos', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'rvmos' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'rvmos_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'rvmos_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function rvmos_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'rvmos_content_width', 640 );
}
add_action( 'after_setup_theme', 'rvmos_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function rvmos_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'rvmos' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'rvmos' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'rvmos_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function rvmos_scripts() {
	wp_enqueue_style( 'rvmos-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'rvmos-style', 'rtl', 'replace' );

	wp_enqueue_style( 'rv-style', get_template_directory_uri() . '/rv-style.css', array(), _S_VERSION );
	wp_style_add_data( 'rv-style', 'rtl', 'replace' );

	wp_enqueue_script( 'rv-scripts', get_template_directory_uri() . '/rv-scripts.js', array(), _S_VERSION, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'rvmos_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
/*
function wpschool_create_smallCards_posttype() {
    $labels = array(
        'name' => _x( 'Маленькие карточки', 'Тип записей Маленькие карточки', 'root' ),
        'singular_name' => _x( 'Маленькие карточки', 'Тип записей Маленькие карточки', 'root' ),
        'menu_name' => __( 'Маленькие карточки', 'root' ),
        'all_items' => __( 'Все маленькие карточки', 'root' ),
        'view_item' => __( 'Смотреть маленькие карточку', 'root' ),
        'add_new_item' => __( 'Добавить маленькую карточку', 'root' ),
        'add_new' => __( 'Добавить новый', 'root' ),
        'edit_item' => __( 'Редактировать маленькую карточку', 'root' ),
        'update_item' => __( 'Обновить маленькую карточку', 'root' ),
        'search_items' => __( 'Искать маленькую карточку', 'root' ),
        'not_found' => __( 'Не найдено', 'root' ),
        'not_found_in_trash' => __( 'Не найдено в корзине', 'root' ),
    );

    $args = array(
        'label' => __( 'smallCards', 'root' ),
        'description' => __( 'Каталог маленьких карточек', 'root' ),
        'labels' => $labels,
        'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'taxonomies' => array( 'genres' ),
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'page',
    );

    register_post_type( 'smallCards', $args );

}
add_action( 'init', 'wpschool_create_smallCards_posttype', 0 );


 **/
function change_post_name( $translated ) {
	$translated = str_ireplace(  'Записи',  'Карточки',  $translated );
	return $translated;
  }
  
add_filter(  'gettext',  'change_post_name'  );
 add_filter(  'ngettext',  'change_post_name'  );





 add_filter( 'excerpt_length', function(){
	return 15;
} );

add_filter('excerpt_more', function($more) {
	return '...';
});