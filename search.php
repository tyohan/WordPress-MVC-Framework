<?php

$thePosts=TPost::defaultPosts();
WpMvc::app()->view->render('search',array('thePosts'=>$thePosts));

?>
