<?php
/**
 * The template for displaying archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, has tag.php for Tag archives,
 * category.php for Category archives and author.php for Author archives.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();

$page_layout     = get_theme_mod( 'default_archive_layout', 'right-sidebar' );
$primary_class   = 'col-md-12';
$secondary_class = 'col-md-3';

if ( 'right-sidebar' === $page_layout ) :
	$primary_class = 'col-md-9';
elseif ( 'left-sidebar' === $page_layout ) :
	$primary_class   = 'col-md-9 col-md-push-3';
	$secondary_class = 'col-md-3 col-md-pull-9';
endif;

$post_listing_display = get_theme_mod( 'blog_post_listing_display', 'post-excerpt' );
?>

<div class="container">
	<div class="row">
		<div id="primary" class="<?php echo esc_attr( $primary_class ); ?> content-area">
			<main id="main" class="site-main" role="main">
				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php the_archive_title( '<h1 id="page-title">', '</h1>' ); ?>
						<?php the_archive_description( '<div class="taxonomy-description">', '</div>' ); ?>
					</header><!-- .page-header -->
					<?php

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/post/content', get_post_format() );
					endwhile; // End of the for loop.

					// Display post navigation.
					the_posts_pagination(
						array(
							'prev_text'         => '<span class="screen-reader-text">' . __( 'Previous page', 'friendly-lite' ) . '</span><i class="fa fa-long-arrow-left" ></i>',
							'next_text'          => '<span class="screen-reader-text">' . __( 'Next page', 'friendly-lite' ) . '</span><i class="fa fa-long-arrow-right"></i>',
							'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'friendly-lite' ) . ' </span>',
						)
					);
					?>
					<?php
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
		if ( 'no-sidebar' !== $page_layout ) :
			get_sidebar();
		endif;
		?>
	</div> <!-- .row -->
</div> <!-- .container -->
<?php get_footer(); ?>
