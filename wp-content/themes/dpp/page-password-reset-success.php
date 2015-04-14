<?php get_header(); ?>

<div class="primary-content">

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
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


			<!-- Main content -->
			<div class="small-12 medium-9 large-9 xlarge-9 columns">


				<article <?php post_class() ?> id="post-<?php the_ID(); ?>" >
 

					<div class="entry-content">

						<p>You have successfully changed your password. </p>
						<p>&nbsp;</p> 
						<h2>Quick Links</h2>
						<ul class="clean-list tertiary-nav">
							<li><a href="/">Homepage</a></li>
							<li><a href="/members">Members</a></li>
						</ul>

					</div>


				</article>


			</div>



		</div>

	<?php endwhile; endif; ?>	

</div>


<?php get_footer(); ?>
