<?php
/**
 * The template part for selected header
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$social_icons = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'social_icons' ) : '';

$header_welcome_text     = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_welcome_text' ) : '';
$header_link_1 = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_link_1' ) : '';
$header_link_2 = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_link_2' ) : '';

$header_text_1  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_text_1' ) : '';
$header_subtext_1  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_subtext_1' ) : '';

$header_text_2  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_text_2' ) : '';
$header_subtext_2  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_subtext_2' ) : '';

$header_text_3  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_text_3' ) : '';
$header_subtext_3  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_subtext_3' ) : '';

$header_text_4  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_text_4' ) : '';
$header_subtext_4  = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'header_subtext_4' ) : '';

//light or dark version
$version            = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'light';
$main_section_class = ( $version !== 'light' ) ? 'ds' : 'ls';

//get template style from ULR - for demo
if ( isset( $_GET[ 'version' ] ) ) {
	$main_section_class = esc_attr($_GET[ 'version' ]);
}

if ( ( ! empty( $header_welcome_text ) ) || ( ! empty( $header_link_1 ) ) || ( ! empty( $header_link_2 ) ) ) : ?>
	<section class="page_topline with_search <?php echo esc_html( $main_section_class ); ?> ms section_padding_10 table_section">
		<h3 class="hidden"><?php echo esc_html__('Page Topline', 'pet-space'); ?></h3>
		<div class="container">
			<div class="row">
				<div class="col-sm-8 text-center text-sm-left">
					<p class="top-meta greylinks">
                        <?php if ( $header_subtext_3 ) : ?>
                            <span><i class="fa fa-clock-o"></i><?php echo wp_kses_post( $header_subtext_3 ); ?></span>
                        <?php endif; ?>
                        <?php if ( $header_subtext_4 ) : ?>
                            <span><i class="fa fa-envelope-o"></i><?php echo wp_kses_post( $header_subtext_4 ); ?></span>
                        <?php endif; ?>
                        <?php if ( $header_subtext_1 ) : ?>
                            <span><i class="fa fa-phone"></i><?php echo wp_kses_post( $header_subtext_1 ); ?></span>
                        <?php endif; ?>
                        <?php if ( $header_subtext_2 ) : ?>
                            <span><i class="fa fa-map-marker"></i><?php echo wp_kses_post( $header_subtext_2 ); ?></span>
                        <?php endif; ?>
                    </p>
				</div>
				<div class="col-sm-4 header_right_buttons text-center text-sm-right hidden-xs">
					<div class="inline-content">
						<div class="widget widget_search inline-block">
							<?php get_search_form(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section><!-- .page_topline -->
<?php endif; ?>
<section class="page_toplogo table_section table_section_md section_padding_top_15 section_padding_bottom_15 <?php echo esc_html( $main_section_class ); ?>">
	<div class="container">
		<div class="row">
			<div class="col-md-3 text-center text-md-left">
				<?php get_template_part( 'template-parts/header/header-logo' ); ?>
			</div>
			<div class="col-md-9 text-center text-md-right">
				<div class="toplogo-meta greylinks">
                    <a href="#" class="login_modal_window modal_window"><?php echo esc_html('Login') ?></a>
                    <?php if ( class_exists('YITH_WCWL') ) : ?>
                        <a class="px-2 px-xl-3" href="<?php echo esc_url(YITH_WCWL()->get_wishlist_url()); ?>"><i class="fa fa-heart-o pr-2"></i><?php echo esc_html('Wishlist') ?></a>
                    <?php endif;?>
                    <?php if ( class_exists( 'WC_Widget_Cart' ) && !is_cart() && !is_checkout() ) : ?>
                        <div class="cart-block">
                    <span class="cart-header color-darkgrey d-none d-lg-inline-block">
                        <?php echo esc_html('Cart /') ?>
                        <?php wc_cart_totals_subtotal_html(); ?>
                    </span>
                            <div class="dropdown ml-2 cart-dropdown d-inline-block">
                                <a class="cart-button " id="cart" data-target="#" href="/" data-toggle="dropdown" aria-haspopup="true" role="button" aria-expanded="false">
                                    <?php
                                    echo '<span class="badge bg-maincolor2 cart-count">';
                                    if (  WC()->cart->get_cart_contents_count() !== 0 ) {
                                        echo esc_html( WC()->cart->get_cart_contents_count() );
                                    }
                                    echo '</span>';

                                    ?>
                                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                                </a>
                                <div class="dropdown-menu ls" aria-labelledby="cart">
                                    <?php  the_widget( 'WC_Widget_Cart' ); ?>
                                </div>
                            </div><!-- eof woo cart -->
                        </div>
                    <?php endif; //woocommerce ?>
				</div>
			</div>
		</div>
	</div><!-- eof .col- -->
</section>
<header class="page_header <?php echo esc_html( $main_section_class ); ?> toggler_left with_top_border item_with_border affix-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12 display_table">
				<div class="header_mainmenu display_table_cell">
					<nav class="mainmenu_wrapper primary-navigation">
						<?php wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_class'     => 'sf-menu nav-menu nav',
							'container'      => 'ul'
						) ); ?>
					</nav>
					<!-- header toggler -->
					<span class="toggle_menu"><span></span></span>
				</div>
				<div class="header_right_buttons display_table_cell text-right">
					<div class="page_social_icons greylinks">
						<?php
						//get icons-social shortcode to render icons in team member item
						$shortcodes_extension = defined( 'FW' ) ? fw()->extensions->get( 'shortcodes' ): '';
						if ( ! empty( $shortcodes_extension ) ) {
                            $icons_social_shortcode = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );
                            if ( ! empty( $icons_social_shortcode ) ) {
							    echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $social_icons ) );
                            }
						}
						?>
					</div><!-- eof social icons -->
				</div>
			</div><!--	eof .col-sm-* -->
		</div><!--	eof .row-->
	</div> <!--	eof .container-->
</header><!-- eof .page_header -->