<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both 
 * the current comments and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */

if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area">
	<?php
	if ( have_comments() ) :
		?>
		<h3 class="comments-title">
		<?php
		$comments_number = get_comments_number();
		if ( '1' === $comments_number ) :
			/* translators: %s: post title */
			printf( _x( 'One comment on &ldquo;%s&rdquo;', 'comments title', 'friendly-lite' ), get_the_title() );
		else :
			printf(
				/* translators: 1: number of comments, 2: post title */
				_nx(
					'%1$s comment on &ldquo;%2$s&rdquo;',
					'%1$s comments on &ldquo;%2$s&rdquo;',
					get_comments_number(),
					'comments title',
					'friendly-lite'
				),
				number_format_i18n( get_comments_number() ),
				'<span>' . get_the_title() . '</span>'
			);
		endif;
		?>
		</h3>
		<ol class="comment-list">
		<?php
		wp_list_comments(
			array(
				'style'       => 'ol',
				'avatar_size' => 48,
				'short_ping'  => true,
			)
		);
		?>
		</ol><!-- .comment-list -->
		<?php

		/**
		 * Displays a paginated navigation to next/previous set of comments below the comment lists,
		 * when applicable.
		 *
		 * @since WordPress 4.4
		 */
		the_comments_pagination(
			array(
				'prev_text'          => '<span class="screen-reader-text">' . __( 'Previous page', 'friendly-lite' ) . '</span><i class="fa fa-long-arrow-left" ></i>',
				'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'friendly-lite' ) . '</span><i class="fa fa-long-arrow-right"></i>',
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'friendly-lite' ) . ' </span>',
			)
		);
	endif; // Check for have_comments().

	// If comments are closed and there are comments, let's leave a little note.
	if ( ! comments_open() && get_comments_number() ) :
		echo '<p class="no-comments">' . esc_html_e( 'Comments are closed.', 'friendly-lite' ) . '</p>';
	endif;
	comment_form();
	?>
</div><!-- #comments -->
