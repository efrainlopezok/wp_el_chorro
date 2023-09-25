<?php
/**
* The footer for our theme.
* This template is used to generate the footer for the theme.
*
* @package Restaurant
* @since Restaurant 4.0
*
*/
?>

<div class="clear"></div>

<!-- END .container -->
</div>

<!-- BEGIN .footer -->
<div class="footer">

	<!-- BEGIN .content -->
	<div class="content shadow radius-top">

		<!-- BEGIN .padded -->
		<div class="padded">

			<!-- BEGIN .outline -->
			<div class="outline">

				<?php if ( is_active_sidebar('footer') ) { ?>

				<!-- BEGIN .row -->
				<div class="row">

					<!-- BEGIN .footer-widgets -->
					<div class="footer-widgets">

						<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>
						<?php endif; ?>

					<!-- END .footer-widgets -->
					</div>

				<!-- END .row -->
				</div>

				<?php } ?>

				<!-- BEGIN .row -->
				<div class="row">

					<!-- BEGIN .footer-information -->
					<div class="footer-information">

						<div class="align-left">
							<p><?php esc_html_e("Copyright", 'organic-restaurant'); ?> &copy; <?php echo date(__("Y", 'organic-restaurant')); ?> &middot; <?php esc_html_e("All Rights Reserved  &middot; Website Design by LP Creative Co."); ?> <!--<?php bloginfo('name'); ?></p>-->
							
						</div>

						<?php if ( has_nav_menu( 'social-menu' ) ) { ?>

						<div class="align-right">

							<?php wp_nav_menu( array(
								'theme_location' => 'social-menu',
								'title_li' => '',
								'depth' => 1,
								'container_class' => 'social-menu',
								'menu_class'      => 'social-icons',
								'link_before'     => '<span>',
								'link_after'      => '</span>',
								)
							); ?>

						</div>

						<?php } ?>

					<!-- END .footer-information -->
					</div>

				<!-- END .row -->
				</div>

			<!-- END .outline -->
			</div>

		<!-- END .padded -->
		</div>

	<!-- END .content -->
	</div>

<!-- END .footer -->
</div>

<!-- END #wrap -->
</div>

<?php wp_footer(); ?>

</body>
</html>
