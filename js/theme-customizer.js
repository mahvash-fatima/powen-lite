/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ) {

	wp.customize( 'powen_mod[theme_font]', function( value ) {
	    value.bind( function( newval ) {

	        switch( newval.toString().toLowerCase() ) {

	            case 'sansserif':
	                sFont = 'sans-serif';
	                break;

	            case 'serif':
	                sFont = 'serif';
	                break;

	            case 'courier':
	                sFont = 'Courier New, Courier';
	                break;

	            case 'open-sans':
	                sFont = 'Open Sans';
	                break;

	            default:
	                sFont = 'Open Sans';
	                break;

	        }

	        $( 'body' ).css({
	            fontFamily: sFont
	        });

	    });

	});

	// Update the site title in real time...
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.site-title a' ).html( newval );
		} );
	} );

	//Update the site description in real time...
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		} );
	} );

	//Update site background color...
	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			$('body').css('background-color', newval );
		} );
	} );

	//Update site title color in real time...
	wp.customize( 'powen_mod[header_textcolor]', function( value ) {
		value.bind( function( newval ) {
			$('.site-title a').css('color', newval );
		} );
	} );

	wp.customize( 'powen_mod[header_taglinecolor]', function( value ) {
		value.bind( function( newval ) {
			$('.site-description').css('color', newval );
		} );
	} );

	wp.customize( 'powen_mod[header_background]', function( value ) {
		value.bind( function( newval ) {
			$('.site-header').css('background-color', newval );
		} );
	} );

	wp.customize( 'powen_mod[footer_widgets_background]', function( value ) {
		value.bind( function( newval ) {
			$('.footer_widgets').css('background-color', newval );
		} );
	} );

	wp.customize( 'powen_mod[footer_widgets_textcolor]', function( value ) {
		value.bind( function( newval ) {
			$('.footer_widgets').css('color', newval );
		} );
	} );

	wp.customize( 'powen_mod[footer_widgets_linkcolor]', function( value ) {
		value.bind( function( newval ) {
			$('.footer_widgets a').css('color', newval );
		} );
	} );

	wp.customize( 'powen_mod[footer_bottom_textcolor]', function( value ) {
		value.bind( function( newval ) {
			$('.site-info a').css('color', newval );
		} );
	} );

	wp.customize( 'powen_mod[footer_bottom_textcolor]', function( value ) {
		value.bind( function( newval ) {
			$('.site-info').css('color', newval );
		} );
	} );

	wp.customize( 'powen_mod[footer_bottom_background_color]', function( value ) {
		value.bind( function( newval ) {
			$('.site-info').css('background-color', newval );
		} );
	} );

	wp.customize( 'powen_display_header', function( value ) {
	    value.bind( function( newval ) {
	        false === newval ? $( '#masthead' ).hide() : $( '#masthead' ).show();
	    } );
	} );

} )( jQuery );

// As you can see from the example above, a single basic handler looks like this:


wp.customize( 'YOUR_SETTING_ID', function( value ) {
	value.bind( function( newval ) {
		//Do stuff (newval variable contains your "new" setting data)
	} );
} );
