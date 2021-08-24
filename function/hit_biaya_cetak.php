<?php
	function hitbiayacetak($mesin, $lbrcetak,$tgcetak,$jmlcetak,$bahan,$jmlwarna,$jmlwarna2,$bbstat,$tarik,$insheet,$set,$lam,$lbc,$tgc,$jml_satuan,$cetak_bagi,$ket_satuan,$ongkos_lipat,$pakeplat,$s_email,$idkertas){
	// echo 1;
		$data= array(); //menampung data hasil ke array
		$ArrayBiaya = ArrayBiaya($s_email);
		$ArrayKertas = ArrayKertas($s_email);
		$ArrayInsheet = ArrayInsheet($s_email);
		
		$ArrayBahan = ArrayBahanDua($s_email);
		$jsonb = json_decode($ArrayBahan);
		if (empty($idkertas) or $idkertas == 0) {
			$pilihB2 = pilihB2($jsonb->bahan, $bahan);
			} else {
			$pilihB2 = pilihUKBahan($jsonb->bahan, $idkertas);
		}
		// print_r($pilihB2);
		$row3 = pilihBiaya($ArrayBiaya['biaya'], 29);
		$hargapot  =$row3['HargaLebih'];	
		$hargapotmin  =$row3['HargaMin'];
		
		$rowjenis = pilihBahan($ArrayKertas['katbahan'], $bahan);
		$jenis_bahan  =$rowjenis['nama_kategori'];	
		
		// echo $tgcetak;
		// echo "<br>";
		// Biaya Laminating
		if ($lam == '1' or $lam== '2'){$laminat='18';}
		elseif ($lam == '3' or $lam== '4'){$laminat='17';}
		elseif ($lam == '5' or $lam== '6'){$laminat='16';}
		else {$laminat='';}
		
		$row7 = pilihBiaya($ArrayBiaya['biaya'], $laminat);
		$ketlam  	=$row7['Nama_Biaya'];
		$hrgminlam  	= $row7['HargaMin'];
		$hrglebihlam  	= $row7['HargaLebih'];	
		
		//Cari laminating satumuka / bb jika bb kalikan 2				
		if ($lam == '1' or $lam== '3' or $lam=='5'){$jmlam=1;}
		else if ($lam == '2' or $lam== '4' or $lam=='6'){$jmlam=2;}
		else{$jmlam=0;}
		
		if ($lam == '1' or $lam == '3' or $lam == '5'){
			$kerlambb = "SatuMuka";
			}else if ($lam == '2' or $lam == '4' or $lam == '6'){
			$kerlambb = "Bolakbalik";
		}	
		
		//mesin
		$ArrayMesinz = ArrayMesin($s_email);
		$jsonm = json_decode($ArrayMesinz,true);
		$items = CariMesin($jsonm['mesin'], $mesin);
		// echo $mesin;
		// print_r($items);
		$ctp = 0;
		foreach ($items as $row) {
		// echo $row;
			$hargaminim = $row['hargamin'];
			$jmlminim = $row['jumlahmin'];
			$hargadrek = $row['hargalebih'];
			$lbrkertasmesin = $row['lebarkertas'];
			$tgkertasmesin = $row['panjangkertas'];
			$lebartext = $row['lebarcetak'];
			$tinggitext = $row['panjangcetak'];
			$lebarmin = $row['min_lebar'];
			$tinggimin = $row['min_panjang'];
			$ctp = $row['hargactp'];
			$NamaMesin = $row['namamesin'];
			$jenis_mesin = $row['jmesin'];
			$replatsetiap = $row['replat'];
			// if (empty($replatsetiap) OR $replatsetiap==0){
				// $replatsetiap = 1000;
			// }
			//$replat = $row['replat'];
			if (is_null($tarik)){
				$tarik = $row['tarikan'];
				}elseif ($tarik == 0){
				$tarik = 0;
				}else{
				$tarik = $row['tarikan'];
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
				$tinggimin = $row['min_lebar'];
			$lebarmin = $row['min_panjang'];}
			//	echo $tinggimin . " x " . $lebarmin ;
			
			
			$ulangbb=1; 	
			$kali = "L";		
			$ulangbb = 1;
			
			while ($ulangbb <= 3) {  //selama cetak bolak balik
				
				
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
					$ketbb="Bolak-balik Beda Plat";
					$ins_bb = 2;
					$biayabbplatsama = 0;
				} //jika cetak bolak balik plat sama berarti ukuran cetaknya dibagi 2
				
				if ($ulangbb <= 2){   //Jika di Cetak Bolak balik plat yang sama
					$cetakbb= 2;
					$ins_bb = 2;	
					$biayabbplatsama = $row['biayabbplatsama'];		
					$jmlwarna = $jmlwarna1;
					if ($kali == "L") { 		//Bolak balik Lebar Cetakan x 2
						$lebarpot = $lebarpot * 2;
						$lebarcetak = $lebarcetak * 2;
						if($jenis_mesin == 'PrintDigital' ){
						$ketbb="Bolak-balik Kertas yang Sama x Lebar";
						}else{
						$ketbb="Bolak-balik Plat yang Sama x Lebar";
						}
					}
					elseif ($kali == "P"){	//Bolak balik Tinggi Cetakan x 2
						$tinggipot = $tinggipot * 2;
						$tinggicetak = $tinggicetak * 2;
						if($jenis_mesin == 'PrintDigital' ){
						$ketbb="Bolak-balik Kertas yang Sama x Tinggi";
						}else{
						}
					}
					
				} //jika cetak bolak balik plat sama berarti ukuran cetaknya dibagi 2
				
				loncatbbsatumuka:
				$no=1;
				while ($z / $lebarpot >= 1){ // Selama Tinggi Mesin masih muat u/ Lebar Cetakan	// x 	
					
					
					while ($z / $tinggipot >= 1) { //  Selama Tinggi Mesin masih muat u/ Tinggi Cetakan  // y
						
						// echo $no++;
						
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
						
						if($cetak_bagi=='Y'){
							$muat = $x * $y * $cetakbb;
							
							}else{
							$muat = 1;						
						}
						
						//Jika ukuran cetak lebih kecil dari ukuran minimal mesin loncati
						if ($lebarpot < $lebarmin) {
						goto loncat; }
						elseif	($tinggipot < $tinggimin) { 
						goto loncat; }
						
						// Cari Ukuran Kertas
						
						// $pilihB2 = pilihB2($jsonb->bahan, $bahan);
						foreach ($pilihB2 as $key=> $row2) {
							$Nm_Bhn=$row2['Nm_Bhn'];
							$hrgbhn=$row2['Harga_Bahan'];
							$tblbhan=$row2['Tebal'];
							$tgbhan=$row2['Tinggi'];
							$lbrbhan=$row2['Lebar'];
							
							//Jenis Bahan;
							
							$lebarpotkertas = $lebarpot + $tarik;
							$tinggipotkertas = $tinggipot + $tarik;
							
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
							
							
							//	$jmlset = ceil($set / $muat);// * $cetakbb;
							$jmlset = $set;// * $cetakbb;
							//echo ($jmlcetak * $jml_satuan ) / $muat  . "<br>";
							
							$jmlcetakreal = ceil(($jmlcetak * $jml_satuan / $muat ) * $cetakbb);
							
							// $jmlbhn= ceil(($jmlcetak * $jml_satuan ) / 1 );
							$jmlbhn= ceil(($jmlcetak * $jml_satuan ) / $muat );
							
							
							// echo $NamaMesin . " - " . $Nm_Bhn .' - '. $muat . "<br>";
							
							// $jmldrek = $jmlcetakreal - $jmlminim;
							if($jenis_mesin == 'PrintDigital' ){
								$jmldrek = 0;
								}else{
								$jmldrek =  $jmlcetakreal - $jmlminim;
								$jmldrek =  $jmldrek;
							}
							
							if ($jmldrek < 0) {  //jika jumlah drek lebih kecil dari 0
							$jmldrek = 0;}			
							$totdrek = $jmldrek * $hargadrek * $jmlwarna;
							
							if (is_null($totdrek)){
							$totdrek = 0;}
							
							if ($laminat==''){
							$totlaminating=0;	$hrgminlam = 0; 	$hrglebihlam = 0;	}
							else{
								$biayalam = $lbrcetak * $tgcetak * $jmlcetak * $hrglebihlam * $jmlam * $set;						
								if ( $biayalam > $hrgminlam) {
									$totlaminating = $biayalam;
									}else {
									$totlaminating = $hrgminlam * $jmlset;
								}
							}	
							$rowinsheet = pilihInsheet($ArrayInsheet['insheet'], $jmlbhn);
							// print_r($rinsheet);
							if($ins_bb == 2){
								$in=$rowinsheet['insheet_bb'];
								$insheet_ = $jmlbhn * $in / 100 ;
								$insheet_ = ceil($insheet_);
								}else{
								$in=$rowinsheet['insheet'];
								$insheet_ = $jmlbhn * $in / 100;
								$insheet_ = ceil($insheet_);
							}
							
							if($insheet==0){
								$insheet_ = 0;
							}
							if($jenis_mesin == 'PrintDigital' ){
								$insheet_ = 0;
							}
							
							$jmlrealcetak =  $jmlbhn + $insheet_;				
							
							
							if ($jmlrealcetak > $replatsetiap and $replatsetiap > 1) {
									$replat = ceil($jmlrealcetak / $replatsetiap);
									} else {
									$replat = 1;
								}
							//Ongkos Cetak Print Digital		
							if($jenis_mesin == 'PrintDigital' )
							{
								
								$hitpotm = hitung($lbrcetak,$tgcetak, $lebartext, $tinggitext);
								if($cetak_bagi=='N'){
									$jmlpot = 1;
									$jmlpot2 = 1;
									}else{
									$jmlpot = $hitpotm[0]['jml'];
									$hitpotm2 = hitung($lbrbhan, $tgbhan, $lebartext, $tinggitext);
									if($hitpotm2[0]['jml']==0){
										$jmlpot2 = 1;
										}else{
										$jmlpot2 = $hitpotm2[0]['jml'];
									}
								}
								
								
								
								
								
								$jmlprint = ceil(($jmlcetak * $set * $jml_satuan)/$jmlpot);
								
								$ArrayPrint = ArrayPrint($s_email);
								$row = pilihPrint($ArrayPrint['hargaprint'], $jmlprint, $mesin);
								
								$harga_print = $row['harga'];
								$harga_laminating = $row['harga_laminating'];
								$jmlminim = $row['jml_min'] . " s/d " . $row['jml_max'] ;
								if (is_null($harga_print)){
									if ($jmlprint > $jmlminim){
										$harga_print = $hargadrek;
										}else{
										$harga_print = $hargaminim;
									}
								}
								
								$totcetak = $jmlprint * $harga_print * $bb;	
								//echo $bb;
								$hargaminim = $harga_print;
								
								$tot_ctp = 0;
								
								
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
									
									if ($lam == '3' or $lam == '4' or $lam == '5' or $lam == '6'){
										if ($totlaminating > $totlaminating2){
										$totlaminating = $totlaminating2;}
									}			
								}	
								
								// $jmlcetakreal = $jmlprint;			
								$tgbhan = $tinggitext;			
								$lbrbhan = $lebartext ;			
								$muat = $jmlpot;
								$lebarpot = $lebartext;
								$tinggipot = $tinggitext;;
								$tarik = 0;
								
								if($jmlprint > 50){
									$ongkos_potong = $hargapotmin;
									}else{
									$ongkos_potong = 0;
								}
								
								
								$jmlplano = ceil((($jmlbhn + $insheet_) * $set ) / $jmlpot2);
								$tot_ctp = 0;
								$ctp = 0;
								$beratkertas = (($lbrbhan * $tgbhan * $tblbhan * $jmlplano) / 10000000);
							}
							else{
								$totcetak = ceil((($hargaminim * $jmlwarna) + $totdrek + ($biayabbplatsama * $jmlwarna)) * $jmlset );
								$jmlplano = ceil((($jmlbhn + $insheet_) * $set ) / $jmlpot);
								$beratkertas = ceil(($lbrbhan * $tgbhan * $tblbhan * $jmlplano) / 10000000);
								$ongkos_potong = ceil($beratkertas * $hargapot);
								if ($hargapotmin>$ongkos_potong){
									$ongkos_potong = $hargapotmin;
								}
								if($pakeplat == 'N'){
									$tot_ctp = 0;
									}else{
									$tot_ctp = $ctp * $jmlwarna * $jmlset  * $replat;
								}
							}
							$totbhn = $hrgbhn * $jmlplano ;
							
							
							//$tot_cetak = round($totcetak);
							
							$tot_plat = $jmlwarna * $jmlset  * $replat;
							$jml_total = $totcetak + $totbhn + $tot_ctp + $ongkos_potong + $totlaminating;
							//$jmlplano = round($jmlplano);
							
							$hitpot2 = hitung($lbc,$tgc,$lebarpotkertas,$tinggipotkertas);
							$jmlmuat = $hitpot2[0]['jml'];
							
							//ongkos_lipat
							if(!empty($ongkos_lipat)){
								$row10 = pilihBiaya($ArrayBiaya['biaya'], 52);
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
							if($jenis_mesin == 'PrintDigital' )
							{
							$totbhn = 0;
							}
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
							
							
							akhirbhn:					
							// break;
						} // while bahan yyyyyyyyyyyyyy
						loncat:
						
						$y = $y + 1;
						$tinggipot = $tinggicetak * $y;
						
					}//end while2
					
					$y = 1;
					$tinggipot = $tinggicetak;
					
					$x = $x + 1;
					$lebarpot = $lebarcetak * $x;
					// break;
				}//endwhile1
				
				
				$kali="P";
				$x = 1;
				$y = 1;
				$ulangbb = $ulangbb + 1;
			} // endwhile cetak bb 
			
			bawah:		
			break;
		}// foreach  
		
		usort($data, 'sortByOrder');
		//echo json_encode($data);
		return $data;
		
	} //end fungsi hitbiayacetak					