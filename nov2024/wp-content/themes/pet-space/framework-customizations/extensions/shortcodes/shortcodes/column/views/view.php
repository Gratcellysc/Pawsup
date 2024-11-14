<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$bg_image = '';
if ( ! empty( $atts['background_image'] ) && ! empty( $atts['background_image']['data']['icon'] ) ) {
	$bg_image = $atts['background_image']['data']['icon'];
}

$class = fw_ext_builder_get_item_width( 'page-builder', $atts['width'] . '/frontend_class' );

$class .= ( ! empty( $atts['column_animation'] ) && $atts['column_animation'] ) ? ' to_animate' : '';
$class .= ( ! empty( $atts['column_align'] ) ) ? ' ' . $atts['column_align'] : '';
$class .= ( ! empty( $atts['background_color'] ) ) ? ' ' . $atts['background_color'] : '';
$class .= ( isset( $atts['background_cover'] ) && $atts['background_cover'] ) ? ' background_cover' : '';
$data_animation = ( ! empty( $atts['column_animation'] ) && $atts['column_animation'] ) ? 'data-animation="' . esc_attr( $atts['column_animation'] ) . '"' : '';

/* Add section custom class */
if( $atts['custom_class'] ) {
	$class .= ' '. $atts['custom_class'];
}

?>
<div class="<?php echo esc_attr( $class ); ?>" <?php if ( $bg_image ) { echo 'style="background-image:url(' . esc_url( $bg_image ) . ');"'; } ?> <?php echo wp_kses_post( $data_animation ); ?>>
	<?php
	if ( ! empty( $atts['column_padding'] ) ) :
	?>
	<div class="<?php echo esc_attr( $atts['column_padding']); ?>">
		<?php endif; //column_padding
		//shoing column content
		echo do_shortcode( $content );
		if ( ! empty( $atts['column_padding'] ) ) : //closing optional column_padding div
		?>
	</div>
<?php endif; ?>
</div>
