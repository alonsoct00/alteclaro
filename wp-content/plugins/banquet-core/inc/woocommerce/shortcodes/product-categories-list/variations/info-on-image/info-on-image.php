<?php

if ( ! function_exists( 'banquet_core_add_product_categories_list_variation_info_on_image' ) ) {
	function banquet_core_add_product_categories_list_variation_info_on_image( $variations ) {
		$variations['info-on-image'] = esc_html__( 'Info On Image', 'banquet-core' );

		return $variations;
	}

	add_filter( 'banquet_core_filter_product_categories_list_layouts', 'banquet_core_add_product_categories_list_variation_info_on_image' );
}