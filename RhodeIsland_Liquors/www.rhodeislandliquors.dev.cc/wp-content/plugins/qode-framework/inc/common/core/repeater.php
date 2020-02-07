<?php

class QodeFrameworkFieldRepeater implements iQodeFrameworkTreeInterface, iQodeFrameworkChildInterface {
	
	private $name;
	private $title;
	private $description;
	private $button_text;
	private $layout;
	private $args;
	
	private $scope;
	private $type;
	private $value;
	private $row_number;
	private $children;
	private $params;
	
	function __construct( $params ) {
		$this->name        = isset ( $params['name'] ) ? $params['name'] : '';
		$this->title       = isset ( $params['title'] ) ? $params['title'] : '';
		$this->description = isset ( $params['description'] ) ? $params['description'] : '';
		$this->button_text = isset ( $params['button_text'] ) ? $params['button_text'] : esc_html__( '+ Add New Item', 'qode-framework' );
		$this->layout      = isset ( $params['layout'] ) ? $params['layout'] : 'normal';
		$this->args        = isset ( $params['args'] ) ? $params['args'] : array();
		
		$this->scope      = isset ( $params['scope'] ) ? $params['scope'] : '';
		$this->type       = isset ( $params['type'] ) ? $params['type'] : '';
		$this->value      = isset ( $params['value'] ) ? $params['value'] : array();
		$this->row_number = isset ( $params['num_of_rows'] ) ? $params['num_of_rows'] : 1;
		$this->children   = isset ( $params['children'] ) ? $params['children'] : array();
		$this->params     = isset ( $params['params'] ) ? $params['params'] : array();
		
		$sortableClass = 'sortable';
		foreach ( $this->children as $child ) {
			if ( $child->params['type'] == 'textareahtml' ) {
				$sortableClass = 'not-sortable';
				break;
			}
		}
		$params['sortable_class'] = $sortableClass;
		
		$wrapperClasses            = array();
		$wrapperClasses[]          = 'qodef-repeater-wrapper col-12';
		$wrapperClasses[]          = 'qodef-repeater-' . $this->layout;
		$wrapperClasses[]          = 'qodef-repeater-name-' . $this->name;
		$params['wrapper_classes'] = $wrapperClasses;
		
		$wrapperData                       = array();
		$wrapperData['data-repeater-name'] = $this->name;
		$params['wrapper_data']            = $wrapperData;
		
		$this->params = isset ( $params ) ? $params : array();
	}
	
	public function get_name() {
		return $this->name;
	}
	
	public function get_children() {
		return $this->children;
	}
	
	public function has_children() {
		return ( count( $this->children ) > 0 ) ? true : false;
	}
	
	public function get_child( $key ) {
		return $this->children[ $key ];
	}
	
	public function add_child( iQodeFrameworkChildInterface $field ) {
		$key                    = $field->get_name();
		$this->children[ $key ] = $field;
	}
	
	function add_repeater_inner_element( $params ) {
		if ( isset( $params['name'] ) && ! empty( $params['name'] ) ) {
			$params['type'] = $this->type;
			$field          = new QodeFrameworkFieldRepeaterInner( $params );
			$this->add_child( $field );
			
			return $field;
		}
		
		return false;
	}
	
	function add_field_element( $params ) {
		
		if ( isset( $params['name'] ) && ! empty( $params['name'] ) ) {
			$params['type']          = $this->type;
			$params['default_value'] = isset( $params['default_value'] ) ? $params['default_value'] : '';
			$field                   = new QodeFrameworkFieldMapper( $params );
			$this->add_child( $field );
			
			if ( $params['field_type'] == 'iconpack' ) {
				$icons_object     = qode_framework_icons();
				$icon_collections = $icons_object->get_icon_object_collection();
				
				if ( ! empty( $icon_collections ) ) {
					foreach ( $icon_collections as $icon_collection_key => $icon_collection_value ) {
						$icon_name   = $icons_object->get_formatted_icon_field_name( $params['name'], $icon_collection_key, '-' );
						$params_icon = array(
							'type'       => $this->type,
							'name'       => $icon_name,
							'field_type' => 'icon',
							'title'      => $icon_collection_value->get_name(),
							'options'    => $icon_collection_value->get_icons(),
							'dependency' => array(
								'show' => array(
									$params['name'] => array(
										'values'        => $icon_collection_key,
										'default_value' => $params['default_value']
									)
								)
							)
						);
						
						$field_icon = new QodeFrameworkFieldMapper( $params_icon );
						$this->add_child( $field_icon );
					}
				}
			}
			
			return $field;
		}
		
		return false;
	}
	
	public function render() {
		$this->value = qode_framework_get_option_value( $this->scope, $this->type, $this->name );
		?>
		<div <?php qode_framework_class_attribute( $this->params['wrapper_classes'] ) ?> <?php qode_framework_inline_attrs($this->params['wrapper_data']); ?>>
			<div class="qodef-repeater-wrapper-inner">
				<div class="row">
					<?php if ( $this->title !== '' ) { ?>
						<h3 class="qodef-title qodef-repeater-title col-12"><?php echo esc_attr( $this->title ); ?></h3>
					<?php } ?>
					<?php if ( $this->description != '' ) { ?>
						<p class="qodef-description qodef-repeater-description col-12"><?php echo esc_attr( $this->description ); ?></p>
					<?php } ?>
					<div class="qodef-repeater-wrapper-main col-12 <?php echo esc_attr( $this->params['sortable_class'] ); ?>" data-template="<?php echo str_replace( '_', '-', $this->name ); ?>">
						<?php  if ( ! empty( $this->value ) && count( $this->value ) > 0 ) {
							$counter = 0;
							foreach ( $this->value as $row ) { ?>
								<div class="qodef-repeater-fields-holder clearfix" data-index="<?php echo esc_attr( $counter ); ?>">
									<div class="qodef-repeater-fields">
										<?php foreach ( $this->children as $child ) {
											if( isset( $row[$child->params['name']] ) ) {
												if( $row[$child->params['name']] == '' && isset( $child->params['default_value'] ) && $child->params['default_value'] != ''){
													$repeaterFieldValue = $child->params['default_value'];
												} else {
													$repeaterFieldValue = $row[$child->params['name']];
												}
											} else {
												$repeaterFieldValue = '';
											}
											
											$repeater =  array(
												'name'=> $this->name,
												'index' => $counter,
												'value' => $repeaterFieldValue
											);
											
											$child->params['repeater'] = $repeater;
											
											$child->render();
										 } ?>
									</div>
									<div class="qodef-repeater-actions-holder">
										<div class="qodef-repeater-sort">
											<i class="dripicons-expand"></i>
										</div>
										<div class="qodef-repeater-remove">
											<a class="qodef-clone-remove" href="#"><i class="dripicons-trash"></i></a>
										</div>
									</div>
								</div>
							<?php
								$counter++;
							}
						} ?>
						<script type="text/html" class="qodef-repeater-template" id="tmpl-qodef-repeater-template-<?php echo str_replace('_', '-', $this->name); ?>">
							<div class="qodef-repeater-fields-holder <?php echo esc_attr( $this->params['sortable_class'] ); ?> clearfix"  data-index="{{{ data.rowIndex }}}">
								<div class="qodef-repeater-fields">
									<?php foreach ( $this->children as $child ) {
										$repeaterTemplateFieldValue = ( isset( $child->params['default_value'] ) && $child->params['default_value'] != '' ) ? $child->params['default_value'] : '';
										$repeater =  array(
											'name' => $this->name,
											'index' => '{{{ data.rowIndex }}}',
											'value' => $repeaterTemplateFieldValue
										);
										$child->params['repeater'] = $repeater;
										
										$child->render();
									} ?>
								</div>
								<div class="qodef-repeater-actions-holder">
									<div class="qodef-repeater-sort">
										<i class="dripicons-expand"></i>
									</div>
									<div class="qodef-repeater-remove">
										<a class="qodef-clone-remove" href="#"><i class="dripicons-trash"></i></a>
									</div>
								</div>
							</div>
						</script>
						<?php foreach($this->children as $child) {
							if( $child instanceof QodeFrameworkFieldRepeaterInner ) {
								$repeaterTemplateFieldValue = ( isset( $child->params['default_value'] ) && $child->params['default_value'] != '' ) ? $child->params['default_value'] : array();
								
								$repeater =  array(
									'name' => $this->name,
									'index' => '{{{ data.rowIndex }}}',
									'value' => $repeaterTemplateFieldValue
								);
								$child->params['repeater'] = $repeater;
								$child->renderScript();
							}
						} ?>
					</div>
					<div class="col-12">
						<div class="qodef-repeater-add">
							<a class="qodef-clone qodef-btn qodef-btn-solid" data-count="<?php echo esc_attr( $this->row_number ) ?>" href="#"><?php echo esc_html( $this->button_text ); ?></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
}