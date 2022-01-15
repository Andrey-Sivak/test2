<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit; ?>
<h2 class="cart-page__caption">Your Cart (<?= WC()->cart->get_cart_contents_count(); ?>)</h2>
<?php do_action( 'woocommerce_before_cart' ); ?>
<div class="cart-page">
  <div class="loader">
    <div class="loadingio-spinner-spinner-rl7w6qbl47d"><div class="ldio-4khtpk1mo8v">
        <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
      </div></div>
    <style type="text/css">
      @keyframes ldio-4khtpk1mo8v {
        0% { opacity: 1 }
        100% { opacity: 0 }
      }
      .ldio-4khtpk1mo8v div {
        left: 98.735px;
        top: 42.315px;
        position: absolute;
        animation: ldio-4khtpk1mo8v linear 2.127659574468085s infinite;
        background: #265D93;
        width: 19.53px;
        height: 19.53px;
        border-radius: 9.765px / 9.765px;
        transform-origin: 9.765px 66.185px;
      }.ldio-4khtpk1mo8v div:nth-child(1) {
         transform: rotate(0deg);
         animation-delay: -1.9342359767891684s;
         background: #265D93;
       }.ldio-4khtpk1mo8v div:nth-child(2) {
          transform: rotate(32.72727272727273deg);
          animation-delay: -1.7408123791102514s;
          background: #265D93;
        }.ldio-4khtpk1mo8v div:nth-child(3) {
           transform: rotate(65.45454545454545deg);
           animation-delay: -1.5473887814313347s;
           background: #265D93;
         }.ldio-4khtpk1mo8v div:nth-child(4) {
            transform: rotate(98.18181818181819deg);
            animation-delay: -1.3539651837524178s;
            background: #265D93;
          }.ldio-4khtpk1mo8v div:nth-child(5) {
             transform: rotate(130.9090909090909deg);
             animation-delay: -1.1605415860735009s;
             background: #265D93;
           }.ldio-4khtpk1mo8v div:nth-child(6) {
              transform: rotate(163.63636363636363deg);
              animation-delay: -0.9671179883945842s;
              background: #265D93;
            }.ldio-4khtpk1mo8v div:nth-child(7) {
               transform: rotate(196.36363636363637deg);
               animation-delay: -0.7736943907156674s;
               background: #265D93;
             }.ldio-4khtpk1mo8v div:nth-child(8) {
                transform: rotate(229.0909090909091deg);
                animation-delay: -0.5802707930367504s;
                background: #265D93;
              }.ldio-4khtpk1mo8v div:nth-child(9) {
                 transform: rotate(261.8181818181818deg);
                 animation-delay: -0.3868471953578337s;
                 background: #265D93;
               }.ldio-4khtpk1mo8v div:nth-child(10) {
                  transform: rotate(294.54545454545456deg);
                  animation-delay: -0.19342359767891684s;
                  background: #265D93;
                }.ldio-4khtpk1mo8v div:nth-child(11) {
                   transform: rotate(327.27272727272725deg);
                   animation-delay: 0s;
                   background: #265D93;
                 }
      .loadingio-spinner-spinner-rl7w6qbl47d {
        width: 217px;
        height: 217px;
        display: block;
        overflow: hidden;
        margin: 0 auto;
      }
      .ldio-4khtpk1mo8v {
        width: 100%;
        height: 100%;
        position: relative;
        transform: translateZ(0) scale(1);
        backface-visibility: hidden;
        transform-origin: 0 0; /* see note above */
      }
      .ldio-4khtpk1mo8v div { box-sizing: content-box; }
    </style>
  </div>
  <form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
    <?php do_action( 'woocommerce_before_cart_table' ); ?>

    <table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
      <tbody>
        <?php do_action( 'woocommerce_before_cart_contents' ); ?>

        <?php
        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
          $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
          $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

          if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
            ?>
            <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

              <td class="product-thumbnail">
              <?php
              $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

              if ( ! $product_permalink ) {
                echo $thumbnail; // PHPCS: XSS ok.
              } else {
                printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
              }
              ?>
              </td>

              <td class="product-name" data-title="<?php esc_attr_e( 'Product', 'cannab' ); ?>">
                <p class="product-name-text">
                    <?php
                    if ( ! $product_permalink ) {
                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
                    } else {
                        echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                    }

                    do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key ); ?></p>

                <?php
                // Meta data.
                echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

                // Backorder notification.
                if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
                    echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'cannab' ) . '</p>', $product_id ) );
                }
                ?>
                <div class="product-price-wrap">
                  <div class="product-price-quantity" data-title="<?php esc_attr_e( 'Quantity', 'cannab' ); ?>">
                      <?php
                      if ( $_product->is_sold_individually() ) {
                          $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                      } else {
                          $product_quantity = woocommerce_quantity_input(
                              array(
                                  'input_name'   => "cart[{$cart_item_key}][qty]",
                                  'input_value'  => $cart_item['quantity'],
                                  'max_value'    => $_product->get_max_purchase_quantity(),
                                  'min_value'    => '0',
                                  'product_name' => $_product->get_name(),
                              ),
                              $_product,
                              false
                          );
                      }

                      echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                      ?>
                  </div>
                  <div class="product-price-coast" data-title="<?php esc_attr_e( 'Subtotal', 'cannab' ); ?>">
                      <?php
                      echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
                      ?>
                  </div>
                </div>

                <span class="product-remove">
                    <?php
                    echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                        'woocommerce_cart_item_remove_link',
                        sprintf(
                            '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s">remove from cart</a>',
                            esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                            esc_html__( 'Remove this item', 'cannab' ),
                            esc_attr( $product_id ),
                            esc_attr( $_product->get_sku() )
                        ),
                        $cart_item_key
                    );
                    ?>
                </span>
              </td>
            </tr>
            <?php
          }
        }
        ?>

        <?php do_action( 'woocommerce_cart_contents' ); ?>



        <?php do_action( 'woocommerce_after_cart_contents' ); ?>
      </tbody>
    </table>
    <?php do_action( 'woocommerce_after_cart_table' ); ?>
  </form>

  <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>

  <div class="cart-collaterals">
    <?php
      /**
       * Cart collaterals hook.
       *
       * @hooked woocommerce_cross_sell_display
       * @hooked woocommerce_cart_totals - 10
       */
      do_action( 'woocommerce_cart_collaterals' );
    ?>
  </div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
