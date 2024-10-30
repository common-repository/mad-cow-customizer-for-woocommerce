<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$fields1 = array(
    array(
        'uid' => 'processing_order_email_message',
        'label' => 'Processing Order Email Message',
        'helper' => '',
        'supplemental' => 'This shows up at the top of all new order emails sent to customers',
        'section' => 'woo_email_tab1',
        'placeholder' => __( 'Add Your Custom Message Here' ),
        'type' => 'textarea',
        'default' => '',
        'rows' => '3',
      ),
      array(
        'uid' => 'processing_order_email_message_styles',
        'label' => 'Processing Order Email Message Styles',
        'helper' => 'The Containing div has a class of "mcw-processing-order-email-message"',
        'supplemental' => 'This will be wrapped in <style></style> tags so only use proper css like .mcw-processing-order-email-message h1{color:blue} with no quotes or other characters',
        'section' => 'woo_email_tab1',
        'placeholder' => __( 'mcw-processing-order-email-message h1{color:blue}' ),
        'type' => 'textarea',
        'default' => '',
        'rows' => '3',
      ),
      array(
        'uid' => 'show_processing_message_by_id',
        'label' => 'Only Display the custom message if these product IDs are in the Order *OPTIONAL*',
        'helper' => '',
        'supplemental' => 'This needs to be the product ID(s) separated by a comma',
        'placeholder'	=> __( '42,35,122' ),
        'section' => 'woo_email_tab1',
        'type' => 'textarea',
        'default' => '',
        'rows' => '1',
      ),
      array(
        'uid' => 'show_processing_message_by_category',
        'label' => 'Only Display the custom message if these product Categories are in the Order *OPTIONAL*',
        'helper' => '',
        'supplemental' => 'This needs to be the product Category ID(s) separated by a comma',
        'placeholder'	=> __( '42,35,122' ),
        'section' => 'woo_email_tab1',
        'type' => 'textarea',
        'default' => '',
        'rows' => '1',
      ),
);
foreach( $fields1 as $field1 ){
    add_settings_field( $field1['uid'], $field1['label'], array( $this, 'field_callback' ), 'woo_email_tab', $field1['section'], $field1 );
    register_setting( 'woo_email_tab', $field1['uid'] );
}

$fields2 = array(
      array(
        'uid' => 'processing_order_email_footer',
        'label' => 'Processing Order Email footer',
        'helper' => '',
        'supplemental' => 'This shows up in the footer of all new order emails sent to customers',
        'section' => 'woo_email_tab2',
        'placeholder' => __( 'Add Your Custom Message Here' ),
        'type' => 'textarea',
        'default' => '',
        'rows' => '3',
      ),
      array(
        'uid' => 'processing_order_email_footer_styles',
        'label' => 'Processing Order Email footer Styles',
        'helper' => 'The Containing div has a class of "mcw-processing-order-email-footer"',
        'supplemental' => 'This will be wrapped in <style></style> tags so only use proper css like .mcw-processing-order-email-footer h1{color:blue} with no quotes or other characters',
        'section' => 'woo_email_tab2',
        'placeholder' => __( '.mcw-processing-order-email-footer h1{color:blue}' ),
        'type' => 'textarea',
        'default' => '',
        'rows' => '3',
      ),
      array(
        'uid' => 'show_processing_footer_by_id',
        'label' => 'Only Display the custom footer if these product IDs are in the Order *OPTIONAL*',
        'helper' => '',
        'supplemental' => 'This needs to be the product ID(s) separated by a comma',
        'placeholder'	=> __( '42,35,122' ),
        'section' => 'woo_email_tab2',
        'type' => 'textarea',
        'default' => '',
        'rows' => '1',
      ),
      array(
        'uid' => 'show_processing_footer_by_category',
        'label' => 'Only Display the custom footer if these product Categories are in the Order *OPTIONAL*',
        'helper' => '',
        'supplemental' => 'This needs to be the product Category ID(s) separated by a comma',
        'placeholder'	=> __( '42,35,122' ),
        'section' => 'woo_email_tab2',
        'type' => 'textarea',
        'default' => '',
        'rows' => '1',
      ),

);
foreach( $fields2 as $field2 ){
    add_settings_field( $field2['uid'], $field2['label'], array( $this, 'field_callback' ), 'woo_email_tab', $field2['section'], $field2 );
    register_setting( 'woo_email_tab', $field2['uid'] );
}

