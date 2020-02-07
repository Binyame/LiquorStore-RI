<?php

class QodeFrameworkCustomPostTypeTaxonomy {
	
	private $base;
	private $slug;
	private $slug_setting_name;
	private $singular_name;
	private $plural_name;
	private $hierarchical;
	private $labels;
	private $show_ui;
	private $query_var;
	private $show_admin_column;
	private $path;
	
	private $post_type;
	private $post_type_name;
	private $has_archive;
	
	public function __construct( $params ) {
		$this->base              = isset( $params['base'] ) ? $params['base'] : '';
		$this->slug              = isset( $params['slug'] ) ? $params['slug'] : $this->base;
		$this->singular_name     = isset( $params['singular_name'] ) ? $params['singular_name'] : '';
		$this->plural_name       = isset( $params['plural_name'] ) ? $params['plural_name'] : '';
		$this->hierarchical      = isset( $params['hierarchical'] ) ? $params['hierarchical'] : true;
		$this->labels            = isset( $params['labels'] ) ? $params['labels'] : array();
		$this->show_ui           = isset( $params['show_ui'] ) ? $params['show_ui'] : true;
		$this->query_var         = isset( $params['query_var'] ) ? $params['query_var'] : true;
		$this->show_admin_column = isset( $params['show_admin_column'] ) ? $params['show_admin_column'] : true;
		$this->path              = isset( $params['path'] ) ? $params['path'] : '';
		
		$this->post_type      = isset( $params['post_type'] ) ? $params['post_type'] : '';
		$this->post_type_name = isset( $params['post_type_name'] ) ? $params['post_type_name'] : '';
		$this->has_archive    = isset( $params['has_archive'] ) ? $params['has_archive'] : true;
		
		$this->set_slug_setting_name();
		
		add_action( 'admin_init', array( $this, 'settings_init' ) );
		add_filter( 'archive_template', array( $this, 'register_archive_templates' ) );
	}
	
	public function get_base() {
		return $this->base;
	}
	
	public function get_slug_setting_name() {
		return $this->slug_setting_name;
	}
	
	public function set_slug_setting_name() {
		$this->slug_setting_name = $this->get_base() . '_slug';
	}
	
	private function get_slug() {
		$slugs             = get_option( 'qode_framework_permalinks' );
		$slug_option_value = isset( $slugs[ $this->get_slug_setting_name() ] ) ? $slugs[ $this->get_slug_setting_name() ] : '';
		
		return ! empty( $slug_option_value ) ? $slug_option_value : $this->slug;
	}
	
	public function register() {
		$labels = array_merge( array(
			'name'              => $this->plural_name,
			'singular_name'     => sprintf( esc_html__( '%s %s', 'qode-framework' ), $this->post_type_name, $this->singular_name ),
			'search_items'      => sprintf( esc_html__( 'Search %s %s', 'qode-framework' ), $this->post_type_name, $this->plural_name ),
			'all_items'         => sprintf( esc_html__( 'All %s %s', 'qode-framework' ), $this->post_type_name, $this->plural_name ),
			'parent_item'       => sprintf( esc_html__( 'Parent %s %s', 'qode-framework' ), $this->post_type_name, $this->singular_name ),
			'parent_item_colon' => sprintf( esc_html__( 'Parent %s %s:', 'qode-framework' ), $this->post_type_name, $this->singular_name ),
			'edit_item'         => sprintf( esc_html__( 'Edit %s %s', 'qode-framework' ), $this->post_type_name, $this->singular_name ),
			'update_item'       => sprintf( esc_html__( 'Update %s %s', 'qode-framework' ), $this->post_type_name, $this->singular_name ),
			'add_new_item'      => sprintf( esc_html__( 'Add New %s %s', 'qode-framework' ), $this->post_type_name, $this->singular_name ),
			'new_item_name'     => sprintf( esc_html__( 'New %s %s Name', 'qode-framework' ), $this->post_type_name, $this->singular_name ),
			'not_found'         => sprintf( esc_html__( 'No %s %s Found', 'qode-framework' ), $this->post_type_name, $this->plural_name ),
			'menu_name'         => sprintf( esc_html__( '%s %s', 'qode-framework' ), $this->post_type_name, $this->plural_name ),
		), $this->labels );

		register_taxonomy( $this->get_base(), array( $this->post_type ), array(
			'hierarchical'      => $this->hierarchical,
			'labels'            => $labels,
			'show_ui'           => $this->show_ui,
			'query_var'         => $this->query_var,
			'show_admin_column' => $this->show_admin_column,
			'rewrite'           => array( 'slug' => $this->get_slug() )
		) );
	}
	
	public function settings_init() {
		if ( $this->has_archive ) {
			add_settings_field( $this->get_slug_setting_name(), $this->post_type_name . ' ' . $this->singular_name . ' ' . esc_html__( 'base', 'qode-framework' ), array(
				$this,
				'post_type_slug_input'
			), 'permalink', 'optional' );
		}
	}
	
	public function post_type_slug_input() { ?>
		<input name="<?php echo esc_attr( $this->get_slug_setting_name() ); ?>" type="text" class="regular-text code" value="<?php echo esc_attr( $this->get_slug() ); ?>" placeholder="<?php echo esc_attr( $this->get_base() ); ?>"/>
	<?php }
	
	public function register_archive_templates( $archive ) {
		global $post;
		
		if ( ! empty( $post ) && $post->post_type == $this->post_type ) {
			if ( ! file_exists( get_stylesheet_directory() . '/archive-' . $this->post_type . '.php' ) ) {
				if ( file_exists( $this->path . '/templates/archive-' . $this->post_type . '.php' ) ) {
					return $this->path . '/templates/archive-' . $this->post_type . '.php';
				}
			}
		}
		
		return $archive;
	}
}