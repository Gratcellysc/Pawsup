<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
get_header();
global $post;
$options        = fw_get_db_post_option( $post->ID, fw()->extensions->get( 'events' )->get_event_option_id() );
$column_classes = pet_space_get_columns_classes();
?>
	<div id="content" class="<?php echo esc_attr( $column_classes['main_column_class'] ); ?>">
		<?php
		// Start the Loop.
		while ( have_posts() ) : the_post(); ?>
			<article
				id="post-<?php the_ID(); ?>" <?php post_class( 'event-single vertical-item content-padding muted_background' ); ?>>
				<?php
				$map = fw_ext_events_render_map();
				if ( $map ):
					?>
					<div class="item-media entry-thumbnail bottommargin_40">
						<?php echo fw_ext_events_render_map(); ?>
					</div>
					<?php
				endif; //map
				?>
				<div class="item-content">
					<header class="entry-header">
						<div class="entry-meta item-meta">
							<?php

							echo get_the_term_list( $post->ID, 'fw-event-taxonomy-name', '<span class="categories-links color1">', ' ', '</span>' );

							pet_space_posted_on();

							if ( function_exists( 'fw_ext_feedback' ) ) {
								fw_ext_feedback();
							}
							?>
						</div><!-- .entry-meta -->


						<h1 class="entry-title"><?php the_title(); ?></h1>

					</header><!-- .entry-header -->

					<div class="entry-content">

						<!-- additional information about event -->
						<div class="event-info bottommargin_30">
							<p class="event-place">
								<?php
								if ( $options['event_location']['location'] ) : ?>
									<strong class="grey"><?php esc_html_e( 'Place', 'pet-space' ) ?>:</strong>
									<?php
									echo esc_html( $options['event_location']['location'] );
								endif;

								if ( $options['event_location']['venue'] ) :
									echo esc_html( ', ' . $options['event_location']['venue'] );
								endif;
								?>
							</p><!-- .event-place-->
							<?php

							foreach ( $options['event_children'] as $key => $row ) : ?>
								<?php if ( empty( $row['event_date_range']['from'] ) or empty( $row['event_date_range']['to'] ) ) : ?>
									<?php continue; ?>
								<?php endif; ?>

								<div class="pull-right">
									<button class="theme_button small_button color2"
									        data-uri="<?php echo add_query_arg( array(
										        'row_id'   => $key,
										        'calendar' => 'google'
									        ), fw_current_url() ); ?>" type="button"><?php esc_html_e( 'Google Calendar',
											'pet-space' ) ?></button>
									<button class="theme_button small_button" data-uri="<?php echo add_query_arg( array(
										'row_id'   => $key,
										'calendar' => 'ical'
									), fw_current_url() ); ?>" type="button"><?php esc_html_e( 'Ical Export',
											'pet-space' ) ?></button>
								</div>
								<ul class="list-unstyled">
									<li><strong class="grey"><?php esc_html_e( 'Start', 'pet-space' ) ?>
											:</strong> <?php echo wp_kses_post ( $row['event_date_range']['from'] ); ?></li>
									<li><strong class="grey"><?php esc_html_e( 'End', 'pet-space' ) ?>
											:</strong> <?php echo wp_kses_post ( $row['event_date_range']['to'] ); ?></li>

								</ul>
							<?php endforeach; ?>
						</div>
						<!-- .additional information about event -->


						<?php the_content(); ?>
						<?php do_action( 'pet_space_ext_events_after_content' ); ?>
					</div><!-- .entry-content -->
				</div><!-- .item-content -->
			</article>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
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