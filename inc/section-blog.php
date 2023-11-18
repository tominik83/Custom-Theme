

<!-- <img src="wp-content/themes/customtheme/assets/img/background.jpg" class="parallax background-img"> -->
<!-- <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile;
    else:
    endif; ?> -->


<?php
$args = array(
    'post_type'      => 'post', // Tip postova (može biti i 'page', 'custom_post_type' itd.)
    'posts_per_page' => 15, // Broj postova koji će biti prikazani
    'order'          => 'DESC', // Redoslijed (može biti 'ASC' za uzlazni redoslijed)
    'orderby'        => 'date' // Redoslijed po datumu
);

$query = new WP_Query( $args );

if ( $query->have_posts() ) :
    while ( $query->have_posts() ) : $query->the_post();
        ?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <p><?php the_content(); ?></p>
        <?php
    endwhile;
    wp_reset_postdata(); // Resetiraj post data da bi se izbjegle konfuzije
else :
    ?>
    <p>Nema novih postova.</p>
    <?php
endif;
?>
