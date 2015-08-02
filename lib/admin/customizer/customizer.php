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
      add_action( 'customize_register' , apply_filters('powen_customize_register_add_action', array( $this , 'register' ) ) );

      // Enqueue live preview javascript in Theme Customizer admin screen
      add_action( 'customize_preview_init' , apply_filters('powen_customize_preview_init_add_action', array( $this , 'live_preview' ) ) );
   }

   /**
   * Add postMessage support for site title and description for the Customizer.
   * @param WP_Customize_Manager $wp_customize Customizer object.
   */
  public static function register ( $wp_customize ) {

      /*==============================
              MENU TITLES NAV SECTION
      ===============================*/

      $wp_customize->add_setting( 'powen_mod[menu_one_title_textbox]', apply_filters( 'powen_menu_one_title_add_setting', array(
          'default'           => 'Menu 1',
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[menu_one_title_textbox]', apply_filters('powen_menu_one_title_add_control', array(
          'label'         => __( 'Title Menu 1', 'powen' ),
          'section'       => 'nav',
          'settings'      => 'powen_mod[menu_one_title_textbox]',
      ) ) ) );

      $wp_customize->add_setting( 'powen_mod[menu_two_title_textbox]', apply_filters( 'powen_menu_two_title_add_setting', array(
          'default'           => 'Menu 2',
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[menu_two_title_textbox]', apply_filters('powen_menu_two_title_add_control', array(
          'label'         => __( 'Title Menu 2', 'powen' ),
          'section'       => 'nav',
          'settings'      => 'powen_mod[menu_two_title_textbox]',
      ) ) ) );

      /*==============================
                MEDIA SECTION
      ===============================*/

      $wp_customize->add_section( 'powen_social_media_section', apply_filters('powen_social_media_add_section', array(
          'title'      => __('Social Media', 'powen'),
          'description' => __('Example for Phone url: tel:+13174562564'),
          'priority'   => 50,
          'capability' => 'edit_theme_options',

      ) ) );

      $powen_social_sites = powen_customizer_social_media_array();

      foreach($powen_social_sites as $powen_social_site)
      {
          $wp_customize->add_setting( "powen_mod[{$powen_social_site}]", apply_filters('powen_social_site_add_setting', array(
              'default'           => '',
              'sanitize_callback' => 'esc_url_raw',
              'capability'        => 'edit_theme_options',

          ) ) );

          $wp_customize->add_control( "powen_mod[{$powen_social_site}]" , apply_filters('powen_social_site_add_control', array(
              'label'    => sprintf( __( "%s url:", 'powen' ) , $powen_social_site ),
              'settings' => "powen_mod[{$powen_social_site}]",
              'section'  => 'powen_social_media_section',
              'type'     => 'text',
              'priority' => 10,
          ) ) );
      }

      /*==============================
                SIDEBAR LAYOUT
      ===============================*/

      $wp_customize->add_section( 'powen_sidebar_layout_section' , apply_filters('powen_sidebar_layout_add_section', array(
          'title'      =>  __( 'Sidebar Layout', 'powen' ),
          'capability' => 'edit_theme_options',
      ) ) );

      $wp_customize->add_setting( 'powen_mod[sidebar_position]', apply_filters('powen_sidebar_position_add_setting', array(
          'default'           => 'left',
          'sanitize_callback' => 'powen_sanitize_choices',
          'capability'        => 'edit_theme_options',

      ) ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[sidebar_position]', apply_filters('powen_sidebar_position_add_control', array(
          'label'         =>   __( 'Sidebar Position', 'powen' ),
          'type'          =>  'radio',
          'choices'       =>  array(
            'left'        => __( 'left', 'powen' ),
            'right'       => __( 'right', 'powen' ),
            'no-sidebar'  => __( 'no-sidebar', 'powen' ),
          ),
          'section'       =>  'powen_sidebar_layout_section',
          'settings'      =>  'powen_mod[sidebar_position]',

      ) ) ) );

      /*==============================
                COPYRIGHT TEXT
      ===============================*/

      $wp_customize->add_section( 'powen_copyright_text_section' , apply_filters('powen_copyright_text_add_section', array(
          'title'      =>  __( 'Copyright Text', 'powen' ),
          'capability' => 'edit_theme_options',
      ) ) );

      $wp_customize->add_setting( 'powen_mod[copyright_textbox]', apply_filters('powen_copyright_text_add_sitting', array(
          'default'           => '@copyright',
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[copyright_textbox]', apply_filters('powen_copyright_textbox_add_control', array(
          'label'         => __( 'Copyright Text', 'powen' ),
          'section'       => 'powen_copyright_text_section',
          'settings'      => 'powen_mod[copyright_textbox]',
      ) ) ) );

      /*==============================
                SLIDER
      ===============================*/

      $wp_customize->add_panel( 'powen_slider_pannel', apply_filters('powen_slider_add_pannel', array(
          'priority'       => 10,
          'capability'     => 'edit_theme_options',
          'title'          => __( 'Slider Options', 'powen' ),
          'description'    => __( 'Make slides', 'powen' ),
      ) ) );

      for ( $i=1; $i <= apply_filters( 'powen_increase_slides', '15' ); $i++ ) {

      $wp_customize->add_section( 'powen_slider_section_' . $i, apply_filters('powen_slider_add_section', array(
          'priority'       => 10,
          'capability'     => 'edit_theme_options',
          'title'          => sprintf( __( 'Slide %s' , 'powen' ), $i ),
          'description'    => __( 'Add slide', 'powen' ),
          'panel'          => 'powen_slider_pannel',
      ) ) );

      $wp_customize->add_setting( 'powen_slides['.$i.'][title]', apply_filters('powen_slides_add_setting', array(
          'default'           => '',
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) ) );

      $wp_customize->add_control( 'powen_slides['.$i.'][title]', apply_filters('powen_slides_title_add_control', array(
          'priority' => 10,
          'section'  => 'powen_slider_section_' . $i,
          'label'    => __( 'Title', 'powen' ),
          'settings' => 'powen_slides['.$i.'][title]',
      ) ) );

      $wp_customize->add_setting( 'powen_slides['.$i.'][description]', apply_filters('powen_slides_description_add_setting', array(
          'default'           => '',
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) ) );

      $wp_customize->add_control( 'powen_slides['.$i.'][description]', apply_filters('powen_slides_description_add_control', array(
          'priority' => 10,
          'section'  => 'powen_slider_section_' . $i,
          'label'    => __('Description', 'powen' ),
          'settings' => 'powen_slides['.$i.'][description]',
      ) ) );

      $wp_customize->add_setting( 'powen_slides['.$i.'][link]', apply_filters('powen_slides_link_add_setting', array(
          'default'           => '',
          'sanitize_callback' => 'esc_url_raw',
          'capability'        => 'edit_theme_options',
      ) ) );

      $wp_customize->add_control( 'powen_slides['.$i.'][link]', apply_filters('powen_slides_link_add_control', array(
          'priority' => 10,
          'section'  => 'powen_slider_section_' . $i,
          'label'    => __( 'Link', 'powen' ),
          'settings' => 'powen_slides['.$i.'][link]',
      ) ) );

      $wp_customize->add_setting( 'powen_slides['.$i.'][image]', apply_filters('powen_slides_image_add_setting', array(
          'default'           => '',
          'sanitize_callback' => 'esc_url_raw',
          'capability'        => 'edit_theme_options',
      ) ) );

      $wp_customize->add_control( new WP_Customize_Image_Control ( $wp_customize, 'powen_slides['.$i.'][image]', apply_filters('powen_slides_image_add_control', array(
          'priority' => 10,
          'section'  => 'powen_slider_section_' . $i,
          'label'    => __( 'Image', 'powen' ),
          'description' => __( '(minimum size 640 x 426)' ),
          'settings' => 'powen_slides['.$i.'][image]',
      ) ) ) );

      }

      /*==============================
                COLORS
      ===============================*/

      $theme_colors = apply_filters('powen_theme_colors_array', array(
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

        ) );




      foreach( $theme_colors as $theme_color ) {
          $wp_customize->add_setting(
              $theme_color['slug'], apply_filters('powen_theme_color_add_setting', array(
                  'default'           => $theme_color['default'],
                  'sanitize_callback' => 'sanitize_hex_color',
                  'capability'        => 'edit_theme_options',
              )
          ) );

          $wp_customize->add_control(
              new WP_Customize_Color_Control(
                  $wp_customize,
                  $theme_color['slug'],
                  apply_filters('powen_theme_color_add_control', array(
                  'label'       => $theme_color['label'],
                  'section'     => 'colors',
                  'settings'    => $theme_color['slug']
                  )
            ) ) );
      }

      //Theme Font

      $wp_customize->add_section('powen_font_section', apply_filters('powen_font_add_section', array(
          'title'         => __( 'Theme Font', 'powen' ),
          'capability'  => 'edit_theme_options',

      ) ) );

      $wp_customize->add_setting('powen_mod[theme_font]', apply_filters('powen_theme_font_add_setting', array(
          'default'           => 'Open Sans',
          'sanitize_callback' => 'powen_sanitize_choices',
          'transport'         => 'postMessage',
          'capability'        => 'edit_theme_options',
      ) ) );

      $wp_customize->add_control('powen_mod[theme_font]', apply_filters('powen_theme_font_add_control', array(
          'section'       => 'powen_font_section',
          'label'         => __( 'Theme Font', 'powen' ),
          'type'          => 'select',
          'settings'      => 'powen_mod[theme_font]',
          'choices'       => array(
              'sansserif' => 'sans-serif',
              'serif'     => 'serif',
              'courier'   => 'Courier New',
              'open-sans' => 'Open Sans',
      ) ) ) );

      /*==============================
              SITE TITLE PLACEMENT
      ===============================*/

      //Site Title & Tagline Placement
      $wp_customize->add_setting( 'powen_mod[header_text_placement]', apply_filters('powen_header_text_placement_add_setting', array(
          'default'           => 'center',
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'powen_sanitize_choices',
      ) ) );

      $wp_customize->add_control( 'powen_mod[header_text_placement]', apply_filters('powen_header_text_placement_add_control', array(
          'type'          => 'radio',
          'label'         => __( 'Site Title & Tagline Placement', 'powen' ),
          'section'       => 'title_tagline',
          'settings'      => 'powen_mod[header_text_placement]',
          'choices'       => array(
              'left'      => __( 'left', 'powen' ),
              'right'     => __( 'right', 'powen' ),
              'center'    => __( 'center', 'powen' ),
          ),
      ) ) );


      /*==============================
              LOGO & FAVICON
      ===============================*/

      //Upload logo

      $wp_customize->add_section('powen_logo_section', apply_filters('powen_logo_add_section', array(
          'title'       => __( 'Logo & Favicon', 'powen' ),
          'description' => __( 'Upload your site logo. It will replace the site title and description in the header', 'powen' ),
          'capability'  => 'edit_theme_options',
      ) ) );

      $wp_customize->add_setting( 'powen_mod[upload_logo]' , apply_filters('powen_upload_logo_add_setting', array(
          'default'           => '',
          'sanitize_callback' => 'esc_url_raw',
          'capability'        => 'edit_theme_options',

      ) ) );

      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'powen_mod[upload_logo]', apply_filters('powen_upload_logo_add_control', array(
          'label'    => __( 'Upload logo', 'powen' ),
          'section'  => 'powen_logo_section',
          'settings' => 'powen_mod[upload_logo]',
      ) ) ) );

      //Logo placement
      $wp_customize->add_setting( 'powen_mod[logo_placement]', apply_filters('powen_logo_placement_add_setting', array(
          'default'           => 'left',
          'sanitize_callback' => 'powen_sanitize_choices',
          'capability'        => 'edit_theme_options',

      ) ) );

      $wp_customize->add_control( 'powen_mod[logo_placement]', apply_filters('powen_logo_placement_add_control', array(
          'type'          => 'radio',
          'label'         => __('Logo placement', 'powen'),
          'section'       => 'powen_logo_section',
          'settings'      => 'powen_mod[logo_placement]',
          'choices'       => array(
              'left'      => __( 'left', 'powen' ),
              'right'     => __( 'right', 'powen' ),
              'center'    => __( 'center', 'powen' ),
          ),
      ) ) );

      $wp_customize->add_setting('powen_mod[theme_favicon]', apply_filters('powen_theme_favicon_add_setting', array(
          'default'           => '',
          'sanitize_callback' => 'esc_url_raw',
          'capability'        => 'edit_theme_options',

      ) ) );

      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'powen_mod[theme_favicon]', apply_filters('powen_theme_favicon_add_control', array(
          'label'         => __( 'Upload Favicon', 'powen' ),
          'section'       => 'powen_logo_section',
          'settings'      => 'powen_mod[theme_favicon]',
      ) ) ) );

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