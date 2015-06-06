<?php get_header(); ?>

<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div class="first-title dashed-bottom">
					<p class="likeh1">DPP News</p>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>
			</div>
		</div> <!-- /row-->

		<div class="row">
			<!-- Sidebar -->
			<div class="side-bar small-12 medium-5 large-3 xlarge-3 columns">
				<nav> 
					<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
						<ul class="clean-list secondary-nav">
							<!-- Uses plugin specific call to get monthly archives -->
							<?php wp_get_post_type_archives('news', array('type' => 'yearly', 'show_post_count' => false)); ?>
						</ul>
					</div>
				</nav>
				
			</div>


			<!-- Main content -->
			<div class="small-12 medium-7 large-6 xlarge-6 columns">
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
<div class="small-12 medium-7 large-3 xlarge-3 columns pull-right">
		<aside>
						<?php
						// Find connected downloads
						$connected = new WP_Query( array(
						  'connected_type' => 'news_to_downloads',
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
