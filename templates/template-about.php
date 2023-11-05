<?php

/*
Template Name: About Us
*/
?>


<?php get_header('secondary'); ?>

<div class="about-container flex">


<div style="height:100px" aria-hidden="true" class="div-spacer"></div>

<button id="show-notification">Prikaži notifikaciju</button>


<!-- <button id="update-button">Check for Updates</button> -->

<form method="post" action="">
    <input type="submit" name="update_theme_button" value="Check for Updates">
</form>
<?php

if (isset($_POST['my_theme_update_available'])) {
    my_theme_update_available(); // Poziva funkciju za ažuriranje i prikazuje rezultat
}
?>


<!-- <div class="notification" id="update-notification">
        Novo ažuriranje je dostupno! <a href="#" id="update-link">Kliknite ovdje</a> za više detalja.
    </div> -->

<!-- <?php

function druga_funkcija() {
    global $latest_version; // Koristimo globalnu promenljivu

    // Sada možemo koristiti $latest_version u ovoj funkciji
    echo 'Trenutna verzija: ' . $latest_version;
    // Možete dodati više koda koji koristi $latest_version prema vašim potrebama
}

// Poziv druge funkcije
druga_funkcija();
?> -->



    <!-- <?php
    $plugin_path = 'log-reg/log-reg.php';
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
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
    ?>

    <?php
    $plugin_path = 'log-reg/log-reg.php';
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');

    if (file_exists($plugin_path)) {
        $plugin_data = get_file_data($plugin_path, array('Version' => 'Version'));
        if (isset($plugin_data['Version'])) {
            $plugin_version = $plugin_data['Version'];
            echo "Verzija plugin-a: " . $plugin_version;
        } else {
            echo "Nije moguće dobiti verziju plugin-a.";
        }
    } else {
        echo "Plugin fajl nije pronađen.";
    }
    ?> -->



    <!-- <div class="version-info flex">
        <?php
        $theme_version_shortcode = '[theme_version]';
        echo do_shortcode($theme_version_shortcode);
        ?>
    </div> -->

    <div style="height:100px" aria-hidden="true" class="div-spacer"></div>

    <h1 class="animate__animated animate__bounce">An animated element</h1>

    <div style="width: 400px; height:100px; background-color: #fff" aria-hidden="true" class="div-spacer"></div>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

    <?php endwhile;
    else : endif; ?>

    <div style="height:100px" aria-hidden="true" class="div-spacer"></div>
</div>



<?php get_footer('secondary'); ?>