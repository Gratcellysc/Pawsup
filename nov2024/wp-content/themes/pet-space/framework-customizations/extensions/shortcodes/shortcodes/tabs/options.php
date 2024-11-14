<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'pet-space' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'pet-space' ),
		'desc'          => esc_html__( 'Create your tabs', 'pet-space' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Tab Title', 'pet-space' )
			),
			'tab_content'        => array(
				'type'  => 'wp-editor',
				'label' => esc_html__( 'Tab Content', 'pet-space' ),
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Tab Featured Image', 'pet-space' ),
				'image'       => esc_html__( 'Featured image for your tab', 'pet-space' ),
				'help'        => esc_html__( 'Image for your tab. It appears on the top of your tab content', 'pet-space' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in tab title', 'pet-space' ),
				'set'   => 'rt-icons-2',
			),
		),
	),
	'small_tabs' => array(
		'type'         => 'switch',
		'value'        => '',
		'label'        => esc_html__( 'Small Tabs', 'pet-space' ),
		'desc'         => esc_html__( 'Decrease tabs size', 'pet-space' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No', 'pet-space' ),
		),
		'right-choice' => array(
			'value' => 'small-tabs',
			'label' => esc_html__( 'Yes', 'pet-space' ),
		),
	),
	'top_border' => array(
		'type'         => 'switch',
		'value'        => 'top-color-border',
		'label'        => esc_html__( 'Top color border', 'pet-space' ),
		'desc'         => esc_html__( 'Add top color border to tab content', 'pet-space' ),
		'left-choice'  => array(
			'value' => '',
			'label' => esc_html__( 'No top border', 'pet-space' ),
		),
		'right-choice' => array(
			'value' => 'top-color-border',
			'label' => esc_html__( 'Color top border', 'pet-space' ),
		),
	),
	'id'         => array( 'type' => 'unique' ),
);