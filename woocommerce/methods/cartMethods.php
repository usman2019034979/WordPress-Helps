<?php

/**
 * @Woocommerce All About Cart
 *
 * WC()->cart->get_cart();
 * WC()->cart->remove_cart_item( $cart_item_key );
 * WC()->cart->set_quantity( $cart_item_key, $quantity );
 * WC()->cart->get_total();
 * WC()->cart->get_subtotal();
 * WC()->cart->is_empty();
 * WC()->cart->empty_cart();
 *
 * @@ Cart Actions
 *
 * woocommerce_before_cart: Triggered before the cart table is displayed.
 * woocommerce_cart_contents: Triggered after the cart contents are displayed.
 * woocommerce_cart_collaterals: Triggered for the cart totals section.
 * woocommerce_after_cart: Triggered after the cart content is displayed.
 * woocommerce_before_cart_table: Triggered before the cart table begins.
 *
 * @@ Cart Filters
 *
 * woocommerce_cart_item_name: Modify the name of items in the cart.
 * woocommerce_cart_item_price: Modify the price of items in the cart.
 * woocommerce_cart_item_subtotal: Modify the subtotal of items in the cart.
 * woocommerce_cart_totals_before_order_total: Modify the order total section before it’s displayed.
 *
 * @@ Cart Shortcodes
 *
 * [woocommerce_cart]: Displays the full cart page.
 * [woocommerce_checkout]: Displays the checkout page.
 * [woocommerce_cart_total]: Displays the cart total.
 * [woocommerce_checkout_coupon]: Display coupon input field.
 *
 */