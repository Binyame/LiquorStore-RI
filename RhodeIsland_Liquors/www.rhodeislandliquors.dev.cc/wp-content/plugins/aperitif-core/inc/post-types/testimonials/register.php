<?php

if ( ! function_exists( 'aperitif_core_register_testimonials_for_meta_options' ) ) {
	function aperitif_core_register_testimonials_for_meta_options( $post_types ) {
		$post_types[] = 'testimonials';
		
		return $post_types;
	}
	
	add_filter( 'qode_framework_filter_meta_box_save', 'aperitif_core_register_testimonials_for_meta_options' );
	add_filter( 'qode_framework_filter_meta_box_remove', 'aperitif_core_register_testimonials_for_meta_options' );
}

if ( ! function_exists( 'aperitif_core_add_testimonials_custom_post_type' ) ) {
	/**
	 * Function that adds testimonials custom post type
	 *
	 * @param $cpts array
	 *
	 * @return array
	 */
	function aperitif_core_add_testimonials_custom_post_type( $cpts ) {
		$cpts[] = 'AperitifCoreTestimonialsCPT';
		
		return $cpts;
	}
	
	add_filter( 'aperitif_core_filter_register_custom_post_types', 'aperitif_core_add_testimonials_custom_post_type' );
}

if ( class_exists( 'QodeFrameworkCustomPostType' ) ) {
	class AperitifCoreTestimonialsCPT extends QodeFrameworkCustomPostType {
		
		public function map_post_type() {
			$name = esc_html__( 'Testimonials', 'aperitif-core' );
			$this->set_base( 'testimonials' );
			$this->set_menu_position( 10 );
			$this->set_menu_icon( 'dashicons-screenoptions' );
			$this->set_slug( 'testimonials' );
			$this->set_name( $name );
			$this->set_path( APERITIF_CORE_CPT_PATH . '/testimonials' );
			$this->set_labels( array(
				'name'          => esc_html__( 'Aperitif Testimonials', 'aperitif-core' ),
				'singular_name' => esc_html__( 'Testimonial', 'aperitif-core' ),
				'add_item'      => esc_html__( 'New Testimonial', 'aperitif-core' ),
				'add_new_item'  => esc_html__( 'Add New Testimonial', 'aperitif-core' ),
				'edit_item'     => esc_html__( 'Edit Testimonial', 'aperitif-core' )
			) );
			$this->set_public( false );
			$this->set_archive( false );
			$this->set_supports( array(
				'title',
				'thumbnail'
			) );
			$this->add_post_taxonomy( array(
				'base'          => 'testimonials-category',
				'slug'          => 'testimonials-category',
				'singular_name' => esc_html__( 'Category', 'aperitif-core' ),
				'plural_name'   => esc_html__( 'Categories', 'aperitif-core' ),
			) );
		}
		
	}
}