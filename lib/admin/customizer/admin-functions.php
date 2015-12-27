<?php

if( ! function_exists( 'powen_get_image_sizes' ) )
{
  function powen_get_image_sizes( $size = '' )
  {
    global $_wp_additional_image_sizes;

       $sizes = array();
       $get_intermediate_image_sizes = get_intermediate_image_sizes();

       // Create the full array with sizes and crop info
       if( $get_intermediate_image_sizes ){
          foreach( $get_intermediate_image_sizes as $_size ) {

                  if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {

                          $sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
                          $sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
                          $sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );

                  } elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {

                          $sizes[ $_size ] = array(
                                  'width' => $_wp_additional_image_sizes[ $_size ]['width'],
                                  'height' => $_wp_additional_image_sizes[ $_size ]['height'],
                                  'crop' =>  $_wp_additional_image_sizes[ $_size ]['crop']
                          );

                  }

          }
       }

       // Get only 1 size if found
       if ( $size ) {

               if( isset( $sizes[ $size ] ) ) {
                       return $sizes[ $size ];
               } else {
                       return false;
               }

       }

       return $sizes;
  }
}

if( ! function_exists( 'powen_get_image_size' ) )
{
  function powen_get_image_size()
  {
    $sizes = array( 'thumbnail', 'medium', 'large', 'full' );
    $image_size_array = array();

    foreach ($sizes as $size )
    {
      $powen_image_sizes = powen_get_image_sizes( $size );
      $dimenstions = isset( $powen_image_sizes['width'] ) && isset( $powen_image_sizes['height'] ) ? '(' . $powen_image_sizes['width'] . 'x' . $powen_image_sizes['height'] . ')' : false;
      $image_size_array[$size] = "{$size} {$dimenstions}";
    }

    return $image_size_array;
  }
}