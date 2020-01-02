<?php
/**
 * The front page template file.
 *
 * This template file is used to render the site's front page,
 * whether the front page displays the blog posts index or a
 * static page. Fall back to home.php template or page.php
 * depending on the setup in Setttings->Reading.
 * If neither of those files exit, fallback to index.php file.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();

$page_layout     = get_theme_mod( 'default_blog_layout', 'right-sidebar' );
$primary_class   = 'col-md-12';
$secondary_class = 'col-md-3';

if ( 'right-sidebar' == $page_layout ) :
	$primary_class = 'col-md-9';
elseif ( 'left-sidebar' == $page_layout ) :
	$primary_class   = 'col-md-9 col-md-push-3';
	$secondary_class = 'col-md-3 col-md-pull-9';
endif;

$post_listing_display = get_theme_mod( 'blog_post_listing_display', 'post-excerpt' );
?>
<div class="container">
	<div class="row">
		<div id="primary" class="<?php echo esc_attr( $primary_class ); ?> content-area">
			<main id="main" class="site-main" role="main">
				<?php
				if ( have_posts() ) :

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/post/content', get_post_format() );

					endwhile; // End of the loop.

					// Display post pagination.
					the_posts_pagination(
						array(
							'prev_text'          => '<span class="screen-reader-text">' . __( 'Previous page', 'friendly-lite' ) . '</span><i class="fa fa-long-arrow-left" ></i>',
							'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'friendly-lite' ) . '</span><i class="fa fa-long-arrow-right"></i>',
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'friendly-lite' ) . ' </span>',
						)
					);

				else :

					get_template_part( 'template-parts/post/content', 'none' );

				endif;

				?>
			</main> <!-- #main -->
		</div><!-- #primary -->
		<?php

		/*
		 * Include sidebar only if the page layout is not set
		 * to fullwidth.
		 */
		if ( 'no-sidebar' != $page_layout ) :
			get_sidebar();
		endif;

		?>
	</div> <!-- .row --> 
</div> <!-- .container -->
<?php get_footer(); ?>
