<?php
// Do not delete these lines
      global $user_ID,$user_identity;
      get_currentuserinfo();
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<?php if ( $thePost->isHasComment ) : ?>
	<h3 id="comments">We have <?php echo $thePost->commentCount;?> comments in this post, add more by leave yours below.</h3>

	<ol class="commentlist" id="singlecomments">
	<?php wp_list_comments('callback=viewcomment',$thePost->getComments()); ?>
	</ol>
	<div class="comment-navigation">
            <?php previous_comments_link("<img src='".get_template_directory_uri()."/images/prev.png' class='left button-prev'/>") ?>
		<?php next_comments_link("<img src='".  get_template_directory_uri()."/images/next.png' class='right button-next'/>") ?>
            <div class="clear"></div>
        </div>
 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $thePost->commentStatus) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $thePost->commentStatus) : ?>

<?php
$commenter = wp_get_current_commenter();
$fields =  array(
	'author' => '<p class="comment-form-author">' . '<label for="author">' . __( 'Name' ) . '</label> '  .
	            '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="75" /></p>',
	'email'  => '<p class="comment-form-email"><label for="email">' . __( 'Email' ) . '</label> ' .
	            '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="75"/></p>',
	'url'    => '<p class="comment-form-url"><label for="url">' . __( 'Website' ) . '</label>' .
	            '<input id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="75" /></p>',
);
comment_form( $args = array('fields' => apply_filters( 'comment_form_default_fields', $fields ),'comment_notes_before'=>''), $thePost->id );?>


<?php endif; ?>