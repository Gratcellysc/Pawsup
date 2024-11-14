<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
} ?>
<?php
if ( isset( $data['slides'] ) ):
    $autoplay = isset( $data['settings']['extra']['slider_autoplay'] ) ? $data['settings']['extra']['slider_autoplay'] : true;
	$mobile_background_css_class = ( ! empty( $data['settings']['extra']['slider_mobile_overlap'] ) ) ? 'mobile-background' : '';
	$slider_dots = (  isset($data['settings']['extra']['slider_dots']) && $data['settings']['extra']['slider_dots'] === 'false' ) ? 'hide-dots' : '';
	$slider_center = (  isset($data['settings']['extra']['slider_center']) && $data['settings']['extra']['slider_center'] === 'true' ) ? 'dots-center' : '';
	?>
	<section class="intro_section page_mainslider">
		<div class="flexslider <?php echo esc_attr( $mobile_background_css_class . ' ' . $slider_dots . ' ' . $slider_center ); ?>" data-slideshow="<?php echo esc_attr( $autoplay ); ?>" data-slideshowspeed="<?php pet_space_slide_speed(); ?>">
			<ul class="slides">
				<?php foreach ( $data['slides'] as $id => $slide ):
				$slide_background = isset( $slide['extra']['slide_background'] ) ? $slide['extra']['slide_background'] : false;
				$slide_align      = isset( $slide['extra']['slide_align'] ) ? $slide['extra']['slide_align'] : false;
				$slide_layers     = isset( $slide['extra']['slide_layers'] ) ? $slide['extra']['slide_layers'] : false;

				$slide_button           = isset( $slide['extra']['slide_button'] ) ? $slide['extra']['slide_button'] : false;
				$slide_button_text      = isset( $slide['extra']['slide_button_text'] ) ? $slide['extra']['slide_button_text'] : false;
                $slide_button_link      = isset( $slide['extra']['slide_button_link'] ) ? $slide['extra']['slide_button_link'] : false;

                $slide_button_2           = isset( $slide['extra']['slide_button2'] ) ? $slide['extra']['slide_button2'] : false;
                $slide_button_text_2      = isset( $slide['extra']['slide_button_text2'] ) ? $slide['extra']['slide_button_text2'] : false;
                $slide_button_link_2      = isset( $slide['extra']['slide_button_link2'] ) ? $slide['extra']['slide_button_link2'] : false;

                $slide_button_3           = isset( $slide['extra']['slide_button3'] ) ? $slide['extra']['slide_button3'] : false;
                $slide_button_text_3      = isset( $slide['extra']['slide_button_text3'] ) ? $slide['extra']['slide_button_text3'] : false;
                $slide_button_link_3      = isset( $slide['extra']['slide_button_link3'] ) ? $slide['extra']['slide_button_link3'] : false;

                $slide_button_animation = isset( $slide['extra']['slide_button_animation'] ) ? $slide['extra']['slide_button_animation'] : false;

                $slide_video = isset($slide['extra']['slide_video']['url']) ? $slide['extra']['slide_video']['url'] : false;
                $slide_overlay = isset($slide['extra']['slide_overlay']) && $slide['extra']['slide_overlay'] === 'true' ? 'section_overlay' : '';

                ?>
				<li class="<?php echo esc_attr( $slide_background . ' ' . $slide_overlay ); ?> <?php echo esc_attr( $slide_align ); ?>">
					<img src="<?php echo esc_attr( $slide['src'] ); ?>" alt="<?php echo esc_attr( $slide['title'] ) ?>">
                    <?php if ( $slide_video ) :
                        $url = $slide['extra']['slide_video']['url'];
                        $index = strrpos($url, '.');
                        $format = substr($url, $index+1);
                        ?>
                        <video loop muted class="slide-video">
                            <source src="#" data-src="<?php echo esc_attr($url) ?>" type="video/<?php echo esc_attr($format) ?>">
                        </video>
                    <?php endif; ?>
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div class="slide_description_wrapper">
									<?php if ( $slide_layers || $slide_button || $slide_button_2 || $slide_button_3 ) : ?>
									<div class="slide_description">
										<?php
										foreach ( $slide_layers as $layer ):
										?>
										<div class="intro-layer <?php echo esc_attr( $layer['custom_class'] ); ?>"
										     data-animation="<?php echo esc_attr( $layer['layer_animation'] ); ?>">
											<<?php echo esc_html( $layer['layer_tag'] ); ?>
											class="<?php echo esc_attr( ( $layer['layer_tag'] == 'p' ) ? 'small' : '' ); ?> <?php echo esc_attr( $layer['layer_text_color'] ); ?> <?php echo esc_attr( $layer['layer_text_weight'] ); ?> <?php echo esc_attr( $layer['layer_text_transform'] ); ?>
											">
											<?php echo wp_kses_post( $layer['layer_text'] ) ?>
										</<?php echo esc_html( $layer['layer_tag'] ); ?>>
									</div>
								<?php
								endforeach;
								?>
									<div class="intro-layer button-layer"
									     data-animation="<?php echo esc_attr( $slide_button_animation ); ?>">
                                         <?php if ($slide_button) : ?>
                                            <a href="<?php echo esc_url( $slide_button_link ); ?>"
                                               class="<?php echo esc_attr( $slide_button ); ?>"><?php echo esc_html( $slide_button_text ); ?></a>
                                         <?php endif; ?>
                                         <?php if ($slide_button_2) : ?>
                                            <a href="<?php echo esc_url( $slide_button_link_2 ); ?>"
                                               class="<?php echo esc_attr( $slide_button_2 ); ?>"><?php echo esc_html( $slide_button_text_2 ); ?></a>
                                         <?php endif; ?>
                                         <?php if ($slide_button_3) : ?>
                                            <a href="<?php echo esc_url( $slide_button_link_3 ); ?>"
                                               class="<?php echo esc_attr( $slide_button_3 ); ?>"><?php echo esc_html( $slide_button_text_3 ); ?></a>
                                         <?php endif; ?>
									</div>

								</div> <!-- eof .slide_description -->
								<?php endif; ?>
							</div> <!-- eof .slide_description_wrapper -->
						</div> <!-- eof .col-* -->
					</div><!-- eof .row -->
		</div><!-- eof .container -->
		</li>
		<?php endforeach; ?>
		</ul>
		</div> <!-- eof flexslider -->
        <?php if ( !empty($data['settings']['extra']['scroll_button_link']) ) : ?>
		<div class="scroll_button_wrap">
			<a href="<?php echo esc_url($data['settings']['extra']['scroll_button_link'] )?>" class="scroll_button">
				<span class="sr-only"><?php esc_html_e('scroll down', 'pet-space' )?></span>
			</a>
		</div>
		<?php endif; ?>
	</section> <!-- eof intro_section -->
<?php endif; ?>