<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}
/**
 * Portfolio - extended item layout
 */

//wrapping in div for carousel layout
?>
<div class="vertical-item content-padding with_background ls with_border text-center">
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="item-media">
			<?php
			$full_image_src = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			if ( function_exists( 'pet_space_post_thumbnail' ) ) {
				pet_space_post_thumbnail();
			} else {
				the_post_thumbnail();
			}
			?>
			<div class="media-links">
				<a class="abs-link" href="<?php the_permalink(); ?>"></a>
			</div>
		</div>
	<?php endif; //has_post_thumbnail ?>
	<div class="item-content">
		<h3 class="item-title">
			<a href="<?php the_permalink(); ?>">
				<?php the_title(); ?>
			</a>
		</h3>
		<div class="theme_buttons small_buttons color1">
			<?php
			echo get_the_term_list( get_the_ID(), 'fw-portfolio-category', '', ' ', '' );
			?>
		</div>
		<?php echo the_excerpt(); ?>
		<div class="item-button">
			<a href="<?php the_permalink(); ?>" class="theme_button wide_button inverse">
				<?php esc_html_e( 'Learn More', 'pet-space' ); ?>
			</a>
		</div>
	</div>
</div><!-- eof vertical-item -->
