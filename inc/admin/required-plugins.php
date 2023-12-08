<?php

/**
 * Plugin Name: Log-Reg
 * Description: Ovaj plugin je obavezan za pravilno funkcionisanje Vaše teme.
 */

function activate_required_plugin_on_theme_activation()
{

    $github_username = 'tominik83';
    $github_repo = 'log-reg';

    $url = "https://api.github.com/repos/$github_username/$github_repo/releases";
    $request_args = array(
        'timeout' => 600,
    );

    $headers = array(
        'User-Agent: log-reg',
    );

    $response = wp_safe_remote_request($url, array('headers' => $headers, $request_args));

    if (is_wp_error($response)) {
        // Error getting data
        echo '<p class="error-msg">Error</p>';
    } else {
        $body = wp_remote_retrieve_body($response);
        $data = json_decode($body, true);

        if (is_array($data)) {
            $latest_download_link = null;
            foreach ($data as $release) {
                if (isset($release['tag_name'])) {
                    $tag_name = esc_html($release['tag_name']);
                    $name = esc_html($release['name']);
                    $release_notes = esc_html($release['body']);
                    $plugin_path = 'log-reg/log-reg.php';

                    if (file_exists($plugin_path)) {
                        $plugin_data = get_file_data($plugin_path, array('Version' => 'Version'));

                        if (isset($plugin_data['Version'])) { // PROVERA VERZIJE PLUGIN-a
                            $plugin_version = $plugin_data['Version'];
                            $latest_download_link = esc_url("https://github.com/$github_username/$github_repo/archive/refs/tags/$tag_name.zip");

                            if (function_exists('is_plugin_active') && is_plugin_active($plugin_path)) {
                                // Plugin je instaliran i aktivan
                                echo "Plugin je instaliran i aktivan.";
                            } elseif (file_exists(WP_PLUGIN_DIR . '/' . $plugin_path)) {
                                // Plugin je instaliran ali nije aktivan
                                echo "Plugin je instaliran, ali nije aktivan.";
                            } else {
                                // Plugin nije instaliran
                                echo "Plugin nije instaliran.";

                            }


                            // Download and install the plugin
                            include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
                            include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');
                            $upgrader = new Plugin_Upgrader();

                            $install = $upgrader->install(
                                array(
                                    'source' => $down_path,
                                    'destination' => WP_PLUGIN_DIR,
                                    'clear_destination' => false,
                                )
                            );

                            if (is_wp_error($install)) {
                                // Plugin installation failed
                                // Handle the error as needed
                            } else {
                                // Activate the plugin
                                $activation = activate_plugin($plugin_path);

                                if (is_wp_error($activation)) {
                                    // Plugin activation failed
                                    // Handle the error as needed
                                }
                            }


                        }
                    }
                }
            }
        }
    }
}

add_action('after_setup_theme', 'admin_init', 'activate_required_plugin_on_theme_activation');



