<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'social_icons' => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Social Buttons', 'pet-space' ),
		'desc'            => esc_html__( 'Optional social buttons', 'pet-space' ),
		'template'        => '{{=icon}}',
		'box-options'     => array(
			'icon'       => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Social Icon', 'pet-space' ),
				'set'   => 'social-icons',
			),
			'icon_class' => array(
				'type'        => 'select',
				'value'       => '',
				'label'       => esc_html__( 'Icon type', 'pet-space' ),
				'desc'        => esc_html__( 'Select one of predefined social button types', 'pet-space' ),
				'choices'     => array(
					''                                    => 'Default',
					'border-icon'                         => esc_html__( 'Simple Bordered Icon', 'pet-space' ),
					'border-icon rounded-icon'            => esc_html__( 'Rounded Bordered Icon', 'pet-space' ),
					'bg-icon'                             => esc_html__( 'Simple Background Icon', 'pet-space' ),
					'bg-icon rounded-icon'                => esc_html__( 'Rounded Background Icon', 'pet-space' ),
					'color-icon bg-icon'                  => esc_html__( 'Color Light Background Icon', 'pet-space' ),
					'color-icon bg-icon rounded-icon'     => esc_html__( 'Color Light Background Rounded Icon', 'pet-space' ),
					'color-icon'                          => esc_html__( 'Color Icon', 'pet-space' ),
					'color-icon border-icon'              => esc_html__( 'Color Bordered Icon', 'pet-space' ),
					'color-icon border-icon rounded-icon' => esc_html__( 'Rounded Color Bordered Icon', 'pet-space' ),
					'color-bg-icon'                       => esc_html__( 'Color Background Icon', 'pet-space' ),
					'color-bg-icon rounded-icon'          => esc_html__( 'Rounded Color Background Icon', 'pet-space' ),

				),
				/**
				 * Allow save not existing choices
				 * Useful when you use the select to populate it dynamically from js
				 */
				'no-validate' => false,
			),
			'icon_url'   => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Icon Link', 'pet-space' ),
				'desc'  => esc_html__( 'Provide a URL to your icon', 'pet-space' ),
			)
		),
		'limit'           => 0, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'pet-space' ),
		'sortable'        => true,
	)
);