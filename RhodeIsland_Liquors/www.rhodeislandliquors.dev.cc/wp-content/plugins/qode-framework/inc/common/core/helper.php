<?php

if ( ! function_exists( 'qode_framework_return_dependency_options_array' ) ) {
	function qode_framework_return_dependency_options_array( $scope, $type, $dependency_values = array(), $initial = false, $repeater = false ) {
		$return_array   = array();
		$options_values = array();
		$data_values = array();
		
		if ( ! empty( $dependency_values ) ) {
			foreach ( $dependency_values as $key => $dependency_params ) {
				$values = $dependency_params['values'];
				$default_value = $dependency_params['default_value'];

				if ( is_array( $values ) ) {
					$data_values[ $key ] = implode( ',', $values );
					if ( $repeater ) {
						$rep_key = explode('[', str_replace(']', '', $key) );
						
						if ( ! empty ($rep_key) && count($rep_key) > 2) {
							$rep_main_option = $rep_key[0];
							$rep_key_index = $rep_key[1];
							$rep_main_key = $rep_key[2];
							
							$rep_option = qode_framework_get_option_value( $scope, $type, $rep_main_option );
							
							if ( count( $rep_key ) === 5 ) {
								$rep_key_inner_index = $rep_key[3];
								$rep_main_inner_key  = $rep_key[4];
								
								if ( isset( $rep_option[ $rep_key_index ][ $rep_main_key ] ) ) {
									if ( isset( $rep_option[ $rep_key_index ][ $rep_main_key ][ $rep_key_inner_index ][ $rep_main_inner_key ] ) ) {
										if ( in_array( $rep_option[ $rep_key_index ][ $rep_main_key ][ $rep_key_inner_index ][ $rep_main_inner_key ], $values ) ) {
											$options_values[] = true;
										} else {
											$options_values[] = false;
										}
									} else {
										if ( in_array( $default_value, $values ) ) {
											$options_values[] = true;
										} else {
											$options_values[] = false;
										}
									}
								} else {
									if ( in_array( $default_value, $values ) ) {
										$options_values[] = true;
									} else {
										$options_values[] = false;
									}
								}
								
							} else {
								if ( isset( $rep_option[ $rep_key_index ][ $rep_main_key ] ) ) {
									if ( in_array( $rep_option[ $rep_key_index ][ $rep_main_key ], $values ) ) {
										$options_values[] = true;
									} else {
										$options_values[] = false;
									}
								} else {
									if ( in_array( $default_value, $values ) ) {
										$options_values[] = true;
									} else {
										$options_values[] = false;
									}
								}
							}
						}
					} else {
						$saved_value = qode_framework_get_option_value( $scope, $type, $key );
						if( ! empty ( $saved_value ) ) {
							if ( in_array( $saved_value, $values ) ) {
								$options_values[] = true;
							} else {
								$options_values[] = false;
							}
						} else {
							if ( in_array( $default_value, $values ) ) {
								$options_values[] = true;
							} else {
								$options_values[] = false;
							}
						}
					}
				} else {
					$data_values[ $key ] = $values;
					
					if ( $repeater ) {
						$rep_key = explode('[', str_replace(']', '', $key) );
						if ( ! empty ($rep_key) && count($rep_key) > 2) {
							$rep_main_option = $rep_key[0];
							$rep_key_index = $rep_key[1];
							$rep_main_key = $rep_key[2];
							
							$rep_option = qode_framework_get_option_value( $scope, $type, $rep_main_option );
							
							if (count($rep_key) === 5) {
								$rep_key_inner_index = $rep_key[3];
								$rep_main_inner_key = $rep_key[4];
								if( isset( $rep_option[$rep_key_index][$rep_main_key] ) ) {
									if( isset( $rep_option[$rep_key_index][$rep_main_key][$rep_key_inner_index][$rep_main_inner_key] ) ) {
										if ($rep_option[$rep_key_index][$rep_main_key][$rep_key_inner_index][$rep_main_inner_key] === $values) {
											$options_values[] = true;
										} else {
											$options_values[] = false;
										}
									} else {
										if ( $default_value === $values ) {
											$options_values[] = true;
										} else {
											$options_values[] = false;
										}
									}
								} else {
									if ( $default_value === $values ) {
										$options_values[] = true;
									} else {
										$options_values[] = false;
									}
								}
								
							} else {
								if( isset( $rep_option[$rep_key_index][$rep_main_key] ) ) {
									if ($rep_option[$rep_key_index][$rep_main_key] === $values) {
										$options_values[] = true;
									} else {
										$options_values[] = false;
									}
								} else {
									if ( $default_value === $values ) {
										$options_values[] = true;
									} else {
										$options_values[] = false;
									}
								}
							}
						}
					} else {
						$saved_value = qode_framework_get_option_value( $scope, $type, $key );
						if( ! empty ( $saved_value ) ) {
							if ( $saved_value === $values ) {
								$options_values[] = true;
							} else {
								$options_values[] = false;
							}
						} else {
							if ( $default_value === $values ) {
								$options_values[] = true;
							} else {
								$options_values[] = false;
							}
						}
					}
				}
			}
			
			$hide_item = false;
			
			if ( count( array_unique( $options_values ) ) === 1 ) {
				if( $initial && $options_values[0] === false ) {
					$hide_item = true;
				} else if ( ! $initial && $options_values[0] === true ) {
					$hide_item = true;
				}
			}
			
			$return_array = array(
				'data_values'    => $data_values,
				'hide_container' => $hide_item
			);
		}
		
		return $return_array;
	}
}

if ( ! function_exists( 'qode_framework_return_widget_dependency_options_array' ) ) {
	function qode_framework_return_widget_dependency_options_array( $instance, $dependency_values = array(), $initial = false ) {
		$return_array   = array();
		$options_values = array();
		$data_values = array();

		if ( ! empty( $dependency_values ) ) {
			foreach ( $dependency_values as $key => $dependency_params ) {
				$values = $dependency_params['values'];
				$default_value = isset( $dependency_params['default_value'] ) ? $dependency_params['default_value'] : '';
				$option_name = $dependency_params['option_name'];

				if ( ! empty( $instance ) ) {
					if ( is_array( $values ) ) {
						$data_values[ $key ] = implode( ',', $values );
						if ( in_array( $instance[ $option_name ], $values ) ) {
							$options_values[] = true;
						} else {
							$options_values[] = false;
						}
					} else {
						$data_values[ $key ] = $values;
						
						if( isset( $instance[ $option_name ] ) ) {
							if ( $instance[ $option_name ] == $values ) {
								$options_values[] = true;
							} else {
								$options_values[] = false;
							}
						} else {
							if ( $default_value == $values ) {
								$options_values[] = true;
							} else {
								$options_values[] = false;
							}
						}
					}
				} else {
					if ( is_array( $values ) ) {
						$data_values[ $key ] = implode( ',', $values );
						if ( in_array( $default_value, $values ) ) {
							$options_values[] = true;
						} else {
							$options_values[] = false;
						}
					} else {
						$data_values[ $key ] = $values;
						if ( $default_value === $values ) {
							$options_values[] = true;
						} else {
							$options_values[] = false;
						}
					}
				}
			}
			
			$hide_item = false;
			
			if ( count( array_unique( $options_values ) ) === 1 ) {
				if( $initial && $options_values[0] === false ) {
					$hide_item = true;
				} else if ( ! $initial && $options_values[0] === true ) {
					$hide_item = true;
				}
			}

			$return_array = array(
				'data_values'    => $data_values,
				'hide_container' => $hide_item
			);
		}

		return $return_array;
	}
}

if ( ! function_exists( 'qode_framework_return_menu_dependency_options_array' ) ) {
	function qode_framework_return_menu_dependency_options_array( $dependency_values = array(), $initial = false, $menu_item_id ) {
		$return_array   = array();
		$options_values = array();
		$data_values = array();
		
		if ( ! empty( $dependency_values ) ) {
			foreach ( $dependency_values as $key => $dependency_params ) {
				$values = $dependency_params['values'];
				$default_value = isset( $dependency_params['default_value'] ) ? $dependency_params['default_value'] : '';
				
				$option_name = $dependency_params['option_name'];
				$saved_value = qode_framework_get_option_value( '', 'nav-menu', $option_name, '', $menu_item_id );
				
				if( ! empty( $saved_value) ) {
					if ( is_array( $values ) ) {
						$data_values[ $key ] = implode( ',', $values );
						if ( in_array( $saved_value, $values ) ) {
							$options_values[] = true;
						} else {
							$options_values[] = false;
						}
					} else {
						$data_values[ $key ] = $values;
						
						if ( $saved_value == $values ) {
							$options_values[] = true;
						} else {
							$options_values[] = false;
						}
					}
				} else {
					if ( is_array( $values ) ) {
						$data_values[ $key ] = implode( ',', $values );
						if ( in_array( $default_value, $values ) ) {
							$options_values[] = true;
						} else {
							$options_values[] = false;
						}
					} else {
						$data_values[ $key ] = $values;
						if ( $default_value === $values ) {
							$options_values[] = true;
						} else {
							$options_values[] = false;
						}
					}
				}
				
			}
			
			$hide_item = false;
			
			if ( count( array_unique( $options_values ) ) === 1 ) {
				if( $initial && $options_values[0] === false ) {
					$hide_item = true;
				} else if ( ! $initial && $options_values[0] === true ) {
					$hide_item = true;
				}
			}
			
			$return_array = array(
				'data_values'    => $data_values,
				'hide_container' => $hide_item
			);
		}
		
		return $return_array;
	}
}

if ( ! function_exists( 'qode_framework_return_dependency_classes' ) ) {
	function qode_framework_return_dependency_classes( $show = array(), $hide = array() ) {
		$hideContainer  = true;
		
		if ( ! empty( $show ) ) {
			$hideContainer  = $show['hide_container'];
		}
		
		if ( ! empty( $hide ) ) {
			$hideContainer  = $hide['hide_container'];
		}
		
		if ( $hideContainer ) {
			return 'qodef-hide-dependency-holder';
		}
		
		return '';
	}
}

if ( ! function_exists( 'qode_framework_return_dependency_data' ) ) {
	function qode_framework_return_dependency_data( $show = array(), $hide = array() ) {
		$dependency_data = array();
		$show_data_values = '';
		$hide_data_values = '';
		
		if ( ! empty( $show ) ) {
			$show_data_values = $show['data_values'];
		}
		
		if ( ! empty( $hide ) ) {
			$hide_data_values = $hide['data_values'];
		}
		
		$dependency_data['data-show'] = ! empty( $show_data_values ) ? json_encode( $show_data_values ) : '';
		$dependency_data['data-hide'] = ! empty( $hide_data_values ) ? json_encode( $hide_data_values ) : '';
		
		return $dependency_data;
	}
}