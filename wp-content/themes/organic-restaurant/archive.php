<?php
/**
* This template is used to display archive posts, e.g. tag post indexes.
* This template is also the fallback template to 'category.php'.
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
		<div class="content shadow radius-full<?php if ( ! empty( $header_image ) ) { ?> overlap<?php } ?>">
		
			<!-- BEGIN .padded -->
			<div class="padded">
		
				<!-- BEGIN .outline -->
				<div class="outline">
		
				<?php if ( is_active_sidebar( 'blog-sidebar' ) && is_active_sidebar( 'left-sidebar' ) ) { ?>
					
					<!-- BEGIN .three columns -->
					<div class="three columns">
					
						<?php get_sidebar('left'); ?>
						
					<!-- END .three columns -->
					</div>
					
					<!-- BEGIN .eight columns -->
					<div class="eight columns">
						
						<!-- BEGIN .postarea middle -->
						<div class="postarea middle">
						
							<?php get_template_part( 'loop', 'archive' ); ?>
							
						<!-- END .postarea middle -->
						</div>
					
					<!-- END .eight columns -->
					</div>
					
					<!-- BEGIN .five columns -->
					<div class="five columns">
					
						<div class="sidebar radius-small">
						
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
							
						</div>
						
					<!-- END .five columns -->
					</div>
				
				<?php } elseif ( is_active_sidebar( 'left-sidebar' ) ) { ?>
				
					<!-- BEGIN .three columns -->
					<div class="three columns">
					
						<?php get_sidebar('left'); ?>
						
					<!-- END .three columns -->
					</div>
						
					<!-- BEGIN .thirteen columns -->
					<div class="thirteen columns">
				
						<!-- BEGIN .postarea -->
						<div class="postarea right">
						
							<?php get_template_part( 'loop', 'archive' ); ?>
						
						<!-- END .postarea -->
						</div>
					
					<!-- END .thirteen columns -->
					</div>
				
				<?php } elseif ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
					
					<!-- BEGIN .eleven columns -->
					<div class="eleven columns">
				
						<!-- BEGIN .postarea -->
						<div class="postarea">
						
							<?php get_template_part( 'loop', 'archive' ); ?>
						
						<!-- END .postarea -->
						</div>
					
					<!-- END .eleven columns -->
					</div>
					
					<!-- BEGIN .five columns -->
					<div class="five columns">
					
						<div class="sidebar radius-small">
						
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
							
						</div>
						
					<!-- END .five columns -->
					</div>
			
				<?php } else { ?>
			
					<!-- BEGIN .sixteen columns -->
					<div class="sixteen columns">
			
						<!-- BEGIN .postarea full -->
						<div class="postarea full">
						
							<?php get_template_part( 'loop', 'archive' ); ?>
						
						<!-- END .postarea full -->
						</div>
					
					<!-- END .sixteen columns -->
					</div>
				
				<?php } ?>
		
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