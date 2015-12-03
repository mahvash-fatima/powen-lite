<?php 
	/**
	 * Template part for showing the top most header of the theme
	 * @package Powen
	 */

?>
<nav id="navigation" class="powen-nav">
	<nav id="menu-icon" class="top-most-nav">
		<a href="#site-navigation"><i class="mm"></i><?php _e('+ Menu 1', 'powen') ?></a>
	</nav>

	<nav id="site-navigation" class="main-navigation" role="navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'top-most' ) ); ?>
		<a href="#main-nav"><i class="m"></i><?php _e('+ Menu 2', 'powen') ?></a>
	</nav>
</nav>