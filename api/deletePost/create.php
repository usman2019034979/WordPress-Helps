<?php

/**
 * WordPress Rest Api
 */

function register_delete_rest_endpoint()
{
    $args = array(
        'methods' => 'POST',
        'callback' => 'handle_delete_book_request',
        'permission_callback' => '__return_true',
    );
    register_rest_route('delete_book/v2', 'delete_book', $args);
}

add_action('rest_api_init', 'register_delete_rest_endpoint');

function handle_delete_book_request(WP_REST_Request $request)
{
    $id = $request->get_param('id');

    if (empty($id)) {
        return new WP_REST_Response('ID, Title and content are required.', 400);
    }

    $post = get_post($id);
    if (!$post) {
        return new WP_REST_Response('Post not found.', 404);
    }

    $deleted = wp_delete_post($id, true);
    if (!$deleted) {
        return new WP_REST_Response('Failed to delete the book post.', 400);
    }
    return new WP_REST_Response('Book deleted successfully', 200);
}