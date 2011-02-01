<?php
$thePost=TPost::defaultPost();
$listPage=TPost::findAll(array('post_type'=>'page','post_status'=>'publish'));
WpMvc::app()->view->render('page',array('thePost'=>$thePost,'listPage'=>$listPage));

?>
