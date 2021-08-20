<?php
define("BASEPATH", '');
// define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
// error_reporting(0);
session_start();
include __DIR__ . '/../class/conn_db.php';
include __DIR__ . '/../class/library.php';
include __DIR__ . '/../class/filter.inc.php';
include __DIR__ . '/../class/data.inc.php';
include __DIR__ . '/../class/web_function.php';
include __DIR__ . '/../class/referer.php';

$departid = filterpost('jmlprint');   // department id
if($departid==0 || $departid==''){
	$users_arr[] = array("id" => 0, "name" => "-Pilih ukuran-");
	echo json_encode($users_arr);
}else{
$AppDomain  = AppDomain();
$AppDomain  = $AppDomain['site_name'];
$appid = filterpost('app_id');
$cekAPPId = cekAPPId($appid);
if($cekAPPId['appdomain']!=$domain AND $domain !=$AppDomain){
	$data = array("akses" => 'N');
	echo json_encode($data);
	exit;
}

if($cekAPPId['status']==1){
$global = $cekAPPId['id'];
}else{
$global = '';
}

$jmlprint= $_POST['jmlprint'];
$mesin= $_POST['mesin'];
$data = array();
$ArrayPrint=ArrayPrint($global);
$row=pilihPrint($ArrayPrint['hargaprint'],$jmlprint,$mesin);
$data = array($row['harga']);	
echo json_encode($data);
}
?>