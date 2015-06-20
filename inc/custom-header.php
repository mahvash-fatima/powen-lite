<?php

// FAVICON
function powen_favicon() { ?>

	<link rel="shortcut icon" type="image" href="<?php echo powen_mod('theme_favicon'); ?>">

<?php }

add_action( 'wp_head', 'powen_favicon' );


//THEME FONT
function powen_theme_font() { ?>

<style>
	body {
		font-family: <?php echo powen_mod( 'theme_font', 'Courier New, Courier' ); ?>
	}
</style>

<?php }

add_action( 'wp_head', 'powen_theme_font' );


//LOGO
function powen_logo() {
	$powen_logo_position = powen_mod( 'logo_placement' );
	if( $powen_logo_position != '' ) {
	    switch ( $powen_logo_position ) {
	        case 'left':
	            echo '<style type="text/css">';
	            echo '.site-branding .site-logo{ text-align: left; }';
	            echo '</style>';
	            break;
	        case 'right':
	            echo '<style type="text/css">';
	            echo '.site-branding .site-logo{ text-align: right; }';
	            echo '</style>';
	            break;
	        case 'center':
	            echo '<style type="text/css">';
	            echo '.site-branding{ text-align: center; }';
	            echo '.site-branding .site-logo{ float: none; margin-left: auto; margin-right: auto; }';
	            echo '</style>';
	            break;
	    }
	}
}
add_action( 'wp_head', 'powen_logo' );

function powen_title_layout() {
    $powen_header_text_position = powen_mod( 'header_text_placement' );
    if( $powen_header_text_position != '' ) {
        switch ( $powen_header_text_position ) {
            case 'left':
                echo '<style type="text/css">';
                echo '.site-branding .site-title, .site-branding .site-description{ text-align: left; }';
                echo '</style>';
                break;
            case 'right':
                echo '<style type="text/css">';
                echo '.site-branding .site-title, .site-branding .site-description{ text-align: right; }';
                echo '</style>';
                break;
            case 'center':
                echo '<style type="text/css">';
                echo '.site-branding{ text-align: center; }';
                echo '.site-branding .site-title, .site-branding .site-description{ float: none; margin-left: auto; margin-right: auto; }';
                echo '</style>';
                break;
        }
    }
}
add_action( 'wp_head', 'powen_title_layout' );