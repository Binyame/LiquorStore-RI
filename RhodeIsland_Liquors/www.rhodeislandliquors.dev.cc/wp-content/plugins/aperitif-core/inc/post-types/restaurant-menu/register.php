<?php

if ( ! function_exists( 'aperitif_core_register_restaurant_menu_for_meta_options' ) ) {
	function aperitif_core_register_restaurant_menu_for_meta_options( $post_types ) {
		$post_types[] = 'restaurant-menu';
		
		return $post_types;
	}
	
	add_filter( 'qode_framework_filter_meta_box_save', 'aperitif_core_register_restaurant_menu_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'aperitif_core_register_restaurant_menu_for_meta_options' );
}

if ( ! function_exists( 'aperitif_core_add_restaurant_menu_custom_post_type' ) ) {
	/**
	 * Function that adds restaurant-menu custom post type
	 *
	 * @param $cpts array
	 *
	 * @return array
	 */
	function aperitif_core_add_restaurant_menu_custom_post_type( $cpts ) {
		$cpts[] = 'AperitifCoreRestaurantMenuCPT';
		
		return $cpts;
	}
	
	add_filter( 'aperitif_core_filter_register_custom_post_types', 'aperitif_core_add_restaurant_menu_custom_post_type' );
}

if ( class_exists( 'QodeFrameworkCustomPostType' ) ) {
	class AperitifCoreRestaurantMenuCPT extends QodeFrameworkCustomPostType {
		
		public function map_post_type() {
			$name = esc_html__( 'Restaurant Menu', 'aperitif-core' );
			$this->set_base( 'restaurant-menu' );
			$this->set_menu_position( 10 );
			$this->set_menu_icon( 'dashicons-list-view' );
			$this->set_slug( 'restaurant-menu' );
			$this->set_name( $name );
			$this->set_path( APERITIF_CORE_CPT_PATH . '/restaurant-menu' );
			$this->set_labels( array(
				'name'          => esc_html__( 'Aperitif Restaurant Menu', 'aperitif-core' ),
				'singular_name' => esc_html__( 'Restaurant Menu', 'aperitif-core' ),
				'add_item'      => esc_html__( 'New Restaurant Menu', 'aperitif-core' ),
				'add_new_item'  => esc_html__( 'Add New Restaurant Menu', 'aperitif-core' ),
				'edit_item'     => esc_html__( 'Edit Restaurant Menu', 'aperitif-core' )
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
				'singular_name' => esc_html__( 'Category', 'aperitif-core' ),
				'plural_name'   => esc_html__( 'Categories', 'aperitif-core' ),
			) );
		}
	}
}