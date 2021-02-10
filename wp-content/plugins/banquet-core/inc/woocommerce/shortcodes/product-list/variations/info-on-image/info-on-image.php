<?php

if ( ! function_exists( 'banquet_core_add_product_list_variation_info_on_image' ) ) {
	function banquet_core_add_product_list_variation_info_on_image( $variations ) {
		$variations['info-on-image'] = esc_html__( 'Info On Image', 'banquet-core' );
		
		return $variations;
	}
	
	add_filter( 'banquet_core_filter_product_list_layouts', 'banquet_core_add_product_list_variation_info_on_image' );
}

if ( ! function_exists( 'banquet_core_register_shop_list_info_on_image_actions' ) ) {
	function banquet_core_register_shop_list_info_on_image_actions() {
		
		// Add additional tags around product list item
		add_action( 'woocommerce_before_shop_loop_item', 'banquet__add_product_list_item_holder', 5 ); // permission 5 is set because woocommerce_template_loop_product_link_open hook is added on 10
		add_action( 'woocommerce_after_shop_loop_item', 'banquet__add_product_list_item_holder_end', 30 ); // permission 30 is set because woocommerce_template_loop_add_to_cart hook is added on 10
		
		// Add additional tags around product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'banquet__add_product_list_item_image_holder', 5 ); // permission 5 is set because woocommerce_show_product_loop_sale_flash hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'banquet__add_product_list_item_image_holder_end', 30 ); // permission 30 is set because woocommerce_template_loop_product_thumbnail hook is added on 10
		
		// Add additional tags around content inside product list item image
		add_action( 'woocommerce_before_shop_loop_item_title', 'banquet_add_product_list_item_additional_image_holder', 15 ); // permission 15 is set because woocommerce_template_loop_product_thumbnail hook is added on 10
		add_action( 'woocommerce_before_shop_loop_item_title', 'banquet_add_product_list_item_additional_image_holder_end', 25 ); // permission 25 is set because banquet_core_add_product_list_item_image_holder_end hook is added on 30
		
		// Change title position on product list
		remove_action( 'woocommerce_shop_loop_item_title', 'banquet_woo_shop_loop_item_title', 10 ); // permission 10 is default
		add_action( 'woocommerce_before_shop_loop_item_title', 'banquet_woo_shop_loop_item_title', 17 ); // permission 17 is set because banquet_core_add_product_list_item_additional_image_holder hook is added on 15
		
		// Change price position on product list
		remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 ); // permission 10 is default
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_price', 19 ); // permission 19 is set because banquet_core_woo_shop_loop_item_title hook is added on 17
		
		// Change add to cart position on product list
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 ); // permission 10 is default
		add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_add_to_cart', 20 ); // permission 20 is set because banquet_core_add_product_list_item_additional_image_holder hook is added on 15
	}
	
	add_action( 'banquet_core_action_shop_list_item_layout_info-on-image', 'banquet_core_register_shop_list_info_on_image_actions' );
}