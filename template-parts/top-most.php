<?php
	/**
	 * Template part for showing the top most header of the theme
	 * @package Powen
	 */

?>
<div id="navigation" class="powen-nav clear">

	<?php do_action( 'powen_before_mobile_nav' ); ?>

	<!-- Top Most Menu -->
	<?php if ( powen_mod( 'hide_menu_one' ) == '' ) { ?>
		<nav id="site-navigation" class="powen-primary-nav" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'top-most', 'menu_id' => 'top_most' ) ); ?>
			<a href="#site-navigation"><i class="mm fa fa-bars"></i><?php echo esc_textarea( powen_mod( 'menu_one_title_textbox'), 'powen-lite' ); ?></a>
		</nav>
	<?php } ?>

	<!-- Main Menu -->
	<?php if ( powen_mod( 'hide_menu_two' ) == '' ) { ?>
		<nav id="main-nav" class="powen-main-nav" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu_id' => 'main_menu') ); ?>
			<a href="#main-nav"><?php echo esc_textarea( powen_mod( 'menu_two_title_textbox'), 'powen-lite' ); ?><i class="m fa fa-bars"></i></a>
		</nav>
	<?php } ?>

	<?php do_action( 'powen_after_mobile_nav' ); ?>

	<!-- Social Media Icons -->
	<?php powen_social_media_icons(); ?>

	<?php do_action('powen_header_social_container_extras' ); ?>

	<!-- Search Bar-->
	<div class="powen-search-box-top">
		<?php get_search_form(); ?>
		<i class="fa fa-search"></i>

		<?php do_action('powen_header_top_container_extras' ); ?>
	</div>
</div>