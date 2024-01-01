

<!-- <img src="wp-content/themes/customtheme/assets/img/background.jpg" class="parallax background-img"> -->
<!-- <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>

            <?php the_content(); ?>

        <?php endwhile;
    else:
    endif; ?> -->




<div class="wrapper-main">

    <div class="layout-grid">

        <div class="col">
            <div class="card border-crvena">
                <h2 class="card__title">Post</h2>
                <p>New Post</p>
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
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
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
                <img class="" alt="" />
            </div>
        </div>

        <div class="col">
            <div class="card border-plava">
                <h2 class="card__title">RADIO</h2>
                <h5>Visit our radio stations</h5>
                <p>Good Vibes</p>
                <img class="card__img" src="" alt="" />
            </div>
            <div class="card border-zelena">
                <h2 class="card__title">THEMES</h2>
                <p>Theme gallery</p>
                <img class="card__img" src="/wp-content/themes/custom theme/inc/img/themes-svgrepo-com.svg" alt="" />
            </div>
        </div>

        <div class="col">
            <div class="card border-zuta">
                <h2 class="card__title">APPLICATIONS</h2>
                <p>Useful applications</p>
                <img class="card__img" src="/wp-content/themes/custom theme/inc/img/application-svgrepo-com.svg" alt="" >
            </div>
        </div>

    </div>

</div>
