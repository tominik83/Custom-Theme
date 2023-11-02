<?php

$github_username = 'tominik83';
$github_repo = 'custom-theme';

$url = "https://api.github.com/repos/$github_username/$github_repo/releases/latest";
$response = wp_safe_remote_get($url);

if (is_wp_error($response)) {
    // Greška u dohvatanju podataka
} else {
    $data = json_decode(wp_remote_retrieve_body($response), true);

    // Ispisivanje informacija o najnovijem release-u
    echo 'Najnovija verzija: ' . $data['tag_name'];
    echo 'Opis: ' . $data['body'];
}

?>