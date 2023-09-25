<!-- BEGIN .slideshow -->
<div class="slideshow">

	<!-- BEGIN .flexslider -->
	<div class="flexslider loading" data-speed="<?php echo get_theme_mod('transition_interval', '8000'); ?>" data-transition="<?php echo get_theme_mod('transition_style', 'fade'); ?>">

		<div class="preloader"></div>

		<!-- BEGIN .slides -->
		<ul class="slides">

			<?php $slider = new WP_Query(array( 'cat'=>get_theme_mod('category_slideshow_home', '0'), 'posts_per_page'=>20, 'suppress_filters'=>0 )); ?>
			<?php if ($slider->have_posts()) : while($slider->have_posts()) : $slider->the_post(); ?>
			<?php $thumb = ( has_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'restaurant-featured-large' ) : false; ?>
			<?php if (isset($_POST['featurevid'])){ $custom = get_post_custom($post->ID); $featurevid = $custom['featurevid'][0]; } ?>

			<li <?php if ( get_post_meta($post->ID, 'featurevid', true) ) { ?><?php post_class('video-slide'); ?><?php } else { post_class(); } ?> id="post-<?php the_ID(); ?>" <?php if ( has_post_thumbnail()) { ?> style="background-image: url(<?php echo $thumb[0]; ?>);" <?php } if ( ! has_post_thumbnail() && ! get_post_meta($post->ID, 'featurevid', true) ) { ?> style="background-image: url(<?php echo get_template_directory_uri(); ?>/images/default-img.jpg);"<?php } ?>>

				<?php if ( has_post_thumbnail() && ! get_post_meta($post->ID, 'featurevid', true) ) { ?>

					<!-- BEGIN .information -->
					<div class="information vertical-center">

						<!-- BEGIN .content -->
						<div class="content no-bg text-white clearfix">

							<!-- BEGIN .text-center -->
							<div class="text-center">

								<h2 class="headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h2>

								<?php if ( ! empty( $post->post_excerpt ) ) { ?>
									<h4 class="excerpt"><?php the_excerpt(); ?></h4>
								<?php } ?>

							<!-- END .text-center -->
							</div>

						<!-- END .content -->
						</div>

					<!-- END .information -->
					</div>

				<?php the_post_thumbnail( 'restaurant-featured-large' ); ?>

				<?php } elseif ( get_post_meta($post->ID, 'featurevid', true) ) { ?>

					<!-- BEGIN .content -->
					<div class="content slider-vid shadow radius-full">

						<!-- BEGIN .padded -->
						<div class="padded">

							<!-- BEGIN .outline -->
							<div class="outline">

								<div class="ten columns">

									<div class="feature-vid"><?php echo get_post_meta($post->ID, 'featurevid', true); ?></div>

								</div>

								<div class="six columns">

									<!-- BEGIN .text-holder -->
									<div class="text-holder">

										<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h2>

										<div class="excerpt"><?php the_excerpt(); ?></div>

										<div class="post-author">
											<p><i class="fa fa-comment"></i> &nbsp;<a href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Leave a Comment", 'organic-restaurant'), esc_html__("1 Comment", 'organic-restaurant'), '% Comments'); ?></a></p>
											<p><i class="fa fa-clock-o"></i> &nbsp;<?php esc_html_e("Posted on", 'organic-restaurant'); ?> <?php the_time(__("F j, Y", 'organic-restaurant')); ?> <?php esc_html_e("by", 'organic-restaurant'); ?> <?php esc_url ( the_author_posts_link() ); ?></p>
										</div>

									<!-- END .text-holder -->
									</div>

								</div>

							<!-- END .outline -->
							</div>

						<!-- END .padded -->
						</div>

					<!-- END .content -->
					</div>

				<?php } ?>

			</li>

			<?php endwhile; ?>
			<?php endif; ?>

		<!-- END .slides -->
		</ul>

	<!-- END .flexslider -->
	</div>

<!-- END .slideshow -->
</div>
