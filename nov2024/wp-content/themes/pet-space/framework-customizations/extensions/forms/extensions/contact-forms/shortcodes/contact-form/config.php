<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'       => esc_html__( 'Contact form', 'pet-space' ),
	'description' => esc_html__( 'Build contact forms', 'pet-space' ),
	'tab'         => esc_html__( 'Content Elements', 'pet-space' ),
	'popup_size'  => 'large',
	'type'        => 'special'
);