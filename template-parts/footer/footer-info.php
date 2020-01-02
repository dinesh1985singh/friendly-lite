<?php
/**
 * Displays footer social icons, site copyright info
 * and promo link.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

$footer_copy_class  = 'site-copyright col-sm-12 col-md-12 col-lg-12';
$show_footer_social = get_theme_mod( 'footer_social_icons', true );
if ( $show_footer_social ) :
	$footer_social_class = 'social-icons col-lg-6 col-md-6 col-sm-12 text-left';
	$footer_copy_class   = 'site-copyright col-lg-6 col-md-6 col-sm-12 text-right';
else :
	$footer_copy_class .= ' text-center';
endif;
?>
<?php if ( $show_footer_social ) : ?>
	<div class="<?php echo esc_attr( $footer_social_class ); ?>">
		<ul class="list-inline footer-social-icons">
			<?php get_template_part( 'template-parts/social', 'media' ); ?> 
		</ul>
	</div><!-- Footer social Icons -->
<?php endif; ?>
<div class="<?php echo esc_attr( $footer_copy_class ); ?>">
	<?php
	// Include content from site-info.php template file.
	get_template_part( 'template-parts/footer/site', 'info' );
	?>
</div><!-- Footer copyright and site info -->
