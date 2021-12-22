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

?>

	<footer class="container footer">
    <div class="footer__item">
      <p class="footer__item_text">DISCLAIMER
        <br><br>Getcannab and its materials are not intended to treat, diagnose, cure or prevent any disease. The information and products presented on this site are not intended for medical use nor do they make any medical claims. Always seek the advice of your physician or another qualified healthcare provider for any questions you have regarding a pre-existing medical condition, are pregnant and/or are breastfeeding, and before undertaking any diet, exercise or other health related program.</p>
    </div>
    <div class="footer__item">
      <p class="footer__item_caption">Quick Links</p>
      <ul class="footer__menu">
        <li class="footer__menu_item">
          <a href="#" class="footer__menu_link">Catalog</a>
        </li>
        <li class="footer__menu_item">
          <a href="#" class="footer__menu_link">FAQ</a>
        </li>
        <li class="footer__menu_item">
          <a href="#" class="footer__menu_link">About us</a>
        </li>
        <li class="footer__menu_item">
          <a href="#" class="footer__menu_link">Signup / Login</a>
        </li>
        <li class="footer__menu_item">
          <a href="#" class="footer__menu_link">Create a store</a>
        </li>
      </ul>
    </div>
    <div class="footer__item">
      <p class="footer__item_caption">Terms & Policy</p>
      <ul class="footer__menu">
        <li class="footer__menu_item">
          <a href="#" class="footer__menu_link">Terms & Conditions of Use</a>
        </li>
        <li class="footer__menu_item">
          <a href="#" class="footer__menu_link">Terms & Conditions of Sale</a>
        </li>
        <li class="footer__menu_item">
          <a href="#" class="footer__menu_link">Delivery Policy</a>
        </li>
        <li class="footer__menu_item">
          <a href="#" class="footer__menu_link">Privacy Policy</a>
        </li>
        <li class="footer__menu_item">
          <a href="#" class="footer__menu_link">Return Policy</a>
        </li>
      </ul>
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
</div>

<?php wp_footer(); ?>

</body>
</html>
