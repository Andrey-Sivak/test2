<?php

get_header();
?>

<main class="home-page">
    <div class="main-banner"
         style="background-image: url('<?= get_field('main-screen-bg')['url']; ?>');">
        <div class="container">
            <h1 class="main-banner__caption"><?= get_field('main-screen-caption'); ?></h1>
            <p class="main-banner__subcaption"><?= get_field('main-screen-subcaption'); ?></p>
            <p class="main-banner__text"><?= get_field('main-screen-text'); ?></p>
            <a href="<?= get_field('main-screen-link-link'); ?>" class="main-banner__btn"><?= get_field('main-screen-link-text'); ?></a>
        </div>
    </div>

    <div class="container categories">
        <p class="categories__caption"><?= esc_html__('Choose Category', 'cannab'); ?></p>
        <div class="categories__list">
            <?php
            $args = [
                'taxonomy'     => 'product_cat',
                'orderby'      => 'name',
                'number' => 6,
                'hide_empty'   => true,
                ];
            $all_categories = get_categories( $args );

            foreach ($all_categories as $cat) :
                $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                $image_url = wp_get_attachment_url( $thumbnail_id );
                ?>

              <a href="<?= get_home_url() . '/shop/product_cat-' . $cat->category_nicename; ?>" class="categories__item">
                <figure class="categories__item_img">
                  <img src="<?= $image_url; ?>" alt="img">
                </figure>
                <p class="categories__item_title"><?= $cat->name; ?></p>
              </a>

            <?php endforeach; ?>
        </div>
    </div>

    <div class="container random-products">
        <div class="products">
            <?php
            $args = [
                'post_type' => 'product',
                'post_status' => 'publish',
                'posts_per_page' => 4,
                'orderby' => 'rand',
            ];
            $random_products = new WP_Query( $args );

            if ( $random_products->have_posts() ):
                while ( $random_products->have_posts() ): $random_products->the_post();
                $product = wc_get_product( $random_products->post->ID );
                wc_get_template_part( 'content', 'product' );
                endwhile;
                wp_reset_query();
            endif;
            ?>
        </div>
    </div>

    <div class="features">
        <div class="container features__wrap">
            <div class="features__left">
                <p class="features__caption"><?= esc_html__('Our Features', 'cannab'); ?></p>
                <a href="<?= get_field('about-link-link'); ?>" class="features__btn"><?= get_field('about-link-text'); ?></a>
            </div>
            <div class="features__list">
                <?php
                $features = get_field('our_features');
                foreach ($features as $feature) : ?>
                    <div class="features__item">
                        <figure class="features__item_img">
                            <img src="<?= $feature['icon']['url']; ?>" alt="img">
                        </figure>
                        <div class="features__item_content">
                            <p class="features__item_caption"><?= $feature['title']; ?></p>
                            <p class="features__item_text"><?= $feature['text']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="subscribe" style="background-image: url('<?= get_field('subscribe-bg')['url']; ?>');">
        <div class="subscribe__wrap">
            <p class="subscribe__text"><?= get_field('subscribe-text'); ?></p>
            <form class="subscribe__form">
                <input type="text"
                       placeholder="Type your email here"
                       class="subscribe__form_input">
                <button class="subscribe__form_btn"><?= esc_html__('Subscribe', 'cannab'); ?></button>
            </form>
        </div>
    </div>
</main>

<?php get_footer() ?>
