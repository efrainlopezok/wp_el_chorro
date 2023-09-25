<?php
/**
 * Template Name: Contact Us
 */
get_header(); ?>

<?php show_template('banner') ?>

<section class="main_content">
	<?php if ( have_posts() ) : ?>
		<div class="row column">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>
</section>


<?php if($contact_form_shortcode = get_field('contact_form_shortcode')): ?>
<section class="contact_us_form">
	<div class="row column content_row">
			<?php echo do_shortcode( '' . $contact_form_shortcode . '' ); ?>
		</div>
	</div>
</section>
<?php endif; ?>

<?php $show_instagram_feed = get_field('show_instagram_feed'); ?>
<?php if ($show_instagram_feed == 'true'): ?>
	<section class="instagram_feed">
		<div class="row column content_row">
			<p><?php _e('El Chorro Weddings on Instagram','elchorro'); ?></p>
			<?php echo do_shortcode('[instagram-feed]'); ?>
		</div>
	</section>
<?php endif; ?>



<?php get_footer(); ?>
