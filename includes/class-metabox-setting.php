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
		$this->prefix = '_give_';

		add_filter( 'give_metabox_form_data_settings', array( $this, 'setup_setting' ), 999 );
		add_action( 'admin_footer', array( $this, 'admin_js' ) );
	}

	function setup_setting( $settings ) {
		$settings["{$this->id}_simple"] = array(
			'id'     => "{$this->id}_simple",
			'title'  => __( 'Simple Metabox Settings', 'give' ),
			'fields' => $this->get_fields( "{$this->id}_simple" ),
		);

		// Sub tab setting.
		$settings["{$this->id}_sub_fields"] = array(
			'id'         => "{$this->id}_sub_fields",
			'title'      => __( 'Subfields Metabox Settings', 'give' ),
			'sub-fields' => array(
				array(
					'id'     => "{$this->id}_sub_fields_1",
					'title'  => __( 'Sub Field 1', 'give' ),
					'fields' => $this->get_fields( "{$this->id}_sub_fields_1" ),
				),
				array(
					'id'     => "{$this->id}_sub_fields_2",
					'title'  => __( 'Sub Field 2', 'give' ),
					'fields' => $this->get_fields( "{$this->id}_sub_fields_2" ),
				),
				array(
					'id'     => "{$this->id}_sub_fields_3",
					'title'  => __( 'Sub Field 3', 'give' ),
					'fields' => $this->get_fields( "{$this->id}_sub_fields_3" ),
				),
			),
		);

		// Custom metabox settings.
		$settings["{$this->id}_custom"] = array(
			'id'     => "{$this->id}_custom",
			'title'  => __( 'Custom Metabox Settings', 'give' ),
			'fields' => array(
				array(
					'id'       => "{$this->id}_datepicker",
					'name'     => __( 'Datepicker', 'give' ),
					'type'     => 'datepicker',
					'desc'     => __( 'Custom datepicker field.', 'give' ),
					// Give metabox api by default call give_*field_type* function,
					// You can override that function call by passing callback array key.
					'callback' => array( $this, 'datepicker_field' ),
				),
			),
		);

		return $settings;
	}


	/**
	 * Get different types of setting field.
	 *
	 * @param string $id_prefix
	 *
	 * @return array
	 */
	public function get_fields( $id_prefix = '' ) {
		return array(
			// Text small.
			array(
				'id'          => "{$id_prefix}_text_small",
				'name'        => __( 'Text Small', 'give' ),
				'type'        => 'text-small',
				'description' => __( 'This is small text input field.', 'give' ),
			),

			// Text medium.
			array(
				'id'          => "{$id_prefix}_text_medium",
				'name'        => __( 'Text Medium', 'give' ),
				'type'        => 'text-medium',
				'description' => __( 'This is medium text input field.', 'give' ),
			),

			// Text.
			array(
				'id'          => "{$id_prefix}_text",
				'name'        => __( 'Text', 'give' ),
				'type'        => 'text',
				'description' => __( 'This is text input field.', 'give' ),
			),

			// Textarea.
			array(
				'id'          => "{$id_prefix}_textarea",
				'name'        => __( 'Textarea', 'give' ),
				'type'        => 'textarea',
				'description' => __( 'This is textarea input field.', 'give' ),
			),

			// WordPress editor.
			array(
				'id'          => "{$id_prefix}_wysiwyg",
				'name'        => __( 'WordPress Editor', 'give' ),
				'type'        => 'wysiwyg',
				'description' => __( 'This is wysiwyg field.', 'give' ),
			),

			// Checkbox.
			array(
				'id'          => "{$id_prefix}_checkbox",
				'name'        => __( 'Checkbox', 'give' ),
				'type'        => 'checkbox',
				'description' => __( 'This is checkbox field.', 'give' ),
			),

			// Select.
			array(
				'id'          => "{$id_prefix}_select",
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
				'id'          => "{$id_prefix}_radio_inline",
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
				'id'          => "{$id_prefix}_radio",
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
				'id'          => "{$id_prefix}_colorpicker",
				'name'        => __( 'Color Picker', 'give' ),
				'type'        => 'colorpicker',
				'description' => __( 'This is colorpicker field.', 'give' ),
			),

			// Text Decimal.
			array(
				'id'          => "{$id_prefix}_text_decimal",
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
				'id'          => "{$id_prefix}_text_amount",
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
				'id'          => "{$id_prefix}_repeater",
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
			array(
				'name'  => 'donation_options_docs',
				'type'  => 'docs_link',
				'url'   => '#',
				'title' => esc_html__( 'Donation Options', 'give' ),
			),
		);
	}

	/**
	 * Setting JS.
	 *
	 * @access public
	 */
	public function admin_js() {
		$screen = get_current_screen();

		if ( 'give_forms' !== $screen->post_type || 'edit' !== $screen->parent_base ) {
			return;
		}

		?>
		<script>
			jQuery(document).ready(function () {
				jQuery('.give-datepicker').datepicker();
			});
		</script>
		<?php
	}


	/**
	 * Custom datepicker field.
	 *
	 * @access public
	 *
	 * @param $field
	 */
	function datepicker_field( $field ) {
		global $thepostid;

		// Datepicker script.
		wp_enqueue_script( 'jquery-ui-datepicker' );

		$field['value'] = give_get_field_value( $field, $thepostid );

		echo '<p class="give-field-wrap ' . esc_attr( $field['id'] ) . '_field"><label for="' . give_get_field_name( $field ) . '">' . wp_kses_post( $field['name'] ) . '</label><input name="' . give_get_field_name( $field ) . '" id="' . esc_attr( $field['id'] ) . '" value="' . $field['value'] . '" class="give-datepicker">';

		if ( ! empty( $field['description'] ) ) {
			echo '<span class="give-field-description">' . wp_kses_post( $field['description'] ) . '</span>';
		}
		echo '</p>';
	}
}

new Give_Metabox_Setting_Fields();