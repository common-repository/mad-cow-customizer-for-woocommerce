<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
/**
 * Plugin Name: Mad Cow Customizer for WooCommerce
 * Plugin URI: https://madcowweb.com/mad-cow-customizer-for-woocommerce/
 * Description: Codeless Customizer for WooCommerce.
 * Developer: Jason Robie
 * Developer URI: https://madcowweb.com/
 * Version: 1.9.5
 * Requires at least: 6.2
 * Requires PHP:      7.2
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 */


//Check if WooCommerce is active
if (in_array('woocommerce/woocommerce.php', apply_filters('active_plugins', get_option('active_plugins')))) :

    class MadCow_Customizer_Plugin {

        public function __construct() {
            // Hook into the admin menu
            add_action('admin_menu', array($this, 'create_plugin_settings_page'));

            // Add Settings and Fields
            add_action('admin_init', array($this, 'setup_sections'));
            add_action('admin_init', array($this, 'setup_shop_page_fields'));
            add_action('admin_init', array($this, 'setup_single_product_fields'));
            add_action('admin_init', array($this, 'setup_cart_page_fields'));
            add_action('admin_init', array($this, 'setup_checkout_page_fields'));
            add_action('admin_init', array($this, 'setup_woo_email_fields'));
            add_action('admin_init', array($this, 'setup_general_woo_fields'));
            add_action('admin_init', array($this, 'setup_woo_tabs_fields'));
            add_action('admin_init', array($this, 'setup_general_wp_fields'));
            add_action('admin_enqueue_scripts', 'madcow_customizer_styles');
            add_action('wp_enqueue_scripts', 'madcow_customizer_styles');
            function madcow_customizer_styles() {
                wp_register_style('madcow_customizer_styles',  plugin_dir_url(__FILE__) . '/css/style.css');
                wp_enqueue_style('madcow_customizer_styles');
            }

            include_once(plugin_dir_path(__FILE__) . 'includes/mcw-shop.php');
            include_once(plugin_dir_path(__FILE__) . 'includes/mcw-single-product.php');
            include_once(plugin_dir_path(__FILE__) . 'includes/mcw-cart.php');
            include_once(plugin_dir_path(__FILE__) . 'includes/mcw-checkout.php');
            include_once(plugin_dir_path(__FILE__) . 'includes/mcw-emails.php');
            include_once(plugin_dir_path(__FILE__) . 'includes/mcw-general-woo.php');
            include_once(plugin_dir_path(__FILE__) . 'includes/mcw-woo-tabs.php');
            include_once(plugin_dir_path(__FILE__) . 'includes/mcw-general-wp.php');
        }

        public function create_plugin_settings_page() {
            // Add new admin menu item and page
            $page_title = esc_html('MCW Settings Page');
            $menu_title = esc_html('MCW Settings');
            $capability = esc_html('manage_options');
            $slug = esc_html('mcw_settings_page');
            $callback = array($this, 'mcw_settings_page');
            add_submenu_page('woocommerce', $page_title, $menu_title, $capability, $slug, $callback);
        }

        public function mcw_settings_page($active_tab = '') { ?>
<div class="wrap">
    <h2>Mad Cow Customizer</h2>
    <?php if (filter_input(INPUT_GET, 'settings-updated', FILTER_UNSAFE_RAW) && filter_input(INPUT_GET, 'settings-updated', FILTER_UNSAFE_RAW)) :
                    $this->admin_notice();
                endif;
                if (filter_input(INPUT_GET, 'tab', FILTER_UNSAFE_RAW)) :
                    $active_tab = filter_input(INPUT_GET, 'tab', FILTER_UNSAFE_RAW);
                elseif ($active_tab == filter_input(INPUT_GET, 'shop_page_options', FILTER_UNSAFE_RAW)) :
                    $active_tab = filter_input(INPUT_GET, 'shop_page_options', FILTER_UNSAFE_RAW);
                elseif ($active_tab == filter_input(INPUT_GET, 'single_product_options', FILTER_UNSAFE_RAW)) :
                    $active_tab = filter_input(INPUT_GET, 'single_product_options', FILTER_UNSAFE_RAW);
                elseif ($active_tab == filter_input(INPUT_GET, 'cart_page_options', FILTER_UNSAFE_RAW)) :
                    $active_tab = filter_input(INPUT_GET, 'cart_page_options', FILTER_UNSAFE_RAW);
                elseif ($active_tab == filter_input(INPUT_GET, 'checkout_page_options', FILTER_UNSAFE_RAW)) :
                    $active_tab = filter_input(INPUT_GET, 'checkout_page_options', FILTER_UNSAFE_RAW);
                elseif ($active_tab == filter_input(INPUT_GET, 'general_woo_options', FILTER_UNSAFE_RAW)) :
                    $active_tab = filter_input(INPUT_GET, 'general_woo_options', FILTER_UNSAFE_RAW);
                elseif ($active_tab == filter_input(INPUT_GET, 'woo_email_options', FILTER_UNSAFE_RAW)) :
                    $active_tab = filter_input(INPUT_GET, 'woo_email_options', FILTER_UNSAFE_RAW);
                elseif ($active_tab == filter_input(INPUT_GET, 'woo_tabs_options', FILTER_UNSAFE_RAW)) :
                    $active_tab = filter_input(INPUT_GET, 'woo_tabs_options', FILTER_UNSAFE_RAW);
                elseif ($active_tab == filter_input(INPUT_GET, 'general_wp_options', FILTER_UNSAFE_RAW)) :
                    $active_tab = filter_input(INPUT_GET, 'general_wp_options', FILTER_UNSAFE_RAW);
                endif; ?>

    <h2 class="nav-tab-wrapper">
        <a href="?page=mcw_settings_page&tab=shop_page_options" class="nav-tab <?php echo sanitize_text_field($active_tab == 'shop_page_options' ? 'nav-tab-active' : ''); ?>"><?php echo esc_html('Shop/Archive Page Options', 'madcowweb'); ?></a>
        <a href="?page=mcw_settings_page&tab=single_product_options" class="nav-tab <?php echo sanitize_text_field($active_tab == 'single_product_options' ? 'nav-tab-active' : ''); ?>"><?php echo esc_html('Single Product Page Options', 'madcowweb'); ?></a>
        <a href="?page=mcw_settings_page&tab=cart_page_options" class="nav-tab <?php echo sanitize_text_field($active_tab == 'cart_page_options' ? 'nav-tab-active' : ''); ?>"><?php echo esc_html('Cart Page Options', 'madcowweb'); ?></a>
        <a href="?page=mcw_settings_page&tab=checkout_page_options" class="nav-tab <?php echo sanitize_text_field($active_tab == 'checkout_page_options' ? 'nav-tab-active' : ''); ?>"><?php echo esc_html('Checkout Page Options', 'madcowweb'); ?></a>
        <a href="?page=mcw_settings_page&tab=woo_email_options" class="nav-tab <?php echo sanitize_text_field($active_tab == 'woo_email_options' ? 'nav-tab-active' : ''); ?>"><?php echo esc_html('Email Options', 'madcowweb'); ?></a>
        <a href="?page=mcw_settings_page&tab=general_woo_options" class="nav-tab <?php echo sanitize_text_field($active_tab == 'general_woo_options' ? 'nav-tab-active' : ''); ?>"><?php echo esc_html('General WooCommerce Options', 'madcowweb'); ?></a>
        <a href="?page=mcw_settings_page&tab=woo_tabs_options" class="nav-tab <?php echo sanitize_text_field($active_tab == 'woo_tabs_options' ? 'nav-tab-active' : ''); ?>"><?php echo esc_html('WooCommerce Custom Tabs', 'madcowweb'); ?></a>
        <a href="?page=mcw_settings_page&tab=general_wp_options" class="nav-tab <?php echo sanitize_text_field($active_tab == 'general_wp_options' ? 'nav-tab-active' : ''); ?>"><?php echo esc_html('General WordPress Options', 'madcowweb'); ?></a>
    </h2>

    <form method="post" action="options.php">
        <?php if ($active_tab == 'shop_page_options') :
                        settings_fields('shop_archive_page_tab');
                        do_settings_sections('shop_archive_page_tab');
                    elseif ($active_tab == 'single_product_options') :
                        settings_fields('single_product_page_tab');
                        do_settings_sections('single_product_page_tab');
                    elseif ($active_tab == 'cart_page_options') :
                        settings_fields('cart_page_tab');
                        do_settings_sections('cart_page_tab');
                    elseif ($active_tab == 'checkout_page_options') :
                        settings_fields('checkout_page_tab');
                        do_settings_sections('checkout_page_tab');
                    elseif ($active_tab == 'woo_email_options') :
                        settings_fields('woo_email_tab');
                        do_settings_sections('woo_email_tab');
                    elseif ($active_tab == 'general_woo_options') :
                        settings_fields('general_woo_tab');
                        do_settings_sections('general_woo_tab');
                    elseif ($active_tab == 'woo_tabs_options') :
                        settings_fields('woo_product_tabs_tab');
                        do_settings_sections('woo_product_tabs_tab');
                    elseif ($active_tab == 'general_wp_options') :
                        settings_fields('general_wp_tab');
                        do_settings_sections('general_wp_tab');
                    endif;
                    submit_button(); ?>
    </form>
</div>
<?php }

        public function admin_notice() {
            echo wp_kses_post('<div class="notice notice-success is-dismissible"><p>Hooray! Your settings have been updated!</p></div>');
        }

        public function setup_sections() {
            add_settings_section('shop_archive_page_tab', '', array($this, 'shop_section_callback'), 'shop_archive_page_tab');
            add_settings_section('single_product_page_tab', '', array($this, 'single_product_page_tab_callback'), 'single_product_page_tab');
            add_settings_section('cart_page_tab', '', array($this, 'cart_page_callback'), 'cart_page_tab');
            add_settings_section('checkout_page_tab', '', array($this, 'checkout_page_tab_callback'), 'checkout_page_tab');
            add_settings_section('woo_email_tab1', '', array($this, 'woo_email_tab_callback1'), 'woo_email_tab');
            add_settings_section('woo_email_tab2', '', array($this, 'woo_email_tab_callback2'), 'woo_email_tab');
            add_settings_section('general_woo_tab', '', array($this, 'general_woo_tab_callback'), 'general_woo_tab');
            add_settings_section('woo_product_tabs_tab1', '', array($this, 'woo_product_tabs_tab_callback1'), 'woo_product_tabs_tab');
            add_settings_section('woo_product_tabs_tab2', '', array($this, 'woo_product_tabs_tab_callback2'), 'woo_product_tabs_tab');
            add_settings_section('woo_product_tabs_tab3', '', array($this, 'woo_product_tabs_tab_callback3'), 'woo_product_tabs_tab');
            add_settings_section('general_wp_tab', '', array($this, 'general_wp_tab_callback'), 'general_wp_tab');
        }
        public function shop_section_callback() { ?>
<h1>Shop/Archive Page</h1>
<h2 class="mcw">Custom Hook locations are highlighted in bold, green, italic font</h2>
<h3 class="mcw">Use the editor titles to know where you want your content to appear</h3>
<p>Please use your browser's inspector to target these custom areas and add your own styling</p>
<?php echo wp_kses_post('<img src="' . plugins_url('images/mcw-customizer-shop.png', __FILE__) . '" > ');
        }
        public function single_product_page_tab_callback() { ?>
<h1>Single Product Page</h1>
<h2 class="mcw">Custom Hook locations are highlighted in bold, green, italic font</h2>
<h3 class="mcw">Use the editor titles to know where you want your content to appear</h3>
<p>Please use your browser's inspector to target these custom areas and add your own styling</p>
<?php echo wp_kses_post('<img src="' . plugins_url('images/mcw-customizer-product.png', __FILE__) . '" > ');
        }
        public function cart_page_callback() { ?>
<h1>Cart Page</h1>
<h2 class="mcw">Custom Hook locations are highlighted in bold, green, italic font</h2>
<h3 class="mcw">Use the editor titles to know where you want your content to appear</h3>
<p>Please use your browser's inspector to target these custom areas and add your own styling</p>
<?php echo wp_kses_post('<img src="' . plugins_url('images/mcw-customizer-cart.png', __FILE__) . '" > ');
        }
        public function checkout_page_tab_callback() { ?>
<h1>Checkout Page</h1>
<h2 class="mcw">Custom Hook locations are highlighted in bold, green, italic font</h2>
<h3 class="mcw">Use the editor titles to know where you want your content to appear</h3>
<p>Please use your browser's inspector to target these custom areas and add your own styling</p>
<?php echo wp_kses_post('<img style="max-width:550px;" src="' . plugins_url('images/mcw-customizer-checkout.png', __FILE__) . '" >');
        }
        public function woo_email_tab_callback1() { ?>
<h1>General WooCommerce Email Settings</h1>
<p>We recommend an Email Preview plugin such as <a href="https://wordpress.org/plugins/woo-preview-emails/" target="_blank">This one</a></p>
<h2 class="mcw">Email Header</h2>
<?php echo wp_kses_post('<img src="' . plugins_url('images/mcw-customizer-email.png', __FILE__) . '" >');
        }
        public function woo_email_tab_callback2() { ?>
<h2 class="mcw">Email Footer</h2>
<?php
        }
        public function general_woo_tab_callback() { ?>
<h1>General WooCommerce Settings</h1>
<p>Please use your browser's inspector to target these custom areas and add your own styling</p>
<?php
        }
        public function woo_product_tabs_tab_callback1() { ?>
<h1>WooCommerce Custom Product Tabs</h1>
<p>Please use your browser's inspector to target these custom areas and add your own styling</p>
<h2 class="mcw">Tab 1</h2>
<?php
        }
        public function woo_product_tabs_tab_callback2() { ?>
<h2 class="mcw">Tab 2</h2>
<?php
        }
        public function woo_product_tabs_tab_callback3() { ?>
<h2 class="mcw">Tab 3</h2>
<?php
        }
        public function general_wp_tab_callback() { ?>
<h1>General WordPress Settings</h1>
<?php
        }

        public function setup_shop_page_fields() {
            include(plugin_dir_path(__FILE__) . 'includes/shop-page-fields.php');
        }
        public function setup_single_product_fields() {
            include(plugin_dir_path(__FILE__) . 'includes/single-product-fields.php');
        }
        public function setup_cart_page_fields() {
            include(plugin_dir_path(__FILE__) . 'includes/cart-page-fields.php');
        }
        public function setup_checkout_page_fields() {
            include(plugin_dir_path(__FILE__) . 'includes/checkout-page-fields.php');
        }
        public function setup_woo_email_fields() {
            include(plugin_dir_path(__FILE__) . 'includes/woo-email-fields.php');
        }
        public function setup_general_woo_fields() {
            include(plugin_dir_path(__FILE__) . 'includes/general-woo-fields.php');
        }
        public function setup_woo_tabs_fields() {
            include(plugin_dir_path(__FILE__) . 'includes/woo-tabs-fields.php');
        }
        public function setup_general_wp_fields() {
            include(plugin_dir_path(__FILE__) . 'includes/general-wp-fields.php');
        }

        public function field_callback($arguments) {
            $value = get_option($arguments['uid']);
            $value = !empty($value) ? $value : $arguments['default'];

            switch ($arguments['type']) {
                case 'radio':
                case 'checkbox':
                    if (!empty($arguments['options']) && is_array($arguments['options'])) {
                        $options_markup = '';
                        $iterator = 0;
                        foreach ($arguments['options'] as $key => $label) {
                            $iterator++;
                            $options_markup .= sprintf(
                                '<label for="%1$s_%5$s"><input id="%1$s_%5$s" name="%1$s[]" type="radio" value="%2$s" %3$s /> %4$s</label>',
                                sanitize_text_field($arguments['uid']),
                                $key,
                                checked(
                                    $value[array_search($key, $value, true)],
                                    $key,
                                    false
                                ),
                                sanitize_text_field($label),
                                $iterator
                            );
                        }
                        printf('<fieldset>%s</fieldset>', $options_markup);
                    }
                    break;
                case 'text':
                case 'textarea':
                    printf(
                        '<textarea name="%1$s" id="%1$s" rows="%2$s" placeholder="%3$s">%4$s</textarea>',
                        sanitize_text_field($arguments['uid']),
                        sanitize_text_field($arguments['rows']),
                        sanitize_text_field($arguments['placeholder']),
                        wp_kses_post($value),
                    );
                    break;
            }
            if ($helper = $arguments['helper']) :
                printf('<span class="mcw-helper"> %s</span>', sanitize_text_field($helper));
            endif;
            if ($supplemental = $arguments['supplemental']) :
                printf('<p class="mcw-description">%s</p>', sanitize_text_field($supplemental));
            endif;
        }
    }
    new MadCow_Customizer_Plugin();
    function mcw_add_settings_link($links) {
        $settings_link = '<a href="admin.php?page=mcw_settings_page">' . __('Mad Cow Settings') . '</a>';
        array_push($links, $settings_link);
        return $links;
    }
    $plugin = plugin_basename(__FILE__);
    add_filter("plugin_action_links_$plugin", 'mcw_add_settings_link');
endif;