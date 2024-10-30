<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// Add message to top of email above order details table
$processing_order_email_message = get_option('processing_order_email_message');
if ($processing_order_email_message) :
    add_action ('woocommerce_email_before_order_table', 'mcw_processing_order_email_message', 1, 4);
    function mcw_processing_order_email_message($order, $sent_to_admin, $plain_text, $email ) {
            $processing_order_email_message = get_option('processing_order_email_message');
            $processing_order_email_message_styles = get_option('processing_order_email_message_styles');
            if ( $email->id == 'customer_processing_order' && $processing_order_email_message) :
                $order_id = $order->get_id();
                $order = wc_get_order( $order_id );
                $items = $order->get_items();
                $order_product_ids = intval(get_option('show_processing_message_by_id'));
                $specific_order_product_ids = explode(',', $order_product_ids);
                $order_categories = intval(get_option('show_processing_message_by_category'));
                $specific_order_product_cats = explode(',', $order_categories);
                $product_term_ids = [];


                foreach ( $items as $key => $item ) :
                    $product_ids[] = $item->get_variation_id() ? $item->get_variation_id() : $item->get_product_id();
                    $product_terms = get_the_terms( $item->get_product_id(), 'product_cat');
                    //loop through the product items and add all of the term IDs to an array
                    $ids = array_map(function($term) {
                        return $term->term_id;
                    }, $product_terms);
                    $product_term_ids = array_merge($product_term_ids, $ids);
                endforeach;

                //convert array values to strings
                $product_ids = array_unique(array_map('strval', $product_ids));
                $product_term_ids = array_unique(array_map('strval', $product_term_ids));
                if ($order_product_ids || $order_categories) :
                    //check if any of the product IDs or Category IDs the user specified are included in this order
                    $products_found = (array_intersect ($product_ids, $specific_order_product_ids));
                    $categories_found = (array_intersect ($product_term_ids, $specific_order_product_cats));
                    if(!empty($products_found) || !empty($categories_found)) :
                        if ($processing_order_email_message_styles):
                            add_filter( 'woocommerce_email_styles', 'mcw_woocommerce_email_message_styles' );
                            function mcw_woocommerce_email_message_styles( $css ) {
                                $processing_order_email_message_styles = get_option('processing_order_email_message_styles');
                                $css .= wp_kses_post( $processing_order_email_message_styles );
                                return wp_kses_post($css);
                            }
                        endif;
                        echo wp_kses_post('<div class="mcw-processing-order-email-message">');
                        echo wp_kses_post($processing_order_email_message);
                        echo wp_kses_post('</div>');
                    endif;
                else :
                    //if the user did not specify a product ID or category ID, show the message on all emails
                    //if the user added custom css, render that on the email
                    if ($processing_order_email_message_styles):
                        add_filter( 'woocommerce_email_styles', 'mcw_woocommerce_email_message_styles2' );
                        function mcw_woocommerce_email_message_styles2( $css ) {
                            $processing_order_email_message_styles = get_option('processing_order_email_message_styles');
                            $css .= wp_kses_post( $processing_order_email_message_styles );
                            return wp_kses_post($css);
                        }
                    endif;
                    echo wp_kses_post('<div class="mcw-processing-order-email-message">');
                    echo wp_kses_post($processing_order_email_message);
                    echo wp_kses_post('</div>');
                endif;
            endif;
    }
endif;

$processing_order_email_footer = get_option('processing_order_email_footer');
if ($processing_order_email_footer) :
    add_action ('woocommerce_email_footer', 'mcw_processing_order_email_footer', 1);
    function mcw_processing_order_email_footer($email ) {
        $processing_order_email_footer = get_option('processing_order_email_footer');
        $processing_order_email_footer_styles = get_option('processing_order_email_footer_styles');
        if ( $email->id == 'customer_processing_order') :
            if (!isset($GLOBALS['wc_email'])) {
                $GLOBALS['wc_email'] = $email;
            }
            $order = null;

            if (isset($GLOBALS['wc_email']) && $GLOBALS['wc_email']->object && $GLOBALS['wc_email']->object instanceof WC_Order) {
                $order = $GLOBALS['wc_email']->object;
                $order_id = $order->get_id();
                $order = wc_get_order( $order_id );
                $items = $order->get_items();
                $order_product_ids = intval(get_option('show_processing_footer_by_id'));
                $specific_order_product_ids = explode(',', $order_product_ids);
                $order_categories = intval(get_option('show_processing_footer_by_category'));
                $specific_order_product_cats = explode(',', $order_categories);
                $product_term_ids = [];
                foreach ( $items as $key => $item ) :
                    $product_ids[] = $item->get_variation_id() ? $item->get_variation_id() : $item->get_product_id();
                    $product_terms = get_the_terms( $item->get_product_id(), 'product_cat');
                    //loop through the product items and add all of the term IDs to an array
                    $ids = array_map(function($term) {
                        return $term->term_id;
                    }, $product_terms);
                    $product_term_ids = array_merge($product_term_ids, $ids);
                endforeach;

                //convert array values to strings
                $product_ids = array_unique(array_map('strval', $product_ids));
                $product_term_ids = array_unique(array_map('strval', $product_term_ids));

                if ($order_product_ids || $order_categories) :
                    //check if any of the product IDs or Category IDs the user specified are included in this order
                    $products_found = (array_intersect ($product_ids, $specific_order_product_ids));
                    $categories_found = (array_intersect ($product_term_ids, $specific_order_product_cats));
                    if(!empty($products_found) || !empty($categories_found)) :
                        if ($processing_order_email_footer_styles):
                            add_filter( 'woocommerce_email_styles', 'mcw_woocommerce_email_footer_styles' );
                            function mcw_woocommerce_email_footer_styles( $css ) {
                                $processing_order_email_footer_styles = get_option('processing_order_email_footer_styles');
                                $css .= wp_kses_post( $processing_order_email_footer_styles );
                                return wp_kses_post($css);
                            }
                        endif;
                        echo wp_kses_post('<div class="mcw-processing-order-email-footer">');
                        echo wp_kses_post($processing_order_email_footer);
                        echo wp_kses_post('</div>');
                    endif;
                else :
                    //if the user did not specify a product ID or category ID, show the message on all emails
                    //if the user added custom css, render that on the email
                    if ($processing_order_email_footer_styles):
                        add_filter( 'woocommerce_email_styles', 'mcw_woocommerce_email_footer_styles2' );
                        function mcw_woocommerce_email_footer_styles2( $css ) {
                            $processing_order_email_footer_styles = get_option('processing_order_email_footer_styles');
                            $css .= wp_kses_post( $processing_order_email_footer_styles );
                            return wp_kses_post($css);
                        }
                    endif;
                    echo wp_kses_post('<div class="mcw-processing-order-email-footer">');
                    echo wp_kses_post($processing_order_email_footer);
                    echo wp_kses_post('</div>');
                endif;
            }
        endif;
    }
endif;
