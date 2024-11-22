<?php

/**
 * Get Woocommerce Products Variation Based On product ID
 */

$product_id = 294;
$product = wc_get_product($product_id);
if ($product->is_type('variable')) {
    $variation_ids = $product->get_children();
    foreach ($variation_ids as $variation_id) {
        $variation = wc_get_product($variation_id);
        $attributes = $variation->get_attributes();
        $sku = $variation->get_sku();
        $price = $variation->get_price();
        $stock_status = $variation->get_stock_status();
        $image_id = $variation->get_image_id();
        $image_url = wp_get_attachment_url($image_id);
        $variation_link = get_permalink($variation_id);
        echo '<h3>Variation ID: ' . $variation_id . '</h3>';
        echo '<p>SKU: ' . $sku . '</p>';
        echo '<p>Price: ' . wc_price($price) . '</p>';
        echo '<p>Stock Status: ' . ucfirst($stock_status) . '</p>';
        echo '<p>Image: <img src="' . $image_url . '" alt="Variation Image" style="max-width: 100px;"></p>';
        echo '<p><a href="' . esc_url($variation_link) . '" target="_blank">View Variation</a></p>';

        if (!empty($attributes)) {
            foreach ($attributes as $attribute_name => $attribute_value) {
                echo '<p>' . wc_attribute_label($attribute_name) . ': ' . $attribute_value . '</p>';
            }
        }
    }
} else {
    echo 'This is not a variable product.';
}