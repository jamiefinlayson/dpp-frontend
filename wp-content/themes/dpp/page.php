<?php get_header(); ?>

<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div class="first-title dashed-bottom">
					<h1><?php the_title(); ?></h1>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>
			</div>
		</div> <!-- /row-->

		<div class="row">
			<!-- Sidebar -->
			<div class="side-bar small-12 medium-12 large-3 xlarge-3 columns">
 

				<nav>
				<div class="sub-nav small-12 medium-12 large-12 xlarge-12 columns">
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
			<div class="small-12 medium-12 large-9 xlarge-9 columns">


				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article class="post" id="post-<?php the_ID(); ?>">


						<?php //include (TEMPLATEPATH . '/includes/inc/meta.php' ); ?>

						<div class="entry">

							<?php the_content(); ?>

							<?php wp_link_pages(array('before' => 'Pages: ', 'next_or_number' => 'number')); ?>

						</div>

						<?php edit_post_link('Edit this entry.', '<p class="edit-link">', '</p>'); ?>

					</article>

					<?php // comments_template(); ?>

					<?php endwhile; endif; ?>
			</div>



		</div>
	</div>


<?php get_footer(); ?>
