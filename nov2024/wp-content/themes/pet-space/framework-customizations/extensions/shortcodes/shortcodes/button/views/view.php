<?php
if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
?>
<a href="<?php echo esc_attr( $atts['link'] ) ?>" target="<?php echo esc_attr( $atts['target'] ) ?>"
   class="<?php echo esc_attr( $atts['type'] .' '. $atts['color'].' '. $atts['size'].' '. $atts['class']); ?>">
	<?php echo esc_html( $atts['label'] ); ?>
</a>