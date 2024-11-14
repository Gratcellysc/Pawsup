<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Image', 'pet-space' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'pet-space' )
	),
	'size'             => array(
		'type'    => 'group',
		'options' => array(
			'width'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Width', 'pet-space' ),
				'desc'  => esc_html__( 'Set image width', 'pet-space' ),
				'value' => 300
			),
			'height' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Height', 'pet-space' ),
				'desc'  => esc_html__( 'Set image height', 'pet-space' ),
				'value' => 200
			)
		)
	),
	'image-link-group' => array(
		'type'    => 'group',
		'options' => array(
			'link'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Image Link', 'pet-space' ),
				'desc'  => esc_html__( 'Where should your image link to?', 'pet-space' )
			),
			'target' => array(
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

