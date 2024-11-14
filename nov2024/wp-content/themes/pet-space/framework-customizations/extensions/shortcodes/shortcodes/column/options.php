<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'column_align'     => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Text alignment in column', 'pet-space' ),
		'desc'    => esc_html__( 'Select text alignment inside your column', 'pet-space' ),
		'choices' => array(
			''            => esc_html__( 'Inherit', 'pet-space' ),
			'text-left'   => esc_html__( 'Left', 'pet-space' ),
			'text-center' => esc_html__( 'Center', 'pet-space' ),
			'text-right'  => esc_html__( 'Right', 'pet-space' ),
		),
	),
	'column_padding'   => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Column padding', 'pet-space' ),
		'desc'    => esc_html__( 'Select optional internal column paddings', 'pet-space' ),
		'choices' => array(
			''           => esc_html__( 'No padding', 'pet-space' ),
			'padding_10' => esc_html__( '10px', 'pet-space' ),
			'padding_20' => esc_html__( '20px', 'pet-space' ),
			'padding_30' => esc_html__( '30px', 'pet-space' ),
			'padding_40' => esc_html__( '40px', 'pet-space' ),

		),
	),
	'background_color' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Background color', 'pet-space' ),
		'desc'    => esc_html__( 'Select background color', 'pet-space' ),
		'help'    => esc_html__( 'Select one of predefined background colors', 'pet-space' ),
		'choices' => array(
			''               => esc_html__( 'Transparent (No Background)', 'pet-space' ),
			'with_background'=> esc_html__( 'Highlight', 'pet-space' ),
			'muted_background'=> esc_html__( 'Muted', 'pet-space' ),
			'ds ms'          => esc_html__( 'Dark Grey', 'pet-space' ),
			'ds'             => esc_html__( 'Dark', 'pet-space' ),
			'cs'             => esc_html__( 'Main color', 'pet-space' ),
			'cs main_color2' => esc_html__( 'Second Main color', 'pet-space' ),
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
	'column_animation' => array(
		'type'    => 'select',
		'value'   => '',
		'label'   => esc_html__( 'Animation type', 'pet-space' ),
		'desc'    => esc_html__( 'Select one of predefined animations', 'pet-space' ),
		'choices' => array(
			''               => 'None',
			'slideDown'      => esc_html__( 'slideDown', 'pet-space' ),
			'scaleAppear'    => esc_html__( 'scaleAppear', 'pet-space' ),
			'fadeInLeft'     => esc_html__( 'fadeInLeft', 'pet-space' ),
			'fadeInUp'       => esc_html__( 'fadeInUp', 'pet-space' ),
			'fadeInRight'    => esc_html__( 'fadeInRight', 'pet-space' ),
			'fadeInDown'     => esc_html__( 'fadeInDown', 'pet-space' ),
			'fadeIn'         => esc_html__( 'fadeIn', 'pet-space' ),
			'slideRight'     => esc_html__( 'slideRight', 'pet-space' ),
			'slideUp'        => esc_html__( 'slideUp', 'pet-space' ),
			'slideLeft'      => esc_html__( 'slideLeft', 'pet-space' ),
			'expandUp'       => esc_html__( 'expandUp', 'pet-space' ),
			'slideExpandUp'  => esc_html__( 'slideExpandUp', 'pet-space' ),
			'expandOpen'     => esc_html__( 'expandOpen', 'pet-space' ),
			'bigEntrance'    => esc_html__( 'bigEntrance', 'pet-space' ),
			'hatch'          => esc_html__( 'hatch', 'pet-space' ),
			'tossing'        => esc_html__( 'tossing', 'pet-space' ),
			'pulse'          => esc_html__( 'pulse', 'pet-space' ),
			'floating'       => esc_html__( 'floating', 'pet-space' ),
			'bounce'         => esc_html__( 'bounce', 'pet-space' ),
			'pullUp'         => esc_html__( 'pullUp', 'pet-space' ),
			'pullDown'       => esc_html__( 'pullDown', 'pet-space' ),
			'stretchLeft'    => esc_html__( 'stretchLeft', 'pet-space' ),
			'stretchRight'   => esc_html__( 'stretchRight', 'pet-space' ),
			'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'pet-space' ),
			'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'pet-space' ),
			'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'pet-space' ),
			'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'pet-space' ),
			'slideInDown'    => esc_html__( 'slideInDown', 'pet-space' ),
			'slideInLeft'    => esc_html__( 'slideInLeft', 'pet-space' ),
			'slideInRight'   => esc_html__( 'slideInRight', 'pet-space' ),
			'moveFromLeft'   => esc_html__( 'moveFromLeft', 'pet-space' ),
			'moveFromRight'  => esc_html__( 'moveFromRight', 'pet-space' ),
			'moveFromBottom' => esc_html__( 'moveFromBottom', 'pet-space' ),
		),
	),
	'custom_class' => array(
		'label' => esc_html__('Custom Class', 'pet-space'),
		'desc'  => esc_html__('Add custom class for section', 'pet-space'),
		'type'  => 'text',
	)
);
