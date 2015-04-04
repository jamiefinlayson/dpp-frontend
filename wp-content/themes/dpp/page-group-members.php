<?php get_header(); ?>

<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div  class="first-title dashed-bottom">
					<h1><?php the_title(); ?></h1>

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
					<?php
						if($post->post_parent) {
							$children = wp_list_pages("title_li=&child_of=".$post->post_parent."&echo=0&depth=2");
						}
						else {
							$children = wp_list_pages("title_li=&child_of=".$post->ID."&echo=0&depth=2");
						}
						if ($children) {
							$parent_title = get_the_title($post->post_parent);
						}
					?>
					<h3 class="submenu-title"><?php echo $parent_title;?></h3>
					<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
					 
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
					</div>
				</nav>
			</div>

			<!-- Main content -->
			<div class="small-12 medium-9 large-9 xlarge-9 columns">
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
