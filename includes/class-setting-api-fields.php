<?php
/**
 * Example code to show how to add setting page to give settings.
 *
 * @package     Give
 * @subpackage  Classes/Give_Setting_API_Fields
 * @copyright   Copyright (c) 2016, WordImpress
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */
class Give_Setting_API_Fields {

	/**
	 * Give_Setting_API_Fields constructor.
	 */
	function __construct(){
		$this->id = 'give-setting-api-fields';
		$this->label = esc_html__( 'Setting API Fields', 'give' );

		add_filter( 'give_settings_tabs_array', array( $this, 'add_settings_page' ), 999 );
		add_action( "give_sections_{$this->id}_page", array( $this, 'output_sections' ) );
		add_action( "give_settings_{$this->id}_page", array( $this, 'output' ) );
		add_action( "give_settings_save_{$this->id}", array( $this, 'save' ) );
	}

	function add_settings_page( $pages ){
		$pages[ $this->id ] = $this->label;
		return $pages;
	}

	function get_sections(){
		$sections = array(
			'setting_1' => __( 'Setting 1', 'give' ),
			'setting_2' => __( 'Setting 2', 'give' ),
			'setting_3' => __( 'Setting 3', 'give' ),
		);

		return $sections;
	}

	function output_sections(){
		global $current_section;

		$current_section = empty( $current_section ) ? 'setting_1' : $current_section;
		$sections = $this->get_sections();

		if ( empty( $sections ) || 1 === sizeof( $sections ) ) {
			return;
		}

		echo '<ul class="subsubsub">';

		$array_keys = array_keys( $sections );

		foreach ( $sections as $id => $label ) {
			echo '<li><a href="' . admin_url( 'edit.php?post_type=give_forms&page=give-settings&tab=' . $this->id . '&section=' . sanitize_title( $id ) ) . '" class="' . ( $current_section == $id ? 'current' : '' ) . '">' . $label . '</a> ' . ( end( $array_keys ) == $id ? '' : '|' ) . ' </li>';
		}

		echo '</ul><br class="clear" />';
	}


	/**
	 * Get setting.
	 *
	 * @return array
	 */
	function get_settings() {
		global $current_section;
		$settings = array();

		if( 'setting_3' === $current_section ) {

			$settings = array(
				/**
				 * Checkbox field setting
				 */
				array(
					'name' => esc_html__( 'Checkbox', 'give' ),
					'desc' => '',
					'id'   => 'checkbox_field_setting',
					'type' => 'title'
				),
				array(
					'name' => esc_html__( 'Checkbox Field Settings', 'give' ),
					'desc' => '',
					'id'   => 'give_checkbox_field_settings',
					'type' => 'checkbox'
				),
				array(
					'id'   => 'checkbox_field_setting',
					'type' => 'sectionend'
				),

				/**
				 * File field setting
				 */
				array(
					'name' => esc_html__( 'File', 'give' ),
					'desc' => '',
					'id'   => 'file_field_setting',
					'type' => 'title'
				),
				array(
					'name' => esc_html__( 'File Field Settings', 'give' ),
					'desc' => '',
					'id'   => 'give_file_field_settings',
					'type' => 'file'
				),
				array(
					'id'   => 'file_field_setting',
					'type' => 'sectionend'
				)
			);
		}elseif( 'setting_2' === $current_section ) {
			$settings = array(
				/**
				 * Select field setting
				 */
				array(
					'name' => esc_html__( 'Select', 'give' ),
					'desc' => '',
					'id'   => 'select_field_setting',
					'type' => 'title'
				),
				array(
					'name' => esc_html__( 'Select Field Settings', 'give' ),
					'desc' => '',
					'id'   => 'give_select_field_settings',
					'type' => 'select',
					'default' => 'option_1',
					'options' => array(
						'option_1' => __( 'Option 1', 'give' ),
						'option_2' => __( 'Option 2', 'give' ),
						'option_3' => __( 'Option 3', 'give' )
					)
				),
				array(
					'id'   => 'select_field_setting',
					'type' => 'sectionend'
				),


				/**
				 * MultiSelect field setting
				 */
				array(
					'name' => esc_html__( 'Multi Select', 'give' ),
					'desc' => '',
					'id'   => 'multi_field_setting',
					'type' => 'title'
				),
				array(
					'name' => esc_html__( 'Multi Select Field Settings', 'give' ),
					'desc' => '',
					'id'   => 'give_multi_field_settings',
					'type' => 'multiselect',
					'default' => 'option_1',
					'options' => array(
						'option_1' => __( 'Option 1', 'give' ),
						'option_2' => __( 'Option 2', 'give' ),
						'option_3' => __( 'Option 3', 'give' )
					)
				),
				array(
					'id'   => 'multi_field_setting',
					'type' => 'sectionend'
				),

				/**
				 * Radio field setting.
				 */
				array(
					'name' => esc_html__( 'Radio', 'give' ),
					'desc' => '',
					'id'   => 'radio_field_setting',
					'type' => 'title'
				),
				array(
					'name' => esc_html__( 'Radio Field Settings', 'give' ),
					'desc' => '',
					'id'   => 'give_radio_field_settings',
					'type' => 'radio',
					'default' => 'option_1',
					'options' => array(
						'option_1' => __( 'Option 1', 'give' ),
						'option_2' => __( 'Option 2', 'give' )
					)
				),
				array(
					'id'   => 'radio_field_setting',
					'type' => 'sectionend'
				),

				/**
				 * Inline Radio field setting.
				 */
				array(
					'name' => esc_html__( 'Radio inline', 'give' ),
					'desc' => '',
					'id'   => 'radio_inline_field_setting',
					'type' => 'title'
				),
				array(
					'name' => esc_html__( 'Radio Field Settings', 'give' ),
					'desc' => '',
					'id'   => 'give_radio_inline_field_settings',
					'type' => 'radio_inline',
					'default' => 'option_1',
					'options' => array(
						'option_1' => __( 'Option 1', 'give' ),
						'option_2' => __( 'Option 2', 'give' )
					)
				),
				array(
					'id'   => 'radio_inline_field_setting',
					'type' => 'sectionend'
				)
			);
		}elseif( 'setting_1' === $current_section ){
			$settings = array(

				/**
				 * Text field setting.
				 */
				array(
					'name' => esc_html__( 'Text', 'give' ),
					'desc' => '',
					'id'   => 'text_field_setting',
					'type' => 'title'
				),
				array(
					'name' => esc_html__( 'Text Field Settings', 'give' ),
					'desc' => '',
					'id'   => 'give_text_field_settings',
					'type' => 'text'
				),
				array(
					'id'   => 'text_field_setting',
					'type' => 'sectionend'
				),

				/**
				 * Email field setting.
				 */
				array(
					'name' => esc_html__( 'Email', 'give' ),
					'desc' => '',
					'id'   => 'email_field_setting',
					'type' => 'title'
				),
				array(
					'name' => esc_html__( 'Email Field Settings', 'give' ),
					'desc' => '',
					'id'   => 'give_email_field_settings',
					'type' => 'email'
				),
				array(
					'id'   => 'give_email_field_settings',
					'type' => 'sectionend'
				),

				/**
				 * Number field setting.
				 */
				array(
					'name' => esc_html__( 'Number', 'give' ),
					'desc' => '',
					'id'   => 'number_field_setting',
					'type' => 'title'
				),
				array(
					'name' => esc_html__( 'Number Field Settings', 'give' ),
					'desc' => '',
					'id'   => 'give_number_field_settings',
					'type' => 'number',
					'css'  => 'width:12em;'
				),
				array(
					'id'   => 'give_number_field_settings',
					'type' => 'sectionend'
				),


				/**
				 * Password field setting.
				 */
				array(
					'name' => esc_html__( 'Password', 'give' ),
					'desc' => '',
					'id'   => 'password_field_setting',
					'type' => 'title'
				),
				array(
					'name' => esc_html__( 'Password Field Settings', 'give' ),
					'desc' => '',
					'id'   => 'give_password_field_settings',
					'type' => 'password',
					'css'  => 'width:12em;'
				),
				array(
					'id'   => 'give_password_field_settings',
					'type' => 'sectionend'
				),

				/**
				 * Textarea field setting.
				 */
				array(
					'name' => esc_html__( 'TextArea', 'give' ),
					'desc' => '',
					'id'   => 'textarea_field_setting',
					'type' => 'title'
				),
				array(
					'name' => esc_html__( 'Textarea Field Settings', 'give' ),
					'desc' => '',
					'id'   => 'give_textarea_field_settings',
					'type' => 'textarea',
				),
				array(
					'id'   => 'give_textarea_field_settings',
					'type' => 'sectionend'
				)
			);
		}

		return $settings;
	}


	/**
	 * Output the settings.
	 */
	public function output() {
		$settings = $this->get_settings();

		Give_Admin_Settings::output_fields( $settings, 'my_custom_settings' );
	}

	/**
	 * Save settings.
	 */
	public function save() {
		$settings = $this->get_settings();

		Give_Admin_Settings::save_fields( $settings, 'my_custom_settings' );
	}
}


/**
 * Initialize new setting.
 *
 * @return Give_Setting_API_Fields
 */
function give_add_setting_api_fields_settings(){
	return new Give_Setting_API_Fields();
}
add_filter( 'give_get_settings_pages', 'give_add_setting_api_fields_settings' );
