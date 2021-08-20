<?php
	if (!empty($_POST['link'])){
	?>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#jmlcetak").focus();
			$('.harga').hide();
			$('.printpenawaran').hide();
			$(".alert").hide();
			$('.btnon, .btnd, .btnp').prop('disabled', true);
			$('#jmlcetakk').keypress(validateNumber);
			$('#ket'+mod).keyup(function() {
				$('.btnon').prop('disabled', this.value == "" ? true : false);
			})
		});
		$('.modal').on('hidden.bs.modal', function() {
			$(this).removeData('bs.modal');
		});
		$("#ukurank").filter(function() {
			var deptid = 16;
			$.ajax({
				url: host + "/api/"+app_id+"/ukuran/kalding/16",
				type: 'POST',
				dataType: 'json',
				success: function(response) {
					var len = response.length;
					for (var i = 0; i < len; i++) {
						var id = response[i]['id'];
						var name = response[i]['name'];
						$("#ukurank").append("<option value='" + id + "'>" + name + "</option>");
					}
				}
			});
		});
		$("#ukurank").change(function () {
			var ukuran = $(this).val();
			$.ajax({
				url: host + "/cek/cariukuran/",
				type: "POST",
				data: {ukuran: ukuran,app_id:app_id},
				dataType: "json",
				success: function (response) {
					if (response[0] == 0.0) {
						$("#lbrcetakk,#tgcetakk").attr("readonly", false);
						$("#lbrcetakk").val(response[0]);
						$("#tgcetakk").val(response[1]);
						} else {
						$("#lbrcetakk,#tgcetakk").attr("readonly", true);
						$("#lbrcetakk").val(response[0]);
						$("#tgcetakk").val(response[1]);
					}
				},
			});
		});
		$('#idmesin').change(function () {
			if($(this).val() == "" || $(this).val() == '0'){
				$(".idmesin").removeClass( "has-success" ).addClass( "has-danger" );
				} else {
				$(".idmesin").removeClass( "has-danger" ).addClass( "has-success" );
				$('#not3').removeClass("blink-bg");
			}
		});
		$('#ukurank').change(function () {
			if($(this).val() == "" || $(this).val() == 0){
				$(".ukuranp").removeClass( "has-success" ).addClass( "has-danger" );
				} else {
				$(".ukuranp").removeClass( "has-danger" ).addClass( "has-success" );
				$(".lbrcetakp").removeClass( "has-danger" ).addClass( "has-success" );
				$(".tgcetakp").removeClass( "has-danger" ).addClass( "has-success" );
			}
		});
		$('#bahank').change(function () {
			if($(this).val() == "" || $(this).val() == '0'){
				$(".bahanp").removeClass( "has-success" ).addClass( "has-danger" );
				$(".idkertas").removeClass( "has-success" ).addClass( "has-danger" );
				} else {
				$(".bahanp").removeClass( "has-danger" ).addClass( "has-success" );
				$(".idkertas").removeClass( "has-danger" ).addClass( "has-success" );
				$('#not4').removeClass("blink-bg");
			}
		});
		$("#idkertas").attr("disabled", true);
		$("#idkertask").attr("disabled", true);
		$('#pilihb'+mod).on('change', function() {
			if (this.value == '2') {
				$("#idkertas").attr("disabled", false);
				$("#idkertask").attr("disabled", false);
				} else {
				$("#idkertas").attr("disabled", true);
				$("#idkertask").attr("disabled", true);
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
		$("#idmesin").filter(function () {
			$("select[data-mesin]").each(function () {
				var $select = $(this);
				$select.append('<option value="0">Pilih mesin</option>');
				$.ajax({
					url: $select.attr("data-mesin"),
					}).then(function (options) {
					options.map(function (option) {
						var $option = $("<option>");
						$option.val(option[$select.attr("data-valueKey")]).text(option[$select.attr("data-displayKey")]);
						$select.append($option);
					});
				});
			});
		});
		$('#idmesin').change(function () {
			var idnya = $(this).val();
			$.ajax({
				url: host+"/cek/mesin/",
				type: "post",
				data: {id:idnya,app_id:app_id},
				dataType: "json",
				success: function (response) {
					var len = response.jenis;
					if(len=='PrintDigital'){
						}else{
					}
				},
			});
		});
		
		$("#bahank").filter(function() {
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
		$("#bahank").change(function () {
			var deptid = $(this).val();
			$.ajax({
				url: host+"/kertas/",
				type: "post",
				data: {depart: deptid,app_id:app_id},
				dataType: "json",
				success: function (response) {
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
		$("#bahancovkal").filter(function() {
			$('select[data-sourcec]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih bahan</option>');
				$.ajax({
					url: $select.attr('data-sourcec'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahancovkal").change(function() {
			var deptid = $(this).val();
			$.ajax({
				url: host+'/kertas/',
				type: 'post',
				data: {depart: deptid,app_id:app_id},
				dataType: 'json',
				success: function(response) {
					var len = response.length;
					$("#idkertascov").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]['id'];
						var name = response[i]['name'];
						$("#idkertascov").append("<option value='" + id + "'>" + name + "</option>");
					}
				}
			});
		});
		
		function move(a) {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);
			
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					if(a=='Y'){
						$("#tablkk").show();
						}else{
						$("#tablkk").hide();
					}
					$("#myBar").hide();
					} else {
					width++;
					elem.style.width = width + '%';
					$("#tablkk").hide();
					$("#myBar").show();
				}
			}
		}
		$(document).ready(function() {
			$('#ukurank').val('16');
			$('#lbrcetakk').val('38');
			$('#tgcetakk').val('52');
			$('#bbk').val('1');
			$('.bahancovkal').hide();
			$('.warnacovkal').hide();
			$('.harga').hide();
			$('#tablkk').hide();
		})
		
		$('#covkal').click(function() {
			if ($(this).is(":checked")) {
				$('.bahancovkal').show();
				$('.warnacovkal').show();
				$('#warnacovkal').val('1');
				} else {
				$('.bahancovkal').hide();
				$('.warnacovkal').hide();
				$('#warnacovkal').val('0');
			}
		});
		
		
		
		$('#k').click(function() {
			if ($('#detailkalding').length) {
				$('#detailkalding').remove();
			}
			if ($('#detailcovkalding').length) {
				$('#detailcovkalding').remove();
			}
			
		});
		
		var totalisi = 0;
		var totalcover = 0;
		
		
		function hitungisikal() {
			startTimer();
			$(".harga").hide();
			$('.btnd, .btnp').prop('disabled', this.value == "" ? true : false);
			
			var lbrcetak = document.getElementById("lbrcetakk").value;
			var tgcetak = document.getElementById("tgcetakk").value;
			var jmlcetak = document.getElementById("jmlcetakk").value;
			var bahan = document.getElementById("bahank").value;
			var jmlwarna = document.getElementById("jmlwarnak1").value;
			var jmlwarna2 = document.getElementById("jmlwarnak2").value;
			
			if (jmlwarna != null && jmlwarna < 1) {
				alert("Jumlah Warna Minimal 1!!");
				return;
			}
			
			var lam = document.getElementById("lamk").value;
			var jmlset = document.getElementById("jmlsetk").value;
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
			
			var modul = 'kalding';
			var insheet = "1";
			var jml_satuan = 1;
			var cetak_bagi = "Y";
			var ket = document.getElementById("ket"+mod).value;
			var ket_satuan = "lbr";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
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
			var kethitung = "Isi_Kalender"
			
			//ongkos komplit
			if (document.getElementById("covkal").checked == true) {
				var jmllembar = parseInt(jmlset) + 1;
				} else {
				var jmllembar = jmlset;
			}
			
			if (jmllembar > 1) {
				finishing5 = '100';
				lbrf5 = jmllembar;
			}
			
			//jika spiral
			if (document.getElementById("finishing1k").value == '24') {
				finishing1 = document.getElementById("finishing1k").value;
				finishing2 = '75'; //Besi Hanger kalender untuk spiral
				lbrf1 = lbrcetak;
				} else if (document.getElementById("finishing1k").value == '45') {
				finishing1 = document.getElementById("finishing1k").value;
				finishing2 = '26'; //Besi Hanger kalender untuk spiral
				lbrf1 = 1;
				} else {
				finishing2 = '26'; //BIaya ngejepitnya
				finishing1 = document.getElementById("finishing1k").value;
				lbrf1 = lbrcetak;
			}
			
			//SPOT UV
			if (document.getElementById("finishing4k").checked == true) {
				finishing4 = '19';
				lbrf4 = lbrcetak;
				tgf4 = tgcetak;
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
			
			//Hitung Isinya----------------------------------------	
			// move();
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);
					// alert(myArr);
					data1 = myArr[0];
					hitcoverkal(data1);
				}
			}
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + finishing7 + "&finishing8=" + finishing8 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			
			var url = host + '/sandboxm/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(isi);
			
		}
		
		
		
		//Hitung Covernya
		function hitcoverkal(x) {
			
			var data1 = x;
			var lbrcetak = document.getElementById("lbrcetakk").value;
			var tgcetak = document.getElementById("tgcetakk").value;
			var jmlcetak = document.getElementById("jmlcetakk").value;
			var bahan = document.getElementById("bahancovkal").value;
			var lam = 0;
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
			
			var modul = 'kalding';
			var insheet = "1";
			var jml_satuan = 1;
			var cetak_bagi = "Y";
			var ket = document.getElementById("ket"+mod).value;
			var ket_satuan = "lbr";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			var idmesin = $("#idmesin").val();
			var pilimesin = $("#pilih"+mod).val();
			if(pilimesin==1){
				j_mesin='';
				}else{
				j_mesin=idmesin;
			}
			var kethitung = "Cover_Kalender";
			
			var jmlwarna = document.getElementById("warnacovkal1").value;
			var jmlwarna2 = document.getElementById("warnacovkal2").value;
			var jmlset = 1;
			
			if (document.getElementById("covkal").checked == true) {
				var idkertas = $("#idkertask").val();
				var idmesin = $("#idmesin").val();
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						myArr = JSON.parse(xmlhttp.responseText);
						data2 = myArr[0];
						hasilkalding(data1, data2);
					}
				}
				
				
				var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + finishing7 + "&finishing8=" + finishing8 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
				
				var url = host + '/sandboxm/get/';
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send(isi);
				} else {
				var data2 = {};
				hasilkalding(data1, data2);
			}
		}
		
		function hasilkalding(data1, data2) {
			if(data1['akses']=='Y'){
				if (data1['ongpot'] == 'Y') {
					ongkos_potong = data1['ongkos_potong'];
					} else {
					ongkos_potong = 0;
				}
				subtotal1 = parseInt(data1['totcetak']) + parseInt(data1['totbhn']) + parseInt(ongkos_potong) + parseInt(data1['tot_ctp']) + parseInt(data1['totlaminating']) + parseInt(data1['finishing1']) + parseInt(data1['finishing2']) + parseInt(data1['finishing3']) + parseInt(data1['finishing4']) + parseInt(data1['finishing1']) + parseInt(data1['finishing6'])+ parseInt(data1['finishing7'])+ parseInt(data1['finishing8']);
				var arrStr1 = btoa(encodeURIComponent(JSON.stringify(data1)));
				
				//data2
				if (!!(data2['hrgbhn'])) {
					if (data2['ongpot'] == 'Y') {
						ongkos_potong = data2['ongkos_potong'];
						} else {
						ongkos_potong = 0;
					}
					
					
					subtotal2 = parseInt(data2['totcetak']) + parseInt(data2['totbhn']) + parseInt(ongkos_potong) + parseInt(data2['tot_ctp']) + parseInt(data2['totlaminating']) + parseInt(data2['finishing1']) + parseInt(data2['finishing2']) + parseInt(data2['finishing3']) + parseInt(data2['finishing4']) + parseInt(data2['finishing5']) + parseInt(data2['finishing6']) + parseInt(data2['finishing7']) + parseInt(data2['finishing8']);
					var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2)));
					} else {
					var subtotal2 = '0';
					var arrStr2 = '';
				}
				
			
				subtotal = parseInt(subtotal1) + parseInt(subtotal2);
				profit = subtotal * (data1['persen'] / 100);
				grandtotal = subtotal + profit;	
				hargasatuan = Math.ceil(grandtotal / $('#jmlcetakk').val());
				
				// alert(arrStr1);
				$('#data1').val(arrStr1);
				$('#data2').val(arrStr2);
				$('#jumlahcetak').val($('#jmlcetakk').val());
				$('#mesinc').html(data1['mesin']);
				$('#ket').val(ket);
				$('#totjual').html("Rp. " + formatMoney(grandtotal));
				$('#satuan').html("Rp. " + formatMoney(hargasatuan) + "/pcs");
				$('#tablkk').show();
				}else{
				$('#tablkk').hide();
			}
		}
		
		CustomStyle();
		$("#cekukuran").click(function() {
			var jmlcetak = $('#jmlcetakk').val();
			var ukuran = $('#ukurank').val();
			var bahan = $('#bahank').val();
			var idmesin = $("#idmesin").val();
			var pilih = $("#pilih"+mod).val();
			if(pilih==1){
				idmesin = pilih;
				}else{
				idmesin = $("#idmesin").val();
			}
			if (jmlcetak == '') {
				salert('warning', 'Oops...', iMsg['J']);
				} else if (ukuran == 0) {
				salert('warning', 'Oops...', iMsg['U']);
				} else if (bahan == 0) {
				salert('warning', 'Oops...', iMsg['B']);
				} else {
				var bleed = $('#tarikank').val();
				var lbrcetak = parseFloat($('#lbrcetakk').val()) + (2 * parseFloat(bleed));
				var tgcetak = parseFloat($('#tgcetakk').val()) + (2 * parseFloat(bleed));
				$.ajax({
					url: host+'/cekm/cekukuran/',
					type: 'POST',
					data: {
						mesin: idmesin,
						lbrcetak: lbrcetak,
						tgcetak: tgcetak,
						app_id: app_id
					},
					dataType: 'json',
					beforeSend: function () {
						move('N');
						CustomStyle();
					},
					success: function(res) {
						if (res[0].toString() == 'N') {
							salert('warning', 'Oops...', iMsg['U'] +'<br>Ukuran cetak - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+res[1]+' - '+ res[2] +'x'+res[3]+' cm');
							move(res[0].toString());
							} else {
							move('Y');
							hitungisikal();
							 counter('Kalender Dinding');
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