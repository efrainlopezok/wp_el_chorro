<?php
/**
* The Header for our theme.
* Displays all of the <head> section and everything up till <div id="wrap">
*
* @package Restaurant
* @since Restaurant 4.0
*
*/
?><!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>

	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- Mobile View -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="Shortcut Icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php bloginfo('siteurl'); ?>/favicon.ico" type="image/x-icon" />



	<?php get_template_part( 'style', 'options' ); ?>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php echo esc_url( bloginfo('pingback_url') ); ?>">

	<?php wp_head(); ?>

<script src='https://www.google.com/recaptcha/api.js'></script>


</head>

<body <?php body_class(); ?>>

<!-- BEGIN #wrap -->
<div id="wrap">

	<!-- BEGIN .container -->
	<div class="container">

		<!-- BEGIN #header -->
		<div id="header" <?php $header_image = get_header_image(); if ( is_home() && '' != get_theme_mod( 'category_slideshow_home' ) || is_page() && ! is_page_template('template-slideshow.php') && has_post_thumbnail() || class_exists('Woocommerce') && ! is_woocommerce() && is_archive() && ! empty( $header_image ) || is_search() && ! empty( $header_image ) ) { ?>class="absolute"<?php } ?>>

			<!-- BEGIN .row -->
			<div class="row">

				<!-- BEGIN .content -->
				<div class="content shadow radius-bottom">

					<!-- BEGIN .padded -->
					<div class="padded">

						<!-- BEGIN .outline -->
						<div class="outline">

							<?php if ( '' != get_theme_mod( 'restaurant_contact_email', 'reservations@myrestaurant.com' ) || '' != get_theme_mod( 'restaurant_contact_phone', '808.123.4567' ) || '' != get_theme_mod( 'restaurant_contact_address', '231 Front Street, Lahaina, HI 96761' ) ) { ?>

								<!-- BEGIN .contact-info -->
								<div class="contact-info">

									<div class="align-left">

									<?php if ( '' != get_theme_mod( 'restaurant_contact_address', '231 Front Street, Lahaina, HI 96761' ) ) { ?>
										<span class="contact-address"><i class="fa fa-map-marker"></i> <?php echo esc_html( get_theme_mod( 'restaurant_contact_address', '231 Front Street, Lahaina, HI 96761' ) ); ?></span>
									<?php } ?>

									</div>

									<div class="align-right">

									<?php if ( '' != get_theme_mod( 'restaurant_contact_email', 'reservations@myrestaurant.com' ) ) { ?>
										<span class="contact-email text-right"><i class="fa fa-envelope"></i> <a class="link-email" href="mailto:<?php echo esc_html( get_theme_mod( 'restaurant_contact_email', 'reservations@myrestaurant.com' ) ); ?>" target="_blank"><?php echo esc_html( get_theme_mod( 'restaurant_contact_email', 'reservations@myrestaurant.com' ) ); ?></a></span>
									<?php } ?>

									<?php if ( '' != get_theme_mod( 'restaurant_contact_phone', '808.123.4567' ) ) { ?>
										<span class="contact-phone text-right"><i class="fa fa-phone"></i> <?php echo esc_html( get_theme_mod( 'restaurant_contact_phone', '808.123.4567' ) ); ?></span>
									<?php } ?>

									</div>

								<!-- END .contact-info -->
								</div>

							<?php } ?>

							<!-- BEGIN .logo-nav -->
							<div class="logo-nav">

								<!-- BEGIN .five columns -->
								<div class="five columns">

								<?php if ( get_theme_mod( 'restaurant_logo', get_template_directory_uri() . '/images/logo.png' ) ) { ?>

									<h1 id="logo">
										<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
											<img src="<?php echo esc_url( get_theme_mod( 'restaurant_logo', get_template_directory_uri() . '/images/logo.png' ) ); ?>" alt="<?php esc_attr_e( 'Logo', 'organic-restaurant' ); ?>" />
											<span class="logo-text"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></span>
										</a>
									</h1>

								<?php } else { ?>

									<div id="masthead">

										<h1 class="site-title">
											<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a>
										</h1>

										<h2 class="site-description">
											<?php echo html_entity_decode( get_bloginfo( 'description' ) ); ?>
										</h2>

									</div>

								<?php } ?>

								<!-- END .five columns -->
								</div>

								<!-- BEGIN #navigation -->
								<nav id="navigation" class="navigation-main vertical-center" role="navigation">

									<span class="menu-toggle"><?php esc_html_e( 'Menu', 'organic-restaurant' ); ?></span>

									<?php if ( has_nav_menu( 'header-menu' ) ) {
										wp_nav_menu( array(
											'theme_location' => 'header-menu',
											'title_li' => '',
											'depth' => 4,
											'container_class' => '',
											'menu_class'      => 'menu'
											)
										);
									} else { ?>
										<div class="menu-container"><ul class="menu"><?php wp_list_pages('title_li=&depth=4'); ?></ul></div>
									<?php } ?>

								<!-- END #navigation -->
								</nav>

							<!-- END .logo-nav -->
							</div>

						<!-- END .outline -->
						</div>

					<!-- END .padded -->
					</div>

				<!-- END .content -->
				</div>

			<!-- END .row -->
			</div>

		<!-- END #header -->
		</div>
