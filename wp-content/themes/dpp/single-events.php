<?php get_header(); ?>

<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div class="first-title dashed-bottom">
					<p class="likeh1" id="event-header" data-event-date="<?php the_field('event_date'); ?>">DPP Events</p>

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
					<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
						<ul class="clean-list secondary-nav">
							<!-- List pages of slug 'events'-->
							<?php
							if ( $page = get_page_by_path( 'events' ) ){
							  wp_list_pages( 'orderby=name&depth=1&order=DESC&show_count=0&child_of=' .$page->ID . '&title_li=' );
							}
							?>
						</ul>
					</div>
				</nav>
			</div>


			<!-- Main content -->
			<div class="small-12 medium-9 large-9 xlarge-9 columns">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>


					<article <?php post_class() ?> id="post-<?php the_ID(); ?>" >

						<h1 class="entry-title"><?php the_title(); ?></h1>

						<div class="entry-content">
							<?php if ( has_post_thumbnail()) { ?>
								<div class="single-thumbnail-wrap">
										<?php the_post_thumbnail( '',array( )); ?>
								</div>
							<?php }?>
							<?php the_content(); ?>

						</div>

						<?php edit_post_link('Edit this entry.', '<p class="edit-link">', '</p>'); ?>

					</article>

				<?php endwhile; endif; ?>
			</div>


		</div>
	</div>


<?php get_footer(); ?>
