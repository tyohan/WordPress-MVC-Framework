<?php
$memoList=TPost::findAll(array('posts_per_page'=>4));
WpMvc::app()->view->render('home',  array('memoList'=>$memoList));