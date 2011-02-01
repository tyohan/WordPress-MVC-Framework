<?php WpMvc::app()->view->render('header');?>
<div class="main-col span-15">
    <h1>Sorry, but no content we serve here. Try to navigate through our menu or search it through our search form above.</h1>

</div>
<div class="side-col span-8 push-1 last">
    <?php WpMvc::app()->view->render('widgetConnect');?>
    <?php dynamic_sidebar('MainRight');?>
</div>
<?php WpMvc::app()->view->render('footer');?>