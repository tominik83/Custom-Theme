<?php

/*
Template Name: 404
*/
?>

<?php get_header('secondary'); ?>



<div id="primary" class="content-area flex">

    <header class="page-header">
        <h1 class="page-title">
            <?php _e('NOT FOUND', 'custom-theme'); ?>
        </h1>
    </header>


    <div class="page-content flex">
        <h1>
            <?php _e('404', 'custom-theme'); ?>
        </h1>
        <h2>
            <?php _e('This is somewhat embarrassing, isn’t it?', 'custom-theme'); ?>
        </h2>
        <p>
            <?php _e('It looks like nothing was found at this location. Maybe try a search?', 'custom-theme'); ?>
        </p>

        <h2 class="page-content">
            <?php printf(__('Search Results for: %s', 'custom-theme'), get_search_query()); ?>
        </h2>

        <?php get_search_form(); ?>
    </div>


</div>