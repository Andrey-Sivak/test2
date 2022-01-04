<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined( 'ABSPATH' ) || exit;
?>
<div class="shop_table woocommerce-checkout-review-order-table checkout__section checkout__section-card">

  <p class="checkout__section-card_caption">Order Summary</p>

  <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) :

      $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) )  :?>
          <div class="checkout__section-card_product">
          <figure class="checkout__section-card_img">
            <?= $_product->get_image(); ?>
          </figure>
          <div class="checkout__section-card_desc">
            <p class="checkout__section-card_title"><?=  $_product->get_name(); ?></p>
            <div class="checkout__section-card_settings">
              <p class="checkout__section-card_amount"></p>
              <p class="checkout__section-card_quantity">Quantity: <?= $cart_item['quantity'] ?></p>
            </div>
            <p class="checkout__section-card_main-price"><?= apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); ?></p>
          </div>
        </div>
      <?php endif; ?>
  <?php endforeach; ?>

  <div class="checkout__section-card_price">
    <div class="checkout__section-card_subtotal">
        <p>Subtotal</p>
        <?php wc_cart_totals_subtotal_html(); ?>
    </div>
    <div class="checkout__section-card_total">
      <p>Total</p>
        <?php do_action( 'woocommerce_review_order_before_order_total' ); ?>
        <?php wc_cart_totals_order_total_html(); ?>
        <?php do_action( 'woocommerce_review_order_after_order_total' ); ?>
    </div>

    <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
      <div class="cart-discount checkout__section-card_promocode coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
        <div><?php wc_cart_totals_coupon_label( $coupon ); ?></div>
        <div><?php wc_cart_totals_coupon_html( $coupon ); ?></div>
      </div>
    <?php endforeach; ?>

    <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
      <div class="fee heckout__section-card_fee">
        <div><?php echo esc_html( $fee->name ); ?></div>
        <div><?php wc_cart_totals_fee_html( $fee ); ?></div>
      </div>
    <?php endforeach; ?>

    <div class="checkout__section-card_button">Place order</div>
  </div>

</div>
<?php
if ( ! is_ajax() ) {
	do_action( 'woocommerce_review_order_after_payment' );
} ?>
