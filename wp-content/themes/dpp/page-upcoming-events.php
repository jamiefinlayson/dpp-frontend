<?php get_header(); ?>

	<div class="primary-content">

		<div class="row">
			<div class="grid-12">
				<div class="first-title dashed-bottom">
					<h1><?php the_title(); ?></h1>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>
			</div>
		</div>
		<div class="row">

			<!-- Sidebar -->
			<div class="small-12 medium-12 large-3 xlarge-3 columns">
				<ul class="clean-list secondary-nav">
					<?php
						// Get the id of the top level parent post
						if ($post->post_parent)	{
							$ancestors=get_post_ancestors($post->ID);
							$root=count($ancestors)-1;
							$parent = $ancestors[$root];
						} else {
							$parent = $post->ID;
						}

						// Use parent id to create the page list
						$args1 = array(
							'depth'        => 0,
							'show_date'    => '',
							'date_format'  => get_option('date_format'),
							'child_of'     => $parent,
							'exclude'      => '',
							'include'      => '',
							'title_li'     => __(''),
							'echo'         => 1,
							'authors'      => '',
							'sort_column'  => 'menu_order',
							'sort_order'   => 'ASC',
							'link_before'  => '',
							'link_after'   => '',
							'walker'       => '',
							'post_type'    => 'page',
						    'post_status'  => 'publish'
						);

						// List pages based on $args
						 wp_list_pages( $args1 ); ?>



				</ul>
			</div>

			<!-- Main content -->

			<div class="small-12 medium-12 large-9 xlarge-9 columns">
				<?php
					$today = date('Ymd'); //define “today” format;
				 ?>

				<?php
					/*
					* Query to compare events with todays date and show events in future
					*/
					$eventsArgs = array(
					'post_type' => 'events',
				    //'posts_per_page' => 5,
				    //'paged' => $paged,
				    'meta_key' => 'event_date',
				    'orderby' => 'meta_value',
				    'order' => 'ASC',
				    'meta_query' => array(
				         array(
				         'key' => 'event_date',
				         'meta-value' => $value, //value of “order-date” custom field
				         'value' => $today, //value of “today”
				         'compare' => '>=', //show events greater than or equal to today
				         'type' => 'CHAR'
				         )
					)
					); ?>


				<?php $eventsQuery = new WP_Query( $eventsArgs );?>

				<?php if ($eventsQuery->have_posts()) : ?>

							<ul class="clean-list block-articles">
								<?php while ($eventsQuery->have_posts()) : $eventsQuery->the_post(); ?>

										<li>
											<?php get_template_part( 'includes/inc/content', 'block-event'); ?>
										</li>

								<?php endwhile;
								wp_reset_postdata();
								?>

							</ul>

							<?php include (TEMPLATEPATH . '/includes/inc/nav.php' ); ?>

					<?php else : ?>

						<h2>Nothing found</h2>

					<?php endif; ?>


			</div> <!-- /grid-9 -->


		</div>
	</div>

	<?php get_footer(); ?>