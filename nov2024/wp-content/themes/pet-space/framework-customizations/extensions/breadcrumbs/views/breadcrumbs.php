<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * Breadcrumbs default view
 * Parameters:
 *
 * @var array $items , array with pages ordered hierarchical
 * $items = array(
 *      0 => array(
 *          'name'  => 'Item name',
 *          'url'   => 'Item URL'
 *      )
 * )
 * Each $items array will contain additional information about item, e.g.:
 * 'items' => array (
 *        0 => array (
 *            'name' => 'Homepage',
 *          'type' => 'front_page',
 *            'url' => 'http://yourdomain.com/',
 *        ),
 *        1 => array (
 *            'type' => 'taxonomy',
 *            'name' => 'Uncategorized',
 *            'id' => 1,
 *            'url' => 'http://yourdomain.com/category/uncategorized/',
 *            'taxonomy' => 'category',
 *        ),
 *        2 => array (
 *            'name' => 'Post Article',
 *            'id' => 4781,
 *            'post_type' => 'post',
 *            'type' => 'post',
 *            'url' => 'http://yourdomain.com/post-article/',
 *        ),
 *    ),
 * @var string $separator , the separator symbol
 */
if ( ! empty( $items ) ) : ?>
	<ol class="breadcrumb darklinks">
		<?php for ( $i = 0; $i < count( $items ); $i ++ ) : ?>
			<?php if ( $i == ( count( $items ) - 1 ) ) : ?>
				<li class="last-item"><?php echo wp_kses_post( $items[ $i ]['name'] ); ?></li>
			<?php elseif ( $i == 0 ) : ?>
				<li class="first-item">
				<?php if ( isset( $items[ $i ]['url'] ) ) : ?>
					<a href="<?php echo wp_kses_post( $items[ $i ]['url'] ); ?>"><?php echo wp_kses_post( $items[ $i ]['name'] ); ?></a></li>
				<?php else : echo wp_kses_post( $items[ $i ]['name'] ); endif; ?>
				<?php
			else : ?>
			<li class="<?php echo esc_attr( $i - 1 ) ?>-item">
				<?php if ( isset( $items[ $i ]['url'] ) ) : ?>
					<a href="<?php echo wp_kses_post( $items[ $i ]['url'] ); ?>"><?php echo wp_kses_post( $items[ $i ]['name'] ); ?></a></li>
				<?php else : echo wp_kses_post( $items[ $i ]['name'] ); endif; ?>
			<?php endif ?>
		<?php endfor ?>
	</ol>
<?php endif ?>