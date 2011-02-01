<?php if(count($thePost->childrens)>0):?>
<div class="widget post-childrens">
    <h3>Sub Pages</h3>
    <ul>
        <?php foreach($thePost->childrens as $page):?>
        <li><a href="<?php echo $page->permalink;?>"><?php echo $page->title;?></a></li>
        <?php endforeach;?>
    </ul>
</div>
<?php endif;?>
