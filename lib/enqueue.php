<?php

/*==============================
        ENQUEUE STYLES
===============================*/
if ( ! function_exists( 'powen_enqueue_styles' ) ) :

	function powen_enqueue_styles(){

		/*===============
	         REGISTER
		=================*/

		if( ! defined( 'POWEN_PRO' ) )

		wp_register_style( 'powen-google-font', powen_font_url() );

		//Animate
		wp_register_style( 'powen-animate', POWEN_URI . '/css/vendor-css/animate.css' );

		//Hover
		wp_register_style( 'powen-hover', POWEN_URI . '/css/vendor-css/hover.css' );

		//Font Awesome
		wp_register_style( 'powen-fontawesome', POWEN_URI . '/lib/fonts/font-awesome/css/font-awesome.min.css' );

		//Mmenu
		wp_register_style( 'powen-mobile-menu-style', POWEN_URI . '/css/vendor-css/jquery.mmenu.all.css' );

		//Default stylesheet
		wp_register_style( 'powen-default', POWEN_URI . '/css/default.css', array('powen-fontawesome') );

		//Slider styles
		wp_register_style( 'powen-slider-stylesheet', POWEN_URI . '/css/vendor-css/slick.css', array('powen-default') );

		wp_register_style( 'powen-slider-theme-stylesheet', POWEN_URI . '/css/vendor-css/slick-theme.css', array('powen-default') );

		/*===============
	          ENQUEUE
		=================*/

		wp_enqueue_style( 'powen-google-font');

		wp_enqueue_style('powen-mobile-menu-style');

		wp_enqueue_style('powen-slider-stylesheet');

		wp_enqueue_style('powen-slider-theme-stylesheet');

		wp_enqueue_style( 'powen-animate');

		wp_enqueue_style( 'powen-hover');

		wp_enqueue_style( 'powen-style', get_stylesheet_uri() );

	}

endif; //powen_enqueue_styles

/*==============================
        ENQUEUE SCRIPTS
===============================*/

if ( ! function_exists( 'powen_enqueue_scripts' ) ) :

function powen_enqueue_scripts(){

	powen_enqueue_styles();

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/*===============
         REGISTER
	=================*/

	//Mmenu
	wp_register_script( 'powen-mobile-menu', POWEN_URI . '/js/vendor-js/jquery.mmenu.min.all.js', array('jquery'), POWEN_VERSION, true );

	//Slider Script
	wp_register_script( 'powen-slider-script',  POWEN_URI . '/js/vendor-js/slick.min.js', array('jquery'), POWEN_VERSION, true );

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

	// if($show_flexslider)
	wp_enqueue_script( 'powen-slider-script' );

	wp_enqueue_script( 'powen-main' );

	wp_localize_script( 'powen-main', 'powenVars', apply_filters( 'powen_vars', array(
		'speed'          => 300,
		'slidesToShow'   => 4,
		'slidesToScroll' => 4,
		'dots'           => true,
		'infinite'       => true,
	) ) );

}

endif; //powen_enqueue_scripts

add_action( 'wp_enqueue_scripts', 'powen_enqueue_scripts' );