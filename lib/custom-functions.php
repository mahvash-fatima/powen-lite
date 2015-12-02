<?php

/**
 * This file contains all custom functions used in the theme.
 * @package Powen
 */


if( ! function_exists( 'powen_mod' ) ) :

	function powen_mod( $key , $default = false )
	{
		$powen_mod = get_theme_mod('powen_mod' );
		$saved_value = isset($powen_mod[$key]) && $powen_mod[$key] ? $powen_mod[$key] : $default;

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
						'link' 		  => '',
						'description' => __('Omnis fugit itaque architecto sit saepe quidem tempora fuga esse incidunt perferendis harum.', 'powen-lite'),
						'image'       => get_template_directory_uri() . '/images/slides/slide8.jpg',
		            ),
		        array
		            (
						'title'       => __('Demo Post Two', 'powen-lite'),
						'link' 		  => '',
						'description' => __('Reiciendis blanditiis eius officia molestias dicta vero hic accusamus aliquam enim optio porro veritatis.', 'powen-lite'),
						'image'       => get_template_directory_uri() . '/images/slides/slide7.jpg',
		            ),
		        array
		            (
						'title'       => __('Demo Post Three', 'powen-lite'),
						'link' 		  => '',
						'description' => __('Eaque perferendis nesciunt provident facere sint laboriosam commodi saepe quas dolorem ipsam saepe itaque', 'powen-lite'),
						'image'       => get_template_directory_uri() . '/images/slides/slide6.jpg',
		            ),
		        array
		            (
						'title'       => __('Demo Post Four', 'powen-lite'),
						'link' 		  => '',
						'description' => __('Cupiditate deleniti, enim natus magni nisi deleniti eligendi recusandae reiciendis.', 'powen-lite'),
						'image'       => get_template_directory_uri() . '/images/slides/slide5.jpg',
		            ),
		        array
		            (
						'title'       => __('Demo Post Five', 'powen-lite'),
						'link' 		  => '',
						'description' => __('Temporibus eaque rem unde iste fugasse quaerat quo veniam reprehenderit repudiandae perferendis porro minus.', 'powen-lite'),
						'image'       => get_template_directory_uri() . '/images/slides/slide4.jpg',
		            ),
		        array
		            (
						'title'       => __('Demo Post Six', 'powen-lite'),
						'link' 		  => '',
						'description' => __('Perferendis quasi totam voluptates quo quaerat temporibus maiores nesciunt soluta rerum sint laboriosam.', 'powen-lite'),
						'image'       => get_template_directory_uri() . '/images/slides/slide3.jpg',
		            ),
		        array
		            (
						'title'       => __('Demo Post Seven', 'powen-lite'),
						'link' 		  => '',
						'description' => __('Inventore nesciunt quaerat unde dicta molestiae animi blanditiis expedita est architecto ipsum ullam nisi perspiciatis.', 'powen-lite'),
						'image'       => get_template_directory_uri() . '/images/slides/slide2.jpg',
		            ),
		        array
		            (
						'title'       => __('Demo Post Eight', 'powen-lite'),
						'link' 		  => '',
						'description' => __('Libero mollitia error expedita totam iste minus cumque quos obcaecati earum rerum totam ea vitae.', 'powen-lite'),
						'image'       => get_template_directory_uri() . '/images/slides/slide1.jpg',
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
		if(powen_mod('content_length') == 'full') {
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