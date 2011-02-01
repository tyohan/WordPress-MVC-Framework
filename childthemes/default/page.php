<?php WpMvc::app()->view->render('header');?>
<div class="main-col span-15">
    <h1><?php echo $thePost->title;?></h1>
    <div><?php the_content();?></div>
</div>
<div class="side-col span-8 push-1 last">
    <?php WpMvc::app()->view->render('widgetChildrenMenu',array('thePost'=>$thePost));?>
    <?php WpMvc::app()->view->render('widgetConnect');?>
    <?php dynamic_sidebar('MainRight');?>
</div>
<?php WpMvc::app()->view->render('footer');?>