<?php
/**
 * Displays top toggleable bar.
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */

$mobile_no = get_theme_mod( 'mobile_no' ) ? get_theme_mod( 'mobile_no' ) : '(+91) 001 001 001';
$email_id  = get_theme_mod( 'email_id' ) ? get_theme_mod( 'email_id' ) : 'sales@domainname.com';
$skype_add = get_theme_mod( 'skype_add' ) ? get_theme_mod( 'skype_add' ) : 'contactmeatskype';

$display_header_social_icons = get_theme_mod( 'header_social_icons', true );
?>
<section class="header-top"  >
	<div id="topbar-wrapper" class="collapse in">
		<div class="container">
			<div class="row">
				<div class="col-md-8 topbar-left">
					<ul class="contact-links">
						<?php if ( ! empty( $mobile_no ) ) : ?>
							<li>
								<i class="fa fa-phone" aria-hidden="true"></i>
								<span id="mobile-no"><?php echo esc_html( $mobile_no ); ?></span>
							</li>
						<?php endif; ?>
						<?php if ( ! empty( $email_id ) ) : ?>
							<li>
								<i class="fa fa-envelope-o" aria-hidden="true" ></i>
								<span id="email-id"><?php echo esc_html( $email_id ); ?></span>
							</li>
						<?php endif; ?>
						<?php if ( ! empty( $skype_add ) ) : ?>
							<li>
								<i class="fa fa-skype" aria-hidden="true" ></i>
								<span id="skype-add"><?php echo esc_html( $skype_add ); ?></span>
							</li>
						<?php endif; ?>
					</ul>
				</div><!-- .topbar-left -->
				<?php if ( true === $display_header_social_icons ) : ?>
					<div class="col-md-4 topbar-right">	
						<ul class="header-social-icons">
							<?php get_template_part( 'template-parts/social', 'media' ); ?>
						</ul>
					</div><!-- .topbar-right -->
				<?php endif; ?>
			</div><!-- .row -->
		</div><!-- .container -->

	</div><!-- #topbar-wrapper -->
	<a href="#topbar-wrapper" data-toggle="collapse" id="toggle-topbar" class="topbar-toggle-btn" aria-expanded = "false" aria-label="<?php esc_attr_e( 'Toggle Top Bar', 'friendly-lite' ); ?>" >
		<i class="fa fa-angle-up" aria-hidden="true" title="<?php esc_attr_e( 'Toggle Top Bar', 'friendly-lite' ); ?>"></i>
	</a>
</section><!-- .header-top -->
