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
