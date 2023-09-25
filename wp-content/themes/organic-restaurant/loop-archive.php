<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php if (isset($_POST['featurevid'])){ $custom = get_post_custom($post->ID); $featurevid = $custom['featurevid'][0]; } ?>

<!-- BEGIN .post class -->
<div <?php post_class('archive-holder'); ?> id="post-<?php the_ID(); ?>">

	<?php if ( get_theme_mod( 'display_author_blog', '1' ) == '1' ) { ?>
	<div class="post-author">
		<p><i class="fa fa-comment"></i> &nbsp;<a href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Leave a Comment", 'organic-restaurant'), esc_html__("1 Comment", 'organic-restaurant'), '% Comments'); ?></a></p>
		<p><i class="fa fa-clock-o"></i> &nbsp;<?php esc_html_e("Posted on", 'organic-restaurant'); ?> <?php the_time(__("F j, Y", 'organic-restaurant')); ?> <?php esc_html_e("by", 'organic-restaurant'); ?> <?php esc_url ( the_author_posts_link() ); ?></p>
	</div>
	<?php } ?>

	<h2 class="headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

	<?php if ( get_post_meta($post->ID, 'featurevid', true) ) { ?>
		<div class="feature-vid"><?php echo get_post_meta($post->ID, 'featurevid', true); ?></div>
	<?php } else { ?>
		<?php if ( has_post_thumbnail()) { ?>
			<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'organic-restaurant' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'restaurant-featured-large' ); ?></a>
		<?php } ?>
	<?php } ?>

	<?php the_excerpt(); ?>

	<?php $tag_list = get_the_tag_list( esc_html__( ", ", 'organic-restaurant' ) ); if ( ! empty( $tag_list ) || has_category() ) { ?>

		<!-- BEGIN .post-meta -->
		<div class="post-meta">

			<p><i class="fa fa-bars"></i> &nbsp;<?php esc_html_e("Category:", 'organic-restaurant'); ?> <?php the_category(', '); ?> &nbsp; &nbsp; <?php if ( ! empty( $tag_list ) ) { ?><i class="fa fa-tags"></i> &nbsp;<?php esc_html_e("Tags:", 'organic-restaurant'); ?> <?php the_tags(''); ?><?php } ?></p>

		<!-- END .post-meta -->
		</div>

	<?php } ?>

<!-- END .post class -->
</div>

<?php endwhile; ?>

<!-- BEGIN .pagination -->
<div class="pagination">
	<?php echo restaurant_get_pagination_links(); ?>
<!-- END .pagination -->
</div>

<?php else: ?>

<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'organic-restaurant'); ?></p>

<?php endif; ?>
