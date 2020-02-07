<?php

if ( ! function_exists( 'qode_framework_template_part' ) ) {
	/**
	 * Echo module template part.
	 *
	 * @param string $root path of root folder to start templating from
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 */
	function qode_framework_template_part( $root, $module, $template, $slug = '', $params = array() ) {
		echo qode_framework_get_template_part( $root, $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'qode_framework_get_template_part' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $root path of root folder to start templating from
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function qode_framework_get_template_part( $root, $module, $template, $slug = '', $params = array() ) {
		$temp = $root . '/' . $module . '/' . $template;
		
		$template = qode_framework_get_template_with_slug( $temp, $slug );
		
		return qode_framework_execute_template_with_params( $template, $params );
	}
}

if ( ! function_exists( 'qode_framework_list_sc_template_part' ) ) {
	/**
	 * Echo module template part.
	 *
	 * @param string $root path of root folder to start templating from
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 */
	function qode_framework_list_sc_template_part( $root, $module, $template, $slug = '', $params = array() ) {
		echo qode_framework_get_list_sc_template_part( $root, $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'qode_framework_get_list_sc_template_part' ) ) {
	/**
	 * Echo module template part.
	 *
	 * @param string $root path of root folder to start templating from
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function qode_framework_get_list_sc_template_part( $root, $module, $template, $slug = '', $params = array() ) {
		$temp_in_variation = false;
		
		/* In order to use this way of templating, option for list item layout must be called layoyt */
		if ( isset( $params['layout'] ) ) {
			/* Check if folder for variation exists */
			$variation_path = apply_filters( 'qode_framework_list_sc_layout_path', $root . '/' . $module . '/variations/' . $params['layout'], $params );
			if ( file_exists( $variation_path ) ) {
				/* Check if template file in variation folder exists */
				$temp_file = qode_framework_get_template_with_slug( $variation_path . '/' . $template, $slug );
				
				if ( ! empty( $temp_file ) && file_exists( $temp_file ) ) {
					$template          = $temp_file;
					$temp_in_variation = true;
				}
			}
		}
		
		/* Template doesn't exist in variation folder, use default one */
		if ( ! $temp_in_variation ) {
			$temp     = $root . '/' . $module . '/templates/' . $template;
			$template = qode_framework_get_template_with_slug( $temp, $slug );
		}
		
		return qode_framework_execute_template_with_params( $template, $params );
	}
}

if ( ! function_exists( 'qode_framework_get_template_with_slug' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $temp temp path to file that is being loaded
	 * @param string $slug slug that should be checked if exists
	 *
	 * @return string - string with template path
	 */
	function qode_framework_get_template_with_slug( $temp, $slug ) {
		$template = '';
		
		if ( ! empty( $temp ) ) {
			if ( ! empty( $slug ) ) {
				$template = "{$temp}-{$slug}.php";
				
				if ( ! file_exists( $template ) ) {
					$template = $temp . '.php';
				}
			} else {
				$template = $temp . '.php';
			}
		}
		
		return $template;
	}
}

if ( ! function_exists( 'qode_framework_execute_template_with_params' ) ) {
	/**
	 * Loads module template part.
	 *
	 * @param string $template path to template that is going to be included
	 * @param array  $params params that are passed to template
	 *
	 * @return string - template html
	 */
	function qode_framework_execute_template_with_params( $template, $params ) {
		if ( ! empty( $template ) && file_exists( $template ) ) {
			//Extract params so they could be used in template
			if ( is_array( $params ) && count( $params ) ) {
				extract( $params );
			}
			
			ob_start();
			include( $template );
			$html = ob_get_clean();
			
			return $html;
		} else {
			return '';
		}
	}
}

if ( ! function_exists( 'qode_framework_get_page_id' ) ) {
	/**
	 * Function that returns current page id
	 * Additional conditional is to check if current page is any wp archive page (archive, category, tag, date etc.) and returns -1
	 *
	 * @return int
	 */
	function qode_framework_get_page_id() {
		$page_id = get_queried_object_id();
		
		if ( qode_framework_is_wp_template() ) {
			$page_id = -1;
		}
		
		return apply_filters( 'qode_framework_filter_page_id', $page_id );
	}
}

if ( ! function_exists( 'qode_framework_is_wp_template' ) ) {
	/**
	 * Function that checks if current page default wp page
	 *
	 * @return bool
	 */
	function qode_framework_is_wp_template() {
		return is_archive() || is_search() || is_404() || ( is_front_page() && is_home() );
	}
}

if ( ! function_exists( 'qode_framework_get_option_value' ) ) {
	function qode_framework_get_option_value( $scope, $type, $name, $default_value = '', $post_id = null ) {
		if ( $type == 'admin' ) {
			if ( ! empty( $scope ) ) {
				if ( is_array( $scope ) ) {
					$scope = $scope[0];
				}
				$admin_options = qode_framework_get_framework_root()->get_admin_option( $scope );
				$value         = $admin_options->get_option_value( $name );
			}
		} else if ( $type == 'meta-box' ) {
			if ( empty( $post_id ) && isset( $_GET['post'] ) && ! empty( $_GET['post'] ) ) {
				$post_id = intval( $_GET['post'] );
			}
			if ( ! empty ( $post_id ) ) {
				$value = get_post_meta( $post_id, $name, true );
			}
		} else if ( $type == 'front-end' ) {
			$post_id = ! empty ( $post_id ) ? $post_id : get_the_ID();
			if ( ! empty( $post_id ) ) {
				$value = get_post_meta( $post_id, $name, true );
			}
		} else if ( $type == 'taxonomy' ) {
			if ( empty( $post_id ) && isset( $_GET['tag_ID'] ) && ! empty( $_GET['tag_ID'] ) ) {
				$post_id = intval( $_GET['tag_ID'] );
			}
			if ( ! empty ( $post_id ) ) {
				$value = get_term_meta( $post_id, $name, true );
			}
		} else if ( $type == 'user' ) {
			if ( empty( $post_id ) ) {
				$post_id = isset( $_GET['user_id'] ) && ! empty( $_GET['user_id'] ) ? intval( $_GET['user_id'] ) : get_current_user_id();
			}
			if ( ! empty ( $post_id ) ) {
				$value = get_user_meta( $post_id, $name, true );
			}
		} else if ( $type == 'attachment' ) {
			if ( ! empty ( $post_id ) ) {
				$value = get_post_meta( $post_id, $name, true );
			}
		} else if ( $type == 'nav-menu' ) {
			if ( ! empty ( $post_id ) ) {
				$key   = sprintf( 'menu-item-%s', $name );
				$value = get_post_meta( $post_id, $key, true );
			}
		}
		$value = isset( $value ) && ! empty( $value ) ? $value : $default_value;
		
		return $value;
	}
}

if ( ! function_exists( 'qode_framework_get_post_value_through_levels' ) ) {
	function qode_framework_get_post_value_through_levels( $scope, $name, $post_id = 0 ) {
		$post_id = ! empty( $post_id ) ? intval( $post_id ) : qode_framework_get_page_id();
		$value   = '';
		
		$option_value = qode_framework_get_option_value( $scope, 'admin', $name );
		
		if ( ! empty( $option_value ) ) {
			$value = $option_value;
		}
		
		if ( $post_id !== - 1 ) {
			$meta_value = qode_framework_get_option_value( $scope, 'meta-box', $name, '', $post_id );
			
			if ( ! empty( $meta_value ) ) {
				$value = $meta_value;
			}
		}
		
		$value = apply_filters( 'qode_framework_filter_value_through_levels_' . $name, $value );
		
		return $value;
	}
}

if ( ! function_exists( 'qode_framework_inline_style' ) ) {
	/**
	 * Function that echoes generated style attribute
	 *
	 * @param $value string | array attribute value
	 *
	 * @see qode_framework_get_inline_style()
	 */
	function qode_framework_inline_style( $value ) {
		echo qode_framework_get_inline_style( $value );
	}
}

if ( ! function_exists( 'qode_framework_get_inline_style' ) ) {
	/**
	 * Function that generates style attribute and returns generated string
	 *
	 * @param $value string | array value of style attribute
	 *
	 * @return string generated style attribute
	 *
	 * @see qode_framework_get_inline_style()
	 */
	function qode_framework_get_inline_style( $value ) {
		return qode_framework_get_inline_attr( $value, 'style', ';' );
	}
}

if ( ! function_exists( 'qode_framework_class_attribute' ) ) {
	/**
	 * Function that echoes class attribute
	 *
	 * @param $value string|array value of class attribute
	 *
	 * @see qode_framework_get_class_attribute()
	 */
	function qode_framework_class_attribute( $value ) {
		echo qode_framework_get_class_attribute( $value );
	}
}

if ( ! function_exists( 'qode_framework_get_class_attribute' ) ) {
	/**
	 * Function that returns generated class attribute
	 *
	 * @param $value string|array value of class attribute
	 *
	 * @return string generated class attribute
	 *
	 * @see qode_framework_get_inline_attr()
	 */
	function qode_framework_get_class_attribute( $value ) {
		return qode_framework_get_inline_attr( $value, 'class', ' ' );
	}
}

if ( ! function_exists( 'qode_framework_get_inline_attr' ) ) {
	/**
	 * Function that generates html attribute
	 *
	 * @param $value string | array value of html attribute
	 * @param $attr string name of html attribute to generate
	 * @param $glue string glue with which to implode $attr. Used only when $attr is array
	 * @param $allow_zero_values boolean allow data to have zero value
	 *
	 * @return string generated html attribute
	 */
	function qode_framework_get_inline_attr( $value, $attr, $glue = '', $allow_zero_values = false ) {
		if ( $allow_zero_values ) {
			if ( $value !== '' ) {
				
				if ( is_array( $value ) && count( $value ) ) {
					$properties = implode( $glue, $value );
				} else {
					$properties = $value;
				}
				
				return $attr . '="' . esc_attr( $properties ) . '"';
			}
		} else {
			if ( ! empty( $value ) ) {
				
				if ( is_array( $value ) && count( $value ) ) {
					$properties = implode( $glue, $value );
				} elseif ( $value !== '' ) {
					$properties = $value;
				} else {
					return '';
				}
				
				return $attr . '="' . esc_attr( $properties ) . '"';
			}
		}
		
		return '';
	}
}

if ( ! function_exists( 'qode_framework_inline_attr' ) ) {
	/**
	 * Function that generates html attribute
	 *
	 * @param $value string | array value of html attribute
	 * @param $attr string name of html attribute to generate
	 * @param $glue string glue with which to implode $attr. Used only when $attr is array
	 *
	 */
	function qode_framework_inline_attr( $value, $attr, $glue = '' ) {
		echo qode_framework_get_inline_attr( $value, $attr, $glue );
	}
}

if ( ! function_exists( 'qode_framework_get_inline_attrs' ) ) {
	/**
	 * Generate multiple inline attributes
	 *
	 * @param $attrs array
	 * @param $allow_zero_values bool
	 *
	 * @return string
	 */
	function qode_framework_get_inline_attrs( $attrs, $allow_zero_values = false ) {
		$output = '';
		if ( is_array( $attrs ) && count( $attrs ) ) {
			if ( $allow_zero_values ) {
				foreach ( $attrs as $attr => $value ) {
					$output .= ' ' . qode_framework_get_inline_attr( $value, $attr, '', true );
				}
			} else {
				foreach ( $attrs as $attr => $value ) {
					$output .= ' ' . qode_framework_get_inline_attr( $value, $attr );
				}
			}
		}
		
		$output = ltrim( $output );
		
		return $output;
	}
}

if ( ! function_exists( 'qode_framework_inline_attrs' ) ) {
	/**
	 * Echo multiple inline attributes
	 *
	 * @param $attrs array
	 * @param $allow_zero_values bool
	 */
	function qode_framework_inline_attrs( $attrs, $allow_zero_values = false ) {
		echo qode_framework_get_inline_attrs( $attrs, $allow_zero_values );
	}
}

if ( ! function_exists( 'qode_framework_string_ends_with' ) ) {
	/**
	 * Checks if $haystack ends with $needle and returns proper bool value
	 *
	 * @param $haystack string to check
	 * @param $needle string on end to match
	 *
	 * @return bool
	 */
	function qode_framework_string_ends_with( $haystack, $needle ) {
		if ( $haystack !== '' && $needle !== '' ) {
			return ( substr( $haystack, - strlen( $needle ), strlen( $needle ) ) == $needle );
		}
		
		return false;
	}
}

if ( ! function_exists( 'qode_framework_string_ends_with_typography_units' ) ) {
	/**
	 * Checks if $haystack ends with predefined needles and returns proper bool value
	 *
	 * @param $haystack string to check
	 *
	 * @return bool
	 */
	function qode_framework_string_ends_with_typography_units( $haystack ) {
		$result  = false;
		$needles = array( 'px', 'em', 'rem' );
		
		if ( $haystack !== '' ) {
			foreach ( $needles as $needle ) {
				if ( qode_framework_string_ends_with( $haystack, $needle ) ) {
					$result = true;
				}
			}
		}
		
		return $result;
	}
}

if ( ! function_exists( 'qode_framework_string_ends_with_space_units' ) ) {
	/**
	 * Checks if $haystack ends with predefined needles and returns proper bool value
	 *
	 * @param $haystack string to check
	 * @param $additional_units bool add additional needles
	 *
	 * @return bool
	 */
	function qode_framework_string_ends_with_space_units( $haystack, $additional_units = false ) {
		$result  = false;
		$needles = array( 'px', '%' );
		
		if ( $additional_units ) {
			array_push( $needles, 'em', 'rem' );
		}
		
		if ( $haystack !== '' ) {
			foreach ( $needles as $needle ) {
				if ( qode_framework_string_ends_with( $haystack, $needle ) ) {
					$result = true;
				}
			}
		}
		
		return $result;
	}
}

if ( ! function_exists( 'qode_framework_filter_suffix' ) ) {
	/**
	 * Removes suffix from given value. Useful when you have to remove parts of user input, e.g px at the end of string
	 *
	 * @param $value
	 * @param $suffix
	 *
	 * @return string
	 */
	function qode_framework_filter_suffix( $value, $suffix ) {
		if ( $value !== '' && qode_framework_string_ends_with( $value, $suffix ) ) {
			$value = substr( $value, 0, strpos( $value, $suffix ) );
		}
		
		return $value;
	}
}

if ( ! function_exists( 'qode_framework_wp_kses_html' ) ) {
	/**
	 * Function that does escaping of specific html.
	 * It uses wp_kses function with predefined attributes array.
	 *
	 * @see wp_kses()
	 *
	 * @param $type string type of html element
	 * @param $content string string to escape
	 *
	 * @return string escaped output
	 */
	function qode_framework_wp_kses_html( $type, $content ) {
		switch ( $type ) {
			case 'img':
				$atts = apply_filters( 'qode_framework_filter_wp_kses_img_atts', array(
					'itemprop' => true,
					'id'       => true,
					'class'    => true,
					'width'    => true,
					'height'   => true,
					'src'      => true,
					'srcset'   => true,
					'sizes'    => true,
					'alt'      => true,
					'title'    => true
				) );
				break;
			default:
				return apply_filters( 'qode_framework_filter_wp_kses_custom', $content, $type );
		}
		
		return wp_kses( $content, array(
			$type => $atts
		) );
	}
}

if ( ! function_exists( 'qode_framework_dynamic_style' ) ) {
	/**
	 * Outputs css based on passed selectors and properties
	 *
	 * @param array|string $selector
	 * @param array        $properties
	 *
	 * @return string
	 */
	function qode_framework_dynamic_style( $selector, $properties ) {
		$output = '';
		//check if selector and rules are valid data
		if ( ! empty( $selector ) && ( is_array( $properties ) && count( $properties ) ) ) {
			
			if ( is_array( $selector ) && count( $selector ) ) {
				$output .= implode( ', ', $selector );
			} else {
				$output .= $selector;
			}
			
			$output .= ' { ';
			foreach ( $properties as $prop => $value ) {
				if ( $prop !== '' ) {
					$output .= $prop . ': ' . esc_attr( $value ) . ';';
				}
			}
			
			$output .= '}';
		}
		
		return $output;
	}
}

if ( ! function_exists( 'qode_framework_dynamic_style_responsive' ) ) {
	/**
	 * Outputs css based on passed selectors and properties
	 *
	 * @param array|string $selector
	 * @param array        $properties
	 * @param string       $min_width
	 * @param string       $max_width
	 *
	 * @return string
	 */
	function qode_framework_dynamic_style_responsive( $selector, $properties, $min_width = '', $max_width = '' ) {
		$output = '';
		//check if min width or max width is set
		if ( ! empty( $min_width ) || ! empty( $max_width ) ) {
			$output .= '@media only screen';
			
			if ( ! empty( $min_width ) ) {
				$output .= ' and (min-width: ' . $min_width . 'px)';
			}
			
			if ( ! empty( $max_width ) ) {
				$output .= ' and (max-width: ' . $max_width . 'px)';
			}
			
			$output .= ' { ';
			
			$output .= qode_framework_dynamic_style( $selector, $properties );
			
			$output .= '}';
		}
		
		return $output;
	}
}

if ( ! function_exists( 'qode_framework_is_installed' ) ) {
	/**
	 * Function check is some plugin/theme is installed
	 *
	 * @param string $plugin name
	 *
	 * @return bool
	 */
	function qode_framework_is_installed( $plugin ) {
		switch ( $plugin ):
			case 'gutenberg-page';
				$current_screen = function_exists( 'get_current_screen' ) ? get_current_screen() : array();
		
				return method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor();
				break;
			case 'gutenberg-editor':
				return class_exists( 'WP_Block_Type' );
				break;
			case 'wpbakery':
				return class_exists( 'WPBakeryVisualComposerAbstract' );
				break;
			case 'elementor':
				return defined('ELEMENTOR_VERSION');
				break;
			case 'revolution-slider':
				return class_exists( 'RevSliderFront' );
				break;
			case 'woocommerce':
				return class_exists( 'WooCommerce' );
				break;
			case 'contact_form_7':
				return defined( 'WPCF7_VERSION' );
				break;
			case 'wpml':
				return defined( 'ICL_SITEPRESS_VERSION' );
				break;
			default:
				return apply_filters( 'qode_framework_filter_is_plugin_installed', false, $plugin );
				break;
		
		endswitch;
	}
}

if ( ! function_exists( 'qode_framework_is_shortcode_on_page' ) ) {
	/**
	 * Function that checks does some shortcode appears in some field on page
	 *
	 * @param string $shortcode
	 * @param string $content . If content is empty, check current page content
	 *
	 * @return bool
	 */
	function qode_framework_is_shortcode_on_page( $shortcode, $content = '' ) {
		$is_shortcode_on_page = false;
		
		if ( $shortcode ) {
			
			if ( $content == '' ) {
				//get content from current page
				$page_id = qode_framework_get_page_id();
				if ( ! empty( $page_id ) ) {
					$current_post = get_post( $page_id );
					if ( is_object( $current_post ) && property_exists( $current_post, 'post_content' ) ) {
						$content = $current_post->post_content;
					}
				}
			}
			
			if ( has_shortcode( $content, $shortcode ) ) {
				$is_shortcode_on_page = true;
			}
		}
		
		return $is_shortcode_on_page;
	}
}

if ( ! function_exists( 'qode_framework_call_shortcode' ) ) {
	/**
	 * @param      $base - shortcode base
	 * @param      $params - shortcode parameters
	 * @param null $content - shortcode content
	 *
	 * @return mixed|string
	 */
	function qode_framework_call_shortcode( $base, $params, $content = null ) {
		global $shortcode_tags;
		
		if ( ! isset( $shortcode_tags[ $base ] ) ) {
			return false;
		}
		
		if ( is_array( $shortcode_tags[ $base ] ) ) {
			$shortcode = $shortcode_tags[ $base ];
			
			return call_user_func( array(
				$shortcode[0],
				$shortcode[1]
			), $params, $content, $base );
		}
		
		return call_user_func( $shortcode_tags[ $base ], $params, $content, $base );
	}
}

if ( ! function_exists( 'qode_framework_map_shortcode_fields' ) ) {
	/**
	 * @param $default_options - default supported options
	 * @param $params - params set
	 *
	 * @return array - formatted array with merge default and passed options
	 */
	function qode_framework_map_shortcode_fields( $default_options, $params ) {
		$atts = (array) $params;
		$out  = array();
		foreach ( $default_options as $name => $default ) {
			if ( array_key_exists( $name, $atts ) && ! empty( $atts[ $name ] ) ) {
				$out[ $name ] = $atts[ $name ];
			} else {
				$out[ $name ] = $default;
			}
		}
		
		return $out;
	}
}

if ( ! function_exists( 'qode_framework_get_ajax_status' ) ) {
	/**
	 * Function that return status from ajax functions
	 *
	 * @param $status string - success or error
	 * @param $message string - ajax message value
	 * @param $data string|array - returned value
	 * @param $redirect string - url address
	 */
	function qode_framework_get_ajax_status( $status, $message, $data = null, $redirect = '' ) {
		$response = array(
			'status'   => esc_attr( $status ),
			'message'  => esc_html( $message ),
			'data'     => $data,
			'redirect' => $redirect
		);
		
		$response = apply_filters( 'qode_framework_filter_ajax_status', $response );
		
		$output = json_encode( $response );
		
		exit( $output );
	}
}

if ( ! function_exists( 'qode_framework_get_widget_sidebars' ) ) {
	/**
	 * Returns array of widget areas which contains given widget
	 * based ond is_active_widget function
	 *
	 * @param $widget_id bool
	 *
	 * @return array
	 */
	function qode_framework_get_widget_sidebars( $widget_id = false ) {
		$widget_sidebars = array();
		
		$sidebars_widgets = wp_get_sidebars_widgets();
		
		if ( is_array( $sidebars_widgets ) ) {
			foreach ( $sidebars_widgets as $sidebar => $widgets ) {
				if ( 'wp_inactive_widgets' === $sidebar || 'orphaned_widgets' === substr( $sidebar, 0, 16 ) ) {
					continue;
				}
				
				if ( is_array( $widgets ) ) {
					foreach ( $widgets as $widget ) {
						if ( $widget_id && _get_widget_id_base( $widget ) == $widget_id ) {
							$widget_sidebars[] = $sidebar;
						}
					}
				}
			}
		}
		return $widget_sidebars;
	}
}

if ( ! function_exists( 'qode_framework_get_cpt_items' ) ) {
	/**
	 * Returns array of custom post items
	 *
	 * @param $cpt_slug string
	 * @param $args array
	 * @param $enable_default boolean - add first element empty for default value
	 *
	 * @return array
	 */
	function qode_framework_get_cpt_items( $cpt_slug, $args = array(), $enable_default = false ) {
		$options    = array();
		$query_args = array(
			'post_status'    => 'publish',
			'post_type'      => $cpt_slug,
			'posts_per_page' => '-1',
			'fields'         => 'ids'
		);
		
		if ( ! empty( $args ) ) {
			foreach ( $args as $key => $value ) {
				if ( ! empty( $value ) ) {
					$query_args[ $key ] = $value;
				}
			}
		}
		
		$cpt_items = new \WP_Query( $query_args );
		
		if ( $cpt_items->have_posts() ) {
			
			if ( $enable_default ) {
				$options[''] = esc_html__( 'Default', 'qode-framework' );
			}
			
			foreach ( $cpt_items->posts as $id ):
				$options[ $id ] = get_the_title( $id );
			endforeach;
		}
		
		wp_reset_postdata();
		
		return $options;
	}
}

if ( ! function_exists( 'qode_framework_get_pages' ) ) {
	/**
	 * Returns array of pages item
	 *
	 * @param $enable_default boolean - add first element empty for default value
	 * 
	 * @return array
	 */
	function qode_framework_get_pages( $enable_default = false ) {
		$options     = array();
		
		$pages = get_pages();
		if ( ! empty( $pages ) ) {
			
			if ( $enable_default ) {
				$options[''] = esc_html__( 'Default', 'qode-framework' );
			}
			
			foreach ( $pages as $page ) {
				$options[ $page->ID ] = $page->post_title;
			}
		}
		
		return $options;
	}
}