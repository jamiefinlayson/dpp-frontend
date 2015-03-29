
<?php get_header(); ?>

	<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div class="first-title dashed-bottom">
					<h1>
						<?php $term = get_term_by('slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>

						 <?php
						 // As SS downloads loads the downloads page rather than the taxonomy page this will choose the correct title
						 if (!$term) {
							echo the_title();
						} else {
							echo $term->name;
						}?>
					</h1>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Sidebar -->
			<div class="small-12 medium-12 large-3 xlarge-3 columns">
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
			<div class="small-12 medium-12 large-9 xlarge-9 columns">
				<div class="entry">
					<?php if (have_posts()) : ?>

								<?php while (have_posts()) : the_post(); ?>
 
									<?php get_template_part( 'includes/inc/content', 'block-side-download'); ?>					

								<?php endwhile; ?>


					<?php else : ?>

						<h2>Nothing found</h2>

					<?php endif; ?>

				</div>
			</div> <!-- /grid-9 -->


		</div>
	</div>

	<?php get_footer(); ?>