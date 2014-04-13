<?php
/*  
Plugin Name: Background Image Upload
Plugin URI: http://www.aaronmadethis.com 
Description: Plugin for creating a meta box on pages for adding a background image
Author: Aaron Pedersen 
Version: 0.1
Author URI: http://www.aaronmadethis.com/

Copyright 2013  Aaron Pedersen  (email : info@aaronmadethis.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
define( 'AP_BIU_SETTINGS_PAGE', 'background_image_uploader');

define( 'AP_BIU_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

define( 'AP_BIU_LOCATION', plugin_basename(__FILE__) );

define( 'AP_BIU_URL', plugins_url( '' ,  __FILE__ ) );


/* Load our main functions file */
require ( AP_BIU_PLUGIN_PATH . 'inc/functions.php'); 

/* Get the admin page if necessary
if ( is_admin() ) { 
	require( AP_BIU_PLUGIN_PATH . 'admin/hps-admin.php' );
}
*/