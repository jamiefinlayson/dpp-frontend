<?php get_header(); ?>

<?php
						// Find connected downloads
						$connected = new WP_Query( array(
						  'connected_type' => 'workstream_to_downloads',
		                'order' => 'DESC',
		                'orderby' => 'menu_order ID', 
						  'connected_items' => get_queried_object(),
						  'nopaging' => true
						) );
					?>

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
						<!-- Sidebar -->
			<div class="side-bar small-12 medium-5 large-3 xlarge-3 columns">
				<nav> 
					<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
					 
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
					</div>
				</nav>
			</div>

						<!-- Main content -->
			<?php if ( $connected->have_posts() ) :  
			echo "<div class=\"small-12 medium-7 large-6 xlarge-6 columns\">";
			 else:  
			echo "<div class=\"small-12 medium-9 large-9 xlarge-9 columns\">";
			 endif; ?>


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
<?php if ( $connected->have_posts() ) : ?>
			<div class="small-12 medium-7 large-3 xlarge-3 columns pull-right">
				<aside>
					


								 
									<div class="grey-header-box">
										<h3>Related downloads</h3>
											<ul class="clean-list download-list">

											<?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
												<li><a href="<?php the_field('download_link'); ?>"><?php the_title(); ?></a></li>
											<?php endwhile; ?>
												<li class="more-downloads"><a href="/downloads" class="chevron-before"><span>More downloads</span></a></li>
											</ul>
									</div>
							
				</aside>
			</div>
	<?php
								// Prevent weirdness
								wp_reset_postdata();
								endif;
								?>

		</div>
	</div>


<?php get_footer(); ?>