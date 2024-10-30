<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$fields = array(
  array(
    'uid' => 'auto_complete_virtual_orders',
    'label' => 'Automatically mark virtual orders as "Complete"',
    'helper' => '',
    'supplemental' => 'If nothing in the order needs to be shipped, mark the order as complete immediately',
    'section' => 'general_woo_tab',
    'type' => 'radio',
    'options' => array(
        'yes' => 'Yes',
        'no' => 'No',
    ),
    'default' => ['no'],
  ),
  array(
    'uid' => 'related_products_text_replacement',
    'label' => 'Related Products and Up-Sells Text Replacement',
    'helper' => '',
    'supplemental' => 'This replaces the related products title on the single product page wether user defined or default.',
    'section' => 'general_woo_tab',
    'type' => 'textarea',
    'default' => '',
    'placeholder'	=> __( 'Check out These Great Products' ),
    'rows' => '1',
  ),
  array(
    'uid' => 'remove_categories_from_related_products',
    'label' => 'Remove the following categories from showing under related products *OPTIONAL*',
    'helper' => '',
    'supplemental' => 'This needs to be the product Category ID(s) separated by a comma',
    'placeholder'	=> __( '42,35,122' ),
    'section' => 'general_woo_tab',
    'type' => 'textarea',
    'default' => '',
    'rows' => '1',
  ),
  array(
    'uid' => 'cross_sells_products_text_replacement',
    'label' => 'Cross Sells Products Text Replacement',
    'helper' => '',
    'supplemental' => 'This replaces the cross-sells products title on the cart page.',
    'section' => 'general_woo_tab',
    'type' => 'textarea',
    'placeholder'	=> __( 'Check out These Great Products' ),
    'default' => '',
    'rows' => '1',
  ),
  array(
    'uid' => 'remove_categories_from_cross_sells',
    'label' => 'Remove the following categories from showing under cross sells on cart *OPTIONAL*',
    'helper' => '',
    'supplemental' => 'This needs to be the product Category ID(s) separated by a comma',
    'placeholder'	=> __( '42,35,122' ),
    'section' => 'general_woo_tab',
    'type' => 'textarea',
    'default' => '',
    'rows' => '1',
  ),
  array(
    'uid' => 'single_product_add_to_cart',
    'label' => 'Single Product Page Add To Cart Text Replacement',
    'helper' => '',
    'supplemental' => 'This replaces the Add To Cart Text on the button on Single Product Pages.',
    'section' => 'general_woo_tab',
    'type' => 'textarea',
    'placeholder'	=> __( 'Add to Bag' ),
    'default' => '',
    'rows' => '1',
  ),
  array(
    'uid' => 'add_to_cart_by_id',
    'label' => 'Only Change Cart Button Text for These Product IDs *OPTIONAL*',
    'helper' => 'On the Products list (in the admin) mouse-over the product name and it will display the ID',
    'supplemental' => 'This needs to be the product ID(s) separated by a comma',
    'placeholder'	=> __( '42,35,122' ),
    'section' => 'general_woo_tab',
    'type' => 'textarea',
    'default' => '',
    'rows' => '1',
  ),
  array(
    'uid' => 'add_to_cart_by_category',
    'label' => 'Only Change Cart Button Text for These Product Categories *OPTIONAL*',
    'helper' => '',
    'supplemental' => 'This needs to be the product Category ID(s) separated by a comma',
    'placeholder'	=> __( '42,35,122' ),
    'section' => 'general_woo_tab',
    'type' => 'textarea',
    'default' => '',
    'rows' => '1',
  ),
);
foreach( $fields as $field ){
    add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'general_woo_tab', $field['section'], $field );
    register_setting( 'general_woo_tab', $field['uid'] );
}

