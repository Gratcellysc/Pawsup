<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(

	'title' => array(
		'type'       => 'text',
		'value'      => '',
		'label'      => esc_html__( 'Progress Bar title', 'pet-space' ),
	),
	'percent' => array(
		'type'       => 'slider',
		'value'      => 80,
		'properties' => array(
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		),
		'label'      => esc_html__( 'Count To', 'pet-space' ),
		'desc'       => esc_html__( 'Choose percent to count to', 'pet-space' ),
	),
	'background_class' => array(
		'type'    => 'select',
		'value'   => 'progress-bar-success',
		'label'   => esc_html__( 'Context background color', 'pet-space' ),
		'desc'    => esc_html__( 'Select one of predefined background colors', 'pet-space' ),
		'choices' => array(
			'progress-bar-success' => esc_html__( 'Success', 'pet-space' ),
			'progress-bar-info'    => esc_html__( 'Info', 'pet-space' ),
			'progress-bar-warning' => esc_html__( 'Warning', 'pet-space' ),
			'progress-bar-danger'  => esc_html__( 'Danger', 'pet-space' ),

		),
	),
);