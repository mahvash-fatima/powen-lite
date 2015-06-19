<?php
  /**
   * powen Customizer functionality
   *
   * @package WordPress
   * @subpackage powen
   * @since powen 1.0
   */
  class Powen_Customize {
   /**
   * Add postMessage support for site title and description for the Customizer.
   *
   * @since powen 1.0
   *
   * @param WP_Customize_Manager $wp_customize Customizer object.
   */
  public static function register ( $wp_customize ) {
  
      // Define a new section (if desired) to the Theme Customizer
      $wp_customize->add_section( 'powen_options', 
         array(
            'title'       => __( 'Powen Options', 'powen' ), //Visible title of section
            'priority'    => 35, //Determines what order this appears in
            'capability'  => 'edit_theme_options', //Capability needed to tweak
            'description' => __('Allows you to customize some example settings for Powen.', 'powen'), //Descriptive tooltip
      ) );

      // Social Media

      $wp_customize->add_section( 'powen_social_media_section', array(
          'title'         => 'Social Media',
          'priority'      => 50,
      ) );
        
      $powen_social_sites = powen_customizer_social_media_array();
        
      foreach($powen_social_sites as $powen_social_site) {
        
          $wp_customize->add_setting( "$powen_social_site", array(
          'default'       => '',
          'sanitize_callback' => 'esc_url_raw',
      ) );
       
      $wp_customize->add_control( $powen_social_site, array(
          'label'         => __( "$powen_social_site url:", 'powen' ),
          'section'       => 'powen_social_media_section',
          'type'          => 'text',
          'priority'      => 10,
      ) );
      
      }

      // Sidebar Layout
      
      $wp_customize->add_section( 'powen_sidebar_layout_section' , array(
          'title'         =>  __( 'Sidebar Layout', 'powen' ),
      ) );
      
      $wp_customize->add_setting( 'powen_sidebar_position', array(
          'sanitize_callback' => 'sanitize_mime_type',
      ) );
      
      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_sidebar_position', array(
          'label'         =>   __( 'Sidebar Position', 'powen' ),
          'type'          =>  'radio', 
          'choices'       =>  array( 'left' => 'left', 'right' => 'right', 'no-sidebar' => 'no-sidebar'),
          'section'       =>  'powen_sidebar_layout_section',
          'settings'      =>  'powen_sidebar_position',

      ) ) );

      // Copyright Text

      $wp_customize->add_section( 'powen_copyright_text_section' , array(
          'title'         =>  __( 'Copyright Text', 'powen' ),
      ) );

      $wp_customize->add_setting( 'powen_copyright_textbox', array(
          'default'       => '@copyright',
          'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_copyright_textbox', array(
          'type'          => 'text',
          'label'         => __( 'Copyright Text', 'powen' ),
          'section'       => 'powen_copyright_text_section',
          'settings'      => 'powen_copyright_textbox',
      ) ) );

      //Hide copyright text

      $wp_customize->add_setting( 'powen_hide_copyright', array(
          'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( 'powen_hide_copyright', array(
          'type'          => 'checkbox',
          'label'         => __( 'Hide copyright text', 'powen' ),
          'section'       => 'powen_copyright_text_section',
      ) );

      // Website name

      $wp_customize->add_setting( 'powen_website_name', array(
          'default'       => 'Powen',
          'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_website_name', array(
          'type'          => 'text',
          'label'         => __( 'Website name', 'powen' ),
          'section'       => 'powen_copyright_text_section',
          'settings'      => 'powen_website_name',
      ) ) );

      // Author name

      $wp_customize->add_setting( 'powen_author_name', array(
          'default'       => '',
          'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_author_name', array(
          'type'          => 'text',
          'label'         => __( 'Author name', 'powen' ),
          'section'       => 'powen_copyright_text_section',
          'settings'      => 'powen_author_name',
      ) ) );

      // Author URI

      $wp_customize->add_setting( 'powen_author_uri', array(
          'default'       => '',
          'sanitize_callback' => 'esc_url_raw',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_author_uri', array(
          'type'          => 'text',
          'label'         => __( 'Author URI', 'powen' ),
          'section'       => 'powen_copyright_text_section',
          'settings'      => 'powen_author_uri',
      ) ) );

      //Site Title & Tagline Placement

      $wp_customize->add_setting( 'powen_header_text_placement', array(
          'default'       => 'left',
          'sanitize_callback' => 'esc_url_raw',
      ) );

      $wp_customize->add_control( 'powen_header_text_placement', array(
          'type'          => 'radio',
          'label'         => __( 'Site Title & Tagline Placement', 'powen' ),
          'section'       => 'powen_logo_section',
          'choices'       => array(
              'left'      => 'Left',
              'right'     => 'Right',
              'center'    => 'Center',
          ),
      ) );

      //header text color
      $wp_customize->add_setting('header_textcolor' , array(
          'default'       => '#000000',
          'transport'     => 'refresh',
          'sanitize_callback' => 'sanitize_hex_color',
      ) );

      $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_textcolor', array(
          'label'         => __( 'Header Title Color', 'powen' ),
          'section'       => 'colors',
          'settings'      => 'header_textcolor',
      ) ) );

      //Header Tagline Color

      $wp_customize->add_setting( 'powen_header_taglinecolor', array(
          'default'       => '#222222',
          'transport'     => 'refresh', 
          'sanitize_callback' => 'sanitize_hex_color',   
      ) );

      $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'powen_header_taglinecolor', array(
          'label'         => __( 'Header Tagline Color', 'powen' ),
          'section'       => 'colors',
          'settings'      => 'powen_header_taglinecolor',
      ) ) );

      //Header Background Color

      $wp_customize->add_setting( 'powen_header_background' , array(
          'default'       => '#ffffff',
          'transport'     => 'refresh',
          'sanitize_callback' => 'sanitize_hex_color',
      ) );

      $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'powen_header_background', array(
        'label'           => __( 'Header Background Color', 'powen' ),
        'section'         => 'colors',
        'settings'        => 'powen_header_background',
      ) ) );

      //Footer Colors

      $wp_customize->add_section('powen_footer_background_section', array(
          'title'         => __( 'Footer Colors', 'powen' ),
      ));

      //Footer widgets background color

      $wp_customize->add_setting( 'powen_footer_widgets_background' , array(
          'default'       => '#222222',
          'transport'     => 'refresh',
          'sanitize_callback' => 'esc_url_raw',
      ) );

      $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'powen_footer_widgets_background', array(
        'label'           => __( 'Footer widgets background color', 'powen' ),
        'section'         => 'powen_footer_background_section',
        'settings'        => 'powen_footer_widgets_background',
      ) ) );

      //Footer widgets text color

      $wp_customize->add_setting( 'powen_footer_widgets_textcolor', array(
        'default'         => '#808080',
        'transport'       => 'refresh',
        'sanitize_callback' => 'sanitize_hex_color',    
      ) );
      $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'powen_footer_widgets_textcolor', array(
        'label'           => __( 'Footer widgets text color', 'powen' ),
        'section'         => 'powen_footer_background_section',
        'settings'        => 'powen_footer_widgets_textcolor',
      ) ) );

      //Footer widgets link color

      $wp_customize->add_setting( 'powen_footer_widgets_linkcolor', array(
        'default'         => '#cccccc',
        'transport'       => 'refresh', 
        'sanitize_callback' => 'esc_url_raw',   
      ) );
      
      $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'powen_footer_widgets_linkcolor', array(
        'label'           => __( 'Footer widgets link color', 'powen' ),
        'section'         => 'powen_footer_background_section',
        'settings'        => 'powen_footer_widgets_linkcolor',
      ) ) );

      //Footer bottom background color

      $wp_customize->add_setting( 'powen_footer_bottom_background_color' , array(
          'default'       => '#000000',
          'transport'     => 'refresh',
          'sanitize_callback' => 'sanitize_hex_color',
      ) );

      $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'powen_footer_bottom_background_color', array(
        'label'           => __( 'Footer bottom background color', 'powen' ),
        'section'         => 'powen_footer_background_section',
        'settings'        => 'powen_footer_bottom_background_color',
      ) ) );

      //Footer bottom text color

      $wp_customize->add_setting( 'powen_footer_bottom_textcolor' , array(
          'default'       => '#999999',
          'transport'     => 'refresh',
          'sanitize_callback' => 'sanitize_hex_color',
      ) );

      $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'powen_footer_bottom_textcolor', array(
        'label'           => __( 'Footer bottom text color', 'powen' ),
        'section'         => 'powen_footer_background_section',
        'settings'        => 'powen_footer_bottom_textcolor',
      ) ) );

      //Theme Font

      $wp_customize->add_section('font_section', array(
          'title'         => __( 'Theme Font', 'powen' ),
      ) );

      $wp_customize->add_setting('powen_theme_font', array(
          'default'       => 'times',
          'transport'     => 'postMessage',
          'sanitize_callback' => 'esc_url_raw',
      ) );

      $wp_customize->add_control('powen_theme_font', array(
          'section'       => 'font_section',
          'label'         => __('Theme Font', 'powen'),
          'type'          => 'select',
          'choices'       => array(
              'sansserif' => 'sans-serif',
              'serif'     => 'serif',
              'courier'   => 'Courier New',
      ) ) );

      //Favicon

      $wp_customize->add_setting('powen_theme_favicon', array(
          'default'       => '',
          'transport'     => 'refresh',
          'sanitize_callback' => 'esc_url_raw',
      ));

      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'powen_theme_favicon', array(
          'label'         => __( 'Upload Favicon', 'powen' ),
          'section'       => 'powen_logo_section',
          'settings'      => 'powen_theme_favicon',
      ) ) );

      //Logo & Favicon

      $wp_customize->add_section('powen_logo_section', array(
          'title'         => __( 'Logo & Favicon', 'powen' ),
          'description'   => 'Upload a logo to replace the default site name and description in the header',
      ));

      //Upload logo

      $wp_customize->add_setting( 'powen_upload_logo' , array(
          'default'       => '',
          'transport'     => 'refresh',
          'sanitize_callback' => 'esc_url_raw',
      ) );

      $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'powen_upload_logo', array(
          'label'         => __( 'Upload logo', 'powen' ),
          'section'       => 'powen_logo_section',
          'settings'      => 'powen_upload_logo',
      ) ) );


      //Logo placement

      $wp_customize->add_setting( 'powen_logo_placement', array(
          'default'       => 'left',
          'sanitize_callback' => 'esc_url_raw',

      ) );

      $wp_customize->add_control( 'powen_logo_placement', array(
          'type'          => 'radio',
          'label'         => __('Logo placement', 'powen'),
          'section'       => 'powen_logo_section',
          'choices'       => array(
              'left'      => 'Left',
              'right'     => 'Right',
              'center'    => 'Center',
          ),
      ) );

      //Color Scheme

      $wp_customize->add_section( 'powen_textcolors_section' , array(
          'title'         =>  __( 'Color Scheme', 'powen' ),
      ) );

      //Main Color
      
      $powen_txtcolors[] = array(
          'slug'          =>'main_color', 
          'default'       => '#6897bb',
          'label'         => __( 'Main Color', 'powen' )
      );
       
      //Link Color (on hover)
      $powen_txtcolors[] = array(
          'slug'          =>'hover_link_color', 
          'default'       => '#fa8072',
          'label'         => __( 'Link Color (on hover)', 'powen' )
      );

      foreach( $powen_txtcolors as $powen_txtcolor ) {
       
          $wp_customize->add_setting(
              $powen_txtcolor['slug'], array(
                  'default'     => $powen_txtcolor['default'],
                  'type'        => 'option', 
                  'capability'  => 
                  'edit_theme_options',
                  'sanitize_callback' => 'sanitize_hex_color',
              )
          );

          $wp_customize->add_control(
              new WP_Customize_Color_Control(
                  $wp_customize,
                  $powen_txtcolor['slug'], 
                  array('label' => __( $powen_txtcolor['label'], 'powen' ), 
                  'section'     => 'powen_textcolors_section',
                  'settings'    => $powen_txtcolor['slug'])
              )
          );

      }
      
      // We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
      $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';
      $wp_customize->get_setting('header_textcolor' )->transport = 'postMessage';
      $wp_customize->get_setting( 'background_color' )->transport = 'postMessage';
      $wp_customize->get_setting( 'powen_header_background' )->transport = 'postMessage';
      $wp_customize->get_setting( 'powen_footer_widgets_background' )->transport = 'postMessage';
      $wp_customize->get_setting( 'powen_header_taglinecolor' )->transport = 'postMessage';
      $wp_customize->get_setting( 'powen_footer_widgets_textcolor' )->transport = 'postMessage';
      $wp_customize->get_setting( 'powen_footer_widgets_linkcolor' )->transport = 'postMessage';
      $wp_customize->get_setting( 'powen_footer_bottom_textcolor' )->transport = 'postMessage';
      $wp_customize->get_setting( 'powen_footer_bottom_background_color' )->transport = 'postMessage';

  }

   /**
    * This will output the custom WordPress settings to the live theme's WP head.
    * 
    * Used by hook: 'wp_head'
    * 
    * @see add_action('wp_head',$func)
    * @since powen 1.0
    */
  public static function background() {
    ?>
    <!--Customizer CSS--> 
    <style type="text/css">
        <?php self::generate_css('.site-title a', 'color', 'header_textcolor', '#'); ?>
        <?php self::generate_css('.site-description', 'color', 'powen_header_taglinecolor'); ?>
        <?php self::generate_css('body', 'background-color', 'background_color', '#'); ?> 
        <?php self::generate_css('.site-header', 'background-color', 'powen_header_background'); ?> 
        <?php self::generate_css('.footer_widgets', 'background-color', 'powen_footer_widgets_background'); ?>
        <?php self::generate_css('.footer_widgets', 'color', 'powen_footer_widgets_textcolor'); ?>
        <?php self::generate_css('.footer_widgets a', 'color', 'powen_footer_widgets_linkcolor'); ?>
        <?php self::generate_css('.site-info a', 'color', 'powen_footer_bottom_textcolor'); ?>
        <?php self::generate_css('.site-info', 'color', 'powen_footer_bottom_textcolor'); ?>
        <?php self::generate_css('.site-info', 'background-color', 'powen_footer_bottom_background_color'); ?>
    </style> 
    <!--/Customizer CSS-->
    <?php
  }
   
   /**
    * This outputs the javascript needed to automate the live settings preview.
    * Also keep in mind that this function isn't necessary unless your settings 
    * are using 'transport'=>'postMessage' instead of the default 'transport'
    * => 'refresh'
    * 
    * Used by hook: 'customize_preview_init'
    * 
    * @see add_action('customize_preview_init',$func)
    * @since powen 1.0
    */
  public static function live_preview() {
    wp_enqueue_script( 
        'powen-themecustomizer', // Give the script a unique ID
        get_template_directory_uri() . '/js/theme-customizer.js', // Define the path to the JS file
        array(  'jquery', 'customize-preview' ), // Define dependencies
        '', // Define a version (optional) 
        true // Specify whether to put in footer (leave this true)
    );

  }

    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     * 
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since powen 1.0
     */
  public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
    $return = '';
    $mod = get_theme_mod($mod_name);
    if ( ! empty( $mod ) ) {
       $return = sprintf('%s { %s:%s; }',
          $selector,
          $style,
          $prefix.$mod.$postfix
       );
       if ( $echo ) {
          echo $return;
       }
    }
      return $return;
  }

}

function powen_customize_colors() {
   
  /**********************
  text colors
  **********************/
  // main color
  $main_color = get_option( 'main_color', '#6897bb' );
    
  // hover or active link color
  $hover_link_color = get_option( 'hover_link_color', '#fa8072' );
   
  /****************************************
  styling
  ****************************************/
  ?>
  <style>
       
      /*
      MAIN COLOR STYLING
       */
      button,
      input[type="button"],
      input[type="reset"],
      input[type="submit"] {
        background-color: <?php echo $main_color; ?>;
        color: #ffffff;
      }

      input[type="text"]:focus,
      input[type="email"]:focus,
      input[type="url"]:focus,
      input[type="password"]:focus,
      input[type="search"]:focus,
      textarea:focus {
        color: <?php echo $main_color; ?>;
      }

      input[type="text"],
      input[type="email"],
      input[type="url"],
      input[type="password"],
      input[type="search"],
      textarea {
        border: 2px solid <?php echo $main_color; ?>;
      }

      .powen-slider-content-icon-before, .powen-slider-content-icon-after, .continue-reading:after, .cat-links:before, .comments-link:before, .edit-link:before, .author:before, .posted-on:before, .comment-metadata time:before{ 
        color:  <?php echo $main_color; ?>; 
      }
      .widget_calendar caption, .current-date, .powen-border-line, .pagination .current {
        background: <?php echo $main_color; ?>;
      }
      .pagination .current {
        border: 1px solid <?php echo $main_color; ?>;
      }



      /*
      LINK COLOR( ON HOVER )
       */
      
      button:hover,
      input[type="button"]:hover,
      input[type="reset"]:hover,
      input[type="submit"]:hover {
        background: <?php echo $hover_link_color; ?>;
        color: #ffffff; 
      }

      a:hover, a:active {
        color: <?php echo $hover_link_color; ?>;
        -o-transition: .3s;
        -ms-transition: .3s;
        -moz-transition: .3s;
        -webkit-transition: .3s;
      }
      .pagination a:hover, .widget-area .tagcloud a:hover {
        background: <?php echo $hover_link_color; ?>;
        color: #ffffff;
        text-decoration: none;
        border: 1px solid <?php echo $hover_link_color; ?>;
        -o-transition: .3s;
        -ms-transition: .3s;
        -moz-transition: .3s;
        -webkit-transition: .3s;
      }
      a:hover, a:active, #site-navigation li a:hover { 
          text-decoration: underline;
      }
      .site-title a:hover {
        text-decoration: none;
      }
  </style>
       
  <?php }

  function powen_custom_css_output() {
      echo '<style type="text/css" id="custom-theme-css">' .
      get_theme_mod( 'custom_theme_css', '' ) . '</style>';
  }
  add_action( 'wp_head', 'powen_custom_css_output');
  
// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'Powen_Customize' , 'register' ) );

// Output custom CSS to live site
add_action( 'wp_head' , array( 'Powen_Customize' , 'background' ) );

// Enqueue live preview javascript in Theme Customizer admin screen
add_action( 'customize_preview_init' , array( 'Powen_Customize' , 'live_preview' ) );

//Color Scheme
add_action( 'wp_head', 'powen_customize_colors' );