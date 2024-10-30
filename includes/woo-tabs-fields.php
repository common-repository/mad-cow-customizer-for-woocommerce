<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$fields1 = array(
    array(
        'uid' => 'tab_one_title',
        'label' => 'Tab 1 Title',
        'helper' => '',
        'supplemental' => '',
        'section' => 'woo_product_tabs_tab1',
        'type' => 'textarea',
        'default' => '',
        'placeholder'	=> __( 'First Tab Title' ),
        'rows' => '1',
      ),
      array(
        'uid' => 'tab_one_content',
        'label' => 'Tab 1 Content',
        'helper' => '',
        'supplemental' => 'You can add basic HTML content in this field or plain text',
        'section' => 'woo_product_tabs_tab1',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '5',
      ),
      array(
        'uid' => 'tab_one_content_styles',
        'label' => 'Tab 1 Content Styles',
        'helper' => 'The Containing div has an ID of "tab-custom_tab_one"',
        'supplemental' => 'This will be wrapped in <style></style> tags so only use proper css like #tab-custom_tab_one h1{color:blue} with no quotes or other characters',
        'section' => 'woo_product_tabs_tab1',
        'placeholder' => __( '#tab-custom_tab_one h1{color:blue}' ),
        'type' => 'textarea',
        'default' => '',
        'rows' => '3',
      ),
      array(
        'uid' => 'tab_one_priority',
        'label' => 'Tab 1 Priority',
        'helper' => '',
        'supplemental' => 'This sets the order of the tab from left to right. This must be a number',
        'placeholder'	=> '1',
        'section' => 'woo_product_tabs_tab1',
        'type' => 'textarea',
        'default' => '',
        'rows' => '1',
      ),
);
foreach( $fields1 as $field1 ){
    add_settings_field( $field1['uid'], $field1['label'], array( $this, 'field_callback' ), 'woo_product_tabs_tab', $field1['section'], $field1 );
    register_setting( 'woo_product_tabs_tab', $field1['uid'] );
}

$fields2 = array(
      array(
        'uid' => 'tab_two_title',
        'label' => 'Tab 2 Title',
        'helper' => '',
        'supplemental' => '',
        'section' => 'woo_product_tabs_tab2',
        'type' => 'textarea',
        'placeholder'	=> __( 'Second Tab Title' ),
        'default' => '',
        'rows' => '1',
      ),
      array(
        'uid' => 'tab_two_content',
        'label' => 'Tab 2 Content',
        'helper' => '',
        'supplemental' => 'You can add basic HTML content in this field or plain text',
        'section' => 'woo_product_tabs_tab2',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '5',
      ),
      array(
        'uid' => 'tab_two_content_styles',
        'label' => 'Tab 2 Content Styles',
        'helper' => 'The Containing div has an ID of "tab-custom_tab_two"',
        'supplemental' => 'This will be wrapped in <style></style> tags so only use proper css like #tab-custom_tab_two h1{color:blue} with no quotes or other characters',
        'section' => 'woo_product_tabs_tab2',
        'placeholder' => __( '#tab-custom_tab_two h1{color:blue}' ),
        'type' => 'textarea',
        'default' => '',
        'rows' => '3',
      ),
      array(
        'uid' => 'tab_two_priority',
        'label' => 'Tab 2 Priority',
        'helper' => '',
        'supplemental' => 'This sets the order of the tab from left to right. This must be a number',
        'placeholder'	=> '2',
        'section' => 'woo_product_tabs_tab2',
        'type' => 'textarea',
        'default' => '',
        'rows' => '1',
      ),
);
foreach( $fields2 as $field2 ){
    add_settings_field( $field2['uid'], $field2['label'], array( $this, 'field_callback' ), 'woo_product_tabs_tab', $field2['section'], $field2 );
    register_setting( 'woo_product_tabs_tab', $field2['uid'] );
}

$fields3 = array(
    array(
        'uid' => 'tab_three_title',
        'label' => 'Tab 3 Title',
        'helper' => '',
        'supplemental' => '',
        'section' => 'woo_product_tabs_tab3',
        'type' => 'textarea',
        'placeholder'	=> __( 'Third Tab Title' ),
        'default' => '',
        'rows' => '1',
      ),
      array(
        'uid' => 'tab_three_content',
        'label' => 'Tab 3 Content',
        'helper' => '',
        'supplemental' => 'You can add basic HTML content in this field or plain text',
        'section' => 'woo_product_tabs_tab3',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '5',
      ),
      array(
        'uid' => 'tab_three_content_styles',
        'label' => 'Tab 3 Content Styles',
        'helper' => 'The Containing div has an ID of "tab-custom_tab_three"',
        'supplemental' => 'This will be wrapped in <style></style> tags so only use proper css like #tab-custom_tab_three h1{color:blue} with no quotes or other characters',
        'section' => 'woo_product_tabs_tab3',
        'placeholder' => __( '#tab-custom_tab_three h1{color:blue}' ),
        'type' => 'textarea',
        'default' => '',
        'rows' => '3',
      ),
      array(
        'uid' => 'tab_three_priority',
        'label' => 'Tab 3 Priority',
        'helper' => '',
        'supplemental' => 'This sets the order of the tab from left to right. This must be a number',
        'placeholder'	=> '3',
        'section' => 'woo_product_tabs_tab3',
        'type' => 'textarea',
        'default' => '',
        'rows' => '1',
      ),
);
foreach( $fields3 as $field3 ){
  add_settings_field( $field3['uid'], $field3['label'], array( $this, 'field_callback' ), 'woo_product_tabs_tab', $field3['section'], $field3 );
  register_setting( 'woo_product_tabs_tab', $field3['uid'] );
}