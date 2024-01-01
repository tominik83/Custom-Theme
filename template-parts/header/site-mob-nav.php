<?php
/**
 * Displays the site navigation.
 *
 * @package WordPress
 * @subpackage custom_theme
 * @since Custom Theme 1.0.x
 */

?>



<div id="mob-menu" data-visible="false" class="mob-menu">
    <?php
    wp_nav_menu(
        array(
            // 'menu' => 'primay',
            'theme_location' => 'mobile-menu',
            'menu_class' => 'phone-menu',
            // 'container' => '',
            // 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            // 'walker' => new mob_Walker(),
        )
    );
    ?>
</div>