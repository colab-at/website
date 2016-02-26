<?php get_header(); ?>
		
		<?php
			$posts = getPostsByCat( $pagename );
			foreach ( $posts as $post ) :
				$title = $post['title'];
				$name = $post['name'];
				$image = $post['image']['full'];

		?>

		<article id="<?php print $name ?>" class="document post">
			<?php
			if ($image) :
			?>
			<figure>
				<img src="<?php print $image ?>">
			</figure>
			<?php endif; ?>
			<header class="wrap">
				<svg class="icon-box-inside"><use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons.svg#icon-box-inside"></use></svg>
				<h2><?php print $title ?></h2>
			</header>

			<section class="page wrap">
				
				<section class="content">
				
					<h3>Luctus urna volutpat non</h3>
					<p>Nullam consectetur ante nunc, eget luctus urna volutpat non. Curabitur placerat nibh sed augue luctus tincidunt. Fusce volutpat dolor odio, in auctor nunc malesuada vel. Sed gravida felis finibus accumsan lacinia. Sed lectus dui, convallis ut tellus at, fermentum lacinia nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent gravida lacus mi, vehicula sollicitudin magna vehicula vitae. Donec ultricies ex et lectus tristique rhoncus. Vivamus non risus a nisl pellentesque auctor. Fusce finibus mauris a felis suscipit eleifend in ac odio. Integer id turpis orci. Quisque in imperdiet magna.</p>
					<h3>Integer id turpis orci. Quisque in imperdiet magna.</h3>
					<p>Nullam consectetur ante nunc, eget luctus urna volutpat non. Curabitur placerat nibh sed augue luctus tincidunt. Fusce volutpat dolor odio, in auctor nunc malesuada vel. Sed gravida felis finibus accumsan lacinia. Sed lectus dui, convallis ut tellus at, fermentum lacinia nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent gravida lacus mi, vehicula sollicitudin magna vehicula vitae. Donec ultricies ex et lectus tristique rhoncus. Vivamus non risus a nisl pellentesque auctor. Fusce finibus mauris a felis suscipit eleifend in ac odio. Integer id turpis orci. Quisque in imperdiet magna.</p>

				</section>

				<aside class="sidebar">

					<button class="open-sidebar"></button>
				</aside>

			</section>

		</article>

		<?php endforeach; ?>


<?php get_footer(); ?>