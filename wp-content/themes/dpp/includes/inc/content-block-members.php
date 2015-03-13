<div class="block-content thumbnail-on-left for-members">
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">

		<div class="thumbnail-wrap">
		<?php if ( has_post_thumbnail() ) { ?>
			<?php the_post_thumbnail( 'members',array( 'class'	=> "highlight-bottom")); ?>
		<?php } else { ?>
			<img src="<?php bloginfo('template_directory');?>/common/img/thumbnail-default.jpg" class="profile-default"/>
		<?php } ?>
		</div>
		<div class="padded-content">
			<header>
				<hgroup>
						<h2><?php the_title(); ?></h2>
						<h3 class="likeBody member-position"><?php the_field('member_position'); ?></h3>
				</hgroup>
			</header>
			<?php the_content(); ?>
		</div>

	</article>
</div>