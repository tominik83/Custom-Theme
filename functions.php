<?php

// function require_github_plugin() {
//     require_once get_template_directory() . '/inc/required-plugins.php';
// }

// add_action( 'init', 'require_github_plugin' );

function my_theme_support()
{

    // Dodaje dinamicno ime stranice
    add_theme_support('tittle-tag');
    add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'my_theme_support');

function my_theme_menus()
{
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

add_action('init', 'my_theme_menus');



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

class mob_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Prilagodite ovo prema vašim potrebama
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

        $output .= '<li id="menu-item-' . $item->ID . '" class="' . esc_attr($class_names) . '">';
        $output .= '<a href="' . esc_url($item->url) . '">';

        // Dodajte stilove prema vašim potrebama
        $output .= '';

        $output .= esc_html($item->title);
        $output .= '</span></a>';
    }
}


