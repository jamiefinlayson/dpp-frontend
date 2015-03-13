<?php
/*
Template Name: Download Archive Template
*/
?>
<?php get_header(); ?>

	<div class="primary-content site-width">

		<div class="row">
			<div class="grid-12">
				<div class="first-title dashed-bottom">
					<h1>
						Downloads
					</h1>

					<!-- Include share buttons -->
					<?php include'includes/inc/share-btns.php'; ?>
				</div>
			</div>
		</div>

		<div class="row">

			<!-- Sidebar -->
			<div class="grid-3" role="complementary">

					<?php
						//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

						$args = array(
						  'taxonomy'     => 'download-categories',
						  'show_count'   => 0,
						  'pad_counts'   => 0,
						  'hierarchical' => 1,
						  'title_li'     => '',
						  'hide_empty'   => 0
						);


						  ?>

				<ul class="clean-list secondary-nav">
					<?php wp_list_categories( $args ); ?>
				</ul>
			</div>

			<!-- Main content -->
			<div class="grid-9" role="main">

				<?php
				$args2 = array(
				    'hide_empty'    => false,
				);

					$tax_terms = get_terms('download-categories', $args2);
					?>

					<ul class="clean-list two-per-row block-articles clearfix">
						<?php
						foreach ($tax_terms as $tax_term) {?>
						<?php// var_dump($tax_term); exit;?>
						<li>
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
						</li>
						<?php } ?>

					</ul>




			</div> <!-- /grid-9 -->


		</div>
	</div>

	<?php get_footer(); ?>