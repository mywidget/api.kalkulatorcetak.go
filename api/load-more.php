<?php
    define("BASEPATH", "");
    header("Access-Control-Allow-Origin: *");
    include __DIR__ . '/../class/lib/function.php';
    include __DIR__ . '/../class/Mobile_Detect.php';
    include __DIR__ . '/../class/filter.inc.php';
    include __DIR__ . '/../class/web_function.php';
    include __DIR__ . '/../class/controler.php';
    include __DIR__ . '/../class/referer.php';
    include __DIR__ . '/../class/link.inc.php';
    include __DIR__ . '/../class/ApiApp.php';
    
    session_start();
    $App = new ApiApp();
    
    // $App->download(array(
    // 'siteapi'     => 'https://api.kalkulatorcetak.go',
    // 'start'       => $_SESSION['start'],
    // 'limit'       => $_SESSION['limit'],
    // 'appid'       => $_SESSION['appid'],
    // 'appsecret'   => $_SESSION['appsecret']
    // ));
     echo $_SESSION['appsecret'];
    // if ($App->get_status()=='ok') {
        // echo $App->get_data();
        // } else {
        // echo "error";
    // }    