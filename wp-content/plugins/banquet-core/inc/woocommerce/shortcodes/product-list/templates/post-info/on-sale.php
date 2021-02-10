<?php

$product = banquet_core_woo_get_global_product();

if ( ! empty( $product ) && $product->is_on_sale() ) {
	echo banquet_woo_sale_flash();
}

if ( ! empty( $product ) && ! $product->is_in_stock() ) {
	echo banquet_get_out_of_stock_mark();
}

if ( ! empty( $product ) && $product->get_id() !== '' ) {
	echo banquet_get_new_mark( $product->get_id() );
}