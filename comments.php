<?php // Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) :
	die ('Please do not load this page directly. Thanks!');
endif;
?>

<section class="comments">

	<h3>Comments</h3>

<?php if ( is_user_logged_in() ) : ?>

	<?php
	// Comments form
	$current_user = wp_get_current_user();

	$args_form = array( 
		'fields' 				=> apply_filters( 'comment_form_default_fields', array(
										'author' => '<label for="author">' . __( 'Name' ) . '</label> ' . '<input name="author" placeholder="Your name" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" required />',   
										'email'  => '<label for="email">' . __( 'Email' ) . '</label> ' . '<input name="email" placeholder="Your email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required />',
										'url'    => ''
									) ),
		'must_log_in' 			=> '',
		'logged_in_as' 			=> '',
		'comment_notes_before' 	=> '',
		'comment_field' 		=> 	'<div class="comment-meta">' .
									'	<span class="author-thumb">' .  get_avatar( $current_user->ID, '32') . '</span>' .
									'	<span class="meta">' .
									'		<a class="author" rel="author" href="#">' .  $current_user->display_name . '</a>' .
									'		<time>' . __('Right now') . '</time>' . 
									'	</span>' . 
									'</div>' . 
									'<label for="comment">' . __( 'Comment' ) . '</label>' .
									'<textarea id="comment" name="comment" placeholder="Write a comment..." cols="45" rows="1" required ></textarea>',
		'comment_notes_after' 	=> '',
		'title_reply_before' 	=> '',
		'title_reply' 			=> '',
		'title_reply_after' 	=> '',
		'cancel_reply_before' 	=> '',
		'cancel_reply_after' 	=> '',
		'cancel_reply_link' 	=> 'Cancel',
		'label_submit' 			=> '',
		'submit_button' 		=> '<input name="submit" type="submit" value="Send" />',
		'submit_field'			=> '<fieldset class="form-submit">%1$s %2$s</fieldset>',
		'format' 				=> 'html5'
	);

	comment_form( $args_form, $id );
	?>

<?php else : ?>

	<div class="must-log-in">
		<p>Write a comment...</p>
		<a class="button small transparent log-in" href="<?php echo wp_login_url( $post->guid ); ?> " rel="nofollow">Log in to comment</a>
	</div>

<?php endif; ?>

<?php 
	
	if ( is_page() ) :
		$comments = get_comments(array(
			'post_id' => $id,
			'status' => 'approve'
		));
	endif;

	if ( have_comments() ) : 

?>

	<?php $args = array(
		'walker'            => null,
		'max_depth'         => '2',
		'style'             => 'div',
		'callback'          => customComment,	// custom-comment.php
		'end-callback'      => null,
		'type'              => 'all',
		'reply_text'        => 'Reply',
		'page'              => '',
		'per_page'          => '',
		'avatar_size'       => 32,
		'reverse_top_level' => true,
		'reverse_children'  => false,
		'format'            => 'html5', 		// or 'xhtml' if no 'HTML5' theme support
		'short_ping'        => false,   		// @since 3.6
	    'echo'              => true 			// boolean, default is true
	); ?>

	<?php wp_list_comments( $args ); ?> 


<?php endif; ?>

</section>