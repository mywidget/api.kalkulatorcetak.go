<?php
	if (!empty($_POST['link'])){
	?>
	<script type="text/javascript">
		
		
		
		$(document).ready(function () {
            $("#jmlcetakbu").focus();
			$('.harga').hide();
			$('.printpenawaran').hide();
			$(".alert").hide();
			$('#print_foot').hide();
			$('.btnon, .btnd, .btnp').prop('disabled', true);
			$('#jmlcetakbu').keypress(validateNumber);
			$('#ketbuku').keyup(function() {
				$('.btnon').prop('disabled', this.value == "" ? true : false);
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
						$("#tablebuku").show();
						}else{
						$("#tablebuku").hide();
					}
					$("#myBar").hide();
					} else {
					width++;
					elem.style.width = width + '%';
					$("#tablebuku").hide();
					$("#myBar").show();
				}
			}
		}
		
		$("#botbuku").filter(function() {
			var deptid = 28;
			$.ajax({
				url: host + "/api/"+app_id+"/katbahan/bot/29",
				type: 'POST',
				dataType: 'json',
				success: function(response) {
					var len = response.length;
					for (var i = 0; i < len; i++) {
						var id = response[i]['id'];
						var name = response[i]['name'];
						$("#botbuku").append("<option value='" + id + "'>" + name + "</option>");
					}
				}
			});
		});	
		$('#lbrcetakbu').val('21');
		$('#tgcetakbu').val('29.7');
		$("#ukuranbu").filter(function() {
			$.ajax({
				url: host + "/api/"+app_id+"/ukuran/buku/11",
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
				url: host + "/cekm/cariukuran/",
				type: 'POST',
				data: {ukuran: ukuran,app_id:app_id},
				dataType: 'json',
				success: function(response) {
					if (response[0] == 0.0) {
						$('#lbrcetakbu,#tgcetakbu,#lbrcoverbu,#tgcoverbu').attr('readonly', false);
						$('#lbrcetakbu').val(response[0]);
						$('#lbrcoverbu').val(response[0]);
						$('#tgcetakbu').val(response[1]);
						$('#tgcoverbu').val(response[1]);
						} else {
						$('#lbrcetakbu,#tgcetakbu,#lbrcoverbu,#tgcoverbu').attr('readonly', true);
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
			$('#tgcoverbu').val('21');
			$('.lbrlembuku').hide();
			$('.botbuku').hide();
			$('#lbrlembuku').val('1.5');
			$('#lebpungbu').prop('readonly', true);
			$('#autopunggung').attr('checked', 'checked');
			$('#tablebuku').hide();
			
			$('.isi2').hide();
			$('.isi3').hide();
			$('.more4').hide();
			
			$('.harga').hide();
			
		})
		
		
		
		$('#jmlcetakbu').on('change', function() {
			$('#jumlahcetakbuku').val($('#jmlcetakbu').val());
		})
		
		
		
		$('#jenisjilidbu').on('change', function() {
			if (this.value == '2') {
				$('.lbrlembuku').show();
				$('.botbuku').show();
				$("#ganticol").removeClass( "col-md-6" ).addClass( "col-md-4" );
				$("#ganticol2").removeClass( "col-md-6" ).addClass( "col-md-4" );
				} else {
				$('.lbrlembuku').hide();
				$('.botbuku').hide();
				$("#ganticol").removeClass( "col-md-4" ).addClass( "col-md-6");
				$("#ganticol2").removeClass( "col-md-4" ).addClass( "col-md-6");
			}
		})
		
		
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
		$("#j_mesin1,#j_mesincov").attr("disabled", true);
		$('#pilih_mesin').on('change', function () {
            if (this.value == 0) {
                $("#j_mesin1").attr("disabled", false);
                } else {
                $("#j_mesin1").attr("disabled", true);
			}
		});
		$('#pilih_mesin_4').on('change', function () {
            if (this.value == 0) {
                $("#j_mesincov").attr("disabled", false);
				$('.more4').show();
                } else {
                $("#j_mesincov").attr("disabled", true);
			}
		});
		function isValidJSONString(str) {
			try {
				JSON.parse(str);
				} catch (e) {
				return false;
			}
			return true;
		}
		function hitungbu1() {
			counter('Buku');
			//Isi Warna	
			var bleed = document.getElementById("bleedbu1").value;
			var lbrcetak = document.getElementById("lbrcetakbu").value;
			var tgcetak = document.getElementById("tgcetakbu").value;
			var jmlcetak = document.getElementById("jmlcetakbu").value;
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
				// jmlset = jmlset / 4;
			}
			var pilih_mesin = document.getElementById("pilih_mesin").value;
			if (pilih_mesin !=0) {
				var idmesin = 0;
				var j_mesin = $('#pilih_mesin').val();
				}else{
				var idmesin = $('#j_mesin1').val();
				var j_mesin = $('#j_mesin1').val();
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
			var finishing1 = 0;
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = 0;
			
			var modul = 'buku';
			var insheet = "1";
			var jml_satuan = 1;
			var cetak_bagi = "Y";
			var ket = document.getElementById("ketbuku").value;
			var ket_satuan = "buku";
			var rim = 500;
			var ongpot = 'Y';
			var kethitung = 'Isi_Buku_1';
			var ongkos_lipat = 'Y';
			var idkertas = $('#idkertasbu1').val();
			
			
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
			startTimer();
			move('N');
			//	alert(jmlcetak);
			//Hitung Isinya----------------------------------------	
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					
					//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
					var myArrr = JSON.parse(JSON.stringify(xmlhttp.responseText));
					var myArr = JSON.parse(myArrr);
					
					data = myArr[0]['data'];
					
					if(isValidJSONString(data['jmlcetak'])){
						var tc = 0;
						}else{
						var tc = (data['jmlcetak']).split("|"); //Jika ada 2 data 
					}
					
					if (tc.length == 2) 
					{
						var arr = myArr[0]['data'];
						var a = "";
						var aa = "";
						var b = "";
						for (var key in arr) {
							// skip loop if the property is from prototype
							var obj = arr[key];
							if (arr.hasOwnProperty(key)) {
								dat = b + obj;
								a += '"' + key + '"' + ':' + '"' + dat.toString().split("|", 1) + '",';
								
								var n = dat.toString().indexOf("|");
								var dat2 = dat.substring(n + 1, dat.length);
								aa += '"' + key + '"' + ':' + '"' + dat2 + '",';
							}
						}
						
						var newStr = a.substring(0, a.length - 1);
						var newStr2 = aa.substring(0, aa.length - 1);
						var data1 = JSON.parse("{" + newStr + "}");
						var data2 = JSON.parse("{" + newStr2 + "}");
						
						hitungbu2(data1, data2);
						
						} else {
						var data1 = myArr[0]['data'];
						var data2 = {};
						hitungbu2(data1, data2);
					}
				}
			}
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 +"&finishing7=0&finishing8=0&finishing9=0&finishing10=0&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&lbrf8=" + lbrf8 + "&tgf8=" + tgf8 + "&lbrf9=" + lbrf9 + "&tgf9=" + tgf9 + "&lbrf10=" + lbrf10 + "&tgf10=" + tgf10+"&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&kethitung=" + kethitung + "&jilid=" + posjilidbu + "&ongkos_lipat=" + ongkos_lipat+  "&idkertas=" + idkertas + "&app_id=" + app_id;
			//
			
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
				var jmlcetak = document.getElementById("jmlcetakbu").value;
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
					alert(" Isi dahulu jumlah halaman isi buku2!!");
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
				var finishing1 = 0;
				var finishing2 = 0;
				var finishing3 = 0;
				var finishing4 = 0;
				var finishing5 = 0;
				var finishing6 = 0;
				
				var modul = 'buku';
				var insheet = "1";
				var jml_satuan = 1;
				var cetak_bagi = "Y";
				var ket = document.getElementById("ketbuku").value;
				var ket_satuan = "buku";
				var rim = 500;
				var ongpot = 'Y';
				var kethitung = "Isi_Buku_2";
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
						
						var myArrr = JSON.parse(JSON.stringify(xmlhttp.responseText));
						var myArr = JSON.parse(myArrr);
						
						data = myArr[0]['data'];
						
						if(isValidJSONString(data['jmlcetak'])){
							var tc = 0;
							}else{
							var tc = (data['jmlcetak']).split("|"); //Jika ada 2 data 
						}						
						if (tc.length == 2) {
							var arr = myArr[0]['data'];
							var a = "";
							var aa = "";
							var b = "";
							for (var key in arr) {
								// skip loop if the property is from prototype
								var obj = arr[key];
								if (arr.hasOwnProperty(key)) {
									dat = b + obj;
									a += '"' + key + '"' + ':' + '"' + dat.toString().split("|", 1) + '",';
									
									var n = dat.toString().indexOf("|");
									var dat2 = dat.substring(n + 1, dat.length);
									aa += '"' + key + '"' + ':' + '"' + dat2 + '",';
								}
							}
							
							var newStr = a.substring(0, a.length - 1);
							var newStr2 = aa.substring(0, aa.length - 1);
							var data3 = JSON.parse("{" + newStr + "}");
							var data4 = JSON.parse("{" + newStr2 + "}");
							} else {
							var data3 = myArr[0]['data'];
							var data4 = {};
						}
						hitungbu3(data1, data2, data3, data4);
						//	$('#ketbuku').val(JSON.stringify(data3['totcetak']));	
						
					}
				}
				
				var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 +"&finishing7=0&finishing8=0&finishing9=0&finishing10=0&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&lbrf8=" + lbrf8 + "&tgf8=" + tgf8 + "&lbrf9=" + lbrf9 + "&tgf9=" + tgf9 + "&lbrf10=" + lbrf10 + "&tgf10=" + tgf10+"&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&kethitung=" + kethitung + "&jilid=" + posjilidbu + "&ongkos_lipat=&idkertas=" + idkertas + "&app_id=" + app_id;
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
			// $('#ketbuku').val(JSON.stringify(data1));	
			jmlwarna = document.getElementById("jmlwarnabu3").value;
			jmlwarna2 = document.getElementById("jmlwarnabu32").value;
			if (jmlwarna != null && jmlwarna < 1) {
				var data5 = {};
				var data6 = {};
				hitungcoverbu(data1, data2, data3, data4, data5, data6);
				// $('#ketbuku').val(JSON.stringify(data4['totcetak']));	
				} else {
				
				var bleed = document.getElementById("bleedbu1").value;
				var lbrcetak = document.getElementById("lbrcetakbu").value;
				var tgcetak = document.getElementById("tgcetakbu").value;
				var jmlcetak = document.getElementById("jmlcetakbu").value;
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
					alert(" Isi dahulu jumlah halaman isi buku3!!");
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
				
				var modul = 'buku';
				var insheet = "1";
				var jml_satuan = 1;
				var cetak_bagi = "Y";
				var ket = document.getElementById("ketbuku").value;
				var ket_satuan = "buku";
				var rim = 500;
				var ongpot = 'Y';
				var kethitung = "Isi_Buku_3";
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
						var myArrr = JSON.parse(JSON.stringify(xmlhttp.responseText));
						var myArr = JSON.parse(myArrr);
						
						data = myArr[0]['data'];
						
						if(isValidJSONString(data['jmlcetak'])){
							var tc = 0;
							}else{
							var tc = (data['jmlcetak']).split("|"); //Jika ada 2 data 
						}						
						if (tc.length == 2) {
							var arr = myArr[0]['data'];
							var a = "";
							var aa = "";
							var b = "";
							for (var key in arr) {
								// skip loop if the property is from prototype
								var obj = arr[key];
								if (arr.hasOwnProperty(key)) {
									dat = b + obj;
									a += '"' + key + '"' + ':' + '"' + dat.toString().split("|", 1) + '",';
									
									var n = dat.toString().indexOf("|");
									var dat2 = dat.substring(n + 1, dat.length);
									aa += '"' + key + '"' + ':' + '"' + dat2 + '",';
								}
							}
							
							var newStr = a.substring(0, a.length - 1);
							var newStr2 = aa.substring(0, aa.length - 1);
							var data5 = JSON.parse("{" + newStr + "}");
							var data6 = JSON.parse("{" + newStr2 + "}");
							
							} else {
							var data5 = myArr[0]['data'];
							var data6 = {};
							
						}
						hitungcoverbu(data1, data2, data3, data4, data5, data6);
						//	$('#ketbuku').val(JSON.stringify(data5['totcetak']));	
						
					}
				}
				
				var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 +"&finishing7=0&finishing8=0&finishing9=0&finishing10=0&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&lbrf8=" + lbrf8 + "&tgf8=" + tgf8 + "&lbrf9=" + lbrf9 + "&tgf9=" + tgf9 + "&lbrf10=" + lbrf10 + "&tgf10=" + tgf10+"&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&kethitung=" + kethitung + "&jilid=" + posjilidbu + "&ongkos_lipat=&idkertas=" + idkertas + "&app_id=" + app_id;
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
			var jmlcetak = document.getElementById("jmlcetakbu").value;
			var jilidbu = document.getElementById("jilidbu").value;
			var jmlset = 1;
			
			//Ketebalan Buku (0.0013 x gramatur kertas) x (jumlah halaman / 2) mm
			//Konvert nama bahan kedalam number untuk mengambil angkanya saja
			
			var txt1 = document.getElementById("bahanbu1").value;
			var gramasi1 = txt1.match(/\d/g);
			// alert(gramasi1);
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
			
			var tebalbuku = $('#lebpungbu').val();
			
			var pilih_mesin = document.getElementById("pilih_mesin_4").value;
			if (pilih_mesin !=0) {
				var idmesin = 0;
				var j_mesin = $('#pilih_mesin_4').val();
				}else{
				var idmesin = $('#j_mesincov').val();
				var j_mesin = $('#j_mesincov').val();
			}
			
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
				tgf1 = tgcetak;
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
			var finishing6 = '0';
			var finishing7 = '0';
			
			var modul = 'buku';
			var insheet = "1";
			var jml_satuan = 1;
			var cetak_bagi = "Y";
			var ket = document.getElementById("ketbuku").value;
			var ket_satuan = "lbr";
			var rim = 500;
			var ongpot = 'Y';
			var ongkos_lipat = "";
			var kethitung = "Cover";
			var idmesin = $("#j_mesincov").val();
			var idkertas = $("#idkertascov").val();
			
			//Poly
			if (document.getElementById("polybuku").checked == true) {
				finishing2 = '10'; //poly
				lbrf2 = 1;
				tgf2 = 1;
				finishing5 = '11'; //plat
				lbrf5 = parseFloat(document.getElementById("lbrpolybuk").value) / jmlcetak;
				tgf5 = document.getElementById("tgpolybuk").value;
				//alert("d");
			}
			//Embos		
			if (document.getElementById("embosbuku").checked == true) {
				finishing3 = '14';
				lbrf3 = 1;
				tgf3 = 1;
				finishing6 = '15';
				lbrf6 = document.getElementById("lbrembosbuk").value / jmlcetak;
				tgf6 = document.getElementById("tgembosbuk").value;
				
			}
			//SpotUV		
			if (document.getElementById("spotuvbuku").checked == true) {
				finishing4 = '19';
				lbrf4 = lbrcetak / jmlcetak;
				tgf4 = tgcetak;
			}
			//wrappingbuku		
			if (document.getElementById("wrappingbuku").checked == true) {
				finishing7 = '3';
			}
			
			//alert(lbrcetak + 'x' + tgcetak);		
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					$(".progress-bar").css('width', '80%');
					var myArrr = JSON.parse(JSON.stringify(xmlhttp.responseText));
					var myArr = JSON.parse(myArrr);
					
					var data7 = myArr[0]['data'];
					hitungbotbuku(data1, data2, data3, data4, data5, data6, data7);
					
				}
			}
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + finishing7 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&kethitung=" + kethitung+ "&idkertas=" + idkertas + "&app_id=" + app_id;
			
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
			var jmlcetak = document.getElementById("jmlcetakbu").value;
			var jml_satuan = 1;
			var modul = 'buku';
			var insheet = "1";
			var cetak_bagi = "Y";
			var ket = document.getElementById("ketbuku").value;
			var ket_satuan = "lbr";
			var ongpot = 'Y';
			var rim = 500;
			var kethitung = "Bot";
			
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
				var finishing6 = 0;
				var j_mesin = "";
				var ongkos_lipat = "";
				var idkertas = $("#botbuku").val();
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						
						var myArrr = JSON.parse(JSON.stringify(xmlhttp.responseText));
						var myArr = JSON.parse(myArrr);
						
						var data8 = myArr[0]['data'];
						hasilbuku(data1, data2, data3, data4, data5, data6, data7, data8);
					}
				}
				var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&kethitung=" + kethitung+ "&j_mesin=" + j_mesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
				
				
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
			
			var jmlcetak = document.getElementById("jmlcetakbu").value;
			var ket = document.getElementById("ketbuku").value;
			
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
			move('Y');
			// profit = data2['persen'];
			profit = data1['persen'];
			
			jual = (parseInt(total) * parseInt(profit) / 100) + parseInt(total);
			satuan = parseInt(jual / jmlcetak);
			
			$('#jumlahcetakbuku').val(jmlcetak);
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
			
			$('#tablebuku').show();
		}
		
		
		CustomStyle();
		$("#idkertasbu1").change(function() {
			var idmesin = $('#j_mesin1').val();
			var idkertas= $('#idkertasbu1').val();
			if(idmesin >0){
				var lbrcetak = $('#lbrcetakbu').val();
				var tgcetak = $('#tgcetakbu').val();
				$.ajax({
					url: host+'/cekm/cekukuran/',
					type: 'post',
					data: {mesin: idmesin,lbrcetak: lbrcetak,tgcetak: tgcetak,idkertas:idkertas,app_id: app_id},
					dataType: 'json',
					success: function(res) {
						if (res[0].toString() == 'N') {
							salert('warning', 'Oopss...', iMsg['U'] +'<br>Ukuran cetak - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+res[1]+' - '+ res[2] +'x'+res[3]+' cm');
							move(res[0].toString());
						} 
					}
				});
			}
		});
		
		$("#j_mesin1").change(function() {
			var idmesin = $(this).val();
			var idkertas= $('#idkertasbu1').val();
			if(idmesin >0){
				var lbrcetak = $('#lbrcetakbu').val();
				var tgcetak = $('#tgcetakbu').val();
				$.ajax({
					url: host+'/cekm/cekukuran/',
					type: 'post',
					data: {mesin: idmesin,lbrcetak: lbrcetak,tgcetak: tgcetak,idkertas:idkertas,app_id: app_id},
					dataType: 'json',
					success: function(res) {
						if (res[0].toString() == 'N') {
							salert('warning', 'Oopss...', iMsg['U'] +'<br>Ukuran cetak - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+res[1]+' - '+ res[2] +'x'+res[3]+' cm');
							move(res[0].toString());
						} 
					}
				});
			}
		});
		$("#j_mesin2").change(function() {
			var idmesin = $(this).val();
			if(idmesin >0){
				var lbrcetak = $('#lbrcetakbu').val();
				var tgcetak = $('#tgcetakbu').val();
				$.ajax({
					url: host+'/cekm/cekukuran/',
					type: 'post',
					data: {mesin: idmesin,lbrcetak: lbrcetak,tgcetak: tgcetak,app_id: app_id},
					dataType: 'json',
					success: function(res) {
						if (res[0].toString() == 'N') {
							salert('warning', 'Oops...', iMsg['U'] +'<br>Ukuran cetak - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+res[1]+' - '+ res[2] +'x'+res[3]+' cm');
							move(res[0].toString());
						} 
					}
				});
			}
		});
		$("#j_mesin3").change(function() {
			var idmesin = $(this).val();
			if(idmesin >0){
				var lbrcetak = $('#lbrcetakbu').val();
				var tgcetak = $('#tgcetakbu').val();
				$.ajax({
					url: host+'/cekm/cekukuran/',
					type: 'post',
					data: {mesin: idmesin,lbrcetak: lbrcetak,tgcetak: tgcetak,app_id: app_id},
					dataType: 'json',
					success: function(res) {
						if (res[0].toString() == 'N') {
							salert('warning', 'Oops...', iMsg['U'] +'<br>Ukuran cetak - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+res[1]+' - '+ res[2] +'x'+res[3]+' cm');
							move(res[0].toString());
						} 
					}
				});
			}
		});
		
		$("#j_mesincov").change(function() {
			var idmesin = $(this).val();
			if(idmesin >0){
				var lbrcetak = $('#lbrcetakbu').val();
				var tgcetak = $('#tgcetakbu').val();
				$.ajax({
					url: host+'/cekm/cekukuran/',
					type: 'post',
					data: {mesin: idmesin,lbrcetak: lbrcetak,tgcetak: tgcetak,app_id: app_id},
					dataType: 'json',
					success: function(res) {
						if (res[0].toString() == 'N') {
							salert('warning', 'Oops...', iMsg['U'] +'<br>Ukuran cetak - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+res[1]+' - '+ res[2] +'x'+res[3]+' cm');
							move(res[0].toString());
						} 
					}
				});
			}
		});
		
		// $("#cekukuran").click(function () {
		$( "#cekukuran" ).on( "click", function() {
			var jmlcetak = $('#jmlcetakbu').val();
			var jmlwarnabu1 = $('#jmlwarnabu1').val();
			var jmlwarnabu12 = $('#jmlwarnabu12').val();
			var ukuran = $('#ukuranbu').val();
			var lbr_cetak = $('#lbrcetakbu').val();
			var tg_cetak = $('#tgcetakbu').val();
			var bahan = $('#bahanbu1').val();
			var pilih = $("#pilih" + mod).val();
			var j_mesin1 = $("#j_mesin1").val();
			var j_mesincov = $("#j_mesincov").val();
			var bahancovbu = $("#bahancovbu").val();
			//isi2
			var jmlhalbu2 = $("#jmlhalbu2").val();
			
			//isi3
			var jmlhalbu3 = $("#jmlhalbu3").val();
			
			// if (jmlcetak == '') {
			// salert('warning', 'Oopss...', iMsg['J']);
			// } else if (jmlwarnabu1 == 0 || jmlwarnabu1 == '') {
			// salert('warning', 'Oopss...', iMsg['W1']);
			// } else if (jmlwarnabu12 == '') {
			// salert('warning', 'Oopss...', iMsg['W2']);
			// } else if (ukuran == '') {
			// salert('warning', 'Oopss...', iMsg['H']);
			// } else if (lbr_cetak == 0 || lbr_cetak == "") {
			// salert('warning', 'Oopss...', iMsg['L']);
			// } else if (tg_cetak == 0 || tg_cetak == "") {
			// salert('warning', 'Oopss...', iMsg['T']);
			// } else if (j_mesin1 == 0) {
			// salert('warning', 'Oopss...', iMsg['Mi1']);
			// } else if (bahan == 0) {
			// salert('warning', 'Oopss...', iMsg['Bi1']);
			// } else if (j_mesincov == 0) {
			// salert('warning', 'Oopss...', iMsg['MC']);
			// } else if (bahancovbu == 0) {
			// salert('warning', 'Oopss...', iMsg['BC']);
			// } else if (jmlhalbu2 != 0 || jmlhalbu2 != '') {
			// cek_isi_2();
			// } else if (jmlhalbu3 != 0) {
			// cek_isi_3();
			// } else {
			// // console.log(1);
			// hitungbu1();
			// }
			hitungbu1();
		});
		function cek_isi_2(){
			var j_mesin2 = $("#j_mesin2").val();
			var jmlwarnabu2 = $("#jmlwarnabu2").val();
			var bahanbu2 = $("#bahanbu2").val();
			var jmlhalbu2 = $("#jmlhalbu2").val();
			if (jmlhalbu2 != 0) {
				if (j_mesin2 == 0) {
					salert('warning', 'Oopss...', iMsg['Mi2']);
					} else if (jmlwarnabu2 == 0) {
					salert('warning', 'Oopss...', iMsg['W']);
					} else if (bahanbu2 == 0) {
					salert('warning', 'Oopss...', iMsg['Bi2']);
					}else{
					cek_isi_3();
				}
				}else{
				cek_isi_3();
			}
			
		}
		function cek_isi_3(){
			// console.log(2);
			var j_mesin3 = $("#j_mesin3").val();
			var jmlwarnabu3 = $("#jmlwarnabu3").val();
			var bahanbu3 = $("#bahanbu3").val();
			var jmlhalbu3 = $("#jmlhalbu3").val();
			if (jmlhalbu3 != 0) {
				if (j_mesin3 == 0) {
					salert('warning', 'Oopss...', iMsg['Mi3']);
					} else if (jmlwarnabu3 == 0) {
					salert('warning', 'Oopss...', iMsg['W']);
					} else if (bahanbu3 == 0) {
					salert('warning', 'Oopss...', iMsg['Bi3']);
					}else{
					hitungbu1();
				}
				}else{
				hitungbu1();
			}
		}
	</script>
	<?php
	} //end token
	else {
		echo json_encode(array(404 => "error"));
	}
?>		