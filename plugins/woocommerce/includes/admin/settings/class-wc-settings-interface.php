<?php
/**
 * WooCommerce interface settings
 *
 * @package WooCommerce\Admin
 */

defined( 'ABSPATH' ) || exit;

if ( class_exists( 'WC_Settings_Interface', false ) ) {
	return new WC_Settings_Interface();
}

/**
 * WC_Settings_Interface.
 */
class WC_Settings_Interface extends WC_Settings_Page {

	/**
	 * Constructor.
	 */
	public function __construct() {
		$this->id    = 'interface';
		$this->label = __( 'Interface', 'woocommerce' );

		parent::__construct();
	}

	/**
	 * Get own sections.
	 *
	 * @return array
	 */
	protected function get_own_sections() {
		return array(
			'' => __( 'General', 'woocommerce' ),
		);
	}

	/**
	 * Get settings for the default section.
	 *
	 * @return array
	 */
	protected function get_settings_for_default_section() {
		$settings =
			array(
				array(
					'title' => __( 'Attribute dropdowns options', 'woocommerce' ),
					'desc'  => __( 'Default options for attribute dropdowns', 'woocommerce' ),
					'type'  => 'title',
					'id'    => 'attributes_dropdown_options',
				),

				array(
					'title'    => __( 'Auto-select behavior', 'woocommerce' ),
					'desc'     => __( 'This controls which other attributes will be auto-selected when an attribute is changed. Only attributes with a single compatible value will be auto-selected.', 'woocommerce' ),
					'id'       => 'attributes_autoselect_type',
					'class'    => 'wc-enhanced-select',
					'css'      => 'min-width:300px;',
					'default'  => 'none',
					'type'     => 'select',
					'options'  => array(
						'none'     => __( 'None', 'woocommerce' ),
						'previous' => __( 'Previous attributes', 'woocommerce' ),
						'all'      => __( 'All attributes', 'woocommerce' ),
						'next'     => __( 'Next attributes', 'woocommerce' ),
					),
					'desc_tip' => true,
				),

				array(
					'title'    => __( 'Auto-select on page load', 'woocommerce' ),
					'desc'     => __( 'This controls whether or not attributes with only one possible option will be auto-selected upon loading the page.', 'woocommerce' ),
					'id'       => 'attributes_autoselect_on_page_load',
					'default'  => 'no',
					'type'     => 'checkbox',
				),

				array(
					'title'    => __( 'Values in conflict with current selection', 'woocommerce' ),
					'desc'     => __( 'This controls what to do with attribute values that conflict with the current selection.', 'woocommerce' ),
					'id'       => 'attributes_unattached_action',
					'class'    => 'wc-enhanced-select',
					'css'      => 'min-width:300px;',
					'default'  => 'delete',
					'type'     => 'select',
					'options'  => array(
						'hide'    => __( 'Hidden', 'woocommerce' ),
						'disable' => __( 'Grayed-out and disabled', 'woocommerce' ),
						'gray'    => __( 'Grayed-out but selectable (will clear all other attributes if selected)', 'woocommerce' ),
					),
					'desc_tip' => true,
				),

				array(
					'title'    => __( 'Values display method', 'woocommerce' ),
					'desc'     => __( 'This controls how to display the attribute values.', 'woocommerce' ),
					'id'       => 'attribute_values_display_method',
					'class'    => 'wc-enhanced-select',
					'css'      => 'min-width:300px;',
					'default'  => 'dropdown',
					'type'     => 'select',
					'options'  => array(
						'dropdown' => __( 'Dropdown', 'woocommerce' ),
						'list'    => __( 'List', 'woocommerce' ),
					),
					'desc_tip' => true,
				),

				array(
					'title'    => __( 'Show current value (list)', 'woocommerce' ),
					'desc'     => __( 'This controls whether or not the current value is shown above the list (only works when the value display method is set to list).', 'woocommerce' ),
					'id'       => 'attributes_current_value_toggle',
					'default'  => 'yes',
					'type'     => 'checkbox',
				),

				array(
					'type' => 'sectionend',
					'id'   => 'attributes_dropdown_options',
				),
			);

		$settings = apply_filters( 'woocommerce_interface_settings_general', $settings );
		return $settings;
	}

	/**
	 * Save settings.
	 */
	public function save() {
		$this->save_settings_for_current_section();
		$this->do_update_options_action();
	}
}

return new WC_Settings_Interface;
