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

		<article id="<?php print $name ?>" <?php post_class(); ?>>
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

				<button class="plus round"><svg class="icon-plus"><use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons.svg#icon-plus"></use></svg></button>
				
				<section class="content">
					<?php print $content ?>
				</section>

				<div class="article-meta box-meta-cta">
					<span>
						<svg class="icon-refresh"><use xlink:href="<?php bloginfo('stylesheet_directory') ?>/img/icons.svg#icon-refresh"></use></svg>
						<p>Last edited <time datetime="<?php echo $last_revision->post_date ?>"><?php print timeAgo( $last_revision->post_date) ?> ago</time> by <a class="author" rel="author" href="#"><?php print get_the_author_meta( 'display_name', $last_revision->post_author ); ?></a></p>
					</span>
					
					<a class="button contribute" href="#">Participate</a>
				</div>

				<?php comments_template();?>

			</section>

		</article>

		<?php endforeach; ?>


<?php get_footer(); ?>