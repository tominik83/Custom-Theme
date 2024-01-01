<footer id="footer" class="footer-radio">
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
			<span class="sep"> | </span>
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( ' Theme: %1$s by %2$s.', 'customtheme' ), 'customtheme', '<a href="http://dev.bibliotehnika.tk/about/"> admin@bibliotehnika.com</a>' );
				?>
		</div>
		<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#0099ff" fill-opacity="1" d="M0,32L48,74.7C96,117,192,203,288,218.7C384,235,480,181,576,154.7C672,128,768,128,864,138.7C960,149,1056,171,1152,176C1248,181,1344,171,1392,165.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg> -->
	</footer>
<?php wp_footer(); ?>
</body>
</html>
