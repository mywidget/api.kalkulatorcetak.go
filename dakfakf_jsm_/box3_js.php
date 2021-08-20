<?php
	if (!empty($_POST['link'])){
	?>
	<script type="text/javascript">
		CustomStyle();
		$("#idkertas").attr("disabled", true);
		$('#pilihb'+mod).on('change', function() {
			if (this.value == '2') {
				$("#idkertas").attr("disabled", false);
				} else {
				$("#idkertas").attr("disabled", true);
			}
		});
		$("#idmesin").attr("disabled", true);
		$('#pilih'+mod).on('change', function() {
			if (this.value == '2') {
				$("#idmesin").attr("disabled", false);
				} else {
				$("#idmesin").attr("disabled", true);
			}
		});
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
			startTimer();
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
			var idmesin = $("#idmesin").val();
			var pilimesin = $("#pilih"+mod).val();
			if(pilimesin==1){
				j_mesin='';
				}else{
				j_mesin=idmesin;
			}
			var idkertas = $("#idkertas").val();
			var pilihbahan = $("#pilihb"+mod).val();
			if(pilihbahan==1){
				idkertas=0;
				}else{
				idkertas=idkertas;
			}
			var kethitung = '';
			
			//Pond
			lbrf3 = lbrcetak / jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
			tgf3 = tgcetak;
			finishing2 = '12'; //Biaya Pon
			var pilihpond = $("#pilihpond").val();
			finishing3 = pilihpond; // Pisau Pon
			
			if (document.getElementById("pond" + mod).checked == true) {
				lbrpondoffset = document.getElementById("lbrpond" + mod).value;
				tgpondoffset = document.getElementById("tgpond" + mod).value;
				finishing6 = '12'; //Press pond
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
					$("#table_box").html("");
					if(data[0]['akses']=='Y'){
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
								if(jmlcetak > rim){
									perrim = satuan * rim;
									perrim = "Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim";
									}else{
									perrim = satuan;
									perrim = "Rp. " + formatMoney(satuan) + "/pcs";
								}
								
								var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
								
								x += "<tr class='text-md-left'><td>" + data[i]['mesin'] + "</td><td class='text-md-right' >"+perrim+ "<button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm hint--top-left' aria-label='Klik Detail data' style='background-color:<?= $warnabar; ?>;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
								
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
								
								x += "<tr class='text-md-left'><td>" + data[i]['mesin'] + "</td><td class='text-md-right' >"+perrim+ "<button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm hint--top-left' aria-label='Klik Detail data' style='background-color:<?= $warnabar; ?>;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
							}
							
							table.append(x);
						}
						}else{
						// $("#table_box1").hide();
						$("#table_box").html("<div class='small'>Data tidak ditemukan</div>");
					}
					
				}
			}
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + finishing7 + "&finishing8=" + finishing8 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			
			var url = host + '/sandboxm/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
		}
		
		$("#cekukuranbox3").click(function() {
			var jmlcetak = $('#jmlcetakbox3').val(),
			bahan = $("#bahan"+mod).val();
			var m = $("#pilih"+mod).val();
			if(m==1){
				idmesin = m;
				}else{
				idmesin = $("#idmesin").val();
			}
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
					url: host + "/cekm/cekukuran/",
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
							 counter('Box 3');
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