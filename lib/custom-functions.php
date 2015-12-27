<?php

/**
 * This file contains all custom functions used in the theme.
 * @package Powen
 */


if( ! function_exists( 'powen_mod' ) ) :

	function powen_mod( $key , $default = false )
	{
		$powen_mod = get_theme_mod('powen_mod' );

		$saved_value = isset($powen_mod[$key]) ? $powen_mod[$key] : $default;

		$keys_to_be_escaped = apply_filters('powen_key_to_be_escaped_array', array(
			'theme_font',
			'header_textcolor',
			'header_taglinecolor',
			'background_color',
			'header_background',
			'powen-footer-widgets_background',
			'powen-footer-widgets_textcolor',
			'powen-footer-widgets_linkcolor',
			'footer_bottom_textcolor',
			'footer_bottom_background_color',
			'theme_color',
			'hover_link_color',
			'header_text_placement',
			'logo_placement',
			'sidebar_position'
		) );

		if( in_array( $key , $keys_to_be_escaped ) ){
			$saved_value = esc_html( $saved_value ); //As suggested by kevinhaig
		}

		//Rest will be escaped at the point where we output the data.
		return $saved_value;
	}
endif; //powen_mod

if( ! function_exists( 'powen_default_slides' ) ) :

	function powen_default_slides()
	{
		return apply_filters('powen_default_slides_array', array(
	        array
	            (
					'title'       => __('Demo Post One', 'powen-lite'),
					'link' 		  => home_url( '/' ),
					'description' => __('Omnis fugit itaque architecto sit saepe quidem tempora.', 'powen-lite'),
					'image'       => get_template_directory_uri() . '/images/slides/slide8.jpg',
	            ),
	        array
	            (
					'title'       => __('Demo Post Two', 'powen-lite'),
					'link' 		  => home_url( '/' ),
					'description' => __('Reiciendis blanditiis eius officia molestias dicta ver.', 'powen-lite'),
					'image'       => get_template_directory_uri() . '/images/slides/slide7.jpg',
	            ),
	        array
	            (
					'title'       => __('Demo Post Three', 'powen-lite'),
					'link' 		  => home_url( '/' ),
					'description' => __('Eaque perferendis nesciunt provident.', 'powen-lite'),
					'image'       => get_template_directory_uri() . '/images/slides/slide6.jpg',
	            ),
	        array
	            (
					'title'       => __('Demo Post Four', 'powen-lite'),
					'link' 		  => home_url( '/' ),
					'description' => __('Cupiditate deleniti, enim natus.', 'powen-lite'),
					'image'       => get_template_directory_uri() . '/images/slides/slide5.jpg',
	            ),
	        array
	            (
					'title'       => __('Demo Post Five', 'powen-lite'),
					'link' 		  => home_url( '/' ),
					'description' => __('Temporibus eaque rem unde iste fugasse quaerat quo ven.', 'powen-lite'),
					'image'       => get_template_directory_uri() . '/images/slides/slide4.jpg',
	            ),
	        array
	            (
					'title'       => __('Demo Post Six', 'powen-lite'),
					'link' 		  => home_url( '/' ),
					'description' => __('Perferendis quasi totam voluptates quo quaerat tempori.', 'powen-lite'),
					'image'       => get_template_directory_uri() . '/images/slides/slide3.jpg',
	            ),
	        array
	            (
					'title'       => __('Demo Post Seven', 'powen-lite'),
					'link' 		  => home_url( '/' ),
					'description' => __('Inventore nesciunt quaerat unde dicta molestiae animis.', 'powen-lite'),
					'image'       => get_template_directory_uri() . '/images/slides/slide2.jpg',
	            ),
	        array
	            (
					'title'       => __('Demo Post Eight', 'powen-lite'),
					'link' 		  => home_url( '/' ),
					'description' => __('Libero mollitia error expedita totam iste minus cumque quos obcaecati earum rerum totam ea vitae.', 'powen-lite'),
					'description' => __('Libero mollitia error expedita totam iste minus cumque.', 'powen-lite'),
	            )
	    ) );
	}

endif; //powen_default_slides

/**
 * Used to check if a value is set or not for our global variable $powen_options,
 * so it doesn't return undefined index error in debug mode.
 * @param  [string]  $key1 first or the only key of the array
 * @param  [string] $key2 (optional) the second key of the array.
 * @return [mixed]        the value of $powen_options key provided
 */
if( ! function_exists( 'powen_options' ) ) :

	function powen_options( $key1, $key2 = false ){

		global $powen_options;

		if( isset($powen_options[$key1]) && $powen_options[$key1] )
		{
			if( $key2 )
			{
				if( isset($powen_options[$key1][$key2]) && $powen_options[$key1][$key2] )
				{
					return $powen_options[$key1][$key2];
				}
			}
			else
			{
				return $powen_options[$key1];
			}

		}

	}
endif; //powen_options

//Pagination

if( ! function_exists( 'powen_pagination' ) ) :

	function powen_pagination()
	{
		echo "<nav class='powen-pagination clearfix' >";
			echo paginate_links();
		echo "</nav>";
	}

endif; //powen_pagination

if( ! function_exists( 'powen_content' ) ) :

	function powen_content()
	{
		if(powen_mod('content_length', 'excerpt') == 'full') {
			the_content();
		}
		else{
			the_excerpt();
		}
	}

endif; //powen_content

if( ! function_exists( 'powen_custom_admin_head' ) ) :

	function powen_custom_admin_head() {
		echo '<style> #wp-admin-bar-powen-admin-menu a.ab-item { color: #00A0D2; }</style>';
	}

endif; //powen_custom_admin_head

add_action( 'admin_head', 'powen_custom_admin_head' );

// CSS
if( ! function_exists( 'powen_cutomizer_option_css' ) ) :

	function powen_cutomizer_option_css() {
		if( powen_mod('css_textarea') ) {
			echo "<style>". powen_mod('css_textarea') . "</style>";
		}
	}

endif; //powen_cutomizer_option_css

add_action( 'wp_head', 'powen_cutomizer_option_css' );

//Post Tags
if( ! function_exists( 'powen_post_tags' ) ) :

	function powen_post_tags() {
		if( powen_mod('post_tags') == 1 ) {
			echo "<style> .entry-footer .tags-links {display: none;} </style>";
		}
	}

endif; //powen_post_tags

add_action( 'wp_head', 'powen_post_tags' );


//Post Categories
if( ! function_exists( 'powen_post_categories' ) ) :

	function powen_post_categories() {
		if( powen_mod('post_categories') == 1 ) {
			echo "<style> .entry-footer .cat-links {display: none;} </style>";
		}
	}

endif; //powen_post_categories

add_action( 'wp_head', 'powen_post_categories' );


if( ! function_exists( 'powen_font_url' ) )
{
	/**
	 * Returns the font url of the theme, we are returning it from a function to handle two things
	 * one is to handle the http problems and the other is so that we can also load it to post editor.
	 * @return string font url
	 */
	function powen_font_url()
	{
		/**
		 * Use font url without http://, we do this because google font without https have
		 * problem loading on websites with https.
		 * @var font_url
		 */
		$font_url = 'fonts.googleapis.com/css?family=Open+Sans:400,700';

		return ( substr( site_url(), 0, 8 ) == 'https://') ? 'https://' . $font_url : 'http://' . $font_url;
	}
}