<?php

/**
 * Custom Theme functions and definitions
 *
 * @link https://dev.bibliotehnika.tk/themes/basics/theme-functions/
 *
 * @package Wordpress
 * @subpackage Custom Theme
 * @since Custom Theme 1.0
 */




// 


// error_reporting(E_ALL);



function theme_settings_page()
{
    add_menu_page(
        'theme-panel',
        'Custom Theme',
        'manage_options',
        'theme-panel',
        'theme_option_form'
    );


    add_submenu_page(
        'theme-panel',
        'Style',
        'Style',
        'manage_options',
        'theme-panel-style',
        'theme_submenu_style'
    );
    add_submenu_page(
        'theme-panel',
        'Settings',
        'Settings',
        'manage_options',
        'theme-panel-settings',
        'theme_submenu_settings'
    );
    add_submenu_page(
        'theme-panel',
        'Theme Update',
        'Theme Update',
        'manage_options',
        'theme-update',
        'theme_update_version_admin_page'
    );
}
add_action('admin_menu', 'theme_settings_page');

function theme_option_form()
{

    require get_template_directory() . '/inc/admin/admin_panel.php';

}

// function theme_settings_init()
// {
//     register_setting('theme-panel-group', 'notification_shortcode');
//     register_setting('theme-panel-group', 'shortcode_location');
// }
// add_action('admin_init', 'theme_settings_init');

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
            if ($item->title == 'Login') {
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
        if (!is_front_page() && !is_page('radio')) {
            // Proveri da li korisnik nije prijavljen i nije na stranici "get-in"
            if (!is_user_logged_in() && !is_page('login')) {
                // Ako nije prijavljen i nije na stranici "get-in", preusmeri ga na početnu stranicu
                wp_redirect(home_url('/login'));
                exit;
            }
        }

    }
}

add_action('template_redirect', 'ogranicenje_pristupa_stranicama');


// define('MY_THEME_DEFAULT_IMAGE_DIR', get_template_directory_uri() . '/inc/img');

// // Funkcija koja koristi podrazumevani direktorijum za slike
// function my_theme_get_default_image_url($image_name) {
//     return MY_THEME_DEFAULT_IMAGE_DIR . '/' . $image_name;
// }


// Dodajte akciju za provjeru ažuriranja prilikom inicijalizacije admin dijela
// add_action('admin_init', 'theme_update_version_down');


// function theme_versions_available()
// {
//     $github_username = 'tominik83';
//     $github_repo = 'Custom-Theme';
//     $server_url = "http://dev.bibliotehnika.tk.test/wp-json/themes/releases/data/";
//     $headers = array(
//         'User-Agent: Custom-Theme',
//         // 'Authorization: Bearer ' . $token,
//     );

//     $request_args = array(
//         'timeout' => 60,
//     );
//     $response = wp_safe_remote_request($server_url, array('headers' => $headers) + $request_args); // Combine headers and request_args

//     if (is_wp_error($response)) {
//         // Error getting data
//         echo '<p class="error-msg">Error</p>';
//     } else {
//         $body = wp_remote_retrieve_body($response);
//         $data = json_decode($body, true);

//         if (is_array($data)) {
//             $latest_download_link = null;
//             foreach ($data as $release) {
//                 if (isset($release['tag_name'])) {
//                     $tag_name = esc_html($release['tag_name']);
//                     $name = esc_html($release['name']);
//                     $release_notes = esc_html($release['body']);
//                     $latest_download_link = esc_url("https://github.com/$github_username/$github_repo/archive/refs/tags/$tag_name.zip");
//                     $theme = wp_get_theme();
//                     $current_version = $theme->get('Version'); // Trenutna verzija teme
//                     $theme_update_data = compact('tag_name', 'release_notes', 'latest_download_link', 'current_version');

//                     if (version_compare($current_version, $tag_name, '<')) {

//                         $output = '';

//                         if ($theme_update_data) {
//                             $output .= '<p>Theme Version: ' . esc_html($theme_update_data['tag_name']) . '</p>';
//                             $output .= '<p>Description: ' . esc_html($theme_update_data['release_notes']) . '</p>';
//                             $output .= '<a href="' . $theme_update_data['latest_download_link'] . '" class="button">Download</a>';
//                             echo $output;

//                         } else {

//                                 $output .= '<p>Your theme is up to date.</p>';

//                         }
//                     }                    
//                 }
//             }
//         }
//     }
// }

function fetch_theme_data($server_url, $headers, $request_args)
{
    $response = wp_safe_remote_request($server_url, array('headers' => $headers) + $request_args);

    if (is_wp_error($response)) {
        // Error getting data
        echo '<p class="error-msg">API Error</p>';
        return null;
    } else {
        $body = wp_remote_retrieve_body($response);
        return json_decode($body, true);
    }
}

function save_theme_data_locally($local_json_file, $body)
{
    file_put_contents($local_json_file, $body);
}

function theme_versions_available()
{
    $server_url = "http://bibliotehnika.com.test/wp-json/themes/releases/data";
    // $server_url = "https://bibliotehnika.com/wp-json/themes/releases/data";
    $local_json_file = get_template_directory() . '/update/theme_release_data.json';

    $headers = array(
        'User-Agent: Custom-Theme',
    );

    $request_args = array(
        'timeout' => 10,
    );

    // Fetch data from the server
    $data = fetch_theme_data($server_url, $headers, $request_args);

    if ($data !== null) {
        // Save fetched data to local JSON file for future use
        save_theme_data_locally($local_json_file, json_encode($data));
        check_for_updates($data);
    }
}

function check_for_updates($data)
{
    if (is_array($data)) {
        $latest_download_link = null;
        $theme = wp_get_theme();
        $current_version = $theme->get('Version');

        foreach ($data as $release) {
            if (isset($release['tag_name'])) {
                $github_username = 'tominik83';
                $github_repo = 'Custom-Theme';
                $tag_name = esc_html($release['tag_name']);
                $name = esc_html($release['name']);
                $release_notes = esc_html($release['body']);
                $published = esc_html($release['published_at']);
                $latest_download_link = esc_url("https://github.com/$github_username/$github_repo/archive/refs/tags/$tag_name.zip");

                $theme_update_data = compact('tag_name', 'release_notes', 'published', 'latest_download_link', 'current_version');

                if (version_compare($current_version, $tag_name, '<')) {
                    theme_update_info($theme_update_data);
                }
            }
        }
    }
}

function theme_update_info($theme_update_data)
{
    $output = '<div id="update-result_info" style="display: flex; flex-direction: column; justify-content: centar; align-items: centar;">';
    $output .= '<p>Theme Version: ' . esc_html($theme_update_data['tag_name']) . '</p>';
    $output .= '<p>Description: ' . esc_html($theme_update_data['release_notes']) . '</p>';
    $output .= '<p>Published: ' . date('d.m.Y', strtotime($theme_update_data['published'])) . '</p>';
    $output .= '<a href="' . $theme_update_data['latest_download_link'] . '" class="download-button" download="Custom-Theme">Download</a>';
    $output .= '</div>';

    echo $output;
}






// function theme_versions_available()
// {
//     $github_username = 'tominik83';
//     $github_repo = 'Custom-Theme';
//     // $token = "";
//     // $server_url = "http://api.bibliotehnika.tk/wp-json/themes/custom-theme/releases/data/";
//     $server_url = "http://dev.bibliotehnika.tk.test/wp-json/themes/releases/data/";
//     $local_json_file = get_template_directory() . '/update/theme_release_data.json';

//     // Check if local JSON file exists
//     // if (file_exists($local_json_file)) {
//     //     $body = file_get_contents($local_json_file);
//     //     $data = json_decode($body, true);
//     // } else {
//     // Fetch data from the server if the local file doesn't exist
//     $headers = array(
//         'User-Agent: Custom-Theme',
//         // 'Authorization: Bearer ' . $token,
//     );

//     $request_args = array(
//         'timeout' => 10,
//     );
//     $response = wp_safe_remote_request($server_url, array('headers' => $headers) + $request_args);

//     if (is_wp_error($response)) {
//         // Error getting data
//         echo '<p class="error-msg">Error</p>';
//         return;
//     } else {
//         $body = wp_remote_retrieve_body($response);
//         $data = json_decode($body, true);

//         // Save fetched data to local JSON file for future use
//         file_put_contents($local_json_file, $body);
//     }
//     // }

//     if (is_array($data)) {
//         $latest_download_link = null;
//         $theme = wp_get_theme();
//         $current_version = $theme->get('Version');

//         foreach ($data as $release) {
//             if (isset($release['tag_name'])) {
//                 $tag_name = esc_html($release['tag_name']);
//                 $name = esc_html($release['name']);
//                 $release_notes = esc_html($release['body']);
//                 $published = esc_html($release['published_at']);
//                 $latest_download_link = esc_url("https://github.com/$github_username/$github_repo/archive/refs/tags/$tag_name.zip");

//                 $theme_update_data = compact('tag_name', 'release_notes', 'published', 'latest_download_link', 'current_version');

//                 if (version_compare($current_version, $tag_name, '<')) {
//                     $output = '';

//                     if ($theme_update_data) {
//                         $output .= '<p>Theme Version: ' . esc_html($theme_update_data['tag_name']) . '</p>';
//                         $output .= '<p>Description: ' . esc_html($theme_update_data['release_notes']) . '</p>';
//                         // $output .= '<p>Published: ' . date('d.m.Y H:i:s', strtotime($theme_update_data['published'])) . '</p>';
//                         $output .= '<p>Published: ' . date('d.m.Y', strtotime($theme_update_data['published'])) . '</p>';

//                         $output .= '<a href="' . $theme_update_data['latest_download_link'] . '" class="button" download="Custom-Theme">Download</a>';

//                         echo $output;
//                     } else {
//                         $output .= '<p>Your theme is up to date.</p>';
//                     }
//                 }
//             }
//         }
//     }
// }

// function custom_theme_download_filename($filename, $file, $attachment_id)
// {
//     // Provjerite je li datoteka preuzeta povezana s određenom temom
//     if (strpos($file, 'theme-update') !== false) {
//         // Postavite željeno ime datoteke
//         $filename = 'Custom-Theme.zip';
//     }

//     return $filename;
// }
// add_filter('wp_get_attachment_filename', 'custom_theme_download_filename', 10, 3);



// function theme_versions_available()
// {
//     $github_username = 'tominik83';
//     $github_repo = 'Custom-Theme';
//     $server_url = "http://dev.bibliotehnika.tk.test/wp-json/themes/releases/data/";
//     $headers = array(
//         'User-Agent: Custom-Theme',
//         // 'Authorization: Bearer ' . $token,
//     );

//     $request_args = array(
//         'timeout' => 60,
//     );
//     $response = wp_safe_remote_request($server_url, array('headers' => $headers) + $request_args); // Combine headers and request_args

//     if (is_wp_error($response)) {
//         // Error getting data
//         echo '<p class="error-msg">Error</p>';
//     } else {
//         $body = wp_remote_retrieve_body($response);
//         $data = json_decode($body, true);

//         if (is_array($data)) {
//             $latest_download_link = null;
//             foreach ($data as $release) {
//                 if (isset($release['tag_name'])) {
//                     $tag_name = esc_html($release['tag_name']);
//                     $name = esc_html($release['name']);
//                     $release_notes = esc_html($release['body']);
//                     $latest_download_link = esc_url("https://github.com/$github_username/$github_repo/archive/refs/tags/$tag_name.zip");
//                     $theme = wp_get_theme();
//                     $current_version = $theme->get('Version'); // Trenutna verzija teme
//                     // $theme_update_data = compact('tag_name', 'release_notes', 'latest_download_link', 'current_version');

//                     if (version_compare($tag_name, $current_version, '>')) {
//                         echo '<div id="update-info">';
//                         echo '<p class="update-available"> Update Available: ' . esc_html($tag_name) . '</p>';
//                         echo '<p class="update-available"> Name: ' . esc_html($name) . '</p>';
//                         echo '<p class="update-available"> Description: ' . esc_html($release_notes) . '</p>';
//                         echo '<a href="' . $latest_download_link . '" class="download-button">Download</a>';
//                         echo '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAW1JREFUSEutlttZwzAMRo82KZuQTcokZZN2E7IJMIn5fEki2VKcB/KStrZ1+S9yhf0RIB1f3U+CkKa7ytEWLr+cR63OcvbRtv1hAh17aEr/4Hx2QDAdHOsDFG4fAnLeoCA+8jpB2ZE2TDvO8sZT6lQH0c6WICbrYLTt6cG7oqOGxIB7KzAurkI0V6gD9X5y6E3HDGRqz0gmwVeIQ7KVoeGgmKiuP4DPE4cMXEN6AR893mcdPBHuvW379ltBK7BswUOItA+a9r5BbpMRUoJHnpxxcAO+gPz2xtYP8GYGTyeHCz4owcckkINnzNc9QTDV4mF3rLwjPEkaLlkgrdXJ8YwaZ1Hsiaysu8AtCQtJ1ogbM9PmRjPVPSD9IrziS8FWWDtoWZQPZjOsHDoun+giCqfpFVqiy087udbeP8lWpzUSkWnGqOXV4fTSJdlDpAgfhLOn15j+1x+AK0arBThy8y0QqigmTavLH/7WyzrFH7dQmx8CV/g9AAAAAElFTkSuQmCC"/>';
//                         echo '</div>';
//                     }
//                 }
//             }
//         }
//     }
// }

// add_action('admin_init', 'theme_versions_available');


// Funkcija za provjeru ažuriranja
// function theme_update_version_down()
// {
//     $github_username = 'tominik83';
//     $github_repo = 'Custom-Theme';
//     $url = "https://api.github.com/repos/$github_username/$github_repo/releases/latest";

//     // Replace 'YOUR_GITHUB_TOKEN' with your actual GitHub token
//     $token = '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';

//     $headers = array(
//         'User-Agent: Custom-Theme',
//         'Authorization: Bearer ' . $token,
//     );

//     $request_args = array(
//         'timeout' => 60,
//     );

//     $response = wp_safe_remote_request($url, array('headers' => $headers) + $request_args);

//     if (is_wp_error($response)) {
//         echo '<p class="error-msg">Error</p>';
//     } else {
//         $body = wp_remote_retrieve_body($response);
//         $data = json_decode($body, true);

//         if ($data && isset($data['tag_name'])) {
//             $latest_version = esc_html($data['tag_name']);
//             $release_notes = esc_html($data['body']);
//             $download_link = "https://github.com/$github_username/$github_repo/archive/refs/tags/$latest_version.zip";

//             $theme = wp_get_theme();
//             $current_version = $theme->get('Version');

//             add_meta_box(
//                 'theme_update_metabox',
//                 'Theme Update Information',
//                 'display_theme_update_info',
//                 'dashboard',
//                 'normal',
//                 'high'
//             );

//             global $theme_update_data;
//             $theme_update_data = compact('latest_version', 'release_notes', 'download_link', 'current_version');

//             if (version_compare($latest_version, $current_version, '>')) {
//                 update_user_meta(get_current_user_id(), 'theme_update_available', true);
//                 $counts = array(); // Initialize $counts
//                 // add_filter('update_count', 'theme_update_count', 10, 1);
//             }
//         }
//     }
// }

// Funkcija za prikaz metabox-a na dashboardu
// function display_theme_update_info()
// {
//     global $theme_update_data;

//     $output = '';

//     if ($theme_update_data) {
//         $output .= '<p>Theme Version: ' . esc_html($theme_update_data['latest_version']) . '</p>';
//         $output .= '<p>Description: ' . esc_html($theme_update_data['release_notes']) . '</p>';

//         if (get_user_meta(get_current_user_id(), 'theme_update_available', true)) {
//             $output .= '<a href="' . $theme_update_data['download_link'] . '" class="button">Download Update</a>';
//         } else {
//             $output .= '<p>Your theme is up to date.</p>';
//         }
//     }

//     echo $output;
// }

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