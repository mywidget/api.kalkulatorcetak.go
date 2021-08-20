<?php
	if (!empty($_POST['link'])) {
	?>
	<script>
		$(document).ready(function() {
			$('.printpenawaran').hide();
			$(".alert").hide();
			$('.progress').hide();
			$('.btnon, .btnd, .btnp').prop('disabled', true);
			$('#jmlcetakam,#lbrpolyam,#tgpolyam,#jmlwarnaam,#lbrcetakam,#tgcetakam').keypress(validateNumber);
			$('.harga').hide();
			$('#ket'+mod).keyup(function() {
				$('.btnon').prop('disabled', this.value == "" ? true : false);
			})
		});
		$('.modal').on('hidden.bs.modal', function() {
			$(this).removeData('bs.modal');
		});
		
		$("#finishing1am").click(function() {
			var checked = $(this).is(':checked');
			if (checked) {
				$('#lbrpolyam').removeAttr("readonly");
				$('#tgpolyam').removeAttr("readonly");
				} else {
				$('#lbrpolyam').attr("readonly", true);
				$('#tgpolyam').attr("readonly", true);
				$('#lbrpolyam').val(1);
				$('#tgpolyam').val(1);
			}
		});
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
		$("#bahanam").filter(function() {
			$('select[data-bahanam]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih bahan</option>');
				$.ajax({
					url: $select.attr('data-bahanam'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahanam").change(function() {
			var deptid = $(this).val();
			
			$.ajax({
				url: host+'/kertas/',
				type: 'post',
				data: {depart: deptid,app_id:app_id},
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
		
		$('#lbrcetakam').val('23');
		$('#tgcetakam').val('11');
		$('#am').click(function() {
			if ($('#detailamp').length) {
				$('#detailamp').remove();
			}
		});
		
		
		function move() {
			var elem = document.getElementById("myBar");   
			var width = 1;
			var id = setInterval(frame, 10);
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					$("#tableamp").show();
					$("#myBar").hide();
					} else {
					width++; 
					elem.style.width = width + '%'; 
					$("#hidemyBar").removeClass("display-hidden");
					$("#tableamp").hide();
					$("#myBar").show();
				}
			}
		}
		function hitungam() {
			startTimer();
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
			var jml_satuan = 100;
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
			var modul = 'amplop';
			var insheet = "1";
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
			var kethitung = 'Amplop Custom';
			var ket = document.getElementById("ket"+mod).value;
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
							x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/box <button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm hint--top-left' aria-label='Klik Detail data' style='background-color:#a89726;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
						}
						table.append(x);
						} else {
						$('#tableamp').append("<div id='detailamp' class='small table-responsive'><table id='tablam' class='table'><thead ><tr class='p-0' style='background-color:#a89726;color:white' ><th  class='text-left' style='width:30%;text-align:left!important'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");
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
							
							x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/box <button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm hint--top-left' aria-label='Klik Detail data' style='background-color:#a89726;color:white;width:120px'>Rp." + formatMoney(jual) + "</button></td><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></tr>";
						}
						table.append(x);
					}
					
				}
			}
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna +"&jmlwarna2=0" + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot+ "&j_mesin=" + j_mesin + "&kethitung="+kethitung+"&idmesin=" + idmesin + "&idkertas=" + idkertas+"&app_id="+app_id;
			
			var url = host + '/sandboxm/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
		}
		CustomStyle();
		function cekukuranam() {
			var lbr = document.getElementById("lbrcetakam").value;
			var tg = document.getElementById("tgcetakam").value;
			var jmlcetak = $('#jmlcetakam').val();
			var lbrcetakam = $('#ukuran').val();
			var bahan = $('#bahanam').val();
			var pilih = $("#pilih"+mod).val();
			if(pilih==1){
				idmesin = pilih;
				}else{
				idmesin = $("#idmesin").val();
			}
			if(jmlcetak==''){
				alert('jumlah belum diisi');
				}else if(lbr==0 || tg==0){
				alert('ukuran belum diisi');
				}else if(bahan==0){
				alert('bahan belum dipilih');
				}else if(idmesin==0){
				alert('mesin belum dipilih');
				}else{
				
				
				var lem = '1.5';
				var lidah = '1.5';
				//Tentukan Ukuran Amplop
				lbrcetak = parseFloat(lbr) + (2 * parseFloat(lem));
				tgcetak = (2 * parseFloat(tg)) + parseFloat(lidah);
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						myArr = JSON.parse(xmlhttp.responseText);
						if (myArr[0].toString() == 'N') {
							alert('Ukuran Kebesaran');
							document.getElementById("tgcetakam").value = 0;
							document.getElementById("lbrcetakam").value = 0;
							return;
							} else {
							move();
							hitungam();
							counter('Amplop Custom');
						}
					}
				}
				var url=  host+'/cek/cekukuran/';
				var params = "mesin="+idmesin+"&lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak+"&app_id="+app_id;
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(params);
			}
		}
	</script>
	<?php
	}//end token
	else{
		echo json_encode(array(404 => "error 1"));
	}
?>