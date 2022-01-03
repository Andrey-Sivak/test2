<?php
/**
 * cannab functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package cannab
 */

if ( ! defined( '_S_VERSION' ) ) {
    // Replace the version number of the theme on each release.
    define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'cannab_setup' ) ) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function cannab_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on cannab, use a find and replace
         * to change 'cannab' to the name of your theme in all the template files.
         */
        load_theme_textdomain( 'cannab', get_template_directory() . '/languages' );

        // Add default posts and comments RSS feed links to head.
        add_theme_support( 'automatic-feed-links' );

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support( 'title-tag' );

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'header' => esc_html__( 'header', 'cannab' ),
				'terms-policy' => esc_html__( 'terms-policy', 'cannab' ),
				'quick-links' => esc_html__( 'quick-links', 'cannab' ),
			)
		);

        register_sidebar(array(
            'id' => 'wooshopsidebar',
            'name' => esc_html__('Woocommerce shop sidebar', 'cannab'),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<div class="title">',
            'after_title' => '</div>',
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'cannab_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 250,
                'width'       => 250,
                'flex-width'  => true,
                'flex-height' => true,
            )
        );
    }
endif;
add_action( 'after_setup_theme', 'cannab_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function cannab_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'cannab_content_width', 640 );
}
add_action( 'after_setup_theme', 'cannab_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function cannab_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'cannab' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cannab' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'cannab_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cannab_scripts() {
	wp_enqueue_style( 'cannab-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'cannab-style', 'rtl', 'replace' );

    wp_enqueue_style( 'main-style', get_template_directory_uri() . '/dist/css/main.css', array(), _S_VERSION );
    wp_enqueue_style( 'product-style', get_template_directory_uri() . '/css/wc-single-product.css', array(), _S_VERSION );

	wp_enqueue_script( 'cannab-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
    wp_enqueue_script( 'main-script', get_template_directory_uri() . '/dist/js/main.js', array('jquery', 'select2'), _S_VERSION, true );

    wp_localize_script( 'main-script', 'cart_qty_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    wp_enqueue_script( 'main-script' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cannab_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
    require get_template_directory() . '/inc/woocommerce.php';
}

if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'General Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));
}

function brand_register_taxonomy() {
    register_taxonomy( 'brands', 'product',
        array(
            'labels'                => [
                'name'              => 'Brands',
                'singular_name'     => 'Brand',
                'search_items'      => 'Search brands',
                'all_items'         => 'All brands',
                'view_item'         => 'View brands',
                'parent_item'       => 'Parent brands',
                'parent_item_colon' => 'Parent brands:',
                'edit_item'         => 'Edit brands',
                'update_item'       => 'Refresh brand',
                'add_new_item'      => 'Add brand',
                'new_item_name'     => 'Brands title',
                'menu_name'         => 'Brands',
            ],
            'hierarchical' => true,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'show_in_rest'       => true,
            'show_admin_column' => true
        )
    );
}
add_action( 'init', 'brand_register_taxonomy' );

function effect_register_taxonomy() {
    register_taxonomy( 'effects', 'product',
        array(
            'labels'                => [
                'name'              => 'Effects',
                'singular_name'     => 'Effect',
                'search_items'      => 'Search effects',
                'all_items'         => 'All effects',
                'view_item'         => 'View effects',
                'parent_item'       => 'Parent effects',
                'parent_item_colon' => 'Parent effects:',
                'edit_item'         => 'Edit effects',
                'update_item'       => 'Refresh effect',
                'add_new_item'      => 'Add effect',
                'new_item_name'     => 'Effect title',
                'menu_name'         => 'Effects',
            ],
            'hierarchical' => true,
            'sort' => true,
            'args' => array( 'orderby' => 'term_order' ),
            'show_in_rest'       => true,
            'show_admin_column' => true
        )
    );
}
add_action( 'init', 'effect_register_taxonomy' );


add_action('wp_enqueue_scripts', 'enqueue_cart_qty_ajax');

function ajax_qty_cart() {

    // Set item key as the hash found in input.qty's name
    $cart_item_key = $_POST['hash'];

    // Get the array of values owned by the product we're updating
    $threeball_product_values = WC()->cart->get_cart_item( $cart_item_key );

    // Get the quantity of the item in the cart
    $threeball_product_quantity = apply_filters( 'woocommerce_stock_amount_cart_item', apply_filters( 'woocommerce_stock_amount', preg_replace( "/[^0-9\.]/", '', filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT)) ), $cart_item_key );

    // Update cart validation
    $passed_validation  = apply_filters( 'woocommerce_update_cart_validation', true, $cart_item_key, $threeball_product_values, $threeball_product_quantity );

    // Update the quantity of the item in the cart
    if ( $passed_validation ) {
        WC()->cart->set_quantity( $cart_item_key, $threeball_product_quantity, true );
    }

    // Refresh the page
    echo do_shortcode( '[woocommerce_cart]' );

    die();

}

add_action('wp_ajax_qty_cart', 'ajax_qty_cart');
add_action('wp_ajax_nopriv_qty_cart', 'ajax_qty_cart');