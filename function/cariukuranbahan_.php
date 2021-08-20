<?php
session_start();
// if (empty($_SESSION['namauser'])){
// echo json_encode(array(404 => "error"));
// }else{
include "../conn/konfigurasi.php";
include "../function/fungsi-fungsi.php";
//hitungcetak(
$ukuran= $_GET['ukuran'];

$data = array();
		$sql = mysql_query("select * from tbl_bahan where id_kategori='$ukuran'");
		$row=mysql_fetch_array($sql) ;   
$data = array(number_format($row['Tinggi'],1),number_format($row['Lebar'],1),);	

echo json_encode($data);
// }
?>