<?php
	session_start();
	$client_id = "c1fe74729fe549d081113040a9db8039";
	$client_id_secret = "92e0397b551d4f02aed176effc0e12f4";
	$callback_uri= "http://www.aaronmadethis.com/instagram_experiment/02/";

	if(empty($_GET['code'])) {
		$url = "https://www.aaronmadethis.com";
		header('Location: '. $url); 
	}
	
	if(!empty($_GET['code'])){
		$code = $_GET['code'];
		$wp_url = $_GET['return_uri'];
		$url = $wp_url . "&code=" . $code;
		header('Location: '. $url);
	}