<?php
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
session_start();
if (empty($_SESSION['g_email'])){
echo json_encode(array(404 => "error"));
}else{
include "../../class/conn_db.php";
include "../../class/data.inc.php";

$jmlprint= $_GET['jmlprint'];
$mesin= $_GET['mesin'];

$data = array();
$ArrayPrint=ArrayPrint($_SESSION['g_id']);
$row=pilihPrint($ArrayPrint['harga'],$mesin);
$data = array($row['harga']);	
echo json_encode($data);
}
?>