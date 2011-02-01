<?php WpMvc::app()->view->render('header');?>
<div class="main-col span-15">
    <?php WpMvc::app()->view->render('loop',array('thePosts'=>$thePosts));?>
</div>
<div class="side-col push-1 span-8 last">
    <?php WpMvc::app()->view->render('widgets/widgetConnect');?>
    <?php WpMvc::app()->view->render('widgets/widgetMostCommented');?>
    <?php dynamic_sidebar('ContentRight');?>
</div>
<?php WpMvc::app()->view->render('footer');?>