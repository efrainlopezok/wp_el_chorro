<!-- BEGIN .slideshow gallery-slideshow -->
<div class="slideshow gallery-slideshow">
	
	<!-- BEGIN .flexslider -->
	<div class="flexslider loading" data-speed="<?php echo get_theme_mod('transition_interval', '8000'); ?>" data-transition="<?php echo get_theme_mod('transition_style', 'fade'); ?>">
	
		<div class="preloader"></div>
	
		<!-- BEGIN .slides -->
		<ul class="slides">
				
			<?php while ( have_posts() ) : the_post(); if ( get_post_gallery() ) : ?>
			            
			    <?php $gallery = get_post_gallery( $post, false ); $ids = explode( ",", $gallery['ids'] ); ?>
			    
			    <?php foreach( $ids as $id ) { ?>
			    	<?php $link = wp_get_attachment_url( $id ); ?>
			        <li><img src="<?php echo esc_url($link); ?>" class="gallery-slider-img" /></li>
			    <?php } ?>
			            
			<?php endif; endwhile; ?>
			
		<!-- END .slides -->
		</ul>
		
	<!-- END .flexslider -->
	</div>

<!-- END .slideshow gallery-slideshow -->
</div>