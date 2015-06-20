<?php

class Powen_Customizer_Front extends Powen_Customizer
{
	public function __construct()
	{
		// Output custom CSS to live site
		add_action( 'wp_head' , array( $this , 'css_output' ) );
	}

	/**
	* This will output the custom WordPress settings to the live theme's WP head.
	* @since powen 1.0
	*/
	public static function css_output()
	{
	  //Handle Favicon
	  $favicon_url = powen_mod('theme_favicon');
	  if($favicon_url){
	    echo '<link rel="shortcut icon" type="image" href="'.esc_url($favicon_url).'">';
	  }
	  ?>
	  <!--Customizer CSS-->
	  <style type="text/css">
	      <?php self::custom_css(); ?>
	  </style>
	  <!--/Customizer CSS-->
	  <?php
	}

	public static function custom_css()
	{
	    self::generate_css( 'body', 'font-family', 'theme_font', '"', '"' );
	    self::generate_css('.site-title a', 'color', 'header_textcolor', '');
	    self::generate_css('.site-description', 'color', 'header_taglinecolor');
	    self::generate_css('body', 'background-color', 'background_color', '');
	    self::generate_css('.site-header', 'background-color', 'header_background');
	    self::generate_css('.footer_widgets', 'background-color', 'footer_widgets_background');
	    self::generate_css('.footer_widgets', 'color', 'footer_widgets_textcolor');
	    self::generate_css('.footer_widgets a', 'color', 'footer_widgets_linkcolor');
	    self::generate_css('.site-info a', 'color', 'footer_bottom_textcolor');
	    self::generate_css('.site-info', 'color', 'footer_bottom_textcolor');
	    self::generate_css('.site-info', 'background-color', 'footer_bottom_background_color');
	    self::powen_title_layout();
	    self::powen_logo_placement();
	}

	/**
	 * This will generate a line of CSS for use in header output. If the setting
	 * ($mod_name) has no defined value, the CSS will not be output.
	 *
	 * @uses get_theme_mod()
	 * @param string $selector CSS selector
	 * @param string/array $property The name of the CSS *property* to modify
	 * @param string/array $mod_name The name of the 'theme_mod' option to fetch
	 * @param string/array $prefix Optional. Anything that needs to be output before the CSS property
	 * @param string/array $postfix Optional. Anything that needs to be output after the CSS property
	 * @return string Returns a single line of CSS with selectors and a property.
	 * @since powen 1.1.2
	 */

	public static function generate_css( $selector, $property, $mod_name, $prefix = '', $postfix = '', $default = false, $echo = true )
	{
	      $return = '';

	      $selector = is_array( $selector) ? join( ',' , $selector ) : $selector;

	    if( is_array( $property ) && is_array($mod_name) ){
	      $return .= $selector . '{';
	      foreach ($property as $key => $property ) {
	        $mod = is_array( $default ) ? powen_mod($mod_name[$key], $default[$key]) : powen_mod($mod_name[$key], $default) ;
	        $this_prefix  = is_array($prefix)  ? $prefix[$key]  : $prefix;
	        $this_postfix = is_array($postfix) ? $postfix[$key] : $postfix;
	        $return .= ( isset($mod) && ! empty( $mod ) ) ?
	               sprintf( '%s:%s;', $property , $this_prefix.$mod.$this_postfix ) :
	               false;
	      }
	      $return .= "}";
	    }
	    else
	    {
	      $mod = powen_mod($mod_name, $default );
	         $return = ( isset($mod) && ! empty( $mod ) ) ?
	                sprintf('%s { %s:%s; }', $selector, $property, $prefix.$mod.$postfix) :
	                false;
	    }

	    if( $echo ){
	      echo $return;
	    }
	    else{
	      return $return;
	    }
	}

	public static function powen_title_layout() {
	    $powen_header_text_position = powen_mod( 'header_text_placement' );
	    if( $powen_header_text_position ) {
	        switch ( $powen_header_text_position ) {
	            case 'left':
	                echo '.site-branding .site-title, .site-branding .site-description{ text-align: left; }';
	                break;
	            case 'right':
	                echo '.site-branding .site-title, .site-branding .site-description{ text-align: right; }';
	                break;
	            case 'center':
	                echo '.site-branding{ text-align: center; }';
	                echo '.site-branding .site-title, .site-branding .site-description{ float: none; margin-left: auto; margin-right: auto; }';
	                break;
	        }
	    }
	}

	public static function powen_logo_placement() {
	  $powen_logo_position = powen_mod( 'logo_placement' );
	  if( $powen_logo_position ) {
	      switch ( $powen_logo_position ) {
	          case 'left':
	              echo '.site-branding .site-logo{ text-align: left; }';
	              break;
	          case 'right':
	              echo '.site-branding .site-logo{ text-align: right; }';
	              break;
	          case 'center':
	              echo '.site-branding{ text-align: center; }';
	              echo '.site-branding .site-logo{ float: none; margin-left: auto; margin-right: auto; }';
	              break;
	      }
	  }
	}

	public static function powen_colors_array() {
		
		//=====================
		//THEME COLOR
		//=====================

		//color
		$powen_theme_color = array (
			'.powen-slider-content-icon-before', 
			'.powen-slider-content-icon-after',
			'.continue-reading:after', 
			'.cat-links:before', 
			'.comments-link:before', 
			'.edit-link:before', 
			'.author:before', 
			'.posted-on:before', 
			'.comment-metadata time:before',
			'input[type="text"]:focus',
			'input[type="email"]:focus',
			'input[type="url"]:focus',
			'input[type="password"]:focus',
			'input[type="search"]:focus',
			'textarea:focus',

		);
		//background
		$powen_theme_background_color = array(
			'.widget_calendar caption', 
			'.current-date', 
			'.powen-border-line', 
			'.pagination .current',
			'button',
			'input[type="button"]',
			'input[type="reset"]',
			'input[type="submit"]',
			'button:hover',
			'input[type="button"]:hover',
			'input[type="reset"]:hover',
			'input[type="submit"]:hover',
		);

		//border color
		$powen_theme_border_color = array(
			'a:hover, a:active',
			'input[type="text"]',
			'input[type="email"]',
			'input[type="url"]',
			'input[type="password"]',
			'input[type="search"]',
			'textarea',
			'.pagination .current',
			'.pagination a:hover', 
			'.widget-area .tagcloud a:hover',
		);


		//=====================
		//LINK COLOR( ON HOVER )
		//=====================

		//color (on hover)
		$powen_theme_hover_color = array( 'a:hover', 'a:active' );

		//button color (on hover) following colors should be "WHITE"
		$powen_button_color = array(  
			'button:hover',
			'input[type="button"]:hover',
			'input[type="reset"]:hover',
			'input[type="submit"]:hover',
			'button:hover',
			'input[type="button"]:hover',
			'input[type="reset"]:hover',
			'input[type="submit"]:hover',
			'.pagination a:hover', 
			'.widget-area .tagcloud a:hover'
		);

		// border color (on hover)
		$powen_theme_border_color_hover = array(
			'pagination a:hover', 
			'.widget-area .tagcloud a:hover',
		);

		//=====================
		//BODY BACKGROUND COLOR
		//=====================
		$powen_background_color = array( 'body' );

		//=============
		//HEADER COLORS
		//=============
		
		//background color
		$powen_header_background_color = array( '.site-header' );

		//color
		$powen_header_title_color = array( '.site-title a' );

		//color
		$powen_header_tagline_color = array( '.site-description' );

		//=============
		//FOOTER COLORS
		//=============
		
		//background color
		$powen_widgets_background_color = array( '.footer_widgets' );

		//color
		$powen_widgets_text_color = array( '.footer_widgets' );

		//color
		$powen_widgets_link_color = array( '.footer_widgets a' );

		//background
		$powen_bottom_background_color = array( '.site-info' );

		//color
		$powen_bottom_text_color = array( '.site-info' );

	}

}
new Powen_Customizer_Front();



function powen_customize_colors() {

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

