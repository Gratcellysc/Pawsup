<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'box_id' => array(
		'type'    => 'box',
		'title'   => esc_html__( 'Options for child categories', 'pet-space' ),
		'options' => array(
			'layout'        => array(
				'label'   => esc_html__( 'Portfolio Layout', 'pet-space' ),
				'desc'    => esc_html__( 'Choose projects layout', 'pet-space' ),
				'value'   => 'isotope',
				'type'    => 'select',
				'choices' => array(
					'carousel' => esc_html__( 'Carousel', 'pet-space' ),
					'isotope'  => esc_html__( 'Masonry Grid', 'pet-space' ),
				)
			),
			'item_layout'   => array(
				'label'   => esc_html__( 'Item layout', 'pet-space' ),
				'desc'    => esc_html__( 'Choose Item layout', 'pet-space' ),
				'value'   => 'item-regular',
				'type'    => 'select',
				'choices' => array(
					'item-regular'  => esc_html__( 'Regular (just image)', 'pet-space' ),
					'item-title'    => esc_html__( 'Image with title', 'pet-space' ),
					'item-extended' => esc_html__( 'Image with title and excerpt', 'pet-space' ),
				)
			),
			'full_width'    => array(
				'type'         => 'switch',
				'value'        => false,
				'label'        => esc_html__( 'Full width gallery', 'pet-space' ),
				'desc'         => esc_html__( 'Enable full width container for gallery', 'pet-space' ),
				'left-choice'  => array(
					'value' => false,
					'label' => esc_html__( 'No', 'pet-space' ),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__( 'Yes', 'pet-space' ),
				),
			),
			'margin'        => array(
				'label'   => esc_html__( 'Horizontal item margin (px)', 'pet-space' ),
				'desc'    => esc_html__( 'Select horizontal item margin', 'pet-space' ),
				'value'   => '30',
				'type'    => 'select',
				'choices' => array(
					'0'  => esc_html__( '0', 'pet-space' ),
					'1'  => esc_html__( '1px', 'pet-space' ),
					'2'  => esc_html__( '2px', 'pet-space' ),
					'10' => esc_html__( '10px', 'pet-space' ),
					'30' => esc_html__( '30px', 'pet-space' ),
				)
			),
			'responsive_lg' => array(
				'label'   => esc_html__( 'Columns on large screens', 'pet-space' ),
				'desc'    => esc_html__( 'Select items number on wide screens (>1200px)', 'pet-space' ),
				'value'   => '4',
				'type'    => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'pet-space' ),
					'2' => esc_html__( '2', 'pet-space' ),
					'3' => esc_html__( '3', 'pet-space' ),
					'4' => esc_html__( '4', 'pet-space' ),
					'6' => esc_html__( '6', 'pet-space' ),
				)
			),
			'responsive_md' => array(
				'label'   => esc_html__( 'Columns on middle screens', 'pet-space' ),
				'desc'    => esc_html__( 'Select items number on middle screens (>992px)', 'pet-space' ),
				'value'   => '3',
				'type'    => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'pet-space' ),
					'2' => esc_html__( '2', 'pet-space' ),
					'3' => esc_html__( '3', 'pet-space' ),
					'4' => esc_html__( '4', 'pet-space' ),
					'6' => esc_html__( '6', 'pet-space' ),
				)
			),
			'responsive_sm' => array(
				'label'   => esc_html__( 'Columns on small screens', 'pet-space' ),
				'desc'    => esc_html__( 'Select items number on small screens (>768px)', 'pet-space' ),
				'value'   => '2',
				'type'    => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'pet-space' ),
					'2' => esc_html__( '2', 'pet-space' ),
					'3' => esc_html__( '3', 'pet-space' ),
					'4' => esc_html__( '4', 'pet-space' ),
					'6' => esc_html__( '6', 'pet-space' ),
				)
			),
			'responsive_xs' => array(
				'label'   => esc_html__( 'Columns on extra small screens', 'pet-space' ),
				'desc'    => esc_html__( 'Select items number on extra small screens (<767px)', 'pet-space' ),
				'value'   => '1',
				'type'    => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'pet-space' ),
					'2' => esc_html__( '2', 'pet-space' ),
					'3' => esc_html__( '3', 'pet-space' ),
					'4' => esc_html__( '4', 'pet-space' ),
					'6' => esc_html__( '6', 'pet-space' ),
				)
			),
			'show_filters'  => array(
				'type'         => 'switch',
				'value'        => false,
				'label'        => esc_html__( 'Show filters', 'pet-space' ),
				'desc'         => esc_html__( 'Hide or show categories filters', 'pet-space' ),
				'left-choice'  => array(
					'value' => false,
					'label' => esc_html__( 'No', 'pet-space' ),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__( 'Yes', 'pet-space' ),
				),
			),
			'filter_text' => array(
				'type'  => 'text',
				'value' => esc_html__( 'Projects', 'pet-space' ),
				'label' => esc_html__( 'Filters text', 'pet-space' ),
				'desc'  => esc_html__( 'Background text for portfolio filters (if filters enable)', 'pet-space' ),
			),
		)
	)
);