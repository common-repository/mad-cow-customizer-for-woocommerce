<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$fields = array(
    array(
        'uid' => 'show_on_shop_page',
        'label' => 'SHOW these custom sections on Shop Page',
        'helper' => '',
        'supplemental' => '',
        'section' => 'shop_archive_page_tab',
        'type' => 'radio',
        'options' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
        'default' => ['yes'],
    ),
    array(
        'uid' => 'show_in_related_products',
        'label' => 'SHOW these custom sections on Related Products',
        'helper' => '',
        'supplemental' => 'ALSO show these sections in the related products / upsells section on single product pages',
        'section' => 'shop_archive_page_tab',
        'type' => 'radio',
        'options' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
        'default' => ['no'],
    ),
    array(
        'uid' => 'show_in_cross_sells',
        'label' => 'SHOW these custom sections on Cross Sells',
        'helper' => '',
        'supplemental' => 'ALSO show these sections in the cross sells section on cart page',
        'section' => 'shop_archive_page_tab',
        'type' => 'radio',
        'options' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
        'default' => ['no'],
    ),
    array(
        'uid' => 'before_shop_page_content',
        'label' => 'Before Shop Page Main Content',
        'helper' => '',
        'supplemental' => 'This text will appear above of the WooCommerce page content on the shop and Single Product Pages',
        'section' => 'shop_archive_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'show_before_shop_page_content_on_product_page',
        'label' => 'SHOW the above section on the single product page',
        'helper' => '',
        'supplemental' => 'The above section does not show on the single product page by default. This will show it',
        'section' => 'shop_archive_page_tab',
        'type' => 'radio',
        'options' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
        'default' => ['no'],
    ),
    array(
        'uid' => 'shop_page_description',
        'label' => 'Shop Page Description',
        'helper' => '',
        'supplemental' => '',
        'section' => 'shop_archive_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'before_loop_product_image',
        'label' => 'Before Loop Product Image',
        'helper' => '',
        'supplemental' => '*This text can interfere with the Sale Flash icon',
        'section' => 'shop_archive_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'after_loop_product_image',
        'label' => 'After Loop Product Image',
        'helper' => '',
        'supplemental' => '*This text will be included in the product link',
        'section' => 'shop_archive_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'after_loop_product_title',
        'label' => 'After Loop Product Title',
        'helper' => '',
        'supplemental' => '*This text will be included in the product link',
        'section' => 'shop_archive_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'before_loop_product_cart_button',
        'label' => 'Before Loop Product Cart Button',
        'helper' => '',
        'supplemental' => '',
        'section' => 'shop_archive_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'after_main_shop_content',
        'label' => 'After Main Shop Content',
        'helper' => '',
        'supplemental' => '',
        'section' => 'shop_archive_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
);
foreach( $fields as $field ){
    add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'shop_archive_page_tab', $field['section'], $field );
    register_setting( 'shop_archive_page_tab', $field['uid'] );
}
