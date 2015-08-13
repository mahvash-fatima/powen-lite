<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package powen
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'powen' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="powen-wrapper clear">

		<?php do_action( 'powen_header_top_most' ); ?>

			<div id="top-most-container" class="powen-top-container clear">

				<!-- Top most menu -->
				<?php get_template_part( 'template-parts/top-most' ); ?>

				<!-- Search -->
				<div class="powen-search-box-top">
					<?php get_search_form(); ?>
					<?php do_action('powen_header_top_container_extras' ); ?>
				</div>

				<?php do_action('powen_header_social_container_extras' ); ?>

			</div>


			<!-- Main menu -->
			<nav id="main-nav">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class'=>'powen-wrapper', 'menu_id' => 'main_nav') ); ?>
			</nav>

			<?php do_action( 'powen_before_site_branding' ); ?>
			<div class="site-branding">

				<?php if ( powen_mod( 'upload_logo' ) ) : ?>

				    <div id="logo" class='powen-site-logo'>
				        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( powen_mod( 'upload_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
				        <h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
				    </div>

				<?php else : ?>

			    	<div id="title-tagline" class="powen-title-description">
			        	<h1 class='site-title'><a href='<?php echo apply_filters('powen_site_tiltle_url', esc_url( home_url( '/' ) ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
			        	<h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
			    	</div>

				<?php endif; ?>

			</div><!-- site-branding -->

		<?php do_action( 'powen_after_site_branding' ); ?>

		</div>
	</header>

	<?php
		if ( is_home() || is_front_page() ) {
		   get_template_part( 'template-parts/banner' );
		   do_action( 'powen_after_slider' );
		}
	?>