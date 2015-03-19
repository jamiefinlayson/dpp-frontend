<?php get_header(); ?>
		<?php

			$current_year = date('Y');
			//print_r($wp_query->query_vars);

			// Get the year parameter off the query string - if none set it to current year
			$queryYear = get_query_var('year');
			if (!$queryYear) {
				$queryYear = $current_year;
			}
		?>
	<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div class="first-title dashed-bottom">
					<?php if (have_posts()) : ?>

				 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

							<?php /* If this is a category archive */ if (is_category()) { ?>
								<h1>DPP Archive for the &#8216;<?php single_cat_title(); ?>&#8217; Category</h1>

							<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
								<h1>Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h1>

							<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
								<h1>DPP Archive for <?php the_time('F jS, Y'); ?></h1>

							<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
								<h1>DPP <?php post_type_archive_title(); ?> Archive for <?php the_time('F, Y'); ?></h1>

							<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
								<h1 id="archive-title" class="pagetitle" data-year="<?php the_time('Y'); ?>">
									<?php if($queryYear == $current_year) { ?>
										DPP News
									<?php } else { ?>
									DPP <?php post_type_archive_title(); ?> from <?php the_time('Y'); ?>
									<?php }; ?>
								</h1>

							<?php /* If this is an author archive */ } elseif (is_author()) { ?>
								<h1 class="pagetitle">DPP Author Archive</h1>

							<?php /* If this is a paged archive */ } else /*if (isset($_GET['paged']) && !empty($_GET['paged']))*/ { ?>
								<h1 class="pagetitle">DPP <?php post_type_archive_title(); ?></h1>
							<?php } ?>
					<?php endif; ?>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>
			</div>
		</div>
		<div class="row">

			<!-- Sidebar -->
			<div class="small-12 medium-12 large-3 xlarge-3 columns">
				<ul class="clean-list secondary-nav" id="news-archive-menu">
					<!-- Uses plugin specific call to get monthly archives -->
					<?php wp_get_post_type_archives('news', array('type' => 'yearly', 'show_post_count' => false)); ?>


				</ul>
			</div>

			<!-- Main content -->

			<div class="small-12 medium-12 large-9 xlarge-9 columns">


				<?php

					$args = array(
					'year'     => $queryYear,
					'order'    => 'DESC',
					'post_type' => 'news'
				);
				?>
				<?php query_posts( $args ); ?>
				<?php if (have_posts()) : ?>

					<?php include (TEMPLATEPATH . '/includes/inc/nav.php' ); ?>

					 
						<?php while (have_posts()) : the_post(); ?>

								  
									<!-- Block style contnet -->
									<?php get_template_part( 'includes/inc/content', 'block-side-thumb'); ?>
								 

						<?php endwhile; ?>
					 

					<?php include (TEMPLATEPATH . '/includes/inc/nav.php' ); ?>

					<?php else : ?>

						<h2>Nothing found</h2>

					<?php endif; ?>


			</div> <!-- /grid-9 -->


		</div>
	</div>

	<?php get_footer(); ?>