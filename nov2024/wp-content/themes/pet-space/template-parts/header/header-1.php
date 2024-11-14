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
					<p class="divided-content greylinks">
					<?php if ( ! empty($header_welcome_text) ) : ?>
						<span class="header_welcome_text">
							<?php echo wp_kses_post( $header_welcome_text ); ?>
						</span>
					<?php endif; //header_welcome_text ?>
					<?php if ( ! empty( $header_link_1) ) : ?>
						<?php echo wp_kses_post( $header_link_1 ); ?>
					<?php endif; //header_link_1 ?>
					<?php if ( ! empty($header_link_2) ) : ?>
							<?php echo wp_kses_post( $header_link_2 ); ?>
					<?php endif; //header_link_2 ?>
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
				<div class="inline-teasers-wrap">

					<?php if ( ( ! empty( $header_text_1 ) ) || ( ! empty( $header_subtext_1 ) ) ) : ?>
						<div class="small-teaser text-left">
							<?php if ( $header_text_1 ) : ?>
								<p class="small-text grey margin_0">
									<?php echo wp_kses_post( $header_text_1 ); ?>
								</p>
							<?php endif; ?>
							<?php if ( $header_subtext_1 ) : ?>
								<p class="highlight2 fontsize_20 medium">
									<?php echo wp_kses_post( $header_subtext_1 ); ?>
								</p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( ( ! empty( $header_text_2 ) ) || ( ! empty( $header_subtext_2 ) ) ) : ?>
						<div class="small-teaser text-left">
							<?php if ( $header_text_2 ) : ?>
								<p class="small-text grey margin_0">
									<?php echo wp_kses_post( $header_text_2 ); ?>
								</p>
							<?php endif; ?>
							<?php if ( $header_subtext_2 ) : ?>
								<p class="highlight2 fontsize_20 medium">
									<?php echo wp_kses_post( $header_subtext_2 ); ?>
								</p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<?php if ( ( ! empty( $header_text_3 ) ) || ( ! empty( $header_subtext_3 ) ) ) : ?>
						<div class="small-teaser text-left">
							<?php if ( $header_text_3 ) : ?>
								<p class="small-text grey margin_0">
									<?php echo wp_kses_post( $header_text_3 ); ?>
								</p>
							<?php endif; ?>
							<?php if ( $header_subtext_3 ) : ?>
								<p class="highlight2 fontsize_20 medium">
									<?php echo wp_kses_post( $header_subtext_3 ); ?>
								</p>
							<?php endif; ?>
						</div>
					<?php endif; ?>

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