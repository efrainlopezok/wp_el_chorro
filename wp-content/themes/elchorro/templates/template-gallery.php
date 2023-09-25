<?php
/**
 * Template Name: Gallery Page
 */
get_header(); ?>

<?php show_template('banner'); ?>

<?php
$gallery = get_field('gallery_page');
if( $gallery ): ?>
<section class="gallery" data-id="<?php echo get_the_ID(); ?>">
		<?php $count = count($gallery); ?>
	<div class="row expanded gallery_row" data-count="<?php echo $count; ?>">
	<?php if($gallery_title = get_field('gallery_title')): ?>
		<h2 class="text-center gallery__title"><?php echo $gallery_title; ?></h2>
	<?php endif; ?>
		<?php $imagesToShow = 12; ?>
		<?php $i = 0; ?>
		<?php foreach( $gallery as $image ): ?>
			<?php if ($i<$imagesToShow): ?>
				<div class="columns medium-4 gallery_item">
					<div class="gallery_image" <?php bg( $image['sizes']['large'] ); ?>>
						<a title="<?php echo $image['caption'] ?>" href="<?php echo $image['url']; ?>" class="fancybox-button" rel="fancybox-button"></a>
					</div>
				</div>
				<?php $i++; ?>
			<?php endif; ?>
		<?php endforeach; ?>
	</div>
		<?php if ($count >= 13): ?>
			<div class="text-center more_button">
				<a class="read-more button outlined" href="javascript:void(0);">Load More</a>
			</div>
		<?php endif; ?>
</section>
<?php endif; ?>

<?php get_footer(); ?>
