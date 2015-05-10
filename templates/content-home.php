<?php use Roots\Sage\Nav\NavWalker; ?>
<div class="row home">
<?php if ($images = get_field("gallery")): ?>

    <?php 
        $count = count($images);
        $rand = rand(0, $count-1);
        $url = $images[$rand]['url'];
    ?>  
<div class="full-bg-container">
	<div id="full-bg" class="full-bg"><img src="<?php echo($url); ?>"/></div>
</div>
<?php endif; ?>

	<div class="col-sm-8 col-sm-offset-2 text-center hero">
		<h1>JEN WOODRUFF</h1>
		<div class="row">
			<nav class="collapse navbar-collapse" role="navigation">
				<?php
				if (has_nav_menu('primary_navigation')) :
				wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new NavWalker(), 'menu_class' => 'nav navbar-nav']);
				endif;
				?>
			</nav>
		</div>
		<h2><em>Text/Value Prop</em></h2>
	</div>

</div>
