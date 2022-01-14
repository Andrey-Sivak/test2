<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );


$vendor_id = $vendor_pro = '';
if (defined('wcv_plugin_dir')) {
    $vendor_shop = urldecode(get_query_var('vendor_shop'));
    $vendor_id = WCV_Vendors::get_vendor_id($vendor_shop);
}
if ($vendor_id) {
    return include(rh_locate_template('inc/wcvendor/storepage.php'));
}
?>

<?php if (is_tax('store')): ?>
    <?php include(rh_locate_template('woocommerce/brandarchive.php')); ?>
<?php else :?>

    <?php $display_type = '';?>
    <?php $display_type = woocommerce_get_loop_display_mode(); ?>
  <div class="mobile-trigger-sidebar">
    <div id="mobile-trigger-sidebar">
      <i class="fa-sliders-v fal"></i> <?php esc_html_e('Filter', 'cannab'); ?>
    </div>
  </div>
    <div class="container">
        <?php do_action( 'woocommerce_before_main_content' ); ?>
        <div class="archive-container">
            <?php get_sidebar('shop'); ?>
          <div class="archive-wrap" id="page-<?php the_ID(); ?>">
            <div class="archive-wrap__header">

              <div class="archive-wrap__header_bottom">
                <div class="archive-wrap__header_order">
                  <p class="archive-wrap__header_order-note">Sort by:</p>
                    <?php woocommerce_catalog_ordering(); ?>
                </div>
              </div>
            </div>

              <?php if ( woocommerce_product_loop() ) {

                  /**
                   * Hook: woocommerce_before_shop_loop.
                   *
                   * @hooked woocommerce_output_all_notices - 10
                   * @hooked woocommerce_result_count - 20
                   * @hooked woocommerce_catalog_ordering - 30
                   */
                  //      do_action( 'woocommerce_before_shop_loop' );

                  woocommerce_product_loop_start();

                  if ( wc_get_loop_prop( 'total' ) ) {
                      while ( have_posts() ) {
                          the_post();

                          /**
                           * Hook: woocommerce_shop_loop.
                           */
                          do_action( 'woocommerce_shop_loop' );

                          wc_get_template_part( 'content', 'product' );
                      }
                  }

                  woocommerce_product_loop_end();

                  /**
                   * Hook: woocommerce_after_shop_loop.
                   *
                   * @hooked woocommerce_pagination - 10
                   */
                  do_action( 'woocommerce_after_shop_loop' );

              } else {
                  /**
                   * Hook: woocommerce_no_products_found.
                   *
                   * @hooked wc_no_products_found - 10
                   */
                  do_action( 'woocommerce_no_products_found' );
              }

              /**
               * Hook: woocommerce_after_main_content.
               *
               * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
               */
              do_action( 'woocommerce_after_main_content' );

              /**
               * Hook: woocommerce_sidebar.
               *
               * @hooked woocommerce_get_sidebar - 10
               */
              //do_action( 'woocommerce_sidebar' ); ?>
          </div>
        </div>
    </div>

<?php endif;?>


<?php get_footer();
