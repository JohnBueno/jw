<?php use Roots\Sage\Nav\NavWalker; ?>
<footer class="content-info row footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<nav role="navigation">
	            <?php
			    	wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new NavWalker(), 'menu_class' => 'nav navbar-nav']);
			    ?>
        	</nav>
		</div>
	</div>
</footer>
