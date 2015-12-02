( function( $ ) {
    wp.customize( 'powen_custom_css', function( value ) {
        value.bind( function( to ) {
            $( 'body' ).css( to );
        } );
    } );
    // wp.customize( 'custom_plugin_css', function( value ) {
    //     value.bind( function( to ) {
    //         $( '#custom-plugin-css' ).html( to );
    //     } );
    // } );
} )( jQuery );