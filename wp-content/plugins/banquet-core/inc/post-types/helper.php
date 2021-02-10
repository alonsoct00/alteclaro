<?php

if ( ! function_exists( 'banquet_core_include_custom_post_type_files' ) ) {
	/**
	 * Function that register custom post type
	 */
	function banquet_core_include_custom_post_type_files() {
		foreach ( glob( BANQUET_CORE_CPT_PATH . '/*/register.php' ) as $include ) {
			include_once $include;
		}
	}
	
	add_action( 'qode_framework_action_before_post_types_register', 'banquet_core_include_custom_post_type_files' );
}

if ( ! function_exists( 'banquet_core_register_custom_post_types' ) ) {
	/**
	 * Function that register custom post types
	 */
	function banquet_core_register_custom_post_types() {
		$qode_framework = qode_framework_get_framework_root();
		$cpts           = apply_filters( 'banquet_core_filter_register_custom_post_types', $cpts = array() );
		
		if ( ! empty( $cpts ) ) {
			foreach ( $cpts as $cpt ) {
				$qode_framework->add_custom_post_type( new $cpt() );
			}
		}
	}
	
	add_action( 'qode_framework_action_before_post_types_register', 'banquet_core_register_custom_post_types', 11 ); // Priority 11 set because include of files is called on default action 10
}

if ( ! function_exists( 'banquet_core_include_cpt_tax_fields' ) ) {
	/**
	 * Function that includes custom post types
	 */
	function banquet_core_include_cpt_tax_fields() {
		do_action( 'banquet_core_action_include_cpt_tax_fields' );
	}
	
	add_action( 'qode_framework_action_custom_taxonomy_fields', 'banquet_core_include_cpt_tax_fields' );
}

if ( ! function_exists( 'banquet_core_register_cpt_tax_fields' ) ) {
	/**
	 * Function that register custom post types
	 */
	function banquet_core_register_cpt_tax_fields() {
		do_action( 'banquet_core_action_register_cpt_tax_fields' );
	}
	
	add_action( 'qode_framework_action_custom_taxonomy_fields', 'banquet_core_register_cpt_tax_fields', 11 );
}

if ( ! function_exists( 'banquet_core_include_cpt_shortcodes' ) ) {
	/**
	 * Function that includes shortcodes
	 */
	function banquet_core_include_cpt_shortcodes() {
		foreach ( glob( BANQUET_CORE_CPT_PATH . '/*/shortcodes/*/include.php' ) as $shortcode ) {
			include_once $shortcode;
		}
	}
	
	add_action( 'qode_framework_action_before_shortcodes_register', 'banquet_core_include_cpt_shortcodes' );
}