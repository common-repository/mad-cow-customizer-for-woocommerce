<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$fields = array(
    array(
        'uid' => 'remove_breadcrumbs',
        'label' => 'Remove Breadcrumbs from Single Product Page',
        'helper' => '',
        'supplemental' => '',
        'section' => 'single_product_page_tab',
        'type' => 'radio',
        'options' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
        'default' => ['no'],
        ),
        array(
        'uid' => 'remove_short_description',
        'label' => 'Remove Short Description',
        'helper' => '',
        'supplemental' => 'Removes short description from single product page',
        'section' => 'single_product_page_tab',
        'type' => 'radio',
        'options' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
        'default' => ['no'],
      ),
      array(
        'uid' => 'show_long_description',
        'label' => 'Show Long Description',
        'helper' => '',
        'supplemental' => 'Displays the long description on single product page',
        'section' => 'single_product_page_tab',
        'type' => 'radio',
        'options' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
        'default' => ['no'],
      ),
      array(
        'uid' => 'hide_description_tab',
        'label' => 'Hide Description Tab',
        'helper' => '',
        'supplemental' => 'Hides the description tab on single product page',
        'section' => 'single_product_page_tab',
        'type' => 'radio',
        'options' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
        'default' => ['no'],
      ),
      array(
        'uid' => 'hide_reviews_tab',
        'label' => 'Hide Reviews Tab',
        'helper' => '',
        'supplemental' => 'Hides the reviews tab on single product page',
        'section' => 'single_product_page_tab',
        'type' => 'radio',
        'options' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
        'default' => ['no'],
      ),
      array(
        'uid' => 'hide_additional_information_tab',
        'label' => 'Hide Additional Information Tab',
        'helper' => '',
        'supplemental' => 'Hides the additional information tab on single product page',
        'section' => 'single_product_page_tab',
        'type' => 'radio',
        'options' => array(
            'yes' => 'Yes',
            'no' => 'No',
        ),
        'default' => ['no'],
      ),
    array(
        'uid' => 'before_product_title',
        'label' => 'Before Product Title',
        'helper' => '',
        'supplemental' => '',
        'section' => 'single_product_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'after_short_description',
        'label' => 'After Short Description',
        'helper' => '',
        'supplemental' => '',
        'section' => 'single_product_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'before_variations_content',
        'label' => 'Before Varitions Section',
        'helper' => '',
        'supplemental' => '',
        'section' => 'single_product_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'after_add_to_cart_button',
        'label' => 'After Add to Cart button',
        'helper' => '',
        'supplemental' => '',
        'section' => 'single_product_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'after_variations_content',
        'label' => 'After Variations',
        'helper' => '',
        'supplemental' => '',
        'section' => 'single_product_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'before_product_meta',
        'label' => 'Before Product Meta',
        'helper' => '',
        'supplemental' => '',
        'section' => 'single_product_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'after_product_meta',
        'label' => 'After Product Meta',
        'helper' => '',
        'supplemental' => '',
        'section' => 'single_product_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'before_tabs_section',
        'label' => 'Before Tabs Section',
        'helper' => '',
        'supplemental' => '',
        'section' => 'single_product_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
    array(
        'uid' => 'after_product_content',
        'label' => 'After Product Content',
        'helper' => '',
        'supplemental' => '',
        'section' => 'single_product_page_tab',
        'type' => 'textarea',
        'placeholder'	=> __( '' ),
        'default' => '',
        'rows' => '3',
    ),
);
foreach( $fields as $field ){
    add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'single_product_page_tab', $field['section'], $field );
    register_setting( 'single_product_page_tab', $field['uid'] );
}