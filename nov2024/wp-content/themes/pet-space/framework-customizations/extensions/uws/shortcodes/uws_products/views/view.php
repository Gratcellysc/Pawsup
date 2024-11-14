<?php
if ( ! defined( 'FW' ) &&  !function_exists('_uws_fw_extensions_locations') ) {
	return;
}

$uws_products_params = '';
$uws_limit_param     = '';
$uws_limit           = (int) $atts['limit'];
if ( $uws_limit ) {
	$uws_products_params .= ' limit="' . $uws_limit . '"';
}

if ( ! empty( $atts['category'] ) ) {
	$uws_products_params .= ' category="' . implode( ",", uws_get_product_taxonomies_slug_by_id( $atts['category'] ) ) . '"';
}

$uws_products_params .= ' columns="' . $atts['layout']['default']['columns'] . '"';
$uws_products_params .= ' orderby="' . $atts['orderby'] . '"';
$uws_products_params .= ' order="' . $atts['order'] . '"';
//$carousel_center = $atts['carousel_center'] ? 'carousel-center' : '';
if ( $atts['type'] == 'on_sale' ) {
	$uws_products_params .= ' on_sale="true"';
} elseif ( $atts['type'] == 'best_selling' ) {
	$uws_products_params .= ' best_selling="true"';
} elseif ( $atts['type'] == 'top_rated' ) {
	$uws_products_params .= ' top_rated="true"';
} elseif ( $atts['type'] == 'featured_products' ) {
    $uws_products_params .= ' visibility="featured"';
}

$layout_type = $atts['layout']['layout_type'];
//$navigation = $atts['navigation'];
$carousel_columns = ( !empty( $layout ) ) ? 'carousel_col_' . $atts['default']['columns'] : '';

switch ( $layout_type ):
    case 'default':
?>
<div class="uws-products <?php echo esc_attr( $atts['class'] . ' ' . $layout_type . ' ' . $carousel_columns ); ?>">
	<?php echo do_shortcode( '[products ' . $uws_products_params . ']' ); ?>
</div>

<?php
    break;
    case 'carousel-layout':
    ?>
    <?php if ( $atts['layout']['carousel-layout']['show_filters'] && $atts['category'] ) : ?>
    <div class="filters gallery-filters product-filters-<?php echo esc_attr( $atts['unique_id'] ) ?> text-center">
        <a href="#" data-filter="*" class="selected"><?php esc_html_e( 'All', 'pet-space' ); ?></a>
        <?php
		foreach ( $atts['category'] as $cat ) {
			$var = get_term($cat);
			?>
			<a href="#" data-filter=".product_cat-<?php echo esc_attr( $var->slug ); ?>"><?php echo esc_html( $var->name ); ?></a>
			<?php
		} //foreach
		?>
    </div>
    <?php endif; ?>
<?php
    $center = $atts['layout']['carousel-layout']['center'];
    $autoplay = $atts['layout']['carousel-layout']['autoplay'];
    $responsive_lg = $atts['layout']['carousel-layout']['responsive_lg'];
    $responsive_md = $atts['layout']['carousel-layout']['responsive_md'];
    $responsive_sm = $atts['layout']['carousel-layout']['responsive_sm'];
    $responsive_xs = $atts['layout']['carousel-layout']['responsive_xs'];
?>
<div class="uws-products carousel <?php echo esc_attr( $atts['class'] ); ?>"
     data-loop="false"
     data-nav="false"
     data-dots="false"
     data-center="<?php echo esc_attr( $center ); ?>"
     data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
     data-responsive-lg="<?php echo esc_attr( $responsive_lg ); ?>"
     data-responsive-md="<?php echo esc_attr( $responsive_md ); ?>"
     data-responsive-sm="<?php echo esc_attr( $responsive_sm ); ?>"
     data-responsive-xs="<?php echo esc_attr( $responsive_xs ); ?>"
     data-margin="30"
    <?php if ( $atts['layout']['carousel-layout']['show_filters'] && $atts['category'] ) : ?>
        data-filters=".product-filters-<?php echo esc_attr( $atts['unique_id'] ) ?>"
    <?php endif; ?>
>
    <?php echo do_shortcode( '[products ' . $uws_products_params . ']' ); ?>
</div>

<?php
break;
case 'cat-layout':

$center = $atts['layout']['cat-layout']['center'];
$autoplay = $atts['layout']['cat-layout']['autoplay'];
$responsive_lg = $atts['layout']['cat-layout']['responsive_lg'];
$responsive_md = $atts['layout']['cat-layout']['responsive_md'];
$responsive_sm = $atts['layout']['cat-layout']['responsive_sm'];
$responsive_xs = $atts['layout']['cat-layout']['responsive_xs'];
$margin = $atts['layout']['cat-layout']['margin'];
?>
<div class="uws-products carousel uws-categories <?php echo esc_attr( $atts['class'] ); ?>"
     data-loop="true"
     data-nav="false"
     data-dots="false"
     data-center="<?php echo esc_attr( $center ); ?>"
     data-autoplay="<?php echo esc_attr( $autoplay ); ?>"
     data-responsive-lg="<?php echo esc_attr( $responsive_lg ); ?>"
     data-responsive-md="<?php echo esc_attr( $responsive_md ); ?>"
     data-responsive-sm="<?php echo esc_attr( $responsive_sm ); ?>"
     data-responsive-xs="<?php echo esc_attr( $responsive_xs ); ?>"
     data-margin="<?php echo esc_attr( $margin ); ?>"
>
    <div class="woocommerce">
        <ul class="products">
            <?php
            foreach ( $atts['category'] as $cat ) {
                $var = get_term($cat);
                $cat_thumb_id = get_term_meta( $cat, 'thumbnail_id', true );
                $count = $var->count;
                ?>
                <li class="item-link bottom">
                    <div class="position-relative">
                        <div class="item-media">
                            <?php
                            if ( !empty(wp_get_attachment_image( $cat_thumb_id, array('600','600') )) ) :
                                echo wp_get_attachment_image( $cat_thumb_id, array('600','600') );
                            else:
                            ?>
                                <img src="<?php echo esc_attr(get_parent_theme_file_uri() . '/img/woocommerce-placeholder.png') ?>" alt="<?php echo esc_attr('placeholder') ?>">
                            <?php endif; ?>
                            </div>
                        <div class="title">
                            <h6>
                                <a href="<?php echo esc_attr( get_category_link($cat) ) ?>" ><?php echo esc_attr($var->name) ?></a>
                            </h6>
                            <p><?php
                                $letter = $count . ' ' . (($count > 1) ? 'products' : 'product');
                                echo esc_html($letter) ?></p>
                        </div>
                    </div>
                </li>
                <?php
            } //foreach
            ?>
        </ul>
    </div>
</div>
<?php
break;
endswitch;
?>
