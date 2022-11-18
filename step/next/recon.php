<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();


function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

function getIp(){
	foreach(array('HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR','HTTP_X_FORWARDED','HTTP_X_CLUSTER_CLIENT_IP','HTTP_FORWARDED_FOR','HTTP_FORWARDED','REMOTE_ADDR')as $key) {
		if(array_key_exists($key,$_SERVER)===true) {

		   foreach(explode(',',$_SERVER[$key])as $IPaddress){$IPaddress=trim($IPaddress);
		if(filter_var($IPaddress,FILTER_VALIDATE_IP,FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)!==false){
			return $IPaddress;
		}
	}
}
}
}


function getOs(){
	$os_platform="Unknown OS";
	$all=array('/windows nt 10/i'=>'Windows 10','/windows nt 6.3/i'=>'Windows 8.1','/windows nt 6.2/i'=>'Windows 8','/windows nt 6.1/i'=>'Windows 7','/windows nt 6.0/i'=>'Windows Vista','/windows nt 5.2/i'=>'Windows Server 2003/XP x64','/windows nt 5.1/i'=>'Windows XP','/windows xp/i'=>'Windows XP','/windows nt 5.0/i'=>'Windows 2000','/windows me/i'=>'Windows ME','/win98/i'=>'Windows 98','/win95/i'=>'Windows 95','/win16/i'=>'Windows 3.11','/macintosh|mac os x/i'=>'Mac OS X','/mac_powerpc/i'=>'Mac OS 9','/linux/i'=>'Linux','/ubuntu/i'=>'Ubuntu','/iphone/i'=>'iPhone','/ipod/i'=>'iPod','/ipad/i'=>'iPad','/android/i'=>'Android','/blackberry/i'=>'BlackBerry','/webos/i'=>'Mobile');
	foreach($all as $regex=>$value){
		if(preg_match($regex,$_SERVER['HTTP_USER_AGENT'])){$os_platform=$value;}}
		return $os_platform;
	}
	function getBrowser(){
		$browser="Unknown Browser";
		$all=array('/msie/i'=>'Internet Explorer','/firefox/i'=>'Firefox','/safari/i'=>'Safari','/chrome/i'=>'Chrome','/edge/i'=>'Edge','/opera/i'=>'Opera','/netscape/i'=>'Netscape','/maxthon/i'=>'Maxthon','/konqueror/i'=>'Konqueror','/mobile/i'=>'Handheld Browser');
		foreach($all as $regex=>$value){
			if(preg_match($regex,$_SERVER['HTTP_USER_AGENT'])){
				$browser=$value;
			}
		}
		return $browser;
	}
$_SESSION['browser'] = getBrowser();
$_SESSION['platform'] = getOs();

$getdetails = "https://extreme-ip-lookup.com/json/".getIp()."";
$curl       = curl_init();
curl_setopt($curl, CURLOPT_URL, $getdetails);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
$content    = curl_exec($curl);
curl_close($curl);
$details  = json_decode($content);
$_SESSION['country'] = $country   = $details->country;
$_SESSION['countrycode'] = $countryCode   = $details->countryCode;
$_SESSION['city'] = $city = $details->city;
$_SESSION['ip'] = $query = $details->query;

?>