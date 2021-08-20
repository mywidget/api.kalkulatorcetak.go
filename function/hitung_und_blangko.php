<?php 
error_reporting(0);
session_start();
if (empty($_SESSION['mailuser'])){
echo json_encode(array(404 => "error"));
}else{
include "../conn/referer.php";
if (($referer==$host OR $referer==$host.'index.php')){
include "../conn/konfigurasi.php";
include "../function/fungsi-fungsi.php";

$kode= $_GET['kode'];
$jml= $_GET['jml'];
koneksi2_buka();
$data = array();
		$sql = mysql_query("select * from tbl_und_blangko where kode='$kode'");
		$row=mysql_fetch_array($sql) ;   

					
			$data = array($row['nama'],$row['harga'],$row['oc'],$row['master'],$row['harga_plastik']);	
			
			
koneksi2_tutup();
echo json_encode($data);
}else{
echo json_encode(array(401 => "Akses ditolak"));	
}
}
?>