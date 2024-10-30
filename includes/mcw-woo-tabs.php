<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// Add Custom Tab 1
$tab_one_title = get_option('tab_one_title');
//only add this tab if there is content provided by the user
if ($tab_one_title) :
    add_filter('woocommerce_product_tabs', 'mcw_add_custom_tab_one');
    function mcw_add_custom_tab_one($tabs) {
        $tab_one_title = get_option('tab_one_title');
        $tab_one_priority = intval(get_option('tab_one_priority'));
        $tabs['custom_tab_one'] = array(
            'title'    => $tab_one_title,
            'priority' => $tab_one_priority,
            'callback' => 'custom_tab_one_content_function',
            );
        return $tabs;
    }
    function custom_tab_one_content_function() {
        $tab_one_content = get_option('tab_one_content');
        $tab_one_styles = get_option('tab_one_content_styles');
        if ($tab_one_styles):
            add_action( 'wp_enqueue_scripts', 'mcw_tab_one_styles' );
            function mcw_tab_one_styles() {
                $tab_one_styles = get_option('tab_one_content_styles');
                wp_enqueue_style('mcw_tabs-custom-style', plugin_dir_url( __FILE__ ) . 'css/style.css');
                $custom_css = wp_kses_post($tab_one_styles);
                wp_add_inline_style( 'mcw_tabs-custom-style', wp_kses_post($custom_css) );
            }
        endif;
        echo wp_kses_post($tab_one_content);
    }
endif;

// Add Custom Tab 2
$tab_two_title = get_option('tab_two_title');
//only add this tab if there is content provided by the user
if ($tab_two_title) :
    add_filter('woocommerce_product_tabs', 'mcw_add_custom_tab_two');
    function mcw_add_custom_tab_two($tabs) {
        $tab_two_title = get_option('tab_two_title');
        $tab_two_priority = intval(get_option('tab_two_priority'));
        $tabs['custom_tab_two'] = array(
            'title'    => $tab_two_title,
            'priority' => $tab_two_priority,
            'callback' => 'custom_tab_two_content_function',
            );
        return $tabs;
    }
    function custom_tab_two_content_function() {
        $tab_two_content = get_option('tab_two_content');
        $tab_two_styles = get_option('tab_two_content_styles');
        if ($tab_two_styles):
            add_action( 'wp_enqueue_scripts', 'mcw_tab_two_styles' );
            function mcw_tab_two_styles() {
                $tab_two_styles = get_option('tab_two_content_styles');
                wp_enqueue_style('mcw_tabs-custom-style', plugin_dir_url( __FILE__ ) . 'css/style.css');
                $custom_css = wp_kses_post($tab_two_styles);
                wp_add_inline_style( 'mcw_tabs-custom-style', wp_kses_post($custom_css) );
            }
        endif;
        echo wp_kses_post($tab_two_content);
    }
endif;

// Add Custom Tab 3
$tab_three_title = get_option('tab_three_title');
//only add this tab if there is content provided by the user
if ($tab_three_title) :
    add_filter('woocommerce_product_tabs', 'mcw_add_custom_tab_three');
    function mcw_add_custom_tab_three($tabs) {
        $tab_three_title = get_option('tab_three_title');
        $tab_three_priority = intval(get_option('tab_three_priority'));
        $tabs['custom_tab_three'] = array(
            'title'    => $tab_three_title,
            'priority' => $tab_three_priority,
            'callback' => 'custom_tab_three_content_function',
            );
        return $tabs;
    }
    function custom_tab_three_content_function() {
        $tab_three_content = get_option('tab_three_content');
        $tab_three_styles = get_option('tab_three_content_styles');
        if ($tab_three_styles):
            add_action( 'wp_enqueue_scripts', 'mcw_tab_three_styles' );
            function mcw_tab_three_styles() {
                $tab_three_styles = get_option('tab_three_content_styles');
                wp_enqueue_style('mcw_tabs-custom-style', plugin_dir_url( __FILE__ ) . 'css/style.css');
                $custom_css = wp_kses_post($tab_three_styles);
                wp_add_inline_style( 'mcw_tabs-custom-style', wp_kses_post($custom_css) );
            }
        endif;
        echo wp_kses_post($tab_three_content);
    }
endif;