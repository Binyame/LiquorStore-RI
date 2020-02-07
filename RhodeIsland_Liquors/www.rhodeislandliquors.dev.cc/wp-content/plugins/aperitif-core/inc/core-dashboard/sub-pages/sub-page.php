<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

abstract class AperitifCoreSubPage {

	private $base;
	private $title;
	private $atts = array();

	public function __construct() {
		$this->add_sub_page();

	}
	
	abstract public function add_sub_page();

	public function get_base() {
		return $this->base;
	}

	public function set_base( $base ) {
		return $this->base = $base;
	}

	public function get_title() {
		return $this->title;
	}

	public function set_title( $title ) {
		return $this->title = $title;
	}

	public function get_atts() {
		return $this->atts;
	}

	public function set_atts( $atts ) {
		return $this->atts = $atts;
	}

	public function render() {

		echo aperitif_core_get_template_part('core-dashboard/sub-pages/' . $this->get_base() . '/templates',$this->get_base(), '', $this->get_atts());

	}

}