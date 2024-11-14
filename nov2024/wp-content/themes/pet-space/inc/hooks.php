<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * Filters and Actions
 */

if ( ! function_exists( 'pet_space_action_setup' ) ) :
	/**
	 * Theme setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 * @internal
	 */
	function pet_space_action_setup() {

		/*
		 * Make Theme available for translation.
		 */
		load_theme_textdomain( 'pet-space', get_template_directory() . '/languages' );

		add_editor_style( array( 'css/main.css' ) );

		// Add RSS feed links to <head> for posts and comments.
		add_theme_support( 'automatic-feed-links' );

		// Enable support for Post Thumbnails, and declare two sizes.
		add_theme_support( 'post-thumbnails' );

		//Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

        // Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

		set_post_thumbnail_size( 775, 517, true );
		add_image_size( 'pet-space-full-width', 1170, 780, true );
		add_image_size( 'pet-space-small-width', 600, 795, true );
		add_image_size( 'pet-space-square', 600, 600, true );
		add_image_size( 'pet-space-team-member', 370, 358, true );

		//content width
		$GLOBALS['content_width'] = apply_filters( 'pet_space_filter_content_width', 891 );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'standard',
			'aside',
			'chat',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
		) );

		// Declare WooCommerce support
		add_theme_support( 'woocommerce' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );

		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		//5.8 block widgets disable
		remove_theme_support( 'widgets-block-editor' );
	} //pet_space_action_setup()

endif;
add_action( 'after_setup_theme', 'pet_space_action_setup' );


/**
 * Extend the default WordPress body classes.
 *
 * Adds body classes to denote:
 * 1. Single or multiple authors.
 * 2. Presence of header image.
 * 3. Index views.
 * 4. Full-width content layout.
 * 5. Presence of footer widgets.
 * 6. Single views.
 * 7. Featured content layout.
 *
 * @param array $classes A list of existing body class values.
 *
 * @return array The filtered body class list.
 * @internal
 */
if ( !function_exists( 'pet_space_filter_body_classes' ) ) :
	function pet_space_filter_body_classes( $classes ) {
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		if ( get_header_image() ) {
			$classes[] = 'header-image';
		} else {
			$classes[] = 'masthead-fixed';
		}

		if ( is_archive() || is_search() || is_home() ) {
			$classes[] = 'archive-list-view';
		}

		$sidebar_class = 'has-sidebar';
		if ( function_exists( 'fw_ext_sidebars_get_current_position' ) ) {
			$current_position = fw_ext_sidebars_get_current_position();
			if ( in_array( $current_position, array( 'full', 'left' ) )
			     || empty( $current_position )
			     || is_page_template( 'page-templates/full-width.php' )
			     || is_attachment()
			) {
                $sidebar_class = 'full-width';
			}
		} else {
            $sidebar_class = 'full-width';
		}
        $classes[] = $sidebar_class;

		if ( is_active_sidebar( 'sidebar-footer' ) ) {
			$classes[] = 'footer-widgets';
		}

		if ( is_singular() && ! is_front_page() ) {
			$classes[] = 'singular';
		}

		if (defined( 'FW' ) && fw_get_db_post_option( get_the_ID(), 'slider_id', false )) {
			$classes[] = 'with-slider';
		}

		if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
			$classes[] = 'slider';
		} elseif ( is_front_page() ) {
			$classes[] = 'grid';
		}

		/* Body class color */
		$version            = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'light';
		$main_section_class = ( $version !== 'light' ) ? 'dark-body' : 'light-body';
		$classes[] = $main_section_class;

		return $classes;
	} //pet_space_filter_body_classes()
endif;
add_filter( 'body_class', 'pet_space_filter_body_classes' );

//changing default comment form
if ( ! function_exists( 'pet_space_filter_pet_space_contact_form_fields' ) ) :
	function pet_space_filter_pet_space_contact_form_fields( $fields ) {
		$commenter     = wp_get_current_commenter();
		$user          = wp_get_current_user();
		$user_identity = $user->exists() ? $user->display_name : '';
		$req           = get_option( 'require_name_email' );
		$aria_req      = ( $req ? " aria-required='true'" : '' );
		$html_req      = ( $req ? " required='required'" : '' );
		$html5         = 'html5';
		$fields        = array(
			'author'        => '<div class="col-sm-4">
<div class="form-group comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'pet-space' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><i class="fa fa-user highlight3" aria-hidden="true"></i> ' .
			                   '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' placeholder="' . esc_html__( 'Full Name', 'pet-space' ) . '"></div>
			                   </div>',
			'phone'        => '<div class="col-sm-4">
<div class="form-group comment-form-phone">' . '<label for="phone">' . esc_html__( 'Phone Number', 'pet-space' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><i class="fa fa-phone highlight3" aria-hidden="true"></i> ' .
			                   '<input id="phone" class="form-control" name="phone" type="text"  size="30"' . $aria_req . $html_req . ' placeholder="' . esc_html__( 'Phone Number', 'pet-space' ) . '"></div>
			                   </div>',
			'email'         => '<div class="col-sm-4">
<div class="form-group comment-form-email"><label for="email">' . esc_html__( 'Email', 'pet-space' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><i class="fa fa-envelope highlight3" aria-hidden="true"></i> ' .
			                   '<input id="email" class="form-control" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" ' . $aria_req . $html_req . ' placeholder="' . esc_html__( 'Email Address', 'pet-space' ) . '"/></div>
			                   </div>',
			'comment_field' => '<div class="col-sm-12"><div class="form-group comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'pet-space' ) . '</label> <i class="fa fa-comment highlight3" aria-hidden="true"></i><textarea id="comment"  class="form-control" name="comment" cols="45" rows="5"  aria-required="true" required="required"  placeholder="' . esc_html__( 'Comment', 'pet-space' ) . '"></textarea></div></div>',
		);

		return $fields;
	} //pet_space_filter_pet_space_contact_form_fields()

endif;
add_filter( 'comment_form_default_fields', 'pet_space_filter_pet_space_contact_form_fields' );


//changing gallery thumbnail size for entry-thumbnail display
if ( ! function_exists( 'pet_space_filter_fw_shortcode_atts_gallery' ) ) :
	function pet_space_filter_fw_shortcode_atts_gallery( $out, $pairs, $atts ) {
		$out['size'] = 'post-thumbnail';
		return $out;
	} //pet_space_filter_fw_shortcode_atts_gallery()
endif;

if ( ! function_exists( 'pet_space_shortcode_atts_gallery_trigger' ) ) :
	function pet_space_shortcode_atts_gallery_trigger( $add_filter = true ) {
		if ( $add_filter ) {
			add_filter( 'shortcode_atts_gallery', 'pet_space_filter_fw_shortcode_atts_gallery', 10, 3 );
		} else {
			false;
		}
	} //pet_space_shortcode_atts_gallery_trigger()
endif;

//changing events slug
if ( ! function_exists( 'pet_space_filter_fw_ext_events_post_slug' ) ) :
	function pet_space_filter_fw_ext_events_post_slug( $slug ) {
		return 'event';
	} //pet_space_filter_fw_ext_events_post_slug()
endif;
add_filter( 'fw_ext_events_post_slug', 'pet_space_filter_fw_ext_events_post_slug' );

if ( ! function_exists( 'pet_space_filter_fw_ext_events_taxonomy_slug' ) ) :
	function pet_space_filter_fw_ext_events_taxonomy_slug( $slug ) {
		return 'events';
	} //pet_space_filter_fw_ext_events_taxonomy_slug()
endif;
add_filter( 'fw_ext_events_taxonomy_slug', 'pet_space_filter_fw_ext_events_taxonomy_slug' );

//wrapping in a span categories and archives items count
if ( !function_exists('pet_space_filter_add_span_to_arhcive_widget_count') ) :
	function pet_space_filter_add_span_to_arhcive_widget_count( $links ) {
		//for categories widget
		$links = str_replace( '</a> (', '</a> <span class="highlight">(', $links );
		//for archive widget
		$links = str_replace( '&nbsp;(', '</a> <span class="highlight">(', $links );
		$links = preg_replace( '/([0-9]+)\)/', '$1)</span>', $links );

		return $links;
	} //pet_space_filter_add_span_to_arhcive_widget_count()
endif;

//categories
add_filter( 'wp_list_categories', 'pet_space_filter_add_span_to_arhcive_widget_count' );
//arhcive
add_filter( 'get_archives_link', 'pet_space_filter_add_span_to_arhcive_widget_count' );


if ( !function_exists( 'pet_space_filter_monster_widget_text' ) ) :
	function pet_space_filter_monster_widget_text( $text ) {
		$text = str_replace( 'name="monster-widget-just-testing"', 'name="monster-widget-just-testing" class="form-control"', $text );

		return $text;
	}
endif;
add_filter( 'monster-widget-get-text', 'pet_space_filter_monster_widget_text' );


if ( ! function_exists( 'pet_space_filter_add_paged_links_classes' ) ) {
	function pet_space_filter_add_paged_links_classes( $paged_link ) {
		if ( $paged_link && ! is_admin() ) {
			$paged_link = str_replace( '<a', '<a class="theme_button small_button"', $paged_link, $replaces );
			//if page is current
			if ( ! $replaces ) {
				$paged_link = str_replace( '<span class="post-page-numbers', '<span class="theme_button small_button color1 disabled', $paged_link, $replaces );
			}
		}
		return $paged_link;
	}
	add_filter( 'wp_link_pages_link', 'pet_space_filter_add_paged_links_classes' );
}


/**
 * Extend the default WordPress post classes.
 *
 * Adds a post class to denote:
 * Non-password protected page with a post thumbnail.
 *
 * @param array $classes A list of existing post class values.
 *
 * @return array The filtered post class list.
 * @internal
 */
if ( !function_exists( 'pet_space_filter_post_classes' ) ) :
	function pet_space_filter_post_classes( $classes ) {
		if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
			$classes[] = 'has-post-thumbnail';
		}
		return $classes;
	} //pet_space_filter_post_classes()
endif;
add_filter( 'post_class', 'pet_space_filter_post_classes' );

//Remove Booked plugin front-end color theme (color-theme.php)
if( class_exists('booked_plugin')) {
	remove_action( 'wp_enqueue_scripts', array('booked_plugin', 'front_end_color_theme'));
}//Booked

/**
 * Add bootstrap CSS classes to default password protected form.
 *
 *
 * @return string HTML code of password form
 * @internal
 */
if ( !function_exists( 'pet_space_filter_password_form' ) ) :
	function pet_space_filter_password_form( $html ) {
		$label = esc_html__( 'Password', 'pet-space' );
		$html  = str_replace( 'input name="post_password"', 'input class="form-control" name="post_password" placeholder="' . $label . '"', $html );
		$html  = str_replace( 'input type="submit"', 'input class="theme_button" type="submit"', $html );

		return $html;
	} //pet_space_filter_password_form()
endif;
add_filter( 'the_password_form', 'pet_space_filter_password_form' );


/**
 * Add bootstrap CSS class to readmore blog feed anchor.
 *
 *
 * @return string HTML code of password form
 * @internal
 */
if ( !function_exists( 'pet_space_filter_gallery_post_style_owl') ) :
	function pet_space_filter_gallery_post_style_owl( $gallery_html ) {
		if ( $gallery_html && ! is_admin() ) {
			$gallery_html = str_replace( 'gallery ', 'isotope_container ', $gallery_html );
			//if page is current
		}

		return $gallery_html;
	} //pet_space_filter_gallery_post_style_owl()
endif;
add_filter( 'gallery_style', 'pet_space_filter_gallery_post_style_owl' );

/**
 * Flush out the transients used in pet_space_categorized_blog.
 * @internal
 */
if ( !function_exists( 'pet_space_action_category_transient_flusher' ) ) :
	function pet_space_action_category_transient_flusher() {
		delete_transient( 'pet_space_category_count' );
	} //pet_space_action_category_transient_flusher()
endif;
add_action( 'edit_category', 'pet_space_action_category_transient_flusher' );
add_action( 'save_post', 'pet_space_action_category_transient_flusher' );


/**
 * Register widget areas.
 * @internal
 */

if ( !function_exists( 'pet_space_action_widgets_init' ) ) :
	function pet_space_action_widgets_init() {
		register_sidebar( array(
			'name'          => esc_html__( 'Main Widget Area', 'pet-space' ),
			'id'            => 'sidebar-main',
			'description'   => esc_html__( 'Appears in the content section of the site.', 'pet-space' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );



		/* Register footer sidebars by footer layout */
		$footer_layout = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'footer' ) : '1';

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 1', 'pet-space' ),
			'id'            => 'sidebar-footer-1',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'pet-space' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 2', 'pet-space' ),
			'id'            => 'sidebar-footer-2',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'pet-space' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Column 3', 'pet-space' ),
			'id'            => 'sidebar-footer-3',
			'description'   => esc_html__( 'Appears in the footer section of the site.', 'pet-space' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

		if($footer_layout == 2 || $footer_layout == 3) :
			register_sidebar( array(
				'name'          => esc_html__( 'Footer Column 4', 'pet-space' ),
				'id'            => 'sidebar-footer-4',
				'description'   => esc_html__( 'Appears in the footer section of the site.', 'pet-space' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</h3>',
			) );
		endif;

		register_sidebar( array(
			'name'          => esc_html__( 'Before Blog Widget Area', 'pet-space' ),
			'id'            => 'before-blog-sidebar',
			'description'   => esc_html__( 'Appears in the content section of the site.', 'pet-space' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );

        register_sidebar( array(
            'name'          => esc_html__( 'Before Footer Widget Area #1', 'pet-space' ),
            'id'            => 'before-sidebar-footer-1',
            'description'   => esc_html__( 'Appears in the before footer section of the site.', 'pet-space' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Before Footer Widget Area #2', 'pet-space' ),
            'id'            => 'before-sidebar-footer-2',
            'description'   => esc_html__( 'Appears in the before footer section of the site.', 'pet-space' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Before Footer Widget Area #3', 'pet-space' ),
            'id'            => 'before-sidebar-footer-3',
            'description'   => esc_html__( 'Appears in the before footer section of the site.', 'pet-space' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

        register_sidebar( array(
            'name'          => esc_html__( 'Before Footer Widget Area #4', 'pet-space' ),
            'id'            => 'before-sidebar-footer-4',
            'description'   => esc_html__( 'Appears in the before footer section of the site.', 'pet-space' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        ) );

	} //pet_space_action_widgets_init()
endif;
add_action( 'widgets_init', 'pet_space_action_widgets_init' );

/**
 * Processing google fonts customizer options
 */

if ( ! function_exists( 'pet_space_action_process_google_fonts' ) ) :
	function pet_space_action_process_google_fonts() {
		$google_fonts        = fw_get_google_fonts();
		$include_from_google = array();

		$font_body     = fw_get_db_customizer_option( 'main_font' );
		$font_headings = fw_get_db_customizer_option( 'h_font' );

		// if is google font
		if ( isset( $google_fonts[ $font_body['family'] ] ) ) {
			$include_from_google[ $font_body['family'] ] = $google_fonts[ $font_body['family'] ];
		}

		if ( isset( $google_fonts[ $font_headings['family'] ] ) ) {
			$include_from_google[ $font_headings['family'] ] = $google_fonts[ $font_headings['family'] ];
		}

		$google_fonts_links = pet_space_get_remote_fonts( $include_from_google );
		// set a option in db for save google fonts link
		update_option( 'pet_space_google_fonts_link', $google_fonts_links );
	} //pet_space_action_process_google_fonts()

endif;
add_action( 'customize_save_after', 'pet_space_action_process_google_fonts', 999, 2 );

if ( ! function_exists( 'pet_space_get_remote_fonts' ) ) :
	function pet_space_get_remote_fonts( $include_from_google ) {
		/**
		 * Get remote fonts
		 *
		 * @param array $include_from_google
		 */
		if ( ! sizeof( $include_from_google ) ) {
			return '';
		}

		$html = "<link href='http://fonts.googleapis.com/css?family=";

		foreach ( $include_from_google as $font => $styles ) {
			$html .= str_replace( ' ', '+', $font ) . ':' . implode( ',', $styles['variants'] ) . '|';
		}

		$html = substr( $html, 0, - 1 );
		$html .= "' rel='stylesheet' type='text/css'>";

		return $html;
	} //pet_space_get_remote_fonts()
endif;

//admin dashboard styles and scripts
if ( ! function_exists( 'pet_space_action_load_custom_wp_admin_style' ) ) :
	function pet_space_action_load_custom_wp_admin_style() {
		wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/css/admin-style.css', false, PET_SPACE_VERSION );
		wp_enqueue_style( 'custom_wp_admin_css' );

		wp_register_style( 'custom_wp_admin_fonts', get_template_directory_uri() . '/css/fonts.css', false, PET_SPACE_VERSION );
		wp_enqueue_style( 'custom_wp_admin_fonts' );

		if ( defined( 'FW' ) ) {
			wp_enqueue_script(
				'pet-space-dashboard-widget-script',
				get_template_directory_uri() . '/js/dashboard-widget-script.js',
				array( 'jquery' ),
				'1.0',
				false
			);
		}
	} //pet_space_action_load_custom_wp_admin_style()
endif;
add_action( 'admin_enqueue_scripts', 'pet_space_action_load_custom_wp_admin_style' );


// removing woo styles
// Remove each style one by one
if ( !function_exists('pet_space_filter_pet_space_dequeue_styles')) :
	function pet_space_filter_pet_space_dequeue_styles( $enqueue_styles ) {
		unset( $enqueue_styles['woocommerce-general'] );    // Remove the gloss
		unset( $enqueue_styles['woocommerce-layout'] );        // Remove the layout
		unset( $enqueue_styles['woocommerce-smallscreen'] );    // Remove the smallscreen optimisation
		return $enqueue_styles;
	} //pet_space_filter_pet_space_dequeue_styles()
endif;
add_filter( 'woocommerce_enqueue_styles', '__return_false' );


//if Unyson installed - managing main slider and contact form scripts, sidebars
if ( defined( 'FW' ) ):
	//display main slider
	if ( ! function_exists( 'pet_space_action_slider' ) ):

		function pet_space_action_slider() {
			$slider_id = fw_get_db_post_option( get_the_ID(), 'slider_id', false );
			if ( fw_ext( 'slider' ) ) {
				echo fw()->extensions->get( 'slider' )->render_slider( $slider_id, false );
			}

		}

		add_action( 'pet_space_slider', 'pet_space_action_slider' );

	endif;

	//display blog slider
	if ( ! function_exists( 'pet_space_action_blog_slider' ) ):

		function pet_space_action_blog_slider() {

			$blog_slider_options = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'blog_slider_switch' ) : '';
			$blog_slider_enabled = $blog_slider_options['blog_slider_enabled'];
			if( $blog_slider_enabled == 'yes') {
				$slider_id= $blog_slider_options['yes']['slider_id'];
				if ( fw_ext( 'slider' ) ) { ?>
                    <div class="blog-slider col-xs-12"><?php
                        echo fw()->extensions->get( 'slider' )->render_slider( $slider_id, false ); ?>
                    </div><?php
				}
			}

		}

		add_action( 'pet_space_blog_slider', 'pet_space_action_blog_slider' );

	endif;

	/**
	 * Display current submitted FW_Form errors
	 * @return array
	 */
	if ( ! function_exists( 'pet_space_action_display_form_errors' ) ):
		function pet_space_action_display_form_errors() {
			$form = FW_Form::get_submitted();

			if ( ! $form || $form->is_valid() ) {
				return;
			}

			wp_enqueue_script(
				'pet-space-show-form-errors',
				get_template_directory_uri() . '/js/form-errors.js',
				array( 'jquery' ),
				'1.0',
				true
			);

			wp_localize_script( 'pet-space-show-form-errors', '_localized_form_errors', array(
				'errors'  => $form->get_errors(),
				'form_id' => $form->get_id()
			) );
		}
	endif;
	add_action( 'wp_enqueue_scripts', 'pet_space_action_display_form_errors' );


	//removing standard sliders from Unyson - we use our theme slider
	if ( !function_exists( 'pet_space_filter_disable_sliders' ) ) :
		function pet_space_filter_disable_sliders( $sliders ) {
			foreach ( array( 'owl-carousel', 'bx-slider', 'nivo-slider' ) as $name ) {
				$key = array_search( $name, $sliders );
				unset( $sliders[ $key ] );
			}

			return $sliders;
		}
	endif;

	add_filter( 'fw_ext_slider_activated', 'pet_space_filter_disable_sliders' );

	//removing standard fields from Unyson slider - we use our own slider fields
	if ( !function_exists( 'pet_space_slider_population_method_custom_options' ) ) :
		function pet_space_slider_population_method_custom_options( $arr ) {
			/**
			 * Filter for disable standard slider fields for carousel slider
			 *
			 * @param array $arr
			 */
			unset(
				$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['title'],
				$arr['wrapper-population-method-custom']['options']['custom-slides']['slides_options']['desc']
			);

			return $arr;
		}
	endif;
	add_filter( 'fw_ext_theme_slider_population_method_custom_options', 'pet_space_slider_population_method_custom_options' );


	//adding custom sidebar for shop page if WooCommerce active
	if ( class_exists( 'WooCommerce' ) ) :
		if ( !function_exists( 'pet_space_filter_fw_ext_sidebars_add_conditional_tag' ) ) :
			function pet_space_filter_fw_ext_sidebars_add_conditional_tag($conditional_tags) {
				$conditional_tags['is_archive_page_slug'] = array(
					'order_option' => 2, // (optional: default is 1) position in the 'Others' lists in backend
					'check_priority' => 'last', // (optional: default is last, can be changed to 'first') use it to change priority checking conditional tag
					'name' => esc_html__('Products Type - Shop', 'pet-space'), // conditional tag title
					'conditional_tag' => array(
						'callback' => 'is_shop', // existing callback
						'params' => array('products') //parameters for callback
					)
				);

				return $conditional_tags;
			}
		endif;
		add_filter('fw_ext_sidebars_conditional_tags', 'pet_space_filter_fw_ext_sidebars_add_conditional_tag' );

		remove_theme_support( 'wc-product-gallery-zoom' );
		remove_theme_support( 'wc-product-gallery-lightbox' );
		remove_theme_support( 'wc-product-gallery-slider' );
	endif; //WooCommerce

	//theme icon fonts
	if ( ! function_exists( 'pet_space_filter_custom_packs_list' ) ) :
		function pet_space_filter_custom_packs_list($current_packs) {
			/**
			 * $current_packs is an array of pack names.
			 * You should return which one you would like to show in the picker.
			 */
			return array('pet_space_icons', 'font-awesome');
		}
	endif;
	add_filter('fw:option_type:icon-v2:filter_packs', 'pet_space_filter_custom_packs_list');

	if ( ! function_exists( 'pet_space_filter_add_my_icon_pack' ) ) :
		function pet_space_filter_add_my_icon_pack($default_packs) {
			/**
			 * No fear. Defaults packs will be merged in back. You can't remove them.
			 * Changing some flags for them is allowed.
			 */
			return array(
				'pet_space_icons' => array(
					'name'             => 'pet_space_icons', // same as key
					'title'            => 'Seo Boost Icons',
					'css_class_prefix' => 'rt-icon2',
					'css_file'         => get_template_directory() . '/css/fonts.css',
					'css_file_uri'     => get_template_directory_uri() . '/css/fonts.css',
				)
			);
		}
	endif;
	add_filter('fw:option_type:icon-v2:packs', 'pet_space_filter_add_my_icon_pack');

endif; //defined('FW')

//adding custom styles to TinyMCE
// Callback function to insert 'styleselect' into the $buttons array
if ( ! function_exists( 'pet_space_filter_mce_theme_format_insert_button' ) ) :
	function pet_space_filter_mce_theme_format_insert_button( $buttons ) {
		array_unshift( $buttons, 'styleselect' );

		return $buttons;
	} //pet_space_filter_mce_theme_format_insert_button()
endif;
// Register our callback to the appropriate filter
add_filter( 'mce_buttons_2', 'pet_space_filter_mce_theme_format_insert_button' );
// Callback function to filter the MCE settings
if ( ! function_exists( 'pet_space_filter_mce_theme_format_add_styles' ) ) :
	function pet_space_filter_mce_theme_format_add_styles( $init_array ) {
		// Define the style_formats array
		$style_formats = array(
			// Each array child is a format with it's own settings
			array(
				'title'   => esc_html__( 'Excerpt', 'pet-space' ),
				'block'   => 'p',
				'classes' => 'entry-excerpt',
				'wrapper' => false,
			),
			array(
				'title'   => esc_html__( 'Paragraph with dropcap', 'pet-space' ),
				'block'   => 'p',
				'classes' => 'big-first-letter',
				'wrapper' => false,
			),
			array(
				'title'   => esc_html__( 'Main theme color', 'pet-space' ),
				'inline'  => 'span',
				'classes' => 'highlight',
				'wrapper' => false,
			),

		);
		// Insert the array, JSON ENCODED, into 'style_formats'
		$init_array['style_formats'] = json_encode( $style_formats );

		return $init_array;

	} //pet_space_filter_mce_theme_format_add_styles()
endif;
// Attach callback to 'tiny_mce_before_init'
add_filter( 'tiny_mce_before_init', 'pet_space_filter_mce_theme_format_add_styles', 1 );

if ( ! function_exists( 'pet_space_include_file_from_child' ) ) :
	/**
	 * Include a file first from child if exist else from parent
	 */
	function pet_space_include_file_from_child( $file ) {
		if ( file_exists( get_stylesheet_directory() . $file ) ) {
			return get_stylesheet_directory_uri() . $file;
		} else {
			return get_template_directory_uri() . $file;
		}
	}
endif;

// Highlight widget title first word
if ( ! function_exists( 'pet_space_widget_title_first_word' ) ) :
	function pet_space_widget_title_first_word( $title ) {
		if ( ! empty ( $title ) ) {
			$title_parts = explode( ' ', $title, 2 );
			// Cut the title to 2 parts
			if (count($title_parts) > 1 ) {
				// Throw first word inside a span
				$title = '<span class="first-word">' . $title_parts[0] . '</span>';

				// Add the remaining words if any
				if ( isset( $title_parts[1] ) ) {
					$title .= ' ' . $title_parts[1];
				}
			}
			return $title;
		} else {
			return false;
		}
	}
	add_filter( 'widget_title', 'pet_space_widget_title_first_word' );
endif;

// Highlight widget title last word
if ( ! function_exists( 'pet_space_widget_title_last_word' ) ) :
	function pet_space_widget_title_last_word( $title ) {
		if ( ! empty ( $title ) ) {
			$title_parts = explode( ' ', $title);
			if (count($title_parts) > 1 ) {
				$title_parts[count($title_parts)-1] = '<span class="last-word">'.($title_parts[count($title_parts)-1]).'</span>';
				$title = implode(' ', $title_parts);
			}
			return $title;
		} else {
			return false;
		}
	}
	add_filter( 'widget_title', 'pet_space_widget_title_last_word' );
endif;


/**
 * Add  excerpt length 15 words
 */
if ( ! function_exists( 'pet_space_custom_excerpt_length' ) ) :
function pet_space_custom_excerpt_length( $length ) {
	if ($post_type = 'fw-portfolio') {
		return 20;
	} else {
		return 15;
	}
}
add_filter( 'excerpt_length', 'pet_space_custom_excerpt_length', 999 );
endif;

/**
 * Remove excerpt dots [...]
 */
if ( ! function_exists( 'pet_space_excerpt_more' ) ) :
	function pet_space_excerpt_more( $more ) {
		return '';
	}
	add_filter('excerpt_more', 'pet_space_excerpt_more');
endif;

/* Hiding category and archives titles */
if ( ! function_exists( 'pet_space_filter_fix_cat_title' ) ) :
	function pet_space_filter_fix_cat_title($title) {
		return preg_replace('/^.*: /', '<span class="taxonomy-name-title">${0}</span>', $title );
	}
	add_filter('get_the_archive_title', 'pet_space_filter_fix_cat_title');
endif;

//demo content on remote hosting
/**
 * @param FW_Ext_Backups_Demo[] $demos
 *
 * @return FW_Ext_Backups_Demo[]
 */
if ( ! function_exists( 'pet_space_filter_theme_fw_ext_backups_demos' ) ) :

	function pet_space_filter_theme_fw_ext_backups_demos( $demos ) {

        if ( class_exists( 'FW_Ext_Backups_Demo' ) ) :

            // ids
            $demo_version_suffix = '-v' . PET_SPACE_REMOTE_DEMO_VERSION; // '-v1.1.1'
            // You may request this demo id from this theme author to get a colorized demo content. See the author contacts information.
            $secret_demo_id = PET_SPACE_REMOTE_DEMO_ID; // as example: '12345678'

            // Demo ( Blurred )
            $demo_id = 'pet-space-demo' . $demo_version_suffix;
            $demos_array = array(
                $demo_id => array (
                    'title'        => esc_html__( 'Pet Space Demo', 'pet-space' ),
                    'screenshot'   => esc_url( 'http://webdesign-finder.com/pet-space/demo/screenshot.png' ),
                    'preview_link' => esc_url( 'http://webdesign-finder.com/pet-space/' ),
                ),
            );

            // Demo ( Colorized )
            $demo_colorized_id = 'pet-space-demo-colorized-' . $secret_demo_id . $demo_version_suffix;
            if ( $secret_demo_id ) {
                $demos_array[ $demo_colorized_id ] = array(
                    'title'         => esc_html__('Pet Space Demo (Colorized)', 'pet-space'),
                    'screenshot'    => esc_url( 'http://webdesign-finder.com/pet-space/demo/screenshot.png' ),
                    'preview_link'  => esc_url( 'http://webdesign-finder.com/pet-space/' ),
                );
            }

            // Demo Variants
            foreach ( array( 'hotel', 'school', 'clinic', 'shop' ) as $demo_variant ) {

                // Demo Variants ( Blurred )
                $demo_id = 'pet-space-' . $demo_variant . '-demo' . $demo_version_suffix;
                $demos_array[ $demo_id ] = array(
                    'title'         => esc_html__( 'Pet ', 'pet-space' ) . ucwords( $demo_variant, " \t\r\n\f\v-" ) . esc_html__( ' Demo', 'pet-space' ),
                    'screenshot'    => esc_url( 'http://webdesign-finder.com/pet-space/demo/screenshot-' . $demo_variant . '.png' ),
                    'preview_link'  => esc_url( 'http://webdesign-finder.com/pet-space-' . $demo_variant ),
                );

                // Demo Variants ( Colorized )
                if ( $secret_demo_id ) {
                    $demo_colorized_id = 'pet-space-' . $demo_variant . '-demo-colorized-' . $secret_demo_id . $demo_version_suffix;
                    $demos_array[ $demo_colorized_id ] = array(
                        'title'         => esc_html__( 'Pet ', 'pet-space' ) . ucwords( $demo_variant, " \t\r\n\f\v-" ) . esc_html__( ' Demo (Colorized)', 'pet-space' ),
                        'screenshot'    => 'http://webdesign-finder.com/pet-space/demo/screenshot-' . $demo_variant . '.png',
                        'preview_link'  => 'http://webdesign-finder.com/pet-space-' . $demo_variant,
                    );
                }
            }

            // remote demo URL
            $download_url = esc_url('http://webdesign-finder.com/pet-space/demo/');

            // demo array
            foreach ( $demos_array as $id => $data ) {
                $demo = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
                    'url'     => $download_url,
                    'file_id' => $id,
                ) );
                $demo->set_title( $data['title'] );
                $demo->set_screenshot( $data['screenshot'] );
                $demo->set_preview_link( $data['preview_link'] );

                $demos[ $demo->get_id() ] = $demo;

                unset( $demo );
            }

            return $demos;

        endif; //class_exists
    } //pet_space_filter_theme_fw_ext_backups_demos()
endif;
add_filter( 'fw:ext:backups-demo:demos', 'pet_space_filter_theme_fw_ext_backups_demos' );

// disable update notification for plugins that need to keep most compatible version
function pet_space_filter_remove_update_notifications( $value ) {

	if ( isset( $value ) && is_object( $value ) ) {
		// woocommerce notice hidding removed
		unset( $value->response[ 'booked/booked.php' ] );
	}

	return $value;
}
//flush rewrite rules and recompile scss file after demo content installation
if ( !function_exists( 'pet_space_action_flush_rewrite_rules' ) ) :
	function pet_space_action_flush_rewrite_rules() {
		flush_rewrite_rules();
	}
endif;
add_action( 'fw:ext:backups:tasks:finish:id:demo-content-install', 'pet_space_action_flush_rewrite_rules' );

if ( ! function_exists( 'mwt_get_slide_speed' ) ):
	/**
	 * Retrieve global sliding speed.
	 */
	function mwt_get_slide_speed( $default = 5000 ) {

		return function_exists( 'fw_get_db_customizer_option' )
			? ( (int) fw_get_db_customizer_option( 'slide_speed' ) ) * 1000 : $default;
	}
endif;

if ( ! function_exists( 'mwt_slide_speed' ) ):
	/**
	 * Output global sliding speed.
	 */
	function mwt_slide_speed( $default = 5000 ) {

		echo esc_attr( mwt_get_slide_speed( $default ) );
	}
endif;

// registration form
if ( ! function_exists( 'mwt_registration_form' ) ):
    function mwt_registration_form() {
        ?>
        <?php
        $user_login = '';
        $user_email = '';
        $user_password = '';
        $registration_redirect = ! empty( $_REQUEST['redirect_to'] ) ? $_REQUEST['redirect_to'] : '';
        $redirect_to = apply_filters( 'registration_redirect', $registration_redirect );
        ?>

        <form name="registerform" id="registerform" action="<?php echo esc_url( site_url( 'wp-login.php?action=register', 'login_post' ) ); ?>" method="post" novalidate="novalidate">
            <p class="login-user">
                <i class="fa fa-user-o"></i>
                <input type="text" name="user_login" id="user_login_modal" placeholder="<?php esc_attr_e( 'Full name', 'pet-space' ); ?>" class="input" value="<?php echo esc_attr( wp_unslash( $user_login ) ); ?>" size="20" autocapitalize="off" />
            </p>
            <p class="login-username">
                <i class="fa fa-envelope-o"></i>
                <input type="email" name="user_email" id="user_email" placeholder="<?php esc_attr_e( 'Email address', 'pet-space' ); ?>" class="input" value="<?php echo esc_attr( wp_unslash( $user_email ) ); ?>" size="25" />
            </p>
            <p class="login-password">
                <i class="fa fa-lock"></i>
                <input type="password" name="pwd" id="user_password" placeholder="<?php esc_attr_e( 'Password', 'pet-space' ); ?>" class="input" value="<?php echo esc_attr( wp_unslash( $user_password ) ); ?>" size="25" />
            </p>
            <?php
            /**
             * Fires following the 'Email' field in the user registration form.
             *
             * @since 2.1.0
             */
            do_action( 'register_form' );
            ?>
            <br class="clear" />
            <input type="hidden" name="redirect_to" value="<?php echo esc_attr( $redirect_to ); ?>" />
            <p class="submit"><button type="submit" name="wp-submit" id="wp-submit-modal" class="theme_button color1"><?php esc_attr_e( 'Sign up', 'pet-space' ); ?></button></p>
        </form>
        <?php
        return;
    }
endif; //function_exists
add_action( 'user_registration_form', 'mwt_registration_form' );