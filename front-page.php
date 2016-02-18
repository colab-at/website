<?php get_header(); ?>

		<section class="banner" role="banner">
			<div class="wrap">
				<h2 class="tagline">A collaborative effort to make it possible <br>for <strong>anyone</strong> to design, build and bring <br>their ideas into reality.</h2>
			</div>
		</section>

		<section class="matrix wrap">

			<?php
			// Get all posts with category Highlights
			foreach ( getHighlights() as $id => $highlight ) : ?>

			<article class="<?php print $highlight["size"]; ?> <?php print $highlight["tag"]; ?> ">

				<?php if ( $highlight["icon"] ) : ?>
				<svg class="icon-<?php print $highlight["icon"]; ?>"><use xlink:href="<?php bloginfo('stylesheet_directory'); ?>/img/icons.svg#icon-<?php print $highlight["icon"]; ?>"></use></svg>
				<?php endif; ?>

				<header>
					<h3><?php print $highlight["title"]; ?></h3>
					<p><?php print $highlight["content"]; ?></p>
				</header>

				<?php if ( $highlight["link_site"] && $highlight["link_site"] !== "null") : ?>
				<a href="<?php print get_page_link($highlight["link_site"]); ?>">Link site</a>
				<?php elseif ( $highlight["link_out"]  ) : ?>
				<a href="<?php print $highlight["link_out"]; ?>">Link out</a>
				<?php endif; ?>

			</article>

			<?php endforeach; ?>

		</section>

<?php get_footer(); ?>