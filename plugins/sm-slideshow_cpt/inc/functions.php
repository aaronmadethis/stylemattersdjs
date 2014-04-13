<?php

// -- register install script
register_activation_hook(__FILE__, 'sm_slideshow_install');

// -- register the deactivation script
register_deactivation_hook(__FILE__, 'sm_slideshow_deactivate');

// -- runs when plug-in is installed
function sm_slideshow_install(){
}

// -- run on uninstall deletes options
function sm_slideshow_deactivate() {
	// -- delete options
	// -- delete_option('total_columns');
}

// Load our custom assets.
add_action( 'admin_enqueue_scripts', 'sm_slideshow_assets');

function sm_slideshow_assets(){

}

// -- Set up the post types
add_action('init', 'sm_slideshow_regiser_post_types');

// -- Register Post Types function
function sm_slideshow_regiser_post_types(){

	// -- set arguments for the portfolio_page post type
	$sm_slideshow_args = array(
		'public' => true,
		'query_var' => 'sm_slideshow',
		'rewrite' => array(
				'slug' => 'sm/qa',
				'with_front' => false
		),
		'supports' => array(
			'title',
		),
		'labels' => array(
			'name' => 'Slideshow',
			'singular_name' => 'Slideshow',
			'add_new' => 'Add a Slideshow',
			'add_new_item' => 'Add a Slideshow',
			'edit_item' => 'Edit a Slideshow',
			'new_item' => 'New Slideshow',
			'view_item' => 'View Slideshow',
			'search_items' => 'Search Slideshows',
			'not_found' => 'No Slideshows Found',
			'not_found_in_trash' => 'No Slideshows Found in Trash'
		),
		'capability_type' => 'post',
        'taxonomies' => array( 'category' ),
        'has_archive'   => true
	);

	// -- register the portfolio post type
	register_post_type( 'sm_slideshow', $sm_slideshow_args );
}

