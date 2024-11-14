<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

// wrapper Metabox for options
$options = array(
	'page-options-section' => array(
		'title'   => esc_html__( 'Featured Additional Options', 'pet-space' ),
		'type'    => 'box',
		'context' => 'normal',
		'options' => array(),
	),
);

//page slider
$slider_extension = fw()->extensions->get( 'slider' );
//returning if no slider - only options for page is slider options
if ( empty ( $slider_extension ) ) {
	return;
}

$choices = '';
if ( ! empty ( $slider_extension ) ) {
	$choices = $slider_extension->get_populated_sliders_choices();
}

if ( ! empty( $choices ) ) {
	//adding empty value to disable slider
	$choices['0'] = esc_html__( 'No Slider', 'pet-space' );

	$options_slider = array(
		'slider_id' => array(
			'type'    => 'select',
			'value'   => '',
			'label'   => esc_html__( 'Select Slider', 'pet-space' ),
			'choices' => $choices
		),
	);
	array_push( $options['page-options-section']['options'], $options_slider );

} else {
	$options_slider = array(
		'slider_id' => array( // make sure it exists to prevent notices when try to get ['slider_id'] somewhere in the code
			'type' => 'hidden',
		),
		'no-forms'  => array(
			'type'  => 'html-full',
			'label' => false,
			'desc'  => false,
			'html'  =>
				'<div>' .
				'<h1 style="font-weight:100; text-align:center;">' . esc_html__( 'No Sliders Available', 'pet-space' ) . '</h1>' .
				'<p style="text-align:center">' .
				'<em>' .
				str_replace(
					array(
						'{br}',
						'{add_slider_link}'
					),
					array(
						'<br/>',
						fw_html_tag( 'a', array(
							'href'   => admin_url( 'post-new.php?post_type=' . fw()->extensions->get( 'slider' )->get_post_type() ),
							'target' => '_blank',
						), esc_html__( 'create a new Slider', 'pet-space' ) )
					),
					esc_html__( 'No Sliders created yet. Please go to the {br}Sliders page and {add_slider_link}.', 'pet-space' )
				) .
				'</em>' .
				'</p>' .
				'</div>'
		)
	);
	array_push( $options['page-options-section']['options'], $options_slider );
}
