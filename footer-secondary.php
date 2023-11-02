	<footer id="footer" class="footer">
	    <div class="footer-menu">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer-menu',
						'menu_class' => 'footer-menu'
					)
				);
				?>
		</div>
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://dev.bibliotehnika.tk/', 'customtheme' ) ); ?>">
				<?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'customtheme' ), 'DeepAmplitude Team' );
				?>
			</a>
			<!-- <span class="sep"> | </span> -->
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %1$s by %2$s.', 'customtheme' ), 'Custom Theme', '<a href="http://dev.bibliotehnika.tk/about/">Mihajlo Tomic</a>' );
				?>
		</div>
	</footer>
<?php wp_footer(); ?>
</body>
</html>
