<?php
define("BASEPATH", '');
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
include "../class/conn_db.php";
include "../class/data.inc.php";
include "../class/filter.inc.php";
include "../class/referer.php";
include "../class/reader2.php";

$appid = filterpost('app_id');
if($appid){
$cekAPPId = cekAPPId($appid);
if($cekAPPId['appdomain']!=$domain){
	$data = array("akses" => 'N');
	echo json_encode($data);
	exit;
}
$lbr_plano = $_POST['lbr_plano'];
$tinggi_plano = $_POST['tinggi_plano'];
$lbr_pot = $_POST['lbr_pot'];
$tinggi_pot = $_POST['tinggi_pot'];

	if ($tinggi_plano > $lbr_plano){
		$tinggi_plano	= $_POST['lbr_plano'];
		$lbr_plano 		= $_POST['tinggi_plano'];
	}	

	$hitpot = hitung($lbr_pot, $tinggi_pot,$lbr_plano,$tinggi_plano );	
	echo json_encode($hitpot);
}