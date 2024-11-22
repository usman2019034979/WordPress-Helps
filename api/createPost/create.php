<?php
	/**
 * WordPress Rest Api
 */

function register_book_rest_endpoint()
{
    $args = array(
        'methods' => 'POST',
        'callback' => 'handle_add_book_request',
        'permission_callback' => '__return_true',
    );
    register_rest_route('add_book/v2', 'add_book', $args);
}

add_action('rest_api_init', 'register_book_rest_endpoint');

function handle_add_book_request(WP_REST_Request $request)
{
    $title = sanitize_text_field($request->get_param('title'));
    $content = sanitize_textarea_field($request->get_param('content'));

    if (empty($title) || empty($content)) {
        return new WP_REST_Response('Title and content are required.', 400);
    }

    $post_data = array(
        'post_title' => $title,
        'post_content' => $content,
        'post_type' => 'books',
        'post_status' => 'publish',
    );

    $post_id = wp_insert_post($post_data);

    if (is_wp_error($post_id)) {
        return new WP_REST_Response('Failed to add book', 400);
    }
    return new WP_REST_Response(array('post_id' => $post_id), 200);
}