<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );

$options = array(
	'title'         => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title', 'pet-space' ),
		'desc'  => esc_html__( 'This can be left blank', 'pet-space' )
	),
	'message'       => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Content', 'pet-space' ),
		'desc'  => esc_html__( 'Enter some content for this Info Box', 'pet-space' )
	),
	'button' => array(
		'type'          => 'popup',
		'label'         => esc_html__( 'Button', 'pet-space' ),
		'popup-title'   => esc_html__( 'Edit Button', 'pet-space' ),
		'popup-options' => $button->get_options(),
	),
);