<?php WpMvc::app()->view->render('header');?>
<div class="main-col span-15">
    <?php foreach ($thePosts as $node):?>
    <div class="post">
         <h2><a href="<?php echo $node->permalink;?>"><?php echo $node->title;?></a></h2>
        <div><?php echo $node->content;?></div>
    </div>

    <?php    endforeach;?>
</div>
<div class="side-col span-9 last">
    <?php dynamic_sidebar('MainRight');?>
</div>
<?php WpMvc::app()->view->render('footer');?>