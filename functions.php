<?php

// error_reporting(E_ALL);


function theme_settings_page()
{
    add_menu_page('theme-settings', 'Theme Options', 'manage_options', 'theme-settings', 'theme_option_form');
    add_submenu_page('theme-settings', 'Style', 'Style', 'manage_options', 'theme-settings-submenu-1', 'theme_submenu_page_1');
    add_submenu_page('theme-settings', 'Settings', 'Settings', 'manage_options', 'theme-settings-settings', 'admin_submenu_settings');
    add_submenu_page('theme-settings', 'Theme Update', 'Theme Update', 'manage_options', 'theme-update', 'theme_update_version_admin_page');
}
add_action('admin_menu', 'theme_settings_page');

function theme_option_form()
{
    ?>
    <div class="wrap">
        <h2>Welcome to Custom Theme</h2>
        <form method="post" action="options.php">
            <?php settings_fields('theme-settings-group'); ?>
            <?php do_settings_sections('theme-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Notification Bar</th>
                    <td>
                        <input type="text" name="notification_shortcode"
                            value="<?php echo esc_attr(get_option('notification_shortcode')); ?>" />
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

function theme_settings_init()
{
    register_setting('theme-settings-group', 'notification_shortcode');
    register_setting('theme-settings-group', 'shortcode_location');
}
add_action('admin_init', 'theme_settings_init');

function theme_submenu_page_1()
{
    // Kod za sadržaj prve podstranice
    echo '<div class="wrap-style">
    <h2>Submenu Page 1</h2><p>Sadržaj prve podstranice ovde.</p></div>';
}

function admin_submenu_settings()
{
    admin_panel();
}

function admin_panel()
{
    require get_template_directory() . '/inc/admin/admin_panel.php';
}

// add_action('init', 'admin_panel');

function theme_update_version_admin_page()
{
    ?>
    <div class="wrap-settings">
        <h1>Theme Update</h1>
        <p>Your theme is up to date. You can customize this page with additional update information.</p>
    </div>
    <?php
}

// function custom_admin_styles() {
//     echo '<style>
//         body.wp-admin #wpbody {
//             background-color: #1e1e1e; /* Zamijenite ovu boju sa željenom tamnom bojom */
//             color: #fff; /* Boja teksta na tamnoj pozadini */
//         }
//     </style>';
// }

// add_action('admin_head', 'custom_admin_styles');













function theme_update_version_down()
{
    // Provjera da li je korisnik prijavljen i ima određenu ulogu
    // if (is_user_logged_in() && (current_user_can('subscriber') || current_user_can('editor'))) {
    $github_username = 'tominik83';
    $github_repo = 'Custom-Theme';

    $url = "https://api.github.com/repos/$github_username/$github_repo/releases/latest";

    $headers = array(
        'User-Agent: Custom-Theme',
        // Ime aplikacije - repository
    );

    $response = wp_safe_remote_request($url, array('headers' => $headers));

    if (is_wp_error($response)) {
        // Prikaz poruke o grešci
        echo '<p class="error-msg">Error</p>';
    } else {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if ($data && isset($data['tag_name'])) {
            // Informacije o novom izdanju
            $latest_version = esc_html($data['tag_name']);
            $release_notes = esc_html($data['body']);

            // Download link za najnovije izdanje
            $download_link = "https://github.com/$github_username/$github_repo/archive/refs/tags/$latest_version.zip";

            // Provjera ažuriranja
            $theme = wp_get_theme();
            $current_version = $theme->get('Version');
            if (version_compare($latest_version, $current_version, '>')) {
                // echo '<p class="update-available"> Update Available: ' . esc_html($latest_version) . '</p>';
                // echo '<p class="describe">Description: ' . esc_html($release_notes) . '</p>';
                echo '<a href="' . $download_link . '" class="download-button"><span class="download-icon">⬇️</span>Download</a>';
                echo 'Theme Version: ' . $latest_version;
            }
            // else {
            //     echo '<p class="update-available">Up to date</p>';
            // }
        }
    }
    // } 
    // else {
    //     // Korisnik nije prijavljen ili nema odgovarajuću ulogu
    //     echo '<p class="error-msg">You must be logged in with the appropriate role to view this information.</p>';
    // }
}
// Dodavanje funkcije na određeno mesto, npr. u functions.php teme
add_action('admin_notices', 'theme_update_version_down');
// add_shortcode('theme_version', 'theme_update_version_down');

// function theme_update_version_admin_notice()
// {
//     if (!current_user_can('manage_options')) {
//         return; // Ako korisnik nema dozvolu za upravljanje opcijama, izlaz iz funkcije
//     }

//     $github_username = 'tominik83';
//     $github_repo = 'Custom-Theme';

//     $url = "https://api.github.com/repos/$github_username/$github_repo/releases/latest";

//     $headers = array(
//         'User-Agent: Custom-Theme',
//         // Ime aplikacije - repository
//     );

//     $response = wp_safe_remote_request($url, array('headers' => $headers));

//     if (is_wp_error($response)) {
//         // Prikaz poruke o grešci
//         return;
//     }

//     $body = wp_remote_retrieve_body($response);
//     $data = json_decode($body, true);

//     if ($data && isset($data['tag_name'])) {
//         // Informacije o novom izdanju
//         $latest_version = esc_html($data['tag_name']);

//         // Provjera ažuriranja
//         $theme = wp_get_theme();
//         $current_version = $theme->get('Version');
//         if (version_compare($latest_version, $current_version, '>')) {
//             $update_url = wp_nonce_url(admin_url('themes.php?page=theme-update'), 'theme-update-nonce');
//             $message = sprintf(
//                 'New version %s is available! <a href="%s">Update now</a>.',
//                 esc_html($latest_version),
//                 esc_url($update_url)
//             );
//             echo '<div class="notice notice-info is-dismissible"><p>' . $message . '</p></div>';
//         }
//     }
// }
// add_action('admin_notices', 'theme_update_version_admin_notice');









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

// class mob_Walker extends Walker_Nav_Menu
// {
//     public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
//     {
//         // Prilagodite ovo prema vašim potrebama
//         $classes = empty($item->classes) ? array() : (array) $item->classes;
//         $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

//         $output .= '<li id="menu-item-' . $item->ID . '" class="' . esc_attr($class_names) . '">';
//         $output .= '<a href="' . esc_url($item->url) . '">';

//         // Dodajte stilove prema vašim potrebama
//         $output .= '';

//         $output .= esc_html($item->title);
//         $output .= '</span></a>';
//     }
// }

// function require_plugin()
// {
//     require_once get_template_directory() . '/inc/required-plugins.php';
// }

// add_action('init', 'require_plugin');
