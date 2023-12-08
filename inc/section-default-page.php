<?php get_header(); ?>

<div class="default-container">


    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile;
    else:
    endif; ?>



</div>

<?php get_footer(); ?>