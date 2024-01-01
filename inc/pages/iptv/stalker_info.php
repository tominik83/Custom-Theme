<?php
// Primer koda za dohvatanje informacija o streamu putem Stalker API-ja
$stalkerApiUrl = 'https://stalker-api.com/stream_info';
$streamId = 'your_stream_id';
$apiKey = 'your_api_key';

// Slanje HTTP zahteva ka API-ju
$response = file_get_contents("$stalkerApiUrl?stream_id=$streamId&api_key=$apiKey");

// Obrada odgovora
if ($response) {
    $streamInfo = json_decode($response, true);
    if ($streamInfo['success']) {
        $streamUrl = $streamInfo['stream_url'];
        // Prikazivanje streama unutar HTML5 video plejera
        echo "<video controls>
                <source src='$streamUrl' type='video/mp4'>
              </video>";
    } else {
        echo "Greška prilikom dohvatanja informacija o streamu.";
    }
} else {
    echo "Greška prilikom slanja HTTP zahteva.";
}
?>
