( function( $ ) {

    wp.customize( 'wfmtest_phone', function( value ) {
        value.bind( function( newval ) {
            $('.phone span').text( newval );
            if (newval === '') {
                $('.phone').fadeOut();
            } else {
                $('.phone').fadeIn();
            }
        } );
    } );

    wp.customize( 'wfmtest_display_description', function( value ) {
        value.bind( function( newval ) {
            false == newval ? $('section.header h2').fadeOut() : $('section.header h2').fadeIn();
        } );
    } );

} )( jQuery );
