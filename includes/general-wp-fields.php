<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
$fields = array(
    array(
    'uid' => 'make_ellipsis_link',
    'label' => 'Make the ellipsis a link?',
    'helper' => '',
    'supplemental' => '',
    'section' => 'general_wp_tab',
    'type' => 'radio',
    'options' => array(
        'yes' => 'Yes',
        'no' => 'No',
    ),
    'default' => ['yes'],
    ),
    array(
    'uid' => 'ellipsis_text',
    'label' => 'Ellipsis Text',
    'helper' => '',
    'supplemental' => '',
    'section' => 'general_wp_tab',
    'type' => 'textarea',
    'placeholder'	=> __( 'This should only be the text you want to show, such as -read more-, etc.' ),
    'default' => '',
    'rows' => '1',
    ),
    array(
    'uid' => 'mcw_excerpt_length',
    'label' => 'Excerpt Length',
    'helper' => '',
    'supplemental' => '',
    'section' => 'general_wp_tab',
    'type' => 'textarea',
    'placeholder'	=> __( 'This must be a number' ),
    'default' => '',
    'rows' => '1',
    ),
);
foreach( $fields as $field ){
    add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), 'general_wp_tab', $field['section'], $field );
    register_setting( 'general_wp_tab', $field['uid'] );
}

