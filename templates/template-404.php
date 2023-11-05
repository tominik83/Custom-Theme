<?php

/*
Template Name: 404
*/
?>

<?php get_header('secondary'); ?>



    <div id="primary" class="content-area">
        <div id="content" class="site-content" role="main">

            <header class="page-header">
                <h1 class="page-title"><?php _e('Not Found', 'custom-theme'); ?></h1>
            </header>
            
            <div class="page-wrapper">
                <div class="page-content">
                    <h1><?php _e('404', 'custom-theme'); ?></h1>
                    <h2><?php _e('This is somewhat embarrassing, isn’t it?', 'custom-theme'); ?></h2>
                    <p><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'custom-theme'); ?></p>

                    <h1 class="page-content">
                        <?php printf(__('Search Results for: %s', 'custom-theme'), get_search_query()); ?>
                    </h1>
                    
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </div>

