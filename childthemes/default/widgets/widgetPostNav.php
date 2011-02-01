<?php
global $wp_query; if ( $wp_query->max_num_pages > 1 ) : ?>
	<div class="navigation-top">
		<?php next_posts_link( "<img src='".get_template_directory_uri()."/images/next.png' class='right button-prev'/>" ); ?>
		<?php previous_posts_link(  "<img src='".get_template_directory_uri()."/images/prev.png' class='left button-next'/>" ); ?>
	</div><!-- #nav-above -->
<?php endif; ?>
