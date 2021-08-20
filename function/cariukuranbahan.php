<?php
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
session_start();
// if (empty($_SESSION['namauser'])){
// echo json_encode(array(404 => "error"));
// }else{
include "../../class/conn_db.php";
include "../../class/data.inc.php";
//hitungcetak(
// $ukuran= $_GET['ukuran'];
$ukuran= $_GET['ukuran'];
$data = array();
$ArrayUKertas = ArrayBahan($_SESSION['g_id']);
$value=pilihARBahan($ArrayUKertas['bahan'],$ukuran);
$data = array(number_format($value['Tinggi'],1),number_format($value['Lebar'],1),);
echo json_encode($data);	

// $data = array();
		// $sql = mysql_query("select * from tbl_bahan where id_kategori='$ukuran'");
		// $row=mysql_fetch_array($sql) ;   
// $data = array(number_format($row['Tinggi'],1),number_format($row['Lebar'],1),);	

// echo json_encode($data);
// }
?>