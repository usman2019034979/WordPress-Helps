<?php

/**
 * WordPress Rest Api
 */

function register_update_rest_endpoint()
{
    $args = array(
        'methods' => 'POST',
        'callback' => 'handle_update_book_request',
        'permission_callback' => '__return_true',
    );
    register_rest_route('update_book/v2', 'update_book', $args);
}

add_action('rest_api_init', 'register_update_rest_endpoint');

function handle_update_book_request(WP_REST_Request $request)
{
    $id = $request->get_param('id');
    $title = sanitize_text_field($request->get_param('title'));
    $content = sanitize_textarea_field($request->get_param('content'));

    if (empty($id) || empty($content) || empty($title)) {
        return new WP_REST_Response('ID, Title and content are required.', 400);
    }

    $post_data = array(
        'ID' => $id,
        'post_title' => $title,
        'post_content' => $content,
    );

    $post_id = wp_update_post($post_data);

    if (is_wp_error($post_id)) {
        $error_message = $post_id->get_error_message();
        return new WP_REST_Response('Failed to update book: ' . $error_message, 400);
    }
    return new WP_REST_Response(array('post_id' => $post_id), 200);
}