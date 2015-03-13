<div class="block-content thumbnail-on-left outlined-box for-news">
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<div class="thumbnail-wrap">
		<?php if ( has_post_thumbnail() ) { ?>
			<a href="<?php the_permalink() ?>"> <?php the_post_thumbnail( 'thumbnail',array( 'class'	=> "highlight-bottom")); ?></a>
		<?php } else { ?>
			<a href="<?php the_permalink() ?>"> <img src="<?php bloginfo('template_directory');?>/common/img/thumbnail-default.jpg" alt="" /></a>
		<?php } ?>
		</div>
		<div class="padded-content">
			<header>
				<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

				<!-- Spit out the date only for news item post type -->
				<p class="meta-date">
					 <?php
					 	$post_date = get_the_date( "d/m/y" );
					 	echo $post_date;
					  ?>
				</p>
			</header>
			<p><?php echo excerpt(150); ?></p>
			<a class="more-link chevron-before" href="<?php the_permalink();?>"><span><?php the_field('custom-readmore'); ?></span></a>
		</div>

	</article>
</div>