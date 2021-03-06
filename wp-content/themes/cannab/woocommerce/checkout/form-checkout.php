<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'cannab')));
    return;
}

?>

<form name="checkout" method="post" class="checkout woocommerce-checkout"
      action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

    <?php if ($checkout->get_checkout_fields()) : ?>

    <?php do_action('woocommerce_checkout_before_customer_details'); ?>
    <div class="checkout-form__wrap">
        <div class="checkout__wrap-left">
            <div class="col2-set checkout__section" id="customer_details">
                <?php if (wc_ship_to_billing_address_only() && WC()->cart->needs_shipping()) : ?>

                    <h3><?php esc_html_e('Billing &amp; Shipping', 'cannab'); ?></h3>

                <?php else : ?>

                    <h3 class="checkout__section_caption"><?php esc_html_e('Billing details', 'cannab'); ?><span
                                class="num">1</span></h3>

                <?php endif; ?>

                <div class="col-1">
                    <?php do_action('woocommerce_checkout_billing'); ?>
                </div>

                <div class="col-2">
                    <?php do_action('woocommerce_checkout_shipping'); ?>
                </div>

                <script>
                    (function () {
                        window.addEventListener('load', () => {

                            setTimeout(() => {
                                if (document.querySelector('input[name="billing_first_name"]')) {
                                    document.querySelector('input[name="billing_first_name"]').focus();
                                }
                            }, 3000)
                        })
                    })();
                </script>
            </div>

            <?php do_action('woocommerce_checkout_after_customer_details'); ?>

            <?php endif; ?>

            <div class="shipping checkout__section">
                <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
                    <p class="checkout__section_caption">Shipping Methods <span class="num">2</span></p>

                    <?php do_action('woocommerce_review_order_before_shipping'); ?>

                    <?php wc_cart_totals_shipping_html(); ?>

                    <?php do_action('woocommerce_review_order_after_shipping'); ?>

                <?php endif; ?>
            </div>
        </div>

        <?php do_action('woocommerce_checkout_before_order_review'); ?>

        <div id="order_review" class="woocommerce-checkout-review-order">
            <?php do_action('woocommerce_checkout_order_review'); ?>
        </div>

        <?php do_action('woocommerce_checkout_after_order_review'); ?>
    </div>
</form>

<?php do_action('woocommerce_after_checkout_form', $checkout); ?>
