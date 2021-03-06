<?php
/*
Template Name: Download Archive Template
*/
?>
<?php get_header(); ?>

	<div class="primary-content">

		<div class="row">
			<div class="small-12 medium-12 large-12 xlarge-12 columns">
				<div class="first-title dashed-bottom">
					<p class="likeh1">
						Downloads
					</p>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Sidebar -->
			<div class="side-bar small-12 medium-3 large-3 xlarge-3 columns">
				<nav>  
					<h3 class="submenu-title">Downloads</h3>
					<div class="item-list-tabs no-ajax" id="subnav" role="navigation"> 
						<?php
							//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

							$args = array(
							  'taxonomy'     => 'download-categories',
							  'show_count'   => 0,
							  'pad_counts'   => 0,
							  'hierarchical' => 1,
								'exclude'      => 24,
							  'title_li'     => '',
							  'hide_empty'   => 0
							);


							  ?>

						<ul class="clean-list secondary-nav">
							<?php wp_list_categories( $args ); ?>
						</ul>
					</div>
				</nav>
			</div>

			<!-- Main content -->
			<div class="small-12 medium-9 large-9 xlarge-9 equal columns">
				
		<div class="row"> 

					<?php
					$args2 = array(
					    'hide_empty'    => false,
							  'exclude' 	=> 24
					);

						$tax_terms = get_terms('download-categories', $args2);
						?>
	 
							<?php
							foreach ($tax_terms as $tax_term) {?>
							<?php// var_dump($tax_term); exit;?>
							 
				<div class="small-12 medium-6 large-6 equal columns">
								<div class="block-content outlined-box">
									<article>
										<div class="thumbnail-wrap">

											<?php
											// Get the medium thumbnail associated with each taxonomy term
											$term_id = $tax_term->term_id;
											$image=wp_get_attachment_image_src(get_field('taxonomy_image' , 'download-categories_'  . $term_id), 'medium' );
											?>


											<?php echo '<a href="'. esc_attr(get_term_link($tax_term, $taxonomy)) . '">'; ?> <img src=" <?php echo $image[0] ;?>" /> </a>
										</div>

										<div class="padded-content">
											<header><h2><?php echo '<a href="'. esc_attr(get_term_link($tax_term, $taxonomy)) . '">'; ?>  <?php echo $tax_term->name ?></a></h2></header>
											<p><?php echo $tax_term->description ?></p>
											<?php echo '<a class="chevron-before" href="'. esc_attr(get_term_link($tax_term, $taxonomy)) . '">'; ?><span>Find out more</span></a>
										</div>
									</article>
								</div>
							 

						 

				</div>

							<?php } ?>


				</div>
			</div> <!-- /grid-9 -->




		</div>
	</div>

	<?php get_footer(); ?>