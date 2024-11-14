<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Shortcode Posts - extended item layout
 */

$terms          = get_the_terms( get_the_ID(), 'category' );
$filter_classes = '';
foreach ( $terms as $term ) {
	$filter_classes .= ' filter-' . $term->slug;
}
?>
<article <?php post_class( "vertical-item content-padding with_shadow text-center rounded overflow-hidden" . $filter_classes ); ?>>
	<?php if ( get_the_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			echo get_the_post_thumbnail();
			?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
			<a class="bottom-right-corner" href="<?php the_permalink(); ?>#comments">
				<i class="fa fa-comment" aria-hidden="true"></i>
			</a>
		</div>
	<?php endif; //eof thumbnail check ?>
	<div class="item-content">
		<?php pet_space_posted_on(); ?>
		<h4 class="item-title hover-color3">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h4>
		<?php the_excerpt();

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
</article><!-- eof vertical-item -->
