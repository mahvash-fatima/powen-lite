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
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
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

add_action( 'powen_files_load' , 'powen_load_extras' );
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
