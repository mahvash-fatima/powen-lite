<?php

/**
 * This file contains all custom functions used in the theme.
 * @package Powen
 */


function powen_mod( $key , $default = false )
{
	$powen_mod = get_theme_mod('powen_mod' );
	$saved_value = isset($powen_mod[$key]) && $powen_mod[$key] ? $powen_mod[$key] : $default;

	$keys_to_be_escaped = array(
		'theme_font',
		'header_textcolor',
		'header_taglinecolor',
		'background_color',
		'header_background',
		'footer_widgets_background',
		'footer_widgets_textcolor',
		'footer_widgets_linkcolor',
		'footer_bottom_textcolor',
		'footer_bottom_background_color',
		'theme_color',
		'hover_link_color',
		'header_text_placement',
		'logo_placement',
		'sidebar_position'
		);

	if( in_array( $key , $keys_to_be_escaped ) ){
		$saved_value = esc_html( $saved_value ); //As suggested by kevinhaig
	}

	//Rest will be escaped at the point where we output the data.
	return $saved_value;
}


/**
 * Used to check if a value is set or not for our global variable $powen_options,
 * so it doesn't return undefined index error in debug mode.
 * @param  [string]  $key1 first or the only key of the array
 * @param  [string] $key2 (optional) the second key of the array.
 * @return [mixed]        the value of $powen_options key provided
 */
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