<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * The template for displaying single service
 *
 */

get_header();
$pID = get_the_ID();

//getting taxonomy name
$ext_team_settings = fw()->extensions->get( 'team' )->get_settings();
$taxonomy_name = $ext_team_settings['taxonomy_name'];

$atts = fw_get_db_post_option(get_the_ID());

$shortcodes_extension = fw()->extensions->get( 'shortcodes' );

$unique_id = uniqid();

$form_json = json_decode( $atts['form']['json'] )[1];
?>
<?php
// Start the Loop.
while ( have_posts() ) : the_post(); ?>
	<div class="col-md-5">
		<div class="vertical-item with_shadow rounded overflow-hidden text-center">
			<?php the_post_thumbnail(); ?>
			<div class="item-content with_padding">
				<?php if ( ! empty( $atts['position'] ) ) : ?>
					<p class="small-text highlight3 margin_0"><?php echo wp_kses_post( $atts['position'] ); ?></p>
				<?php endif; //position ?>
				<?php the_title( '<h4 class="margin_0">', '</h4>' ); ?>

				<?php if ( ! empty( $atts['social_icons'] ) ) : ?>
					<div class="team-social-icons color2links">
						<?php
						if ( ! empty( $shortcodes_extension ) ) {
                            $icons_social_shortcode = fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' );
                            if ( ! empty( $icons_social_shortcode ) ) {
                                echo fw_ext( 'shortcodes' )->get_shortcode( 'icons_social' )->render( array( 'social_icons' => $atts['social_icons'] ) );
                            }
						}
						?>
					</div><!-- eof social icons -->
				<?php endif; //social icons ?>

			</div>
		</div><!-- .vertical-item -->
	</div><!-- .col-md-5 -->
	<div class="col-md-7">
		<div class="item-content entry-content">
			<!-- .entry-header -->
			<?php the_content(); ?>

			<?php
			//member meta tabs start
			if (
				! empty( $atts['bio'] )
				||
				! empty( $atts['skills'] )
				||
				! empty( $form_json )
			) :
				$tab_num = 0;
				?>
				<div class="bootstrap-tabs">
					<ul class="nav nav-tabs" role="tablist">
						<?php
						if ( ! empty( $atts['bio'] ) ) :
							?>
							<li class="<?php echo esc_attr( ( 0 === $tab_num ) ? 'active' : '' ); ?>">
								<a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab"
								   data-toggle="tab">
									<?php esc_html_e( 'Biography', 'pet-space' ); ?>
								</a>
							</li>
							<?php
							$tab_num ++;
						endif; //bio check

						if ( ! empty( $atts['skills'] ) ) :
							?>
                            <li class="<?php echo esc_attr( ( 0 === $tab_num ) ? 'active' : '' ); ?>">
								<a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab"
								   data-toggle="tab">
									<?php esc_html_e( 'Skills', 'pet-space' ); ?>
								</a>
							</li>
							<?php
							$tab_num ++;
						endif; //bio check`

						if ( ! empty( $form_json ) ) :
							?>
                            <li class="<?php echo esc_attr( ( 0 === $tab_num ) ? 'active' : '' ); ?>">
								<a href="#tab-<?php echo esc_attr( $unique_id . '-' . $tab_num ); ?>" role="tab"
								   data-toggle="tab">
									<?php esc_html_e( 'Send Message', 'pet-space' ); ?>
								</a>
							</li>
							<?php
							$tab_num ++;
						endif; //form check
						?>
					</ul>
					<div class="tab-content big-padding top-color-border">
						<?php
						$tab_num = 0;
						if ( ! empty( $atts['bio'] ) ) :
							?>
							<div
								class="tab-pane tab-member-bio fade <?php echo esc_attr( ( 0 === $tab_num ) ? 'in active' : '' ); ?>"
								id="tab-<?php echo esc_attr( $unique_id ) . '-' . $tab_num ?>">
								<?php echo wp_kses_post( $atts['bio'] ); ?>
							</div><!-- .eof tab-pane -->
							<?php
							$tab_num ++;
						endif; //bio check

						if ( ! empty( $atts['skills'] ) ) :
							?>
							<div
								class="tab-pane tab-member-skills fade <?php echo esc_attr( ( 0 === $tab_num ) ? 'in active' : '' ); ?>"
								id="tab-<?php echo esc_attr( $unique_id ) . '-' . $tab_num ?>">
								<?php
								foreach ( $atts['skills'] as $skill ) :
									echo fw_ext( 'shortcodes' )->get_shortcode( 'progress_bar' )->render( $skill );
								endforeach;
								?>
							</div><!-- .eof tab-pane -->
							<?php
							$tab_num ++;
						endif; //skills check

						if ( ! empty( $form_json ) ) :
							?>
							<div
								class="tab-pane tab-member-form fade <?php echo esc_attr( ( 0 === $tab_num ) ? 'in active' : '' ); ?>"
								id="tab-<?php echo esc_attr( $unique_id ) . '-' . $tab_num ?>">
								<?php echo fw_ext( 'shortcodes' )->get_shortcode( 'contact_form' )->render( $atts ); ?>
							</div><!-- .eof tab-pane -->
							<?php
							$tab_num ++;
						endif; //form check
						?>
					</div>
				</div>
			<?php endif; //tab content check ?>

			<?php if ( ! empty( $atts['additional_content'] ) ) : ?>
				<div class="member-additional-content topmargin_30">
					<?php echo wp_kses_post( $atts['additional_content'] ); ?>
				</div>
			<?php endif; //additional content ?>
		</div>
		<!-- .entry-content -->
	</div>
<?php endwhile; ?>
<?php
get_footer();