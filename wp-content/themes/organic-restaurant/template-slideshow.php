<?php
/**
Template Name: Slideshow
*
* This template is used to display a page with a slideshow.
*
* @package Restaurant
* @since Restaurant 4.0
*
*/
get_header(); ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">
	
	<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .content -->
		<div class="content shadow radius-full">
		
			<?php get_template_part( 'content/slider', 'gallery' ); ?>
		
			<!-- BEGIN .padded -->
			<div class="padded">
		
				<!-- BEGIN .outline -->
				<div class="outline">
	
					<!-- BEGIN .sixteen columns -->
					<div class="sixteen columns">
					
					<?php if ( is_active_sidebar( 'page-sidebar' ) ) { ?>
						
						<!-- BEGIN .eleven columns -->
						<div class="eleven columns">
				
							<!-- BEGIN .postarea -->
							<div class="postarea">
					
								<?php get_template_part( 'loop', 'page' ); ?>
							
							<!-- END .postarea -->
							</div>
						
						<!-- END .eleven columns -->
						</div>
						
						<!-- BEGIN .five columns -->
						<div class="five columns">
						
							<?php get_sidebar(); ?>
							
						<!-- END .five columns -->
						</div>
				
					<?php } else { ?>
				
						<!-- BEGIN .sixteen columns -->
						<div class="sixteen columns">
				
							<!-- BEGIN .postarea full -->
							<div class="postarea full">
							
								<?php get_template_part( 'loop', 'page' ); ?>
							
							<!-- END .postarea full -->
							</div>
						
						<!-- END .sixteen columns -->
						</div>
				
					<?php } ?>
					
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