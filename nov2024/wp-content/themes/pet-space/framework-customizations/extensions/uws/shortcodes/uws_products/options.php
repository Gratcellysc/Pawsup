<?php
if ( ! defined( 'FW' ) &&  !function_exists('_uws_fw_extensions_locations') ) {
	return;
}

$options = array(
	'unique_id' => array(
		'type' => 'unique'
	),
	'type'      => array(
		'label'   => esc_html__( 'Type', 'pet-space' ),
		'desc'    => esc_html__( 'Select the type', 'pet-space' ),
		'type'    => 'short-select',
		'value'   => 'default',
		'choices' => array(
			'default'      => 'Default',
			'on_sale'      => 'On Sale',
			'best_selling' => 'Best Selling',
			'top_rated'    => 'Top Rated',
			'featured_products'    => 'Featured',
		)
	),
	'limit'     => array(
		'label' => esc_html__( 'Limit', 'pet-space' ),
		'desc'  => esc_html__( 'Enter the limit', 'pet-space' ),
		'type'  => 'short-text',
		'value' => '12',
	),
    'layout' => array(
        'type' => 'multi-picker',
        'label' => false,
        'desc' => false,
        'picker' => array(
            'layout_type' => array(
                'type' => 'select',
                'value' => 'default',
                'label' => esc_html__('Products Layout', 'pet-space'),
                'choices' => array(
                    'default' => esc_html__('Grid (default)', 'pet-space'),
                    'carousel-layout' => esc_html__('Carousel', 'pet-space'),
                    'cat-layout' => esc_html__('Carousel Of Categories', 'pet-space'),
                ),
            ),
        ),
        'choices' => array(
            'default' => array(
                'columns'   => array(
                    'label'   => esc_html__( 'Columns', 'pet-space' ),
                    'desc'    => esc_html__( 'Enter the columns', 'pet-space' ),
                    'type'    => 'short-select',
                    'value'   => '4',
                    'choices' => array(
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        '4' => '4',
                        '5' => '5',
                        '6' => '6',
                    )
                ),
            ),
            'carousel-layout' => array(
                'nav'           => array(
                    'type'         => 'switch',
                    'value'        => '',
                    'label'        => esc_html__( 'Show Navigation', 'pet-space' ),
                    'right-choice'  => array(
                        'value' => 'navigation',
                        'label' => esc_html__( 'Yes', 'pet-space' ),
                    ),
                    'left-choice' => array(
                        'value' => '',
                        'label' => esc_html__( 'No', 'pet-space' ),
                    ),
                ),
                'center'        => array(
                    'type'         => 'switch',
                    'value'        => 'false',
                    'label'        => esc_html__( 'Center carousel', 'pet-space' ),
                    'left-choice'  => array(
                        'value' => 'false',
                        'label' => esc_html__( 'No', 'pet-space' ),
                    ),
                    'right-choice' => array(
                        'value' => 'true',
                        'label' => esc_html__( 'Yes', 'pet-space' ),
                    ),
                ),
                'autoplay'      => array(
                    'type'         => 'switch',
                    'value'        => 'false',
                    'label'        => esc_html__( 'Autoplay', 'pet-space' ),
                    'left-choice'  => array(
                        'value' => 'false',
                        'label' => esc_html__( 'No', 'pet-space' ),
                    ),
                    'right-choice' => array(
                        'value' => 'true',
                        'label' => esc_html__( 'Yes', 'pet-space' ),
                    ),
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
                        '5' => esc_html__( '5', 'pet-space' ),
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
                        '5' => esc_html__( '5', 'pet-space' ),
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
                        '5' => esc_html__( '5', 'pet-space' ),
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
                        '5' => esc_html__( '5', 'pet-space' ),
                    )
                ),
                'show_filters' => array(
                    'type' => 'switch',
                    'label' => esc_html__('Show Filters', 'pet-space'),
                ),
            ),
            'cat-layout' => array(
                'center'        => array(
                    'type'         => 'switch',
                    'value'        => 'false',
                    'label'        => esc_html__( 'Center carousel', 'pet-space' ),
                    'left-choice'  => array(
                        'value' => 'false',
                        'label' => esc_html__( 'No', 'pet-space' ),
                    ),
                    'right-choice' => array(
                        'value' => 'true',
                        'label' => esc_html__( 'Yes', 'pet-space' ),
                    ),
                ),
                'autoplay'      => array(
                    'type'         => 'switch',
                    'value'        => 'false',
                    'label'        => esc_html__( 'Autoplay', 'pet-space' ),
                    'left-choice'  => array(
                        'value' => 'false',
                        'label' => esc_html__( 'No', 'pet-space' ),
                    ),
                    'right-choice' => array(
                        'value' => 'true',
                        'label' => esc_html__( 'Yes', 'pet-space' ),
                    ),
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
                        '5' => esc_html__( '5', 'pet-space' ),
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
                        '5' => esc_html__( '5', 'pet-space' ),
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
                        '5' => esc_html__( '5', 'pet-space' ),
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
                        '5' => esc_html__( '5', 'pet-space' ),
                    )
                ),
                'margin'        => array(
                    'type'        => 'select',
                    'value'       => '30',
                    'label'       => esc_html__( 'Margin between items', 'pet-space' ),
                    'choices'     => array(
                        '30' => '30px',
                        '0'  => '0px',
                        '5'  => '5px',
                        '10' => '10px',
                        '15' => '15px',
                        '40' => '40px',
                        '50' => '50px',
                        '60' => '60px',
                    ),
                    'no-validate' => false,
                ),
            ),
        ),
    ),

    'category' => array(
        'label' => esc_html__('Categories', 'pet-space'),
        'desc' => esc_html__('Select the categories', 'pet-space'),
        'type' => 'multi-select',
        'value' => '',
        'population' => 'taxonomy',
        'source' => 'product_cat',
    ),
	'orderby'   => array(
		'label'   => esc_html__( 'Order by', 'pet-space' ),
		'desc'    => esc_html__( 'Select the order by', 'pet-space' ),
		'type'    => 'short-select',
		'value'   => 'title',
		'choices' => array(
			'title'      => esc_html__( 'Title', 'pet-space' ),
			'date'       => esc_html__( 'Date', 'pet-space' ),
			'id'         => esc_html__( 'Id', 'pet-space' ),
			'menu_order' => esc_html__( 'Menu Order', 'pet-space' ),
			'popularity' => esc_html__( 'Popularity', 'pet-space' ),
			'rand'       => esc_html__( 'Randomly', 'pet-space' ),
			'rating'     => esc_html__( 'Rating', 'pet-space' ),
		)
	),
	'order'     => array(
		'label'   => esc_html__( 'Order', 'pet-space' ),
		'desc'    => esc_html__( 'Select the order type', 'pet-space' ),
		'type'    => 'short-select',
		'value'   => 'title',
		'choices' => array(
			'ASC'  => esc_html__( 'ASC', 'pet-space' ),
			'DESC' => esc_html__( 'DESC', 'pet-space' ),
		)
	),
	'class'     => array(
		'label' => esc_html__( 'Custom Class', 'pet-space' ),
		'desc'  => esc_html__( 'Enter custom CSS class', 'pet-space' ),
		'type'  => 'text',
		'value' => '',
	),
);