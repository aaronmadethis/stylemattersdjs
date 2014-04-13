<?php
/*  
Plugin Name: Instagram Portfolio
Plugin URI: http://www.aaronmadethis.com 
Description: Plugin for integrating instagram into a WordPress blog.
Author: Aaron Pedersen 
Version: 0.5
Author URI: http://www.aaronmadethis.com/

Copyright 2012  Aaron Pedersen  (email : info@aaronmadethis.com)

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
define('INSTA_CLIENT_ID', 'c1fe74729fe549d081113040a9db8039');
define('INSTA_CLIENT_SECRET', '92e0397b551d4f02aed176effc0e12f4');
define('MY_REDIRECT_URI', 'http://www.aaronmadethis.com/instagram_experiment/02/');
define( 'INSTA_FOLIO_SETTINGS_PAGE', 'insta_folio');
define( 'INSTA_FOLIO_URL', strtolower(site_url('/').'wp-admin/options-general.php?page='.INSTA_FOLIO_SETTINGS_PAGE));

// -- register install script
register_activation_hook(__FILE__, 'insta_f_install');

// -- register the uninstall script
register_uninstall_hook(__FILE__, 'plugin_uninstall');

// -- register the menu under Settings in WP Admin
add_action('admin_menu', 'insta_f_create_menu');

// -- add shortcode
add_shortcode('instagram_portfolio', 'insta_portfolio_shortcode');

// -- runs when plug-in is installed
function insta_f_install(){
}

// -- create the menu under Settings in WP Admin
function insta_f_create_menu(){
	add_options_page('Instagram Portfolio Settings', 'Instagram Portfolio', 'manage_options', INSTA_FOLIO_SETTINGS_PAGE, 'insta_f_settings_page');	
}

// -- run on uninstall deletes options
function plugin_uninstall() {
	delete_option('access_token');
	delete_option('insta_username');
	delete_option('insta_user_id');
	delete_option('insta_profile_picture');
}

// -- function to log out and clear user saved options
function log_out() {
	// session_destroy ();
	
	update_option('access_token', '');
	update_option('insta_username', '');
	update_option('insta_user_id', '');
	update_option('insta_profile_picture', '');

}

// -- shortcode function to add to pages
function insta_portfolio_shortcode(){
	//Get feed
		$access_token = get_option('access_token');
		$insta_user_id = get_option('insta_user_id');
		
		$url = 'https://api.instagram.com/v1/users/' . $insta_user_id . '/media/recent/?';
		$data = array(
		            'access_token' => $access_token,
		            'count' => 9
		        );

	 	 $url = $url . http_build_query($data);

		$result = wp_remote_get($url);
		$json = wp_remote_retrieve_body($result);
		$json_object = json_decode($json);

		$build_html = '';

		if($json_object){		
			foreach ($json_object->data as $key => $value) {
				$build_html .= '<div class="instagram_image image-' . $key . '"> <img id="' . $key . '" src="' . $value->images->thumbnail->url . '" > </div>';
			}
			return '<div id="instagram_container">' . $build_html . '</div>';
		}
}

// -- create the page under Settings in WP Admin
function insta_f_settings_page(){
	
	// -- log out
	if(isset($_POST['insta_f_logout']) && $_POST['insta_f_logout'] == 'Y'){		
		log_out();
	}
	
	// -- gets the user access code and save the user settings
	function insta_f_get_access($insta_f_code){
		$url = 'https://api.instagram.com/oauth/access_token';
		$data = array(
		            'client_id' => INSTA_CLIENT_ID,
		            'client_secret' => INSTA_CLIENT_SECRET,
		            'grant_type' => 'authorization_code',
		            'redirect_uri' => MY_REDIRECT_URI . "?return_uri=".INSTA_FOLIO_URL,
		            'code' => $insta_f_code
					);

		$args = array(
				'headers' => array('Accept: application/json'),
				'body' => $data,
				'timeout' => 20
			);

		$result = wp_remote_post($url, $args);

		$json = wp_remote_retrieve_body($result);
		$json_object = json_decode($json);

		return $json_object;
	}
	
	$instagram_connected = 'connected';
	$access_token = get_option('access_token');
	
	// -- if we have the code then get access token
	if(isset($_GET['code']) && $access_token == ''){
		$insta_code_url = 'loggedin';
		$insta_f_results = insta_f_get_access($_GET['code']);
		
		// -- set the options
		update_option('access_token', $insta_f_results->access_token);
		update_option('insta_username', $insta_f_results->user->username);
		update_option('insta_user_id', $insta_f_results->user->id);
		update_option('insta_profile_picture', $insta_f_results->user->profile_picture);
	}
	
	if($instagram_connected != 'not-connected'){
		$access_token = get_option('access_token');
		$insta_code_url = 'loggedin';
		
		if(!$access_token){
			// -- there is no access_token so create the url to get a code and start access process
			$insta_code_url = "https://api.instagram.com/oauth/authorize/?client_id=" . INSTA_CLIENT_ID . "&redirect_uri=" . MY_REDIRECT_URI . "?return_uri=" . htmlentities(INSTA_FOLIO_URL) . "&response_type=code";	
		}
	}
	?>


	<div class="wrap">
		<h2>Instagram Portfolio</h2>
		<?php if($insta_code_url != 'loggedin'):	?>
			<div><a href="<?php echo $insta_code_url; ?>">Log-in to Instagram and register the app.</a></div>
		<?php else: ?>
			<div>Logged in success! You are logged in as:</div>		
			<div><strong>Name:</strong> <?php echo get_option('insta_username'); ?></div>
			<div><p><img src="<?php echo get_option('insta_profile_picture'); ?>" ><p/></div>
			
			<div>
				<p>
				<form name="insta_f_logout" method="post" action="<?php echo str_replace( '%7E', '~', INSTA_FOLIO_URL); ?>">
					<input type="hidden" name="insta_f_logout" value="Y">
					<input type="submit" class="button" value="Log out" name="logout" onclick="" >
				</form>
				</p>
			</div>
		<?php endif; ?>
	</div>

<?php }?>