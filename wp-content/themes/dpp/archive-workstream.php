<?php get_header(); ?>

	<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div class="first-title dashed-bottom">
					<h1> What we do</h1>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>


			</div>

		</div>

		<div class="row">
				<?php $args2 = array(
						'post_type'    => 'workstream',
						'post_status'  => 'publish',
						'orderby' => 'menu_order',
						'post_parent' => 0,
						'order' => 'ASC',
						'posts_per_page' => 8

				); ?>

			<!-- Sidebar -->
						<!-- Sidebar -->
			<div class="side-bar small-12 medium-3 large-3 xlarge-3 columns">
				<nav> 
					<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
				 
						<ul class="clean-list secondary-nav">
							<?php query_posts($args2); ?>
							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

									<li>
										<!-- Block style content -->
										<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</li>

							<?php endwhile; ?>

							<?php else : ?>

								<h2>Not Found</h2>

							<?php endif; ?>
						</ul>
					</div>
				</nav>
			</div>

			<!-- Main content -->
			<div class="small-12 medium-9 large-9 xlarge-9 columns">

				<div class="row">

					<?php query_posts($args2); ?>
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
					 

					<?php else : ?>

						<h2>Not Found</h2>

					<?php endif;

					?>
				</div>

			</div> <!-- /grid-9 -->


		</div>
	</div>

	<?php get_footer(); ?>