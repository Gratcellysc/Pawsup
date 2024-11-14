<?php
/**
 * Dynamic colors
 */

//current selected colors for customizer.php
if ( ! function_exists( 'pet_space_get_theme_current_colors' ) ) :
	function pet_space_get_theme_current_colors() {
		/* Colors */
		$current_colors = array(
			'accent_color_1' => function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'accent_color_1' ) : '#026dfe',
			'accent_color_2' => function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'accent_color_2' ) : '#ff9600',
			'accent_color_3' => function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'accent_color_3' ) : '#1cac00',
			'accent_color_4' => function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'accent_color_4' ) : '#1cac00'
		);
		return apply_filters( 'pet_space_theme_current_colors', $current_colors );
	}
endif;


//load live reload colors script
add_action('customize_controls_enqueue_scripts', 'pet_space_action_customizer_enqueue_scss_compile_script');
if ( ! function_exists( 'pet_space_action_customizer_enqueue_scss_compile_script' ) ) :
	function pet_space_action_customizer_enqueue_scss_compile_script() {

		wp_register_script(
			'pet-space-customizer-scss',
			PET_SPACE_THEME_URI . '/js/theme-customizer-scss.js',
			array( 'jquery','customize-preview' ),
            PET_SPACE_VERSION,
			true
		);

		wp_localize_script('pet-space-customizer', 'newtheeme_customizer_text', array(
			'button_text' => esc_html__( 'Override first color scheme!', 'pet-space' ),
			'button_reset_text' => esc_html__( 'Reset first color scheme', 'pet-space' ),
			'error_text' => esc_html__( 'Error. Did you set up your WP SCSS plugin directories correctly?', 'pet-space' ),
		));

		wp_enqueue_script(
			'pet-space-customizer-scss'
		);
	}
endif;

