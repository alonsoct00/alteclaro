<?php

if ( ! function_exists( 'banquet_core_add_fusion_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param $layouts array - module layouts
	 *
	 * @return array
	 */
	function banquet_core_add_fusion_spinner_layout_option( $layouts ) {
		$layouts['fusion'] = esc_html__( 'Fusion', 'banquet-core' );
		
		return $layouts;
	}
	
	add_filter( 'banquet_core_filter_page_spinner_layout_options', 'banquet_core_add_fusion_spinner_layout_option' );
}