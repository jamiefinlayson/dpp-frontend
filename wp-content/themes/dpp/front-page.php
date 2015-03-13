<?php
/*
* The template used for a static front page
*/
?>

<?php get_header(); ?>

	<!-- Home Slider -->
	<?php get_template_part( 'includes/inc/slider', 'home'); ?>

	<div class="primary-content site-width">
		<div class="row">
			<div class="grid-9" role="main">
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

					<ul class="clean-list block-articles two-per-row">
						<?php query_posts($quickLinks); ?>
						<?php $i = 1; ?>
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<!-- Clear first item in row -->
							<?php if($i%2 == 0) : ?>
								<li class="">
							<?php else : ?>
								<li class="clear">
							<?php endif; ?>

								<!-- Block style contnet -->
								<?php get_template_part( 'includes/inc/content', 'block'); ?>
							</li>
							<?php $i++; ?>
						<?php endwhile; ?>
					</ul>

					<?php else : ?>

						<h2>Not Workstream posts found</h2>

					<?php endif; ?>
					<?php wp_reset_query(); ?>
				</section>

			</div> <!-- /grid-9 -->




			<div class="grid-3">
				<aside  role="complementary">
					<?php get_sidebar(); ?>
				</aside>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
