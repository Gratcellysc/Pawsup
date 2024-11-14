<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'label'       => array(
		'label' => esc_html__( 'Button Label', 'pet-space' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'pet-space' ),
		'type'  => 'text',
		'value' => 'Submit'
	),
	'link'        => array(
		'label' => esc_html__( 'Button Link', 'pet-space' ),
		'desc'  => esc_html__( 'Where should your button link to', 'pet-space' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target'      => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Open Link in New Window', 'pet-space' ),
		'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'pet-space' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => esc_html__( 'Yes', 'pet-space' ),
		),
		'left-choice'  => array(
			'value' => '_self',
			'label' => esc_html__( 'No', 'pet-space' ),
		),
	),
	'size'      => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Button size', 'pet-space' ),
		'desc'         => esc_html__( 'Select button size', 'pet-space' ),
		'value' => '',
		'right-choice' => array(
			'value' => '',
			'label' => esc_html__( 'Normal', 'pet-space' ),
		),
		'left-choice'  => array(
			'value' => 'wide_button',
			'label' => esc_html__( 'Large', 'pet-space' ),
		),
	),
	'type'       => array(
		'label'   => esc_html__( 'Button Type', 'pet-space' ),
		'desc'    => esc_html__( 'Choose a type for your button', 'pet-space' ),
		'type'    => 'select',
		'choices' => array(
			'theme_button'  => esc_html__( 'Color', 'pet-space' ),
			'simple_link'          => esc_html__( 'Just link', 'pet-space' ),
		)
	),
	'color'       => array(
		'label'   => esc_html__( 'Button Color', 'pet-space' ),
		'desc'    => esc_html__( 'Choose a type for your button', 'pet-space' ),
		'type'    => 'select',
		'choices' => array(
			'color1'  => esc_html__( 'Color 1', 'pet-space' ),
			'color2'  => esc_html__( 'Color 2', 'pet-space' ),
			'color3'  => esc_html__( 'Color 3', 'pet-space' ),
			'color4'  => esc_html__( 'Color 4', 'pet-space' ),
			'color5'  => esc_html__( 'Color 5', 'pet-space' ),
		)
	),
    'class'       => array(
        'label' => esc_html__( 'Additional Class', 'pet-space' ),
        'type'  => 'text',
        'value' => ''
    ),
);