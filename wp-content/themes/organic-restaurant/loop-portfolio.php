<!-- BEGIN .portfolio-wrap -->
<div class="portfolio-wrap">

	<?php
		$portfoliocat = get_theme_mod( 'category_portfolio', '0' );
		if ( function_exists('icl_object_id')) {
			$multi_lingual_ID = icl_object_id($portfoliocat, 'category', false);
			$terms = get_terms('category', 'child_of='.$multi_lingual_ID.'&hide_empty=0' );
		} else {
			$terms = get_terms('category', 'child_of='.$portfoliocat.'&hide_empty=0' );
		}
		$count = count($terms);
		if ( $count > 0 ) {
			echo '<ul id="portfolio-filter" class="radius-small">';
			echo '<li><a href="javascript:void(0)" data-filter="*">All</a></li>';
			foreach ( $terms as $term ) {
				$termname = strtolower($term->slug);
				$termname = str_replace(' ', '-', $termname);
				echo '<li><a href="javascript:void(0)" data-filter=".category-'.$termname.'" rel="'.$termname.'">'.$term->name.'</a></li>';
			}
			echo "</ul>";
		}
    ?>

	<!-- BEGIN .portfolio -->
	<div class="portfolio <?php if ( get_theme_mod( 'portfolio_columns', 'three' ) == 'two') { ?>portfolio-half<?php } if ( get_theme_mod( 'portfolio_columns', 'three' ) == 'three') { ?>portfolio-third<?php } ?>">

		<!-- BEGIN .row -->
		<ul id="portfolio-list" class="row">

		<?php $wp_query = new WP_Query(array('cat'=>get_theme_mod( 'category_portfolio', '0' ), 'posts_per_page'=>999, 'suppress_filters'=>0)); ?>
		<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<?php if (isset($_POST['featurevid'])){ $custom = get_post_custom($post->ID); $featurevid = $custom['featurevid'][0]; } ?>

			<!-- BEGIN .portfolio-item -->
			<li class="portfolio-item <?php if ( get_theme_mod( 'portfolio_columns', 'three' ) == 'one' ) { ?>single<?php } if ( get_theme_mod( 'portfolio_columns', 'three' ) == 'two') { ?>half<?php } if ( get_theme_mod( 'portfolio_columns', 'three' ) == 'three') { ?>third<?php } ?> <?php $allClasses = get_post_class(); foreach ($allClasses as $class) { echo $class . " "; } ?>" data-filter="category-<?php $allClasses = get_post_class(); foreach ($allClasses as $class) { echo $class . " "; } ?>">

				<!-- BEGIN .post-holder -->
				<div class="post-holder radius-small">

					<?php if ( get_post_meta($post->ID, 'featurevid', true) ) { ?>
						<div class="feature-vid"><?php echo get_post_meta($post->ID, 'featurevid', true); ?></div>
					<?php } else { ?>
						<?php if ( has_post_thumbnail()) { ?>
							<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( esc_html__( 'Permalink to %s', 'organic-restaurant' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'restaurant-featured-large' ); ?></a>
						<?php } ?>
					<?php } ?>

					<?php if ( get_theme_mod( 'display_portfolio_info', '1' ) == '1' ) { ?>
						<div class="excerpt">
							<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
						</div><!-- END .excerpt -->
					<?php } ?>

				<!-- END .post-holder -->
				</div>

			<!-- END .portfolio-item -->
			</li>

		<?php endwhile; ?>

		<!-- END .row -->
		</ul>

		<?php else: ?>

		<p><?php esc_html_e("Sorry, no posts matched your criteria.", 'organic-restaurant'); ?></p>

		<?php endif; ?>
		<?php wp_reset_postdata(); ?>

	<!-- END .portfolio -->
	</div>

<!-- END .portfolio-wrap -->
</div>
