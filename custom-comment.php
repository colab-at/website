<?php if ( $comment->comment_parent == 0 ) : ?>
<article <?php comment_class() ?> id="comment-<?php comment_ID() ?>">

	<header class="comment-meta">
		<span class="author-thumb"><?php print get_avatar( $comment, '32'); ?></span>
		<span class="meta">
			<a class="author" rel="author" href="#"><?php print $comment->comment_author; ?> </a>
			<time datetime="<?php echo $comment->comment_date; ?>"><?php print timeAgo($comment->comment_date); ?> ago</time>
		</span>
	</header>

	<?php comment_text(); ?>

<?php if ( is_user_logged_in() ) : ?>
    <footer class="comment-footer">
        <?php comment_reply_link( array( 'add_below' => 'comment', 'depth' => '1', 'max_depth' => '2' ) ); ?>
        <?php edit_comment_link( __( 'Edit' ), '  ', '' ); ?>
    </footer>
<?php endif; ?>

</article>

<?php else : // Show reply template ?>

<article <?php comment_class() ?> id="comment-<?php comment_ID() ?>">
	<div class="wrapper">

		<span class="author-thumb"><?php print get_avatar( $comment, '32'); ?></span>

		<header class="comment-meta">
			<a class="author" rel="author" href="#"><?php print $comment->comment_author; ?> </a>
			<time datetime="<?php echo $comment->comment_date; ?>"><?php print timeAgo($comment->comment_date); ?> ago</time>
			<?php edit_comment_link( __( 'Edit' ), '  ', '' ); ?>
		</header>

		<?php comment_text(); ?>

	</div>
</article>

<?php endif; ?>