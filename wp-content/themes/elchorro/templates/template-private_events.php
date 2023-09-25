<?php
/**
 * Template Name: Private Events Page
 */
get_header(); ?>

<?php $bg = get_attached_img_url( get_the_ID(), 'full_hd' ); ?>
<div class="banner" <?php  bg( get_attached_img_url( get_the_ID(), 'full_hd' ) ); ?>>
	<?php if ($bg): ?>
		<img src="<?php echo $bg; ?>" alt="banner">
	<?php endif; ?>
	<?php $page_title = get_the_title(); ?>
	<?php if($alternative_title = get_field('alternative_title')): ?>
		<?php $page_title = $alternative_title; ?>
	<?php endif; ?>
	<div class="caption">
		<h1 class="page_title"><?php echo $page_title; ?></h1>
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="text">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php
		$banner_menu_file = get_field('banner_menu_file');
		$banner_map_file = get_field('banner_map_file');
		$banner_daytime_file = get_field('banner_daytime_file');

		?>
		<?php if ($banner_menu_file || $banner_map_file): ?>
			<div class="caption__buttons">
				<?php if ($banner_daytime_file): ?> 
					<a class="button transparent" href="<?php echo $banner_daytime_file['url'] ?>" target="<?php echo $banner_daytime_file['target'] ?>"><?php echo $banner_daytime_file['title'] ?></a>
				<?php endif; ?>
				<?php if ($banner_menu_file): ?>
					<a class="button transparent" href="<?php echo $banner_menu_file['url'] ?>" target="<?php echo $banner_menu_file['target'] ?>"><?php echo $banner_menu_file['title'] ?></a>
				<?php endif; ?>
				<?php if ($banner_map_file): ?>
					<a class="button transparent" href="<?php echo $banner_map_file['url'] ?>" target="<?php echo $banner_map_file['target'] ?>"><?php echo $banner_map_file['title'] ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php if($description_section = get_field('description_section')): ?>
	<section class="description_section">
		<div class="row content_row column">
			<?php echo $description_section; ?>
		</div>
	</section>
<?php endif; ?>

<?php

$posts = get_field('event_list');

if( $posts ): ?>
<section class="event_list">
	<div class="row expanded">
		<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			<?php setup_postdata($post); ?>
			<div class="medium-4 large-3 columns">
				<?php $featured = get_field('featured_image_for_event'); ?>
				<div class="event_list__event" <?php bg( $featured['sizes']['large'] ); ?>>
					<h3><?php the_title(); ?></h3>
					<a href='<?php the_permalink(); ?>?event_type=private_event' class="button transparent small"><?php _e('Learn More','elchorro'); ?></a>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</section>
<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif; ?>


<?php if($text = get_field('text')): ?>
	<section class="download_block">
		<div class="row column content_row">
			<?php echo $text; ?>
			<?php
			$menu_button_link = get_field('menu_button_link');
			$map_button_link = get_field('map_button_link');
			$top_button_link = get_field('top_button_link');
			?>
			<?php if ($menu_button_link || $map_button_link): ?>
				<div class="download_block__buttons">
					<?php if ($menu_button_link): ?> 
						<a class="button outlined " href="<?php echo $menu_button_link['url'] ?>" target="<?php echo $menu_button_link['target'] ?>"><?php echo $menu_button_link['title'] ?></a>
					<?php endif; ?>
					<?php if ($top_button_link): ?> 
						<a class="button outlined" href="<?php echo $top_button_link['url'] ?>" target="<?php echo $top_button_link['target'] ?>"><?php echo $top_button_link['title'] ?></a>
					<?php endif; ?>
					<?php if ($map_button_link): ?>
						<a class="button outlined" href="<?php echo $map_button_link['url'] ?>" target="<?php echo $map_button_link['target'] ?>"><?php echo $map_button_link['title'] ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>


<?php show_template('contact_form'); ?>



<?php get_footer(); ?>
