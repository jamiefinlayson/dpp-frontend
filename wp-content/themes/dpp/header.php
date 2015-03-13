<!DOCTYPE html>

<!--[if lt IE 7 ]> <html class="ie ie6 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7 ]>    <html class="ie ie7 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8 ]>    <html class="ie ie8 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9 ]>    <html class="ie ie9 no-js" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<!-- the "no-js" class is for Modernizr. -->

<head data-template-set="html5-reset-wordpress-theme" profile="http://gmpg.org/xfn/11">

	<meta charset="<?php bloginfo('charset'); ?>">

	<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" />
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		      	/* Custom Titles for Archive pages (workstreams, news etc) */
		      	$archiveType = trim(wp_title('',false));
		      	if($archiveType == 'Workstreams') {
		      		$rewriteArchiveTitle = "What we do";
		      		echo $rewriteArchiveTitle . ' - ';
		      	} elseif ($archiveType == 'News') {
		      		$rewriteArchiveTitle = "News";
		      		echo $rewriteArchiveTitle . ' - ';
		      	} else {
		      		wp_title(''); echo ' News  - ';
		      	}

		      }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - ';
		      }
		      if (is_home()) {
		         bloginfo('name'); //echo ' - '; bloginfo('description');
		      }
		      else {
		          bloginfo('name');
		      }

		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>


	<!-- Dublin Core Metadata : http://dublincore.org/ -->
	<meta name="DC.title" content="<?php echo  bloginfo('name'); ?>">
	<meta name="DC.subject" content="<?php echo  bloginfo('description'); ?>">
	<!-- <meta name="DC.creator" content="Who made this site."> -->

	<!--  Mobile Viewport meta tag
	j.mp/mobileviewport & davidbcalhoun.com/2010/viewport-metatag
	device-width : Occupy full width of the screen in its current orientation
	initial-scale = 1.0 retains dimensions instead of zooming out if page height > device height
	maximum-scale = 1.0 retains dimensions instead of zooming in if page width < device width -->
	<!-- Uncomment to use; use thoughtfully!
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	-->

	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/common/img/favicon.ico">
	<!-- This is the traditional favicon.
		 - size: 16x16 or 32x32
		 - transparency is OK
		 - see wikipedia for info on browser support: http://mky.be/favicon/ -->

	<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/common/img/apple-touch-icon.png">
	<!-- The is the icon for iOS's Web Clip.
		 - size: 57x57 for older iPhones, 72x72 for iPads, 114x114 for iPhone4's retina display (IMHO, just go ahead and use the biggest one)
		 - To prevent iOS from applying its styles to the icon name it thusly: apple-touch-icon-precomposed.png
		 - Transparency is not recommended (iOS will put a black BG behind the icon) -->

	<!-- CSS: screen, mobile & print are all in the same file -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

	<!-- all our JS is at the bottom of the page, except for Modernizr. -->
	<script src="<?php bloginfo('template_directory'); ?>/common/js/modernizr-1.7.min.js"></script>

	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php //if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> id="back-to-top">


	<div class="viewport">
		<div class="primary-header">
		<header role="banner">

			<div class="site-width dpp-background">
				<div class="row">
					<div class="grid-4 push-3">
						<div class="logo">
							<a href="<?php echo get_option('home'); ?>/">
							<!-- Site name on homepage in <h1>-->
							<?php if ( is_home() ) { ?>
								<h1>
							<?php } else { ?>
								<p>
							<?php } ?>
									<?php bloginfo('name'); ?>
							<?php if ( is_home() ) { ?>
								</h1>
							<?php } else { ?>
								</p>
							<?php } ?>
							</a>
						</div> <!-- /logo -->
					</div> <!-- /grid-4 -->

					<div class="grid-5">
						<div class="header-copy">
							<h2>The Digital Production Partnership (DPP) is<br /> an initiative formed by the UK's public service broadcasters to help producers and broadcasters maximise the potential of digital production.</h2>
						</div>
					</div>
				</div> <!-- /row -->
			</div>

			<nav class="primary-nav">
					<div class="site-width">
						<div class="row">
							<div class="grid-12">
								<!-- Navigation -->
								<?php wp_nav_menu( array( 'theme_location' =>'top-menu' )); ?>
							</div>
						</div>

					</div>

			</nav>
		</header>
	</div> <!-- /primary-header -->


