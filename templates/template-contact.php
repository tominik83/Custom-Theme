<?php

/*
Template Name: Contact Us
*/
?>

<?php get_header('secondary'); ?>

<div class="contact-container flex">

    <div style="height:100px" aria-hidden="true" class="div-spacer"></div>

    <h1 class="animate__animated animate__bounce">An animated element</h1>

    <div style="height:100px" aria-hidden="true" class="div-spacer"></div>
    
    <!-- <canvas id="canvas"></canvas> -->

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

    <?php endwhile;
    else : endif; ?>

    <div style="height:100px" aria-hidden="true" class="div-spacer"></div>
</div>



<?php get_footer('secondary'); ?>