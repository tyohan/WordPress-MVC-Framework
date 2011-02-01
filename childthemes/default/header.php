<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title>
<?php
/*
* Print the <title> tag based on what is being viewed.
* We filter the output of wp_title() a bit -- see
* twentyten_filter_wp_title() in functions.php.
*/
wp_title( '|', true, 'right' );

?>
</title>
<link rel="shortcut icon" href="/favicon.ico">
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/blueprint/screen.css" type="text/css" media="screen, projection">
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/blueprint/print.css" type="text/css" media="print">
<!--[if lt IE 8]><link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/blueprint/ie.css" type="text/css" media="screen, projection"><![endif]-->
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
/* We add some JavaScript to pages with the comment form
 * to support sites with threaded comments (when in use).
 */
if ( is_singular() && get_option( 'thread_comments' ) )
        wp_enqueue_script( 'comment-reply' );

/* Always have wp_head() just before the closing </head>
 * tag of your theme, or you will break many plugins, which
 * generally use this hook to add elements to <head> such
 * as styles, scripts, and meta tags.
 */
wp_head();
?>
</head>
<body>
<div id="wrap">
    <div id="body">
            <div id="body-content" class="container">
                    <div id="header" class="span-24 last">
                            <div class="span-12">
                                    <h2><a href="<?php bloginfo('url'); ?>"></a><?php bloginfo('title'); ?></a></h2>
                                    <h3><?php bloginfo( 'description' ); ?>o</h3>
                            </div>
                            <div class="span-12 last">
                                    <div id="search-form">
                                            <form action ="<?php bloginfo('url'); ?>">
                                                    <input id="search-text" type="text" name="s" value="<?php the_search_query(); ?>"/> <input type="submit"/>
                                            </form>
                                    </div>
                                    <?php wp_nav_menu( array('menu'=>'primary','container_id' => 'main-menu' ));?>



                            </div>
                    </div>
                    <div id="main-content" class="clear">
                    <div class="breadcrumb">
                    <?php
                    if(function_exists('bcn_display') && !is_home())
                    {
                        bcn_display();
                    }
                    ?>
                    </div>
