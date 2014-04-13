<?php
/**
 * The Header for my theme.
 */

global $post;

?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=1100px">
<meta name="Description" content="<?php bloginfo( 'description' ); ?>">
<title>Style Matters <?php wp_title(); ?></title>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_directory_uri(); ?>/css/normalize.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<script type="text/javascript" src="//use.typekit.net/uyh5ylb.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<?php 
	$background_image =	get_post_meta( $post->ID, '_background_image', true );

	if( is_single() && 'sm_testimonial' == get_post_type( $post->ID ) ){
		$testimonial_page = get_page_by_title( "And we heard 'em say…" );
		$background_image =	get_post_meta( $testimonial_page->ID, '_background_image', true );
		$bg_object = wp_get_attachment_image_src( 60, 'full' );
	}
	if( is_category( $category = 'blog' ) || is_archive() ){
		$blog_page = get_page_by_title( "Style Chatter" );
		$background_image =	get_post_meta( $blog_page->ID, '_background_image', true );
		$bg_object = wp_get_attachment_image_src( 60, 'full' );
	}

	wp_head();
	$bg_object = wp_get_attachment_image_src( $background_image['id'], 'bg-img' );

?>

<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> >
	<div id='background_image' class="center hide"><img src="<?php echo $bg_object[0]; ?>" org_w="<?php echo $bg_object[1]; ?>" org_h="<?php echo $bg_object[2]; ?>" ></div>
	<div id="page-wrapper" >
		<div id="page-scroll">

