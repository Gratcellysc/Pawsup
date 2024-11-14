<?php if (!defined('ABSPATH')) {
	die('Direct access forbidden.');
}

//del <p> and <br/> form
add_filter('wpcf7_autop_or_not', '__return_false');

$wpTheme = wp_get_theme();
define('PET_SPACE_VERSION', $wpTheme->get('Version'));

//Since WP v4.7 using new functions
//https://developer.wordpress.org/themes/basics/linking-theme-files-directories/#linking-to-theme-directories
define('PET_SPACE_THEME_URI', get_parent_theme_file_uri());
define('PET_SPACE_THEME_PATH', get_parent_theme_file_path());

// You may request this demo id from this theme author to get a colorized demo content.
// See the Theme support service contacts information.
define('PET_SPACE_REMOTE_DEMO_ID', '');
define('PET_SPACE_REMOTE_DEMO_VERSION', '1.2.0');

/**
 * Theme Includes
 *
 * https://github.com/ThemeFuse/Theme-Includes
 */
require_once get_template_directory() . '/inc/init.php';

/**
 * TGM Plugin Activation
 */
if (!class_exists('TGM_Plugin_Activation')) {
	/**
	 * Include the TGM_Plugin_Activation class.
	 */
	require_once get_template_directory() . '/inc/tgm-plugin-activation/class-tgm-plugin-activation.php';
}

add_action('tgmpa_register', 'pet_space_action_register_required_plugins');


if (!function_exists('pet_space_action_register_required_plugins')) :
	/** @internal */
	function pet_space_action_register_required_plugins()
	{
		$plugins = array(
			array(
				'name'             => esc_html__('Unyson', 'pet-space'),
				'slug'             => 'unyson',
				'source'           => esc_url('http://webdesign-finder.com/remote-demo-content/common-plugins-original/unyson-v2.7.28.zip'),
				'required'         => true,
			),
			array(
				'name'             => esc_html__('MailChimp', 'pet-space'),
				'slug'             => 'mailchimp-for-wp',
				'required'         => true,
			),
			array(
				'name'             => esc_html__('MWTemplates Theme Addons', 'pet-space'),
				'slug'             => 'mwt-addons',
				'source'           => 'http://webdesign-finder.com/pet-space/plugins/mwt-addons.zip',
				'required'         => true,
				'version'          => '1.1',
			),
			array(
				'name'             => esc_html__('Woocommerce', 'pet-space'),
				'slug'             => 'woocommerce',
				//woo custom source for v3.2.6 removed
				'required'         => false,
			),
			array(
				'name'             => esc_html__('Contact Form 7', 'pet-space'),
				'slug'             => 'contact-form-7',
				'required'         => true,
			),
			array(
				'name'             => esc_html__('Booked plugin', 'pet-space'),
				'slug'             => 'booked',
				'source'           => esc_url('http://webdesign-finder.com/remote-demo-content/common-plugins-original/plugins/booked.zip'),
				'required'         => false,
			),
			array(
				'name'     		   => esc_html__('Font Awesome', 'pet-space'),
				'slug'     	 	   => 'font-awesome',
				'required' 		   => true,
			),
			array(
				'name'             => esc_html__('Envato Market', 'pet-space'),
				'slug'             => 'envato-market',
				'source'           => 'https://envato.github.io/wp-envato-market/dist/envato-market.zip',
				'required'         => false,
			),
			array(
				'name'    			   => esc_html__('User custom avatar', 'pet-space'),
				'slug'    			   => 'wp-user-avatar',
				'required'             => false,
			),
			array(
				'name'     				=> esc_html__('Wp Social', 'human-consult'),
				'slug'     				=> 'wp-social',
				'required' 				=> true,
			),
			array(
				'name'             => esc_html__('Snazzy Maps', 'pet-space'),
				'slug'             => 'snazzy-maps',
				'source'   		   => esc_url('http://webdesign-finder.com/remote-demo-content/common-plugins-original/plugins/snazzy_maps.zip'),
				'required'         => true,
			),
			array(
				'name'     		   => esc_html__('Widget CSS Classes', 'pet-space'),
				'slug'     		   => 'widget-css-classes',
				'required'         => false,
			),
			array(
				'name'     => esc_html__('WooCommerce Cart', 'pet-space'),
				'slug'     => 'side-cart-woocommerce',
				'required' => false,
			),
			array(
				'name'     => esc_html__('Classic Editor', 'pet-space'),
				'slug'     => 'classic-editor',
				'required' => true,
			),
			array(
				'name'     => esc_html__('YITH WooCommerce Quick View', 'pet-space'),
				'slug'     => 'yith-woocommerce-quick-view',
				'required' => true,
			),
			array(
				'name'     => esc_html__('Unyson WooComerce Shortcodes', 'pet-space'),
				'slug'     => 'uws-unyson-woocommerce-shortcodes',
				'required' => false,
			),
			array(
				'name'     => esc_html__('YITH WooCommerce Wishlist', 'pet-space'),
				'slug'     => 'yith-woocommerce-wishlist',
				'required' => false,
			),
			array(
				'name'     => esc_html__('Comment Form Js Validation', 'pet-space'),
				'slug'     => 'comment-form-js-validation',
				'required' => true,
			),
		);
		$config = array(
			'domain'       => 'pet-space',
			'dismissable'  => true,
			'is_automatic' => false
		);
		tgmpa($plugins, $config);
	}
endif;
