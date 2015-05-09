<?php 
	use Roots\Sage\Extras as Extras;
	$modules =get_field('modules');
	$faqs = get_field('faqs');
?>

<?php if ($modules): ?>
<div class="row banner navbar navbar-default jump-nav" role="banner">
    <div class="container">
        <nav role="navigation">
            <ul id="menu-main-1" class="nav navbar-nav">
                <?php foreach ($modules as $module): ?>
                	<li>
                		<a name="<?php echo Extras\format_jump_link($module['title']); ?>" href="<?php echo get_permalink( $post->ID ); ?>#<?php echo Extras\format_jump_link($module['title']); ?>">
                			<?php echo $module['title'] ?>
                		</a>
                	</li>
                <?php endforeach; ?>
                <?php if(count($faqs) > 0): ?>
					<li>
						<a name="faqs" href="<?php echo get_permalink( $post->ID ); ?>#faqs">
                			FAQs
                		</a>
					</li>
				<?php endif; ?>
            </ul>
        </nav>
    </div>
</div>
<?php endif; ?>

<div class="row relative img-bg" style="background-image: url(<?php echo Extras\bg_image(get_field('summary_background')); ?>);">
	<div class="mask"></div>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-offset-2 col-sm-8">
				<?php the_content(); ?>
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

		<?php echo Extras\format_module($module); ?>
		
	</div>

<?php 
		endforeach;
	endif; 
?>

<div id="faqs" class="container faqs">

<h2 class="text-center">FAQ</h2>
<?php 
	if($faqs): 
		foreach ($faqs as $faq):
?>
		
	<div class="row">
		<div class="col-sm-6">
			<h3><em><?php echo $faq['question']; ?></em></h3>
		</div>
		<div class="col-sm-6">
			<?php echo $faq['answer']; ?>
		</div>
		
	</div>
	<div class="row"><hr></div>
	

<?php 
		endforeach;
	endif; 
?>
</div>

