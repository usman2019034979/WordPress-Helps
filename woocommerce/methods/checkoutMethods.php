<?php

<?php

/**
 * @Woocommerce All About Checkout
 *
 * wc_get_checkout_url();
 * $fields = WC()->checkout->get_checkout_fields();
 * WC()->checkout->process_checkout();
 * WC()->cart->get_total();
 * WC()->checkout->get_order_review();
 * WC()->checkout->update_checkout_fields();
 * WC()->cart->apply_coupon( $coupon_code );
 *
 * @@ WC_Checkout Class
 *
 * get_checkout_fields(): Retrieves all checkout fields.
 * checkout_fields: Returns the array of fields to display.
 * process_checkout(): Handles the order processing after checkout submission.
 * get_order_review(): Retrieves the order summary on the checkout page.
 * get_billing_address(): Retrieves billing address fields.
 * get_shipping_address(): Retrieves shipping address fields.
 *
 * @@ WC_Order Class
 *
 * get_id(): Retrieves the order ID.
 * get_total(): Retrieves the total order amount.
 * get_items(): Retrieves the items in the order.
 * get_status(): Retrieves the status of the order (e.g., pending, completed).
 *
 * @@ WC_Payment_Gateway Class
 *
 * process_payment(): Processes the payment for the order.
 * get_title(): Retrieves the payment method title.
 * get_description(): Retrieves the payment method description.
 * get_icon(): Retrieves the icon for the payment method.
 *
 * @@ WC_Shipping_Method Class
 *
 * get_shipping_rate(): Retrieves the shipping rate.
 * calculate_shipping(): Calculates the shipping costs.
 *
 * @@ Checkout Actions
 *
 * woocommerce_before_checkout_form: Triggered before the checkout form begins.
 * woocommerce_checkout_before_customer_details: Triggered before the customer details section.
 * woocommerce_checkout_after_customer_details: Triggered after the customer details section.
 * woocommerce_checkout_before_order_review: Triggered before the order review section.
 * woocommerce_checkout_after_order_review: Triggered after the order review section.
 * woocommerce_checkout_order_review: Triggered to display the order review (cart contents).
 *
 * @@ Checkout Filters
 *
 * woocommerce_checkout_fields: Modify or add custom fields to the checkout.
 * woocommerce_checkout_cart_item_quantity: Modify the cart item quantity during checkout.
 * woocommerce_checkout_cart_item_price: Modify the cart item price.
 * woocommerce_payment_gateways: Add or modify available payment methods.
 *
 * @@ Add Custom Checkout Fields
 *
 * add_filter( 'woocommerce_checkout_fields', 'add_custom_checkout_fields' );
 * function add_custom_checkout_fields( $fields ) {
 *      $fields['billing']['billing_custom_field'] = array(
 *      'type' => 'text',
 *      'label' => 'Custom Field',
 *      'placeholder' => 'Enter a custom value',
 *      'required' => true,
 *      );
 *      return $fields;
 * }
 *
 * @@ Checkout Shortcodes
 *
 * [woocommerce_checkout]: Displays the checkout page.
 * [woocommerce_order_tracking]: Displays an order tracking form.
 * [woocommerce_thankyou]: Displays a thank you message after a successful order.
 */
