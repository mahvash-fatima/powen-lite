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

      do_action('powen_customize_starts' , $wp_customize );

      /*==============================
                    Css
      ===============================*/

      $wp_customize->add_section( 'powen_css_section' , array(
          'title'      =>  __( 'Custom CSS', 'powen-lite' ),
          'capability' => 'edit_theme_options',
      ) );

      $wp_customize->add_setting( 'powen_mod[css_textarea]', array(
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[css_textarea]', array(
          'label'    => __( 'CSS', 'powen-lite' ),
          'type'     => 'textarea',
          'section'  => 'powen_css_section',
          'settings' => 'powen_mod[css_textarea]',
      ) ) );

      /*==============================
                  CONTENT
      ===============================*/
      $wp_customize->add_panel( 'powen_content_pannel', array(
          'priority'       => 10,
          'capability'     => 'edit_theme_options',
          'title'          => __( 'Content Options', 'powen-lite' ),
      ) );

      //Show Latest Post

      $wp_customize->add_section( 'powen_latest_post_section' , array(
          'title'      =>  __( 'Latest Post', 'powen-lite' ),
          'capability' => 'edit_theme_options',
          'panel'      => 'powen_content_pannel',
      ) );

      $wp_customize->add_setting( 'powen_mod[show_latest_post]', array(
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[show_latest_post]', array(
          'label'    =>   __( 'Show Latest Post in full width', 'powen-lite' ),
          'type'     => 'checkbox',
          'section'  =>  'powen_latest_post_section',
          'settings' =>  'powen_mod[show_latest_post]',
      ) ) );

      //Post Tags

      $wp_customize->add_section( 'powen_post_tags_section' , array(
          'title'      =>  __( 'Post Tags', 'powen-lite' ),
          'capability' => 'edit_theme_options',
          'panel'      => 'powen_content_pannel',
      ) );

      $wp_customize->add_setting( 'powen_mod[post_tags]', array(
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[post_tags]', array(
          'label'    =>   __( 'Hide Post Tags', 'powen-lite' ),
          'type'     => 'checkbox',
          'section'  =>  'powen_post_tags_section',
          'settings' =>  'powen_mod[post_tags]',
      ) ) );

      //Post Categories
      $wp_customize->add_section( 'powen_post_categories_section' , array(
          'title'      =>  __( 'Post Categories', 'powen-lite' ),
          'capability' => 'edit_theme_options',
          'panel'      => 'powen_content_pannel',
      ) );

      $wp_customize->add_setting( 'powen_mod[post_categories]', array(
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[post_categories]', array(
          'label'   =>   __( 'Hide Post Categories', 'powen-lite' ),
          'type'    => 'checkbox',
          'section'  =>  'powen_post_categories_section',
          'settings' =>  'powen_mod[post_categories]',
      ) ) );

      //Full content

      $wp_customize->add_section( 'powen_excerpt_section' , array(
          'title'      =>  __( 'Content Length', 'powen-lite' ),
          'capability' => 'edit_theme_options',
          'panel'      => 'powen_content_pannel',
      ) );

      $wp_customize->add_setting( 'powen_mod[content_length]', array(
          'default'           => 'excerpt',
          'sanitize_callback' => 'powen_sanitize_choices',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[content_length]', array(
          'label'   =>   __( 'Show Content', 'powen-lite' ),
          'type'    =>  'radio',
          'choices' =>  array(
            'full'    => __( 'full', 'powen-lite' ),
            'excerpt' => __( 'excerpt', 'powen-lite' ),
          ),
          'section'  =>  'powen_excerpt_section',
          'settings' =>  'powen_mod[content_length]',
      ) ) );

      //Excerpt Length
      $wp_customize->add_setting( 'powen_mod[excerpt_range]', array(
          'default'           => '50',
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'powen_mod[excerpt_range]', array(
      'type'        => 'text',
      'section'     => 'powen_excerpt_section',
      'label'       => __( 'Excerpt Length', 'powen-lite' ),
      'description' => __( 'Make sure you have selected <strong>excerpt</strong>. Write only <strong>numbers</strong> in textbox and not <strong>px</strong>. It should not be less than <strong>50</strong>', 'powen-lite' ),
      ) ) );

      //Hide author

      $wp_customize->add_setting( 'powen_mod[hide_author]', array(
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'powen_mod[hide_author]', array(
          'label'   => __('Hide The Author of The Post', 'powen-lite'),
          'type'    => 'checkbox',
          'section' => 'powen_display_section',
      ) ) );

      //Hide date

      $wp_customize->add_setting( 'powen_mod[hide_date]', array(
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'powen_mod[hide_date]', array(
          'label'   => __('Hide The Date of The Post', 'powen-lite'),
          'type'    => 'checkbox',
          'section' => 'powen_display_section',
      ) ) );

      //Hide Search Header Search Bar
      $wp_customize->add_section( 'powen_hide_header_search_bar_section' , array(
          'title'      =>  __( 'Header Search Bar', 'powen-lite' ),
          'capability' => 'edit_theme_options',
          'panel'      => 'powen_content_pannel',
      ) );

      $wp_customize->add_setting( 'powen_mod[hide_header_search_bar]', array(
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[hide_header_search_bar]', array(
          'label'    =>   __( 'Hide Header Search Bar', 'powen-lite' ),
          'type'     => 'checkbox',
          'section'  =>  'powen_hide_header_search_bar_section',
          'settings' =>  'powen_mod[hide_header_search_bar]',
      ) ) );


      //COPYRIGHT TEXT

      $wp_customize->add_section( 'powen_modify_text_section' , array(
          'title'      =>  __( 'Modify Text', 'powen-lite' ),
          'capability' => 'edit_theme_options',
          'panel'      => 'powen_content_pannel',
      ) );

      $wp_customize->add_setting( 'powen_mod[copyright_textbox]', array(
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[copyright_textbox]', array(
          'label'    => __( 'Copyright Text', 'powen-lite' ),
          'section'  => 'powen_modify_text_section',
          'settings' => 'powen_mod[copyright_textbox]',
      ) ) );

      //Change Theme Author's Name

      $wp_customize->add_setting( 'powen_mod[theme_author]', array(
          'default'           => __( 'Supernova Themes', 'powen-lite' ),
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[theme_author]', array(
          'label'    => __( "Author's Name", 'powen-lite' ),
          'section'  => 'powen_modify_text_section',
          'settings' => 'powen_mod[theme_author]',
      ) ) );

      /*==============================
              MENU TITLES NAV SECTION
      ===============================*/

      $wp_customize->add_setting( 'powen_mod[menu_one_title_textbox]', array(
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[menu_one_title_textbox]', array(
          'label'    => __( 'Top Most Menu Title', 'powen-lite' ),
          'section'  => 'menu_locations',
          'settings' => 'powen_mod[menu_one_title_textbox]',
      ) ) );

      $wp_customize->add_setting( 'powen_mod[hide_menu_one]', array(
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'powen_mod[hide_menu_one]', array(
          'type'    => 'checkbox',
          'label'   => __('Hide', 'powen-lite'),
          'section' => 'menu_locations',
      ) ) );

      $wp_customize->add_setting( 'powen_mod[menu_two_title_textbox]', array(
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[menu_two_title_textbox]', array(
          'label'    => __( 'Main Menu Title', 'powen-lite' ),
          'section'  => 'menu_locations',
          'settings' => 'powen_mod[menu_two_title_textbox]',
      ) ) );

      $wp_customize->add_setting( 'powen_mod[hide_menu_two]', array(
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'powen_mod[hide_menu_two]', array(
          'type'    => 'checkbox',
          'label'   => __('Hide', 'powen-lite'),
          'section' => 'menu_locations',
      ) ) );

      /*==============================
                MEDIA SECTION
      ===============================*/

      $wp_customize->add_section( 'powen_social_media_section', array(
          'title'       => __('Social Media', 'powen-lite'),
          'description' => __('Example for Phone url: tel:+13174562564', 'powen-lite'),
          'priority'    => 50,
          'capability'  => 'edit_theme_options',
      ) );

      $powen_social_sites = powen_customizer_social_media_array();

      foreach($powen_social_sites as $powen_social_site)
      {
          $wp_customize->add_setting( "powen_mod[{$powen_social_site}]", array(
              'sanitize_callback' => 'esc_url_raw',
              'capability'        => 'edit_theme_options',
          ) );

          $wp_customize->add_control( "powen_mod[{$powen_social_site}]" , array(
              'label'    => sprintf( __( "%s url:", 'powen-lite' ) , $powen_social_site ),
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
          'title'      =>  __( 'Sidebar Layout', 'powen-lite' ),
          'capability' => 'edit_theme_options',
      ) );

      $wp_customize->add_setting( 'powen_mod[sidebar_position]', array(
          'default'           => 'right',
          'sanitize_callback' => 'powen_sanitize_choices',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_mod[sidebar_position]', array(
          'label'   =>   __( 'Sidebar Position', 'powen-lite' ),
          'type'    =>  'radio',
          'choices' =>  array(
            'left'       => __( 'left', 'powen-lite' ),
            'right'      => __( 'right', 'powen-lite' ),
            'no-sidebar' => __( 'no-sidebar', 'powen-lite' ),
            ),
          'section'  =>  'powen_sidebar_layout_section',
          'settings' =>  'powen_mod[sidebar_position]',
      ) ) );

      /*==============================
                SLIDER
      ===============================*/

      global $powen_theme;
      $url = $powen_theme->get('AuthorURI') . "/powen-pro-pricing/";
      $description = ! defined( 'POWEN_PRO' ) ? __( 'For More Options Upgrade to ', 'powen-lite' ) . "<a href='{$url}'>".__( 'Powen Pro' , 'powen-lite' )."</a>" : false;
      $urldesc     = esc_url('https://www.paypal.com/cgi-bin/webscr?cmd=_xclick&business=sayedwp@gmail.com&item_name=Donation for Powen Lite', 'powen-lite');
      $desc        = ! defined( 'POWEN_PRO' ) ? __( 'Please support the development of your theme - ', 'powen-lite' ) . "<a href='{$urldesc}'>".__( 'Donate', 'powen-lite' )."</a>" : false;

      $wp_customize->add_panel( 'powen_slider_pannel', array(
          'priority'       => 10,
          'capability'     => 'edit_theme_options',
          'title'          => __( 'Slider Options', 'powen-lite' ),
          'description'    => __( 'Add slider', 'powen-lite' ),
      ) );

      $wp_customize->add_section( 'powen_slider_section_pro', array(
           'priority'    => 9,
           'capability'  => 'edit_theme_options',
           'title'       => __( 'Powen Pro' , 'powen-lite' ),
           'description' => $description . "<br/><br/>" . $desc,
           'type'        => 'checkbox',
           'panel'       => 'powen_slider_pannel',
      ) );

      $wp_customize->add_setting( 'powen_mod[hide_slider]', array(
          'default'           => 0,
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'powen_mod[hide_slider]', array(
          'label'   => __('Hide Slider', 'powen-lite'),
          'type'    => 'checkbox',
          'section' => 'powen_slider_section_pro',
      ) ) );

      $wp_customize->add_setting( 'powen_mod[fixed_slider_content]', array(
          'default'           => 0,
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Control ( $wp_customize, 'powen_mod[fixed_slider_content]', array(
          'label'   => __('Fixed Slider Content', 'powen-lite'),
          'type'    => 'checkbox',
          'section' => 'powen_slider_section_pro',
      ) ) );

      $default_slides = get_theme_mod( 'powen_slides', powen_default_slides() );

      for ( $i = 0; $i <= apply_filters( 'powen_increase_slides', 19 ); $i++ ) {

      $wp_customize->add_section( 'powen_slider_section_' . $i, array(
          'priority'    => 10,
          'capability'  => 'edit_theme_options',
          'title'       => sprintf( __( 'Slide %s' , 'powen-lite' ), $i+1 ),
          'description' => __( 'Note: All default slide values will be discarded, the moment you make any changes to the slide.', 'powen-lite' ),
          'panel'       => 'powen_slider_pannel',
      ) );

      $wp_customize->add_setting( 'powen_slides['.$i.'][title]', array(
          'default'           => isset( $default_slides[$i]['title'] ) ? $default_slides[$i]['title'] : '',
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( 'powen_slides['.$i.'][title]', array(
          'priority' => 10,
          'section'  => 'powen_slider_section_' . $i,
          'label'    => __( 'Title', 'powen-lite' ),
          'settings' => 'powen_slides['.$i.'][title]',
      ) );

      $wp_customize->add_setting( 'powen_slides['.$i.'][description]', array(
          'default'           => isset( $default_slides[$i]['description'] ) ? $default_slides[$i]['description'] : '',
          'sanitize_callback' => 'sanitize_text_field',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( 'powen_slides['.$i.'][description]', array(
          'priority' => 10,
          'section'  => 'powen_slider_section_' . $i,
          'label'    => __('Description', 'powen-lite' ),
          'settings' => 'powen_slides['.$i.'][description]',
      ) );

      $wp_customize->add_setting( 'powen_slides['.$i.'][link]', array(
          'default'           => isset( $default_slides[$i]['link'] ) ? esc_url($default_slides[$i]['link']) : '',
          'sanitize_callback' => 'esc_url_raw',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( 'powen_slides['.$i.'][link]', array(
          'priority' => 10,
          'section'  => 'powen_slider_section_' . $i,
          'label'    => __( 'Link', 'powen-lite' ),
          'settings' => 'powen_slides['.$i.'][link]',
      ) );

      $wp_customize->add_setting( 'powen_slides['.$i.'][image]', array(
          'default'           => isset( $default_slides[$i]['image'] ) ? esc_url($default_slides[$i]['image']) : '',
          'sanitize_callback' => 'esc_url_raw',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Image_Control ( $wp_customize, 'powen_slides['.$i.'][image]', array(
          'priority'    => 10,
          'section'     => 'powen_slider_section_' . $i,
          'label'       => __( 'Image', 'powen-lite' ),
          'settings'    => 'powen_slides['.$i.'][image]',
      ) ) );

      }

      /*==============================
                COLORS
      ===============================*/

      $theme_colors = apply_filters('powen_theme_colors_array', array(
            array(
                      'slug'    =>'powen_mod[theme_color]',
                      'default' => '#daa520',
                      'label'   => __( 'Theme Color', 'powen-lite' )
                  ),
            array(
                      'slug'    =>'powen_mod[hover_link_color]',
                      'default' => '#dd9933',
                      'label'   => __( 'Link Color (on hover)', 'powen-lite' )
                  ),
            array(
                      'slug'    =>'powen_mod[header_textcolor]',
                      'default' => '#000',
                      'label'   => __( 'Site Title Color', 'powen-lite' )
                  ),
            array(
                      'slug'    =>'powen_mod[header_taglinecolor]',
                      'default' => '#222222',
                      'label'   => __( 'Site Tagline Color', 'powen-lite' )
                  ),
            array(
                      'slug'    =>'powen_mod[header_background]',
                      'default' => '#ffffff',
                      'label'   => __( 'Header Background Color', 'powen-lite' )
                  ),
            array(
                      'slug'    =>'powen_mod[powen-footer-widgets_background]',
                      'default' => '#222222',
                      'label'   => __( 'Footer widgets background color', 'powen-lite' )
                  ),
            array(
                      'slug'    =>'powen_mod[powen-footer-widgets_textcolor]',
                      'default' => '#808080',
                      'label'   => __( 'Footer widgets text color', 'powen-lite' )
                  ),

            array(
                      'slug'    =>'powen_mod[powen-footer-widgets_linkcolor]',
                      'default' => '#cccccc',
                      'label'   => __( 'Footer widgets link color', 'powen-lite' )
                  ),
            array(
                      'slug'    =>'powen_mod[footer_bottom_background_color]',
                      'default' => '#000000',
                      'label'   => __( 'Footer bottom background color', 'powen-lite' )
                  ),
            array(
                      'slug'    =>'powen_mod[footer_bottom_textcolor]',
                      'default' => '#999999',
                      'label'   => __( 'Footer bottom text color', 'powen-lite' )
                  ),
            ) );

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
                'label'    => $theme_color['label'],
                'section'  => 'colors',
                'settings' => $theme_color['slug']
                )
            ) );
      }

      /*==============================
              SITE TITLE PLACEMENT
      ===============================*/

      //Site Title & Tagline Placement
      $wp_customize->add_setting( 'powen_mod[header_text_placement]', array(
          'default'           => 'center',
          'capability'        => 'edit_theme_options',
          'sanitize_callback' => 'powen_sanitize_choices',
      ) );

      $wp_customize->add_control( 'powen_mod[header_text_placement]', array(
          'type'     => 'radio',
          'label'    => __( 'Site Title & Tagline Placement', 'powen-lite' ),
          'section'  => 'title_tagline',
          'settings' => 'powen_mod[header_text_placement]',
          'choices'  => array(
              'left'   => __( 'left', 'powen-lite' ),
              'right'  => __( 'right', 'powen-lite' ),
              'center' => __( 'center', 'powen-lite' ),
          ),
      ) );

      /*==============================
              LOGO & FAVICON
      ===============================*/

      //Upload logo

      $wp_customize->add_setting( 'powen_mod[upload_logo]', array(
          'sanitize_callback' => 'esc_url_raw',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'powen_mod[upload_logo]', array(
          'label'    => __( 'Upload logo', 'powen-lite' ),
          'section'  => 'title_tagline',
          'settings' => 'powen_mod[upload_logo]',
      ) ) );


      //Logo placement
      $wp_customize->add_setting( 'powen_mod[logo_placement]', array(
          'default'           => 'center',
          'sanitize_callback' => 'powen_sanitize_choices',
          'capability'        => 'edit_theme_options',
      ) );

      $wp_customize->add_control( 'powen_mod[logo_placement]', array(
          'type'     => 'radio',
          'label'    => __('Logo placement', 'powen-lite'),
          'section'  => 'title_tagline',
          'settings' => 'powen_mod[logo_placement]',
          'choices'  => array(
              'left'   => __( 'left', 'powen-lite' ),
              'right'  => __( 'right', 'powen-lite' ),
              'center' => __( 'center', 'powen-lite' ),
          ),
      ) );

      // We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

      do_action('powen_customize_ends' , $wp_customize );

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