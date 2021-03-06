<?php
/**
 *
 * Initial version created 25-05-2018 / 03:21 PM
 *
 * @author Varun Sridharan <varunsridharan23@gmail.com>
 * @version 1.0
 * @since 1.0
 * @package
 * @link
 * @copyright 2018 Varun Sridharan
 * @license GPLV3 Or Greater (https://www.gnu.org/licenses/gpl-3.0.txt)
 */

if ( ! function_exists( 'wponion_settings' ) ) {
	/**
	 * Returns a new instance for settings page.
	 *
	 * @param array|string $instance_id_or_args
	 * @param array        $fields
	 *
	 * @return bool|\WPOnion\Modules\Settings
	 */
	function wponion_settings( $instance_id_or_args = array(), $fields = array() ) {
		if ( is_string( $instance_id_or_args ) && empty( $fields ) ) {
			return wponion_settings_registry( $instance_id_or_args );
		}
		return new \WPOnion\Modules\Settings( $instance_id_or_args, $fields );
	}
}

if ( ! function_exists( 'wponion_metabox' ) ) {
	/**
	 * Returns A New Instance for Metabox Module or returns an existing instance.
	 *
	 * @param array $instance_id_or_args
	 * @param array $fields
	 *
	 * @return bool|\WPOnion\Modules\metabox
	 */
	function wponion_metabox( $instance_id_or_args = array(), $fields = array() ) {
		if ( is_string( $instance_id_or_args ) && empty( $fields ) ) {
			return wponion_metabox_registry( $instance_id_or_args );
		}
		return new \WPOnion\Modules\metabox( $instance_id_or_args, $fields );
	}
}

if ( ! function_exists( 'wponion_taxonomy' ) ) {
	/**
	 * Returns A New Instance for taxonomy Module or returns an existing instance.
	 *
	 * @param array $instance_id_or_args
	 * @param array $fields
	 *
	 * @return bool|\WPOnion\Modules\taxonomy
	 */
	function wponion_taxonomy( $instance_id_or_args = array(), $fields = array() ) {
		if ( is_string( $instance_id_or_args ) && empty( $fields ) ) {
			return wponion_metabox_registry( $instance_id_or_args );
		}
		return new \WPOnion\Modules\taxonomy( $instance_id_or_args, $fields );
	}
}

if ( ! function_exists( 'wponion_woocommerce' ) ) {
	/**
	 * Returns A New Instance for WooCommerce Module or returns an existing instance.
	 *
	 * @param array $instance_id_or_args
	 * @param array $fields
	 *
	 * @return bool|\WPOnion\Modules\woocommerce
	 */
	function wponion_woocommerce( $instance_id_or_args = array(), $fields = array() ) {
		if ( is_string( $instance_id_or_args ) && empty( $fields ) ) {
			return wponion_woocommerce_registry( $instance_id_or_args );
		}
		return new \WPOnion\Modules\woocommerce( $instance_id_or_args, $fields );
	}
}

if ( ! function_exists( 'wponion_user_profile' ) ) {
	/**
	 * Returns A New Instance for WooCommerce Module or returns an existing instance.
	 *
	 * @param array $instance_id_or_args
	 * @param array $fields
	 *
	 * @return bool|\WPOnion\Modules\User_Profile
	 */
	function wponion_user_profile( $instance_id_or_args = array(), $fields = array() ) {
		if ( is_string( $instance_id_or_args ) && empty( $fields ) ) {
			return wponion_user_profile_registry( $instance_id_or_args );
		}
		return new \WPOnion\Modules\User_Profile( $instance_id_or_args, $fields );
	}
}