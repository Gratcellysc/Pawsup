<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/** @internal */
if ( ! function_exists( 'pet_space_filter_disable_shortcodes' ) ) :
	function pet_space_filter_disable_shortcodes( $to_disable ) {
		$to_disable[] = 'icon_box';

		return $to_disable;
	}
endif;
add_filter( 'fw_ext_shortcodes_disable_shortcodes', 'pet_space_filter_disable_shortcodes' );