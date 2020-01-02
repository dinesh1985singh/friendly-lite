/**
 * Main theme specific javascript file.
 */

( function( $ ) {

	'use strict';
	$( document ).ready( function() {

		// On dom ready hide the scroll up button.
		$( '#scroll-up' ).hide();

		// Toggle display of site preloader.
		if ( params_obj.site_preloader ) {

			const pre_loader = function() {
				$( '.pre-loader' ).fadeOut( 'slow' );
			};

			// Call a preloader.
			pre_loader();
		}

		// Toggle collapsible button icon.
		$( '#topbar-wrapper' ).on( 'hide.bs.collapse', function() {
			$( '#toggle-topbar>.fa' ).removeClass( 'fa-angle-up' ).addClass( 'fa-angle-down' );
		} );

		$( '#topbar-wrapper' ).on( 'show.bs.collapse', function() {
			$( '#toggle-topbar>.fa' ).removeClass( 'fa-angle-down' ).addClass( 'fa-angle-up' );
		} );

		// Show/hide scroll up button.
		$( window ).scroll( function () {
			// reset nav offset on scroll when window gets resize
			if ( $( this ).scrollTop() >= 100 ) {
				$( '#scroll-up' ).show();
			} else {
				$( '#scroll-up' ).hide();
			}
		} );

		// Scroll the page upwards.
		$( '#scroll-up' ).on( 'click', function() {
			$( 'body, html' ).stop( false, false ).animate( {
				 scrollTop: 0
			}, 800 );
			return false;
		} );

		// Handle sticky nav on window resize.
		$( window ).resize( function() {
			$.fn.toggleBsNbBehaviour();

			// Toggle of top bar.
			$.fn.toggleTopBar();
		} );

		// Change submenu dropdown menu item as per window size.
		$.fn.toggleBsNbBehaviour = function() {
			if ( $( window ).width() > 991 ) {
				$( '.sub-menu' ).removeAttr( 'style' );
				$( '.toggle-submenu' ).remove();
			} else if ( $( window ).width() < 992 ) {
				if ( ! $( '.menu-item-has-children' ).has( '.toggle-submenu' ).length ) {
					$( '.menu-item-has-children' ).append( '<button class="dropdown-toggle toggle-submenu"><span class="screen-reader-text">Expand Menu</span></button>' );
				}
			}
		}

		// Toggles top bar.
		$.fn.toggleTopBar = function() {

			// Hide quick links top bar below 620px.
			if ( $( window ).width() < 600 ) {

				// Hide only if the top bar is visible.
				if ( $( '#topbar-wrapper' ).hasClass( 'in' ) ) {
					$( '#topbar-wrapper' ).collapse( 'hide' );
				}
			} else {

				// Show top bar only if that is hidden.
				if ( ! $( '#topbar-wrapper' ).hasClass( 'in' ) ) {
					$( '#topbar-wrapper' ).collapse( 'show' );
				}
			}
		}

		$.fn.toggleTopBar();
		$.fn.toggleBsNbBehaviour();

		// Slide up and slide down sub menus on small devices.
		$( '.menu-item-has-children' ).on( 'click', ' > .toggle-submenu', function( e ) {
			$( this ).toggleClass( 'toggle-in' );
			$( this ).parent().children( '.sub-menu' ).toggle();
		} );

	} );
} )( jQuery );
