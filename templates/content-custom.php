<?php 
	use Roots\Sage\Extras as Extras;
	$modules =get_field('modules');
?>

<?php if ($modules): ?>
<div class="row banner navbar navbar-default navbar-static-top" role="banner">
    <div class="container">
        <nav class="jump-nav" role="navigation">
            <ul id="menu-main-1" class="nav navbar-nav">
                <?php foreach ($modules as $module): ?>
                	<li class="menu-about">
                		<a href="<?php echo get_permalink( $post->ID ); ?>#<?php echo Extras\format_jump_link($module['title']); ?>">
                			<?php echo $module['title'] ?>
                		</a>

                	</li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</div>
<?php endif; ?>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php the_content(); ?>
		</div>
	</div>
</div>

<?php 
	if($modules): 
		foreach ($modules as $module):
?>
	<div id="<?php echo Extras\format_jump_link($module['title']); ?>" class="container module">
		<div class="row">
			<!-- function format_module($title, $format, $body, $img) -->
			<?php echo Extras\format_module($module['title'], $module['module_type'], $module['body']); ?>
		</div>
	</div>

<?php 
		endforeach;
	endif; 
?>
