<?php
define("BASEPATH", '');
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
include "../class/referer.php";
include "../class/conn_db.php";
include "../class/reader.php";
include "../class/data.inc.php";
include "../class/filter.inc.php";

$appid = filterpost('app_id');
$mod = filterget('mod');
// $data = array('N');	
if($appid){
$cekAPPId = cekAPPId($appid);
$AppDomain  = AppDomain();
$AppDomain  = $AppDomain['site_name'];
if($cekAPPId['appdomain']!=$domain AND $domain !=$AppDomain){
	$data = array("akses" => 'N');
	echo json_encode($data);
	exit;
}

if($cekAPPId['status']==1){
$global = $cekAPPId['id'];
$_host = $cekAPPId['host'];
}else{
$global = 'a';
$_host = '';
}

switch($mod){
case "pond":
$lbrcetak = isset($_POST['lbrcetak']) ? $_POST['lbrcetak'] : '';
		$tgcetak = isset($_POST['tgcetak']) ? $_POST['tgcetak'] : '';
		$lp = isset($_POST['lp']) ? $_POST['lp'] : '';
		$tp = isset($_POST['tp']) ? $_POST['tp'] : '';
		// $muat = 'Y';

		$data = array();

		if ($lp >= $lbrcetak) {
			$lmuat = 'N';
		}
		if ($tp >= $tgcetak) {
			$tmuat = 'N';
		}

		if ($lmuat == 'N') {
			$data = array('lp' => 'N');
		} elseif ($tmuat == 'N') {
			$data = array('tp' => 'N');
		} else {
			$data = array('Y');
		}
break;
case "mesin":
// echo 2;
$_id = filterpost('id');
$data = array();
	$sql = $db->query("select * from data_mesin where id_user='$global' AND publish='0'");
	$jml=$sql->num_rows;
	if($jml>0){
	$rows=$sql->fetch_array();
		$dataJson = $rows['data_json'];
		$data = json_decode($dataJson);
		foreach($data->mesin as $row){
		if($row->kdmesin==$_id){
		$data = array('jenis'=>$row->jenis_mesin);	
		}
	}
	}else{
	$data = array('jenis'=>"1");	
	}	
break;
case "ukplano":
$ukuran= filterpost('ukuran');
$data = array();
$ArrayUKertas = ArrayPlano($global);
$value=pilihPlano($ArrayUKertas['plano'],$ukuran);
$data = array(number_format($value['panjang'],1),number_format($value['lebar'],1),);
break;
case "cariukuran":
// echo 3;
$ukuran= filterpost('ukuran');
$data = array();
$ArrayUKertas = ArrayUKertas($global);
$value=pilih1Kertas($ArrayUKertas['kertas'],$ukuran);
$data = array(number_format($value['panjang'],1),number_format($value['lebar'],1),);
break;
case "cekukuranam":
$ukuran= filterpost('ukuran');
$data = array();
$ArrayUKertas = ArrayBahan($global);
$value=pilihARBahan($ArrayUKertas['bahan'],$ukuran);
$data = array(number_format($value['Tinggi'],1),number_format($value['Lebar'],1),);
// echo json_encode($data);
break;
case "cekukuran":
// echo 4;
$lbrcetak= isset($_POST['lbrcetak']) ? $_POST['lbrcetak'] : '';
$tgcetak= isset($_POST['tgcetak']) ? $_POST['tgcetak'] : '';
$mesin= isset($_POST['mesin']) ? $_POST['mesin'] : '';
$muat = 'N';
$data = array();
	$sql = $db->query("select * from data_mesin where id_user='$global' AND publish='0'");
	$jml=$sql->num_rows;
	if($jml>0){
	$rows=$sql->fetch_array();
		$dataJson = $rows['data_json'];
		$data = json_decode($dataJson);
		foreach($data->mesin as $row){
		if($row->kdmesin==$mesin){
		$lebartext = $row->lebarcetak;
		$tinggitext = $row->panjangcetak;
		$namamesin = $row->namamesin;
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
$data = array('N',$namamesin,$lebartext,$tinggitext);	
}else{
$data = array('Y');		
}
break;
}
}else{
	// echo 5;
$data = array('N');	
}
echo json_encode($data);
?>