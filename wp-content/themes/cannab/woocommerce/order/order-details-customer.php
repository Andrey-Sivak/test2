<?php
/**
 * Order Customer Details
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/order/order-details-customer.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.6.0
 */

defined('ABSPATH') || exit; ?>
    <section class="woocommerce-customer-details">

        <p class="woocommerce-customer-details__caption">Customer and order details</p>

        <?php if ($order->get_billing_first_name()) : ?>
        <div class="woocommerce-customer-details__row">
            <p>First Name</p>
            <strong><?= esc_html($order->get_billing_first_name()); ?></strong>
        </div>
        <?php endif; ?>

        <?php if ($order->get_billing_last_name()) : ?>
        <div class="woocommerce-customer-details__row">
            <p>Last Name</p>
            <strong><?= esc_html($order->get_billing_last_name()); ?></strong>
        </div>
        <?php endif; ?>

        <?php if ($order->get_billing_phone()) : ?>
            <div class="woocommerce-customer-details__row">
                <p>Phone Number</p>
                <strong><?= esc_html($order->get_billing_phone()); ?></strong>
            </div>
        <?php endif; ?>

        <?php if ($order->get_billing_email()) : ?>
            <div class="woocommerce-customer-details__row">
                <p>Email</p>
                <strong><?= esc_html($order->get_billing_email()); ?></strong>
            </div>
        <?php endif; ?>

        <?php do_action('woocommerce_order_details_after_customer_details', $order); ?>
    </section>
</div>

<div class="woocommerce-order__right">
    <div class="order-received__wrap">
        <p class="order-received__caption"><?php echo esc_html__('Order Summary', 'woocommerce'); ?></p>

        <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details order-received__table">

            <li class="woocommerce-order-overview__order order order-received__table_row">
                <p><?php esc_html_e('Order number:', 'woocommerce'); ?></p>
                <strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
            </li>

            <li class="woocommerce-order-overview__date date order-received__table_row">
                <p><?php esc_html_e('Date:', 'woocommerce'); ?></p>
                <strong><?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
            </li>

            <?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
                <li class="woocommerce-order-overview__email email order-received__table_row">
                    <p><?php esc_html_e('Email:', 'woocommerce'); ?></p>
                    <strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                </li>
            <?php endif; ?>

            <?php if ($order->get_payment_method_title()) : ?>
                <li class="woocommerce-order-overview__payment-method method order-received__table_row">
                    <p><?php esc_html_e('Payment method:', 'woocommerce'); ?></p>
                    <strong><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
                </li>
            <?php endif; ?>

            <?php $shipping_methods = $order->get_shipping_methods();
            foreach ($shipping_methods as $shipping_method) : ?>
                <li class="woocommerce-order-overview__total shipping order-received__table_row">
                    <p><?php esc_html_e('Shipping:', 'woocommerce'); ?></p>
                    <strong><?php echo $shipping_method->get_name();?></strong>
                </li>
            <?php endforeach; ?>

            <li class="woocommerce-order-overview__total subtotal order-received__table_row">
                <p><?php esc_html_e('Subotal:', 'woocommerce'); ?></p>
                <strong><?php echo $order->get_subtotal_to_display(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
            </li>

        </ul>
    </div>
    <div class="order-received__wrap">
        <p class="order-received__caption"><?php echo esc_html__('Delivery Address', 'woocommerce'); ?></p>
        <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details order-received__table">

            <?php wp_kses_post($order->get_formatted_billing_address(esc_html__('N/A', 'woocommerce'))); ?>

            <li class="woocommerce-order-overview__order order order-received__table_row">
                <p><?php esc_html_e('Country / Region', 'woocommerce'); ?></p>
                <strong><?= $order->get_billing_country(); ?></strong>
            </li>

            <li class="woocommerce-order-overview__order order order-received__table_row">
                <p><?php esc_html_e('Street address', 'woocommerce'); ?></p>
                <strong><?= $order->get_billing_address_1(); ?></strong>
            </li>

            <li class="woocommerce-order-overview__order order order-received__table_row">
                <p><?php esc_html_e('Postcode', 'woocommerce'); ?></p>
                <strong><?= $order->get_billing_postcode(); ?></strong>
            </li>

            <li class="woocommerce-order-overview__order order order-received__table_row">
                <p><?php esc_html_e('Town / City', 'woocommerce'); ?></p>
                <strong><?= $order->get_billing_city(); ?></strong>
            </li>

        </ul>
    </div>
</div>
