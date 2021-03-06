<?php
/**
 * components functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Gaurav_Pareek
 */

if ( ! function_exists( 'grvrocks2017_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the aftercomponentsetup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function grvrocks2017_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on components, use a find and replace
	 * to change 'grvrocks2017' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'grvrocks2017', get_template_directory() . '/languages' );

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

	add_image_size( 'grvrocks2017-featured-image', 640, 9999 );
	add_image_size( 'grvrocks2017-hero', 1280, 1000, true );
	add_image_size( 'grvrocks2017-thumbnail-avatar', 100, 100, true );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Top', 'grvrocks2017' ),
		'menu-2' => esc_html__( 'Footer', 'grvrocks2017' ),
	) );

	/**
	 * Add support for core custom logo.
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	/**
	 * Add support for custom header.
	 */
	add_theme_support( 'custom-header' );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'audio',
		'gallery',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'grvrocks2017_custom_background_args', array(
		'default-color' => 'fefefe',
	) ) );

	// Add theme support for Jetpack content options

	add_theme_support( 'jetpack-content-options', array(
    'blog-display'       => 'excerpt', // the default setting of the theme: 'content', 'excerpt' or array( 'content', 'excerpt' ) for themes mixing both display.
    'author-bio'         => true, // display or not the author bio: true or false.
    'author-bio-default' => false, // the default setting of the author bio, if it's being displayed or not: true or false (only required if false).
    'post-details'       => array(
        'stylesheet'      => 'grvrocks2017', // name of the theme's stylesheet.
        'date'            => '.posted-on', // a CSS selector matching the elements that display the post date.
        'categories'      => '.cat-links', // a CSS selector matching the elements that display the post categories.
        'tags'            => '.tags-links', // a CSS selector matching the elements that display the post tags.
        'author'          => '.byline', // a CSS selector matching the elements that display the post author.
    ),
    'featured-images'    => array(
        'archive'         => true, // enable or not the featured image check for archive pages: true or false.
        'archive-default' => false, // the default setting of the featured image on archive pages, if it's being displayed or not: true or false (only required if false).
        'post'            => true, // enable or not the featured image check for single posts: true or false.
        'post-default'    => false, // the default setting of the featured image on single posts, if it's being displayed or not: true or false (only required if false).
        'page'            => true, // enable or not the featured image check for single pages: true or false.
        'page-default'    => true, // the default setting of the featured image on single pages, if it's being displayed or not: true or false (only required if false).
    ),
) );
}
endif;
add_action( 'after_setup_theme', 'grvrocks2017_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function grvrocks2017_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'grvrocks2017_content_width', 640 );
}
add_action( 'after_setup_theme', 'grvrocks2017_content_width', 0 );

/**
 * Return early if Custom Logos are not available.
 *
 * @todo Remove after WP 4.7
 */
function grvrocks2017_the_custom_logo() {
	if ( ! function_exists( 'the_custom_logo' ) ) {
		return;
	} else {
		the_custom_logo();
	}
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function grvrocks2017_widgets_init() {
	// register_sidebar( array(
	// 	'name'          => esc_html__( 'Sidebar', 'grvrocks2017' ),
	// 	'id'            => 'sidebar-1',
	// 	'description'   => '',
	// 	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	// 	'after_widget'  => '</section>',
	// 	'before_title'  => '<h2 class="widget-title">',
	// 	'after_title'   => '</h2>',
	// ) );

	register_sidebar( array(
		'name'          => esc_html__( 'Blog page', 'grvrocks2017' ),
		'id'            => 'sidebar-2',
		'description'   => 'Shows up on blog page, above all posts',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'grvrocks2017_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function grvrocks2017_scripts() {
	wp_enqueue_style( 'grvrocks2017-style', get_stylesheet_uri() );

	wp_enqueue_style( 'grvrocks2017-fonts', '//fonts.googleapis.com/css?family=Overpass:400,400i,700|Sorts+Mill+Goudy:400,400i' );
	//wp_enqueue_style( 'grvrocks2017-fonts-1', '//fontlibrary.org/face/sorts-mill-goudy' );

	wp_enqueue_script( 'grvrocks2017-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'grvrocks2017-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'grvrocks2017_scripts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load files from Hybrid framework.
 */
require get_template_directory() . '/inc/hybrid-media-grabber.php';
require get_template_directory() . '/inc/get-the-image.php';
