<?php
	define("BASEPATH", ""); 
	// header("Content-Type: application/json");
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Credentials: true ");
	header("Access-Control-Allow-Methods: OPTIONS, GET, POST");
	header("Access-Control-Allow-Headers: Content-Type, Depth, User-Agent, X-File-Size, X-Requested-With, If-Modified-Since, X-File-Name, Cache-Control");
	
	include __DIR__ . '/../class/conn_db.php';
	include __DIR__ . '/../class/filter.inc.php';
	include __DIR__ . '/../class/data.inc.php';
	include __DIR__ . '/../class/fungsi-fungsi.php';
	include __DIR__ . '/../class/reader.php';
	include __DIR__ . '/../class/library.php';
	include __DIR__ . '/../function/hitungcetak.php';
	include __DIR__ . '/../function/hitbiayacetak.php';
	
	$arr = json_decode(file_get_contents("php://input"));
	if(empty($arr)){
		$hasil = array("akses" => 'N');
		echo json_encode($hasil);
		exit;
	}
	
	$arr = json_encode($arr, JSON_UNESCAPED_SLASHES);
	$type = json_decode($arr);
	
	$token = $type->token;
	$appid = $type->app_id;
	
	$cek_api = cekAPPId($appid);
	$tgl_exp = tgl_exp($cek_api['appexp']);
	if($cek_api['appid']!=$appid){
		$hasil = array("akses" => 'N');
		echo json_encode($hasil);
		exit;
	}
	
	if($cek_api['status']==1){
		$secret = $cek_api['appsecret'];
		$s_email = $cek_api['id'];
		}else{
		$hasil = array("akses" => 'N');
		echo json_encode($hasil);
		exit;
	}
	
	
	$kethitung = $type->kethitung;
	
	$submit = '';
	if (empty($kethitung) or $kethitung == ""){
		$kethitung	= "";
		}else{
		$kethitung 	= str_replace("_"," ",$kethitung);
	}
	
	$arr = [
	'lbrcetak'	    => (isset($type->lbrcetak) ? floatval($type->lbrcetak) : ''),
	'tgcetak'	    => (isset($type->tgcetak) ? floatval($type->tgcetak) : ''),
	'jmlcetak'	    => $type->jmlcetak,
	'bahan' 	    => $type->bahan,
	'bbstat' 	    => !empty($type->bb)?$type->bb:0,
	'jmlwarna' 	    => $type->jmlwarna,
	'jmlwarna2'     => $type->jmlwarna2,
	'lam' 	        => !empty($type->lam)?$type->lam:0,
	'finishing1'    => !empty($type->finishing1)?$type->finishing1:"",
	'finishing2'    => !empty($type->finishing2)?$type->finishing2:"",
	'finishing3'    => !empty($type->finishing3)?$type->finishing3:"",
	'finishing4'    => !empty($type->finishing4)?$type->finishing4:"",
	'finishing5'    => !empty($type->finishing5)?$type->finishing5:"",
	'finishing6'    => !empty($type->finishing6)?$type->finishing6:"",
	'finishing7'    => !empty($type->finishing7)?$type->finishing7:"",
	'finishing8'    => !empty($type->finishing8)?$type->finishing8:"",
	'finishing9'    => !empty($type->finishing9)?$type->finishing9:"",
	'finishing10'   => !empty($type->finishing10)?$type->finishing10:"",
	'tgf1'          => !empty($type->tgf1)?$type->tgf1:"",
	'tgf2'          => !empty($type->tgf2)?$type->tgf2:"",
	'tgf3'          => !empty($type->tgf3)?$type->tgf3:"",
	'tgf4'          => !empty($type->tgf4)?$type->tgf4:"",
	'tgf5'          => !empty($type->tgf5)?$type->tgf5:"",
	'tgf6'          => !empty($type->tgf6)?$type->tgf6:"",
	'tgf7'          => !empty($type->tgf7)?$type->tgf7:"",
	'tgf8'          => !empty($type->tgf8)?$type->tgf8:"",
	'tgf9'          => !empty($type->tgf9)?$type->tgf9:"",
	'tgf10'         => !empty($type->tgf10)?$type->tgf10:"",
	'lbrf1'         => !empty($type->lbrf1)?$type->lbrf1:"",
	'lbrf2'         => !empty($type->lbrf2)?$type->lbrf2:"",
	'lbrf3'         => !empty($type->lbrf3)?$type->lbrf3:"",
	'lbrf4'         => !empty($type->lbrf4)?$type->lbrf4:"",
	'lbrf5'         => !empty($type->lbrf5)?$type->lbrf5:"",
	'lbrf6'         => !empty($type->lbrf6)?$type->lbrf6:"",
	'lbrf7'         => !empty($type->lbrf7)?$type->lbrf7:"",
	'lbrf8'         => !empty($type->lbrf8)?$type->lbrf8:"",
	'lbrf9'         => !empty($type->lbrf9)?$type->lbrf9:"",
	'lbrf10'        => !empty($type->lbrf10)?$type->lbrf10:"",
	'set' 	        => $type->jmlset,
	'modul'         => $type->modul,
	'insheet' 		=> $type->insheet,
	'jml_satuan' 	=> $type->jml_satuan,
	'cetak_bagi' 	=> $type->cetak_bagi,
	'ket_satuan' 	=> $type->ket_satuan,
	'ongpot' 	    => $type->ongpot,
	'j_mesin' 	    => $type->j_mesin,
	'kethitung'     => $kethitung,
	'jilid' 	    => $type->jilid,
	'ongkos_lipat'  => !empty($type->ongkos_lipat)?$type->ongkos_lipat:"",
	'pakeplat' 	    => !empty($type->pakeplat)?$type->pakeplat:null,
	'idkertas' 	    => !empty($type->idkertas)?$type->idkertas:"",
	'tarik' 	    => !empty($type->tarikan)?$type->tarikan:null,
	's_email' 	    => $s_email
	];
	
	$hasil  = array();
	
	if($tgl_sekarang > $tgl_exp){
		$hasil = array("akses" => 'N');
		return;
		}else{
		$hasil = array("akses" => 'Y');
	}
	
	
	
	$data = hitungcetak($arr);
	
	$data2=array();
	$data6=array();
	
	if (!empty($data))
	{
		foreach($data as $key => $value)
		{
			$data2= array_merge($data[$key],$hasil);
			array_push($data6,$data2);
		}
		usort($data6, 'sortByOrder');
		echo json_encode($data6,JSON_NUMERIC_CHECK);
		}else{
		$akses = array("akses" => 'N');
		echo json_encode($akses,JSON_NUMERIC_CHECK);
	}
	
	function sortByOrder($a, $b)
	{
		return $a['jml_total'] - $b['jml_total'];
	}					