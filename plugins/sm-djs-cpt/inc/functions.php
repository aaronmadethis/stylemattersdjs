<?php

// -- register install script
register_activation_hook(__FILE__, 'sm_djs_install');

// -- register the deactivation script
register_deactivation_hook(__FILE__, 'sm_djs_deactivate');

// -- runs when plug-in is installed
function sm_djs_install(){
}

// -- run on uninstall deletes options
function sm_djs_deactivate() {
	// -- delete options
	// -- delete_option('total_columns');
}

// Load our custom assets.
add_action( 'admin_enqueue_scripts', 'sm_djs_assets');

function sm_djs_assets(){

}

// -- Set up the post types
add_action('init', 'sm_djs_regiser_post_types');

// -- Register Post Types function
function sm_djs_regiser_post_types(){

	// -- set arguments for the portfolio_page post type
	$news_pt_args = array(
		'public' => true,
		'query_var' => 'sm_djs',
		'rewrite' => array(
				'slug' => 'sm/djs',
				'with_front' => false
		),
		'supports' => array(
			'title',
			'thumbnail'
		),
		'labels' => array(
			'name' => 'DJs',
			'singular_name' => 'DJs',
			'add_new' => 'Add DJs',
			'add_new_item' => 'Add DJ',
			'edit_item' => 'Edit DJ',
			'new_item' => 'New DJ',
			'view_item' => 'View DJs',
			'search_items' => 'Search DJs',
			'not_found' => 'No DJs Found',
			'not_found_in_trash' => 'No DJs Found in Trash'
		),
		'capability_type' => 'post',
        // 'register_meta_box_cb' => 'add_portfolio_metaboxes',
        'taxonomies' => array( 'category' ),
        'has_archive'   => true
	);

	// -- register the portfolio post type
	register_post_type( 'sm_djs', $news_pt_args );
}

