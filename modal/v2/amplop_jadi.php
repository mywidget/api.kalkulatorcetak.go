<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "orange";
// $level = $_SESSION['leveluser'];
?>
<script>
$(document).ready(function() {
	$('.harga').hide();
	$('.printpenawaran').hide();
	$(".alert").hide();
	$('.btnon, .btnd, .btnp').prop('disabled', true);
	$('#jmlcetakam2').keypress(validateNumber);
	$('#ketamplo_jadi').keyup(function() {
		$('.btnon,.btnd,.btnp').prop('disabled', this.value == "" ? true : false);
	})
});
$('.modal').on('hidden.bs.modal', function() {
	$(this).removeData('bs.modal');
});

</script>
<div class="modal-header" style="background-color:#76bf82;color:#FFF;">
	<button type="button" class="close" id="bu" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title"><?=$row['nama_produk'];?></h4>
</div>
<div class="modal-body" >
<div class="col-md-4" id="ketproduk">
	<div class="row" style="margin-right:5px;margin-left:5px">
		<div class="ket" style="margin:0; padding:5px; line-height: 1.2em;color:#000"><?=$row['keterangan'];?></div>
	</div>
</div>
<div class="col-md-8">
      <div class="col-md-12">
         <div class="alert"></div>
      </div>
      <div class="col-md-12">
         <div class="col-md-12">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Jumlah Cetak</span>
                  <input type="text" class="form-control" aria-label="" id="jmlcetakam2" autofocus>
                  <span class="input-group-addon">box (Isi 100lbr)</span>
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Bahan & Ukuran</span>
                  <?php $sql_bhn = mysql_query("SELECT 
                     `kategori_bahan`.`id_kategori`,
                     `tbl_bahan`.`Tinggi`,
                     `tbl_bahan`.`Tinggi`,
                     `tbl_bahan`.`Lebar`,
                     `tbl_bahan`.`Kd_Bhn`,
                     `tbl_bahan`.`Nm_Bhn`
                     FROM
                     `kategori_bahan`
                     INNER JOIN `tbl_bahan` ON (`kategori_bahan`.`id_kategori` = `tbl_bahan`.`id_kategori`)
                     where modul like '%amplo_jadi%' AND pub='Y' ORDER BY id_kategori"); ?>
                  <select id="bahanam2"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required" onchange="cariukuranbahanamplop()">
                     <?php while($row=mysql_fetch_array($sql_bhn)){ ?>
                     <option value="<?=$row['id_kategori'];?>"><?=$row['Nm_Bhn'];?></option>
                     <?php } ?>
                  </select>
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Lebar</span>
                  <input type="text" class="form-control" aria-label="" id="lbrcetakam2" readonly='readonly'>
                  <span class="input-group-addon">Tinggi</span>
                  <input type="text" class="form-control" aria-label="" id="tgcetakam2" readonly='readonly'>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Jumlah Warna</span>
                  <input type="text" class="form-control" aria-label="" id="jmlwarnaam2" value="4">
				</div>
            </div>
         </div>

         <div class="col-md-4">
            <div class="input-group ">
               <span class="input-group-addon">
               <input type="checkbox" id="finishing1am2">
               </span>
               <Label class="form-control" >Poly</label>											 
            </div>
            <!-- /input-group -->
         </div>
         <div class="col-md-8">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Lebar</span>
                  <input type="text" class="form-control" aria-label="" id="lbrpolyam2" value="1">
                  <span class="input-group-addon">Tinggi</span>
                  <input type="text" class="form-control" aria-label="" id="tgpolyam2" value="1">
               </div>
            </div>
         </div>
         <div class="col-md-8">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Keterangan</span>
                  <input type="text" class="form-control" aria-label="" id="ketamplo_jadi"  placeholder="Isi dulu keterangannya">
               </div>
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group" >
               <button type="submit" class="btn btn-warning btnon" onclick="cekukuranam2(1)">Hitung</button>
            </div>
         </div>
         <div class="col-md-12">
            <div class="progress progress-striped active" style="height:5px;">
               <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;height:5px;">
               </div>
            </div>
         </div>
         <div class="col-md-6 harga">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Harga Satuan</span>
                  <input type="text" class="form-control" aria-label="" id="satuan<?=$modul;?>"  value="">
               </div>
            </div>
         </div>
         <div class="col-md-6 harga">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Harga PerBox</span>
                  <input type="text" class="form-control" aria-label="" id="hargarim<?=$modul;?>"  value="">
               </div>
            </div>
         </div>
         <div class="col-md-4 harga">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Profit
                  </span>
                  <input type="text" class="form-control" aria-label="" id="profits<?=$modul;?>"  value="0">
                  <span class="input-group-addon">%
                  </span>
               </div>
            </div>
         </div>
         <div class="col-md-4 harga">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Total Jual</span>
                  <input type="text" class="form-control" aria-label="" id="total<?=$modul;?>"  value="">
                  <input type="hidden" id="totdumy<?=$modul;?>">
                  <input type="hidden" id="data<?=$modul;?>">
               </div>
            </div>
         </div>
         <div class="col-md-4 harga">
            <div class="form-group">
               <button type="button" class="btn btn-info simpan" onclick="simpan('<?=$modul;?>')" >Simpan</button>
               <button type="button" class="btn btn-primary printpenawaran"><i class="fa fa-external-link" aria-hidden="true"></i></button>	
            </div>
         </div>
         <div class="col-md-12">
            <form action='detail-hitung/' method='post' target='_blank'>
               <input type="hidden" id="token" name="token" value="<?=$ssid;?>">
               <input type="hidden" id="user"  value="<?=$_SESSION['mailuser'];?>">	
               <input type="hidden" id="modul">
               <div id="tableamp2"></div>
            </form>
         </div>
      </div>
   </div>
</div>
<script>
$(document).ready(function() {
	$('#lbrcetakam2').val('23');
	$('#tgcetakam2').val('11');
	$('#am2').click(function() {
		if ($('#detailamp2').length) {
			$('#detailamp2').remove();
		}
	});
})
$("#profits" + modulhit).keyup(function() {
	profit = $('#profits' + modulhit).val();
	tot = angka($('#totdumy' + modulhit).val());
	jual = parseFloat(profit * tot / 100) + parseInt(tot);
	satuan = jual / $('#jmlcetakam2').val() / 100;
	perrim = satuan * 100;
	$('#satuan' + modulhit).val(formatMoney(satuan));
	$('#hargarim' + modulhit).val(formatMoney(perrim));
	$('#total' + modulhit).val(formatMoney(jual));
})

function hitungam2(x) {
	$('.btnd, .btnp').prop('disabled', this.value == "" ? true : false);
	var lbrcetak = document.getElementById("lbrcetakam2").value;
	var tgcetak = document.getElementById("tgcetakam2").value;
	var jmlwarna = document.getElementById("jmlwarnaam2").value;

	var tarikan = 1;
	var lam = 0;
	var jmlset = 1;
	var lbrf1 = 1;
	var tgf1 = 1;
	var lbrf2 = 1;
	var tgf2 = 1;
	var lbrf3 = 1;
	var tgf3 = 1; //Ukuran pisau Pond
	var lbrf4 = 1;
	var tgf4 = 1;
	var lbrf5 = 1;
	var tgf5 = 1;
	var lbrf6 = 1;
	var tgf6 = 1;
	var finishing6 = '0';
	var finishing1 = '0';
	var finishing2 = '0';
	var finishing3 = '0'; // Pisau Pon
	var finishing4 = '0'; //Biaya Pon
	var finishing5 = '0'; //Biaya Lem
	var jml_satuan = 100;
	var bahan = document.getElementById("bahanam2").value;
	var jmlcetak = document.getElementById("jmlcetakam2").value;
	var bb = "";
	if (document.getElementById("finishing1am2").checked == true) { //Poly
		lbrpolykop = document.getElementById("lbrpolyam2").value;
		tgpolykop = document.getElementById("tgpolyam2").value;
		finishing2 = '10'; //Press Poly
		lbrf2 = lbrpolykop;
		tgf2 = tgpolykop;
		finishing1 = '11'; //Plat Poly
		lbrf1 = lbrpolykop / (jmlcetak * jml_satuan);
		tgf1 = tgpolykop;
	}
	var cetak_bagi = 'N';
	var jml_satuan = 100;
	var modul = 'amplo_jadi';
	var insheet = "1";
	var ket = document.getElementById("ketamplo_jadi").value;
	var ket_satuan = "box";
	var rim = 500;
	var box = 100;
	var ongpot = 'N';
	if (jmlcetak != null && jmlcetak < 1) {
		alert("Jumlah Cetakan Kosong!!");
		return;
	}
	if (lbrcetak != null && lbrcetak < 1) {
		alert(" Lebar Cetakan Kosong!!");
		return;
	}
	if (tgcetak != null && tgcetak < 1) {
		alert("Tinggi Cetakan Kosong!!");
		return;
	}
	//alert(lbrcetak);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.addEventListener("progress", function(evt) {
		if (evt.lengthComputable) {
			var percentComplete = (evt.loaded / evt.total) * 100;
			$('.progress').show();
			$('#tableamp2').hide();
			$("div.progress > div.progress-bar").css({
				"width": percentComplete + "%"
			});
			if (percentComplete) {
				setTimeout(function() {
					$(".progress-bar").css('background', 'green');
					$('#tableamp2').show();
				}, 500);
			}
		}
	}, false);
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			myArr = JSON.parse(xmlhttp.responseText);
			data = myArr;
			// jika marketing jangan tampilkan ini
			level = '<?=$level;?>';
			if( level == 'admin' || level == 'member' ){
				if ($('#tablam2').length) {
					$('#tablam2 tr:gt(0)').remove();
					var table = $('#tablam2').children();
					var i;
					var no = 1;
					var i;
					var no = 1;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						if (data[i]['ongpot'] == 'Y') {
							ongkos_potong = data[i]['ongkos_potong'];
						}
						totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
						profit = data[i]['persen'];
						jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
						satuan = jual / jmlcetak / jml_satuan;
						perrim = satuan * box;
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/box <button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
					}
					table.append(x);
				} else {
					$('#tableamp2').append("<div id='detailamp2' class='small'><table id='tablam2' class='table table-striped table-responsive' ><thead ><tr style='background-color:<?=$warnabar;?>;color:white' ><th  class='text-left' style='width:30%'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");
					var table = $('#tablam2').children();
					var i;
					var no = 1;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						if (data[i]['ongpot'] == 'Y') {
							ongkos_potong = data[i]['ongkos_potong'];
						}
						totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
						profit = data[i]['persen'];
						jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
						satuan = jual / jmlcetak / jml_satuan;
						perrim = satuan * box;
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/box <button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
					}
					table.append(x);
				}
			} else {
				var ongkos_potong = 0;
				if (data[0]['ongpot'] == 'Y') {
					ongkos_potong = data[0]['ongkos_potong'];
				}
				total = parseInt(data[0]['totcetak']) + parseInt(data[0]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[0]['tot_ctp']) + parseInt(data[0]['totlaminating']) + parseInt(data[0]['finishing1']) + parseInt(data[0]['finishing2']) + parseInt(data[0]['finishing3']) + parseInt(data[0]['finishing4']) + parseInt(data[0]['finishing5']) + parseInt(data[0]['finishing6']);
				var arrStr = btoa(encodeURIComponent(JSON.stringify(data[0])));
				$('.harga').show();
				profit = data[0]['persen'];
				jual = (parseInt(total) * profit / 100) + parseInt(total);
				satuan = jual / jmlcetak / jml_satuan;
				perrim = satuan * box;
				$('#satuan' + modulhit).val(formatMoney(satuan));
				$('#hargarim' + modulhit).val(formatMoney(perrim));
				$('#total' + modulhit).val(formatMoney(jual));
				$('#totdumy' + modulhit).val(formatMoney(jual));
				$('#data' + modulhit).val(arrStr);
				$('#modul').val(modul);
			}
		}
	}
	isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=0"  + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot;
	isi = btoa(isi); //encode			
	xmlhttp.open("GET", "wadah.php?isi=" + isi, true);
	xmlhttp.send();
}

function hidedetail() {
	$('#tableamp2').hide();
}

function cariukuranam2() {
	var ukuran = document.getElementById("ukuranam").value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			myArr = JSON.parse(xmlhttp.responseText);
			document.getElementById("lbrcetakam").value = myArr[0];
			document.getElementById("tgcetakam").value = myArr[1];
			//alert(myArr[0].toString());
		}
	}
	xmlhttp.open("GET", "function/cariukuran.php?ukuran=" + ukuran, true);
	xmlhttp.send();
}

function cekukuranam2(x) {
	$(".progress-bar").css('background', 'red');
	$(".progress-bar").css('width', '1%');
	$('.simpan').prop('disabled', this.value == "" ? true : false);
	$('.simpan').html('Simpan');
	$("#profits" + modulhit).val('0');
	var lbrcetak = document.getElementById("lbrcetakam2").value;
	var tgcetak = document.getElementById("tgcetakam2").value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			myArr = JSON.parse(xmlhttp.responseText);
			if (myArr[0].toString() == 'N') {
				alert('Ukuran Kebesaran');
				document.getElementById("tgcetakam2").value = 11;
				document.getElementById("lbrcetakam2").value = 23;
				return;
			} else {
				hitungam2(x)
			}
		}
	}
	xmlhttp.open("GET", "function/cekukuran.php?lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak, true);
	xmlhttp.send();
}

function cariukuranbahanamplop() {
	var ukuran = document.getElementById("bahanam2").value;
	//	alert(ukuran);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			myArr = JSON.parse(xmlhttp.responseText);
			document.getElementById("tgcetakam2").value = myArr[0];
			document.getElementById("lbrcetakam2").value = myArr[1];
		}
	}
	xmlhttp.open("GET", "function/cariukuranbahan.php?ukuran=" + ukuran, true);
	xmlhttp.send();
}
$('.printpenawaran').click(function() {
	var value = $("#token").val();
	var urlencode = btoa(value);
	window.open('/penawaran-harga/' + urlencode, '_blank');
});
var currentBoxNumber = 0;
$(".form-control").keyup(function(event) {
	if (event.keyCode == 13) {
		textboxes = $("input.form-control");
		currentBoxNumber = textboxes.index(this);
		console.log(textboxes.index(this));
		if (textboxes[currentBoxNumber + 1] != null) {
			nextBox = textboxes[currentBoxNumber + 1];
			nextBox.focus();
			nextBox.select();
			event.preventDefault();
			return false;
		}
	}
});
</script>    

<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>