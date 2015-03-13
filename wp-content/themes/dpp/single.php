<?php get_header(); ?>

<div class="primary-content site-width">

		<div class="row">
			<div class="grid-12">
				<div class="first-title dashed-bottom">
					<p class="likeh1"><?php the_title(); ?></p>
				</div>
			</div>
		</div> <!-- /row-->

		<div class="row">
			<!-- Sidebar -->
			<div class="grid-3" role="complementary">
				Single content sidebar
			</div>


			<!-- Main content -->
			<div class="grid-9" role="main">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

						<h1 class="entry-title"><?php the_title(); ?></h1>

						<div class="entry-content">

							<?php the_content(); ?>

							<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

							<?php the_tags( 'Tags: ', ', ', ''); ?>

							<?php include (TEMPLATEPATH . '/includes/inc/meta.php' ); ?>

						</div>

						<?php edit_post_link('Edit this entry.', '<p class="edit-link">', '</p>'); ?>

					</article>

				<?php comments_template(); ?>

				<?php endwhile; endif; ?>
			</div>


		</div>
	</div>


<?php get_footer(); ?>
