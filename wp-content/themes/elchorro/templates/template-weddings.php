<?php
/**
 * Template Name: Weddings Page
 */
get_header(); ?>

<?php $page_title = get_the_title(); ?>
<?php if($alternative_title = get_field('alternative_title')): ?>
	<?php $page_title = $alternative_title; ?>
<?php endif; ?>

<div class="banner">
	<h1 class="page_title"><?php echo $page_title; ?></h1>
		<button class="slick-prev wedding-prev slick-arrow"><img src="<?php echo get_template_directory_uri() . '/images/banner_slider.png' ?>" alt="banner_arrow"></button>
		<button class="slick-next wedding-next slick-arrow"><img src="<?php echo get_template_directory_uri() . '/images/banner_slider.png' ?>" alt="banner_arrow"></button>

	<?php

	$images = get_field('header_slider');

	if( $images ): ?>
	<div class="wedding_slider">
		<?php foreach( $images as $image ): ?>
			<div class="wedding_slider__slide">
				<div class="wedding_slider__slide-image" style="background-image: url(<?php echo $image['sizes']['full_hd']; ?>)"></div>
			</div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
</div>


<?php if ( have_posts() ) : ?>
	<section class="main_content">
		<?php while ( have_posts() ) : the_post(); ?>
			<div class="row column content_row">
				<?php the_content(); ?>
				<?php
				$menu_button_link = get_field('menu_button_link');
				$map_button_link = get_field('map_button_link');
				?>
				<?php if ($menu_button_link || $map_button_link): ?>
					<div class="download_block__buttons text-center">
						<?php if ($menu_button_link): ?>
							<a class="button outlined" href="<?php echo $menu_button_link['url'] ?>" target="<?php echo $menu_button_link['target'] ?>"><?php echo $menu_button_link['title'] ?></a>
						<?php endif; ?>
						<?php if ($map_button_link): ?>
							<a class="button light" href="<?php echo $map_button_link['url'] ?>" target="<?php echo $map_button_link['target'] ?>"><?php echo $map_button_link['title'] ?></a>
						<?php endif; ?>
					</div>
				<?php endif; ?>
			</div>
		<?php endwhile; ?>
	</section>
<?php endif; ?>

<?php
$posts = get_field('weddings_list');

if( $posts ): ?>
<section class="weddings_list">
	<div class="row content_row">
		<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			<?php setup_postdata($post); ?>
			<div class="medium-6 columns">
			<?php $featured = get_field('featured_image_for_wedding'); ?>
				<div class="weddings_list__event" <?php bg( $featured['sizes']['large'] ); ?>>
					<h3><?php the_title(); ?></h3>
					<a href='<?php the_permalink(); ?>?event_type=wedding' class="button transparent small"><?php _e('Learn More','elchorro'); ?></a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>


<?php show_template('contact_form'); ?>

<?php $show_instagram_feed_main = get_field('show_instagram_feed_main'); ?>
<?php if ($show_instagram_feed_main == 'true'): ?>
	<section class="instagram_feed">
		<div class="row column content_row">
			<p><?php _e('El Chorro Weddings on Instagram','elchorro'); ?></p>
			<?php echo do_shortcode('[instagram-feed]'); ?>
		</div>
	</section>
<?php endif; ?>



<?php get_footer(); ?>
