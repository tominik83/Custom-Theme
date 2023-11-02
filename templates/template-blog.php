<?php

/*
Template Name: Blog
*/
?>


<?php get_header('secondary'); ?>

<div class="blog-container flex">

<?php get_template_part('includes/section', 'blog');?>

<div style="height:100px" aria-hidden="true" class="div-spacer"></div>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <?php the_content(); ?>

    <?php endwhile;
    else : endif; ?>

</div>



<?php get_footer('secondary'); ?>