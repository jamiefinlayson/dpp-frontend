<?php get_header(); ?>

<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div class="first-title dashed-bottom">
					<p class="likeh1" id="event-header" data-event-date="<?php the_field('event_date'); ?>">DPP Events</p>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>
			</div>
		</div> <!-- /row-->

		<div class="row">
			<!-- Sidebar -->
			<div class="side-bar small-12 medium-5 large-3 xlarge-3 columns">

				<nav class="mini-menus small-12 medium-12 large-12 xlarge-12 columns"> 
					<h3 class="submenu-title">Events</h3>
					<div class="item-list-tabs no-ajax" id="subnav" role="navigation"><ul><li><span class="drop"><strong>Events<i></i></strong></span> 
						<ul class="clean-list secondary-nav">
						<li class="page_item page-item-164"><a href="/events/upcoming-events/">Upcoming Events</a></li>
							<li class="page_item page-item-168"><a href="/events/past-events/">Previous Events</a></li>



						</ul>
					</li></ul></div>
				</nav>
			</div>


			<!-- Main content -->
			<div class="small-12 medium-7 large-6 xlarge-6 columns">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


					<article <?php post_class() ?> id="post-<?php the_ID(); ?>" >

						<h1 class="entry-title"><?php the_title(); ?></h1>

						<div class="entry-content">
							<?php if ( has_post_thumbnail()) { ?>
								<div class="single-thumbnail-wrap">
										<?php the_post_thumbnail( '',array( )); ?>
								</div>
							<?php }?>
							<?php the_content(); ?>

						</div>

						<?php edit_post_link('Edit this entry.', '<p class="edit-link">', '</p>'); ?>

					</article>

				<?php endwhile; endif; ?>
			</div>
			<div class="small-12 medium-7 large-3 xlarge-3 columns pull-right">
				<aside>
					<?php
						// Find connected downloads
						$connected = new WP_Query( array(
						  'connected_type' => 'events_to_downloads',
		                'order' => 'DESC',
		                'orderby' => 'menu_order ID', 
						  'connected_items' => get_queried_object(),
						  'nopaging' => true
						) );
					?>


								<?php if ( $connected->have_posts() ) : ?>
									<div class="grey-header-box">
										<h3>Related downloads</h3>
											<ul class="clean-list download-list">

											<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
												<li><a href="<?php the_field('download_link'); ?>"><?php the_title(); ?></a></li>
											<?php endwhile; ?>
												<li class="more-downloads"><a href="/downloads" class="chevron-before"><span>More downloads</span></a></li>
											</ul>
									</div>
								<?php
								// Prevent weirdness
								wp_reset_postdata();
								endif;
								?>

				</aside>
			</div>

		</div>
	</div>


<?php get_footer(); ?>
