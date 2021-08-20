<?php
	//error_reporting(0);
	//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
	if (count(get_included_files()) == 1) {
		echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
		exit("Direct access not permitted.");
	}
	function hitbiayacetak($mesin, $lbrcetak, $tgcetak, $jmlcetak, $bahan, $jmlwarna, $jmlwarna2, $bbstat, $tarik, $insheet, $set, $lam, $lbc, $tgc, $jml_satuan, $cetak_bagi, $ket_satuan, $ongkos_lipat, $pakeplat, $s_email, $modul, $idkertas)
	{
		
		// function hitbiayacetak(array $arr){
		$data = array(); //menampung data hasil ke array
		// echo $bahan;
		// Cari Biaya Potong
		// $sql3 = mysql_query("select * from tbl_biaya where KdBiaya='29'");
		$ArrayMesinz = ArrayMesin($s_email);
		$jsonm = json_decode($ArrayMesinz);
		$jsonm = $jsonm->mesin;
		
		// print_r($jsonm);
		
		$ArrayBahan = ArrayBahanDua($s_email);
		
		
		$ArrayBiaya = ArrayBiaya($s_email);
		$ArrayKertas = ArrayKertas($s_email);
		$row3 = pilihBiaya($ArrayBiaya['biaya'], '29'); // pilih biaya potong
		$hargapot  = $row3['HargaLebih'];
		$hargapotmin  = $row3['HargaMin'];
		// print_r($ArrayKertas);
		// Cari Jenis Bahan
		$rowjenis = pilihBahan($ArrayKertas['katbahan'], $bahan); // pilih bahan
		$jenis_bahan  = $rowjenis['nama_kategori'];
		$idk  = $rowjenis['idk'];
		$jsonb = json_decode($ArrayBahan);
		if (empty($idkertas) or $idkertas == 0) {
			$pilihB2 = pilihB2($jsonb->bahan, $bahan);
			} else {
			$pilihB2 = pilihUKBahan($jsonb->bahan, $idkertas);
		}
		// print_r($pilihB2);
		// echo $jenis_bahan;
		// Biaya Laminating
		if ($lam == '1' or $lam == '2') {
			$laminat = '18';
			} elseif ($lam == '3' or $lam == '4') {
			$laminat = '17';
			} elseif ($lam == '5' or $lam == '6') {
			$laminat = '16';
			} else {
			$laminat = '';
		}
		
		// $sqlam = mysql_query("select * from tbl_biaya where KdBiaya='$laminat'");
		// $row7 = mysql_fetch_array($sqlam);
		if (empty($laminat) or $laminat == 0) {
			$ketlam = '';
			$hrgminlam = 0;
			$hrglebihlam = 0;
			$jmlfinishing5min = 0;
			$nmfinishing5 = '';
			} else {
			$row7 = pilihBiaya($ArrayBiaya['biaya'], $laminat);
			$ketlam  	= $row7['Nama_Biaya'];
			$hrgminlam  	= $row7['HargaMin'];
			$hrglebihlam  	= $row7['HargaLebih'];
		}
		
		
		//Cari laminating satumuka / bb jika bb kalikan 2				
		if ($lam == '1' or $lam == '3' or $lam == '5') {
			$jmlam = 1;
			} else if ($lam == '2' or $lam == '4' or $lam == '6') {
			$jmlam = 2;
			} else {
			$jmlam = 0;
		}
		
		if ($lam == '1' or $lam == '3' or $lam == '5') {
			$kerlambb = "SatuMuka";
			} else if ($lam == '2' or $lam == '4' or $lam == '6') {
			$kerlambb = "Bolakbalik";
		}
		$beratkertas = 0;
		$nums = 1;
		
		$items = pilihM2($jsonm, $mesin);
		if (is_array($items)) {
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
				if (is_null($tarik)) {
					$tarik = $item['tarikan'];
					} elseif ($tarik == 0) {
					$tarik = 0;
					} else {
					$tarik = $item['tarikan'];
				}
				
				$x = 1;
				$y = 1;
				
				//Menentukan Ukuran Maksimal dimana Lebar agar lebih Kecil dari Tinggi
				if ($lebartext > $tinggitext) {
					$z = $lebartext;
					$w = $tinggitext;
					} else {
					$z = $tinggitext;
					$w = $lebartext;
				}
				
				//Menentukan Ukuran Minimal mesin dimana Lebar agar lebih Kecil dari Tinggi
				//	echo $row['min_panjang'] . " x " . $row['min_lebar'] ;
				if ($lebarmin > $tinggimin) {
					$tinggimin = $item['min_lebar'];
					$lebarmin = $item['min_panjang'];
				}
				//	echo $tinggimin . " x " . $lebarmin ;
				
				
				$ulangbb = 1;
				$ins_bb = 1;
				$kali = "L";
				$ulangbb = 1;
				
				while ($ulangbb <= 3) {  //selama cetak bolak balik  
					// echo "<br/>";
					// echo $ulangbb;
					
					$lebarpot 	= $lbrcetak;
					$tinggipot 	= $tgcetak;
					$lebarcetak	= $lbrcetak;
					$tinggicetak = $tgcetak;
					
					
					//Menentukan Ukuran Cetakan  dimana Lebar agar lebih Kecil dari Tinggi
					if ($lebarpot > $tinggipot) {
						$tinggipot		= $lbrcetak;
						$lebarpot 		= $tgcetak;
						$tinggicetak	= $lbrcetak;
						$lebarcetak		= $tgcetak;
					}
					
					//Jika Cetak BB
					$bb = 2;
					$jmlwarna1 = $jmlwarna;
					
					//Jika Cetak 1 Muka saja maka loncat
					if ($jmlwarna2 < 1 or empty($jmlwarna2)) {
						$cetakbb = 1;
						$ketbb = "Cetak Satu Muka";
						$ulangbb = 4;
						$jmlwarna = $jmlwarna1;
						$biayabbplatsama = 0;
						$bb = 1;
						goto loncatbbsatumuka;
					}
					
					if ($ulangbb <= 3) {   //Jika di Cetak Bolak balik Beda Plat
						$cetakbb = 1;
						$jmlwarna = $jmlwarna + $jmlwarna2;
						if ($jenis_mesin == 'PrintDigital') {
							$ketbb = "BB";
							} else {
							$ketbb = "BB Beda Plat";
						}
						$ins_bb = 2;
						$biayabbplatsama = 0;
					} //jika cetak bolak balik plat sama berarti ukuran cetaknya dibagi 2
					
					if ($ulangbb <= 2) {   //Jika di Cetak Bolak balik plat yang sama
						$cetakbb = 2;
						$ins_bb = 2;
						$biayabbplatsama = $item['biayabbplatsama'];
						$jmlwarna = $jmlwarna1;
						if ($kali == "L") { 		//Bolak balik Lebar Cetakan x 2
							$lebarpot = $lebarpot * 2;
							$lebarcetak = $lebarcetak * 2;
							$ketbb = "BB Plat yang Sama x Lebar";
							} elseif ($kali == "P") {	//Bolak balik Tinggi Cetakan x 2
							$tinggipot = $tinggipot * 2;
							$tinggicetak = $tinggicetak * 2;
							$ketbb = "BB Plat yang Sama x Tinggi";
						}
					} //jika cetak bolak balik plat sama berarti ukuran cetaknya dibagi 2
					
					loncatbbsatumuka:
					
					// echo $lebarpot . "x" .$tinggipot ."<br>";
					// echo $z / $tinggipot . "x" .$w ."<br>";
					
					
					while ($z / $lebarpot >= 1) 
					{ // Selama Tinggi Mesin masih muat u/ Lebar Cetakan	// 
						
						while ($z / $tinggipot >= 1) 
						{ //  Selama Tinggi Mesin masih muat u/ Tinggi Cetakan  // y
							
							
							//	 echo "lebarcetak:" . $lebarcetak . "tinggicetak:" . $tinggicetak . "y:" . $y . "x" .$x . "w" .$w . "z" .$z ."<br>";
							
							if ($x * $lebarcetak >= $w) {
								if ($x * $lebarcetak <= $z and $y * $tinggicetak <= $w) {
									goto lanjut;
									} elseif ($x * $lebarcetak <= $w and $y * $tinggicetak <= $z) {
									goto lanjut;
									} else {
									goto loncat;
								}
							}
							
							lanjut:
							
							// echo $x . " x " . $y . " = " . $lebarpot . " x " . $tinggipot . " - " . $NamaMesin . " Muat : " . $x * $y .  "<br>" ;
							//	echo "Muat : " . $y * $x . "<br>";
							
							
							if ($cetak_bagi == 'Y') {
								$muat = $x * $y * $cetakbb;
								} else {
								$muat = 1;
							}
							
							//	echo "muat: " . $muat . " untuk " . $lebarpot . " x ". $tinggipot. "<br>";	
							
							//Jika ukuran cetak lebih kecil dari ukuran minimal mesin loncati
							if ($lebarpot < $lebarmin) {
								goto loncat;
								} elseif ($tinggipot < $tinggimin) {
								goto loncat;
							}
							
							
							$lbrbhan = 0;
							$tgbhan = 0;
							
							
							// print_r($pilihB2[0]['Harga_Bahan']);
							$no =1;
							foreach ($pilihB2 as $row2) {
								
								$hrgbhn = $row2['Harga_Bahan'];
								$tblbhan = $row2['Tebal'];
								$tgbhan = $row2['Tinggi'];
								$lbrbhan = $row2['Lebar'];
								$Nm_Bhn = $row2['Nm_Bhn'];
								
								$lebarpotkertas = $lebarpot + $tarik;
								$tinggipotkertas = $tinggipot + $tarik;
								// echo $hrgbhn . "x" . $tinggipotkertas . " = " . $lebarpot . " x ". $tinggipot. "<br>";	
								
								$hitpot = hitung($lebarpotkertas, $tinggipotkertas, $lbrbhan, $tgbhan);
								if ($cetak_bagi == 'N') {
									
									$jmlpot = 1;
									} else {
									$jmlpot = $hitpot[0]['jml'];
								}
								
								if ($jmlwarna <= 0) {
									$lebarpotkertas = $lbrcetak;
									$tinggipotkertas = $tgcetak;
									$muat = 1;
									$hitpot = hitung($lebarpotkertas, $tinggipotkertas, $lbrbhan, $tgbhan);
									$jmlpot = $hitpot[0]['jml'];
								}
								
								
								
								if (is_null($jmlpot) or $jmlpot < 1) {
									goto akhirbhn;
								}
								
								$jmlset = $set; // * $cetakbb;
								
								
								$jmlcetakreal = ceil(($jmlcetak * $jml_satuan / $muat) * $cetakbb);
								
								$jmlbhn = ceil(($jmlcetak * $jml_satuan) / $muat);
								
								
								if ($jenis_mesin == 'PrintDigital') {
									$jmldrek = 0;
									} else {
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
								if (is_null($totdrek)) {
									$totdrek = 0;
								}
								
								if ($laminat == '') {
									$totlaminating = 0;
									$hrgminlam = 0;
									$hrglebihlam = 0;
									} else {
									//$biayalam = $lbrcetak * $tgcetak * $jmlcetakreal * $hrglebihlam * $jmlam;
									$biayalam = $lbrcetak * $tgcetak * $jmlcetak * $hrglebihlam * $jmlam * $set;
									if ($biayalam > $hrgminlam) {
										$totlaminating = $biayalam;
										//$ketlam="(percm Rp." . $hrglebihlam . " -" . $kerlambb;}
										} else {
										$totlaminating = $hrgminlam * $jmlset;
										//$ketlam="(Harga Laminating Minim)";}
									}
								}
								
								//diedit pada 20/09/2020
								$ArrayInsheet = ArrayInsheet($s_email);
								// $rinsheet=Insheet($ArrayInsheet['insheet'],$jmlbhn);
								$rinsheet = pilihInsheet($ArrayInsheet['insheet'], $jmlbhn);
								$ins_bb = 1;
								if ($ins_bb == 2) {
									$insheet_ = $jmlbhn * $rinsheet['insheet_bb'] / 100;
									$insheet_ = round($insheet_);
									} else {
									$insheet_ = $jmlbhn * $rinsheet['insheet'] / 100;
									$insheet_ = round($insheet_);
								}
								
								if ($insheet == 0) {
									$insheet_ = 0;
								}
								if ($jenis_mesin == 'PrintDigital') {
									$insheet_ = 0;
								}
								// echo $jmlbhn;
								// echo "<br/>";
								$jmlrealcetak =  $jmlbhn + $insheet_;
								// echo $jmlrealcetak;
								//replat
								if ($jmlrealcetak > $replatsetiap and $replatsetiap > 1) {
									$replat = ceil($jmlrealcetak / $replatsetiap);
									} else {
									$replat = 1;
								}
								if ($jenis_mesin == 'PrintDigital') {
									$replat = 1;
								}
								
								if ($jenis_mesin == 'PrintDigital') {
									$hitpotm = hitung($lbrcetak, $tgcetak, $lebartext, $tinggitext);
									if ($cetak_bagi == 'N') {
										$jmlpot = 1;
										$jmlpot2 = 1;
										} else {
										$jmlpot = $hitpotm[0]['jml'];
										$hitpotm2 = hitung($lebartext, $tinggitext, $lbrbhan, $tgbhan);
										if ($hitpotm2[0]['jml'] == 0) {
											$jmlpot2 = 1;
											} else {
											$jmlpot2 = $hitpotm2[0]['jml'];
										}
									}
									
									
									
									
									$jmlprint = ceil(($jmlcetak * $set * $jml_satuan) / $jmlpot);
									$ArrayPrint = ArrayPrint($s_email);
									$row = pilihPrint($ArrayPrint['hargaprint'], $jmlprint, $mesin); //diedit pada 21/09/2020
									// print_r($row);
									// echo $row['harga'];
									// $sql = mysql_query("select * from harga_print where kdmesin='$mesin' AND '$jmlprint' between jml_min and jml_max");
									// $row=mysql_fetch_array($sql);  // mesin yg di ceklis
									$harga_print = $row['harga'];
									$harga_laminating = $row['harga_laminating'];
									// echo $harga_print."<br/>";
									$jmlminim = $row['jml_min'] . " s/d " . $row['jml_max'];
									// echo $row['jml_max']."<br/>";
									if (is_null($harga_print)) {
										if ($jmlprint > $jmlminim) {
											$harga_print = $hargadrek;
											} else {
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
									
									if ($laminat == '') {
										$totlaminating = 0;
										$hrgminlam = 0;
										$hrglebihlam = 0;
										} else {
										if ($totlaminating < $hrgminlam) {
											$totlaminating = $hrgminlam;
										}
										//$ketlam="(Harga Laminating Minim)";}
										else {
											$totlaminating = $hrgminlam;
										}
										//$ketlam="(percm Rp." . $hrglebihlam . " -" . $kerlambb;}
										
										if ($lam == '3' or $lam == '4' or $lam == '5' or $lam == '6') {
											if ($totlaminating > $totlaminating2) {
												$totlaminating = $totlaminating2;
											}
											//$ketlam="Harga Lam Rp." . $harga_laminating . "/lbr -" . $kerlambb;}	
											//echo $totlaminating2;
										}
									}
									
									$jmlcetakreal = $jmlprint;
									$tgbhan = $tinggitext;
									$lbrbhan = $lebartext;
									$muat = $jmlpot;
									$lebarpot = $lebartext;
									$tinggipot = $tinggitext;;
									$tarik = 0;
									//$lebarpotkertas = '';
									//$tinggipotkertas = '';
									
									
									if ($jmlprint > 50) {
										$ongkos_potong = $hargapotmin;
										} else {
										$ongkos_potong = 0;
									}
									
									$jmlplano = ceil((($jmlbhn + $insheet_) * $set) / $jmlpot2);
									$totbhn = 0;
								} 
								else {
									$totcetak = ceil((($hargaminim * $jmlwarna) + $totdrek + ($biayabbplatsama * $jmlwarna)) * $jmlset);
									$jmlplano = ceil((($jmlbhn + $insheet_) * $set) / $jmlpot);
									$beratkertas = ceil(($lbrbhan * $tgbhan * $tblbhan * $jmlplano) / 10000000);
									$ongkos_potong = ceil($beratkertas * $hargapot);
									if ($hargapotmin > $ongkos_potong) {
										$ongkos_potong = $hargapotmin;
									}
									
									$totbhn = $hrgbhn * $jmlplano;
								}
								
								
								//$jmlplano = round((($jmlbhn * $set) + $insheet) / $jmlpot);
								// echo $NamaMesin . " - " . $jmlbhn . " - plano : " . $jmlplano . "<br>";
								// echo $totcetak;
								
								// echo $no; $jmlplano . "<br>";
								
								
								
								//$tot_cetak = round($totcetak);
								if ($pakeplat == 'N') {
									$tot_ctp = 0;
									} else {
									$tot_ctp = $ctp * $jmlwarna * $jmlset  * $replat;
								}
								$tot_plat = $jmlwarna * $jmlset  * $replat;
								$jml_total = $totcetak + $totbhn + $tot_ctp + $ongkos_potong + $totlaminating;
								
								//$jmlplano = round($jmlplano);
								// echo $insheet_;
								// echo "<br/>";
								$hitpot2 = hitung($lbc, $tgc, $lebarpotkertas, $tinggipotkertas);
								$jmlmuat = $hitpot2[0]['jml'];
								// echo $jmlmuat;
								// echo "<br/>";
								//ongkos_lipat
								if (!empty($ongkos_lipat)) {
									// $sqllipat = mysql_query("select * from tbl_biaya where KdBiaya='52'");
									// $row10=mysql_fetch_array($sqllipat);    
									$row10 = pilihBiaya($ArrayBiaya['biaya'], '52');
									// print_r($row10);
									$hrgfinishing10min  	= $row10['HargaMin'];
									$hrgfinishing10lebih  	= $row10['HargaLebih'];
									$jmlfinishing10min  	= $row10['JumlahMin'];
									$nmfinishing10			= $row10['Nama_Biaya'];
									
									$lipat = ($hrgfinishing10lebih + (($hrgfinishing10lebih / 2) * (($jmlmuat / 2) - 1))) *    $jmlbhn * $set;
									if ($lipat <= $hrgfinishing10min) {
										$tot_lipat = $hrgfinishing10min;
										} else {
										$tot_lipat = $lipat;
									}
									} else {
									$tot_lipat = 0;
								}
								
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
								"jmlset" => $jmlset,
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
								$no++;
								akhirbhn:
							}
							// } // end aktif bahan yyyyyyyyyyyyyy
							loncat:
							
							$y = $y + 1;
							$tinggipot = $tinggicetak * $y;
						} //end while2
						
						$y = 1;
						$tinggipot = $tinggicetak;
						
						$x = $x + 1;
						$lebarpot = $lebarcetak * $x;
					}
					//endwhile1 xxxxxxxxxxxxxxxxxxxxxxxxx
					
					
					$kali = "P";
					$x = 1;
					$y = 1;
					$ulangbb = $ulangbb + 1;
				} // endwhile cetak bb 
				
				bawah:
			
				
			} //end mesin
		}
		
		usort($data, 'sortByOrder');
		// echo json_encode($data);
		return $data;
	} //end fungsi hitbiayacetak		