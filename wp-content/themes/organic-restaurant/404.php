<?php
/**
* This page template is used to display a 404 error message.
*
* @package Restaurant
* @since Restaurant 4.0
*
*/
get_header(); ?>

<!-- BEGIN .row -->
<div class="row">

	<!-- BEGIN .content -->
	<div class="content shadow radius-full">

		<!-- BEGIN .padded -->
		<div class="padded">

			<!-- BEGIN .outline -->
			<div class="outline">

			<?php if ( is_active_sidebar( 'page-sidebar' ) ) { ?>

				<!-- BEGIN .eleven columns -->
				<div class="eleven columns">

				<div class="postarea">
					<h1 class="headline"><?php esc_html_e("Not Found, Error 404", 'organic-restaurant'); ?></h1>
					<p><?php esc_html_e("The page you are looking for no longer exists.", 'organic-restaurant'); ?></p>
				</div>

				<!-- END .eleven columns -->
				</div>

				<!-- BEGIN .five columns -->
				<div class="five columns">

					<?php get_sidebar( 'page' ); ?>

				<!-- END .five columns -->
				</div>

			<?php } else { ?>

				<!-- BEGIN .sixteen columns -->
				<div class="sixteen columns">

				<div class="postarea full">
					<h1 class="headline"><?php esc_html_e("Not Found, Error 404", 'organic-restaurant'); ?></h1>
					<p><?php esc_html_e("The page you are looking for no longer exists.", 'organic-restaurant'); ?></p>
				</div>

				<!-- END .sixteen columns -->
				</div>

			<?php } ?>

			<!-- END .outline -->
			</div>

		<!-- END .padded -->
		</div>

	<!-- END .content -->
	</div>

<!-- END .row -->
</div>

<?php get_footer(); ?>
