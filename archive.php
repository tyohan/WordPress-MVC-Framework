<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$thePosts=TPost::defaultPosts();
WpMvc::app()->view->render('blog',array('thePosts'=>$thePosts));
?>
