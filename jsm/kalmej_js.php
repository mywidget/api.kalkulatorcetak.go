<?php
	if (!empty($_POST['link'])){
	?>
	<script type="text/javascript">
		$("#idkertas").attr("disabled", true);
		$("#idmesin"+mod).removeClass("has-danger");
		$('#pilihb'+mod).on('change', function() {
			if (this.value == '2') {
				$("#idkertas").attr("disabled", false);
				} else {
				$("#idkertas").attr("disabled", true);
			}
		});
		$("#idkertasb").attr("disabled", true);
		$('#pilihbb'+mod).on('change', function() {
			if (this.value == '2') {
				$("#idkertasb").attr("disabled", false);
				} else {
				$("#idkertasb").attr("disabled", true);
			}
		});
		$("#idmesin").attr("disabled", true);
		$('#pilih'+mod).on('change', function() {
			if (this.value == '2') {
				$("#idmesin").attr("disabled", false);
				$("#idmesin"+mod).addClass("has-danger");
				} else {
				$("#idmesin").attr("disabled", true);
				$("#idmesin"+mod).removeClass("has-danger");
			}
		});
		$('.btnon, .btnd, .btnp').prop('disabled',true);
		$('#jmlcetakkm').keypress(validateNumber);
		$('#ketkalmej').keyup(function(){
			$('.btnon').prop('disabled', this.value == "" ? true : false);     
		})
		
		$('.modal').on('hidden.bs.modal', function(){
			$(this).removeData('bs.modal');
		});
		function move(a) {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);
			
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					if(a=='Y'){
						$("#tablkm").show();
						}else{
						$("#tablkm").hide();
					}
					$("#myBar").hide();
					} else {
					width++;
					elem.style.width = width + '%';
					$("#tablkm").hide();
					$("#myBar").show();
				}
			}
		}
		$(document).ready(function(){
			$('#ukurankm').val('29');
			$('#lbrcetakkm').val('24');
			$('#tgcetakkm').val('15');	
			$('#lbrcetakdudukankm').val('24');
			$('#tgcetakdudukankm').val('15');
			$('#lebarbawahkm').val('8');
			$('#lemkm').val('1.5');
			$('#bbkm').val('2');
			$('#lebihukuranamplop').val('3');
			$('.lebihukuranamplop').hide();
			$('#tablekalmej').hide();
			$('.bahanboxkm').hide();
			$('.warnaboxkm').hide();
			$('.warnadudukan').hide();
			$('.kertasdudukan').hide();
			$('.ukurandudukankm').hide();
			$('.harga').hide();
			$('#botkalmej').attr('checked', 'checked');
			
		});
		
		
		$( "#lbrcetakkm" ).keyup(function() {
			$('#lbrcetakdudukankm').val($('#lbrcetakkm').val());
		})	
		$( "#tgcetakkm" ).keyup(function() {
			$('#tgcetakdudukankm').val($('#tgcetakkm').val());
		})
		
		$('#botkalmej').click(function() {
			if($(this).is(":checked"))
			{
				$('.bahanbotkalmej').show();
				$('.kertaspenutup').show();
				$('.jmlcetakpenutupbot').show();
				$('.kertasdudukan').hide();
				$('#warnadudukan').val('0');
				$('.warnadudukan').hide();
				$('.lampenutupbot').show();
				$('.lemkm').show();
				} else {
				$('.bahanbotkalmej').hide();
				$('.kertaspenutup').hide();
				$('.jmlcetakpenutupbot').hide();
				$('.kertasdudukan').show();
				$('.warnadudukan').show();
				$('#warnadudukan').val('0');
				$('.lampenutupbot').hide();
				$('.lemkm').hide();
				
			}
		});	 
		
		$('#boxkm').click(function() {
			if($(this).is(":checked"))
			{
				$('.bahanboxkm').show();
				$('.warnaboxkm').show();
				$('.lebihukuranamplop').show();
				$('#warnaboxkm').val('1');
				} else {
				$('.bahanboxkm').hide();
				$('.warnaboxkm').hide();
				$('.lebihukuranamplop').hide();
				$('#warnaboxkm').val('0');
			}
		});
		
		$('#ukurandudukan').click(function() {
			if($(this).is(":checked"))
			{
				$('.ukurandudukankm').show();
				} else {
				$('.ukurandudukankm').hide();
			}
		});
		
		
		///
		$("#ukurankm").filter(function() {
			var deptid = 29;
			$.ajax({
				url: host + "/api/"+app_id+"/ukuran/kalmej/29",
				type: 'POST',
				dataType: 'json',
				success: function(response) {
					var len = response.length;
					for (var i = 0; i < len; i++) {
						var id = response[i]['id'];
						var name = response[i]['name'];
						$("#ukurankm").append("<option value='" + id + "'>" + name + "</option>");
					}
				}
			});
		});	
		$("#bahanbotkalmej").filter(function() {
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
						$("#bahanbotkalmej").append("<option value='" + id + "'>" + name + "</option>");
					}
				}
			});
		});	
		
		$("#kertaspenutup").filter(function() {
			var deptid = 5;
			$.ajax({
				url: host + "/api/"+app_id+"/selkatbahan/kalmej/5",
				type: 'POST',
				dataType: 'json',
				success: function(response) {
					var len = response.length;
					for (var i = 0; i < len; i++) {
						var id = response[i]['id'];
						var name = response[i]['name'];
						$("#kertaspenutup").append("<option value='" + id + "'>" + name + "</option>");
					}
				}
			});
		});	
		
		$("#ukurankm").change(function () {
			var ukuran = $(this).val();
			$.ajax({
				url: host + "/cek/cariukuran/",
				type: "POST",
				data: {ukuran: ukuran,app_id:app_id},
				dataType: "json",
				success: function (response) {
					if (response[0] == 0.0) {
						$("#lbrcetakkm,#tgcetakkm").attr("readonly", false);
						$("#lbrcetakkm").val(response[0]);
						$("#tgcetakkm").val(response[1]);
						} else {
						$("#lbrcetakkm,#tgcetakkm").attr("readonly", true);
						$("#lbrcetakkm").val(response[0]);
						$("#tgcetakkm").val(response[1]);
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
		$("#bahankm").filter(function() {
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
		$("#bahankm").change(function() {
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
		
		$("#bahanboxkm").filter(function() {
			$('select[data-amplop]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih bahan</option>');
				$.ajax({
					url: $select.attr('data-amplop'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahanboxkm").change(function() {
			var deptid = $(this).val();
			
			$.ajax({
				url: host+'/kertas/',
				type: 'post',
				data: {depart: deptid,app_id:app_id},
				dataType: 'json',
				success: function(response) {
					var len = response.length;
					$("#idkertasboxkm").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]['id'];
						var name = response[i]['name'];
						$("#idkertasboxkm").append("<option value='" + id + "'>" + name + "</option>");
					}
				}
			});
		});
		var totalisi = 0;
		var totalcover = 0;
		
		function hitungkm() {
		startTimer();
			$('#tablekalmej').hide();
			
			// setTimeout(function(){$(".progress-bar").css('width','25%'); }, 1000); 		
			var bleed = document.getElementById("bleedkk").value;
			var lbrcetak = parseFloat(document.getElementById("lbrcetakkm").value) + ( 2 * parseFloat(bleed));
			var tgcetak = parseFloat(document.getElementById("tgcetakkm").value) + ( 2 * parseFloat(bleed));	
			
			var jmlcetak = document.getElementById("jmlcetakkm").value;
			var bahan = document.getElementById("bahankm").value;
			var bb = "";
			var jmlwarna = document.getElementById("jmlwarnakm").value;
			var jmlwarna2 = document.getElementById("jmlwarnakm2").value;
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}	
			var lam = document.getElementById("lamkm").value;
			var jmlset = document.getElementById("jmlsetkm").value;
			var lbrf1= 1;		var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1; 		var tgf6 = 1;
			var lbrf7 = 1;		var tgf7 = 1;
			var lbrf8 = 1;		var tgf8 = 1;
			var finishing1 = 0;
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = 0;
			var finishing7 = 0;
			var finishing8 = 0;
			
			var modul = 'kalmej';
			var insheet="1";
			var jml_satuan=1;
			var cetak_bagi="Y";
			var ket = document.getElementById("ketkalmej").value;
			var ket_satuan = "lbr";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			var kethitung = "Isi_Kalender"
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
			//ongkos komplit
			var jmllembar = jmlset;
			if(jmllembar > 1){
				finishing5 = '100';
				lbrf5= jmllembar;	
			}
			
			
			
			if(document.getElementById("finishing1kalmej").checked == true ){ //Poly
				lbrpolykalmej = document.getElementById("lbrpolykalmej").value;
				tgpolykalmej = document.getElementById("tgpolykalmej").value;
				finishing2 = '10'; //Press Poly
				lbrf2= lbrpolykalmej;
				tgf2 = tgpolykalmej;			
				finishing1 = '11'; //Plat Poly
				lbrf1= lbrpolykalmej/jmlcetak;
				tgf1 = tgpolykalmej;
				
			}
			
			
			//SPOT UV
			if(document.getElementById("finishing4km").checked == true ){
				finishing4 = '19';
				lbrf4= lbrcetak * jmlset;
				tgf4 = tgcetak;
			}
			
			if (jmlcetak != null && jmlcetak < 1){  
				alert("Jumlah Cetakan Kosong!!");
				return;
			}	
			if(lbrcetak != null && lbrcetak < 1){
				alert(" Lebar Cetakan Kosong!!");
				return;
			}
			if (tgcetak != null && tgcetak < 1){
				alert("Tinggi Cetakan Kosong!!");
				return;	
			}
			//Hitung Isinya----------------------------------------	
			var xmlhttp = new XMLHttpRequest();      
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					
					//$(".progress-bar").css('width','25%');
					myArr = JSON.parse(xmlhttp.responseText);	
					data = myArr;
					//$('#ketkalmej').val(JSON.stringify(data2));				
					// alert(JSON.stringify(data2));
					var tc = (data[0]['jmlcetak']).split("|"); //Jika ada 2 data 									
					if (tc.length == 2){
						//alert(JSON.stringify(myArr));	
						var arr = myArr[0];
						var a= "";
						var aa= "";
						var b = "";
						for (var key in arr) {
							// skip loop if the property is from prototype
							var obj = arr[key];
							if (arr.hasOwnProperty(key)) {
								dat = b + obj;	
								a += '"'+ key + '"' + ':'+ '"' + dat.toString().split("|",1) + '",' ;
								
								var n = dat.toString().indexOf("|");
								var dat2 = dat.substring(n+1,dat.length);
								aa += '"'+ key + '"' + ':'+ '"' + dat2 + '",' ;
							}
						}
						
						var newStr = a.substring(0, a.length-1);
						var newStr2 = aa.substring(0, aa.length-1);
						var data1= JSON.parse("{" + newStr + "}");
						var data2= JSON.parse("{" + newStr2 + "}");
						
						//	$('#ketkalmej').val(JSON.stringify(data1) + " --- " + JSON.stringify(data2) + " ---" + JSON.stringify(myArr));				
						//alert(data[0]['totcetak'].split("|"));
						}else{
						var data1 = myArr[0];
						var data2 = {};
						//$('#ketkalmej').val(data2[0]['jmlcetak']);		
						//alert(data[0]['totcetak']);
					}
					hitungbotkalmej(data1,data2)
					
				}
			}	
			// isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung;
			
			// isi=btoa(isi); //encode			
			// xmlhttp.open("GET","wadah.php?isi="+isi,true);
			// xmlhttp.send();			
			
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan +"&bb="+bb+"&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + 0 + "&finishing8=" + 0 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + 0 + "&tgf7=" + 0 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot +"&kethitung="+kethitung + "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			
			var url = host + '/sandboxm/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(isi);
		}		
		
		
		function hitungbotkalmej(x,y){
			var data1 = x;	
			var data2 = y;	
			// $(".progress-bar").css('width','50%');
			
			if(document.getElementById("botkalmej").checked == true ){
				var lbrcetak = document.getElementById("lbrcetakdudukankm").value;
				var tgcetak = parseFloat(document.getElementById("tgcetakdudukankm").value) + (parseFloat(document.getElementById("lebarbawahkm").value) / 2);
				var bahan = document.getElementById("bahanbotkalmej").value;		
				var jmlcetak = parseInt(document.getElementById("jmlcetakkm").value) * 2;
				var jmlwarna = 0;	
				//spiral
				finishing1 = '24';
				lbrf1= document.getElementById("lbrcetakkm").value / 2;
				
				
				}else{
				var lbrcetak = document.getElementById("lbrcetakdudukankm").value;
				var tgcetak = 2 * parseFloat(document.getElementById("tgcetakdudukankm").value) + (parseFloat(document.getElementById("lebarbawahkm").value));
				
				var bahan = document.getElementById("kertasdudukan").value;		
				var jmlcetak = parseInt(document.getElementById("jmlcetakkm").value);
				var jmlwarna = document.getElementById("warnadudukan").value;			
				
				//spiral
				finishing1 = '24';
				lbrf1= document.getElementById("lbrcetakkm").value;
				
			}
			
			
			
			var lam = 0;
			var bb = 1;
			var jmlset = 1;
			//var lbrf1= 1;		
			var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;						var tgf6 = 1;
			//var finishing1 = 0;
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = '0';	
			
			
			
			
			var modul = 'kalmej';
			var insheet="1";
			var jml_satuan=1;
			var cetak_bagi="Y";
			var ket = document.getElementById("ketkalmej").value;
			var ket_satuan = "lbr";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			var kethitung = "Bot_Kalender"
			var idmesin = 0;
			var idkertas = 0;
			var j_mesin = 0;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);	
					data3 = myArr[0];
					
					hitpenutupbot(data1,data2,data3);
					
					//$('#ketkalmej').val(JSON.stringify(data3));
				}
			}	
			// isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung;
			
			// isi=btoa(isi); //encode			
			// xmlhttp.open("GET","wadah.php?isi="+isi,true);
			// xmlhttp.send();
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan +"&bb="+bb+"&jmlwarna=" + jmlwarna + "&jmlwarna2=" + 0 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + 0 + "&finishing8=" + 0 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + 0 + "&tgf7=" + 0 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot +"&kethitung="+kethitung+ "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			var url = host + '/sandboxm/get/';
			
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(isi);
		}
		
		function hitpenutupbot(x,y,z){
			var data1 = x;	
			var data2 = y;	
			var data3 = z;	
			// $(".progress-bar").css('width','75%');
			
			if(document.getElementById("botkalmej").checked == true ){
				
				
				var lbr = document.getElementById("lbrcetakdudukankm").value;
				var tg = parseFloat(document.getElementById("tgcetakdudukankm").value);
				var lbrbawah = document.getElementById("lebarbawahkm").value;
				var lemkm = document.getElementById("lemkm").value;
				//lipatan untuk lem 1,5cm
				//yg paling besar buat atas
				lbrkertas1 = parseFloat(lbr) + (parseFloat(lemkm) * 2) ;
				tgkertas1 = (2 * parseFloat(tg)) + parseFloat(lbrbawah) + (parseFloat(lemkm) * 2);
				
				//yang paling kecil buat bawah
				lbrkertas2 = lbr;
				tgkertas2 = (2 * parseFloat(tg)) + parseFloat(lbrbawah);
				
				//cari yang lebih panjang
				if (lbrkertas1 < tgkertas1){
					lbrcetak = parseFloat(lbrkertas1) + parseFloat(lbrkertas2);
					tgcetak = tgkertas1;
					}else{
					lbrcetak = parseFloat(tgkertas1) + parseFloat(tgkertas2);
					tgcetak = lbrkertas1;
				}
				
				//alert (lbrcetak + "x" +tgcetak);	
				
				var bahan = document.getElementById("kertaspenutup").value;
				var jmlcetak = parseInt(document.getElementById("jmlcetakkm").value);
				var jmlwarna = document.getElementById("jmlcetakpenutupbot").value;
				var lam = document.getElementById("lampenutupbot").value;
				var bb = 1;
				var jmlset = 1;
				var lbrf1= 1;		var tgf1 = 1;		
				var lbrf2= 1;		var tgf2 = 1;		
				var lbrf3= 1;		var tgf3 = 1;		
				var lbrf4= 1;		var tgf4 = 1;		
				var lbrf5= 1;		var tgf5 = 1;
				var lbrf6= 1;		var tgf6 = 1;
				var finishing1 = '91';
				var finishing2 = 0;
				var finishing3 = 0;
				var finishing4 = 0;
				var finishing5 = 0;
				var finishing6 = '0';		
				
				var modul = 'kalmej';
				var insheet="1";
				var jml_satuan=1;
				var cetak_bagi="Y";
				var ket = document.getElementById("ketkalmej").value;
				var ket_satuan = "lbr";
				var rim = 500;
				var box = 100;
				var ongpot = 'Y';
				var kethitung = "Penutup_Bot"
				// var idmesin = $("#idmesin").val();
				// var pilimesin = $("#pilih"+mod).val();
				// if(pilimesin==1){
				// j_mesin='';
				// }else{
				// j_mesin=idmesin;
				// }
				// var idkertas = $("#idkertas").val();
				// var pilihbahan = $("#pilihb"+mod).val();
				// if(pilihbahan==1){
				// idkertas=0;
				// }else{
				// idkertas=idkertas;
				// }
				
				
				// cekukuran(idmesin,lbrcetak,tgcetak,kethitung);
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						myArr = JSON.parse(xmlhttp.responseText);
						
						data4 = myArr[0];
						hitamplopkm(data1,data2,data3,data4);
						//	$('#ketkalmej').val(JSON.stringify(data4));
						
					}
				}	
				var isi ="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung +"&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
				
				// isi=btoa(isi); //encode			
				// xmlhttp.open("GET","wadah.php?isi="+isi,true);
				// xmlhttp.send();		
				
				// var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan +"&bb="+bb+"&jmlwarna=" + jmlwarna + "&jmlwarna2=" + 0 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + 0 + "&finishing8=" + 0 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + 0 + "&tgf7=" + 0 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot +"&kethitung="+kethitung+ "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
				var url = host + '/sandboxm/get/';
				
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send(isi);
				}else{
				var data4={};
				hitamplopkm(data1,data2,data3,data4);
			}				
			
		}
		
		
		//Hitung Covernya
		
		function hitamplopkm(r,s,t,u){	
			var data1 = r;	
			var data2 = s;	
			var data3 = t;	
			var data4 = u;
			
			
			
			
			//data1
			if (data1['ongpot'] == 'Y' ){ ongkos_potong = data1['ongkos_potong'];}
			else{ ongkos_potong = 0; }				
			
			subtotal1 = parseInt(data1['totcetak']) + parseInt(data1['totbhn']) + parseInt(ongkos_potong) + parseInt(data1['tot_ctp']) + parseInt(data1['totlaminating']) + parseInt(data1['finishing1']) + parseInt(data1['finishing2']) + parseInt(data1['finishing3']) + parseInt(data1['finishing4']) + parseInt(data1['finishing5']) + parseInt(data1['finishing6']);
			var arrStr1 = btoa(encodeURIComponent(JSON.stringify(data1)));
			
			
			if(!!(data2['hrgbhn'])){ 				
				//data2
				if (data2['ongpot'] == 'Y' ){ ongkos_potong = data2['ongkos_potong'];}
				else{ ongkos_potong = 0; }				
				
				subtotal2 = parseInt(data2['totcetak']) + parseInt(data2['totbhn']) + parseInt(ongkos_potong) + parseInt(data2['tot_ctp']) + parseInt(data2['totlaminating']) + parseInt(data2['finishing1']) + parseInt(data2['finishing2']) + parseInt(data2['finishing3']) + parseInt(data2['finishing4']) + parseInt(data2['finishing5']) + parseInt(data2['finishing6']);
				var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2)));
				}else{
				var subtotal2 = '0';
				var arrStr2 = '';
				//alert('a');
			}
			
			//data3
			if (data3['ongpot'] == 'Y' ){ ongkos_potong = data3['ongkos_potong'];}
			else{ ongkos_potong = 0; }				
			
			subtotal3 = parseInt(data3['totcetak']) + parseInt(data3['totbhn']) + parseInt(ongkos_potong) + parseInt(data3['tot_ctp']) + parseInt(data3['totlaminating']) + parseInt(data3['finishing1']) + parseInt(data3['finishing2']) + parseInt(data3['finishing3']) + parseInt(data3['finishing4']) + parseInt(data3['finishing5']) + parseInt(data3['finishing6']);
			var arrStr3 = btoa(encodeURIComponent(JSON.stringify(data3)));
			
			//alert(subtotal2);
			grandtotal = parseInt(subtotal1) + parseInt(subtotal2) + parseInt(subtotal3);
			
			if(document.getElementById("botkalmej").checked == true ){
				//data4
				if (data4['ongpot'] == 'Y' ){ ongkos_potong = data4['ongkos_potong'];}
				else{ ongkos_potong = 0; }				
				
				
				subtotal4 = parseInt(data4['totcetak']) + parseInt(data4['totbhn']) + parseInt(ongkos_potong) + parseInt(data4['tot_ctp']) + parseInt(data4['totlaminating']) + parseInt(data4['finishing1']) + parseInt(data4['finishing2']) + parseInt(data4['finishing3']) + parseInt(data4['finishing4']) + parseInt(data4['finishing5']) + parseInt(data4['finishing6']);
				var arrStr4 = btoa(encodeURIComponent(JSON.stringify(data4)));
				grandtotal = parseInt(subtotal1) + parseInt(subtotal2) + parseInt(subtotal3) + parseInt(subtotal4);
			}	
			//alert(JSON.stringify(data4));
			//alert(grandtotal);
			
			var lebihukuranamplop = document.getElementById("lebihukuranamplop").value;
			var lbrcetak = parseFloat(document.getElementById("lbrcetakkm").value) + parseFloat(lebihukuranamplop);
			var tgcetak = parseFloat(document.getElementById("tgcetakkm").value) + parseFloat(lebihukuranamplop);
			if(lbrcetak < tgcetak){
				lbrcetak = document.getElementById("tgcetakkm").value;
				tgcetak = document.getElementById("lbrcetakkm").value;
			}
			var lem = '3';
			var lidah = '2';	
			//Tentukan Ukuran Amplop
			lbrcetak 	= parseFloat(lbrcetak) + (2 * parseFloat(lem));
			tgcetak 	=  (2 * parseFloat(tgcetak)) + parseFloat(lidah);
			
			var jml_satuan = 1;
			
			//	alert(lbrcetak + "x" + tgcetak);
			var jmlcetak = document.getElementById("jmlcetakkm").value;
			var bahan = document.getElementById("bahanboxkm").value;
			var bb = "";
			var tarikan = 0;
			var lam = 0;
			var lbrf1= 1;		var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= lbrcetak / (jmlcetak * jml_satuan);				var tgf3 = tgcetak;		 //Ukuran pisau Pond
			var lbrf4= 1;						var tgf4 = 1;		
			var lbrf5= 1;						var tgf5 = 1;
			var lbrf6= 1;						var tgf6 = 1;
			var finishing1 = '0';
			var finishing2 = '0'; 
			var finishing3 = '13'; // Pisau Pon
			var finishing4 = '12'; //Biaya Pon
			var finishing5 = '50'; //Biaya Lem
			var finishing6 = '0';
			
			var	jmlwarna = document.getElementById("warnaboxkm").value;			
			var	jmlset = 1;	
			var cetak_bagi='Y';
			var modul = 'amplop';
			var insheet = "1";
			var ket = document.getElementById("ketkalmej").value;
			var ket_satuan = "box";
			var rim = 500;
			
			var box = 100;
			var ongpot = 'N';	
			var kethitung = "Amplop_Kalender"		
			var idmesin = $("#idmesin").val();
			var pilimesin = $("#pilih"+mod).val();
			if(pilimesin==1){
				j_mesin='';
				}else{
				j_mesin=idmesin;
			}
			if($('#warnaboxkm').val()>0){			
				cekukuran(j_mesin,lbrcetak,tgcetak,kethitung);
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						myArr = JSON.parse(xmlhttp.responseText);
						
						data5 = myArr[0];
						//	$('#ketkalmej').val(JSON.stringify(data5));
						
						
						
						//data5
						if (data5['ongpot'] == 'Y' ){ ongkos_potong = data5['ongkos_potong'];}
						else{ ongkos_potong = 0; }				
						
						subtotal5 = parseInt(data5['totcetak']) + parseInt(data5['totbhn']) + parseInt(ongkos_potong) + parseInt(data5['tot_ctp']) + parseInt(data5['totlaminating']) + parseInt(data5['finishing1']) + parseInt(data5['finishing2']) + parseInt(data5['finishing3']) + parseInt(data5['finishing4']) + parseInt(data5['finishing5']) + parseInt(data5['finishing6']);
						var arrStr5 = btoa(encodeURIComponent(JSON.stringify(data5)));
						
						grandtotal5  = parseInt(grandtotal)+ parseInt(subtotal5);  		
						
						//$('#ketkalmej').val(grandtotal);
						//$('#ketkalmej').val(JSON.stringify(data1));
						
						total = grandtotal5;
						profit = data1['persen'];
						//alert(profit);
						jual = (parseInt(total) * profit / 100) + parseInt(total);
						satuan = jual / jmlcetak / jml_satuan;
						perrim = satuan *  rim;
						
						// $(".progress-bar").css('width','100%');
						setTimeout(function(){ $(".progress-bar").css('background','green'); }, 500); 
						
						//	alert(arrStr1);
						$('#data1').val(arrStr1);
						$('#data2').val(arrStr2);
						$('#data3').val(arrStr3);
						$('#data4').val(arrStr4);
						$('#data5').val(arrStr5);
						$('#jumlahcetak').val(jmlcetak);
						$('#ket').val(ket);
						$('#totjual').html("Rp. " + formatMoney(jual));
						$('#satuan').html("Rp. " + formatMoney(satuan) + "/pcs");
						setTimeout(function(){ $('#tablekalmej').show(); }, 500); 
					}
				}
				
				var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan +"&bb="+bb+"&jmlwarna=" + jmlwarna + "&jmlwarna2=" + 0 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + 0 + "&finishing8=" + 0 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + 0 + "&tgf7=" + 0 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot +"&kethitung="+kethitung+ "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
				var url = host + '/sandboxm/get/';
				
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send(isi);
				
				}else{
				
				setTimeout(function(){ $(".progress-bar").css('background','green'); }, 500); 
				
				total = grandtotal;
				profit = data1['persen'];
				jual = (parseInt(total) * profit / 100) + parseInt(total);
				satuan = jual / jmlcetak / jml_satuan;
				perrim = satuan *  rim;
				
				$('#data1').val(arrStr1);
				$('#data2').val(arrStr2);
				$('#data3').val(arrStr3);
				$('#data4').val(arrStr4);
				$('#data5').val('');
				$('#jumlahcetak').val(jmlcetak);
				$('#ket').val(ket);
				$('#totjual').html("Rp. " + formatMoney(jual));
				$('#satuan').html("Rp. " + formatMoney(satuan) + "/pcs");
				
				
				$('#tablekalmej').show(); 
				
				return;
			}
			
		}
		
		function cariukurankm(){
			var ukuran = $("#ukurankm").val();
			$.ajax({
				url: host + "/cek/cariukuran/",
				type: "POST",
				data: {ukuran: ukuran,app_id:app_id},
				dataType: "json",
				success: function (response) {
					if (response[0] == 0.0) {
						// $("#lbrcetak,#tgcetak").attr("readonly", false);
						$("#lbrcetakkm").val(response[0]);
						$("#lbrcetakdudukankm").val(response[0]);
						$("#tgcetakkm").val(response[1]);
						$("#tgcetakdudukankm").val(response[1]);
						} else {
						// $("#lbrcetak,#tgcetak").attr("readonly", true);
						$("#lbrcetakkm").val(response[0]);
						$("#lbrcetakdudukankm").val(response[0]);
						$("#tgcetakkm").val(response[1]);
						$("#tgcetakdudukankm").val(response[1]);
					}
				},
			});
		}
		CustomStyle();
		
		function cekukuran(a,b,c,d){
			$.ajax({
				url: host+'/cekm/cekukuran/',
				type: 'POST',
				data: {
					mesin: a,
					lbrcetak: b,
					tgcetak: c,
					app_id: app_id
				},
				dataType: 'json',
				beforeSend: function () {
					move('N');
					CustomStyle();
				},
				success: function(response) {
					if (response[0].toString() == 'N') {
						move(response[0].toString());
						salert('warning', 'Oops...', iMsg['U'] +'<br>Ukuran '+ d +' - '+b+'x'+c+' cm<br>UK. '+response[1]+' - '+ response[2] +'x'+response[3]+' cm');
						return false;
					}
					if (response[0].toString() == 'Y') {
						move(response[0].toString());
					}
				}
			});
		}
		
		$("#cekukuran").click(function() {
			var jmlcetak = $('#jmlcetakkm').val();
			var ukuran = $('#ukurankm').val();
			var bahan = $('#bahankm').val();
			var m = $("#pilih"+mod).val();
			if(m==1){
				idmesin = m;
				}else{
				idmesin = $("#idmesin").val();
			}
			if (jmlcetak == '') {
				salert('warning', 'Oops...', iMsg['J']);
				} else if (ukuran == 0) {
				salert('warning', 'Oops...', iMsg['U']);
				} else if (idmesin == 0) {
				salert('warning', 'Oops...', iMsg['M']);
				} else if (bahan == 0) {
				salert('warning', 'Oops...', iMsg['B']);
				} else {
				var bleed = $('#bleedkk').val();
				var lbrcetak = parseFloat($('#lbrcetakkm').val()) + (2 * parseFloat(bleed));
				var tgcetak = parseFloat($('#tgcetakkm').val()) + (2 * parseFloat(bleed));
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
					success: function(response) {
						if (response[0].toString() == 'N') {
							alert('Ukuran Kebesaran');
							} else {
							move('Y');
							hitungkm();
							 counter('Kalender Meja');
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