// Uploading files
var file_frame;
jQuery(document).ready(function($){

  jQuery('.upload_image_button').live('click', function( event ){

    event.preventDefault();

    // If the media frame already exists, reopen it.
    if ( file_frame ) {
      file_frame.open();
      return;
    }

    // Create the media frame.
    file_frame = wp.media.frames.file_frame = wp.media({
      title: jQuery( this ).data( 'uploader_title' ),
      button: {
        text: jQuery( this ).data( 'uploader_button_text' ),
      },
      multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected, run a callback.
    file_frame.on( 'select', function() {
      // We set multiple to false so only get one image from the uploader
      attachment = file_frame.state().get('selection').first().toJSON();

      var attachment_id = attachment.id,
        attachment_url = attachment.url,
        attachment_title = attachment.title,
		id_field = jQuery('<input type="hidden" name="background_image[id]" id="ap_biu_single_image_upload_form_id" value="" />'),
		title_field = jQuery('<input type="hidden" name="background_image[title]" id="ap_biu_single_image_upload_form_title" value="" />'),
		image_url_field = jQuery('<input type="hidden" name="background_image[url]" id="ap_biu_single_image_upload_form_url" value="" />'),
		image_thumb = jQuery('<img id="ap-biu-new-media-image-thumb" src="" />'),
		image_holder = jQuery('<div class="single-image-upload"></div>');

      // Do something with attachment.id and/or attachment.url here
      console.log(attachment);
      console.log('v0.6');

      // Send the attachment URL to our custom input field via jQuery.
      id_field.val(attachment_id);
      title_field.val(attachment_title);
      image_url_field.val(attachment_url);
      image_thumb.attr('src', attachment.url);
      image_holder.append(image_thumb);
      image_holder.append(id_field);
      image_holder.append(title_field);
      image_holder.append(image_url_field);
      jQuery('#biu-image-container').empty();
      jQuery('#biu-set-image').empty();
      jQuery('#biu-image-container').append(image_holder);
    });

    // Finally, open the modal
    file_frame.open();
  });
});