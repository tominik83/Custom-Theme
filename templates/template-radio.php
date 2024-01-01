<?php
/*
Template Name: Radio
*/
?>

<?php get_header('myradio'); ?>


<div class="radio-container flex">

    <?php
    // Provera da li je plugin instaliran
    $plugin_path = 'btweb-player/btweb-player.php';
    include_once(ABSPATH . 'wp-admin/includes/plugin.php');
    if (function_exists('is_plugin_active') && is_plugin_active($plugin_path)): ?>
        <?php
        // Plugin je instaliran i aktivan, možete dodati kod za obradu
        $btweb_player_shortcode = '[btwp-form]';
        // $log_reg_update = '[log-reg-update]';
        echo do_shortcode($btweb_player_shortcode);
        // echo do_shortcode($log_reg_update);
        ?>
    <?php else: ?>


        <?php

        if (empty(get_post()->post_content)) {
            $plugin_path = 'btweb-player/btweb-player.php';
            include_once(ABSPATH . 'wp-admin/includes/plugin.php');
            if (function_exists('is_plugin_active') && is_plugin_active($plugin_path)) {
                // Plugin je instaliran i aktivan
                echo "The plugin is installed and active.";
            } elseif (file_exists(WP_PLUGIN_DIR . '/' . $plugin_path)) {
                // Plugin je instaliran ali nije aktivan
                echo "The plugin is installed but not active.";
            } else {
                // Plugin nije instaliran
                echo "The plugin is not installed.";
            }
        }
        ?>
        <div class="wp_page-post">

            <?php if (have_posts()):
                while (have_posts()):
                    the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile;
            else:
            endif; ?>
        </div>
    <?php endif; ?>



</div>

