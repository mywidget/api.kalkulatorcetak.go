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

$departid = filterpost('depart');   // department id
if($departid==0 || $departid==''){
	$users_arr[] = array("id" => 0, "name" => "Pilih");
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

if (!empty($appid)) {
	$ArrayBahan = ArrayBahanDua($global);
	$jsonb = json_decode($ArrayBahan);
	$pilihB2 = pilih_kategori($jsonb->bahan, $departid);
	foreach ($pilihB2 as $val) {
		$users_arr[] = array("id" => $val['Kd_Bhn'], "name" => $val['Nm_Bhn']);
	}
	echo json_encode($users_arr);
} else {
	$users_arr[] = array("id" => 0, "name" => "Pilih");
	echo json_encode($users_arr);
}
}