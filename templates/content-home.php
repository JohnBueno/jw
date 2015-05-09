
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

</div>
