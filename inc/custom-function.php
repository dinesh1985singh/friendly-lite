<?php
/**
 * Define custom theme specific functions and hooks callbacks.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

if ( ! function_exists( 'friendly_lite_excerpt_more_string' ) ) {
	
	/**
	 * Filters the "more" link text displayed after a trimmed excerpt.
	 * Default is set to [...] at the end of the excerpt.
	 *
	 * @param  string $more_string The default more link text.
	 * @return string Modified more link text.
	 */
	function friendly_lite_excerpt_more_string( $more_string = '' ) {
		global $post;
		$permalink      = esc_url( get_permalink() ); // Defaults to global post.
		$read_more_text = esc_html( get_theme_mod( 'readmore_text' ) );
		$post_title     = esc_html( get_the_title() );

		if ( ! empty( $read_more_text ) ) {
			return '<p class="excert-link-wrapper"><a href="' . $permalink . '" class="excerpt-more-link" >' . $read_more_text . '<span class="screen-reader-text"> "' . $post_title . '"</span><span class="meta-nav"> &rarr;</span></a></p>';
		} else {
			return '<p class="excert-link-wrapper"><a href="' . esc_url( $permalink ) . '" class="excerpt-more-link" >' . __( 'Continue Reading', 'friendly-lite' ) . '<span class="screen-reader-text"> "' . $post_title . '"</span><span class="meta-nav"> &rarr;</span></a></p>';
		}
	}
} 

if ( ! function_exists( 'friendly_lite_excerpt_more' ) ) {

	/**
	 * Filters the string in the 'more' link displayed after a trimmed excerpt.
	 * Default is set to [...] at the end of the excerpt.
	 *
	 * @see friendly_lite_excerpt_more_string().
	 *
	 * @param string $more_string The string shown within the more link.
	 * @return string Modified excerpt more string text.
	 */
	function friendly_lite_excerpt_more( $more_string ) {
		return friendly_lite_excerpt_more_string( $more_string );
	}
}

// Modify the Read More text when using the the_excerpt().
add_filter( 'excerpt_more', 'friendly_lite_excerpt_more' );

if ( ! function_exists( 'friendly_lite_more_link_text' ) ) {

	/**
	 * Change the more link text displayed when using <!--more-->
	 * within the post editor. Which is defaults to ( more... ).
	 *
	 * @param string $more_link More link URL.
	 * @param string $more_link_text More link text.
	 * @return string Modified More Link text
	 */
	function friendly_lite_more_link_text( $more_link, $more_link_text ) {
		// The default more link text is (more...).
		global $post;

		// Check if link contains default (more...), if it does replace it.
		if ( preg_match( '(more&hellip;)', $more_link ) ) {
			$_more_link_text = sprintf(
				/* translators: 1: Name of current post, 2: rightward arrow */
				__( 'Continue Reading %1$s %2$s', 'friendly-lite' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false ),
				'<span class="meta-nav">&rarr;</span>'
			);

			// Replace old more link text with the revised one in more link.
			$_more_link = str_replace( $more_link_text, $_more_link_text, $more_link );
			return '<p class="more-link-wrapper">' . $_more_link . '</p>';
		} else {
			return '<p class="more-link-wrapper">' . $more_link . '</p>';
		}
	}
}

// Modify The Read More Link Text when using <--more--> in post editor.
add_filter( 'the_content_more_link', 'friendly_lite_more_link_text', 10, 2 );

if ( ! function_exists( 'friendly_lite_comment_field_position' ) ) {

	/**
	 * Move the comment textarea field to the bottom of the comment form.
	 *
	 * @param array $fields Comment form fields array.
	 * @return array $fields Modified comment form fields array.
	 */
	function friendly_lite_comment_field_position( $fields ) {
		$comment_fields = $fields['comment'];
		unset( $fields['comment'] );
		$fields['comment'] = $comment_fields;
		return $fields;
	}
}

// Filter the comment form fields for display.
add_filter( 'comment_form_fields', 'friendly_lite_comment_field_position' );

if ( ! function_exists( 'friendly_lite_nav_search_form' ) ) {

	/**
	 * Generate custom search form for bootstrap navigation.
	 *
	 * @param string $form_html Form HTML.
	 * @return string Modified form HTML.
	 */
	function friendly_lite_nav_search_form( $form_html ) {
		$unique_id  = esc_attr( uniqid( 'search-form-' ) );
		$form_html  = '<form role="search" method="get" class="search-form navbar-search-form" action="' . esc_url( home_url( '/' ) ) . '">';
		$form_html .= '<label for="' . $unique_id . '">
			<span class="screen-reader-text">' . _x( 'Search for:', 'label', 'friendly-lite' ) . '</span></label>';
		$form_html .= '<input type="text" id="' . $unique_id . '" class="form-control" placeholder="' . esc_attr_x( 'Search &hellip;', 'placeholder', 'friendly-lite' ) . '" value="' . get_search_query() . '" name="s" />';
		$form_html .= '<button type="submit" class="btn btn-search"><span class="screen-reader-text">' . _x( 'Search', 'submit button', 'friendly-lite' ) . '</span><i class="fa fa-search" aria-hidden="true" ></i></button>';
		$form_html .= '</form>';
		return $form_html;
	}
}

if ( ! function_exists( 'friendly_lite_breadcrumb' ) ) {

	/**
	 * Generate custom theme specific breadcrumb.
	 *
	 * @return string Breadcrumb html output.
	 */
	function friendly_lite_breadcrumb() {
		// If the page is a home page or front page return.
		if ( is_home() || is_front_page() ) {
			return;
		} else {
			global $post;
			$breadcrumb  = '';
			$home_text   = __( 'Home', 'friendly-lite' );
			$home_url    = get_home_url();
			$delimiter   = '';
			$before_wrap = '<li class="breadcrumb-item active">';
			$after_wrap  = '</li>';
			$breadcrumb .= '<section class="breadcrumb-wrapper">
			<div class="container">
			<ol class="breadcrumb">';

			// Building breadcrumb.
			$breadcrumb .= '<li class="breadcrumb-item"><a href="' . esc_url( $home_url ) . '">Home</a></li>';

			// Check for archive pages.
			if ( is_category() ) {
				global $wp_query;
				$cat_obj         = $wp_query->get_queried_object();
				$cat_id          = $cat_obj->term_id;
				$cur_cat         = get_category( $cat_id );
				$parent_cat      = get_category( $cur_cat->parent );
				$parent_cat_list = array();

				while ( 0 != $cur_cat->parent ) {
					$breadcrumb_item   = '<li class="breadcrumb-item"><a href="' . get_category_link( $cur_cat->parent ) . '"> ' . get_the_category_by_ID( $cur_cat->parent ) . ' </a></li>';
					$parent_cat_list[] = $breadcrumb_item;
					$cur_cat           = get_category( $cur_cat->parent );
				}
				
				$breadcrumb .= implode( '', array_reverse( $parent_cat_list ) );
				$breadcrumb .= $before_wrap . __( 'Category: ', 'friendly-lite' ) . single_cat_title( '', false ) . $after_wrap;

			} elseif ( is_year() ) {
				$breadcrumb .= $before_wrap . get_the_time( 'Y' ) . $after_wrap;

			} elseif ( is_month() ) {
				$breadcrumb .= '<li class="breadcrumb-item">';
				$breadcrumb .= '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a>';
				$breadcrumb .= '</li>';
				$breadcrumb .= $before_wrap . get_the_time( 'F' ) . $after_wrap;

			} elseif ( is_day() ) {
				$breadcrumb .= '<li class="breadcrumb-item">';
				$breadcrumb .= '<a href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '">' . get_the_time( 'Y' ) . '</a>';
				$breadcrumb .= '</li>';
				$breadcrumb .= '<li class="breadcrumb-item">';
				$breadcrumb .= '<a href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '">' . get_the_time( 'F' ) . '</a>';
				$breadcrumb .= '</li>';
				$breadcrumb .= $before_wrap . get_the_time( 'd' ) . $after_wrap;

			} elseif ( is_search() ) {
				$breadcrumb .= $before_wrap . __( 'Seacrh results for: ', 'friendly-lite' ) . get_search_query() . $after_wrap;

			} elseif ( is_single() && ! is_attachment() ) {
				$breadcrumb .= '<li class="breadcrumb-item">';
				$cat         = get_the_category();
				$cat_id      = $cat[0];
				$cat_list    = get_category_parents( $cat_id, true, $delimiter );
				$breadcrumb .= $cat_list;
				$breadcrumb .= $before_wrap . get_the_title() . $after_wrap;

			} elseif ( is_attachment() ) {
				$breadcrumb .= '<li class="breadcrumb-item">';
				$parent      = get_post( $post->post_parent );
				$cat         = get_the_category( $parent->ID );
				$cat_id      = $cat[0];
				$cat_list    = get_category_parents( $cat_id, true, $delimiter );
				$breadcrumb .= $cat_list;
				$breadcrumb .= '<a href="' . esc_url( get_permalink( $parent ) ) . '">' . $parent->post_title . '</a>';
				$breadcrumb .= ' ' . $delimiter . ' ' . $before_wrap . get_the_title() . $after_wrap;
				$breadcrumb .= '</li>';

			} elseif ( is_page() ) {

				if ( ! $post->post_parent ) {
					$breadcrumb .= $before_wrap . get_the_title() . $after_wrap;

				} else {
					$parent_id    = $post->post_parent;
					$parent_pages = array();

					while ( $parent_id ) {
						$page           = get_page( $parent_id );
						$parent_pages[] = '<li class="breadcrumb-item"><a href="' . esc_url( get_permalink( $page->ID ) ) . '">' . get_the_title( $page->ID ) . '</a></li>';
						$parent_id      = $page->post_parent;
					}

					// Reverse the parent_pages array to get the parent page links in order.
					$parent_pages = array_reverse( $parent_pages );

					// Loop through all parent links to generate the parent menu items of the page.
					$parent_page_cnt = count( $parent_pages );
					for ( $i = 0; $i < $parent_page_cnt; $i++ ) {
						$breadcrumb .= $parent_pages[ $i ];
					}

					// Get the current page title.
					$breadcrumb .= $before_wrap . get_the_title() . $after_wrap;
				}
			} elseif ( is_tag() ) {

				$breadcrumb .= $before_wrap . __( 'Posts tagged ', 'friendly-lite' ) . '"<strong>' . single_tag_title( '', false ) . '"</strong>' . $after_wrap;

			} elseif ( is_author() ) {

				global $author;
				$userdata    = get_userdata( $author );
				$breadcrumb .= $before_wrap . __( 'Articles posted by ', 'friendly-lite' ) . $userdata->display_name . '"' . $after_wrap;

			} elseif ( is_404() ) {

				$breadcrumb .= $before_wrap . __( 'Error 404', 'friendly-lite' ) . $after_wrap;
			}

			if ( get_query_var( 'paged' ) ) {

				if (
					is_category() ||
					is_day() ||
					is_month() ||
					is_year() ||
					is_search() ||
					is_tag() ||
					is_author()
				) {
					$breadcrumb .= ' (';
				}

				$breadcrumb .= __( 'Page', 'friendly-lite' ) . ' ' . get_query_var( 'paged' );

				if (
					is_category() ||
					is_day() ||
					is_month() ||
					is_year() ||
					is_search() ||
					is_tag() ||
					is_author()
				) {
					$breadcrumb .= ') ';
				}
			}
			$breadcrumb .= '</ol></div></section>';

			/*
			 * Breadcrumb on 404 and search page does not make sense.
			 * Lets filter out those pages.
			 */ 
			if ( ! ( is_404() || is_search() ) ) {
				echo $breadcrumb;
			}
		}

	}
}


if ( ! function_exists( 'friendly_lite_custom_excerpt_more' ) ) {

	/**
	 * Filter the excerpt of the post after it is retrieved from the database and 
	 * before it is returned from the get_the_excerpt() function.
	 * 
	 * @param array $output The post excerpt to be modified.
	 * @return string $output Modified post excerpt.
	 */ 
	function friendly_lite_custom_excerpt_more( $output ) {
		if ( has_excerpt() && ! is_attachment() ) {
			$output .= friendly_lite_excerpt_more_string();
		}
		return $output;
	}
}

add_filter( 'get_the_excerpt', 'friendly_lite_custom_excerpt_more' );


if ( ! function_exists( 'friendly_lite_remove_more_link_scroll' ) ) {

	/**
	 * Removes the named anchor part from the more link.
	 *
	 * @param string $link More Link Url.
	 * @return string $link Updated More Link Url.
	 */
	function friendly_lite_remove_more_link_scroll( $link ) {
		$link = preg_replace( '|#more-[0-9]+|', '', $link );
		return $link;
	}
}

add_filter( 'the_content_more_link', 'friendly_lite_remove_more_link_scroll' );


if ( ! function_exists( 'friendly_lite_body_classes' ) ) {

	/**
	 * Add no-sidebar class to the body element depending upon the setting page.
	 *
	 * @param array $classes Class array object.
	 * @return array $classes Updated class array object.
	 */
	function friendly_lite_body_classes( $classes ) {

		if ( is_front_page() && is_home() ) {
			$blog_layout = get_theme_mod( 'default_blog_layout', 'right-sidebar' );
			if ( 'no-sidebar' == $blog_layout ) {
				$classes[] = 'no-sidebar';
			}
		}

		if ( is_archive() ) {
			$archive_layout = get_theme_mod( 'default_archive_layout', 'right-sidebar' );
			if ( 'no-sidebar' == $archive_layout ) {
				$classes[] = 'no-sidebar';
			}
		}

		if ( is_page() ) {
			$page_layout = get_theme_mod( 'default_page_layout', 'right-sidebar' );
			if ( 'no-sidebar' == $page_layout ) {
				$classes[] = 'no-sidebar';
			}
		}

		if ( is_single() ) {
			$post_layout = get_theme_mod( 'default_post_layout', 'right-sidebar' );
			if ( 'no-sidebar' == $post_layout ) {
				$classes[] = 'no-sidebar';
			}
		}

		if ( is_singular() ) {
			$classes[] = 'singular-post';
		}

		return $classes;
	}
}

add_filter( 'body_class', 'friendly_lite_body_classes' );
