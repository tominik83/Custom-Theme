// function theme_update_version_down()
// {
//     // Provjera da li je korisnik prijavljen i ima određenu ulogu
//     // if (is_user_logged_in() && (current_user_can('subscriber') || current_user_can('editor'))) {
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
//         echo '<p class="error-msg">Error</p>';
//     } else {
//         $body = wp_remote_retrieve_body($response);
//         $data = json_decode($body, true);

//         if ($data && isset($data['tag_name'])) {
//             // Informacije o novom izdanju
//             $latest_version = esc_html($data['tag_name']);
//             $release_notes = esc_html($data['body']);

//             // Download link za najnovije izdanje
//             $download_link = "https://github.com/$github_username/$github_repo/archive/refs/tags/$latest_version.zip";

//             // Provjera ažuriranja
//             $theme = wp_get_theme();
//             $current_version = $theme->get('Version');
//             if (version_compare($latest_version, $current_version, '>')) {
//                 // echo '<p class="update-available"> Update Available: ' . esc_html($latest_version) . '</p>';
//                 // echo '<p class="describe">Description: ' . esc_html($release_notes) . '</p>';
//                 echo '<a href="' . $download_link . '" class="download-button"><span class="download-icon">⬇️</span>Download</a>';
//                 echo 'Theme Version: ' . $latest_version;
//             }
//             // else {
//             //     echo '<p class="update-available">Up to date</p>';
//             // }
//         }
//     }
//     // } 
//     // else {
//     //     // Korisnik nije prijavljen ili nema odgovarajuću ulogu
//     //     echo '<p class="error-msg">You must be logged in with the appropriate role to view this information.</p>';
//     // }
// }




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