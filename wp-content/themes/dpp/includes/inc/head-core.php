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
						<?php if ( !is_user_logged_in() ) { echo '<div class="login-register"><a href="/members/">Login</a> | <a hef="/contact-us?membership">Register</a></div>'; } ?> 	

						
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
						<?php wp_nav_menu( array( 'theme_location' =>'top-menu' )); ?>
					</div>
				</div>
 

			</nav>
		</header>
	</div> <!-- /primary-header -->
