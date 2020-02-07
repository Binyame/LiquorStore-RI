<?php

class QodeFrameworkFieldWidgetColor extends QodeFrameworkFieldWidgetType {
	
	public function load_assets() {
		parent::load_assets();
		
		wp_enqueue_style( 'wp-color-picker' );
		
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker-alpha', QODE_FRAMEWORK_INC_URL_PATH . '/common/assets/js/plugins/wp-color-picker-alpha.min.js', array( 'wp-color-picker' ) );
	}
	
	public function render() { ?>
		<input class="widefat qodef-color-field" data-alpha="true" id="<?php echo esc_attr( $this->params['id'] ); ?>" name="<?php echo esc_attr( $this->params['name'] ); ?>" type="text" value="<?php echo esc_attr( $this->params['value'] ); ?>" />
		<?php
	}
}