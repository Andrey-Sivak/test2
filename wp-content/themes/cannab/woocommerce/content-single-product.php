<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'cannab-product', $product ); ?>>
   <div class="cannab-product__top">

     <div class="cannab-product__mobile">
         <?php $brands = get_the_terms( $product->get_id(), 'brands' );
         if ($brands[0]) : ?>
           <div class="cannab-product__brand">
               <?php foreach ($brands as $brand) : ?>
                 <p class="cannab-product__brand_item"><?= $brand->name; ?></p>
               <?php endforeach; ?>
           </div>
         <?php endif; ?>
         <?php woocommerce_template_single_title(); ?>
         <?php woocommerce_template_single_rating(); ?>
     </div>

     <div class="cannab-product__top_img">
       <?php woocommerce_show_product_sale_flash(); ?>
       <?php woocommerce_show_product_images(); ?>
     </div>
     <div class="cannab-product__top_main-info">

       <div class="cannab-product__desktop">

       <?php $brands = get_the_terms( $product->get_id(), 'brands' );
       if ($brands[0]) : ?>
         <div class="cannab-product__brand">
             <?php foreach ($brands as $brand) : ?>
               <p class="cannab-product__brand_item"><?= $brand->name; ?></p>
             <?php endforeach; ?>
         </div>
       <?php endif; ?>

         <div class="cannab-product-accordion__wrap">

         </div>

       <?php woocommerce_template_single_title(); ?>
       <?php
       $vendor_id = get_post_field( 'post_author', $product->get_id() );
       $vendor = get_userdata( $vendor_id );
       $vendor_name = $vendor->display_name; ?>
           <div class="cannab-product__sold-by">
       <?= sprintf( esc_html__( 'sold by %s', 'woocommerce' ), "<span class='cannab-product__sold-by_name'>$vendor_name</span>"); ?>
           </div>
       <?php woocommerce_template_single_rating(); ?>
       </div>

       <?php
       $effects = get_the_terms( $product->get_id(), 'effects' );
       if ($effects[0]) : ?>
       <div class="cannab-product__effects">
         <?php foreach ($effects as $effect) :
             $img_url = get_field('image', 'effects_' . $effect->term_id)['url']; ?>
         <div class="cannab-product__effects_item">
             <figure class="cannab-product__effects_img">
                 <img src="<?= $img_url; ?>" alt="img">
             </figure>
             <p class="cannab-product__effects_name"><?= $effect->name; ?></p>
         </div>
         <?php endforeach; ?>
       </div>
       <?php endif; ?>
       <?php woocommerce_template_single_excerpt(); ?>
       <?php woocommerce_template_single_price(); ?>
       <?php woocommerce_template_single_add_to_cart(); ?>
<!--       --><?php //WC_Structured_Data::generate_product_data(); ?>

     </div>
   </div>
  <div class="cannab-product__attributes">
    <?php $attrs = $product->get_attributes();
    $names_match = [
        'pa_cbd-per-package' => 'CBD per package',
        'pa_thc-percent' => 'THC %',
        'pa_package-size' => 'Package size',
        'pa_cbd-percent' => 'CBD Size',
    ];

    foreach ($attrs as $attr) :
        $attr_name = $attr['data']['name'];
        $attr_value = $product->get_attribute($attr_name);
        ?>
    <div class="cannab-product__attribute">
      <p class="cannab-product__attribute_val"><?= $attr_value; ?></p>
      <p class="cannab-product__attribute_name"><?= $names_match[$attr_name]; ?></p>
    </div>
    <?php endforeach; ?>
  </div>

  <div class="cannab-product__reviews">
    <?php comments_template(); ?>
  </div>

  <div class="cannab-product__desc">
    <div class="cannab-product__desc_tabs-wrap"></div>
    <?php
    $desc = get_field('product_additional_description') ?
        get_field('product_additional_description') :
        get_field('product_additional_data_default_settings', 'option');

    $main_desc_image = get_field('post_content_image')['url'] ?
        get_field('post_content_image')['url'] :
        get_field('default_additonal_data_image', 'option')['url'];
    ?>

    <div class="cannab-product__desc_item">
      <?php if ($main_desc_image) : ?>
      <figure class="cannab-product__desc_image">
        <div class="cannab-product__desc_img"
             style="background-image:url('<?= $main_desc_image; ?>');"></div>
        <img src="<?= $main_desc_image; ?>" alt="img">
      </figure>
      <?php endif; ?>
      <p class="cannab-product__desc_title">Product description</p>
      <div class="cannab-product__desc_text"><?php the_content(); ?></div>
    </div>

    <?php foreach ($desc as $item) : ?>
    <div class="cannab-product__desc_item">
      <?php if ($item['image']['url']) : ?>
      <figure class="cannab-product__desc_image">
        <div class="cannab-product__desc_img"
             style="background-image:url('<?= $item['image']['url']; ?>');"></div>
        <img src="<?= $item['image']['url']; ?>" alt="img">
      </figure>
      <?php endif; ?>
      <?php if ($item['title']) : ?>
      <p class="cannab-product__desc_title"><?=  $item['title']; ?></p>
      <?php endif; ?>
      <?php if ($item['text']) : ?>
      <div class="cannab-product__desc_text"><?= $item['text']; ?></div>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
<!--  --><?php //woocommerce_output_product_data_tabs(); ?>
  <?php woocommerce_output_related_products(); ?>

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
