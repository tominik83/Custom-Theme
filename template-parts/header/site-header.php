<?php
/**
 * Displays the site header.
 *
 * @package WordPress
 * @subpackage Custom_theme
 * @since Custom_Theme 1.0
 */

?>

<header id="header" class="header flex">
	<nav id="site-navigacija" class="site-navigacija flex">

		<?php get_template_part('template-parts/header/site-branding'); ?>

		<?php get_template_part('template-parts/header/site-nav'); ?>

		<?php get_template_part('template-parts/header/site-mob-nav'); ?>


	</nav>

</header><!-- #masthead -->