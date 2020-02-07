<?php

if ( ! class_exists( 'QodeFrameworkImageSizes' ) ) {
	class QodeFrameworkImageSizes {
		
		private $image_sizes;
		
		function __construct() {
			
			// Initialize variables
			$this->image_sizes = array();
			
			add_action( 'after_setup_theme', array( $this, 'populate_image_sizes' ), 6 );
			
			add_action( 'after_setup_theme', array( $this, 'set_image_support' ) );
			
			add_action( 'admin_init', array( $this, 'settings_init' ) );
			
			add_filter( 'whitelist_options', array( $this, 'register_media_settings' ) );
			
			add_filter( 'qode_framework_filter_pool_list_image_dimension', array( $this, 'register_pool_list_image_dimension' ) );
		}
		
		function populate_image_sizes() {
			do_action ( 'qode_framework_action_before_images_register' );
			
			$this->image_sizes = apply_filters( 'qode_framework_filter_populate_image_sizes', array() );
		}
		
		public function settings_init() {
			if ( ! empty( $this->image_sizes ) ) {
				foreach ( $this->image_sizes as $size ) {
					$slug  = $size['slug'];
					$label = $size['label'];
					
					add_settings_field(
						$slug,
						$label,
						array( $this, 'post_type_slug_input' ),
						'media',
						'default',
						$size
					);
				}
			}
		}
		
		public function post_type_slug_input( $args ) {
			$image_size_name   = $args['slug'];
			$width_field_name  = $image_size_name . '_w';
			$height_field_name = $image_size_name . '_h';
			$crop_field_name   = $image_size_name . '_crop';
			
			$width_value  = get_option( $width_field_name );
			$height_value = get_option( $height_field_name );
			$crop_value   = get_option( $crop_field_name );
			
			$default_width  = $width_value !== false ? $width_value : $args['default_width'];
			$default_height = $height_value !== false ? $height_value : $args['default_height'];
			$default_crop   = $crop_value !== false ? $crop_value : $args['default_crop'];
			
			$default_checked = $default_crop == 1 || $default_crop === true ? 'checked' : '';
			?>
			<fieldset><legend class="screen-reader-text"><span><?php esc_html_e( 'Large size', 'qode-framework' ); ?></span></legend>
				<label for="<?php echo esc_attr($width_field_name); ?>"><?php esc_html_e( 'Max Width', 'qode-framework' ); ?></label>
				<input name="<?php echo esc_attr($width_field_name); ?>" type="number" step="1" min="0" id="<?php echo esc_attr($width_field_name); ?>" value="<?php echo esc_attr($default_width); ?>" class="small-text">
				<br>
				<label for="<?php echo esc_attr($height_field_name); ?>"><?php esc_html_e( 'Max Height', 'qode-framework' ); ?></label>
				<input name="<?php echo esc_attr($height_field_name); ?>" type="number" step="1" min="0" id="<?php echo esc_attr($height_field_name); ?>" value="<?php echo esc_attr($default_height); ?>" class="small-text">
			</fieldset>
			<input name="<?php echo esc_attr($crop_field_name); ?>" type="checkbox" id="<?php echo esc_attr($crop_field_name); ?>" value="1" <?php echo esc_attr( $default_checked ); ?>>
			<label for="<?php echo esc_attr($crop_field_name); ?>"><?php esc_html_e( 'Crop to exact dimensions (normally are proportional) ', 'qode-framework' ); ?></label>
		<?php }
		
		public function set_image_support() {
			if ( ! empty( $this->image_sizes ) ) {
				foreach ( $this->image_sizes as $size ) {
					$image_size_name   = $size['slug'];
					$width_field_name  = $image_size_name . '_w';
					$height_field_name = $image_size_name . '_h';
					$crop_field_name   = $image_size_name . '_crop';
					$width_value       = is_string( get_option( $width_field_name ) ) ? get_option( $width_field_name ) : $size['default_width'];
					$height_value      = is_string( get_option( $height_field_name ) ) ? get_option( $height_field_name ) : $size['default_height'];
					$crop_value        = get_option( $crop_field_name ) !== false ? get_option( $crop_field_name ) : $size['default_crop'];
					add_image_size( $image_size_name, $width_value, $height_value, $crop_value );
				}
			}
		}
		
		public function register_media_settings( $whitelist_options ) {
			if ( ! empty( $this->image_sizes ) ) {
				$media_options = $whitelist_options['media'];
				foreach ( $this->image_sizes as $size ) {
					$image_size_name   = $size['slug'];
					$width_field_name  = $image_size_name . '_w';
					$height_field_name = $image_size_name . '_h';
					$crop_field_name   = $image_size_name . '_crop';
					$media_options[]   = $width_field_name;
					$media_options[]   = $height_field_name;
					$media_options[]   = $crop_field_name;
				}
				$whitelist_options['media'] = $media_options;
			}
			
			return $whitelist_options;
		}
		
		public function register_pool_list_image_dimension( $options ) {
			if ( ! empty( $this->image_sizes ) ) {
				foreach ( $this->image_sizes as $size ) {
					$slug             = $size['slug'];
					$label            = $size['label_simple'];
					$options[ $slug ] = $label;
				}
			}
			
			return $options;
		}
	}
}