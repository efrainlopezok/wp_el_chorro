<?php
/**
Template Name: Menu - Brunch
*
* This template is used to display the food and drink menu.
*
* @package Restaurant
* @since Restaurant 4.0
*
*/
get_header(); ?>

<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'restaurant-featured-large' ) : false; ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<?php if ( '' != get_the_post_thumbnail() ) { ?>
		<div class="feature-img page-banner" data-type="background" data-speed="10" <?php if ( ! empty( $thumb ) ) { ?> style="background-image: url(<?php echo $thumb[0]; ?>);" <?php } ?>>
			<h1 class="headline img-headline"><?php the_title(); ?></h1>
			<?php the_post_thumbnail( 'restaurant-featured-large' ); ?>
		</div>
	<?php } ?>
	
	<!-- BEGIN .row -->
	<div class="row">
		
		<?php if ( '0' != get_theme_mod( 'category_breakfast' ) ) { ?>
	
		<!-- BEGIN .content -->
		<div class="content content-menu shadow radius-full<?php if ( '' != get_the_post_thumbnail() ) { ?> overlap<?php } ?>">
		
			<!-- BEGIN .padded -->
			<div class="padded">
		
				<!-- BEGIN .outline -->
				<div class="outline">
			
					<!-- BEGIN .sixteen columns -->
					<div class="sixteen columns">
				
						<!-- BEGIN .postarea full -->
						<div class="postarea full">
				
							<?php get_template_part( 'loop', 'breakfast' ); ?>
				
						<!-- END .postarea full -->
						</div>
					
					<!-- END .sixteen columns -->
					</div>
				
				<!-- END .outline -->
				</div>
			
			<!-- END .padded -->
			</div>
		
		<!-- END .content -->
		</div>

		<?php } ?>


<?php if ( '0' != get_theme_mod( 'category_brunchside' ) ) { ?>

  <!-- BEGIN .content -->
  <div class="content content-menu shadow radius-full<?php if ( '' != get_the_post_thumbnail() && get_theme_mod( 'category_brunchside' ) == '-1' ) { ?> overlap<?php } ?>">

    <!-- BEGIN .padded -->
    <div class="padded">

      <!-- BEGIN .outline -->
      <div class="outline">

        <!-- BEGIN .sixteen columns -->
        <div class="sixteen columns">

          <!-- BEGIN .postarea full -->
          <div class="postarea full">

            <?php get_template_part( 'loop', 'brunch' ); ?>

            <!-- END .postarea full -->
          </div>

          <!-- END .sixteen columns -->
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

	
  


<!-- END .post class -->
</div>

<?php get_footer(); ?>


