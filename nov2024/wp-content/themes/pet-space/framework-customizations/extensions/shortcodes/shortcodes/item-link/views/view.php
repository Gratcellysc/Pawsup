<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

if ( empty( $atts['image'] ) ) {
	return;
}

$width  = ( is_numeric( $atts['width'] ) && ( $atts['width'] > 0 ) ) ? $atts['width'] : '';
$height = ( is_numeric( $atts['height'] ) && ( $atts['height'] > 0 ) ) ? $atts['height'] : '';

if ( ! empty( $width ) && ! empty( $height ) ) {
	$image = fw_resize( $atts['image']['attachment_id'], $width, $height, true );
} else {
	$image = $atts['image']['url'];
}

$alt = get_post_meta($atts['image']['attachment_id'], '_wp_attachment_image_alt', true);
$overlay = ( $atts['overlay'] === 'true' ) ? 's-overlay' : '';

?>

<div class="item-link <?php echo esc_attr($overlay) ?>">
	<div class="position-relative">
		<div class="item-media">
			<img src="<?php echo esc_attr($image) ?>" alt="<?php echo esc_attr($alt) ?>">
		</div>
        <?php if ( !empty($atts['title']) ) : ?>
		<div class="title">
			<h6>
                <a
                    href="<?php echo esc_attr($atts['link']) ?>"
                    target="<?php echo esc_attr($atts['target']) ?>"
                ><?php echo esc_html($atts['title']) ?></a>
            </h6>
		</div>
        <?php endif; ?>
	</div>
</div>
