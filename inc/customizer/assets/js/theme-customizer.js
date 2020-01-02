/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
 
( function( $ ) {
	'use strict';

	// Update the site title in real time.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( newval ) {
			$( '.site-title a' ).html( newval );
		} );
	} );

	// Update the site description in real time.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( newval ) {
			$( '.site-description' ).html( newval );
		} );
	} );

	// Update site title and tagline/description in real time.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( newval ) {
			if ( 'blank' === newval ) {
				$( '.site-title, .site-description' ).css( {
					clip: 'rect(1px, 1px, 1px, 1px)',
					position: 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					clip: 'auto',
					position: 'relative'
				} );
				$( '.hero-img-on .site-branding, .hero-img-on .site-title, .hero-img-on .site-title a, .hero-img-on .site-description' ).css( {
					color: newval
				} );
			}
		} );
	} );

	// Update the site title and tagline color when hero image is disabled.
	wp.customize( 'title_tagline_color', function( value ) {
		value.bind( function( newval ) {
			$( '.hero-img-off .site-branding, .hero-img-off .site-title, .hero-img-off .site-title a, .hero-img-off .site-title a:hover, .hero-img-off .site-title a:focus, .hero-img-off .site-description' ).css( {
					color: newval
			} );
		} );
	} );
	
	// Update mobile number in real time.
	wp.customize( 'mobile_no', function( value ) {
		value.bind( function( newval ) {
			$( '#mobile-no' ).text( newval );
		} );
	} );

	// Update email id number in real time.
	wp.customize( 'email_id', function( value ) {
		value.bind( function( newval ) {
			$( '#email-id' ).text( newval );
		} );
	} );

	// Update skype address in real time.
	wp.customize( 'skype_add', function( value ) {
		value.bind( function( newval ) {
			$( '#skype-add' ).text( newval );
		} );
	} );

} )( jQuery );
