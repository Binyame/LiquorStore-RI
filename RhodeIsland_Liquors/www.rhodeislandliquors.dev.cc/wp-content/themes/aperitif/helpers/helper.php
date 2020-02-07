<?php

if ( ! function_exists( 'aperitif_is_installed' ) ) {
	/**
	 * Function that checks if forward plugin installed
	 *
	 * @param $plugin string - plugin name
	 *
	 * @return bool
	 */
	function aperitif_is_installed( $plugin ) {
		
		switch ( $plugin ) {
			case 'framework';
				return class_exists( 'QodeFramework' );
				break;
			case 'core';
				return class_exists( 'AperitifCore' );
				break;
			case 'gutenberg-page';
				$current_screen = function_exists( 'get_current_screen' ) ? get_current_screen() : array();
				
				return method_exists( $current_screen, 'is_block_editor' ) && $current_screen->is_block_editor();
				break;
			case 'gutenberg-editor':
				return class_exists( 'WP_Block_Type' );
				break;
			default:
				return false;
		}
	}
}

if ( ! function_exists( 'aperitif_include_theme_is_installed' ) ) {
	/**
	 * Function that set case is installed element for framework functionality
	 *
	 * @param $installed bool
	 * @param $plugin string - plugin name
	 *
	 * @return bool
	 */
	function aperitif_include_theme_is_installed( $installed, $plugin ) {
		
		if ( $plugin === 'theme' ) {
			return class_exists( 'AperitifHandler' );
		}
		
		return $installed;
	}
	
	add_filter( 'qode_framework_filter_is_plugin_installed', 'aperitif_include_theme_is_installed', 10, 2 );
}

if ( ! function_exists( 'aperitif_template_part' ) ) {
	/**
	 * Function that echo module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 */
	function aperitif_template_part( $module, $template, $slug = '', $params = array() ) {
		echo aperitif_get_template_part( $module, $template, $slug, $params );
	}
}

if ( ! function_exists( 'aperitif_get_template_part' ) ) {
	/**
	 * Function that load module template part.
	 *
	 * @param string $module name of the module from inc folder
	 * @param string $template full path of the template to load
	 * @param string $slug
	 * @param array  $params array of parameters to pass to template
	 *
	 * @return string - string containing html of template
	 */
	function aperitif_get_template_part( $module, $template, $slug = '', $params = array() ) {
		//HTML Content from template
		$html          = '';
		$template_path = APERITIF_INC_ROOT_DIR . '/' . $module;
		
		$temp = $template_path . '/' . $template;
		if ( is_array( $params ) && count( $params ) ) {
			extract( $params );
		}
		
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
		
		if ( $template ) {
			ob_start();
			include( $template );
			$html = ob_get_clean();
		}
		
		return $html;
	}
}

if ( ! function_exists( 'aperitif_get_page_id' ) ) {
	/**
	 * Function that returns current page id
	 * Additional conditional is to check if current page is any wp archive page (archive, category, tag, date etc.) and returns -1
	 *
	 * @return int
	 */
	function aperitif_get_page_id() {
		$page_id = get_queried_object_id();
		
		if ( aperitif_is_wp_template() ) {
			$page_id = - 1;
		}
		
		return apply_filters( 'aperitif_filter_page_id', $page_id );
	}
}

if ( ! function_exists( 'aperitif_is_wp_template' ) ) {
	/**
	 * Function that checks if current page default wp page
	 *
	 * @return bool
	 */
	function aperitif_is_wp_template() {
		return is_archive() || is_search() || is_404() || ( is_front_page() && is_home() );
	}
}

if ( ! function_exists( 'aperitif_get_ajax_status' ) ) {
	/**
	 * Function that return status from ajax functions
	 *
	 * @param $status string - success or error
	 * @param $message string - ajax message value
	 * @param $data string|array - returned value
	 * @param $redirect string - url address
	 */
	function aperitif_get_ajax_status( $status, $message, $data = null, $redirect = '' ) {
		$response = array(
			'status'   => esc_attr( $status ),
			'message'  => esc_html( $message ),
			'data'     => $data,
			'redirect' => ! empty( $redirect ) ? esc_url( $redirect ) : ''
		);
		
		$output = json_encode( $response );
		
		exit( $output );
	}
}

if ( ! function_exists( 'aperitif_get_icon' ) ) {
	/**
	 * Function that return icon html
	 *
	 * @param $icon string - icon class name
	 * @param $icon_pack string - icon pack name
	 * @param $backup_text string - backup text label if framework is not installed
	 * @param $params array - icon parameters
	 *
	 * @return string|mixed
	 */
	function aperitif_get_icon( $icon, $icon_pack, $backup_text, $params = array() ) {
		$value = aperitif_is_installed( 'framework' ) && aperitif_is_installed( 'core' ) ? qode_framework_icons()->render_icon( $icon, $icon_pack, $params ) : esc_html( $backup_text );
		
		return $value;
	}
}

if ( ! function_exists( 'aperitif_render_icon' ) ) {
	/**
	 * Function that render icon html
	 *
	 * @param $icon string - icon class name
	 * @param $icon_pack string - icon pack name
	 * @param $backup_text string - backup text label if framework is not installed
	 * @param $params array - icon parameters
	 */
	function aperitif_render_icon( $icon, $icon_pack, $backup_text, $params = array() ) {
		echo aperitif_get_icon( $icon, $icon_pack, $backup_text, $params );
	}
}

if ( ! function_exists( 'aperitif_get_button_element' ) ) {
	/**
	 * Function that returns button with provided params
	 *
	 * @param $params array - array of parameters
	 *
	 * @return string - string representing button html
	 */
	function aperitif_get_button_element( $params ) {
		if ( class_exists( 'AperitifCoreButtonShortcode' ) ) {
			return AperitifCoreButtonShortcode::call_shortcode( $params );
		} else {
			$link   = isset( $params['link'] ) ? $params['link'] : '#';
			$target = isset( $params['target'] ) ? $params['target'] : '_self';
			$text   = isset( $params['text'] ) ? $params['text'] : '';
			
			return '<a itemprop="url" class="qodef-theme-button" href="' . esc_url( $link ) . '" target="' . esc_attr( $target ) . '">' . esc_html( $text ) . '</a>';
		}
	}
}

if ( ! function_exists( 'aperitif_render_button_element' ) ) {
	/**
	 * Function that render button with provided params
	 *
	 * @param $params array - array of parameters
	 */
	function aperitif_render_button_element( $params ) {
		echo aperitif_get_button_element( $params );
	}
}

if ( ! function_exists( 'aperitif_class_attribute' ) ) {
	/**
	 * Function that render class attribute
	 *
	 * @param $class string
	 */
	function aperitif_class_attribute( $class ) {
		echo aperitif_get_class_attribute( $class );
	}
}

if ( ! function_exists( 'aperitif_get_class_attribute' ) ) {
	/**
	 * Function that return class attribute
	 *
	 * @param $class string
	 *
	 * @return string|mixed
	 */
	function aperitif_get_class_attribute( $class ) {
		$value = aperitif_is_installed( 'framework' ) ? qode_framework_get_class_attribute( $class ) : '';
		
		return $value;
	}
}