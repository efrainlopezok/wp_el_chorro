<?php
// Create HOME Slider
function home_slider_template() { ?>

<script type="text/javascript">
	jQuery(document).ready(function () {
		jQuery('#home-slider').slick({
			cssEase: 'ease',
				fade: true,  // Cause trouble if used slidesToShow: more than one
				arrows: true,
				dots: false,
				infinite: true,
				speed: 500,
				autoplay: true,
				autoplaySpeed: 4000,
				slidesToShow: 1,
				slidesToScroll: 1,
				prevArrow: '.banner-prev',
				nextArrow: '.banner-next',
				slide: '.slick-slide', // Cause trouble with responsive settings
			});
	});
</script>

<?php $arg = array(
	'post_type'      => 'slider',
	'order'          => 'ASC',
	'orderby'        => 'menu_order',
	'posts_per_page' => - 1
	);
$slider    = new WP_Query( $arg );
if ( $slider->have_posts() ) : ?>
<div class="banner show-for-medium">
	<button class="slick-prev banner-prev slick-arrow"><img src="<?php echo get_template_directory_uri() . '/images/banner_slider.png' ?>" alt="banner_arrow"></button>
	<button class="slick-next banner-next slick-arrow"><img src="<?php echo get_template_directory_uri() . '/images/banner_slider.png' ?>" alt="banner_arrow"></button>

<div id="home-slider" class="slick-slider show-for-medium">
	<?php while ( $slider->have_posts() ) : $slider->the_post(); ?>
		<div class="slick-slide" >
			<div class="slick-slide-image" <?php bg(get_attached_img_url( get_the_ID(), 'full_hd' )) ?>></div>
			<div class="slider-caption">
				<h1><?php the_title(); ?></h1>
				<?php the_content(); ?>
			</div>
		</div>
	<?php endwhile; ?>
</div><!-- END of  #home-slider-->
</div>
<?php endif;
wp_reset_query(); ?>
<?php }

// HOME Slider Shortcode

function home_slider_shortcode() {
	ob_start();
	home_slider_template();
	$slider = ob_get_clean();

	return $slider;
}

add_shortcode( 'slider', 'home_slider_shortcode' );
