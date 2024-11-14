<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'scroll_button_link'  => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Scroll button link', 'pet-space' ),
		'desc'  => esc_html__( 'Link for the button in bottom slider part', 'pet-space' ),
	),
    'slider_autoplay' => array(
        'type'         => 'switch',
        'label'        => esc_html__( 'Autoplay', 'pet-space' ),
        'value' => 'true',
        'left-choice'  => array(
            'value' => 'false',
            'label' => esc_html__( 'No', 'pet-space' ),
        ),
        'right-choice' => array(
            'value' => 'true',
            'label' => esc_html__( 'Yes', 'pet-space' ),
        ),
    ),
	'slider_mobile_overlap' => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Text over image on Mobile', 'pet-space' ),
		'desc'         => esc_html__( 'Force slider text to stay over image on small resolutions', 'pet-space' ),
		'value' => false,
		'left-choice'  => array(
			'value' => false,
			'label' => esc_html__( 'No', 'pet-space' ),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__( 'Yes', 'pet-space' ),
		),
	),
    'slider_dots' => array(
        'type'         => 'switch',
        'label'        => esc_html__( 'Dots show', 'pet-space' ),
        'value' => 'true',
        'left-choice'  => array(
            'value' => 'false',
            'label' => esc_html__( 'No', 'pet-space' ),
        ),
        'right-choice' => array(
            'value' => 'true',
            'label' => esc_html__( 'Yes', 'pet-space' ),
        ),
    ),
    'slider_center' => array(
        'type'         => 'switch',
        'label'        => esc_html__( 'Dots on center', 'pet-space' ),
        'value' => 'false',
        'left-choice'  => array(
            'value' => 'false',
            'label' => esc_html__( 'No', 'pet-space' ),
        ),
        'right-choice' => array(
            'value' => 'true',
            'label' => esc_html__( 'Yes', 'pet-space' ),
        ),
    ),
);