<?php
	// error_reporting(0);
	define("BASEPATH", '');
	header("Access-Control-Allow-Origin: *");
	
	include "../class/filter.inc.php";
	$mods = filterpost('modul');
	$app_id = filterpost('appid');
	$rowx = filterpost('clas');
	if(!empty($mods)){
		include "../class/conn_db.php";
		include "../class/app_config.php";
		include "../class/fungsi-fungsi.php";
		include "../class/data.inc.php";
		include "../class/web_function.php";
		include "../class/lib/function.php";
		$host = SITE_API;
		$x = "?".$mods;$var=decode($x);
		$mod = (isset($var['rowid']) ? $var['rowid'] : '');
		$uid = (isset($var['uid']) ? $var['uid'] : '');
		$link = (isset($_POST['link']) ? $_POST['link'] : '');
		 $exp = multiexplode(array('/'),$link);
		 // print_r($exp);
		if($exp[0]=='api.kalkulatorcetak.go'){
			$_link = "https://".$exp[0]."/api/".$exp[2];
			}else{
			$_link = "https://".$link."/hitung";
		}
		// echo $mod;
		$namamod = (isset($_POST['namamod']) ? $_POST['namamod'] : '');
		$warna = (isset($_POST['warna']) ? $_POST['warna'] : '');
		if(empty($mod) || empty($uid) || empty($link) || empty($namamod)){
			exit(json_encode(array("status" => "error")));
		}
		$sql = $db->query("SELECT * FROM `data_biaya` WHERE id_user='$uid'");
		$rows=$sql->fetch_array();
		$dataJson = $rows['data_json'];
		$ARRAY = json_decode($dataJson);
		
		foreach ($ARRAY->biaya as $item) {
			if ($item->KdBiaya == '66') {
				$HargaLebih = $item->HargaLebih;
				break;
			}
		}
		$arrayb = ArrayBiaya($uid);
		$rowc = pilihBiaya($arrayb['biaya'], 101);
		function nota($uid,$vals){
			global $db;
			$arrays = ArrayKertas($uid);
			foreach ($arrays['katbahan'] as $current_key => $current_array) {
				$modz = explode(" ",$current_array['modul']);
				foreach ($modz as $key => $val) {
					if($val==$vals){
						$datas = array("id"=>$current_array['id_kategori'],"name"=>$current_array['nama_kategori']);
						return $datas;
					}
				}
			}
		}
		
		$cekUser = cekUser($uid);
		// print_r($uid);
		if($cekUser['lv']=='demo'){
			$level = 'demo';
			}else{
			$level = $cekUser['lv'];
		}
		
		$VALUE = VALUE;
		echo "<script>
		var protocol = window.location.href.indexOf('https://') == 0 ? 'https' : 'http';
		var host = '{$host}';
		var link = '{$_link}';
		var app_id = '{$app_id}';
		$('#jmlcetak').val('{$VALUE}');
		
		
		$('.save').click(function(){
		var biaya=$('#biayal').val();
		var idbiaya=66;
		if(biaya == '' || biaya==0) {
		$('#saved').addClass('merah');
		}else{
		$.ajax({
		url : '/user/save_biaya.php',
		dataType: 'json',
		method: 'POST',
		data: {
		idbiaya: idbiaya,
		biaya: biaya,
		type: 'simpan_biaya'
		},
		success: function(result){
		if(result.error){
		$('#saved').addClass('merah');
		}else{
		$('#saved').addClass('hijau');
		}
		}
		});
		}
		});
		var level = '$level';
		var mod = '$mod';
		var app_mod = '#app_'+mod;
		var ch_mod = '#id_'+mod;
		var id_mod = 'id_'+mod;
		$('#hargamincov').val('$rowc[HargaMin]');
		$('#hargalebcov').val('$rowc[HargaLebih]');
		$('#jmlmincov').val('$rowc[JumlahMin]');
		$('#user').val('');
		$('#token').val('$app_id');
		$('#modul').val(mod);
		function salert(sicon,stitle,stext){
		Swal.fire({
		icon: sicon,
		title: stitle,
		html: stext,
		footer: '<a href=\"#\">Mengapa saya memiliki masalah ini?</a>'
		});
		}
		function CustomStyle() {
		$.ajax({
		url: host + '/custom/',
		data: {
		link: link,level:level
		},
		type: 'POST',
		dataType: 'html',
		success: function(res) {
		$('#customstyle').html(res);
		}
		});
		}
		var loadJS = function(url, implementationCode, location){
		
		var scriptTag = document.createElement('script');
		scriptTag.src = url;
		
		scriptTag.onload = implementationCode;
		scriptTag.onreadystatechange = implementationCode;
		
		location.appendChild(scriptTag);
		};
		var yourCodeToBeCalled = function(){
		var ajaxAntri = $({});
		
		$.ajaxAntri = function(ajaxOpts) {
		var oldComplete = ajaxOpts.complete;
		
		ajaxAntri.queue(function(next) {
		ajaxOpts.complete = function() {
		if (oldComplete) {
        oldComplete.apply(this, arguments);
		}
		next();
		};
		$.ajax(ajaxOpts);
		});
		};
		}
		loadJS('https://api.kalkulatorcetak.com/js/antrian_ajax.js', yourCodeToBeCalled, document.body);
		</script>";	
		
		$pathFile = "../modal/v4/{$mod}.php";
		$pathFileJs = "../jsm/{$mod}_js.php";
		if (file_exists($pathFile))
		{
			include $pathFile;
			if (file_exists($pathFileJs))
			{
				include $pathFileJs;
			}
			// echo $htnl;
			echo "<script>$('#modal-footer').removeClass('d-none');</script>";	
			}else{
			echo "<script>$('#modal-footer').addClass('d-none');</script>";	
			include "../modal/error_modal.php";
		}
		}else{
		header("Content-Type: application/json");
		echo json_encode(array(404 => "error")); 
	}												