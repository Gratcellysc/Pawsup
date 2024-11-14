<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 */

get_header();
$pID = get_the_ID();

$fw_ext_projects_gallery_image = fw()->extensions->get( 'portfolio' )->get_config( 'image_sizes' );
$fw_ext_projects_gallery_image = $fw_ext_projects_gallery_image['gallery-image'];
//no columns on single gallery page
$column_classes = pet_space_get_columns_classes( true );

?>
	<div id="content" class="col-sm-10 col-sm-push-1">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'text-center' ); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title gallery-single-title"><strong>', '</strong></h1>' ); ?>

					<div class="categories-links bottommargin_40 small_buttons color1">
						<?php
						echo get_the_term_list( $pID, 'fw-portfolio-category', '', ' ', '' );
						?>
					</div>
				</header>
				<!-- .entry-header -->
				<div class="gallery-item vertical-item content-padding with_background">
					<div class="item-media">
						<?php
						$thumbnails = fw_ext_portfolio_get_gallery_images();
						$captions   = array();
						if ( ! empty( $thumbnails ) ) :
							$loop = ( count( $thumbnails ) > 1 ) ? "true" : "false";
							?>
							<div id="owl-carousel-<?php echo esc_attr( $pID ); ?>" class="owl-carousel"
							     data-loop="<?php echo esc_attr( $loop ); ?>"
							     data-margin="0"
							     data-nav="<?php echo esc_attr( $loop ); ?>"
							     data-dots="<?php echo esc_attr( $loop ); ?>"
							     data-themeclass="owl-theme entry-thumbnail-carousel"
							     data-center="false"
							     data-items="1"
							     data-autoplay="true"
                                 data-speed="<?php pet_space_slide_speed(); ?>"
							     data-responsive-xs="1"
							     data-responsive-sm="1"
							     data-responsive-md="1"
							     data-responsive-lg="1"
							>
								<?php foreach ( $thumbnails as $thumbnail ) :
									$attachment = get_post( $thumbnail['attachment_id'] );
									$captions[ $thumbnail['attachment_id'] ] = $attachment->post_title;
									$image = fw_resize( $thumbnail['attachment_id'], $fw_ext_projects_gallery_image['width'], $fw_ext_projects_gallery_image['height'], $fw_ext_projects_gallery_image['crop'] );
									?>
									<div class="item">
										<img src="<?php echo esc_attr( $image ); ?>"
										     class="portfolio-gallery-image"
										     alt="<?php echo esc_attr( $attachment->post_title ); ?>"
										     title="portfolio-gallery-image-<?php echo esc_attr( $attachment->ID ); ?>"
										     width="<?php echo esc_attr( $fw_ext_projects_gallery_image['width'] ); ?>"
										     height="<?php echo esc_attr( $fw_ext_projects_gallery_image['height'] ); ?>"
										>
									</div>
								<?php endforeach ?>
							</div>
							<?php
						else:
							the_post_thumbnail( 'pet-space-full-width' );
						endif; //more than one thumbnail check
						?>
					</div><!-- .item-media -->
					<div class="item-content entry-content">
						<?php
						the_content();

						//buttons_share
						pet_space_share_this( true )
						?>
					</div>
					<!-- .entry-content -->
				</div>
				<!-- .entry-content -->
			</article><!-- #post-## -->

		<?php endwhile;

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}

		?>

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