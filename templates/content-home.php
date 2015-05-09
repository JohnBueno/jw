
<?php if ($images = get_field("gallery")): ?>
<ul id="cbp-bislideshow" class="cbp-bislideshow">
    <?php 
        $count = count($images);
        $rand = rand(0, $count-1);
        $url = $images[$rand]['url'];
    ?>  
    <li><img src="<?php echo($url); ?>"/></li>
</ul>

<?php endif; ?>


