<?php

if ( ! function_exists( 'banquet_is_page_title_enabled' ) ) {
	/**
	 * Function that check is module enabled
	 */
	function banquet_is_page_title_enabled() {
		return apply_filters( 'banquet_filter_enable_page_title', true );
	}
}

if ( ! function_exists( 'banquet_load_page_title' ) ) {
	/**
	 * Function which loads page template module
	 */
	function banquet_load_page_title() {
		
		if ( banquet_is_page_title_enabled() ) {
			// Include title template
			echo apply_filters( 'banquet_filter_title_template', banquet_get_template_part( 'title', 'templates/title' ) );
		}
	}
	
	add_action( 'banquet_action_page_title_template', 'banquet_load_page_title' );
}

if ( ! function_exists( 'banquet_get_page_title_classes' ) ) {
	/**
	 * Function that return classes for page title area
	 *
	 * @return string
	 */
	function banquet_get_page_title_classes() {
		$classes = apply_filters( 'banquet_filter_page_title_classes', array() );
		
		return implode( ' ', $classes );
	}
}

if ( ! function_exists( 'banquet_get_page_title_text' ) ) {
	/**
	 * Function that returns current page title text
	 */
	function banquet_get_page_title_text() {
		$title = get_the_title();
		
		if ( ( is_home() && is_front_page() ) || is_singular( 'post' ) ) {
			$title = get_option( 'blogname' );
		} elseif ( is_tag() ) {
			$title = single_term_title( '', false ) . esc_html__( ' Tag', 'banquet' );
		} elseif ( is_date() ) {
			$title = get_the_time( 'F Y' );
		} elseif ( is_author() ) {
			$title = esc_html__( 'Author: ', 'banquet' ) . get_the_author();
		} elseif ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_archive() ) {
			$title = esc_html__( 'Archive', 'banquet' );
		} elseif ( is_search() ) {
			$title = esc_html__( 'Search results for: ', 'banquet' ) . get_search_query();
		} elseif ( is_404() ) {
			$title = esc_html__( '404 - Page not found', 'banquet' );
		}
		
		return apply_filters( 'banquet_filter_page_title_text', $title );
	}
}