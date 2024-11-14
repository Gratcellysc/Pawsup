<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'main' => array(
		'type'    => 'box',
		'title'   => '',
		'options' => array(
			'id'       => array(
				'type' => 'unique',
			),
			'builder'  => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Form Fields', 'pet-space' ),
				'options' => array(
					'form' => array(
						'label'        => false,
						'type'         => 'form-builder',
						'value'        => array(
							'json' => apply_filters( 'fw:ext:forms:builder:load-item:form-header-title', true )
								? json_encode( array(
									array(
										'type'      => 'form-header-title',
										'shortcode' => 'form_header_title',
										'width'     => '',
										'options'   => array(
											'title'    => '',
											'subtitle' => '',
										)
									)
								) )
								: '[]'
						),
						'fixed_header' => true,
					),
				),
			),
			'settings' => array(
				'type'    => 'tab',
				'title'   => esc_html__( 'Settings', 'pet-space' ),
				'options' => array(
					'settings-options' => array(
						'title'   => esc_html__( 'Contact Form Options', 'pet-space' ),
						'type'    => 'tab',
						'options' => array(
							'background_color'    => array(
								'type'    => 'select',
								'value'   => 'ls',
								'label'   => esc_html__( 'Form Background color', 'pet-space' ),
								'desc'    => esc_html__( 'Select background color', 'pet-space' ),
								'help'    => esc_html__( 'Select one of predefined background colors', 'pet-space' ),
								'choices' => array(
									''                              => esc_html__( 'No background', 'pet-space' ),
									'with_padding overflow-hidden light_form'               => esc_html__( 'Light', 'pet-space' ),
									'with_padding overflow-hidden transp_black_bg'            => esc_html__( 'Dark', 'pet-space' ),
									'with_padding overflow-hidden color_form'               => esc_html__( 'Main color', 'pet-space' ),
								),
							),
							'field_text_align' => array(
								'type'    => 'select',
								'value'   => 'text-left',
								'label'   => esc_html__( 'Field text alignment', 'pet-space' ),
								'desc'    => esc_html__( 'Select field text alignment', 'pet-space' ),
								'choices' => array(
									'text-left'   => esc_html__( 'Left', 'pet-space' ),
									'text-center' => esc_html__( 'Center', 'pet-space' ),
									'text-right'  => esc_html__( 'Right', 'pet-space' ),
								),
							),
							'columns_padding'     => array(
								'type'    => 'select',
								'value'   => 'columns_padding_15',
								'label'   => esc_html__( 'Column paddings in form', 'pet-space' ),
								'desc'    => esc_html__( 'Choose columns horizontal paddings value', 'pet-space' ),
								'choices' => array(
									'columns_padding_15' => esc_html__( '15 px - default', 'pet-space' ),
									'columns_padding_0'  => esc_html__( '0', 'pet-space' ),
									'columns_padding_1'  => esc_html__( '1 px', 'pet-space' ),
									'columns_padding_2'  => esc_html__( '2 px', 'pet-space' ),
									'columns_padding_5'  => esc_html__( '5 px', 'pet-space' ),
									'columns_padding_10'  => esc_html__( '10 px', 'pet-space' ),
								),
							),
							'form_email_settings' => array(
								'type'    => 'group',
								'options' => array(
									'email_to' => array(
										'type'  => 'text',
										'label' => esc_html__( 'Email To', 'pet-space' ),
										'help'  => esc_html__( 'We recommend you to use an email that you verify often', 'pet-space' ),
										'desc'  => esc_html__( 'The form will be sent to this email address.', 'pet-space' ),
									),
								),
							),
							'form_text_settings'  => array(
								'type'    => 'group',
								'options' => array(
									'subject-group'       => array(
										'type'    => 'group',
										'options' => array(
											'subject_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Subject Message', 'pet-space' ),
												'desc'  => esc_html__( 'This text will be used as subject message for the email', 'pet-space' ),
												'value' => esc_html__( 'Contact Form', 'pet-space' ),
											),
										)
									),
									'submit-button-group' => array(
										'type'    => 'group',
										'options' => array(
											'submit_button_text' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Submit Button', 'pet-space' ),
												'desc'  => esc_html__( 'This text will appear in submit button', 'pet-space' ),
												'value' => esc_html__( 'Send', 'pet-space' ),
											),
											'reset_button_text'  => array(
												'type'  => 'text',
												'label' => esc_html__( 'Reset Button', 'pet-space' ),
												'desc'  => esc_html__( 'This text will appear in reset button. Leave blank if reset button not needed', 'pet-space' ),
												'value' => esc_html__( 'Clear', 'pet-space' ),
											),
											'button_size'      => array(
												'type'         => 'switch',
												'label'        => esc_html__( 'Button size', 'pet-space' ),
												'value'        => '',
												'right-choice' => array(
													'value' => 'wide_button',
													'label' => esc_html__( 'Large', 'pet-space' ),
												),
												'left-choice'  => array(
													'value' => '',
													'label' => esc_html__( 'Normal', 'pet-space' ),
												),
											),
											'button_color'  => array(
												'label'   => esc_html__( 'Button Color', 'pet-space' ),
												'desc'    => esc_html__( 'Choose a color for your button', 'pet-space' ),
												'type'    => 'select',
												'choices' => array(
													'color1'  => esc_html__( 'Color 1', 'pet-space' ),
													'color2'  => esc_html__( 'Color 2', 'pet-space' ),
													'color3'  => esc_html__( 'Color 3', 'pet-space' ),
													'color4'  => esc_html__( 'Color 4', 'pet-space' ),
													'white'   => esc_html__( 'Color white', 'pet-space' ),
													'dark'    => esc_html__( 'Color dark', 'pet-space' ),
												),
											),
											'button_align' => array(
												'type'    => 'select',
												'value'   => 'text-left',
												'label'   => esc_html__( 'Button alignment', 'pet-space' ),
												'desc'    => esc_html__( 'Select button alignment', 'pet-space' ),
												'choices' => array(
													'text-left'   => esc_html__( 'Left', 'pet-space' ),
													'text-center' => esc_html__( 'Center', 'pet-space' ),
													'text-right'  => esc_html__( 'Right', 'pet-space' ),
												),
											),
										)
									),
									'success-group'       => array(
										'type'    => 'group',
										'options' => array(
											'success_message' => array(
												'type'  => 'text',
												'label' => esc_html__( 'Success Message', 'pet-space' ),
												'desc'  => esc_html__( 'This text will be displayed when the form will successfully send', 'pet-space' ),
												'value' => esc_html__( 'Message sent!', 'pet-space' ),
											),
										)
									),
									'failure_message'     => array(
										'type'  => 'text',
										'label' => esc_html__( 'Failure Message', 'pet-space' ),
										'desc'  => esc_html__( 'This text will be displayed when the form will fail to be sent', 'pet-space' ),
										'value' => esc_html__( 'Oops something went wrong.', 'pet-space' ),
									),
								),
							),
						)
					),
					'mailer-options'   => array(
						'title'   => esc_html__( 'Mailer Options', 'pet-space' ),
						'type'    => 'tab',
						'options' => array(
							'mailer' => array(
								'label' => false,
								'type'  => 'mailer'
							)
						)
					)
				),
			),
		),
	)
);