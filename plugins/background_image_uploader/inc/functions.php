<?php
// -- register install script
register_activation_hook(__FILE__, 'ap_biu_install');

// -- register the deactivation script
register_deactivation_hook(__FILE__, 'ap_biu_plugin_deactivate');

// -- runs when plug-in is installed
function ap_biu_install(){
}

// -- run on uninstall deletes options
function ap_biu_plugin_deactivate() {
	// -- delete options
	delete_option('_background_image');
}

// Load our custom assets.
add_action( 'admin_enqueue_scripts', 'ap_biu_assets');

function ap_biu_assets(){
	// This function loads in the required media files for the media manager.
	wp_enqueue_media();
	
	// Register, localize and enqueue our custom JS.
    wp_register_script( 'ap_biu_media_upload', plugins_url( 'js/ap_biu_media_uploader.js', __FILE__ ), array( 'jquery' ), '1.0.0', true );
    wp_localize_script( 'ap_biu_media_upload', 'ap_biu_media_upload',
        array(
            'title'     => 'Upload or Choose Your Background Image File', // This will be used as the default title
            'button'    => 'Insert Image'            // This will be used as the default button text
        )
    );
    wp_enqueue_script( 'ap_biu_media_upload' );
    wp_enqueue_style( 'ultra_portfolio_master', plugins_url( '/css/ap_biu_admin.css', __FILE__ ) );
}

/**
 * Functions for adding meta box background image
 */

add_action( 'add_meta_boxes', 'background_image_uploader' );
add_action( 'save_post', 'background_image_uploader_save' );

function background_image_uploader() {
    $screens = array( 'page' );
    foreach ($screens as $screen) {
        add_meta_box(
            'background_image_uploader',
            'Background Image',
            'background_image_uploader_display',
            $screen,
            'side'
        );
    }
}

// -- function to show the upload images metabox
function background_image_uploader_display() {
	global $post;

	$background_image = get_post_meta( $post->ID, '_background_image', true );

	// Noncename needed to verify where the data originated
	echo '<input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';

	// field
	?>
	<div class ="biu-upload-image-btn">
		<p>
		<label>
			<input class="upload_image_button button" type="button" value="Upload Image" />
			<span style="color:#666666;margin-left:2px;"><?php echo 'Upload an image to this project.'?></span>
		</label>
		</p>
	</div>
	<div id="biu-image-container"></div>
	<div id="	" class="single-image">
		<img src="<?php echo $background_image['url']; ?>" >
	</div>
	<?php
}

/* When the post is saved, saves our custom data */
function background_image_uploader_save( $post_id ) {

	// First we need to check if the current user is authorised to do this action. 
	if ( 'page' == $_POST['post_type'] ) {
		if ( ! current_user_can( 'edit_page', $post_id ) )
		return;
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) )
		return;
	}

	// Secondly we need to check if the user intended to change this value.
	if ( ! isset( $_POST['eventmeta_noncename'] ) || ! wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename( __FILE__ ) ) )
		return;

	// Thirdly we can save the value to the database

	//if saving in a custom table, get post_ID
	$post_ID = $_POST['post_ID'];
	//sanitize user input
	//$image_data = sanitize_text_field( $_POST['background_image'] );
	if(isset($_POST['background_image'])){
		$image_data = $_POST['background_image'];
	}else{
		$image_data = '';
	}
	// update meta data
	if( $image_data != '' ){
		update_post_meta($post_ID, '_background_image', $image_data);
	}
}

?>