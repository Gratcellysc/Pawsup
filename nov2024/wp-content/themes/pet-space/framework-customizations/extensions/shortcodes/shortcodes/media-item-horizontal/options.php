<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in item:
$icon = fw_ext( 'shortcodes' )->get_shortcode( 'icon' );
//get social icons to add in item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'title'         => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title of the Box', 'pet-space' ),
	),
	'title_tag'     => array(
		'type'    => 'select',
		'value'   => 'h3',
		'label'   => esc_html__( 'Title Tag', 'pet-space' ),
		'choices' => array(
			'h2' => esc_html__( 'H2', 'pet-space' ),
			'h3' => esc_html__( 'H3', 'pet-space' ),
			'h4' => esc_html__( 'H4', 'pet-space' ),
		)
	),
	'content'       => array(
		'type'          => 'wp-editor',
		'label'         => esc_html__( 'Item text', 'pet-space' ),
		'desc'          => esc_html__( 'Enter desired item content', 'pet-space' ),
		'size'          => 'small', // small, large
		'editor_height' => 400,
	),
	'item_style'    => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Item Box Style', 'pet-space' ),
		'choices' => array(
			'no-content-padding'              => esc_html__( 'Default (no border or background)', 'pet-space' ),
			'content-padding with_border'     => esc_html__( 'Bordered', 'pet-space' ),
			'content-padding with_background' => esc_html__( 'Muted Background', 'pet-space' ),
			'content-padding ls ms'           => esc_html__( 'Grey background', 'pet-space' ),
			'content-padding ds'              => esc_html__( 'Darkgrey background', 'pet-space' ),
			'content-padding ds ms'           => esc_html__( 'Dark background', 'pet-space' ),
			'content-padding cs'              => esc_html__( 'Main color background', 'pet-space' ),
			'full-padding with_border'        => esc_html__( 'Bordered with Padding', 'pet-space' ),
			'full-padding with_background'    => esc_html__( 'Muted Background with Padding', 'pet-space' ),
			'full-padding ls ms'              => esc_html__( 'Grey background with Padding', 'pet-space' ),
			'full-padding ds'                 => esc_html__( 'Darkgrey background with Padding', 'pet-space' ),
			'full-padding ds ms'              => esc_html__( 'Dark background with Padding', 'pet-space' ),
			'full-padding cs'                 => esc_html__( 'Main color background with Padding', 'pet-space' ),
		)
	),
	'link'          => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Item link', 'pet-space' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'pet-space' ),
	),
	'item_image'    => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Item Image', 'pet-space' ),
		'image'       => esc_html__( 'Image for your item. Not all item layouts show image', 'pet-space' ),
		'help'        => 'Image for your item. Image can appear as an element, or background or even can be hidden depends from chosen item type',
		'images_only' => true,
	),
	'image_right'   => array(
		'type'         => 'switch',
		'label'        => esc_html__( 'Image to the right', 'pet-space' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'pet-space' ),
		),
		'right-choice' => array(
			'value' => 'true',
			'label' => esc_html__( 'Yes', 'pet-space' ),
		),
	),
	'responsive_lg' => array(
		'label'   => esc_html__( 'Image width on wide screens', 'pet-space' ),
		'desc'    => esc_html__( 'Select image column width on wide screens (>1200px)', 'pet-space' ),
		'value'   => '6',
		'type'    => 'select',
		'choices' => array(
			'12' => esc_html__( 'Full Width', 'pet-space' ),
			'6'  => esc_html__( '1/2', 'pet-space' ),
			'4'  => esc_html__( '1/3', 'pet-space' ),
			'3'  => esc_html__( '1/4', 'pet-space' ),
		)
	),
	'responsive_md' => array(
		'label'   => esc_html__( 'Image width on middle screens', 'pet-space' ),
		'desc'    => esc_html__( 'Select image column width on middle screens (>992px)', 'pet-space' ),
		'value'   => '4',
		'type'    => 'select',
		'choices' => array(
			'12' => esc_html__( 'Full Width', 'pet-space' ),
			'6'  => esc_html__( '1/2', 'pet-space' ),
			'4'  => esc_html__( '1/3', 'pet-space' ),
			'3'  => esc_html__( '1/4', 'pet-space' ),
		)
	),
	'responsive_sm' => array(
		'label'   => esc_html__( 'Image width on small screens', 'pet-space' ),
		'desc'    => esc_html__( 'Select image column width on small screens (>768px)', 'pet-space' ),
		'value'   => '2',
		'type'    => 'select',
		'choices' => array(
			'12' => esc_html__( 'Full Width', 'pet-space' ),
			'6'  => esc_html__( '1/2', 'pet-space' ),
			'4'  => esc_html__( '1/3', 'pet-space' ),
			'3'  => esc_html__( '1/4', 'pet-space' ),
		)
	),
	'responsive_xs' => array(
		'label'   => esc_html__( 'Image width on extra small screens', 'pet-space' ),
		'desc'    => esc_html__( 'Select image column width on extra small screens (<767px)', 'pet-space' ),
		'value'   => '1',
		'type'    => 'select',
		'choices' => array(
			'12' => esc_html__( 'Full Width', 'pet-space' ),
			'6'  => esc_html__( '1/2', 'pet-space' ),
			'4'  => esc_html__( '1/3', 'pet-space' ),
			'3'  => esc_html__( '1/4', 'pet-space' ),
		)
	),
	'icons'         => array(
		'type'            => 'addable-box',
		'value'           => '',
		'label'           => esc_html__( 'Additional info', 'pet-space' ),
		'desc'            => esc_html__( 'Add icons with title and text', 'pet-space' ),
		'box-options'     => $icon->get_options(),
		'add-button-text' => esc_html__( 'Add New', 'pet-space' ),
		'template'        => '{{=title}}',
		'sortable'        => true,
	),
	$icons_social->get_options(),

);