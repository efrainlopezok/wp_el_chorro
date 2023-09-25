<?php
/**
 * Template Name: About Page
 */
get_header(); ?>

<?php show_template('banner') ?>

<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<section>
			<div class="row columns content_row">
				<div class="main_content">
					<?php the_content(); ?>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
<?php endif; ?>


<?php
$images = get_field('gallery');
if( $images ): ?>
<section>
	<div class="row columns content_row">
		<ul class="gallery">
			<?php foreach( $images as $image ): ?>
				<li <?php bg( $image['sizes']['large'] ); ?>>
					<a href="<?php echo $image['url']; ?>" class="fancybox-button" rel="fancybox-button"></a>
				</li>
			<?php endforeach; ?>
		</ul>
	</div>
</section>
<?php endif; ?>

<?php if($additional_content = get_field('additional_content')): ?>
	<section>
		<div class="row columns content_row">
			<div class="additional_content">
				<?php echo $additional_content; ?>
			</div>
		</div>
	</section>
<?php endif; ?>

<?php if($fullwidth_image_about = get_field('fullwidth_image_about')): ?>
	<section class="full_width_image" style="background-image: url(<?php echo $fullwidth_image_about['sizes']['full_hd'] ?>)">
		<?php if($button_for_image = get_field('button_for_image')): ?>
			<div class="row columns content_row">
				<a href="<?php echo $button_for_image['url'] ?>" class="button transparent large" target="<?php echo $button_for_image['target'] ?>"><?php echo $button_for_image['title'] ?></a>
			</div>
		<?php endif; ?>
	</section>
<?php endif; ?>



<?php get_footer(); ?>
