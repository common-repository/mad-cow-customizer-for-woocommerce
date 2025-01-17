<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$strings = array(
  array(
    'wooHook' => 'woocommerce_before_cart',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-above-cart',
    'hooky_content' => get_option('above_cart'),
  ),
  array(
    'wooHook' => 'woocommerce_before_cart_contents',
    'priority' => '10',
    'elem_start' => 'tr><td colspan="6" ',
    'elem_end' => '</td></tr>',
    'elem_class' => 'mcw-before-cart-table-items',
    'hooky_content' => get_option('before_cart_table_items'),
  ),
  array(
    'wooHook' => 'woocommerce_cart_contents',
    'priority' => '10',
    'elem_start' => 'tr><td colspan="6" ',
    'elem_end' => '</td></tr>',
    'elem_class' => 'mcw-after-cart-table-items',
    'hooky_content' => get_option('after_cart_table_items'),
  ),
  array(
    'wooHook' => 'woocommerce_cart_coupon',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-cart-coupon-button',
    'hooky_content' => get_option('after_cart_coupon_button'),
  ),
  array(
    'wooHook' => 'woocommerce_after_cart_contents',
    'priority' => '10',
    'elem_start' => 'tr><td colspan="6" ',
    'elem_end' => '</td></tr>',
    'elem_class' => 'mcw-after-cart-contents',
    'hooky_content' => get_option('after_cart_contents'),
  ),
  array(
    'wooHook' => 'woocommerce_after_cart_table',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-below-cart-table',
    'hooky_content' => get_option('below_cart_table'),
  ),
  array(
    'wooHook' => 'woocommerce_before_cart_totals',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-above-cart-totals',
    'hooky_content' => get_option('above_cart_totals'),
  ),
  array(
    'wooHook' => 'woocommerce_cart_totals_before_shipping',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-before-shipping-totals',
    'hooky_content' => get_option('before_shipping_totals'),
  ),
  array(
    'wooHook' => 'woocommerce_before_shipping_calculator',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-shipping-options',
    'hooky_content' => get_option('after_shipping_options'),
  ),
  array(
    'wooHook' => 'woocommerce_after_shipping_calculator',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-shipping-calculator',
    'hooky_content' => get_option('after_shipping_calculator'),
  ),
  array(
    'wooHook' => 'woocommerce_cart_totals_before_order_total',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-before-cart-total',
    'hooky_content' => get_option('before_cart_total'),
  ),
  array(
    'wooHook' => 'woocommerce_proceed_to_checkout',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-before-checkout-button',
    'hooky_content' => get_option('before_checkout_button'),
  ),
  array(
    'wooHook' => 'woocommerce_after_cart_totals',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-checkout-button',
    'hooky_content' => get_option('after_checkout_button'),
  ),
  array(
    'wooHook' => 'woocommerce_after_cart',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-cart',
    'hooky_content' => get_option('bottom_of_cart_area'),
  ),

);
require_once( 'loop-classes.php' );
$cart_loop = new Hooky_Action_Hook_Loop_Class( $strings );