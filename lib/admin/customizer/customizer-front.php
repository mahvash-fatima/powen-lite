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
		self::create_color_scheme();
	    self::generate_css( 'body', 'font-family', 'theme_font', '"', '"', "Open Sans" );
	    self::generate_css('.site-title a', 'color', 'header_textcolor', '');
	    self::generate_css('.site-description', 'color', 'header_taglinecolor');
	    self::generate_css('body', 'background-color', 'background_color', '');
	    self::generate_css('.site-header', 'background-color', 'header_background');
	    self::generate_css('.powen-footer-widgets', 'background-color', 'powen-footer-widgets_background');
	    self::generate_css('.powen-footer-widgets', 'color', 'powen-footer-widgets_textcolor');
	    self::generate_css('.powen-footer-widgets a', 'color', 'powen-footer-widgets_linkcolor');
	    self::generate_css('.site-info a', 'color', 'footer_bottom_textcolor');
	    self::generate_css('.site-info', 'color', 'footer_bottom_textcolor');
	    self::generate_css('.site-info', 'background-color', 'footer_bottom_background_color');
	    self::powen_title_layout();
	    self::powen_logo_placement();
	    self::powen_sidebar_layout();
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
	              echo '.site-branding .powen-site-logo{ text-align: left; }';
	              break;
	          case 'right':
	              echo '.site-branding .powen-site-logo{ text-align: right; }';
	              break;
	          case 'center':
	              echo '.site-branding{ text-align: center; }';
	              echo '.site-branding .powen-site-logo{ float: none; margin-left: auto; margin-right: auto; }';
	              break;
	      }
	  }
	}

	public static function powen_sidebar_layout() {

		$sidebar_position = powen_mod('sidebar_position');

		if($sidebar_position === 'left') {
			echo ".site-content .widget-area {float: {$sidebar_position}; overflow: hidden;  width: 30%;}";
			echo ".widget {margin-right: 2.61792rem; margin-left: 0;}";
			echo ".content-area {float: right; margin: 0 0 0 -30%; width: 100%; }";
			echo ".site-main {margin: 0 0 0 30%;}";
		}

		if($sidebar_position === 'right') {
			echo ".site-content .widget-area {float: {$sidebar_position}; overflow: hidden; width: 30%;}";
			echo ".content-area {float: left; margin: 0 -30% 0 0; width: 100%; }";
			echo ".site-main {margin: 0 30% 0 0;}";
		}

		if($sidebar_position === 'no-sidebar') {
			echo ".site-content {width: 100%; float: none;}";
			echo ".site-content .widget-area {display: none;}";
			echo ".site-main {margin: 0;}";
		}

	}

	public static function create_color_scheme() {

		//=====================
		//THEME COLOR
		//=====================

		//color
		$color_selectors = apply_filters('powen_create_color_scheme_array', array (
			'p a',
			'.powen-continue-reading:after',
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
			'.flex-direction-nav li .flex-prev:before',
			'.flex-direction-nav li .flex-next:before',
			'.breadcrumbs a'
		) );
		//background
		$background_color_selectors = apply_filters('powen_background_color_selectors_array', array(
			'.widget_calendar caption',
			'.current-date',
			'.entry-header:after',
			'.widget-title:after',
			'.powen-pagination .current',
			'.powen-latest-post-tag',
			'button',
			'input[type="button"]',
			'input[type="reset"]',
			'input[type="submit"]',
			'button:hover',
			'input[type="button"]:hover',
			'input[type="reset"]:hover',
			'input[type="submit"]:hover',
		) );

		//border color
		$border_color_selectors = apply_filters('powen_border_color_selectors_array', array(
			'a:hover, a:active',
			'.powen-pagination .current',
		) );

		self::generate_css( $color_selectors, 'color', 'theme_color', false, false, '#daa520' );
		self::generate_css( $background_color_selectors, 'background', 'theme_color', false, false, '#daa520' );
		self::generate_css( $border_color_selectors, 'border-color', 'theme_color', false, false, '#daa520' );

		//=====================
		//LINK COLOR( ON HOVER )
		//=====================

		//color (on hover)
		$color_hover_selectors = apply_filters('powen_color_hover_selectors_array', array( 'a:hover', 'a:active', '.breadcrumbs li a:hover', 'p a:hover') );

		//background should change on hover.
		$background_color_hover_selectors = apply_filters('powen_background_color_hover_selectors_array', array(
			'button:hover',
			'input[type="button"]:hover',
			'input[type="reset"]:hover',
			'input[type="submit"]:hover',
			'button:hover',
			'input[type="button"]:hover',
			'input[type="reset"]:hover',
			'input[type="submit"]:hover',
		) );

		// border color (on hover)
		$border_color_hover_selectors = apply_filters('powen_border_color_hover_selectors_array', array(
			'.widget-area .tagcloud a:hover',
			'.powen-pagination a:hover',
			'.powen-pagination .next:hover',
			'.powen-pagination .prev:hover',
			'.powen-pagination .last:hover',
			'.widget_powen_social_widget ul li a:hover',
		) );

		self::generate_css( $color_hover_selectors, 'color', 'hover_link_color', false, false, '#dd9933' );
		self::generate_css( $background_color_hover_selectors, 'background', 'hover_link_color', false, false, '#dd9933' );
		self::generate_css( $border_color_hover_selectors, 'border-color', 'hover_link_color', false, false, '#dd9933' );


	}

}
new Powen_Customizer_Front();