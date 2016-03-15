<?php get_header(); ?>
		
		<?php
			$posts = getPostsByCat( $pagename );
			foreach ( $posts as $post ) :
				$id =				$post['id'];
				$title =	 		$post['title'];
				$name = 			$post['name'];
				$image = 			$post['image']['full'];
				$author = 			$post['author'];
				$content = 			$post['content'];
				$revisions = 		$post['revisions'];
				//
				$revisions = 		array_reverse($revisions);
				$last_revision = 	array_pop($revisions);

		?>

		<article id="<?php print $name ?>" class="document post">
			<?php
			if ($image) :
			?>
			<figure>
				<img src="<?php print $image ?>">
			</figure>
			<?php endif; ?>

			<header>
			<div class="wrap">
				<h1><?php print $title ?></h1>
			</div>
			</header>

			<section class="page wrap">

				<button class="share round"><svg class="icon-share"><use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons.svg#icon-share"></use></svg></button>
				
				<section class="content">
					<?php print $content ?>
				</section>

				<div class="article-meta box-meta-cta">
					<span>
						<svg class="icon-bubble"><use xlink:href="<?php bloginfo('stylesheet_directory') ?>/img/icons.svg#icon-bubble"></use></svg>
						<p>Last edited <time datetime="<?php echo $last_revision->post_date ?>"><?php print timeAgo( $last_revision->post_date) ?> ago</time> by <a class="author" rel="author" href="#"><?php print get_the_author_meta( 'display_name', $last_revision->post_author ); ?></a></p>
					</span>
					
					<a class="button contribute" href="#">Participate</a>
				</div>

				<section class="comments">

				<?php 
				// Comments
				$args = array(
					'author_email' => '',
					'author__in' => '',
					'author__not_in' => '',
					'include_unapproved' => '',
					'fields' => '',
					'ID' => '',
					'comment__in' => '',
					'comment__not_in' => '',
					'karma' => '',
					'number' => '',
					'offset' => '',
					'orderby' => '',
					'order' => 'DESC',
					'parent' => '',
					'post_author__in' => '',
					'post_author__not_in' => '',
					'post_ID' => '', // ignored (use post_id instead)
					'post_id' => $id,
					'post__in' => '',
					'post__not_in' => '',
					'post_author' => '',
					'post_name' => '',
					'post_parent' => '',
					'post_status' => '',
					'post_type' => '',
					'status' => 'all',
					'type' => '',
				        'type__in' => '',
				        'type__not_in' => '',
					'user_id' => '',
					'search' => '',
					'count' => false,
					'meta_key' => '',
					'meta_value' => '',
					'meta_query' => '',
					'date_query' => null, // See WP_Date_Query
				);
				$comments = get_comments( $args );

				$num_comments = count($comments);
				$num_comments_word = ' comments';
				if ($num_comments === 1) :
					$num_comments_word = ' comment';
				endif;
				?>
					<!--
					<button class="comments round"><svg class="icon-bubble"><use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons.svg#icon-bubble"></use></svg></button>
					
					<header>
						<svg class="icon-comment"><use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons.svg#icon-comment"></use></svg>
						<h3><span><?php print $num_comments; ?></span> <?php print $num_comments_word; ?> </h3> 
					</header>

					-->

					<div class="must-log-in box-meta-cta">
						<span>
							<svg class="icon-bubble"><use xlink:href="<?php bloginfo('stylesheet_directory') ?>/img/icons.svg#icon-bubble"></use></svg>
							<p><a href="#">Make a comment</a></p>
						</span>
					</div>

				<?php
				// Comments form
				$args = array( 
					'fields' => 				apply_filters( 'comment_form_default_fields', array(
													'author' => '<label for="author">' . __( 'Name' ) . '</label> ' . '<input name="author" placeholder="Your name" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" required />',   
													'email'  => '<label for="email">' . __( 'Email' ) . '</label> ' . '<input name="email" placeholder="Your email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" required />',
													'url'    => '' 
												) ),
					'must_log_in' =>			'',
					'comment_notes_before' => 	'',
					'comment_field' => 			'<label for="comment">' . __( 'Comment' ) . '</label>' . '<textarea name="comment" placeholder="Write your comment" cols="45" rows="4" required ></textarea>',
					'comment_notes_after' => 	'',
					'title_reply_before' => 	'',
					'title_reply' => 			'',
					'title_reply_after' => 		'',
					'cancel_reply_before' =>	'',
					'cancel_reply_after' =>		'',
					'cancel_reply_link' => 		'',
					'label_submit' => 			'',
					'submit_button' => 			'<input name="submit" type="submit" value="Send" />',
					'submit_field' =>			'<fieldset class="form-submit">%1$s %2$s</fieldset>',
					'format' => 'html5'
				);

				comment_form( $args, $id ); 
				?>

				<?php foreach ($comments as $comment) : //var_dump($comment);?>

					<article class="comment">
						<header class="comment-meta">
							<svg class="icon-user"><use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons.svg#icon-user"></use></svg>
							<span class="meta">
								<a class="author" rel="author" href="#"><?php print $comment->comment_author; ?> </a>
								<time datetime="<?php echo $comment->comment_date; ?>"><?php print timeAgo($comment->comment_date); ?> ago</time>
							</span>
						</header>

						<?php //print apply_filters('the_content', $comment->comment_content); ?>
						<p><?php comment_excerpt( $comment->comment_ID ); //print apply_filters('the_content', $comment->comment_content); ?></p>

					</article>

				<?php endforeach; ?>


				
				</section>

			</section>

		</article>

		<?php endforeach; ?>


<?php get_footer(); ?>