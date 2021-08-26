<?php
	session_start();
	define("BASEPATH", "");
	// header("Content-Type: application/json");
	header("Access-Control-Allow-Origin: *");
	include __DIR__ . '/../class/conn_db.php';
	include __DIR__ . '/../class/filter.inc.php';
	include __DIR__ . '/../class/data.inc.php';	include __DIR__ . '/../class/fungsi-fungsi.php';
	include __DIR__ . '/../class/controler.php';
	include __DIR__ . '/../class/library.php';
	// $AppDomain  = AppDomain();
	// $AppDomain  = $AppDomain['site_name'];
	$arr	= json_decode(file_get_contents("php://input"));
	$arr	= json_encode($arr, JSON_UNESCAPED_SLASHES);
	$type 	= json_decode($arr);
	// print_r($type);
	
	$domain = $type->domain;
	$secret = $type->secret;
	$appid  = $type->app_id;
	$start  = $type->start;
	$limit  = $type->limit;
	
	if(empty($appid)){
		$dummy = '{"lim":{"start":0,"limit":6},"status":0,"uid":"2","dstyle":"{\"theme\":[{\"id\":\"2\",\"nama\":\"Style 2\",\"style\":\"-\",\"klass\":\"dua\",\"pub\":\"Y\"}]}","dproduk":"1","modul":[{"name":"a.DATA TIDAK DITEMUKAN","slug":"none","video":"yPysn7PTTgQ","video2":"bpaR4n2-ywk","className":"","color":"#ef8700"}],"count":"1"}';
		$dummy = json_decode($dummy);
		echo json_encode($dummy);
		exit;
	}
	
	if(empty($type->secret)){
		$dummy = '{"lim":{"start":0,"limit":6},"status":0,"uid":"2","dstyle":"{\"theme\":[{\"id\":\"2\",\"nama\":\"Style 2\",\"style\":\"-\",\"klass\":\"dua\",\"pub\":\"Y\"}]}","dproduk":"1","modul":[{"name":"b.DATA TIDAK DITEMUKAN","slug":"none","video":"yPysn7PTTgQ","video2":"bpaR4n2-ywk","className":"","color":"#ef8700"}],"count":"1"}';
		$dummy = json_decode($dummy);
		echo json_encode($dummy);
		exit;
	}
	if($domain=='kalkulatorcetak.go'){
	// $cek_app = cekApiDomain($secret,$appid,$domain);
	$cek_app = cekApi($secret,$appid);
	}else{
	$cek_app = cekApi($secret,$appid);
	}
	// print_r($cek_app);
	$_cek = cek_pembelian($cek_app['id']);
	
	if($cek_app['lvl'] !='admin'){
	if($_cek==0 AND $cek_app['lvl'] !='demo'){
		$dummy = '{"lim":{"start":0,"limit":6},"status":5,"title":"Maaf","msg":"Pembelian masih pending","uid":"2","dstyle":"{\"theme\":[{\"id\":\"2\",\"nama\":\"Style 2\",\"style\":\"-\",\"klass\":\"dua\",\"pub\":\"Y\"}]}","dproduk":"1","modul":[{"name":"APP EXPIRE ","slug":"none","video":"yPysn7PTTgQ","video2":"bpaR4n2-ywk","className":"","color":"#ef8700"}],"count":"1"}';
		$dummy = json_decode($dummy);
		echo json_encode($dummy);
		exit;
	}

	if($_cek==2 AND $cek_app['lvl'] !='demo'){
		$dummy = '{"lim":{"start":0,"limit":6},"status":5,"title":"Maaf","msg":"Maaf Pembelian dibatalkan","uid":"2","dstyle":"{\"theme\":[{\"id\":\"2\",\"nama\":\"Style 2\",\"style\":\"-\",\"klass\":\"dua\",\"pub\":\"Y\"}]}","dproduk":"1","modul":[{"name":"APP EXPIRE ","slug":"none","video":"yPysn7PTTgQ","video2":"bpaR4n2-ywk","className":"","color":"#ef8700"}],"count":"1"}';
		$dummy = json_decode($dummy);
		echo json_encode($dummy);
		exit;
	}
	if($_cek==3 AND $cek_app['lvl'] !='demo'){
		$dummy = '{"lim":{"start":0,"limit":6},"status":5,"title":"Maaf","msg":"Pembelian Tidak ditemukan","uid":"2","dstyle":"{\"theme\":[{\"id\":\"2\",\"nama\":\"Style 2\",\"style\":\"-\",\"klass\":\"dua\",\"pub\":\"Y\"}]}","dproduk":"1","modul":[{"name":"APP EXPIRE","slug":"none","video":"yPysn7PTTgQ","video2":"bpaR4n2-ywk","className":"","color":"#ef8700"}],"count":"1"}';
		$dummy = json_decode($dummy);
		echo json_encode($dummy);
		exit;
	}
	}
	$tgl_exp = tgl_exp($cek_app['appexp']);
	if($cek_app['appid']!=$appid){
		$dummy = '{"lim":{"start":0,"limit":6},"status":0,"uid":"2","dstyle":"{\"theme\":[{\"id\":\"2\",\"nama\":\"Style 2\",\"style\":\"-\",\"klass\":\"dua\",\"pub\":\"Y\"}]}","dproduk":"1","modul":[{"name":"NOT FOUND","slug":"none","video":"yPysn7PTTgQ","video2":"bpaR4n2-ywk","className":"","color":"#ef8700"}],"count":"1"}';
		$dummy = json_decode($dummy);
		echo json_encode($dummy);
		exit;
	}
	
	// if($cek_app['appdomain']!=$domain AND $domain !=$AppDomain AND $domain!='localhost'  OR $domain!='kalkulatorcetak.go'){
	// $dummy = '{"lim":{"start":0,"limit":6},"status":0,"uid":"2","dstyle":"{\"theme\":[{\"id\":\"2\",\"nama\":\"Style 2\",\"style\":\"-\",\"klass\":\"dua\",\"pub\":\"Y\"}]}","dproduk":"1","modul":[{"name":"NONE","slug":"none","video":"yPysn7PTTgQ","video2":"bpaR4n2-ywk","className":"","color":"#ef8700"}],"count":"1"}';
	// $dummy = json_decode($dummy);
	// echo json_encode($dummy);
	// exit;
	// }
	
	if($cek_app['appsecret']!=$secret){
		$dummy = '{"lim":{"start":0,"limit":6},"status":0,"uid":"2","dstyle":"{\"theme\":[{\"id\":\"2\",\"nama\":\"Style 2\",\"style\":\"-\",\"klass\":\"dua\",\"pub\":\"Y\"}]}","dproduk":"1","modul":[{"name":"NONE 2","slug":"none","video":"yPysn7PTTgQ","video2":"bpaR4n2-ywk","className":"","color":"#ef8700"}],"count":"1"}';
		$dummy = json_decode($dummy);
		echo json_encode($dummy);
		exit;
	}
	
	if($tgl_sekarang >= $tgl_exp){
		$dummy = '{"lim":{"start":0,"limit":6},"status":5,"title":"Maaf","msg":"Maaf Pembelian dibatalkan","uid":"2","dstyle":"{\"theme\":[{\"id\":\"2\",\"nama\":\"Style 2\",\"style\":\"-\",\"klass\":\"dua\",\"pub\":\"Y\"}]}","dproduk":"1","modul":[{"name":"APP EXPIRE","slug":"none","video":"yPysn7PTTgQ","video2":"bpaR4n2-ywk","className":"","color":"#ef8700"}],"count":"1"}';
		$dummy = json_decode($dummy);
		echo json_encode($dummy);
		exit;
	}
	if($cek_app['appid']==$appid AND $cek_app['appsecret']==$secret){
		$jenis['lim'] = array('start'=>$start,'limit'=>$limit);
		$gApp = gApp($appid);
		$gProduk['modul'] = gProduk($gApp['dproduk'],$start,$limit);
		$cProduk['count'] = cProduk($gApp['dproduk']);
		
		$push = array_merge($jenis,$gApp,$gProduk,$cProduk);
		echo json_encode($push);
	}			