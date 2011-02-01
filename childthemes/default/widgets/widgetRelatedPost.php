<div class="widget related-post">
<h3>Related Post</h3>
<?php if(count($thePost->relatedPostByCat)>0):?>
<ul>
    <?php foreach($thePost->relatedPostByCat as $relatedPost):?>
    <li><a href="<?php echo $relatedPost->permalink;?>"><?php echo $relatedPost->title;?></a></li>
    <?php endforeach;?>
</ul>
<?php else:?>
    <p>No other content that related to this post.</p>
<?php endif;?>
</div>