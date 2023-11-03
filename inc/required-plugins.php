<?php

/**
 * Plugin Name: Custom Theme - Log-Reg
 * Description: Ovaj plugin je obavezan za pravilno funkcionisanje Vaše teme.
 */

// function activate_required_plugin() {
//     $plugin_path = 'https://github.com/tominik83/WordPress-Plugins/blob/main/archive/log-reg.zip';
//     $plugin_name = 'log-reg/log-reg.php';

//     // Proverite da li je plugin instaliran i aktiviran
//     if (!is_plugin_active($plugin_name)) {
//         // Ako nije, pokušajte ga instalirati i aktivirati
//         $plugin = get_plugins();
//         if (empty($plugin[$plugin_name])) {
//             require_once ABSPATH . 'wp-admin/includes/file.php';
//             WP_Filesystem();
//             $result = unzip_file($plugin_path, WP_PLUGIN_DIR);
//             if (!is_wp_error($result)) {
//                 activate_plugin($plugin_name);
//             }
//         }
//     }
// }
// add_action('after_switch_theme', 'admin_init', 'activate_required_plugin');


function activate_required_plugin_on_theme_activation()
{
    $plugin_name = 'log-reg/log-reg.php'; // Adjust this to your plugin's details
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    $plugin = get_plugins();

    if (function_exists('is_plugin_active') && is_plugin_active($plugin_path)) {
        // Plugin je instaliran i aktivan
        echo "Plugin je instaliran i aktivan.";
    } elseif (file_exists(WP_PLUGIN_DIR . '/' . $plugin_path)) {
        // Plugin je instaliran ali nije aktivan
        echo "Plugin je instaliran, ali nije aktivan.";
    } else {
        // Plugin nije instaliran
        echo "Plugin nije instaliran.";

        $plugin_path = 'https://github.com/tominik83/log-reg/archive/refs/tags/1.0.0.1.zip'; // Adjust the URL

        // Download and install the plugin
        include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
        include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
        $upgrader = new Plugin_Upgrader();

        $install = $upgrader->install(array(
            'source' => $plugin_path,
            'destination' => WP_PLUGIN_DIR,
            'clear_destination' => false,
        ));

        if (is_wp_error($install)) {
            // Plugin installation failed
            // Handle the error as needed
        } else {
            // Activate the plugin
            $activation = activate_plugin($plugin_name);

            if (is_wp_error($activation)) {
                // Plugin activation failed
                // Handle the error as needed
            }
        }
    }
}

add_action('after_setup_theme', 'admin_init', 'activate_required_plugin_on_theme_activation');
