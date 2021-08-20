<?php 
	if (!empty($_POST['link'])){
	?>
	<script>
		$(document).ready(function(){
			$('.harga').hide();
			$('.printpenawaran').hide();
			$(".alert").hide();
			$('.btnon, .btnd, .btnp').prop('disabled',true);
			$('#jmlcetakm').keypress(validateNumber);
			$('#ketmap').keyup(function(){
				$('.btnon').prop('disabled', this.value == "" ? true : false);     
			})
		}); 
		$('.modal').on('hidden.bs.modal', function(){
			$(this).removeData('bs.modal');
		});
		$(document).ready(function(){
			$('#ukuranm').val('20');
			$('#lbrcetakm').val('25');
			$('#tgcetakm').val('36');
			$('#bbm').val('1');
			$('.kantongpolos').hide();
			$('.jmlwarnakantong').hide();
			$('#jmlwarnakantong').val(0);
			$('#tablemap').hide();
			$('.harga').hide();
			
		})
		
		
		
		$('#cetakkantonggabung').click(function(){	
			if ( $('#cetakkantonggabung').attr('checked')) {
				$('#cetakkantonggabung').attr('checked', false);
				$('.kantongpolos').show();
				} else {
				$('#cetakkantonggabung').attr('checked', 'checked');
				$('.kantongpolos').hide();
			}
		});	
		
		$('#kantongpolos').click(function(){
			
			if ( $('#kantongpolos').attr('checked')) {
				$('#kantongpolos').attr('checked', false);
				$('.jmlwarnakantong').show();
				$('#jmlwarnakantong').val(1);
				// alert(1);
				} else {
				$('#kantongpolos').attr('checked', 'checked');
				$('.jmlwarnakantong').hide();
				$('#jmlwarnakantong').val(0);
			}
		});	
		
		function hitungkantong(x){
			startTimer();
			var data1 = x;	
			var tgcetak = parseFloat(document.getElementById("lbrkantongmap").value) + 1.5;
			var lbrcetak = parseFloat(document.getElementById("lbrcetakm").value) + 1.5;
			var bahan = document.getElementById("bahanm").value;
			var jmlcetak = document.getElementById("jmlcetakm").value;
			
			var bb = 1;
			var jmlwarna = document.getElementById("jmlwarnakantong").value;			 
			var lam = 0;
			var jmlset = 1;
			var lbrf1= 1;		var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;						var tgf6 = 1;
			var finishing6 = '0';		
			var finishing1 = 0;
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			
			var modul="map";
			var insheet="1";
			var jml_satuan=1;
			var cetak_bagi="Y";
			var ket = document.getElementById("ketmap").value;
			var ket_satuan = "pcs";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';	
			
			var kethitung = 'Kantong';
			var idmesin = $('#idmesin').val();
			var idkertas = $('#idkertas').val();
			var j_mesin = '';
			if(document.getElementById("cetakkantonggabung").checked == false ){
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						myArr = JSON.parse(xmlhttp.responseText);
						var data2 = myArr[0];
						hasilmap(data1,data2);
					}
				}
				
				var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung+"&j_mesin="+j_mesin+"&idmesin=" + idmesin + "&idkertas=" + idkertas+"&app_id="+app_id;
				
				var url = host+'/sandboxm/get/';
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(isi);		
				}else{
				var data2 = {};
				hasilmap(data1,data2);
			}	
			
		}		
		
		function hasilmap(data1,data2){	
			// var modul="map";
			var ket = document.getElementById("ketmap").value;
			
			
			if (data1['ongpot'] == 'Y' ){ ongkos_potong = data1['ongkos_potong'];}else{ ongkos_potong = 0; }				
			subtotal1 = parseInt(data1['totcetak']) + parseInt(data1['totbhn']) + parseInt(ongkos_potong) + parseInt(data1['tot_ctp']) + parseInt(data1['totlaminating']) + parseInt(data1['finishing1']) + parseInt(data1['finishing2']) + parseInt(data1['finishing3']) + parseInt(data1['finishing4']) + parseInt(data1['finishing5']) + parseInt(data1['finishing6']);
			var arrStr1 = btoa(encodeURIComponent(JSON.stringify(data1)));
			
			//data2
			if(!!(data2['hrgbhn'])){
				if (data2['ongpot'] == 'Y' ){ ongkos_potong = data2['ongkos_potong'];} else{ ongkos_potong = 0; }				
				subtotal2 = parseInt(data2['totcetak']) + parseInt(data2['totbhn']) + parseInt(ongkos_potong) + parseInt(data2['tot_ctp']) + parseInt(data2['totlaminating']) + parseInt(data2['finishing1']) + parseInt(data2['finishing2']) + parseInt(data2['finishing3']) + parseInt(data2['finishing4']) + parseInt(data2['finishing5']) + parseInt(data2['finishing6']);
				var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2)));
				}else{
				var subtotal2 = '0';
				var arrStr2 = '';
			}	
			
			total  = parseInt(subtotal1)+ parseInt(subtotal2);  		
			profit = data1['persen'];
			jual = (parseInt(total) * profit / 100) + parseInt(total);
			satuan = jual / parseInt($('#jmlcetakm').val());
			perrim = satuan *  500;
			
			
			//	alert(arrStr1);
			$('#data1').val(arrStr1);
			$('#data2').val(arrStr2);
			$('#jumlahcetak').val($('#jmlcetakm').val());
			$('#ket').val(ket);
			$('#totjual').html("Rp. " + formatMoney(jual));
			$('#satuan').html("Rp. " + formatMoney(satuan) + "/pcs");
			$('#modul').val(modul);
			
			setTimeout(function(){ $('#tablemap').show(); }, 500); 
			
		}	
		
		function hitungmap(){		
			var lbrcetak = document.getElementById("lbrcetakm").value;
			var tgcetak = document.getElementById("tgcetakm").value;
			var lbrkantongmap = document.getElementById("lbrkantongmap").value;
			
			var jmlcetak = document.getElementById("jmlcetakm").value;
			var bahan = document.getElementById("bahanm").value;
			var bb = "";
			var jmlwarna = document.getElementById("jmlwarnam").value;
			var jmlwarna2 = document.getElementById("jmlwarnam2").value;
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				
			
			var lam = document.getElementById("lamm").value;
			var jmlset = 1;
			var lbrf1= 1;		var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;						var tgf6 = 1;
			var finishing1 = '0';
			var finishing2 = '0'; //Biaya Pon
			var finishing3 = '0'; // Pisau Pon
			var finishing4 = '0';
			var finishing5 = '0';
			var finishing6 = '0';		
			
			var modul="map";
			var insheet="1";
			var jml_satuan=1;
			var cetak_bagi="Y";
			var ket = document.getElementById("ketmap").value;
			var ket_satuan = "lbr";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			var kethitung = 'Map';
			var idmesin = $('#idmesin').val();
			var idkertas = $('#idkertas').val();
			var j_mesin = '';
			
			if(document.getElementById("cetakkantonggabung").checked == true ){
				lbrcetak = parseFloat(lbrcetak) * 2;
				tgcetak = parseFloat(tgcetak) + parseFloat(lbrkantongmap) ;	
				lbrf3= lbrcetak/jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
				tgf3 = tgcetak;
				finishing2 = '12'; //Biaya Pon
				finishing3 = '13'; // Pisau Pon			
				ongpot = 'N';
				}else{
				lbrcetak = parseFloat(lbrcetak) * 2;
				tgcetak = parseFloat(tgcetak);
				lbrf3= 1/jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
				//finishing2 = '12'; //Biaya Pon
				//	finishing3 = '13'; // Pisau Pon		
			}
			
			
			if(document.getElementById("finishing4m").checked == true ){
				finishing4 = '19';
				lbrf4= lbrcetak;
				tgf4 = tgcetak;
				
			}
			if(document.getElementById("finishing5m").checked == true ){
				finishing5 = '49';
			}
			if (jmlcetak != null && jmlcetak < 1){  
				salert('warning', 'Oops...', iMsg['J']);
				return;
			}	
			if(lbrcetak != null && lbrcetak < 1){
				salert('warning', 'Oops...', iMsg['L']);
				return;
			}
			if (tgcetak != null && tgcetak < 1){
				salert('warning', 'Oops...', iMsg['Y']);
				return;	
			}
			//alert(lbrcetak + 'x' + tgcetak);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);
					data1 = myArr[0];
					hitungkantong(data1);				
				}
			}
			var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung+"&j_mesin="+j_mesin+"&idmesin=" + idmesin + "&idkertas=" + idkertas+"&app_id="+app_id;
			
			var url = host+'/sandboxm/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);		
			
		}
		
		$("#ukuranm").filter(function() {
			$.ajax({
				url: host + "/api/"+app_id+"/ukuran/"+mod+"/20",
				type: 'GET',
				dataType: 'json',
				success: function(response) {
					var len = response.length;
					for (var i = 0; i < len; i++) {
						var id = response[i]['id'];
						var name = response[i]['name'];
						$("#ukuranm").append("<option value='" + id + "'>" + name + "</option>");
					}
				}
			});
		});
		$("#ukuranm").change(function () {
			var ukuran = $(this).val();
			$.ajax({
				url: host + "/cek/cariukuran/",
				type: "POST",
				data: {ukuran: ukuran,app_id:app_id},
				dataType: "json",
				success: function (response) {
					if (response[0] == 0.0) {
						$("#lbrcetakm,#tgcetakm").attr("readonly", false);
						$("#lbrcetakm").val(response[0]);
						$("#tgcetakm").val(response[1]);
						} else {
						$("#lbrcetakm,#tgcetakm").attr("readonly", true);
						$("#lbrcetakm").val(response[0]);
						$("#tgcetakm").val(response[1]);
					}
				},
			});
		});
		$("#bahanm").change(function() {
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
		
		
		$("#bahanm").filter(function() {
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
		function move(a) {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);
			
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					if(a=='Y'){
						$("#tablemap").show();
						}else{
						$("#tablemap").hide();
					}
					$("#myBar").hide();
					} else {
					width++;
					elem.style.width = width + '%';
					$("#tablemap").hide();
					$("#myBar").show();
				}
			}
		}
		CustomStyle();
		function cekukuranm(){
			var idmesin = document.getElementById("idmesin").value;
			var lbrcetak = document.getElementById("lbrcetakm").value;
			var tgcetak = document.getElementById("tgcetakm").value;
			var lbrkantongmap = document.getElementById("lbrkantongmap").value;
			if(document.getElementById("cetakkantonggabung").checked == true ){
				lbrcetak = parseFloat(lbrcetak) * 2;
				tgcetak = parseFloat(tgcetak) + parseFloat(lbrkantongmap) ;			
				}else{
				lbrcetak = parseFloat(lbrcetak) * 2;
				tgcetak = tgcetak;
			}
			var xmlhttp = new XMLHttpRequest();
			
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);
					if (myArr[0].toString()=='N'){
						salert('warning', 'Oops...', iMsg['U'] +'<br>Ukuran cetak - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+myArr[1]+' - '+ myArr[2] +'x'+myArr[3]+' cm');
						// document.getElementById("tgcetakm").value = 0;
						// document.getElementById("lbrcetakm").value = 0;
						move('N');
						}else{
						move('Y');
						hitungmap();
						 counter('Map');
					}
				}
			}
			var vals ="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&mesin="+idmesin+"&app_id="+app_id;
			var url = host+'/cek/cekukuran/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(vals);  
			
		}
	</script>      
	<?php
	}//end token
	else{
		echo json_encode(array(404 => "error"));
	}
?>