<?php
if (!empty($_POST['link'])){
	$warnabar = "#55aa5f";
?>
	<script>
		$(document).ready(function() {
			$('#lbrcetak,#tgcetak').attr('readonly', true);
			$('.harga').hide();
			$('.printpenawaran').hide();
			$(".alert").hide();
			$('.btnon, .btnd, .btnp').prop('disabled', true);
			$('#jmlcetak').keypress(validateNumber);
			$('#lbrcetak,#tgcetak').keypress(validateNumber);
			$('#ketbrosur').keyup(function() {
				$('.btnon').prop('disabled', this.value == "" ? true : false);
			})
			//tambahan untuk biaya lain-lain
			$('.lain').hide();
			$('#jmlcetak').keyup(function() {
				$('.lain').show();
			});
			//
		});
		var inputWdithReturn = '100%';
		var cekLebar = document.getElementById("jmlcetak");
		var widthx = cekLebar.clientWidth;
		if (widthx < 50) {
			$('.input').focus(function() {
				if ($(this).attr('id') == 'jmlcetak') {
					inputWdith = '100px';
					// $('.input').focus(function() {$(this).animate({width: '100px'}, 500);});
				} else {
					inputWdith = '50px';
					// $('.input').focus(function() {$(this).animate({width: '50px'}, 500);});
				}
				$(this).animate({
					width: inputWdith
				}, 400)
			});
		}
		$('.input').blur(function() {
			$(this).animate({
				width: inputWdithReturn
			}, 500);
		});
	</script>
	<div class="modal-header" style="background-color:<?= $warnabar; ?>;color:#fff;">
		<h6 class="modal-title" id="modal-title-default" style="color:#fff;margin-top:5px">Cetak Brosur</h6>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">×</span>
		</button>
	</div>
	<div class="modal-body modshow p-2">
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group mb-1">
					<div class="input-group-prepend">
						<span class="input-group-text bg-danger text-white">Jml. Cetak</span>
					</div>
					<input type="text" class="form-control" id="jmlcetak" placeholder="0" autofocus>
					<div class="input-group-append">
						<span class="input-group-text">lembar</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text bg-danger text-white">Uk. Cetak</span>
					</div>
					<select name="ukuran" id="ukuran" class="custom-select form-control" required>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-8">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Lebar</span>
					</div>
					<input type="text" class="form-control" id="lbrcetak" value="0">
					<div class="input-group-append">
						<span class="input-group-text">Tinggi</span>
					</div>
					<input type="text" class="form-control" id="tgcetak" value="0">
					<div class="input-group-append">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-4">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">bleed</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="bleed" value="0.4">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Jml. Warna</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="jmlwarna" value="4">
					<div class="input-group-append">
						<span class="input-group-text">/</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="jmlwarna2" value="4">
				</div>
			</div>

			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text bg-danger text-white">Mesin</span>
					</div>
					<select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="//kalkulator.go/global/api/mesin/brosur/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row mb-1">
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text bg-danger text-white">Pilih Bahan</span>
					</div>
					<select name="bahan" id="bahan" class="custom-select form-control" data-source="//kalkulator.go/global/api/katbahan/brosur/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text bg-danger text-white">Uk.plano</span>
					</div>
					<select id="idkertas" name="idkertas" class="custom-select form-control">
						<option value="0">Pilih ukuran plano</option>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<select id="lam" class="custom-select form-control">
					<option value="0" selected>Tanpa Laminasi
					</option>
					<option value="1">Varnish Satu Muka
					</option>
					<option value="2">Varnish Bolak-balik
					</option>
					<option value="3">Laminating Glosy Satu Muka
					</option>
					<option value="4">Laminating Glosy BB
					</option>
					<option value="5">Laminating DOP Satu Muka
					</option>
					<option value="6">Laminating DOP BB
					</option>
				</select>
			</div>

			<div class="form-group col-md-3 mt-2">
				<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="finishing4">
					<label class="custom-control-label" for="SpotUV">SpotUV</label>
				</div>
			</div>
			<div class="form-group col-md-3 mt-2">
				<div class="custom-control custom-checkbox mb-3">
					<input type="checkbox" class="custom-control-input" id="finishing1brosur">
					<label class="custom-control-label" for="finishing1brosur">Hot Foil</label>
				</div>
			</div>
		</div>
		<div class="form-row mb-1">
			<div class="form-group col-md-6">
				<select id="lipat" class="selectpicker form-control custom-select" data-style="btn-warning">
					<option value="0" selected>Tanpa Lipat</option>
					<option value="1">Lipat Mesin
					</option>
					<option value="2">Lipat Pond
					</option>
				</select>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Jml Lipatan</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="lipatbro" value="3">
				</div>
			</div>
		</div>
		<div class="form-row mb-1">
			<div class="form-group col-md-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Lebar</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="lbrpolybrosur" value="1">
					<div class="input-group-append">
						<span class="input-group-text">Tinggi</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="tgpolybrosur" value="1">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group mb-2">
					<div class="input-group-prepend">
						<span class="input-group-text bg-danger text-white">Keterangan</span>
					</div>
					<input type="text" class="form-control" id="ketbrosur" placeholder="Isi dulu keterangannya">
					<div class="input-group-append">
						<button type="submit" class="btn btn-warning btnon" id="cekukuran">Hitung</button>
					</div>
				</div>

			</div>

		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="w3-light-grey">
					<div id="myBar" class="w3-green" style="height:5px;width:0"></div>
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-12">
				<form action="/data/detail-hitung/" method="post" target="_blank">
					<input type="hidden" id="token" name="token">
					<input type="hidden" id="user" name="user">
					<input type="hidden" id="modul" name="modul">
					<div id="detailtablebro"></div>
				</form>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#lbrcetak').val('21');
			$('#tgcetak').val('29.7');
			$("#ukuran").filter(function() {
				var deptid = 10;
				$.ajax({
					url: '/global/api/ukuran/brosur/10',
					type: 'GET',
					dataType: 'json',
					success: function(response) {
						var len = response.length;
						// alert(len);
						// $("#idkertas").empty();
						for (var i = 0; i < len; i++) {
							var id = response[i]['id'];
							var name = response[i]['name'];
							$("#ukuran").append("<option value='" + id + "'>" + name + "</option>");
						}
					}
				});
			});

			$("#bahan").change(function() {
				var deptid = $(this).val();

				$.ajax({
					url: '/global/kertas/',
					type: 'post',
					data: {
						depart: deptid
					},
					dataType: 'json',
					success: function(response) {
						var len = response.length;
						$("#idkertas").empty();
						for (var i = 0; i < len; i++) {
							var id = response[i]['id'];
							var name = response[i]['name'];
							$("#idkertas").append("<option value='" + id + "'>" + name + "</option>");
						}
					}
				});
			});

		});

		$("#bahan").filter(function() {
			$('select[data-source]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih bahan</option>');
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

		function move() {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);

			function frame() {
				if (width >= 100) {
					clearInterval(id);
					$("#detailtablebro").show();
					$("#myBar").hide();
				} else {
					width++;
					elem.style.width = width + '%';
					$("#hidemyBar").removeClass("display-hidden");
					$("#detailtablebro").hide();
					$("#myBar").show();
				}
			}
		}

		$("#profits" + modulhit).keyup(function() {
			profit = $('#profits' + modulhit).val();
			tot = angka($('#totdumy' + modulhit).val());
			jual = parseFloat(profit * tot / 100) + parseInt(tot);
			satuan = jual / $('#jmlcetak').val();
			perrim = satuan * 500;
			$('#satuan' + modulhit).val(formatMoney(satuan));
			$('#hargarim' + modulhit).val(formatMoney(perrim));
			$('#total' + modulhit).val(formatMoney(jual));
		})


		function hitung() {

			var bleed = document.getElementById("bleed").value;
			var lbrcetak = parseFloat(document.getElementById("lbrcetak").value) + (2 * parseFloat(bleed));
			var tgcetak = parseFloat(document.getElementById("tgcetak").value) + (2 * parseFloat(bleed));

			var jmlcetak = document.getElementById("jmlcetak").value;
			var bahan = document.getElementById("bahan").value;
			var jmlwarna = document.getElementById("jmlwarna").value;
			var jmlwarna2 = document.getElementById("jmlwarna2").value;
			if (jmlwarna != null && jmlwarna < 1) {
				alert("Jumlah Warna Minimal 1!!");
				return;
			}
			var jml_satuan = 1;
			var lam = document.getElementById("lam").value;
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
			var lbrf7 = 1;
			var tgf7 = 1;
			var lbrf8 = 1;
			var tgf8 = 1;
			var finishing1 = 0;
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = 0;
			var finishing7 = 0;
			var finishing8 = 0;
			var finishing9 = '66';
			var lbrf9 = 1 / (jmlcetak * jml_satuan);
			var tgf9 = 1;
			// alert(lbrf9);
			//spot uv
			if (document.getElementById("finishing4").checked == true) {
				finishing4 = '19';
				lbrf4 = lbrcetak;
				tgf4 = tgcetak;
				finishing8 = '60'; //film
				lbrf8 = 1 / (jmlcetak * jml_satuan);
			}
			//ongkos lipat
			//ongkos lipat
			var lipat = parseInt(document.getElementById("lipat").value);
			if (lipat == '1') {
				lbrf5 = (lipat + 1) / 2;
				finishing5 = '52';
			} else if (lipat == '2') { //lipat pond
				lbrf5 = (lipat + 1) / 2;
				finishing5 = '56';

				lbrf6 = lbrcetak / jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
				tgf6 = tgcetak;
				finishing6 = '13'; // Pisau Pon		
			}
			if (document.getElementById("finishing1brosur").checked == true) { //Poly
				lbrpoly = document.getElementById("lbrpolybrosur").value;
				tgpoly = document.getElementById("tgpolybrosur").value;
				finishing1 = '10'; //Press Poly
				lbrf1 = lbrpoly;
				tgf1 = tgpoly;
				finishing3 = '11'; //Plat Poly
				lbrf3 = lbrpoly / jmlcetak;
				tgf3 = tgpoly;
				finishing7 = '60'; //film Poly
				lbrf7 = 1 / (jmlcetak * jml_satuan);

			}
			var modul = "brosur";
			var insheet = "1";

			var cetak_bagi = "Y";
			var ket = document.getElementById("ketbrosur").value;

			var ket_satuan = "lbr";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			var idmesin = $('#idmesin').val();
			var idkertas = $('#idkertas').val();
			var j_mesin = '';
			var kethitung = '';

			if (jmlcetak != null && jmlcetak < 1) {
				alert("Jumlah Cetakan Kosong!!");
				return;
			}
			if (lbrcetak != null && lbrcetak < 1) {
				document.getElementById("total").value = '';
				document.getElementById("hargasatuan").value = '';
				document.getElementById("hargarim").value = '';
				$('.btnd, .btnp').prop('disabled', true);
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

					if ($('#here_table').length) {

						$('#here_table tr:gt(0)').remove();

						var table = $('#here_table').children();
						var i;
						var no = 1;
						var x;
						var ongkos_potong = 0;
						for (i = 0; i < data.length; i++) {
							if (data[i]['ongpot'] == 'Y' && data[i]['beratkertas'] != 0) {
								ongkos_potong = data[i]['ongkos_potong'];
							}
							totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + parseInt(data[i]['finishing8']) + parseInt(data[i]['finishing9']);
							profit = data[i]['persen'];
							jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan * rim;

							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));

							x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim <button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
						}

						table.append(x);

					} else {

						$('#detailtablebro').append("<div class='small table-responsive'> <table id='here_table' class='table' ><thead><tr style='background-color:<?= $warnabar ?>;color:white;padding:0!important'><th  class='text-md-left' style='width:30%!important'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");
						var table = $('#here_table').children();

						var i;
						var no = 1;
						var ongkos_potong = 0;
						for (i = 0; i < data.length; i++) {
							if (data[i]['ongpot'] == 'Y' && data[i]['beratkertas'] != 0) {
								ongkos_potong = data[i]['ongkos_potong'];
							}
							totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + parseInt(data[i]['finishing8']) + parseInt(data[i]['finishing9']);
							profit = data[i]['persen'];
							jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan * rim;

							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));

							x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim <button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
						}
						table.append(x);
					}
				}
			}
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + finishing7 + "&finishing8=" + finishing8 + "&finishing9=" + finishing9 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&lbrf8=" + lbrf8 + "&tgf8=" + tgf8 + "&lbrf9=" + lbrf9 + "&tgf9=" + tgf9 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&kethitung=" + kethitung + "&idmesin=" + idmesin + "&idkertas=" + idkertas;

			// isi = btoa(isi); //encode			
			// xmlhttp.open("GET", "wadah.php?isi=" + isi, true);
			// xmlhttp.send();
			var url = '/sandbox/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
		}

		$("#ukuran").change(function() {
			var ukuran = $(this).val();
			$.ajax({
				url: protocol + '://' + host + '/api/cariukuran',
				type: 'POST',
				data: {
					ukuran: ukuran
				},
				dataType: 'json',
				success: function(response) {
					if (response[0] == 0.0) {
						$('#lbrcetak,#tgcetak').attr('readonly', false);
						$('#lbrcetak').val(response[0]);
						$('#tgcetak').val(response[1]);
					} else {
						$('#lbrcetak,#tgcetak').attr('readonly', true);
						$('#lbrcetak').val(response[0]);
						$('#tgcetak').val(response[1]);
					}
				}
			});
		});

		$("#cekukuran").click(function() {
			var jmlcetak = $('#jmlcetak').val();
			var ukuran = $('#ukuran').val();
			var idmesin = $('#idmesin').val();
			var bahan = $('#bahan').val();
			if (jmlcetak == '') {
				alert('jumlah belum diisi');
			} else if (ukuran == 0) {
				alert('ukuran belum dipilih');
			} else if (idmesin == 0) {
				alert('mesin belum dipilih');
			} else if (bahan == 0) {
				alert('bahan belum dipilih');
			} else {
				var bleed = $('#bleed').val();
				var lbrcetak = parseFloat($('#lbrcetak').val()) + (2 * parseFloat(bleed));
				var tgcetak = parseFloat($('#tgcetak').val()) + (2 * parseFloat(bleed));
				$.ajax({
					url: '/api/cekukuran/',
					type: 'POST',
					data: {
						mesin: idmesin,
						lbrcetak: lbrcetak,
						tgcetak: tgcetak
					},
					dataType: 'json',
					success: function(response) {
						if (response[0].toString() == 'N') {
							alert('Ukuran Kebesaran');
						} else {
							move();
							hitung();
						}
					}
				});
			}
		});
	</script>
	<style>
		th {
			font-weight: bold;
			text-align: center
		}

		.table>thead>tr>th {
			vertical-align: middle
		}

		.table th,
		.table td {
			padding: 5px;
			vertical-align: top;
			border-top: 0;
		}
	</style>
<?php
} //end token
else {
	echo json_encode(array(404 => "error"));
}
?>