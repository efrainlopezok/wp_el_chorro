<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if ( get_theme_mod( 'display_author_post', '1' ) == '1' ) { ?>
	<div class="post-author">
		<p><i class="fa fa-comment"></i> &nbsp;<a class="scroll" href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Leave a Comment", 'organic-restaurant'), esc_html__("1 Comment", 'organic-restaurant'), '% Comments'); ?></a></p>
		<p><i class="fa fa-clock-o"></i> &nbsp;<?php esc_html_e("Posted on", 'organic-restaurant'); ?> <?php the_time(__("F j, Y", 'organic-restaurant')); ?> <?php esc_html_e("by", 'organic-restaurant'); ?> <?php esc_url ( the_author_posts_link() ); ?></p>
	</div>
<?php } ?>

<?php if ( ! has_post_thumbnail() ) { ?>
	<h1 class="headline"><?php the_title(); ?></h1>
<?php } ?>

<!-- BEGIN .article -->
<div class="article">

	<?php the_content(); ?>

<!-- END .article -->
</div>

<?php wp_link_pages(array(
	'before' => '<p class="page-links"><span class="link-label">' . esc_html__('Pages:', 'organic-restaurant') . '</span>',
	'after' => '</p>',
	'link_before' => '<span>',
	'link_after' => '</span>',
	'next_or_number' => 'next_and_number',
	'nextpagelink' => esc_html__('Next', 'organic-restaurant'),
	'previouspagelink' => esc_html__('Previous', 'organic-restaurant'),
	'pagelink' => '%',
	'echo' => 1 )
); ?>

<!-- BEGIN .post-meta -->
<div class="post-meta">

	<p><i class="fa fa-bars"></i> &nbsp;<?php esc_html_e("Category:", 'organic-restaurant'); ?> <?php the_category(', '); ?><?php $tag_list = get_the_tag_list( esc_html__( ", ", 'organic-restaurant' ) ); if ( ! empty( $tag_list ) ) { ?> &nbsp; &nbsp; <i class="fa fa-tags"></i> &nbsp;<?php esc_html_e("Tags:", 'organic-restaurant'); ?> <?php the_tags(''); ?><?php } ?></p>

<!-- END .post-meta -->
</div>

<!-- BEGIN .post-navigation -->
<div class="post-navigation">
	<div class="previous-post"><?php previous_post_link('&larr; %link'); ?></div>
	<div class="next-post"><?php next_post_link('%link &rarr;'); ?></div>
<!-- END .post-navigation -->
</div>

<?php if ( comments_open() || '0' != get_comments_number() ) comments_template(); ?>

<div class="clear"></div>

<?php endwhile; else: ?>

<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'organic-restaurant'); ?></p>

<?php endif; ?>
