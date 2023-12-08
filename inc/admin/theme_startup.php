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
        'custom-logo',
        array(
            'height' => 40,
            // Visina loga (promenite prema svojim potrebama)
            'width' => 40,
            // Širina loga (promenite prema svojim potrebama)
            // 'flex-height' => true,
        )
    );

    // Menu Support
    add_theme_support('menus');

    register_nav_menus(
        array(
            'header-menu' => 'Header Menu Location',
            'footer-menu' => 'Footer Menu Location',
            'mobile-menu' => 'Mobile Menu Location',
        )
    );
}

add_action('after_setup_theme', 'my_theme_support');


