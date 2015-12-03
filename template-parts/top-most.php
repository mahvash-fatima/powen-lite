<?php
	/**
	 * Template part for showing the top most header of the theme
	 * @package Powen
	 */

?>
<div id="navigation" class="powen-nav clear">

	<?php do_action( 'powen_before_mobile_nav' ); ?>

	<?php if( powen_mod('hide_menu_one') == '' ) { ?>
	<nav id="menu-icon" class="powen-top-most-nav">
		<a href="#site-navigation"><i class="mm"></i><?php echo esc_textarea( powen_mod( 'menu_one_title_textbox'), 'powen' ); ?></a>
	</nav>
	<?php } ?>

	<?php if( powen_mod('hide_menu_two') == '' ) { ?>
	<nav id="site-navigation" class="powen-main-navigation" role="navigation">
		<?php wp_nav_menu( apply_filters('powen_menu_one_array', array( 'theme_location' => 'top-most' ) ) ); ?>
		<a href="#main-nav"><i class="m"></i><?php echo esc_textarea( powen_mod( 'menu_two_title_textbox'), 'powen' ); ?></a>
	</nav>
	<?php } ?>
	<?php do_action( 'powen_after_mobile_nav' ); ?>

	<!-- Social Media Icon -->
	<?php powen_social_media_icons(); ?>
	<?php do_action('powen_header_social_container_extras' ); ?>

	<!-- Search -->
	<div class="powen-search-box-top">
		<?php get_search_form(); ?>
		<?php do_action('powen_header_top_container_extras' ); ?>
	</div>

</div>