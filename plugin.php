<?php
/**
 * Plugin Name:        Give - Setting API Fields Example
 * Description:        Learn how to add setting to plugin setting page or Form data metabox with given plugin filter and action.
 * Author:             WordImpress
 * Author URI:         http://wordimpress.com
 * Contributors:       WordImpress
 * Version:            1.0
 */

/**
 * Add custom core plugin setting.
 *
 * @since 1.0
 *
 * @param $settings
 *
 * @return array
 */
function give_add_setting_api_fields_settings( $settings ) {
	// Bootstrap.
	require_once dirname( __FILE__ ) . '/includes/class-setting-api-fields.php';

	$settings[] = new Give_Setting_API_Fields();

	return $settings;
}


/**
 * Load custom metabox and core settings.
 *
 * @since 1.0
 */
function give_setting_api_example_init() {
	if ( ! class_exists( 'Give' ) ) {
		return;
	}

	// Load metabox settings.
	require_once dirname( __FILE__ ) . '/includes/class-metabox-setting.php';

	// Load custom core settings.
	add_filter( 'give-settings_get_settings_pages', 'give_add_setting_api_fields_settings' );
}

add_action( 'plugins_loaded', 'give_setting_api_example_init' );

