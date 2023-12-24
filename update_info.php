<?php
// Simulacija novih podataka (zamijenite ovaj deo sa stvarnim kodom za dobavljanje podataka sa servera)
$newData = array(
    'currentSong' => 'Nova pesma',
    'bitrate' => '128 kbps',
    'streamTitle' => 'Novi naslov',
    'currentListeners' => '100'
);

// Pretvaranje asocijativnog niza u JSON format
echo json_encode($newData);
?>
