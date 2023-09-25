<?php $has_content = get_the_content(); ?>
<?php if ( '' != $has_content ) { ?>

<!-- BEGIN .padded -->
<div class="padded">

	<!-- BEGIN .outline -->
	<div class="outline">

		<!-- BEGIN .featured-bottom -->
		<div class="featured-bottom">

			<!-- BEGIN .postarea -->
			<div class="postarea full">

				<?php if ( ! has_post_thumbnail() ) { ?>
					<h2 class="headline text-center"><?php the_title(); ?></h2>
				<?php } ?>

				<?php the_content(__("Read More", 'organic-restaurant')); ?>

			<!-- END .postarea -->
			</div>

		<!-- END .featured-bottom -->
		</div>

	<!-- END .outline -->
	</div>

<!-- END .padded -->
</div>

<?php } ?>
