<?php get_header(); ?>

<div class="primary-content site-width">

		<div class="row">
			<div class="grid-12">
				<div class="first-title dashed-bottom">
					<p class="likeh1">DPP News</p>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>
			</div>
		</div> <!-- /row-->

		<div class="row">
			<!-- Sidebar -->
			<div class="grid-3" role="complementary">
				<ul class="clean-list secondary-nav">
					<!-- Uses plugin specific call to get monthly archives -->
					<?php wp_get_post_type_archives('news', array('type' => 'yearly', 'show_post_count' => false)); ?>
				</ul>
			</div>


			<!-- Main content -->
			<div class="grid-9" role="main">
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
