<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// replace related products and up sells text
$show_before_shop_page_on_product_page = get_option('show_before_shop_page_content_on_product_page');
if (!empty ($show_before_shop_page_on_product_page[0]) && $show_before_shop_page_on_product_page[0] == 'no') :
    add_action( 'woocommerce_before_main_content', 'mcw_show_shop_page_content_on_product_page', 25 );
    function mcw_show_shop_page_content_on_product_page() {
        if (is_product()) :
            echo '<style>.mcw-before-shop-page-content{display:none;}</style>';
        endif;
    }
endif;

$strings = array(
  array(
    'wooHook' => 'woocommerce_before_main_content',
    'priority' => '50',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-before-shop-page-content',
    'hooky_content' => get_option('before_shop_page_content'),
  ),
  array(
    'wooHook' => 'woocommerce_archive_description',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-below-shop-title',
    'hooky_content' => get_option('shop_page_description'),
  ),
  array(
    'wooHook' => 'woocommerce_before_shop_loop_item',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-above-loop-image',
    'hooky_content' => get_option('before_loop_product_image'),
  ),
  array(
    'wooHook' => 'woocommerce_shop_loop_item_title',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-loop-image',
    'hooky_content' => get_option('after_loop_product_image'),
  ),
  array(
    'wooHook' => 'woocommerce_after_shop_loop_item_title',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-loop-title',
    'hooky_content' => get_option('after_loop_product_title'),
  ),
  array(
    'wooHook' => 'woocommerce_after_shop_loop_item',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-before-loop-item-cart-button',
    'hooky_content' => get_option('before_loop_product_cart_button'),
  ),
  array(
    'wooHook' => 'woocommerce_after_main_content',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-shop-loop',
    'hooky_content' => get_option('after_main_shop_content'),
  ),
);

require_once( 'shop-loop-classes.php' );
$shop_loop = new Hooky_Action_Shop_Hook_Loop_Class( $strings );