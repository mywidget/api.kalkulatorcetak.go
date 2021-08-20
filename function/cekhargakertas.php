<?php
error_reporting(0);
session_start();
if (empty($_SESSION['namauser'])){
echo json_encode(array(404 => "error"));
}else{
include "../conn/konfigurasi.php";
include "../function/reader.php";

$id= isset($_GET['id']) ? $_GET['id'] : '';
$ada = 'N';
koneksi2_buka();
$data = array();
//Mulai Hitung Ongkos Cetak dan mesin	
	$sql = mysql_query("SELECT id_kategori FROM tbl_bahan WHERE id_kategori='".$id."' AND Harga_Bahan > 0");
	$ketemu=mysql_num_rows($sql);
//echo $ketemu;
	if ($ketemu > 0){
			$ada = 'Y';
		}	
		//	echo $lebartext . "x" . $tinggitext . "=" .$jmlpot . "<br>";
		
koneksi2_tutup();
if ($ada == 'N'){
$data = array('N');	
}else{
$data = array('Y');		
}
	
echo json_encode($data);
}
?>