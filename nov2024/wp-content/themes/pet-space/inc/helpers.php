<?php if (!defined('ABSPATH')) {
	die('Direct access forbidden.');
}
/**
 * Helper functions and classes with static methods for usage in theme
 */

/**
 * Register Theme Google font.
 *
 * @return string
 */

if (!function_exists('pet_space_google_font_url')) :
	function pet_space_google_font_url()
	{
		$fonts_url = '';
		$fonts     = array();

		/* Standard Theme Fonts */
		$fonts['Roboto'] = array(
			'google_font'    => true,
			'subset'         => 'latin-ext',
			'variation'      => '300',
			'variants'       => array('300', '400', '500', '700'),
			'family'         => 'Roboto',
			'style'          => false,
			'weight'         => false,
			'size'           => '16',
			'line-height'    => '30',
			'letter-spacing' => '0',
			'color'          => false,
		);

		$fonts['Poppins'] = array(
			'google_font'    => true,
			'subset'         => 'latin-ext',
			'variation'      => '400',
			'variants'       => array('300', '400', '500', '700'),
			'family'         => 'Poppins',
			'style'          => false,
			'weight'         => false,
			'size'           => '14',
			'line-height'    => '24',
			'letter-spacing' => '0',
			'color'          => false,
		);

		//checking fonts from customizer if Unyson exists
		if (function_exists('fw_get_google_fonts')) {
			//grabbing all available fonts
			$google_fonts = fw_get_google_fonts();

			$font_body_options = fw_get_db_customizer_option('body_font_picker_switch');
			$font_body_enabled = (bool) $font_body_options['main_font_enabled'];
			$font_body         = $font_body_options['main_font_options']['main_font'];

			$font_headings_options = fw_get_db_customizer_option('h_font_picker_switch');
			$font_headings_enabled = (bool) $font_headings_options['h_font_enabled'];
			$font_headings         = $font_headings_options['h_font_options']['h_font'];

			//including fonts from theme in main fonts array
			if ($font_body_enabled) {
				$fonts[$font_body['family']] = $font_body;
				// adding font variations to main fonts array to create link to Google Fonts below
				if (isset($google_fonts[$font_body['family']])) {
					$fonts[$font_body['family']]['variants'] = $google_fonts[$font_body['family']]['variants'];
				}
			}
			if ($font_headings_enabled) {
				$fonts[$font_headings['family']] = $font_headings;
				if (isset($google_fonts[$font_headings['family']])) {
					$fonts[$font_headings['family']]['variants'] = $google_fonts[$font_headings['family']]['variants'];
				}
			}
		}

		$fonts_url = '//fonts.googleapis.com/css?family=';
		$subsets   = array();
		foreach ($fonts as $font => $styles) {
			if (!empty($styles['variants'])) {

				$fonts_url .= str_replace(' ', '+', $font) . ':' . implode(',', $styles['variants']) . '|';
				$subsets[] = $styles['subset'];
			}
		}
		$fonts_url = substr($fonts_url, 0, -1);
		$fonts_url .= '&subset=' . implode(',', array_unique($subsets));

		return urldecode($fonts_url);
	} //pet_space_google_font_url()
endif;

if (!function_exists('pet_space_add_font_styles_in_head')) :
	function pet_space_add_font_styles_in_head()
	{
		if (function_exists('fw_get_db_customizer_option')) {

			$font_body_options = fw_get_db_customizer_option('body_font_picker_switch');
			$font_body_enabled = (bool) $font_body_options['main_font_enabled'];
			$font_body         = $font_body_options['main_font_options']['main_font'];

			$font_headings_options = fw_get_db_customizer_option('h_font_picker_switch');
			$font_headings_enabled = (bool) $font_headings_options['h_font_enabled'];
			$font_headings         = $font_headings_options['h_font_options']['h_font'];

			$output = "";
			if ($font_body_enabled) {
				$output .= "body {
								font-family : \"{$font_body['family']}\", sans-serif;
								font-weight: {$font_body['variation']};
								font-size: {$font_body['size']}px;
								line-height: {$font_body['line-height']}px;
								letter-spacing: {$font_body['letter-spacing']}px;
							}";
			}
			if ($font_headings_enabled) {

				$output .= "h1, h2, h3, h4, h5, h6 {
								font-family : \"{$font_headings['family']}\", sans-serif;
								letter-spacing: {$font_headings['letter-spacing']}px;
							}";
			}

			return (wp_kses($output, false));
		} else {
			return false;
		}
	} //pet_space_add_font_styles_in_head()

endif;

/**
 *
 * checking for Unyson installed and returning walker for change comments HTML
 */

if (!function_exists('pet_space_return_comments_walker')) :
	function pet_space_return_comments_walker()
	{
		return new Pet_Space_Comments_Walker;
	}
endif;


if (!function_exists('pet_space_the_attached_image')) :
	/**
	 * Print the attached image with a link to the next attached image.
	 */
	function pet_space_the_attached_image()
	{
		$post = get_post();
		/**
		 * Filter the default attachment size.
		 *
		 * @param array $dimensions {
		 *     An array of height and width dimensions.
		 *
		 * @type int $height Height of the image in pixels. Default 810.
		 * @type int $width Width of the image in pixels. Default 810.
		 * }
		 */
		$attachment_size     = apply_filters('pet_space_attachment_size', array(810, 810));
		$next_attachment_url = wp_get_attachment_url();

		/*
		 * Grab the IDs of all the image attachments in a gallery so we can get the URL
		 * of the next adjacent image in a gallery, or the first image (if we're
		 * looking at the last image in a gallery), or, in a gallery of one, just the
		 * link to that image file.
		 */
		$attachment_ids = get_posts(array(
			'post_parent'    => $post->post_parent,
			'fields'         => 'ids',
			'numberposts'    => -1,
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'menu_order ID',
		));

		// If there is more than 1 attachment in a gallery...
		if (count($attachment_ids) > 1) {
			foreach ($attachment_ids as $attachment_id) {
				if ($attachment_id == $post->ID) {
					$next_id = current($attachment_ids);
					break;
				}
			}

			// get the URL of the next image attachment...
			if ($next_id) {
				$next_attachment_url = get_attachment_link($next_id);
			} // or get the URL of the first image attachment.
			else {
				$next_attachment_url = get_attachment_link(array_shift($attachment_ids));
			}
		}

		printf(
			'<a href="%1$s" rel="attachment">%2$s</a>',
			esc_url($next_attachment_url),
			wp_get_attachment_image($post->ID, $attachment_size)
		);
	} //pet_space_the_attached_image()

endif;

if (!function_exists('pet_space_list_authors')) :
	/**
	 * Print a list of all site authors who published at least one post.
	 */
	function pet_space_list_authors()
	{
		$author_ids = get_users(array(
			'fields'  => 'ID',
			'orderby' => 'post_count',
			'order'   => 'DESC',
			'who'     => 'authors',
		));

		foreach ($author_ids as $author_id) :
			$post_count = count_user_posts($author_id);

			// Move on if user has not published a post (yet).
			if (!$post_count) {
				continue;
			}
			$twitter_url     = get_the_author_meta('twitter', $author_id);
			$facebook_url    = get_the_author_meta('facebook', $author_id);
			$google_plus_url = get_the_author_meta('google_plus', $author_id);
			$author_bio      = get_the_author_meta('description', $author_id);
			// Not showing meta if no author bio
			if (!$author_bio) {
				continue;
			}
?>
			<div class="author-meta side-item content-padding with_shadow rounded overflow-hidden">
				<div class="row">
					<div class="col-md-4">
						<div class="item-media">
							<?php echo get_avatar($author_id, 500); ?>
						</div><!-- eof .item-media -->
					</div><!-- eof .col-md-* -->
					<div class="col-md-8">
						<div class="item-content">
							<h4 class="author-name"><?php echo get_the_author_meta('display_name', $author_id); ?></h4>
							<?php if ($author_bio) : ?>
								<p class="author-bio">
									<?php echo wp_kses_post($author_bio); ?>
								</p>
							<?php endif; //author_bio
							if ($twitter_url || $facebook_url || $google_plus_url) :
							?>
								<span class="author-social color2links">
									<?php if ($twitter_url) : ?>
										<a href="<?php echo esc_url($twitter_url) ?>" class="social-icon soc-twitter"></a>
									<?php endif; ?>
									<?php if ($facebook_url) : ?>
										<a href="<?php echo esc_url($facebook_url) ?>" class="social-icon soc-facebook"></a>
									<?php endif; ?>
									<?php if ($google_plus_url) : ?>
										<a href="<?php echo esc_url($google_plus_url) ?>" class="social-icon soc-google"></a>
									<?php endif; ?>
								</span><!-- eof .author-social -->
							<?php
							endif; //author social
							?>
						</div><!-- eof .item-content -->
					</div><!-- eof .col-md-* -->
				</div>
				<!-- .author-info -->
			</div><!-- eof author-meta -->
			<?php
		endforeach;
	} //pet_space_list_authors()

endif;

if (!function_exists('pet_space_get_columns_classes')) :
	/**
	 * Define a sidebar position for manage main column CSS class, sidebar CSS class and visibility of sidebar.
	 * return array
	 */
	function pet_space_get_columns_classes($full_width = false)
	{
		//default values
		$column_classes = array(
			'main_column_class' => 'col-xs-12  col-md-8 col-lg-8',
			'sidebar_class'     => 'col-xs-12  col-md-4 col-lg-4'
		);
		if (is_page()) {
			$column_classes['main_column_class'] = "col-sm-12";
			$column_classes['sidebar_class']     = false;
		}

		if (function_exists('fw_ext_sidebars_get_current_position')) {

			//full width
			if (in_array(fw_ext_sidebars_get_current_position(), array('full'))) {

				$column_classes['main_column_class'] = "col-sm-12";
				$column_classes['sidebar_class']     = false;

				//left sidebar
			} elseif (in_array(fw_ext_sidebars_get_current_position(), array('left'))) {

				$column_classes['main_column_class'] = "col-xs-12 col-sm-7 col-md-8 col-lg-8 col-sm-push-5 col-md-push-4 col-lg-push-4";
				$column_classes['sidebar_class']     = "col-xs-12 col-sm-5 col-md-4 col-lg-4 col-sm-pull-7 col-md-pull-8 col-lg-pull-8";
			} elseif (in_array(fw_ext_sidebars_get_current_position(), array('right'))) {

				$column_classes['main_column_class'] = "col-xs-12 col-sm-7 col-md-8 col-lg-8";
				$column_classes['sidebar_class']     = "col-xs-12 col-sm-5 col-md-4 col-lg-4";
			} //no catching right sidebar. Right sidebar is default
			else {

				//default - right sidebar
				$column_classes['main_column_class'] = "col-xs-12 col-sm-7 col-md-8 col-lg-8";
				$column_classes['sidebar_class']     = "col-xs-12 col-sm-5 col-md-4 col-lg-4";

				//default for page is fullwidth
				if (is_page()) {
					$column_classes['main_column_class'] = "col-sm-12";
					$column_classes['sidebar_class']     = false;
				}
			}
		}

		if ($full_width) {
			$column_classes['main_column_class'] = "col-sm-12";
			$column_classes['sidebar_class']     = false;
		}

		return $column_classes;
	} //pet_space_get_columns_classes()

endif;

/**
 * Custom template tags
 */

/**
 * Retrieve paginated link for archive post pages.
 *
 * Modification of standard WordPress paginate_links function to create Twitter Bootstrap pagination
 *
 * @global WP_Query $wp_query
 * @global WP_Rewrite $wp_rewrite
 *
 * @param string|array $args {
 *     Optional. Array or string of arguments for generating paginated links for archives.
 *
 * @type string $base Base of the paginated url. Default empty.
 * @type string $format Format for the pagination structure. Default empty.
 * @type int $total The total amount of pages. Default is the value WP_Query's
 *                                      `max_num_pages` or 1.
 * @type int $current The current page number. Default is 'paged' query var or 1.
 * @type bool $show_all Whether to show all pages. Default false.
 * @type int $end_size How many numbers on either the start and the end list edges.
 *                                      Default 1.
 * @type int $mid_size How many numbers to either side of the current pages. Default 2.
 * @type bool $prev_next Whether to include the previous and next links in the list. Default true.
 * @type bool $prev_text The previous page text. Default '« Previous'.
 * @type bool $next_text The next page text. Default '« Previous'.
 * @type string $type Controls format of the returned value. Possible values are 'plain',
 *                                      'array' and 'list'. Default is 'plain'.
 * @type array $add_args An array of query args to add. Default false.
 * @type string $add_fragment A string to append to each link. Default empty.
 * @type string $before_page_number A string to appear before the page number. Default empty.
 * @type string $after_page_number A string to append after the page number. Default empty.
 * }
 * @return array|string|void String of page links or array of page links.
 */
if (!function_exists('pet_space_bootstrap_paginate_links')) {
	function pet_space_bootstrap_paginate_links($args = '')
	{
		global $wp_query, $wp_rewrite;

		// Setting up default values based on the current URL.
		$pagenum_link = html_entity_decode(get_pagenum_link());
		$url_parts    = explode('?', $pagenum_link);

		// Get max pages and current page out of the current query, if available.
		$total   = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
		$current = get_query_var('paged') ? intval(get_query_var('paged')) : 1;

		// Append the format placeholder to the base URL.
		$pagenum_link = trailingslashit($url_parts[0]) . '%_%';

		// URL base depends on permalink settings.
		$format = $wp_rewrite->using_index_permalinks() && !strpos($pagenum_link, 'index.php') ? 'index.php/' : '';
		$format .= $wp_rewrite->using_permalinks() ? user_trailingslashit($wp_rewrite->pagination_base . '/%#%', 'paged') : '?paged=%#%';

		$defaults = array(
			'base'               => $pagenum_link,
			// http://example.com/all_posts.php%_% : %_% is replaced by format (below)
			'format'             => $format,
			// ?page=%#% : %#% is replaced by the page number
			'total'              => $total,
			'current'            => $current,
			'show_all'           => false,
			'prev_next'          => true,
			'prev_text'          => esc_html__('Prev', 'pet-space'),
			'next_text'          => esc_html__('Next', 'pet-space'),
			'end_size'           => 1,
			'mid_size'           => 2,
			'type'               => 'plain',
			'add_args'           => array(),
			// array of query args to add
			'add_fragment'       => '',
			'before_page_number' => '',
			'after_page_number'  => ''
		);

		$args = wp_parse_args($args, $defaults);

		if (!is_array($args['add_args'])) {
			$args['add_args'] = array();
		}

		// Merge additional query vars found in the original URL into 'add_args' array.
		if (isset($url_parts[1])) {
			// Find the format argument.
			$format       = explode('?', str_replace('%_%', $args['format'], $args['base']));
			$format_query = isset($format[1]) ? $format[1] : '';
			wp_parse_str($format_query, $format_args);

			// Find the query args of the requested URL.
			wp_parse_str($url_parts[1], $url_query_args);

			// Remove the format argument from the array of query arguments, to avoid overwriting custom format.
			foreach ($format_args as $format_arg => $format_arg_value) {
				unset($url_query_args[$format_arg]);
			}

			$args['add_args'] = array_merge($args['add_args'], urlencode_deep($url_query_args));
		}

		// Who knows what else people pass in $args
		$total = (int) $args['total'];
		if ($total < 2) {
			return;
		}
		$current  = (int) $args['current'];
		$end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
		if ($end_size < 1) {
			$end_size = 1;
		}
		$mid_size = (int) $args['mid_size'];
		if ($mid_size < 0) {
			$mid_size = 2;
		}
		$add_args   = $args['add_args'];
		$r          = '';
		$page_links = array();
		$dots       = false;

		//PREV button
		if ($args['prev_next'] && $current) :
			$link = str_replace('%_%', 2 == $current ? '' : $args['format'], $args['base']);
			$link = str_replace('%#%', $current - 1, $link);

			if ($add_args && 1 < $current) {
				$link = add_query_arg($add_args, $link);
			}

			$link .= $args['add_fragment'];

			$link_html = '<a class="prev page-numbers" href="' . esc_url(apply_filters('paginate_links', $link)) . '">' . $args['prev_text'] . '</a>';
			$disabled  = '';
			if (1 >= $current) {
				$disabled  = ' active disabled';
				$link_html = '<span class="prev page-numbers">' . $args['prev_text'] . '</span>';
			}

			/**
			 * Filter the paginated links for the given archive pages.
			 *
			 * @since 3.0.0
			 *
			 * @param string $link The paginated link URL.
			 */
			$page_links[] = '<li class="prev' . $disabled . '">' . $link_html . '</li>';
		endif;
		for ($n = 1; $n <= $total; $n++) :
			if ($n == $current) :
				$page_links[] = "<li class='active'><span class='page-numbers current'>" . $args['before_page_number'] . number_format_i18n($n) . $args['after_page_number'] . "</span></li>";
				$dots         = true;
			else :
				if ($args['show_all'] || ($n <= $end_size || ($current && $n >= $current - $mid_size && $n <= $current + $mid_size) || $n > $total - $end_size)) :
					$link = str_replace('%_%', 1 == $n ? '' : $args['format'], $args['base']);
					$link = str_replace('%#%', $n, $link);
					if ($add_args) {
						$link = add_query_arg($add_args, $link);
					}
					$link .= $args['add_fragment'];

					/** This filter is documented in wp-includes/general-template.php */
					$page_links[] = "<li><a class='page-numbers' href='" . esc_url(apply_filters('paginate_links', $link)) . "'>" . $args['before_page_number'] . number_format_i18n($n) . $args['after_page_number'] . "</a></li>";
					$dots         = true;
				elseif ($dots && !$args['show_all']) :
					$page_links[] = '<li class="disabled"><span class="page-numbers dots">&hellip;</span></li>';
					$dots         = false;
				endif;
			endif;
		endfor;

		//NEXT button
		if ($args['prev_next'] && $current) :
			$link = str_replace('%_%', $args['format'], $args['base']);
			$link = str_replace('%#%', $current + 1, $link);
			if ($add_args) {
				$link = add_query_arg($add_args, $link);
			}
			$link .= $args['add_fragment'];
			$link_html = '<a class="next page-numbers" href="' . esc_url(apply_filters('paginate_links', $link)) . '">' . $args['next_text'] . '</a>';
			$disabled  = '';
			if ($current >= $total || -1 == $total) {
				$disabled  = ' disabled active';
				$link_html = '<span class="next page-numbers">' . $args['next_text'] . '</span>';
			}

			/** This filter is documented in wp-includes/general-template.php */
			$page_links[] = '<li class="next ' . $disabled . '"> ' . $link_html . ' </li>';
		endif;
		//ignoring type as bootstrap prints only in UL
		$r .= '<ul class="pagination">';
		$r .= join("\n", $page_links);
		$r .= '</ul>';

		return $r;
	} //pet_space_bootstrap_paginate_links()
}

if (!function_exists('pet_space_paging_nav')) :
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function pet_space_paging_nav($wp_query = null, $wrapper = null)
	{

		if (!$wp_query) {
			$wp_query = $GLOBALS['wp_query'];
		}

		// Don't print empty markup if there's only one page.

		if ($wp_query->max_num_pages < 2) {
			return;
		}

		$paged        = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
		$pagenum_link = html_entity_decode(get_pagenum_link());
		$query_args   = array();
		$url_parts    = explode('?', $pagenum_link);

		if (isset($url_parts[1])) {
			wp_parse_str($url_parts[1], $query_args);
		}

		$pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
		$pagenum_link = trailingslashit($pagenum_link) . '%_%';

		$format = $GLOBALS['wp_rewrite']->using_index_permalinks() && !strpos(
			$pagenum_link,
			'index.php'
		) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit(
			'page/%#%',
			'paged'
		) : '?paged=%#%';

		// Set up paginated links.
		$links = pet_space_bootstrap_paginate_links(array(
			'base'      => $pagenum_link,
			'format'    => $format,
			'show_all'  => false,
			'total'     => $wp_query->max_num_pages,
			'current'   => $paged,
			'mid_size'  => 1,
			'type'      => 'list',
			'add_args'  => array_map('urlencode', $query_args),
			'prev_text' => esc_html__('Prev', 'pet-space'),
			'next_text' => esc_html__('Next', 'pet-space'),
		));

		if ($links) :
			if ($wrapper) : ?>
				<div class="muted_background">
				<?php
			endif;
				?>
				<nav class="loop-pagination text-center">
					<?php
					echo wp_kses_post($links);
					?>
				</nav><!-- .navigation -->
				<?php
				if ($wrapper) : ?>
				</div>
		<?php
				endif;
			endif;
		} //pet_space_paging_nav()

	endif;

	if (!function_exists('pet_space_paging_comments_nav ')) :
		/**
		 * Display navigation to next/previous set of posts when applicable.
		 */
		function pet_space_paging_comments_nav($args = array())
		{

			global $wp_rewrite;

			//for checker
			$comments_pagination = paginate_comments_links(array('echo' => false));

			if (!is_singular()) {
				return;
			}

			$page = get_query_var('cpage');
			if (!$page) {
				$page = 1;
			}
			$max_page = get_comment_pages_count();
			$defaults = array(
				'base'         => add_query_arg('cpage', '%#%'),
				'format'       => '',
				'total'        => $max_page,
				'current'      => $page,
				'echo'         => true,
				'add_fragment' => '#comments'
			);
			if ($wp_rewrite->using_permalinks()) {
				$defaults['base'] = user_trailingslashit(trailingslashit(get_permalink()) . $wp_rewrite->comments_pagination_base . '-%#%', 'commentpaged');
			}

			$args       = wp_parse_args($args, $defaults);
			$page_links = pet_space_bootstrap_paginate_links($args);

			if ($args['echo']) {
				echo wp_kses_post($page_links);
			} else {
				return $page_links;
			}
		} //pet_space_paging_comments_nav()

	endif;

	/**
	 * Find out if blog has more than one category.
	 *
	 * @return boolean true if blog has more than 1 category
	 */
	if (!function_exists('pet_space_categorized_blog')) :
		function pet_space_categorized_blog()
		{
			if (false === ($all_categories = get_transient('pet_space_category_count'))) {
				// Create an array of all the categories that are attached to posts
				$all_categories = get_categories(array(
					'hide_empty' => 1,
				));

				// Count the number of categories that are attached to the posts
				$all_categories = count($all_categories);

				set_transient('pet_space_category_count', $all_categories);
			}

			if (1 !== (int) $all_categories) {
				// This blog has more than 1 category so pet_space_categorized_blog should return true
				return true;
			} else {
				// This blog has only 1 category so pet_space_categorized_blog should return false
				return false;
			}
		} //pet_space_categorized_blog()
	endif;

	if (!function_exists('pet_space_post_nav')) :
		/**
		 * Display navigation to next/previous post when applicable.
		 */
		function pet_space_post_nav()
		{
			// Don't print empty markup if there's nowhere to navigate.
			$previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(
				false,
				'',
				true
			);
			$next     = get_adjacent_post(false, '', false);

			if (!$next && !$previous) {
				return;
			}
		?>
		<nav class="navigation post-navigation items-nav greylinks" role="navigation">
			<?php
			$previous = (is_attachment()) ? get_post(get_post()->post_parent) : get_adjacent_post(false, '', true);
			$next     = get_adjacent_post(false, '', false);

			if (is_attachment() && 'attachment' == $previous->post_type) {
				return;
			}

			if ($previous && has_post_thumbnail($previous->ID)) {
				$prevthumb      = wp_get_attachment_image_src(get_post_thumbnail_id($previous->ID), 'post-thumbnail');
				$prev_thumbnail = $prevthumb[0];
			} else {
				$prev_thumbnail = '';
			}

			if ($next && has_post_thumbnail($next->ID)) {
				$nextthumb      = wp_get_attachment_image_src(get_post_thumbnail_id($next->ID), 'post-thumbnail');
				$next_thumbnail = $nextthumb[0];
			} else {
				$next_thumbnail = '';
			}
			?>
			<?php previous_post_link('%link', '<div class="media with_background  prev-item text-center" style="background-image: url(' . esc_url($prev_thumbnail) . '); "><div class="nav-overlay"></div><div class="nav-middle"><span class="nav">' . esc_html__('Prev', 'pet-space') . '</span><span class="title">%title</span></div></div>'); ?>
			<?php next_post_link('%link', '<div class="media with_background next-item text-center" style="background-image: url(' . esc_url($next_thumbnail) . '); "><div class="nav-overlay"></div><div class="nav-middle"><span class="nav">' . esc_html__('Next', 'pet-space') . '</span><span class="title">%title</span></div></div>'); ?>
		</nav><!-- .navigation -->
		<?php } //pet_space_post_nav
	endif;

	if (!function_exists('pet_space_posted_on')) : /**
		 * Print HTML with meta information for the current post-date/time and author.
		 */
		function pet_space_posted_on()
		{
			// Set up and print post meta information.
			printf(
				'<span class="entry-date post-date highlight3"><a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a></span>',
				esc_url(get_permalink()),
				esc_attr(get_the_date('c')),
				esc_html(get_the_date())
			);
		}

	endif; //pet_space_posted_on

	if (!function_exists('pet_space_posted_by')) : /**
		 * Print HTML with meta information for the current post-date/time and author.
		 */
		function pet_space_posted_by()
		{
			if (is_sticky() && is_home() && !is_paged()) {
				echo '<span class="featured-post"><i class="rt-icon2-clip highlight"></i>' . esc_html__(' Sticky: ', 'pet-space') . '</span>';
			}
			// Get the author name; wrap it in a link.
			printf(
				/* translators: %s: post author */
				'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . '%1$s' . get_the_author() . '</a></span>',
				esc_html_x('by ', 'Used before post author name.', 'pet-space')
			);
		}

	endif; //pet_space_posted_by


	/**
	 * Display an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index
	 * views, or a div element when on single views.
	 */
	if (!function_exists('pet_space_post_thumbnail')) :
		function pet_space_post_thumbnail($small_image = false)
		{
			$pID = get_the_ID();

			//detecting featured video
			$embed_url = function_exists('fw_get_db_post_option') ? fw_get_db_post_option($pID, 'post-featured-video', '') : '';
			$iframe    = '';
			if ($embed_url) {
				global $wp_embed;

				$width  = '1170';
				$height = '780';
				$iframe = $wp_embed->run_shortcode('[embed  width="' . $width . '" height="' . $height . '"]' . trim($embed_url) . '[/embed]');
			} // embed_url

			//detecting gallery
			$is_gallery = false;
			if (get_post_format($pID) == 'gallery') {

				pet_space_shortcode_atts_gallery_trigger();
				$galleries_images = get_post_galleries_images($pID);
				pet_space_shortcode_atts_gallery_trigger(false);
				$galleries_images_count = count($galleries_images);

				if ($galleries_images_count) {
					$is_gallery = true;
				}
			} //gallery post format

			if (post_password_required() || is_attachment() || (!has_post_thumbnail() && !$is_gallery && !$iframe)) {
				return false;
			}

			//adding additional wrap for small image layout feed
			if (!is_singular() && $small_image) :
		?>
			<div class="col-md-6">
			<?php
			endif; //!is_singular and small image
			?>
			<div class="item-media-wrap">
				<div class="item-media entry-thumbnail post-thumbnail">
					<?php
					// info in corner only for feed view and only for posts
					if (!is_singular() && 'post' === get_post_type()) : ?>
						<div class="entry-meta-corner">
							<?php
							// Set up and print post meta information.
							printf(
								'<span class="date">
									<time class="entry-date" datetime="%1$s">
										<strong>%2$s</strong>%3$s
									</time>
								</span>',
								esc_attr(get_the_date('c')),
								esc_html(get_the_date('j')),
								esc_html(get_the_date('M'))
							);

							// Set up and print post meta information.
							if (!post_password_required() && (comments_open() || get_comments_number())) :
							?>
								<span class="comments-link">
									<i class="rt-icon2-bubble highlight"></i>
									<?php comments_popup_link(esc_html__('0', 'pet-space'), esc_html__('1', 'pet-space'), esc_html__('%', 'pet-space')); ?>
								</span>
							<?php
							endif; //post_password_required
							?>
						</div>
						<?php endif; //!is_singular && 'post'

					//featured image only for post
					if (!$is_gallery) :
						if ($iframe) : ?>
							<div class="embed-responsive embed-responsive-3by2">
								<?php if (has_post_thumbnail()) : ?>
									<a href="" data-iframe="<?php echo esc_attr($iframe) ?>" class="embed-placeholder">
									<?php
								else :
									echo wp_kses($iframe, array(
										'iframe' => array(
											'width'           => true,
											'height'          => true,
											'src'             => true,
											'frameborder'     => true,
											'allowfullscreen' => true,
										),
									));
								endif; //has_post_thumbnail inside iframe check
							endif; // iframe check

							if (
								!(is_singular() && !$small_image)
								|| ('fw-event' === get_post_type())
								|| (is_singular() && $iframe)
							) {
								the_post_thumbnail('pet-space-full-width');
							} elseif (!is_singular() && $small_image) {
								the_post_thumbnail('pet-space-small-width');
							} else {
								the_post_thumbnail();
							} //$current_position

							// creating post link for whole featured image
							if (!is_singular() && !$iframe && !('fw-portfolio' === get_post_type())) : ?>
									<div class="media-links">
										<a class="abs-link" href="<?php the_permalink(); ?>"></a>
									</div>
									<?php endif; //!is_singular check
								if ($iframe) :
									if (has_post_thumbnail()) :
									?>
									</a><!-- eof image link -->
								<?php endif; //post thumbnail check for closing A tag
								?>
							</div>
						<?php endif; //iframe check

							// gallery
							else :
								//featured image url
								$post_featured_image_src = wp_get_attachment_url(get_post_thumbnail_id($pID));
						?>
						<div id="owl-carousel-<?php echo esc_attr($pID); ?>" class="owl-carousel" data-loop="true" data-margin="0" data-nav="false" data-dots="true" data-themeclass="owl-theme entry-thumbnail-carousel" data-center="false" data-items="1" data-autoplay="true" data-speed="<?php pet_space_slide_speed(); ?>" data-responsive-xs="1" data-responsive-sm="1" data-responsive-md="1" data-responsive-lg="1">
							<?php
								//adding featured image as a first element in carousel
								if ($post_featured_image_src) : ?>
								<div class="item">
									<img src="<?php echo esc_attr($post_featured_image_src); ?>" alt="<?php echo esc_attr(get_the_title($pID)); ?>">
								</div>
								<?php endif;
								$count = 1;
								foreach ($galleries_images as $gallerie) :
									foreach ($gallerie as $src) :
										//showing only 3 images from gallery
										if ($count > 3) {
											break 2;
										}
								?>
									<div class="item">
										<img src="<?php echo esc_attr($src); ?>" alt="<?php echo esc_attr(get_the_title($pID)); ?>">
									</div>
							<?php
										$count++;
									endforeach;
								endforeach; ?>
						</div>
					<?php
							endif; // $is_gallery
					?>
				</div> <!-- .item-media -->
			</div> <!-- .item-media-wrap -->
			<?php
			//closing additional wrap for small image layout feed
			if (!is_singular() && $small_image) : ?>
			</div> <!-- eof .col-md-6 -->
		<?php endif; //!is_singular and small image 
		?>

		<?php } //pet_space_post_thumbnail()
	endif;

	//get predefined template part from theme options
	if (!function_exists('pet_space_get_predefined_template_part')) :
		/**
		 * Return propper template part from options or default.
		 * string $template_part_name
		 */
		function pet_space_get_predefined_template_part($template_part_name)
		{
			$template_part_name = sanitize_title_with_dashes($template_part_name);
			if (function_exists('fw_get_db_customizer_option')) {
				$option_value = fw_get_db_customizer_option($template_part_name);
				if ($option_value) {
					$template_part = $template_part_name . '-' . $option_value;
				} else {
					$template_part = $template_part_name . '-1';
				}
				//no unyson - return default (1) template part
			} else {
				$template_part = $template_part_name . '-1';
			}

			//get template part from ULR - for demo
			if (isset($_GET[$template_part_name])) {
				$template_part = $template_part_name . '-' . (int) $_GET[$template_part_name];
			}

			return $template_part;
		} //pet_space_get_predefined_template_part()

	endif; //function_exists

	//get ids of showing widgets
	if (!function_exists('pet_space_get_showing_widgets_ids')) :
		/**
		 * Return array of id's of all widgets that are showing.
		 */

		function pet_space_get_showing_widgets_ids()
		{
			$showing_widgets     = wp_get_sidebars_widgets();
			$showing_widgets_ids = array();
			foreach ($showing_widgets as $sidebar_name => $sidebar_widgets) {
				foreach ($sidebar_widgets as $sidebar_widget_id) {
					if ($sidebar_name !== 'wp_inactive_widgets') {
						$showing_widgets_ids[] = $sidebar_widget_id;
					}
				}
			}

			return $showing_widgets_ids;
		}
	endif;

	//returning first taxonomy of displayed archive
	if (!function_exists('pet_space_get_posts_single_taxonomy_name')) :
		function pet_space_get_posts_single_taxonomy_name($queried_object)
		{
			$taxonomies_array = get_object_taxonomies($queried_object->name);

			return $taxonomies_array[0];
		}
	endif;

	//get all unique categories for all showing posts
	if (!function_exists('pet_space_get_post_categories')) :
		function pet_space_get_post_categories($taxonomy_name = 'category')
		{
			//get all terms for filter
			if (have_posts()) :

				$all_categories = array();
				$categories     = array();
				// Start the Loop.
				while (have_posts()) : the_post();
					$all_categories[] = get_the_terms(get_the_ID(), $taxonomy_name);
				endwhile;
				wp_reset_postdata();

				foreach ($all_categories as $post_categories) :
					foreach ($post_categories as $category) :
						$categories[] = $category;
					endforeach;
				endforeach;

				$categories = array_unique($categories, SORT_REGULAR);

				return $categories;

			endif; //have_posts
		}
	endif;

	//get all taxonomies slug for single post. Used inside loop
	if (!function_exists('pet_space_get_categories_slugs_for_single_post')) :
		function pet_space_get_categories_slugs_for_single_post($taxonomy_name = 'category')
		{
			$term_objects      = get_the_terms(get_the_ID(), $taxonomy_name);
			$item_filter_class = '';
			foreach ($term_objects as $term_object) {
				$item_filter_class .= ' ' . $term_object->slug;
			}

			return $item_filter_class;
		}
	endif;


	if (!function_exists('pet_space_kses_list')) :
		/**
		 * Returns allowed tags array for wp_kses functions
		 */
		function pet_space_kses_list($add_tags = array(), $add_atts = array())
		{

			//init additional params
			if (!is_array($add_tags)) {
				$add_tags = array();
			}
			if (!is_array($add_atts)) {
				$add_atts = array();
			}

			//allowed attributes for all tags
			$allowed_atts = array(
				'align'       => true,
				'aria-hidden' => true,
				'aria-label'  => true,
				'class'       => true,
				'clear'       => true,
				'dir'         => true,
				'id'          => true,
				'lang'        => true,
				'name'        => true,
				'style'       => true,
				'title'       => true,
				'xml:lang'    => true,
			) + $add_atts;

			if (is_array($add_tags) && !empty($add_tags)) {
				foreach ($add_tags as $key => $value) {
					$add_tags[$key] += $allowed_atts;
				}
			}

			//final allowed tags array
			return array(
				'address'    => $allowed_atts,
				'a'          => array(
					'href'         => true,
					'rel'          => true,
					'rev'          => true,
					'target'       => true,
					'data-content' => true,
					'data-month'   => true,
					'onclick'      => true,
				) + $allowed_atts,
				'abbr'       => $allowed_atts,
				'acronym'    => $allowed_atts,
				'area'       => array(
					'alt'    => true,
					'coords' => true,
					'href'   => true,
					'nohref' => true,
					'shape'  => true,
					'target' => true,
				) + $allowed_atts,
				'aside'      => $allowed_atts,
				'b'          => $allowed_atts,
				'bdo'        => $allowed_atts,
				'big'        => $allowed_atts,
				'blockquote' => array(
					'cite' => true,
				) + $allowed_atts,
				'br'         => $allowed_atts,
				'cite'       => $allowed_atts,
				'code'       => $allowed_atts,
				'del'        => array(
					'datetime' => true,
				) + $allowed_atts,
				'dd'         => $allowed_atts,
				'dfn'        => $allowed_atts,
				'details'    => array(
					'open' => true,
				) + $allowed_atts,
				'div'        => $allowed_atts,
				'dl'         => $allowed_atts,
				'dt'         => $allowed_atts,
				'em'         => $allowed_atts,
				'h1'         => $allowed_atts,
				'h2'         => $allowed_atts,
				'h3'         => $allowed_atts,
				'h4'         => $allowed_atts,
				'h5'         => $allowed_atts,
				'h6'         => $allowed_atts,
				'hr'         => array(
					'noshade' => true,
					'size'    => true,
					'width'   => true,
				) + $allowed_atts,
				'i'          => $allowed_atts,
				'img'        => array(
					'alt'      => true,
					'border'   => true,
					'height'   => true,
					'hspace'   => true,
					'longdesc' => true,
					'vspace'   => true,
					'src'      => true,
					'usemap'   => true,
					'width'    => true,
				) + $allowed_atts,
				'ins'        => array(
					'datetime' => true,
					'cite'     => true,
				) + $allowed_atts,
				'kbd'        => $allowed_atts,
				'li'         => array(
					'value' => true,
				) + $allowed_atts,
				'map'        => $allowed_atts,
				'mark'       => $allowed_atts,
				'p'          => $allowed_atts,
				'pre'        => array(
					'width' => true,
				) + $allowed_atts,
				'q'          => array(
					'cite' => true,
				) + $allowed_atts,
				's'          => $allowed_atts,
				'samp'       => $allowed_atts,
				'span'       => array(
					'data-content' => true,
				) + $allowed_atts,
				'small'      => $allowed_atts,
				'strike'     => $allowed_atts,
				'strong'     => $allowed_atts,
				'sub'        => $allowed_atts,
				'summary'    => $allowed_atts,
				'sup'        => $allowed_atts,
				'time'       => array(
					'datetime' => true,
				) + $allowed_atts,
				'tt'         => $allowed_atts,
				'u'          => $allowed_atts,
				'ul'         => array(
					'type' => true,
				) + $allowed_atts,
				'ol'         => array(
					'start'    => true,
					'type'     => true,
					'reversed' => true,
				) + $allowed_atts,
				'var'        => $allowed_atts,
			) + $add_tags;
		}
	endif;

	if (!function_exists('pet_space_get_slide_speed')) :
		/**
		 * Retrieve global sliding speed.
		 */
		function pet_space_get_slide_speed($default = 5000)
		{

			return function_exists('fw_get_db_customizer_option')
				? ((int) fw_get_db_customizer_option('slide_speed')) * 1000 : $default;
		}
	endif;

	if (!function_exists('pet_space_slide_speed')) :
		/**
		 * Output global sliding speed.
		 */
		function pet_space_slide_speed($default = 5000)
		{

			echo esc_attr(pet_space_get_slide_speed($default));
		}
	endif;

	if (!function_exists('pet_space_read_more_options')) :
		/**
		 * Output global sliding speed.
		 */
		function pet_space_read_more_options($label, $color = 'color1')
		{

			$button = $button_options = false;

			//get button to add:
			if ($shortcodes = fw_ext('shortcodes')) {
				if ($button = $shortcodes->get_shortcode('button')) {
					$button_options = $button->get_options();
					$button_options['label']['value'] = esc_html__('Read More', 'pet-space');
					unset($button_options['link']);
					$button_options['size']['value'] = 'wide_button';
					$button_options['color']['value'] = $color;
					$button_options['type']['value'] = 'theme_button';
				}
			}

			return array(
				'type'         => 'multi-picker',
				'label'        => false,
				'desc'         => false,
				'picker'       => array(
					'link_type' => array(
						'type'    => 'radio',
						'value'   => 'button',
						'label'   => esc_html($label),
						'desc'    => esc_html__('Show read more link at the bottom of each item', 'pet-space'),
						'choices' => array(
							'button' => esc_html__('as button', 'pet-space'),
							'arrow'  => esc_html__('as arrow', 'pet-space'),
							'none'   => esc_html__('do not show', 'pet-space'),
						),
						'inline' => true,
					),

				),
				'choices'       => array(
					'button'    => array(
						'button_options' => $button
							? array(
								'type'          => 'popup',
								'popup-title'   => esc_html__('Button', 'pet-space'),
								'button'        => esc_html__('Edit', 'pet-space'),
								'popup-options' => $button_options,
							)
							: array(
								'type' => 'multi',
								'label' => false,
							)
					),
					'arrow'     => array(
						'color'       => array(
							'label'   => esc_html__('Arrow Color', 'pet-space'),
							'type'    => 'select',
							'value'    => $color,
							'choices' => array(
								'color1'  => esc_html__('Color 1', 'pet-space'),
								'color2'  => esc_html__('Color 2', 'pet-space'),
								'color3'  => esc_html__('Color 3', 'pet-space'),
								'color4'  => esc_html__('Color 4', 'pet-space'),
								'color5'  => esc_html__('Color 5', 'pet-space'),
							)
						),
					),
				),
				'show_borders' => false,
			);
		}
	endif;

	if (!function_exists('pet_space_read_more_render')) :
		/**
		 * Output global sliding speed.
		 */
		function pet_space_read_more_render($link = false)
		{

			$use_button = $use_arrow = false;
			if ($link) {
				if ('button' == $link['link_type']) {
					$use_button = true;
					$link = $link['button'];
					if (!empty($link['button_options'])) {
						$link = $link['button_options'];
						$link['link'] = esc_url(get_the_permalink());
						$link['class'] .= 'read-more-button';
					}
				} elseif ('arrow' == $link['link_type']) {
					$use_arrow = true;
					$link = $link['arrow'];
					$link['link'] = esc_url(get_the_permalink());
					$link['class'] = 'read-more' . ' ' . $link['color'];
				}
			}

			if ($use_button) {
				echo fw_ext('shortcodes')->get_shortcode('button')->render($link);
			}
			if ($use_arrow) { ?>
			<a href="<?php echo esc_url($link['link']); ?>" class="<?php echo esc_attr($link['class']); ?>"></a><?php
																											}
																										}
																									endif;


																									if (!function_exists('pet_space_get_root_colors_inline_styles_string')) {
																										/**
																										 * Get ":root" colors inline styles string.
																										 */

																										function pet_space_get_root_colors_inline_styles_string()
																										{
																											$options = array();
																											$color_defaults = array(
																												'accent_color_1' => '#f7b82b',
																												'accent_color_2' => '#8fc424',
																												'accent_color_3' => '#e34f61',
																												'accent_color_4' => '#712357',
																											);

																											if (function_exists('fw_get_db_customizer_option')) {
																												$options['accent_color_1'] = fw_get_db_customizer_option('accent_color_1');
																												$options['accent_color_2'] = fw_get_db_customizer_option('accent_color_2');
																												$options['accent_color_3'] = fw_get_db_customizer_option('accent_color_3');
																												$options['accent_color_4'] = fw_get_db_customizer_option('accent_color_4');
																											}

																											$options['accent_color_1'] = !empty($options['accent_color_1']) ? $options['accent_color_1'] : $color_defaults['accent_color_1'];
																											$options['accent_color_2'] = !empty($options['accent_color_2']) ? $options['accent_color_2'] : $color_defaults['accent_color_2'];
																											$options['accent_color_3'] = !empty($options['accent_color_3']) ? $options['accent_color_3'] : $color_defaults['accent_color_3'];
																											$options['accent_color_4'] = !empty($options['accent_color_4']) ? $options['accent_color_4'] : $color_defaults['accent_color_4'];
																											$pet_space_colors_string = '';

																											// Accent colors from customizer
																											$colorMain = sanitize_hex_color($options['accent_color_1']);
																											$colorMain2 = sanitize_hex_color($options['accent_color_2']);
																											$colorMain3 = sanitize_hex_color($options['accent_color_3']);
																											$colorMain4 = sanitize_hex_color($options['accent_color_4']);
																											$pet_space_colors_string .= '--c-main:' . sanitize_hex_color($options['accent_color_1']) . ';';
																											$pet_space_colors_string .= '--c-main2:' . sanitize_hex_color($options['accent_color_2']) . ';';
																											$pet_space_colors_string .= '--c-main3:' . sanitize_hex_color($options['accent_color_3']) . ';';
																											$pet_space_colors_string .= '--c-main4:' . sanitize_hex_color($options['accent_color_4']) . ';';

																											// lighten(desaturate($mainColor3, 4.85), 8.43);

																											$colorMain3DesaturateLighten = new Pet_Space_Color($colorMain3);
																											$colorMain3DesaturateLighten->desaturate(4.85);
																											$colorMain3DesaturateLighten->lighten(8.43);
																											$pet_space_colors_string .= '--c-main3DesaturateLighten:#' . $colorMain3DesaturateLighten->hex . ';';

																											// colorMainLighter30
																											$colorMainLighter30 = new Pet_Space_Color($colorMain);
																											$colorMainLighter30->lighten(30);
																											$pet_space_colors_string .= '--c-mainLighter30:#' . $colorMainLighter30->hex . ';';

																											// colorMainLighter20
																											$colorMainLighter20 = new Pet_Space_Color($colorMain);
																											$colorMainLighter20->lighten(20);
																											$pet_space_colors_string .= '--c-mainLighter20:#' . $colorMainLighter20->hex . ';';

																											// colorMainLighter10
																											$colorMainLighter10 = new Pet_Space_Color($colorMain);
																											$colorMainLighter10->lighten(10);
																											$pet_space_colors_string .= '--c-mainLighter10:#' . $colorMainLighter10->hex . ';';



																											//colorMainDarken10
																											$colorMainDarken10 = new Pet_Space_Color($colorMain);
																											$colorMainDarken10->darken(10);
																											$pet_space_colors_string .= '--c-mainDarken10:#' . $colorMainDarken10->hex . ';';

																											//colorMain2Darken10
																											$colorMain2Darken10 = new Pet_Space_Color($colorMain2);
																											$colorMain2Darken10->darken(10);
																											$pet_space_colors_string .= '--c-main2Darken10:#' . $colorMain2Darken10->hex . ';';

																											//colorMain3Darken10
																											$colorMain3Darken10 = new Pet_Space_Color($colorMain3);
																											$colorMain3Darken10->darken(10);
																											$pet_space_colors_string .= '--c-main3Darken10:#' . $colorMain3Darken10->hex . ';';


																											//colorMain4Darken10
																											$colorMain4Darken10 = new Pet_Space_Color($colorMain4);
																											$colorMain4Darken10->darken(10);
																											$pet_space_colors_string .= '--c-main4Darken10:#' . $colorMain4Darken10->hex . ';';

																											//RGB Colors

																											// colorMainRGB
																											$colorMainRGB = new Pet_Space_Color($colorMain);
																											$colorMainRGB = $colorMainRGB->rgbString();
																											$pet_space_colors_string .= '--c-mainRGB:' . $colorMainRGB . ';';

																											// colorMain2RGB
																											$colorMain2RGB = new Pet_Space_Color($colorMain2);
																											$colorMain2RGB = $colorMain2RGB->rgbString();
																											$pet_space_colors_string .= '--c-main2RGB:' . $colorMain2RGB . ';';


																											return $pet_space_colors_string;
																										}
																									}

																									//copyright text - year
																									if (!function_exists('pet_space_get_copyright_text')) :
																										function pet_space_get_copyright_text($pet_space_text = '')
																										{
																											$pet_space_text = str_replace('[year]', '<span class="copyright-year">' . date('Y') . '</span>', $pet_space_text);
																											return $pet_space_text;
																										}
																									endif;
