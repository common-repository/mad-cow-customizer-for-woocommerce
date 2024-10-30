<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
// remove breadcrumbs
$remove_breadcrumbs_radio = get_option('remove_breadcrumbs');
if (!empty ($remove_breadcrumbs_radio[0]) && $remove_breadcrumbs_radio[0] == 'yes') :
    add_action ('woocommerce_before_main_content', 'mcw_remove_breadcrumbs');
    function mcw_remove_breadcrumbs() {
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
    }
endif;

// remove single product short description
$remove_short_description_radio = get_option('remove_short_description');
if (!empty ($remove_short_description_radio[0]) && $remove_short_description_radio[0] == 'yes') :
    add_action( 'woocommerce_single_product_summary', 'mcw_single_product_summary_action', 1 );
    function mcw_single_product_summary_action() {
        remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
    }
endif;

// add long description to product summary section
$add_long_description_radio = get_option('show_long_description');
if (!empty ($add_long_description_radio[0]) && $add_long_description_radio[0] == 'yes') :
    add_action( 'woocommerce_before_add_to_cart_form', 'mcw_show_long_description_on_product_page', 14 );
    function mcw_show_long_description_on_product_page() {
        global $post; ?>
        <div class="mcw-long-description"><?php wp_kses_post( the_content() ); ?></div>
    <?php }
endif;

// remove description tab
$hide_description_radio = get_option('hide_description_tab');
if (!empty ($hide_description_radio[0]) && $hide_description_radio[0] == 'yes') :
    add_filter( 'woocommerce_product_tabs', 'mcw_remove_description_tab', 97 );
    function mcw_remove_description_tab( $tabs ) {
        unset( $tabs['description'] );      	// Remove the description tab
        return $tabs;
    }
endif;

// remove reviews tab
$hide_reviews_radio = get_option('hide_reviews_tab');
if (!empty ($hide_reviews_radio[0]) && $hide_reviews_radio[0] == 'yes') :
    add_filter( 'woocommerce_product_tabs', 'mcw_remove_reviews_tab', 98 );
    function mcw_remove_reviews_tab( $tabs ) {
        unset( $tabs['reviews'] ); 			// Remove the reviews tab
        return $tabs;
    }
endif;

// remove additional_information tab
$hide_additional_information_radio = get_option('hide_additional_information_tab');
if (!empty ($hide_additional_information_radio[0]) && $hide_additional_information_radio[0] == 'yes') :
    add_filter( 'woocommerce_product_tabs', 'mcw_remove_additional_information_tab', 99 );
    function mcw_remove_additional_information_tab( $tabs ) {
        unset( $tabs['additional_information'] );  	// Remove the additional information tab
        return $tabs;
    }
endif;

$strings = array(
  array(
    'wooHook' => 'woocommerce_single_product_summary',
    'priority' => '3',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-product',
    'hooky_content' => get_option('before_product_title'),
  ),
  array(
    'wooHook' => 'woocommerce_before_add_to_cart_form',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-short-description',
    'hooky_content' => get_option('after_short_description'),
  ),
  array(
    'wooHook' => 'woocommerce_before_variations_form',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-before-variations',
    'hooky_content' => get_option('before_variations_content'),
  ),
  array(
    'wooHook' => 'woocommerce_after_add_to_cart_button',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-cart',
    'hooky_content' => get_option('after_add_to_cart_button'),
  ),
  array(
    'wooHook' => 'woocommerce_after_variations_form',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-variations',
    'hooky_content' => get_option('after_variations_content'),
  ),
  array(
    'wooHook' => 'woocommerce_product_meta_start',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-before-product-meta',
    'hooky_content' => get_option('before_product_meta'),
  ),
  array(
    'wooHook' => 'woocommerce_product_meta_end',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-product-meta',
    'hooky_content' => get_option('after_product_meta'),
  ),
  array(
    'wooHook' => 'woocommerce_after_single_product_summary',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-before-product-tabs',
    'hooky_content' => get_option('before_tabs_section'),
  ),
  array(
    'wooHook' => 'woocommerce_after_single_product',
    'priority' => '10',
    'elem_start' => 'div',
    'elem_end' => '</div>',
    'elem_class' => 'mcw-after-product',
    'hooky_content' => get_option('after_product_content'),
  ),
);
require_once( 'loop-classes.php' );
$shop_loop = new Hooky_Action_Hook_Loop_Class( $strings );