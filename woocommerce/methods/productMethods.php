<?php

/**
 * @Woocommerce All Methods
 *
 * @1 Product Information Methods
 *
 * get_id(): Returns the product ID.
 * get_name(): Returns the product name.
 * get_slug(): Returns the product's slug (URL-friendly name).
 * get_description(): Retrieves the full product description.
 * get_short_description(): Retrieves the short description of the product.
 * get_permalink(): Returns the URL of the product page.
 * get_image_id(): Returns the ID of the product's main image.
 * get_image(): Returns the HTML for the product's image.
 * get_gallery_image_ids(): Returns an array of IDs for the product gallery images.
 *
 * @2 Price Methods
 *
 * get_regular_price(): Retrieves the regular price of the product.
 * get_sale_price(): Retrieves the sale price of the product.
 * get_price(): Returns the active price (either regular or sale).
 * get_price_html(): Returns the HTML to display the price, including both regular and sale price.
 *
 * @3 Stock and Inventory Methods
 *
 * get_stock_quantity(): Retrieves the available stock quantity.
 * get_stock_status(): Returns the stock status (e.g., in stock, out of stock).
 * is_in_stock(): Checks if the product is in stock.
 * is_on_backorder(): Checks if the product is on backorder.
 * is_manage_stock(): Checks if stock management is enabled for the product.
 *
 * @4 Product Type and Variations
 *
 * get_type(): Returns the product type (simple, variable, etc.).
 * get_attribute( $name ): Returns the value of a custom attribute for the product.
 * get_attributes(): Returns an array of all the attributes (e.g., color, size) for the product.
 *
 * @5 Tax and Shipping Methods
 *
 * get_tax_status(): Returns the tax status (e.g., taxable, none).
 * get_tax_class(): Retrieves the tax class for the product.
 * get_shipping_class(): Returns the shipping class for the product.
 *
 * @6 Custom Meta Data Methods
 *
 * get_meta( $key, $single = true ): Retrieves a custom meta field value for the product.
 * update_meta_data( $key, $value ): Updates a custom meta field value.
 *
 * @7 Reviews and Ratings
 *
 * get_average_rating(): Returns the average rating for the product.
 * get_rating_count(): Returns the count of ratings for the product.
 * get_review_count(): Retrieves the number of reviews for the product.
 *
 * @8 Product Categories and Tags
 *
 * get_category_ids(): Returns the category IDs the product belongs to.
 * get_categories(): Returns the product categories as a string.
 * get_tags(): Retrieves the product tags.
 *
 * @9 Sale and Visibility
 *
 * is_on_sale(): Checks if the product is currently on sale.
 * is_visible(): Checks if the product is visible in the store.
 * is_featured(): Checks if the product is marked as featured.
 *
 * @10 User Capabilities
 *
 * is_purchasable(): Checks if the product can be purchased (for example, if it's in stock and not a virtual product).
 * is_virtual(): Checks if the product is virtual (doesn't require shipping).
 * is_downloadable(): Checks if the product is downloadable (like digital files).
 *
 * @11 Add to Cart and Checkout Methods
 *
 * add_to_cart_url(): Returns the URL to add the product to the cart.
 * add_to_cart_text(): Returns the text displayed on the "Add to Cart" button.
 *
 * @12 Product Attributes and Variations (for Variable Products)
 *
 * get_variation_attributes(): Returns the attributes for a variable product.
 * get_variation_id(): Returns the ID of a variation (if applicable).
 *
 * @13 Miscellaneous Methods
 *
 * is_type( $type ): Checks if the product is of a specific type (e.g., simple, variable, etc.).
 * get_sku(): Returns the SKU (stock keeping unit) of the product.
 * get_weight(): Retrieves the weight of the product.
 * get_length(), get_width(), get_height(): Return the dimensions of the product (for shipping calculations).
 *
 * @14 General (Only For Variable Products)
 *
 * get_children(): Get Variations Or Children Products
 */