<?php
	if (!empty($_POST['link'])){
	?>
	<script type="text/javascript">
		$(document).ready(function(){
			CustomStyle();
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
			$('#c-nav').hide();
			$('.btnon, .btnd, .btnp').prop('disabled',true);
			$('#jmlcetakbox6').keypress(validateNumber);
			$('#ketbox6').keyup(function(){
				$('.btn').prop('disabled', this.value == "" ? true : false);     
			});
		}); 
		$('.btnon, .btnd, .btnp').on('hidden.bs.modal', function(){
			$(this).removeData('bs.modal');
		});
		//
		$('#jmlcetakbox6').blur(function () {
			if($(this).val() == "" || $(this).val() == '0'){
				$(".jml").removeClass( "has-success" ).addClass( "has-danger" );
				} else {
				$(".jml").removeClass( "has-danger" ).addClass( "has-success" );
				$('#not1').removeClass("blink-bg");
			}
		});
		//
		$('#lbrcetakbox6').blur(function () {
			if($(this).val() == "" || $(this).val() == '0'){
				$(".lbrcetakbox6").removeClass( "has-success" ).addClass( "has-danger" );
				} else {
				$(".lbrcetakbox6").removeClass( "has-danger" ).addClass( "has-success" );
			}
		});
		//
		$('#pjcetakbox6').blur(function () {
			if($(this).val() == "" || $(this).val() == '0'){
				$(".pjcetakbox6").removeClass( "has-success" ).addClass( "has-danger" );
				} else {
				$(".pjcetakbox6").removeClass( "has-danger" ).addClass( "has-success" );
			}
		});
		//
		$('#idmesin').change(function () {
			if($(this).val() == "" || $(this).val() == '0'){
				$(".idmesin").removeClass( "has-success" ).addClass( "has-danger" );
				} else {
				$(".idmesin").removeClass( "has-danger" ).addClass( "has-success" );
				$('#not3').removeClass("blink-bg");
			}
		});
		$('#ukuranp').change(function () {
			if($(this).val() == "" || $(this).val() == 0){
				$(".ukuranp").removeClass( "has-success" ).addClass( "has-danger" );
				} else {
				$(".ukuranp").removeClass( "has-danger" ).addClass( "has-success" );
				$(".lbrcetakp").removeClass( "has-danger" ).addClass( "has-success" );
				$(".tgcetakp").removeClass( "has-danger" ).addClass( "has-success" );
			}
		});
		$('#bahanbox6').change(function () {
			if($(this).val() == "" || $(this).val() == '0'){
				$(".bahanbox6").removeClass( "has-success" ).addClass( "has-danger" );
				$(".idkertas").removeClass( "has-success" ).addClass( "has-danger" );
				} else {
				$(".bahanbox6").removeClass( "has-danger" ).addClass( "has-success" );
				$(".idkertas").removeClass( "has-danger" ).addClass( "has-success" );
				$('#not4').removeClass("blink-bg");
			}
		});
		
		$('#ketbox6').blur(function () {
			if($(this).val() == ""){
				$(".ketbox6").removeClass( "has-success" ).addClass( "has-danger" );
				} else {
				$(".ketbox6").removeClass( "has-danger" ).addClass( "has-success" );
			}
		});
		//
		function move(a) {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);
			
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					if(a=='Y'){
						$("#tablebox6").show();
						}else{
						$("#tablebox6").hide();
					}
					$("#myBar").hide();
					} else {
					width++;
					elem.style.width = width + '%';
					$("#tablebox6").hide();
					$("#myBar").show();
				}
			}
		}
		$(document).ready(function(){
			$('#lbrcetakbox6').val('18');
			$('#tgtutupatasbox6').val('2');
			$('#tgtutupbawahbox6').val('8');
			$('#pjcetakbox6').val('18');
			$('#bbbox6').val('1');
			$('#lbrtutupbox6').val('1.5');
			$('#lbrdimensi4').val('0.5');
			$('.gabungcetakbox6').hide();
			$('.tutupbawah').hide();
			
			
			$('#bx6').click(function(){	
				if( $('#detailbox6').length ){
					$('#detailbox6').remove();
				}	
				
			});		
		})
		
		
		$('#tutupboxbawahbox6').click(function(){
			
			if ( $('#tutupboxbawahbox6').attr('checked')) {
				$('#tutupboxbawahbox6').attr('checked', false);
				$('#gabungcetakbox6').prop('checked', true);
				
				$('.gabungcetakbox6').show();
				} else {
				$('#tutupboxbawahbox6').attr('checked', 'checked');
				$('.gabungcetakbox6').hide();
				$('.tutupbawah').hide();
				
			}
		});
		
		$('#gabungcetakbox6').click(function(){
			
			if ( $('#gabungcetakbox6').attr('checked')) {
				$('#gabungcetakbox6').attr('checked', false);
				$('.tutupbawah').show();
				} else {
				$('#gabungcetakbox6').attr('checked', 'checked');
				$('.tutupbawah').hide();
			}
		});	
		function hitungbox6(l1,t1,l2,t2,bawah){
			startTimer();
			lbrcetak 	= l1;
			tgcetak 	= t1;		
			lbrcetak2 	= l2;
			tgcetak2 	= t2;
			
			var jmlcetak = document.getElementById("jmlcetakbox6").value;
			var bahan = document.getElementById("bahanbox6").value;
			var bb = document.getElementById("bbbox6").value;
			var jmlwarna = document.getElementById("jmlwarnabox61").value;
			var jmlwarna2 = document.getElementById("jmlwarnabox62").value;
			if (jmlwarna=='Full Color'){
				jmlwarna=4;
			}
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				
			
			var lam = document.getElementById("lambox6").value;
			var jmlset = 1;
			var lbrf1= 1;		var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;						var tgf6 = 1;
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
			
			var modul="box6";
			var insheet="1";
			var jml_satuan=1;
			var cetak_bagi="Y";
			var ket = document.getElementById("ketbox6").value;
			var ket_satuan = "lbr";
			var rim = 500;
			var box = 100;
			var ongpot = 'N';
			var kethitung = "Box_Atas";
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
			//Pond
			lbrf3= lbrcetak/jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
			tgf3 = tgcetak;
			finishing2 = '12'; //Biaya Pon
			var pilihpond = $("#pilihpond").val();
			finishing3 = pilihpond; // Pisau Pon
			
			//SpotUV
			if(document.getElementById("finishing4box6").checked == true ){
				finishing4 = '19';
				lbrf4= lbrcetak;
				tgf4 = tgcetak;
			}
			
			if(document.getElementById("finishing1box6").checked == true ){ //Poly
				lbrpolykop = document.getElementById("lbrpolybox6").value;
				tgpolykop = document.getElementById("tgpolybox6").value;
				finishing5 = '10'; //Press Poly
				lbrf5= lbrpolykop;
				tgf5 = tgpolykop;			
				finishing1 = '11'; //Plat Poly
				lbrf1= lbrpolykop/jmlcetak;
				tgf1 = tgpolykop;
				
			}
			if (document.getElementById("pond" + mod).checked == true) {
				lbrpondoffset = document.getElementById("lbrpond" + mod).value;
				tgpondoffset = document.getElementById("tgpond" + mod).value;
				finishing6 = '12'; //Press pond
				finishing7 = '13'; //Plat pond
				lbrf7 = lbrpondoffset / jmlcetak;
				tgf7 = tgpondoffset;
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
			//alert(lbrcetak);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					data = JSON.parse(xmlhttp.responseText);				
					if(data[0]['akses']=='Y'){
						if(bawah != 1 ){
							hitungkertasbox6bwh(data);
							}else{
							
							if( $('#tablbox6').length ){
								$('#tablbox6 tr:gt(0)').remove();	
								var table = $('#tablbox6').children();					
								var i;
								var no=1;
								var x;
								var ongkos_potong = 0;
								for (i = 0; i < data.length; i++) {
									
									if (data[i]['ongpot'] == 'Y' ){
										ongkos_potong = data[i]['ongkos_potong'];
									}						
									totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + +parseInt(data[i]['finishing8']);
									
									profit = data[i]['persen'];
									jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
									satuan = jual / jmlcetak / jml_satuan;
									hsatuan = "Rp. " + formatMoney(satuan) + "/pcs ";
									if(jmlcetak > rim){
										perrim = satuan * rim;
										drim = hsatuan +" | Rp. " + formatMoney(perrim) + "/rim";
										}else{
										perrim = satuan * rim;
										drim = hsatuan;
									}
									var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
									x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >"+drim+"<button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm hint--top-left' aria-label='Klik Detail data' style='background-color:<?= $warnabar; ?>;color:white;width:120px'>Rp." + formatMoney(jual) + "</button><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></td></tr>";
									
								}
								table.append(x);
								
								}else{
								$('#tablebox6').append("<div class='small table-responsive'><table id='tablbox6' class='table'><thead><tr style='background-color:#ff8000;color:white' class='p-0'><th  class='text-left'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");
								
								var table = $('#tablbox6').children();
								var i;
								var no=1;
								var ongkos_potong = 0;
								for (i = 0; i < data.length; i++) {
									
									if (data[i]['ongpot'] == 'Y' ){
										ongkos_potong = data[i]['ongkos_potong'];
									}						
									totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + +parseInt(data[i]['finishing8']);
									
									profit = data[i]['persen'];
									jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
									satuan = jual / jmlcetak / jml_satuan;
									hsatuan = "Rp. " + formatMoney(satuan) + "/pcs ";
									if(jmlcetak > rim){
										perrim = satuan * rim;
										drim = hsatuan +" | Rp. " + formatMoney(perrim) + "/rim";
										}else{
										perrim = satuan * rim;
										drim = hsatuan;
									}
									
									var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
									x += "<tr class='text-left'><td>" + data[i]['mesin'] + "</td><td class='text-right' >"+drim+"<button type='submit' name='submit' value='" + [i] + "' class='btn btn-warning btn-sm hint--top-left' aria-label='Klik Detail data' style='background-color:<?= $warnabar; ?>;color:white;width:120px'>Rp." + formatMoney(jual) + "</button><input type='hidden' name='jumlahcetak' value='" + jmlcetak + "' /><input type='hidden' name='ket' value='" + ket + "' /><input type='hidden' name='data1[]' value='" + arrStr + "' /></td></tr>";
								}
								
								table.append(x);
							}		
						}
						}else{
						$("#table_box1").append("<div class='small'>Data tidak ditemukan</div>");
					}
				}
			}
			
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + finishing7 + "&finishing8=" + finishing8 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			var url = host + '/sandboxm/get/';
			xmlhttp.open("POST", url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(isi);	
			
		}
		
		function hitungkertasbox6bwh(x){
			startTimer();
			var data = x;
			var lbr = document.getElementById("lbrcetakbox6").value;
			var tg = document.getElementById("tgtutupbawahbox6").value;
			var pj = document.getElementById("pjcetakbox6").value;
			
			//ukuran tutup bawah
			lbrcetak 	= (2 * parseFloat(tg)) + parseFloat(lbr);
			tgcetak 	= (2 * parseFloat(tg)) + parseFloat(pj);
			
			var jmlcetak = document.getElementById("jmlcetakbox6").value;
			var bahan = document.getElementById("bahanbawahbox6").value;
			var bb = document.getElementById("bbbox6").value;
			var jmlwarna = document.getElementById("jmlwarnabawahbox61").value;
			var jmlwarna2 = document.getElementById("jmlwarnabawahbox62").value;
			
			
			if(document.getElementById("tutupboxbawahbox6").checked == true ){
				jmlwarna =0;			
				jmlwarna2 =0;			
			}		
			
			var lam = document.getElementById("lambawahbox6").value;
			var jmlset = 1;
			var lbrf1= 1;		var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;						var tgf6 = 1;
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
			
			var modul="box6";
			var insheet="1";
			var jml_satuan=1;
			var cetak_bagi="Y";
			var ket = document.getElementById("ketbox6").value;
			var ket_satuan = "pcs";
			var rim = 500;
			var box = 100;
			var ongpot = 'N';
			var kethitung = "Box_Bawah";
			if(document.getElementById("tutupboxbawahbox6").checked == true ){
				var idmesin = $("#idmesin").val();
				var idkertas = $("#idkertas").val();
				}else{
				var idmesin = $("#idmesinb").val();
				var idkertas = $("#idkertasb").val();		
			}
			
			var j_mesin = "";
			
			//Pond
			lbrf3= lbrcetak/jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
			tgf3 = tgcetak;
			finishing2 = '12'; //Biaya Pon
			var pilihpond = $("#pilihpond").val();
			finishing3 = pilihpond; // Pisau Pon
			//SpotUV
			if(document.getElementById("finishing4bawahbox6").checked == true ){
				finishing4 = '19';
				lbrf4= lbrcetak;
				tgf4 = tgcetak;
			}
			
			if(document.getElementById("finishing1bawahbox6").checked == true ){ //Poly
				lbrpolykop = document.getElementById("lbrpolybawahbox6").value;
				tgpolykop = document.getElementById("tgpolybawahbox6").value;
				finishing5 = '10'; //Press Poly
				lbrf5= lbrpolykop;
				tgf5 = tgpolykop;			
				finishing1 = '11'; //Plat Poly
				lbrf1= lbrpolykop/jmlcetak;
				tgf1 = tgpolykop;
				
			}
			
			//	alert(tgcetak);
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					var arr  = xmlhttp.responseText;
					var data2 = JSON.parse(arr);	
					if(data2[0]['akses']=='Y'){
						//kertas kosong
						var ongkos_potong = 0;
						// var data2 = myArr;
						
						subtotal2 = parseInt(data2[0]['totcetak']) + parseInt(data2[0]['totbhn']) + parseInt(ongkos_potong) + parseInt(data2[0]['tot_ctp']) + parseInt(data2[0]['totlaminating']) + parseInt(data2[0]['finishing1']) + parseInt(data2[0]['finishing2']) + parseInt(data2[0]['finishing3']) + parseInt(data2[0]['finishing4']) + parseInt(data2[0]['finishing5']) + parseInt(data2[0]['finishing6']);
						var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2[0])));
						//alert(myArr[0]['totbhn']);
						
						if( $('#tablbox6').length ){
							$('#tablbox6 tr:gt(0)').remove();	
							var table = $('#tablbox6').children();					
							var i;
							var x;
							var ongkos_potong = 0;
							for (i = 0; i < data.length; i++) {
								
								if (data[i]['ongpot'] == 'Y' ){
									ongkos_potong = data[i]['ongkos_potong'];
								}						
								subtotal1 = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + parseInt(data[i]['finishing8']);
								
								var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
								
								
								total = subtotal1 + subtotal2;
								profit = data[i]['persen'];
								jual = (parseInt(total) * profit / 100) + parseInt(total);
								satuan = jual / jmlcetak / jml_satuan;
								hsatuan = "Rp. " + formatMoney(satuan) + "/pcs ";
								if(jmlcetak > rim){
									perrim = satuan * rim;
									drim = hsatuan +" | Rp. " + formatMoney(perrim) + "/rim";
									}else{
									perrim = satuan * rim;
									drim = hsatuan;
								}
								
								
								x +="<tr id='ctr' class='text-md-left'><td>"+data[i]['mesin']+"</td><td id='ctd' class='text-md-right' >"+drim+" <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='width:120px'>Rp."+formatMoney(jual)+"</button><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /><input type='hidden' name='data2[]' value='"+arrStr2+"' /></td></tr>";		
								
							}
							table.append(x);
							}else{
							
							$('#tablebox6').append("<div class='small table-responsive'><table id='tablbox6' class='table'><thead><tr style='background-color:#ff8000;color:white' class='p-0'><th  class='text-left'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");
							
							var table = $('#tablbox6').children();
							var i;
							var no=1;
							var ongkos_potong = 0;
							for (i = 0; i < data.length; i++) {
								
								if (data[i]['ongpot'] == 'Y' ){
									ongkos_potong = data[i]['ongkos_potong'];
								}						
								subtotal1 = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']) + parseInt(data[i]['finishing7']) + parseInt(data[i]['finishing8']);
								
								var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
								
								
								total = subtotal1 + subtotal2;
								profit = data[i]['persen'];
								jual = (parseInt(total) * profit / 100) + parseInt(total);
								satuan = jual / jmlcetak / jml_satuan;
								if(jmlcetak >= rim){
									perrim = satuan * rim;
									perrim = "Rp. " + formatMoney(satuan) + "/pcs - Rp. " + formatMoney(perrim) + "/rim";
									}else{
									perrim = satuan;
									perrim = "Rp. " + formatMoney(satuan) + "/pcs";
								}
								
								x +="<tr id='ctr' class='text-md-left'><td>"+data[i]['mesin']+"</td><td id='ctd' class='text-md-right' >"+perrim+" <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='width:120px'>Rp."+formatMoney(jual)+"</button><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /><input type='hidden' name='data2[]' value='"+arrStr2+"' /></td></tr>";	
							}
							
							table.append(x);
						}	
						}else{
						$("#table_box1").hide();
						$('#tablbox6').show();
						$("#table_box1").append("<div class='small'>Data tidak ditemukan</div>");
					}
				}
			}
			
			var isi = "lbrcetak=" + lbrcetak + "&tgcetak=" + tgcetak + "&jmlcetak=" + jmlcetak + "&bahan=" + bahan + "&bb=" + bb + "&jmlwarna=" + jmlwarna + "&jmlwarna2=" + jmlwarna2 + "&lam=" + lam + "&finishing1=" + finishing1 + "&finishing2=" + finishing2 + "&finishing3=" + finishing3 + "&finishing4=" + finishing4 + "&finishing5=" + finishing5 + "&finishing6=" + finishing6 + "&finishing7=" + finishing7 + "&finishing8=" + finishing8 + "&lbrf1=" + lbrf1 + "&tgf1=" + tgf1 + "&lbrf2=" + lbrf2 + "&tgf2=" + tgf2 + "&lbrf3=" + lbrf3 + "&tgf3=" + tgf3 + "&lbrf4=" + lbrf4 + "&tgf4=" + tgf4 + "&lbrf5=" + lbrf5 + "&tgf5=" + tgf5 + "&lbrf6=" + lbrf6 + "&tgf6=" + tgf6 + "&lbrf7=" + lbrf7 + "&tgf7=" + tgf7 + "&jmlset=" + jmlset + "&modul=" + modul + "&insheet=" + insheet + "&jml_satuan=" + jml_satuan + "&cetak_bagi=" + cetak_bagi + "&ket_satuan=" + ket_satuan + "&ongpot=" + ongpot + "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			var url = host + '/sandboxm/get/';
			xmlhttp.open("POST", url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(isi);	
		}
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
		$("#idmesinb").filter(function () {
			$("select[data-mesinb]").each(function () {
				var $select = $(this);
				$select.append('<option value="0">Pilih mesin bawah</option>');
				$.ajax({
					url: $select.attr("data-mesinb"),
					}).then(function (options) {
					options.map(function (option) {
						var $option = $("<option>");
						$option.val(option[$select.attr("data-valueKeys")]).text(option[$select.attr("data-displayKeys")]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahanbox6").change(function () {
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
		$("#bahanbox6").filter(function () {
			$("select[data-source]").each(function () {
				var $select = $(this);
				$select.append('<option value="0">Pilih bahan</option>');
				$.ajax({
					url: $select.attr("data-source"),
					}).then(function (options) {
					options.map(function (option) {
						var $option = $("<option>");
						$option.val(option[$select.attr("data-valueKey")]).text(option[$select.attr("data-displayKey")]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahanbawahbox6").filter(function () {
			$("select[data-bawah]").each(function () {
				var $select = $(this);
				$select.append('<option value="0">Pilih bahan bawah</option>');
				$.ajax({
					url: $select.attr("data-bawah"),
					}).then(function (options) {
					options.map(function (option) {
						var $option = $("<option>");
						$option.val(option[$select.attr("data-valueKeys")]).text(option[$select.attr("data-displayKeys")]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahanbawahbox6").change(function () {
			var deptid = $(this).val();
			$.ajax({
				url: host+"/kertas/",
				type: "post",
				data: {depart: deptid,app_id:app_id},
				dataType: "json",
				success: function (response) {
					var len = response.length;
					$("#idkertasb").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]["id"];
						var name = response[i]["name"];
						$("#idkertasb").append("<option value='" + id + "'>" + name + "</option>");
					}
				},
			});
		});
		$("#cekukuran"+mod).click(function () {
			CustomStyle();
			var jmlcetak = $("#jmlcetak"+mod).val();
			var lbrcetakp = $("#lbrcetak"+mod).val();
			var tgcetakp = $("#pjcetak"+mod).val();
			// var ukuran = $("#ukuranp").val();
			
			var bahan = $("#bahan"+mod).val();
			var jmlwarnap = $("#jmlwarnabox61").val();
			var m = $("#pilih"+mod).val();
			if(m==1){
				idmesin = m;
				}else{
				idmesin = $("#idmesin").val();
			}
			
			if (jmlcetak == "" || jmlcetak == "0") {
				salert('warning', 'Oops...', iMsg['J']);
				// $(".jml").addClass("has-danger");
				// alertx("Jumlah belum diisi", "not1", "jmlcetakp");
				} else if (lbrcetakp == "" || lbrcetakp == 0) {
				salert('warning', 'Oops...', iMsg['L']);
				// alertx("Lebar cetak belum diisi", "a", "lbrcetakp");
				} else if (tgcetakp == "" || tgcetakp == 0) {
				salert('warning', 'Oops...', iMsg['T']);
				// alertx("Tinggi cetak belum diisi", "a", "tgcetakp");
				} else if (jmlwarnap == "" || jmlwarnap == 0) {
				salert('warning', 'Oops...', iMsg['W']);
				// alertx("Jumlah warna belum diisi", "a", "jmlwarnap");
				} else if (idmesin == 0) {
				salert('warning', 'Oops...', iMsg['M']);
				// alertx("mesin belum dipilih", "not3", "idmesin");
				} else if (bahan == 0) {
				salert('warning', 'Oops...', iMsg['B']);
				// alertx("bahan belum dipilih", "not4", "bahanp");
				} else {
				move();
				// var idmesin = document.getElementById("idmesin").value;
				var lbr = document.getElementById("lbrcetak"+mod).value;
				var tg = document.getElementById("tgtutupatas"+mod).value;
				var tg2 = document.getElementById("tgtutupbawah"+mod).value;
				var pj = document.getElementById("pjcetak"+mod).value;
				
				if (lbr > pj){
					var lbr = document.getElementById("pjcetak"+mod).value;
					var pj = document.getElementById("lbrcetak"+mod).value;
				}
				
				//ukuran tutup atas
				lbrcetak 	= (2 * parseFloat(tg)) + parseFloat(lbr);
				tgcetak 	= (2 * parseFloat(tg)) + parseFloat(pj);
				//ukuran tutup bawah
				lbrcetak2 	= (2 * parseFloat(tg2)) + parseFloat(lbr);
				tgcetak2 	= (2 * parseFloat(tg2)) + parseFloat(pj);
				
				if(document.getElementById("tutupboxbawah"+mod).checked == true ){
					bawah = 0;
					}else{
					if(document.getElementById("gabungcetak"+mod).checked == true ){
						bawah = 1;
						
						if(tgcetak  > tgcetak2){
							tinggicetakan = tgcetak;
							}else{
							tinggicetakan = tgcetak2;
						}
						
						lebarcetakan = lbrcetak + lbrcetak2;
						
						lbrcetak = lebarcetakan;
						tgcetak = tinggicetakan;	
						}else{
						bawah = 0;
					}
					
				}	
				// alert(bawah );
				$.ajax({
					url: host+"/cekm/cekukuran/",
					type: "POST",
					data: {
						mesin: idmesin,
						lbrcetak: lbrcetak,
						tgcetak: tgcetak,
						app_id: app_id
					},
					dataType: "json",
					beforeSend: function () {
						$("#not1").removeClass("blink-bg");
					},
					success: function (res) {
						if (res[0].toString() == "N") {
							salert('warning', 'Oops...', iMsg['U'] +'<br>Ukuran cetak - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+res[1]+' - '+ res[2] +'x'+res[3]+' cm');
							move(res[0].toString());
							} else {
							move('Y');
							hitungbox6(lbrcetak,tgcetak,lbrcetak2,tgcetak2,bawah);
							counter('Box 6');
						}
					},
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