<?php
$thePost=TPost::defaultPost();
$otherPosts=TPost::findAll(array('post_not_in'=>array($thePost->id)));
WpMvc::app()->view->render('single',array('thePost'=>$thePost,'otherPosts'=>$otherPosts));

?>