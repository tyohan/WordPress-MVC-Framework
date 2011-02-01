<?php
$thePosts=TPost::defaultPosts();
WpMvc::app()->view->render('index',array('thePosts'=>$thePosts));

?>
