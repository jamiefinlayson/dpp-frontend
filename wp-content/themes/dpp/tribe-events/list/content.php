<?php
/**
 * List View Content Template
 * The content template for the list view. This template is also used for
 * the response that is returned on list view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/content.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div id="tribe-events-content" class="tribe-events-list">

		<div class="row">

			<!-- Sidebar -->
<!-- Sidebar -->
			<div class="side-bar small-12 medium-3 large-3 xlarge-3 columns">
				<nav> 
					<h3 class="submenu-title">Events</h3>
					<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' =>'events-menu', 'menu_class' => 'menu clean-list secondary-nav', 'container' => false)); ?>
					</div>
				</nav>
			</div>

			<!-- Main content -->
			<div class="small-12 medium-12 large-9 xlarge-9 columns">
  

				<!-- Events Loop -->
				<?php if ( have_posts() ) : ?>
					<?php do_action( 'tribe_events_before_loop' ); ?>
					<?php tribe_get_template_part( 'list/loop' ) ?>
					<?php do_action( 'tribe_events_after_loop' ); ?>
				<?php endif; ?>

			</div>
		</div>
	

</div><!-- #tribe-events-content -->
