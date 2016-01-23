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
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'powen-lite' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="powen-wrapper clear">

		<?php do_action( 'powen_header_primary' ); ?>

			<?php get_template_part( 'template-parts/top-most' ); ?>

			<?php do_action( 'powen_before_site_branding' ); ?>

			<div class="site-branding">
				<?php echo powen_site_branding(); ?>
			</div><!-- .site-branding -->

		<?php do_action( 'powen_after_site_branding' ); ?>

		</div>
	</header>

	<?php
		if ( is_home() || is_front_page() ) {
		   get_template_part( 'template-parts/banner' );
		   do_action( 'powen_after_slider' );
		}
	?>