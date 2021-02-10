<?php

if ( ! function_exists( 'banquet_include_masonry_scripts' ) ) {
	/**
	 * Function that include modules 3rd party scripts
	 */
	function banquet_include_masonry_scripts() {
		wp_enqueue_script( 'isotope', BANQUET_INC_ROOT . '/masonry/assets/js/plugins/isotope.pkgd.min.js', array( 'jquery' ), false, true );
		wp_enqueue_script( 'packery', BANQUET_INC_ROOT . '/masonry/assets/js/plugins/packery-mode.pkgd.min.js', array( 'jquery' ), false, true );
	}
}

if ( ! function_exists( 'banquet_enqueue_masonry_scripts_for_templates' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts for templates
	 */
	function banquet_enqueue_masonry_scripts_for_templates() {
		$post_type = apply_filters( 'banquet_filter_allowed_post_type_to_enqueue_masonry_scripts', '' );
		
		if ( ! empty( $post_type ) && is_singular( $post_type ) ) {
			banquet_include_masonry_scripts();
		}
	}
	
	add_action( 'banquet_action_before_main_js', 'banquet_enqueue_masonry_scripts_for_templates' );
}

if ( ! function_exists( 'banquet_enqueue_masonry_scripts_for_shortcodes' ) ) {
	/**
	 * Function that enqueue modules 3rd party scripts for shortcodes
	 *
	 * @param $atts array
	 */
	function banquet_enqueue_masonry_scripts_for_shortcodes( $atts ) {
		
		if ( isset( $atts['behavior'] ) && $atts['behavior'] == 'masonry' ) {
			banquet_include_masonry_scripts();
		}
	}
	
	add_action( 'banquet_core_action_list_shortcodes_load_assets', 'banquet_enqueue_masonry_scripts_for_shortcodes' );
}