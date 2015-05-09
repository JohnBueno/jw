<?php 
	use Roots\Sage\Extras as Extras; 
	use Roots\Sage\Nav\NavWalker;
?>

<div class="row banner navbar navbar-default" role="banner">
    <div class="container">
        <nav role="navigation">
            <?php
		    	wp_nav_menu(['menu' => 'portfolios', 'walker' => new NavWalker(), 'menu_class' => 'nav navbar-nav']);
		    ?>
        </nav>
    </div>
</div>

<div class="container">
	<div class="row isotope">
		
	<?php if ($images = get_field("gallery")): ?>
		<?php foreach ($images as $image): ?>
		
		<a class="item col-sm-4 col-xs-6" data-lightbox="img-lightbox" data-title="<?php echo($image['caption']); ?>" href="<?php echo($image['url']); ?>">
			<img class="img-responsive" src="<?php echo($image['sizes']['medium']); ?>" alt="<?php echo($image['alt']); ?>">
		</a>
		

		<?php endforeach; ?>
	<?php endif; ?>
	
	</div>
</div>






