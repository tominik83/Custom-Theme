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

		<div class="version-info flex">
			<?php
			$github_shortcode = get_option('github_version_shortcode', '');
			echo do_shortcode($github_shortcode);
			?>


		</div>


		<nav id="site-navigacija" class="site-navigacija flex">

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
					<p class="site-description"><?php echo $customtheme_description; ?></p>
				<?php
				endif;
				?>
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

		<span class="session-state-indicator" style="height: 8px; width: 8px;"></span>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div id="mob-menu" data-visible="false" class="mob-menu">
			<?php
			wp_nav_menu(
				array(
					// 'menu' => 'primay',
					'theme_location' => 'mobile-menu',
					'menu_class' => 'phone-menu',
					'container' => '',
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'walker' => new mob_Walker(),
				)
			);
			?>
		</div>


	</header>