<?php

    @ini_set( 'upload_max_size' , '64M' );
    @ini_set( 'post_max_size', '64M');
    @ini_set( 'max_execution_time', '300' );

    /*
    * Translations can be filed in the /languages/ directory
    */
    /*load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );

    $locale = get_locale();
    $locale_file = TEMPLATEPATH . "/languages/$locale.php";
    if ( is_readable($locale_file) )
        require_once($locale_file);
    */


	/*
    * Add RSS links to <head> section
    */
	automatic_feed_links();

	/*
    * Load jQuery
    */
	if ( !function_exists(core_mods) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script('jquery');
				wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js", array(),'2.0.3',false);
                wp_register_script('foundation', get_template_directory_uri()."/common/js/foundation/foundation.js", array('jquery'),'5.1.1',true); 
                wp_register_script('foundationoffcanvas', get_template_directory_uri()."/common/js/foundation/foundation.offcanvas.js", array('jquery'),'5.1.1',true); 
				wp_enqueue_script('jquery');
                wp_enqueue_script('foundation');
                wp_enqueue_script('foundationoffcanvas');

			} 
		}
		core_mods();
	}

	/*
    * Clean up the <head>
    */
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');

    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => __('Sidebar Widgets' ),
    		'id'   => 'sidebar-widgets',
    		'description'   => __( 'These are widgets for the sidebar.' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));

        register_sidebar(array(
            'name' => __('404' ),
            'id'   => 'widget-404',
            'description'   => __( 'These is the 404 error descrition.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2>',
            'after_title'   => '</h2>'
        ));
    }

    /*
    * Add post format support
    */
    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.

    /*
    * Add Menu Support to theme
    */
    function register_my_menus() {
        register_nav_menus(
            array(
                'top-menu' => __( 'Top Menu' ),
                'footer-menu' => __( 'Footer Menu' )
            )
        );
    }
    add_action( 'init', 'register_my_menus' );

    /*
    * Add Thumbnail support and additional sizes
    */
    if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
            set_post_thumbnail_size( 178, 178, true ); // add [,true] for crop mode
    }
    if ( function_exists( 'add_image_size' ) ) {
        add_image_size( 'medium', 343, 193, true );
        add_image_size( 'members', 96, 9999 );
    }

    /*
    * Enable excerpt on Pages
    */
    add_action( 'init', 'my_add_excerpts_to_pages' );
    function my_add_excerpts_to_pages() {
         add_post_type_support( 'page', 'excerpt' );
    }

    /*
    * Include custom post types/taxonomies
    */
     include ('functions/custom-post-types.php');

    /*
    * Custom function for variable excerpt/content lengths
    */
    function excerpt($limit) {
      // $excerpt = explode(' ', get_the_excerpt(), $limit);
      // if (count($excerpt)>=$limit) {
      //   array_pop($excerpt);
      //   $excerpt = implode(" ",$excerpt).'...';
      // } else {
      //   $excerpt = implode(" ",$excerpt);
      // }
      // $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
      // return $excerpt;
        $text = get_the_excerpt();
        if(mb_strlen($text, 'UTF-8') > $limit){
         $split_pos = mb_strpos(wordwrap($text, $limit), "\n", 0, 'UTF-8');
         $text = mb_substr($text, 0, $split_pos, 'UTF-8');
         $text = $text . "...";
        }

        return $text;
    }

    function content($limit) {
      $content = explode(' ', get_the_content(), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
      } else {
        $content = implode(" ",$content);
      }
      $content = preg_replace('/\[.+\]/','', $content);
      $content = apply_filters('the_content', $content);
      $content = str_replace(']]>', ']]&gt;', $content);
      return $content;
    }



    //    add_filter('wp_trim_excerpt', function($text){
    //    $max_length = 120;

    //    if(mb_strlen($text, 'UTF-8') > $max_length){
    //      $split_pos = mb_strpos(wordwrap($text, $max_length), "\n", 0, 'UTF-8');
    //      $text = mb_substr($text, 0, $split_pos, 'UTF-8');
    //      $text = $text . "...";
    //    }

    //    return $text;
    // });

    /*
    * Register Post-2-post connections
    */
    function my_connection_types() {
        p2p_register_connection_type( array(
            'name' => 'workstream_to_downloads',
            'from' => 'downloads',
            'to' => 'workstream'
        ) );
    }
    add_action( 'p2p_init', 'my_connection_types' );

    /*
    * Remove posts admin menu
    */
    function edit_admin_menus() {
        global $menu;
        global $submenu;
        remove_menu_page('edit.php'); // Remove the posts Menu
        remove_menu_page('edit-comments.php'); // Remove the comments Menu
    }
    add_action( 'admin_menu', 'edit_admin_menus' );


    /*
    * Adds 'current_page_item / current_page_parent' classes to side navigation when viewing CPT
    * - used when listing pages using wp-list-pages for CPT
    * - Wordpress lacks this functionality for CPT compared to pages :O .
    */
    function my_page_css_class( $css_class, $page ) {
        global $post;
        $theParentPostID = $post->post_parent;
        //echo $post->ID;
        //echo " ". $theParentPostID;
        if ( $post->ID == $page->ID ) {
            $css_class[] = 'current_page_item';
        }
        if ($theParentPostID == $page->ID ) {
            $css_class[] = 'current_page_parent';
        }
        return $css_class;
    }
    add_filter( 'page_css_class', 'my_page_css_class', 10, 2 );


    /*
    *  Requires classes adding to menus in appearance > menus.
    *  The code below finds the menu item with the class "[CPT]-menu-item" and adds another “current_page_parent” class to it.
    *  Furthermore, it removes the “current_page_parent” from the blog menu item, if this is present.
    * Via http://vayu.dk/highlighting-wp_nav_menu-ancestor-children-custom-post-types/
    */
    function current_type_nav_class($classes, $item) {
        // Get post_type for this post
        $post_type = get_query_var('post_type');
        $taxonomy  = get_query_var('taxonomy');

        // Removes current_page_parent class from blog menu item
        if  (get_post_type() == $post_type) {
            $classes = array_filter($classes, "get_current_value" );
        }
        // Go to Menus and add a menu class named: {custom-post-type}-menu-item
        // This adds a current_page_parent class to the parent menu item
        if( in_array( $post_type.'-menu-item', $classes ) ) {
            array_push($classes, 'current-menu-item');
        }
        if( in_array( $taxonomy.'-menu-item', $classes ) ) {
            array_push($classes, 'current-menu-item');
        }

        return $classes;
    }
    function get_current_value( $element ) {
        return ( $element != "current_page_parent" );
    }
    add_filter('nav_menu_css_class', 'current_type_nav_class', 10, 2);


    /*
    * Hook  Contact Form 7 Plugin to Mailchimp to capture data
    */
    function wpcf7_send_to_mailchimp($cfdata) {

    $formdata = $cfdata->posted_data;

        if( $formdata['mailchimp-opt-in'] ) {

            $send_this_email = $formdata['your-email'];

            // MCAPI.class.php needs to be in theme folder
            require_once('MCAPI.class.php');

            // grab an API Key from http://admin.mailchimp.com/account/api/
            $api = new MCAPI('a84508bdc5ea22cc56c72193135288e2-us6');

            // grab your List's Unique Id by going to http://admin.mailchimp.com/lists/
            // Click the "settings" link for the list - the Unique Id is at the bottom of that page.

            // Contact list id
             $list_id = "1e6f11a1ed";
                            // Debug help
                            //  print_r($formdata);

                            // $lists = $api->lists();

                            //  print implode(",",$formdata['programme-category']);
                            //  die();

                            // print '<pre>';
                            // print_r($lists);
                            // print '</pre>';

                            // $groups = $api->listInterestGroupings('1e6f11a1ed');
                            // print '<pre>';
                            // print_r($groups);
                            // print '</pre>';
                            // die();

            $mergeVars = array(
                'FNAME'=>$formdata['your-first-name'],
                'LNAME'=>$formdata['your-last-name'],
                'CMERGE'=>$formdata['your-company'],
                'JMERGE'=> $formdata['your-job-title'],
                'BMERGE' => $formdata['business-category'],
                'MMERGE6' => $formdata['your-city'],
                'PHONE7'=> $formdata['your-phone'],
                'MMERGE9'=> $formdata['comments'],
//                'GROUPINGS' => array(array('id'=>9253, 'groups' => implode(",",$formdata['programme-category'])))
            );

            // Send the form content to MailChimp List without double opt-in
            //$retval = $api->listSubscribe($list_id, $send_this_email);
            $retval = $api->listSubscribe($list_id, $send_this_email, $mergeVars, 'html', false);

        }
    }
    add_action('wpcf7_mail_sent', 'wpcf7_send_to_mailchimp', 1);

    /* Edit upload file types */
    add_filter('upload_mimes','add_custom_mime_types');
    function add_custom_mime_types($mimes){
        return array_merge($mimes,array (
            'ac3' => 'audio/ac3',
            'mpa' => 'audio/MPA',
            'flv' => 'video/x-flv',
            'svg' => 'image/svg+xml',
            'dmg' => 'octet-stream',
            'epub' => 'application/epub+zip'
        ));
    }
 /*

function bbg_register_member_types() {
   bp_register_member_type( 'vendor', array(
        'labels' => array(
            'name'          => 'Vendors',
            'singular_name' => 'Vendor',
        ),
    ) );
    bp_register_member_type( 'consultancy', array(
        'labels' => array(
            'name'          => 'Consultancies',
            'singular_name' => 'Consultancy',
        ),
    ) );
    bp_register_member_type( 'broadcaster', array(
        'labels' => array(
            'name'          => 'Broadcasters',
            'singular_name' => 'Broadcaster',
        ),
    ) );
}
add_action( 'bp_init', 'bbg_register_member_types' );
*/

?>