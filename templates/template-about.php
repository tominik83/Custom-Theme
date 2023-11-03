<?php

/*
Template Name: About Us
*/
?>


<?php get_header('secondary'); ?>

<div class="about-container flex">

    <?php
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




    <div class="version-info flex">
        <?php
        $theme_version_shortcode = '[theme_version]';
        echo do_shortcode($theme_version_shortcode);
        ?>
    </div>

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