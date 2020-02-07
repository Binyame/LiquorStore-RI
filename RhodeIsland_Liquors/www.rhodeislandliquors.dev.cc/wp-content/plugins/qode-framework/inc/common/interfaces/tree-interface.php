<?php

interface iQodeFrameworkTreeInterface {
	public function has_children();
	
	public function get_children();
	
	public function get_child( $key );
	
	public function add_child( iQodeFrameworkChildInterface $field );
}