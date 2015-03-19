<?php get_header(); ?>



	<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div class="first-title dashed-bottom">
					<p class="likeh1">
						What we do
					</p>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>

			</div>
		</div>
		<div class="row">

			<!-- Sidebar -->
			<div class="small-12 medium-12 large-3 xlarge-3 columns">
				<nav>
					<ul class="clean-list secondary-nav">
						<?php $args1 = array(
							'depth'        => 0,
							'show_date'    => '',
							'date_format'  => get_option('date_format'),
							'child_of'     => 0,
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
							'post_type'    => 'workstream',
						    'post_status'  => 'publish'
						); ?>
						<?php wp_list_pages( $args1 ); ?>

					</ul>
				</nav>
			</div>

			<!-- Main content -->
			<div class="small-12 medium-6 large-6 xlarge-6 columns">

				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article class="post" id="post-<?php the_ID(); ?>">
						<?php if ( has_post_thumbnail()) { ?>
							<div class="single-thumbnail-wrap">
									<?php the_post_thumbnail( '',array( )); ?>
							</div>
						<?php }?>

							<header>
								<h1 class="likeh2"><?php the_title(); ?></h1>
							</header>

							<?php the_content(); ?>


					</article>

				<?php endwhile; endif; ?>
			</div> <!-- /grid-6 -->

			<div class="small-12 medium-3 large-3 xlarge-3 columns">
				<aside>
					<?php
						// Find connected downloads
						$connected = new WP_Query( array(
						  'connected_type' => 'workstream_to_downloads',
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