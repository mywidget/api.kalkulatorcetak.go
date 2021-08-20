<?php
define("BASEPATH", "");
// header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
include __DIR__ . '/../class/conn_db.php';
include __DIR__ . '/../class/filter.inc.php';
include __DIR__ . '/../class/data.inc.php';
include __DIR__ . '/../class/fungsi-fungsi.php';
include __DIR__ . '/../class/reader.php';
include __DIR__ . '/../class/library.php';

$arr = json_decode(file_get_contents("php://input"));
$arr = json_encode($arr, JSON_UNESCAPED_SLASHES);

$type = json_decode($arr);

// print_r($type);
$token = $type->token;
$appid = $type->app_id;

// if(empty($type->token)){
	// $hasil = array("akses" => 'N');
	// echo json_encode($hasil);
	// exit;
// }
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

$lbrcetak = (isset($type->lbrcetak) ? floatval($type->lbrcetak) : '');
$tgcetak = (isset($type->tgcetak) ? floatval($type->tgcetak) : '');
// print_r($lbrcetak);
$jmlcetak = $type->jmlcetak;
$bahan = $type->bahan;
$bbstat = !empty($type->bb)?$type->bb:0;
$jmlwarna = $type->jmlwarna;
$jmlwarna2 = $type->jmlwarna2;
$lam = $type->lam;
//finishing
$finishing1 = !empty($type->finishing1)?$type->finishing1:0;
$finishing2 = !empty($type->finishing2)?$type->finishing2:0;
$finishing3 = !empty($type->finishing3)?$type->finishing3:0;
$finishing4 = !empty($type->finishing4)?$type->finishing4:0;
$finishing5 = !empty($type->finishing5)?$type->finishing5:0;
$finishing6 = !empty($type->finishing6)?$type->finishing6:0;
$finishing7 = !empty($type->finishing7)?$type->finishing7:0;
$finishing8 = !empty($type->finishing8)?$type->finishing8:0;
$finishing9 = !empty($type->finishing9)?$type->finishing9:0;
$finishing10 = !empty($type->finishing10)?$type->finishing10:0;
//tinggi
$tgf1 = !empty($type->tgf1)?$type->tgf1:0;
$tgf2 = !empty($type->tgf2)?$type->tgf2:0;
$tgf3 = !empty($type->tgf3)?$type->tgf3:0;
$tgf4 = !empty($type->tgf4)?$type->tgf4:0;
$tgf5 = !empty($type->tgf5)?$type->tgf5:0;
$tgf6 = !empty($type->tgf6)?$type->tgf6:0;
$tgf7 = !empty($type->tgf7)?$type->tgf7:0;
$tgf8 = !empty($type->tgf8)?$type->tgf8:0;
$tgf9 = !empty($type->tgf9)?$type->tgf9:0;
$tgf10 = !empty($type->tgf10)?$type->tgf10:0;
//lebar
$lbrf1 = !empty($type->lbrf1)?$type->lbrf1:0;
$lbrf2 = !empty($type->lbrf2)?$type->lbrf2:0;
$lbrf3 = !empty($type->lbrf3)?$type->lbrf3:0;
$lbrf4 = !empty($type->lbrf4)?$type->lbrf4:0;
$lbrf5 = !empty($type->lbrf5)?$type->lbrf5:0;
$lbrf6 = !empty($type->lbrf6)?$type->lbrf6:0;
$lbrf7 = !empty($type->lbrf7)?$type->lbrf7:0;
$lbrf8 = !empty($type->lbrf8)?$type->lbrf8:0;
$lbrf9 = !empty($type->lbrf9)?$type->lbrf9:0;
$lbrf10 = !empty($type->lbrf10)?$type->lbrf10:0;

$set = $type->jmlset;
$modul = $type->modul;
$insheet = $type->insheet;
$jml_satuan = $type->jml_satuan;
$cetak_bagi = $type->cetak_bagi;
$ket_satuan = $type->ket_satuan;
$ongpot = $type->ongpot;
$j_mesin = $type->j_mesin;
$kethitung = $type->kethitung;
$jilid = $type->jilid;
$ongkos_lipat = $type->ongkos_lipat;
$pakeplat = $type->pakeplat;

// echo $set;
// $idmesin = $type->idmesin;
$idkertas = !empty($type->idkertas)?$type->idkertas:0;
//
$tarik = $type->tarikan;
$submit = '';
if (empty($kethitung) or $kethitung == ""){
	$kethitung="";
}else{
	$kethitung = str_replace("_"," ",$kethitung);
}
$hasil  = array();

if($tgl_sekarang > $tgl_exp){
   $hasil = array("akses" => 'N');
	return;
}else{
    $hasil = array("akses" => 'Y');
}

$data = hitungcetak($lbrcetak,$tgcetak,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$set,$lam,$finishing2, $finishing1, $finishing3,$finishing4,$finishing5,$finishing6,$finishing7,$finishing8,$finishing9,$finishing10,$submit,$lbrf1,$tgf1,$lbrf2,$tgf2,$lbrf3,$tgf3,$lbrf4,$tgf4,$lbrf5,$tgf5,$lbrf6,$tgf6,$lbrf7,$tgf7,$lbrf8,$tgf8,$lbrf9,$tgf9,$lbrf10,$tgf10,$modul,$jml_satuan,$cetak_bagi,$ket_satuan,$ongpot,$j_mesin,$kethitung,$jilid,$ongkos_lipat,$pakeplat,$s_email,$idkertas);

$data2=array();
$data6=array();
if (!empty($data)){
	foreach($data as $key => $value){
			$data2= array_merge($data[$key],$hasil);
			array_push($data6,$data2);
	} //End foreach	
	usort($data6, 'sortByOrder');
	echo json_encode($data6);
}


function hitungcetak($lbrcetak,$tgcetak,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$set,$lam,$finishing2, $finishing1, $finishing3,$finishing4,$finishing5,$finishing6,$finishing7,$finishing8,$finishing9,$finishing10,$submit,$lbrf1,$tgf1,$lbrf2,$tgf2,$lbrf3,$tgf3,$lbrf4,$tgf4,$lbrf5,$tgf5,$lbrf6,$tgf6,$lbrf7,$tgf7,$lbrf8,$tgf8,$lbrf9,$tgf9,$lbrf10,$tgf10,$modul,$jml_satuan,$cetak_bagi,$ket_satuan,$ongpot,$j_mesin,$kethitung,$jilid,$ongkos_lipat,$pakeplat,$s_email,$idkertas){

global $db;
$ArrayMesinz = ArrayMesin($s_email);
$json = json_decode($ArrayMesinz);
if (empty($j_mesin) or $j_mesin == ""){
	if(is_int($j_mesin)){
	$pilihM2 = pilihM2($json->mesin,$j_mesin);
	}else{
	$pilihM2 = pilihM3($json->mesin,$modul);
	}
}else{
	// echo 2;
	$pilihM2 = pilihM2($json->mesin,$j_mesin);
}
// print_r($pilihM2);
// echo $s_email;
// $persen = 0;
// 
$json1 = json_decode($ArrayMesinz);
// $pilihM1 = pilihM2($json1->mesin,$where);
// foreach ($pilihM2 as $item) {
	// $jenis_mesin = $item['jmesin'];
	if($pilihM2[0]['jmesin'] == 'PrintDigital' ){
	$persen = 0;
	$jPrint = 'PrintDigital';
	}else{
$sqlprofit = $db->query("SELECT profit FROM `gtbl_user` WHERE id_user='$s_email'");
$datapro = $sqlprofit->fetch_assoc();
$persen = $datapro['profit'];
	$jPrint = $pilihM2[0]['jmesin'];
	}

// }

// echo $jPrint;
		$ArrayBiaya = ArrayBiaya($s_email);
		$pond = '';
//Biaya finishing1
	if (empty($finishing1) or $finishing1==0) {
		$totfinishing1=0;
		$hrgfinishing1min=0;
		$hrgfinishing1lebih=0;
		$jmlfinishing1min=0;			
		$nmfinishing1='';			
		}else{
		
		$row1=pilihBiaya($ArrayBiaya['biaya'],$finishing1);    
		$hrgfinishing1min  		=$row1['HargaMin'];
		$hrgfinishing1lebih  	=$row1['HargaLebih'];
		$jmlfinishing1min  		=$row1['JumlahMin'];	
		$nmfinishing1			=$row1['Nama_Biaya'];
		
		if($finishing1 == 12){
			$pond = 'Y';
		}
		
		$finishing1 = $hrgfinishing1lebih * $jmlcetak * $jml_satuan * $lbrf1 * $tgf1;
		if ($finishing1 <= $hrgfinishing1min) {
			$totfinishing1 = $hrgfinishing1min;}
		else{
			$totfinishing1 = $finishing1;}
	}	

//Biaya finishing2
	if (empty($finishing2) or $finishing2==0) {
		$totfinishing2=0;
		$hrgfinishing2min=0;
		$hrgfinishing2lebih=0;
		$jmlfinishing2min=0;
		$nmfinishing2='';		
		}else {
		$row2=pilihBiaya($ArrayBiaya['biaya'],$finishing2);    
		$hrgfinishing2min  		=$row2['HargaMin'];
		$hrgfinishing2lebih  	=$row2['HargaLebih'];
		$jmlfinishing2min  		=$row2['JumlahMin'];
		$nmfinishing2			=$row2['Nama_Biaya'];	
		
		if($finishing2 == 12){
			$pond = 'Y';
		}		
		
		$finishing2 = $hrgfinishing2lebih * $jmlcetak * $jml_satuan * $lbrf2 * $tgf2;
		if ($finishing2 <= $hrgfinishing2min) {
			$totfinishing2 = $hrgfinishing2min;}
		else{
			$totfinishing2 = $finishing2;}
	}	

	//Biaya finishing3
	if (empty($finishing3) or $finishing3==0) {
		$totfinishing3=0;
		$hrgfinishing3min=0;
		$hrgfinishing3lebih=0;
		$jmlfinishing3min=0;
		$nmfinishing3 = '';		
		}else {
		$row3=pilihBiaya($ArrayBiaya['biaya'],$finishing3);      
		$hrgfinishing3min  		=$row3['HargaMin'];
		$hrgfinishing3lebih  	=$row3['HargaLebih'];
		$jmlfinishing3min  		=$row3['JumlahMin'];
		$nmfinishing3			=$row3['Nama_Biaya'];	
		
		if($finishing3 == 12){
			$pond = 'Y';
		}		
		
		// echo $lbrf3;
		$finishing3 = $hrgfinishing3lebih * $jmlcetak * $jml_satuan * $lbrf3 * $tgf3;
		if ($finishing3 <= $hrgfinishing3min) {
			$totfinishing3 = $hrgfinishing3min;
			}else{
			$totfinishing3 = $finishing3;}
			//$totfinishing3 = $hrgfinishing3lebih * $jmlcetak * $jml_satuan * $lbrf3 * $tgf3;
	}	

	//Biaya finishing4
	if (empty($finishing4) or $finishing4==0) {
		$totfinishing4=0;
		$hrgfinishing4min=0;
		$hrgfinishing4lebih=0;
		$jmlfinishing4min=0;	
		$nmfinishing4='';	
		}else {
		$row4=pilihBiaya($ArrayBiaya['biaya'],$finishing4);      
		$hrgfinishing4min  		=$row4['HargaMin'];
		$hrgfinishing4lebih  	=$row4['HargaLebih'];
		$jmlfinishing4min  		=$row4['JumlahMin'];
		$nmfinishing4			=$row4['Nama_Biaya'];	
		
		if($finishing4 == 12){
			$pond = 'Y';
		}		
		
		
		$finishing4 = $hrgfinishing4lebih * $jmlcetak * $jml_satuan * $lbrf4 * $tgf4;
		if ($finishing4 <= $hrgfinishing4min) {
			$totfinishing4 = $hrgfinishing4min;}
		else{
			$totfinishing4 = $finishing4;}
	}	

		//Biaya finishing5
	if (empty($finishing5) or $finishing5==0) {
		$totfinishing5=0;
		$hrgfinishing5min=0;
		$hrgfinishing5lebih=0;
		$jmlfinishing5min=0;
		$nmfinishing5='';	
		}
	else {
		$row5=pilihBiaya($ArrayBiaya['biaya'],$finishing5);       
		$hrgfinishing5min  		=$row5['HargaMin'];
		$hrgfinishing5lebih  	=$row5['HargaLebih'];
		$jmlfinishing5min  		=$row5['JumlahMin'];
		$nmfinishing5			=$row5['Nama_Biaya'];	
		
		if($finishing5 == 12){
			$pond = 'Y';
		}		
		
		
		$finishing5 = $hrgfinishing5lebih * $jmlcetak * $jml_satuan * $lbrf5 * $tgf5;
		if ($finishing5 <= $hrgfinishing5min) {
			$totfinishing5 = $hrgfinishing5min;
			}else{
			$totfinishing5 = $finishing5;}
	}		
	
	//Biaya finishing6
	if (empty($finishing6) or $finishing6==0) {
		$totfinishing6=0;
		$hrgfinishing6min=0;
		$hrgfinishing6lebih=0;
		$jmlfinishing6min=0;	
		$nmfinishing6='';	
		}else {
		$row6=pilihBiaya($ArrayBiaya['biaya'],$finishing6);        
		$hrgfinishing6min  		=$row6['HargaMin'];
		$hrgfinishing6lebih  	=$row6['HargaLebih'];
		$jmlfinishing6min  		=$row6['JumlahMin'];	
		$nmfinishing6			=$row6['Nama_Biaya'];
		
		if($finishing6 == 12){
			$pond = 'Y';
		}		
		
		
		$finishing6 = $hrgfinishing6lebih * $jmlcetak * $jml_satuan *  $lbrf6 * $tgf6;
		if ($finishing6 <= $hrgfinishing6min) {
			$totfinishing6 = $hrgfinishing6min;}
		else{
			$totfinishing6 = $finishing6;}
	}

	//Biaya finishing7
	if (empty($finishing7) or $finishing7==0) {
		$totfinishing7=0;
		$hrgfinishing7min=0;
		$hrgfinishing7lebih=0;
		$jmlfinishing7min=0;	
		$nmfinishing7='';	
		}else {
		$row7=pilihBiaya($ArrayBiaya['biaya'],$finishing7);       
		$hrgfinishing7min  		=$row7['HargaMin'];
		$hrgfinishing7lebih  	=$row7['HargaLebih'];
		$jmlfinishing7min  		=$row7['JumlahMin'];	
		$nmfinishing7			=$row7['Nama_Biaya'];
		
		if($finishing7 == 12){
			$pond = 'Y';
		}		
		$finishing7 = $hrgfinishing7lebih * $jmlcetak * $jml_satuan *  $lbrf7 * $tgf7;
		if ($finishing7 <= $hrgfinishing7min) {
			$totfinishing7 = $hrgfinishing7min;
			}else{
			$totfinishing7 = $finishing7;}
	}		
	
	//Biaya finishing8
	if (empty($finishing8) or $finishing8==0) {
		$totfinishing8=0;
		$hrgfinishing8min=0;
		$hrgfinishing8lebih=0;
		$jmlfinishing8min=0;	
		$nmfinishing8='';	
		}
	else {
		$row8=pilihBiaya($ArrayBiaya['biaya'],$finishing8);     
		$hrgfinishing8min  		=$row8['HargaMin'];
		$hrgfinishing8lebih  	=$row8['HargaLebih'];
		$jmlfinishing8min  		=$row8['JumlahMin'];	
		$nmfinishing8			=$row8['Nama_Biaya'];
		
		if($finishing8 == 12){
			$pond = 'Y';
		}		
		$finishing8 = $hrgfinishing8lebih * $jmlcetak * $jml_satuan *  $lbrf8 * $tgf8;
		if ($finishing8 <= $hrgfinishing8min) {
			$totfinishing8 = $hrgfinishing8min;}
		else{
			$totfinishing8 = $finishing8;}
	}		
	
	//Biaya finishing9
	if (empty($finishing9) or $finishing9==0) {
		$totfinishing9=0;
		$hrgfinishing9min=0;
		$hrgfinishing9lebih=0;
		$jmlfinishing9min=0;	
		$nmfinishing9='';	
		}else {
		$row9=pilihBiaya($ArrayBiaya['biaya'],$finishing9);    
		$hrgfinishing9min  		=$row9['HargaMin'];
		$hrgfinishing9lebih  	=$row9['HargaLebih'];
		$jmlfinishing9min  		=$row9['JumlahMin'];	
		$nmfinishing9			=$row9['Nama_Biaya'];
		// echo $lbrf9;
		if($finishing9 == 12){
			$pond = 'Y';
		}		
		$finishing9 = $hrgfinishing9lebih * $jmlcetak * $jml_satuan *  $lbrf9 * $tgf9;
		if ($finishing9 <= $hrgfinishing9min) {
			$totfinishing9 = $hrgfinishing9min;}
		else{
			$totfinishing9 = $finishing9;}
	}	
	//Biaya finishing10
	if (empty($finishing10) or $finishing10==0) {
		$totfinishing10=0;
		$hrgfinishing10min=0;
		$hrgfinishing10lebih=0;
		$jmlfinishing10min=0;	
		$nmfinishing10='';	
		}
	else {
		$row10=pilihBiaya($ArrayBiaya['biaya'],$finishing10);    
		$hrgfinishing10min  	=$row10['HargaMin'];
		$hrgfinishing10lebih  	=$row10['HargaLebih'];
		$jmlfinishing10min  	=$row10['JumlahMin'];	
		$nmfinishing10			=$row10['Nama_Biaya'];
		
		if($finishing10 == 12){
			$pond = 'Y';
		}		
		$finishing10 = $hrgfinishing10lebih * $jmlcetak * $jml_satuan *  $lbrf10 * $tgf10;
		if ($finishing10 <= $hrgfinishing10min) {
			$totfinishing10 = $hrgfinishing10min;}
		else{
			$totfinishing10 = $finishing10;}
	}	

	
	$totfinishing = $totfinishing1 + $totfinishing2 + $totfinishing3 + $totfinishing4 + $totfinishing5 + $totfinishing6 + $totfinishing7 + $totfinishing8 + $totfinishing9 + $totfinishing10;	
		
	
	// echo $totfinishing;
			$datafinishing= array(
						"lbrcetak" => $lbrcetak,
						"tgcetak" => $tgcetak,
						"totfinishing" => $totfinishing,
						"finishing1" => $totfinishing1,
						"hrgfinishing1min" => $hrgfinishing1min,
						"hrgfinishing1lebih" => $hrgfinishing1lebih,
						"jmlfinishing1min" => $jmlfinishing1min,	
						"finishing2" => $totfinishing2,
						"hrgfinishing2min" => $hrgfinishing2min,
						"hrgfinishing2lebih" => $hrgfinishing2lebih,
						"jmlfinishing2min" => $jmlfinishing2min,						
						"finishing3" => $totfinishing3,
						"hrgfinishing3min" => $hrgfinishing3min,
						"hrgfinishing3lebih" => $hrgfinishing3lebih,
						"jmlfinishing3min" => $jmlfinishing3min,						
						"finishing4" => $totfinishing4,
						"hrgfinishing4min" => $hrgfinishing4min,
						"hrgfinishing4lebih" => $hrgfinishing4lebih,
						"jmlfinishing4min" => $jmlfinishing4min,						
						"finishing5" => $totfinishing5,
						"hrgfinishing5min" => $hrgfinishing5min,
						"hrgfinishing5lebih" => $hrgfinishing5lebih,
						"jmlfinishing5min" => $jmlfinishing5min,							
						"finishing6" => $totfinishing6,
						"hrgfinishing6min" => $hrgfinishing6min,
						"hrgfinishing6lebih" => $hrgfinishing6lebih,
						"jmlfinishing6min" => $jmlfinishing6min,
						"finishing7" => $totfinishing7,
						"hrgfinishing7min" => $hrgfinishing7min,
						"hrgfinishing7lebih" => $hrgfinishing7lebih,
						"jmlfinishing7min" => $jmlfinishing7min,
						"finishing8" => $totfinishing8,
						"hrgfinishing8min" => $hrgfinishing8min,
						"hrgfinishing8lebih" => $hrgfinishing8lebih,
						"jmlfinishing8min" => $jmlfinishing8min,
						"finishing9" => $totfinishing9,
						"hrgfinishing9min" => $hrgfinishing9min,
						"hrgfinishing9lebih" => $hrgfinishing9lebih,
						"jmlfinishing9min" => $jmlfinishing9min,						
						"finishing10" => $totfinishing10,
						"hrgfinishing10min" => $hrgfinishing10min,
						"hrgfinishing10lebih" => $hrgfinishing10lebih,
						"jmlfinishing10min" => $jmlfinishing10min,						
						"nmfinishing1" => $nmfinishing1,			
						"nmfinishing2" => $nmfinishing2,			
						"nmfinishing3" => $nmfinishing3,			
						"nmfinishing4" => $nmfinishing4,			
						"nmfinishing5" => $nmfinishing5,			
						"nmfinishing6" => $nmfinishing6,			
						"nmfinishing7" => $nmfinishing7,			
						"nmfinishing8" => $nmfinishing8,			
						"nmfinishing9" => $nmfinishing9,			
						"nmfinishing10" => $nmfinishing10,			
						"persen" => $persen,			
						"namamodul" => '',
						"modul" => $modul,			
						"pond" => $pond,			
						"ongpot" => $ongpot,			
						"kethitung" => $kethitung,			
						"jmesin" => $jPrint
				);						
					// echo json_encode($datafinishing);	

//Cari Biaya Cetak dan Biaya Kertas
$data = array();
$data1 = array();
$data2 = array();
$data3 = array();
$data4 = array();
$data5 = array();
$data6 = array();
$data10 = array();


$lebarcetak=0;
$panjangcetak=0;
//start
// echo $where;
// $arraym=ArrayMesin($s_email);

// print_r($pilihM2);
foreach ($pilihM2 as $item) {
	// print_r($item);
		$jPrint = $item['jmesin'];
		$mesin = $item['kdmesin'];
		$lebarcetak = $item['lebarcetak'];
		$panjangcetak = $item['panjangcetak'];
		// $mes = $item['namamesin'];
	if(empty($jilid) OR $jilid==0){
		$jilid = 0;
	} 
		// echo 'L-'.$lbrcetak.'-T-'.$tgcetak.'-L-'.$lebarcetak.'-P-'.$panjangcetak.'-J-'.$jilid.'-S-'.$set;
	// echo "<br/>";
	$ukuran_lipat = hitung_lipatan($lbrcetak,$tgcetak,$lebarcetak,$panjangcetak,$jilid, $set); //fungsi ada di reader
	$uk_lbr = ($ukuran_lipat[0][0]);
	$uk_tg = ($ukuran_lipat[0][1]);
	$uk_lbr2 = ($ukuran_lipat[1][0]);
	$uk_tg2 = ($ukuran_lipat[1][1]);
	$jml_pot = ($ukuran_lipat[2]);	
	
//	echo "<br>" . json_encode($ukuran_lipat) . "<br> <br>";
	
	if (is_null($jml_pot) or $jml_pot < 1){ 
		goto end;} 
	if (is_null($set) or $set < 1){ 
		goto end;}	
		
	 $jsett = round($set / $jml_pot);
	 $jset = ($set / $jml_pot);
	 $sisa = $set - ($jsett*$jml_pot);
	 if($jset < 1){
		$data=[];
		$hit2 = hitbiayacetak($mesin, $uk_lbr,$uk_tg,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$set,$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$modul,$idkertas);
		usort($hit2, 'sortByOrder');
		array_push($data10,$hit2[0]); //Push ke array hanya paling kecil
	}
	
	elseif($jset >=1 AND $sisa <= 0){
		
		$data=[];
		if (!empty($uk_lbr)){ 
			$hita = hitbiayacetak($mesin, $uk_lbr,$uk_tg,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$jsett,$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$modul,$idkertas);
		} else { $hita = [];}
		if (!empty($uk_lbr2)){ 
			$hitb = hitbiayacetak($mesin, $uk_lbr2,$uk_tg2,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$jsett,$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$modul,$idkertas);
		} else { $hitb = []; }
		
		$gabung = array_merge($hita,$hitb);
	
		usort($gabung, 'sortByOrder');
		array_push($data10,$gabung[0]);
	}
	elseif($jset>=1 AND $sisa > 0){
		
		if (!empty($uk_lbr)){ 
			$hita = hitbiayacetak($mesin, $uk_lbr,$uk_tg,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$jsett,$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$modul,$idkertas);
		}else { $hita = [];}
		if (!empty($uk_lbr2)){ 
			$hitb = hitbiayacetak($mesin, $uk_lbr2,$uk_tg2,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$jsett,$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$modul,$idkertas);
		} else { $hitb = []; }
		$gabung = array_merge($hita,$hitb);
		
		usort($gabung, 'sortByOrder');
		$data1 = $gabung[0];
		
			//sisa
		$ukuran_sisa = hitung_lipatan($lbrcetak,$tgcetak,$lebarcetak,$panjangcetak,$jilid, $sisa); //fungsi ada di reader
		$uk_lbr_sisa = ($ukuran_sisa[0][0]);
		$uk_tg_sisa = ($ukuran_sisa[0][1]);
		$uk_lbr_sisa2 = ($ukuran_sisa[1][0]);
		$uk_tg_sisa2 = ($ukuran_sisa[1][1]);
		$jml_pot_sisa = ($ukuran_sisa[2]);	
		
		$jsett_sisa = round($sisa / $jml_pot_sisa);
		 $jset_sisa = ($sisa / $jml_pot_sisa);
		 $sisa_akhir = $sisa - ($jsett_sisa*$jml_pot_sisa);

		// $sql2 = mysql_query($quer);
		$data2=[];

			if (!empty($uk_lbr_sisa)){
				$hit2_a = hitbiayacetak($mesin, $uk_lbr_sisa,$uk_tg_sisa,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,($jsett_sisa),$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$modul,$idkertas);
			} else { $hit2_a = []; }
			if (!empty($uk_lbr_sisa2)){
				$hit2_b = hitbiayacetak($mesin, $uk_lbr_sisa2,$uk_tg_sisa2,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,($jsett_sisa),$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$modul,$idkertas);
			} else { $hit2_b = []; }
			
			$gabung2 = array_merge($hit2_a,$hit2_b);
			usort($gabung2, 'sortByOrder');
			
			if (!empty($gabung2)){
				$data2 = array_merge($data2,$gabung2);
			}
		
		usort($data2, 'sortByOrder');
		$data = [];
		foreach($data1 as $key => $value){
				for($i = 0 ; $i<count($key); $i++){
					if($key=='jml_total'){
					$data[$key] = $value + $data2[0][$key];	
					//$data[$key] = $value + $data2[0][$key];	
					}else{
					$data[$key] = $value.'|'.$data2[0][$key];
					//$data[$key] = $value.'|'.$data2[0][$key];
					}
				}
		} //End foreach	
		array_push($data10,$data);
	} //End elseIf
	 end:

	 }  //End While
	usort($data10, 'sortByOrder');
	foreach($data10 as $key => $value){
				$tot = intval($data10[$key]['jml_total']) + intval($datafinishing['totfinishing']);	
				$totjual = ($tot * $persen/100) + $tot;
				$data10[$key]['jml_total'] = $tot;
				$data10[$key]['total_jual'] = $totjual;	
	} //End foreach	
	
	
		foreach($data10 as $key => $value){
					$data2 = array_merge($data10[$key],$datafinishing);
					array_push($data6,$data2);
			//}
		} //End foreach	
	
	$data10 = $data6;
	return $data10;
		
}
function hitbiayacetak($mesin, $lbrcetak,$tgcetak,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$set,$lam,$lbc,$tgc,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$modul,$idkertas){
$data= array(); //menampung data hasil ke array
// echo $bahan;
// Cari Biaya Potong
	// $sql3 = mysql_query("select * from tbl_biaya where KdBiaya='29'");
$ArrayMesinz = ArrayMesin($s_email);
$jsonm = json_decode($ArrayMesinz);
$jsonm = $jsonm->mesin;

// print_r($jsonm);

	$ArrayBahan=ArrayBahanDua($s_email);

	
	$ArrayBiaya = ArrayBiaya($s_email);
	$ArrayKertas = ArrayKertas($s_email);
	$row3 = pilihBiaya($ArrayBiaya['biaya'],'29'); // pilih biaya potong
	$hargapot  =$row3['HargaLebih'];	
	$hargapotmin  =$row3['HargaMin'];
	// print_r($ArrayKertas);
	// Cari Jenis Bahan
	$rowjenis = pilihBahan($ArrayKertas['katbahan'],$bahan); // pilih bahan
	$jenis_bahan  =$rowjenis['nama_kategori'];	
	$idk  =$rowjenis['idk'];
	$jsonb = json_decode($ArrayBahan);
	if(empty($idkertas) OR $idkertas==0){
	$pilihB2 = pilihB2($jsonb->bahan,$bahan);
	}else{
	$pilihB2 = pilihUKBahan($jsonb->bahan,$idkertas);
	}
	// print_r($pilihB2);
		// echo $jenis_bahan;
// Biaya Laminating
if ($lam == '1' or $lam== '2'){$laminat='18';}
elseif ($lam == '3' or $lam== '4'){$laminat='17';}
elseif ($lam == '5' or $lam== '6'){$laminat='16';}
else {$laminat='';}

// $sqlam = mysql_query("select * from tbl_biaya where KdBiaya='$laminat'");
// $row7 = mysql_fetch_array($sqlam);
	if (empty($laminat) or $laminat==0) {
		$ketlam='';
		$hrgminlam=0;
		$hrglebihlam=0;
		$jmlfinishing5min=0;
		$nmfinishing5='';	
		}else{
$row7 = pilihBiaya($ArrayBiaya['biaya'],$laminat);
$ketlam  	=$row7['Nama_Biaya'];
$hrgminlam  	= $row7['HargaMin'];
$hrglebihlam  	= $row7['HargaLebih'];	
		}


//Cari laminating satumuka / bb jika bb kalikan 2				
if ($lam == '1' or $lam== '3' or $lam=='5'){$jmlam=1;}
else if ($lam == '2' or $lam== '4' or $lam=='6'){$jmlam=2;}
else{$jmlam=0;}

if ($lam == '1' or $lam == '3' or $lam == '5'){
	$kerlambb = "SatuMuka";
}else if ($lam == '2' or $lam == '4' or $lam == '6'){
	$kerlambb = "Bolakbalik";
}	
	$beratkertas=0;
$nums = 1;

$items = pilihM2($jsonm,$mesin);
if(is_array($items)) {
foreach ($items as $item) {
		// print_r($item);
		$hargaminim = $item['hargamin'];
		$jmlminim = $item['jumlahmin'];
		$hargadrek = $item['hargalebih'];
		$lbrkertasmesin = $item['lebarkertas'];
		$tgkertasmesin = $item['panjangkertas'];
		$lebartext = $item['lebarcetak'];
		$tinggitext = $item['panjangcetak'];
		$lebarmin = $item['min_lebar'];
		$tinggimin = $item['min_panjang'];
		$ctp = $item['hargactp'];
		$NamaMesin = $item['namamesin'];
		$jenis_mesin = $item['jmesin'];
		$replatsetiap = $item['replat'];
		// if (empty($replatsetiap) OR $replatsetiap==0){
			// $replatsetiap = 5000;
		// }
		if (is_null($tarik)){
			$tarik = $item['tarikan'];
		}elseif ($tarik == 0){
			$tarik = 0;
		}else{
			$tarik = $item['tarikan'];
		}

	$x = 1;
	$y = 1;

	//Menentukan Ukuran Maksimal dimana Lebar agar lebih Kecil dari Tinggi
	if ($lebartext > $tinggitext){         
		$z = $lebartext;  			
		$w = $tinggitext;}			
	else{							
		$z = $tinggitext;          
		$w = $lebartext;}			
		
	//Menentukan Ukuran Minimal mesin dimana Lebar agar lebih Kecil dari Tinggi
	//	echo $row['min_panjang'] . " x " . $row['min_lebar'] ;
	if ($lebarmin > $tinggimin){
		$tinggimin = $item['min_lebar'];
		$lebarmin = $item['min_panjang'];}
	//	echo $tinggimin . " x " . $lebarmin ;
		

	$ulangbb=1;
	$ins_bb=1;
	$kali = "L";		
	$ulangbb = 1;
	
	while ($ulangbb <= 3) {  //selama cetak bolak balik  
	// echo "<br/>";
	// echo $ulangbb;

	$lebarpot 	= $lbrcetak;    
	$tinggipot 	= $tgcetak;
	$lebarcetak	= $lbrcetak;   
	$tinggicetak= $tgcetak;
		
	
	//Menentukan Ukuran Cetakan  dimana Lebar agar lebih Kecil dari Tinggi
	if ($lebarpot > $tinggipot){
		$tinggipot		= $lbrcetak;
		$lebarpot 		= $tgcetak;
		$tinggicetak	= $lbrcetak;    
		$lebarcetak		= $tgcetak;
	}		

	//Jika Cetak BB
	$bb=2;	
	$jmlwarna1 = $jmlwarna;
	
	//Jika Cetak 1 Muka saja maka loncat
	if($jmlwarna2 < 1 or empty($jmlwarna2) ){
		$cetakbb=1;
		$ketbb="Cetak Satu Muka";
		$ulangbb=4;
		$jmlwarna = $jmlwarna1;
		$biayabbplatsama = 0;
		$bb=1;
		goto loncatbbsatumuka;
	}
	
	if ($ulangbb <= 3){   //Jika di Cetak Bolak balik Beda Plat
		$cetakbb= 1;
		$jmlwarna = $jmlwarna + $jmlwarna2;
		if($jenis_mesin == 'PrintDigital' ){
		$ketbb="Bolak-balik";
		}else{
		$ketbb="Bolak-balik Beda Plat";
		}
		$ins_bb = 2;
		$biayabbplatsama = 0;
	} //jika cetak bolak balik plat sama berarti ukuran cetaknya dibagi 2
		
	if ($ulangbb <= 2){   //Jika di Cetak Bolak balik plat yang sama
		$cetakbb= 2;
		$ins_bb = 2;	
		$biayabbplatsama = $item['biayabbplatsama'];		
		$jmlwarna = $jmlwarna1;
		if ($kali == "L") { 		//Bolak balik Lebar Cetakan x 2
			$lebarpot = $lebarpot * 2;
			$lebarcetak = $lebarcetak * 2;
			$ketbb="Bolak-balik Plat yang Sama x Lebar";
			}
		elseif ($kali == "P"){	//Bolak balik Tinggi Cetakan x 2
			$tinggipot = $tinggipot * 2;
			$tinggicetak = $tinggicetak * 2;	
			$ketbb="Bolak-balik Plat yang Sama x Tinggi";
		}
		
	} //jika cetak bolak balik plat sama berarti ukuran cetaknya dibagi 2
	
loncatbbsatumuka:

						// echo $lebarpot . "x" .$tinggipot ."<br>";
					// echo $z / $tinggipot . "x" .$w ."<br>";
								

		while ($z / $lebarpot >= 1){ // Selama Tinggi Mesin masih muat u/ Lebar Cetakan	// 
		
			while ($z / $tinggipot >= 1) { //  Selama Tinggi Mesin masih muat u/ Tinggi Cetakan  // y
				
					
			//	 echo "lebarcetak:" . $lebarcetak . "tinggicetak:" . $tinggicetak . "y:" . $y . "x" .$x . "w" .$w . "z" .$z ."<br>";
				
				if ($x * $lebarcetak >= $w) {  
					if ($x * $lebarcetak <= $z and $y * $tinggicetak <= $w){											
						goto lanjut;
						}
					elseif ($x * $lebarcetak <= $w and $y * $tinggicetak <= $z){
						goto lanjut;
						}	
					else{
						goto loncat;
						}
					}

lanjut:
			
		// echo $x . " x " . $y . " = " . $lebarpot . " x " . $tinggipot . " - " . $NamaMesin . " Muat : " . $x * $y .  "<br>" ;
		//	echo "Muat : " . $y * $x . "<br>";
		

				if($cetak_bagi=='Y'){
						$muat = $x * $y * $cetakbb;

				}else{
						$muat = 1;						
				}
		
		//	echo "muat: " . $muat . " untuk " . $lebarpot . " x ". $tinggipot. "<br>";	
		
			//Jika ukuran cetak lebih kecil dari ukuran minimal mesin loncati
			if ($lebarpot < $lebarmin) {
				goto loncat; }
			elseif	($tinggipot < $tinggimin) { 
				goto loncat; }
	
				// Cari Ukuran Kertas
				
				// $sql2 = mysql_query("select * from tbl_bahan where id_kategori='$bahan' and publish='Y' and Harga_Bahan> '0'");		
				// echo $Nm_Bhn.'<br/>';
				// $ArrayBahan=ArrayBahan($s_email);
				// print_r($ArrayBahan);
				$lbrbhan=0;
				$tgbhan=0;
				
				
				// print_r($pilihB2[0]['Harga_Bahan']);
				// foreach ($pilihB2 as $row2) {
					$hrgbhn=$pilihB2[0]['Harga_Bahan'];
					$tblbhan=$pilihB2[0]['Tebal'];
					$tgbhan=$pilihB2[0]['Tinggi'];
					$lbrbhan=$pilihB2[0]['Lebar'];
					$Nm_Bhn=$pilihB2[0]['Nm_Bhn'];
					
					$lebarpotkertas = $lebarpot + $tarik;
					$tinggipotkertas = $tinggipot + $tarik;
					// echo $hrgbhn . "x" . $tinggipotkertas . " = " . $lebarpot . " x ". $tinggipot. "<br>";	
					
					$hitpot = hitung($lebarpotkertas,$tinggipotkertas,$lbrbhan,$tgbhan);
					if($cetak_bagi=='N'){
										
										$jmlpot = 1;
									}else{
										$jmlpot = $hitpot[0]['jml'];
									}
									
					if($jmlwarna <= 0){
						$lebarpotkertas = $lbrcetak;
						$tinggipotkertas = $tgcetak;
						$muat = 1;
						$hitpot = hitung($lebarpotkertas,$tinggipotkertas,$lbrbhan,$tgbhan);
						$jmlpot = $hitpot[0]['jml'];
					}				
									


					if (is_null($jmlpot) or $jmlpot < 1){ 
						goto akhirbhn;} 

//					$muat = $x * $y * $cetakbb;
	//echo $x . " x " . $y . " = " . $lebarpot . " x " . $tinggipot . " - " . $NamaMesin . " Muat : " . $x * $y .  "<br>" ;
					
					// $muats = $muat *2;
					// $jmlset = ceil($set / 4);// * $cetakbb;
					$jmlset = $set;// * $cetakbb;
					//echo ($jmlcetak * $jml_satuan ) / $muat  . "<br>";
					
					$jmlcetakreal = ceil(($jmlcetak * $jml_satuan / $muat ) * $cetakbb);
					
					$jmlbhn= ceil(($jmlcetak * $jml_satuan ) / $muat );
					

					// echo $jmlcetakreal;
					// $jmldrek=0;
					// if ($jmlcetakreal < $jmlminim) {
						// // echo 1;
					// echo $jmlcetakreal . " - " . $jmlminim . "<br>";
						// $jmldrek = 0;
						// }else{
						// // echo 2;
					// echo $jmlcetakreal . " - " . $jmlminim . "<br>";
						// }	
					if($jenis_mesin == 'PrintDigital' ){
					$jmldrek = 0;
					}else{
					$jmldrek =  $jmlcetakreal - $jmlminim;
					$jmldrek = (int) $jmldrek;
					}
					
					// echo $jmldrek;
					if ($jmldrek < 0) {  //jika jumlah drek lebih kecil dari 0
						$jmldrek = 0;
						}			
					$totdrek = $jmldrek * $hargadrek * $jmlwarna;
					// echo $totdrek;
					// echo $totdrek ."<br>";
					if (is_null($totdrek)){
						$totdrek = 0;}
						
					if ($laminat==''){
						$totlaminating=0;	$hrgminlam = 0; 	$hrglebihlam = 0;	}
					else{
						//$biayalam = $lbrcetak * $tgcetak * $jmlcetakreal * $hrglebihlam * $jmlam;
						$biayalam = $lbrcetak * $tgcetak * $jmlcetak * $hrglebihlam * $jmlam * $set;						
						if ( $biayalam > $hrgminlam) {
							$totlaminating = $biayalam;
							//$ketlam="(percm Rp." . $hrglebihlam . " -" . $kerlambb;}
						}else {
							$totlaminating = $hrgminlam * $jmlset;
							//$ketlam="(Harga Laminating Minim)";}
						}
					}	
	
	//diedit pada 20/09/2020
$ArrayInsheet =ArrayInsheet($s_email);
// $rinsheet=Insheet($ArrayInsheet['insheet'],$jmlbhn);
$rinsheet=pilihInsheet($ArrayInsheet['insheet'],$jmlbhn);
$ins_bb = 1;
	if($ins_bb == 2){
		$insheet_ = $jmlbhn * $rinsheet['insheet_bb'] / 100 ;
		$insheet_ = round($insheet_);
	}else{
		$insheet_ = $jmlbhn * $rinsheet['insheet'] / 100;
		$insheet_ = round($insheet_);
	}
	
	if($insheet==0){
		$insheet_ = 0;
	}
	if($jenis_mesin == 'PrintDigital' ){
		$insheet_ = 0;
	}
// echo $jmlbhn;
// echo "<br/>";
	$jmlrealcetak =  $jmlbhn + $insheet_;	
	// echo $jmlrealcetak;
	//replat
	if($jmlrealcetak > $replatsetiap AND $replatsetiap >1){
		$replat = ceil($jmlrealcetak / $replatsetiap);
	}else{
		$replat = 1;
	}
	if($jenis_mesin == 'PrintDigital' ){
		$replat = 1;
	}
	// if($jmlrealcetak / $replatsetiap < 1){
		// $replat = 1;
	// }else{
	// if($jenis_mesin == 'PrintDigital' ){
		// $replat = 0;
	// }else{
		// $replat = ceil($jmlrealcetak / $replatsetiap);
	// }
	// }
	// print_r($ArrayInsheet);
	// echo "j:".$replat;
			//Ongkos Cetak
					
			//Ongkos Cetak Print Digital		
			
					if($jenis_mesin == 'PrintDigital' ){
							$hitpotm = hitung($lbrcetak,$tgcetak, $lebartext, $tinggitext);
							if($cetak_bagi=='N'){
										$jmlpot = 1;
										$jmlpot2 = 1;
									}else{
										$jmlpot = $hitpotm[0]['jml'];
										$hitpotm2 = hitung($lebartext,$tinggitext,$lbrbhan, $tgbhan);
										if($hitpotm2[0]['jml']==0){
										$jmlpot2 = 1;
										}else{
										$jmlpot2 = $hitpotm2[0]['jml'];
										}
									}
							
							
							
					
							$jmlprint = ceil(($jmlcetak * $set * $jml_satuan)/$jmlpot);
							$ArrayPrint = ArrayPrint($s_email);
							$row=pilihPrint($ArrayPrint['harga'],$jmlprint,$mesin); //diedit pada 21/09/2020
// print_r($row);
// echo $row['harga'];
							// $sql = mysql_query("select * from harga_print where kdmesin='$mesin' AND '$jmlprint' between jml_min and jml_max");
							// $row=mysql_fetch_array($sql);  // mesin yg di ceklis
							$harga_print = $row['harga'];
							$harga_laminating = $row['harga_laminating'];
							// echo $harga_print."<br/>";
							$jmlminim = $row['jml_min'] . " s/d " . $row['jml_max'] ;
							// echo $row['jml_max']."<br/>";
							if (is_null($harga_print)){
									if ($jmlprint > $jmlminim){
										$harga_print = $hargadrek;
									}else{
										$harga_print = $hargaminim;
									}
							}
							
							
							
							$totcetak = $jmlprint * $harga_print * $bb;	
							// echo $bb;
							$hargaminim = $harga_print;
					
							$tot_ctp = 0;
							$ctp = 0;
							
							//Jika laminating perlembar A3 lebih mahal dari pada pakai mesin laminating besar
							$totlaminating = $lbrcetak * $tgcetak * $jmlcetak * $jml_satuan * $hrglebihlam * $jmlam * $set;
							$totlaminating2 = $jmlprint * $harga_laminating * $jmlam;
						
							if ($laminat==''){
								$totlaminating=0;	$hrgminlam = 0; 	$hrglebihlam = 0;	}
							else{
								if ($totlaminating < $hrgminlam) {
									$totlaminating = $hrgminlam;
								}
									//$ketlam="(Harga Laminating Minim)";}
								else {
								$totlaminating = $hrgminlam;
								}
									//$ketlam="(percm Rp." . $hrglebihlam . " -" . $kerlambb;}
									
								if ($lam == '3' or $lam == '4' or $lam == '5' or $lam == '6'){
									if ($totlaminating > $totlaminating2){
									$totlaminating = $totlaminating2;}
									//$ketlam="Harga Lam Rp." . $harga_laminating . "/lbr -" . $kerlambb;}	
									//echo $totlaminating2;
								}			
							}	

							$jmlcetakreal = $jmlprint;			
							$tgbhan = $tinggitext;			
							$lbrbhan = $lebartext ;			
							$muat = $jmlpot;
							$lebarpot = $lebartext;
							$tinggipot = $tinggitext;;
							$tarik = 0;
							//$lebarpotkertas = '';
							//$tinggipotkertas = '';
							
							
							if($jmlprint > 50){
								$ongkos_potong = $hargapotmin;
							}else{
								$ongkos_potong = 0;
							}
							
							$jmlplano = ceil((($jmlbhn + $insheet_) * $set )/ $jmlpot2);
					$totbhn = 0;
							
					}else{
							$totcetak = ceil((($hargaminim * $jmlwarna) + $totdrek + ($biayabbplatsama * $jmlwarna)) * $jmlset );
							$jmlplano = ceil((($jmlbhn + $insheet_) * $set ) / $jmlpot);
							$beratkertas = ceil(($lbrbhan * $tgbhan * $tblbhan * $jmlplano) / 10000000);
							$ongkos_potong = ceil($beratkertas * $hargapot);
							if ($hargapotmin>$ongkos_potong){
								$ongkos_potong = $hargapotmin;
							}

					$totbhn = $hrgbhn * $jmlplano ;
					}
					

					//$jmlplano = round((($jmlbhn * $set) + $insheet) / $jmlpot);
					// echo $NamaMesin . " - " . $jmlbhn . " - plano : " . $jmlplano . "<br>";
					// echo $totcetak;
					


					//$tot_cetak = round($totcetak);
					if($pakeplat == 'N'){
						$tot_ctp = 0;
					}else{
						$tot_ctp = $ctp * $jmlwarna * $jmlset  * $replat;
					}
					$tot_plat = $jmlwarna * $jmlset  * $replat;
					$jml_total = $totcetak + $totbhn + $tot_ctp + $ongkos_potong + $totlaminating;
					
					//$jmlplano = round($jmlplano);
// echo $insheet_;
// echo "<br/>";
					$hitpot2 = hitung($lbc,$tgc,$lebarpotkertas,$tinggipotkertas);
					$jmlmuat = $hitpot2[0]['jml'];
					
					//ongkos_lipat
					if(!empty($ongkos_lipat)){
					// $sqllipat = mysql_query("select * from tbl_biaya where KdBiaya='52'");
					// $row10=mysql_fetch_array($sqllipat);    
					$row10=pilihBiaya($ArrayBiaya['biaya'],'52'); 
					$hrgfinishing10min  	=$row10['HargaMin'];
					$hrgfinishing10lebih  	=$row10['HargaLebih'];
					$jmlfinishing10min  	=$row10['JumlahMin'];	
					$nmfinishing10			=$row10['Nama_Biaya'];
					
					$lipat = ($hrgfinishing10lebih + (($hrgfinishing10lebih/2) * (($jmlmuat/2) - 1))) *    $jmlbhn * $set;
					if ($lipat <= $hrgfinishing10min) {
						$tot_lipat = $hrgfinishing10min;}
					else{
						$tot_lipat = $lipat;}
					
					}else{
						$tot_lipat = 0;}
						
							// echo $jml_total .'<br/>';
							// echo $beratkertas. '<br/>';
					//Masukan data ke array
					//Masukan data ke array
					array_push($data, array(
						"jmlcetak" => $jmlcetak,			
						"jmlcetakreal" => $jmlcetakreal,	
						"lebarpot" => $lebarpot,
						"tinggipot" => $tinggipot,
						"ukuranpot" => $lebarpot . "x" . $tinggipot,
						"lebarpotkertas" => $lebarpotkertas,
						"tinggipotkertas" => $tinggipotkertas,
						"beratkertas" => $beratkertas,						
						"lbrbhan" => $lbrbhan,			
						"tgbhan" => $tgbhan,			
						"jenis_bahan" => $jenis_bahan,
						"Nm_Bhn" => $Nm_Bhn,
						"hrgbhn" => $hrgbhn,
						"jmlbhn" => $jmlbhn,
						"insheet" => $insheet_,
						"jmlplano" => $jmlplano,
						"totbhn" => $totbhn,
						"mesin" => $NamaMesin,
						"jenismesin" => $jenis_mesin,
						"hargaminim" => $hargaminim, 
						"hargadrek" => $hargadrek, 
						"jmlminim" => $jmlminim, 
						"lebarcetak" => $lebartext,
						"tinggicetak" => $tinggitext,
						"totcetak" => $totcetak,
						"ongkos_potong" => $ongkos_potong,						
						"hargapot" => $hargapot,						
						"hargapotmin" => $hargapotmin,						
						"tot_ctp" => $tot_ctp,
						"ctp" => $ctp,
						"jmlwarna" => $jmlwarna1,
						"jmlwarna2" => $jmlwarna2,
						"tot_plat" => $tot_plat,
						"replat" => $replat,
						"replatsetiap" => $replatsetiap,
						"jml_total" => $jml_total,	
						"total_jual" => 0,							
						"muat1plano" => $jmlpot,			
						"muat" => $jmlmuat,
						"jmlset" =>$jmlset,
						"lamminim" => $hrgminlam,
						"lamlebih" => $hrglebihlam,
						"totlaminating" => $totlaminating,
						"ketlam" => $ketlam,
						"ketbb" => $ketbb,
						"bbstat" => $bbstat,
						"tarik" => $tarik,
						"ket_satuan" => $ket_satuan,
						"jml_satuan" => $jml_satuan,
						"tot_lipat" => $tot_lipat,
					));
// $allplayerdata['jumlah'] = $data;
					
akhirbhn:					
				// } // end aktif bahan yyyyyyyyyyyyyy
loncat:

			$y = $y + 1;
			$tinggipot = $tinggicetak * $y;

			}//end while2
			
		$y = 1;
		$tinggipot = $tinggicetak;

		$x = $x + 1;
		$lebarpot = $lebarcetak * $x;
		
		}//endwhile1 xxxxxxxxxxxxxxxxxxxxxxxxx

		
		$kali="P";
		$x = 1;
		$y = 1;
		$ulangbb = $ulangbb + 1;
		} // endwhile cetak bb 

bawah:		
		
	// // }// foreach  mesinmesinmesinmesinmesinmesinmesinmesinmesinmesinmesinmesinmesinmesinmesinmesinmesinmesin
	
}//end mesin
	}

usort($data, 'sortByOrder');
// echo json_encode($data);
return $data;

} //end fungsi hitbiayacetak
function hitungbahan($lbrcetak,$tgcetak,$jmlcetak,$bahan,$s_email){
	
	$ArrayKertas = ArrayKertas($s_email);
	$rowjenis = pilihBahan($ArrayKertas,$bahan); // pilih bahan
$data= array(); //menampung data hasil ke array

	$jenis_bahan  =$rowjenis['nama_kategori'];	
	
				// Cari Ukuran Kertas
				
				$ArrayBahan=ArrayBahanDua($s_email);
				$jbahan = json_decode($ArrayBahan);
				foreach ($jbahan->bahan as $row2) {
					if($row2->id_kategori==$bahan AND $row2->publish=='Y' AND $row2->Harga_Bahan >0){
					$Nm_Bhn=$row2->Nm_Bhn;
					$hrgbhn=$row2->Harga_Bahan;
					$tblbhan=$row2->Tebal;
					$tgbhan=$row2->Tinggi;
					$lbrbhan=$row2->Lebar;
				
					
						$lebarpotkertas = $lbrcetak;
						$tinggipotkertas = $tgcetak;
						
						
						$muat = 1;
						$hitpot = hitung($lebarpotkertas,$tinggipotkertas,$lbrbhan,$tgbhan);
						$jmlpot = $hitpot[0]['jml'];
			


					if (is_null($jmlpot) or $jmlpot < 1){ 
						goto akhirb;} 

//										

					
					$jmlplano = ceil($jmlcetak / $jmlpot);
					$beratkertas = ceil(($lbrbhan * $tgbhan * $tblbhan * $jmlplano) / 10000000);
					$totbhn = $hrgbhn * $jmlplano ;

					$jml_total = $totbhn;
					//$jmlplano = round($jmlplano);
				
					
					//Masukan data ke array
					array_push($data, array(
						"jmlcetak" => $jmlcetak,			
						"lebarpot" => $lbrcetak,
						"tinggipot" => $tgcetak,
						"ukuranpot" => $lbrcetak . "x" . $tgcetak,
						"lebarpotkertas" => $lebarpotkertas,
						"tinggipotkertas" => $tinggipotkertas,
						"beratkertas" => $beratkertas,						
						"lbrbhan" => $lbrbhan,			
						"tgbhan" => $tgbhan,			
						"jenis_bahan" => $jenis_bahan,
						"Nm_Bhn" => $Nm_Bhn,
						"hrgbhn" => $hrgbhn,
						"jmlbhn" => $jmlbhn,
						"jmlplano" => $jmlplano,
						"totbhn" => $totbhn,
						"mesin" => "",
						"jenismesin" => "",
						"hargaminim" => "", 
						"hargadrek" => "", 
						"jmlminim" => "", 
						"lebarcetak" => "",
						"tinggicetak" => "",
						"totcetak" => 0,
						"ongkos_potong" => 0,						
						"hargapot" => 0,						
						"hargapotmin" => 0,						
						"tot_ctp" => 0,
						"ctp" => 0,
						"jmlwarna" => "",
						"jmlwarna2" => "",
						"tot_plat" => 0,
						"replat" => 0,
						"replatsetiap" => 0,
						"jml_total" => $jml_total,	
						"total_jual" => 0,							
						"muat1plano" => $jmlpot,			
						"muat" => $jmlmuat,
						"jmlset" => 0,
						"lamminim" => 0,
						"lamlebih" => 0,
						"totlaminating" => 0,
						"ketlam" => "",
						"ketbb" => "",
						"bbstat" => "",
						"tarik" => "",
						"ket_satuan" => "",
						"jml_satuan" => "",
						"tot_lipat" => 0,
					));
					
					//echo json_encode($data);

					
akhirb:					
				} // while bahan yyyyyyyyyyyyyy
				} // while bahan yyyyyyyyyyyyyy
			usort($data, 'sortByOrder');
					return $data;
		
}// foreach  bahan	
function sortByOrder($a, $b) {return $a['jml_total'] - $b['jml_total'];}