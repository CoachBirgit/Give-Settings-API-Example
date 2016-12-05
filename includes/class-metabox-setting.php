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
class Give_Metabox_Setting_Fields {

	/**
	 * Give_Metabox_Setting_Fields constructor.
	 */
	function __construct() {
		$this->id     = 'metabox-setting-fields';
		$this->label  = __( 'Metabox Setting Fields', 'give' );
		$this->prefix = '_give_';

		add_filter( 'give_metabox_form_data_settings', array( $this, 'setup_setting' ), 999 );
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
					'description' => __( 'This is small text input field.', 'give' ),
				),

				// Text medium.
				array(
					'id'          => 'text-medium',
					'name'        => __( 'Text Medium', 'give' ),
					'type'        => 'text-medium',
					'description' => __( 'This is medium text input field.', 'give' ),
				),

				// Text.
				array(
					'id'          => 'text',
					'name'        => __( 'Text', 'give' ),
					'type'        => 'text',
					'description' => __( 'This is text input field.', 'give' ),
				),

				// Textarea.
				array(
					'id'          => 'textarea',
					'name'        => __( 'Textarea', 'give' ),
					'type'        => 'textarea',
					'description' => __( 'This is textarea input field.', 'give' ),
				),

				// WordPress editor.
				array(
					'id'          => 'wysiwyg',
					'name'        => __( 'WordPress Editor', 'give' ),
					'type'        => 'wysiwyg',
					'description' => __( 'This is wysiwyg field.', 'give' ),
				),

				// Checkbox.
				array(
					'id'          => 'checkbox',
					'name'        => __( 'Checkbox', 'give' ),
					'type'        => 'checkbox',
					'description' => __( 'This is checkbox field.', 'give' ),
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
					'description' => __( 'This is select field.', 'give' ),
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
					'description' => __( 'This is radio field.', 'give' ),
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
					'description' => __( 'This is radio field.', 'give' ),
				),

				// Colorpicker.
				array(
					'id'          => 'colorpicker',
					'name'        => __( 'Color Picker', 'give' ),
					'type'        => 'colorpicker',
					'description' => __( 'This is colorpicker field.', 'give' ),
				),

				// Text Decimal.
				array(
					'id'          => 'text-decimal',
					'name'        => __( 'Decimal Field', 'give' ),
					'type'        => 'text-small',
					'data_type'   => 'decimal',
					'description' => __( 'This is small text input field for decimal values.', 'give' ),
					'attributes'  => array(
						'placeholder' => give_format_decimal( '1.00' ),
						'class'       => 'give-money-field',
					),
				),

				// Text Amount.
				array(
					'id'          => 'text-amount',
					'name'        => __( 'Amount Field', 'give' ),
					'type'        => 'text-small',
					'data_type'   => 'price',
					'description' => __( 'This is small text input field for price.', 'give' ),
					'attributes'  => array(
						'placeholder' => give_format_decimal( '1.00' ),
						'class'       => 'give-money-field',
					),
				),

				// Repeater field.
				array(
					'id'          => $this->prefix . 'repeater',
					'name'        => esc_html__( 'Repeater Field', 'give' ),
					'type'        => 'group',
					'description' => esc_html__( 'This is repeater field.', 'give' ),
					'options'     => array(
						'add_button'      => esc_html__( 'Add row', 'give' ),
						'header_title'    => esc_html__( 'Group', 'give' ),
						'remove_button'   => '<span class="dashicons dashicons-no"></span>',
						'group_numbering' => true,
						'close_tabs'      => true,
					),


					'fields' => array(
						array(
							'name' => esc_html__( 'Text Small', 'give' ),
							'id'   => 'test_small',
							'type' => 'text-small',
						),
						array(
							'name' => esc_html__( 'Text Medium', 'give' ),
							'id'   => 'text_medium',
							'type' => 'text-medium',
						),
						array(
							'name' => esc_html__( 'Text', 'give' ),
							'id'   => 'text',
							'type' => 'text',
						),
						array(
							'name' => esc_html__( 'Textarea', 'give' ),
							'id'   => 'textarea',
							'type' => 'textarea',
						),
						array(
							'name' => esc_html__( 'Checkbox', 'give' ),
							'id'   => 'checkbox',
							'type' => 'checkbox',
						),
						array(
							'name'    => esc_html__( 'Select', 'give' ),
							'id'      => 'select',
							'type'    => 'select',
							'default' => 'option3',
							'options' => array(
								'option1' => __( 'Option 1', 'give' ),
								'option2' => __( 'Option 2', 'give' ),
								'option3' => __( 'Option 3', 'give' ),
							),
						),
						array(
							'name'    => esc_html__( 'Radio', 'give' ),
							'id'      => 'radio',
							'type'    => 'radio',
							'default' => 'option1',
							'options' => array(
								'option1' => __( 'Option 1', 'give' ),
								'option2' => __( 'Option 2', 'give' ),
								'option3' => __( 'Option 3', 'give' ),
							),
						),
						array(
							'name'    => esc_html__( 'Radio Inline', 'give' ),
							'id'      => 'radio_inline',
							'type'    => 'radio_inline',
							'default' => 'option3',
							'options' => array(
								'option1' => __( 'Option 1', 'give' ),
								'option2' => __( 'Option 2', 'give' ),
								'option3' => __( 'Option 3', 'give' ),
							),
						),
						array(
							'name'        => __( 'Color Picker', 'give' ),
							'type'        => 'colorpicker',
							'id'          => 'colorpicker',
							'description' => __( 'This is colorpicker field.', 'give' ),
						),
						array(
							'id'          => 'wysiwyg',
							'name'        => __( 'WordPress Editor', 'give' ),
							'type'        => 'wysiwyg',
							'description' => __( 'This is wysiwyg field.', 'give' ),
						),
					),
				),
			),
		);

		return $settings;
	}
}

new Give_Metabox_Setting_Fields();