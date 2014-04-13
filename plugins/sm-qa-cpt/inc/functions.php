<?php

// -- register install script
register_activation_hook(__FILE__, 'sm_qa_install');

// -- register the deactivation script
register_deactivation_hook(__FILE__, 'sm_qa_deactivate');

// -- runs when plug-in is installed
function sm_qa_install(){
}

// -- run on uninstall deletes options
function sm_qa_deactivate() {
	// -- delete options
	// -- delete_option('total_columns');
}

// Load our custom assets.
add_action( 'admin_enqueue_scripts', 'sm_qa_assets');

function sm_qa_assets(){

}

// -- Set up the post types
add_action('init', 'sm_qa_regiser_post_types');

// -- Register Post Types function
function sm_qa_regiser_post_types(){

	// -- set arguments for the portfolio_page post type
	$sm_qa_args = array(
		'public' => true,
		'query_var' => 'sm_qa',
		'rewrite' => array(
				'slug' => 'sm/qa',
				'with_front' => false
		),
		'supports' => array(
			'title',
			'thumbnail'
		),
		'labels' => array(
			'name' => 'Q and A',
			'singular_name' => 'Q and A',
			'add_new' => 'Add Q and A',
			'add_new_item' => 'Add Q and A',
			'edit_item' => 'Edit Q and A',
			'new_item' => 'New Q and A',
			'view_item' => 'View Q and A',
			'search_items' => 'Search Q and A',
			'not_found' => 'No Q and A Found',
			'not_found_in_trash' => 'No Q and A Found in Trash'
		),
		'capability_type' => 'post',
        // 'register_meta_box_cb' => 'add_portfolio_metaboxes',
        'taxonomies' => array( 'category' ),
        'has_archive'   => true
	);

	// -- register the portfolio post type
	register_post_type( 'sm_qa', $sm_qa_args );
}

