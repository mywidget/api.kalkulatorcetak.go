<?php
	function hitungcetak(array $arr){
		
		global $db;
		$lbrcetak    = $arr['lbrcetak'];
		$tgcetak     = $arr['tgcetak'];
		$jmlcetak    = $arr['jmlcetak'];
		$bahan       = $arr['bahan'];
		$jmlwarna    = $arr['jmlwarna'];
		$jmlwarna2   = $arr['jmlwarna2'];
		$bbstat      = $arr['bbstat'];
		$tarik       = $arr['tarik'];
		$insheet     = $arr['insheet'];
		$set         = $arr['set'];
		$lam         = $arr['lam'];
		$finishing1  = $arr['finishing1']; 
		$finishing2  = $arr['finishing2']; 
		$finishing3  = $arr['finishing3'];
		$finishing4  = $arr['finishing4'];
		$finishing5  = $arr['finishing5'];
		$finishing6  = $arr['finishing6'];
		$finishing7  = $arr['finishing7'];
		$finishing8  = $arr['finishing8'];
		$finishing9  = $arr['finishing9'];
		$finishing10 = $arr['finishing10'];
		$submit      = $arr['submit'];
		$lbrf1       = $arr['lbrf1'];
		$tgf1        = $arr['tgf1'];
		$lbrf2       = $arr['lbrf2'];
		$tgf2        = $arr['tgf2'];
		$lbrf3       = $arr['lbrf3'];
		$tgf3        = $arr['tgf3'];
		$lbrf4       = $arr['lbrf4'];
		$tgf4        = $arr['tgf4'];
		$lbrf5       = $arr['lbrf5'];
		$tgf5        = $arr['tgf5'];
		$lbrf6       = $arr['lbrf6'];
		$tgf6        = $arr['tgf6'];
		$lbrf7       = $arr['lbrf7'];
		$tgf7        = $arr['tgf7'];
		$lbrf8       = $arr['lbrf8'];
		$tgf8        = $arr['tgf8'];
		$lbrf9       = $arr['lbrf9'];
		$tgf9        = $arr['tgf9'];
		$lbrf10      = $arr['lbrf10'];
		$tgf10       = $arr['tgf10'];
		$modul       = $arr['modul'];
		$jml_satuan  = $arr['jml_satuan'];
		$cetak_bagi  = $arr['cetak_bagi'];
		$ket_satuan  = $arr['ket_satuan'];
		$ongpot      = $arr['ongpot'];
		$j_mesin     = $arr['j_mesin'];
		$kethitung   = $arr['kethitung'];
		$jilid       = $arr['jilid'];
		$ongkos_lipat= $arr['ongkos_lipat'];
		$pakeplat    = $arr['pakeplat'];
		$s_email     = $arr['s_email'];
		$idkertas    = $arr['idkertas'];
		// echo $j_mesin;
		//array biaya
		$ArrayBiaya = ArrayBiaya($s_email);
		
		$sqlprofit = $db->query("SELECT profit FROM `gtbl_user` WHERE id_user='$s_email'");
		$datapro = $sqlprofit->fetch_assoc();
		if(empty($datapro['profit'])){
			$persen = 0;
			}else{
			$persen = $datapro['profit'];
		}
		
		// print_r($ArrayBiaya['biaya']);
		// echo $ArrayBiaya['biaya'];
		$pond = '';
		//Biaya finishing1
		if (empty($finishing1) or $finishing1==0) {
			$totfinishing1=0;
			$hrgfinishing1min=0;
			$hrgfinishing1lebih=0;
			$jmlfinishing1min=0;			
			$nmfinishing1='';			
		}
		else {
			// $sqlfinishing1 = mysql_query("select * from tbl_biaya where KdBiaya='$finishing1'");
			// $row5=mysql_fetch_array($sqlfinishing1);   
			$row5=pilihBiaya($ArrayBiaya['biaya'],$finishing1);    
			$hrgfinishing1min  		=$row5['HargaMin'];
			$hrgfinishing1lebih  	=$row5['HargaLebih'];
			$jmlfinishing1min  		=$row5['JumlahMin'];	
			$nmfinishing1			=$row5['Nama_Biaya'];
			
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
		}
		else {
			$row5=pilihBiaya($ArrayBiaya['biaya'],$finishing2);     
			$hrgfinishing2min  		=$row5['HargaMin'];
			$hrgfinishing2lebih  	=$row5['HargaLebih'];
			$jmlfinishing2min  		=$row5['JumlahMin'];
			$nmfinishing2			=$row5['Nama_Biaya'];	
			
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
		}
		else {
			$row5=pilihBiaya($ArrayBiaya['biaya'],$finishing3);     
			$hrgfinishing3min  		=$row5['HargaMin'];
			$hrgfinishing3lebih  	=$row5['HargaLebih'];
			$jmlfinishing3min  		=$row5['JumlahMin'];
			$nmfinishing3			=$row5['Nama_Biaya'];	
			
			if($finishing3 == 12){
				$pond = 'Y';
			}		
			
			$finishing3 = $hrgfinishing3lebih * $jmlcetak * $jml_satuan * $lbrf3 * $tgf3;
			if ($finishing3 <= $hrgfinishing3min) {
			$totfinishing3 = $hrgfinishing3min;}
			else{
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
		}
		else {
			$row5=pilihBiaya($ArrayBiaya['biaya'],$finishing4);    
			$hrgfinishing4min  		=$row5['HargaMin'];
			$hrgfinishing4lebih  	=$row5['HargaLebih'];
			$jmlfinishing4min  		=$row5['JumlahMin'];
			$nmfinishing4			=$row5['Nama_Biaya'];	
			
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
			$totfinishing5 = $hrgfinishing5min;}
			else{
			$totfinishing5 = $finishing5;}
		}		
		
		//Biaya finishing6
		if (empty($finishing6) or $finishing10==6) {
			$totfinishing6=0;
			$hrgfinishing6min=0;
			$hrgfinishing6lebih=0;
			$jmlfinishing6min=0;	
			$nmfinishing6='';	
		}
		else {
			$row5=pilihBiaya($ArrayBiaya['biaya'],$finishing6);    
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
		}
		else {
			$row5=pilihBiaya($ArrayBiaya['biaya'],$finishing7);    
			$hrgfinishing7min  		=$row7['HargaMin'];
			$hrgfinishing7lebih  	=$row7['HargaLebih'];
			$jmlfinishing7min  		=$row7['JumlahMin'];	
			$nmfinishing7			=$row7['Nama_Biaya'];
			
			if($finishing7 == 12){
				$pond = 'Y';
			}		
			$finishing7 = $hrgfinishing7lebih * $jmlcetak * $jml_satuan *  $lbrf7 * $tgf7;
			if ($finishing7 <= $hrgfinishing7min) {
			$totfinishing7 = $hrgfinishing7min;}
			else{
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
			$row5=pilihBiaya($ArrayBiaya['biaya'],$finishing8);    
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
		}
		else {
			$row5=pilihBiaya($ArrayBiaya['biaya'],$finishing9);   
			
			$hrgfinishing9min  		=$row9['HargaMin'];
			$hrgfinishing9lebih  	=$row9['HargaLebih'];
			$jmlfinishing9min  		=$row9['JumlahMin'];	
			$nmfinishing9			=$row9['Nama_Biaya'];
			
			if($finishing9 == 12){
				$pond = 'Y';
			}		
			$finishing9 = $hrgfinishing9lebih * $jmlcetak * $jml_satuan *  $lbrf9 * $tgf9;
			if ($finishing9 <= $hrgfinishing9min) {
				$totfinishing9 = $hrgfinishing9min;
			}
			else{
				$totfinishing9 = $finishing9;
			}
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
			$row5=pilihBiaya($ArrayBiaya['biaya'],$finishing10);    
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
		
		$ArrayMesinz = ArrayMesin($s_email);
		$json = json_decode($ArrayMesinz,true);
		if (empty($j_mesin) OR $j_mesin != "PrintDigital" OR $j_mesin == ""){
			if(is_numeric($j_mesin))
			{
				$_arr['a'] = 1;// echo 1;
				$pilihM2 = pilihM2($json['mesin'],$j_mesin);
			}
			elseif($j_mesin == "Offset"){
				$_arr['f'] = 1;// echo 1;
				$pilihM2 = pilihMOffset($json['mesin'],$j_mesin);
			}
			else{
				$_arr['b'] = 1;// echo 1;
				// echo 2;
				$pilihM2 = pilihM3($json['mesin'],$modul);
			}
			
		}
		elseif($j_mesin == "PrintDigital")
		{
			$_arr['c'] = 1;// echo 1;
			$pilihM2 = pilihM3J($json['mesin'],$j_mesin);
			$persen =0;
		}
		else{
			if(is_numeric($j_mesin))
			{
				$_arr['d'] = 1;// echo 1;
				// echo 3;
				$pilihM2 = pilihM2($json['mesin'],$j_mesin);
			}
			else{
				$_arr['e'] = 1;// echo 1;
				// echo 4;
				$pilihM2 = pilihM3($json['mesin'],$modul);
			}
		}
		
		$datafinishing = array(
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
		);						
		//	echo json_encode($datafinishing);	
		
		//Cari Biaya Cetak dan Biaya Kertas
		$data = array();
		$data1 = array();
		$data2 = array();
		$data3 = array();
		$data4 = array();
		$data5 = array();
		$data6 = array();
		$data10 = array();
		
		// print_r($pilihM2);
		foreach ($pilihM2 as $row) {
			// print_r($row);
			$mesin = $row['kdmesin'];
			$lebarcetak = $row['lebarcetak'];
			$panjangcetak = $row['panjangcetak'];
			$mes = $row['namamesin'];
			// echo $mesin;
			
			if(empty($jilid)){
				$jilid = 0;
			} 
			
			$ukuran_lipat = hitung_lipatan($lbrcetak,$tgcetak,$lebarcetak,$panjangcetak,$jilid, $set); //fungsi ada di reader
			$uk_lbr = ($ukuran_lipat[0][0]);
			$uk_tg = ($ukuran_lipat[0][1]);
			$uk_lbr2 = ($ukuran_lipat[1][0]);
			$uk_tg2 = ($ukuran_lipat[1][1]);
			$jml_pot = ($ukuran_lipat[2]);	
			
			if (is_null($jml_pot) or $jml_pot < 1){ 
			goto end;} 
			if (is_null($set) or $set < 1){ 
			goto end;}	
			
			$jsett = round($set / $jml_pot);
			$jset = ($set / $jml_pot);
			$sisa = $set - ($jsett*$jml_pot);
			// echo 1;
			// $arr = [];
			if($jset < 1){
				// $arr = ['a'];
				$data=[];
				
				// echo 1;
				$hit2 = hitbiayacetak($mesin, $uk_lbr,$uk_tg,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$set,$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$idkertas);
				usort($hit2, 'sortByOrder');
				array_push($data10,$hit2[0]); //Push ke array hanya paling kecil
				
			}
			
			elseif($jset >=1 AND $sisa <= 0){
				
				$data=[];
				if (!empty($uk_lbr)){
					// $arr = ['b'];
					// echo 2;
					$hita = hitbiayacetak($mesin, $uk_lbr,$uk_tg,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$jsett,$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$idkertas);
				} else { $hita = [];}
				if (!empty($uk_lbr2)){ 
					// $arr = ['c'];
					// echo 3;
					$hitb = hitbiayacetak($mesin, $uk_lbr2,$uk_tg2,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$jsett,$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$idkertas);
				} else { $hitb = []; }
				
				
				$gabung = array_merge($hita,$hitb);
				
				usort($gabung, 'sortByOrder');
				
				array_push($data10,$gabung[0]);
				
			}
			elseif($jset>=1 AND $sisa > 0){
				
				if (!empty($uk_lbr)){ 
					// $arr = ['d'];
					// echo 4;
					$hita = hitbiayacetak($mesin, $uk_lbr,$uk_tg,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$jsett,$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$idkertas);
				}else { $hita = [];}
				if (!empty($uk_lbr2)){ 
					// $arr = ['e'];
					// echo 5;
					$hitb = hitbiayacetak($mesin, $uk_lbr2,$uk_tg2,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$jsett,$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$idkertas);
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
				
				$data2=[];
				
				$mesin2 = $row['kdmesin'];
				$mes2 = $row['namamesin'];
				
				if (!empty($uk_lbr_sisa)){
					// $arr = ['f'];
					// echo 6;
					$hit2_a = hitbiayacetak($mesin2, $uk_lbr_sisa,$uk_tg_sisa,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,($jsett_sisa),$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$idkertas);
				} else { $hit2_a = []; }
				if (!empty($uk_lbr_sisa2)){
					// $arr = ['g'];
					// echo 7;
					$hit2_b = hitbiayacetak($mesin2, $uk_lbr_sisa2,$uk_tg_sisa2,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,($jsett_sisa),$lam,$lbrcetak,$tgcetak,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$idkertas);
				} else { $hit2_b = []; }
				
				$gabung2 = array_merge($hit2_a,$hit2_b);
				usort($gabung2, 'sortByOrder');
				
				if (!empty($gabung2)){
					$data2 = array_merge($data2,$gabung2);
				}
				// }
				usort($data2, 'sortByOrder');
				$data = [];
				
				foreach($data1 as $key => $value)
				{
					if (is_array( $key ) ) {
						$j = count($key); 
						} else { 	
						$j = 1;
					}
					for($i = 0 ; $i< $j ; $i++){
						if($key=='jml_total')
						{
							$data[$key] = $value + $data2[0][$key];	
							}else{
							$data[$key] = $value.'|'.$data2[0][$key];
						}
					}
				} //End foreach	
				//	echo json_encode($data) . "<br><br><br>";
				array_push($data10,$data);
			} //End elseIf
			// print_r($arr); 
			end:
			// break;
		}  //End While
		//----------------------------------------------------------------------------------------------------------	 
		
		usort($data10, 'sortByOrder');
		
		foreach($data10 as $key => $value){
			$tot = intval($data10[$key]['jml_total']) + intval($datafinishing['totfinishing']);	
			$totjual = ($tot * $persen/100) + $tot;
			$data10[$key]['jml_total'] = $tot;
			$data10[$key]['total_jual'] = $totjual;	
		} //End foreach	
		
		
		//Gabungin Aray Finishing ama ongkos cetak
		
		foreach($data10 as $key => $value){
			//for($i = 0 ; $i<count($key); $i++){
			$data2 = array_merge($data10[$key],$datafinishing);
			array_push($data6,$data2);
			//}
		} //End foreach	
		
		$data10 = $data6;
		return $data10;
		
	}					