<?php
	if (!empty($_POST['link'])){
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			CustomStyle();
			$('.harga').hide();
			$('.printpenawaran').hide();
			$(".alert").hide();
			$('#print_foot').hide();
			$('.btnon, .btnd, .btnp').prop('disabled',true);
			$('#jmlcetaknot').keypress(validateNumber);
			// $().keypress(validateNumber);
			$('#ketnota').keyup(function(){
				$('.btnon').prop('disabled', this.value == "" ? true : false);     
			})
		}); 
		$(document).ready(function(){
			$('#ukurannot').val('24');
			$('#lbrcetaknot').val('16.5');
			$('#tgcetaknot').val('21.5');
			$('#bahannot').val('20');
			$('#tablenota').hide();
			
			$('#not').click(function(){	
				if( $('#detailnot').length ){
					$('#detailnot').remove();
				}	
			});		
		})
		$("#ukurannot").filter(function() {
			var deptid = 11;
			$.ajax({
				url: host + "/api/"+app_id+"/ukuran/buku/11",
				type: 'POST',
				dataType: 'json',
				success: function(response) {
					var len = response.length;
					for (var i = 0; i < len; i++) {
						var id = response[i]['id'];
						var name = response[i]['name'];
						$("#ukurannot").append("<option value='" + id + "'>" + name + "</option>");
					}
				}
			});
		});	
		$("#ukurannot").change(function () {
			var ukuran = $(this).val();
			$.ajax({
				url: host + "/cek/cariukuran/",
				type: "POST",
				data: {ukuran: ukuran,app_id:app_id},
				dataType: "json",
				success: function (response) {
					if (response[0] == 0.0) {
						$("#lbrcetaknot,#tgcetaknot").attr("readonly", false);
						$("#lbrcetaknot").val(response[0]);
						$("#tgcetaknot").val(response[1]);
						} else {
						$("#lbrcetaknot,#tgcetaknot").attr("readonly", true);
						$("#lbrcetaknot").val(response[0]);
						$("#tgcetaknot").val(response[1]);
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
		function move() {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);
			
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					$("#tablenota").show();
					$("#myBar").hide();
					} else {
					width++;
					elem.style.width = width + '%';
					$("#hidemyBar").removeClass("display-hidden");
					$("#tablenota").hide();
					$("#myBar").show();
				}
			}
		}
		function hitungnot() {
		 counter('Nota');
		startTimer();
			$('.simpan, .btnd, .btnp').prop('disabled', this.value == "" ? true : false);  
			var bleed = document.getElementById("bleednot").value;
			var lbrcetak = parseFloat(document.getElementById("lbrcetaknot").value) + parseFloat(bleed);
			var tgcetak = parseFloat(document.getElementById("tgcetaknot").value) + parseFloat(bleed);
			var jmltop = document.getElementById("jmltop").value;
			var jmlsetnot = document.getElementById("jmlsetnot").value;
			if (jmlsetnot != null && jmlsetnot < 10){  
				alert("Jumlah adalah jumlah set antara top, middle dan bottom dalam satu buku, biasanya isinya 50 set!!");
				return;
			}
			var jmlcetak = document.getElementById("jmlcetaknot").value;
			
			var jmlmiddle = document.getElementById("jmlmiddle").value;
			var jmlbottom = document.getElementById("jmlbottom").value;
			
			jmlcetak = jmlsetnot * jmlcetak * (parseInt(jmltop));
			
			var bahan = document.getElementById("bahantop").value;
			var bb = '1';
			var jmlwarna = document.getElementById("jmlwarnanot1").value;
			var jmlwarna2 = document.getElementById("jmlwarnanot2").value;
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}	
			//alert(jmlcetak);	
			
			
			var tarikan = 0;
			var lam = '0';
			var jmlset = 1;
			var lbrf1= 1;		var tgf1 = 1/500;//1 rim jadi 10 buku		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;		var tgf6 = 1;
			var finishing1 = '58';
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = '0';
			
			var cetak_bagi='Y';
			var jml_satuan = 1;
			var modul = 'nota';
			var insheet = "1";
			var ket = document.getElementById("ketnota").value;
			var ket_satuan = "buku";
			var rim = 500;
			var ongpot = 'N';
			var kethitung = 'TOP';
			var idmesin = $('#idmesin').val();
			var idkertas = 0;
			var j_mesin = '';
			
			if(document.getElementById("nomoratornot").checked == true ){
				finishing2 = '22';
				var lbrf2= document.getElementById("jmlnomnot").value;
			}
			if(document.getElementById("porporasinot").checked == true ){
				finishing3 = '21';
				var lbrf3= document.getElementById("jmlpornot").value/500;
			}
			
			if (jmlcetak != null && jmlcetak < 1){  
				alert("Jumlah Cetakan Kosong!!");
				return;
			}	
			
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);
					move();
					data1 = myArr[0];				
					hitungmiddle(data1);
					
				}
			}
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung+ "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			var url = host + '/sandboxm/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(isi);
			
		}
		
		
		function hitungmiddle(data1) {
			var jmlmiddle = document.getElementById("jmlmiddle").value;
			if (jmlmiddle != null && jmlmiddle < 1){  
				data2={};
				hitungbottom(data1,data2);
				}else{
				
				var bleed = document.getElementById("bleednot").value;
				var lbrcetak = parseFloat(document.getElementById("lbrcetaknot").value) + parseFloat(bleed);
				var tgcetak = parseFloat(document.getElementById("tgcetaknot").value) + parseFloat(bleed);
				var jmlsetnot = document.getElementById("jmlsetnot").value;
				var jmlcetak = document.getElementById("jmlcetaknot").value;
				jmlcetak = jmlsetnot * jmlcetak * jmlmiddle;
				
				//Hitung NCR middel
				var bahan = document.getElementById("bahanmiddle").value;
				var bb = '1';
				var jmlwarna = document.getElementById("jmlwarnanot1").value;
				var jmlwarna2 = document.getElementById("jmlwarnanot2").value;
				//alert(jmlcetak);	
				
				var tarikan = 0;
				var lam = '0';
				var jmlset = 1;
				var lbrf1= 1;		var tgf1 = 1/500;//1 rim jadi 10 buku		
				var lbrf2= 1;		var tgf2 = 1;		
				var lbrf3= 1;		var tgf3 = 1;		
				var lbrf4= 1;		var tgf4 = 1;		
				var lbrf5= 1;		var tgf5 = 1;
				var lbrf6= 1;		var tgf6 = 1;
				var finishing1 = '58';
				var finishing2 = 0;
				var finishing3 = 0;
				var finishing4 = 0;
				var finishing5 = 0;
				var finishing6 = '0';
				
				var cetak_bagi='Y';
				var jml_satuan = 1;
				var modul = 'nota';
				var insheet = "1";
				var ket = document.getElementById("ketnota").value;
				var ket_satuan = "buku";
				var rim = 500;
				var ongpot = 'N';
				var j_mesin = '';
				var kethitung = 'MIDDLE';
				var pakeplat ='N';
				var idmesin = $('#idmesin').val();
				var idkertas = 0;
				
				if(document.getElementById("nomoratornot").checked == true ){
					finishing2 = '22';
					var lbrf2= document.getElementById("jmlnomnot").value;
				}
				if(document.getElementById("porporasinot").checked == true ){
					finishing3 = '21';
					var lbrf3= document.getElementById("jmlpornot").value/500;
				}
				
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						myArr = JSON.parse(xmlhttp.responseText);
						
						data2 = myArr[0];
						//alert (JSON.stringify(data2));
						hitungbottom(data1,data2);
						
					}
				}
				var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung+"&pakeplat=" + pakeplat+ "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
				var url = host + '/sandboxm/get/';
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send(isi);
			}
		}	
		
		function hitungbottom(data1,data2) {
			var jmlbottom = document.getElementById("jmlbottom").value;
			if (jmlbottom != null && jmlbottom < 1){  
				data3={};
				hasilhitung(data1,data2,data3);
				}else{
				
				
				var bleed = document.getElementById("bleednot").value;
				var lbrcetak = parseFloat(document.getElementById("lbrcetaknot").value) + parseFloat(bleed);
				var tgcetak = parseFloat(document.getElementById("tgcetaknot").value) + parseFloat(bleed);
				var jmlsetnot = document.getElementById("jmlsetnot").value;
				var jmlcetak = document.getElementById("jmlcetaknot").value;
				jmlcetak = jmlsetnot * jmlcetak * jmlbottom;
				
				//Hitung NCR bottom
				var bahan = document.getElementById("bahanbottom").value;
				var bb = '1';
				var jmlwarna = document.getElementById("jmlwarnanot1").value;
				var jmlwarna2 = document.getElementById("jmlwarnanot2").value;
				//alert(jmlcetak);	
				
				var tarikan = 0;
				var lam = '0';
				var jmlset = 1;
				var lbrf1= 1;		var tgf1 = 1/500;//1 rim jadi 10 buku		
				var lbrf2= 1;		var tgf2 = 1;		
				var lbrf3= 1;		var tgf3 = 1;		
				var lbrf4= 1;		var tgf4 = 1;		
				var lbrf5= 1;		var tgf5 = 1;
				var lbrf6= 1;		var tgf6 = 1;
				var finishing1 = '58';
				var finishing2 = 0;
				var finishing3 = 0;
				var finishing4 = 0;
				var finishing5 = 0;
				var finishing6 = '0';
				
				var cetak_bagi='Y';
				var jml_satuan = 1;
				var modul = 'nota';
				var insheet = "1";
				var ket = document.getElementById("ketnota").value;
				var ket_satuan = "buku";
				var rim = 500;
				var ongpot = 'N';
				var pakeplat ='N';
				var kethitung = 'BOTTOM';
				var idmesin = $('#idmesin').val();
				var idkertas = 0;
				var j_mesin = '';
				
				if(document.getElementById("nomoratornot").checked == true ){
					finishing2 = '22';
					var lbrf2= document.getElementById("jmlnomnot").value;
				}
				if(document.getElementById("porporasinot").checked == true ){
					finishing3 = '21';
					var lbrf3= document.getElementById("jmlpornot").value/500;
				}
				
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						myArr = JSON.parse(xmlhttp.responseText);
						
						data3 = myArr[0];
						//alert (JSON.stringify(data3));
						hasilhitung(data1,data2,data3);
						
					}
				}
				var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung+"&pakeplat=" + pakeplat+ "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
				var url = host + '/sandboxm/get/';
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				xmlhttp.send(isi);
			}
		}			
		
		function hasilhitung(data1,data2,data3){
			var jmlcetak = document.getElementById("jmlcetaknot").value;
			var ket = document.getElementById("ketnota").value;
			
			
			
			//data1
			if(!!(data1['hrgbhn'])){ 
				if (data1['ongpot'] == 'Y' ){ ongkos_potong = data1['ongkos_potong'];}
				else{ ongkos_potong = 0; }				
				
				subtotal1 = parseInt(data1['totcetak']) + parseInt(data1['totbhn']) + parseInt(ongkos_potong) + parseInt(data1['tot_ctp']) + parseInt(data1['totlaminating']) + parseInt(data1['finishing1']) + parseInt(data1['finishing2']) + parseInt(data1['finishing3']) + parseInt(data1['finishing4']) + parseInt(data1['finishing5']) + parseInt(data1['finishing6']);
				var arrStr1 = btoa(encodeURIComponent(JSON.stringify(data1)));
				}else{
				var subtotal1 = '0';
				var arrStr1 = '';
			}		
			//data2		
			if(!!(data2['hrgbhn'])){ 				
				if (data2['ongpot'] == 'Y' ){ ongkos_potong = data2['ongkos_potong'];} else{ ongkos_potong = 0; }				
				
				subtotal2 = parseInt(data2['totcetak']) + parseInt(data2['totbhn']) + parseInt(ongkos_potong) + parseInt(data2['tot_ctp']) + parseInt(data2['totlaminating']) + parseInt(data2['finishing1']) + parseInt(data2['finishing2']) + parseInt(data2['finishing3']) + parseInt(data2['finishing4']) + parseInt(data2['finishing5']) + parseInt(data2['finishing6']);
				var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2)));
				}else{
				var subtotal2 = '0';
				var arrStr2 = '';
			}
			
			//data3
			if(!!(data3['hrgbhn'])){ 
				if (data3['ongpot'] == 'Y' ){ ongkos_potong = data3['ongkos_potong'];} else{ ongkos_potong = 0; }				
				
				subtotal3 = parseInt(data3['totcetak']) + parseInt(data3['totbhn']) + parseInt(ongkos_potong) + parseInt(data3['tot_ctp']) + parseInt(data3['totlaminating']) + parseInt(data3['finishing1']) + parseInt(data3['finishing2']) + parseInt(data3['finishing3']) + parseInt(data3['finishing4']) + parseInt(data3['finishing5']) + parseInt(data3['finishing6'])+ parseInt(data3['tot_lipat']);
				var arrStr3 = btoa(encodeURIComponent(JSON.stringify(data3)));
				}else{
				var subtotal3 = '0';
				var arrStr3 = '';
			}
			
			total = parseInt(subtotal1) + parseInt(subtotal2) + parseInt(subtotal3);
			
			profit = data1['persen'];
			jual = (parseInt(total) * parseInt(profit) / 100) + parseInt(total);
			satuan = parseInt(jual / jmlcetak);
			//alert(satuan);
		
			
			//	alert(arrStr1);
			$('#datanota1').val(arrStr1);
			$('#datanota2').val(arrStr2);
			$('#datanota3').val(arrStr3);
			$('#ketnota').val(ket);
			$('#mesin').html(data1['mesin']);
			$('#jumlahcetaknota').val(jmlcetak);
			$('#totjualnota').html("Rp. " + formatMoney(jual));
			$('#satuanota').html("Rp. " + formatMoney(satuan) + "/pcs");	
			
			$('#tablenota').show(); 
			
			
		}		
		
		function cariukurannot(){
			
			var ukuran = document.getElementById("ukurannot").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);
					document.getElementById("lbrcetaknot").value = myArr[0];
					document.getElementById("tgcetaknot").value = myArr[1];
					//alert(myArr[0].toString());
				}
			}
			// xmlhttp.open("GET","function/cariukuran.php?ukuran="+ukuran,true);
			// xmlhttp.send();	
			var vals ="ukuran="+ukuran+"&app_id="+app_id;
			// xmlhttp.send();	
			var url = host+'/cek/cariukuran/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(vals);  
		}
		
	</script>
	<?php
	} //end token
	else {
		echo json_encode(array(404 => "error"));
	}
?>