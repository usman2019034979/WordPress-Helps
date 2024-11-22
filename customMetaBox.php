<?php

/**
 * Custom Meta Box
 */

function custom_book_meta_box() {
    add_meta_box(
        'book_name_meta_box',
        'Book Name and Email',
        'book_name_email_meta_box_callback',
        'books',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'custom_book_meta_box');

function book_name_email_meta_box_callback($post) {
    wp_nonce_field('book_name_email_meta_box_nonce', 'book_name_email_nonce');

    $book_name = get_post_meta($post->ID, 'book_name', true);
    $book_email = get_post_meta($post->ID, 'book_email', true);

    echo '<label for="book_name">Book Name:</label>';
    echo '<input type="text" id="book_name" name="book_name" value="' . esc_attr($book_name) . '" /><br>';

    echo '<label for="book_email">Book Email:</label>';
    echo '<input type="email" id="book_email" name="book_email" value="' . esc_attr($book_email) . '" />';
}

function save_book_name_email_meta_box_data($post_id) {
    if (!isset($_POST['book_name_email_nonce'])) {
        return $post_id;
    }

    if (!wp_verify_nonce($_POST['book_name_email_nonce'], 'book_name_email_meta_box_nonce')) {
        return $post_id;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return $post_id;
    }

    if ('books' != $_POST['post_type']) {
        return $post_id;
    }

    if (isset($_POST['book_name'])) {
        $book_name = sanitize_text_field($_POST['book_name']);
        update_post_meta($post_id, 'book_name', $book_name);
    }

    if (isset($_POST['book_email'])) {
        $book_email = sanitize_email($_POST['book_email']);
        update_post_meta($post_id, 'book_email', $book_email);
    }

    return $post_id;
}
add_action('save_post', 'save_book_name_email_meta_box_data');