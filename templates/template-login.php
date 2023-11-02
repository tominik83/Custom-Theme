<?php

/*
Template Name: Login
*/
?>

<?php get_header(); ?>

<div class="login-container flex">

    <div style="height:100px" aria-hidden="true" class=" div-spacer "></div>

    <?php
    // Provera da li je plugin instaliran
    include_once(ABSPATH.'wp-admin/includes/plugin.php');
    if (!function_exists('is_plugin_active') || !is_plugin_active('wp-content/plugins/log-reg/log-reg.php')) { 
    //    return;
    
        // Plugin je instaliran i aktivan, možete dodati kod za obradu
        $log_reg_shortcode = '[log-reg-form]';
        echo do_shortcode($log_reg_shortcode);
    } else {
        // Plugin nije instaliran ili nije aktivan, možete dodati odgovarajuće obaveštenje ili akciju
        echo "Plugin nije instaliran ili nije aktivan.";
    }
    ?>

    <?php if (!function_exists('is_plugin_active') || !is_plugin_active('wp-content/plugins/log-reg/log-reg.php')) : ?>
        <!-- Ovde možete dodati dodatni sadržaj ako je plugin instaliran -->
    <?php else : ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile;
        else : endif; ?>
    <?php endif; ?>

    <div style="height:100px" aria-hidden="true" class=" div-spacer "></div>

</div>

<?php get_footer(); ?>
