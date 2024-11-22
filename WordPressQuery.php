<?php
/**
 * WordPress Query + Tax Query + Meta Query
 */

$args = array(
    'post_type' => 'books',
    'post_status' => 'publish',
    'posts_per_page' => '-1',
    'fields' => 'ids',
    'tax_query' => array(
        array(
            'taxonomy' => 'genre',
            'field' => 'id',
            'terms' => array(3),
        )
    ),
    'meta_query' => array(
        array(
            'key' => 'number',
            'value' => '23',
            'compare' => '=',
        ),
    ),
);

$the_query = new WP_Query($args);
echo '<pre>';
print_r($the_query->posts);
echo '</pre>';