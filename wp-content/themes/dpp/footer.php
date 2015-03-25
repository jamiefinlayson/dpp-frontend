<div class="primary-footer dashed-top">
    <footer> 
            <div class="row">

                <div class="small-12 medium-5 xlarge-5 columns">
                    <!--<p class="small-text">The partnership is funded by ITV, BBC and Channel 4 with representation from Channel 5, Sky, S4/C, UKTV, BT Sport and the Independent sector on its working groups.</p>-->
                    <p class="small-text">DPP is a registered trademark in the UK.</p>
                    <!-- Spit out hte top-menu (user editable in CMS) -->
                     <?php wp_nav_menu( array( 'theme_location' =>'footer-menu', 'menu_class' => 'menu clean-list',)); ?>


                </div> <!-- /grid-5 -->

                <div class="small-12 medium-7 xlarge-7 columns">
                    <ul class="clean-list footer-logos">
                      <li class="first-item"><a target="_blank" href="http://www.bbc.co.uk"><img src="<?php bloginfo('template_directory'); ?>/common/img/logos/bbc.png" alt="BBC" /></a></li>
                      <li><a target="_blank" href="http://www.itv.com/"><img src="<?php bloginfo('template_directory'); ?>/common/img/logos/itv.png" alt="ITV" /></a></li>
                      <li><a target="_blank" href="http://www.channel4.com"><img src="<?php bloginfo('template_directory'); ?>/common/img/logos/channel4.png" alt="Channel 4" /></a></li>
                      
                      <li class="first-item"><a target="_blank" href="https://www.btsport.com/"><img src="<?php bloginfo('template_directory'); ?>/common/img/logos/bbc-sport.png" alt="BBC Sport" /></a></li>
                      <li><a target="_blank" href="http://www.channel5.com/"><img src="<?php bloginfo('template_directory'); ?>/common/img/logos/channel-5.png" alt="Channel 5" /></a></li>
                       <li><a target="_blank" href="http://www.s4c.co.uk/hafan/c_index.shtml"><img src="<?php bloginfo('template_directory'); ?>/common/img/logos/s4.png" alt="S4/C" /></a></li>
                      <li><a target="_blank" href="http://www.sky.com/"><img src="<?php bloginfo('template_directory'); ?>/common/img/logos/sky.png" alt="Sky" /></a></li>
                      <li><a target="_blank" href="http://www.tg4.ie/"><img src="<?php bloginfo('template_directory'); ?>/common/img/logos/TG4-logo.png" alt="TG4" /></a></li>
                    </ul>
                </div>

            </div> 
    </footer>
</div>


	</div> <!-- /viewport (header) -->

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
