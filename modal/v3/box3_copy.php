<?php
if (!empty($_POST['link'])) {
	$warnabar = "#a07a51";
?>
	<div class="modal-header" style="background-color:<?= $warnabar; ?>;color:white;">
		<h4 class="modal-title text-white">Cetak <?= $_POST['namamod']; ?></h4>
		<button type="button" class="close" id="bx3" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div id="printThis" class="modal-body p-2">
		<div class="form-row">
			<div class="form-group has-success jml col-md-12">
				<div class="input-group">
					<span class="input-group-text">Jumlah Cetak</span>
					<input type="text" class="form-control" aria-label="" id="jmlcetakbox3" value="500" autofocus>
					<span class="input-group-text">pcs</span>
					<span class="input-group-text">&nbsp;&nbsp;</span>
				</div>
			</div>

		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" id="lbrcetakbox3" placeholder="0">
					<span class="input-group-text">Panjang</span>
					<input type="text" class="form-control" id="pjcetakbox3" placeholder="0">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" id="tgcetakbox3" placeholder="0">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-7">
				<div class="input-group">
					<span class="input-group-text">Jumlah Warna</span>
					<input type="text" class="form-control" id="jmlwarnabox31" value="4">
					<span class="input-group-text">/</span>
					<input type="text" class="form-control" id="jmlwarnabox32" value="0">
				</div>
			</div>

			<div class="form-group col-md-5">
				<div class="input-group">
					<span class="input-group-text">Lebar Tutup</span>
					<input type="text" class="form-control" id="lbrtutupbox3" placeholder="Lebar">
				</div>
			</div>
		</div>
		<!-- Tarikan -->
		<div class="form-row">
			<div class="col-md-12">
				<div class="form-group has-danger idmesin">
					<div class="input-group">
						<span class="input-group-text">Mesin</span>
						<select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
						</select>
					</div>
				</div>

			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6 has-danger bahan<?= $mod; ?>">
				<div class="input-group">
					<span class="input-group-text " id="not4">Bahan</span>
					<select name="bahan<?= $mod; ?>" id="bahan<?= $mod; ?>" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-6 has-danger idkertas">
				<div class="input-group">
					<span class="input-group-text ">Uk.plano</span>
					<select id="idkertas" name="idkertas" class="custom-select form-control">
						<option value="0">- Pilih ukuran -</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<select id="lambox3" class="custom-select form-control" data-style="btn-warning">
					<option value="0" selected>Tanpa Laminasi</option>
					<option value="1">Varnish </option>
					<option value="3">Laminating Glosy </option>
					<option value="5">Laminating DOP </option>
				</select>
			</div>
			<div class="form-group col-md-5">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing4box3">
					</span>
					<label class="form-control">SpotUV</label>
				</div><!-- /input-group -->

			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing1box3">
					</span>
					<label class="form-control">Poly</label>
				</div><!-- /input-group -->
			</div>
			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" aria-label="" id="lbrpolybox3" value="1" readonly>
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" aria-label="" id="tgpolybox3" value="1" readonly>
					<span class="input-group-text">cm</span>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-4">
				<div class="form-group">
					<div class="input-group ">
						<span class="input-group-text">
							<input type="checkbox" id="pond<?= $mod; ?>">
						</span>
						<label class="form-control">Pond Mika</label>
					</div><!-- /input-group -->
				</div>
			</div>

			<div class="col-md-8">
				<div class="form-group">
					<div class="input-group">
						<span class="input-group-text">Lebar</span>
						<input type="text" class="form-control" aria-label="" id="lbrpond<?= $mod; ?>" value="0" readonly>
						<span class="input-group-text">Tinggi</span>
						<input type="text" class="form-control" aria-label="" id="tgpond<?= $mod; ?>" value="0" readonly>
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Keterangan</span>
					<input type="text" class="form-control" aria-label="" id="ketbox3" placeholder="Isi dulu keterangannya">
				</div>
			</div>
			<div class="form-group col-md-4">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-warning btnon hint--top-left" aria-label='Hitung' id="cekukuranbox3">Hitung</button>
					<?php echo cNav('box3'); ?>
				</div>

			</div>
		</div>
		<!--progress-->
		<div class="form-row mt-2">
			<div class="form-group col-md-12">
				<div class="w3-light-grey">
					<div id="myBar" class="w3-deep-orange" style="height:5px;width:0"></div>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-12">
				<form action="detail-hitung/" method="post" target="_blank">
					<input type="hidden" id="bbbox3" value="1">
					<input type="hidden" id="token" name="token">
					<input type="hidden" id="user" name="user">
					<input type="hidden" id="modul" name="modul">
					<div id="tablebox3"></div>
				</form>
			</div>
		</div>
	</div>
	<div id="customstyle"></div>
	<script>
	CustomStyle();
		$("#finishing1" + mod).click(function() {
			var checked = $(this).is(':checked');
			if (checked) {
				$('#lbrpoly' + mod).removeAttr("readonly");
				$('#tgpoly' + mod).removeAttr("readonly");
			} else {
				$('#lbrpoly' + mod).attr("readonly", true);
				$('#tgpoly' + mod).attr("readonly", true);
				$('#lbrpoly' + mod).val(1);
				$('#tgpoly' + mod).val(1);
			}
		});
		$("#pond" + mod).click(function() {
			var checked = $(this).is(':checked');
			if (checked) {
				$('#lbrpond' + mod).removeAttr("readonly");
				$('#tgpond' + mod).removeAttr("readonly");
			} else {
				$('#lbrpond' + mod).attr("readonly", true);
				$('#tgpond' + mod).attr("readonly", true);
				$('#lbrpond' + mod).val(0);
				$('#tgpond' + mod).val(0);
			}
		});
		$("#bahanbox3").filter(function() {
			$('select[data-source]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih kertas</option>');
				$.ajax({
					url: $select.attr('data-source'),
				}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahan" + mod).change(function() {
			var deptid = $(this).val();
			$.ajax({
				url: host + "/kertas/",
				type: "post",
				data: {
					depart: deptid,
					app_id: app_id
				},
				dataType: "json",
				success: function(response) {
					var len = response.length;
					$("#idkertas").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]["id"];
						var name = response[i]["name"];
						$("#idkertas").append("<option value='" + id + "'>" + name + "</option>");
					}
				},
			});
		});
		$("#idmesin").filter(function() {
			$('select[data-mesin]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih mesin</option>');
				$.ajax({
					url: $select.attr('data-mesin'),
				}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});

		$(document).ready(function() {
			$('.harga').hide();
			$('.printpenawaran').hide();
			$(".alert").hide();
			$('.btnon, .btnd, .btnp').prop('disabled', true);
			$('#jmlcetakbox3').keypress(validateNumber);


			$('#ketbox3').keyup(function() {
				$('.btnon').prop('disabled', this.value == "" ? true : false);

			})

		});


		function move() {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);

			function frame() {
				if (width >= 100) {
					clearInterval(id);
					$("#tablebox3").show();
					$("#myBar").hide();
				} else {
					width++;
					elem.style.width = width + '%';
					$("#tablebox3").hide();
					$("#myBar").show();
				}
			}
		}

		$(document).ready(function() {
			$('#lbrcetakbox3').val('10');
			$('#tgcetakbox3').val('8');
			$('#pjcetakbox3').val('20');
			$('#bbbox3').val('1');
			$('#lbrtutupbox3').val('1.5');

			$('#bx3').click(function() {
				if ($('#detailbox3').length) {
					$('#detailbox3').remove();
				}
				if ($('#detailkertasbox3').length) {
					$('#detailkertasbox3').remove();
				}

			});


		})
		function hitungbox3() {
			move();
			var lbr = document.getElementById("lbrcetakbox3").value;
			var tg = document.getElementById("tgcetakbox3").value;
			var pj = document.getElementById("pjcetakbox3").value;
			var lebartutup = document.getElementById("lbrtutupbox3").value;
			var lebarlem = 1.5;

			lbrcetak = (2 * parseFloat(lbr)) + (2 * parseFloat(tg)) + parseFloat(lebarlem);
			tgcetak = parseFloat(tg) + parseFloat(pj) + (3 / 4 * parseFloat(tg)) + parseFloat(lebartutup);

			var jmlcetak = document.getElementById("jmlcetakbox3").value;
			var bahan = document.getElementById("bahanbox3").value;
			var bb = document.getElementById("bbbox3").value;
			var jmlwarna = document.getElementById("jmlwarnabox31").value;
			var jmlwarna2 = document.getElementById("jmlwarnabox32").value;
			if (jmlwarna == 'Full Color') {
				jmlwarna = 4;
			}
			if (jmlwarna != null && jmlwarna < 1) {
				alert("Jumlah Warna Minimal 1!!");
				return;
			}
			var lam = document.getElementById("lambox3").value;
			var jmlset = 1;
			var lbrf1 = 1;
			var tgf1 = 1;
			var lbrf2 = 1;
			var tgf2 = 1;
			var lbrf3 = 1;
			var tgf3 = 1;
			var lbrf4 = 1;
			var tgf4 = 1;
			var lbrf5 = 1;
			var tgf5 = 1;
			var lbrf6 = 1;
			var tgf6 = 1;
			var lbrf7 = 0;
			var tgf7 = 0;
			var finishing1 = 0;
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = 0;
			var finishing7 = 0;
			var finishing8 = 0;

			var modul = "box3";
			var insheet = "1";
			var jml_satuan = 1;
			var cetak_bagi = "Y";
			var ket = document.getElementById("ketbox3").value;
			var ket_satuan = "pcs";
			var rim = 500;
			var box = 100;
			var ongpot = 'N';
			var idmesin = $('#idmesin').val();
			var idkertas = $('#idkertas').val();
			var j_mesin = '';
			var kethitung = '';

			//Pond
			lbrf3 = lbrcetak / jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
			tgf3 = tgcetak;
			finishing2 = '12'; //Biaya Pon
			finishing3 = '13'; // Pisau Pon		

			if (document.getElementById("pond" + mod).checked == true) {
				lbrpondoffset = document.getElementById("lbrpond" + mod).value;
				tgpondoffset = document.getElementById("tgpond" + mod).value;
				finishing8 = '12'; //Press pond
				lbrf6 = lbrpondoffset;
				tgf6 = tgpondoffset;
				finishing7 = '13'; //Plat pond
				lbrf7 = lbrpondoffset / jmlcetak;
				tgf7 = tgpondoffset;
			}
			//SpotUV
			if (document.getElementById("finishing4box3").checked == true) {
				finishing4 = '19';
				lbrf4 = lbrcetak;
				tgf4 = tgcetak;
			}

			if (document.getElementById("finishing1box3").checked == true) { //Poly
				lbrpolykop = document.getElementById("lbrpolybox3").value;
				tgpolykop = document.getElementById("tgpolybox3").value;
				finishing5 = '10'; //Press Poly
				lbrf5 = lbrpolykop;
				tgf5 = tgpolykop;
				finishing1 = '11'; //Plat Poly
				lbrf1 = lbrpolykop / jmlcetak;
				tgf1 = tgpolykop;

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

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);

					data = myArr;
					if ($('#tablbox3').length) {
						$('#tablbox3 tr:gt(0)').remove();
						var table = $('#tablbox3').children();
						var i;
						var no = 1;
						var x;
						var ongkos_potong = 0;
						for (i = 0; i < data.length; i++) {

							if (data[i]['ongpot'] == 'Y') {
								ongkos_potong = data[i]['ongkos_potong'];
							}
							totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + +parseInt(data[i]['finishing8']);

							profit = data[i]['persen'];
							jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
							satuan = jual / jmlcetak / jml_satuan;
							if(jmlcetak >= rim){
							perrim = satuan * rim;
							perrim = "Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim";
							}else{
							perrim = satuan;
							perrim = "Rp. " + formatMoney(satuan) + "/pcs";
							}

							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));

							x += "<tr class='text-md-left'><td>" + data[i]['mesin'] + "</td><td class='text-md-right' >"+perrim+ "<button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm' style='background-color:<?= $warnabar; ?>;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";

						}
						table.append(x);
					} else {
						$('#tablebox3').append("<div id='detailbox3' class='small'><table id='tablbox3' class='table table-striped' ><thead ><tr style='background-color:<?= $warnabar; ?>;color:white' ><th  class='text-md-left' style='width:30%'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");

						var table = $('#tablbox3').children();
						var i;
						var no = 1;
						var ongkos_potong = 0;
						for (i = 0; i < data.length; i++) {

							if (data[i]['ongpot'] == 'Y') {
								ongkos_potong = data[i]['ongkos_potong'];
							}
							totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + +parseInt(data[i]['finishing8']);

							profit = data[i]['persen'];
							jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan * rim;
							if(jmlcetak > rim){
							perrim = satuan * rim;
							perrim = "Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim";
							}else{
							perrim = satuan;
							perrim = "Rp. " + formatMoney(satuan) + "/pcs ";
							}
							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));

							x += "<tr class='text-md-left'><td>" + data[i]['mesin'] + "</td><td class='text-md-right' >"+perrim+ "<button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm' style='background-color:<?= $warnabar; ?>;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
						}

						table.append(x);
					}

				}
			}
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + finishing7 + "&finishing8=" + finishing8 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;

			var url = host + '/sandbox/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
		}

		$("#cekukuranbox3").click(function() {
			var jmlcetak = $('#jmlcetakbox3').val(),
			idmesin = $('#idmesin').val();bahan = $("#bahan"+mod).val();
			lbr = $("#lbrcetakbox3").val();tg  = $("#tgcetakbox3").val();
			pj  = $("#pjcetakbox3").val();lebartutup = $("#lbrtutupbox3").val();
			lebarlem = 1.5;lbrcetak = (2 * parseFloat(lbr)) + (2 * parseFloat(tg)) + parseFloat(lebarlem);
			tgcetak = (2 * parseFloat(tg)) + (2 * parseFloat(lbr)) + parseFloat(lebartutup);
			if (jmlcetak == '' || jmlcetak == 0) {
				salert('warning', 'Oops...', iMsg['J']+' harus diisi');
			} else if (lbr == 0 || lbr == '') {
				salert('warning', 'Oops...', iMsg['L']+' harus diisi');
			} else if (tg == 0 || tg == '') {
				salert('warning', 'Oops...', iMsg['T']+' harus diisi');
			} else if (pj == 0 || pj == '') {
				salert('warning', 'Oops...', iMsg['P']+' harus diisi');
			} else if (idmesin == 0) {
				salert('warning', 'Oops...', iMsg['M']+' harus dipilih');
			} else if (bahan == 0) {
				salert('warning', 'Oops...', iMsg['B']+' harus dipilih');
			} else {
				$.ajax({
					url: host + "/cek/cekukuran/",
					type: 'POST',
					data: {
						mesin: idmesin,
						lbrcetak: lbrcetak,
						tgcetak: tgcetak,
						app_id: app_id
					},
					dataType: 'json',
					success: function(response) {
						if (response[0].toString() == 'N') {
							salert('warning', 'Oops...', 'Ukuran Kebesaran');
						} else {
							move();
							hitungbox3();
						}
					}
				});
			}
		});
	</script>
<?php
} //end token
else {
	echo json_encode(array(404 => "error"));
}
?>