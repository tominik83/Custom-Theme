<?php

/*
Template Name: Login
*/
?>

<?php get_header(); ?>

<div class="login-container flex">

    <!-- <div style="height:100px" aria-hidden="true" class=" div-spacer "></div> -->
    
    <?php
    // Provera da li je plugin instaliran
    $plugin_path = 'log-reg/log-reg.php';
    include_once(ABSPATH.'wp-admin/includes/plugin.php');
    if (function_exists('is_plugin_active') && is_plugin_active($plugin_path)) : ?>
    <?php 
        // Plugin je instaliran i aktivan, možete dodati kod za obradu
        $log_reg_shortcode = '[log-reg-form]';
        // $log_reg_update = '[log-reg-update]';
        echo do_shortcode($log_reg_shortcode);
        // echo do_shortcode($log_reg_update);
        ?>
    <?php else : ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile;
        else : endif; ?>
    <?php endif; ?>


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



    <!-- <div style="height:100px" aria-hidden="true" class=" div-spacer "></div> -->

</div>

<?php get_footer(); ?>
