<?php
define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
header("Content-Type: application/json");
include "../class/referer.php";
include "../class/conn_db.php";
include "reader.php";
$lbrcetak= isset($_POST['lbrcetak']) ? $_POST['lbrcetak'] : '';
$tgcetak= isset($_POST['tgcetak']) ? $_POST['tgcetak'] : '';
$mesin= isset($_POST['mesin']) ? $_POST['mesin'] : '';
$muat = 'N';
$data = array();
	$sql = $db->query("select * from data_mesin where id_user=".$_SESSION['g_id']." AND publish='0'");
	$jml=$sql->num_rows;
	if($jml>0){
	$rows=$sql->fetch_array();
		$dataJson = $rows['data_json'];
		$data = json_decode($dataJson);
		foreach($data->mesin as $row){
		if($row->kdmesin==$mesin){
		$lebartext = $row->lebarcetak;
		$tinggitext = $row->panjangcetak;
		$hitpot = hitung($lbrcetak,$tgcetak, $lebartext, $tinggitext);
		$jmlpot = $hitpot[0]['jml'];
		if ($jmlpot > 0){ 
			$muat = 'Y';
		}	
		}
	}	
	}else{
		$muat = 'N';
	}		
if ($muat == 'N'){
$data = array('N');	
}else{
$data = array('Y');		
}
	
echo json_encode($data);
?>