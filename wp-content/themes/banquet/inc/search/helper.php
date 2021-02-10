<?php

if ( ! function_exists( 'banquet_get_search_page_excerpt_length' ) ) {
	/**
	 * Function that return number of characters for excerpt on search page
	 *
	 * @return int
	 */
	function banquet_get_search_page_excerpt_length() {
		$length = apply_filters( 'banquet_filter_search_page_excerpt_length', 180 );
		
		return intval( $length );
	}
}
