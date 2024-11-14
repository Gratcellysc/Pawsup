<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

if ( !function_exists( 'pet_space_child_cfg_parent_css' ) ):
	function pet_space_child_cfg_parent_css() {
        wp_enqueue_style( 'pet-space-child-main', get_theme_file_uri( '/style.css' ), array( 'pet-space-main' ), PET_SPACE_VERSION );
    }
endif;
add_action( 'wp_enqueue_scripts', 'pet_space_child_cfg_parent_css', 21 );
