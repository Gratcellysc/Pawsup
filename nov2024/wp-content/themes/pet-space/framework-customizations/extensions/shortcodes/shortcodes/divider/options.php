<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style' => array(
		'type'     => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker' => array(
			'ruler_type' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Ruler Type', 'pet-space' ),
				'desc'    => esc_html__( 'Here you can set the styling and size of the HR element', 'pet-space' ),
				'choices' => array(
					'line'  => esc_html__( 'Line', 'pet-space' ),
					'space' => esc_html__( 'Whitespace', 'pet-space' ),
				)
			)
		),
		'choices'     => array(
			'space' => array(
				'height' => array(
					'label' => esc_html__( 'Height', 'pet-space' ),
					'desc'  => esc_html__( 'How much whitespace do you need? Enter a pixel value. Positive value will increase the whitespace, negative value will reduce it. eg: \'50\', \'-25\', \'200\'', 'pet-space' ),
					'type'  => 'text',
					'value' => '50'
				)
			)
		)
	),
	'responsive'         => array(
		'attr'          => array( 'class' => 'fw-advanced-button' ),
		'type'          => 'popup',
		'label'         => esc_html__( 'Responsive visibility', 'pet-space' ),
		'button'        => esc_html__( 'Settings', 'pet-space' ),
		'size'          => 'medium',
		'popup-options' => array(
			'hidden_lg'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Large', 'pet-space' ),
						'desc'         => esc_html__( 'Display on large screen?', 'pet-space' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'pet-space' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'pet-space' ),
						)
					),
				),
			),
			'hidden_md'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Desktop', 'pet-space' ),
						'desc'         => esc_html__( 'Display on desktop?', 'pet-space' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'pet-space' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'pet-space' ),
						)
					),
				),
			),
			'hidden_sm'     => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Tablet', 'pet-space' ),
						'desc'         => esc_html__( 'Display on tablet?', 'pet-space' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'pet-space' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'pet-space' ),
						)
					),
				),
			),
			'hidden_xs' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'selected' => array(
						'type'         => 'switch',
						'value'        => 'yes',
						'label'        => esc_html__( 'Small devices', 'pet-space' ),
						'desc'         => esc_html__( 'Display on small devices?', 'pet-space' ),
						'left-choice'  => array(
							'value' => 'no',
							'label' => esc_html__( 'No', 'pet-space' ),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__( 'Yes', 'pet-space' ),
						)
					),
				),
				'choices' => array(),
			),
		),
	),
);
