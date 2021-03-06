<?php

/**
 * Customizer functionality
 *
 * @package powen
 * @since powen 1.0
 */


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
		do_action('powen_lite_custom_css_begin');

		self::create_color_scheme();
		self::generate_css('body', 'font-family', 'theme_font', '"', '"', "Open Sans");
		self::generate_css('body', 'font-size', 'body', '', 'rem', '1', true, '(min-width:900px)');
		self::generate_css('.site-branding .site-title', 'font-size', 'site_title', '', 'rem', '2.142', true, '(min-width:900px)');
		self::generate_css('.site-branding .site-description', 'font-size', 'site_description', '', 'rem', '0.928', true, '(min-width:900px)');
		self::generate_css('.site-title', 'font-weight', 'site_title_font_weight', '', '', 'normal');
		self::generate_css('.site-description', 'font-style', 'site_description_font_style', '', '', 'normal');
		self::generate_css('.powen-nav', 'font-size', 'nav_font_size', '', 'rem', '0.928', true, '(min-width:900px)');
		self::generate_css('.powen-slider-title', 'font-size', 'slider_title', '', 'rem', '1.285', true, '(min-width:900px)');
		self::generate_css('.powen-slider-description', 'font-size', 'slider_description', '', 'rem', '1', true, '(min-width:900px)');
		self::generate_css('h1', 'font-size', 'h1', '', 'rem', '1.857', true, '(min-width:900px)');
		self::generate_css('h2', 'font-size', 'h2', '', 'rem', '1.785', true, '(min-width:900px)');
		self::generate_css('h3', 'font-size', 'h3', '', 'rem', '1.714', true, '(min-width:900px)');
		self::generate_css('h4', 'font-size', 'h4', '', 'rem', '1.428', true, '(min-width:900px)');
		self::generate_css('h5', 'font-size', 'h5', '', 'rem', '1.357', true, '(min-width:900px)');
		self::generate_css('h6', 'font-size', 'h6', '', 'rem', '1.285', true, '(min-width:900px)');
		self::generate_css('.widget-title', 'font-size', 'widgets_title', '', 'rem', '1.428', true, '(min-width:900px)');
		self::generate_css('.widget-area', 'font-size', 'widgets_content', '', 'rem', '0.928', true, '(min-width:900px)');
		self::generate_css('.site-title a', 'color', 'header_textcolor', false, false, '#000000');
		self::generate_css('.site-description', 'color', 'header_taglinecolor', false, false, '#222222');
		self::generate_css('.site-header', 'background-color', 'header_background', false, false, '#ffffff');
		self::generate_css('.powen-footer-widgets', 'background-color', 'powen-footer-widgets_background', false, false, '#222222');
		self::generate_css('.powen-footer-widgets, .widget_calendar thead, .powen-footer-widgets input[type="email"], .powen-footer-widgets input[type="password"], .powen-footer-widgets input[type="search"], .powen-footer-widgets input[type="tel"], .powen-footer-widgets input[type="text"], .powen-footer-widgets input[type="url"], .powen-footer-widgets textarea, .powen-footer-widgets button,  .powen-footer-widgets input[type="button"], .powen-footer-widgets input[type="submit"], .powen-footer-widgets input[type="reset"]', 'color', 'powen-footer-widgets_textcolor', false, false, '#808080');
		self::generate_css('.powen-footer-widgets .widget-title:after', 'background-color', 'powen-footer-widgets_textcolor', false, false, '#808080');
		self::generate_css('.powen-footer-widgets a', 'color', 'powen-footer-widgets_linkcolor', false, false, '#cccccc');
		self::generate_css('.site-footer a:hover, .site-footer a:focus, .site-footer a:active', 'color', 'footer_hover_link_color', false, false, '#ffffff');
		self::generate_css('.hvr-underline-from-center:before', 'background-color', 'footer_hover_link_color', false, false, '#ffffff');
		self::generate_css('.site-info', 'color', 'footer_bottom_textcolor', false, false, '#666666');
		self::generate_css('.site-info a', 'color', 'footer_bottom_link_color', false, false, '#888888');
		self::generate_css('.site-info', 'background-color', 'footer_bottom_background_color', false, false, '#000000');
		self::generate_css('#mm-site-navigation', 'background-color', 'primary_nav_background_color', false, false, '#222222');
		self::generate_css('#mm-site-navigation', 'color', 'primary_nav_color', false, false, '#cccccc');
		self::generate_css('#mm-main-nav', 'background-color', 'secondary_nav_background_color', false, false, '#222222');
		self::generate_css('#mm-main-nav', 'color', 'secondary_nav_color', false, false, '#cccccc');
		self::title_layout();
		self::logo_placement();
		self::sidebar_layout();
		self::fixed_slider_content();
		self::header_search_bar();

		do_action('powen_lite_custom_css_end');
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

	public static function generate_css( $selector, $property, $mod_name, $prefix = '', $postfix = '', $default = false, $echo = true, $media_query = false )
	{
	      $return = $media_query ? "@media only screen and {$media_query} {" : '';

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
	         $return .= ( isset($mod) && ! empty( $mod ) ) ?
	                sprintf('%s { %s:%s; }', $selector, $property, $prefix.$mod.$postfix) :
	                false;
	    }

	    $return .= $media_query ? "}" : false;

	    if( $echo ){
	      echo $return;
	    }
	    else{
	      return $return;
	    }
	}

	public static function title_layout() {
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
	                echo '.site-branding .site-title, .site-branding .site-description{ text-align: center; }';
	                break;
	        }
	    }
	}

	public static function logo_placement() {
	  $powen_logo_position = powen_mod( 'logo_placement' );
	  if( $powen_logo_position ) {
	      switch ( $powen_logo_position ) {
	          case 'left':
	              echo '.site-branding{ text-align: left; }';
	              break;
	          case 'right':
	              echo '.site-branding{ text-align: right; }';
	              break;
	          case 'center':
	              echo '.site-branding{ text-align: center; }';
	              echo '.site-branding{ float: none; margin-left: auto; margin-right: auto; }';
	              break;
	      }
	  }
	}

	public static function sidebar_layout() {

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

	public static function fixed_slider_content() {
		if( powen_mod('fixed_slider_content') == 1 ) {
			echo ".powen-slider-content{
					-webkit-transform: translateY(0%);
					-moz-transform: translateY(0%);
					-ms-transform: translateY(0%);
					-o-transform: translateY(0%);
					transform: translateY(0%);
					opacity: 1;
	             }";
		}
	}

	public static function header_search_bar() {
		if( powen_mod('hide_header_search_bar') == 1 ) {
			echo ".powen-search-box-top { display: none; }";
		}
	}

	public static function create_color_scheme() {

		//=====================
		//THEME COLOR
		//=====================

		//color
		$color_selectors = apply_filters('powen_create_color_scheme_array', array (
			'a',
			'.powen-continue-reading:after',
			'.comment-awaiting-moderation:before',
		) );
		//background
		$background_color_selectors = apply_filters('powen_background_color_selectors_array', array(
			'.current-date',
			'.powen-pagination .current',
			'.powen-latest-post-tag',
			'button',
			'input[type="button"]',
			'input[type="reset"]',
			'input[type="submit"]',
		) );

		//border color
		$border_color_selectors = apply_filters('powen_border_color_selectors_array', array(
			'a:hover',
			'.powen-pagination .current',
			'div.wpcf7-validation-errors',
		) );

		self::generate_css( $color_selectors, 'color', 'theme_color', false, false, '#e6b800' );
		self::generate_css( $background_color_selectors, 'background', 'theme_color', false, false, '#e6b800' );
		self::generate_css( $border_color_selectors, 'border-color', 'theme_color', false, false, '#e6b800' );

		//=====================
		//LINK COLOR( ON HOVER )
		//=====================

		//color (on hover)
		$color_hover_selectors = apply_filters('powen_color_hover_selectors_array', array(
			'a:hover',
			'a:active',
			'a:focus',
			'.fa-search:hover',
			'.powen-continue-reading:hover:after',
			'#cancel-comment-reply-link:hover',
		) );

		//background should change on hover.
		$background_color_hover_selectors = apply_filters('powen_background_color_hover_selectors_array', array(
			'button:hover',
			'button:active',
			'button:focus',
			'input[type="button"]:hover',
			'input[type="button"]:active',
			'input[type="button"]:focus',
			'input[type="reset"]:hover',
			'input[type="reset"]:active',
			'input[type="reset"]:focus',
			'input[type="submit"]:hover',
			'input[type="submit"]:active',
			'input[type="submit"]:focus',
			'.hvr-sweep-to-right:before',
			'.hvr-shutter-out-horizontal:before',
		) );

		// border color (on hover)
		$border_color_hover_selectors = apply_filters('powen_border_color_hover_selectors_array', array(
			'.powen-pagination a:hover',
			'.powen-pagination .next:hover',
			'.powen-pagination .prev:hover',
			'.powen-pagination .last:hover',
			'button:hover',
			'input[type="button"]:hover',
			'input[type="reset"]:hover',
			'input[type="submit"]:hover',
			'button:focus',
			'input[type="button"]:focus',
			'input[type="reset"]:focus',
			'input[type="submit"]:focus',
			'button:active',
			'input[type="button"]:active',
			'input[type="reset"]:active',
			'input[type="submit"]:active',
		) );

		self::generate_css( $color_hover_selectors, 'color', 'hover_link_color', false, false, '#daa520' );
		self::generate_css( $background_color_hover_selectors, 'background', 'hover_link_color', false, false, '#daa520' );
		self::generate_css( $border_color_hover_selectors, 'border-color', 'hover_link_color', false, false, '#daa520' );

	}

}
new Powen_Customizer_Front();