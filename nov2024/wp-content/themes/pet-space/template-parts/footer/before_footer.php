<?php
/**
 * The template part for selected footer
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( is_active_sidebar('before-sidebar-footer-1') ||
    is_active_sidebar('before-sidebar-footer-2') ||
    is_active_sidebar('before-sidebar-footer-3') ||
    is_active_sidebar('before-sidebar-footer-4') ) :

?>
<section class="before_page_footer section_padding_top_100 section_padding_bottom_90 ls ms">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-lg-3 col-md-6 to_animate" data-animation="fadeInUp">
				<?php dynamic_sidebar( 'before-sidebar-footer-1' ); ?>
			</div>
			<div class="col-xs-12 col-lg-3 col-md-6 to_animate" data-animation="fadeInUp">
				<?php dynamic_sidebar( 'before-sidebar-footer-2' ); ?>
			</div>
			<div class="col-xs-12 col-lg-3 col-md-6 to_animate" data-animation="fadeInUp">
				<?php dynamic_sidebar( 'before-sidebar-footer-3' ); ?>
			</div>
            <div class="col-xs-12 col-lg-3 col-md-6 to_animate" data-animation="fadeInUp">
                <?php dynamic_sidebar( 'before-sidebar-footer-4' ); ?>
            </div>
		</div>
	</div>
</section><!-- .page_footer -->

<?php endif ?>