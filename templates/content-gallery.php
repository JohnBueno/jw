<?php use Roots\Sage\Extras as Extras; ?>

<div class="row banner navbar navbar-default jump-nav" role="banner">
    <div class="container">
        <nav role="navigation">
            <ul id="menu-main-1" class="nav navbar-nav">
                	<li class="menu-about">
                		<a name="" href=""></a>
                	</li>
            </ul>
        </nav>
    </div>
</div>


<div class="row isotope">
		
	<?php if ($images = get_field("gallery")): ?>
		<?php foreach ($images as $image): ?>
		
		<a class="item" href="<?php echo($image['url']); ?>">
			<img src="<?php echo($image['sizes']['medium']); ?>" alt="<?php echo($image['alt']); ?>">
		</a>
		

		<?php endforeach; ?>
	<?php endif; ?>
	
</div>





