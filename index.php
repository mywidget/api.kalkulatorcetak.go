<?php
	define("BASEPATH", "");
	include "class/conn_db.php";
	include "class/reader.php";
	include "class/web_function.php";
	include "class/data.inc.php";
	
	$ArrayMesinz = ArrayMesin(2);
	$ArrayBiaya = ArrayBiaya(2);
	
	// $jsonm = json_decode($ArrayMesinz,true);
	// $jsonm = $jsonm['mesin'];
	// $item = pilihMmesinMod($jsonm,'box1');
	
	
	// // echo $item['kdmesin'];
	$j_mesin =4;
	$modul ="buku";
	// if (empty($j_mesin) or $j_mesin == ""){
	// $where = 'buku';
	// echo 1;
	// }else{
	// $where = $j_mesin;
	// }
	$row5=pilihBiaya($ArrayBiaya['biaya'],66);
	print_r($row5);
	// function pilihM22(array $array,$str){
		// $object = json_decode(json_encode($array));
		// foreach ($object as $key => $val) {
		// echo $val->kdmesin;
			// // if($val->kdmesin==$str AND $val->aktif=='Y'){
				// $data[] = array(
				// "kdmesin" => $val->kdmesin,
				// "jmesin" => $val->jenis_mesin,
				// "hargamin" => $val->hargamin,
				// "jumlahmin" => $val->jumlahmin,
				// "hargalebih" => $val->hargalebih,
				// "lebarkertas" => $val->lebarkertas,
				// "panjangkertas" => $val->panjangkertas,
				// "lebarcetak" => $val->lebarcetak,
				// "panjangcetak" => $val->panjangcetak,
				// "min_lebar" => $val->min_lebar,
				// "min_panjang" => $val->min_panjang,
				// "hargactp" => $val->hargactp,
				// "namamesin" => $val->namamesin,
				// "replat" => $val->replat,
				// "biayabbplatsama" => $val->biayabbplatsama,
				// "tarikan" => $val->tarikan,
				// "aktif" => $val->aktif
				// );
	
		// }
		// return $data;
	// }
	// $json = json_decode($ArrayMesinz,true);
		
	// if (empty($j_mesin) or $j_mesin == "" ){
		// if(is_int($j_mesin))
		// {
	// echo 1;
			// $pilihM2 = pilihM22($json['mesin'],$j_mesin);
			// }else{
	// echo 2;
			// $pilihM2 = pilihM3($json['mesin'],$modul);
		// }
		// }else{
	// echo 3;
		// $pilihM2 = pilihM22($json['mesin'],$j_mesin);
		// echo "<pre>";
	// print_r($pilihM2);
	// echo "</pre>";
	// }
	// $row5=pilihBiaya($ArrayBiaya['biaya'],29);
	// echo $where;
	// $pilihM2 = pilihM2($json->mesin,$where);
	
	
	// foreach ($pilihM2 as $row) {	
			// $mesin = $row['namamesin'];
	// echo $mesin;
	// echo "<pre>";
	// print_r($pilihM2);
	// echo "</pre>";
	// }
	// $ArrayBiaya = ArrayBiaya(2);
	// $row1=pilihBiaya($ArrayBiaya['biaya'],5);    
	

	
	// echo $row1['HargaMin'];
	// foreach ($pilihM2 as $row) {
	// echo  $row['hargamin'];
	// }
	// echo $item[0]->hargamin;
	// $arrays = ArrayKertas($global);
	// $search_items = array('kdmesin'=>4);
	// $res = search($json['mesin'], $search_items); 
	// foreach ($res as $current_array) { 
	// $data[] = array("kdmesin"=>$current_array['kdmesin'],"modul"=>$current_array['modul']);
	// }
	// $pilihM3 = pilihM3($json->mesin,'box1');
	// foreach ($json->mesin as $current_key => $current_array) {
	// $mod = explode(" ",$current_array->modul);
	// foreach ($mod as $key => $val) {
	// if($val=='box1'){
	// $data[] = array(
	// "kdmesin" => $current_array->kdmesin,
	// "jmesin" => $current_array->jenis_mesin,
	// "hargamin" => $current_array->hargamin,
	// "jumlahmin" => $current_array->jumlahmin,
	// "hargalebih" => $current_array->hargalebih,
	// "lebarkertas" => $current_array->lebarkertas,
	// "panjangkertas" => $current_array->panjangkertas,
	// "lebarcetak" => $current_array->lebarcetak,
	// "panjangcetak" => $current_array->panjangcetak,
	// "min_lebar" => $current_array->min_lebar,
	// "min_panjang" => $current_array->min_panjang,
	// "hargactp" => $current_array->hargactp,
	// "namamesin" => $current_array->namamesin,
	// "replat" => $current_array->replat,
	// "biayabbplatsama" => $current_array->biayabbplatsama,
	// "tarikan" => $current_array->tarikan,
	// "aktif" => $current_array->aktif,
	// "modul" => $current_array->modul
	// );
	// }
	// }
	// }
	
	
