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
			<!-- Sidebar -->
						<!-- Sidebar -->
			<div class="side-bar small-12 medium-3 large-3 xlarge-3 columns">
				<nav>  
					<h3 class="submenu-title">Members</h3>
					<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
					 
						<ul class="clean-list secondary-nav">
							 
						</ul>
					</div>
				</nav>
			</div>

			<!-- Main content -->
			<div class="small-12 medium-9 large-9 xlarge-9 columns">
				
				<?php if ( !is_user_logged_in() ) {

					echo '<p>Members have access to all DPP documents. If you\'re a member please sign in or apply for <a href="/contact-us?membership">membership</a>.</p>';
					 wp_login_form();
				} 
				else {
					wp_get_current_user();
					echo 'Welcome, ' . $current_user->display_name . '. You are logged in and have access to the full range of DPP documents in the <a href="/downloads">downloads</a> area. </p>';
				}

				?>

			</div>



		</div>
	</div>


<?php get_footer(); ?>
