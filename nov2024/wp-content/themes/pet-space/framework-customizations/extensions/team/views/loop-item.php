<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Single service loop item layout
 * also using as a default service view in a shortcode
 */

$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name = $ext_team_settings['taxonomy_name'];

$pID = get_the_ID();
$atts = fw_get_db_post_option($pID);

?>
<div class="vertical-item content-padding text-center with_shadow rounded overflow-hidden">

	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>" class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( $pID ) );
			the_post_thumbnail('pet-space-team-member');
			?>
		</a>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">

		<?php if ( ! empty( $atts['position'] ) ) : ?>
			<p class="margin_0 small-text highlight3"><?php echo wp_kses_post( $atts['position'] ); ?></p>
		<?php endif; //position ?>

		<h4 class="item-title topmargin_0  hover-color3">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h4>

		<div class="desc">
			<?php the_excerpt(); ?>
		</div>

		<?php if ( ! empty( $atts['social_icons'] ) ) : ?>
			<div class="team-social-icons color2links">
				<?php
				//get icons-social shortcode to render icons in team member item
				$shortcodes_extension = fw()->extensions->get( 'shortcodes' );
				if ( ! empty( $shortcodes_extension ) ) {
                    $icons_social_shortcode = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );
                    if ( ! empty( $icons_social_shortcode ) ) {
					    echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
                    }
				}
				?>
			</div><!-- eof social icons -->
		<?php endif; //social icons

        // read more
        global $wp_query;
        $link = false;
        if ( ! empty( $wp_query->query_vars[ 'link' ] ) ) {
            $link = $wp_query->query_vars[ 'link' ];
        } elseif ( function_exists( 'fw_get_db_customizer_option' ) ) {
            $link = fw_get_db_customizer_option( 'team_read_more' );
        }
        pet_space_read_more_render( $link ); ?>
	</div>
</div><!-- eof .vertical-item -->
