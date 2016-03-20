<?php
/**
 * Custom functions that act independently of the theme templates
 *
 * Eventually, some of the functionality here could be replaced by core features
 *
 * @package powen
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function powen_body_classes( $classes ) {

	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
		if ( $is_lynx ) {
			$classes[] = 'lynx';
		} elseif ( $is_gecko ) {
			$classes[] = 'gecko';
		} elseif ( $is_opera ) {
			$classes[] = 'opera';
		} elseif ( $is_NS4 ) {
			$classes[] = 'ns4';
		} elseif ( $is_safari ) {
			$classes[] = 'safari';
		} elseif ( $is_chrome ) {
			$classes[] = 'chrome';
		} elseif ( $is_IE ) {
			$classes[] = 'ie';
			if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && preg_match( '/MSIE ([0-9]+)([a-zA-Z0-9.]+)/', $_SERVER['HTTP_USER_AGENT'], $browser_version ) ) {
				$classes[] = 'ie' . $browser_version[1];
			}
		} else {
			$classes[] = 'unknown';
		}
		if ( $is_iphone ) {
			$classes[] = 'iphone';
		}

		if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Mobile' ) !== false ) {
			$classes[] = 'mobile';
		}

		if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Android' ) !== false ) {
			$classes[] = 'android';
		}

		if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mini' ) !== false ) {
			$classes[] = 'opera-mini';
		}

		if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'BlackBerry' ) !== false ) {
			$classes[] = 'blackberry';
		}

		if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && stristr( $_SERVER['HTTP_USER_AGENT'], 'mac' ) ) {
			$classes[] = 'osx';
		} elseif ( isset( $_SERVER['HTTP_USER_AGENT'] ) && stristr( $_SERVER['HTTP_USER_AGENT'], 'linux' ) ) {
			$classes[] = 'linux';
		} elseif ( isset( $_SERVER['HTTP_USER_AGENT'] ) && stristr( $_SERVER['HTTP_USER_AGENT'], 'windows' ) ) {
			$classes[] = 'windows';
		}
		if ( ! is_multi_author() ) {
			$classes[] = 'powen-single-author';
		}
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}
		if ( get_header_image() ) {
			$classes[] = 'header-image';
		} else {
			$classes[] = 'masthead-fixed';
		}
		if ( is_archive() || is_search() || is_home() ) {
			$classes[] = 'powen-list-view';
		}
		if ( is_singular() && ! is_front_page() ) {
			$classes[] = 'singular';
		}

		if ( wp_is_mobile() ) {
			$classes[] = 'powen-mobile';
		}

		return $classes;

}
add_filter( 'body_class', 'powen_body_classes' );

if ( version_compare( $GLOBALS['wp_version'], '4.1', '<' ) ) :
	/**
	 * Filters wp_title to print a neat <title> tag based on what is being viewed.
	 *
	 * @param string $title Default title text for current view.
	 * @param string $sep Optional separator.
	 * @return string The filtered title.
	 */
	function powen_wp_title( $title, $sep ) {
		if ( is_feed() ) {
			return $title;
		}

		global $page, $paged;

		// Add the blog name
		$title .= esc_html( get_bloginfo( 'name', 'display' ) );

		// Add the blog description for the home/front page.
		$site_description = esc_html( get_bloginfo( 'description', 'display' ) );
		if ( $site_description && ( is_home() || is_front_page() ) ) {
			$title .= " $sep $site_description";
		}

		// Add a page number if necessary:
		if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
			$title .= " $sep " . sprintf( __( 'Page %s', 'powen-lite' ), max( $paged, $page ) );
		}

		return $title;
	}
	add_filter( 'wp_title', 'powen_wp_title', 10, 2 );

	/**
	 * Title shim for sites older than WordPress 4.1.
	 *
	 * @link https://make.wordpress.org/core/2014/10/29/title-tags-in-4-1/
	 * @todo Remove this function when WordPress 4.3 is released.
	 */
	function powen_render_title() {
		?>
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<?php
	}
	add_action( 'wp_head', 'powen_render_title' );
endif;

//add_action( 'powen_files_load' , 'powen_load_extras' );
function powen_load_extras()
{
	$file = POWEN_DR . '/pro/powen-pro.php';

	if (file_exists($file)) {
		define( 'POWEN_PRO', true );
	    require_once $file;
	}
}

/*
 * Adds New Menu to the admin bar
 */
add_action('admin_bar_menu', 'powen_admin_menu', 100);
function powen_admin_menu($admin_bar){
	global $powen_theme;

	if( defined( 'POWEN_PRO' ) ) return;

    $admin_bar->add_menu( array(
        'id'    => 'powen-admin-menu',
        'title' => __('Upgrade to Powen Pro', 'powen-lite'),
        'href'  => $powen_theme->get('AuthorURI') . "/powen-pro-pricing/",
        'meta'  => array(
            'title' => __('Updgrade to Powen Pro', 'powen-lite'),
        ),
    ));
}

//Notice
add_action('admin_notices', 'powen_admin_notice');

function powen_admin_notice() {

    global $current_user ;

        $user_id = $current_user->ID;
        $theme_mod = get_theme_mod( 'powen_mod' );

        /* Check that the user hasn't already clicked to ignore the message */

    if ( ! get_user_meta( $user_id, 'powen_ignore_pro_notice') ) {

        echo '<div class="updated"><p>';

        printf(__('Try Powen Pro for more features, better SEO, full navigation and premium support. Click <a target="_blank" href="http://supernovathemes.com/powen-pro-pricing/">here</a> to know more. | <a href="%1$s">Hide</a>', 'powen-lite'), '?powen_nag_ignore=0');

        echo "</p></div>";

    }

}

add_action('admin_init', 'powen_nag_ignore');

function powen_nag_ignore() {

    global $current_user;

        $user_id = $current_user->ID;

        /* If user clicks to ignore the notice, add that to their user meta */

        if ( isset($_GET['powen_nag_ignore']) && '0' == $_GET['powen_nag_ignore'] ) {

             add_user_meta( $user_id, 'powen_ignore_pro_notice', 'true', true);
    }
}
