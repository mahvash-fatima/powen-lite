<?php

function powen_sidebar_layout() {

	$sidebar_position = get_theme_mod('powen_sidebar_position');

	if($sidebar_position === 'left') {
		echo "<style>";
		echo ".site-content .widget-area {float: $sidebar_position; overflow: hidden;  width: 30%;}";
		echo ".content-area {float: right; margin: 0 0 0 -30%; width: 100%; }";
		echo ".site-main {margin: 0 0 0 32%;}";
		echo "</style>";
	}
	
	if($sidebar_position === 'right') {
		echo "<style>";
		echo ".site-content .widget-area {float: $sidebar_position; overflow: hidden; width: 30%;}";
		echo ".content-area {float: left; margin: 0 -30% 0 0; width: 100%; }";
		echo ".site-main {margin: 0 30% 0 0;}";
		echo "</style>";
	}

	if($sidebar_position === 'no-sidebar') {
		echo "<style>";
		echo ".site-content {width: 100%; float: none;}";
		echo ".site-content .widget-area {display: none;}";
		echo ".site-main {margin: 0;}";
		echo "</style>";
	}

}

add_action( 'wp_head', 'powen_sidebar_layout' );

?>