<?php

/**
 * Shortcodes
 */

function shortcode_callback($atts)
{
    $atts = shortcode_atts(
        array(
            'text' => 'This is the',
            'color' => 'black',
            'size' => '16px',
        ),
        $atts,
        'shortcode_call'
    );

    $text = $atts['text'];
    $color = $atts['color'];
    $size = $atts['size'];
    echo "<span style='color: $color; font-size: $size;'>$text</span>";
}

add_shortcode('shortcode_call', 'shortcode_callback');