<?php

if ( ! class_exists( 'AperitifMembershipPageTemplates' ) ) {
	class AperitifMembershipPageTemplates {
		private static $instance;
		protected $templates = array();
		
		function __construct() {
			// Add your templates to this array.
			$this->set_templates( array(
				'user-dashboard.php' => esc_html__( 'User Dashboard', 'aperitif-membership' )
			) );
			
			// Add a filter to the theme page templates to assigned our custom template into the list
			add_filter( 'theme_page_templates', array( $this, 'add_template' ) );
			
			// Add a filter to the template include to determine if the page has our template assigned and return it's path
			add_filter( 'template_include', array( $this, 'get_template_path' ) );
			
			// Set default dashboard page template name
			add_filter( 'aperitif_membership_filter_dashboard_template_name', array( $this, 'set_dashboard_template_name' ) );
			
			// Include dashboard page template content when user is logged in
			add_action( 'aperitif_membership_action_after_user_dashboard_page_content', array( $this, 'include_dashboard_template_content' ) );
		}
		
		public static function get_instance() {
			if ( null == self::$instance ) {
				self::$instance = new self;
			}
			
			return self::$instance;
		}
		
		public function get_templates() {
			return $this->templates;
		}
		
		public function get_dashboard_template_name() {
			return key( $this->get_templates() );
		}
		
		public function set_templates( $templates ) {
			$this->templates = $templates;
		}
		
		public function add_template( $post_templates ) {
			$post_templates = array_merge( $post_templates, $this->get_templates() );
			
			return $post_templates;
		}
		
		/**
		 * Checks if the template is assigned to the page
		 */
		public function get_template_path( $template ) {
			global $post;
			
			if ( isset( $post ) && ! empty( $post ) ) {
				$page_template = get_post_meta( $post->ID, '_wp_page_template', true );
				
				if ( ! isset( $this->templates[ $page_template ] ) ) {
					return $template;
				}
				
				$file = APERITIF_MEMBERSHIP_INC_PATH . '/general/page-templates/' . $page_template;
				
				// Just to be safe, we check if the file exist first
				if ( file_exists( $file ) ) {
					return $file;
				} else {
					echo $file;
				}
				
				exit;
			}
			
			return $template;
		}
		
		public function set_dashboard_template_name() {
			return $this->get_dashboard_template_name();
		}
		
		function include_dashboard_template_content() {
			
			if ( is_user_logged_in() ) {
				aperitif_membership_template_part( 'general', 'page-templates/parts/content' );
			}
		}
	}
	
	AperitifMembershipPageTemplates::get_instance();
}