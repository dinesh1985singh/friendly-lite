<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the main #content div and all content thereafter.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

?>
	</div><!-- #content -->

	<footer  id="colophon" class="site-footer" >
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<?php get_template_part( 'template-parts/footer/footer', 'widgets' ); ?>
				</div><!-- .row -->	
			</div> <!-- .container -->
		</div> <!-- .footer-widgets -->
		<div class="footer-social-copyright">	
			<div class="container">
				<div class="row">
					<?php get_template_part( 'template-parts/footer/footer', 'info' ); ?>
				</div><!-- .row -->	
			</div><!-- .container --> 
		</div><!-- Footer Copyright -->	
	</footer><!-- .site-footer --> 
</div><!-- #page-wrapper -->

<!--   Scroll Up Button   -->
<?php if ( get_theme_mod( 'back_to_top', true ) ) : ?> 
		<button type="button" id="scroll-up" class="btn-scroll-up" >
			<span class="screen-reader-text"><?php esc_html_e( 'Scroll up to top', 'friendly-lite' ); ?></span>
		</button><!-- .btn-scroll-up --> 
<?php endif; ?>
<!--   / Scroll Up Button   -->

<?php wp_footer(); ?>
</body>
</html>
