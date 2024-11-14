<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$teaser = fw_ext( 'shortcodes' )->get_shortcode( 'teaser' );

$options = array(
	'tabs'       => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Tabs', 'pet-space' ),
		'popup-title'   => esc_html__( 'Add/Edit Tabs', 'pet-space' ),
		'desc'          => esc_html__( 'Create your tabs', 'pet-space' ),
		'template'      => '{{=tab_title}}',
		'popup-options' => array(
			'tab_title'           => array(
				'type'  => 'text',
				'label' => esc_html__( 'Title', 'pet-space' )
			),
			'tab_columns_width'   => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Column width in tab content', 'pet-space' ),
				'value'   => 'col-sm-4',
				'desc'    => esc_html__( 'Choose teaser width inside tab content', 'pet-space' ),
				'choices' => array(
					'col-sm-12' => esc_html__( '1/1', 'pet-space' ),
					'col-sm-6'  => esc_html__( '1/2', 'pet-space' ),
					'col-sm-4'  => esc_html__( '1/3', 'pet-space' ),
					'col-sm-3'  => esc_html__( '1/4', 'pet-space' ),
				),
			),
			'tab_columns_padding' => array(
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
				),
			),
			'tab_teasers'         => array(
				'type'          => 'addable-popup',
				'label'         => esc_html__( 'Teasers in tabs', 'pet-space' ),
				'popup-title'   => esc_html__( 'Add/Edit Teasers in tabs', 'pet-space' ),
				'desc'          => esc_html__( 'Create your teasers in tabs', 'pet-space' ),
				'template'      => '{{=title}}',
				'popup-options' => $teaser->get_options(),

			),
		),

	),
	'top_border' => array(
		'type'         => 'switch',
		'value'        => '',
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