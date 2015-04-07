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
		</div>
		<div class="row"> 
			<!-- Sidebar -->
			<div class="side-bar small-12 medium-3 large-3 xlarge-3 columns">
				<nav> 
					<h3 class="submenu-title">Events</h3>
					<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' =>'events-menu', 'menu_class' => 'menu clean-list secondary-nav', 'container' => false)); ?>
					</div>
				</nav>
			</div>

			<!-- Main content -->

			<div class="small-12 medium-9 large-9 xlarge-9 columns">
				<?php
					$today = date('Ymd'); //define “today” format;
				 ?>

				<?php
					/*
					* Query to compare events with todays date and show events in future
					*/
					$eventsArgs = array(
					'post_type' => 'events',
				    //'paged' => $paged,
				    'meta_key' => 'event_date',
				    'orderby' => 'meta_value',
				    'order' => 'DESC',
				    'meta_query' => array(
				         array(
				         'key' => 'event_date',
				         'meta-value' => $value, //value of “order-date” custom field
				         'value' => $today, //value of “today”
				         'compare' => '<=', //show events greater than or equal to today
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

					<?php else : ?>

						<h2>Nothing found</h2>

					<?php endif; ?>


			</div> <!-- /grid-9 -->


		</div>
	</div>

	<?php get_footer(); ?>