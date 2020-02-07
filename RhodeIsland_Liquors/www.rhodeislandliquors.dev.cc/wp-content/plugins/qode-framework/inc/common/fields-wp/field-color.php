<?php

class QodeFrameworkFieldWPColor extends QodeFrameworkFieldWPType {
	
	public function load_assets() {
		parent::load_assets();
		
		wp_enqueue_style( 'wp-color-picker' );
		
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker-alpha', QODE_FRAMEWORK_INC_URL_PATH . '/common/assets/js/plugins/wp-color-picker-alpha.min.js', array( 'wp-color-picker' ) );
	}
	
	public function render_field() { ?>
		<input type="text" name="<?php echo esc_attr( $this->name ); ?>" id="<?php echo esc_attr( $this->params['id'] ); ?>" value="<?php echo esc_attr( $this->params['value'] ); ?>" data-alpha="true" class="qodef-color-field" />
		<?php
	}
}