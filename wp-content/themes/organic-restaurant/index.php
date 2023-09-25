<?php
/**
* This template displays the blog for our theme.
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
		<div class="content no-bg<?php if ( has_post_thumbnail() ) { ?> overlap<?php } ?>">
		
			<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
				
				<!-- BEGIN .eleven columns -->
				<div class="eleven columns">
					
					<?php get_template_part( 'loop', 'blog' ); ?>
				
				<!-- END .eleven columns -->
				</div>
				
				<!-- BEGIN .five columns -->
				<div class="five columns">
				
					<?php get_sidebar('blog'); ?>
					
				<!-- END .five columns -->
				</div>
			
			<?php } else { ?>
		
				<!-- BEGIN .sixteen columns -->
				<div class="sixteen columns">
			
					<?php get_template_part( 'loop', 'blog' ); ?>
				
				<!-- END .sixteen columns -->
				</div>
		
			<?php } ?>
	
		<!-- END .content -->
		</div>
	
	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>