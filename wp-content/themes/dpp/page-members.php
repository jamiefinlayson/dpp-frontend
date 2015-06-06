<?php get_header(); ?>

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
			<div class="small-12 medium-7 large-6 xlarge-6 columns">
				
				<?php if ( !is_user_logged_in() ) {

					echo '<p>Members have access to all DPP documents.</p><p>If you\'re a member please sign in below or <a href="/contact-us?membership">apply for membership</a>.</p>';
					 wp_login_form();
				} 
				else {
					wp_get_current_user();
					echo 'Welcome, ' . $current_user->display_name . '.</p><p>You are logged in and have access to the full range of DPP documents in the <a href="/downloads">downloads</a> area.</p><p>&nbsp;</p>
					<h2>Quick Links</h2><ul class="clean-list tertiary-nav"><li><a href="/">Homepage</a></li><li><a href="/wordpress/wp-admin/profile.php">Change your password</a></li></ul>';
				}

				?>

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
