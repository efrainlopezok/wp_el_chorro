<?php
/**
 * Template Name: Home Page
 */
get_header(); ?>



<!--HOME PAGE SLIDER-->
<?php home_slider_template(); ?>
<!--END of HOME PAGE SLIDER-->


<div class="mobile_banner hide-for-medium" <?php bg( get_attached_img_url( get_the_ID(), 'large' ) ); ?>>
	<div class="additional_logo text-center">
		<?php show_custom_logo(); ?>
	</div>
</div>

<?php if (have_rows('links')) : ?>
	<div class="hide-for-medium row column">
	<ul class="mob_quick_links">
	 <?php while (have_rows('links')) : the_row(); ?>
	 	<?php $mob_link = get_sub_field('link'); ?>
		<li>
			<a href="<?php echo $mob_link['url']; ?>" target="<?php echo $mob_link['target']; ?>"><?php echo $mob_link['title']; ?></a>
		</li>
	 <?php endwhile; ?>
	</ul>
	</div>
<?php endif; ?>
<!-- BEGIN of main content -->
<?php if (have_rows('announcements_slider')) : ?>
	<section class="announcements_slider">
		<?php if($section__title = get_field('section__title')): ?>
			<div class="row column">
				<h6 class="announcements__title"><?php echo $section__title; ?></h6>
			</div>
		<?php endif; ?>
		<div class="row column">
			<div class="announcements">
				<?php while (have_rows('announcements_slider')) : the_row(); ?>
					<div class="announcements__slide">
						<h3><?php the_sub_field('title'); ?></h3>
						<?php if($excerpt = get_sub_field('excerpt')): ?>
							<p><?php echo $excerpt; ?></p>
						<?php endif; ?>
						<?php if($link = get_sub_field('link')): ?>
							<a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="button outlined small light"><?php echo $link['title'] ?></a>
						<?php endif; ?>
					</div>
				<?php endwhile; ?>
			</div>
			<button class="slick-prev announcements-prev slick-arrow"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
			<button class="slick-next announcements-next slick-arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
		</div>
	</section>
<?php endif; ?>
<!-- END of main content -->

<?php
$image = get_field( 'image' );
$image_mob = get_field( 'image_for_mobile' );
?>
<?php if($image || $image_mob): ?>
	<section class="full_width_image" data-bg-2="<?php echo $image_mob['sizes']['large']; ?>" data-bg="<?php echo $image['sizes']['full_hd']; ?>"></section>
<?php endif; ?>

<?php if((get_field('title_dining')) || (get_field('text'))): ?>
	<section class="dining">
		<div class="row">
			<div class="columns large-7 matchHeight">
				<?php if($title_dining = get_field('title_dining')): ?>
					<h2><?php echo $title_dining; ?></h2>
				<?php endif; ?>
				<?php if($text = get_field('text')): ?>
					<p><?php echo $text; ?></p>
				<?php endif; ?>
			</div>
			<?php if (have_rows('buttons')) : ?>
				<div class="columns large-5 matchHeight">
					<div class="table">
						<div class="cell">

							<?php while (have_rows('buttons')) : the_row(); ?>
								<?php $type = get_sub_field('button_type'); ?>
								<?php $typeClass = ''; ?>
								<?php if ($type == 'outlined'): ?>
									<?php $typeClass = 'outlined'; ?>
								<?php elseif($type == 'light'): ?>
									<?php $typeClass = 'light'; ?>
								<?php endif; ?>
								<?php $button = get_sub_field('link'); ?>
								<a href="<?php echo $button['url'] ?>" target="<?php echo $button['target'] ?>" class="button <?php echo $typeClass; ?>"><?php echo $button['title'] ?></a>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>


<?php $bg = get_field('background_image'); ?>
<section class="weddings" style="background-image: url(<?php echo $bg['sizes']['full_hd'] ?>)">
	<div class="row column">
		<div class="weddings__content">
			<?php if($title_weddings = get_field('title_weddings')): ?>
				<h2><?php echo $title_weddings; ?></h2>
			<?php endif; ?>
			<?php if($text_weddings = get_field('text_weddings')): ?>
				<p><?php echo $text_weddings; ?></p>
			<?php endif; ?>
			<?php if($button_weddings = get_field('button')): ?>
				<a href="<?php echo $button_weddings['url'] ?>" target="<?php echo $button_weddings['target'] ?>" class="button transparent"><?php echo $button_weddings['title'] ?></a>
			<?php endif; ?>
		</div>
	</div>
</section>

<?php if (have_rows('carousel')) : ?>
	<section class="awards">
		<div class="row column">
			<div class="awards__slider">
				<?php while (have_rows('carousel')) : the_row(); ?>
					<div class="awards__slider-slide">
					<?php $award_type = get_sub_field('slide_type'); ?>
					<?php if ($award_type == 'code'): ?>
						<?php the_sub_field('code'); ?>
					<?php else: ?>
						<?php $award = get_sub_field('image'); ?>
						<img src="<?php echo $award['sizes']['medium'] ?>" alt="<?php echo $award['alt'] ?>">
					<?php endif; ?>


					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php get_footer(); ?>
