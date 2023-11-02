

<!-- <img src="wp-content/themes/customtheme/assets/img/background2.jpg" class="parallax background-img"> -->
<div style="height:100px"></div>
<div class="text parallax">
    <h2>Dobro Dosli</h2>
    <h1>Zanimljivo</h1>
</div>



<?php

$github_username = 'tominik83';
$github_repo = 'Custom Theme';

$url = "https://api.github.com/repos/$github_username/$github_repo/releases/latest";

$headers = array(
    'User-Agent: Custom Theme', // Možete promeniti 'My-App' u naziv vaše aplikacije
);

$response = wp_safe_remote_request($url, array('headers' => $headers));

if (is_wp_error($response)) {
    // Greška u dohvatanju podataka
} else {
    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body, true);

    if ($data && isset($data['tag_name'])) {
        // Ispisivanje informacija o najnovijem release-u
        echo 'Najnovija verzija: ' . esc_html($data['tag_name']);
        echo 'Opis: ' . esc_html($data['body']);
    } else {
        echo 'Nema dostupnih informacija o verziji.';
    }
}

?>


