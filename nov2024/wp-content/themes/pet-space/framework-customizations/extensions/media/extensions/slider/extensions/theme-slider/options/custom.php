<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
    'slide_video'  => array(
        'desc'        => esc_html__( 'Upload a video', 'pet-space' ),
        'images_only' => false,
        'type'        => 'upload',
        /**
         * Allow save not existing choices
         * Useful when you use the select to populate it dynamically from js
         */
        'no-validate' => false,
    ),
	'slide_background' => array(
		'type'        => 'select',
		'value'       => 'ls',
		'label'       => esc_html__( 'Slide background', 'pet-space' ),
		'desc'        => esc_html__( 'Select slide background color', 'pet-space' ),
		'choices'     => array(
			'ls'    => esc_html__( 'Light', 'pet-space' ),
			'ls ms' => esc_html__( 'Light Muted', 'pet-space' ),
			'ds'    => esc_html__( 'Dark', 'pet-space' ),
			'ds ms' => esc_html__( 'Dark Muted', 'pet-space' ),
			'color_1'    => esc_html__( 'Color 1', 'pet-space' ),
			'color_2'    => esc_html__( 'Color 2', 'pet-space' ),
			'color_3'    => esc_html__( 'Color 3', 'pet-space' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'slide_align'      => array(
		'type'        => 'select',
		'value'       => 'text-left',
		'label'       => esc_html__( 'Slide text alignment', 'pet-space' ),
		'desc'        => esc_html__( 'Select slide text alignment', 'pet-space' ),
		'choices'     => array(
			'text-left'   => esc_html__( 'Left', 'pet-space' ),
			'text-center' => esc_html__( 'Center', 'pet-space' ),
			'text-right'  => esc_html__( 'Right', 'pet-space' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),
	'slide_layers'     => array(
		'type'        => 'addable-box',
		'value'       => '',
		'label'       => esc_html__( 'Slide Layers', 'pet-space' ),
		'desc'        => esc_html__( 'Choose a tag and text inside it', 'pet-space' ),
		'box-options' => array(
			'layer_tag'            => array(
				'type'    => 'select',
				'value'   => 'h3',
				'label'   => esc_html__( 'Layer tag', 'pet-space' ),
				'desc'    => esc_html__( 'Select a tag for your ', 'pet-space' ),
				'choices' => array(
					'h3' => esc_html__( 'H3 tag', 'pet-space' ),
					'h2' => esc_html__( 'H2 tag', 'pet-space' ),
					'h4' => esc_html__( 'H4 tag', 'pet-space' ),
					'p'  => esc_html__( 'P tag', 'pet-space' ),
				),
			),
			'layer_animation'      => array(
				'type'    => 'select',
				'value'   => 'fadeIn',
				'label'   => esc_html__( 'Animation type', 'pet-space' ),
				'desc'    => esc_html__( 'Select one of predefined animations', 'pet-space' ),
				'choices' => array(
					''               => 'Default',
					'slideDown'      => esc_html__( 'slideDown', 'pet-space' ),
					'scaleAppear'    => esc_html__( 'scaleAppear', 'pet-space' ),
					'fadeInLeft'     => esc_html__( 'fadeInLeft', 'pet-space' ),
					'fadeInUp'       => esc_html__( 'fadeInUp', 'pet-space' ),
					'fadeInRight'    => esc_html__( 'fadeInRight', 'pet-space' ),
					'fadeInDown'     => esc_html__( 'fadeInDown', 'pet-space' ),
					'fadeIn'         => esc_html__( 'fadeIn', 'pet-space' ),
					'slideRight'     => esc_html__( 'slideRight', 'pet-space' ),
					'slideUp'        => esc_html__( 'slideUp', 'pet-space' ),
					'slideLeft'      => esc_html__( 'slideLeft', 'pet-space' ),
					'expandUp'       => esc_html__( 'expandUp', 'pet-space' ),
					'slideExpandUp'  => esc_html__( 'slideExpandUp', 'pet-space' ),
					'expandOpen'     => esc_html__( 'expandOpen', 'pet-space' ),
					'bigEntrance'    => esc_html__( 'bigEntrance', 'pet-space' ),
					'hatch'          => esc_html__( 'hatch', 'pet-space' ),
					'tossing'        => esc_html__( 'tossing', 'pet-space' ),
					'pulse'          => esc_html__( 'pulse', 'pet-space' ),
					'floating'       => esc_html__( 'floating', 'pet-space' ),
					'bounce'         => esc_html__( 'bounce', 'pet-space' ),
					'pullUp'         => esc_html__( 'pullUp', 'pet-space' ),
					'pullDown'       => esc_html__( 'pullDown', 'pet-space' ),
					'stretchLeft'    => esc_html__( 'stretchLeft', 'pet-space' ),
					'stretchRight'   => esc_html__( 'stretchRight', 'pet-space' ),
					'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'pet-space' ),
					'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'pet-space' ),
					'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'pet-space' ),
					'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'pet-space' ),
					'slideInDown'    => esc_html__( 'slideInDown', 'pet-space' ),
					'slideInLeft'    => esc_html__( 'slideInLeft', 'pet-space' ),
					'slideInRight'   => esc_html__( 'slideInRight', 'pet-space' ),
					'moveFromLeft'   => esc_html__( 'moveFromLeft', 'pet-space' ),
					'moveFromRight'  => esc_html__( 'moveFromRight', 'pet-space' ),
					'moveFromBottom' => esc_html__( 'moveFromBottom', 'pet-space' ),
				),
			),
			'layer_text'           => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Layer text', 'pet-space' ),
				'desc'  => esc_html__( 'Text to appear in slide layer', 'pet-space' ),
			),
			'layer_text_color'     => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text color', 'pet-space' ),
				'desc'    => esc_html__( 'Select a color for your text in layer', 'pet-space' ),
				'choices' => array(
					''           => 'Inherited',
					'highlight'  => esc_html__( 'First theme main color', 'pet-space' ),
					'highlight2' => esc_html__( 'Second theme main color', 'pet-space' ),
					'grey'       => esc_html__( 'Grey color', 'pet-space' ),
					'black'      => esc_html__( 'Dark color', 'pet-space' ),
					'light'      => esc_html__( 'Light color', 'pet-space' ),
				),
			),
			'layer_text_weight'    => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text weight', 'pet-space' ),
				'desc'    => esc_html__( 'Select a weight for your text in layer', 'pet-space' ),
				'choices' => array(
					'normal'     => 'Normal',
					'bold' => esc_html__( 'Bold', 'pet-space' ),
					'thin' => esc_html__( 'Thin', 'pet-space' ),

				),
			),
			'layer_text_transform' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__( 'Layer text transform', 'pet-space' ),
				'desc'    => esc_html__( 'Select a text transformation for your layer', 'pet-space' ),
				'choices' => array(
					''                => 'None',
					'text-lowercase'  => esc_html__( 'Lowercase', 'pet-space' ),
					'text-uppercase'  => esc_html__( 'Uppercase', 'pet-space' ),
					'text-capitalize' => esc_html__( 'Capitalize', 'pet-space' ),

				),
			),
			'custom_class' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__( 'Layer custom class', 'pet-space' ),
				'desc'  => esc_html__( 'Set layer custom class', 'pet-space' ),
			),
		),
		'template'    => esc_html__( 'Slider Layer', 'pet-space' ),

		'limit'           => 5, // limit the number of boxes that can be added
		'add-button-text' => esc_html__( 'Add', 'pet-space' ),
	),
	'slide_button'     => array(
		'type'        => 'select',
		'value'       => '',
		'label'       => esc_html__( 'Slide button', 'pet-space' ),
		'desc'        => esc_html__( 'Select slide button. Leave empty if no button needed', 'pet-space' ),
		'choices'     => array(
			''                     => esc_html__( 'None', 'pet-space' ),
			'theme_button color1'  => esc_html__( 'Color 1 button', 'pet-space' ),
			'theme_button color2'  => esc_html__( 'Color 2 button', 'pet-space' ),
			'theme_button color3'  => esc_html__( 'Color 3 button', 'pet-space' ),
			'theme_button color4'  => esc_html__( 'Color 4 button', 'pet-space' ),
		),
		/**
		 * Allow save not existing choices
		 * Useful when you use the select to populate it dynamically from js
		 */
		'no-validate' => false,
	),

	'slide_button_text'      => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Slide button text', 'pet-space' ),
		'desc'  => esc_html__( 'Text in button', 'pet-space' ),
	),
	'slide_button_link'      => array(
		'type'  => 'text',
		'value' => '',
		'label' => esc_html__( 'Slide button link', 'pet-space' ),
		'desc'  => esc_html__( 'Paste a link', 'pet-space' ),
	),
    'slide_button2'     => array(
        'type'        => 'select',
        'value'       => '',
        'label'       => esc_html__( 'Slide button 2', 'pet-space' ),
        'desc'        => esc_html__( 'Select slide button. Leave empty if no button needed', 'pet-space' ),
        'choices'     => array(
            ''                     => esc_html__( 'None', 'pet-space' ),
            'theme_button color1'  => esc_html__( 'Color 1 button', 'pet-space' ),
            'theme_button color2'  => esc_html__( 'Color 2 button', 'pet-space' ),
            'theme_button color3'  => esc_html__( 'Color 3 button', 'pet-space' ),
            'theme_button color4'  => esc_html__( 'Color 4 button', 'pet-space' ),
        ),
        /**
         * Allow save not existing choices
         * Useful when you use the select to populate it dynamically from js
         */
        'no-validate' => false,
    ),

    'slide_button_text2'      => array(
        'type'  => 'text',
        'value' => '',
        'label' => esc_html__( 'Slide button 2 text', 'pet-space' ),
        'desc'  => esc_html__( 'Text in button', 'pet-space' ),
    ),
    'slide_button_link2'      => array(
        'type'  => 'text',
        'value' => '',
        'label' => esc_html__( 'Slide button 2 link', 'pet-space' ),
        'desc'  => esc_html__( 'Paste a link', 'pet-space' ),
    ),
    'slide_button3'     => array(
        'type'        => 'select',
        'value'       => '',
        'label'       => esc_html__( 'Slide button 3', 'pet-space' ),
        'desc'        => esc_html__( 'Select slide button. Leave empty if no button needed', 'pet-space' ),
        'choices'     => array(
            ''                     => esc_html__( 'None', 'pet-space' ),
            'theme_button color1'  => esc_html__( 'Color 1 button', 'pet-space' ),
            'theme_button color2'  => esc_html__( 'Color 2 button', 'pet-space' ),
            'theme_button color3'  => esc_html__( 'Color 3 button', 'pet-space' ),
            'theme_button color4'  => esc_html__( 'Color 4 button', 'pet-space' ),
        ),
        /**
         * Allow save not existing choices
         * Useful when you use the select to populate it dynamically from js
         */
        'no-validate' => false,
    ),

    'slide_button_text3'      => array(
        'type'  => 'text',
        'value' => '',
        'label' => esc_html__( 'Slide button 3 text', 'pet-space' ),
        'desc'  => esc_html__( 'Text in button', 'pet-space' ),
    ),
    'slide_button_link3'      => array(
        'type'  => 'text',
        'value' => '',
        'label' => esc_html__( 'Slide button 3 link', 'pet-space' ),
        'desc'  => esc_html__( 'Paste a link', 'pet-space' ),
    ),
	'slide_button_animation' => array(
		'type'    => 'select',
		'value'   => 'fadeIn',
		'label'   => esc_html__( 'Button animation type', 'pet-space' ),
		'desc'    => esc_html__( 'Select one of predefined animations', 'pet-space' ),
		'choices' => array(
			''               => 'Default',
			'slideDown'      => esc_html__( 'slideDown', 'pet-space' ),
			'scaleAppear'    => esc_html__( 'scaleAppear', 'pet-space' ),
			'fadeInLeft'     => esc_html__( 'fadeInLeft', 'pet-space' ),
			'fadeInUp'       => esc_html__( 'fadeInUp', 'pet-space' ),
			'fadeInRight'    => esc_html__( 'fadeInRight', 'pet-space' ),
			'fadeInDown'     => esc_html__( 'fadeInDown', 'pet-space' ),
			'fadeIn'         => esc_html__( 'fadeIn', 'pet-space' ),
			'slideRight'     => esc_html__( 'slideRight', 'pet-space' ),
			'slideUp'        => esc_html__( 'slideUp', 'pet-space' ),
			'slideLeft'      => esc_html__( 'slideLeft', 'pet-space' ),
			'expandUp'       => esc_html__( 'expandUp', 'pet-space' ),
			'slideExpandUp'  => esc_html__( 'slideExpandUp', 'pet-space' ),
			'expandOpen'     => esc_html__( 'expandOpen', 'pet-space' ),
			'bigEntrance'    => esc_html__( 'bigEntrance', 'pet-space' ),
			'hatch'          => esc_html__( 'hatch', 'pet-space' ),
			'tossing'        => esc_html__( 'tossing', 'pet-space' ),
			'pulse'          => esc_html__( 'pulse', 'pet-space' ),
			'floating'       => esc_html__( 'floating', 'pet-space' ),
			'bounce'         => esc_html__( 'bounce', 'pet-space' ),
			'pullUp'         => esc_html__( 'pullUp', 'pet-space' ),
			'pullDown'       => esc_html__( 'pullDown', 'pet-space' ),
			'stretchLeft'    => esc_html__( 'stretchLeft', 'pet-space' ),
			'stretchRight'   => esc_html__( 'stretchRight', 'pet-space' ),
			'fadeInUpBig'    => esc_html__( 'fadeInUpBig', 'pet-space' ),
			'fadeInDownBig'  => esc_html__( 'fadeInDownBig', 'pet-space' ),
			'fadeInLeftBig'  => esc_html__( 'fadeInLeftBig', 'pet-space' ),
			'fadeInRightBig' => esc_html__( 'fadeInRightBig', 'pet-space' ),
			'slideInDown'    => esc_html__( 'slideInDown', 'pet-space' ),
			'slideInLeft'    => esc_html__( 'slideInLeft', 'pet-space' ),
			'slideInRight'   => esc_html__( 'slideInRight', 'pet-space' ),
			'moveFromLeft'   => esc_html__( 'moveFromLeft', 'pet-space' ),
			'moveFromRight'  => esc_html__( 'moveFromRight', 'pet-space' ),
			'moveFromBottom' => esc_html__( 'moveFromBottom', 'pet-space' ),
		),
	),
    'slide_overlay' => array (
        'type'         => 'switch',
        'value'        => 'false',
        'label'        => esc_html__( 'Slide overlay', 'pet-space' ),
        //'desc'         => esc_html__( 'Slide image overlay', 'pet-space' ),
        'left-choice'  => array (
            'value' => 'false',
            'label' => esc_html__( 'No', 'pet-space' ),
        ),
        'right-choice' => array (
            'value' => 'true',
            'label' => esc_html__( 'Yes', 'pet-space' ),
        ),
    ),
);