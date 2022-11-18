<?php

    require_once './src/Classes/Antibot.php';

    $antibot = new Antibot;

    die($antibot->throw404());

    ?>