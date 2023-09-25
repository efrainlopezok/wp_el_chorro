<?php
/**
* This template is used to display category post indexes.
*
* @package Restaurant
* @since Restaurant 4.0
*
*/
get_header(); ?>
	
<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?>
		<div class="feature-img page-banner" <?php if ( ! empty( $header_image ) ) { ?> style="background-image: url(<?php header_image(); ?>);"<?php } ?>>
			<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php echo esc_attr( get_bloginfo() ); ?>" />
		</div>
	<?php } ?>

	<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .content -->
		<div class="content no-bg<?php if ( ! empty( $header_image ) ) { ?> overlap<?php } ?>">
		
		<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
			
			<!-- BEGIN .eleven columns -->
			<div class="eleven columns">
				
				<?php get_template_part( 'loop', 'category' ); ?>
			
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
				
				<?php get_template_part( 'loop', 'category' ); ?>
			
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