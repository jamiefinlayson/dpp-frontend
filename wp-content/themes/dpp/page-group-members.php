<?php get_header(); ?>

<div class="primary-content site-width">

		<div class="row">
			<div class="grid-12">
				<div  class="first-title dashed-bottom">
					<h1><?php the_title(); ?></h1>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>


			</div>
		</div> <!-- /row-->

		<div class="row">
			<!-- Sidebar -->
			<div class="grid-3" role="complementary">
				<nav>
					<ul class="clean-list secondary-nav">
						<?php
						// Get the id of the top level parent post
						if ($post->post_parent)	{
							$ancestors=get_post_ancestors($post->ID);
							$root=count($ancestors)-1;
							$parent = $ancestors[$root];
						} else {
							$parent = $post->ID;
						}



						// Use parent id to create the page list
						$args1 = array(
							'depth'        => 0,
							'show_date'    => '',
							'date_format'  => get_option('date_format'),
							'child_of'     => $parent,
							'exclude'      => '',
							'include'      => '',
							'title_li'     => __(''),
							'echo'         => 1,
							'authors'      => '',
							'sort_column'  => 'menu_order',
							'sort_order'   => 'ASC',
							'link_before'  => '',
							'link_after'   => '',
							'walker'       => '',
							'post_type'    => 'page',
						    'post_status'  => 'publish'
						);

						// List pages based on $args
						 wp_list_pages( $args1 ); ?>


					</ul>
				</nav>
			</div>

			<!-- Main content -->
			<div class="grid-9" role="main">
				<?php $groupMembers = array(
						'showposts' => -1,
						'post_type' => 'members',
						'orderby' => 'menu_order',
						'order' => 'ASC',
					); ?>

				<?php query_posts($groupMembers); ?>
				<ul class="clean-list block-articles">
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

						<!-- Block style contnet -->
						<li>
							<?php get_template_part( 'includes/inc/content', 'block-members'); ?>
						</li>


					<?php endwhile; endif; ?>
				</ul>


						<a href="#back-to-top" class="back-to-top">Back to the top</a>


			</div>



		</div>
	</div>


<?php get_footer(); ?>