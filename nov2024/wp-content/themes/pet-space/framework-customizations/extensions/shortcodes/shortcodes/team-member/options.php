<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
//get social icons to add in member item:
$icons_social = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );
$icons_social = ! empty( $icons_social ) ? $icons_social->get_options() : '';

$options = array(
	'image' => array(
		'label' => esc_html__( 'Team Member Image', 'pet-space' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'pet-space' ),
		'type'  => 'upload'
	),
	'name'  => array(
		'label' => esc_html__( 'Team Member Name', 'pet-space' ),
		'desc'  => esc_html__( 'Name of the person', 'pet-space' ),
		'type'  => 'text',
		'value' => ''
	),
	'job'   => array(
		'label' => esc_html__( 'Team Member Job Title', 'pet-space' ),
		'desc'  => esc_html__( 'Job title of the person.', 'pet-space' ),
		'type'  => 'text',
		'value' => ''
	),
	'desc'  => array(
		'label' => esc_html__( 'Team Member Description', 'pet-space' ),
		'desc'  => esc_html__( 'Enter a few words that describe the person', 'pet-space' ),
		'type'  => 'textarea',
		'value' => ''
	),
	$icons_social,
);