<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>


<!-- BEGIN  _GET -->
<?php if (isset($_GET['event_type']) || !isset($_GET['event_type'])): ?>
	<?php $type = $_GET['event_type'] ?>
	<?php switch($type){
		case 'private_event':
			$type = 'event';
			break;
		case 'wedding':
			$type = 'wedding';
			break;
		default:
			$type = 'event';
			break;
	} ?>

	<?php $featured = get_field('featured_image_for_' . $type . ''); ?>
	<?php $page_title = get_the_title(); ?>
	<?php if($alternative_title = get_field('alternative_title')): ?>
		<?php $page_title = $alternative_title; ?>
	<?php endif; ?>

<div class="banner">
	<?php if ($featured): ?>
		<img src="<?php echo $featured['sizes']['full_hd']; ?>" alt="banner">
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

	<?php if($main_content = get_field('main_content_' . $type . '')): ?>
		<section>
			<div class="row column content_row">
				<div class="intro_content text-center">
					<?php echo $main_content; ?>
					<?php if($pdf_button = get_field('pdf_button_'. $type . '')): ?>
						<div class="diagram__buttons">
							<a class="button light" href="<?php echo $pdf_button['url']; ?>" target="<?php echo $pdf_button['target']; ?>"><?php echo $pdf_button['title']; ?></a>
							
							<?php if($pdf_button_second = get_field('pdf_button_second_'.$type.'')): ?>
								<a class="button outlined" href="<?php echo $pdf_button_second['url']; ?>" target="<?php echo $pdf_button_second['target']; ?>"><?php echo $pdf_button_second['title']; ?></a>
							<?php endif; ?>
							
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php
	$images = get_field('gallery_'. $type . '');
	if( $images ): ?>
	<section class="gallery">
		<div class="row expanded">
			<?php foreach( $images as $image ): ?>
				<div class="columns medium-4">
					<div class="gallery_image" <?php bg( $image['sizes']['large'] ); ?>>
						<a title="<?php echo $image['caption'] ?>" href="<?php echo $image['url']; ?>" class="fancybox-button" rel="fancybox-button"></a>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</section>
<?php endif; ?>

<?php if($diagram_image = get_field('diagram_image')): ?>
	<section class="diagram">
		<div class="row column text-center">
			<img src="<?php echo $diagram_image['sizes']['full_hd'] ?>" alt="<?php echo $diagram_image['alt'] ?>" class="pixeleted">
			<?php
			$pricing_pdf = get_field('pricing_pdf_'. $type . '');
			$map_pdf = get_field('map_pdf_'. $type . '');
			?>
			<?php if ($pricing_pdf || $map_pdf): ?>
				<div class="diagram__buttons">
					<?php if ($pricing_pdf): ?>
						<a class="button light" href="<?php echo $pricing_pdf['url'] ?>" target="<?php echo $pricing_pdf['target'] ?>"><?php echo $pricing_pdf['title'] ?></a>
					<?php endif; ?>
					<?php if ($map_pdf): ?>
						<a class="button outlined" href="<?php echo $map_pdf['url'] ?>" target="<?php echo $map_pdf['target'] ?>"><?php echo $map_pdf['title'] ?></a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>

<?php show_template('contact_form'); ?>

<?php $show_instagram_feed = get_field('show_instagram_feed_'. $type . ''); ?>
<?php if ($show_instagram_feed == 'true'): ?>
	<section class="instagram_feed">
		<div class="row column content_row">
			<?php if($feed_title = get_field('feed_title')): ?>
				<p><?php echo $feed_title; ?></p>
			<?php endif; ?>
			<?php echo do_shortcode('[instagram-feed]'); ?>
		</div>
	</section>
<?php endif; ?>

<!-- END _GET -->
<?php endif; ?>

<?php get_footer(); ?>