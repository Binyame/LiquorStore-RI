<?php

class AperitifCoreMobileHeaders {
	private static $instance;
	private $layout_meta;
	private $layouts;
	private $mobile_header_object;
	
	public function __construct() {
		
		// Includes header layouts
		$this->include_elements();
		
		// Set module variables
		add_action( 'wp', array(
			$this,
			'set_variables'
		) ); // wp hook is set because we need to wait global wp_query object to instance in order to get page id
		
		// Overrides default header template of theme
		add_action( 'wp', array( $this, 'render_template' ) );
		
		// Add module body classes
		add_filter( 'body_class', array( $this, 'add_body_classes' ) );
		
		//Add widget areas
		add_action( 'widgets_init', array( $this, 'add_header_widget_areas' ) );
	}
	
	public static function get_instance() {
		if ( self::$instance == null ) {
			self::$instance = new self();
		}
		
		return self::$instance;
	}
	
	public function get_layout_meta() {
		return $this->layout_meta;
	}
	
	public function set_layout_meta( $layout_meta ) {
		$this->layout_meta = $layout_meta;
	}
	
	public function get_layouts() {
		return $this->layouts;
	}
	
	public function set_layouts( $layouts ) {
		$this->layouts = $layouts;
	}
	
	public function get_mobile_header_object() {
		return $this->mobile_header_object;
	}
	
	public function set_mobile_header_object( $mobile_header_object ) {
		$this->mobile_header_object = $mobile_header_object;
	}
	
	function include_elements() {
		
		foreach ( glob( APERITIF_CORE_INC_PATH . '/mobile-header/dashboard/*/*.php' ) as $admin ) {
			include_once $admin;
		}
		foreach ( glob( APERITIF_CORE_INC_PATH . '/mobile-header/layouts/*/include.php' ) as $layout ) {
			include_once $layout;
		}
	}
	
	function set_variables() {
		$layout_meta = aperitif_core_get_post_value_through_levels( 'qodef_mobile_header_layout' );
		$layouts     = apply_filters( 'aperitif_core_filter_register_mobile_header_layouts', $header_layouts_option = array() );
		
		$this->set_layout_meta( $layout_meta );
		$this->set_layouts( $layouts );
		
		if ( ! empty( $layout_meta ) && ! empty( $layouts ) ) {
			foreach ( $layouts as $key => $value ) {
				if ( $layout_meta === $key ) {
					
					$this->set_mobile_header_object( $value::get_instance() );
				}
			}
		}
	}
	
	function load_template() {
		echo $this->get_mobile_header_object()->load_template(); // template is properly escaped inside html file
	}
	
	function render_template() {
		$header_object = $this->get_mobile_header_object();
		
		if ( ! empty( $header_object ) ) {
			$template_hook = $header_object->overriding_whole_mobile_header ? 'aperitif_filter_mobile_header_template' : 'aperitif_filter_mobile_header_content_template';
			
			add_filter( $template_hook, array( $this, 'load_template' ), 11 );
		}
	}
	
	function add_body_classes( $classes ) {
		$header_layout = aperitif_core_get_post_value_through_levels( 'qodef_mobile_header_layout' );
		$classes[]     = ! empty( $header_layout ) ? 'qodef-mobile-header--' . $header_layout : '';
		
		$classes[] = aperitif_core_get_post_value_through_levels( 'qodef_mobile_header_scroll_appearance' ) == 'yes' ? 'qodef-mobile-header-appearance--sticky' : '';
		
		return $classes;
	}
	
	function add_header_widget_areas() {
		register_sidebar(
			array(
				'id'            => 'qodef-mobile-header-widget-area',
				'name'          => esc_html__( 'Mobile Header', 'aperitif-core' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s qodef-mobile-header-widget-area-one" data-area="mobile-header">',
				'after_widget'  => '</div>',
				'description'   => esc_html__( 'Widgets added here will appear in mobile header widget area', 'aperitif-core' )
			)
		);
	}
}

AperitifCoreMobileHeaders::get_instance();