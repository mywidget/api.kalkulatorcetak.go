<?php 
if (! defined('BASEPATH')) exit('No direct script access allowed');
$detect = new Mobile_Detect();
$module =  match_uri($_SERVER['REQUEST_URI']);
$link = gets('link') && gets('link') ? gets('link') : '';
$link_act = parseUrl($_SERVER['REQUEST_URI'],0);
$act = parseUrl($_SERVER['REQUEST_URI'],1);
$down = parseUrl($_SERVER['REQUEST_URI'],2);
$pagenum = parseUrl($_SERVER['REQUEST_URI'],3);
$pagelimit = parseUrl($_SERVER['REQUEST_URI'],4);
$_appid = parseUrl($_SERVER['REQUEST_URI'],5);
$_appsecret = parseUrl($_SERVER['REQUEST_URI'],6);


//appid_kertas
$appid_kertas = parseUrl($_SERVER['REQUEST_URI'],2);
?>