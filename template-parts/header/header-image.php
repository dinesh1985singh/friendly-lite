<?php
/**
 * Displays header media in our case header hero image.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

$display_home_hero_img = get_theme_mod( 'display_home_hero_img', true );
?>
<section class="custom-header">
	<div class="custom-header-media">
		<?php
		if ( $display_home_hero_img ) :
			if ( has_custom_header() && is_front_page() ) :
				the_custom_header_markup();
			endif;
		endif;
		?>
	</div>
	<?php

	// Include content from site-branding.php template file.
	get_template_part( 'template-parts/header/site', 'branding' );
	?>
</section><!-- .custom-header -->
