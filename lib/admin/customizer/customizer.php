<?php
  /**
   * Contains options for Customizer Admin
   * @package powen
   * @since powen 1.0
   */

class Powen_Customizer {

   public function __construct()
   {
      // Setup the Theme Customizer settings and controls...
      add_action( 'customize_register' , array( $this , 'register' ) );

      // Enqueue live preview javascript in Theme Customizer admin screen
      add_action( 'customize_preview_init' , array( $this , 'live_preview' ) );
   }

   /**
   * Add postMessage support for site title and description for the Customizer.
   * @param WP_Customize_Manager $wp_customize Customizer object.
   */
  public static function register ( $wp_customize ) {

      /*==============================
                MEDIA SECTION
      ===============================*/

      $wp_customize->add_section( 'powen_social_media_section', array(
          'title'      => __('Social Media', 'powen'),
          'priority'   => 50,
          'capability' => 'edit_theme_options',

      ) );

      $powen_social_sites = powen_customizer_social_media_array();

      foreach($powen_social_sites as $powen_social_site)
      {
          $wp_customize->add_setting( "powen_mod[{$powen_social_site}]", array(
              'default'           => '',
              'sanitize_callback' => 'esc_url_raw',
              'capability'        => 'edit_theme_options',
  
          ));

          $wp_customize->add_control( "powen_mod[{$powen_social_site}]" , array(
              'label'    => __( "{$powen_social_site} url:", 'powen' ),
              'settings' => "powen_mod[{$powen_social_site}]",
              'section'  => 'powen_social_media_section',
              'type'     => 'text',
              'priority' => 10,
          ) );
      }


      /*==============================
                SIDEBAR LAYOUT
      ===============================*/

      $wp_customize->add_section( 'powen_sidebar_layout_section' , array(
          'title'      =>  __( 'Sidebar Layout', 'powen' ),
          'capability' => 'edit_theme_options',
      ));

      $wp_customize->add_setting( 'powen_mod[sidebar_position]', array(
          'default'           => 'left',
          'sanitize_callback' => 'powen_sanitize_choices',
          'capability'        => 'edit_theme_options',

      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[sidebar_position]', array(
          'label'         =>   __( 'Sidebar Position', 'powen' ),
          'type'          =>  'radio',
          'choices'       =>  array( 
            'left'        => __( 'left', 'powen' ),
            'right'       => __( 'right', 'powen' ),
            'no-sidebar'  => __( 'no-sidebar', 'powen' ),
          ),
          'section'       =>  'powen_sidebar_layout_section',
          'settings'      =>  'powen_mod[sidebar_position]',

      ) ) );

      // Copyright Text

      $wp_customize->add_section( 'powen_copyright_text_section' , array(
          'title'      =>  __( 'Copyright Text', 'powen' ),
          'capability' => 'edit_theme_options',
      ) );

      $wp_customize->add_setting( 'powen_mod[copyright_textbox]', array(
          'default'           => '@copyright',
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[copyright_textbox]', array(
          'label'         => __( 'Copyright Text', 'powen' ),
          'section'       => 'powen_copyright_text_section',
          'settings'      => 'powen_mod[copyright_textbox]',
      ) ) );

      /*==============================
                SLIDER
      ===============================*/

      $wp_customize->add_panel( 'powen_slider_pannel', array(
          'priority'       => 10,
          'capability'     => 'edit_theme_options',
          'title'          => __( 'Slider Options', 'powen' ),
          'description'    => __( 'Add slider', 'powen' ),
      ) );

      for ( $i=1; $i <= 8; $i++ ) {

      $wp_customize->add_section( 'powen_slider_section_' . $i, array(
          'priority'       => 10,
          'capability'     => 'edit_theme_options',
          'title'          => __( 'Slide ' . $i , 'powen' ),
          'description'    => __( 'Add slides', 'powen' ),
          'panel'          => 'powen_slider_pannel',
      ) );

      $wp_customize->add_setting( 'powen_slides['.$i.'][title]', array(
          'default'           => '',
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( 'powen_slides['.$i.'][title]', array(
          'priority' => 10,
          'section'  => 'powen_slider_section_' . $i,
          'label'    => __( 'Title', 'powen' ),
          'settings' => 'powen_slides['.$i.'][title]',
      ) );

      $wp_customize->add_setting( 'powen_slides['.$i.'][description]', array(
          'default'           => '',
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( 'powen_slides['.$i.'][description]', array(
          'priority' => 10,
          'section'  => 'powen_slider_section_' . $i,
          'label'    => __('Description', 'powen' ),
          'settings' => 'powen_slides['.$i.'][description]',
      ) );

      $wp_customize->add_setting( 'powen_slides['.$i.'][link]', array(
          'default'           => '',
          'sanitize_callback' => 'esc_url_raw',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( 'powen_slides['.$i.'][link]', array(
          'priority' => 10,
          'section'  => 'powen_slider_section_' . $i,
          'label'    => __( 'Link', 'powen' ),
          'settings' => 'powen_slides['.$i.'][link]',
      ) );

      $wp_customize->add_setting( 'powen_slides['.$i.'][image]', array(
          'default'           => '',
          'sanitize_callback' => 'esc_url_raw',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Image_Control ( $wp_customize, 'powen_slides['.$i.'][image]', array(
          'priority' => 10,
          'section'  => 'powen_slider_section_' . $i,
          'label'    => __( 'Image', 'powen' ),
          'settings' => 'powen_slides['.$i.'][image]',
      ) ) );

      }

      /*==============================
                COLORS
      ===============================*/


      $theme_colors = array(
            array(
                      'slug'    =>'powen_mod[theme_color]',
                      'default' => '#6897bb',
                      'label'   => __( 'Theme Color', 'powen' )
                  ),
            array(
                      'slug'    =>'powen_mod[hover_link_color]',
                      'default' => '#fa8072',
                      'label'   => __( 'Link Color (on hover)', 'powen' )
                  ),
            array(
                      'slug'    =>'powen_mod[header_textcolor]',
                      'default' => '#000',
                      'label'   => __( 'Header Title Color', 'powen' )
                  ),
            array(
                      'slug'    =>'powen_mod[header_taglinecolor]',
                      'default' => '#222222',
                      'label'   => __( 'Header Tagline Color', 'powen' )
                  ),
            array(
                      'slug'    =>'powen_mod[header_background]',
                      'default' => '#ffffff',
                      'label'   => __( 'Header Background Color', 'powen' )
                  ),
            array(
                      'slug'    =>'powen_mod[footer_widgets_background]',
                      'default' => '#222222',
                      'label'   => __( 'Footer widgets background color', 'powen' )
                  ),
            array(
                      'slug'    =>'powen_mod[footer_widgets_textcolor]',
                      'default' => '#808080',
                      'label'   => __( 'Footer widgets text color', 'powen' )
                  ),

            array(
                      'slug'    =>'powen_mod[footer_widgets_linkcolor]',
                      'default' => '#cccccc',
                      'label'   => __( 'Footer widgets link color', 'powen' )
                  ),
            array(
                      'slug'    =>'powen_mod[footer_bottom_background_color]',
                      'default' => '#000000',
                      'label'   => __( 'Footer bottom background color', 'powen' )
                  ),
            array(
                      'slug'    =>'powen_mod[footer_bottom_textcolor]',
                      'default' => '#999999',
                      'label'   => __( 'Footer bottom text color', 'powen' )
                  ),

        );


      foreach( $theme_colors as $theme_color ) {
          $wp_customize->add_setting(
              $theme_color['slug'], array(
                  'default'           => $theme_color['default'],
                  'sanitize_callback' => 'sanitize_hex_color',
                  'capability'        => 'edit_theme_options',
              )
          );

          $wp_customize->add_control(
              new WP_Customize_Color_Control(
                  $wp_customize,
                  $theme_color['slug'],
                  array(
                  'label'       => $theme_color['label'],
                  'section'     => 'colors',
                  'settings'    => $theme_color['slug']
                  )
            ));
      }

      //Theme Font

      $wp_customize->add_section('powen_font_section', array(
          'title'         => __( 'Theme Font', 'powen' ),
          'capability'  => 'edit_theme_options',

      ) );

      $wp_customize->add_setting('powen_mod[theme_font]', array(
          'default'           => 'Open Sans',
          'sanitize_callback' => 'powen_sanitize_choices',
          'transport'         => 'postMessage',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control('powen_mod[theme_font]', array(
          'section'       => 'powen_font_section',
          'label'         => __( 'Theme Font', 'powen' ),
          'type'          => 'select',
          'settings'      => 'powen_mod[theme_font]',
          'choices'       => array(
              'sansserif' => 'sans-serif',
              'serif'     => 'serif',
              'courier'   => 'Courier New',
              'open-sans' => 'Open Sans',
      ) ) );


      /*==============================
              LOGO & FAVICON
      ===============================*/

      $wp_customize->add_section('powen_logo_section', array(
          'title'       => __( 'Logo & Favicon', 'powen' ),
          'description' => __( 'Upload a logo to replace the default site name and description in the header', 'powen' ),
          'capability'  => 'edit_theme_options',
      ));

      //Site Title & Tagline Placement
      $wp_customize->add_setting( 'powen_mod[header_text_placement]', array(
          'default'           => 'center',
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'powen_sanitize_choices',
      ) );

      $wp_customize->add_control( 'powen_mod[header_text_placement]', array(
          'type'          => 'radio',
          'label'         => __( 'Site Title & Tagline Placement', 'powen' ),
          'section'       => 'powen_logo_section',
          'settings'      => 'powen_mod[header_text_placement]',
          'choices'       => array(
              'left'      => __( 'left', 'powen' ),
              'right'     => __( 'right', 'powen' ),
              'center'    => __( 'center', 'powen' ),
          ),
      ) );

      //Logo placement
      $wp_customize->add_setting( 'powen_mod[logo_placement]', array(
          'default'           => 'left',
          'sanitize_callback' => 'powen_sanitize_choices',
          'capability'        => 'edit_theme_options',

      ) );

      $wp_customize->add_control( 'powen_mod[logo_placement]', array(
          'type'          => 'radio',
          'label'         => __('Logo placement', 'powen'),
          'section'       => 'powen_logo_section',
          'settings'      => 'powen_mod[logo_placement]',
          'choices'       => array(
              'left'      => __( 'left', 'powen' ),
              'right'     => __( 'right', 'powen' ),
              'center'    => __( 'center', 'powen' ),
          ),
      ) );

      $wp_customize->add_setting('powen_mod[theme_favicon]', array(
          'default'           => '',
          'sanitize_callback' => 'esc_url_raw',
          'capability'        => 'edit_theme_options',

      ));

      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'powen_mod[theme_favicon]', array(
          'label'         => __( 'Upload Favicon', 'powen' ),
          'section'       => 'powen_logo_section',
          'settings'      => 'powen_mod[theme_favicon]',
      ) ) );

        //Upload logo

        $wp_customize->add_setting( 'powen_mod[upload_logo]' , array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'capability'        => 'edit_theme_options',

        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'powen_mod[upload_logo]', array(
            'label'    => __( 'Upload logo', 'powen' ),
            'section'  => 'powen_logo_section',
            'settings' => 'powen_mod[upload_logo]',
        ) ) );

      // We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

  }


   /**
    * This outputs the javascript needed to automate the live settings preview.
    * Also keep in mind that this function isn't necessary unless your settings
    * are using 'transport'=>'postMessage' instead of the default 'transport'
    * @since powen 1.0
    */
  public static function live_preview() {
    wp_enqueue_script(
        'powen-themecustomizer', // Give the script a unique ID
        get_template_directory_uri() . '/js/theme-customizer.js', // Define the path to the JS file
        array(  'jquery', 'customize-preview' ), // Define dependencies
        '1.0', // Define a version (optional)
        true // Specify whether to put in footer (leave this true)
    );

  }

}

new Powen_Customizer();

/**
 * Used for sanitizing radio or select options in customizer
 * @param  mixed $input  user input
 * @param  mixed $setting choices provied to the user.
 * @return mixed  output after sanitization
 * @since Powen 1.1.3
 */
function powen_sanitize_choices( $input, $setting ) {
  global $wp_customize;

  $control = $wp_customize->get_control( $setting->id );

  if ( array_key_exists( $input, $control->choices ) ) {
    return $input;
  } else {
    return $setting->default;
  }
}