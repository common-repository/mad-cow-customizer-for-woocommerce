<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// change excerpt
add_filter('excerpt_more', 'mcw_excerpt_more', 999);
function mcw_excerpt_more($more) {
    $ellipsis_text = get_option('ellipsis_text');
    $make_ellipsis_link = get_option('make_ellipsis_link');
    if ($ellipsis_text) :
        $display_text = $ellipsis_text;
    else :
        $display_text = $more;
    endif;
    if (!empty ($make_ellipsis_link[0]) && $make_ellipsis_link[0] == 'yes') :
        return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '"> ' . $display_text . '</a>';
    else:
        return '<span class="mcw-read-more"> ' . $display_text . '</span>';
    endif;
}


$mcw_excerpt_length = get_option('mcw_excerpt_length');
if ($mcw_excerpt_length) :
    add_filter( 'excerpt_length', 'mcw_excerpt_custom_length', 999 );
    function mcw_excerpt_custom_length( $length ) {
        $mcw_excerpt_length = get_option('mcw_excerpt_length');
        return $mcw_excerpt_length;
    }
endif;

