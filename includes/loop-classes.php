<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
//This class generates the action hooks for most of the fields
#[\AllowDynamicProperties]
class Hooky_Action_Hook_Loop_Class {

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
        foreach ($this->strings as $string) :
            if ($string['wooHook'] == $hook) :
                $html = '<' . $string['elem_start'] .  ' class="' . $string['elem_class'] . '">' . $string['hooky_content'] . $string['elem_end'];
                echo wp_kses_post($html);
            endif;
        endforeach;
    } // End function echo_strings()
} // End class Hooky_Action_Hook_Loop_Class