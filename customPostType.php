<?php
/**
 * Nafayh Functions And Definitions
 *
 * @package Nafayh
 */

function create_books_post_type()
{
    $labels = array(
        'name' => 'Books',
        'singular_name' => 'Book',
        'menu_name' => 'Books',
        'name_admin_bar' => 'Book',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Book',
        'new_item' => 'New Book',
        'edit_item' => 'Edit Book',
        'view_item' => 'View Book',
        'all_items' => 'All Books',
        'search_items' => 'Search Books',
        'parent_item_colon' => 'Parent Books:',
        'not_found' => 'No books found.',
        'not_found_in_trash' => 'No books found in Trash.',
        'featured_image' => 'Cover Image',
        'set_featured_image' => 'Set cover image',
        'remove_featured_image' => 'Remove cover image',
        'use_featured_image' => 'Use as cover image',
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'books'),
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'show_in_rest' => true,
        'rest_base' => 'books',
        'rest_controller_class' => 'WP_REST_Posts_Controller',
    );

    register_post_type('books', $args);
}

add_action('init', 'create_books_post_type');

/**
 * Taxonomy For Custom Post Type - Genre
 */
function create_books_genre_taxonomy()
{
    $labels = array(
        'name'              => 'Genres',
        'singular_name'     => 'Genre',
        'search_items'      => 'Search Genres',
        'all_items'         => 'All Genres',
        'parent_item'       => 'Parent Genre',
        'parent_item_colon' => 'Parent Genre:',
        'edit_item'         => 'Edit Genre',
        'update_item'       => 'Update Genre',
        'add_new_item'      => 'Add New Genre',
        'new_item_name'     => 'New Genre Name',
        'menu_name'         => 'Genre',
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'genre'),
        'show_in_rest'      => true,
    );

    register_taxonomy('genre', array('books'), $args);
}

add_action('init', 'create_books_genre_taxonomy');

/**
 * Taxonomy For Custom Post Type - Tags (Non-Hierarchical)
 */
function create_books_tags_taxonomy()
{
    $labels = array(
        'name'              => 'Tags',
        'singular_name'     => 'Tag',
        'search_items'      => 'Search Tags',
        'all_items'         => 'All Tags',
        'edit_item'         => 'Edit Tag',
        'update_item'       => 'Update Tag',
        'add_new_item'      => 'Add New Tag',
        'new_item_name'     => 'New Tag Name',
        'menu_name'         => 'Tags',
    );

    $args = array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'tag'),
        'show_in_rest'      => true,
    );

    register_taxonomy('book_tag', array('books'), $args);
}

add_action('init', 'create_books_tags_taxonomy');
