<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header();
?>
	<div id="content" class="content-404 col-md-6 col-md-offset-3 text-center">
		<p class="not_found">
			<span class="highlight2"><?php esc_html_e( '404', 'pet-space' ); ?></span>
		</p>
		<h3><?php esc_html_e( 'Oops, page not found!', 'pet-space' ); ?></h3>
		<p>
			<?php esc_html_e( 'You can search what interested:', 'pet-space' ); ?>
		</p>

		<div class="widget widget_search">
			<?php get_search_form(); ?>
		</div>

		<p class="divider_20">
			<?php esc_html_e( 'or', 'pet-space' ); ?><br>
		</p>
		<p>
			<a href="<?php echo get_home_url(); ?>" class="theme_button color3">
				<?php esc_html_e( 'Back To Homepage', 'pet-space' ); ?>
			</a>
		</p>

	</div><!--eof #content -->
<?php
get_footer();