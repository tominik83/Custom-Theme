<?php

/*
Template Name: About Us
*/
?>


<?php get_header('secondary'); ?>

<div class="about-container flex">


    <div style="height:100px" aria-hidden="true" class="div-spacer"></div>

    <p id="client-ip" class="client-ip">IP adress</p>

    <?php 
    $theme_version_down_shortcode = '[theme_version]';
    echo do_shortcode($theme_version_down_shortcode);
    
    ?>

    <!-- <?php
    $plugin_version_shortcode = '[update-msg]';
    echo do_shortcode($plugin_version_shortcode);
    ?> -->

    <!-- <?php
    theme_update_check_show();
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
    ?> -->

    <!-- <?php
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


    <div style="height:100px" aria-hidden="true" class="div-spacer"></div>

    <h1 class="animate__animated animate__bounce">An animated element</h1>


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