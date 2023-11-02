<?php

/*
Template Name: Login
*/
?>


<?php get_header(); ?>

<div class="login-container flex">

    <div style="height:100px" aria-hidden="true" class="div-spacer"></div>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

    <?php endwhile;
    else : endif; ?>

    <div style="height:100px" aria-hidden="true" class="div-spacer"></div>

</div>



<?php get_footer(); ?>