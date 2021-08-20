<?php
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
session_start();
// if (empty($_SESSION['namauser'])){
// echo json_encode(array(404 => "error"));
// }else{
include "../../class/conn_db.php";
include "../../class/data.inc.php";
//hitungcetak(
$ukuran= $_POST['ukuran'];
$data = array();
$ArrayUKertas = ArrayPlano($_SESSION['g_id']);
$value=pilihPlano($ArrayUKertas['plano'],$ukuran);
$data = array(number_format($value['panjang'],1),number_format($value['lebar'],1),);
echo json_encode($data);	 
// }
?>