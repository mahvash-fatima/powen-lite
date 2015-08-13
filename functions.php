<?php
/**
 * Powen functions and definitions
 *
 * @package powen
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

$powen_theme = wp_get_theme();

if( ! defined( 'POWEN_VERSION' )) define( 'POWEN_VERSION' , $powen_theme->get('Version') );
if( ! defined( 'POWEN_URI' )) define( 'POWEN_URI' , get_template_directory_uri() );
if( ! defined( 'POWEN_DR' )) define( 'POWEN_DR'	, get_template_directory() );
if( ! defined( 'POWEN_ADMIN_DR' )) define( 'POWEN_ADMIN_DR'	, POWEN_DR . '/lib/admin/' );
if( ! defined( 'POWEN_IMAGES' )) define( 'POWEN_IMAGES'	, POWEN_URI .'/images/' );

do_action( 'powen_init' );

/*==============================
          FILE INCLUDES
===============================*/

/**
 * Custom functions that act independently of the theme templates.
 */
require POWEN_DR . '/inc/extras.php';

do_action( 'powen_files_load' );


/**
 * Customizer
 */
require_once POWEN_ADMIN_DR . 'customizer/customizer.php';
require_once POWEN_ADMIN_DR . 'customizer/customizer-front.php';
require_once POWEN_DR . '/lib/social-widget.php';

/**
 * Breadcrumb
 */
require_once POWEN_DR . '/lib/breadcrumb.php';

/**
 * Contains Custom functions used througout the theme
 */

require_once POWEN_DR . '/lib/custom-functions.php';

/**
 * Contains hooks and filters used.
 */
require_once POWEN_DR . '/lib/hooks-filters.php';

/**
 * Theme init
 */
require_once POWEN_DR . '/lib/theme-init.php';

/**
 * Style and script enqueing.
 */
require_once POWEN_DR . '/lib/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require POWEN_DR . '/inc/template-tags.php';

/**
 * Load Jetpack compatibility file.
 */
require POWEN_DR . '/inc/jetpack.php';

/**
 * Social Links
 */
require_once POWEN_DR . '/lib/social-links.php';