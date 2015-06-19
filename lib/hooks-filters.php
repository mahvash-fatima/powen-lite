<?php

/**
 * Contains all the filters and actions hooked.
 */


/*==============================
          ACTIONS
===============================*/

function powen_user_scripts(){ 

  echo "<script>";
  echo powen_options( 'opt-ace-editor-js' );
  echo "</script>";

  echo "<style>";
  echo powen_options('opt-ace-editor-css');
  echo "</style>";

}

add_action( 'wp_head', 'powen_user_scripts' );

//Removing the post format meta box
add_action('after_setup_theme', 'powen_remove_formats', 100);

function powen_remove_formats()
{
   remove_theme_support('post-formats');
}

/*==============================
          FILTERS
===============================*/

/**
 * Changes the tag cloud font sizes, so it better fits with the theme
 */
function powen_set_tag_cloud_sizes($args)
{
	 $args['smallest'] = 8;
	 $args['largest'] = 22;
	 
	 return $args; 
}

add_filter('widget_tag_cloud_args','powen_set_tag_cloud_sizes');