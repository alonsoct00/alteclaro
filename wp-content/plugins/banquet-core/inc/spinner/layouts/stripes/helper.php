<?php

if ( ! function_exists( 'banquet_core_add_stripes_spinner_layout_option' ) ) {
	/**
	 * Function that set new value into page spinner layout options map
	 *
	 * @param $layouts array - module layouts
	 *
	 * @return array
	 */
	function banquet_core_add_stripes_spinner_layout_option( $layouts ) {
		$layouts['stripes'] = esc_html__( 'Stripes', 'banquet-core' );
		
		return $layouts;
	}
	
	add_filter( 'banquet_core_filter_page_spinner_layout_options', 'banquet_core_add_stripes_spinner_layout_option' );
}