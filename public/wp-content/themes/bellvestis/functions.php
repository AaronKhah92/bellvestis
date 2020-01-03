<?php

/**
 * Bellvestis functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bellvestis
 */

if (!function_exists('bellvestis_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function bellvestis_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Bellvestis, use a find and replace
         * to change 'bellvestis' to the name of your theme in all the template files.
         */
        load_theme_textdomain('bellvestis', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'bellvestis'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('bellvestis_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }
endif;
add_action('after_setup_theme', 'bellvestis_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bellvestis_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('bellvestis_content_width', 640);
}
add_action('after_setup_theme', 'bellvestis_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bellvestis_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'bellvestis'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'bellvestis'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}
add_action('widgets_init', 'bellvestis_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function bellvestis_scripts()
{
    wp_enqueue_style('bellvestis-style', get_stylesheet_uri());


    wp_enqueue_style('blueprint-css', "https://unpkg.com/blueprint-css@3.1.1/dist/blueprint.min.css", [], false, '');

    wp_enqueue_style('bass', 'https://unpkg.com/basscss@8.0.2/css/basscss.min.css', [], false, '');

    wp_enqueue_script('bellvestis-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('bellvestis-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    wp_enqueue_script('zepto', 'https://cdnjs.cloudflare.com/ajax/libs/zepto/1.2.0/zepto.js', [], false, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bellvestis_scripts');

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
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    require get_template_directory() . '/inc/woocommerce.php';
}

/* remove_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 ); */
add_action('woocommerce_product_query', 'prefix_custom_pre_get_posts_query');
/**
 * Hide Product Cateories from targetted pages in WooCommerce
 * @link https://gist.github.com/stuartduff/bd149e81d80291a16d4d3968e68eb9f8#file-wc-exclude-product-category-from-shop-page-php
 *
 */
function prefix_custom_pre_get_posts_query($q)
{

    if (is_shop()) { // set conditions here
        $tax_query = (array) $q->get('tax_query');

        $tax_query[] = array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => array('men', 'women', 'shirt', 'skirt', 'jacket', 'jeans', 't-shirt', 'pants'), // set product categories here
            'operator' => 'NOT IN',
        );

        $q->set('tax_query', $tax_query);
    }
}

add_action('template_redirect', 'remove_woohooks_shop');
function remove_woohooks_shop()
{

    if (is_shop()) {
        remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
        remove_action('woocommerce_no_products_found', 'wc_no_products_found');
    } elseif (is_category()) {
    }
}
