<?php get_header(); ?>
		
		<?php while ( have_posts() ) : the_post(); 
			$image = 			getFeaturedImage( get_post_thumbnail_id( $post->ID ) );
			//
			$revisions = 		wp_get_post_revisions( $post->ID, array('numberposts' => 3) );
			$revisions = 		array_reverse($revisions);
			$last_revision = 	array_pop($revisions);
		?>

		<section <?php post_class(); ?>>
			<?php
			if ($image) :
			?>
			<figure>
				<img src="<?php print $image['full'] ?>">
			</figure>
			<?php endif; ?>

			<header>
			<div class="wrap">
				<h1><?php print $post->post_title ?></h1>
			</div>
			</header>

			<section class="page wrap">

				<button class="share round"><svg class="icon-share"><use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons.svg#icon-share"></use></svg></button>
				
				<section class="content">
					<?php the_content() ?>
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

		<?php endwhile; ?>


<?php get_footer(); ?>