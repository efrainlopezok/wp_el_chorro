<?php
/**
 * Template Name: Wine & Cocktails Page
 */
get_header(); ?>

<?php show_template('banner') ?>

<section class="main_content">
	<?php if ( have_posts() ) : ?>
		<div class="row column content_row">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_content(); ?>
			<?php endwhile; ?>
		</div>
	<?php endif; ?>

	<?php $cats = get_terms('wine_categories', array(
		'hide_empty' => true
		)) ?>

		<?php if ($cats): ?>
			<div class="row wine_list content_row">

				<?php foreach ($cats as $cat): ?>
					<div class="columns">
						<div class="wine_category">
							<h3><?php echo $cat->name; ?></h3>
							<?php
							$winesArgs = array(
								'post_type'=>'wine_list',
								'posts_per_page'=> -1,
								'tax_query' => array(
									'relation' => 'AND',
									array(
										'taxonomy' => 'wine_categories',
										'field' => 'slug',
										'terms' => $cat->slug,
										'include_children' => true,
										'operator' => 'IN'
										)
									)
								);
								$wines = new WP_Query($winesArgs);?>
								<?php if($wines->have_posts()): ?>
									<div class="capacity text-right show-for-medium">
										<span>Glass</span>
										<span>Bottle</span>
									</div>
									<?php while($wines->have_posts()): $wines->the_post() ?>
										<div class="wine_name">
											<p><?php the_title(); ?></p>
											<div class="cost text-right show-for-medium">
												<?php if($glass_price = get_field('glass_price')): ?>
													<span><?php echo $glass_price; ?></span>
												<?php endif; ?>
												<?php if($bottle_price = get_field('bottle_price')): ?>
													<span><?php echo $bottle_price; ?></span>
												<?php endif; ?>
											</div>
											<div class="hide-for-medium small_capacity">
												<?php if($glass_price = get_field('glass_price')): ?>
													<span>Glass <?php echo $glass_price; ?></span>
												<?php endif; ?>
												<?php if($bottle_price = get_field('bottle_price')): ?>
													<span>Bottle <?php echo $bottle_price; ?></span>
												<?php endif; ?>
											</div>
										</div>
									<?php endwhile; ?>
								<?php endif;?>

							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>

		</section>




		<?php get_footer(); ?>
