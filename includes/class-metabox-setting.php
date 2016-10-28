<?php
// Exit if access directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 * Example code to show how to add metabox tab to give form data settingd.
 *
 * @package     Give
 * @subpackage  Classes/Give_Metabox_Setting_Fields
 * @copyright   Copyright (c) 2016, WordImpress
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
class Give_Metabox_Setting_Fields{

	/**
	 * Give_Metabox_Setting_Fields constructor.
	 */
	function __construct(){
		$this->id    = 'metabox-setting-fields';
		$this->label = __( 'Metabox Setting Fields', 'give' );

		add_filter( 'give_metabox_form_data_settings', array( $this, 'setup_setting' ) , 999 );
	}

	function setup_setting( $settings ) {
		$settings[ $this->id ] = array(
			'id'     => $this->id,
			'title'  => $this->label,
			'fields' => array(

				// Text small.
				array(
					'id'          => 'text-small',
					'name'        => __( 'Text Small', 'give' ),
					'type'        => 'text-small',
					'description' => __( 'This is small text input field.', 'give' )
				),

				// Text medium.
				array(
					'id'          => 'text-medium',
					'name'        => __( 'Text Medium', 'give' ),
					'type'        => 'text-medium',
					'description' => __( 'This is medium text input field.', 'give' )
				),

				// Text.
				array(
					'id'          => 'text',
					'name'        => __( 'Text', 'give' ),
					'type'        => 'text',
					'description' => __( 'This is text input field.', 'give' )
				),

				// Textarea.
				array(
					'id'          => 'textarea',
					'name'        => __( 'Textarea', 'give' ),
					'type'        => 'textarea',
					'description' => __( 'This is textarea input field.', 'give' )
				),

				// WordPress editor.
				array(
					'id'          => 'wysiwyg',
					'name'        => __( 'WordPress Editor', 'give' ),
					'type'        => 'wysiwyg',
					'description' => __( 'This is wysiwyg field.', 'give' )
				),

				// Checkbox.
				array(
					'id'          => 'checkbox',
					'name'        => __( 'Checkbox', 'give' ),
					'type'        => 'checkbox',
					'description' => __( 'This is checkbox field.', 'give' )
				),

				// Select.
				array(
					'id'          => 'select',
					'name'        => __( 'Select', 'give' ),
					'type'        => 'select',
					'options'     => array(
						'option_1' => __( 'Option 1', 'give' ),
						'option_2' => __( 'Option 2', 'give' ),
						'option_3' => __( 'Option 3', 'give' ),
					),
					'description' => __( 'This is select field.', 'give' )
				),

				// Radio.
				array(
					'id'          => 'radio',
					'name'        => __( 'Radio', 'give' ),
					'type'        => 'radio',
					'options'     => array(
						'option_1' => __( 'Option 1', 'give' ),
						'option_2' => __( 'Option 2', 'give' ),
						'option_3' => __( 'Option 3', 'give' ),
					),
					'description' => __( 'This is radio field.', 'give' )
				),

				// Radio inline.
				array(
					'id'          => 'radio',
					'name'        => __( 'Radio', 'give' ),
					'type'        => 'radio_inline',
					'default'     => 'option_1',
					'options'     => array(
						'option_1' => __( 'Option 1', 'give' ),
						'option_2' => __( 'Option 2', 'give' ),
						'option_3' => __( 'Option 3', 'give' ),
					),
					'description' => __( 'This is radio field.', 'give' )
				),

				// Colorpicker.
				array(
					'id'          => 'colorpicker',
					'name'        => __( 'Color Picker', 'give' ),
					'type'        => 'colorpicker',
					'description' => __( 'This is colorpicker field.', 'give' )
				)
			)
		);

		return $settings;
	}
}

new Give_Metabox_Setting_Fields();