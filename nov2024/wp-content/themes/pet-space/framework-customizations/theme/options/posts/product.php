<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'product-featured-video-section' => array(
		'title'   => esc_html__( 'Product Featured Video', 'pet-space' ),
		'type'    => 'box',
		'context' => 'side',

		'options' => array(
			'product-featured-video' => array(
				'type'    => 'oembed',
				'value'   => '',
				'label'   => esc_html__( 'Featured Video', 'pet-space' ),
				'desc'    => esc_html__( 'Adds featured video embed only', 'pet-space' ),
				'preview' => array(
					'width'      => 278, // optional, if you want to set the fixed width to iframe
					'height'     => 185, // optional, if you want to set the fixed height to iframe
					/**
					 * if is set to false it will force to fit the dimensions,
					 * because some widgets return iframe with aspect ratio and ignore applied dimensions
					 */
					'keep_ratio' => true
				),
			),
		),
	),
    'product-featured-badge-section' => array(
        'title'   => esc_html__( 'Product Featured Badge', 'pet-space' ),
        'type'    => 'box',
        'context' => 'side',

        'options' => array(
            'product-featured-badge'    => array(
                'type'    => 'select',
                'value'   => '',
                'label'   => esc_html__( 'Form Background color', 'pet-space' ),
                'desc'    => esc_html__( 'Select background color', 'pet-space' ),
                'help'    => esc_html__( 'Select one of predefined background colors', 'pet-space' ),
                'choices' => array(
                    ''  => esc_html__( 'None', 'pet-space' ),
                    'new'  => esc_html__( 'New', 'pet-space' ),
                    'hot'  => esc_html__( 'Hot', 'pet-space' ),
                ),
            ),
        ),
    ),
);
