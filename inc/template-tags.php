<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

if ( ! function_exists( 'friendly_lite_posted_by' ) ) {

	/**
	 * Return HTML author meta information for the current post.
	 */
	function friendly_lite_posted_by() {
		$posted_by  = '<i class="fa fa-user-circle" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Posted By: ', 'friendly-lite' ) . '</span>';
		$posted_by .= '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . get_the_author() . '</a></span>';
		return $posted_by;
	}
}

if ( ! function_exists( 'friendly_lite_entry_header_meta' ) ) {
	/**
	 * Prints HTML with meta information for the current post-date/time and author.
	 */
	function friendly_lite_entry_header_meta() {
		echo '<span class="byline">' . friendly_lite_posted_by() . '</span>';
		echo '<span class="posted-on">' . friendly_lite_time_link() . '</span>';
		echo friendly_lite_edit_link();
	}
}

if ( ! function_exists( 'friendly_lite_time_link' ) ) {
	/**
	 * Gets a nicely formatted string for the last modified date only.
	 */
	function friendly_lite_time_link() {
		$time_string = '<time class="entry-date updated" datetime="%1$s">%2$s</time>';
		$time_string = sprintf(
			$time_string,
			get_the_modified_date( DATE_W3C ),
			get_the_modified_date()
		);
		
		$posted_on_link  = '<i class="fa fa-calendar" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Posted On: ', 'friendly-lite' ) . '</span>';
		$posted_on_link .= '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';
		return $posted_on_link;
	}
}

if ( ! function_exists( 'friendly_lite_category_lists' ) ) {

	/**
	 * Output Category lists.
	 */
	function friendly_lite_category_lists() {
		// $categories_lists = get_the_category_list( __( ',', 'friendly-lite' ) );
		$categories_lists = get_the_category_list( __( ',', 'friendly-lite' ) );
		if ( 'post' === get_post_type() && ! empty( $categories_lists ) ) {
			echo '<span class="cat-links"><i class="fa fa-folder-open" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Categories: ', 'friendly-lite' ) . '</span>' . $categories_lists . '</span>';
		}
	}
}

if ( ! function_exists( 'friendly_lite_tag_lists' ) ) {
	
	/**
	 * Output tag lists.
	 */
	function friendly_lite_tag_lists() {
		$tag_lists = get_the_tag_list( '', __( ',', 'friendly-lite' ) );
		// $tag_lists = get_the_tag_list( '', __( ' ', 'friendly-lite' ) );
		if ( 'post' === get_post_type() && ! empty( $tag_lists ) ) {
			echo '<span class="tags-links"><i class="fa fa-tags" aria-hidden="true"></i><span class="screen-reader-text">' . __( 'Tags: ', 'friendly-lite' ) . '</span>' . $tag_lists . '</span>';
		}
	}
}


if ( ! function_exists( 'friendly_lite_comment_link' ) ) {

	/**
	 * Output comments count and comment link.
	 */
	function friendly_lite_comment_link() {
		if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) {
			echo '<span class="comments-link"><i class="fa fa-comment" aria-hidden="true"></i>';
			comments_popup_link( __( 'Leave a comment', 'friendly-lite' ), __( '1 Comment', 'friendly-lite' ), __( '% Comments', 'friendly-lite' ) );
			echo '</span>';
		}
	}
}


if ( ! function_exists( 'friendly_lite_entry_footer_meta' ) ) {

	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function friendly_lite_entry_footer_meta() {

		friendly_lite_category_lists();
		friendly_lite_tag_lists();
		friendly_lite_comment_link();
	}
}

if ( ! function_exists( 'friendly_lite_edit_link' ) ) {

	/**
	 * Returns an accessibility-friendly link to edit a post or page.
	 *
	 * This also gives us a little context about what exactly we're editing
	 * (post or page?) so that users understand a bit more where they are in terms
	 * of the template hierarchy and their content. Helpful when/if the single-page
	 * layout with multiple posts/pages shown gets confusing.
	 */
	function friendly_lite_edit_link() {
		$link = edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit %s', 'friendly-lite' ),
				'<span class="screen-reader-text">' . get_the_title() . '</span>' 
			),
			'<span class="edit-link"><i class="fa fa-pencil" aria-hidden="true"></i>',
			'</span>'
		);
		return $link;
	}
}

if ( ! function_exists( 'friendly_lite_featured_image' ) ) {

	/**
	 * Display featured image of the post.
	 */
	function friendly_lite_featured_image() {
		// Check if the post has a Post Thumbnail assigned to it.
		if ( has_post_thumbnail() && ! post_password_required() && ! is_attachment() ) {
			$image           = '';
			$title_attribute = the_title_attribute( 'echo = 0' );
			?>
			<figure class="post-featured-image">
				<a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo esc_attr( $title_attribute ); ?>">
					<?php the_post_thumbnail( 'full' ); ?>
				</a>
			</figure>
			<?php
		}
	}
}
