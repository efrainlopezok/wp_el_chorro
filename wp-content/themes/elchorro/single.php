<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>

<?php show_template('banner') ?>

<section class="main_content">
	<div class="row form_row">
		<!-- BEGIN of post content -->
		<div class="large-9 medium-9 small-12 columns">
			<main class="main-content">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<h2 class="page-title"><?php the_title(); ?></h2>
							<p class="">Posted on <?php the_time(get_option('date_format')); ?></p>
							<?php the_content('',true); ?>
						</article>
							<ul class="share">
								<li>
									<a class="share-button" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								</li>
								<li>
									<a class="share-button" href="https://twitter.com/intent/tweet?text=<?php echo get_permalink(); ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								</li>
								<li>
									<a class="share-button" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink(); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
								</li>
								<li>
									<a class="share-button" href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
								</li>
							</ul>
					<?php endwhile; ?>
				<?php endif; ?>
			</main>
		</div>
		<!-- END of post content -->

		<!-- BEGIN of sidebar -->
		<div class="large-3 medium-3 small-12 columns sidebar">
			<?php get_sidebar('right'); ?>
		</div>
		<!-- END of sidebar -->
	</div>

</section>
<?php get_footer(); ?>
