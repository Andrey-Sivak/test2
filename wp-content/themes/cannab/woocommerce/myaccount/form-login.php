<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.1.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

do_action('woocommerce_before_customer_login_form'); ?>

<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

<div class="u-columns col2-set enter" id="customer_login">

    <div class="u-column1 col-1 enter__wrap">

        <?php endif; ?>

        <h2 class="enter__caption"><?php esc_html_e('Welcome back', 'cannab'); ?></h2>

        <form class="woocommerce-form woocommerce-form-login login" method="post">

            <?php do_action('woocommerce_login_form_start'); ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide enter__text-input-field">
                <input type="text"
                       class="woocommerce-Input woocommerce-Input--text input-text"
                       name="username"
                       placeholder="Username or email address"
                       id="username"
                       autocomplete="username"
                       value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                <label for="username"><?php esc_html_e('Username or email address', 'cannab'); ?>&nbsp;<span
                            class="required">*</span></label>
            </p>
            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide enter__text-input-field">
                <input class="woocommerce-Input woocommerce-Input--text input-text"
                       type="password"
                       name="password"
                       id="password"
                       placeholder="Password"
                       autocomplete="current-password"/>
                <label for="password"><?php esc_html_e('Password', 'cannab'); ?>&nbsp;<span
                            class="required">*</span></label>
            </p>

            <?php do_action('woocommerce_login_form'); ?>

            <div class="form-row">
                <div class="enter__row">
                    <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                        <input class="woocommerce-form__input woocommerce-form__input-checkbox"
                               name="rememberme"
                               type="checkbox"
                               id="rememberme"
                               value="forever"/>
                        <span><?php esc_html_e('Remember me', 'cannab'); ?></span>
                    </label>
                    <p class="woocommerce-LostPassword lost_password">
                        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Forgot your password?', 'cannab'); ?></a>
                    </p>
                </div>
                <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                <button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login"
                        value="<?php esc_attr_e('Log in', 'cannab'); ?>"><?php esc_html_e('Log in', 'cannab'); ?></button>
                <p class="enter__footer">Don’t have an account? <a href="#" class="enter__switch">sign up</a></p>
            </div>

            <?php do_action('woocommerce_login_form_end'); ?>

        </form>

        <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

    </div>

    <div class="u-column2 col-2 enter__wrap">

        <h2 class="enter__caption"><?php esc_html_e('Register', 'cannab'); ?></h2>

        <form method="post"
              class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?> >

            <?php do_action('woocommerce_register_form_start'); ?>

            <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide enter__text-input-field">
                    <input type="text"
                           class="woocommerce-Input woocommerce-Input--text input-text"
                           name="username"
                           placeholder="Username"
                           id="reg_username"
                           autocomplete="username"
                           value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                    <label for="reg_username"><?php esc_html_e('Username', 'cannab'); ?>&nbsp;<span
                                class="required">*</span></label>
                </p>

            <?php endif; ?>

            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide enter__text-input-field">
                <input type="email"
                       class="woocommerce-Input woocommerce-Input--text input-text"
                       name="email"
                       id="reg_email"
                       placeholder="Email address"
                       autocomplete="email"
                       value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                <label for="reg_email"><?php esc_html_e('Email address', 'cannab'); ?>&nbsp;<span class="required">*</span></label>
            </p>

            <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide enter__text-input-field">
                    <input type="password"
                           class="woocommerce-Input woocommerce-Input--text input-text"
                           name="password"
                           placeholder="Password"
                           id="reg_password"
                           autocomplete="new-password"/>
                    <label for="reg_password"><?php esc_html_e('Password', 'cannab'); ?>&nbsp;<span
                                class="required">*</span></label>
                </p>

            <?php else : ?>

                <p class="enter__note"><?php esc_html_e('A link to set a new password will be sent to your email address.', 'cannab'); ?></p>

            <?php endif; ?>

            <?php do_action('woocommerce_register_form'); ?>

            <p class="woocommerce-form-row form-row">
                <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                <button type="submit"
                        class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit"
                        name="register"
                        value="<?php esc_attr_e('Register', 'cannab'); ?>"><?php esc_html_e('Register', 'cannab'); ?></button>

            <p class="enter__footer">Already have an account? <a href="#" class="enter__switch">sign IN</a></p>
            </p>

            <?php do_action('woocommerce_register_form_end'); ?>

        </form>

    </div>

</div>
<?php endif; ?>

<?php do_action('woocommerce_after_customer_login_form'); ?>

<script>
    (function () {
        const signCards = [...document.querySelectorAll('.enter__wrap')];

        const activeCard = window.localStorage.getItem('active-login-form');

        if (activeCard) {
            document.querySelector(`.enter__wrap.${activeCard}`)
                .classList.add('active');
        }

        if (!document.querySelector('.enter__wrap.active')) {

            signCards[0].classList.add('active');
        }

        if (!activeCard) {
            if (document.querySelector('.enter__wrap.active').classList.contains('col-2')) {
                window.localStorage.setItem('active-login-form', 'col-2');
            } else {
                window.localStorage.setItem('active-login-form', 'col-1');
            }
        }

        signCards.forEach(s => s.addEventListener('click', switchSignCards));

        function switchSignCards(e) {
            const target = e.target;

            if (!target.classList.contains('enter__switch')) return;

            signCards.forEach(s => s.classList.toggle('active'));

            if (document.querySelector('.enter__wrap.active').classList.contains('col-2')) {
                window.localStorage.setItem('active-login-form', 'col-2');
            } else {
                window.localStorage.setItem('active-login-form', 'col-1');
            }
        }
    })();
</script>
