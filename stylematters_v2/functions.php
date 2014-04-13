<?php

if ( ! function_exists( 'sm_setup' ) ) {
	function sm_setup() {
		/**
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
			'main' => 'Main menu',
		) );
	}
}

if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'deejays-thumb', 204, 249, true ); //300 pixels wide (and unlimited height)
	add_image_size( 'dj-slideshow', 856, 340, false);
	add_image_size( 'bg-img', $width = 1900, $height = 9999, $crop = false );
}

/**
 * Tell WordPress to run ap_portfolio_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'sm_setup' );


function objectToArray($d) {
	if (is_object($d)) {
		// Gets the properties of the given object
		// with get_object_vars function
		$d = get_object_vars($d);
	}

	if (is_array($d)) {
		/*
		* Return array converted to object
		* Using __FUNCTION__ (Magic constant)
		* for recursive call
		*/
		return array_map(__FUNCTION__, $d);
	}
	else {
		// Return array
		return $d;
	}
}

function seperateContent() {
		$myContent;
		$findPostionOf = "<!--more-->";
		$trimPosition;
		global $post;
		$myContent = apply_filters('the_content', $post->post_content);
		$trimPostition = strpos($myContent, $findPostionOf);
		return substr($myContent, ($trimPostition + strlen($findPostionOf)));
}

function seperateExcerpt() {
		$myContent;
		$findPostionOf = "<!--more-->";
		$trimPosition;
		global $post;
		$myContent = apply_filters('the_content', $post->post_content);
		$trimPostition = strpos($myContent, $findPostionOf);
		return substr($myContent, 0, $trimPostition);
}

function seperateContentBefore($myContent) {
		$findPostionOf = "(";
		$trimPosition;
		$trimPostition = strpos($myContent, $findPostionOf);
		return substr($myContent, ($trimPostition + strlen($findPostionOf)));
		alert("ran");
}

add_action( 'widgets_init', 'sm_register_sidebars' );

function sm_register_sidebars() {

	/* Register the 'primary' sidebar. */
	register_sidebar(
		array(
			'id' => 'home',
			'name' => __( 'Home' ),
			'description' => __( 'Home page sidebar' ),
			'before_widget' => '<div id="%1$s" class="sidebar-item sidebar-home widget %2$s">',
			'after_widget' => '</div><div class="sidebar-rule"></div>',
			'before_title' => '<div class="title widget-title">',
			'after_title' => '</div>'
		)
	);

	register_sidebar(
		array(
			'id' => 'about',
			'name' => __( 'about' ),
			'description' => __( 'About page sidebar' ),
			'before_widget' => '<div id="%1$s" class="sidebar-item sidebar-about widget %2$s">',
			'after_widget' => '</div><div class="sidebar-rule"></div>',
			'before_title' => '<div class="title widget-title">',
			'after_title' => '</div>'
		)
	);

	register_sidebar(
		array(
			'id' => 'musicians',
			'name' => __( 'musicians' ),
			'description' => __( 'Musicians page sidebar' ),
			'before_widget' => '<div id="%1$s" class="sidebar-item sidebar-musicians widget %2$s">',
			'after_widget' => '</div><div class="sidebar-rule"></div>',
			'before_title' => '<div class="title widget-title">',
			'after_title' => '</div>'
		)
	);

	register_sidebar(
		array(
			'id' => 'pricing',
			'name' => __( 'pricing' ),
			'description' => __( 'Pricing page sidebar' ),
			'before_widget' => '<div id="%1$s" class="sidebar-item sidebar-pricing widget %2$s">',
			'after_widget' => '</div><div class="sidebar-rule"></div>',
			'before_title' => '<div class="title widget-title">',
			'after_title' => '</div>'
		)
	);

	register_sidebar(
		array(
			'id' => 'pricing',
			'name' => __( 'pricing' ),
			'description' => __( 'Pricing page sidebar' ),
			'before_widget' => '<div id="%1$s" class="sidebar-item sidebar-pricing widget %2$s">',
			'after_widget' => '</div><div class="sidebar-rule"></div>',
			'before_title' => '<div class="title widget-title">',
			'after_title' => '</div>'
		)
	);

	register_sidebar(
		array(
			'id' => 'testimonial',
			'name' => __( 'testimonial' ),
			'description' => __( 'Testimonial page sidebar' ),
			'before_widget' => '<div id="%1$s" class="sidebar-item sidebar-testimonial widget %2$s">',
			'after_widget' => '</div><div class="sidebar-rule"></div>',
			'before_title' => '<div class="title widget-title">',
			'after_title' => '</div>'
		)
	);

	register_sidebar(
		array(
			'id' => 'listen',
			'name' => __( 'listen' ),
			'description' => __( 'Listen page sidebar' ),
			'before_widget' => '<div id="%1$s" class="sidebar-item sidebar-listen widget %2$s">',
			'after_widget' => '</div><div class="sidebar-rule"></div>',
			'before_title' => '<div class="title widget-title">',
			'after_title' => '</div>'
		)
	);

	register_sidebar(
		array(
			'id' => 'events',
			'name' => __( 'events' ),
			'description' => __( 'Events page sidebar' ),
			'before_widget' => '<div id="%1$s" class="sidebar-item sidebar-events widget %2$s">',
			'after_widget' => '</div><div class="sidebar-rule"></div>',
			'before_title' => '<div class="title widget-title">',
			'after_title' => '</div>'
		)
	);

	register_sidebar(
		array(
			'id' => 'contact',
			'name' => __( 'contact' ),
			'description' => __( 'Contact page sidebar' ),
			'before_widget' => '<div id="%1$s" class="sidebar-item sidebar-contact widget %2$s">',
			'after_widget' => '</div><div class="sidebar-rule"></div>',
			'before_title' => '<div class="title widget-title">',
			'after_title' => '</div>'
		)
	);

	register_sidebar(
		array(
			'id' => 'blog',
			'name' => __( 'blog' ),
			'description' => __( 'Blog page sidebar' ),
			'before_widget' => '<div id="%1$s" class="sidebar-item sidebar-blog widget %2$s">',
			'after_widget' => '</div><div class="sidebar-rule"></div>',
			'before_title' => '<div class="title widget-title">',
			'after_title' => '</div>'
		)
	);

	/* Repeat register_sidebar() code for additional sidebars. */
}

function get_full_thumb_url($post_id){
	$thumb_id = get_post_thumbnail_id($post_id);
	$image_attributes = wp_get_attachment_image_src( $thumb_id, 'post-thumbnail' );
	return $image_attributes[0];
}

add_action('init', 'my_init_function');
 
function my_init_function() {
        add_image_size( 'fit_page', 587, 9999 );	
}

function twenty_posts_blog( $query ) {
    if ( $query->is_category('blog') ) {
        $query->set( 'posts_per_page', '20' );
    }
}
add_action( 'pre_get_posts', 'twenty_posts_blog' );


/**
 * Functions for adding javascripts
 */
add_action( 'template_redirect', 'my_script_enqueuer' );

function my_script_enqueuer() {
	wp_enqueue_script( 'jquery' );
	$modernizr_url = get_bloginfo('template_directory') . '/js/vendor/modernizr-2.6.1.min.js';
	wp_enqueue_script('modernizr', $modernizr_url);
	$images_loaded_url = get_bloginfo('template_directory') . '/js/vendor/imagesloaded.js';
	wp_enqueue_script('images_loaded', $images_loaded_url, array('jquery', 'modernizr'), '', true);

	$display_script_url = get_bloginfo('template_directory') . '/js/display-0.1.js';
	$plugins = get_bloginfo('template_directory') . '/js/plugins-0.1.js';
	wp_enqueue_script('display_script', $display_script_url, array('jquery', 'modernizr', 'plugins'), '', true);
	wp_enqueue_script('plugins', $plugins, array('jquery', 'modernizr', 'images_loaded'), '', true);

}

?>