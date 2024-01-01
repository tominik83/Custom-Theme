<div class="nav-menu flex">

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'header-menu',
			'menu_class' => 'header-menu flex'
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