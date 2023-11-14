<?php

/*
Template Name: Custom Page
*/
?>


<?php get_header(); ?>

<div class="page-container flex">


    <!-- <div class="container">
        <div class="sphere" id="sphere">
            <?php
            for ($i = 1; $i <= 10; $i++) {
                echo "<div class='field' id='field$i'>$i</div>";
            }
            ?>
        </div>
    </div> -->



    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile;
    else:
    endif; ?>

    <div style="height:100px" aria-hidden="true" class="div-spacer"></div>

</div>



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



<?php get_footer(); ?>