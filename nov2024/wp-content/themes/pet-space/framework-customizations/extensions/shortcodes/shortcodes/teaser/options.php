<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$teaser_static_img = fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/teaser/static/img/';

//get button to add in a teaser:
$button         = fw_ext( 'shortcodes' )->get_shortcode( 'button' );
$button_options = $button->get_options();
unset( $button_options['link'] );
unset( $button_options['target'] );
$button_array = array(
	'button' => array(
		'type'    => 'multi-picker',
		'label'   => false,
		'desc'    => false,
		'value'   => false,
		'picker'  => array(
			'show_button' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Show teaser button', 'pet-space' ),
				'left-choice'  => array(
					'value' => '',
					'label' => esc_html__( 'No', 'pet-space' ),
				),
				'right-choice' => array(
					'value' => 'button',
					'label' => esc_html__( 'Yes', 'pet-space' ),
				),
			),
		),
		'choices' => array(
			''       => array(),
			'button' => $button_options,
		),
	)
);

$teaser_center_array = array(
	'teaser_center' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Center teaser contents', 'pet-space' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'pet-space' ),
		),
		'right-choice' => array(
			'value' => 'text-center',
			'label' => esc_html__( 'Yes', 'pet-space' ),
		),
	),
);

$icon_options = array(
	'type'    => 'group',
	'options' => array(
		'icon'       => array(
			'type'  => 'icon',
			'label' => esc_html__( 'Choose an Icon', 'pet-space' ),
			'set'   => 'rt-icons-2',
		),
		'icon_size'  => array(
			'type'    => 'select',
			'value'   => 'size_normal',
			'label'   => esc_html__( 'Icon Size', 'pet-space' ),
			'choices' => array(
				'size_small'  => esc_html__( 'Small', 'pet-space' ),
				'size_normal' => esc_html__( 'Normal', 'pet-space' ),
				'size_big'    => esc_html__( 'Big', 'pet-space' ),
			)
		),
		'icon_style' => array(
			'type'    => 'image-picker',
			'value'   => '',
			'label'   => esc_html__( 'Icon Style', 'pet-space' ),
			'desc'    => esc_html__( 'Select one of predefined icon styles. If not set - no icon will appear.', 'pet-space' ),
			'help'    => esc_html__( 'If not set - no icon will appear.', 'pet-space' ),
			'choices' => array(
				''                    => $teaser_static_img . 'icon_teaser_00.png',
				'default_icon'        => $teaser_static_img . 'icon_teaser_01.png',
				'border_icon round'   => $teaser_static_img . 'icon_teaser_02.png',
				'bg_color round' => $teaser_static_img . 'icon_teaser_03.png',
			),

			'blank' => false, // (optional) if true, images can be deselected
		),
		'icon_color'     => array(
			'type'    => 'select',
			'value'   => '',
			'label'   => esc_html__( 'Icon color', 'pet-space' ),
			'desc'    => esc_html__( 'Select a color for your icon', 'pet-space' ),
			'choices' => array(
				''           => 'Inherited',
				'color_1'  => esc_html__( 'First main color', 'pet-space' ),
				'color_2' => esc_html__( 'Second main color', 'pet-space' ),
				'color_3' => esc_html__( 'Third main color', 'pet-space' ),
				'color_4' => esc_html__( 'Fourth main color', 'pet-space' ),
				'color_dark'      => esc_html__( 'Dark color', 'pet-space' ),
				'color_light'      => esc_html__( 'Light color', 'pet-space' ),
			),
		),
	),
);

$image_options = array(
	'type'        => 'upload',
	'value'       => '',
	'label'       => esc_html__( 'Teaser Image', 'pet-space' ),
	'image'       => esc_html__( 'Image for your teaser.', 'pet-space' ),
	'help'        => 'Image for your teaser. Image can appear as an element, or background or even can be hidden depends from chosen teaser type',
	'images_only' => true,
);

$option_teaser_icon = array(
	'icon_options' => $icon_options,
);

$option_teaser_image = array(
	'teaser_image' => $image_options,
);

$option_teaser_square = array(
	'teaser_image' => $image_options,
	'icon'         => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Choose an Icon', 'pet-space' ),
		'set'   => 'rt-icons-2',
	),
);

$option_teaser_counter = array(
	'icon_options'    => $icon_options,
	'counter_options' => array(
		'type'    => 'group',
		'options' => array(

			'number'                  => array(
				'type'  => 'text',
				'value' => 10,
				'label' => esc_html__( 'Count To Number', 'pet-space' ),
				'desc'  => esc_html__( 'Choose value to count to', 'pet-space' ),
			),
			'counter_additional_text' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Add some text after counter', 'pet-space' ),
				'desc'  => esc_html__( 'You can add "+", "%", decimal values etc.', 'pet-space' ),
			),
			'speed'                   => array(
				'type'       => 'slider',
				'value'      => 1000,
				'properties' => array(
					'min'  => 500,
					'max'  => 5000,
					'step' => 100,
				),
				'label'      => esc_html__( 'Counter Speed (counter teaser only)', 'pet-space' ),
				'desc'       => esc_html__( 'Choose counter speed (in milliseconds)', 'pet-space' ),
			),
		),
	),
);

$options = array(
	'title'        => array(
		'type'  => 'text',
		'label' => esc_html__( 'Teaser Title', 'pet-space' ),
	),
	'link'         => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Teaser link', 'pet-space' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'pet-space' ),
	),
	'teaser_types' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'teaser_type' => array(
				'type'    => 'image-picker',
				'value'   => 'icon_top',
				'label'   => esc_html__( 'Teaser Type', 'pet-space' ),
				'desc'    => esc_html__( 'Select one of predefined teaser types', 'pet-space' ),
				'choices' => array(
					'icon_top'       => $teaser_static_img . 'icon_top.png',
					'icon_left'      => $teaser_static_img . 'icon_left.png',
					'icon_right'     => $teaser_static_img . 'icon_right.png',
					'image_top'      => $teaser_static_img . 'image_top.png',
					'image_left'     => $teaser_static_img . 'image_left.png',
					'image_right'    => $teaser_static_img . 'image_right.png',
					'icon_image_bg'  => $teaser_static_img . 'icon_image_bg.png',
					'counter'        => $teaser_static_img . 'icon_counter.png',

				),
				'blank'   => false, // (optional) if true, images can be deselected
			),

		),
		'choices'      => array(
			'icon_top'      => array_merge( $option_teaser_icon, $teaser_center_array, $button_array ),
			'icon_left'     => $option_teaser_icon,
			'icon_right'    => $option_teaser_icon,
			'image_top'     => array_merge( $option_teaser_image, $teaser_center_array, $button_array ),
			'image_left'    => $option_teaser_image,
			'image_right'   => $option_teaser_image,
			'icon_image_bg' => $option_teaser_square,
			'counter'       => $option_teaser_counter
		),
		'show_borders' => true,
	),
	'teaser_style' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Teaser Box Style', 'pet-space' ),
		'choices' => array(
			''                             => esc_html__( 'Default (no border or background)', 'pet-space' ),
			'with_padding with_border rounded'     => esc_html__( 'Bordered', 'pet-space' ),
			'with_padding with_background rounded' => esc_html__( 'Muted Background', 'pet-space' ),
			'with_padding with_background ls rounded'              => esc_html__( 'Light background', 'pet-space' ),
			'with_padding with_background ls ms rounded'           => esc_html__( 'Grey background', 'pet-space' ),
			'with_padding with_background ds rounded'              => esc_html__( 'Dark background', 'pet-space' ),
			'with_padding with_background ds ms rounded'           => esc_html__( 'Darkgrey background', 'pet-space' ),
			'with_padding with_background cs rounded'              => esc_html__( 'Main color background', 'pet-space' ),
		)
	),
	'content'      => array(
		'type'  => 'textarea',
		'label' => esc_html__( 'Teaser text', 'pet-space' ),
		'desc'  => esc_html__( 'Enter desired teaser content', 'pet-space' ),
	),

	'title_tag' => array(
		'type'    => 'select',
		'value'   => 'h3',
		'label'   => esc_html__( 'Title Tag', 'pet-space' ),
		'choices' => array(
			'h2' => esc_html__( 'H2', 'pet-space' ),
			'h3' => esc_html__( 'H3', 'pet-space' ),
			'h4' => esc_html__( 'H4', 'pet-space' ),
			'h5' => esc_html__( 'H5', 'pet-space' ),
		)
	),
);