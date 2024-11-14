<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'message' => array(
		'label' => esc_html__( 'Message', 'pet-space' ),
		'desc'  => esc_html__( 'Notification message', 'pet-space' ),
		'type'  => 'text',
		'value' => esc_html__( 'Message!', 'pet-space' ),
	),
	'type'    => array(
		'label'   => esc_html__( 'Type', 'pet-space' ),
		'desc'    => esc_html__( 'Notification type', 'pet-space' ),
		'type'    => 'select',
		'choices' => array(
			'success' => esc_html__( 'Congratulations', 'pet-space' ),
			'info'    => esc_html__( 'Information', 'pet-space' ),
			'warning' => esc_html__( 'Alert', 'pet-space' ),
			'danger'  => esc_html__( 'Error', 'pet-space' ),
		)
	),
);