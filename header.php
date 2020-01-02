<?php
/**
 * The header template for our theme.
 *
 * This is the template that displays all of the head section and everything
 * up until main #content div element.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Friendly_Lite
 * @since 1.0.0
 * @version 1.0.0
 */
	
?><!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

	<!-- You should add profile & pingback rel link tag manually -->
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<?php if ( get_theme_mod( 'site_preloader', true ) ) : ?>
		<div class="pre-loader"></div><!-- Site preloader -->
	<?php endif; ?>
	<a  href="#content" class="skip-link screen-reader-text" ><?php esc_html_e( 'Skip To Content', 'friendly-lite' ); ?></a>
	<div id="page-wrapper" class="hfeed site">
		<?php
		$display_home_hero_img = get_theme_mod( 'display_home_hero_img', true );
		$header_dynamic_class  = is_front_page() ? ( ( has_header_image() && $display_home_hero_img ) ? 'hero-img-on' : 'hero-img-off' ) : 'hero-img-off';
		?>

		<header id="masthead" class="site-header <?php echo esc_attr( $header_dynamic_class ); ?>" role="banner">
			<?php get_template_part( 'template-parts/header/topbar', 'strip' ); ?>
			<?php get_template_part( 'template-parts/header/header', 'image' ); ?>

			<?php if ( has_nav_menu( 'header_menu' ) ) : ?>
				<section id="primary-nav" class="primary-nav">
					<?php get_template_part( 'template-parts/navigation/navigation', 'primary' ); ?>
				</section><!-- #primary-nav  -->
			<?php endif; ?>
		</header><!-- #masthead -->

		<?php

		// Lets make the breadcrumb dependable on external plugin.
		if ( function_exists( 'friendly_lite_breadcrumb' ) ) :
			friendly_lite_breadcrumb();
		endif;
		?>
		<div id="content" class="site-content">
