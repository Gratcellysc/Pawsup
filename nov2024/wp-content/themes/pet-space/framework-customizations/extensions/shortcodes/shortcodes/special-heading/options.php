<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'heading_align' => array(
		'type'    => 'select',
		'value'   => 'text-left',
		'label'   => esc_html__( 'Text alignment', 'pet-space' ),
		'desc'    => esc_html__( 'Select heading text alignment', 'pet-space' ),
		'choices' => array(
			'text-left'   => esc_html__( 'Left', 'pet-space' ),
			'text-center' => esc_html__( 'Center', 'pet-space' ),
			'text-right'  => esc_html__( 'Right', 'pet-space' ),
		),
	),
	'headings'      => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Headings', 'pet-space' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'pet-space' ),
		'box-options' => array(
			'heading_tag'            => array(
				'type'    => 'select',
				'value'   => 'h3',
				'label'   => esc_html__( 'Heading tag', 'pet-space' ),
				'desc'    => esc_html__( 'Select a tag for your ', 'pet-space' ),
				'choices' => array(
					'h3' => esc_html__( 'H3 tag', 'pet-space' ),
					'h2' => esc_html__( 'H2 tag', 'pet-space' ),
					'h4' => esc_html__( 'H4 tag', 'pet-space' ),
					'h5' => esc_html__( 'H5 tag', 'pet-space' ),
					'h6' => esc_html__( 'H6 tag', 'pet-space' ),
					'p'  => esc_html__( 'P tag', 'pet-space' ),

				),
			),
			'heading_text'           => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Heading text', 'pet-space' ),
				'desc'  => esc_html__( 'Text to appear in slide layer', 'pet-space' ),
			),
			'heading_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text color', 'pet-space' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'pet-space' ),
				'choices' => array(
					''           => 'Inherited',
					'highlight'  => esc_html__( 'First main color', 'pet-space' ),
					'highlight2' => esc_html__( 'Second main color', 'pet-space' ),
					'grey'       => esc_html__( 'Dark grey color', 'pet-space' ),
					'black'      => esc_html__( 'Dark color', 'pet-space' ),
					'lightfont'      => esc_html__( 'Light grey color', 'pet-space' ),
				),
			),
			'heading_text_weight'    => array(
				'type'    => 'select',
				'value'   => 'regular',
				'label'   => esc_html__( 'Heading text weight', 'pet-space' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'pet-space' ),
				'choices' => array(
					'regular'     => 'Normal',
					'bold' => esc_html__( 'Bold', 'pet-space' ),
					'thin' => esc_html__( 'Thin', 'pet-space' ),

				),
			),
			'heading_text_transform' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading text transform', 'pet-space' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'pet-space' ),
				'choices' => array(
					''                => 'None',
					'text-lowercase'  => esc_html__( 'Lowercase', 'pet-space' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'pet-space' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'pet-space' ),
				),
			),
			'heading_letter_spacing' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Heading letter spacing', 'pet-space' ),
				'desc'    => esc_html__( 'Select a letter spacing for your text in layer', 'pet-space' ),
				'choices' => array(
					''                => 'None',
					'spacing-text-small'  => esc_html__( 'Small', 'pet-space' ),
					'spacing-text-large'  => esc_html__( 'Large', 'pet-space' ),
				),
			),
			'heading_custom_class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Heading custom class', 'pet-space' ),
				'desc'  => esc_html__( 'Add heading custom css class', 'pet-space' ),
			),
		),
		'template'    => '{{- heading_text }}',
	)
);
