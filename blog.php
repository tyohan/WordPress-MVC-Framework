<?php
/*
Template Name: Blog
*/
$thePosts=TPost::findAll();
WpMvc::app()->view->render('blog',array('thePosts'=>$thePosts));

?>