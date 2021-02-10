<?php

if ( ! function_exists( 'banquet_set_404_page_inner_classes' ) ) {
	/**
	 * Function that return classes for the page inner div from header.php
	 *
	 * @param $classes string
	 *
	 * @return string
	 */
	function banquet_set_404_page_inner_classes( $classes ) {
		
		if ( is_404() ) {
			$classes = 'qodef-content-full-width';
		}
		
		return $classes;
	}
	
	add_filter( 'banquet_filter_page_inner_classes', 'banquet_set_404_page_inner_classes' );
}

if ( ! function_exists( 'banquet_get_404_page_parameters' ) ) {
	/**
	 * Function that set 404 page area content parameters
	 */
	function banquet_get_404_page_parameters() {
		
		$params = array(
			'title'       => esc_html__( 'Error Page', 'banquet' ),
			'text'        => esc_html__( 'The page you are looking for doesn\'t exist. It may have been moved or removed altogether. Please try searching for some other page, or return to the site\'s homepage to find what you\'re looking for.', 'banquet' ),
			'button_text' => esc_html__( 'Back to home', 'banquet' )
		);
		
		return apply_filters( 'banquet_filter_404_page_template_params', $params );
	}
}
