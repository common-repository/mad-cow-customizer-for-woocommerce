<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
//This class generates the action hooks for most of the fields
#[\AllowDynamicProperties]
class Hooky_Action_Shop_Hook_Loop_Class {

    public function __construct($strings) {
        $this->strings = $strings;
        foreach ($this->strings as $string) :
            add_action(
                esc_html($string['wooHook']),
                [$this, 'echo_strings'],
                esc_html($string['priority']),
                0
            );
        endforeach;
    } // End function __construct()

    public function echo_strings() {
        $hook = current_filter();
        // show on Shop Page
        $show_on_shop_page = get_option('show_on_shop_page');
        $show_on_related_products = get_option('show_in_related_products');
        $show_on_cross_sells = get_option('show_in_cross_sells');
        if (!empty($show_on_shop_page[0]) && $show_on_shop_page[0] == 'yes' && is_shop()) :
            //if ( $show_on_shop_page[0] == 'yes' && is_shop() ) :
            foreach ($this->strings as $string) :
                if ($string['wooHook'] == $hook) :
                    $html = '<' . $string['elem_start'] .  ' class="' . $string['elem_class'] . '">' . $string['hooky_content'] . $string['elem_end'];
                    echo wp_kses_post($html);
                endif;
            endforeach;
        endif;
        // show on related products section
        if (!empty($show_on_related_products[0]) && $show_on_related_products[0] == 'yes' && is_product()) :
            //if ( $show_on_related_products[0] == 'yes' && is_product() ) :
            foreach ($this->strings as $string) :
                if ($string['wooHook'] == $hook) :
                    $html = '<' . $string['elem_start'] .  ' class="' . $string['elem_class'] . '">' . $string['hooky_content'] . $string['elem_end'];
                    echo wp_kses_post($html);
                endif;
            endforeach;
        endif;
        //show on cross sells on cart page
        if (!empty($show_on_cross_sells[0]) && $show_on_cross_sells[0] == 'yes' && is_cart()) :
            //if ( $show_on_cross_sells[0] == 'yes' && is_cart() ) :
            foreach ($this->strings as $string) :
                if ($string['wooHook'] == $hook) :
                    $html = '<' . $string['elem_start'] .  ' class="' . $string['elem_class'] . '">' . $string['hooky_content'] . $string['elem_end'];
                    echo wp_kses_post($html);
                endif;
            endforeach;
        endif;
    } // End function echo_strings()
} // End class Hooky_Action_Hook_Loop_Class