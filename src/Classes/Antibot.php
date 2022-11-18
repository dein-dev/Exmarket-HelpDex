<?php

    require_once 'Comp.php';

    class IpList {

        private $iplist = array();
        private $ipfile = "";
    
        public function __construct( $list ) {
        $contents = array();
        $this->ipfile = $list;
        $lines = $this->read( $list );
        foreach( $lines as $line ) {
            $line = trim( $line );
            # remove comment and blank lines
            if ( empty($line ) ) {
            continue;
            }
            if ( $line[0] == '#' ) {
            continue;
            }
            # remove on line comments
            $temp = explode( "#", $line );
            $line = trim( $temp[0] );
            # create content array
            $contents[] = $this->normal($line);
        }

        $this->iplist = $contents;
        }
    
        public function __toString() {
        return implode(' ',$this->iplist);
        }
    
        public function is_inlist( $ip ) {
        $retval = false;
        foreach( $this->iplist as $ipf ) {
            $retval = $this->ip_in_range( $ip, $ipf );
            if ($retval === true ) {
            $this->range = $ipf;
            break;
            }
        }
        return $retval;
        }
    
        /*
        ** public function that returns the ip list array
        */
        public function iplist() {
        return $this->iplist;
        }
    
        /*
        */
        public function message() {
        return $this->range;
        }
    
        public function append( $ip, $comment ) {
            return file_put_contents( $this->ipfile, $ip, $comment );
        }
    
        public function listname() {
            return $this->ipfile;
        }
    
        /*
        ** private function that reads the file into array
        */
        private function read( $fname ) {
        try {
            $file = file( $fname, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES  );
        }
        catch( Exception $e ) {
            throw new Exception( $fname.': '.$e->getmessage() . '\n');
        }
        return $file;
        }
    
        private function ip_in_range( $ip, $range ) {
    
        // return ip_in_range( $ip, $range );
    
            if ( strpos($range, '/') !== false ) {
                // IP/NETMASK format
                list( $range, $netmask ) = explode( '/', $range, 2 );
                if ( strpos( $netmask, '.' ) !== false ) {
                    // 255.255.255.0 format w/ wildcards
                    $netmask = str_replace('*', '0', $netmask );
                    $dnetmask = ip2long( $netmask );
                    return ((ip2long( $ip ) & $dnetmask) == (ip2long($range) & $dnetmask ));
                }
                else {
                    // IP/CIDR format
                    // insure $range format 0.0.0.0
                    $r = explode( '.', $range );
                    while( count( $r ) < 4 ) {
                        $r[] = '0';
                    }
                    for($i = 0; $i < 4; $i++) {
                        $r[$i] = empty($r[$i]) ? '0': $r[$i];
                    }
                    $range = implode( '.', $r );
                    // build netmask
                    $dnetmask = ~(pow( 2, ( 32 - $netmask)) - 1);
                    return ((ip2long($ip) & $dnetmask)==(ip2long($range) & $dnetmask));
                }
            }
            else {
                if ( strpos( $range, '*' ) !== false ) {
                    // 255.255.*.* format
                    $low = str_replace( '*', '0', $range );
                    $high = str_replace( '*', '255', $range );
                    $range = $low.'-'.$high;
                }
                if ( strpos( $range, '-') !== false ) {
                    // 128.255.255.0-128.255.255.255 format
                    list( $low, $high ) = explode( '-', $range, 2 );
    
                    $dlow  = $this->toLongs( $low );
                    $dhigh = $this->toLongs( $high );
                    $dip   = $this->toLongs( $ip );
                    return (($this->compare($dip,$dlow) != -1) && ($this->compare($dip,$dhigh) != 1));
                }
            }
            return ( $ip == $range );
        }
    
        private function normal( $range ) {
        if ( strpbrk( "*-/", $range ) === False ) {
            $range .= "/32";
        }
        return str_replace( ' ', '', $range );
        }
    
        private function toLongs( $ip ) {
        # $Ip = $this->expand();
        # $Parts = explode(':', $Ip);
        $Parts = explode('.', $ip );
        $Ip = array('', '');
        # for ($i = 0; $i < 4; $i++) {
        for ($i = 0; $i < 2; $i++){
            $Ip[0] .= str_pad(base_convert($Parts[$i], 16, 2), 16, 0, STR_PAD_LEFT);
        }
        # for ($i = 4; $i < 8; $i++) {
        for ($i = 2; $i < 4; $i++) {
            $Ip[1] .= str_pad(base_convert($Parts[$i], 16, 2), 16, 0, STR_PAD_LEFT);
        }
            return array(base_convert($Ip[0], 2, 10), base_convert($Ip[1], 2, 10));
        }
    
        private function compare( $ipdec1, $ipdec2 ) {
            if( $ipdec1[0] < $ipdec2[0] ) {
                return -1;
            }
            elseif ( $ipdec1[0] > $ipdec2[0] ) {
                return 1;
            }
            elseif ( $ipdec1[1] < $ipdec2[1] ) {
                return -1;
            }
            elseif ( $ipdec1[1] > $ipdec2[1] ) {
                return 1;
            }
            return 0;
        }
    }
  
    class IpBlockList {
  
      private $statusid = array( 'negative' => -1, 'neutral' => 0, 'positive' => 1 );
  
        private $whitelist = array();
        private $blacklist = array();
        private $message   = NULL;
        private $status    = NULL;
    
        public function __construct () {
        if (
            file_exists('./security/whitelist.dat') &&
            file_exists('./security/whitelist.dat')
        ) {
            $whitelistfile = './security/whitelist.dat';
            $blacklistfile = './security/blacklist.dat';
            $this->whitelistfile = $whitelistfile;
            $this->blacklistfile = $blacklistfile;
        } else {
            $whitelistfile = '../security/whitelist.dat';
            $blacklistfile = '../security/blacklist.dat';
            $this->whitelistfile = $whitelistfile;
            $this->whitelistfile = $blacklistfile;
        }
    
        $this->whitelist = new IpList( $whitelistfile );
        $this->blacklist = new IpList( $blacklistfile );
        }
    
        public function ipPass( $ip ) {
        $retval = False;
    
        if ( !filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 ) ) {
                throw new Exception( 'Requires valid IPv4 address' );
        }
    
        if ( $this->whitelist->is_inlist( $ip ) ) {
            // Ip is white listed, so it passes
            $retval = True;
            $this->message = $ip . " is whitelisted by ".$this->whitelist->message().".";
            $this->status = $this->statusid['positive'];
        }
        else if ( $this->blacklist->is_inlist( $ip ) ) {
            $retval = False;
            $this->message = $ip . " is blacklisted by ".$this->blacklist->message().".";
            $this->status = $this->statusid['negative'];
        }
        else {
            $retval = True;
            $this->message = $ip . " is unlisted.";
            $this->status = $this->statusid['neutral'];
        }
        return $retval;
        }
    
        public function message() {
        return $this->message;
        }
    
            public function status() {
                return $this->status;
            }
    
        public function append( $type, $ip, $comment = "" ) {
            if ($type == 'WHITELIST' ) {
                $retval = $this->whitelistfile->append( $ip, $comment );
            }
            elseif( $type == 'BLACKLIST' ) {
                $retval = $this->blacklistfile->append( $ip, $comment );
            }
            else {
                $retval = false;
            }
        }
    
        public function filename( $type, $ip, $comment = "" ) {
            if ($type == 'WHITELIST' ) {
                $retval = $this->whitelistfile->filename( $ip, $comment );
            }
            elseif( $type == 'BLACKLIST' ) {
                $retval = $this->blacklistfile->filename( $ip, $comment );
            }
            else {
                $retval = false;
            }
        }
    }

    class Antibot extends Comp
    {

        public function throw404() {
            http_response_code(404);
            switch ($this->getBrowser()) {

                case "Firefox":
                    return '
                        <!DOCTYPE html>
                        <html dir="ltr" lang="en-US">
                            <head>
                                <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Server Not Found</title>
                                <link rel="stylesheet" href="chrome://browser/skin/aboutNetError.css" type="text/css" media="all" />
                                <link rel="icon" id="favicon" href="chrome://global/skin/icons/warning.svg" />
                                <link rel="localization" href="browser/aboutCertError.ftl" />
                                <link rel="localization" href="browser/nsserrors.ftl" />
                                <link rel="localization" href="branding/brand.ftl" />
                            </head>
                            <body dir="ltr" class="illustrated dnsNotFound neterror">
                                <div id="errorPageContainer" class="container">
                                    <div id="text-container">
                                        <div class="title">
                                            <h1 class="title-text" data-l10n-id="dnsNotFound-title">Hmm. We’re having trouble finding that site.</h1>
                                        </div>
                                        <div id="errorLongContent">
                                            <div id="errorShortDesc">
                                                <p id="errorShortDescText">We can’t connect to the server at ' . $_SERVER['HTTP_HOST'] . '</p>
                                            </div>
                                            <div id="errorWhatToDo">
                                                <p id="badStsCertExplanation" hidden="true">
                                                    has a security policy called HTTP Strict Transport Security (HSTS), 
                                                    which means that Firefox can only connect to it securely. You can’t add 
                                                    an exception to visit this site.
                                                </p>
                                            </div>
                                            <div id="errorWhatToDo2">
                                                <p id="badStsCertExplanation" hidden="true">
                                                    has a security policy called HTTP Strict Transport Security (HSTS), 
                                                    which means that Firefox can only connect to it securely. You can’t add 
                                                    an exception to visit this site.
                                                </p>
                                            </div>
                                            <div id="errorLongDesc">
                                                <strong xmlns="http://www.w3.org/1999/xhtml">If that address is correct, here are three other things you can try:</strong>
                                                <ul xmlns="http://www.w3.org/1999/xhtml">
                                                    <li>Try again later.</li>
                                                    <li>Check your network connection.</li>
                                                    <li>If you are connected but behind a firewall, check that Firefox has permission to access the Web.</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="netErrorButtonContainer" class="button-container">
                                        <button class="primary try-again" autofocus="true" style="cursor: pointer;" onClick="window.location.reload();">Try Again</button>
                                    </div>
                                </div>
                            </body>
                        </html>
                    ';
                    break;

                default:
                    return '
                        <!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML 2.0//EN">
                        <html>
                            <meta name="viewport" content="width=device-width, initial-scale=1.0">
                            <head>
                                <title>404 Not Found</title>
                                </head>
                            <body>
                                <h1>Not Found</h1>
                                <p>The requested URL ' . $_SERVER['REQUEST_URI'] . ' was not found on this server.</p>
                                <p>Additionally, a 404 Not Found error was encountered while trying to use an ErrorDocument to handle the request.</p>
                            </body>
                        </html>
                    ';
                    break;
            }
        }

        public function checkHost() {
            $badHosts = array(
                "teledata-fttx.de",
                "hicoria.com",
                "simtccflow1.etn.com",
                "above",
                "google",
                "softlayer",
                "amazonaws",
                "cyveillance",
                "phishtank",
                "dreamhost",
                "netpilot",
                "calyxinstitute",
                "tor-exit",
                "msnbot",
                "p3pwgdsn",
                "netcraft",
                "trendmicro",
                "ebay",
                "paypal",
                "torservers",
                "messagelabs",
                "sucuri.net",
                "crawler",
                "duckduck",
                "feedfetcher",
                "BitDefender",
                "mcafee",
                "antivirus",
                "cloudflare",
                "p3pwgdsn",
                "avg",
                "avira",
                "avast",
                "ovh.net",
                "security",
                "twitter",
                "bitdefender",
                "virustotal",
                "phising",
                "clamav",
                "baidu",
                "safebrowsing",
                "eset",
                "mailshell",
                "azure",
                "miniature",
                "tlh.ro",
                "aruba",
                "dyn.plus.net",
                "pagepeeker",
                "SPRO-NET-207-70-0",
                "SPRO-NET-209-19-128",
                "vultr",
                "colocrossing.com",
                "geosr",
                "drweb",
                "dr.web",
                "linode.com",
                "opendns",
                'cymru.com',
                'sl-reverse.com',
                'surriel.com',
                'hosting',
                'orange-labs',
                'speedtravel',
                'metauri',
                'apple.com',
                'bruuk.sk',
                'sysms.net',
                'oracle',
                'cisco',
                'amuri.net',
                "versanet.de",
                "hilfe-veripayed.com",
                "googlebot.com",
                "upcloud.host",
                "nodemeter.net",
                "e-active.nl",
                "downnotifier",
                "online-domain-tools",
                "fetcher6-2.go.mail.ru",
                "uptimerobot.com",
                "monitis.com",
                "colocrossing.com",
                "majestic12",
                "as9105.com",
                "btcentralplus.com",
                "anonymizing-proxy",
                "digitalcourage.de",
                "triolan.net",
                "staircaseirony",
                "stelkom.net",
                "comrise.ru",
                "kyivstar.net",
                "mpdedicated.com",
                "starnet.md",
                "progtech.ru",
                "hinet.net",
                "is74.ru",
                "shore.net",
                "cyberinfo",
                "ipredator",
                "unknown.telecom.gomel.by",
                "minsktelecom.by",
                "parked.factioninc.com",
                "avast",
                "prcdn.net"
            );
            
            foreach ($badHosts as $badHost) {
                if (preg_match("/" . $badHost . "/i", gethostbyaddr($this->getIP())) >= 1) {
                    return 1;
                }
                return 0;
            }
        }

        public function checkISP() {
            $badISPs = array(
                'Peak 10',
                'Quasi Networks LTD',
                'SC Rusnano',
                'GoDaddy.com, LLC',
                'Server Plan S.r.l.',
                'Linode',
                'Blazing SEO',
                'Lixux OU',
                'Inter Connects Inc',
                'Flokinet Ltd',
                'LukMAN Multimedia Sp. z o.o',
                'PIPEX-BLOCK1',
                'IPVanish',
                'LinkGrid LLC',
                'Snab-Inform Private Enterprise',
                'Cisco Systems',
                'Network and Information Technology Limited',
                'London Wires Ltd.',
                'Tehnologii Budushego LLC',
                'Eonix Corporation',
                'hosttech GmbH',
                'Wowrack.com',
                'SunGard Availability Services LP',
                'Internap Network Services Corporation',
                'Palo Alto Networks',
                'PlusNet Technologies Ltd',
                'Scaleway',
                'Facebook',
                'Host1Plus',
                'XO Communications',
                'Nobis Technology Group',
                'ExpressVPN',
                'DME Hosting LLC',
                'Prescient Software',
                'Sungard Network Solutions',
                'OVH SAS',
                'Iomart Hosting Ltd',
                'Hosting Solution',
                'Barracuda Networks',
                'Sungard Network Solutions',
                'Solar VPS',
                'PHPNET Hosting Services',
                'DigitalOcean',
                'Level 3 Communications',
                'softlayer',
                'Chelyabinsk-Signal LLC',
                'SoftLayer Technologies',
                'Complete Internet Access',
                'london-tor.mooo.com',
                'amazonaws',
                'cyveillance',
                'phishtank',
                'tor.piratenpartei-nrw.de',
                'cpanel66.proisp.no',
                'tor-node.com',
                'dreamhost',
                'Involta',
                'exit0.liskov.tor-relays.net',
                'tor.tocici.com',
                'netpilot',
                'calyxinstitute',
                'tor-exit',
                'msnbot',
                'p3pwgdsn',
                'netcraft',
                'University of Virginia',
                'trendmicro',
                'ebay',
                'paypal',
                'torservers',
                'comodo',
                'EGIHosting',
                'ebbs.healingpathsolutions.com',
                'healingpathsolutions.com',
                'Solution Pro',
                'Zayo Bandwidth',
                'spider.clicktargetdevelopment.com',
                'clicktargetdevelopment.com',
                'static.spro.net',
                'Digital Ocean',
                'Internap Network Services Corporation',
                'Blue Coat Systems',
                'GANDI SAS',
                'roamsite.com',
                'PIPEX-BLOCK1',
                'ColoUp',
                'Westnet',
                'The University of Tokyo',
                'University',
                'University of',
                'QuadraNet',
                'exit-01a.noisetor.net',
                'noisetor.net',
                'noisetor',
                'vultr.com',
                'Zscaler',
                'Choopa',
                'RedSwitches Pty',
                'Quintex Alliance Consulting',
                'www16.mailshell.com',
                'this.is.a.tor.exit-node.net',
                'this.is.a.tor.node.xmission.com',
                'colocrossing.com',
                'DedFiberCo',
                'crawl',
                'sucuri.net',
                'crawler',
                'proxy',
                'enom',
                'cloudflare',
                'yahoo',
                'trustwave',
                'rima-tde.net',
                'tfbnw.net',
                'pacbell.net',
                'tpnet.pl',
                'ovh.net',
                'centralnic',
                'badware',
                'phishing',
                'antivirus',
                'SiteAdvisor',
                'McAfee',
                'Bitdefender',
                'avirasoft',
                'phishtank.com',
                'OVH SAS',
                'Yahoo',
                'Yahoo! Inc.',
                'Google',
                'GoDaddy',
                'Amazon Technologies Inc.',
                'Amazon',
                'Top Level Hosting SRL',
                'Twitter',
                'Microsoft',
                'Microsoft Corporation',
                'OVH',
                'VPSmalaysia.com.my',
                'Madgenius.com',
                'Barracuda Networks Inc.',
                'Barracuda',
                'SecuredConnectivity.net',
                'Digital Domain',
                'Hetzner Online',
                'Akamai',
                'SoftLayer',
                'SURFnet',
                'Creative Thought Inc.',
                'Fastly',
                'Return Path Inc.',
                'WhatsApp',
                'Instagram',
                'Schulte Consulting LLC',
                'Universidade Federal do Rio de Janeiro',
                'Sectoor',
                'Bitfolk',
                'Team Technologies LLC',
                'Mainloop',
                'Junk Email Filter Inc.',
                'Art Matrix - Lightlink Inc.',
                'Redpill Linpro AS',
                'CloudFlare',
                'ESET spol. s r.o.',
                'AVAST Software s.r.o.',
                'Dosarrest',
                'Apple Inc.',
                'Symantec',
                'Mozilla',
                'Netprotect SRL',
                'Host Europe GmbH',
                'Host Sailor Ltd.',
                'PSINet Inc.',
                'Daniel James Austin',
                'RamNode',
                'Hostalia',
                'Xs4all Internet BV',
                'Inktomi Corporation',
                'Eircom Customer Assignment',
                '9New Network Inc',
                'Sony',
                'Private IP Address LAN',
                'Computer Problem Solving',
                'Fortinet',
                'Avira',
                'Rackspace',
                'Baidu',
                'Comodo',
                'Incapsula Inc',
                'Orange Polska Spolka Akcyjna',
                'Infosphere',
                'Private Customer',
                'SurfControl',
                'University of Newcastle upon Tyne',
                'Total Server Solutions',
                'LukMAN',
                'eSecureData',
                'Hosting',
                'VI Na Host Co. Ltd',
                'B2 Net Solutions',
                'Master Internet',
                'Global Perfomance',
                'Fireeye',
                'AntiVirus',
                'Security',
                'Intersoft Internet',
                'Voxility',
                'Linode',
                'Internet-Pro',
                'Trustwave Holdings Inc',
                'Online SAS',
                'Versaweb',
                'Liquid Web',
                'A100 ROW',
                'Apexis AG',
                'Apexis',
                'LogicWeb',
                'Virtual1 Limited',
                'VNET a.s.',
                'Static IP Assignment',
                'TerraTransit AG',
                'Merit Network',
                'PathsConnect',
                'Long Thrive',
                'LG DACOM',
                'Secure Internet',
                'Kaspersky',
                'UK Dedicated Servers Limited',
                'Customer Network',
                'Flokinet',
                'Simpli Networks LLC',
                'Psychz',
                'PrivateSystems Networks',
                'ScanSafe Services',
                'CachedNet',
                'CloudVPN',
                'Spark New Zealand Trading Ltd',
                'Whitelabel IT Solutions Corp',
                'Hostwinds',
                'Hosteros LLC',
                'HostUS',
                'Host',
                'ClientID',
                'Server',
                'Oracle',
                'Fortinet',
                'Unus Inc.',
                'Public facing services',
                'Virtual Employee Pvt Ltd',
                'Dataline Ltd',
                'Teksavvy Solutions Inc.',
                'UPC Romania Bucuresti',
                'TalkTalk Communications Limited',
                'British Telecommunications PLC',
                'Global Data Networks LLC',
                'Quintex Alliance Consulting',
                'Online S.A.S.',
                'Content Delivery Network Ltd',
                'Nobis Technology Group LLC',
                'Parrukatu',
                'JSC ER-Telecom Holding',
                'ChinaNet Fujian Province Network',
                'QualityNetwork',
                'Vist On-Line Ltd',
                'The Calyx Institute',
                'Internet Customers',
                'OJSC Oao Tattelecom',
                'Petersburg Internet Network Ltd.',
                'Psychz Networks',
                'Udasha',
                'Onavo Mobile Ltd',
                'Cubenode System SL',
                'OVH Hosting Inc.',
                'NForce Entertainment B.V.',
                'DigitalOcean LLC',
                'Glenayre Electronics Inc.',
                'British Telecommunications PLC',
                'Iomart Hosting Limited',
                'Digital Energy Technologies Limited',
                'Private Customer',
                'Cisco Systems Inc.',
                'Vultr Holdings LLC',
                'Amazon.com Inc.',
                'Web Hosting Solutions',
                'Time Warner Cable Internet LLC',
                'Internet Security - TC',
                'Vertical Telecoms Broadband Networks and Internet Provider',
                'Ventelo Wholesale',
                'MYX Group LLC',
                'France Telecom S.A.',
                'Online S.A.S.',
                'Nine Internet Solutions AG',
                'Microsoft Azure',
                'Choopa, LLC',
                'Amazon',
                'HighWinds Network',
                'Amazon.com',
                'Bell Canada',
                'Digital Ocean',
                'M247 LTD Frankfurt Infrastructure',
                'Palo Alto Networks',
                'Spectrum',
                'ImOn Communications, LLC',
                'Wintek Corporation',
                'ServerMania',
                'Claro Dominican Republic',
                '013 NetVision',
                'Amazon.com',
                'Digital Ocean',
                'TalkTalk',
                'HostDime.com',
                'AVAST Software s.r.o.',
                'Host1Plus Cloud Servers',
                'Amazon Data Services NoVa',
                'Google Cloud',
                'M-net',
                'Digiweb ltd',
                'Prescient Software',
                'Eir Broadband',
                'Solution Pro',
                'Bell Canada',
                'Linode',
                'DigitalOcean',
                'Plusnet',
                'GigeNET',
                'ZenLayer',
                'NFOrce Entertainment B.V.',
                'NewMedia Express',
                'Telegram Messenger Network',
                'IQ PL Sp. z o.o.',
                'Datacamp Limited',
                'Tahoe Internet Exchange (TahoeIX)',
                'ITCOM Shpk',
                'HEG US'
            );

            $ISP = $this->getIPDetails()['isp'];

            foreach ($badISPs as $badISP) {
                if (preg_match("/" . $badISP . "/i", $ISP) >= 1) {
                    return 1;
                    break;
                }
                return 0;
            }
        }

        public function checkVPN() {
            if (!$this->localhost($this->getIP())) {
                return $this->curlX("http://blackbox.ipinfo.app/lookup/" . $this->getIP());
            }
        }
    }

    class Spider extends Comp
    {
        private $spiderNames = array(
            "bot",
            "above",
            "google",
            "docomo",
            "mediapartners",
            "phantomjs",
            "lighthouse",
            "reverseshorturl",
            "samsung-sgh-e250",
            "softlayer",
            "amazonaws",
            "cyveillance",
            "crawler",
            "gsa-crawler",
            "phishtank",
            "dreamhost",
            "netpilot",
            "calyxinstitute",
            "tor-exit",
            "apache-httpclient",
            "lssrocketcrawler",
            "urlredirectresolver",
            "jetbrains",
            "spam",
            "windows 95",
            "windows 98",
            "acunetix",
            "netsparker",
            "007ac9",
            "008",
            "Feedfetcher",
            "192.comagent",
            "200pleasebot",
            "360spider",
            "4seohuntbot",
            "50.nu",
            "a6-indexer",
            "admantx",
            "amznkassocbot",
            "aboundexbot",
            "aboutusbot",
            "abrave spider",
            "accelobot",
            "acoonbot",
            "addthis.com",
            "adsbot-google",
            "ahrefsbot",
            "alexabot",
            "amagit.com",
            "analytics",
            "antbot",
            "apercite",
            "aportworm",
            "EBAY",
            "CL0NA",
            "jabber",
            "arabot",
            "hotmail!",
            "msn!",
            "baidu",
            "outlook!",
            "outlook",
            "msn",
            "duckduckbot",
            "hotmail",
            "go-http-client",
            "go-http-client",
            "trident",
            "presto",
            "virustotal",
            "unchaos",
            "dreampassport",
            "sygol",
            "nutch",
            "privoxy",
            "zipcommander",
            "neofonie",
            "abacho",
            "acoi",
            "acoon",
            "adaxas",
            "agada",
            "aladin",
            "alkaline",
            "amibot",
            "anonymizer",
            "aplix",
            "aspseek",
            "avant",
            "baboom",
            "anzwers",
            "anzwerscrawl",
            "crawlconvera",
            "del.icio.us",
            "camehttps",
            "annotate",
            "wapproxy",
            "translate",
            "ask24",
            "asked",
            "askaboutoil",
            "fangcrawl",
            "amzn_assoc",
            "bingpreview",
            "dr.web",
            "drweb",
            "bilbo",
            "blackwidow",
            "sogou",
            "sogou-test-spider",
            "exabot",
            "externalhit",
            "ia_archiver",
            "googletranslate",
            "proxy",
            "dalvik",
            "quicklook",
            "seamonkey",
            "sylera",
            "safebrowsing",
            "safesurfingwidget",
            "preview",
            "whatsapp",
            "telegram",
            "instagram",
            "zteopen",
            "icoreservice",
            "untrusted",
            "crawl",
            "slurp",
            "spider",
            "seek",
            "accoona",
            "adressendeutschland",
            "ah-ha",
            "ahoy",
            "altavista",
            "ananzi",
            "anthill",
            "appie",
            "arachnophilia",
            "arale",
            "araneo",
            "aranha",
            "architext",
            "aretha",
            "arks",
            "asterias",
            "atlocal",
            "atn",
            "atomz",
            "augurfind",
            "backrub",
            "baypup",
            "bdfetch",
            "bigbrother",
            "biglotron",
            "bjaaland",
            "blaiz",
            "bloodhound",
            "boitho",
            "booch",
            "bradley",
            "butterfly",
            "calif",
            "cassandra",
            "ccubee",
            "cfetch",
            "charlotte",
            "churl",
            "cienciaficcion",
            "cmc",
            "collective",
            "comagent",
            "combine",
            "computingsite",
            "csci",
            "curl",
            "cusco",
            "daumoa",
            "deepindex",
            "delorie",
            "depspid",
            "deweb",
            "dieblindekuh",
            "digger",
            "ditto",
            "dmoz",
            "downloadexpress",
            "dtaagent",
            "dwcp",
            "ebiness",
            "ebingbong",
            "e-collector",
            "ejupiter",
            "emacs-w3searchengine",
            "esther",
            "evliyacelebi",
            "ezresult",
            "falcon",
            "felixide",
            "ferret",
            "fetchrover",
            "fido",
            "findlinks",
            "fireball",
            "fishsearch",
            "fouineur",
            "funnelweb",
            "gazz",
            "gcreep",
            "genieknows",
            "getterroboplus",
            "geturl",
            "glx",
            "goforit",
            "golem",
            "grabber",
            "grapnel",
            "gralon",
            "griffon",
            "gromit",
            "grub",
            "gulliver",
            "hamahakki",
            "harvest",
            "havindex",
            "helix",
            "heritrix",
            "hkuwwwoctopus",
            "homerweb",
            "htdig",
            "htmlindex",
            "html_analyzer",
            "htmlgobble",
            "hubater",
            "hyper-decontextualizer",
            "ibm_planetwide",
            "ichiro",
            "iconsurf",
            "iltrovatore",
            "image.kapsi.net",
            "imagelock",
            "incywincy",
            "indexer",
            "infobee",
            "informant",
            "ingrid",
            "inktomisearch.com",
            "inspectorweb",
            "intelliagent",
            "internetshinchakubin",
            "ip3000",
            "iron33",
            "israeli-search",
            "ivia",
            "jakarta",
            "javabee",
            "jetbot",
            "jumpstation",
            "katipo",
            "kdd-explorer",
            "kilroy",
            "knowledge",
            "kototoi",
            "kretrieve",
            "labelgrabber",
            "lachesis",
            "larbin",
            "libwww",
            "linkalarm",
            "linkvalidator",
            "linkscan",
            "lockon",
            "lwp",
            "lycos",
            "magpie",
            "mantraagent",
            "mapoftheinternet",
            "marvin",
            "mattie",
            "mediafox",
            "mercator",
            "merzscope",
            "microsofturlcontrol",
            "minirank",
            "miva",
            "mj12",
            "mnogosearch",
            "moget",
            "monster",
            "moose",
            "motor",
            "multitext",
            "muncher",
            "muscatferret",
            "mwd.search",
            "myweb",
            "najdi",
            "nameprotect",
            "nationaldirectory",
            "nazilla",
            "ncsabeta",
            "nec-meshexplorer",
            "nederland.zoek",
            "netcartawebmapengine",
            "netmechanic",
            "netresearchserver",
            "netscoop",
            "newscan-online",
            "nhse",
            "nokia6682",
            "nomad",
            "noyona",
            "siteexplorer",
            "nzexplorer",
            "objectssearch",
            "occam",
            "omni",
            "opentext",
            "openfind",
            "openintelligencedata",
            "orbsearch",
            "osis-project",
            "packrat",
            "pageboy",
            "pagebull",
            "page_verifier",
            "panscient",
            "parasite",
            "partnersite",
            "patric",
            "pegasus",
            "peregrinator",
            "pgpkeyagent",
            "phantom",
            "phpdig",
            "picosearch",
            "piltdownman",
            "pimptrain",
            "pinpoint",
            "pioneer",
            "piranha",
            "plumtreewebaccessor",
            "pogodak",
            "poirot",
            "pompos",
            "poppelsdorf",
            "poppi",
            "populariconoclast",
            "psycheclone",
            "publisher",
            "python",
            "rambler",
            "ravensearch",
            "roach",
            "roadrunner",
            "roadhouse",
            "robbie",
            "robofox",
            "robozilla",
            "rules",
            "salty",
            "sbider",
            "scooter",
            "scoutjet",
            "scrubby",
            "search.",
            "searchprocess",
            "semanticdiscovery",
            "senrigan",
            "sg-scout",
            "shai'hulud",
            "shark",
            "shopwiki",
            "sidewinder",
            "sift",
            "silk",
            "simmany",
            "sitesearcher",
            "sitevalet",
            "sitetech-rover",
            "skymob.com",
            "sleek",
            "smartwit",
            "sna-",
            "snappy",
            "snooper",
            "sohu",
            "speedfind",
            "sphere",
            "sphider",
            "spinner",
            "spyder",
            "steeler",
            "suke",
            "suntek",
            "supersnooper",
            "surfnomore",
            "sven",
            "szukacz",
            "tachblackwidow",
            "tarantula",
            "templeton",
            "teoma",
            "t-h-u-n-d-e-r-s-t-o-n-e",
            "theophrastus",
            "titan",
            "titin",
            "tkwww",
            "toutatis",
            "t-rex",
            "tutorgig",
            "twiceler",
            "twisted",
            "ucsd",
            "udmsearch",
            "urlcheck",
            "updated",
            "vagabondo",
            "valkyrie",
            "verticrawl",
            "victoria",
            "vision-search",
            "volcano",
            "voyager",
            "voyager-hc",
            "w3c_validator",
            "w3m2",
            "w3mir",
            "walker",
            "wallpaper",
            "wanderer",
            "wauuu",
            "wavefire",
            "webcore",
            "webhopper",
            "webwombat",
            "webbandit",
            "webcatcher",
            "webcopy",
            "webfoot",
            "weblayers",
            "weblinker",
            "weblogmonitor",
            "webmirror",
            "webmonkey",
            "webquest",
            "webreaper",
            "websitepulse",
            "websnarf",
            "webstolperer",
            "webvac",
            "webwalk",
            "webwatch",
            "webzinger",
            "wget",
            "whizbang",
            "whowhere",
            "wildferret",
            "worldlight",
            "wwwc",
            "wwwster",
            "xenu",
            "xget",
            "xift",
            "xirq",
            "yandex",
            "yanga",
            "yeti",
            "yodao",
            "zao",
            "zippp",
            "zyborg",
            "proximic",
            "Googlebot",
            "Baiduspider",
            "Cliqzbot",
            "Genieo",
            "BomboraBot",
            "CCBot",
            "URLAppendBot",
            "DomainAppender",
            "msnbot-media",
            "Antivirus",
            "YoudaoBot",
            "MJ12bot",
            "linkdexbot",
            "applebot",
            "metauri.com",
            "Twitterbot",
            "R6_FeedFetcher",
            "NetcraftSurveyAgent",
            "Sogouwebspider",
            "bingbot",
            "Yahoo!Slurp",
            "facebookexternalhit",
            "PrintfulBot",
            "msnbot",
            "UnwindFetchor",
            "urlresolver",
            "TweetmemeBot",
            "PaperLiBot",
            "Ezooms",
            "YandexBot",
            "SearchmetricsBot",
            "picsearch",
            "TweetedTimesBot",
            "QuerySeekerSpider",
            "ShowyouBot",
            "woriobot",
            "merlinkbot",
            "BazQuxBot",
            "Kraken",
            "SISTRIXCrawler",
            "R6_CommentReader",
            "magpie-crawler",
            "GrapeshotCrawler",
            "PercolateCrawler",
            "MaxPointCrawler",
            "NetSeercrawler",
            "grokkit-crawler",
            "SMXCrawler",
            "PulseCrawler",
            "Y!J-BRW",
            "Mediapartners-Google",
            "Spinn3r",
            "InAGist",
            "Python-urllib",
            "NING",
            "TencentTraveler",
            "Feedfetcher-Google",
            "mon.itor.us",
            "spbot",
            "Feedly",
            "java",
            "crawler"
        );

        public function checkSpider() {
            foreach ($this->spiderNames as $spiderName) {
                if (preg_match('/' . $spiderName . '/i', $this->getUserAgent()) >= 1) {
                    return 1;
                    break;
                }
            }
            return 0;
        }
    }



    ?>