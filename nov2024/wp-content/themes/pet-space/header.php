<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till main content section
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; //is_singular && pings_open ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> data-slide-speed="<?php pet_space_slide_speed(); ?>">
<?php
if( function_exists( 'wp_body_open' ) ) :
	wp_body_open();
endif;
//page preloader
$preloader_enabled = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'preloader_enabled' ) : true;
$preloader_image   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'preloader_image' ) : false;
if ( $preloader_enabled ) : ?>
	<!-- page preloader -->
	<div class="preloader">
		<div class="preloader_image fa-spin"<?php echo ( esc_attr($preloader_image )) ? ' style="background-image: url(' . esc_url( $preloader_image['url'] ) . ')"' : '' ?>></div>
	</div>
<?php endif; //preloader_enabled ?>

<!-- search modal -->
<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">
			<i class="rt-icon2-cross2"></i>
		</span>
	</button>
	<div class="widget widget_search">
		<?php get_search_form(); ?>
	</div>
</div>
<?php if (defined('FW')) : ?>
	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls with_padding">
			<?php FW_Flash_Messages::_print_frontend(); ?>
		</div>
	</div><!-- eof .modal -->
<?php endif; ?>
<?php if ( defined( 'FW' ) && class_exists('woocommerce') && is_singular('product')  ) : ?>
    <!--Modal: Name-->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Body-->
                <div class="modal-body mb-0 p-0">
                    <?php
                    $pID = get_the_ID();
                    //detecting featured video
                    $embed_url = function_exists( 'fw_get_db_post_option' ) ? fw_get_db_post_option( $pID, 'product-featured-video', '' ) : '';
                    ?>
                    <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
                        <iframe class="embed-responsive-item" src="<?php echo esc_attr($embed_url) ?>"
                                allowfullscreen></iframe>
                    </div>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!--Modal: Name-->
<?php endif;?>

<?php if ( defined( 'FW' ) ) : ?>
    <!-- login modal -->
    <div class="modal ls" id="login_modal">
        <div class="modal_login_form">
            <div class="menu-img ds ms cover-image">
                <?php if ( ! empty(fw_get_db_customizer_option('meta_image')['url'] )) : ?>
                    <img src="<?php echo esc_url(fw_get_db_customizer_option('meta_image')['url']) ?>" alt="<?php esc_attr__('bg', 'pet-space') ?>">
                <?php endif;?>
                <?php if ( ! is_user_logged_in() ) :?>
                    <p>
                        <?php echo esc_html__('New user?', 'pet-space') ?>
                    </p>
                    <h4 class="special-heading">
                        <span><?php echo esc_html__('Register','pet-space')?></span>
                    </h4>
                    <button type="submit" class="theme_button color3 registrate_modal_window modal_window"><?php echo esc_html__('Sign up','pet-space')?></button>
                <?php endif;?>
            </div>
            <div class="menu-form ls" >
                <a href="#" data-dismiss="modal" aria-label="Close" class="remove"><i class="fa fa-times"></i></a>
                <?php if ( ! is_user_logged_in() ) :?>
                    <h4 class="special-heading">
                        <span><?php echo esc_html__('Log in','pet-space')?></span>
                    </h4>
                <?php endif;?>

                <?php
                if ( ! is_user_logged_in() ) :
                    wp_login_form( array(
                        'label_username' => esc_html__( 'Email address', 'pet-space' ),
                        'label_password' => esc_html__( 'Password', 'pet-space' ),
                        'label_remember' => esc_html__( 'Remember Me', 'pet-space' ),
                        'label_log_in' => esc_html__( 'Sign in', 'pet-space' ),
                        'remember' => esc_html__( 'Remember me', 'pet-space' ),
                    ) );
                else:
                    $html = '<a href="' . esc_url( wp_logout_url() ) . '" class="theme_button color1 mr-2">' . esc_html__( 'Log out', 'pet-space' ) . '</a>';
                    if ( current_user_can( 'read' ) ) {
                        $html .= ' <a href="' . admin_url() . '" class="theme_button color">' . esc_html__( 'Site Admin', 'pet-space' ) . '</a>';
                    }
                    echo wp_kses_post( $html );
                endif; //is_user_logged_in
                ?>
                <?php if ( ! is_user_logged_in() ) : ?>
                    <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Forgot password?', 'pet-space' ); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif;?>

<?php if ( defined( 'FW' ) && ! is_multisite() && get_option( 'users_can_register' ) ) : ?>
    <!-- Registrate modal -->
    <div class="modal  ls" id="registrate_modal">
        <div class="modal_login_form register">
            <div class="menu-form ls" >
                <a href="#" data-dismiss="modal" aria-label="Close" class="remove"><i class="fa fa-times"></i></a>
                <h4 class="special-heading">
                    <span><?php echo esc_html__('Register','pet-space') ?></span>
                </h4>
                <?php
                do_action( 'user_registration_form' );
                ?>

            </div>
            <div class="menu-img ds ms cover-image ">
                <?php if ( fw_get_db_customizer_option('meta_image_2')['url'] ) : ?>
                    <img src="<?php echo esc_url(fw_get_db_customizer_option('meta_image_2')['url']) ?>" alt="<?php esc_attr__('bg', 'pet-space') ?>">
                <?php endif;?>
                <p class="fs-14">
                    <?php echo esc_html__('Also registered?', 'pet-space') ?>
                </p>
                <h4 class="special-heading">
                    <span><?php echo esc_html__('Log in','pet-space')?></span>
                </h4>
                <button type="submit" class="theme_button color2 login_modal_window modal_window"><?php echo esc_html__('Sign in','pet-space')?></button>
            </div>
        </div>
    </div>
<?php endif;?>

<!-- wrappers for visual page editor and boxed version of template -->
<?php
//light or dark version
$version            = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'version' ) : 'light';
$main_section_class = ( $version !== 'light' ) ? 'ds' : 'ls';

//get template style from ULR - for demo
if ( isset( $_GET[ 'version' ] ) ) {
	$main_section_class = esc_attr($_GET[ 'version' ]);
}
?>
<div id="canvas" class="wide">
	<div id="box_wrapper">
		<!-- template sections -->
		<?php

		$header = pet_space_get_predefined_template_part( 'header' );
		get_template_part( 'template-parts/header/' . esc_attr( $header ) );

		if ( ! is_front_page() &  ! isset($_GET[ 'home_demo' ])) {
			$breadcrumbs = pet_space_get_predefined_template_part( 'breadcrumbs' );
			get_template_part( 'template-parts/breadcrumbs/' . esc_attr( $breadcrumbs ) );
		}

		if ( ! is_home() ) {
			do_action( 'pet_space_slider' );
		}

		if ( ! is_page_template( 'page-templates/full-width.php' )
			//not opening section if is single post with video format
			&& ! ( is_singular()
			&& ( get_post_format( get_queried_object_id() ) == 'video' ) )
		) : ?>
		<section class="<?php echo esc_attr( $main_section_class ); ?> page_content section_padding_top_100 section_padding_bottom_90 columns_padding_25">
			<div class="container">
				<div class="row">
                    <?php
                    /*
                    *   Add breadcrumbs on cart, checkbox and order pages
                    */
                    if ( class_exists('WooCommerce') ) :
                        if (is_cart() || is_checkout() || is_wc_endpoint_url('order-received')):
                            ?>
                            <div class="col-sm-12">
                                <ul class="breadcrumbs-woocommerce">
                                    <li>
                                        <a class="<?php echo esc_attr( (is_cart() ) ? 'active': '' ) ?>" href="<?php echo esc_url(wc_get_cart_url()) ?>">
                                            <span><?php echo esc_html__('Shopping cart','pet-space') ?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="<?php echo esc_attr( (is_checkout() && !is_wc_endpoint_url('order-received')) ? 'active': '' ) ?>" href="<?php echo esc_url(wc_get_checkout_url()) ?>">
                                            <span><?php echo esc_html__('Checkout details', 'pet-space') ?></span>
                                        </a>
                                    </li>
                                    <li>
                                        <span<?php if (is_wc_endpoint_url('order-received')) echo ' class="active"';?>><?php echo esc_html__('Order complete','pet-space') ?></span>
                                    </li>
                                </ul>
                            </div>
                        <?php
                        endif;
                    endif;

                    if ( is_home() ) {

					    do_action( 'pet_space_blog_slider') ;

					    if ( is_active_sidebar( 'before-blog-sidebar' ) ) { ?>
                            <div class="before-loop-area col-xs-12">
                                <?php dynamic_sidebar( 'before-blog-sidebar' ); ?>
                            </div><?php
                        }
					} ?>
<?php endif; //!full-width ?>