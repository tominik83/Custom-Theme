<?php
/**
 * Displays the footer widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

if ( is_active_sidebar( 'ct-widget' ) ) : ?>

	<aside class="widget-area">
		<?php dynamic_sidebar( 'ct-widget' ); ?>
	</aside><!-- .widget-area -->

	<?php
endif;
