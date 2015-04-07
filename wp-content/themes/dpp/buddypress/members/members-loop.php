<?php

/**
 * BuddyPress - Members Loop
 *
 * Querystring is set via AJAX in _inc/ajax.php - bp_legacy_theme_object_filter()
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 */

?>

<?php do_action( 'bp_before_members_loop' ); ?>
<?php if ( !is_user_logged_in() ) {
	echo 'Members have access to all DPP documents. If you\'re a member please <a href="/wp-admin">sign in</a> or apply for <a href="/register">membership</a>.';
}
else { ?>

<?php if ( bp_has_members( bp_ajax_querystring( 'members' ) ) ) : ?>



<div class="row"> 
	<div class="small-12 medium-12 large-12 xlarge-12 columns">

		<p>To view reports click <a href="/downloads">here</a> or go to your <?php echo '<a href="' . bp_loggedin_user_domain( '/' ) . '">' . __('profile') . '</a>'; ?>.</p>
	</div> 
</div>
	<div id="pag-top" class="pagination">

		<div class="pag-count" id="member-dir-count-top">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-dir-pag-top">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

	<?php do_action( 'bp_before_directory_members_list' ); ?>



	<?php bp_member_hidden_fields(); ?>

	<div id="pag-bottom" class="pagination">

		<div class="pag-count" id="member-dir-count-bottom">

			<?php bp_members_pagination_count(); ?>

		</div>

		<div class="pagination-links" id="member-dir-pag-bottom">

			<?php bp_members_pagination_links(); ?>

		</div>

	</div>

<?php else: ?>

	<div id="message" class="info">
		<p><?php _e( "Sorry, no members were found.", 'buddypress' ); ?></p>
	</div>

<?php endif; } ?> 


<?php do_action( 'bp_after_members_loop' ); ?>
