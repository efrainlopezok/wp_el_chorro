<?php
/**
 * Home
 *
 * Standard loop for the blog-page
 */
get_header(); ?>

<?php show_template('banner'); ?>

<section class="main_content">

	<div class="row posts-list form_row">
		<!-- BEGIN of Blog posts -->
		<div class="large-9 medium-8 small-12 columns">
			<main class="main-content">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<!-- BEGIN of Post -->
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h2>
								<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'foundation'), the_title_attribute('echo=0'))); ?>" rel="bookmark">
									<?php the_title(); ?>
								</a>
							</h2>
							<p class="">Posted on <?php the_time(get_option('date_format')); ?></p>
							<?php if (is_sticky()) : ?>
								<span class="secondary label"><?php _e('Sticky', 'foundation'); ?></span>
							<?php endif; ?>
							<?php the_excerpt(); // Use wp_trim_words() instead if you need specific number of words ?>
							<a href="<?php the_permalink(); ?>" class="button outlined small">Read More</a>
						</article>
						<!-- END of Post -->
					<?php endwhile; ?>
				<?php endif; ?>
			</main>
		</div>
		<!-- END of Blog posts -->

		<!-- BEGIN of sidebar -->
		<div class="large-3 medium-4 small-12 columns sidebar">
			<?php get_sidebar('right'); ?>
		</div>
		<!-- END of sidebar -->
		<!-- BEGIN of pagination -->
		<div class="column">
			<?php foundation_pagination(); ?>
		</div>
		<!-- END of pagination -->
	</div>
</section>

<?php get_footer(); ?>
