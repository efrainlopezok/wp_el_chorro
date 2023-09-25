
<?php if (is_home()): ?>
	<?php $bg = wp_get_attachment_image_src(get_post_thumbnail_id( get_option('page_for_posts')), 'full_hd')['0']; ?>
	<?php $page_title = get_the_title(get_option('page_for_posts')); ?>
	<?php if($alternative_title = get_field('alternative_title', get_option('page_for_posts'))): ?>
		<?php $page_title = $alternative_title; ?>
	<?php endif; ?>
<?php else: ?>
	<?php $bg = get_attached_img_url( get_the_ID(), 'full_hd' ); ?>
	<?php $page_title = get_the_title(); ?>
	<?php if($alternative_title = get_field('alternative_title')): ?>
		<?php $page_title = $alternative_title; ?>
	<?php endif; ?>
<?php endif; ?>


<div class="banner" style="background-image: url(<?php echo $bg; ?>)">
	<?php if ($bg): ?>
		<img src="<?php echo $bg; ?>" alt="banner">
	<?php endif; ?>
	<h1 class="page_title"><?php echo $page_title; ?></h1>
	<?php if (is_singular('food_menu') || is_page_template( 'templates/template-wine.php' ) || is_page_template( 'templates/template-menu.php' )): ?>
		<?php
		if (has_nav_menu('footer-menu')) {
			echo '<div class="hide-for-medium single_mob_menu">';
			echo '<p class="mob_menu_title">Menu</p>';
			wp_nav_menu( array( 'theme_location' => 'single-mob-menu', 'menu_class' => 'single-menu','depth'=>1));
			echo '</div>';
		}
		?>
	<?php endif; ?>
</div>
