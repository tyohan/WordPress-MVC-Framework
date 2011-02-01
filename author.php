<?php
$thePost=TPost::defaultPost();
WpMvc::app()->view->render('author',  compact('thePost'));
?>
