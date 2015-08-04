<?php
	/**
	 * Template part for showing the top most header of the theme
	 * @package Powen
	 */

?>
<nav id="navigation" class="powen-nav">
	<?php if(powen_mod('hide_menu_one') == '') { ?>
	<nav id="menu-icon" class="powen-top-most-nav">
		<a href="#site-navigation"><i class="mm"></i><?php echo esc_textarea( powen_mod( 'menu_one_title_textbox'), 'powen' ); ?></a>
	</nav>
	<?php } ?>

	<?php if(powen_mod('hide_menu_two') == '') { ?>
	<nav id="site-navigation" class="powen-main-navigation" role="navigation">
		<?php wp_nav_menu( apply_filters('powen_menu_one_array', array( 'theme_location' => 'top-most' ) ) ); ?>
		<a href="#main-nav"><i class="m"></i><?php echo esc_textarea( powen_mod( 'menu_two_title_textbox'), 'powen' ); ?></a>
	</nav>
	<?php } ?>

	<?php do_action( 'powen_nav_extras' ); ?>
</nav>