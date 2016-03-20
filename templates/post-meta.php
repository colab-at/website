<section class="post-meta" id="post-meta">
	
	<header>
		<h3><?php print $post->post_title ?></h3>

		<div class="cta-box share">
			<span>
				<svg class="icon-share"><use xlink:href="<?php bloginfo('stylesheet_directory') ?>/img/icons.svg#icon-share"></use></svg> 
				<form><input type="text" value="<?php echo get_the_permalink($post->ID) ?>" autofocus></form>
			</span>
			<button class="button share" href="#" rel="nofollow">Share</button>
		</div>
		
	</header>

<?php
$revisions = wp_get_post_revisions( $post->ID, array('numberposts' => 10) );
if ( count($revisions) > 0 ) :
?>
	<ol class="post-log">

	<?php foreach ($revisions as $revision) : ?>

		<li>
			<span class="author-thumb"><?php print get_avatar( $revision, '32'); ?></span>
			<a class="author" rel="author" href="<?php echo get_the_author_meta( 'url', $revision->post_author ); ?>"><?php print get_the_author_meta( 'display_name', $revision->post_author ); ?></a> 
			<p class="action"> made an edit </p>
			<time datetime="<?php echo $last_revision->post_date ?>"><?php print timeAgo( $revision->post_date) ?> ago</time>
		</li>
	<?php endforeach; ?>
	</ol>
<?php endif; ?>


	<div class="cta-box">
		<span>
			<svg class="icon-play"><use xlink:href="<?php bloginfo('stylesheet_directory') ?>/img/icons.svg#icon-play"></use></svg>
			<p>Started by <a class="author" rel="author" href="<?php echo get_the_author_meta( 'url', $post->post_author ); ?>"><?php print get_the_author_meta( 'display_name', $post->post_author ); ?></a> <time datetime="<?php echo $post->post_date; ?>"><?php print timeAgo($post->post_date); ?> ago</time> </p>
		</span>		
		<a class="button contribute" href="<?php echo wp_login_url( $post->guid ); ?>" rel="nofollow">Contribute</a>
	</div>

</section>