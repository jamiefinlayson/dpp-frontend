<?php get_header(); ?>

<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div class="first-title dashed-bottom">
					<h1><?php the_title(); ?></h1>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>
			</div>
		</div> <!-- /row-->

		<div class="row"> 

			<!-- Main content -->
			<div class="small-12 medium-12 large-9 xlarge-9 columns">


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
