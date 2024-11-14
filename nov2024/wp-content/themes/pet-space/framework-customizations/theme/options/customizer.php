<?php if (!defined('FW')) {
	die('Forbidden');
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in WordPress customizer
 */

// color defaults
$current_colors = pet_space_get_theme_current_colors();

//find fw_ext
$shortcodes_extension = fw()->extensions->get('shortcodes');
$header_social_icons  = array();
if (!empty($shortcodes_extension)) {
	$icons_social_shortcode = $shortcodes_extension->get_shortcode('icons_social');
	if (!empty($icons_social_shortcode)) {
		$header_social_icons = $icons_social_shortcode->get_options();
	}
}


$slider_extension = fw()->extensions->get('slider');
$choices = array();
if (!empty($slider_extension)) {
	$choices = $slider_extension->get_populated_sliders_choices();
}

//adding empty value to disable slider
$choices[0] = esc_html__('No Slider', 'pet-space');

$options = array(
	'logo_section'    => array(
		'title'   => esc_html__('Site Logo', 'pet-space'),
		'options' => array(
			'logo_image'             => array(
				'type'        => 'upload',
				'value'       => array(),
				'attr'        => array('class' => 'logo_image-class', 'data-logo_image' => 'logo_image'),
				'label'       => esc_html__('Main logo image that appears in header', 'pet-space'),
				'desc'        => esc_html__('Select your logo', 'pet-space'),
				'help'        => esc_html__('Choose image to display as a site logo', 'pet-space'),
				'images_only' => true,
				'files_ext'   => array('png', 'jpg', 'jpeg', 'gif', 'svg'),
			),
			'logo_text'              => array(
				'type'  => 'text',
				'value' => 'Pet Space',
				'attr'  => array('class' => 'logo_text-class', 'data-logo_text' => 'logo_text'),
				'label' => esc_html__('Logo Text', 'pet-space'),
				'desc'  => esc_html__('Text that appears near logo image', 'pet-space'),
				'help'  => esc_html__('Type your text to show it in logo', 'pet-space'),
			),
			'logo_subtext'              => array(
				'type'  => 'text',
				'value' => 'WordPress Theme',
				'attr'  => array('class' => 'logo_subtext-class', 'data-logo_subtext' => 'logo_subtext'),
				'label' => esc_html__('Logo Tagline', 'pet-space'),
				'desc'  => esc_html__('Text that appears near logo text', 'pet-space'),
			),
		),
	),
	'color_scheme_section' => array(
		'title'   => esc_html__('Theme Color Scheme', 'pet-space'),
		'options' => array(
			'color_scheme_number' => array(
				'type'    => 'select',
				'value'   => '',
				'label'   => esc_html__('Predefined Color scheme', 'pet-space'),
				'desc'    => esc_html__('Select one of predefined color schemes number', 'pet-space'),
				'choices' => array(
					''  => '1',
					'2' => '2',
					'3' => '3',
				),
				'blank'   => false, // (optional) if true, image can be deselected
				'wp-customizer-args' => array(
					'active_callback' => '__return_false',
				),
			),
			'accent_color_1' => array(
				'label' => esc_html__('Override first color scheme', 'pet-space'),
				'desc'  => esc_html__('Accent Color 1', 'pet-space'),
				'help'  => esc_html__('This colors are used for regenerate predefined "css/main.css" file with first color scheme. Remove custom color values for reset first color scheme to defaults.', 'pet-space'),
				'type'  => 'color-picker',
				'value' => $current_colors['accent_color_1'],
				'wp-customizer-setting-args' => array(
					'transport' => 'postMessage',
				),
			),
			'accent_color_2' => array(
				'label' => false,
				'desc'  => esc_html__('Accent Color 2', 'pet-space'),
				'type'  => 'color-picker',
				'value' => $current_colors['accent_color_2'],
				'wp-customizer-setting-args' => array(
					'transport' => 'postMessage',
				),
			),
			'accent_color_3' => array(
				'label' => false,
				'desc'  => esc_html__('Accent Color 3', 'pet-space'),
				'type'  => 'color-picker',
				'value' => $current_colors['accent_color_3'],
				'wp-customizer-setting-args' => array(
					'transport' => 'postMessage',
				),
			),
			'accent_color_4' => array(
				'label' => false,
				'desc'  => esc_html__('Accent Color 4', 'pet-space'),
				'type'  => 'color-picker',
				'value' => $current_colors['accent_color_4'],
				'wp-customizer-setting-args' => array(
					'transport' => 'postMessage',
				),
			),

		),
		'wp-customizer-args' => array(
			'active_callback' => '__return_true',
		),
	),
	'blog_posts' => array(
		'title'   => esc_html__('Theme Blog', 'pet-space'),
		'options' => array(
			'post_categories'         => array(
				'label'        => esc_html__('Post Categories', 'pet-space'),
				'desc'         => esc_html__('Show post categories?', 'pet-space'),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'pet-space')
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__('No', 'pet-space')
				),
				'value'        => 'yes',
			),
			'post_tags'         => array(
				'label'        => esc_html__('Post Tags', 'pet-space'),
				'desc'         => esc_html__('Show post tags?', 'pet-space'),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'pet-space')
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__('No', 'pet-space')
				),
				'value'        => 'yes',
			),
			'post_author'         => array(
				'label'        => esc_html__('Post Author', 'pet-space'),
				'desc'         => esc_html__('Show post author?', 'pet-space'),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'pet-space')
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__('No', 'pet-space')
				),
				'value'        => 'no',
			),
			'blog_slider_switch' => array(
				'type'    => 'multi-picker',
				'label'   => false,
				'desc'    => false,
				'picker'  => array(
					'blog_slider_enabled' => array(
						'type'         => 'switch',
						'value'        => '',
						'label'        => esc_html__('Post slider', 'pet-space'),
						'desc'         => esc_html__('Enable slider on blog page', 'pet-space'),
						'left-choice'  => array(
							'value' => '',
							'label' => esc_html__('No', 'pet-space'),
						),
						'right-choice' => array(
							'value' => 'yes',
							'label' => esc_html__('Yes', 'pet-space'),
						),
					),
				),
				'choices' => array(
					'yes' => array(
						'slider_id' => array(
							'type'    => 'select',
							'value'   => '',
							'label'   => esc_html__('Select Slider', 'pet-space'),
							'choices' => $choices
						),
					),
				),
			),
		)
	),
	'headers'     => array(
		'title'   => esc_html__('Theme Header', 'pet-space'),
		'options' => array(

			'header'       => array(
				'type'    => 'image-picker',
				'value'   => '1',
				'attr'    => array(
					'class'    => 'header-thumbnail',
					'data-foo' => 'header',
				),
				'label'   => esc_html__('Template Header', 'pet-space'),
				'desc'    => esc_html__('Select one of predefined theme headers', 'pet-space'),
				'help'    => esc_html__('You can select one of predefined theme headers', 'pet-space'),
				'choices' => array(
					'1' => get_template_directory_uri() . '/img/theme-options/header1.png',
					'2' => get_template_directory_uri() . '/img/theme-options/header2.png',
					'3' => get_template_directory_uri() . '/img/theme-options/header3.jpg',
					'21' => get_template_directory_uri() . '/img/theme-options/header21.png',
					'22' => get_template_directory_uri() . '/img/theme-options/header22.png',
					'23' => get_template_directory_uri() . '/img/theme-options/header23.png',
					'24' => get_template_directory_uri() . '/img/theme-options/header24.png',
				),
				'blank'   => false, // (optional) if true, image can be deselected
			),
			'header_welcome_text' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Welcome text', 'pet-space'),
				'desc'  => esc_html__('Welcome text to appear in header', 'pet-space'),
				'help'  => esc_html__('Not all headers display this info', 'pet-space'),
			),
			'header_link_1' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Topline link 1', 'pet-space'),
				'help'  => esc_html__('Not all headers display this info', 'pet-space'),
			),
			'header_link_2' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Topline link 2', 'pet-space'),
				'help'  => esc_html__('Not all headers display this info', 'pet-space'),
			),
			'header_text_1' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Header text 1', 'pet-space'),
				'desc'  => esc_html__('Location to appear in header', 'pet-space'),
				'help'  => esc_html__('Not all headers display this info', 'pet-space'),
			),
			'header_subtext_1' => array(
				'type'  => 'text',
				'value' => '',
				'label' => false,
				'desc'  => false,
			),
			'header_text_2' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Header text 2', 'pet-space'),
				'desc'  => esc_html__('Location to appear in header', 'pet-space'),
				'help'  => esc_html__('Not all headers display this info', 'pet-space'),
			),
			'header_subtext_2' => array(
				'type'  => 'text',
				'value' => '',
				'label' => false,
				'desc'  => false,
			),
			'header_text_3' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Header text 3', 'pet-space'),
				'desc'  => esc_html__('Location to appear in header', 'pet-space'),
				'help'  => esc_html__('Not all headers display this info', 'pet-space'),
			),
			'header_subtext_3' => array(
				'type'  => 'text',
				'value' => '',
				'label' => false,
				'desc'  => false,
			),
			'header_text_4' => array(
				'type'  => 'text',
				'value' => '',
				'label' => esc_html__('Header text 4', 'pet-space'),
				'desc'  => esc_html__('Location to appear in header', 'pet-space'),
				'help'  => esc_html__('Not all headers display this info', 'pet-space'),
			),
			'header_subtext_4' => array(
				'type'  => 'text',
				'value' => '',
				'label' => false,
				'desc'  => false,
			),
			//'social_icons'
			$header_social_icons,
			'meta_image' => array(
				'label' => esc_html__('Image for login modal', 'pet-space'),
				'desc'  => esc_html__('Either upload a new, or choose an existing image from your media library', 'pet-space'),
				'type'  => 'upload'
			),
			'meta_image_2' => array(
				'label' => esc_html__('Image for register modal', 'pet-space'),
				'desc'  => esc_html__('Either upload a new, or choose an existing image from your media library', 'pet-space'),
				'type'  => 'upload'
			),
		),
	),
	'breadcrumbs'          => array(
		'title'   => esc_html__('Theme Breadcrumbs', 'pet-space'),
		'options' => array(
			'breadcrumbs_image'            => array(
				'label' => esc_html__('Breadcrumbs Image', 'pet-space'),
				'desc'  => esc_html__('Upload breadcrumbs background image', 'pet-space'),
				'type'  => 'upload'
			)
		)
	),
	'footer'          => array(
		'title'   => esc_html__('Theme Footer', 'pet-space'),
		'options' => array(
			'footer'           => array(
				'label'   => esc_html__('Footer Columns', 'pet-space'),
				'desc'    => esc_html__('Select the number of footer columns', 'pet-space'),
				'type'    => 'short-select',
				'value'   => '1',
				'choices' => array(
					'1' => esc_html__('3 columns', 'pet-space'),
					'2' => esc_html__('4 columns', 'pet-space'),
					'3' => esc_html__('4 different columns', 'pet-space'),
				),
			),
			'footer_color'           => array(
				'label'   => esc_html__('Footer Color', 'pet-space'),
				'desc'    => esc_html__('Select footer color', 'pet-space'),
				'type'    => 'short-select',
				'value'   => 'ds',
				'choices' => array(
					'ds' => esc_html__('Dark', 'pet-space'),
					'ls ms' => esc_html__('Light', 'pet-space'),
				),
			),
			'footer_image'            => array(
				'label' => esc_html__('Footer Image', 'pet-space'),
				'desc'  => esc_html__('Upload a footer image', 'pet-space'),
				'help'  => esc_html__("This default footer image will be used for all theme pages.", "pet-space"),
				'type'  => 'upload'
			),
			'before_footer' => array(
				'type'         => 'switch',
				'value'        => '',
				'label'        => esc_html__('Show before footer section with widgets', 'pet-space'),
				'desc'         => esc_html__('This section is hidden on 404 and front page', 'pet-space'),
				'left-choice'  => array(
					'value' => false,
					'label' => esc_html__('Disabled', 'pet-space'),
				),
				'right-choice' => array(
					'value' => true,
					'label' => esc_html__('Enabled', 'pet-space'),
				),
			),
			'copyrights'      => array(
				'type'    => 'short-select',
				'value'   => '2',
				'label'   => esc_html__('Page copyrights', 'pet-space'),
				'desc'    => esc_html__('Copyrights color.', 'pet-space'),
				'help'    => esc_html__('You can select one of predefined background colors', 'pet-space'),
				'choices' => array(
					'1' => esc_html__('Dark muted', 'pet-space'),
					'2' => esc_html__('Light', 'pet-space'),
					'3' => esc_html__('Color', 'pet-space'),
				),
			),
			'copyrights_text' => array(
				'type'  => 'textarea',
				'value' => '&copy; Copyright 2017 All Rights Reserved',
				'label' => esc_html__('Copyrights text', 'pet-space'),
				'desc'  => esc_html__('Please type your copyrights text', 'pet-space'),
			),
		),
	),
	'fonts_panel'     => array(
		'title'   => esc_html__('Theme Fonts', 'pet-space'),
		'options' => array(
			'body_fonts_section' => array(
				'title'   => esc_html__('Font for body', 'pet-space'),
				'options' => array(
					'body_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'main_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__('Enable', 'pet-space'),
								'desc'         => esc_html__('Enable custom body font', 'pet-space'),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__('Disabled', 'pet-space'),
								),
								'right-choice' => array(
									'value' => 'main_font_options',
									'label' => esc_html__('Enabled', 'pet-space'),
								),
							),
						),
						'choices' => array(
							'main_font_options' => array(
								'main_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Poppins',
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 16,
										'line-height'    => 30,
										'letter-spacing' => 0,
										'color'          => '#323232'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => true,
										'line-height'    => true,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array('class' => 'custom-class', 'data-foo' => 'bar'),
									'label'      => esc_html__('Custom font', 'pet-space'),
									'desc'       => esc_html__('Select custom font for headings', 'pet-space'),
									'help'       => esc_html__('You should enable using custom heading fonts above at first', 'pet-space'),
								),
							),
						),
					),
				),
			),

			'headings_fonts_section' => array(
				'title'   => esc_html__('Font for headings', 'pet-space'),
				'options' => array(
					'h_font_picker_switch' => array(
						'type'    => 'multi-picker',
						'label'   => false,
						'desc'    => false,
						'picker'  => array(
							'h_font_enabled' => array(
								'type'         => 'switch',
								'value'        => '',
								'label'        => esc_html__('Enable', 'pet-space'),
								'desc'         => esc_html__('Enable custom heading font', 'pet-space'),
								'left-choice'  => array(
									'value' => '',
									'label' => esc_html__('Disabled', 'pet-space'),
								),
								'right-choice' => array(
									'value' => 'h_font_options',
									'label' => esc_html__('Enabled', 'pet-space'),
								),
							),
						),
						'choices' => array(
							'h_font_options' => array(
								'h_font' => array(
									'type'       => 'typography-v2',
									'value'      => array(
										'family'         => 'Poppins',
										'subset'         => 'latin-ext',
										'variation'      => 'regular',
										'size'           => 16,
										'line-height'    => 30,
										'letter-spacing' => 0,
										'color'          => '#323232'
									),
									'components' => array(
										'family'         => true,
										// 'style', 'weight', 'subset', 'variation' will appear and disappear along with 'family'
										'size'           => false,
										'line-height'    => false,
										'letter-spacing' => true,
										'color'          => false
									),
									'attr'       => array('class' => 'custom-class', 'data-foo' => 'bar'),
									'label'      => esc_html__('Custom font', 'pet-space'),
									'desc'       => esc_html__('Select custom font for headings', 'pet-space'),
									'help'       => esc_html__('You should enable using custom heading fonts above at first', 'pet-space'),
								),
							),
						),
					),
				),
			),

		),
	),
	'miscellaneous_panel'    => array(
		'title'   => esc_html__('Miscellaneous Options', 'pet-space'),
		'wp-customizer-args' => array(
			'priority' => 899,
		),
		'options' => array(

			'version'         => array(
				'title'   => esc_html__('Theme Variant', 'pet-space'),
				'options' => array(
					'version' => array(
						'type'    => 'radio',
						'value'   => 'light',
						'attr'    => array('class' => 'theme-layout-class', 'data-theme-layout' => 'layout'),
						'label'   => esc_html__('Theme Version', 'pet-space'),
						'desc'    => esc_html__('Light or dark version', 'pet-space'),
						'help'    => esc_html__('Select one of predefined versions', 'pet-space'),
						'choices' => array( // Note: Avoid bool or int keys http://bit.ly/1cQgVzk
							'light' => esc_html__('Light', 'pet-space'),
							'dark'  => esc_html__('Dark', 'pet-space'),
						),
						// Display choices inline instead of list
						'inline'  => true,
					),
				),
			),

			'read_more_section'    => array(
				'title'   => esc_html__('Read More links', 'pet-space'),
				'options' => array(

					'services_read_more' => pet_space_read_more_options(
						esc_html__('Service Read More', 'pet-space'),
						'color4'
					),

					'team_read_more' => pet_space_read_more_options(
						esc_html__('Team Member Read More', 'pet-space'),
						'color3'
					),
				)
			),

			'sliding_section'    => array(
				'title'   => esc_html__('Sliding Speed', 'pet-space'),
				'options' => array(

					'slide_speed' => array(
						'type'  => 'text',
						'value' => '5',
						'label' => esc_html__('Global Sliding Speed', 'pet-space'),
						'desc'  => esc_html__('Applied to all sliders, carousels, testimonials', 'pet-space')
							. '<br>' . esc_html__('( in seconds )', 'pet-space'),
					)
				)
			),

			'share_buttons'   => array(
				'title' => esc_html__('Share Buttons', 'pet-space'),

				'options' => array(
					'share_facebook'    => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__('Enable Facebook Share Button', 'pet-space'),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__('Enabled', 'pet-space'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__('Disabled', 'pet-space'),
						),
					),
					'share_twitter'     => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__('Enable Twitter Share Button', 'pet-space'),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__('Enabled', 'pet-space'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__('Disabled', 'pet-space'),
						),
					),
					'share_pinterest'   => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__('Enable Pinterest Share Button', 'pet-space'),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__('Enabled', 'pet-space'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__('Disabled', 'pet-space'),
						),
					),
					'share_linkedin'    => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__('Enable LinkedIn Share Button', 'pet-space'),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__('Enabled', 'pet-space'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__('Disabled', 'pet-space'),
						),
					),
					'share_tumblr'      => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__('Enable Tumblr Share Button', 'pet-space'),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__('Enabled', 'pet-space'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__('Disabled', 'pet-space'),
						),
					),
					'share_reddit'      => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__('Enable Reddit Share Button', 'pet-space'),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__('Enabled', 'pet-space'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__('Disabled', 'pet-space'),
						),
					),

				),
			),

			'preloader_panel' => array(
				'title' => esc_html__('Theme Preloader', 'pet-space'),

				'options' => array(
					'preloader_enabled' => array(
						'type'         => 'switch',
						'value'        => '1',
						'label'        => esc_html__('Enable Preloader', 'pet-space'),
						'left-choice'  => array(
							'value' => '1',
							'label' => esc_html__('Enabled', 'pet-space'),
						),
						'right-choice' => array(
							'value' => '0',
							'label' => esc_html__('Disabled', 'pet-space'),
						),
					),

					'preloader_image' => array(
						'type'        => 'upload',
						'value'       => '',
						'label'       => esc_html__('Custom preloader image', 'pet-space'),
						'help'        => esc_html__('GIF image recommended. Recommended maximum preloader width 150px, maximum preloader height 150px.', 'pet-space'),
						'images_only' => true,
					),


				),
			),
		)
	),
);
