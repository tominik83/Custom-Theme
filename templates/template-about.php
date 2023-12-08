<?php

/*
Template Name: About Us
*/
?>


<?php get_header('secondary'); ?>

<div class="about-container flex">


    <!-- <div style="height:100px" aria-hidden="true" class="div-spacer"></div> -->

    <p id="client-ip" class="client-ip h4">IP Adress</p>

    <?php
    display_theme_update_info()

        ?>

    <?php
    $notification_shortcode = get_option('notification_shortcode', '');
    echo do_shortcode($notification_shortcode);
    ?>


    <!-- <input type="text" onfocus="this.value=''" value="Blabla"> -->


    <!-- <div style="height:100px" aria-hidden="true" class="div-spacer"></div> -->

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