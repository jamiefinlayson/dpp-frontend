<?php
/*
* The template used for a static front page
*/
?>

<?php get_header(); ?>

	<!-- Home Slider -->
	<?php get_template_part( 'includes/inc/slider', 'home'); ?>
 						 
		<div class="primary-content row">
			<div class="small-12 medium-12 large-9 xlarge-9 columns">
				<section >

					<h2 class="likeh1">Quick Links</h2>
					<?php $quickLinks = array(
						'showposts' => 4,
						'post_type' => array( 'workstream', 'page', 'news' ),
						'orderby' => 'meta_value',
						'order' => 'ASC',
						'meta_key' => 'promotion_order',
						'meta_query' => array(
					        array(
					            'key' => 'promote_on_homepage',
					            'value'=>'Yes',
					            'compare' => 'LIKE'
					        )
					    )
					); ?> 

					<div class="row">
						<?php query_posts($quickLinks); ?>
						<?php $i = 1; ?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<!-- Clear first item in row -->
							<?php if($i%2 == 0) : ?>
								<div class="small-12 medium-6 large-6 equal columns">
							<?php else : ?>
								<div class="clear small-12 medium-6 large-6 equal columns">
							<?php endif; ?>

								<!-- Block style content -->
								<?php get_template_part( 'includes/inc/content', 'block'); ?>
							 	</div>
							<?php $i++; ?>
						<?php endwhile; ?>
					 
					</div>
					<?php else : ?>

						<h2>No Workstream posts found</h2>

					<?php endif; ?>
					<?php wp_reset_query(); ?>
				</section>

			</div> <!-- /grid-9 -->



test
			<div class="small-12 medium-12 large-3 xlarge-3 columns">
				<aside >
					<?php get_sidebar(); ?>
				</aside>
			</div>
		</div> 

<?php get_footer(); ?>
