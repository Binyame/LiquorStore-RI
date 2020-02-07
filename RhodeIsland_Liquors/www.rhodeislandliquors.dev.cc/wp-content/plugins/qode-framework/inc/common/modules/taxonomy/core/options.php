<?php
class QodeFrameworkOptionsTaxonomy extends QodeFrameworkOptions {

    public function __construct() {
	    parent::__construct();
	
	    add_action( 'init', array( $this, 'init_taxonomy_fields' ) );
	    add_action( 'init', array( $this, 'taxonomy_fields_add' ), 11 );
	    add_action( 'init', array( $this, 'taxonomy_fields_edit' ), 11 );
	
	    add_action( 'created_term', array( $this, 'save_taxonomy_fields' ), 10, 2 );
	    add_action( 'edited_term', array( $this, 'update_taxonomy_fields' ), 10, 2 );
	
	    add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_framework_taxonomy_scripts' ), 5 ); // 5 is set to be same permission as Gutenberg plugin have
    }
	
	function init_taxonomy_fields() {
		do_action( 'qode_framework_action_custom_taxonomy_fields' );
	}
	
	function taxonomy_fields_add() {
		foreach ( $this->get_child_elements() as $key => $child ) {
			foreach ($child->get_scope() as $scope) {
				add_action( $scope . '_add_form_fields', array( $this, 'taxonomy_fields_display_add' ), 10, 1 );
				break;
			}
		}
	}
	
	function taxonomy_fields_edit() {
		foreach ( $this->get_child_elements() as $key => $child ) {
			foreach ($child->get_scope() as $scope) {
				add_action( $scope . '_edit_form_fields', array( $this, 'taxonomy_fields_display_edit' ), 10, 2 );
				break;
			}
		}
	}
	
	function taxonomy_fields_display_add( $taxonomy ) {
    	$params = array();
    	$params['this_object'] = $this;
    	$params['taxonomy'] = $taxonomy;
    	$params['layout'] = '';
		qode_framework_template_part( QODE_FRAMEWORK_INC_PATH, 'common', 'modules/taxonomy/templates/holder', '', $params );
	}
	
	function taxonomy_fields_display_edit( $term, $taxonomy ) {
		$params = array();
		$params['this_object'] = $this;
		$params['taxonomy'] = $taxonomy;
		$params['layout'] = 'table';
		qode_framework_template_part( QODE_FRAMEWORK_INC_PATH, 'common', 'modules/taxonomy/templates/holder', '', $params );
	}
	
	function save_taxonomy_fields( $term_id ) {
		foreach ($this->get_options() as $key => $value ) {
			$value = array_key_exists( $key, $_POST ) ? $_POST[ $key ] : '';
			
			if ( ! empty( $value ) && trim( $value ) !== '' ) {
				add_term_meta( $term_id, $key, sanitize_text_field( $value ) );
			}
		}
	}
	
	function update_taxonomy_fields( $term_id ) {
		foreach ( $this->get_options() as $key => $value ) {
			$value = array_key_exists( $key, $_POST ) ? $_POST[ $key ] : '';
			
			if ( ! empty( $value ) && trim( $value ) !== '' ) {
				update_term_meta( $term_id, $key, sanitize_text_field( $value ) );
			} else {
				delete_term_meta( $term_id, $key );
			}
		}
	}
	
	function enqueue_framework_taxonomy_scripts( $hook ){
		if ( $hook == 'edit-tags.php' || $hook == 'term.php' ) {
			$this->enqueue_dashboard_framework_scripts();
		}
	}
}