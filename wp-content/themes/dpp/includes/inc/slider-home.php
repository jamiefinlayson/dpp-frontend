<div class="news-slider">
		<div class="flexslider row">
			<ul class="slides">


			<?php // The Query

			$newsSliderArgs = array(
				'post_type' => 'news',
				'showposts'  => 3,
                'order' => 'DESC',
                'orderby' => 'menu_order ID' 
			);

			$newsSlider = new WP_Query($newsSliderArgs);

			// The Loop
			while ( $newsSlider->have_posts() ) :  $newsSlider->the_post(); ?>

				<li> 
						<section>
							<div class="slider-copy">

			<div class="column">
								<header>
									<h2 class="likeh1"><?php the_title(); ?></h2>
								</header>
								<p><?php echo excerpt(120); ?></p>
								<a href="<?php the_permalink(); ?>" class="btn"><span><?php the_field('custom-readmore');?></span></a>
							</div></div>
						</section>
 

				</li>

			<?php endwhile;

			/* Restore original Post Data
			 * NB: Because we are using new WP_Query we aren't stomping on the
			 * original $wp_query and it does not need to be reset.
			*/
			wp_reset_postdata();
			?>



			</ul>
		</div> <!-- /flexslider -->
	 
</div> <!-- /news-slider-->