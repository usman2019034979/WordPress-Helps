<?php

/**
 * Get Woocommerce Products Basic Data
 */

$args = array(
    'post_type' => 'product',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'fields' => 'ids',
);

$query = new WP_Query($args);
$post_ids = $query->posts;
if ($post_ids) {
    foreach ($post_ids as $post_id) {
        $product = wc_get_product($post_id);
        $name = $product->get_name();
        $categories = $product->get_categories(', ');
        $sku = $product->get_sku();
        $attachment_url = wp_get_attachment_url($product->get_image_id());
        $gallery_ids = $product->get_gallery_image_ids();
        $gallery_urls = [];
        if ($gallery_ids) {
            foreach ($gallery_ids as $gallery_id) {
                $gallery_urls[] = wp_get_attachment_url($gallery_id);
            }
        }
        $price = $product->get_price();
        $description = $product->get_description();
        $short_description = $product->get_short_description();
    }
} else {
    echo 'No products found.';
}
