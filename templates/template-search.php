<?php

/*
Template Name: Search
*/
?>


<?php get_header('secondary'); ?>

<div class="search-container flex">

    <!-- <div style="height:100px" aria-hidden="true" class="div-spacer"></div> -->

    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile;
    else:
    endif; ?>
    <input type="text" name="search" placeholder="Search..">
    <!-- <div style="height:100px" aria-hidden="true" class="div-spacer"></div> -->
</div>



<?php get_footer('secondary'); ?>