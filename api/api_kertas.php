<?php
	define("BASEPATH", '');
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json");
	// define("BASEPATH", gethostbyaddr($_SERVER['REMOTE_ADDR']));
	require_once "../class/conn_db.php";
	require_once "../class/data.inc.php";
	require_once "../class/web_function.php";
	require_once "../class/referer.php";
	include "../class/filter.inc.php";
	// session_start();
	$AppDomain  = AppDomain();
	$AppDomain  = $AppDomain['site_name'];
	function my_sort($a,$b)
	{
		if ($a==$b) return 0;
		return ($a>$b)?-1:1;
	}
	$code = filterget('code');
	$appid = filterget('appid');
	$cekAPPId = cekAPPId($appid);
	
	if($cekAPPId['appdomain']!=$domain AND $domain !=$AppDomain){
		$data = array("akses" => 'N');
		echo json_encode($data);
		exit;
	}
	
	if($cekAPPId['status']==1){
		$global = $cekAPPId['id'];
		}else{
		$global = '';
	}
	if(empty($global)){
		$data[] = array("error login");
		$someArray = json_encode($data, true);
		}else{
		switch($code){
			case "biaya":
			$arrayk = ArrayBiaya($global);
			// print_r($arrayk);
			foreach ($arrayk['biaya'] as $current_key => $current_array) {
				$mod = explode(" ",$current_array['Groups']);
				foreach ($mod as $key => $val) {
					if($val==$_GET['mod']){
						$data[] = array("id"=>$current_array['KdBiaya'],"name"=>$current_array['Nama_Biaya']);
					}
				}
			}
			$someArray = json_encode($data, true);
			break;
			case "selkatbahan":
			$arrays = ArrayKertas($global);
			$search_items = array('id_kategori'=>$_GET['id']);
			$res = search($arrays['katbahan'], $search_items); 
			foreach ($res as $current_array) { 
				$data[] = array("id"=>$current_array['id_kategori'],"name"=>$current_array['nama_kategori']);
			}
			uasort($arrays['katbahan'],"my_sort");
			foreach ($arrays['katbahan'] as $current_key => $current_array) {
				$mod = explode(" ",$current_array['modul']);
				foreach ($mod as $key => $val) {
					if($val==$_GET['mod'] AND $current_array['id_kategori']!=$_GET['id']){
						$data[] = array("id"=>$current_array['id_kategori'],"name"=>$current_array['nama_kategori']);
					}
				}
			}
			$someArray = json_encode($data, true);
			break;
			case "katbahan":
			$arrayk = ArrayKertas($global);
			foreach ($arrayk['katbahan'] as $current_key => $current_array) {
				$mod = explode(" ",$current_array['modul']);
				foreach ($mod as $key => $val) {
					if($val==$_GET['mod']){
						$data[] = array("id"=>$current_array['id_kategori'],"name"=>$current_array['nama_kategori']);
					}
				}
			}
			$someArray = json_encode($data, true);
			break;
			case "plano":
			$arrays = ArrayPlano($global);
			foreach ($arrays['plano'] as $current_key => $current_array) {
				$data[] = array("id"=>$current_array['id'],"name"=>$current_array['ket_ukuran']);
			}
			$someArray = json_encode($data, true);
			break;
			
			case "ukuran":
			$arrays = ArrayUKertas($global);
			if(isset($arrays))
			{
			$search_items = array('id'=>$_GET['id']);
			$res = search($arrays['kertas'], $search_items); 
			foreach ($res as $current_array) 
			{ 
				$data[] = array("id"=>$current_array['id'],"name"=>$current_array['ket_ukuran']);
			}
			uasort($arrays['kertas'],"my_sort");
			foreach ($arrays['kertas'] as $current_key => $current_array) 
			{
				$mod = explode(" ",$current_array['modul']);
				foreach ($mod as $key => $val) 
				{
					if($val==$_GET['mod'] AND $current_array['id']!=$_GET['id'])
					{
						$data[] = array("id"=>$current_array['id'],"name"=>$current_array['ket_ukuran']);
					}
				}
			}
			$someArray = json_encode($data, true);
			}else{
			$json['kertas'] = [
			'id'=>0,
			'ket_ukuran'=>0,
			'panjang'=>0,
			'lebar'=>0,
			'modul'=>"brosur poster paperbag kopsurat buku majalah agenda"
			];
			$someArray = json_encode($json, true);
			}
			break;
			
			case "mesin":
			$arrayk = ArrayMesinz($global);
			foreach ($arrayk['mesin'] as $current_key => $current_array) {
				$mod = explode(" ",$current_array['modul']);
				foreach ($mod as $key => $val) {
					if($val==$_GET['mod'] AND $current_array['aktif']=='Y'){
						$data[] = array("id"=>$current_array['kdmesin'],"name"=>$current_array['namamesin']);
					}
				}
			}
			$someArray = json_encode($data, true);
			break;
			
			case "bahan":
			$sql_bhn = $db->query("SELECT * FROM data_bahan where id_user='$global' AND publish='0'");
			$rows=$sql_bhn->fetch_array();
			$data = json_decode($rows['data_json'],true);
			// $data1 = array("domain"=>"kalkulator.go");
			// $merger = array_merge($data1,$data);
			$someArray = json_encode($data, true);
			break;
			default:
			$data[] = array("error");
			$someArray = json_encode($data, true);
			break;
		}
	}
	echo $someArray;
?>