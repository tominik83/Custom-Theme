<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<?php wp_head(); ?>
</head>

<body>

	<header id="header" class="header">

		<nav id="site-navigacija" class="site-navigacija">

			<div class="site-branding">
					<?php
					the_custom_logo();
					if (is_front_page() && is_home()) :
					?>
						<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
					<?php
					else :
					?>
						<p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
					<?php
					endif;
					$customtheme_description = get_bloginfo('description', 'display');
					if ($customtheme_description || is_customize_preview()) :
					?>
						<p class="site-description"><?php echo $customtheme_description;
													?></p>
					<?php endif; ?>
			</div>

			<div class="nav-menu">

				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'header-menu',
						'menu_class' => 'header-menu'
					)
				);
				?>		
			</div>

		</nav>

		<div class="hamburger" aria-controls="mob-menu" aria-expanded="false">
 			<div class="bar1"></div>
  			<div class="bar2"></div>
  			<div class="bar3"></div>
		</div>

		<div id="mob-menu" data-visible="false" class="mob-menu">
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'mobile-menu',
            'menu_class' => 'phone-menu',
            // 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            // 'walker' => new mob_Walker(),
        )
    );
    ?>
</div>


	</header>