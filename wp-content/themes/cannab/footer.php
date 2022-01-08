<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package cannab
 */

$empty_footer = is_checkout() || is_account_page();
?>

<?php if (!$empty_footer) : ?>
<footer class="container footer">
    <div class="footer__item">
        <p class="footer__item_text">DISCLAIMER
            <br><br>Getcannab and its materials are not intended to treat, diagnose, cure or prevent any disease. The
            information and products presented on this site are not intended for medical use nor do they make any
            medical claims. Always seek the advice of your physician or another qualified healthcare provider for any
            questions you have regarding a pre-existing medical condition, are pregnant and/or are breastfeeding, and
            before undertaking any diet, exercise or other health related program.</p>
    </div>
    <div class="footer__item">
        <p class="footer__item_caption">Quick Links</p>

        <?php if (has_nav_menu('header')) :
            wp_nav_menu(
                array(
                    'theme_location' => 'quick-links',
                    'menu_id' => 'quick-links-menu',
                    'container_class' => 'footer__menu_wrap',
                    'menu_class' => 'footer__menu',
                )
            ); ?>
        <?php endif; ?>
    </div>
    <div class="footer__item">
        <p class="footer__item_caption">Terms & Policy</p>

        <?php if (has_nav_menu('header')) :
            wp_nav_menu(
                array(
                    'theme_location' => 'terms-policy',
                    'menu_id' => 'terms-policy-menu',
                    'container_class' => 'footer__menu_wrap',
                    'menu_class' => 'footer__menu',
                )
            ); ?>
        <?php endif; ?>
    </div>
    <div class="footer__item">
        <p class="footer__item_caption">Don’t miss the newest products</p>
        <form action="#" class="footer__form">
            <input type="text"
                   placeholder="Email address"
                   class="footer__form_input">
            <button class="footer__form_btn" type="submit">Subscribe</button>
        </form>
    </div>
</footer>
<?php endif; ?>
</div>

<?php wp_footer(); ?>

</body>
</html>
