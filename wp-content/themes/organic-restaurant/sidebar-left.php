<?php
/**
* The left sidebar template for our theme.
* This template is used to display the sidebar on three column page template.
*
* @package Restaurant
* @since Restaurant 4.0
*
*/
?>

<?php if ( is_active_sidebar( 'left-sidebar' ) ) { ?>

	<div class="sidebar left radius-small">
		<?php dynamic_sidebar( 'left-sidebar' ); ?>
	</div>

<?php } ?>