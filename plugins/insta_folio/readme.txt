insta folio plug in

What does the plug in need to do?
	• Get authorization to use the users instagram feed
		- build the URL back to the wordpress settings page for the plug-in
		- direct the user to log-into instagram
		- authorize the app
		- get the instagram code
		- create a redirect page for the app that scrapes the code and sends it back to wordpress via the URL we built
		- user the instagram code and cURL to get the access token
		- store the access_token
		- store the instagram user_name
		- store the instagram user_id

	• Settings page
		- start the log-in / authorization process for instagram
		- confirm once someone is logged in through instagram
		- provide a log-out button — this will clear the access_token, user_name and user_id
		- instructions on how to use the short code
		
	• Short code
		- should display a number of instagram image thumbnails — default is 16
		– should be able to set the number of images that are displayed
		– Rollover should include image information
		– Click should open image up in lightbox or take you to instagram
	
	Options need
		– user_name
		– user_id
		– access_token