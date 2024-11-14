<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'text' => array(
		'type'   => 'wp-editor',
		'label'  => esc_html__( 'Content', 'pet-space' ),
		'desc'   => esc_html__( 'Enter some content for this texblock', 'pet-space' ),
		'reinit' => true,
		'teeny' => false,
	),
);
