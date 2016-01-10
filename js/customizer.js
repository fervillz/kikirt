/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(4px, 4px, 4px, 4px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative',
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Sidebar hide/show
	wp.customize( 'sidebar_location', function( value ) {
		value.bind( function( to ) {
			if ( ('blank' === to) || ('none' === to) ) {
				$( '.content-area' ).css( {
					'width': '100%'
				} ),
				$( '.site-content .widget-area' ).css( {
					'display': 'none'
				} );
			}
			else if ( 'left' === to ){
				$( '.content-area' ).css( {
					'float': 'right',
					'width': '74%'
				} ),
				$( '.site-content .widget-area' ).css( {
					'float': 'left',
					'width': '25%'
				} );
			}
			else if ( 'right' === to ){
				$( '.content-area' ).css( {
					'float': 'left',
					'width': '74%'
				} ),
				$( '.site-content .widget-area' ).css( {
					'float': 'right',
					'width': '25%'
				} );
			}
			
		} );
	} );
} )( jQuery );
