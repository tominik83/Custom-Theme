<div class="version_element">

<?php
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

?>


</div>



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
//         $latest_version = esc_html($data['tag_name']);
//         $release_notes = esc_html($data['body']);
        
//         // Link za download nove verzije
//         $download_link = 'https://github.com/tominik83/Custom-Theme/archive/refs/tags/latest.zip';
        
//         // Provjeri da li je dostupna nova verzija
//         $theme = wp_get_theme();
//         $current_version = $theme->get('Version'); // Trenutna verzija teme
//         if (version_compare($latest_version, $current_version, '>')) {
//             echo 'Najnovija verzija: ' . $latest_version;
//             echo 'Verzija: ' . $release_notes;
//             echo '<a href="' . $download_link . '" class="download-button">Download</a>';
//             echo '<i class="fas fa-download new-version-icon"></i>';
//         } 
//     } else {
//         echo 'Nema dostupnih informacija o verziji.';
//     }
// }






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