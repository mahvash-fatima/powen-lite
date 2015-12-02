<?php

/*==============================
        ENQUEUE STYLES
===============================*/

function powen_enqueue_styles(){

	$show_flexslider = powen_options('show-slider') || ! isset($powen_options['show-slider']);

	/*===============
         REGISTER
	=================*/
	//Animate
	wp_register_style( 'powen-animate', POWEN_URI . '/css/vendor-css/animate.css' );

	//Font Awesome
	wp_register_style( 'powen-fontawesome', POWEN_URI . '/lib/fonts/font-awesome/css/font-awesome.min.css' );

	//modernizr
	wp_enqueue_script( 'powen-modernizr', POWEN_URI . '/js/modernizr.js' );

	//Mmenu
	wp_register_style( 'powen-mobile-menu-style', POWEN_URI . '/css/vendor-css/jquery.mmenu.all.css' );

	//Default stylesheet
	wp_register_style( 'powen-default', POWEN_URI . '/css/default.css', array('powen-fontawesome') );

	//Flexslider styles
	wp_register_style( 'powen-flexslider', POWEN_URI . '/css/vendor-css/flexslider.css', array('powen-default') );

	/*===============
          ENQUEUE
	=================*/

	wp_enqueue_style('powen-mobile-menu-style');

	if( $show_flexslider )
	wp_enqueue_style('powen-flexslider');

	wp_enqueue_style( 'powen-style', get_stylesheet_uri() );

	wp_enqueue_style( 'powen-animate');


}


/*==============================
        ENQUEUE SCRIPTS
===============================*/

function powen_enqueue_scripts(){

	$show_flexslider = powen_options('show-slider') || ! isset($powen_options['show-slider']);

	//Because they go to the same hook.
	powen_enqueue_styles();

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/*===============
         REGISTER
	=================*/
	
	//Mmenu
	wp_register_script( 'powen-mobile-menu', POWEN_URI . '/js/vendor-js/jquery.mmenu.min.all.js', array('jquery'), POWEN_VERSION, true );

	//Flexslider
	wp_register_script( 'powen-jquery-flexslider',  POWEN_URI . '/js/vendor-js/jquery.flexslider.js', array('jquery'), POWEN_VERSION, true );

	//Main script of the theme
	wp_register_script( 'powen-main', POWEN_URI . '/js/main.js', array('jquery'), POWEN_VERSION, true );

	/*===============
         ENQUEUE
	=================*/

	//Modernizr
	wp_enqueue_script( 'powen-modernizr', POWEN_URI . '/js/vendor-js/modernizr.js' );

	//REM
	
	// [if lt IE 9]
	wp_enqueue_script( 'powen-REM-unit-polyfill', POWEN_URI . '/js/vendor-js/rem.js' ,false,false,true );
	// [endif]
	
	//mMenu
	wp_enqueue_script('powen-mobile-menu');

	if($show_flexslider)
	wp_enqueue_script( 'powen-jquery-flexslider' );

	wp_enqueue_script( 'powen-main' );

}


add_action( 'wp_enqueue_scripts', 'powen_enqueue_scripts' );



