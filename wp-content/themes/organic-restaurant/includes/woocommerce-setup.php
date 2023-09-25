<?php
/**
* WooCommerce Setup Functions
* See: http:///woothemes.com/woocommerce/
*
* @package Restaurant
* @since Restaurant 4.0
*/

// Declare WooCommerce support
add_theme_support( 'woocommerce' );

// Remove WC sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// WooCommerce content wrappers
function mytheme_prepare_woocommerce_wrappers(){
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
}
add_action( 'wp_head', 'mytheme_prepare_woocommerce_wrappers' );

function mytheme_open_woocommerce_content_wrappers() {
	?>
	
	<div class="row">
		<div class="content shadow radius-full">
			<div class="padded">
				<div class="outline">
		
					<div class="eleven columns">
						<div class="postarea">
    <?php
}
function mytheme_close_woocommerce_content_wrappers() {
	?>
			    		</div>
			    	</div>
			 
			        <div class="five columns">
			        	<?php get_sidebar( 'post' ); ?>
			        </div>
	        
        		</div>
        	</div>
        </div>
 	</div>
 	
    <?php
}
add_action( 'woocommerce_before_main_content', 'mytheme_open_woocommerce_content_wrappers', 10 );
add_action( 'woocommerce_after_main_content', 'mytheme_close_woocommerce_content_wrappers', 10 );

// Add the WC sidebar in the right place
add_action( 'woo_main_after', 'woocommerce_get_sidebar', 10 );

// WooCommerce default product columns
function loop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'loop_columns');

// WooCommerce remove related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);