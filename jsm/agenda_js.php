<?php
	if (!empty($_POST['link'])){
	?>
	<script type="text/javascript">
		$('.harga').hide();
		$('.printpenawaran').hide();
		$('#print_foot').hide();
		$('#jmlcetakag').keypress(validateNumber);
		$(".alert").hide();
		$('.btnon, .btnd, .btnp').prop('disabled', true);
		$('#jmlcetakag').keypress(validateNumber);
		$('#ketbuku').keyup(function() {
			$('.btnon,.btnd,.btnp').prop('disabled', this.value == "" ? true : false);
		})
		$('#lbrcetakbu,#tgcetakbu').attr('readonly', true);
		function move() {
			var elem = document.getElementById("myBar");   
			var width = 1;
			var id = setInterval(frame, 10);
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					$("#tablebox1").show();
					$("#myBar").hide();
					} else {
					width++; 
					elem.style.width = width + '%'; 
					$("#tablebox1").hide();
					$("#myBar").show();
				}
			}
		}
		
		
		$('#lbrcetakbu').val('21');
		$('#tgcetakbu').val('29.7');
		$("#ukuranbu").filter(function() {
			var deptid = 10;
			$.ajax({
				url: host + "/api/"+app_id+"/ukuran/agenda/11",
				type: 'GET',
				dataType: 'json',
				success: function(response) {
					var len = response.length;
					for (var i = 0; i < len; i++) {
						var id = response[i]['id'];
						var name = response[i]['name'];
						$("#ukuranbu").append("<option value='" + id + "'>" + name + "</option>");
					}
				}
			});
		});
		
		$("#ukuranbu").change(function() {
			var ukuran = $(this).val();
			$.ajax({
				url: host + "/cek/cariukuran/",
				type: 'POST',
				data: {ukuran: ukuran,app_id:app_id},
				dataType: 'json',
				success: function(response) {
					if (response[0] == 0.0) {
						$('#lbrcetakbu,#tgcetakbu').attr('readonly', false);
						$('#lbrcetakbu').val(response[0]);
						$('#lbrcoverbu').val(response[0]);
						$('#tgcetakbu').val(response[1]);
						$('#tgcoverbu').val(response[1]);
						} else {
						$('#lbrcetakbu,#tgcetakbu').attr('readonly', true);
						$('#lbrcetakbu').val(response[0]);
						$('#lbrcoverbu').val(response[0]);
						$('#tgcetakbu').val(response[1]);
						$('#tgcoverbu').val(response[1]);
					}
				}
			});
		});
		
		
		$("#bahanbu1").filter(function() {
			$('select[data-bahanbu1]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih bahan</option>');
				$.ajax({
					url: $select.attr('data-bahanbu1'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahanbu1").change(function () {
			var deptid = $(this).val();
			$.ajax({
				url: host+"/kertas/",
				type: "post",
				data: {depart: deptid,app_id:app_id},
				dataType: "json",
				success: function (response) {
					var len = response.length;
					$("#idkertasbu1").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]["id"];
						var name = response[i]["name"];
						$("#idkertasbu1").append("<option value='" + id + "'>" + name + "</option>");
					}
				},
			});
		});
		
		$("#j_mesin1").filter(function() {
			$('select[data-mesin]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih mesin isi 1</option>');
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
		$("#bahanbu2").filter(function() {
			$('select[data-bahanbu2]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih bahan</option>');
				$.ajax({
					url: $select.attr('data-bahanbu2'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahanbu2").change(function () {
			var deptid = $(this).val();
			$.ajax({
				url: host+"/kertas/",
				type: "post",
				data: {depart: deptid,app_id:app_id},
				dataType: "json",
				success: function (response) {
					var len = response.length;
					$("#idkertasbu2").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]["id"];
						var name = response[i]["name"];
						$("#idkertasbu2").append("<option value='" + id + "'>" + name + "</option>");
					}
				},
			});
		});
		$("#j_mesin2").filter(function() {
			$('select[data-mesin2]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih mesin isi 2</option>');
				$.ajax({
					url: $select.attr('data-mesin2'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahanbu3").filter(function() {
			$('select[data-bahanbu3]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih bahan</option>');
				$.ajax({
					url: $select.attr('data-bahanbu3'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahanbu3").change(function () {
			var deptid = $(this).val();
			$.ajax({
				url: host+"/kertas/",
				type: "post",
				data: {depart: deptid,app_id:app_id},
				dataType: "json",
				success: function (response) {
					var len = response.length;
					$("#idkertasbu3").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]["id"];
						var name = response[i]["name"];
						$("#idkertasbu3").append("<option value='" + id + "'>" + name + "</option>");
					}
				},
			});
		});
		$("#j_mesin3").filter(function() {
			$('select[data-mesin3]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih mesin isi 3</option>');
				$.ajax({
					url: $select.attr('data-mesin3'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahancovbu").filter(function() {
			$('select[data-bahancovbu]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih bahan</option>');
				$.ajax({
					url: $select.attr('data-bahancovbu'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahancovbu").change(function () {
			var deptid = $(this).val();
			$.ajax({
				url: host+"/kertas/",
				type: "post",
				data: {depart: deptid,app_id:app_id},
				dataType: "json",
				success: function (response) {
					var len = response.length;
					$("#idkertascov").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]["id"];
						var name = response[i]["name"];
						$("#idkertascov").append("<option value='" + id + "'>" + name + "</option>");
					}
				},
			});
		});
		$("#j_mesincov").filter(function() {
			$('select[data-j_mesincov]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih mesin cover</option>');
				$.ajax({
					url: $select.attr('data-j_mesincov'),
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
			
			$('#ukuranbu').val('11');
			$('#lbrcetakbu').val('14.8');
			$('#tgcetakbu').val('21');
			$('#lbrcoverbu').val('14.8');
			$('#bahancovbu').val('5');
			$('#tgcoverbu').val('21');
			$('.lbrlembuku').hide();
			$('.botbuku').hide();
			$('#lbrlembuku').val('1.5');
			$('#lebpungbu').prop('readonly', true);
			$('#autopunggung').attr('checked', 'checked');
			$('#isisama1').attr('checked', 'checked');
			$('#tablebuku').hide();
			
			$('.isi2').hide();
			$('.isi3').hide();
			$('.more4').hide();
			
			$('.harga').hide();
			
		})
		
		
		$('#jmlcetakag').on('change', function() {
			$('#jumlahcetakbuku').val($('#jmlcetakag').val());
		})
		
		
		
		$('#jilidbu').on('change', function() {
			if (this.value == '2') {
				$('.lbrlembuku').show();
				$('.botbuku').show();
				$("#ganticol").removeClass( "col-md-12" ).addClass( "col-md-6" );
				} else {
				$('.lbrlembuku').hide();
				$('.botbuku').hide();
				$("#ganticol").removeClass( "col-md-6" ).addClass( "col-md-12" );
			}
		});
		
		
		$('#autopunggung').click(function() {
			if ($('#lebpungbu').is("[readonly]")) {
				$('#lebpungbu').prop('readonly', false);
				} else {
				$('#lebpungbu').prop('readonly', true);
			}
		});
		
		
		
		
		$('#more1').click(function() {
			if ($('.isi1').is(":hidden")) {
				$('.isi1').show();
				$("#more1").removeClass("ni ni-bold-down").addClass("ni ni-bold-up");
				} else {
				$('.isi1').hide();
				$("#more1").removeClass("ni ni-bold-up").addClass("ni ni-bold-down");
			}
		});
		$('#more2').click(function() {
			if ($('.isi2').is(":hidden")) {
				$('.isi2').show();
				$("#more2").removeClass("ni ni-bold-down").addClass("ni ni-bold-up");
				} else {
				$('.isi2').hide();
				$("#more2").removeClass("ni ni-bold-up").addClass("ni ni-bold-down");
			}
		});
		
		$('#more3').click(function() {
			if ($('.isi3').is(":hidden")) {
				$('.isi3').show();
				$("#more3").removeClass("ni ni-bold-down").addClass("ni ni-bold-up");
				} else {
				$('.isi3').hide();
				$("#more3").removeClass("ni ni-bold-up").addClass("ni ni-bold-down");
			}
		});
		$('#more4').click(function() {
			if ($('.more4').is(":hidden")) {
				$('.more4').show();
				$("#more4").removeClass("ni ni-bold-down").addClass("ni ni-bold-up");
				} else {
				$('.more4').hide();
				$("#more4").removeClass("ni ni-bold-up").addClass("ni ni-bold-down");
			}
		});
		
		
		
		
		function hitungbu1() {
			startTimer();
			$('#button').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
			$('#hasilhitung').hide();
			$('#tablebuku').hide();
			$('.harga').hide();
			
			
			//Isi Warna	
			var bleed = document.getElementById("bleedbu1").value;
			var lbrcetak = document.getElementById("lbrcetakbu").value;
			var tgcetak = document.getElementById("tgcetakbu").value;
			var jmlcetak = document.getElementById("jmlcetakag").value;
			var jilidbu = document.getElementById("jilidbu").value;
			var posjilidbu = document.getElementById("posjilidbu").value;
			
			
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
			
			if (document.getElementById("isisama1").checked == true) {
				var jmlset = 1;
				var jmlcetak = parseInt(jmlcetak) * parseInt(document.getElementById("jmlhalbu1").value);
				} else {
				var jmlset = document.getElementById("jmlhalbu1").value;
			}
			if (document.getElementById("minioffsetisi1").checked == true) {
				var j_mesin = 'MiniOffset';
				var idmesin = 0;
				} else {
				var j_mesin = document.getElementById("j_mesin1").value;
				var idmesin = j_mesin;
			}
			
			if (jilidbu > 2) {
				if (document.getElementById("isisama1").checked == true) {
					jmlcetak = parseFloat(jmlcetak) / 2;
					lbrcetak = parseFloat(lbrcetak) + (2 * parseFloat(bleed));
					tgcetak = parseFloat(tgcetak) + (2 * parseFloat(bleed));
					} else {
					lbrcetak = parseFloat(lbrcetak) + parseFloat(bleed);
					tgcetak = parseFloat(tgcetak) + (2 * parseFloat(bleed));
					//jmlset = jmlset / 2;
				}
				} else {
				lbrcetak = parseFloat(lbrcetak) + (2 * parseFloat(bleed));
				tgcetak = parseFloat(tgcetak) + (2 * parseFloat(bleed));
			}
			//		alert("set : " + jmlset + " lbr: " + lbrcetak + " jml: " + jmlcetak);
			
			var bahan = document.getElementById("bahanbu1").value;
			var bb = ""; //document.getElementById("bbbu1").value;
			var jmlwarna = document.getElementById("jmlwarnabu1").value;
			var jmlwarna2 = document.getElementById("jmlwarnabu12").value;
			if (jmlwarna != null && jmlwarna < 1) {
				alert("Jumlah Warna Minimal 1!! " + jmlwarna);
				return;
			}
			var lam = document.getElementById("lambu1").value;
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
			//global
			var lbrf7 = 0;
			var tgf7 = 0;
			var lbrf8 = 0;
			var tgf8 = 0;
			var lbrf9 = 0;
			var tgf9 = 0;
			var lbrf10 = 0;
			var tgf10 = 0;
			//
			var finishing6 = '0';
			var finishing1 = 0;
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			
			var modul = 'agenda';
			var insheet = "1";
			var jml_satuan = 1;
			var cetak_bagi = "Y";
			var ket_satuan = "agenda";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			var kethitung = 'Isi_Agenda_1';
			var ongkos_lipat = 'Y';
			var idkertas = $('#idkertasbu1').val();
			
			
			
			
			
			//	alert(jmlcetak);
			//Hitung Isinya----------------------------------------	
			var xmlhttp = new XMLHttpRequest();
			
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					
					//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
					myArr = JSON.parse(xmlhttp.responseText);
					data = myArr;
					
					// var tc = (data[0]['jmlcetak']).split("|"); //Jika ada 2 data 									
					// if (tc.length == 2) {
						// var arr = myArr[0];
						// var a = "";
						// var aa = "";
						// var b = "";
						// for (var key in arr) {
							// // skip loop if the property is from prototype
							// var obj = arr[key];
							// if (arr.hasOwnProperty(key)) {
								// dat = b + obj;
								// a += '"' + key + '"' + ':' + '"' + dat.toString().split("|", 1) + '",';
								
								// var n = dat.toString().indexOf("|");
								// var dat2 = dat.substring(n + 1, dat.length);
								// aa += '"' + key + '"' + ':' + '"' + dat2 + '",';
							// }
						// }
						
						// var newStr = a.substring(0, a.length - 1);
						// var newStr2 = aa.substring(0, aa.length - 1);
						// var data1 = JSON.parse("{" + newStr + "}");
						// var data2 = JSON.parse("{" + newStr2 + "}");
						
						
						// hitungbu2(data1, data2);
						
						// } else {
						var data1 = myArr[0];
						var data2 = {};
						hitungbu2(data1, data2);
					// }
				}
			}
			
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2="+jmlwarna2+"&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=0&finishing8=0&finishing9=0&finishing10=0&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&kethitung=" + kethitung + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&tarikan=" + 0 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&lbrf8=" + lbrf8 + "&tgf8=" + tgf8 + "&lbrf9=" + lbrf9 + "&tgf9=" + tgf9 + "&lbrf10=" + lbrf10 + "&tgf10=" + tgf10 + "&pakeplat=" + 0 + "&ongkos_lipat=Y&jilid="+posjilidbu+"&app_id="+app_id;
			
			//09/08/2020
			var url = host+'/sandboxm/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
			
		}
		
		function hitungbu2(r, s) {
			
			var posjilidbu = document.getElementById("posjilidbu").value;
			data1 = r;
			data2 = s;
			//$('#ketbuku').val(JSON.stringify(data1));	
			jmlwarna = document.getElementById("jmlwarnabu2").value;
			jmlwarna2 = document.getElementById("jmlwarnabu22").value;
			
			if (jmlwarna != null && jmlwarna < 1) {
				var data3 = {};
				var data4 = {};
				hitungbu3(data1, data2, data3, data4);
				//$('#ketbuku').val(JSON.stringify(data1['totcetak']));	
				} else {
				
				
				
				var bleed = document.getElementById("bleedbu1").value;
				var lbrcetak = document.getElementById("lbrcetakbu").value;
				var tgcetak = document.getElementById("tgcetakbu").value;
				var jmlcetak = document.getElementById("jmlcetakag").value;
				var jilidbu = document.getElementById("jilidbu").value;
				
				
				if (document.getElementById("isisama2").checked == true) {
					var jmlset = 1;
					var jmlcetak = parseInt(jmlcetak) * parseInt(document.getElementById("jmlhalbu2").value);
					} else {
					var jmlset = document.getElementById("jmlhalbu2").value;
				}
				if (document.getElementById("minioffsetisi2").checked == true) {
					var j_mesin = 'MiniOffset';
					var idmesin = 0;
					} else {
					var j_mesin = document.getElementById("j_mesin2").value;
					var idmesin = $('#j_mesin2').val();
				}
				jmlhal2 = document.getElementById("jmlhalbu2").value;
				if (jmlhal2 < 1 && jmlhal2 != null) {
					alert(" Isi dahulu jumlah halaman isi agenda 2!!");
					return;
				}
				
				
				if (jilidbu > 2) {
					if (document.getElementById("isisama1").checked == true) {
						jmlcetak = parseFloat(jmlcetak) / 2;
						lbrcetak = parseFloat(lbrcetak) + (2 * parseFloat(bleed));
						tgcetak = parseFloat(tgcetak) + (2 * parseFloat(bleed));
						} else {
						lbrcetak = parseFloat(lbrcetak) + parseFloat(bleed);
						tgcetak = parseFloat(tgcetak) + (2 * parseFloat(bleed));
						//jmlset = jmlset / 2;
					}
					} else {
					lbrcetak = parseFloat(lbrcetak) + (2 * parseFloat(bleed));
					tgcetak = parseFloat(tgcetak) + (2 * parseFloat(bleed));
				}
				
				
				
				var bahan = document.getElementById("bahanbu2").value;
				var bb = ""; //document.getElementById("bbbu2").value;
				
				var lam = document.getElementById("lambu2").value;
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
				//global
				var lbrf7 = 0;
				var tgf7 = 0;
				var lbrf8 = 0;
				var tgf8 = 0;
				var lbrf9 = 0;
				var tgf9 = 0;
				var lbrf10 = 0;
				var tgf10 = 0;
				//
				var finishing6 = '0';
				var finishing1 = 0;
				var finishing2 = 0;
				var finishing3 = 0;
				var finishing4 = 0;
				var finishing5 = 0;
				var finishing6 = 0;
				
				var modul = 'agenda';
				var insheet = "1";
				var jml_satuan = 1;
				var cetak_bagi = "Y";
				var ket_satuan = "agenda";
				var rim = 500;
				var box = 100;
				var ongpot = 'Y';
				var kethitung = "Isi_agenda_2";
				var idkertas = $('#idkertasbu2').val();
				
				
				if (lbrcetak != null && lbrcetak < 1) {
					alert(" Lebar Cetakan Kosong!!");
					return;
				}
				if (tgcetak != null && tgcetak < 1) {
					alert("Tinggi Cetakan Kosong!!");
					return;
				}
				//	alert(j_mesin);
				//Hitung Isinya----------------------------------------	
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						
						//	$(".progress-bar").css('width','40%');  		
						
						myArr = JSON.parse(xmlhttp.responseText);
						data = myArr;
						//$('#ketbuku').val(JSON.stringify(myArr));				
						
						// var tc = (data[0]['jmlcetak']).split("|"); //Jika ada 2 data 									
						// if (tc.length == 2) {
							// var arr = myArr[0];
							// var a = "";
							// var aa = "";
							// var b = "";
							// for (var key in arr) {
								// // skip loop if the property is from prototype
								// var obj = arr[key];
								// if (arr.hasOwnProperty(key)) {
									// dat = b + obj;
									// a += '"' + key + '"' + ':' + '"' + dat.toString().split("|", 1) + '",';
									
									// var n = dat.toString().indexOf("|");
									// var dat2 = dat.substring(n + 1, dat.length);
									// aa += '"' + key + '"' + ':' + '"' + dat2 + '",';
								// }
							// }
							
							// var newStr = a.substring(0, a.length - 1);
							// var newStr2 = aa.substring(0, aa.length - 1);
							// var data3 = JSON.parse("{" + newStr + "}");
							// var data4 = JSON.parse("{" + newStr2 + "}");
							
							
							// } else {
							var data3 = myArr[0];
							var data4 = {};
							
						// }
						hitungbu3(data1, data2, data3, data4);
						
						
					}
				}
				
				var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2="+jmlwarna2+"&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=0&finishing8=0&finishing9=0&finishing10=0&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&kethitung=" + kethitung + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&tarikan=" + 0 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&lbrf8=" + lbrf8 + "&tgf8=" + tgf8 + "&lbrf9=" + lbrf9 + "&tgf9=" + tgf9 + "&lbrf10=" + lbrf10 + "&tgf10=" + tgf10 + "&pakeplat=" + 0 + "&ongkos_lipat=Y&jilid="+posjilidbu+"&app_id="+app_id;
				
				//09/08/2020
				var url = host+'/sandboxm/get/';
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(isi);
			}
			
		}
		
		
		function hitungbu3(r, s, t, u) {
			
			var posjilidbu = document.getElementById("posjilidbu").value;
			data1 = r;
			data2 = s;
			data3 = t;
			data4 = u;
			//$('#ketbuku').val(JSON.stringify(data1));	
			jmlwarna = document.getElementById("jmlwarnabu3").value;
			jmlwarna2 = document.getElementById("jmlwarnabu32").value;
			if (jmlwarna != null && jmlwarna < 1) {
				var data5 = {};
				var data6 = {};
				hitungcoverbu(data1, data2, data3, data4, data5, data6);
				//$('#ketbuku').val(JSON.stringify(data4['totcetak']));	
				} else {
				
				var bleed = document.getElementById("bleedbu1").value;
				var lbrcetak = document.getElementById("lbrcetakbu").value;
				var tgcetak = document.getElementById("tgcetakbu").value;
				var jmlcetak = document.getElementById("jmlcetakag").value;
				var jilidbu = document.getElementById("jilidbu").value;
				
				
				if (document.getElementById("isisama3").checked == true) {
					var jmlset = 1;
					var jmlcetak = parseInt(jmlcetak) * parseInt(document.getElementById("jmlhalbu3").value);
					} else {
					var jmlset = document.getElementById("jmlhalbu3").value;
				}
				if (document.getElementById("minioffsetisi3").checked == true) {
					var j_mesin = 'MiniOffset';
					var idmesin = 0;
					} else {
					var j_mesin = document.getElementById("j_mesin3").value;
					var idmesin = j_mesin;
				}
				jmlhal3 = document.getElementById("jmlhalbu3").value;
				if (jmlhal3 < 1 && jmlhal3 != null) {
					alert(" Isi dahulu jumlah halaman isi agenda3!!");
					return;
				}
				
				
				if (jilidbu > 2) {
					if (document.getElementById("isisama1").checked == true) {
						jmlcetak = parseFloat(jmlcetak) / 2;
						lbrcetak = parseFloat(lbrcetak) + (2 * parseFloat(bleed));
						tgcetak = parseFloat(tgcetak) + (2 * parseFloat(bleed));
						} else {
						lbrcetak = parseFloat(lbrcetak) + parseFloat(bleed);
						tgcetak = parseFloat(tgcetak) + (2 * parseFloat(bleed));
						//jmlset = jmlset / 2;
					}
					} else {
					lbrcetak = parseFloat(lbrcetak) + (2 * parseFloat(bleed));
					tgcetak = parseFloat(tgcetak) + (2 * parseFloat(bleed));
				}
				
				var bahan = document.getElementById("bahanbu3").value;
				var bb = ""; //document.getElementById("bbbu3").value;
				
				var lam = document.getElementById("lambu3").value;
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
				//global
				var lbrf7 = 0;
				var tgf7 = 0;
				var lbrf8 = 0;
				var tgf8 = 0;
				var lbrf9 = 0;
				var tgf9 = 0;
				var lbrf10 = 0;
				var tgf10 = 0;
				//
				var finishing6 = '0';
				var finishing1 = 0;
				var finishing2 = 0;
				var finishing3 = 0;
				var finishing4 = 0;
				var finishing5 = 0;
				var finishing6 = 0;
				
				var modul = 'agenda';
				var insheet = "1";
				var jml_satuan = 1;
				var cetak_bagi = "Y";
				var ket_satuan = "agenda";
				var rim = 500;
				var box = 100;
				var ongpot = 'Y';
				var kethitung = "Isi_agenda_3";
				var idkertas = $('#idkertasbu3').val();
				
				
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
				//	alert(j_mesin);
				//Hitung Isinya----------------------------------------	
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						//	$(".progress-bar").css('width','60%'); 
						myArr = JSON.parse(xmlhttp.responseText);
						data = myArr;
						//$('#ketbuku').val(JSON.stringify(myArr));				
						
						// var tc = (data[0]['jmlcetak']).split("|"); //Jika ada 2 data 									
						// if (tc.length == 2) {
							// var arr = myArr[0];
							// var a = "";
							// var aa = "";
							// var b = "";
							// for (var key in arr) {
								// // skip loop if the property is from prototype
								// var obj = arr[key];
								// if (arr.hasOwnProperty(key)) {
									// dat = b + obj;
									// a += '"' + key + '"' + ':' + '"' + dat.toString().split("|", 1) + '",';
									
									// var n = dat.toString().indexOf("|");
									// var dat2 = dat.substring(n + 1, dat.length);
									// aa += '"' + key + '"' + ':' + '"' + dat2 + '",';
								// }
							// }
							
							// var newStr = a.substring(0, a.length - 1);
							// var newStr2 = aa.substring(0, aa.length - 1);
							// var data5 = JSON.parse("{" + newStr + "}");
							// var data6 = JSON.parse("{" + newStr2 + "}");
							
						
							// } else {
							var data5 = myArr[0];
							var data6 = {};
							
						// }
						hitungcoverbu(data1, data2, data3, data4, data5, data6);
						
						
					}
				}
				
				var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2="+jmlwarna2+"&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=0&finishing8=0&finishing9=0&finishing10=0&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&kethitung=" + kethitung + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&tarikan=" + 0 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&lbrf8=" + lbrf8 + "&tgf8=" + tgf8 + "&lbrf9=" + lbrf9 + "&tgf9=" + tgf9 + "&lbrf10=" + lbrf10 + "&tgf10=" + tgf10 + "&pakeplat=" + 0 + "&ongkos_lipat=Y&jilid="+posjilidbu+"&app_id="+app_id;
				
				//09/08/2020
				var url = host+'/sandboxm/get/';
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(isi);
			}
			
		}
		
		
		
		function hitungcoverbu(r, s, t, u, v, w) {
			data1 = r;
			data2 = s;
			data3 = t;
			data4 = u;
			data5 = v;
			data6 = w;
			//Isi Warna	
			
			var bleed = document.getElementById("bleedbu1").value;
			var lbrcetak = document.getElementById("lbrcetakbu").value;
			var tgcetak = document.getElementById("tgcetakbu").value;
			var jmlcetak = document.getElementById("jmlcetakag").value;
			var jilidbu = document.getElementById("jilidbu").value;
			var jmlset = 1;
			// var j_mesin = document.getElementById("j_mesincov").value;
			
			//Ketebalan Buku (0.0013 x gramatur kertas) x (jumlah halaman / 2) mm
			//Konvert nama bahan kedalam number untuk mengambil angkanya saja
			
			var txt1 = document.getElementById("bahanbu1").value;
			var gramasi1 = txt1.match(/\d/g);
			gramasi1 = gramasi1.join("");
			var txt2 = document.getElementById("bahanbu2").value;
			var gramasi2 = txt2.match(/\d/g);
			gramasi2 = gramasi2.join("");
			var txt3 = document.getElementById("bahanbu3").value;
			var gramasi3 = txt2.match(/\d/g);
			gramasi3 = gramasi3.join("");
			
			var jmlhal1 = document.getElementById("jmlhalbu1").value;
			var jmlhal2 = document.getElementById("jmlhalbu2").value;
			var jmlhal3 = document.getElementById("jmlhalbu3").value;
			
			var tblbuku1 = (0.0013 * gramasi1) * (jmlhal1 / 2);
			var tblbuku2 = (0.0013 * gramasi2) * (jmlhal2 / 2);
			var tblbuku3 = (0.0013 * gramasi3) * (jmlhal3 / 2);
			
			
			if (document.getElementById("autopunggung").checked == true) {
				tblbuku = parseFloat(tblbuku1) + parseFloat(tblbuku2) + parseFloat(tblbuku3);
				$('#lebpungbu').val(tblbuku);
				} else {
				tblbuku = $('#lebpungbu').val();
			}
			
			
			
			
			if (jilidbu == '1') {
				finishing1 = 23;
				lbrf1 = tgcetak * tblbuku;
				tgf1 = 1;
				} else if (jilidbu == '2') {
				finishing1 = 24;
				lbrf1 = 1;
				tgf1 = 1;
				} else if (jilidbu == '3') {
				finishing1 = 48;
				lbrf1 = 1;
				tgf1 = 1;
				} else {
				finishing1 = 47;
				lbrf1 = 1;
				tgf1 = 1;
			}
			
			
			
			
			
			tgcetak = parseFloat(tgcetak) + (2 * parseFloat(bleed));
			lbrcetak = (lbrcetak * 2) + parseInt(Math.ceil(tblbuku)) + (2 * parseFloat(bleed));
			//Jilid Hardcover
			jenisjilidbu = document.getElementById("jenisjilidbu").value;
			if (jenisjilidbu == '2') {
				lbrcetak = parseFloat(lbrcetak) + (parseFloat(document.getElementById("lbrlembuku").value) * 2);
				tgcetak = parseFloat(tgcetak) + (parseFloat(document.getElementById("lbrlembuku").value) * 2);
			}
			
			var bahan = document.getElementById("bahancovbu").value;
			var bb = ""; //document.getElementById("bbcovbu").value;
			var jmlwarna = document.getElementById("jmlwarnacovbu").value;
			var jmlwarna2 = document.getElementById("jmlwarnacovbu2").value;
			
			
			var lam = document.getElementById("lamcovbu").value;
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
			//global
			var lbrf8 = 0;
			var tgf8 = 0;
			var lbrf9 = 0;
			var tgf9 = 0;
			var lbrf10 = 0;
			var tgf10 = 0;
			//
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = '101';
			var finishing7 = '0';
			
			var modul = 'agenda';
			var insheet = "1";
			var jml_satuan = 1;
			var cetak_bagi = "Y";
			var ket_satuan = "lbr";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			var j_mesin = '';
			var kethitung = "Cover";
			var idmesin = 0;
			var idkertas = $("#idkertascov").val();
			
			//	alert(jmlset);
			
			
			//alert(lbrcetak + 'x' + tgcetak);		
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);
					
					var data7 = myArr[0];
					hitungbotbuku(data1, data2, data3, data4, data5, data6, data7);
					
				}
			}
		
			var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&finishing7="+finishing7+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&lbrf7="+lbrf7+"&tgf7="+tgf7+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung+"&app_id="+app_id;
			//09/08/2020
			var url = host+'/sandboxm/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
			
		}
		
		function hitungbotbuku(r, s, t, u, v, w, x) {
			data1 = r;
			data2 = s;
			data3 = t;
			data4 = u;
			data5 = v;
			data6 = w;
			data7 = x;
			
			
			var jmlcetak = document.getElementById("jmlcetakag").value;
			var jml_satuan = 1;
			var modul = 'agenda';
			var insheet = "1";
			var cetak_bagi = "Y";
			var ket_satuan = "lbr";
			var ongpot = 'Y';
			var rim = 500;
			var kethitung = "Bot Agenda";
			
			var jenisjilidbu = document.getElementById("jenisjilidbu").value;
			if (jenisjilidbu == '2') {
				var lbrcetak = (parseFloat(document.getElementById("lbrcetakbu").value) * 2) + parseFloat(document.getElementById("lebpungbu").value);
				var tgcetak = document.getElementById("tgcetakbu").value;
				var bahan = document.getElementById("botbuku").value;
				var jmlwarna = 0;
				
				var lam = 0;
				var bb = 1;
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
				//global
				var lbrf7 = 0;
				var tgf7 = 0;
				var lbrf8 = 0;
				var tgf8 = 0;
				var lbrf9 = 0;
				var tgf9 = 0;
				var lbrf10 = 0;
				var tgf10 = 0;
				//
				var finishing1 = 0;
				var finishing2 = 0;
				var finishing3 = 0;
				var finishing4 = 0;
				var finishing5 = 0;
				var finishing6 = '0';
				var j_mesin = '';
				
				
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						
						myArr = JSON.parse(xmlhttp.responseText);
						data8 = myArr[0];
						hasilbuku(data1, data2, data3, data4, data5, data6, data7, data8);
					}
				}
				var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung+"&app_id="+app_id;
				
				//09/08/2020
				var url = host+'/sandboxm/get/';
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(isi);
				} else {
				var data8 = {};
				hasilbuku(data1, data2, data3, data4, data5, data6, data7, data8);
			}
			
		}
		
		function hasilbuku(data1, data2, data3, data4, data5, data6, data7, data8) {
			var jmlcetak = parseInt(document.getElementById("jmlcetakag").value);
			var ket = document.getElementById("ketbuku").value;
			
			//	alert(jmlcetak + " - " + hargacover);
			
			//data1
			if (data1['ongpot'] == 'Y') {
				ongkos_potong = data1['ongkos_potong'];
				} else {
				ongkos_potong = 0;
			}
			
			subtotal1 = parseInt(data1['totcetak']) + parseInt(data1['totbhn']) + parseInt(ongkos_potong) + parseInt(data1['tot_ctp']) + parseInt(data1['totlaminating']) + parseInt(data1['finishing1']) + parseInt(data1['finishing2']) + parseInt(data1['finishing3']) + parseInt(data1['finishing4']) + parseInt(data1['finishing5']) + parseInt(data1['finishing6']) + parseInt(data1['tot_lipat']);
			var arrStr1 = btoa(encodeURIComponent(JSON.stringify(data1)));
			
			//data2		
			if (!!(data2['hrgbhn'])) {
				if (data2['ongpot'] == 'Y') {
					ongkos_potong = data2['ongkos_potong'];
					} else {
					ongkos_potong = 0;
				}
				
				subtotal2 = parseInt(data2['totcetak']) + parseInt(data2['totbhn']) + parseInt(ongkos_potong) + parseInt(data2['tot_ctp']) + parseInt(data2['totlaminating']) + parseInt(data2['finishing1']) + parseInt(data2['finishing2']) + parseInt(data2['finishing3']) + parseInt(data2['finishing4']) + parseInt(data2['finishing5']) + parseInt(data2['finishing6']) + parseInt(data2['tot_lipat']);
				var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2)));
				} else {
				var subtotal2 = '0';
				var arrStr2 = '';
				//alert('a');
			}
			
			//data3
			if (!!(data3['hrgbhn'])) {
				if (data3['ongpot'] == 'Y') {
					ongkos_potong = data3['ongkos_potong'];
					} else {
					ongkos_potong = 0;
				}
				
				subtotal3 = parseInt(data3['totcetak']) + parseInt(data3['totbhn']) + parseInt(ongkos_potong) + parseInt(data3['tot_ctp']) + parseInt(data3['totlaminating']) + parseInt(data3['finishing1']) + parseInt(data3['finishing2']) + parseInt(data3['finishing3']) + parseInt(data3['finishing4']) + parseInt(data3['finishing5']) + parseInt(data3['finishing6']) + parseInt(data3['tot_lipat']);
				var arrStr3 = btoa(encodeURIComponent(JSON.stringify(data3)));
				} else {
				var subtotal3 = '0';
				var arrStr3 = '';
				//alert('a');
			}
			//data4		
			if (!!(data4['hrgbhn'])) {
				if (data4['ongpot'] == 'Y') {
					ongkos_potong = data4['ongkos_potong'];
					} else {
					ongkos_potong = 0;
				}
				
				subtotal4 = parseInt(data4['totcetak']) + parseInt(data4['totbhn']) + parseInt(ongkos_potong) + parseInt(data4['tot_ctp']) + parseInt(data4['totlaminating']) + parseInt(data4['finishing1']) + parseInt(data4['finishing2']) + parseInt(data4['finishing3']) + parseInt(data4['finishing4']) + parseInt(data4['finishing5']) + parseInt(data4['finishing6']) + parseInt(data4['tot_lipat']);
				var arrStr4 = btoa(encodeURIComponent(JSON.stringify(data4)));
				} else {
				var subtotal4 = '0';
				var arrStr4 = '';
			}
			//data5
			if (!!(data5['hrgbhn'])) {
				if (data5['ongpot'] == 'Y') {
					ongkos_potong = data5['ongkos_potong'];
					} else {
					ongkos_potong = 0;
				}
				
				subtotal5 = parseInt(data5['totcetak']) + parseInt(data5['totbhn']) + parseInt(ongkos_potong) + parseInt(data5['tot_ctp']) + parseInt(data5['totlaminating']) + parseInt(data5['finishing1']) + parseInt(data5['finishing2']) + parseInt(data5['finishing3']) + parseInt(data5['finishing4']) + parseInt(data5['finishing5']) + parseInt(data5['finishing6']) + parseInt(data5['tot_lipat']);
				var arrStr5 = btoa(encodeURIComponent(JSON.stringify(data5)));
				} else {
				var subtotal5 = '0';
				var arrStr5 = '';
			}
			
			//data6		
			if (!!(data6['hrgbhn'])) {
				if (data6['ongpot'] == 'Y') {
					ongkos_potong = data6['ongkos_potong'];
					} else {
					ongkos_potong = 0;
				}
				
				subtotal6 = parseInt(data6['totcetak']) + parseInt(data6['totbhn']) + parseInt(ongkos_potong) + parseInt(data6['tot_ctp']) + parseInt(data6['totlaminating']) + parseInt(data6['finishing1']) + parseInt(data6['finishing2']) + parseInt(data6['finishing3']) + parseInt(data6['finishing4']) + parseInt(data6['finishing5']) + parseInt(data6['finishing6']) + parseInt(data6['tot_lipat']);
				var arrStr6 = btoa(encodeURIComponent(JSON.stringify(data6)));
				} else {
				var subtotal6 = '0';
				var arrStr6 = '';
			}
			
			//data7
			if (!!(data7['hrgbhn'])) {
				if (data7['ongpot'] == 'Y') {
					ongkos_potong = data7['ongkos_potong'];
					} else {
					ongkos_potong = 0;
				}
				
				subtotal7 = parseInt(data7['totcetak']) + parseInt(data7['totbhn']) + parseInt(ongkos_potong) + parseInt(data7['tot_ctp']) + parseInt(data7['totlaminating']) + parseInt(data7['finishing1']) + parseInt(data7['finishing2']) + parseInt(data7['finishing3']) + parseInt(data7['finishing4']) + parseInt(data7['finishing5']) + parseInt(data7['finishing6']);
				var arrStr7 = btoa(encodeURIComponent(JSON.stringify(data7)));
				} else {
				var subtotal7 = '0';
				var arrStr7 = '';
			}
			
			
			if (!!(data8['hrgbhn'])) {
				if (data8['ongpot'] == 'Y') {
					ongkos_potong = data8['ongkos_potong'];
					} else {
					ongkos_potong = 0;
				}
				
				subtotal8 = parseInt(data8['totcetak']) + parseInt(data8['totbhn']) + parseInt(ongkos_potong) + parseInt(data8['tot_ctp']) + parseInt(data8['totlaminating']) + parseInt(data8['finishing1']) + parseInt(data8['finishing2']) + parseInt(data8['finishing3']) + parseInt(data8['finishing4']) + parseInt(data8['finishing5']) + parseInt(data8['finishing6']);
				var arrStr8 = btoa(encodeURIComponent(JSON.stringify(data8)));
				} else {
				var subtotal8 = '0';
				var arrStr8 = '';
			}
			
			
			total = parseInt(subtotal1) + parseInt(subtotal2) + parseInt(subtotal3) + parseInt(subtotal4) + parseInt(subtotal5) + parseInt(subtotal6) + parseInt(subtotal7) + parseInt(subtotal8);
			
			profit = data1['persen'];
			jual = (parseInt(total) * parseInt(profit) / 100) + parseInt(total);
			satuan = parseInt(jual / jmlcetak);
			
			//	alert(arrStr1);
			$('#databuku1').val(arrStr1);
			$('#databuku2').val(arrStr2);
			$('#databuku3').val(arrStr3);
			$('#databuku4').val(arrStr4);
			$('#databuku5').val(arrStr5);
			$('#databuku6').val(arrStr6);
			$('#databuku7').val(arrStr7);
			$('#databuku8').val(arrStr8);
			$('#ketbk').val(ket);
			$('#totjualbuku').html("Rp. " + formatMoney(jual));
			$('#satuanbukuku').html("Rp. " + formatMoney(satuan) + "/pcs");
			
			// if (level == 'admin' || level == 'member') {
			$('#tablebuku').show();
			
		}
		
		$("#cekukuranbu").click(function(){
			var jmlcetak = $('#jmlcetakag').val();
			var lbrcetak = $('#lbrcetakbu').val();
			var tgcetak = $('#tgcetakbu').val();
			var idmesin = $('#j_mesin1').val();
			if(jmlcetak==''){
				alert('jumlah belum diisi');
				}else if(idmesin==0){
				alert('mesin belum dipilih');
				}else{
				
				$.ajax({
					url: host+"/cekm/cekukuran/",
					type: 'POST',
					data: {mesin:idmesin,lbrcetak:lbrcetak,tgcetak:tgcetak,app_id: app_id},
					dataType: 'json',
					success:function(response){
						if (response[0].toString()=='N'){
							alert('Ukuran Kebesaran');
							}else{
							 counter('Agenda');
							move();
							hitungbu1();
						}
					}
				});
			}
		});
		CustomStyle();
		
	</script>
	<?php
	} //end token
	else {
		echo json_encode(array(404 => "error"));
	}
?>