
<h1>Blog</h1>

<?php foreach ($thePosts as $thePost):?>
    <div class="post">
        <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
         <div><?php the_excerpt();?></div>
        <div class="info">
            <span class="date"><?php the_date();?></span> | <a class="author"><?php the_author();?></a>
            <a href="<?php the_permalink();?>" class="read-more right">Read More</a>
        </div>
    </div>

<?php    endforeach;?>
<?php
global $wp_query; if ( $wp_query->max_num_pages > 1 ) : ?>
	<div class="navigation">
		<?php next_posts_link( "<img src='".get_template_directory_uri()."/images/next.png' class='right button-prev'/>" ); ?>
		<?php previous_posts_link(  "<img src='".get_template_directory_uri()."/images/prev.png' class='left button-next'/>" ); ?>
	</div><!-- #nav-above -->
<?php endif; ?>