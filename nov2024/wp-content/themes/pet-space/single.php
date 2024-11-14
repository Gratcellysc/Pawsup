<?php
/**
 * The Template for displaying all single posts
 */

get_header();
$column_classes = pet_space_get_columns_classes();
if ( ! ( get_post_format( get_queried_object_id() ) == 'video' ) ) : ?>
	<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
	<?php
endif; // video post check;

// Start the Loop.
while ( have_posts() ) : the_post();

	/*
	 * Include the post format-specific template for the content. If you want to
	 * use this in a child theme, then include a file called called content-___.php
	 * (where ___ is the post format) and that will be used instead.
	 */
	get_template_part( 'template-parts/content', get_post_format() );


	// If comments are open or we have at least one comment, load up the comment template.
	if ( comments_open() || get_comments_number() ) {
		comments_template();
	}
	// Previous/next post navigation. Uncomment following line if you need post navigation
	pet_space_post_nav();

endwhile; ?>
	</div><!--eof #content -->

<?php if ( $column_classes['sidebar_class'] ): ?>
	<!-- main aside sidebar -->
	<aside class="<?php echo esc_attr( $column_classes['sidebar_class'] ); ?>">
		<?php get_sidebar(); ?>
	</aside>
	<!-- eof main aside sidebar -->
	<?php
endif;
get_footer();