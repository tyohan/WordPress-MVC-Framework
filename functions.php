<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
@ini_set( 'upload_max_size' , '100M' );
@ini_set( 'post_max_size', '105M');
@ini_set( 'max_execution_time', '300' );
require_once dirname(__FILE__) . '/framework/WpMvc.php';
WpMvc::init();
WpMvc::app()->theme = 'child';

 


if (function_exists('add_theme_support')) {
    add_theme_support('menus');
    add_theme_support('post-thumbnails');

}
register_sidebar(array(
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'name' => 'ContentRight',
    'description' => 'Sidebar on content right',
    'before_title' => '<h3>',
    'after_title' => '</h3>'));
register_sidebar(array(
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'name' => 'FooterLeft',
    'description' => 'Sidebar on content right',
    'before_title' => '<h3>',
    'after_title' => '</h3>'));
register_sidebar(array(
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'name' => 'FooterCenter',
    'description' => 'Sidebar on content right',
    'before_title' => '<h3>',
    'after_title' => '</h3>'));
register_sidebar(array(
    'before_widget' => '<div class="widget">',
    'after_widget' => '</div>',
    'name' => 'FooterRight',
    'description' => 'Sidebar on content right',
    'before_title' => '<h3>',
    'after_title' => '</h3>'));


function viewcomment($comment, $args, $depth) {
    WpMvc::app()->view->render('comment', compact('comment', 'args', 'depth'));
}

function my_new_contactmethods($contactmethods) {
    // Add Twitter
    $contactmethods['twitter'] = 'Twitter';
    //add Facebook
    $contactmethods['facebook'] = 'Facebook';

    return $contactmethods;
}

add_filter('user_contactmethods', 'my_new_contactmethods', 10, 1);


?>