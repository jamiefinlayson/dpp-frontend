
<?php get_header(); ?>

	<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div class="first-title dashed-bottom">
					<h1>
						Downloads
					</h1>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Sidebar -->
			<div class="side-bar small-12 medium-3 large-3 xlarge-3 columns">
				<nav>  
					<h3 class="submenu-title">News</h3>
					<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
					<?php
						//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

						$taxonomy     = 'download-type';
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
				</nav>
			</div>

			<!-- Main content -->
			<div class="small-12 medium-12 large-9 xlarge-9 columns">
				<?php if (have_posts()) : ?>


							<ul class="clean-list block-articles">
								<?php while (have_posts()) : the_post(); ?>

										<li>
											<!-- Block style contnet -->
											<?php get_template_part( 'includes/inc/content', 'block-side-thumb'); ?>
										</li>

								<?php endwhile; ?>
							</ul>

							<?php include (TEMPLATEPATH . '/includes/inc/nav.php' ); ?>

					<?php else : ?>

						<h2>Nothing found</h2>

					<?php endif; ?>


			</div> <!-- /grid-9 -->


		</div>
	</div>

	<?php get_footer(); ?>