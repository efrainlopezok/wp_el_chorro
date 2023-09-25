<?php
/**
* The search form template for our theme.
*
* @package Restaurant
* @since Restaurant 4.0
*
*/
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label for="s" class="assistive-text"><?php esc_html_e( 'Search', 'organic-restaurant' ); ?></label>
	<input type="text" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php esc_attr_e( 'Search &hellip;', 'organic-restaurant' ); ?>" />
	<input type="submit" class="submit" name="submit" id="searchsubmit" value="<?php esc_attr_e( 'Go', 'organic-restaurant' ); ?>" />
</form>
