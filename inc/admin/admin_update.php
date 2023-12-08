
<div class="update-info" style="
    font-size: 18px;
    font-weight: bold;
    color: #fa0707;
    ">
    <h1>Theme Update</h1>

    <?php
    // Output information about the theme update
    display_theme_update_info();
    
    // Call the theme_update_count function and pass $counts (if available)
    if (function_exists('theme_update_count')) {
        $counts = array(); // Initialize $counts if it's not available
        theme_update_count($counts);
    }
    ?>
</div>



    




    
