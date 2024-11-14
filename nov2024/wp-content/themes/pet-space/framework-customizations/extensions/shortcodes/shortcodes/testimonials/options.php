<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title'              => array(
		'label' => esc_html__( 'Title', 'pet-space' ),
		'desc'  => esc_html__( 'Optional Testimonials Title', 'pet-space' ),
		'type'  => 'text',
	),
	'testimonials_group' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'picker'  => array(
			'testimonials_layout' => array(
				'type'    => 'select',
				'value'   => 'testimonials_carousel',
				'label'   => esc_html__( 'Testimonials Layout', 'pet-space' ),
				'desc'    => esc_html__( 'Select one of predefined testimonials layout', 'pet-space' ),
				'choices' => array(
					'testimonials_carousel'         => esc_html__( 'Testimonials Carousel', 'pet-space' ),
					'testimonials_grid' => esc_html__( 'Testimonials Grid', 'pet-space' ),
				),
			),
		),
		'choices' => array(
			'testimonials_carousel'         => array(
				'testimonials' => array(
					'label'         => esc_html__( 'Testimonials', 'pet-space' ),
					'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'pet-space' ),
					'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'pet-space' ),
					'type'          => 'addable-popup',
					'template'      => '{{=author_name}}',
					'popup-options' => array(
						'author_avatar' => array(
							'label' => esc_html__( 'Image', 'pet-space' ),
							'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'pet-space' ),
							'type'  => 'upload',
						),
						'author_name'   => array(
							'label' => esc_html__( 'Name', 'pet-space' ),
							'desc'  => esc_html__( 'Enter the Name of the Person to quote', 'pet-space' ),
							'type'  => 'text'
						),
						'author_job'    => array(
							'label' => esc_html__( 'Position', 'pet-space' ),
							'desc'  => esc_html__( 'Can be used for a job description', 'pet-space' ),
							'type'  => 'text'
						),
						'site_name'     => array(
							'label' => esc_html__( 'Website Name', 'pet-space' ),
							'desc'  => esc_html__( 'Linktext for the above Link', 'pet-space' ),
							'type'  => 'text'
						),
						'site_url'      => array(
							'label' => esc_html__( 'Website Link', 'pet-space' ),
							'desc'  => esc_html__( 'Link to the Persons website', 'pet-space' ),
							'type'  => 'text'
						),
						'content'       => array(
							'label' => esc_html__( 'Quote', 'pet-space' ),
							'desc'  => esc_html__( 'Enter the testimonial here', 'pet-space' ),
							'type'  => 'textarea',
						),
                        'use_quotes'         => array(
                            'label' => esc_html__( 'Draw Quotes', 'pet-space' ),
                            'desc'  => esc_html__( 'Draw quote symbols on testimonial sides', 'pet-space' ),
                            'type'  => 'switch',
                            'value'  => true,
                        ),
					)
				),
			),
			'testimonials_grid'         => array(
				'testimonials' => array(
					'label'         => esc_html__( 'Testimonials', 'pet-space' ),
					'popup-title'   => esc_html__( 'Add/Edit Testimonial', 'pet-space' ),
					'desc'          => esc_html__( 'Here you can add, remove and edit your Testimonials.', 'pet-space' ),
					'type'          => 'addable-popup',
					'template'      => '{{=author_name}}',
					'popup-options' => array(
						'author_avatar' => array(
							'label' => esc_html__( 'Image', 'pet-space' ),
							'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'pet-space' ),
							'type'  => 'upload',
						),
						'author_name'   => array(
							'label' => esc_html__( 'Name', 'pet-space' ),
							'desc'  => esc_html__( 'Enter the Name of the Person to quote', 'pet-space' ),
							'type'  => 'text'
						),
						'author_job'    => array(
							'label' => esc_html__( 'Position', 'pet-space' ),
							'desc'  => esc_html__( 'Can be used for a job description', 'pet-space' ),
							'type'  => 'text'
						),
						'site_name'     => array(
							'label' => esc_html__( 'Website Name', 'pet-space' ),
							'desc'  => esc_html__( 'Linktext for the above Link', 'pet-space' ),
							'type'  => 'text'
						),
						'site_url'      => array(
							'label' => esc_html__( 'Website Link', 'pet-space' ),
							'desc'  => esc_html__( 'Link to the Persons website', 'pet-space' ),
							'type'  => 'text'
						),
						'content'       => array(
							'label' => esc_html__( 'Quote', 'pet-space' ),
							'desc'  => esc_html__( 'Enter the testimonial here', 'pet-space' ),
							'type'  => 'textarea',
						),
                        'use_quotes'         => array(
                            'label' => esc_html__( 'Draw Quotes', 'pet-space' ),
                            'desc'  => esc_html__( 'Draw quote symbols on testimonial sides', 'pet-space' ),
                            'type'  => 'switch',
                            'value'  => true,
                        ),
					)
				),
			),
		),
	),
);