<?php
if ( ! function_exists( 'add_action' ) ) {
	header( 'Status: 403 Forbidden' );
	header( 'HTTP/1.1 403 Forbidden' );
	exit();
}

class AperitifCoreImport {
	/**
	 * @var instance of current class
	 */
	private static $instance;

	/**
	 * Name of folder where revolution slider will stored
	 * @var string
	 */
	private $revSliderFolder;

	/**
	 *
	 * URL where are import files
	 * @var string
	 */
	private $importURI;

	/**
	 * @return AperitifCoreImport
	 */
	public static function get_instance() {
		if ( self::$instance === null ) {
			return new self();
		}

		return self::$instance;
	}

	public $message = array();
	public $data    = array();
	public $status;
	public $attachments = false;
	public $imported_posts = array();

	function __construct() {
		$this->revSliderFolder = 'qodef-rev-sliders';

		add_action('admin_init', array(&$this, 'set_import_url'));
		add_action('wp_ajax_import_action', array(&$this, 'import_action'));
		add_action('wp_ajax_populate_single_pages', array(&$this, 'populate_single_pages'));

	}

	public  function set_status($status){
			$this->status = $status;
	}

	public  function get_status(){
		return $this->status;
	}

	public  function set_message($message){
		$this->message = $message;
	}

	public  function get_message(){
		return $this->message;
	}

	public  function set_data($key, $value){
		$this->data[$key] = $value;
	}

	public  function get_data(){
		return $this->data;
	}

	public function set_import_url() {
		$params = AperitifCoreDashboard::get_instance()->get_import_params();

		if(is_array($params) && isset($params['url'])) {
			$this->importURI = $params['url'];
		}
	}

	public function import_action() {

			if (isset($_POST) || !empty($_POST) || isset($_POST['options']['demo'])) {

				if (!AperitifCoreDashboard::get_instance()->check_purchase_code($_POST['options']['demo'])) {
					qode_framework_get_ajax_status('error', esc_html__('Please don\'t try to hack me. Purchase code registered is not valid', 'aperitif-core'));
					exit;
				}

				if ( wp_verify_nonce( $_POST['options']['nonce'], 'qodef_cd_import_nonce' ) ) {
					$demo = trailingslashit($_POST['options']['demo']);

					switch ($_POST['options']['action']):
						case 'widgets':
							$this->import_widgets($demo);
							break;
						case 'options':
							$this->import_options($demo);
							break;
						case 'settings-page':
							$this->import_settings_pages($demo);
							break;
						case 'menu-settings':
							$this->import_menu_settings($demo);
							break;
						case 'rev-slider':
							if (qode_framework_is_installed('revolution-slider')) {
								$this->rev_slider_import($demo);
							} else {
								$this->set_status('success');
								$this->set_data('type', 'options');
								$this->set_message(esc_html__('Revolution Slider isn\'t installed', 'aperitif-core'));
							}
							break;
						case 'content':
							$xml = isset($_POST['options']['xml']) ? $_POST['options']['xml'] : '';
							$attachments = (isset($_POST['options']['images']) && $_POST['options']['images'] == 1) ? true : false;
							$post_id = isset($_POST['options']['post_id']) ? $_POST['options']['post_id'] : '';
							$update_url = isset($_POST['options']['updateURL']) ? $_POST['options']['updateURL'] : false;
							$this->import_content($demo, $xml, $attachments, $post_id);

							if($update_url){
								$this->update_meta_fields_after_import($demo);
							}

							break;
					endswitch;

			}

			qode_framework_get_ajax_status($this->get_status(), $this->get_message(), $this->get_data());
		}
		wp_die();
	}

	public function unserialized_content( $file ) {

		$file_content = $this->file_content( $file );

		if ( $file_content ) {
			$unserialized_content = unserialize( base64_decode( $file_content ) );

			if ( $unserialized_content ) {
				return $unserialized_content;
			}
		}

		return false;
	}

	function file_content( $path ) {
		$url      = $this->importURI . $path;
		$response = wp_remote_get( $url );

		if ( is_wp_error( $response ) ) {
			$this->message[] = $response->get_error_message() . ' ' . $path;
			return false;
		}

		if ( '200' != wp_remote_retrieve_response_code( $response ) ) {
			$this->set_message($response["response"]['message'] . ' ' . esc_html__('Please contact support', 'aperitif-core'));
			$this->set_status('error');
			return false;
		}

		$body  = wp_remote_retrieve_body( $response );


		return $body;
	}

	public function import_widgets($demo) {
		$widgets         = $demo . 'widgets.txt';
		$custom_sidebars = $demo . 'custom_sidebars.txt';

		$cs_result = $this->import_custom_sidebars( $custom_sidebars );

		$widgets_content = $this->unserialized_content($widgets);

		if($widgets_content) {
			foreach ((array)$widgets_content['widgets'] as $aperitif_widget_id => $aperitif_widget_data) {
				update_option('widget_' . $aperitif_widget_id, $aperitif_widget_data);
			}
			$ws = $this->import_sidebars_widgets($widgets);
			if($ws) {
				$this->set_message(esc_html__('Widgets are set for proper sidebar', 'aperitif-core'));
				$this->set_data('type', 'options');
				$this->set_status('success');
			}
		}
	}

	public function import_sidebars_widgets( $file ) {
		$aperitif_sidebars = get_option( "sidebars_widgets" );
		unset( $aperitif_sidebars['array_version'] );
		$data = $this->unserialized_content( $file );

		if ( $data && is_array( $data['sidebars'] ) ) {
			$aperitif_sidebars = array_merge( (array) $aperitif_sidebars, (array) $data['sidebars'] );
			unset( $aperitif_sidebars['wp_inactive_widgets'] );
			$aperitif_sidebars                  = array_merge( array( 'wp_inactive_widgets' => array() ), $aperitif_sidebars );
			$aperitif_sidebars['array_version'] = 2;
			wp_set_sidebars_widgets( $aperitif_sidebars );
			return true;
		} else {
			return false;
		}
	}

	public function import_custom_sidebars( $file ) {
		$options = $this->unserialized_content( $file );

		if($options) {
			$results = update_option('qode_framework_custom_sidebars', $options);

			if ($results) {
				return $results;
			} else {
				return false;
			}
		}
	}

	public function import_options( $file ) {

		$options_file = $file . 'options.txt';

		$options       = $this->unserialized_content( $options_file );
		$current_options = get_option(APERITIF_CORE_OPTIONS_NAME);
		if($options){
			if($current_options != $options) {
				$result = update_option(APERITIF_CORE_OPTIONS_NAME, $options);
				if ($result) {
					$this->update_options_after_import($file);
					$this->set_status('success');
					$this->set_data('type', 'options');
					$this->set_message(esc_html__('Options imported successfully', 'aperitif-core'));

					$this->update_options_after_import($file);

				} else {
					$this->set_status('error');
					$this->set_message(esc_html__('Problem occurred during options import', 'aperitif-core'));
				}
			} else {
				$this->set_status('success');
				$this->set_data('type', 'options');
				$this->set_message(esc_html__('Options are already imported', 'aperitif-core'));
			}
		}
	}

	public function import_settings_pages( $file ) {

		$settings_file = $file . 'settingpages.txt';

		$fields = array(
			'show_on_front'		=> get_option( 'show_on_front' ),
			'page_on_front'		=> get_option( 'page_on_front' ),
			'page_for_posts'	=> get_option( 'page_for_posts' )
		);

		$pages = $this->unserialized_content( $settings_file );

		$new_ids = get_transient( '_aperitif_core_imported_posts' );
		$fields_status = true;

		if($pages) {
			if( $pages['show_on_front'] != $fields['show_on_front']) {
				$fields_status = update_option('show_on_front', $pages['show_on_front']);
			}
			if( $pages['page_on_front'] != 0 && ($new_ids[$pages['page_on_front']] != $fields['page_on_front'])) {
				$fields_status = update_option('page_on_front', $new_ids{$pages['page_on_front']});
			}
			if( $pages['page_for_posts'] != 0 && ($new_ids[$pages['page_for_posts']] != $fields['page_for_posts'])) {
				$fields_status = update_option('page_for_posts', $new_ids[$pages['page_for_posts']]);
			}

			if (!$fields_status) {
				$this->set_status('error');
				$this->set_message(esc_html__('Problem occurred during settings pages import', 'aperitif-core'));
			} else {
				$this->set_status('success');
				$this->set_data('type', 'options');
				$this->set_message(esc_html__('Settings pages imported successfully', 'aperitif-core'));
			}
		} else {
			$this->set_status('error');
			$this->set_message(esc_html__('File doesn\'t exist', 'aperitif-core'));
		}
	}

	public function import_menu_settings( $file ) {
		global $wpdb;

		$menus_file = $file . 'menus.txt';

		$menus_data = $this->unserialized_content( $menus_file );
		if($menus_data) {
			$menu_array = array();
			$terms_table = $wpdb->prefix . "terms";

			foreach ($menus_data as $registered_menu => $menu_slug) {
				$term_rows = $wpdb->get_results($wpdb->prepare("SELECT * FROM {$terms_table} where slug=%s", $menu_slug), ARRAY_A);

				if (isset($term_rows[0]['term_id'])) {
					$term_id_by_slug = $term_rows[0]['term_id'];
				} else {
					$term_id_by_slug = null;
				}

				$menu_array[$registered_menu] = $term_id_by_slug;
			}

			set_theme_mod('nav_menu_locations', array_map('absint', $menu_array));

			$this->set_status('success');
			$this->set_data('type', 'options');
			$this->set_message( esc_html__( 'Menus set for proper locations', 'aperitif-core' ) );
		} else {
			$this->set_status('error');
			$this->set_message( esc_html__( 'Problem during menus location set', 'aperitif-core' ) );
		}
	}


	public function import_content( $file, $xml, $attachments, $post_id) {
		ob_start();
		require_once( APERITIF_CORE_INC_PATH . '/core-dashboard/sub-pages/import/wordpress-importer.php' );



		if(qode_framework_is_installed('woocommerce')) {
			add_filter('wp_import_posts', array($this, 'proccess_wc_attributes'));
		}


		if(!empty($post_id)){

			add_filter('wp_import_posts', function ($posts) use ($post_id) {

				$single_page = array();
				foreach ($posts as $post) {
					if($post['post_type'] == 'page' && $post['post_id'] == $post_id){
						$single_page[] = $post;
						break;
					}
				}

				return $single_page;
			}, 10, 2);


		}

		$aperitif_import = new WP_Import();
		set_time_limit( 0 );

		$aperitif_import->fetch_attachments = $attachments;
		$returned_value                  = $aperitif_import->import( $file . $xml );


		if ( is_wp_error( $returned_value ) ) {
			$this->set_status('error');
			$this->set_data('type', 'content');
			$this->set_data('xml', $xml);
			$this->set_message( esc_html__( 'An error occurred during content import', 'aperitif-core' ) );
		} else {
			$this->set_status('success');
			$this->set_data('type', 'content');
			$this->set_data('posts', $this->imported_posts);
			$this->set_message( esc_html__( 'File imported successfully', 'aperitif-core' ) . ' ' . $xml );

		}

		ob_get_clean();

	}

	public function rev_sliders() {
		$rev_sldiers = array(
			'home-1.zip',
			'home-1-j.zip',
			'home-3-test.zip',
			'home-4.zip',
			'home-6.zip',
			'home7.zip',
			'home-9.zip',
			'home-41.zip',
			'home-a.zip',
			'landing-content-1.zip',
			'landing-content-2.zip',
		);

		return $rev_sldiers;
	}

	public function create_rev_slider_files( $folder ) {
		$rev_list = $this->rev_sliders();
		$dir_name = $this->revSliderFolder;

		$upload     = wp_upload_dir();
		$upload_dir = $upload['basedir'];
		$upload_dir = $upload_dir . '/' . $dir_name;
		if ( ! is_dir( $upload_dir ) ) {
			mkdir( $upload_dir, 0700 );
			mkdir( $upload_dir . '/' . $folder, 0700 );
		}

		foreach ( $rev_list as $rev_slider ) {

			$file_data = file_get_contents( $this->importURI . $folder . '/revslider/' . $rev_slider );

			if($file_data) {
				file_put_contents(
					WP_CONTENT_DIR . '/uploads/' . $dir_name . '/' . $folder . '/' . $rev_slider,
					$file_data);
			} else {
				return false;
			}
		}

		return true;
	}

	public function rev_slider_import( $folder ) {
		$files_created = $this->create_rev_slider_files( $folder );

		if($files_created) {
			$rev_sliders = $this->rev_sliders();
			$dir_name = $this->revSliderFolder;
			$absolute_path = __FILE__;
			$path_to_file = explode('wp-content', $absolute_path);
			$path_to_wp = $path_to_file[0];

			require_once($path_to_wp . '/wp-load.php');
			require_once($path_to_wp . '/wp-includes/functions.php');
			require_once($path_to_wp . '/wp-admin/includes/file.php');


			$rev_slider_instance = new RevSlider();

			foreach ($rev_sliders as $rev_slider) {
				$nf = WP_CONTENT_DIR . '/uploads/' . $dir_name . '/' . $folder . $rev_slider;
				$rev_results = $rev_slider_instance->importSliderFromPost(true, true, $nf);

				if (!$rev_results['success']) {
					$this->set_status('error');
					$this->set_message(esc_html__('Error while importing rev sliders', 'aperitif-core'));
					exit;
				}
			}
			$this->set_status('success');
			$this->set_data('type', 'options');
			$this->set_message(esc_html__('Rev sliders imported successfully', 'aperitif-core'));
		}else {
			$this->set_status('error');
			$this->set_data('type', 'options');
			$this->set_message(esc_html__('Files don\'t exist', 'aperitif-core'));
		}
	}

	function update_meta_fields_after_import( $folder ) {
		global $wpdb;

		$url       = esc_url( home_url( '/' ) );
		$demo_urls = $this->import_get_demo_urls( $folder );
		
		foreach ( $demo_urls as $demo_url ) {
			$sql_query   = "SELECT meta_id, meta_value FROM {$wpdb->postmeta} WHERE meta_key LIKE '%" . esc_url( $demo_url ) . "%';";
			$meta_values = $wpdb->get_results( $sql_query );
			
			if ( ! empty( $meta_values ) ) {
				foreach ( $meta_values as $meta_value ) {
					$new_value = $this->recalc_serialized_lengths( str_replace( $demo_url, $url, $meta_value->meta_value ) );
					
					$wpdb->update( $wpdb->postmeta,	array( 'meta_value' => $new_value ), array( 'meta_id' => $meta_value->meta_id )	);
				}
			}
		}
	}

	function update_options_after_import( $folder ) {
		$url       = esc_url( home_url( '/' ) );
		$demo_urls = $this->import_get_demo_urls( $folder );

		foreach ( $demo_urls as $demo_url ) {
			$global_options    = get_option( APERITIF_CORE_OPTIONS_NAME );
			$new_global_values = str_replace( $demo_url, $url, $global_options );

			update_option( APERITIF_CORE_OPTIONS_NAME, $new_global_values );
		}
	}

	function import_get_demo_urls( $folder ) {
		$demo_urls  = array();
		$domain_url = str_replace( '/', '', $folder ) . '.qodeinteractive.com/';

		$demo_urls[] = ! empty( $domain_url ) ? 'http://' . $domain_url : '';
		$demo_urls[] = ! empty( $domain_url ) ? 'https://' . $domain_url : '';

		return $demo_urls;
	}

	function recalc_serialized_lengths( $sObject ) {
		$ret = preg_replace_callback( '!s:(\d+):"(.*?)";!', 'recalc_serialized_lengths_callback', $sObject );

		return $ret;
	}

	function recalc_serialized_lengths_callback( $matches ) {
		return "s:" . strlen( $matches[2] ) . ":\"$matches[2]\";";
	}

	function replace_image_with_placeholder( $post ) {
		if ( isset( $post['post_type'] ) && 'attachment' == $post['post_type'] ) {
			$post['attachment_url'] = $post['guid'] = $this->get_noimage_url( $post['attachment_url'] );
		}

		return $post;
	}

	function get_noimage_url( $origin_img_url ) {
		switch ( pathinfo( $origin_img_url, PATHINFO_EXTENSION ) ) {
			case 'jpg':
			case 'jpeg':
				$ext = 'jpg';
				break;
			case 'png':
				$ext = 'png';
				break;
			case 'gif':
			default:
				$ext = 'gif';
				break;
		}
		$noimage_fname = 'noimage.' . $ext;

		return APERITIF_CORE_ASSETS_URL_PATH . '/img/' . $noimage_fname;
	}

	function proccess_wc_attributes( $posts ) {

			foreach ($posts as $post) {
				if ('product' === $post['post_type'] && !empty($post['terms'])) {
					foreach ($post['terms'] as $term) {
						if (strstr($term['domain'], 'pa_')) {
							if (!taxonomy_exists($term['domain'])) {
								$attribute_name = wc_attribute_taxonomy_slug($term['domain']);

								// Create the taxonomy.
								if (!in_array($attribute_name, wc_get_attribute_taxonomies(), true)) {
									wc_create_attribute(
										array(
											'name' => $attribute_name,
											'slug' => $attribute_name,
											'type' => 'select',
											'order_by' => 'menu_order',
											'has_archives' => false,
										)
									);
								}

								// Register the taxonomy now so that the import works!
								register_taxonomy(
									$term['domain'],
									apply_filters('woocommerce_taxonomy_objects_' . $term['domain'], array('product')),
									apply_filters(
										'woocommerce_taxonomy_args_' . $term['domain'],
										array(
											'hierarchical' => true,
											'show_ui' => false,
											'query_var' => true,
											'rewrite' => false,
										)
									)
								);
							}
						}
					}
				}
			}
			return $posts;
	}

	public function populate_single_pages() {

		if ( isset( $_POST ) && !empty( $_POST ) && !empty($_POST['options']['demo']) ) {
			if ( wp_verify_nonce( $_POST['options']['nonce'], 'qodef_cd_import_nonce' ) ) {
				$demo = trailingslashit($_POST['options']['demo']);
				$pages_file = $demo . 'pages.txt';
				$pages = $this->unserialized_content( $pages_file );

				$html = aperitif_core_get_template_part('core-dashboard/sub-pages/import/templates', 'pages-list', '', array('pages' => $pages));

				if($pages){
					qode_framework_get_ajax_status( 'success', '', $html);
				} else {
					qode_framework_get_ajax_status( 'error', esc_html__( 'Pages don\'t exist', 'aperitif-core' ), '');
				}
			}
		}

		wp_die();
	}


	public function is_ready_to_import() {
		$info = AperitifCoreSystemInfoPage::get_instance()->get_system_info();
		if($info['php_memory_limit']['pass'] && $info['php_post_max_size']['pass'] && $info['php_time_limit']['pass'] && $info['php_max_input_vars']['pass'] && $info['max_upload_size']['pass']){
			return true;
		}

		return false;
	}

}
AperitifCoreImport::get_instance();