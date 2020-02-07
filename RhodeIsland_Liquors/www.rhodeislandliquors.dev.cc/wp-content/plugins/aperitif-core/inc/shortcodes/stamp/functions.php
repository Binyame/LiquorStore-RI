<?php

if ( ! function_exists( 'aperitif_str_split_unicode' ) ) {
	function aperitif_str_split_unicode( $str ) {
		return preg_split( '~~u', $str, - 1, PREG_SPLIT_NO_EMPTY );
	}
}

if ( ! function_exists( 'aperitif_get_split_text' ) ) {
	function aperitif_get_split_text( $text ) {
		if ( ! empty( $text ) ) {
			$split_text = aperitif_str_split_unicode( $text );
			
			foreach ( $split_text as $key => $value ) {
				$split_text[ $key ] = '<span class="qodef-e-character">' . $value . '</span>';
			}
			
			return implode( ' ', $split_text );
		}
		
		return $text;
	}
}
if ( ! function_exists( 'aperitif_filter_suffix' ) ) {
	/**
	 * Removes suffix from given value. Useful when you have to remove parts of user input, e.g px at the end of string
	 *
	 * @param $value
	 * @param $suffix
	 *
	 * @return string
	 */
	function aperitif_filter_suffix( $value, $suffix ) {
		if ( $value !== '' && aperitif_string_ends_with( $value, $suffix ) ) {
			$value = substr( $value, 0, strpos( $value, $suffix ) );
		}
		
		return $value;
	}
}

if ( ! function_exists( 'aperitif_filter_px' ) ) {
	/**
	 * Removes px in provided value if value ends with px
	 *
	 * @param $value
	 *
	 * @return string
	 *
	 * @see aperitif_filter_suffix
	 */
	function aperitif_filter_px( $value ) {
		return aperitif_filter_suffix( $value, 'px' );
	}
}
if ( ! function_exists( 'aperitif_string_ends_with' ) ) {
	/**
	 * Checks if $haystack ends with $needle and returns proper bool value
	 *
	 * @param $haystack string to check
	 * @param $needle string with which $haystack needs to end
	 *
	 * @return bool
	 */
	function aperitif_string_ends_with( $haystack, $needle ) {
		if ( $haystack !== '' && $needle !== '' ) {
			return ( substr( $haystack, - strlen( $needle ), strlen( $needle ) ) == $needle );
		}
		
		return true;
	}
}