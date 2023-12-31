<?php

/**
 * Enqueue scripts and styles.
 */
function wp_style_scripts()
{

    $version = wp_get_theme()->get('Version');

    wp_register_style('main-style', get_template_directory_uri() . '/dist/app.css', array(), $version, 'all');
    wp_enqueue_style('main-style');

    // wp_enqueue_scripts('jquery');
    wp_register_script('app-script', get_stylesheet_directory_uri() . '/dist/app.js', array('jquery'), $version, true);
    wp_enqueue_script('app-script');
}

add_action('wp_enqueue_scripts', 'wp_style_scripts');


function my_theme_support()
{

    // Dodaje dinamicno ime stranice
    add_theme_support('tittle-tag');

    add_theme_support(
        'html5',
        array(
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'script',
            'style',
            'navigation-widgets',
        )
    );

    // Add theme support for Custom Logo.
    add_theme_support(
        'custom-logo',
        array(
            'width' => 250,
            'height' => 250,
            'flex-width' => true,
        )
    );

    // Menu Support
    add_theme_support('menus');

    register_nav_menus(
        array(
            'header-menu' => __('Header Menu Location', 'custom-theme'),
            'footer-menu' => __('Footer Menu Location', 'custom-theme'),
            'mobile-menu' => __('Mobile Menu Location', 'custom-theme'),
            'radio-menu' => __('Radio Menu Location', 'custom-theme'),
        )
    );


    add_theme_support('custom-background');

    

    add_theme_support('widget');
    
    register_sidebar(array(
        'name' => __('CT-Widget', 'custom-theme'),
        'id' => 'ct-widget',
        'description' => __('Opis widgeta', 'custom-theme'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    // add_action('widgets_init', 'dodaj_widget podršku');


    




}

add_action('after_setup_theme', 'my_theme_support');


function custom_heme_starter_content() {

    $starter_content = array(
        // Set up nav menus for each of the two areas registered in the theme.
        'nav_menus' => array(
            // Assign a menu to the "top" location.
            'header-menu' => array(
                'name' => __('Header Menu Location', 'custom_theme'),
                'items' => array(
                    'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
                    'page_about',
                    'page_blog',
                    'page_contact',
                ),
            ),

            // Assign a menu to the "social" location.
            'footer-menu' => array(
                'name' => __('Footer Menu Location', 'custom_theme'),
                'items' => array(
                    'link_yelp',
                    'link_facebook',
                    'link_twitter',
                    'link_instagram',
                    'link_email',
                ),
            ),
        ),
    );
    $starter_content = apply_filters('custom_theme_starter_content', $starter_content);
}

// add_theme_support( 'starter-content', $starter_content );


