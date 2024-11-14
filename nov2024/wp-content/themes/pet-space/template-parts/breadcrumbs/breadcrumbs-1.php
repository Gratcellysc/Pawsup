<?php
/**
 * The template part for selected title (breadcrubms) section
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$get_breadcrumbs_image = ( function_exists( 'fw_get_db_customizer_option' ) ) ? fw_get_db_customizer_option( 'breadcrumbs_image' ) : '';
if ( $get_breadcrumbs_image ) {
	$breadcrumbs_image =  $get_breadcrumbs_image['url'];
} else {
	$breadcrumbs_image = get_template_directory_uri().'/img/parallax/breadcrumbs.jpg';
}
?>
<section class="page_breadcrumbs ds background_cover section_padding_65 section_overlay" style="background-image: url(<?php echo esc_url( $breadcrumbs_image ) ?>);">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 text-center breadcrumbs_inner">
				<h2 class="highlight">
					<?php
					get_template_part( 'template-parts/breadcrumbs/page-title-text' );
					?>
				</h2>
				<?php
				if ( function_exists( 'woocommerce_breadcrumb123' ) ) {
					woocommerce_breadcrumb( array(
						'delimiter'   => '',
						'wrap_before' => '<nav class="woocommerce-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '><ol class="breadcrumb">',
						'wrap_after'  => '</ol></nav>',
						'before'      => '<li>',
						'after'       => '</li>',
						'home'        => _x( 'Homepage', 'breadcrumb', 'pet-space' )
					) );
				} elseif ( function_exists( 'fw_ext_breadcrumbs' ) ) {
					fw_ext_breadcrumbs();
				}
				?>
			</div>
		</div>
	</div>
</section>