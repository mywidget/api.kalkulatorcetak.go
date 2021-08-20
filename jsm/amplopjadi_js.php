<?php
	if (!empty($_POST['link'])) {
	?>
	<script>
		$(document).ready(function() {
			$('.harga').hide();
			$('.printpenawaran').hide();
			$(".alert").hide();
			$('.btnon, .btnd, .btnp').prop('disabled', true);
			$('#jmlcetakam2').keypress(validateNumber);
			$('#ket'+mod).keyup(function() {
				$('.btnon,.btnd,.btnp').prop('disabled', this.value == "" ? true : false);
			})
		});
		$('.modal').on('hidden.bs.modal', function() {
			$(this).removeData('bs.modal');
		});
		
		$("#bahanam2").change(function () {
			var ukuran = $(this).val();
			$.ajax({
				url: host + "/cekm/cekukuranam/",
				type: "POST",
				data: {ukuran: ukuran,app_id:app_id},
				dataType: "json",
				success: function (response) {
					if (response[0] == 0.0) {
						$("#lbrcetakam2,#tgcetakam2").attr("readonly", false);
						$("#lbrcetakam2").val(response[0]);
						$("#tgcetakam2").val(response[1]);
						} else {
						$("#lbrcetakam2,#tgcetakam2").attr("readonly", true);
						$("#lbrcetakam2").val(response[0]);
						$("#tgcetakam2").val(response[1]);
					}
				},
			});
		});
		$("#idmesin").attr("disabled", true);
		$('#pilih'+mod).on('change', function() {
			if (this.value == '2') {
				$("#idmesin").attr("disabled", false);
				} else {
				$("#idmesin").attr("disabled", true);
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
		$("#bahanam2").filter(function() {
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
		$("#bahanam2").change(function() {
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
		$(document).ready(function() {
			$('#lbrcetakam2').val('23');
			$('#tgcetakam2').val('11');
			$('#am2').click(function() {
				if ($('#detailamp2').length) {
					$('#detailamp2').remove();
				}
			});
		})
		
		function hitungam2(x) {
			startTimer();
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
			var finishing1 = '0';
			var finishing2 = '0';
			var finishing3 = '0'; // Pisau Pon
			var finishing4 = '0'; //Biaya Pon
			var finishing5 = '0'; //Biaya Lem
			var finishing6 = '0';
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
			var modul = 'amplopjadi';
			var insheet = "1";
			var ket = document.getElementById("ket"+mod).value;
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
			// var idmesin = document.getElementById("idmesin").value;
			var idmesin = $("#idmesin").val();
			var pilimesin = $("#pilih"+mod).val();
			if(pilimesin==1){
				j_mesin='';
				}else{
				j_mesin=idmesin;
			}
			// var idkertas = $('#idkertas').val();
			//alert(lbrcetak);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);
					data = myArr;
					// jika marketing jangan tampilkan ini
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
							
							x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td>";
							x +="<td class='text-left' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim</td>";
							x +="<td class='text-right'><button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm hint--top-left' aria-label='Klik Detail data'>Rp." + formatMoney(jual) + "</button>";
							x +="<input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></td></tr>";
							
						}
						table.append(x);
						} else {
						$('#tableamp2').append("<div class='small table-responsive'> <table id='tablam2' class='table' ><thead><tr style='color:#000;padding:0!important'><th class='text-md-left' style='width:30%!important'>Mesin</th><th></th><th class='text-md-right'>Harga</th></tr></thead></table></div>");
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
							
							x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td>";
							x +="<td class='text-left' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim</td>";
							x +="<td class='text-right'><button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm hint--top-left' aria-label='Klik Detail data'>Rp." + formatMoney(jual) + "</button>";
							x +="<input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></td></tr>";
							
							
						}
						table.append(x);
					}
					
				}
			}
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=0"  + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot+"&j_mesin=" + j_mesin+"&idmesin="+idmesin+"&idkertas="+0+ "&app_id=" + app_id;
			var url = host + '/sandboxm/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
		}
		
		
		function move(a) {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);
			
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					if(a=='Y'){
						$("#tablebox2").show();
						}else{
						$("#tablebox2").hide();
					}
					$("#myBar").hide();
					} else {
					width++;
					elem.style.width = width + '%';
					$("#tablebox2").hide();
					$("#myBar").show();
				}
			}
		}
		CustomStyle();
		function cekukuranam2(x) {
			CustomStyle();
			var jmlcetak = $('#jmlcetakam2').val();
			var idmesin = $('#idmesin').val();
			var bahanam2 = $('#bahanam2').val();
			var lbrcetak = document.getElementById("lbrcetakam2").value;
			var tgcetak = document.getElementById("tgcetakam2").value;
			var pilih = $("#pilih"+mod).val();
			if(pilih==1){
				idmesin = pilih;
				}else{
				idmesin = $("#idmesin").val();
			}
			if (jmlcetak == '') {
				salert('warning', 'Oops...', iMsg['J']);
				} else if (idmesin == 0) {
				salert('warning', 'Oops...', iMsg['M']);
				} else if (bahanam2 == 0) {
				salert('warning', 'Oops...', iMsg['B']);
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
					success: function(res) {
						if (res[0].toString() == 'N') {
							salert('warning', 'Oops...', iMsg['U'] +'<br>Ukuran cetak - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+res[1]+' - '+ res[2] +'x'+res[3]+' cm');
							document.getElementById("tgcetakam2").value = 11;
							document.getElementById("lbrcetakam2").value = 23;
							// alert('Ukuran Kebesaran');
							move(res[0].toString());
							} else {
							move(res[0].toString());
							 counter('Amplop Jadi');
							hitungam2(x);
						}
					}
				});
			}
			
		}
	</script>    
	
	<?php
	}//end token
	else{
		echo json_encode(array(404 => "error"));
	}
?>