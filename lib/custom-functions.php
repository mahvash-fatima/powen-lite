<?php

/**
 * This file contains all custom functions used in the theme.
 * @package Powen
 */

function powen_mod( $key , $default = false ) {
	$powen_cus = get_theme_mod('powen_cus' );
	return isset($powen_cus[$key]) && $powen_cus[$key] ? $powen_cus[$key] : $default;
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


