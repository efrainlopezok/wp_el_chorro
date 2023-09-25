<?php

/*-----------------------------------------------------------------------------------------------------//
/*	Theme License and Updater
/*-----------------------------------------------------------------------------------------------------*/

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://organicthemes.com', // Site where EDD is hosted
		'item_name' => 'Restaurant Theme + Support & Updates Subscription', // Name of theme
		'theme_slug' => 'organic-restaurant', // Theme slug
		'version' => '4.4', // The current version of this theme
		'author' => 'Organic Themes', // The author of this theme
		'download_id' => '2591', // Optional, used for generating a license renewal link
		'renew_url' => '' // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license' => __( 'Theme License', 'organic-restaurant' ),
		'enter-key' => __( 'Enter your theme license key.', 'organic-restaurant' ),
		'license-key' => __( 'License Key', 'organic-restaurant' ),
		'license-action' => __( 'License Action', 'organic-restaurant' ),
		'deactivate-license' => __( 'Deactivate License', 'organic-restaurant' ),
		'activate-license' => __( 'Activate License', 'organic-restaurant' ),
		'status-unknown' => __( 'License status is unknown.', 'organic-restaurant' ),
		'renew' => __( 'Renew?', 'organic-restaurant' ),
		'unlimited' => __( 'unlimited', 'organic-restaurant' ),
		'license-key-is-active' => __( 'License key is active.', 'organic-restaurant' ),
		'expires%s' => __( 'Expires %s.', 'organic-restaurant' ),
		'%1$s/%2$-sites' => __( 'You have %1$s / %2$s sites activated.', 'organic-restaurant' ),
		'license-key-expired-%s' => __( 'License key expired %s.', 'organic-restaurant' ),
		'license-key-expired' => __( 'License key has expired.', 'organic-restaurant' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'organic-restaurant' ),
		'license-is-inactive' => __( 'License is inactive.', 'organic-restaurant' ),
		'license-key-is-disabled' => __( 'License key is disabled.', 'organic-restaurant' ),
		'site-is-inactive' => __( 'Site is inactive.', 'organic-restaurant' ),
		'license-status-unknown' => __( 'License status is unknown.', 'organic-restaurant' ),
		'update-notice' => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'organic-restaurant' ),
		'update-available' => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'organic-restaurant' )
	)

);
