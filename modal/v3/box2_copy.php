<?php
if (!empty($_POST['link'])) {
	$warnabar = "#F4A911";
?>
	<div class="modal-header" style="background-color:<?= $warnabar; ?>;color:black;">
		<h4 class="modal-title text-white align-baseline"><?= filterpost('namamod'); ?></h4>
		<button type="button" class="close" id="bx2" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div id="printThis" class="modal-body p-2">
		<div class="form-row">
			<div class="form-group has-success jml col-md-12">
				<div class="input-group">
					<span class="input-group-text">Jumlah Cetak</span>
					<input type="text" class="form-control" aria-label="" id="jmlcetakbox2" value="500" autofocus>
					<span class="input-group-text">pcs</span>
					<span class="input-group-text">&nbsp;&nbsp;</span>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control input" id="lbrcetakbox2" placeholder="Lebar">
					<span class="input-group-text">Panjang</span>
					<input type="text" class="form-control input" id="pjcetakbox2" placeholder="Panjang">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control input" id="tgcetakbox2" placeholder="Tinggi">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-7">
				<div class="input-group">
					<span class="input-group-text">Jumlah Warna</span>
					<input type="text" class="form-control" id="jmlwarnabox21" value="4">
					<span class="input-group-text">/</span>
					<input type="text" class="form-control" id="jmlwarnabox22" value="0">
				</div>
			</div>
			<div class="form-group col-md-5">
				<div class="input-group">
					<span class="input-group-text">Lebar Tutup</span>
					<input type="text" class="form-control" id="lbrtutupbox2" placeholder="Lebar">
				</div>
			</div>
		</div>
		<!-- Tarikan -->
		<input type="hidden" id="bbbox2" value="1">
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
				<select id="lambox2" class="custom-select form-control" data-style="btn-warning">
					<option value="0" selected>Tanpa Laminasi</option>
					<option value="1">Varnish </option>
					<option value="3">Laminating Glosy </option>
					<option value="5">Laminating DOP </option>
				</select>
			</div>

			<div class="form-group col-md-6">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing4box2">
					</span>
					<Label class="form-control">SpotUV</label>
				</div><!-- /input-group -->

			</div>

		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing1box2">
					</span>
					<Label class="form-control">Poly</label>
				</div><!-- /input-group -->
			</div>
			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" aria-label="" id="lbrpolybox2" value="1" readonly>
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" aria-label="" id="tgpolybox2" value="1" readonly>
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
						<Label class="form-control">Pond Mika</label>
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
		<!--harga-->
		<div class="form-row">
			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Keterangan</span>
					<input type="text" class="form-control" aria-label="" id="ketbox2" placeholder="Isi dulu keterangannya">
				</div>
			</div>

			<div class="form-group col-md-3">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-warning btnon" id="cekukuranbox2">Hitung</button>
					<?php echo cNav('box2'); ?>
				</div>
			</div>

		</div>
		<div class="form-row">
			<div class="col-md-12 mt-2">
				<div class="w3-light-grey">
					<div id="myBar" class="w3-green" style="height:5px;width:0"></div>
				</div>
			</div>
		</div>
		<div class="form-row text-center">
			<div class="col-xl-12">
				<form action="/data/detail-hitung/" method="post" target="_blank">
					<input type="hidden" id="token" name="token">
					<input type="hidden" id="user" name="user">
					<input type="hidden" id="modul" name="modul">
					<div id="tablebox2"></div>
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

		$("#bahanbox2").filter(function() {
			$('select[data-source]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih jenis</option>');
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

		$('.harga').hide();
		$('.printpenawaran').hide();
		$(".alert").hide();
		$('.btnon, .btnd, .btnp').prop('disabled', true);
		$('#jmlcetakbox2').keypress(validateNumber);
		$('#jmlcetakbox2').keyup(function() {
			$('.btnon,.btnd,.btnp').prop('disabled', this.value == "" ? true : false);
		})
		$('#ket' + mod).keyup(function() {
			$('.btnon').prop('disabled', this.value == "" ? true : false);
		})

		function move() {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);

			function frame() {
				if (width >= 100) {
					clearInterval(id);
					$("#tablebox2").show();
					$("#myBar").hide();
				} else {
					width++;
					elem.style.width = width + '%';
					$("#tablebox2").hide();
					$("#myBar").show();
				}
			}
		}

		$('#lbrcetakbox2').val('10');
		$('#tgcetakbox2').val('8');
		$('#pjcetakbox2').val('20');
		$('#bbbox2').val('1');
		$('#lbrtutupbox2').val('1.5');

		$('#bx2').click(function() {
			if ($('#detailbox2').length) {
				$('#detailbox2').remove();
			}
			if ($('#detailkertasbox2').length) {
				$('#detailkertasbox2').remove();
			}

		});

		function hitungbox2() {
			// var submit = x;
			var lbr = document.getElementById("lbrcetakbox2").value;
			var tg = document.getElementById("tgcetakbox2").value;
			var pj = document.getElementById("pjcetakbox2").value;
			var lebartutup = document.getElementById("lbrtutupbox2").value;
			var lebarlem = 1.5;

			lbrcetak = parseFloat(pj) + (2 * parseFloat(tg)) + (2 * parseFloat(lebartutup));
			tgcetak = (2 * parseFloat(tg)) + (2 * parseFloat(lbr)) + parseFloat(lebarlem);

			var jmlcetak = document.getElementById("jmlcetakbox2").value;
			var bahan = document.getElementById("bahanbox2").value;
			var bb = document.getElementById("bbbox2").value;
			var jmlwarna = document.getElementById("jmlwarnabox21").value;
			var jmlwarna2 = document.getElementById("jmlwarnabox22").value;
			if (jmlwarna == 'Full Color') {
				jmlwarna = 4;
			}
			if (jmlwarna != null && jmlwarna < 1) {
				alert("Jumlah Warna Minimal 1!!");
				return;
			}
			var lam = document.getElementById("lambox2").value;
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



			var modul = 'box2';
			var insheet = "1";
			var jml_satuan = 1;
			var cetak_bagi = "Y";
			var ket = document.getElementById("ketbox2").value;
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
			if (document.getElementById("finishing4box2").checked == true) {
				finishing4 = '19';
				lbrf4 = lbrcetak;
				tgf4 = tgcetak;
			}

			if (document.getElementById("finishing1box2").checked == true) { //Poly
				lbrpolykop = document.getElementById("lbrpolybox2").value;
				tgpolykop = document.getElementById("tgpolybox2").value;
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
			//alert(lbrcetak);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);

					data = myArr;
					if ($('#tablbox2').length) {
						$('#tablbox2 tr:gt(0)').remove();
						var table = $('#tablbox2').children();
						var i;
						var no = 1;
						var x;
						var ongkos_potong = 0;
						for (i = 0; i < data.length; i++) {

							if (data[i]['ongpot'] == 'Y') {
								ongkos_potong = data[i]['ongkos_potong'];
							}
							totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + parseInt(data[i]['finishing8']);

							profit = data[i]['persen'];
							jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan * rim;

							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));

							x += "<tr class='text-md-left p-0'><td>" + data[i]['mesin'] + "</td><td class='text-md-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim <input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /><button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm' style='background-color:#ff8000;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td></tr>";

						}
						table.append(x);

					} else {

						$('#tablebox2').append("<div id='detailbox2' class='small'><table id='tablbox2' class='table table-striped mb-0' ><thead ><tr style='background-color:<?= $warnabar; ?>;color:black' ><th class='text-md-left'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");


						var table = $('#tablbox2').children();
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
							perrim = satuan * rim;

							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));

							x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-md-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim <button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm' style='background-color:#ff8000;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
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

		$("#cekukuranbox2").click(function() {
			CustomStyle();
			var jmlcetak = $('#jmlcetakbox2').val();
			var idmesin = $('#idmesin').val();
			var bahanbox2 = $('#bahanbox2').val();
			if (jmlcetak == '') {
				salert('warning', 'Oops...', iMsg['J']+' Cetakan Kosong!!');
			} else if (idmesin == 0) {
				salert('warning', 'Oops...', iMsg['M']+' belum dipilih!!');
			} else if (bahanbox2 == 0) {
				salert('warning', 'Oops...', iMsg['B']+' belum dipilih!!');
			} else {
				var lbr = document.getElementById("lbrcetakbox2").value;
				var tg = document.getElementById("tgcetakbox2").value;
				var pj = document.getElementById("pjcetakbox2").value;
				var lebartutup = document.getElementById("lbrtutupbox2").value;

				lbrcetak = parseFloat(pj) + (2 * parseFloat(tg));
				tgcetak = (2 * parseFloat(tg)) + (2 * parseFloat(lbr)) + parseFloat(lebartutup);
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
							alert('Ukuran Kebesaran');
						} else {
							move();
							hitungbox2();
						}
					}
				});
			}
		});

	</script>
<?php
} //end token
else {
	header("Content-Type: application/json");
	echo json_encode(array(404 => "error"));
}
?>