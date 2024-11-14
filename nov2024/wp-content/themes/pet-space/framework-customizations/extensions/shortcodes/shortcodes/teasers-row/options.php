<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get teaser to add in teasers row:
$teaser = fw_ext( 'shortcodes' )->get_shortcode( 'teaser' );

$options = array(

	'teaser_columns_width'   => array(
		'type'    => 'select',
		'label'   => esc_html__( 'Column width for teasers row', 'pet-space' ),
		'value'   => 'col-sm-4',
		'desc'    => esc_html__( 'Choose teaser width inside teasers row', 'pet-space' ),
		'choices' => array(
			'col-md-12' => esc_html__( '1/1', 'pet-space' ),
			'col-md-6'  => esc_html__( '1/2', 'pet-space' ),
			'col-md-4'  => esc_html__( '1/3', 'pet-space' ),
			'col-md-3'  => esc_html__( '1/4', 'pet-space' ),
		),
	),
	'teaser_columns_padding' => array(
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
	'teasers'                => array(
		'type'          => 'addable-popup',
		'label'         => esc_html__( 'Teasers in row', 'pet-space' ),
		'popup-title'   => esc_html__( 'Add/Edit Teasers in tabs', 'pet-space' ),
		'desc'          => esc_html__( 'Create your tabs', 'pet-space' ),
		'template'      => '{{=title}}',
		'popup-options' => $teaser->get_options(),

	),

);