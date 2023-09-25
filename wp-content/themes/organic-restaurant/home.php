<?php
/**
* This template is used to display the home page.
*
* @package Restaurant
* @since Restaurant 4.0
*
*/
get_header(); ?>

<?php if ( '0' != get_theme_mod( 'category_slideshow_home', '0' ) ) { ?>
<?php if ( '' != get_theme_mod( 'category_slideshow_home', '0' ) ) { ?>

<!-- BEGIN .home-slider -->
<div class="home-slider">

	<!-- BEGIN .row -->
	<div class="row">
			
		<?php get_template_part( 'content/slider', 'featured' ); ?>
	
	<!-- END .row -->
	</div>

<!-- END .home-slider -->
</div>

<?php } ?>
<?php } ?>

<!-- BEGIN .homepage -->
<div class="homepage">

	<!-- BEGIN .row -->
	<div class="row">
	
		<?php if ( '0' != get_theme_mod( 'page_left', '0' ) && '0' != get_theme_mod( 'page_mid', '0' ) && '0' != get_theme_mod( 'page_right', '0' ) ) { ?>
		<?php if ( '' != get_theme_mod( 'page_left', '0' ) && '' != get_theme_mod( 'page_mid', '0' ) && '' != get_theme_mod( 'page_right', '0' ) ) { ?>
	
		<!-- BEGIN .content -->
		<div class="content featured-pages no-bg overlap">
					
			<div class="holder third first">
				<?php $recent = new WP_Query('page_id='.get_theme_mod( 'page_left', '0' )); while($recent->have_posts()) : $recent->the_post(); ?>
					<?php get_template_part( 'content/home', 'page' ); ?>
				<?php endwhile; ?>
			</div>
			
			<div class="holder third">
				<?php $recent = new WP_Query('page_id='.get_theme_mod( 'page_mid', '0' )); while($recent->have_posts()) : $recent->the_post(); ?>
					<?php get_template_part( 'content/home', 'page' ); ?>
				<?php endwhile; ?>
			</div>
			
			<div class="holder third last">
				<?php $recent = new WP_Query('page_id='.get_theme_mod( 'page_right', '0' )); while($recent->have_posts()) : $recent->the_post(); ?>
					<?php get_template_part( 'content/home', 'page' ); ?>
				<?php endwhile; ?>
			</div>
	
		<!-- END .content -->
		</div>
		
		<?php } ?>
		<?php } ?>
		
		<?php if ( '0' != get_theme_mod( 'page_bottom', '0' ) ) { ?>
		<?php if ( '' != get_theme_mod( 'page_bottom', '0' ) ) { ?>
		
		<?php $recent = new WP_Query('page_id='.get_theme_mod( 'page_bottom', '0' )); while($recent->have_posts()) : $recent->the_post(); ?>
		<?php $thumb = ( has_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'restaurant-featured-medium' ) : false; ?>
		<?php $has_content = get_the_content(); ?>
		
		<!-- BEGIN .content -->
		<div class="content featured-bottom shadow radius-full<?php if ( '' != get_theme_mod( 'page_left' ) && '' != get_theme_mod( 'page_mid' ) && '' != get_theme_mod( 'page_right' ) ) { ?> top-space<?php } else { ?> overlap<?php } ?>">
		
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="feature-img post-banner<?php if ( $has_content == '' ) { ?> radius-full<?php } ?>" <?php if ( ! empty( $thumb ) ) { ?> style="background-image: url(<?php echo $thumb[0]; ?>);" <?php } ?>>
					<div class="vertical-center">
						<h2 class="headline"><?php the_title(); ?></h2>
						<?php remove_filter('the_excerpt', 'wpautop'); ?>
						<?php if ( ! empty( $post->post_excerpt ) ) { ?>
							<h4 class="excerpt"><?php the_excerpt(); ?></h4>
						<?php } ?>
					</div>
					<?php the_post_thumbnail( 'restaurant-featured-medium' ); ?>
				</div>
			<?php } ?>
							
			<?php get_template_part( 'content/home', 'bottom' ); ?>	
	
		<!-- END .content -->
		</div>
		
		<?php endwhile; ?>
		
		<?php } ?>
		<?php } ?>
		
		<?php if ( '0' == get_theme_mod( 'page_left', '0' ) && '0' == get_theme_mod( 'page_mid', '0' ) && '0' == get_theme_mod( 'page_right', '0' ) && '0' == get_theme_mod( 'page_bottom' ) ) { ?>
		
		<!-- BEGIN .content -->
		<div class="content shadow radius-full <?php if ( '' != get_theme_mod( 'category_slideshow_home' ) ) { ?>top-space<?php } ?>">
		
			<!-- BEGIN .padded -->
			<div class="padded">
		
				<!-- BEGIN .outline -->
				<div class="outline">
				
					<!-- BEGIN .postarea -->
					<div class="postarea full">
	
						<?php get_template_part( 'content/content', 'none' ); ?>
					
					<!-- END .postarea -->
					</div>
					
				<!-- END .outline -->
				</div>
			
			<!-- END .padded -->
			</div>
		
		<!-- END .content -->
		</div>
		
		<?php } ?>
	
	<!-- END .row -->
	</div>

<!-- END .homepage -->
</div>

<?php get_footer(); ?>