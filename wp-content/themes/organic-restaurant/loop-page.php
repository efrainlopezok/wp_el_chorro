<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php if ( ! has_post_thumbnail() ) { ?>
	<h1 class="headline"><?php the_title(); ?></h1>
<?php } ?>

<?php the_content(__("Read More", 'organic-restaurant')); ?>

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

<?php edit_post_link(__("(Edit)", 'organic-restaurant'), '', ''); ?>

<?php if ( comments_open() || '0' != get_comments_number() ) comments_template(); ?>

<div class="clear"></div>

<?php endwhile; else: ?>

<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'organic-restaurant'); ?></p>

<?php endif; ?>
