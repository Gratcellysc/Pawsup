<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array(
	'page_builder' => array(
		'title'       => esc_html__( 'Shortcode block', 'pet-space' ),
		'description' => esc_html__( 'Block for show shortcode', 'pet-space' ),
		'tab'         => esc_html__( 'Content Elements', 'pet-space' ),
	)
);