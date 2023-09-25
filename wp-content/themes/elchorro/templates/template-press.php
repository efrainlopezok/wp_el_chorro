<?php
/**
 * Template Name: Press Page
 */
get_header(); ?>

<?php show_template('banner') ?>

<?php if($logos_image = get_field('logos_image')): ?>
	<section class="logos">
	<div class="row content_row column">
			<?php if($logos_title = get_field('logos_title')): ?>
				<h2 class="text-center logos__title"><?php echo $logos_title; ?></h2>
			<?php endif; ?>
			<img src="<?php echo $logos_image['sizes']['full_hd'] ?>" alt="<?php echo $logos_image['alt'] ?>">
			<?php if($content = get_field('content')): ?>
				<div class="content">
					<?php echo $content; ?>
				</div>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>

<?php if (have_rows('videos')) : ?>
	<section class="videos">
		<div class="row content_row">
			<?php while (have_rows('videos')) : the_row(); ?>
				<div class="medium-6 columns matchHeight">
					<div class="responsive-embed widescreen">
						<?php the_sub_field('video'); ?>
					</div>
					<div class="iframe_text"></div>
				</div>
			<?php endwhile; ?>
		</div>
	</section>
<?php endif; ?>

<?php get_footer(); ?>
