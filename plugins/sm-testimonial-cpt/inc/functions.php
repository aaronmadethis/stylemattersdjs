<?php

// -- register install script
register_activation_hook(__FILE__, 'sm_testimonial_install');

// -- register the deactivation script
register_deactivation_hook(__FILE__, 'sm_testimonial_deactivate');

// -- runs when plug-in is installed
function sm_testimonial_install(){
}

// -- run on uninstall deletes options
function sm_testimonial_deactivate() {
	// -- delete options
	// -- delete_option('total_columns');
}

// Load our custom assets.
add_action( 'admin_enqueue_scripts', 'sm_testimonial_assets');

function sm_testimonial_assets(){

}

// -- Set up the post types
add_action('init', 'sm_testimonial_regiser_post_types');

// -- Register Post Types function
function sm_testimonial_regiser_post_types(){

	// -- set arguments for the portfolio_page post type
	$sm_testimonial_args = array(
		'public' => true,
		'query_var' => 'sm_testimonial',
		'rewrite' => array(
				'slug' => 'sm/testimonial',
				'with_front' => false
		),
		'supports' => array(
			'title',
			'thumbnail'
		),
		'labels' => array(
			'name' => 'Testimonials',
			'singular_name' => 'Testimonial',
			'add_new' => 'Add Testimonials',
			'add_new_item' => 'Add Testimonial',
			'edit_item' => 'Edit Testimonial',
			'new_item' => 'New Testimonial',
			'view_item' => 'View Testimonials',
			'search_items' => 'Search Testimonials',
			'not_found' => 'No Testimonials Found',
			'not_found_in_trash' => 'No Testimonials Found in Trash'
		),
		'capability_type' => 'post',
        // 'register_meta_box_cb' => 'add_portfolio_metaboxes',
        'taxonomies' => array( 'category' ),
        'has_archive'   => true
	);

	// -- register the portfolio post type
	register_post_type( 'sm_testimonial', $sm_testimonial_args );
}

