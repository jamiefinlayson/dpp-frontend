<?php get_header(); ?>
<div class="primary-content search-results">
<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<h2>Search Results</h2>
			</div>
	<?php if (have_posts()) : ?>

		


			<?php include (TEMPLATEPATH . '/includes/inc/nav.php' ); ?>

			<div class="small-12 medium-12 large-9 xlarge-9 columns">
				<?php while (have_posts()) : the_post(); ?>

					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

						<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

						<?php include (TEMPLATEPATH . '/includes/inc/meta.php' ); ?>

						<div class="entry">

							<?php the_excerpt(); ?>

						</div>

					</article>

				<?php endwhile; ?>

				<?php include (TEMPLATEPATH . '/includes/inc/nav.php' ); ?>

			</div> 	

		<?php else : ?>

			<div class="small-12 medium-12 large-9 xlarge-9 columns">
				<h2>No results</h2>
			</div> 

		<?php endif; ?>

		<div class="small-12 medium-12 large-3 xlarge-3 columns">
			<aside >
				<?php get_sidebar(); ?>
			</aside>
		</div>

	</div>
</div>
<?php get_footer(); ?>
