<?php

/**
 * BuddyPress - Users Header
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php do_action( 'bp_before_member_header' ); ?>

<div class="row"> 
	<div class="small-12 medium-12 large-12 xlarge-12 columns">
		<div class="block-content thumbnail-on-left for-members"> 
			<div class="thumbnail-wrap">
				<a href="<?php bp_displayed_user_link(); ?>">
					<?php bp_displayed_user_avatar( 'type=full' ); ?>
				</a>
			</div> 
			<div class="padded-content">
				<header>
					<hgroup>
						<?php if ( bp_is_active( 'activity' ) && bp_activity_do_mentions() ) : ?>
							<h2 class="user-nicename">@<?php bp_displayed_user_mentionname(); ?> <?php

										$yourWord=pc_get_userrole(bp_current_user_id());
										$targets = array("vendor", "consultant", "broadcaster", "administrator");

										if (in_array($yourWord, $targets)) {

										     echo '<span class="capitalize">(' . $yourWord . ')</span>';
										}

									?></h2>
						<?php endif; ?>

						<span class="activity"><?php bp_last_activity( bp_displayed_user_id() ); ?></span>

						<?php do_action( 'bp_before_member_header_meta' ); ?>		 

						<?php if ( bp_is_active( 'activity' ) ) : ?>

							<div id="latest-update">

								<?php bp_activity_latest_update( bp_displayed_user_id() ); ?>
								

							</div>

						<?php endif; ?>
					</hgroup>
				</header>
			</div>
			<div class="padded-text">
					
					<?php if ( is_user_logged_in() ) :

						$user_meta = get_userdata(bp_displayed_user_id());
						echo($user_meta->description); 
						endif;
					?>
			 
					<div id="item-buttons">

						<?php do_action( 'bp_member_header_actions' ); ?>

					</div><!-- #item-buttons -->

					<?php
					/***
					 * If you'd like to show specific profile fields here use:
					 * bp_member_profile_data( 'field=About Me' ); -- Pass the name of the field
					 */
					 do_action( 'bp_profile_header_meta' );

					 ?>

			</div> 
		</div>
	</div>
</div>
<div class="row"> 
	<div class="small-12 medium-12 large-12 xlarge-12 columns">

			<?php do_action( 'bp_after_member_header' ); ?>

			<?php do_action( 'template_notices' ); ?>
 
	</div>
</div>