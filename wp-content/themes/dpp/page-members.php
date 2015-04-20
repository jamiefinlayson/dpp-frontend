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
			<div class="small-12 medium-9 large-9 xlarge-9 columns">
				
				<?php if ( !is_user_logged_in() ) {

					echo '<p>Members have access to all DPP documents.</p><p>If you\'re a member please sign in below or <a href="/contact-us?signup=membership">apply for membership</a>.</p>';
					 wp_login_form();
				} 
				else {
					wp_get_current_user();
					echo 'Welcome, ' . $current_user->display_name . '.</p><p>You are logged in and have access to the full range of DPP documents in the <a href="/downloads">downloads</a> area.</p><p>&nbsp;</p>
					<h2>Quick Links</h2><ul class="clean-list tertiary-nav"><li><a href="/">Homepage</a></li><li><a href="/members/password-reset">Change your password</a></li></ul>';
				}

				?>

			</div>



		</div>
	</div>


<?php get_footer(); ?>
