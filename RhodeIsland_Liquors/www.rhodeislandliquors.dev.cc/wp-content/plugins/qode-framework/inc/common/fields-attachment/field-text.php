<?php

class QodeFrameworkFieldAttachmentText extends QodeFrameworkFieldAttachmentType {
	
	function __construct( $params ) {
		parent::__construct( $params );
	}
	
	public function render() {
		$html = '';
		$html .= '<input type="text" name="' . $this->name . '">';
		
		$this->form_fields['html'] = $html;
	}
}