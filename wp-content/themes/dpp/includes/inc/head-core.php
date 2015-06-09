<div class="viewport">
		<div class="primary-header">
		<header role="banner">

			<div class="dpp-background">
				<div class="row">
					<div class="small-4 medium-3 large-3 x-large-3 columns">
						<div class="logo">
							<a href="<?php echo get_option('home'); ?>/">
							<!-- Site name on homepage in <h1>-->
							<?php if ( is_home() ) { ?>
								<h1>
							<?php } else { ?>
								<p>
							<?php } ?>
									<?php bloginfo('name'); ?>
							<?php if ( is_home() ) { ?>
								</h1>
							<?php } else { ?>
								</p>
							<?php } ?>
							</a>
						</div> <!-- /logo -->
					</div> <!-- /grid-4 -->

					<div class="small-8 medium-9 large-9 xlarge-9 columns last">
						<?php if ( !is_user_logged_in() ) { echo '<div class="login-register"><a href="/members/">Login</a> | <a href="/contact-us?membership">Register</a></div>'; } ?> 	

						
						<div class="header-copy">
							<h2>The Digital Production Partnership Ltd (DPP) is a not for profit company founded by ITV, BBC and Channel 4 to enable the media industry to maximise the potential of digital in the creation and exploitation of content.</h2>
						</div>
						<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
							<div>
								<input type="text" size="18" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" />
							    <input type="submit" id="searchsubmit" value="Search" class="btn" />
							</div>
						</form>
					</div> 
				</div> <!-- /row -->
			</div>

			<nav class="primary-nav"> 
				<div class="row">
					<div class="small-12 medium-12 xlarge-12">
						<!-- Navigation --> 
						<ul id="menu-primary-navigation" class="menu">
						<?php

						$parent_page_id = 53;
							echo '<li id="who-we-are-links" class="menu-item menu-item-type-post_type menu-item-object-page page_item menu-item-53"><a href="/who-we-are">Who we are</a>';
							echo '<ul>';
								wp_list_pages( array(
								    'child_of' => $parent_page_id,
								    'title_li' => ''
								));
							echo '</li>';
							echo '</ul>';


							echo '<li id="what-we-do-links" class="menu-item menu-item-type-post_type menu-item-object-page page_item menu-item-"><a href="/what-we-do">What we do</a>';
					 
							$args2 = array(
								'post_type'    => 'workstream',
								'post_status'  => 'publish',
								'orderby' => 'menu_order',
								'post_parent' => 0,
								'order' => 'ASC',
								'posts_per_page' => 8
							); 

							echo '<ul>';

							query_posts($args2);
							 if (have_posts()) : while (have_posts()) : the_post(); ?>

								<li>
									<!-- Block style content -->
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</li>


								<?php endwhile;  
								  endif;  

										echo '</ul>'; ?>

								<?php

										echo '<li  id="news-links" class="menu-item menu-item-type-post_type menu-item-object-page page_item menu-item-"><a href="/news">News</a>';
										echo '<ul>';
										wp_get_post_type_archives('news', array('type' => 'yearly', 'show_post_count' => false));

										echo '</li>';	
										echo '</ul>';

										echo '<li id="events-links" class="menu-item menu-item-type-post_type menu-item-object-page page_item menu-item-"><a href="/events">Events</a>';
								 		echo '<ul><li><a href="/events/upcoming-events">Upcoming Events</a></li>';
								 		echo '<li><a href="/events/past-events">Previous Events</a></li></ul>';
										echo '</li>'; 		

								echo '<li id="downloads-links" class="menu-item menu-item-type-post_type menu-item-object-page page_item menu-item-"><a href="/downloads">Downloads</a>';
										echo '</li>'; 		

								echo '<li id="members-links" class="menu-item menu-item-type-post_type menu-item-object-page page_item menu-item-"><a href="/members">Members</a>';
								 		 
										echo '</li>'; 		
								wp_reset_query(); 

								?>
						</ul>

					</div>
				</div>
 

			</nav>
		</header>
	</div> <!-- /primary-header -->
