<?php 
define("BASEPATH", '');
// header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true ");
header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
// define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
include __DIR__ . '/../class/filter.inc.php';

// session_start();
$url_input = "https://api.kalkulatorcetak.go/sandboxm/post/";
if($_POST){
$sync = curl($url_input,json_encode($_POST));
$vr = json_decode($sync,true);
// print_r($sync);
if (empty($vr) or $vr[0]['data']['akses']=='N'){
	$vr[] = array("akses" => 'N');
	echo json_encode($vr);
}elseif($vr[0]['data']['akses']=='Y'){
	echo json_encode($vr);
}
}else{
	$vr = array("akses" => 'N');
	echo json_encode($vr);
}