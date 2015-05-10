<?php use Roots\Sage\Nav\NavWalker; ?>
<footer class="content-info row footer" role="contentinfo">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 text-center social">
				<div class="row">
					<div class="col-xs-4"><a href=""><i class="fa fa-facebook"></i></a></div>
					<div class="col-xs-4"><a href=""><i class="fa fa-twitter"></i></a></div>
					<div class="col-xs-4"><a href=""><i class="fa fa-instagram"></i></a></div>
				</div>

			</div>
			<nav role="navigation">
	            <?php
			    	wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new NavWalker(), 'menu_class' => 'nav navbar-nav']);
			    ?>
        	</nav>
		</div>
	</div>
</footer>
