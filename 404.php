<?php
/**
 * The template for displaying 404 pages ( Not Found ).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();
?>
<div class="container">
	<div class="row">
		<div id="primary" class="col-md-12 content-area">
			<main id="main" class="site-main" role="main">
				<section class="error-404 not-found">					
					<header class="page-header">
						<h1 class="page-title">
							<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'friendly-lite' ); ?>
						</h1>
					</header><!-- .page-header -->
					<div class="page-content">
						<p>
							<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'friendly-lite' ); ?>
						</p>
						<div class="row">	
							<div class="col-md-6">
								<?php get_search_form(); ?>
							</div>
						</div>	
					</div><!-- .page-content -->
				</section><!-- .error-404 -->
			</main> <!-- #main -->
		</div><!-- #primary -->
	</div> <!-- .row --> 
</div> <!-- .container -->
<?php get_footer(); ?>
