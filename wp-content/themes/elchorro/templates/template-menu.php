<?php
/**
 * Template Name: Main Menu Page
 */
get_header(); ?>

<?php show_template('banner') ?>


<?php
$menusArgs = array(
	'post_type'=>'food_menu',
	'posts_per_page'=>-1,
	);
	$menus = new WP_Query($menusArgs);?>
	<?php if($menus->have_posts()): ?>
		<section class="menu_list">

			<?php while($menus->have_posts()): $menus->the_post() ?>
				<?php
				$preview = get_field('image_for_main_menu_page');
				$gluten = get_field('gluten_free_message');
				$excerpt = get_field('excerpt_menu');
				?>
				<?php if ($preview): ?>
					<div class="full_width_image preview" style="background-image: url(<?php echo $preview['sizes']['full_hd'] ?>)"></div>
				<?php endif; ?>
				<div class="row column content_row">
					<div class="menu_item">
						<?php if ($gluten): ?>
							<p class="gluten"><?php echo $gluten; ?></p>
						<?php endif; ?>
						<h1 class="menu_item__name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
						<?php if ($excerpt): ?>
							<p class="excerpt_menu"><?php echo $excerpt; ?></p>
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
								<?php endif; ?>
							<?php endwhile; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		<?php endwhile; ?>
	</section>
<?php endif;?>

<section>
	<div class="row column content_row">
		<script type='text/javascript' src='//www.opentable.com/widget/reservation/loader?rid=41530&domain=com&type=standard&theme=wide&lang=en-US&overlay=false&iframe=false'></script>
	</div>
</section>




<?php get_footer(); ?>
