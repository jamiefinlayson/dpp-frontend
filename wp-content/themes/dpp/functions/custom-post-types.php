<?php




// Register Custom Post Types
function create_post_types() {

    // Workstream
     register_post_type('workstream', array(
        'labels' => array(
            'name' => 'Workstreams',
            'all_items' => 'All Workstreams'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'what-we-do'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt','page-attributes', 'revisions'),
        'exclude_from_search' => false,
        'hierarchical' => true,
        'taxonomies' => array('category'), 
        'capability_type' => 'page'
    ));

    // Downloads
    register_post_type('downloads', array(
        'labels' => array(
            'name' => 'Downloads',
            'all_items' => 'All Downloads'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'download'),
        'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'revisions','page-attributes'),
        'exclude_from_search' => false,
        'hierarchical' => true
    ));

    // News
     register_post_type('news', array(
        'labels' => array(
            'name' => 'News',
            'all_items' => 'All News'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'news'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt','revisions', 'page-attributes'),
        'exclude_from_search' => false
    ));

     // Events
     register_post_type('events', array(
        'labels' => array(
            'name' => 'Events',
            'all_items' => 'All Events'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'event'),
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt','revisions'),
        'exclude_from_search' => false
    ));

    // Group Members
     register_post_type('members', array(
        'labels' => array(
            'name' => 'Group Members',
            'all_items' => 'All Group Members'
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'group-members'),
        'supports' => array('title', 'editor', 'thumbnail','revisions', 'page-attributes'),
        'exclude_from_search' => false
    ));

}
add_action('init', 'create_post_types');


// Register Taxonomies
function create_taxonomies() {

    /*
    * Taxonomy for organising downlaods like reports, guides etc
    */
    register_taxonomy('download-categories', array('downloads'), array(
        'labels' => array(
            'name' => 'Download Categories'
        ),
    'show_ui' => true,
    'show_tagcloud' => false,
    'hierarchical' => true,
    'rewrite' => array(
        'slug' => 'downloads'
    )
    ));

    /*
    * Taxonomy for file types like acrobat, image, word etc
    */
    register_taxonomy('download-file-type', array('downloads'), array(
        'labels' => array(
            'name' => 'Download File Types'
        ),
    'show_ui' => true,
    'show_tagcloud' => false,
    'hierarchical' => true,
    'rewrite' => array(
        'slug' => 'download-file-type'
    )
    ));

}
add_action('init', 'create_taxonomies');
