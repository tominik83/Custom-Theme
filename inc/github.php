<?php



        // $github_username = 'tominik83';
        // $github_repo = 'Custom-Theme';

        // $url = "https://api.github.com/repos/$github_username/$github_repo/releases/latest";

        // $headers = array(
        //     'User-Agent: Custom-Theme', // Možete promeniti 'My-App' u naziv vaše aplikacije
        // );

        // $response = wp_safe_remote_request($url, array('headers' => $headers));

        // if (is_wp_error($response)) {
        //     // Greška u dohvatanju podataka
        // } else {
        //     $body = wp_remote_retrieve_body($response);
        //     $data = json_decode($body, true);

        //     if ($data && isset($data['tag_name'])) {
        //         // Ispisivanje informacija o najnovijem release-u
        //         echo 'Update: ' . esc_html($data['tag_name']);
        //         echo 'Ver: ' . esc_html($data['body']);
        //     } else {
        //         echo 'Nema dostupnih informacija o verziji.';
        //     }
        // }

        


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
        $release_notes = esc_html($data['body']);
        
        // Link za download nove verzije
        $download_link = 'https://github.com/tominik83/Custom-Theme/archive/refs/tags/latest.zip';
        
        // Provjeri da li je dostupna nova verzija
        $theme = wp_get_theme();
        $current_version = $theme->get('Version'); // Trenutna verzija teme
        if (version_compare($latest_version, $current_version, '>')) {
            echo 'Najnovija verzija: ' . $latest_version;
            echo 'Verzija: ' . $release_notes;
            echo '<a href="' . $download_link . '" class="download-button">Download</a>';
            echo '<i class="fas fa-download new-version-icon"></i>';
        } 
    } else {
        echo 'Nema dostupnih informacija o verziji.';
    }
}






// $github_username = 'tominik83';
// $github_repo = 'Custom-Theme';

// $url = "https://api.github.com/repos/$github_username/$github_repo/releases/latest";

// $headers = array(
//     'User-Agent: Custom-Theme', // Možete promeniti 'My-App' u naziv vaše aplikacije
// );

// $response = wp_safe_remote_request($url, array('headers' => $headers));

// if (is_wp_error($response)) {
//     // Greška u dohvatanju podataka
// } else {
//     $body = wp_remote_retrieve_body($response);
//     $data = json_decode($body, true);

//     if ($data && isset($data['tag_name'])) {
//         // Ispisivanje informacija o najnovijem release-u
//         echo 'Update: ' . esc_html($data['tag_name']);
//         echo 'Ver: ' . esc_html($data['body']);
//     } else {
//         echo 'Nema dostupnih informacija o verziji.';
//     }
// }