<?php get_header(); ?>
		
		<?php while ( have_posts() ) : the_post(); 
			$image = getFeaturedImage( get_post_thumbnail_id( $post->ID ) );
		?>

		<section <?php post_class(); ?>>

		<?php
		if ( $image['full'] != NULL ) :
		?>
			<div class="cover full">
				<figure>
					<img src="<?php print $image['full'] ?>">
				</figure>
			</div>
		<?php else : ?>
			<div class="cover"></div>
		<?php endif; ?>

			<section class="page wrap">

				<header>
					<h1><?php print $post->post_title ?></h1>
					
					<div class="author-meta post">
						<span class="author-thumb"><?php print get_avatar( $post, '50'); ?></span>
						<span class="meta">
							<a class="author" rel="author" href="<?php echo get_the_author_meta( 'url', $post->post_author ); ?>"><?php print get_the_author_meta( 'display_name', $post->post_author ); ?></a>
							<time datetime="<?php echo $post->post_date; ?>"><?php print timeAgo($post->post_date); ?> ago</time>
						</span>
					</div>
					
				</header>

				<button class="plus round" id="button-plus" rel="nofollow"><svg class="icon-plus"><use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons.svg#icon-plus"></use></svg></button>
				
				<section class="content">
					<?php the_content() ?>
				</section>

				<?php get_template_part( 'templates/post', 'meta' ); ?>

				<?php comments_template(); ?>

			</section>

		</section>

		<?php endwhile; ?>


<?php get_footer(); ?>