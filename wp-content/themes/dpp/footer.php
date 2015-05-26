
<?php get_template_part( 'includes/inc/foot', 'core'); ?>
	<?php wp_footer(); ?>


<!-- here comes the javascript -->
<script src="<?php bloginfo('template_directory'); ?>/common/js/libs/jquery.flexslider-min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/common/js/libs/jquery.scrollToFixed.js"></script>
<!-- jQuery is called via the Wordpress-friendly way via functions.php -->

 <!-- this is where we put our custom functions -->
<script src="<?php bloginfo('template_directory'); ?>/common/js/functions.js"></script>

 
 <script>
 jQuery(document).ready(function($){
    $(document).foundation();
    });
  </script>
</body>

</html>
