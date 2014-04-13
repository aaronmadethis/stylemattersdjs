<?php
/**
 * Widget template. This template can be overriden using the "sp_template_image-widget_widget.php" filter.
 * See the readme.txt file for more info.
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

echo $this->get_image_html( $instance, true );

if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }

if ( !empty( $description ) ) {
	echo '<div class="'.$this->widget_options['classname'].'-description" >';
	echo wpautop( $description );
	echo "</div>";
}

if ( $link ) {
	echo '<div class="sidebar-link"><span class="sidebar-link-left"></span><a class="'.$this->widget_options['classname'].'-image-link" href="'.esc_url($link).'" target="'.esc_attr($linktarget).'">'.strtoupper($alt).'</a><span class="sidebar-link-right"></span></div>';
}

echo $after_widget;
?>