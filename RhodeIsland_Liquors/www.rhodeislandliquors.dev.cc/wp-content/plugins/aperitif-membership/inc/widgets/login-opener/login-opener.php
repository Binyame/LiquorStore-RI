<?php

if ( ! function_exists( 'aperitif_membership_add_author_info_widget' ) ) {
	/**
	 * Function that add widget into widgets list for registration
	 *
	 * @param $widgets array
	 *
	 * @return array
	 */
	function aperitif_membership_add_author_info_widget( $widgets ) {
		$widgets[] = 'AperitifMembershipLoginOpenerWidget';
		
		return $widgets;
	}
	
	add_filter( 'aperitif_membership_filter_register_widgets', 'aperitif_membership_add_author_info_widget' );
}

if ( class_exists( 'QodeFrameworkWidget' ) ) {
	class AperitifMembershipLoginOpenerWidget extends QodeFrameworkWidget {
		
		public function map_widget() {
			$this->set_base( 'aperitif_membership_login_opener' );
			$this->set_name( esc_html__( 'Aperitif Login Opener', 'aperitif-membership' ) );
			$this->set_description( esc_html__( 'Login and register membership widget', 'aperitif-membership' ) );
			$this->set_widget_option(
				array(
					'field_type'  => 'text',
					'name'        => 'login_opener_margin',
					'title'       => esc_html__( 'Opener Margin', 'aperitif-membership' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left', 'aperitif-membership' )
				)
			);
		}
		
		public function render( $atts ) {
			$classes = array();
			$classes[] = is_user_logged_in() ? 'qodef-user-logged--in' : 'qodef-user-logged--out';
			
			$styles = array();
			
			if ( ! empty( $atts['login_opener_margin'] ) ) {
				$styles[] = 'margin: ' . $atts['login_opener_margin'];
			}
			
			$dashboard_template = apply_filters( 'aperitif_membership_filter_dashboard_template_name', '' );
			
			if ( empty( $dashboard_template ) || ! is_page_template( $dashboard_template ) || ( is_page_template( $dashboard_template ) && is_user_logged_in() ) ) { ?>
				<div class="qodef-login-opener-widget <?php echo implode( ' ', $classes ); ?>" <?php qode_framework_inline_style( $styles ); ?>>
					<?php aperitif_membership_template_part( 'widgets/login-opener', 'templates/holder' ); ?>
				</div>
			<?php }
		}
	}
}
