<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'       => array(
		'type'  => 'icon',
		'label' => esc_html__( 'Icon', 'pet-space' ),
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
		'value'   => 'default_icon',
		'label'   => esc_html__( 'Icon Style', 'pet-space' ),
		'desc'    => esc_html__( 'Select one of predefined icon styles.', 'pet-space' ),
		'help'    => esc_html__( 'If not set - no icon will appear.', 'pet-space' ),
		'choices' => array(
			'default_icon' => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_01.png',
			'border_icon round'        => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_02.png',
			'bg_color round'    => fw_get_template_customizations_directory_uri() . '/extensions/shortcodes/shortcodes/icon/static/img/icon_teaser_03.png',
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
	'title'      => array(
		'type'  => 'text',
		'value'   => '',
		'label' => esc_html__( 'Title', 'pet-space' ),
		'desc'  => esc_html__( 'Title near icon', 'pet-space' ),
	),
	'text'       => array(
		'type'  => 'text',
		'value'   => '',
		'label' => esc_html__( 'Text', 'pet-space' ),
		'desc'  => esc_html__( 'Text near title', 'pet-space' ),
	),
);