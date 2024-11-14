<?php

if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

//remove page title in shop page
add_filter( 'woocommerce_show_page_title', 'pet_space_filter_remove_shop_title_in_content' );
if ( ! function_exists( 'pet_space_filter_remove_shop_title_in_content' ) ) :
	function pet_space_filter_remove_shop_title_in_content() {
		return false;
	}
endif;

//remove wrappers
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

//wrap in col-sm- and .columns-2 all products on shop page
add_action( 'woocommerce_before_shop_loop', 'pet_space_action_echo_div_columns_before_shop_loop' );
if ( ! function_exists( 'pet_space_action_echo_div_columns_before_shop_loop' ) ) :
	function pet_space_action_echo_div_columns_before_shop_loop() {
		$column_classes = pet_space_get_columns_classes();
		$columns_amount = ( $column_classes[ 'main_column_class' ] === 'col-sm-12' ) ? 3 : 2;

		//fix for Woo v3.3
		if( function_exists( 'wc_get_loop_prop') ) {
			$columns_amount = wc_get_loop_prop( 'columns', $columns_amount );
		}

		echo '<div id="content_products" class="' . esc_attr( $column_classes[ 'main_column_class' ] ) . '">';
		echo '<div class="columns-' . esc_attr( apply_filters( 'loop_shop_columns', $columns_amount ) ) . '">';
	}
endif;

//before shop loop - removing breadcrumbs and results count
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
//wrapping sort form in div and adding view toggle button
add_action( 'woocommerce_before_shop_loop', 'pet_space_action_before_shop_loop_wrap_form', 15 );
if ( ! function_exists( 'pet_space_action_before_shop_loop_wrap_form' ) ) :
	function pet_space_action_before_shop_loop_wrap_form() {
		echo '<div class="storefront-sorting bottommargin_30 clearfix">';
	}
endif;

add_action( 'woocommerce_before_shop_loop', 'pet_space_action_before_shop_loop_wrap_form_close', 40 );
if ( ! function_exists( 'pet_space_action_before_shop_loop_wrap_form_close' ) ) :
	function pet_space_action_before_shop_loop_wrap_form_close() {
		woocommerce_result_count();
		echo '</div>';
	}
endif;

//start loop - adding classes to products ul
global $woocommerce;
if ( !empty( $woocommerce )) :
	if ( version_compare( $woocommerce->version, '3.3', "<" ) ) :
		if ( ! function_exists( 'woocommerce_product_loop_start' ) ) :
			function woocommerce_product_loop_start( $echo = true ) {
				$custom_class = 'isotope_container';
				if ( ! is_singular('product') ) {
					$custom_class .= '--tc:HIDE';
				}
				//id products is necessary for scripts
				$html                                = '<ul class="products list-unstyled grid-view ' . esc_attr( $custom_class ) .'">';
				$GLOBALS['woocommerce_loop']['loop'] = 0;
				if ( $echo ) {
					echo wp_kses_post( $html );
				} else {
					return $html;
				}
			}
		endif;
	else:
		add_filter( 'woocommerce_product_loop_start', 'solar_filter_products_product_loop_start' );

		if ( ! function_exists( 'solar_filter_products_product_loop_start' ) ) :
			function solar_filter_products_product_loop_start( $html ) {
				$custom_class = 'isotope_container';
				if ( ! is_singular('product') ) {
					$custom_class .= '--tc:HIDE';
				}
				return str_replace( '<ul class="products', '<ul class="products list-unstyled grid-view ' . esc_attr( $custom_class ) . ' ', $html );
			}
		endif;
	endif;
endif;

//loop pagination
//closing main column and getting sidebar if exist
remove_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination' );
add_action( 'woocommerce_after_shop_loop', 'pet_space_action_echo_div_columns_after_shop_loop' );
if ( ! function_exists( 'pet_space_action_echo_div_columns_after_shop_loop' ) ):
	function pet_space_action_echo_div_columns_after_shop_loop() {
		echo '</div><!-- eof .columns-2 -->';
		$pagination_html = pet_space_bootstrap_paginate_links();
		if ( $pagination_html ) {
			echo '<div class="text-center">';
			echo wp_kses_post( $pagination_html );
			echo '</div>';
		}
		echo '</div><!-- eof #content_products -->';
		$column_classes = pet_space_get_columns_classes();
		if ( $column_classes[ 'sidebar_class' ] ): ?>
			<!-- main aside sidebar -->
			<aside class="<?php echo esc_attr( $column_classes[ 'sidebar_class' ] ); ?>">
				<?php get_sidebar(); ?>
			</aside>
			<!-- eof main aside sidebar -->
			<?php
		endif;
	}
endif;

// single product in shop loop
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

//start of loop item
add_action( 'woocommerce_before_shop_loop_item', 'pet_space_action_echo_markup_before_shop_loop_item' );
if ( ! function_exists( 'pet_space_action_echo_markup_before_shop_loop_item' ) ):
	function pet_space_action_echo_markup_before_shop_loop_item() {
		echo '<div class="vertical-item content-padding text-center with_shadow rounded">';
		echo '<div class="item-media with_background img-wrap">';
		woocommerce_template_loop_product_link_open();
        woocommerce_template_loop_product_thumbnail();
	}
endif;

add_action( 'woocommerce_after_shop_loop_item_title', 'pet_space_action_echo_markup_after_shop_loop_item_title' );
if ( ! function_exists( 'pet_space_action_echo_markup_after_shop_loop_item_title' ) ):
	function pet_space_action_echo_markup_after_shop_loop_item_title() {
		woocommerce_template_loop_product_link_close();
        // Button Add to Cart
        if ( class_exists('YITH_WCQV') ) {
            echo '<div class="button-wrap">';
            //woocommerce_template_loop_add_to_cart();
            echo do_shortcode('[yith_quick_view]');
            echo '</div>';
        }
		echo '</div> <!-- eof .item-media -->';
		echo '<div class="item-content">';

		//product short description
		woocommerce_template_loop_product_link_open();
		woocommerce_template_loop_product_title();
		woocommerce_template_loop_product_link_close();
		woocommerce_template_loop_price();
		global $post;
//		echo apply_filters( 'woocommerce_short_description', $post->post_excerpt );
		woocommerce_template_loop_add_to_cart();

		//Product rating
		if ( ! ( get_option( 'woocommerce_enable_review_rating' ) === 'no' ) ) {
			global $product;
			global $woocommerce;
			if ( version_compare( $woocommerce->version, '3.0', "<" ) ) {
				if ( $rating_html = $product->get_rating_html() ) :
					echo '<h4>' . esc_html__( 'Product Rating', 'pet-space' ) . '</h4>';
					echo wp_kses_post( $rating_html );
				endif;
			} else {
				if ( $rating_html = wc_get_rating_html( $product->get_average_rating() ) ) :
					echo '<h4>' . esc_html__( 'Product Rating', 'pet-space' ) . '</h4>';
					echo wp_kses_post( $rating_html );
				endif;
			}
		}
	}
endif;

//end of loop item
add_action( 'woocommerce_after_shop_loop_item', 'pet_space_action_echo_markup_after_shop_loop_item' );
if ( ! function_exists( 'pet_space_action_echo_markup_after_shop_loop_item' ) ):
	function pet_space_action_echo_markup_after_shop_loop_item() {
		echo '</div> <!-- eof .item-content -->';
		echo '</div> <!-- eof .side-item -->';
	}
endif;

//single product view
//single product image and summary layout
//wrap in col-sm- and .columns-2 all products on shop page
add_action( 'woocommerce_before_single_product', 'pet_space_action_echo_div_columns_before_single_product' );
if ( ! function_exists( 'pet_space_action_echo_div_columns_before_single_product' ) ):
	function pet_space_action_echo_div_columns_before_single_product() {
		$column_classes = pet_space_get_columns_classes();
		echo '<div id="content_product" class="' . esc_attr( $column_classes[ 'main_column_class' ] ) . '">';
	}
endif;

add_action( 'woocommerce_after_single_product', 'pet_space_action_echo_div_columns_after_single_product' );
if ( ! function_exists( 'pet_space_action_echo_div_columns_after_single_product' ) ):
	function pet_space_action_echo_div_columns_after_single_product() {
		echo '</div> <!-- eof .col- -->';
		$column_classes = pet_space_get_columns_classes();
		if ( $column_classes[ 'sidebar_class' ] ): ?>
			<!-- main aside sidebar -->
			<aside class="<?php echo esc_attr( $column_classes[ 'sidebar_class' ] ); ?>">
				<?php get_sidebar(); ?>
			</aside>
			<!-- eof main aside sidebar -->
			<?php
		endif;
	}
endif;

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
//add_action('woocommerce_product_thumbnails', 'woocommerce_show_product_sale_flash', 9 );
add_filter( 'woocommerce_single_product_image_html', 'pet_space_filter_put_onsale_span_in_main_image' );
if ( ! function_exists( 'pet_space_filter_put_onsale_span_in_main_image' ) ):
	function pet_space_filter_put_onsale_span_in_main_image( $html ) {
		return $html . woocommerce_show_product_sale_flash();
	}
endif;

add_action( 'woocommerce_product_thumbnails', 'pet_space_action_echo_closing_div_before_single_product_thumbnails', 9 );
if ( ! function_exists( 'pet_space_action_echo_closing_div_before_single_product_thumbnails' ) ):
	function pet_space_action_echo_closing_div_before_single_product_thumbnails() {
	}
endif;

add_action( 'woocommerce_before_single_product_summary', 'pet_space_action_echo_div_columns_before_single_product_summary', 9 );
if ( ! function_exists( 'pet_space_action_echo_div_columns_before_single_product_summary' ) ):
	function pet_space_action_echo_div_columns_before_single_product_summary() {
		echo '<div class="row">';
		echo '<div class="col-sm-6">';
        echo '<div class="product-wrap position-relative">';
	}
endif;

add_action( 'woocommerce_before_single_product_summary', 'pet_space_action_echo_div_close_first_column_before_single_product_summary', 21 );
if ( ! function_exists( 'pet_space_action_echo_div_close_first_column_before_single_product_summary' ) ):
	function pet_space_action_echo_div_close_first_column_before_single_product_summary() {
		echo '</div><!-- eof .col-sm- with single product images -->';
		echo '</div>';
		echo '<div class="col-sm-6">';
	}
endif;

add_action( 'woocommerce_after_single_product_summary', 'pet_space_action_echo_div_close_columns_after_single_product_summary', 9 );
if ( ! function_exists( 'pet_space_action_echo_div_close_columns_after_single_product_summary' ) ):
	function pet_space_action_echo_div_close_columns_after_single_product_summary() {
		echo '</div> <!--eof .col-sm- .summary -->';
		echo '</div> <!--eof .row -->';
	}
endif;

//elements in single product summary
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 8 );
add_action( 'woocommerce_single_product_summary', 'pet_space_action_echo_template_single_meta', 9 );
if ( ! function_exists( 'pet_space_action_echo_template_single_meta' ) ):
	function pet_space_action_echo_template_single_meta() {
		echo '<div class="grey theme_buttons small_buttons color3 meta-summary">';
		woocommerce_template_single_meta();
		echo '</div>';
	}
endif;

add_action( 'woocommerce_before_add_to_cart_button', 'pet_space_action_echo_open_div_before_add_to_cart_button' );
if ( ! function_exists( 'pet_space_action_echo_open_div_before_add_to_cart_button' ) ):
	function pet_space_action_echo_open_div_before_add_to_cart_button() {
		echo '<div class="add-to-cart theme_buttons color3">';
	}
endif;

add_action( 'woocommerce_after_add_to_cart_button', 'pet_space_action_echo_open_div_after_add_to_cart_button' );
if ( ! function_exists( 'pet_space_action_echo_open_div_after_add_to_cart_button' ) ):
	function pet_space_action_echo_open_div_after_add_to_cart_button() {
		echo '</div>';
	}
endif;

//account navigation
add_action( 'woocommerce_before_account_navigation', 'pet_space_action_woocommerce_before_account_navigation' );
if ( ! function_exists( 'pet_space_action_woocommerce_before_account_navigation' ) ):
	function pet_space_action_woocommerce_before_account_navigation() {
		echo '<div class="theme_buttons small_buttons">';
	}
endif;

add_action( 'woocommerce_after_account_navigation', 'pet_space_action_woocommerce_after_account_navigation' );
if ( ! function_exists( 'pet_space_action_woocommerce_after_account_navigation' ) ):
	function pet_space_action_woocommerce_after_account_navigation() {
		echo '</div><!-- eof theme_buttons -->';
	}
endif;

/*
 * Adds a new badge to product entry for any product added in the last 30 days.
 * Simply add to child theme's functions.php file then add some css to your site to style it.
 * If you want the badge to be a part of the "equal height" content then use 'PHP_INT_MAX' for the
 * priority instead of 20
 *
 */
add_action( 'woocommerce_before_shop_loop_item_title', 'pet_space_add_label_product_badge', 20 );
add_action( 'woocommerce_before_single_product_summary', 'pet_space_add_label_product_badge', 10 );
if (!function_exists('pet_space_add_label_product_badge')):
    function pet_space_add_label_product_badge(){
        $pID = get_the_ID();
        $badge = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( $pID, 'product-featured-badge', '' ) : '';
        if ($badge == 'new') {
            echo '<span class="onnew">' . esc_html__( 'New', 'pet-space' ) . '</span>';
        } else if ( $badge == 'hot' ) {
            echo '<span class="onnew hot">' . esc_html__( 'Hot', 'pet-space' ) . '</span>';
        }
    }
endif;

/*
* remove product title only on single product
*/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

/*
* Add custom share buttons
*/
add_action('woocommerce_single_product_summary', 'pet_space_action_echo_share_btns', 9);
if (!function_exists('pet_space_action_echo_share_btns')):
    function pet_space_action_echo_share_btns() {
        if( function_exists( 'pet_space_share_this' ) ):
            pet_space_share_this('true');
        endif;
    }
endif;

/*
* Remove “Description” Heading @ WooCommerce Single Product Tabs
*/
add_filter( 'woocommerce_product_description_heading', '__return_null' );

/*
* Remove “Additional info” Heading @ WooCommerce Single Product Tabs
*/
add_filter( 'woocommerce_product_additional_information_heading', '__return_null' );

add_action('woocommerce_after_single_product_summary', 'pet_space_change_title_related_products');
if (!function_exists('pet_space_change_title_related_products')):
    function pet_space_change_title_related_products(){
        echo '<div class="shortcode-icon text-center"><div class="icon-wrap size_normal default_icon color_4"><i class="fa fa-paw"></i></div></div>';
        echo '<div class="fw-divider-space" style="padding-top: 20px;"></div>';
        echo '<h2 class="section_header margin_0 text-center"><span class="grey bold">'. esc_html__('Related Products', 'pet-space') .'</span></h2>';
        echo '<p class=" paragraph"><span class=" regular text-uppercase spacing-text-small">'. esc_html__('You also may like', 'pet-space') .'</span></p>';
    }
endif;

add_action('woocommerce_before_cart', 'pet_space_cart_page_add_wrap_1');
if (!function_exists('pet_space_cart_page_add_wrap_1')):
    function pet_space_cart_page_add_wrap_1()
    {
        echo '<div class="cart-row">';
    }
endif;

add_action('woocommerce_after_cart', 'pet_space_cart_page_add_wrap_2');
if (!function_exists('pet_space_cart_page_add_wrap_2')):
    function pet_space_cart_page_add_wrap_2()
    {
        echo '</div>';
    }
endif;

/*
*   Add wrap on order in checkout page
*/
add_action('woocommerce_checkout_after_customer_details', 'ts_1', 10);
if (!function_exists('ts_1')):
    function ts_1()
    {
        echo '<div class="order-wrap">';
    }
endif;

add_action('woocommerce_review_order_after_payment', 'ts_2', 10);
if (!function_exists('ts_2')):
    function ts_2()
    {
        echo '</div>';
    }
endif;

/*
* Add feature video
*/
add_action( 'woocommerce_before_single_product_summary', 'pet_space_test', 11 );
if (!function_exists('pet_space_test')):
    function pet_space_test(){
        $pID = get_the_ID();
        //detecting featured video
        $embed_url = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( $pID, 'product-featured-video', '' ) : '';
        if ( !empty($embed_url) ) {
            echo '<a href="#" class="shop_video_modal_window" data-toggle="modal" data-target="#modal1"></a>';
        }
    }
endif;