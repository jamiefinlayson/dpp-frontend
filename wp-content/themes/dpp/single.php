<?php get_header(); ?>

<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div class="first-title dashed-bottom">
					<p class="likeh1"><?php the_title(); ?></p>
				</div>
			</div>
		</div> <!-- /row-->

		<div class="row">
			<!-- Sidebar -->
						<!-- Sidebar -->
			<div class="side-bar small-12 medium-12 large-3 xlarge-3 columns">
				<nav> 
					<div class="item-list-tabs no-ajax" id="subnav" role="navigation">

					<?php
						//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

						$args = array(
						  'taxonomy'     => 'download-categories',
						  'show_count'   => 0,
						  'pad_counts'   => 0,
						  'hierarchical' => 1,
						  'title_li'     => '',
						  'hide_empty'   => 0
						);


						  ?>

						<ul class="clean-list secondary-nav">
							<?php wp_list_categories( $args ); ?>
						</ul>
					</div>
				</nav>
			</div>

			<!-- Main content -->
			<div class="small-12 medium-12 large-9 xlarge-9 columns">
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
