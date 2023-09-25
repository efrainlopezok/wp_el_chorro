<?php
/**
Template Name: Portfolio
*
* This template is used to display a 4-column portfolio.
*
* @package Restaurant
* @since Restaurant 4.0
*
*/
get_header(); ?>

<?php $thumb = ( has_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'restaurant-featured-large' ) : false; ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="feature-img page-banner" <?php if ( ! empty( $thumb ) ) { ?> style="background-image: url(<?php echo $thumb[0]; ?>);" <?php } ?>>
			<h1 class="headline img-headline"><?php the_title(); ?></h1>
			<?php the_post_thumbnail( 'restaurant-featured-large' ); ?>
		</div>
	<?php } ?>
	
	<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .content -->
		<div class="content shadow radius-full<?php if ( has_post_thumbnail() ) { ?> overlap<?php } ?>">
		
			<!-- BEGIN .padded -->
			<div class="padded">
		
				<!-- BEGIN .outline -->
				<div class="outline">
			
					<!-- BEGIN .sixteen columns -->
					<div class="sixteen columns">
				
						<?php get_template_part( 'loop', 'portfolio' ); ?>
					
					<!-- END .sixteen columns -->
					</div>
				
				<!-- END .outline -->
				</div>
			
			<!-- END .padded -->
			</div>
		
		<!-- END .content -->
		</div>
	
	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>