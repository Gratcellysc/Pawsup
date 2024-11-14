<?php
/**
 * The default template for displaying link content
 *
 * Used for both single and index/archive/search.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$show_post_thumbnail = ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) ? false : true;

$post_categories   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_categories' ) : false;
$post_tags   = function_exists( 'fw_get_db_customizer_option' ) ? fw_get_db_customizer_option( 'post_tags' ) : false;

//single item layout
if ( is_singular() ) : ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding with_shadow big-padding rounded overflow-hidden' ); ?>>
		<?php pet_space_post_thumbnail(); ?>
		<div class="item-content">
			<header class="entry-header">
				<div class="item-meta content-justify">
					<div class="entry-date">
						<?php
						if ( 'post' == get_post_type() ) {
							pet_space_posted_on();
						}
						?>
					</div><!-- .entry-date -->
					<!-- .item cats -->
					<?php if ( ! defined( 'FW' ) ) : ?>
						<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && pet_space_categorized_blog() ) : ?>
							<div
								class="categories-links color1"><?php echo get_the_category_list( _x( ' ', 'Used between list items, there is a space after the comma.', 'pet-space' ) ); ?></div>
						<?php endif; ?>
					<?php else: ?>
						<?php if ( $post_categories == 'yes' ) : ?>
							<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && pet_space_categorized_blog() ) : ?>
								<div
									class="categories-links color1"><?php echo get_the_category_list( _x( ' ', 'Used between list items, there is a space after the comma.', 'pet-space' ) ); ?></div>
							<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
					<!-- .item cats -->
				</div>
			</header><!-- .entry-header -->

			<?php
				the_content( esc_html__( 'More...', 'pet-space' ) );
			?>

			<!-- .item tags -->
			<?php if ( ! defined( 'FW' ) ) : ?>
				<?php the_tags( '<footer class="entry-meta"><span class="tag-links color1">', ' ', '</span></footer>' ); ?>
			<?php else: ?>
				<?php if ( $post_tags == 'yes' ) : ?>
					<?php the_tags( '<footer class="entry-meta"><span class="tag-links color1">', ' ', '</span></footer>' ); ?>
				<?php endif; ?>
			<?php endif; ?>
			<!-- .item tags -->
			<?php
			wp_link_pages( array(
				'before'      => '<div class="page-links topmargin_30"><span class="page-links-title">' . esc_html__( 'Pages:', 'pet-space' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
			?>
		</div><!-- .entry-content -->
	</article><!-- #post-## -->
<?php
//eof single page layout
//blog feed layout
else:
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class( 'vertical-item content-padding big-padding with_shadow rounded overflow-hidden' ); ?>>
		<div class="item-content">
			<header class="entry-header">
				<div class="item-meta content-justify">
					<?php
					if ( 'post' == get_post_type() ) {
						pet_space_posted_on();
					}
					?>
					<!-- .item cats -->
					<?php if ( ! defined( 'FW' ) ) : ?>
						<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && pet_space_categorized_blog() ) : ?>
							<div
								class="categories-links color1"><?php echo get_the_category_list( _x( ' ', 'Used between list items, there is a space after the comma.', 'pet-space' ) ); ?></div>
						<?php endif; ?>
					<?php else: ?>
						<?php if ( $post_categories == 'yes' ) : ?>
							<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && pet_space_categorized_blog() ) : ?>
								<div
									class="categories-links color1"><?php echo get_the_category_list( _x( ' ', 'Used between list items, there is a space after the comma.', 'pet-space' ) ); ?></div>
							<?php endif; ?>
						<?php endif; ?>
					<?php endif; ?>
					<!-- .item cats -->
				</div>
				<?php
				the_title( '<h4 class="entry-title hover-color3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h4>' );
				?>
			</header><!-- .entry-header -->

			<?php if ( is_search() ) : ?>
				<div class="entry-summary darklinks">
					<?php
					the_excerpt();
					?>
				</div><!-- .entry-summary -->
			<?php else : ?>
				<div class="entry-content darklinks">
					<?php
					//hidding "more link" in content
					the_content( esc_html__( 'More...', 'pet-space' ) );
					?>

				</div><!-- .entry-content -->
			<?php endif; //is_search 
			?>
		</div><!-- eof .item-content -->
	</article><!-- #post-## -->
<?php endif;  //is singular