<?php
$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type )
        {
		case '' :
                        ?>
                        <li class="comment-item" id="li-comment-<?php comment_ID(); ?>">
                                <div id="comment-<?php comment_ID(); ?>">
                                <div class="comment-author vcard">
                                        <?php echo get_avatar( $comment, 40 ); ?>
                                </div><!-- .comment-author .vcard -->
                                
                                <div class="comment-data">
                                    <div class="comment-meta commentmetadata">
                                        <a class="comment-author-link" href="<?php echo get_comment_author_link();?>"><?php echo get_comment_author();?></a><br/>
                                        <a class="comment-date" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                                            <?php
                                                    /* translators: 1: date, 2: time */
                                                    printf( __( '%1$s at %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' );
                                            ?>
                                    </div><!-- .comment-meta .commentmetadata -->

                                    <div class="comment-body">
                                        <?php if ( $comment->comment_approved == '0' ) : ?>
                                                <em><?php _e( 'Your comment is awaiting moderation.', 'twentyten' ); ?></em>
                                                <br />
                                        <?php endif; ?>
                                        <?php comment_text(); ?>
                                    </div>

                                    <div class="reply">
                                            <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                                    </div><!-- .reply -->
                                </div>
                        </div><!-- #comment-##  -->

                        <?php
			break;
		case 'pingback'  :
		case 'trackback' :
                        ?>
                        <li class="comment-item" id="li-comment-<?php comment_ID(); ?>">
                            <div class="comment-data"><div class="bold">Pingback</div> <?php comment_author_link(); ?><?php edit_comment_link( __('(Edit)', 'twentyten'), ' ' ); ?></div>
                        <?php
			break;
        }

?>