<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'icon' => array(
		'type' => 'icon',
		'label' => esc_html__( 'Icon', 'pet-space' ),
	),
	'icon_color'          => array(
		'label'   => esc_html__( 'Icon Color', 'pet-space' ),
		'desc'    => esc_html__( 'Choose a color for your button', 'pet-space' ),
		'type'    => 'select',
		'choices' => array(
			'color1'  => esc_html__( 'Color 1', 'pet-space' ),
			'color2'  => esc_html__( 'Color 2', 'pet-space' ),
			'color3'  => esc_html__( 'Color 3', 'pet-space' ),
			'color4'  => esc_html__( 'Color 4', 'pet-space' ),
		),
	),
);