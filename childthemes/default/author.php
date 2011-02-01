<h3><?php echo $thePost->author->display_name;?>'s Profile</h3>

<?php echo $thePost->author->getAvatar(96);?>
<p><?php echo $thePost->author->user_description;?></p>
<div class="clear"></div>