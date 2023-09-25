<?php
/**
* This template is used when no content is present.
*
* @package restaurant
* @since restaurant 1.0
*
*/
?>

<!-- BEGIN .no-results -->
<div class="no-results">

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) { ?>

	<h2 class="headline text-center"><?php esc_html_e("No Options Saved", 'organic-restaurant'); ?></h2>
	<p class="text-center"><?php printf( wp_kses( __( 'Please set and save the theme options for the home page within the <a href="%1$s">Customizer</a>.', 'organic-restaurant' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'customize.php' ) ) ); ?></p>

<?php } elseif ( is_page_template('template-portfolio.php') && current_user_can( 'publish_posts' ) ) { ?>

	<h2 class="headline text-center"><?php esc_html_e("No Projects Found", 'organic-restaurant'); ?></h2>
	<p class="text-center"><?php printf( wp_kses( __( '<a href="%1$s">Add New</a> Projects to start creating your Portfolio.', 'organic-restaurant' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?></p>

<?php } else { ?>

	<h2 class="headline"><?php esc_html_e("No Results Found", 'organic-restaurant'); ?></h2>
	<p><?php esc_html_e("It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.", 'organic-restaurant'); ?></p>
	<div class="no-result-search"><?php get_template_part( 'searchform' ); ?></div>

<?php } ?>

<!-- END .no-results -->
</div>
