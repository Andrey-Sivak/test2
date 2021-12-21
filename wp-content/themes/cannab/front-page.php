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
        <p class="categories__caption">Choose Category</p>
        <div class="categories__list">
        </div>
    </div>

    <div class="random-products">
        <p class="random-products">Товары</p>
    </div>

    <div class="features">
        <div class="container features__wrap">
            <div class="features__left">
                <p class="features__caption">Our Features</p>
                <a href="<?= get_field('about-link-link'); ?>" class="features__btn"><?= get_field('about-link-text'); ?></a>
            </div>
            <div class="features__list">
                <?php
                $features = get_field('our_features');
                foreach ($features as $feature) : ?>
                    <div class="features__item">
                        <figure class="features__item_img">
                            <img src="<?= $feature['icon']['img']; ?>" alt="img">
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
                <button class="subscribe__form_btn">Subscribe</button>
            </form>
        </div>
    </div>
</main>

<?php get_footer() ?>
