<?php
if (empty($_SESSION['mailuser'])){
echo json_encode(array(404 => "error"));
}else{

if (($referer==$host OR $referer==$host.'index.php') ) {
$warnabar = "#a89726";
?>
<script>
$(document).ready(function() {
	$('.printpenawaran').hide();
	$(".alert").hide();
	$('.progress').hide();
	$('.btnon, .btnd, .btnp').prop('disabled', true);
	$('#jmlcetakam').keypress(validateNumber);
	$('.harga').hide();
	$('#ketamplop').keyup(function() {
		$('.btnon').prop('disabled', this.value == "" ? true : false);
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
         <div class="col-md-6">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Jumlah Cetak</span>
                  <input type="text" class="form-control" aria-label="" id="jmlcetakam" autofocus>
                  <span class="input-group-addon">box (Isi 100lbr)</span>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Lebar</span>
                  <input type="text" class="form-control" aria-label="" id="lbrcetakam">
                  <span class="input-group-addon">Tinggi</span>
                  <input type="text" class="form-control" aria-label="" id="tgcetakam" onchange="cekukuranam()">
               </div>
            </div>
		</div>
         <div class="col-md-6">
         		 <!-- Tarikan -->
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Kertas</span>
                  <?php $sql_bhn = mysql_query("SELECT * FROM kategori_bahan where pub='Y' ORDER BY id_kategori"); ?>
                  <select id="bahanam"  class="chosen-select form-control" data-style="btn-info" data-size="auto" data-placeholder='Pilih Bahan' required="required">
                     <?php while($row=mysql_fetch_array($sql_bhn)){ ?>
                     <option value="<?=$row['id_kategori'];?>"><?=$row['nama_kategori'];?></option>
                     <?php } ?>
                  </select>
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Jumlah Warna</span>
                  <input type="text" class="form-control" aria-label="" id="jmlwarnaam" value="4">
               </div>
            </div>
         </div>

         <div class="col-md-4">
            <div class="form-group">
               <select id="lamam" class="selectpicker form-control" data-style="btn-warning">
                  <option value="0" selected>Tanpa Laminasi</option>
                  <option value="1">Varnish Satu Muka</option>
                  <option value="2">Varnish Bolak-balik</option>
                  <option value="3">Laminating Glosy Satu Muka</option>
                  <option value="4">Laminating Glosy BB</option>
                  <option value="5">Laminating DOP Satu Muka</option>
                  <option value="6">Laminating DOP BB</option>
               </select>
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <div class="input-group ">
                  <span class="input-group-addon">
                  <input type="checkbox" id="doubletape">
                  </span>
                  <Label class="form-control" style="width:100%" >Tutup Double Tape</label>
               </div>
               <!-- /input-group -->
            </div>
         </div> 
		 <div class="col-md-4">
            <div class="form-group">
               <div class="input-group ">
                  <span class="input-group-addon">
                  <input type="checkbox" id="labelkaca">
                  </span>
                  <Label class="form-control" style="width:100%" >Jendela Mika</label>
               </div>
               <!-- /input-group -->
            </div>
         </div>
         <div class="col-md-4">
            <div class="form-group">
               <div class="input-group ">
                  <span class="input-group-addon">
                  <input type="checkbox" id="finishing1am">
                  </span>
                  <Label class="form-control" >Poly</label>											 
               </div>
               <!-- /input-group -->
            </div>
         </div>
         <div class="col-md-8">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Lebar</span>
                  <input type="text" class="form-control" aria-label="" id="lbrpolyam" value="1">
                  <span class="input-group-addon">Tinggi</span>
                  <input type="text" class="form-control" aria-label="" id="tgpolyam" value="1">
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <div class="input-group">
                  <span class="input-group-addon">Keterangan</span>
                  <input type="text" class="form-control" aria-label="" id="ketamplop"  placeholder="Isi dulu keterangannya">
               </div>
            </div>
         </div>
         <div class="col-md-6">
            <div class="form-group">
               <button  type="submit" class="btn btn-primary btnon" onclick="cekukuranam()">Hitung</button>
               <?php echo cNav($modul);?>
               <button type="button" class="btn btn-primary printpenawaran hint--top-left"  aria-label='Buat Penawaran'><i class="fa fa-external-link" aria-hidden="true"></i></button>
            </div>
         </div>
         <div class="col-md-12">
            <div class="progress progress-striped active" style="height:5px;">
               <div class="progress-bar"  role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;height:5px;">
               </div>
            </div>
         </div>
         <div class="col-md-12">
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
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <form action='detail-hitung/' method='post' target='_blank'>
               <input type="hidden" id="token" name="token" value="<?=$ssid;?>">
               <input type="hidden" id="user"  value="<?=$_SESSION['mailuser'];?>">	
               <input type="hidden" id="modul">
               <div id="tableamp"></div>
            </form>
         </div>
      </div>
   </div>
</div>
<script>

$(document).ready(function() {
	$('#lbrcetakam').val('23');
	$('#tgcetakam').val('11');
	$('#am').click(function() {
		if ($('#detailamp').length) {
			$('#detailamp').remove();
		}
	});
})
$("#profits" + modulhit).keyup(function() {
	profit = $('#profits' + modulhit).val();
	tot = angka($('#totdumy' + modulhit).val());
	jual = parseFloat(profit * tot / 100) + parseInt(tot);
	satuan = jual / $('#jmlcetakam').val() / 100;
	perrim = satuan * 100;
	$('#satuan' + modulhit).val(formatMoney(satuan));
	$('#hargarim' + modulhit).val(formatMoney(perrim));
	$('#total' + modulhit).val(formatMoney(jual));
})

function hitungam() {
	$('.btnd, .btnp').prop('disabled', this.value == "" ? true : false);
	$('.harga').hide();
	var lbr = document.getElementById("lbrcetakam").value;
	var tg = document.getElementById("tgcetakam").value;
	var lem = '1.5';
	var lidah = '1.5';
	//Tentukan Ukuran Amplop
	lbrcetak = parseFloat(lbr) + (2 * parseFloat(lem));
	tgcetak = (2 * parseFloat(tg)) + parseFloat(lidah);
	var bb = "";
	var jmlwarna = document.getElementById("jmlwarnaam").value;
	if (jmlwarna == 'Full Color') {
		jmlwarna = 4;
	}
	var bahan = document.getElementById("bahanam").value;
	var jmlcetak = document.getElementById("jmlcetakam").value;
	var lam = document.getElementById("lamam").value;
	var jmlset = 1;
	var lbrf1 = 1;
	var tgf1 = 1;
	var lbrf2 = 1;
	var tgf2 = 1;
	var lbrf3 = lbrcetak / (jmlcetak * jml_satuan);
	var tgf3 = tgcetak; //Ukuran pisau Pond
	var lbrf4 = 1;
	var tgf4 = 1;
	var lbrf5 = 1;
	var tgf5 = 1;
	var lbrf6 = 1;
	var tgf6 = 1;
	var finishing6 = '0';
	var finishing1 = '0';
	var finishing2 = '0';
	var finishing3 = '13'; // Pisau Pon
	var finishing4 = '12'; //Biaya Pon
	var finishing5 = '50'; //Biaya Lem
	var cetak_bagi = 'Y';
	var jml_satuan = 100;
	var modul = 'amplop';
	var insheet = "1";
	var ket = document.getElementById("ketamplop").value;
	var ket_satuan = "box";
	var rim = 500;
	var box = 100;
	var ongpot = 'Y';
	if (document.getElementById("finishing1am").checked == true) { //Poly
		lbrpolykop = document.getElementById("lbrpolyam").value;
		tgpolykop = document.getElementById("tgpolyam").value;
		finishing2 = '10'; //Press Poly
		lbrf2 = lbrpolykop;
		tgf2 = tgpolykop;
		finishing1 = '11'; //Plat Poly
		lbrf1 = lbrpolykop / jmlcetak;
		tgf1 = tgpolykop;
	}
	if (document.getElementById("doubletape").checked == true) { //Label
		finishing5 = '1';
	}
	if (document.getElementById("labelkaca").checked == true) { //Label
		finishing6 = '2';
	}
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
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			myArr = JSON.parse(xmlhttp.responseText);
			data = myArr;
			// jika marketing jangan tampilkan ini
			level = '<?=$level;?>';
			if( level == 'admin' || level == 'member' ){
				if ($('#tablam').length) {
					$('#tablam tr:gt(0)').remove();
					var table = $('#tablam').children();
					var i;
					var no = 1;
					var x;
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
						x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/box <button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm' style='background-color:#a89726;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
					}
					table.append(x);
				} else {
					$('#tableamp').append("<div id='detailamp' class='small'><table id='tablam' class='table table-striped table-responsive' ><thead ><tr style='background-color:#a89726;color:white' ><th  class='text-left' style='width:30%'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");
					var table = $('#tablam').children();
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
						x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/box <button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm' style='background-color:#a89726;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
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
				profit = data[0]['persen'];
				jual = (parseInt(total) * profit / 100) + parseInt(total);
				satuan = jual / jmlcetak / jml_satuan;
				perrim = satuan * box;
				$('.harga').show();
				$('#satuan' + modulhit).val(formatMoney(satuan));
				$('#hargarim' + modulhit).val(formatMoney(perrim));
				$('#total' + modulhit).val(formatMoney(jual));
				$('#totdumy' + modulhit).val(formatMoney(jual));
				$('#data' + modulhit).val(arrStr);
				$('#modul').val(modul);
			}
		}
	}
	isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna +"&jmlwarna2=0" + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot;
	isi = btoa(isi); //encode			
	xmlhttp.open("GET", "wadah.php?isi=" + isi, true);
	xmlhttp.send();
}

function cekukuranam() {
	$(".progress-bar").css('background', 'red');
	$(".progress-bar").css('width', '1%');
	$('.simpan').prop('disabled', this.value == "" ? true : false);
	$('.simpan').html('Simpan');
	$("#profits" + modulhit).val('0');
	var lbr = document.getElementById("lbrcetakam").value;
	var tg = document.getElementById("tgcetakam").value;
	var lem = '1.5';
	var lidah = '1.5';
	//Tentukan Ukuran Amplop
	lbrcetak = parseFloat(lbr) + (2 * parseFloat(lem));
	tgcetak = (2 * parseFloat(tg)) + parseFloat(lidah);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.addEventListener("progress", function(evt) {
		if (evt.lengthComputable) {
			var percentComplete = (evt.loaded / evt.total) * 100;
			$('.progress').show();
			$('#tableamp').hide();
			$("div.progress > div.progress-bar").css({
				"width": percentComplete + "%"
			});
			if (percentComplete) {
				setTimeout(function() {
					$('#tableamp').show();
					$(".progress-bar").css('background', 'green');
				}, 500);
			}
		}
	}, false);
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			myArr = JSON.parse(xmlhttp.responseText);
			if (myArr[0].toString() == 'N') {
				alert('Ukuran Kebesaran');
				document.getElementById("tgcetakam").value = 0;
				document.getElementById("lbrcetakam").value = 0;
				return;
			} else {
				hitungam()
			}
		}
	}
	xmlhttp.open("GET", "function/cekukuran.php?lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak, true);
	xmlhttp.send();
}
	$('.printpenawaran').click(function() {
		var value = $("#token").val();
		var urlencode = btoa(value);
		window.open('/penawaran-harga/' + urlencode, '_blank');
	});
var currentBoxNumber = 0;
$(".form-control").keyup(function (event) {
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
<style>th{font-weight:bold;text-align:center}.table > thead > tr > th{vertical-align:middle}</style>
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>