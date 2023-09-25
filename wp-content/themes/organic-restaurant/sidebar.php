<?php
/**
* The default sidebar template for our theme.
* This template is used to display the sidebar on pages.
*
* @package Restaurant
* @since Restaurant 4.0
*
*/
?>

<?php if ( is_active_sidebar( 'page-sidebar' ) ) { ?>

	<div class="sidebar radius-small">
		<?php dynamic_sidebar( 'page-sidebar' ); ?>
	</div>

<?php } ?>