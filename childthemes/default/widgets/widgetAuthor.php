<div class="widget post-author">
<h3>Author</h3>
<?php echo $thePost->author->getAvatar(64);?>
    <a class="post-author-name" href="<?php echo $thePost->author->user_url;?>"><?php echo $thePost->author->display_name;?></a>
<p><?php echo $thePost->author->user_description;?></p>
<div class="clear"></div>
</div>