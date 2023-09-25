<?php $wp_query = new WP_Query(array('cat'=>get_theme_mod('category_blog', '0'), 'posts_per_page'=>get_theme_mod('postnumber_blog', '10'), 'paged'=>$paged, 'suppress_filters'=>0)); ?>
<?php if ($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
<?php if (isset($_POST['featurevid'])){ $custom = get_post_custom($post->ID); $featurevid = $custom['featurevid'][0]; } ?>
<?php $thumb = ( has_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'restaurant-featured-medium' ) : false; ?>
<?php global $more; $more = 0; ?>

<!-- BEGIN .content -->
<div class="content blog-holder shadow radius-full">

	<?php if ( get_post_meta($post->ID, 'featurevid', true) ) { ?>
		<div class="feature-vid"><?php echo get_post_meta($post->ID, 'featurevid', true); ?></div>
	<?php } else { ?>
		<?php if ( has_post_thumbnail()) { ?>
			<div class="feature-img post-banner" <?php if ( ! empty( $thumb ) ) { ?> style="background-image: url(<?php echo $thumb[0]; ?>);" <?php } ?>>
				<h2 class="headline img-headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h2>
				<?php the_post_thumbnail( 'restaurant-featured-medium' ); ?>
			</div>
		<?php } ?>
	<?php } ?>

	<!-- BEGIN .padded -->
	<div class="padded">

		<!-- BEGIN .outline -->
		<div class="outline">

			<!-- BEGIN .postarea -->
			<div class="postarea">

				<!-- BEGIN .post class -->
				<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

					<?php if ( get_theme_mod( 'display_author_blog', '1' ) == '1' ) { ?>
					<div class="post-author">
						<p><i class="fa fa-comment"></i> &nbsp;<a href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Leave a Comment", 'organic-restaurant'), esc_html__("1 Comment", 'organic-restaurant'), '% Comments'); ?></a></p>
						<p><i class="fa fa-clock-o"></i> &nbsp;<?php esc_html_e("Posted on", 'organic-restaurant'); ?> <?php the_time(__("F j, Y", 'organic-restaurant')); ?> <?php esc_html_e("by", 'organic-restaurant'); ?> <?php esc_url ( the_author_posts_link() ); ?></p>
					</div>
					<?php } ?>

					<?php if ( ! has_post_thumbnail() ) { ?>
						<h2 class="headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h2>
					<?php } ?>

					<!-- BEGIN .article -->
					<div class="article">

						<?php the_content(__("Read More", 'organic-restaurant')); ?>

					<!-- END .article -->
					</div>

				<!-- END .post class -->
				</div>

			<!-- END .postarea -->
			</div>

		<!-- END .outline -->
		</div>

	<!-- END .padded -->
	</div>

<!-- END .content -->
</div>

<?php endwhile; ?>

	<?php if($wp_query->max_num_pages > 1) { ?>
		<!-- BEGIN .pagination -->
		<div class="pagination">
			<?php echo restaurant_get_pagination_links(); ?>
		<!-- END .pagination -->
		</div>
	<?php } ?>

<?php else : ?>

<!-- BEGIN .content -->
<div class="content blog-holder shadow radius-full">

	<!-- BEGIN .padded -->
	<div class="padded">

		<!-- BEGIN .outline -->
		<div class="outline">

			<!-- BEGIN .postarea -->
			<div class="postarea">

				<div class="error-404">
					<h1 class="headline"><?php esc_html_e("No Posts Found", 'organic-restaurant'); ?></h1>
					<p><?php esc_html_e("We're sorry, but no posts have been found. Create a post to be added to this section, and configure your theme options.", 'organic-restaurant'); ?></p>
				</div>

			<!-- END .postarea -->
			</div>

		<!-- END .outline -->
		</div>

	<!-- END .padded -->
	</div>

<!-- END .content -->
</div>

<?php endif; ?>
