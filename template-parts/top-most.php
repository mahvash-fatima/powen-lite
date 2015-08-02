<?php
	/**
	 * Template part for showing the top most header of the theme
	 * @package Powen
	 */

?>
<nav id="navigation" class="powen-nav">
	<nav id="menu-icon" class="top-most-nav">
		<a href="#site-navigation"><i class="mm"></i><?php echo apply_filters('powen_menu_one_title_textbox_textarea', esc_textarea( powen_mod( 'menu_one_title_textbox', 'Copyright'), 'powen' ) ); ?></a>
	</nav>

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<?php wp_nav_menu( apply_filters('powen_menu_one_array', array( 'theme_location' => 'top-most' ) ) ); ?>
		<a href="#main-nav"><i class="m"></i><?php echo apply_filters('powen_menu_two_title_textbox_textarea', esc_textarea( powen_mod( 'menu_two_title_textbox', 'Copyright'), 'powen' ) ); ?></a>
	</nav>
</nav>