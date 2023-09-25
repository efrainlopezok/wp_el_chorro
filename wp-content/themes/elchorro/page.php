<?php
/**
 * Page
 */
get_header(); ?>

<?php show_template('banner') ?>

<?php $sidebar = get_field('show_sidebar'); ?>
<section>
	<div class="row main_content <?php echo $sidebar ? '' : 'content_row' ?>">
		<!-- BEGIN of page content -->
		<div class="<?php echo $sidebar ? 'large-9 medium-8' : '' ?> small-12 columns">
			<main class="main-content">
				<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
						<article <?php post_class(); ?>>
							<?php the_content('',true); ?>
						</article>
					<?php endwhile; ?>
				<?php endif; ?>
			</main>
		</div>
		<!-- END of page content -->
		<?php if ($sidebar): ?>
		<!-- BEGIN of sidebar -->
		<div class="large-3 medium-4 small-12 columns sidebar">
			<?php get_sidebar('right'); ?>
		</div>
		<!-- END of sidebar -->
		<?php endif; ?>
	</div>
</section>

<?php get_footer(); ?>
