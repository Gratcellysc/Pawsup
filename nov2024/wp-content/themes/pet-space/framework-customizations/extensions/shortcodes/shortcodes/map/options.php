<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$map_shortcode = fw_ext('shortcodes')->get_shortcode('map');
$options = array(
	'data_provider' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'picker' => array(
			'population_method' => array(
				'label'   => esc_html__('Population Method', 'pet-space'),
				'desc'    => esc_html__( 'Select map population method (Ex: events, custom)', 'pet-space' ),
				'type'    => 'select',
				'choices' => $map_shortcode->_get_picker_dropdown_choices(),
			)
		),
		'choices' => $map_shortcode->_get_picker_choices(),
		'show_borders' => false,
	),
	'gmap-key' => array_merge(
		array(
			'label' => esc_html__( 'Google Maps API Key', 'pet-space' ),
			'desc' => sprintf(
				esc_html__( 'Create an application in %sGoogle Console%s and add the Key here.', 'pet-space' ),
				'<a href="https://console.developers.google.com/flows/enableapi?apiid=places_backend,maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend&keyType=CLIENT_SIDE&reusekey=true">',
				'</a>'
			),
		),
		version_compare(fw()->manifest->get_version(), '2.5.7', '>=')
		? array(
			'type' => 'gmap-key',
		)
		: array(
			'type' => 'text',
			'fw-storage' => array(
				'type'      => 'wp-option',
				'wp_option' => 'fw-option-types:gmap-key',
			),
		)
	),
	'map_type' => array(
		'type'  => 'select',
		'label' => esc_html__('Map Type', 'pet-space'),
		'desc'  => esc_html__('Select map type', 'pet-space'),
		'choices' => array(
			'roadmap'   => esc_html__('Roadmap', 'pet-space'),
			'terrain' => esc_html__('Terrain', 'pet-space'),
			'satellite' => esc_html__('Satellite', 'pet-space'),
			'hybrid'    => esc_html__('Hybrid', 'pet-space')
		)
	),
	'map_height' => array(
		'label' => esc_html__('Map Height', 'pet-space'),
		'desc'  => esc_html__('Set map height (Ex: 300)', 'pet-space'),
		'type'  => 'text'
	),
	'disable_scrolling' => array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__('Disable zoom on scroll', 'pet-space'),
		'desc'  => esc_html__('Prevent the map from zooming when scrolling until clicking on the map', 'pet-space'),
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Yes', 'pet-space'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('No', 'pet-space'),
		),
	),
	'initial_zoom' => array(
		'label' => esc_html__('Initial Zoom', 'pet-space'),
		'desc'  => esc_html__('From 1 to 16', 'pet-space'),
		'type'  => 'text',
		'value' => '14',
	),
	'map_pin' => array(
		'type'        => 'upload',
		'value'       => '',
		'label'       => esc_html__( 'Map marker', 'pet-space' ),
		'help'        => esc_html__( 'It appears to the left from your content', 'pet-space' ),
		'images_only' => true,
	),
);