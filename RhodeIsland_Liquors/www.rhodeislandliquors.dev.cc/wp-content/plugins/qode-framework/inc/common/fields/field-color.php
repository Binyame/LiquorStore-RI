<?php

class QodeFrameworkFieldColor extends QodeFrameworkFieldType {
	
	public function load_assets() {
		parent::load_assets();
		
		wp_enqueue_style( 'wp-color-picker' );
		
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker-alpha', QODE_FRAMEWORK_INC_URL_PATH . '/common/assets/js/plugins/wp-color-picker-alpha.min.js', array( 'wp-color-picker' ) );
	}

    public function render_field() { ?>
	    <input type="text" data-alpha="true" name="<?php echo esc_attr( $this->name ); ?>" value="<?php echo esc_attr( $this->params['value'] ); ?>" class="qodef-field qodef-color-field" />
        <?php
    }
}