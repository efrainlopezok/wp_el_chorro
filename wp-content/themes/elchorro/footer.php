<?php
/**
 * Footer
 */
?>

<!-- BEGIN of footer -->
<footer class="footer">
	<div class="footer_top">

		<div class="row">
			<div class="small-12 columns">

				<form action="https://my.zenreach.com/api/widgets/submit_customer/" method="post" enctype="application/x-www-form-urlencoded">
					<input type="hidden" name="business_id" value="59f4e2c053b57a0010227b84"/>
					<input type="hidden" name="tags" value=""/>
					<p>Sign up for Updates</p>
					<input type="text" name="email" placeholder="email address"/>
					<button type="submit" class="transparent button small">Subscribe</button>
				</form>
			</div>
			<div class="columns medium-6 large-4 large-push-8 matchHeight">
				<?php if($hour_of_operation = get_field('hour_of_operation','options')): ?>
					<h6 class="footer_col_title">Hours of Operation</h6>
					<div class="hour_of_operation">
						<?php echo $hour_of_operation; ?>
					</div>
				<?php endif; ?>
			</div>
			<div class="columns large-2 large-pull-4 show-for-large">
				<a href="http://scottsdalerestaurants.com/" class="sr_reviewed_100" target="_blank"></a>

				<style> a.sr_reviewed_100 { position:relative; right:0; margin:0 auto; display:block; width:100px; height:100px; background:url(https://scottsdalerestaurants.com/src/sr-100-b.png) left center no-repeat; overflow:hidden; text-indent:-9999px; -webkit-transition: all 0.7s ease-in-out; -moz-transition: all 0.7s ease-in-out; -o-transition: all 0.7s ease-in-out; transition:all 0.7s ease-in-out; } a.sr_reviewed_100:hover {background:url(http://scottsdalerestaurants.com/src/sr-100-r.png) right center no-repeat;} </style>
			</div>
			<div class="columns medium-6 large-3 large-pull-4 show-for-medium matchHeight">
				<?php
				if (has_nav_menu('footer-menu')) {
					echo '<h6 class="footer_col_title">Quick Links</h6>';
					wp_nav_menu( array( 'theme_location' => 'footer-menu', 'menu_class' => 'footer-menu','depth'=>1));
				}
				?>
			</div>
			<div class="columns medium-12 large-3 large-pull-4 medium-text-center large-text-left">
				<div class="footer_contacts show-for-medium">
					<?php if($phone_footer = get_field('phone_footer','options')): ?>
						<a class="phone_footer" href="tel:<?php echo preparePhone($phone_footer); ?>"><?php echo $phone_footer; ?></a>
					<?php endif; ?>
					<?php if($address = get_field('address','options')): ?>
						<p class="address"><?php echo $address; ?></p>
					<?php endif; ?>
					<?php if($email_footer = get_field('email_footer','options')): ?>
						<a class="email_footer" href="mailto:<?php echo $email_footer; ?>"><?php echo $email_footer; ?></a>
					<?php endif; ?>
				</div>
				<a href="http://scottsdalerestaurants.com/" class="sr_reviewed_100 hide-for-large" target="_blank"></a>
				<div id="TA_restaurantWidgetGreen126" class="TA_restaurantWidgetGreen">
					<ul id="ngawIYn" class="TA_links ZzJQgmpNuN">
						<li id="A78AWDKBR" class="oGSXTOnWK">
							<a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/partner/tripadvisor_logo_117x18-24177-2.png" alt="TripAdvisor"/></a>
						</li>
					</ul>
				</div>
				<script src="https://www.jscache.com/wejs?wtype=restaurantWidgetGreen&amp;uniq=126&amp;locationId=445715&amp;icon=knifeAndFork&amp;lang=en_US&amp;display_version=2"></script>

				<?php if (have_rows('social_links','options')) : ?>
					<ul class="social_links text-center hide-for-medium">
						<?php while (have_rows('social_links','options')) : the_row(); ?>
							<li><a href="<?php the_sub_field('social_url'); ?>" target="_blank"><?php the_sub_field('social_net'); ?></a></li>
						<?php endwhile; ?>
					</ul>
				<?php endif; ?>
			</div>

		</div>
	</div>

	<div class="footer__bottom">
		<div class="row">
			<div class="columns medium-8 large-6">
			<?php
				if (has_nav_menu('footer-menu')) {
					echo '<div class="hide-for-medium">';
					wp_nav_menu( array( 'theme_location' => 'footer-mob-menu', 'menu_class' => 'footer-menu','depth'=>1));
					echo '</div>';
				}
				?>
				<p class="copyright">© <?php echo date('Y'); ?> <?php echo bloginfo('name'); ?> All Rights Reserved</p>
				<?php
				$privacy_page = get_field('privacy_page','options');
				if( $privacy_page ):
	// override $post
					$post = $privacy_page;
				setup_postdata( $post );
				?>
				<a class="page_link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
			<?php endif; ?>
			<?php
			$sitemap_page = get_field('sitemap_page','options');
			if( $sitemap_page ):
	// override $post
				$post = $sitemap_page;
			setup_postdata( $post );
			?>
			<a class="page_link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>
		<p>Site Design &amp; Hosting by <a href="https://lpcreativeco.com" target="_blank">LP Creative Co</a></p>
	</div>
	<div class="columns medium-4 show-for-medium large-6">
		<?php if (have_rows('social_links','options')) : ?>
			<ul class="social_links text-right">
				<?php while (have_rows('social_links','options')) : the_row(); ?>
					<li><a href="<?php the_sub_field('social_url'); ?>" target="_blank"><?php the_sub_field('social_net'); ?></a></li>
				<?php endwhile; ?>
			</ul>
		<?php endif; ?>
	</div>
</div>
</div>
</footer>
<!-- END of footer -->

<?php wp_footer(); ?>
</body>
</html>
