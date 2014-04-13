<?php
/*  
Plugin Name: Stylematters DJs Custom Post Type
Plugin URI: http://www.aaronmadethis.com 
Description: Plugin to create a DJs Custom Post Type
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

define('SM_DJS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define('SM_DJS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define('SM_DJS_SETTINGS_PAGE', 'sm-djs_cpt');
define('SM_DJS_ADMIN', strtolower(site_url('/').'wp-admin/options-general.php?page='.SM_DJS_SETTINGS_PAGE));

/* Load our main functions file */
require ( SM_DJS_PLUGIN_PATH . 'inc/functions.php'); 


?>