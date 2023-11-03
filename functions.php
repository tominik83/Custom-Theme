<?php

// error_reporting(E_ALL);

function require_plugin() {
    require_once get_template_directory() . '/inc/required-plugins.php';
}

add_action( 'init', 'require_plugin' );



function theme_settings_page() {
    add_menu_page('Theme Settings', 'Theme Settings', 'manage_options', 'theme-settings', 'theme_settings_form');
}
add_action('admin_menu', 'theme_settings_page');

function theme_settings_form() {
    ?>
    <div class="wrap">
        <h2>Theme Settings</h2>
        <form method="post" action="options.php">
            <?php settings_fields('theme-settings-group'); ?>
            <?php do_settings_sections('theme-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">GitHub Version Shortcode</th>
                    <td>
                        <input type="text" name="github_version_shortcode" value="<?php echo esc_attr(get_option('github_version_shortcode')); ?>" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row">Shortcode Location</th>
                    <td>
                        <label><input type="radio" name="shortcode_location" value="header" <?php checked(get_option('shortcode_location'), 'header'); ?>> Header</label><br>
                        <label><input type="radio" name="shortcode_location" value="footer" <?php checked(get_option('shortcode_location'), 'footer'); ?>> Footer</label>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}



function theme_settings_init() {
    register_setting('theme-settings-group', 'github_version_shortcode');
    register_setting('theme-settings-group', 'shortcode_location');
}
add_action('admin_init', 'theme_settings_init');


function add_theme_settings_link($links) {
    $settings_link = '<a href="admin.php?page=theme-settings">Theme Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'add_theme_settings_link');




function update_version()
{

    $github_username = 'tominik83';
    $github_repo = 'Custom-Theme';
    
    $url = "https://api.github.com/repos/$github_username/$github_repo/releases/latest";
    
    $headers = array(
        'User-Agent: Custom-Theme', // Možete promeniti 'My-App' u naziv vaše aplikacije
    );
    
    $response = wp_safe_remote_request($url, array('headers' => $headers));
    
    if (is_wp_error($response)) {
        // Greška u dohvatanju podataka
    } else {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);
    
        if ($data && isset($data['tag_name'])) {
            // Ispisivanje informacija o najnovijem release-u
            $latest_version = esc_html($data['tag_name']);
            // $version_with_ver = 'ver=' . $latest_version;
            $release_notes = esc_html($data['body']);
            // echo 'Ver: ' . esc_html($data['body']);
    
            // Link za download nove verzije
            $download_link = 'https://github.com/tominik83/Custom-Theme/archive/refs/tags/latest.zip';
    
            // Provjeri da li je dostupna nova verzija
            $theme = wp_get_theme();
            $current_version = $theme->get('Version'); // Trenutna verzija teme
            // echo 'Theme Version: ' . $current_version;
            if (version_compare($latest_version, $current_version, '>')) {
                echo '<p class="update-available"> Update Available: ' . esc_html($latest_version) . '</p>';
                echo '<p class="describe">Description: ' . esc_html($release_notes) . '</p>';
                echo '<a href="' . $download_link . '" class="download-button">Download</a>';
                echo '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAW1JREFUSEutlttZwzAMRo82KZuQTcokZZN2E7IJMIn5fEki2VKcB/KStrZ1+S9yhf0RIB1f3U+CkKa7ytEWLr+cR63OcvbRtv1hAh17aEr/4Hx2QDAdHOsDFG4fAnLeoCA+8jpB2ZE2TDvO8sZT6lQH0c6WICbrYLTt6cG7oqOGxIB7KzAurkI0V6gD9X5y6E3HDGRqz0gmwVeIQ7KVoeGgmKiuP4DPE4cMXEN6AR893mcdPBHuvW379ltBK7BswUOItA+a9r5BbpMRUoJHnpxxcAO+gPz2xtYP8GYGTyeHCz4owcckkINnzNc9QTDV4mF3rLwjPEkaLlkgrdXJ8YwaZ1Hsiaysu8AtCQtJ1ogbM9PmRjPVPSD9IrziS8FWWDtoWZQPZjOsHDoun+giCqfpFVqiy087udbeP8lWpzUSkWnGqOXV4fTSJdlDpAgfhLOn15j+1x+AK0arBThy8y0QqigmTavLH/7WyzrFH7dQmx8CV/g9AAAAAElFTkSuQmCC"/>';
            }
        } else {
            echo 'Nema dostupnih informacija o verziji.';
        }
    }
}

add_shortcode('theme_version', 'update_version');
// add_action('after_setup_theme', 'update_version');

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

class mob_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
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

// require get_template_directory() . '/inc/github.php';




// $github_username = 'tominik83';
// $github_repo = 'Custom-Theme';

// $url = "https://api.github.com/repos/$github_username/$github_repo/releases/latest";

// $headers = array(
//     'User-Agent: Custom-Theme',
// );

// $response = wp_safe_remote_request($url, array('headers' => $headers));

// if (is_wp_error($response)) {
//     return 'Greška u dohvatanju podataka.';
// }

// $body = wp_remote_retrieve_body($response);
// $data = json_decode($body, true);

// if (!$data || !isset($data['tag_name'])) {
//     return 'Nema dostupnih informacija o verziji.';
// }

// $latest_version = esc_html($data['tag_name']);
// $release_notes = esc_html($data['body']);
// $download_link = "https://github.com/$github_username/$github_repo/archive/refs/tags/latest.zip";

// // Trenutna verzija teme
// $theme = wp_get_theme();
// $current_version = $theme->get('Version');

// if (version_compare($latest_version, $current_version, '>')) {
//     // Ako postoji nova verzija, prikaži dugme za preuzimanje i ikonu
//     $output = '<div class="github-version-info">';
//     $output .= 'Najnovija verzija: ' . $latest_version;
//     $output .= 'Verzija: ' . $release_notes;
//     $output .= '<a href="' . $download_link . '" class="download-button">Preuzmi</a>';
//     $output .= '<i class="fas fa-lightbulb new-version-indicator"></i>'; // Prilagodite klasu ikone prema vašem CSS-u
//     $output .= '</div>';
// } else {
//     $output = 'Trenutna verzija je najnovija.';
// }

// return $output;


