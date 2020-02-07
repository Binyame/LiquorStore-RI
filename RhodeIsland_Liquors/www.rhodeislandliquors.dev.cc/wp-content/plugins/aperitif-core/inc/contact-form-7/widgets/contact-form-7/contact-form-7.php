<?php

if ( ! function_exists( 'aperitif_core_add_contact_form_7_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function aperitif_core_add_contact_form_7_widget( $widgets ) {
		$widgets[] = 'AperitifCoreContactForm7Widget';
		
		return $widgets;
	}
	
	add_filter( 'aperitif_core_filter_register_widgets', 'aperitif_core_add_contact_form_7_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AperitifCoreContactForm7Widget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_base( 'aperitif_core_contact_form_7' );
			$this->set_name( esc_html__( 'Aperitif Contact Form 7', 'aperitif-core' ) );
			$this->set_description( esc_html__( 'Add contact form 7 to widget areas', 'aperitif-core' ) );
			$this->set_widget_option(
				array(
					'field_type' => 'text',
					'name'       => 'widget_title',
					'title'      => esc_html__( 'Widget Title', 'aperitif-core' )
				)
			);
			$this->set_widget_option(
				array(
					'field_type' => 'select',
					'name'       => 'contact_form_id',
					'title'      => esc_html__( 'Select Contact Form 7', 'aperitif-core' ),
					'options'    => aperitif_core_get_contact_form_7_forms()
				)
			);
		}
		
		public function render( $atts ) { ?>
			<div class="qodef-contact-form-7">
				<?php if ( ! empty( $atts['contact_form_id'] ) ) {
					echo do_shortcode( '[contact-form-7 id="' . esc_attr( $atts['contact_form_id'] ) . '"]' ); // XSS OK
				} ?>
			</div>
			<?php
		}
	}
}