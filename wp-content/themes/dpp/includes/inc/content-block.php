<div class="block-content outlined-box standard-block">
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<div class="thumbnail-wrap">
			<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink() ?>"> <?php the_post_thumbnail( 'medium', array( 'class'	=> "highlight-bottom")); ?></a>
			<?php } else { ?>
				<a href="<?php the_permalink() ?>"> <img class="highlight-bottom" src="<?php bloginfo('template_directory');?>/common/img/thumbnail-medium-default.jpg" alt=""/></a>
			<?php } ?>
		</div>
		<div class="padded-content">
			<header>
				<h2 class="likeH3"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

				<!-- Spit out the date only for news item post type -->
				<?php if (  get_post_type() =='news-item' ) { ?>
					<p class="meta-date">
						 <?php
						 	$post_date = get_the_date( "j F Y" );
						 	echo $post_date;
						  ?>
				 <?php } ?>
			</header>
			<p><?php echo excerpt(120); ?></p>
			<a class="more-link chevron-before" href="<?php the_permalink();?>"><span><?php the_field('custom-readmore'); ?></span></a>
		</div>

	</article>
</div>