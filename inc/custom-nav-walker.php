<?php

// class header_Walker extends Walker_Nav_Menu {
//     function start_el( &$output, $item, $depth = 0, $args = null ) {
//         $output .= '<li id="menu-item-'. $item->ID . '"';
//         $output .= ' class="menu-item menu-item-type-'. $item->type . ' menu-item-object-'. $item->object .'">';

//         // Dodajte Font Awesome ikonu uz svaku stavku izbornika
//         $output .= '<a href="'. $item->url .'">'. $item->title .' <i class="fas fa-chevron-right"></i></a>';

//         // Zatvaranje <li> elementa
//         $output .= '</li>';
//     }
// }


class mob_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        // Prilagodite ovo prema vašim potrebama
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));

        $output .= '<li id="menu-item-' . $item->ID . '" class="' . esc_attr($class_names) . '">';
        $output .= '<a href="' . $item->url . '">' . $item->title . ' <i class="bx bx-home"></i></a>';

        // Dodajte stilove prema vašim potrebama
        $output .= '';

        $output .= esc_html($item->title);
        $output .= '</span></a>';
        $output .= '</li>';
    }

}