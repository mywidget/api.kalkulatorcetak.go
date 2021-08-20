<?php
//error_reporting(0);
//Deteksi hanya bisa diinclude, tidak bisa langsung dibuka (direct open)
if (count(get_included_files()) == 1) {
	echo "<meta http-equiv='refresh' content='0; url=http://$_SERVER[HTTP_HOST]'>";
	exit("Direct access not permitted.");
}
function hitungbahan($lbrcetak, $tgcetak, $jmlcetak, $bahan, $s_email)
{

	$ArrayKertas = ArrayKertas($s_email);
	$rowjenis = pilihBahan($ArrayKertas, $bahan); // pilih bahan
	$data = array(); //menampung data hasil ke array

	$jenis_bahan  = $rowjenis['nama_kategori'];

	// Cari Ukuran Kertas

	$ArrayBahan = ArrayBahanDua($s_email);
	$jbahan = json_decode($ArrayBahan);
	foreach ($jbahan->bahan as $row2) {
		if ($row2->id_kategori == $bahan and $row2->publish == 'Y' and $row2->Harga_Bahan > 0) {
			$Nm_Bhn = $row2->Nm_Bhn;
			$hrgbhn = $row2->Harga_Bahan;
			$tblbhan = $row2->Tebal;
			$tgbhan = $row2->Tinggi;
			$lbrbhan = $row2->Lebar;


			$lebarpotkertas = $lbrcetak;
			$tinggipotkertas = $tgcetak;


			$muat = 1;
			$hitpot = hitung($lebarpotkertas, $tinggipotkertas, $lbrbhan, $tgbhan);
			$jmlpot = $hitpot[0]['jml'];



			if (is_null($jmlpot) or $jmlpot < 1) {
				goto akhirb;
			}

			//										


			$jmlplano = ceil($jmlcetak / $jmlpot);
			$beratkertas = ceil(($lbrbhan * $tgbhan * $tblbhan * $jmlplano) / 10000000);
			$totbhn = $hrgbhn * $jmlplano;

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
				"mesin" => 0,
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
	}
	// while bahan yyyyyyyyyyyyyy
	usort($data, 'sortByOrder');
	return $data;
}

function sortByOrder($a, $b)
{
	return $a['jml_total'] - $b['jml_total'];
}