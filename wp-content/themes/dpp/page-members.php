<?php get_header(); ?>
<?php
						// Find connected downloads
						$connected = new WP_Query( array(
						  'connected_type' => 'pages_to_downloads',
		                'order' => 'DESC',
		                'orderby' => 'menu_order ID', 
						  'connected_items' => get_queried_object(),
						  'nopaging' => true
						) );
					?>
<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div  class="first-title dashed-bottom">
					<h1>Members</h1>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>


			</div>
		</div> <!-- /row-->

		<div class="row">
 

						<!-- Main content -->
			<?php if ( $connected->have_posts() ) :  
			echo "<div class=\"small-12 medium-7 large-6 xlarge-6 columns\">";
			 else:  
			echo "<div class=\"small-12 medium-12 large-9 xlarge-9 columns\">";
			 endif; ?>

				 
				<?php if ( !is_user_logged_in() ) {
				$recent = new WP_Query("page_id=3928"); while($recent->have_posts()) : $recent->the_post();
				 
				the_content(); 
				endwhile; 
					
					 wp_login_form();

				} 
				else {
					wp_get_current_user();
					echo 'Welcome, ' . $current_user->display_name . '.</p>';

					the_content();
				}

				?>

			</div>
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
