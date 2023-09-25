<?php
/**
 * Index
 *
 * Standard loop for the search result page
 */
get_header(); ?>


<?php $bg = wp_get_attachment_image_src(get_post_thumbnail_id( get_option('page_for_posts')), 'full_hd')['0']; ?>
<div class="banner">
	<img src="<?php echo $bg; ?>" alt="banner">
</div>


<section class="main_content">
	<!-- BEGIN of search results -->
	<div class="row posts-list form_row">
		<main class="main-content">
			<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'foundation' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
			<?php if (have_posts()) : ?>
				<div class="row">
					<div class="columns large-9 medium-8">
						<?php while (have_posts()) : the_post(); ?>
							<!-- BEGIN of Post -->

							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<h3>
									<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr(sprintf(__('Permalink to %s', 'foundation'), the_title_attribute('echo=0'))); ?>" rel="bookmark">
										<?php the_title(); ?>
									</a>
								</h3>
								<?php if (is_sticky()) : ?>
									<span class="secondary label"><?php _e('Sticky', 'foundation'); ?></span>
								<?php endif; ?>
								<?php the_excerpt(); // Use wp_trim_words() instead if you need specific number of words ?>

								<p>Posted on <?php the_time(get_option('date_format')); ?></p>
								<a href="<?php the_permalink(); ?>" class="button outlined small">Read More</a>
								<!-- BEGIN of sidebar -->
								<!-- END of sidebar -->
								</article>
							<!-- END of Post -->
						<?php endwhile; ?>
					</div>
					<div class="large-3 medium-4 small-12 columns sidebar">
						<?php get_sidebar('right'); ?>
					</div>
				</div>
			<?php else: ?>
				<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'foundation' ); ?></p>
			<?php endif; ?>
			<!-- BEGIN of pagination -->
			<?php foundation_pagination(); ?>
			<!-- END of pagination -->
		</main>
	</div>
	<!-- END of search results -->
</section>

<?php get_footer(); ?>
