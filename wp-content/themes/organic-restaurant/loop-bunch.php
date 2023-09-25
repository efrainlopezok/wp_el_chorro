<?php $option = get_theme_mod( 'category_brunchside', '0' ); ?>
<?php $term = get_term( $option, 'category-menu' ); ?>
<?php $slug = $term->slug; ?>

<h2 class="headline"><?php echo esc_html( restaurant_tax_id_to_name(get_theme_mod('category_brunchside') ) ); ?></h2>

<?php $description = term_description( $option, 'category-menu' ); ?>
<?php if ( ! empty( $description ) ) { ?>
	<div class="menu-description"><?php echo term_description( $option, 'category-menu' ); ?></div>
<?php } ?>

<?php $breakfast = new WP_Query(array('post_type' => 'menu', 'category-menu' => $slug, 'posts_per_page' => -1, 'suppress_filters'=>0)); ?>
<?php if ($breakfast->have_posts()) : while($breakfast->have_posts()) : $breakfast->the_post(); ?>
<?php $thumb = ( has_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'restaurant-featured-small' ) : false; ?>

<?php if ( has_post_thumbnail() ) { ?>

<!-- BEGIN .menu-holder -->
<div class="menu-holder">

	<div class="two columns">

		<div class="feature-img menu-pic radius-half" <?php if ( ! empty( $thumb ) ) { ?> style="background-image: url(<?php echo $thumb[0]; ?>);" <?php } ?>>
			<?php the_post_thumbnail( 'restaurant-featured-small' ); ?>
		</div>

	</div>

	<div class="fourteen columns">

		<!-- BEGIN .menu-title -->
		<div class="menu-title">

			<h4 class="title"><?php the_title(); ?></h4>

			<?php if ( get_post_meta($post->ID, 'menu_price', true) ) { ?>
				<span class="menu-price"><?php echo get_post_meta(get_the_ID(), 'menu_price', true); ?></span>
			<?php } ?>

		<!-- END .menu-title -->
		</div>

		<?php if ( ! empty( $post->post_excerpt ) ) { ?>
			<div class="excerpt"><?php the_excerpt(); ?></div>
		<?php } ?>

	</div>

<!-- END .menu-holder -->
</div>

<?php } else { ?>

<!-- BEGIN .menu-holder -->
<div class="menu-holder">

	<!-- BEGIN .menu-title -->
	<div class="menu-title">

		<h4 class="title"><?php the_title(); ?></h4>

		<?php if ( get_post_meta($post->ID, 'menu_price', true) ) { ?>
			<span class="menu-price"><?php echo get_post_meta(get_the_ID(), 'menu_price', true); ?></span>
		<?php } ?>

	<!-- END .menu-title -->
	</div>

	<?php if ( ! empty( $post->post_excerpt ) ) { ?>
		<div class="excerpt"><?php the_excerpt(); ?></div>
	<?php } ?>

<!-- END .menu-holder -->
</div>

<?php } ?>

<div class="clear"></div>

<?php endwhile; else: ?>

<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'organic-restaurant'); ?></p>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
