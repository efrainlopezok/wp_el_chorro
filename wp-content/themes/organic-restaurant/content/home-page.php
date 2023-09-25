<?php $thumb = ( has_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'restaurant-featured-small' ) : false; ?>

<!-- BEGIN .content -->
<div class="content shadow radius-full">

	<!-- BEGIN .padded -->
	<div class="padded">

		<?php if ( has_post_thumbnail() ) { ?>
			<div class="feature-img post-banner" <?php if ( ! empty( $thumb ) ) { ?> style="background-image: url(<?php echo $thumb[0]; ?>);" <?php } ?>>
				<h2 class="headline img-headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h2>
				<?php the_post_thumbnail( 'restaurant-featured-small' ); ?>
			</div>
		<?php } ?>

		<!-- BEGIN .outline -->
		<div class="outline">

			<!-- BEGIN .information -->
			<div class="information">

				<?php if ( ! has_post_thumbnail() ) { ?>
					<h2 class="title text-center"><?php the_title(); ?></h2>
				<?php } ?>

				<?php the_excerpt(); ?>

			<!-- END .information -->
			</div>

			<a class="more-link" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php esc_html_e("Learn More", 'organic-restaurant'); ?></a>

		<!-- END .outline -->
		</div>

	<!-- END .padded -->
	</div>

<!-- END .content -->
</div>
