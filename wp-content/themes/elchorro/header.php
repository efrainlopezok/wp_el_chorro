<?php
/**
 * Header
 */
?>
<!DOCTYPE html>
<!--[if !(IE)]><!-->
<html <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if IE 8]>
	<html class="no-js lt-ie9 ie8" lang="en"><![endif]-->
	<!--[if gt IE 8]><!-->
	<html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<!--[if gte IE 9]>
<style type="text/css">
	.gradient {
		filter: none;
	}
</style>
<![endif]-->

<head>
	<!-- Set up Meta -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- Set the viewport width to device width for mobile -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

	<!-- Add Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Lato|Montserrat|PT+Sans:400,700|Sorts+Mill+Goudy" rel="stylesheet" type='text/css'>

	<?php wp_head(); ?>
	
	<!--tracking and reporting-->
	<script async src='https://tag.simpli.fi/sifitag/6b5d72e0-73f6-0136-4ca4-067f653fa718'></script>
	


</head>

<body <?php body_class(); ?>>

<!-- <div class="preloader">
	<div class="preloader__icon"></div>
</div> -->

<!-- BEGIN of header -->
<header class="header">
	<div class="mobile_conntacts hide-for-large">
		<div class="row column">
			<?php if($phone = get_field('phone','options')): ?>
				<a class="phone" href="tel:<?php echo preparePhone($phone); ?>"><?php echo $phone; ?></a>
			<?php endif; ?>
			<?php if($reserve_button = get_field('reserve_button','options')): ?>
				<a class="reserve" href="<?php echo $reserve_button['url'] ?>" target="<?php echo $reserve_button['target'] ?>"><?php echo $reserve_button['title'] ?></a>
			<?php endif; ?>
		</div>
	</div>
	<div class="row large-uncollapse small-collapse">
		<div class="columns">
			<div class="logo text-center">
				<?php show_custom_logo(); ?>
			</div>
			<div class="title-bar" data-responsive-toggle="main-menu" data-hide-for="large">
				<button class="menu-icon" type="button" data-toggle></button>
			</div>
			<nav class="top-bar" id="main-menu">
				<?php
				if (has_nav_menu('header-menu')) {
					wp_nav_menu(array('theme_location' => 'header-menu',
						'menu_class' => 'menu header-menu dropdown',
						'items_wrap' => '<ul id="%1$s" class="%2$s" data-responsive-menu="accordion large-dropdown" data-close-on-click-inside="false">%3$s</ul>',
						'walker' => new Foundation_Navigation()));
				}
				?>
			</nav>
		</div>
		<div class="header_contact show-for-large">
			<?php if($phone = get_field('phone','options')): ?>
				<a class="phone" href="tel:<?php echo preparePhone($phone); ?>"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $phone; ?></a>
			<?php endif; ?>
			<?php if($email = get_field('email','options')): ?>
				<a class="email" href="mailto:<?php echo $email; ?>"><i class="fa fa-envelope-o" aria-hidden="true"></i><?php echo $email; ?></a>
			<?php endif; ?>
		</div>
	</div>
</header>
<!-- END of header -->
