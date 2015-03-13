
<?php get_header(); ?>

	<div class="primary-content site-width">

		<div class="row">
			<div class="grid-12">
				<div class="first-title dashed-bottom">
					<h1>
						<?php $term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

						 <?php echo $term->name; ?>
					</h1>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Sidebar -->
			<div class="grid-3" role="complementary">
					<?php
						//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

						$taxonomy     = 'download-categories';
						$orderby      = 'name';
						$show_count   = 0;      // 1 for yes, 0 for no
						$pad_counts   = 0;      // 1 for yes, 0 for no
						$hierarchical = 1;      // 1 for yes, 0 for no
						$title        = '';
						$hide_empty	  = 0;		// 1 for yes, 0 for no

						$args = array(
						  'taxonomy'     => $taxonomy,
						  'orderby'      => $orderby,
						  'show_count'   => $show_count,
						  'pad_counts'   => $pad_counts,
						  'hierarchical' => $hierarchical,
						  'title_li'     => $title,
						  'hide_empty'   => $hide_empty
						);
						?>

						<ul class="clean-list secondary-nav">
						<?php wp_list_categories( $args ); ?>
						</ul>
			</div>

			<!-- Main content -->

			<div class="grid-9" role="main">
				<?php //query_posts($args2); ?>
				<?php global $query_string; // required
				$posts = query_posts($query_string.'&orderby=menu_order&order=ASC'); // exclude category 9 ?>

				<?php if (have_posts()) : ?>


							<ul class="clean-list block-articles">
								<?php while (have_posts()) : the_post(); ?>

										<li>
											<!-- Block style contnet -->
											<?php get_template_part( 'includes/inc/content', 'block-side-download'); ?>
										</li>

								<?php endwhile; ?>
							</ul>

							<?php //include (TEMPLATEPATH . '/includes/inc/nav.php' ); ?>

					<?php else : ?>

						<h2>Nothing found</h2>

					<?php endif; ?>
					<?php wp_reset_query(); // reset the query ?>

			</div> <!-- /grid-9 -->


		</div>
	</div>

	<?php get_footer(); ?>