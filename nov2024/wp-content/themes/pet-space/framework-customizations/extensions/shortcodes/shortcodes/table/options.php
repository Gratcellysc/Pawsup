<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'table'      => array(
		'type'  => 'table',
		'label' => false,
		'desc'  => false,
	),
	'table_type' => array(
		'type'    => 'select',
		'value'   => 'table',
		'label'   => esc_html__( 'Tabular table style', 'pet-space' ),
		'choices' => array(
			'table'                => esc_html__( 'Bootstrap Default', 'pet-space' ),
			'table table-striped'  => esc_html__( 'Bootstrap Striped', 'pet-space' ),
			'table table-bordered' => esc_html__( 'Bootstrap Bordered', 'pet-space' ),
			'table_template grey'  => esc_html__( 'Theme style', 'pet-space' ),

		),
	),
);