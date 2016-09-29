<?php
/**
 * Plugin Name:        Give - Setting API Fields Example
 * Description:        Learn how to add setting to plugin setting page or Form data metabox with given plugin filter and action.
 * Author:             WordImpress
 * Author URI:         http://wordimpress.com
 * Contributors:       WordImpress
 * Version:            0.1
 */


/**
 * Initialize new setting.
 *
 * @param  array $settings
 * @return array
 */
function give_add_setting_api_fields_settings( $settings ){
	// Bootstrap.
	require_once dirname( __FILE__ ) . '/includes/class-setting-api-fields.php';
	require_once dirname( __FILE__ ) . '/includes/class-metabox-setting.php';

	$settings[] = new Give_Setting_API_Fields();
	return $settings;
}
add_filter( 'give-settings_get_settings_pages', 'give_add_setting_api_fields_settings' );