<?php

/*
Template Name: About Us
*/
?>


<?php get_header('secondary'); ?>

<div class="about-container flex">


    <!-- <div style="height:100px" aria-hidden="true" class="div-spacer"></div> -->

    <!-- <p id="client-ip" class="client-ip h4">IP Adress</p> -->
    <!-- <div id="my_radio">
        <audio controls>
            <source src="https://myradio.bibliotehnika.com/listen/techno_chronicles/set.mp3" type="audio/mp3">
            Your browser does not support the audio tag.
        </audio>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var audio = document.querySelector('audio');
                audio.volume = 0.5; // Podešavanje jačine zvuka (0.0 - 1.0)
                // Dodatni JavaScript kod možete dodati prema potrebama.
            });
        </script>


        <div id="audio-info-container"></div>

        <script>
            // Asinkroni poziv PHP skripte
            fetch('/wp-content/themes/custom theme/extensions/get_audio_info.php')
                .then(response => response.text())
                .then(data => {
                    document.getElementById('audio-info-container').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        </script>

    </div> -->

    <?php
    // Output information about the theme update
    theme_versions_available(); // display_theme_update_info();
    ?> 

    













    <!-- <div id="audio-info-container">
        <p id="song-title">Naziv pesme:</p>
        <p id="artist">Izvođač:</p>
        <p id="genre">Žanr:</p>
        <p id="bitrate">Bitrate:</p>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function updateSongInfo() {
            $.ajax({
                url: '/wp-content/themes/custom theme/extensions/get_audio_info.php',
                dataType: 'json',
                success: function (data) {
                    // Ažuriranje HTML-a sa novim informacijama
                    $('#song-title').text('Naziv pesme: ' + data.title);
                    $('#artist').text('Izvođač: ' + data.artist);
                    $('#genre').text('Žanr: ' + data.genre);
                    $('#bitrate').text('Bitrate: ' + data.bitrate + ' kbps');
                },
                error: function (error) {
                    console.error('Greška:', error);
                }
            });
        }

        // Ažuriranje informacija svakih 10 sekundi (prilagodite interval prema potrebi)
        setInterval(updateSongInfo, 10000);

        // Inicijalni poziv kako biste odmah dobili informacije prilikom učitavanja stranice
        updateSongInfo();
    </script> -->
    <?php
    $nodered_shortcode = get_option('nodered_data key="temperature1"', '');
    echo do_shortcode($nodered_shortcode);
    ?>
    [nodered_data key="temperature1"]

    <?php
    $notification_shortcode = get_option('notification_shortcode', '');
    echo do_shortcode($notification_shortcode);
    ?>

        

    <!-- <iframe id="11320747" allowtransparency="true" frameborder="0" style="width:100%;border:none;" src="//www.chess.com/emboard?id=11320747"></iframe><script>window.addEventListener("message",e=>{e['data']&&"11320747"===e['data']['id']&&document.getElementById(`${e['data']['id']}`)&&(document.getElementById(`${e['data']['id']}`).style.height=`${e['data']['frameHeight']+30}px`)});</script> -->

    <!-- <input type="text" onfocus="this.value=''" value="Blabla"> -->


    <!-- <div style="height:100px" aria-hidden="true" class="div-spacer"></div> -->

    <!-- <h1 class="animate__animated animate__bounce">An animated element</h1> -->


    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile;
    else:
    endif; ?>




    <div style="height:100px" aria-hidden="true" class="div-spacer"></div>
</div>



<?php get_footer('secondary'); ?>