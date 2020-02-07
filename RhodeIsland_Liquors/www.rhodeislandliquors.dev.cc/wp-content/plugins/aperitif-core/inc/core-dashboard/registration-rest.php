<?php
if( class_exists( 'AperitifCoreDashboardRestAPI' ) ) {
	class AperitifCoreRestAPIRegistrationPurchaseCode extends AperitifCoreDashboardRestAPI {
		private static $instance;
		public function __construct() {
			parent::__construct();
			$this->set_route( 'registration' );
		}

		public static function get_instance() {
			if ( ! ( self::$instance instanceof self ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		public function localize_script( $global ) {

			$global['registrationThemeRoute'] = esc_attr( $this->get_namespace() . '/' . $this->get_route() );

			return $global;
		}

		public function register_rest_api_route() {

			register_rest_route( $this->get_namespace(), $this->get_route(), array(
				array(
					'methods'  => 'POST',
					'callback' => array(AperitifCoreDashboard::get_instance(), 'purchase_code_registration'),
					'args'     => array(
						'options' => array(
							'required'          => true,
							'validate_callback' => function ( $param, $request, $key ) {
								// Simple solution for validation can be 'is_array' value instead of callback function
								return is_array( $param ) ? $param : (array) strip_tags( $param );
							},
							'description'       => esc_html__( 'Options data is array with parameters', 'aperitif-core' )
						)
					)
				)
			) );
		}
	}

	AperitifCoreRestAPIRegistrationPurchaseCode::get_instance();
}