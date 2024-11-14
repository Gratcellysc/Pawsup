function initShopTables() {

    jQuery('div.quantity').each(function () {
        $this = jQuery(this);

        if ($this.find('.plus').length) {
            return;
        }

        $this.find('[type="number"]')
            .before('<input type="button" value="-" class="minus">')
            .after('<input type="button" value="+" class="plus">')
            .end()
            .parent()
            .find('button')
            .addClass('theme_button color3')
            .prepend('<i class="rt-icon2-basket"></i>');
    });

    jQuery('.plus, .minus').on('click', function (e) {
        var numberField = jQuery(this).parent().find('[type="number"]');
        var currentVal = ( numberField.val() === '' ) ? 0 : numberField.val();
        var sign = jQuery(this).val();
        if (sign === '-') {
            if (currentVal > 1) {
                numberField.val(parseFloat(currentVal) - 1);
            }
        } else {
            numberField.val(parseFloat(currentVal) + 1);
        }
        numberField.trigger('change');
    });
}

//quantity arrows
function addQuantityArrows() {
    jQuery('<i class="fa fa-angle-down"></i>').insertAfter('input.minus');
    jQuery('<i class="fa fa-angle-up"></i>').insertAfter('input.plus');
}

function updateCard(){
    var shopTable = jQuery('.shop_table');
    shopTable.find('.quantity input[type="number"]').on('change', function () {
        setTimeout(function () {
            shopTable.find('button[name="update_cart"]').trigger('click');
        },300);
    });
}

function putPlaceholdersToInputs() {
    //for categories
    jQuery('select[name="cat"]').on('change', function () {
        var $form = jQuery(this).closest('form');
        if ($form.length) {
            $form.trigger('submit');
        }
    });

    jQuery('label[for]').each(function () {
        var $label = jQuery(this);
        var $input = jQuery('#'+ $label.attr('for'));
        if(!$input.attr('placeholder')) {
            if(!$input.is('[type="radio"]') && !$input.is('[type="checkbox"]') && !$input.is('select')) {
                $input.attr('placeholder', $label.text());
                $label.css({'display': 'none'});
            }
        }
    })
}

jQuery(document).ready(function () {

    //////////
    //layout//
    //////////

    //tables - reloaded - needs CSS
    initShopTables();
    addQuantityArrows();
    jQuery('.shop_attributes').addClass('table table-striped');

    putPlaceholdersToInputs();

    //woo cart update events:
    //- update_checkout
    //- updated_wc_div
    //- updated_cart_totals
    //- updated_shipping_method
    //- applied_coupon
    //- removed_coupon
    updateCard()
    jQuery('body').on('updated_cart_totals', function (e) {
        initShopTables();
        addQuantityArrows();
        updateCard()
    });

    if ( document.getElementById('yith-quick-view-modal') ) {
        if ( document.getElementById('yith-quick-view-content') ) {
            var self = document.getElementById('yith-quick-view-content');
            if ( !self.classList.contains('ls') ) {
                self.classList.add('ls');
            }
        }
        if ( document.getElementById('content_products') || document.getElementsByClassName('uws-products') ) {

            var $buttons = document.querySelectorAll('.product .yith-wcqv-button');

            [].slice.call($buttons).forEach(function (elem) {
                elem.addEventListener('click', function () {
                    var target = document.getElementById('yith-quick-view-modal');
                    var config = {childList: true, subtree: true};
                    var observer = new MutationObserver(function(mutations) {
                        if ( mutations.length ) {
                            initShopTables();
                            addQuantityArrows();
                        }
                        observer.disconnect();
                    });
                    observer.observe(target, config);

                    if (this.closest('.product').querySelector('.onnew')){
                        var badge_new = this.closest('.product').querySelector('.onnew');
                        var badge_new1 = badge_new.cloneNode(true);
                        if ( document.getElementById('yith-quick-view-modal') ) {
                            var modal = document.getElementById('yith-quick-view-modal');
                            var observer2 = new MutationObserver(function(mutations) {
                                if ( mutations.length ) {
                                    var product_collection = modal.querySelector('.type-product');
                                    product_collection.insertBefore(badge_new1, product_collection.childNodes[2]);
                                }
                                observer2.disconnect();
                            });
                            observer2.observe(target, config);
                        }
                    }
                });
            });
        }
    }

    if ( document.querySelector('#content_product') ) {
        var elem_arr = document.querySelectorAll('.woocommerce-product-gallery figure div[data-thumb]');
        elem_arr.forEach( function(el){
            var new_el = document.createElement('span');
            new_el.classList.add('show-img');
            el.append(new_el);
        } );
        var show_img_btn = [].slice.call(document.getElementsByClassName('show-img'));
        show_img_btn.forEach( function(btn){
            btn.addEventListener('click', function () {
                jQuery(btn).parent().find('a').trigger('click');
            });
        } );
    }

    if ( document.querySelector('.shop_video_modal_window') ) {
        var video_btn = document.querySelector('.shop_video_modal_window');
        var video_btn_clone = video_btn.cloneNode(true);
        if ( document.querySelector('.product-wrap .flex-viewport') ) {
            document.querySelector('.product-wrap .flex-viewport').append(video_btn_clone);
        } else {
            document.querySelector('.product-wrap .woocommerce-product-gallery').append(video_btn_clone);
        }

        video_btn.remove();
    }

    jQuery('.woocommerce-review-link').wrap('<span class="review-links pull-right darklinks" />');

    //single products variants table
    jQuery('td.label').removeClass('label');

    //sinlge product tabs
    jQuery('.woocommerce-tabs ul.wc-tabs').addClass('nav nav-tabs');
    jQuery('.woocommerce-tabs .wc-tab')
        .removeClass('panel')
        .wrapAll('<div class="tab-content top-color-border bottommargin_30" />');


    //woocommerce pagination
    jQuery('.woocommerce-pagination')
        .addClass('comment-navigation')
        .find('ul.page-numbers')
        .addClass('pagination')
        .find('.current')
        .parent().addClass('active');

    //woo widgets
    jQuery('.widget_top_rated_products, .widget_recent_reviews, .widget_recently_viewed_products, .widget_products').addClass('widget_popular_entries darklinks');
    jQuery('.widget_product_categories, .widget_layered_nav').addClass('widget_categories greylinks')
        .find('span.count')
        .addClass('highlight');
    jQuery('.widget_product_search').find('input[type="submit"]').replaceWith('<button type="submit"></button>');
    jQuery('.widget_product_tag_cloud').addClass('widget_tag_cloud');
    jQuery('.widget_shopping_cart').find('.buttons a').addClass('theme_button').end().find('.wc-forward:not(.checkout)').addClass('color1');


    //woocommerce comment form
    jQuery('#review_form .comment-form').find('input, textarea').each(function () {
        var $this = jQuery(this);
        var placeholder = $this.parent().find('label').text().replace('*', '');
        $this.attr('placeholder', placeholder);
    });


    //view toggler
    jQuery('#toggle_shop_view').on('click', function (e) {
        e.preventDefault();
        jQuery(this).toggleClass('grid-view');
        jQuery('#products, ul.products').toggleClass('grid-view list-view');
        if (jQuery.cookie) {
            if (jQuery('#products, ul.products').hasClass('list-view')) {
                jQuery.cookie('grid-view', 'list-view');
            } else {
                jQuery.cookie('grid-view', 'grid-view');
            }
        }
    });
    if (jQuery.cookie) {
        if (jQuery.cookie('grid-view') == 'list-view') {
            jQuery('#toggle_shop_view').trigger('click');
        }
    }

    //color filter
    jQuery(".color-filters").find("a[data-background-color]").each(function () {
        jQuery(this).css({"background-color": jQuery(this).data("background-color")});
    });


    /////////////
    //Carousels//
    /////////////

    //woocommerce related products, upsells products
    var $body_slide_speed = ( typeof jQuery('body').data('slide-speed') !== undefined ) ? jQuery('body').data('slide-speed') : 5000;
    jQuery('.related.products ul.products, .upsells.products ul.products, .cross-sells ul.products').addClass('owl-carousel').owlCarousel({
        loop: false,
        margin: 30,
        nav: true,
        dots: false,
        items: 3,
        autoplay: true,
        autoplayTimeout: $body_slide_speed,
        responsive: {
            0: {
                items: 1
            },
            767: {
                items: 2
            },
            992: {
                items: 2
            },
            1200: {
                items: 3
            }
        },
    })
        .addClass('top-right-nav');

});