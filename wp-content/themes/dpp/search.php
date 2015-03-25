<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<h2>Search Results</h2>
			</div>
		</div>

		<?php include (TEMPLATEPATH . '/includes/inc/nav.php' ); ?>

		<?php while (have_posts()) : the_post(); ?>

			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

				<h2><?php the_title(); ?></h2>

				<?php include (TEMPLATEPATH . '/includes/inc/meta.php' ); ?>

				<div class="entry">

					<?php the_excerpt(); ?>

				</div>

			</article>

		<?php endwhile; ?>

		<?php include (TEMPLATEPATH . '/includes/inc/nav.php' ); ?>

	<?php else : ?>

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<h2>No results</h2>
			</div>
		</div>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
