<div class="block-content thumbnail-on-left for-downloads">
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">



		<div class="thumbnail-wrap">
			<?php
			//Returns Array of Terms
			$term_list = wp_get_post_terms($post->ID, 'download-file-type', array("fields" => "all"));
			//print_r($term_list[0]);
			$term_id = $term_list[0]->term_id;
			$term_name = $term_list[0]->name;
			$image = wp_get_attachment_image_src(get_field('taxonomy_image' , 'download-file-type_'  . $term_id));
			?>


			<img src=" <?php echo $image[0] ;?>" />
		</div>

		<div class="padded-content">
			<header>
				<h2><?php the_title(); ?></h2>

				<!-- <p class="meta-date">Last updated
					 <?php /*
					 	// Display the custom field for updated date otherwise use the post modified date
					 	if (get_field('download_updated_date')) {
					 		$date = DateTime::createFromFormat('Ymd', get_field('download_updated_date'));
							echo $date->format('d/m/y');
					 	} else {
					 		$post_date = the_modified_date( "d/m/y" );
					 		echo $post_date;
					 	}
*/
					  ?>


				</p> -->

			</header>
			<?php echo the_content(); ?>
			<a class="more-link chevron-before" href="<?php the_field('download_link'); ?>"><span>Download <?php  echo $term_name; ?> file</span></a>
		</div>

	</article>
</div>