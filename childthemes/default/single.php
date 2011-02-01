<?php WpMvc::app()->view->render('header');?>
<div class="main-col span-15">
    <h1><?php echo $thePost->title;?></h1>
    <div><?php the_content();?></div>
    <?php if($thePost->type==='post'):?>
    <div class="post-meta align-right">
        <p>Tag: <?php the_tags('', '&nbsp;', '') ;?></p>
        <p>Posted in : <?php echo get_the_category_list( '&nbsp; ' );?>
        
        </p>
    </div>
    <?php endif;?>
     <?php WpMvc::app()->view->render('widgets/widgetShare')?>
   
    <?php WpMvc::app()->view->render('comments',array('thePost'=>$thePost));?>
</div>
<div class="side-col span-8 push-1 last">
    <div class="widget share">
        <h3>Do you like this?</h3>
        <span class="twitter-share">
            <a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical" data-via="thinkrooms">Tweet</a>
            <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
        </span>
        &nbsp;&nbsp;
        <span class="fb-share">
            <iframe src="http://www.facebook.com/plugins/like.php?href=<?php    the_permalink();?>&amp;layout=button_count&amp;show_faces=false&amp;width=150&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:200px; height:21px; color:#FFF;" allowTransparency="true"></iframe>
        </span>
        
        
    </div>
    
    <?php WpMvc::app()->view->render('widgets/widgetAuthor',compact('thePost'));?>
    <?php WpMvc::app()->view->render('widgets/widgetConnect');?>
    <?php dynamic_sidebar('ContentRight');?>
    <?php WpMvc::app()->view->render('widgets/widgetRelatedPost',  compact('thePost'));?>
</div>
<?php WpMvc::app()->view->render('footer');?>