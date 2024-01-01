<?php

/*
Template Name: Hotspot
*/
?>

<?php get_header(); ?>



<div class="hotspot-container flex">

    <p id="client-ip" class="client-ip h4">IP Adress</p>

    <?php
    $notification_shortcode = get_option('notification_shortcode', '');
    echo do_shortcode($notification_shortcode);
    ?>


    <?php

    // $hotspot = '[mt-hotspot-form]';
    $hotspot = '[mikrotik_hotspot]';
    

    echo do_shortcode($hotspot);

    ?>



</div>



<?php get_footer('secondary'); ?>