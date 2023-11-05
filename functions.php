<?php

// error_reporting(E_ALL);

function theme_settings_page()
{
    add_menu_page('Theme Settings', 'Theme Settings', 'manage_options', 'theme-settings', 'theme_settings_form');
    add_submenu_page('theme-settings', 'Submenu Page 1', 'Submenu Page 1', 'manage_options', 'theme-settings-submenu-1', 'theme_submenu_page_1');
    add_submenu_page('theme-settings', 'Settings', 'Settings', 'manage_options', 'theme-settings-settings', 'theme_submenu_page_2');
}
add_action('admin_menu', 'theme_settings_page');

function theme_settings_form()
{
?>
    <div class="wrap">
        <h2>Theme Settings</h2>
        <form method="post" action="options.php">
            <?php settings_fields('theme-settings-group'); ?>
            <?php do_settings_sections('theme-settings-group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Notification Header</th>
                    <td>
                        <input type="text" name="notification_shortcode" value="<?php echo esc_attr(get_option('notification_shortcode')); ?>" />
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

function theme_submenu_page_1() {
    // Kod za sadržaj prve podstranice
    echo '<div class="wrap flex">
    <h2>Submenu Page 1</h2><p>Sadržaj prve podstranice ovde.</p></div>';
}

function theme_submenu_page_2()
{
admin_panel();
}

function admin_panel()
{
    require_once get_template_directory() . '/inc/admin/admin_panel.php';
}

// add_action('init', 'admin_panel');

function add_theme_settings_link($links)
{
    $settings_link = '<a href="admin.php?page=theme-settings">Theme Settings</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'add_theme_settings_link');


//Funkcija za Plugin Version check
function plugin_update_version()
{

    $github_username = 'tominik83';
    $github_repo = 'log-reg';

    $url = "https://api.github.com/repos/$github_username/$github_repo/releases";
    $request_args = array(
        'timeout' => 600, // Postavite timeout na 10 sekundi (možete prilagoditi vreme prema svojim potrebama)
    );

    $headers = array(
        'User-Agent: log-reg', // Možete promeniti 'My-App' u naziv vaše aplikacije
    );

    $response = wp_safe_remote_request($url, $request_args, array('headers' => $headers));

    if (is_wp_error($response)) {
        // Error getting data
        echo '<p class="error-msg">Error</p>';
    } else {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (is_array($data)) {
            foreach ($data as $release) {
                if (isset($release['tag_name'])) {
                    $tag_name = esc_html($release['tag_name']);
                    $name = esc_html($release['name']);
                    $release_notes = esc_html($release['body']);
                    $plugin_path = 'wp-content/plugins/log-reg/log-reg.php';

                    if (file_exists($plugin_path)) {
                        $plugin_data = get_file_data($plugin_path, array('Version' => 'Version'));

                        if (isset($plugin_data['Version'])) {   // PROVERA VERZIJE PLUGIN-a
                            $plugin_version = $plugin_data['Version'];
                            // echo '<p class="update-available"> Plugin Ver: ' . esc_html($plugin_version) . '</p>';
                            $download_link = "https://github.com/$github_username/$github_repo/archive/refs/tags/$tag_name.zip";
                            if (version_compare($tag_name, $plugin_version, '>')) {
                                echo '<p class="update-available"> Update Available: ' . esc_html($tag_name) . '</p>';
                                echo '<p class="update-available"> Name: ' . esc_html($name) . '</p>';
                                echo '<p class="update-available"> Description: ' . esc_html($release_notes) . '</p>';
                                echo '<a href="' . $download_link . '" class="download-button">Download</a>';
                                echo '<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAW1JREFUSEutlttZwzAMRo82KZuQTcokZZN2E7IJMIn5fEki2VKcB/KStrZ1+S9yhf0RIB1f3U+CkKa7ytEWLr+cR63OcvbRtv1hAh17aEr/4Hx2QDAdHOsDFG4fAnLeoCA+8jpB2ZE2TDvO8sZT6lQH0c6WICbrYLTt6cG7oqOGxIB7KzAurkI0V6gD9X5y6E3HDGRqz0gmwVeIQ7KVoeGgmKiuP4DPE4cMXEN6AR893mcdPBHuvW379ltBK7BswUOItA+a9r5BbpMRUoJHnpxxcAO+gPz2xtYP8GYGTyeHCz4owcckkINnzNc9QTDV4mF3rLwjPEkaLlkgrdXJ8YwaZ1Hsiaysu8AtCQtJ1ogbM9PmRjPVPSD9IrziS8FWWDtoWZQPZjOsHDoun+giCqfpFVqiy087udbeP8lWpzUSkWnGqOXV4fTSJdlDpAgfhLOn15j+1x+AK0arBThy8y0QqigmTavLH/7WyzrFH7dQmx8CV/g9AAAAAElFTkSuQmCC"/>';
                            }
                        }
                    }
                }
            }
        } else {
            echo '<p class="update-available animate__animated animate__bounce"> Nema dostupnih informacija o verziji </p>';
        }
    }
}



function theme_update_version()
{
    
    $github_username = 'tominik83';
    $github_repo = 'Custom-Theme';

    $url = "https://api.github.com/repos/$github_username/$github_repo/releases/latest";

    $headers = array(
        'User-Agent: Custom-Theme', // Name for aplication repository
    );

    $response = wp_safe_remote_request($url, array('headers' => $headers));

    if (is_wp_error($response)) {
        // Error getting data
        echo '<p class="error-msg">Error</p>';
    } else {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if ($data && isset($data['tag_name'])) {
            // Information of new release
            $latest_version = esc_html($data['tag_name']);
            // $version_with_ver = 'ver=' . $latest_version;
            $release_notes = esc_html($data['body']);
            // echo 'Ver: ' . esc_html($data['body']);

            // Download link for latest
            $download_link = 'https://github.com/tominik83/Custom-Theme/archive/refs/tags/latest.zip';

            // Check if Update
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
            echo 'Up to date';
        }
    }
}

// add_shortcode('theme_version', 'theme_update_version');
// add_action('after_setup_theme', 'update_version');


function my_theme_update_available() {
        
        global $latest_version; // Definiramo globalnu promenljivu za čuvanje $latest_version

        $github_username = 'tominik83';
        $github_repo = 'Custom-Theme';
    
        $url = "https://api.github.com/repos/$github_username/$github_repo/releases/latest";
    
        $headers = array(
            'User-Agent: Custom-Theme', // Naziv aplikacije ili repozitorijuma
        );
    
        $response = wp_safe_remote_request($url, array('headers' => $headers));
    
        if (is_wp_error($response)) {
            // Greška pri dobijanju podataka
            echo '<p class="error-msg">Greška</p>';
        } else {
            $body = wp_remote_retrieve_body($response);
            $data = json_decode($body, true);
    
            if ($data && isset($data['tag_name'])) {
                $latest_version = esc_html($data['tag_name']);
                // Spremi $latest_version u globalnu promenljivu
                
                // echo '<p class="update-available"> Update Available: ' . esc_html($latest_version) . '</p>';
            }
        }
    }
    




function my_theme_support()
{

    // Dodaje dinamicno ime stranice
    add_theme_support('tittle-tag');
    add_theme_support('custom-logo', array(
        'height'      => 40, // Visina loga (promenite prema svojim potrebama)
        'width'       => 40, // Širina loga (promenite prema svojim potrebama)
        // 'flex-height' => true,
    ));

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

// function my_theme_menus()
// {
//     // Menu Support
//     add_theme_support('menus');

//     register_nav_menus(
//         array(
//             'header-menu' => 'Header Menu Location',
//             'footer-menu' => 'Footer Menu Location',
//             'mobile-menu' => 'Mobile Menu Location',
//         )
//     );
// }

// add_action('init', 'my_theme_menus');



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
