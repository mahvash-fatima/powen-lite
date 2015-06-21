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

			<div id="top-most-container" class="top-container sticky">
				<?php get_template_part( 'template-parts/top-most' ); ?>
				<?php powen_social_media_icons(); ?>
				<?php get_search_form(); ?>
			</div>

			<nav id="main-nav">
				<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_class'=>'powen-wrapper', 'menu_id' => 'main_nav') ); ?>
			</nav>

			<div class="site-branding">
				<?php if ( powen_mod( 'upload_logo' ) ) : ?>

				    <div id="logo" class='site-logo'>
				        <a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><img src='<?php echo esc_url( powen_mod( 'upload_logo' ) ); ?>' alt='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>'></a>
				    </div>

				<?php else : ?>

			    	<div id="title-tagline" class="title-description">
			        	<h1 class='site-title'><a href='<?php echo esc_url( home_url( '/' ) ); ?>' title='<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>' rel='home'><?php bloginfo( 'name' ); ?></a></h1>
			        	<h2 class='site-description'><?php bloginfo( 'description' ); ?></h2>
			    	</div>

				<?php endif; ?>
			</div>

		</div>
	</header>