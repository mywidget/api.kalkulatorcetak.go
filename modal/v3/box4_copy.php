<?php
if (!empty($_POST['link'])) {
	$warnabar = "#ff5722";
?>
	<div class="modal-header" style="background-color:<?= $warnabar; ?>;color:white;">
		<h4 class="modal-title text-white">Cetak Box 4</h4>
		<button type="button" class="close" id="bx4" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row">
			<div class="form-group has-success col-md-12">
				<div class="input-group">
					<span class="input-group-text">Jumlah Cetak</span>
					<input type="text" class="form-control" aria-label="" id="jmlcetakbox4" value="500" autofocus>
					<span class="input-group-text">pcs</span>
					<span class="input-group-text">&nbsp;&nbsp;</span>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control input" id="lbrcetakbox4" placeholder="Lebar">
					<span class="input-group-text">Panjang</span>
					<input type="text" class="form-control input" id="pjcetakbox4" placeholder="Panjang">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control input" id="tgcetakbox4" placeholder="Tinggi">
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Lebar Lipatan</span>
					<input type="text" class="form-control" id="lbrtutupbox4" placeholder="Lebar">
				</div>
			</div>

			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Lebar Dimensi</span>
					<input type="text" class="form-control" id="lbrdimensi4" placeholder="Lebar Dimensi">
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Jumlah Warna</span>
					<input type="text" class="form-control" id="jmlwarnabox41" value="4">
					<span class="input-group-text">/</span>
					<input type="text" class="form-control" id="jmlwarnabox42" value="0">
				</div>
			</div>
			<div class="form-group has-danger idmesin col-md-6">
				<div class="input-group">
					<span class="input-group-text" id="not3">Mesin</span>
					<select name="idmesin" id="idmesin" class="custom-select form-control" data-mesin="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
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
				<select id="lambox4" class="custom-select selectpicker form-control" data-style="btn-warning">
					<option value="0" selected>Tanpa Laminasi</option>
					<option value="1">Varnish </option>
					<option value="3">Laminating Glosy </option>
					<option value="5">Laminating DOP </option>
				</select>
			</div>

			<div class="form-group col-md-6">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing4box4">
					</span>
					<Label class="form-control">SpotUV</label>
				</div><!-- /input-group -->
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="finishing1box4">
					</span>
					<Label class="form-control">Poly</label>
				</div><!-- /input-group -->
			</div>

			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Lebar</span>
					<input type="text" class="form-control" aria-label="" id="lbrpolybox4" value="1" readonly>
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" aria-label="" id="tgpolybox4" value="1" readonly>
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
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group ">
					<span class="input-group-text">
						<input type="checkbox" id="tutupboxbawah1" checked>
					</span>
					<Label class="form-control">Tutup Bawah tidak di cetak hanya di pond</label>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group gabungcetakbox4 ">
					<span class="input-group-text">
						<input type="checkbox" id="gabungcetakbox4" checked>
					</span>
					<Label class="form-control">Box atas dan bawah digabung cetaknya</label>
				</div>
			</div>
		</div>

		<div class="tutupbawah">
			<label>Tutup Bawah</label>
			<div class="form-row">
				<div class="form-group col-md-6 has-danger idmesin">
					<div class="input-group">
						<div class="input-group-append">
							<span class="input-group-text " id="not3">Mesin</span>
						</div>
						<select name="idmesinb" id="idmesinb" class="custom-select form-control" data-mesinb="<?= $host; ?>/api/<?= $app_id; ?>/mesin/<?= $mod; ?>/0" data-valueKeys="id" data-displayKeys="name" required>
						</select>
					</div>
				</div>
				<div class="form-group col-md-6">
					<div class="input-group">
						<span class="input-group-text">Jml Warna</span>
						<input type="text" class="form-control" aria-label="" id="jmlwarnabawahbox41" value="4">
						<span class="input-group-text">/</span>
						<input type="text" class="form-control" aria-label="" id="jmlwarnabawahbox42" value="0">
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6 has-danger bahanbawahbox4">
					<div class="input-group">
						<span class="input-group-text " id="not4">Bahan</span>
						<select name="bahanbawahbox4" id="bahanbawahbox4" class="custom-select form-control" data-bawah="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/<?= $mod; ?>/0" data-valueKeys="id" data-displayKeys="name" required>
						</select>
					</div>
				</div>
				<div class="form-group col-md-6 has-danger idkertasb">
					<div class="input-group">
						<span class="input-group-text ">Uk.plano</span>
						<select id="idkertasb" name="idkertasb" class="custom-select form-control">
							<option value="0">- Pilih ukuran -</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<select id="lambawah<?= $mod; ?>" class="custom-select form-control" data-style="btn-warning">
						<option value="0" selected>Tanpa Laminasi</option>
						<option value="1">Varnish Satu Muka</option>
						<option value="3">Laminating Glosy Satu Muka</option>
						<option value="5">Laminating DOP Satu Muka</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<div class="input-group ">
						<span class="input-group-text">
							<input type="checkbox" id="finishing4bawah<?= $mod; ?>">
						</span>
						<Label class="form-control">SpotUV</label>
					</div><!-- /input-group -->
				</div>
				<div class="form-group col-md-4">
					<div class="input-group ">
						<span class="input-group-text">
							<input type="checkbox" id="finishing1bawah<?= $mod; ?>">
						</span>
						<Label class="form-control">Poly</label>
					</div><!-- /input-group -->
				</div>
				<div class="form-group col-md-8">
					<div class="input-group">
						<span class="input-group-text">Lebar</span>
						<input type="text" class="form-control" aria-label="" id="lbrpolybawah<?= $mod; ?>" value="1">
						<span class="input-group-text">Tinggi</span>
						<input type="text" class="form-control" aria-label="" id="tgpolybawah<?= $mod; ?>" value="1">
					</div>
				</div>
			</div>
		</div>

		<div class="form-row">
			<div class="form-group col-md-8">
				<div class="input-group">
					<span class="input-group-text">Keterangan</span>
					<input type="text" class="form-control" aria-label="" id="ket<?= $mod; ?>" placeholder="Isi dulu keterangannya">
				</div>
			</div>
			<div class="col-md-4">
				<div class="btn-group" role="group">
					<button type="submit" class="btn btn-warning btnon" id="cekukuranbox4">Hitung</button>
					<?php echo cNav($mod); ?>
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
			<div class="col-md-12">
				<form action="/data/detail-hitung/" method="post" target="_blank">
					<input type="hidden" id="token" name="token">
					<input type="hidden" id="modul" name="modul">
					<div id="table<?= $mod; ?>"></div>
				</form>
			</div>
		</div>
	</div>
	<div id="customstyle"></div>
	<script>
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
		$("#bahanbawah" + mod).filter(function() {
			$("select[data-bawah]").each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih kertas bawah</option>');
				$.ajax({
					url: $select.attr("data-bawah"),
				}).then(function(options) {
					options.map(function(option) {
						var $option = $("<option>");
						$option.val(option[$select.attr("data-valueKeys")]).text(option[$select.attr("data-displayKeys")]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahanbawah" + mod).change(function() {
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
					$("#idkertasb").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]["id"];
						var name = response[i]["name"];
						$("#idkertasb").append("<option value='" + id + "'>" + name + "</option>");
					}
				},
			});
		});
		$("#idmesinb").filter(function() {
			$("select[data-mesinb]").each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih mesin bawah</option>');
				$.ajax({
					url: $select.attr("data-mesinb"),
				}).then(function(options) {
					options.map(function(option) {
						var $option = $("<option>");
						$option.val(option[$select.attr("data-valueKeys")]).text(option[$select.attr("data-displayKeys")]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahanbox4").filter(function() {
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
			$.ajaxAntri({
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
		$('#bahan' + mod).change(function() {
			if ($(this).val() == "" || $(this).val() == '0') {
				$(".bahan" + mod).removeClass("has-success").addClass("has-danger");
				$(".idkertas").removeClass("has-success").addClass("has-danger");
			} else {
				$(".bahan" + mod).removeClass("has-danger").addClass("has-success");
				$(".idkertas").removeClass("has-danger").addClass("has-success");
				$('#not4').removeClass("blink-bg");
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



		$(document).ready(function() {
			$('.harga').hide();
			$('.printpenawaran').hide();
			$(".alert").hide();
			$('#c-nav').hide();
			$('.btnon, .btnd, .btnp').prop('disabled', true);
			$('#jmlcetakbox4').keypress(validateNumber);
			$('#ketbox4').keyup(function() {
				$('.btn').prop('disabled', this.value == "" ? true : false);
			})
		});
		var inputWdithReturn = '100%';
		var cekLebar = document.getElementById("lbrcetakbox4");
		var widthx = cekLebar.clientWidth;
		if (widthx < 50) {
			$('.input').focus(function() {
				$(this).animate({
					width: '60px'
				}, 500);
			});
		}
		$('.input').blur(function() {
			$(this).animate({
				width: inputWdithReturn
			}, 500);
		});

		function move() {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);

			function frame() {
				if (width >= 100) {
					clearInterval(id);
					$("#tablebox4").show();
					$("#myBar").hide();
				} else {
					width++;
					elem.style.width = width + '%';
					$("#hidemyBar").removeClass("display-hidden");
					$("#tablebox4").hide();
					$("#myBar").show();
				}
			}
		}
		$(document).ready(function() {

			$('#lbrcetakbox4').val('10');
			$('#tgcetakbox4').val('5');
			$('#pjcetakbox4').val('20');

			$('#lbrtutupbox4').val('1.5');
			$('#lbrdimensi4').val('0.5');
			$('.gabungcetakbox4').hide();
			$('.tutupbawah').hide();
			$('.progress').hide();


			$('#bx4').click(function() {
				if ($('#detailbox4').length) {
					$('#detailbox4').remove();
				}
				if ($('#detailkertasbox4').length) {
					$('#detailkertasbox4').remove();
				}
			});
		})


		$('#tutupboxbawah1').click(function() {

			if ($('#tutupboxbawah1').attr('checked')) {
				$('#tutupboxbawah1').attr('checked', false);
				$('#gabungcetakbox4').prop('checked', true);

				$('.gabungcetakbox4').show();
			} else {
				$('#tutupboxbawah1').attr('checked', 'checked');
				$('.gabungcetakbox4').hide();
				$('.tutupbawah').hide();

			}
		});

		$('#gabungcetakbox4').click(function() {

			if ($('#gabungcetakbox4').attr('checked')) {
				$('#gabungcetakbox4').attr('checked', false);
				$('.tutupbawah').show();
			} else {
				$('#gabungcetakbox4').attr('checked', 'checked');
				$('.tutupbawah').hide();
			}
		});

		function hitungbox4(l1, t1, l2, t2, bawah) {
			lbrcetak = l1;
			tgcetak = t1;
			lbrcetak2 = l2;
			tgcetak2 = t2;

			var jmlcetak = document.getElementById("jmlcetakbox4").value;
			var bahan = document.getElementById("bahanbox4").value;
			var bb = '1';
			var jmlwarna = document.getElementById("jmlwarnabox41").value;
			var jmlwarna2 = document.getElementById("jmlwarnabox42").value;
			if (jmlwarna == 'Full Color') {
				jmlwarna = 4;
			}
			if (jmlwarna != null && jmlwarna < 1) {
				alert("Jumlah Warna Minimal 1!!");
				return;
			}

			var lam = document.getElementById("lambox4").value;
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

			var modul = mod;
			var insheet = "1";
			var jml_satuan = 1;
			var cetak_bagi = "Y";
			var ket = document.getElementById('ketbox4').value;
			var ket_satuan = "lbr";
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
			if (document.getElementById("finishing4box4").checked == true) {
				finishing4 = '19';
				lbrf4 = lbrcetak;
				tgf4 = tgcetak;
			}

			if (document.getElementById("finishing1box4").checked == true) { //Poly
				lbrpolykop = document.getElementById("lbrpolybox4").value;
				tgpolykop = document.getElementById("tgpolybox4").value;
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

			//alert(jmlwarna);
			//alert(lbrcetak);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);

					//$('#ketbox4').val(JSON.stringify(myArr));
					var data = myArr;

					if (bawah != 1) {
						//	alert("atas");
						hitungkertasboxbwh(data);
					} else {

						if ($('#tablbox4').length) {
							$('#tablbox4 tr:gt(0)').remove();
							var table = $('#tablbox4').children();
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
								if(jmlcetak >= rim){
								perrim = satuan * rim;
								perrim = "Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim";
								}else{
								perrim = satuan;
								perrim = "Rp. " + formatMoney(satuan) + "/pcs";
								}

// "+perrim+"
								var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));

								x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >"+perrim+"<button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm' style='background-color:<?= $warnabar; ?>;color:white;width:120px'>Rp." + formatMoney(jual) + "</button><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></td></tr>";

							}
							table.append(x);

						} else {

							$('#tablebox4').append("<div id='detailbox3' class='small'><table id='tablbox4' class='table table-striped table-responsive' ><thead ><tr style='background-color:<?= $warnabar; ?>;color:white' ><th  class='text-left' style='width:30%'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");




							var table = $('#tablbox4').children();
							var i;
							var no = 1;
							var ongkos_potong = 0;
							for (i = 0; i < data.length; i++) {

								if (data[i]['ongpot'] == 'Y') {
									ongkos_potong = data[i]['ongkos_potong'];
								}
								totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + parseInt(data[i]['finishing8']);

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

								x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >"+perrim+"<button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm' style='background-color:<?= $warnabar; ?>;color:white;width:120px'>Rp." + formatMoney(jual) + "</button><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></td></tr>";
							}

							table.append(x);
						}


					}

				}
			}
			 
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + finishing7 + "&finishing8=" + finishing8 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;

			var url = host + '/sandbox/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(isi);
		}


		function hitungkertasboxbwh(x) {
			var data = x;

			var lbr = document.getElementById("lbrcetakbox4").value;
			var tg = document.getElementById("tgcetakbox4").value;
			var pj = document.getElementById("pjcetakbox4").value;
			var lebartutup = document.getElementById("lbrtutupbox4").value;
			var lbrdimensi4 = document.getElementById("lbrdimensi4").value;
			lbrcetak = (4 * parseFloat(tg)) + (2 * parseFloat(lebartutup)) + parseFloat(lbr) + (2 * parseFloat(lbrdimensi4));
			tgcetak = (4 * parseFloat(tg)) + (2 * parseFloat(lebartutup)) + parseFloat(pj) + (2 * parseFloat(lbrdimensi4));

			if ($('#tutupboxbawah1').attr('checked')) {
				// $('#tutupboxbawah1').attr('checked', false);
				var bahan = document.getElementById("bahanbox4").value;
			} else {
				var bahan = document.getElementById("bahanbawahbox4").value;

			}

			var jmlcetak = document.getElementById("jmlcetakbox4").value;

			var bb = '1';
			var jmlwarna = document.getElementById("jmlwarnabawahbox41").value;
			var jmlwarna2 = document.getElementById("jmlwarnabawahbox42").value;

			if (jmlwarna != null && jmlwarna < 1) {
				alert("Jumlah Warna Minimal 1!!");
				return;
			}

			if (document.getElementById("tutupboxbawah1").checked == true) {
				jmlwarna = 0;
			}

			var lam = document.getElementById("lambawahbox4").value;
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
			var j_mesin = '';
			var kethitung = 'Box_Bawah';

			var modul = "box4";
			var insheet = "1";
			var jml_satuan = 1;
			var cetak_bagi = "Y";
			var ket = document.getElementById("ketbox4").value;
			var ket_satuan = "pcs";
			var rim = 500;
			var box = 100;
			var ongpot = 'N';
			var idmesin = $('#idmesin').val();
			if (document.getElementById("tutupboxbawah1").checked == true) {
				var idmesin = $("#idmesin").val();
				var idkertas = $("#idkertas").val();
			} else {
				var idmesin = $("#idmesinb").val();
				var idkertas = $("#idkertasb").val();
			}
			//Pond
			lbrf3 = lbrcetak / jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
			tgf3 = tgcetak;
			finishing2 = '12'; //Biaya Pon
			finishing3 = '13'; // Pisau Pon		

			//SpotUV
			if (document.getElementById("finishing4bawahbox4").checked == true) {
				finishing4 = '19';
				lbrf4 = lbrcetak;
				tgf4 = tgcetak;
			}

			if (document.getElementById("finishing1bawahbox4").checked == true) { //Poly
				lbrpolykop = document.getElementById("lbrpolybawahbox4").value;
				tgpolykop = document.getElementById("tgpolybawahbox4").value;
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

					var ongkos_potong = 0;
					var data2 = myArr;
					subtotal2 = parseInt(data2[0]['totcetak']) + parseInt(data2[0]['totbhn']) + parseInt(ongkos_potong) + parseInt(data2[0]['tot_ctp']) + parseInt(data2[0]['totlaminating']) + parseInt(data2[0]['finishing1']) + parseInt(data2[0]['finishing2']) + parseInt(data2[0]['finishing3']) + parseInt(data2[0]['finishing4']) + parseInt(data2[0]['finishing5']) + parseInt(data2[0]['finishing6']);
					var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2[0])));
					//alert(myArr[0]['totbhn']);

					if ($('#tablbox4').length) {
						$('#tablbox4 tr:gt(0)').remove();
						var table = $('#tablbox4').children();
						var i;
						var x;
						var ongkos_potong = 0;
						for (i = 0; i < data.length; i++) {

							if (data[i]['ongpot'] == 'Y') {
								ongkos_potong = data[i]['ongkos_potong'];
							}
							subtotal1 = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);

							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));


							total = subtotal1 + subtotal2;
							profit = data[i]['persen'];
							jual = (parseInt(total) * profit / 100) + parseInt(total);
							satuan = jual / jmlcetak / jml_satuan;
							if(jmlcetak >= rim){
								perrim = satuan * rim;
								perrim = "Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim";
								}else{
								perrim = satuan;
								perrim = "Rp. " + formatMoney(satuan) + "/pcs";
								}


							x += "<tr class='text-md-left'><td>" + data[i]['mesin'] + "</td><td class='text-md-right' >"+perrim+"<button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm' style='background-color:<?= $warnabar; ?>;color:white;width:120px'>Rp." + formatMoney(jual) + "</button><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /><input type='hidden' name='data2[]' value='" + arrStr2 + "' /></td></tr>";

						}
						table.append(x);

					} else {

						$('#tablebox4').append("<div id='detailbox3' class='small'><table id='tablbox4' class='table table-striped' ><thead ><tr style='background-color:<?= $warnabar; ?>;color:white' ><th  class='text-md-left' style='width:30%'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");

						var table = $('#tablbox4').children();
						var i;
						var no = 1;
						var ongkos_potong = 0;
						for (i = 0; i < data.length; i++) {

							if (data[i]['ongpot'] == 'Y') {
								ongkos_potong = data[i]['ongkos_potong'];
							}
							subtotal1 = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);

							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));


							total = subtotal1 + subtotal2;
							profit = data[i]['persen'];
							jual = (parseInt(total) * profit / 100) + parseInt(total);
							satuan = jual / jmlcetak / jml_satuan;
							if(jmlcetak >= rim){
								perrim = satuan * rim;
								perrim = "Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim";
								}else{
								perrim = satuan;
								perrim = "Rp. " + formatMoney(satuan) + "/pcs";
								}


							x += "<tr class='text-md-left'><td>" + data[i]['mesin'] + "</td><td class='text-md-right' >"+perrim+"<button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm' style='background-color:<?= $warnabar; ?>;color:white;width:120px'>Rp." + formatMoney(jual) + "</button><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /><input type='hidden' name='data2[]' value='" + arrStr2 + "' /></td></tr>";
						}

						table.append(x);
					}
				}
			}

		
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + finishing7 + "&finishing8=" + finishing8 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;

			var url = host + '/sandbox/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(isi);
		}

		function cekukuranbox4() {
			var jmlcetak = document.getElementById("jmlcetakbox4").value;
			var jmlwarna = document.getElementById("jmlwarnabox41").value;
			var bahanbox4 = document.getElementById("bahanbox4").value;
			var idmesin = document.getElementById("idmesin").value;
			if (jmlcetak != null && jmlcetak < 1) {
				salert('warning', 'Oops...', 'Jumlah Cetakan Kosong!!');
				return;
			}
			if (jmlwarna != null && jmlwarna < 1) {
				salert('warning', 'Oops...', 'Jumlah Warna Minimal 1!!');
				return;
			}
			if (bahanbox4 == 0) {
				salert('warning', 'Oops...', 'bahan belum dipilih');
				return;
			}
			if (idmesin == 0) {
				salert('warning', 'Oops...', 'mesin belum dipilih');
				return;
			}
			$('.simpan').html('Simpan');

			var lbr = document.getElementById("lbrcetakbox4").value;
			var tg = document.getElementById("tgcetakbox4").value;
			var pj = document.getElementById("pjcetakbox4").value;
			var lebartutup = document.getElementById("lbrtutupbox4").value;
			var lbrdimensi4 = document.getElementById("lbrdimensi4").value;


			if (lbr > pj) {
				var lbr = document.getElementById("pjcetakbox4").value;
				var pj = document.getElementById("lbrcetakbox4").value;
			}


			//ukuran tutup atas
			lbrcetak = (4 * parseFloat(tg)) + (2 * parseFloat(lebartutup)) + parseFloat(lbr) + 0.2;
			tgcetak = (4 * parseFloat(tg)) + (2 * parseFloat(lebartutup)) + parseFloat(pj) + 0.2;

			//ukuran tutup bawah
			lbrcetak2 = (4 * parseFloat(tg)) + (2 * parseFloat(lebartutup)) + parseFloat(lbr) + (2 * parseFloat(lbrdimensi4));
			tgcetak2 = (4 * parseFloat(tg)) + (2 * parseFloat(lebartutup)) + parseFloat(pj) + (2 * parseFloat(lbrdimensi4));


			if (document.getElementById("tutupboxbawah1").checked == true) {
				bawah = 0;

			} else {
				if (document.getElementById("gabungcetakbox4").checked == true) {
					bawah = 1;

					if (tgcetak > tgcetak2) {
						tinggicetakan = tgcetak;
					} else {
						tinggicetakan = tgcetak2;
					}

					lebarcetakan = lbrcetak + lbrcetak2;

					lbrcetak = lebarcetakan;
					tgcetak = tinggicetakan;
				} else {
					bawah = 0;
				}

			}


			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);
					if (myArr[0].toString() == 'N') {
						salert('warning', 'Oops...', 'Ukuran Kebesaran ' + lbrcetak + "x" + tgcetak);
						// alert('Ukuran Kebesaran' + lbrcetak + "x" + tgcetak);
						return;
					} else {
						//	alert('Ukuran' + lbrcetak + "x" + tgcetak);
						//	alert(x + " ," + lbrcetak + " ," + tgcetak+ " ," + lbrcetak2+ " ," + tgcetak2+ " ," + bawah);
						//alert ("oke");
						hitungbox4(lbrcetak, tgcetak, lbrcetak2, tgcetak2, bawah);

					}
				}
			}
			xmlhttp.open("GET", "function/cekukuran.php?mesin=" + idmesin + "&lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak, true);
			xmlhttp.send();
		}
		$("#cekukuran" + mod).click(function() {
			CustomStyle();
			var jmlcetak = $("#jmlcetak" + mod).val();
			var lbrcetakp = $("#lbrcetak" + mod).val();
			var tgcetakp = $("#pjcetak" + mod).val();
			// var ukuran = $("#ukuranp").val();
			var idmesin = $("#idmesin").val();
			var bahan = $("#bahan" + mod).val();
			var jmlwarnap = $("#jmlwarnabox41").val();
			if (jmlcetak == "" || jmlcetak == "0") {
				$(".jml").addClass("has-danger");
				alertx("Jumlah belum diisi", "not1", "jmlcetakp");
			} else if (lbrcetakp == "" || lbrcetakp == 0) {
				alertx("Lebar cetak belum diisi", "a", "lbrcetakp");
			} else if (tgcetakp == "" || tgcetakp == 0) {
				alertx("Tinggi cetak belum diisi", "a", "tgcetakp");
			} else if (jmlwarnap == "" || jmlwarnap == 0) {
				alertx("Jumlah warna belum diisi", "a", "jmlwarnap");
			} else if (idmesin == 0) {
				alertx("mesin belum dipilih", "not3", "idmesin");
			} else if (bahan == 0) {
				alertx("bahan belum dipilih", "not4", "bahanp");
			} else {

				move();
				// var jmlcetak = document.getElementById("jmlcetakbox4").value;
				var jmlwarna = document.getElementById("jmlwarnabox41").value;
				var bahanbox4 = document.getElementById("bahanbox4").value;
				// var idmesin = document.getElementById("idmesin").value;
				if (jmlcetak != null && jmlcetak < 1) {
					salert('warning', 'Oops...', 'Jumlah Cetakan Kosong!!');
					return;
				}
				if (jmlwarna != null && jmlwarna < 1) {
					salert('warning', 'Oops...', 'Jumlah Warna Minimal 1!!');
					return;
				}
				if (bahanbox4 == 0) {
					salert('warning', 'Oops...', 'bahan belum dipilih');
					return;
				}
				if (idmesin == 0) {
					salert('warning', 'Oops...', 'mesin belum dipilih');
					return;
				}
				$('.simpan').html('Simpan');

				var lbr = document.getElementById("lbrcetakbox4").value;
				var tg = document.getElementById("tgcetakbox4").value;
				var pj = document.getElementById("pjcetakbox4").value;
				var lebartutup = document.getElementById("lbrtutupbox4").value;
				var lbrdimensi4 = document.getElementById("lbrdimensi4").value;


				if (lbr > pj) {
					var lbr = document.getElementById("pjcetakbox4").value;
					var pj = document.getElementById("lbrcetakbox4").value;
				}


				//ukuran tutup atas
				lbrcetak = (4 * parseFloat(tg)) + (2 * parseFloat(lebartutup)) + parseFloat(lbr) + 0.2;
				tgcetak = (4 * parseFloat(tg)) + (2 * parseFloat(lebartutup)) + parseFloat(pj) + 0.2;

				//ukuran tutup bawah
				lbrcetak2 = (4 * parseFloat(tg)) + (2 * parseFloat(lebartutup)) + parseFloat(lbr) + (2 * parseFloat(lbrdimensi4));
				tgcetak2 = (4 * parseFloat(tg)) + (2 * parseFloat(lebartutup)) + parseFloat(pj) + (2 * parseFloat(lbrdimensi4));


				if (document.getElementById("tutupboxbawah1").checked == true) {
					bawah = 0;

				} else {
					if (document.getElementById("gabungcetakbox4").checked == true) {
						bawah = 1;

						if (tgcetak > tgcetak2) {
							tinggicetakan = tgcetak;
						} else {
							tinggicetakan = tgcetak2;
						}

						lebarcetakan = lbrcetak + lbrcetak2;

						lbrcetak = lebarcetakan;
						tgcetak = tinggicetakan;
					} else {
						bawah = 0;
					}

				}
				///
				// alert(bawah );
				$.ajax({
					url: host + "/cek/cekukuran/",
					type: "POST",
					data: {
						mesin: idmesin,
						lbrcetak: lbrcetak,
						tgcetak: tgcetak,
						app_id: app_id
					},
					dataType: "json",
					beforeSend: function() {
						$("#not1").removeClass("blink-bg");
					},
					success: function(response) {
						if (response[0].toString() == "N") {
							alertx("Ukuran Kebesaran");
						} else {
							move();
							hitungbox4(lbrcetak, tgcetak, lbrcetak2, tgcetak2, bawah);
						}
					},
				});
			}
		});

	</script>
	<style>
		th {
			font-weight: bold;
			text-align: center;
		}

		.table>thead>tr>th {
			vertical-align: middle;
		}
	</style>
<?php
} //end token
else {
	echo json_encode(array(404 => "error"));
}
?>