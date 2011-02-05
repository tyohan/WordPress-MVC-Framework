<?php WpMvc::app()->view->render('header');?>
<div class="main-col span-15">
    <h1>Search result for &quot;<?php echo the_search_query(); ?>&quot;</h1>
    <?php if(count($thePosts)<>0):?>
        <?php WpMvc::app()->view->render('loop',array('thePosts'=>$thePosts));?>
    <?php else:?>
    <p style="font-size:1.4em">Sorry, there is no result for your search using keyword &quot;<?php echo the_search_query(); ?>&quot;. Try again using different query.</p>
    <?php endif;?>
</div>
<div class="side-col push-1 span-8 last">
    <?php WpMvc::app()->view->render('widgets/widgetConnect');?>
    <?php WpMvc::app()->view->render('widgets/widgetMostCommented');?>
    <?php dynamic_sidebar('ContentRight');?>
</div>
<?php WpMvc::app()->view->render('footer');?>