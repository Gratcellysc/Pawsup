<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_services_settings = fw()->extensions->get( 'services' )->get_settings();
$taxonomy_name = $ext_services_settings['taxonomy_name'];

$icon_array = fw_ext_services_get_icon_array();

?>
<div class="service_item vertical-item content-padding with_shadow text-center rounded overflow-hidden">
	<?php if ( $icon_array['icon_type'] ) : ?>
		<?php if ( $icon_array['icon_type'] === 'image' ) : ?>
			<?php echo wp_kses_post( $icon_array['icon_html']); ?>
		<?php else: //icon ?>
			<div class="teaser_icon black size_big border_icon">
				<?php echo wp_kses_post( $icon_array['icon_html']); ?>
			</div>
		<?php endif; ?>
	<?php else: //post featured image ?>
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink(); ?>" class="item-media">
				<?php
				$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
				the_post_thumbnail();
				?>
			</a>
		<?php endif; //has_post_thumbnail ?>
	<?php endif; //end of icon_type check ?>
	<div class="item-content">
		<h4 class="entry-title hover-color3">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h4>
		<div class="excerpt">
			<?php the_excerpt(); ?>
		</div><?php

        // read more
        global $wp_query;
        $link = false;
        if ( ! empty( $wp_query->query_vars[ 'link' ] ) ) {
            $link = $wp_query->query_vars[ 'link' ];
        } elseif ( function_exists( 'fw_get_db_customizer_option' ) ) {
            $link = fw_get_db_customizer_option( 'services_read_more' );
        }
        pet_space_read_more_render( $link ); ?>
	</div><!-- eof .item-content -->
</div><!-- eof .teaser -->
