<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// auto complete virtual orders
$auto_complete_virtual_orders = get_option('auto_complete_virtual_orders');
if (!empty ($auto_complete_virtual_orders[0]) && $auto_complete_virtual_orders[0] == 'yes') :
    add_action('woocommerce_order_status_changed', 'mcw_auto_complete_virtual_orders');
    function mcw_auto_complete_virtual_orders($order_id) {
        if ( ! $order_id ) :
            return;
        endif;
        global $product;
        $order = wc_get_order( $order_id );
        if ($order->data['status'] == 'processing') :
            $virtual_order = null;
            if ( count( $order->get_items() ) > 0 ) :
                foreach( $order->get_items() as $item ) :
                    if ( 'line_item' == $item['type'] ) :
                        $_product = $order->get_product_from_item( $item );
                            if ( ! $_product->is_virtual() ) :
                                // once we find one non-virtual product, break out of the loop
                                $virtual_order = false;
                                break;
                            else :
                                $virtual_order = true;
                            endif;
                    endif;
                endforeach;
            endif;
            // if all are virtual products, mark as completed
            if ( $virtual_order ) :
                $order->update_status( 'completed' );
            endif;
        endif;
    }
endif;

// replace related products and up sells text
$replace_related_text = get_option('related_products_text_replacement');
if ($replace_related_text) :
    add_filter( 'woocommerce_product_related_products_heading', 'mcw_upsells_title' );
    add_filter( 'woocommerce_product_upsells_products_heading', 'mcw_upsells_title' );
    function mcw_upsells_title() {
        $replace_related_text = get_option('related_products_text_replacement');
        return wp_kses_post($replace_related_text);
    }
endif;

// Remove some product categories from Related Products
$related_products_categories_removed = get_option('remove_categories_from_related_products');
if ($related_products_categories_removed) :
    add_filter('woocommerce_related_products', 'mcw_hide_some_products_from_related_products', 9999, 3);
    function mcw_hide_some_products_from_related_products($related_posts, $product_id, $args) {
        $related_products_categories_removed = get_option('remove_categories_from_related_products');
        $specific_related_product_cats = explode(',', $related_products_categories_removed);

        $product       = wc_get_product($product_id);
        $title         = $product->get_name();
        $terms         = get_the_terms($product, 'product_cat');
        $related_posts = get_posts(array(
            'post_type'      => 'product',
            'post_status'    => 'publish',
            'posts_per_page' => -1,
            'tax_query'      => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $specific_related_product_cats,
                    'operator' => 'NOT IN',
                ),
            ),
        ));
        return $related_posts;
    }
endif;

// replace cross sells products text on cart page
$cross_sells_related_text = get_option('cross_sells_products_text_replacement');
if ($cross_sells_related_text) :
    add_filter( 'woocommerce_product_cross_sells_products_heading', 'mcw_crosssells_title' );
    function mcw_crosssells_title() {
        $cross_sells_related_text = get_option('cross_sells_products_text_replacement');
        return wp_kses_post($cross_sells_related_text);
    }
endif;

// Remove some product categories from Cross Sells Products
$cross_sells_products_categories_removed = get_option('remove_categories_from_cross_sells');
if ($cross_sells_products_categories_removed) :
    add_filter( 'woocommerce_cart_crosssell_ids', 'mcw_hide_categories_from_cross_sells', 999 );
    function mcw_hide_categories_from_cross_sells( $cross_sells ) {
        $cross_sells_products_categories_removed = get_option('remove_categories_from_cross_sells');
        $specific_cross_sells_product_cats = explode(',', $cross_sells_products_categories_removed);

        $mcw_cross_sells = get_posts( array(
            'post_type'   => 'product',
            'numberposts' => -1,
            'post_status' => 'publish',
            'tax_query'   => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $specific_cross_sells_product_cats,
                    'operator' => 'NOT IN',
                )
            ),
        ) );
        $cross_sells = $mcw_cross_sells;
        return $cross_sells;
}
endif;


// replace add to cart text on Single Product Pages
$single_product_add_to_cart_text = get_option('single_product_add_to_cart');
if ($single_product_add_to_cart_text) :
    add_filter('woocommerce_product_single_add_to_cart_text', 'mcw_custom_single_add_to_cart_text');
    function mcw_custom_single_add_to_cart_text() {
        $single_product_add_to_cart_text = get_option('single_product_add_to_cart');
        $single_product_product_ids = get_option('add_to_cart_by_id');
        $specific_ids = explode(',', $single_product_product_ids);
        $single_product_categories = get_option('add_to_cart_by_category');
        $specific_cats = explode(',', $single_product_categories);
        global $product;
        global $post;
        //get all categories for this product
        $terms_post = get_the_terms( $post->cat_ID , 'product_cat' );
        //get all category ids
        foreach ($terms_post as $term_cat) :
            $cat_id = $term_cat->term_id;
        endforeach;
        //if any of the user submitted product IDs or category IDs match this product page, replace the add to cart text
        if ($single_product_product_ids || $single_product_categories) :
            if (in_array($product->get_id(), $specific_ids) || in_array($cat_id, $specific_cats)) :
                return wp_kses_post($single_product_add_to_cart_text);
            else :
                return __('Add To Cart', 'woocommerce');
            endif;
        else :
        //if the user did not specify a product ID or category ID, replace the add to cart text on all products
            return wp_kses_post($single_product_add_to_cart_text);
        endif;
    }
endif;

