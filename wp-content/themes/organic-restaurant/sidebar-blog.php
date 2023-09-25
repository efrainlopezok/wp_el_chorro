<?php
/**
* The blog sidebar template for our theme.
* This template is used to display the sidebar on the blog page template.
*
* @package Restaurant
* @since Restaurant 4.0
*
*/
?>

<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>

	<div class="sidebar blog<?php $header_image = get_header_image(); if ( is_category() && ! empty( $header_image ) ) { ?> top-space<?php } ?>">
		<?php dynamic_sidebar( 'blog-sidebar' ); ?>
	</div>

<?php } ?>