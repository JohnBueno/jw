<?php 
	use Roots\Sage\Extras as Extras;
	$modules =get_field('modules');
?>

<?php if ($modules): ?>
<div class="row banner navbar navbar-default jump-nav" role="banner">
    <div class="container">
        <nav role="navigation">
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





<div class="row img-bg" style="background-image: url(<?php echo Extras\bg_image(get_field('summary_background')); ?>);">

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<h4><?php the_content(); ?></h4> 
			</div>
		</div>
	</div>
</div>


<?php 
	if($modules): 
		foreach ($modules as $module):
?>
	<div id="<?php echo Extras\format_jump_link($module['title']); ?>" class="module">
		
		<!-- function format_module($title, $format, $body, $img) -->
		<?php echo Extras\format_module($module['title'], $module['module_type'], $module['body']); ?>
		
	</div>

<?php 
		endforeach;
	endif; 
?>
