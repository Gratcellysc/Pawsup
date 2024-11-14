<?php
/**
 * The template used for displaying page content
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$post_class = ' ';
if ( is_search()) {
	$post_class = 'vertical-item content-padding big-padding with_shadow overflow-hidden';
};
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(esc_attr($post_class)); ?>>
	<div class="item-content">
	<?php if ( has_post_thumbnail() || ! is_singular() ) : ?>
		<header class="entry-header">
			<?php
			// Page thumbnail and title.
			pet_space_post_thumbnail();
			if ( ! is_singular() ) {
				the_title( '<h3 class="entry-title hover-color3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
			}

			?>
		</header><!-- .entry-header -->
		<?php
	endif; //has_post_thumbnail
	?>
	<?php if ( is_search() ) : ?>
		<?php if ( get_the_excerpt() ) : ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php endif; ?>
	<?php else : ?>
		<div class="entry-content">
			<?php
			//hidding "more link" in content
			the_content();

			wp_link_pages( array(
				'before'      => '<div class="page-links topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'pet-space' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>
	</div><!-- .item-content -->
</article><!-- #post-## -->
