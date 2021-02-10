<?php

if ( ! function_exists( 'banquet_core_register_restaurant_menu_for_meta_options' ) ) {
	function banquet_core_register_restaurant_menu_for_meta_options( $post_types ) {
		$post_types[] = 'restaurant-menu';
		
		return $post_types;
	}
	
	add_filter( 'qode_framework_filter_meta_box_save', 'banquet_core_register_restaurant_menu_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'banquet_core_register_restaurant_menu_for_meta_options' );
}

if ( ! function_exists( 'banquet_core_add_restaurant_menu_custom_post_type' ) ) {
	/**
	 * Function that adds restaurant-menu custom post type
	 *
	 * @param $cpts array
	 *
	 * @return array
	 */
	function banquet_core_add_restaurant_menu_custom_post_type( $cpts ) {
		$cpts[] = 'BanquetCoreRestaurantMenuCPT';
		
		return $cpts;
	}
	
	add_filter( 'banquet_core_filter_register_custom_post_types', 'banquet_core_add_restaurant_menu_custom_post_type' );
}

if ( class_exists( 'QodeFrameworkCustomPostType' ) ) {
	class BanquetCoreRestaurantMenuCPT extends QodeFrameworkCustomPostType {
		
		public function map_post_type() {
			$name = esc_html__( 'Restaurant Menu', 'banquet-core' );
			$this->set_base( 'restaurant-menu' );
			$this->set_menu_position( 10 );
			$this->set_menu_icon( 'dashicons-list-view' );
			$this->set_slug( 'restaurant-menu' );
			$this->set_name( $name );
			$this->set_path( BANQUET_CORE_CPT_PATH . '/restaurant-menu' );
			$this->set_labels( array(
				'name'          => esc_html__( 'Banquet Restaurant Menu', 'banquet-core' ),
				'singular_name' => esc_html__( 'Restaurant Menu', 'banquet-core' ),
				'add_item'      => esc_html__( 'New Restaurant Menu', 'banquet-core' ),
				'add_new_item'  => esc_html__( 'Add New Restaurant Menu', 'banquet-core' ),
				'edit_item'     => esc_html__( 'Edit Restaurant Menu', 'banquet-core' )
			) );
			$this->set_public( false );
			$this->set_archive( false );
			$this->set_supports( array(
				'title',
				'thumbnail'
			) );
			$this->add_post_taxonomy( array(
				'base'          => 'restaurant-menu-category',
				'slug'          => 'restaurant-menu-category',
				'singular_name' => esc_html__( 'Category', 'banquet-core' ),
				'plural_name'   => esc_html__( 'Categories', 'banquet-core' ),
			) );
		}
	}
}