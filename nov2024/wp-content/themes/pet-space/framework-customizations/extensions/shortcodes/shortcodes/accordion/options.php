<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tabs' => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Panels', 'pet-space' ),
		'popup-title'   => esc_html__( 'Add/Edit Accordion Panels', 'pet-space' ),
		'desc'          => esc_html__( 'Create your accordion panels', 'pet-space' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'          => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'pet-space' )
			),
			'tab_content'        => array(
				'type'  => 'textarea',
				'label' => esc_html__( 'Content', 'pet-space' )
			),
			'tab_featured_image' => array(
				'type'        => 'upload',
				'value'       => '',
				'label'       => esc_html__( 'Panel Featured Image', 'pet-space' ),
				'image'       => esc_html__( 'Image for your panel.', 'pet-space' ),
				'help'        => esc_html__( 'It appears to the left from your content', 'pet-space' ),
				'images_only' => true,
			),
			'tab_icon'           => array(
				'type'  => 'icon',
				'label' => esc_html__( 'Icon in panel title', 'pet-space' ),
				'set'   => 'rt-icons-2',
			),
		)
	),
	'id'   => array( 'type' => 'unique' ),
);