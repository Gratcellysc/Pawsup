<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in item:
$icon = fw_ext( 'shortcodes' )->get_shortcode( 'icon' );
//get social icons to add in item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );

$options = array(
	'title'      => array(
		'type'  => 'text',
		'label' => esc_html__( 'Title of the Box', 'pet-space' ),
	),
	'title_tag'  => array(
		'type'    => 'select',
		'value'   => 'h3',
		'label'   => esc_html__( 'Title Tag', 'pet-space' ),
		'choices' => array(
			'h2' => esc_html__( 'H2', 'pet-space' ),
			'h3' => esc_html__( 'H3', 'pet-space' ),
			'h4' => esc_html__( 'H4', 'pet-space' ),
		)
	),
	'content'    => array(
		'type'          => 'wp-editor',
		'label'         => esc_html__( 'Item text', 'pet-space' ),
		'desc'          => esc_html__( 'Enter desired item content', 'pet-space' ),
		'size'          => 'small', // small, large
		'editor_height' => 400,
	),
	'item_style' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Item Box Style', 'pet-space' ),
		'choices' => array(
			''                                => esc_html__( 'Default (no border or background)', 'pet-space' ),
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
	'link'       => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Item link', 'pet-space' ),
		'desc'  => esc_html__( 'Link on title and optional button', 'pet-space' ),
	),
	'item_image' => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Item Image', 'pet-space' ),
		'image'       => esc_html__( 'Image for your item. Not all item layouts show image', 'pet-space' ),
		'help'        => 'Image for your item. Image can appear as an element, or background or even can be hidden depends from chosen item type',
		'images_only' => true,
	),
	'text_align' => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Text Alignment', 'pet-space' ),
		'choices' => array(
			'text-left'   => esc_html__( 'Left', 'pet-space' ),
			'text-center' => esc_html__( 'Center', 'pet-space' ),
			'text-right'  => esc_html__( 'Right', 'pet-space' ),
		)
	),
	'icons'      => array(
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