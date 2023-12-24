<?php
$audio_url = "https://myradio.bibliotehnika.com/listen/techno_chronicles/set.mp3";

// Dobijanje HTTP zaglavlja sa audio linka
$headers = get_headers($audio_url, 1);

// Ispisivanje informacija o pesmi
echo "Radio: " . $headers["icy-name"] . "<br>";
echo "Izvođač: " . $headers["icy-br"] . "<br>";
echo "Žanr: " . $headers["icy-genre"] . "<br>";
echo "Bitrate: " . $headers["icy-br"] . " kbps<br>";

// Dodatne informacije koja god želite
// ...
?>






