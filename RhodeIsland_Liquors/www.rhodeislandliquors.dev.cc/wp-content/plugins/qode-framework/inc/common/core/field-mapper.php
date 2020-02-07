<?php

class QodeFrameworkFieldMapper implements iQodeFrameworkChildInterface {
	
	public $params;
	public $name;
	public $type;
	
	function __construct( $params ) {
		$this->params = isset ( $params ) ? $params : array();
		$this->name   = $params['name'];
		$this->type   = $params['type'];
	}
	
	public function get_name() {
		return $this->name;
	}
	
	public function render( $return = false, $postId = null ) {
		if ( $this->type == 'taxonomy' || $this->type == 'user' ) {
			$class = 'QodeFrameworkFieldWP' . ucfirst( $this->params['field_type'] );
		} else if ( $this->type == 'attachment' ) {
			$class = 'QodeFrameworkFieldAttachment' . ucfirst( $this->params['field_type'] );
		} else if ( $this->type == 'nav-menu' ) {
			$class = 'QodeFrameworkFieldNavMenu' . ucfirst( $this->params['field_type'] );
		} else if ( $this->type == 'widget' ) {
			$class = 'QodeFrameworkFieldWidget' . ucfirst( $this->params['field_type'] );
		} else {
			$class = 'QodeFrameworkField' . ucfirst( $this->params['field_type'] );
		}
		
		$class = apply_filters( 'qode_framework_filter_field_mapping', $class, $postId );
		
		if ( class_exists( $class ) ) {
			$this->params['post_id'] = $postId;
			
			if ( $return ) {
				return new $class( $this->params );
			} else {
				new $class( $this->params );
			}
		}
		
		return $return;
	}
}