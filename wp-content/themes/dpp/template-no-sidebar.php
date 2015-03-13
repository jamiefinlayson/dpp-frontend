<?php
/*
Template Name: No Sidebar
*/
?>

<?php get_header(); ?>

<div class="primary-content site-width">

		<div class="row">
			<div class="grid-12">
				<div class="first-title dashed-bottom">
					<h1><?php the_title(); ?></h1>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns-follow.php'; ?>

				</div>
			</div>
		</div> <!-- /row-->

		<div class="row">


			<!-- Main content -->
			<div class="grid-12" role="main">


				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article class="post" id="post-<?php the_ID(); ?>">


						<?php //include (TEMPLATEPATH . '/includes/inc/meta.php' ); ?>

						<div class="entry">

							<?php the_content(); ?>

							<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

						</div>

						<?php edit_post_link('Edit this entry.', '<p class="edit-link">', '</p>'); ?>

					</article>

					<?php // comments_template(); ?>

					<?php endwhile; endif; ?>
			</div>



		</div>
	</div>


<?php get_footer(); ?>
