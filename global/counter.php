<?php
	define("BASEPATH", ''); 
	header("Content-Type: application/json");
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Credentials: true ");
	header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
	header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
	include "../class/referer.php";
	include "../class/conn_db.php";
	include "../class/library.php";
	include "../class/data.inc.php";
	include "../class/filter.inc.php";
	
	$appid = filterpost('app_id');
	$mod = filterpost('mod');
	// $data = array('N');	
	if($appid){
		$cekAPPId = cekAPPId($appid);
		$AppDomain  = AppDomain();
		$AppDomain  = $AppDomain['site_name'];
		if($cekAPPId['appdomain']!=$domain AND $domain !=$AppDomain){
			$data = array("akses" => 'N','domain'=>$AppDomain);
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
		
		count_hitung($global,$mod,$tgl_sekarang);
		$data = array($global,$mod,$tgl_sekarang);	
		}else{
		// echo 5;
		$data = array('N');	
	}
	echo json_encode($data);
?>