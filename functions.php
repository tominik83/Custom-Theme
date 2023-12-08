<?php

/**
 * Custom Theme functions and definitions
 *
 * @link https://dev.bibliotehnika.tk/themes/basics/theme-functions/
 *
 * @package Custom Theme
 * @since Custom Theme 1.0
 */







// error_reporting(E_ALL);


function theme_settings_page()
{
    add_menu_page('theme-settings', 'Theme Panel', 'manage_options', 'theme-settings', 'theme_option_form');
    add_submenu_page('theme-settings', 'Style', 'Style', 'manage_options', 'theme-settings-style', 'theme_submenu_style');
    add_submenu_page('theme-settings', 'Settings', 'Settings', 'manage_options', 'theme-settings-settings', 'theme_submenu_settings');
    add_submenu_page('theme-settings', 'Theme Update', 'Theme Update', 'manage_options', 'theme-update', 'theme_update_version_admin_page');
}
add_action('admin_menu', 'theme_settings_page');

function theme_option_form()
{

    require get_template_directory() . '/inc/admin/admin_panel.php';

}

function theme_settings_init()
{
    register_setting('theme-settings-group', 'notification_shortcode');
    register_setting('theme-settings-group', 'shortcode_location');
}
add_action('admin_init', 'theme_settings_init');

function theme_submenu_style()
{
    require get_template_directory() . '/inc/admin/admin_template_style.php';

}

function theme_submenu_settings()
{
    require get_template_directory() . '/inc/admin/admin_settings.php';

}


function theme_update_version_admin_page()
{
    require get_template_directory() . '/inc/admin/admin_update.php';

    add_menu_page(
        'Theme Update Page',
        'Theme Update <span class="update-plugins count-1"><span class="update-count">1</span></span>',
        'manage_options',
        'theme_update_page',
        'theme_update_version_admin_page',
        'dashicons-update',
        20
    );
}







// Dodajte akciju za prikazivanje admin stranice
// add_action('admin_menu', 'theme_update_add_admin_page');

// function theme_update_add_admin_page()
// {
//     add_menu_page(
//         'Theme Update Page',
//         'Theme Update',
//         'manage_options',
//         'theme_update_page',
//         'theme_update_version_admin_page',
//         'dashicons-update',
//         20
//     );
// }


// function custom_admin_styles() {
//     echo '<style>
//         body.wp-admin #wpbody {
//             background-color: #1e1e1e; /* Zamijenite ovu boju sa željenom tamnom bojom */
//             color: #fff; /* Boja teksta na tamnoj pozadini */
//         }
//     </style>';
// }

// add_action('admin_head', 'custom_admin_styles');




function promeni_ime_navigacionog_linka($items, $args)
{
    // Proveri da li je korisnik prijavljen
    if (is_user_logged_in()) {
        // Pronađi link koji ima tekst "Neki Link" i promeni ga u "Logout"
        foreach ($items as $item) {
            if ($item->title == 'Get In') {
                $item->title = 'Logout';
                break;
            }
        }
    }

    return $items;
}

add_filter('wp_nav_menu_objects', 'promeni_ime_navigacionog_linka', 10, 2);




function ogranicenje_pristupa_stranicama()
{

    $plugin_path = 'log-reg/log-reg.php';
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    // Proveri da li je plugin instaliran
    if (function_exists('is_plugin_active') && is_plugin_active($plugin_path)) {
        // Proveri da li trenutna stranica nije početna
        if (!is_front_page()) {
            // Proveri da li korisnik nije prijavljen i nije na stranici "get-in"
            if (!is_user_logged_in() && !is_page('get-in')) {
                // Ako nije prijavljen i nije na stranici "get-in", preusmeri ga na početnu stranicu
                wp_redirect(home_url('/get-in'));
                exit;
            }
        }

    }
}

add_action('template_redirect', 'ogranicenje_pristupa_stranicama');
// Dodajte akciju za provjeru ažuriranja prilikom inicijalizacije admin dijela
add_action('admin_init', 'theme_update_version_down');



// Funkcija za provjeru ažuriranja
function theme_update_version_down()
{
    $github_username = 'tominik83';
    $github_repo = 'Custom-Theme';
    $url = "https://api.github.com/repos/$github_username/$github_repo/releases/latest";
    $headers = array(
        'User-Agent: Custom-Theme',
    );
    $request_args = array(
        'timeout' => 60,
    );
    $response = wp_safe_remote_request($url, array('headers' => $headers, $request_args));

    if (is_wp_error($response)) {
        echo '<p class="error-msg">Error</p>';
    } else {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if ($data && isset($data['tag_name'])) {
            $latest_version = esc_html($data['tag_name']);
            $release_notes = esc_html($data['body']);
            $download_link = "https://github.com/$github_username/$github_repo/archive/refs/tags/$latest_version.zip";

            $theme = wp_get_theme();
            $current_version = $theme->get('Version');

            add_meta_box(
                'theme_update_metabox',
                'Theme Update Information',
                'display_theme_update_info',
                'dashboard',
                'normal',
                'high'
            );

            global $theme_update_data;
            $theme_update_data = compact('latest_version', 'release_notes', 'download_link', 'current_version');

            if (version_compare($latest_version, $current_version, '>')) {
                update_user_meta(get_current_user_id(), 'theme_update_available', true);
                $counts = array(); // Initialize $counts
                add_filter('update_count', 'theme_update_count', 10, 1);
            }
        }
    }
}

// Funkcija za prikaz metabox-a na dashboardu
function display_theme_update_info()
{
    global $theme_update_data;

    $output = '';

    if ($theme_update_data) {
        $output .= '<p>Theme Version: ' . esc_html($theme_update_data['latest_version']) . '</p>';
        $output .= '<p>Description: ' . esc_html($theme_update_data['release_notes']) . '</p>';

        if (get_user_meta(get_current_user_id(), 'theme_update_available', true)) {
            $output .= '<a href="' . $theme_update_data['download_link'] . '" class="button">Download Update</a>';
        } else {
            $output .= '<p>Your theme is up to date.</p>';
        }
    }

    echo $output;
}

// Funkcija za dinamički prikazivanje broja ažuriranja teme
function theme_update_count($counts)
{
    $theme_update_available = get_user_meta(get_current_user_id(), 'theme_update_available', true);

    if (!isset($counts['themes'])) {
        $counts['themes'] = 0;
    }

    $counts['themes'] += $theme_update_available ? 1 : 0;

    return $counts;
}




function display_theme_update_notification($admin_bar)
{
    global $theme_update_data;

    if ($theme_update_data) {
        $admin_bar->add_node(
            array(
                'id' => 'theme-update-notification',
                'title' => '<span class="ab-icon"></span><span class="ab-label">Theme Update Available</span>',
                'href' => admin_url('update-core.php'),
                'meta' => array(
                    'class' => 'theme-update-notification',
                ),
            )
        );
    }
}


function display_update_notification()
{
    ?>
    <div class="notice notice-warning is-dismissible">
        <p>Nova verzija teme je dostupna! <a href="https://github.com/tominik83/Custom-Theme/releases/latest"
                target="_blank">Ažurirajte sada</a>.</p>
    </div>
    <?php
}





// function require_nav_walker()
// {
//     require_once get_template_directory() . '/inc/custom-nav-walker.php';
// }

// add_action('init', 'require_nav_walker');

require_once get_template_directory() . '/inc/admin/theme_startup.php';
//     require_once get_template_directory() . '/inc/required-plugins.php';