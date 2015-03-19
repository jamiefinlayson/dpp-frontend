<?php get_header(); ?>

<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div class="first-title dashed-bottom">
					<p class="likeh1">DPP News</p>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>
			</div>
		</div> <!-- /row-->

		<div class="row">
			<!-- Sidebar -->
			<div class="small-12 medium-12 large-3 xlarge-3 columns">
				<ul class="clean-list secondary-nav">
					<!-- Uses plugin specific call to get monthly archives -->
					<?php wp_get_post_type_archives('news', array('type' => 'yearly', 'show_post_count' => false)); ?>
				</ul>
			</div>


			<!-- Main content -->
			<div class="small-12 medium-12 large-9 xlarge-9 columns">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

						<h1 class="entry-title"><?php the_title(); ?></h1>

						<div class="entry-content">


							<?php the_content(); ?>


						</div>

						<?php edit_post_link('Edit this entry.', '<p class="edit-link">', '</p>'); ?>

					</article>

				<?php comments_template(); ?>

				<?php endwhile; endif; ?>
			</div>


		</div>
	</div>


<?php get_footer(); ?>
