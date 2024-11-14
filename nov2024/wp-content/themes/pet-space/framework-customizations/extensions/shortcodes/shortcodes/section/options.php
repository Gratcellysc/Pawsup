<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tab_main_options'          => array(
		'type'    => 'tab',
		'title'   => esc_html__( 'Main Options', 'pet-space' ),
		'options' => array(
			'section_name' => array(
				'label' => esc_html__( 'Section Name', 'pet-space' ),
				'desc'  => esc_html__( 'Enter a name (it is for internal use and will not appear on the front end)', 'pet-space' ),
				'help'  => esc_html__( 'Use this option to name your sections. It will help you go through the structure a lot easier.', 'pet-space' ),
				'type'  => 'text',
			),
			'is_fullwidth' => array(
				'label' => esc_html__( 'Full Width', 'pet-space' ),
				'type'  => 'switch',
			),
			'horizontal_paddings' => array(
				'type'         => 'switch',
				'value'        => '',
				'label'        => esc_html__( 'Disable horizontal paddings', 'pet-space' ),
				'desc'         => esc_html__( 'Disable section horizontal paddings', 'pet-space' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'pet-space' ),
				),
				'right-choice' => array(
					'value' => 'horizontal-paddings-0',
					'label' => esc_html__( 'Yes', 'pet-space' ),
				)
			),
			'background_color' => array(
				'type'    => 'select',
				'value'   => 'ls',
				'label'   => esc_html__( 'Background color', 'pet-space' ),
				'desc'    => esc_html__( 'Select background color', 'pet-space' ),
				'help'    => esc_html__( 'Select one of predefined background colors', 'pet-space' ),
				'choices' => array(
					'ls'             => esc_html__( 'Light', 'pet-space' ),
					'ls ms'          => esc_html__( 'Light Grey', 'pet-space' ),
					'ds ms'          => esc_html__( 'Dark Grey', 'pet-space' ),
					'ds'             => esc_html__( 'Dark', 'pet-space' ),
					'cs'             => esc_html__( 'Main color', 'pet-space' ),
					'cs main_color2' => esc_html__( 'Second Main color', 'pet-space' ),
					'cs main_color3' => esc_html__( 'Third Main color', 'pet-space' ),
				),
			),
			'top_padding'      => array(
				'type'    => 'select',
				'value'   => 'section_padding_top_50',
				'label'   => esc_html__( 'Top padding', 'pet-space' ),
				'desc'    => esc_html__( 'Choose top padding value', 'pet-space' ),
				'choices' => array(
					'section_padding_top_0'   => esc_html__( '0', 'pet-space' ),
					'section_padding_top_5'   => esc_html__( '5 px', 'pet-space' ),
					'section_padding_top_15'  => esc_html__( '15 px', 'pet-space' ),
					'section_padding_top_25'  => esc_html__( '25 px', 'pet-space' ),
					'section_padding_top_30'  => esc_html__( '30 px', 'pet-space' ),
					'section_padding_top_40'  => esc_html__( '40 px', 'pet-space' ),
					'section_padding_top_50'  => esc_html__( '50 px', 'pet-space' ),
					'section_padding_top_65'  => esc_html__( '65 px', 'pet-space' ),
					'section_padding_top_75'  => esc_html__( '75 px', 'pet-space' ),
					'section_padding_top_100' => esc_html__( '100 px', 'pet-space' ),
					'section_padding_top_130' => esc_html__( '130 px', 'pet-space' ),
					'section_padding_top_150' => esc_html__( '150 px', 'pet-space' ),
				),
			),
			'bottom_padding'   => array(
				'type'    => 'select',
				'value'   => 'section_padding_bottom_50',
				'label'   => esc_html__( 'Bottom padding', 'pet-space' ),
				'desc'    => esc_html__( 'Choose bottom padding value', 'pet-space' ),
				'choices' => array(
					'section_padding_bottom_0'   => esc_html__( '0', 'pet-space' ),
					'section_padding_bottom_5'   => esc_html__( '5 px', 'pet-space' ),
					'section_padding_bottom_15'  => esc_html__( '15 px', 'pet-space' ),
					'section_padding_bottom_25'  => esc_html__( '25 px', 'pet-space' ),
					'section_padding_bottom_30'  => esc_html__( '30 px', 'pet-space' ),
					'section_padding_bottom_40'  => esc_html__( '40 px', 'pet-space' ),
					'section_padding_bottom_50'  => esc_html__( '50 px', 'pet-space' ),
					'section_padding_bottom_65'  => esc_html__( '65 px', 'pet-space' ),
					'section_padding_bottom_75'  => esc_html__( '75 px', 'pet-space' ),
					'section_padding_bottom_100' => esc_html__( '100 px', 'pet-space' ),
					'section_padding_bottom_130' => esc_html__( '130 px', 'pet-space' ),
					'section_padding_bottom_150' => esc_html__( '150 px', 'pet-space' ),
				),
			),
			'columns_padding'  => array(
				'type'    => 'select',
				'value'   => 'columns_padding_15',
				'label'   => esc_html__( 'Column paddings', 'pet-space' ),
				'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'pet-space' ),
				'choices' => array(
					'columns_padding_0'  => esc_html__( '0', 'pet-space' ),
					'columns_padding_1'  => esc_html__( '1 px', 'pet-space' ),
					'columns_padding_2'  => esc_html__( '2 px', 'pet-space' ),
					'columns_padding_5'  => esc_html__( '5 px', 'pet-space' ),
					'columns_padding_15' => esc_html__( '15 px - default', 'pet-space' ),
					'columns_padding_25' => esc_html__( '25 px', 'pet-space' ),
					'columns_padding_80' => esc_html__( '80 px - extra large', 'pet-space' ),
				),
			),
			'background_image' => array(
				'label'   => esc_html__( 'Background Image', 'pet-space' ),
				'desc'    => esc_html__( 'Please select the background image', 'pet-space' ),
				'type'    => 'background-image',
				'choices' => array(//	in future may will set predefined images
				)
			),
			'background_cover' => array(
				'label' => esc_html__( 'Background Cover', 'pet-space' ),
				'type'  => 'switch',
			),
			'parallax'         => array(
				'label' => esc_html__( 'Parallax', 'pet-space' ),
				'type'  => 'switch',
			),
			'section_overlay'  => array(
				'label' => esc_html__( 'Section overlay', 'pet-space' ),
				'type'  => 'switch',
			),
			'is_table'         => array(
				'label' => esc_html__( 'Vertical align content', 'pet-space' ),
				'desc'  => esc_html__( 'Align columns content vertically on wide screens', 'pet-space' ),
				'type'  => 'switch',
			),
			'section_id'       => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'ID attribute', 'pet-space' ),
				'desc'  => esc_html__( 'Add ID attribute to section. Useful for single page menu', 'pet-space' ),
			),
			'custom_class'     => array(
				'label' => esc_html__( 'Custom Class', 'pet-space' ),
				'desc'  => esc_html__( 'Add custom class for section', 'pet-space' ),
				'type'  => 'text',
			),
		),
	),
	'tab_onehalf_media_options' => array(
		'type'    => 'tab',
		'title'   => esc_html__( 'One half width Media', 'pet-space' ),
		'options' => array(
			'enable_onehalf_media' => array(
				'type'         => 'switch',
				'value'        => '',
				'label'        => esc_html__( 'Enable onehalf media', 'pet-space' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'pet-space' ),
				),
				'right-choice' => array(
					'value' => 'half_section',
					'label' => esc_html__( 'Yes', 'pet-space' ),
				)
			),
			'side_media_image'    => array(
				'type'        => 'upload',
				'value'       => array(),
				'label'       => esc_html__( 'Side media image', 'pet-space' ),
				'desc'        => esc_html__( 'Select image that you want to appear as one half side image', 'pet-space' ),
				'images_only' => true,
			),
			'side_media_link'     => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Link to your side media', 'pet-space' ),
				'desc'  => esc_html__( 'You can add a link to your side media. If YouTube link will be provided, video will play in LightBox', 'pet-space' ),
			),
			'side_media_video'    => array(
				'type'    => 'oembed',
				'value'   => '',
				'label'   => esc_html__( 'Video', 'pet-space' ),
				'desc'    => esc_html__( 'Adds video player', 'pet-space' ),
				'help'    => esc_html__( 'Leave blank if no needed', 'pet-space' ),
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
			'side_media_position' => array(
				'type'         => 'switch',
				'value'        => 'image_cover_left',
				'label'        => esc_html__( 'Media position', 'pet-space' ),
				'desc'         => esc_html__( 'Left or right media position', 'pet-space' ),
				'left-choice'  => array(
					'value' => 'image_cover_left',
					'label' => esc_html__( 'Left', 'pet-space' ),
				),
				'right-choice' => array(
					'value' => 'image_cover_right',
					'label' => esc_html__( 'Right', 'pet-space' ),
				),
			),
		),
	),
);
