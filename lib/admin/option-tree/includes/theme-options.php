<?php
/**
 * Initialize the custom theme options.
 */
add_action( 'init', 'powen_custom_theme_options' );

/**
 * Build the custom settings & update OptionTree.
 */
function powen_custom_theme_options() {
  
  /* OptionTree is not loaded yet, or this is not an admin request */
  if ( ! function_exists( 'powen_settings_id' ) || ! is_admin() )
    return false;
    
  /**
   * Get a copy of the saved settings array. 
   */
  $powen_saved_settings = get_option( powen_settings_id(), array() );
  
  /**
   * Custom settings array that will eventually be 
   * passes to the OptionTree Settings API Class.
   */
  $powen_custom_settings = array( 
    'contextual_help' => array( 
      'sidebar'       => ''
    ),
    'sections'        => array( 
      array(
        'id'          => 'powen_slider_settings',
        'title'       => __( 'Slider', 'powen' )
      ),
    ),
    'settings'        => array( 
      array(
        'id'          => 'powen_slider_settings',
        'label'       => __( 'Slider', 'powen' ),
        'desc'        => '',
        'std'         => '',
        'type'        => 'slider',
        'section'     => 'powen_slider_settings',
        'rows'        => '',
        'post_type'   => '',
        'taxonomy'    => '',
        'min_max_step'=> '',
        'class'       => '',
        'condition'   => '',
        'operator'    => 'and'
      ),
    )
  );
  
  /* allow settings to be filtered before saving */
  $powen_custom_settings = apply_filters( powen_settings_id() . '_args', $powen_custom_settings );
  
  /* settings are not the same update the DB */
  if ( $powen_saved_settings !== $powen_custom_settings ) {
    update_option( powen_settings_id(), $powen_custom_settings ); 
  }
  
  /* Lets OptionTree know the UI Builder is being overridden */
  global $powen_has_custom_theme_options;
  $powen_has_custom_theme_options = true;
  
}