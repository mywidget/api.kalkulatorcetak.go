<?php
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
// error_reporting(0);
session_start();
if (empty($_SESSION['g_email'])){
echo json_encode(array(404 => "error"));
}else{
include "../../class/conn_db.php";
include "../../class/data.inc.php";
$j_mesin1= $_GET['j_mesin1'];
$j_mesin2= $_GET['j_mesin2'];
$j_mesin3= $_GET['j_mesin3'];
$j_mesinc= $_GET['j_mesinc'];

$data = array();
$arraym=ArrayMesin($_SESSION['g_id']);
$json1 = json_decode($arraym,true);
// echo $json1;
// print_r($json1);
foreach ($json1['mesin'] as $key=>$val) {
	if($val['jenis_mesin']==$j_mesin1 AND $val['aktif']=='Y'){
	$data['status'] ='ok';
	$data['msg'] ='Mesin MiniOffset ditemukan';
	}elseif($val['kdmesin']==$j_mesin1 AND $val['aktif']=='Y'){
	$data['status'] ='ok';
	$data['msg'] ='Mesin ditemukan';
	break;
	}else{
	$data['status'] ='error';
	$data['msg'] ='Mesin MiniOffset tidak ditemukan';
	}
}
echo json_encode($data);	
}
?>