<?php
/**
 * Single
 *
 * Loop container for single post content
 */
get_header(); ?>

<?php show_template('banner') ?>

<?php
$gluten = get_field('gluten_free_message');
$excerpt = get_field('excerpt_menu');
?>
<section>
	<div class="row column content_row menu_list">
		<div class="menu_item">
			<?php if ($excerpt): ?>
				<p class="excerpt_menu"><?php echo $excerpt; ?></p>
			<?php endif; ?>
			<?php if ($gluten): ?>
				<p class="gluten"><?php echo $gluten; ?></p>
			<?php endif; ?>
			<?php if (have_rows('specialty_menu_items')) : ?>
				<div class="specialty_menu_items">
					<?php while (have_rows('specialty_menu_items')) : the_row(); ?>
						<div class="special_menu_item clearfix">
							<div class="special_menu_item__main_info">
								<h4><?php the_sub_field('title'); ?></h4>
								<p><?php the_sub_field('description'); ?></p>
							</div>
							<div class="special_menu_item__price">
								<p><?php the_sub_field('price'); ?></p>
							</div>
						</div>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>
			<?php if (have_rows('menu_items')) : ?>
				<div class="menu_types">
					<?php while (have_rows('menu_items')) : the_row(); ?>
						<?php
						$title_type = get_sub_field('title');
						$subtitle_type = get_sub_field('subtitle');
						?>
						<?php if ($title_type): ?>
							<h3><?php echo $title_type; ?></h3>
						<?php endif; ?>
						<?php if ($subtitle_type): ?>
							<p class="food_description"><?php echo $subtitle_type; ?></p>
						<?php endif; ?>

						<?php
						$posts = get_sub_field('menu_items');
						if( $posts ): ?>
						<div class="menu_types__list">
							<?php foreach( $posts as $p ): // variable must NOT be called $post (IMPORTANT) ?>
								<div class="menu_types__list-item clearfix">
									<div class="menu_types__list-item--main_info">
										<h4><?php echo get_the_title( $p->ID ); ?></h4>
										<p><?php the_field('food_item_description', $p->ID); ?></p>
									</div>
									<div class="menu_types__list-item--price">
										<p><?php the_field('food_item_price', $p->ID) ?></p>
									</div>

								</div>
							<?php endforeach; ?>
						</div>
						<?php if($image = get_sub_field('image')): ?>
							<div class="menu_image_full hide-for-medium" style="background-image: url(<?php echo $image['sizes']['large']; ?>)"></div>
						<?php endif; ?>
					<?php endif; ?>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<div class="row column content_row">
	<script type='text/javascript' src='//www.opentable.com/widget/reservation/loader?rid=41530&domain=com&type=standard&theme=wide&lang=en-US&overlay=false&iframe=false'></script>
</div>
</section>

<?php get_footer(); ?>
