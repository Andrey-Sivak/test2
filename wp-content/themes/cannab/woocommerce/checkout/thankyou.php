<?php
/**
 * Thankyou page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/thankyou.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;
?>

<div class="woocommerce-order">

	<?php
	if ( $order ) :

		do_action( 'woocommerce_before_thankyou', $order->get_id() );
		?>

		<?php if ( $order->has_status( 'failed' ) ) : ?>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed"><?php esc_html_e( 'Unfortunately your order cannot be processed as the originating bank/merchant has declined your transaction. Please attempt your purchase again.', 'cannab' ); ?></p>

			<p class="woocommerce-notice woocommerce-notice--error woocommerce-thankyou-order-failed-actions">
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php esc_html_e( 'Pay', 'cannab' ); ?></a>
				<?php if ( is_user_logged_in() ) : ?>
					<a href="<?php echo esc_url( wc_get_page_permalink( 'myaccount' ) ); ?>" class="button pay"><?php esc_html_e( 'My account', 'cannab' ); ?></a>
				<?php endif; ?>
			</p>

		<?php else : ?>

			<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'cannab' ), $order ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

		<?php endif; ?>

		<?php do_action( 'woocommerce_thankyou_' . $order->get_payment_method(), $order->get_id() ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->get_id() ); ?>

        </div>

        <div class="woocommerce-order__right">
        <div class="order-received__wrap">
            <p class="order-received__caption"><?php echo esc_html__('Order Summary', 'cannab'); ?></p>

            <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details order-received__table">

                <li class="woocommerce-order-overview__order order order-received__table_row">
                    <p><?php esc_html_e('Order number:', 'cannab'); ?></p>
                    <strong><?php echo $order->get_order_number(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                </li>

                <li class="woocommerce-order-overview__date date order-received__table_row">
                    <p><?php esc_html_e('Date:', 'cannab'); ?></p>
                    <strong><?php echo wc_format_datetime($order->get_date_created()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                </li>

                <?php if (is_user_logged_in() && $order->get_user_id() === get_current_user_id() && $order->get_billing_email()) : ?>
                    <li class="woocommerce-order-overview__email email order-received__table_row">
                        <p><?php esc_html_e('Email:', 'cannab'); ?></p>
                        <strong><?php echo $order->get_billing_email(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                    </li>
                <?php endif; ?>

                <?php if ($order->get_payment_method_title()) : ?>
                    <li class="woocommerce-order-overview__payment-method method order-received__table_row">
                        <p><?php esc_html_e('Payment method:', 'cannab'); ?></p>
                        <strong><?php echo wp_kses_post($order->get_payment_method_title()); ?></strong>
                    </li>
                <?php endif; ?>

                <?php $shipping_methods = $order->get_shipping_methods();
                foreach ($shipping_methods as $shipping_method) : ?>
                    <li class="woocommerce-order-overview__total shipping order-received__table_row">
                        <p><?php esc_html_e('Shipping:', 'cannab'); ?></p>
                        <strong><?php echo $shipping_method->get_name();?></strong>
                    </li>
                <?php endforeach; ?>

                <li class="woocommerce-order-overview__total subtotal order-received__table_row">
                    <p><?php esc_html_e('Subotal:', 'cannab'); ?></p>
                    <strong><?php echo $order->get_subtotal_to_display(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></strong>
                </li>

            </ul>
        </div>
        <div class="order-received__wrap">
            <p class="order-received__caption"><?php echo esc_html__('Delivery Address', 'cannab'); ?></p>
            <ul class="woocommerce-order-overview woocommerce-thankyou-order-details order_details order-received__table">

                <?php wp_kses_post($order->get_formatted_billing_address(esc_html__('N/A', 'cannab'))); ?>

                <li class="woocommerce-order-overview__order order order-received__table_row">
                    <p><?php esc_html_e('Country / Region', 'cannab'); ?></p>
                    <strong><?= $order->get_billing_country(); ?></strong>
                </li>

                <li class="woocommerce-order-overview__order order order-received__table_row">
                    <p><?php esc_html_e('Street address', 'cannab'); ?></p>
                    <strong><?= $order->get_billing_address_1(); ?></strong>
                </li>

                <li class="woocommerce-order-overview__order order order-received__table_row">
                    <p><?php esc_html_e('Postcode', 'cannab'); ?></p>
                    <strong><?= $order->get_billing_postcode(); ?></strong>
                </li>

                <li class="woocommerce-order-overview__order order order-received__table_row">
                    <p><?php esc_html_e('Town / City', 'cannab'); ?></p>
                    <strong><?= $order->get_billing_city(); ?></strong>
                </li>

            </ul>
        </div>
    </div>

	<?php else : ?>

		<p class="woocommerce-notice woocommerce-notice--success woocommerce-thankyou-order-received"><?php echo apply_filters( 'woocommerce_thankyou_order_received_text', esc_html__( 'Thank you. Your order has been received.', 'cannab' ), null ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>

	<?php endif; ?>

</div>
