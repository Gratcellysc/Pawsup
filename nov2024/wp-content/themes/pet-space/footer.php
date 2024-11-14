<?php
/**
 * The template for displaying the footer and copyrights
 *
 * Contains footer content and the closing of the main container, row and section. Also closing #canvas and #box_wrapper
 */
if ( ! is_page_template( 'page-templates/full-width.php' ) ) : ?>
				</div><!-- eof .row-->
			</div><!-- eof .container -->
		</section><!-- eof .page_content -->
	<?php
endif;


if (function_exists('fw_get_db_customizer_option')) {
    if (!empty(fw_get_db_customizer_option('before_footer')) && !is_404() && !is_front_page()) {
        if (
            is_active_sidebar('before-sidebar-footer-1')
            || is_active_sidebar('before-sidebar-footer-2')
            || is_active_sidebar('before-sidebar-footer-3')
            || is_active_sidebar('before-sidebar-footer-4')
        ) {
            get_template_part('template-parts/footer/before_footer');
        } //is_active_sidebar
    }
}


$footer = pet_space_get_predefined_template_part( 'footer' );
get_template_part( 'template-parts/footer/' . esc_attr( $footer ) );

$copyrights = pet_space_get_predefined_template_part( 'copyrights' );
get_template_part( 'template-parts/copyrights/' . esc_attr( $copyrights ) );

?>
	</div><!-- eof #box_wrapper -->
</div><!-- eof #canvas -->
<?php wp_footer(); ?>
</body>
</html>