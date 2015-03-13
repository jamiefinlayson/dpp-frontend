<?php get_header(); ?>

	<div class="primary-content site-width">

		<div class="row">
			<div class="grid-12">
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
			<div class="grid-3" role="complementary">
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

			<!-- Main content -->
			<div class="grid-9" role="main">



				<?php query_posts($args2); ?>
				<ul class="clean-list two-per-row block-articles clearfix">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<li>
								<!-- Block style content -->
								<?php get_template_part( 'includes/inc/content', 'block'); ?>
							</li>

					<?php endwhile; ?>
				</ul>

				<?php else : ?>

					<h2>Not Found</h2>

				<?php endif;

				?>


			</div> <!-- /grid-9 -->


		</div>
	</div>

	<?php get_footer(); ?>