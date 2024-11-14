<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Include static files: javascript and css
 */

//removing default font awesome css style - we using our "fonts.css" file which contain font awesome
wp_deregister_style( 'fw-font-awesome' );

//Add Theme Fonts
wp_enqueue_style(
	'pet-space-icon-fonts',
	get_template_directory_uri() . '/css/fonts.css',
	array(),
	PET_SPACE_VERSION
);

if ( is_admin_bar_showing() ) {
	//Add Frontend admin styles
	wp_register_style(
		'pet-space-admin_bar',
		get_template_directory_uri() . '/css/admin-frontend.css',
		array(),
		PET_SPACE_VERSION
	);
	wp_enqueue_style( 'pet-space-admin_bar' );
}

//styles and scripts below only for frontend: if in dashboard - exit
if ( is_admin() ) {
	return;
}

/**
 * Enqueue scripts and styles for the front end.
 */
// Add theme google font, used in the main stylesheet.
wp_enqueue_style(
	'pet-space-font',
	pet_space_google_font_url(),
	array(),
	PET_SPACE_VERSION
);

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

if ( is_singular() && wp_attachment_is_image() ) {
	wp_enqueue_script(
		'pet-space-keyboard-image-navigation',
		get_template_directory_uri() . '/js/keyboard-image-navigation.js',
		array( 'jquery' ),
		PET_SPACE_VERSION
	);
}

//plugins theme script
wp_enqueue_script(
	'pet-space-modernizr',
	get_template_directory_uri() . '/js/vendor/modernizr-2.6.2.min.js',
	false,
	'2.6.2',
	false
);

wp_enqueue_script( 'bootstrap',            PET_SPACE_THEME_URI . '/js/vendor/bootstrap.min.js', array( 'jquery' ),            PET_SPACE_VERSION, true );
wp_enqueue_script( 'appear',               PET_SPACE_THEME_URI . '/js/vendor/jquery.appear.js', array( 'jquery' ),            PET_SPACE_VERSION, true );
wp_enqueue_script( 'hoverIntent',          PET_SPACE_THEME_URI . '/js/vendor/jquery.hoverIntent.js', array( 'jquery' ),       PET_SPACE_VERSION, true );
wp_enqueue_script( 'superfish',            PET_SPACE_THEME_URI . '/js/vendor/superfish.js', array( 'jquery' ),                PET_SPACE_VERSION, true );
wp_enqueue_script( 'easing',               PET_SPACE_THEME_URI . '/js/vendor/jquery.easing.1.3.js', array( 'jquery' ),        PET_SPACE_VERSION, true );
wp_enqueue_script( 'totop',                PET_SPACE_THEME_URI . '/js/vendor/jquery.ui.totop.js', array( 'jquery' ),          PET_SPACE_VERSION, true );
wp_enqueue_script( 'localScroll',          PET_SPACE_THEME_URI . '/js/vendor/jquery.localScroll.min.js', array( 'jquery' ),   PET_SPACE_VERSION, true );
wp_enqueue_script( 'scrollTo',             PET_SPACE_THEME_URI . '/js/vendor/jquery.scrollTo.min.js', array( 'jquery' ),      PET_SPACE_VERSION, true );
wp_enqueue_script( 'scrollbar',            PET_SPACE_THEME_URI . '/js/vendor/jquery.scrollbar.min.js', array( 'jquery' ),     PET_SPACE_VERSION, true );
wp_enqueue_script( 'parallax',             PET_SPACE_THEME_URI . '/js/vendor/jquery.parallax-1.1.3.js', array( 'jquery' ),    PET_SPACE_VERSION, true );
wp_enqueue_script( 'easypiechart',         PET_SPACE_THEME_URI . '/js/vendor/jquery.easypiechart.min.js', array( 'jquery' ),  PET_SPACE_VERSION, true );
wp_enqueue_script( 'bootstrap-progressbar',PET_SPACE_THEME_URI . '/js/vendor/bootstrap-progressbar.min.js', array( 'jquery' ),PET_SPACE_VERSION, true );
wp_enqueue_script( 'countTo',              PET_SPACE_THEME_URI . '/js/vendor/jquery.countTo.js', array( 'jquery' ),           PET_SPACE_VERSION, true );
wp_enqueue_script( 'prettyPhoto-vendor',   PET_SPACE_THEME_URI . '/js/vendor/jquery.prettyPhoto.js', array( 'jquery' ),       PET_SPACE_VERSION, true );
wp_enqueue_script( 'countdown',            PET_SPACE_THEME_URI . '/js/vendor/jquery.countdown.min.js', array( 'jquery' ),     PET_SPACE_VERSION, true );
wp_enqueue_script( 'isotope',              PET_SPACE_THEME_URI . '/js/vendor/isotope.pkgd.min.js', array( 'jquery' ),         PET_SPACE_VERSION, true );
wp_enqueue_script( 'owl-carousel',         PET_SPACE_THEME_URI . '/js/vendor/owl.carousel.min.js', array( 'jquery' ),         PET_SPACE_VERSION, true );
wp_enqueue_script( 'flexslider',           PET_SPACE_THEME_URI . '/js/vendor/jquery.flexslider-min.js', array( 'jquery' ),    PET_SPACE_VERSION, true );

//custom plugins theme script
wp_enqueue_script(
	'pet-space-plugins',
	get_template_directory_uri() . '/js/plugins.js',
	array( 'jquery' ),
	PET_SPACE_VERSION,
	true
);


//getting theme color scheme number
$color_scheme_number = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'color_scheme_number' ) : '';
//get template part from ULR - for demo
if ( isset( $_GET[ 'color' ] ) ) {
	$color_scheme_number = ( int ) $_GET[ 'color' ];
}

//if WooCommerce - remove prettyPhoto - we have one in "compressed.js"
if ( class_exists( 'WooCommerce' ) ) :
	wp_dequeue_script( 'prettyPhoto' );
	wp_dequeue_script( 'prettyPhoto-init' );
	wp_deregister_style( 'woocommerce_prettyPhoto_css' );

	// Add Theme Woo Styles and Scripts
	wp_enqueue_style(
		'pet-space-woo',
		get_template_directory_uri() . '/css/woo' . esc_attr( $color_scheme_number ) . '.css',
		array(),
		PET_SPACE_VERSION
	);

	wp_enqueue_script(
		'pet-space-woo',
		get_template_directory_uri() . '/js/woo.js',
		array( 'jquery' ),
		PET_SPACE_VERSION,
		true
	);
endif; //WooCommerce

//Add Theme Booked Styles
if( class_exists('booked_plugin')) {
	wp_dequeue_style('booked-styles');
	wp_dequeue_style('booked-responsive');
	wp_enqueue_style(
		'pet-space-booked',
		get_template_directory_uri() . '/css/booked' . esc_attr( $color_scheme_number ) . '.css',
		array(),
		PET_SPACE_VERSION
	);
}//Booked

//main theme script
wp_enqueue_script(
	'pet-space-main',
	get_template_directory_uri() . '/js/main.js',
	array( 'jquery' ),
	PET_SPACE_VERSION,
	true
);

//if AccessPress is active
if ( class_exists( 'SC_Class' ) ) :
	wp_deregister_style( 'fontawesome-css' );
	wp_deregister_style( 'apsc-frontend-css' );
	wp_enqueue_style(
		'pet-space-accesspress',
		get_template_directory_uri() . '/css/accesspress.css',
		array(),
		PET_SPACE_VERSION
	);
endif; //AccessPress

// Add Theme stylesheet.
wp_enqueue_style( 'pet-space-css-style', get_stylesheet_uri() );

// Add Bootstrap Style
wp_enqueue_style(
	'pet-space-bootstrap',
	get_template_directory_uri() . '/css/bootstrap.min.css',
	array(),
	PET_SPACE_VERSION
);

// Add Animations Style
wp_enqueue_style(
	'pet-space-animations',
	get_template_directory_uri() . '/css/animations.css',
	array(),
	PET_SPACE_VERSION
);


// Add Theme Style
wp_enqueue_style(
	'pet-space-main',
	get_template_directory_uri() . '/css/main' . esc_attr( $color_scheme_number ) . '.css',
	array(),
	PET_SPACE_VERSION
);

wp_add_inline_style( 'pet-space-main', pet_space_add_font_styles_in_head() );
// Add ":root" colors inline styles string
$pet_space_colors_string = pet_space_get_root_colors_inline_styles_string();
if ( ! empty( $pet_space_colors_string ) ) {
	wp_add_inline_style(
		'pet-space-main',
		wp_kses(
			':root{' . $pet_space_colors_string . '}',
			false
		)
	);
}
