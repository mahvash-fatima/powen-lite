<?php

/**
 * @package Powen
 */

if ( ! function_exists( 'powen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function powen_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on powen, use a find and replace
	 * to change 'powen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'powen', POWEN_DR . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( apply_filters( 'powen_add_theme_support_automatic-feed-links', 'automatic-feed-links' ) );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( apply_filters( 'powen_add_theme_support_title-tag', 'title-tag' ) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */

	//Featured image for both page and post
	add_theme_support( apply_filters( 'powen_add_theme_support_post_thumbnails', 'post-thumbnails' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
	    apply_filters( 'powen_add_navigation', array( 'top-most' => __( 'Top Most Menu', 'powen' ),'main-menu' => __( 'Main Menu', 'powen' ) ) )
  	);

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'powen_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
		))
	);

	//registering image size of side-thumb
	add_image_size( 'side-thumb', 300, 150 );
}
endif; // powen_setup
add_action( 'after_setup_theme', 'powen_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function powen_widgets_init() {
	register_sidebar( apply_filters('powen_register_sidebar_widgets', array(
		'name'          => __( 'Sidebar', 'powen' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) ) );

		// First footer widget area, located in the footer. Empty by default.
		    register_sidebar( apply_filters('powen_register_sidebar_footer_widgets_one', array(
		        'name' => __( 'First Footer Widget Area', 'powen' ),
		        'id' => 'first-footer-widget-area',
		        'description' => __( 'The first footer widget area', 'powen' ),
		        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		        'after_widget' => '</div>',
		        'before_title' => '<h3 class="widget-title">',
		        'after_title' => '</h3>',
		    ) ) );

		    // Second Footer Widget Area, located in the footer. Empty by default.
		    register_sidebar( apply_filters('powen_register_sidebar_footer_widgets_two', array(
		        'name' => __( 'Second Footer Widget Area', 'powen' ),
		        'id' => 'second-footer-widget-area',
		        'description' => __( 'The second footer widget area', 'powen' ),
		        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		        'after_widget' => '</div>',
		        'before_title' => '<h3 class="widget-title">',
		        'after_title' => '</h3>',
		    ) ) );

		    // Third Footer Widget Area, located in the footer. Empty by default.
		    register_sidebar( apply_filters('powen_register_sidebar_footer_widgets_three', array(
		        'name' => __( 'Third Footer Widget Area', 'powen' ),
		        'id' => 'third-footer-widget-area',
		        'description' => __( 'The third footer widget area', 'powen' ),
		        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		        'after_widget' => '</div>',
		        'before_title' => '<h3 class="widget-title">',
		        'after_title' => '</h3>',
		    ) ) );

		    // Fourth Footer Widget Area, located in the footer. Empty by default.
		    register_sidebar( apply_filters('powen_register_sidebar_footer_widgets_four', array(
		        'name' => __( 'Fourth Footer Widget Area', 'powen' ),
		        'id' => 'fourth-footer-widget-area',
		        'description' => __( 'The fourth footer widget area', 'powen' ),
		        'before_widget' => '<div id="%1$s" class="widget-container %2$s">',
		        'after_widget' => '</div>',
		        'before_title' => '<h3 class="widget-title">',
		        'after_title' => '</h3>',
		    ) ) );

}
add_action( 'widgets_init', 'powen_widgets_init' );