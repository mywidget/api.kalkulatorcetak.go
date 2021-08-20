<?php
	if (!empty($_POST['link'])){
	?>
	<script>
		CustomStyle();
		$(document).ready(function(){
			$('.harga').hide();
			$('.printpenawaran').hide();
			$(".alert").hide();
			$('.btnon, .btnd, .btnp').prop('disabled',true);
			$('#jmlcetakbu').keypress(validateNumber);
			$('#jmlcetakbu, #ket'+mod).keyup(function(){
				$('.btnon').prop('disabled', this.value == "" ? true : false);   
			});
		});
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
		$("#bahanbu1").change(function() {
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
		
		$("#bahanbu1").filter(function() {
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
		$("#j_mesincov").filter(function() {
			$('select[data-j_mesincov]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">mesin cover</option>');
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
		$(document).ready(function(){
			
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
			$('#tnotebook').hide();
			
			$('.more4').hide();
			$('.harga').hide();
			
		})
		
		$('#jenisjilidbu').on('change', function() {
			if( this.value == '2'){
				$('.lbrlembuku').show();
				$('.botbuku').show();
				
				}else{
				$('.lbrlembuku').hide();
				$('.botbuku').hide();
			}
		})
		
		$('#more4').click(function(){
			if($('.more4').is(":hidden")) 
			{
				$('.more4').show();
				$("#more4").removeClass("glyphicon glyphicon-chevron-down").addClass("glyphicon glyphicon-chevron-up");	
				}else{
				$('.more4').hide();
				$("#more4").removeClass("glyphicon glyphicon-chevron-up").addClass("glyphicon glyphicon-chevron-down");	
			}			
		});	
		
		
		
		function hitungbu1() {
			counter('Notebook');
			// $('#button').html('<i class="fa fa-circle-o-notch fa-spin"></i>');
			$('#tnotebook').hide();
			//Isi Warna	
			var lbrcetak = document.getElementById("lbrcetakbu").value ;
			var tgcetak = document.getElementById("tgcetakbu").value;
			var jmlcetak = document.getElementById("jmlcetakbu").value;
			var jilidbu = document.getElementById("jilidbu").value;
			var posjilidbu = document.getElementById("posjilidbu").value;
			
			if (jmlcetak != null && jmlcetak < 1) {
				salert('warning', 'Oopss...', iMsg['J']);
				$('#jmlcetakbu').focus();
				return;
			}
			if (lbrcetak != null && lbrcetak < 1) {
				salert('warning', 'Oopss...', iMsg['L']);
				$('#lbrcetakbu').focus();
				return;
			}
			if (tgcetak != null && tgcetak < 1) {
				salert('warning', 'Oopss...', iMsg['T']);
				$('#tgcetakbu').focus();
				return;
			}
			
			if ($('#bahanbu1').val()==0) {
				salert('warning', 'Oopss...', iMsg['B']);
				$('#tgcetakbu').focus();
				return;
			}
			if ($('#idmesin').val()==0) {
				salert('warning', 'Oopss...', iMsg['M']);
				$('#tgcetakbu').focus();
				return;
			}
			
			if ($('#bahancovbu').val()==0) {
				salert('warning', 'Oopss...', iMsg['BC']);
				$('#tgcetakbu').focus();
				return;
			}
			if ($('#j_mesincov').val()==0) {
				salert('warning', 'Oopss...', iMsg['MC']);
				$('#tgcetakbu').focus();
				return;
			}
			
			
			
			var jmlset = 1;
			var jmlcetak = parseInt(jmlcetak) * parseInt(document.getElementById("jmlhalbu1").value);
			
			var j_mesin = document.getElementById("j_mesin").value;
			
			if (jilidbu > 2){
				
				jmlcetak = parseFloat(jmlcetak) / 2;
				lbrcetak = parseFloat(lbrcetak);
				tgcetak = parseFloat(tgcetak) ;
				
				}else{
				lbrcetak = parseFloat(lbrcetak)  ;
				tgcetak = parseFloat(tgcetak) ;
			}
			
			var bahan = document.getElementById("bahanbu1").value;
			var bb = ""; //document.getElementById("bbbu1").value;
			var jmlwarna = document.getElementById("jmlwarnabu1").value;
			var jmlwarna2 = document.getElementById("jmlwarnabu12").value;
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!! " + jmlwarna);
				return;
			}			
			var lam = "0";
			var lbrf1= 1;		var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;		var tgf6 = 1;
			var finishing6 = '0';		
			var finishing1 = 0;
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			
			var modul = 'notebook';
			var insheet="1";
			var jml_satuan=1;
			var cetak_bagi="Y";
			var ket = document.getElementById("ketnote").value;
			var ket_satuan = "buku";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			var kethitung = 'Isi_Buku_1';
			var ongkos_lipat = 'N';
			var idkertas = $('#idkertas').val();
			var idmesin = $('#j_mesin1').val();
			
			// console.log(jmlcetak);
			
			
			// startTimer();
			move('N');
			
			var xmlhttp = new XMLHttpRequest();
			
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					
					//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
					myArr = JSON.parse(xmlhttp.responseText);	
					data = myArr[0];
					
					hitungcoverbu(data);
					
				}
			}	
			
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&kethitung=" + kethitung + "&jilid=" + posjilidbu + "&ongkos_lipat=" + ongkos_lipat+ "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			
			var url = host+'/sandboxm/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
		}
		
		function hitungcoverbu(x) {
			$('#tnotebook').show();
			data1 = x;
			//Isi Warna	
			
			var lbrcetak = document.getElementById("lbrcetakbu").value;
			var tgcetak = document.getElementById("tgcetakbu").value;
			var jmlcetak = document.getElementById("jmlcetakbu").value;
			var jilidbu = document.getElementById("jilidbu").value;
			var jmlset = 1;
			
			//Ketebalan Buku (0.0013 x gramatur kertas) x (jumlah halaman / 2) mm
			//Konvert nama bahan kedalam number untuk mengambil angkanya saja
			
			var txt1 = document.getElementById("bahanbu1").value;
			var gramasi1 = txt1.match(/\d/g);
			gramasi1 = gramasi1.join("");		
			
			var jmlhal1 = document.getElementById("jmlhalbu1").value;
			var tblbuku1 = (0.0013 * gramasi1) * (jmlhal1/2);
			
			var tebalbuku = $('#lebpungbu').val();
			if(document.getElementById("minioffsetisi4").checked == true ){		
				var j_mesin = 'MiniOffset';
				}else{
				var j_mesin = '';
			}	
			
			if(document.getElementById("autopunggung").checked == true ){		
				tblbuku = parseFloat(tblbuku1);
				$('#lebpungbu').val(tblbuku);
				}else{
				tblbuku = $('#lebpungbu').val();
			}	
			
			
			
			
			if (jilidbu == '1'){
				finishing1 = 23;
				lbrf1 = tgcetak * tblbuku ;
				tgf1 =	1;	
				}else if(jilidbu == '2'){
				finishing1 = 24;
				lbrf1 = 1;
				tgf1 =	tgcetak;	
				}else if(jilidbu == '3'){
				finishing1 = 48;
				lbrf1 = 1;
				tgf1 =	1;	
				
				}else{
				finishing1 = 47;
				lbrf1 = 1;
				tgf1 =	1;	
			}
			
			
			
			
			
			tgcetak = parseFloat(tgcetak) ;
			lbrcetak = (lbrcetak * 2) + parseInt(Math.ceil(tblbuku));
			//Jilid Hardcover
			jenisjilidbu = document.getElementById("jenisjilidbu").value;
			if (jenisjilidbu=='2'){
				lbrcetak = parseFloat(lbrcetak) + (parseFloat(document.getElementById("lbrlembuku").value) * 2); 
				tgcetak = parseFloat(tgcetak) + (parseFloat(document.getElementById("lbrlembuku").value) * 2); 
			}
			
			var bahan = document.getElementById("bahancovbu").value;
			var bb = "";//document.getElementById("bbcovbu").value;
			var jmlwarna = document.getElementById("jmlwarnacovbu").value;
			var jmlwarna2 = document.getElementById("jmlwarnacovbu2").value;
			
			
			var lam = document.getElementById("lamcovbu").value;
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;		var tgf6 = 1;
			var lbrf7= 1;		var tgf7 = 1;
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = '0';		
			var finishing7 = '0';		
			
			var modul = 'notebook';
			var insheet="1";
			var jml_satuan=1;
			var cetak_bagi="Y";
			var ket = document.getElementById("ketnote").value;
			var ket_satuan = "lbr";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			// var j_mesin = '';
			var kethitung = "Cover";
			var idmesin = $("#j_mesincov").val();
			var idkertas = $("#idkertascov").val();
			
			//	alert(jmlset);
			
			//Poly
			if(document.getElementById("polybuku").checked == true ){
				finishing2 = '10'; //poly
				lbrf2= 1;
				tgf2 = 1;			
				finishing5 = '11'; //plat
				lbrf5= parseFloat(document.getElementById("lbrpolybuk").value) / jmlcetak;
				tgf5 = document.getElementById("tgpolybuk").value;
				//alert("d");
			}
			//SpotUV		
			if(document.getElementById("spotuvbuku").checked == true ){
				finishing4 = '19';
				lbrf4= lbrcetak / jmlcetak;
				tgf4 = tgcetak;
			}
			
			//alert(lbrcetak + 'x' + tgcetak);		
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);
					
					var data2 = myArr[0];
					hitungbotbuku(data1,data2);
					
					
				}
			}	
			
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + finishing7 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&kethitung=" + kethitung+ "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			
			var url = host+'/sandboxm/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
			
		}		
		
		function hitungbotbuku(data1,data2){
			
			var jmlcetak = document.getElementById("jmlcetakbu").value;
			var jml_satuan=1;
			var modul = 'kalmej';
			var insheet="1";
			var cetak_bagi="Y";
			var ket = document.getElementById("ketnote").value;
			var ket_satuan = "buku";
			var ongpot = 'Y';
			var rim = 500;
			var kethitung = "Bot";
			
			var jenisjilidbu = document.getElementById("jenisjilidbu").value;
			if (jenisjilidbu=='2'){
				var lbrcetak = (parseFloat(document.getElementById("lbrcetakbu").value) * 2) + parseFloat(document.getElementById("lebpungbu").value);
				var tgcetak = document.getElementById("tgcetakbu").value;
				var bahan = document.getElementById("botbuku").value;		
				var jmlwarna = 0;			
				var jmlwarna2 = 0;			
				var lam = 0;
				var bb = 1;
				var jmlset = 1;
				var lbrf1= 1;		var tgf1 = 1;		
				var lbrf2= 1;		var tgf2 = 1;		
				var lbrf3= 1;		var tgf3 = 1;		
				var lbrf4= 1;		var tgf4 = 1;		
				var lbrf5= 1;		var tgf5 = 1;
				var lbrf6= 1;		var tgf6 = 1;
				var finishing1 = 0; var finishing2 = 0; var finishing3 = 0;var finishing4 = 0; var finishing5 = 0; var finishing6 = '0';	
				
				
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						
						myArr = JSON.parse(xmlhttp.responseText);	
						data3 = myArr[0];
						//	alert(JSON.stringify(data3))
						hasilbuku(data1,data2,data3);
					}
				}	
				isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung;
				
				isi=btoa(isi); //encode			
				xmlhttp.open("GET","wadah.php?isi="+isi,true);
				xmlhttp.send();
				}else{
				var data3 = {};
				hasilbuku(data1,data2,data3);
			}
			
		}		
		
		function hasilbuku(data1,data2,data3){
			
			var jmlcetak = document.getElementById("jmlcetakbu").value;
			var ket = document.getElementById("ketnote").value;
			
			if (data1['ongpot'] == 'Y' ){ ongkos_potong = data1['ongkos_potong'];}
			else{ ongkos_potong = 0; }				
			
			subtotal1 = parseInt(data1['totcetak']) + parseInt(data1['totbhn']) + parseInt(ongkos_potong) + parseInt(data1['tot_ctp']) + parseInt(data1['totlaminating']) + parseInt(data1['finishing1']) + parseInt(data1['finishing2']) + parseInt(data1['finishing3']) + parseInt(data1['finishing4']) + parseInt(data1['finishing5']) + parseInt(data1['finishing6'])+ parseInt(data1['tot_lipat']);
			var arrStr1 = btoa(encodeURIComponent(JSON.stringify(data1)));
			
			//data2		
			if(!!(data2['hrgbhn'])){ 				
				if (data2['ongpot'] == 'Y' ){ ongkos_potong = data2['ongkos_potong'];} else{ ongkos_potong = 0; }				
				
				subtotal2 = parseInt(data2['totcetak']) + parseInt(data2['totbhn']) + parseInt(ongkos_potong) + parseInt(data2['tot_ctp']) + parseInt(data2['totlaminating']) + parseInt(data2['finishing1']) + parseInt(data2['finishing2']) + parseInt(data2['finishing3']) + parseInt(data2['finishing4']) + parseInt(data2['finishing5']) + parseInt(data2['finishing6'])+ parseInt(data2['tot_lipat']);
				var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2)));
				}else{
				var subtotal2 = '0';
				var arrStr2 = '';
				//alert('a');
			}
			
			//data3
			if(!!(data3['hrgbhn'])){ 
				if (data3['ongpot'] == 'Y' ){ ongkos_potong = data3['ongkos_potong'];} else{ ongkos_potong = 0; }				
				
				subtotal3 = parseInt(data3['totcetak']) + parseInt(data3['totbhn']) + parseInt(ongkos_potong) + parseInt(data3['tot_ctp']) + parseInt(data3['totlaminating']) + parseInt(data3['finishing1']) + parseInt(data3['finishing2']) + parseInt(data3['finishing3']) + parseInt(data3['finishing4']) + parseInt(data3['finishing5']) + parseInt(data3['finishing6'])+ parseInt(data3['tot_lipat']);
				var arrStr3 = btoa(encodeURIComponent(JSON.stringify(data3)));
				}else{
				var subtotal3 = '0';
				var arrStr3 = '';
				//alert('a');
			}
			
			
			total = parseInt(subtotal1) + parseInt(subtotal2) + parseInt(subtotal3) ;
			profit = data1['persen'];
			jual = (parseInt(total) * parseInt(profit) / 100) + parseInt(total);
			satuan = parseInt(jual / jmlcetak);
			move('Y');
			//	alert(arrStr2);
			$('#databuku1').val(arrStr1);
			$('#databuku2').val(arrStr2);
			$('#databuku3').val(arrStr3);
			$('#ketnote').val(ket);
			$('#jumlahcetakbuku').val(jmlcetak);
			$('#totjualbuku').html("Rp. " + formatMoney(jual));
			$('#satuanbukuku').html("Rp. " + formatMoney(satuan) + "/pcs");	
			$('#button').html('Hitung');
			
			// if( level == 'admin' || level == 'member' ){
			$('#tnotebook').show(); 
			// }else{
			// $('.harga').show();
			// $('#satuan'+modulhit).val(formatMoney(satuan));
			// $('#hargarim'+modulhit).val(formatMoney(perrim));
			// $('#total'+modulhit).val(formatMoney(jual));
			// $('#totdumy'+modulhit).val(formatMoney(jual));
			// $('#data'+modulhit).val(arrStr);
			// $('#modul').val(modul);
			// }			
			
			
		}
		
		function cariukuranbu(){
			var ukuran = document.getElementById("ukuranbu").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);
					document.getElementById("lbrcetakbu").value = myArr[0];
					document.getElementById("lbrcoverbu").value = myArr[0];
					document.getElementById("tgcetakbu").value = myArr[1];
					document.getElementById("tgcoverbu").value = myArr[1];
					document.getElementById("min_cetak").value = myArr[2];
					//alert(myArr[0].toString());
				}
			}
			xmlhttp.open("GET","function/cariukuran.php?ukuran="+ukuran,true);
			xmlhttp.send();	
		}
		
		$("#idmesin").change(function() {
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
	</script>      
	<?php
	}//end token
	else{
		echo json_encode(array(404 => "error"));
	}
?>