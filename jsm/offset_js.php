<?php
	if (!empty($_POST['link'])){
		$warnabar = "#9e4725";
	?>
	<script>
		$(document).ready(function(){
			$('.harga').hide();
			$('.printpenawaran').hide();
			$(".alert").hide();
			$('.btnon, .btnd, .btnp').prop('disabled',true);
			$('#jmlcetakoffset').keypress(validateNumber);
			$('#ketoffset').keyup(function(){
				$('.btn').prop('disabled', this.value == "" ? true : false);     
			})
		}); 
		$('.btnon, .btnd, .btnp').on('hidden.bs.modal', function(){
			$(this).removeData('bs.modal');
		});
		
		$(document).ready(function(){
			$('#lbrcetakoffset').val('21');
			$('#tgcetakoffset').val('29.7');
			$('#bboffset').val('1');
			$('.harga').hide();
			
		})
		
		function move(a) {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);
			
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					if(a=='Y'){
						$("#tableoffset").show();
						}else{
						$("#tableoffset").hide();
					}
					$("#myBar").hide();
					} else {
					width++;
					elem.style.width = width + '%';
					$("#tableoffset").hide();
					$("#myBar").show();
				}
			}
		}
		
		$('#tutupboxbawah1').click(function(){
			
			if ( $('#tutupboxbawah1').attr('checked')) {
				$('#tutupboxbawah1').attr('checked', false);
				$('#gabungcetakoffset').prop('checked', true);
				
				$('.gabungcetakoffset').show();
				} else {
				$('#tutupboxbawah1').attr('checked', 'checked');
				$('.gabungcetakoffset').hide();
				$('.tutupbawah').hide();
				
			}
		});
		
		$('#gabungcetakoffset').click(function(){
			
			if ( $('#gabungcetakoffset').attr('checked')) {
				$('#gabungcetakoffset').attr('checked', false);
				$('.tutupbawah').show();
				} else {
				$('#gabungcetakoffset').attr('checked', 'checked');
				$('.tutupbawah').hide();
			}
		});	
		
		CustomStyle();
		//mesin isi
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
		//cek ukuran
		$("#idmesin").change(function() {
			var idmesin = $(this).val();
			if(idmesin >0){
				var lbrcetak = $('#lbrcetakoffset').val();
				var tgcetak = $('#tgcetakoffset').val();
				$.ajax({
					url: host+'/cek/cekukuran/',
					type: 'post',
					data: {mesin: idmesin,lbrcetak: lbrcetak,tgcetak: tgcetak,app_id: app_id},
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
		///bahan isi
		$("#bahanoffset").filter(function() {
			$('select[data-bahan]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih bahan</option>');
				$.ajax({
					url: $select.attr('data-bahan'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahanoffset").change(function () {
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
		function hitungoffset(){
			startTimer();
			move("N");
			var bleed = document.getElementById("bleedoffset").value;
			var lbrcetak = parseFloat(document.getElementById("lbrcetakoffset").value) + ( 2 * parseFloat(bleed));
			var tgcetak = parseFloat(document.getElementById("tgcetakoffset").value) + ( 2 * parseFloat(bleed));
			
			var jmlcetak = document.getElementById("jmlcetakoffset").value;
			var bahan = document.getElementById("bahanoffset").value;
			
			var jmlwarna = document.getElementById("jmlwarnaoffset").value;
			var jmlwarna2 = document.getElementById("jmlwarnaoffset2").value;
			var lam = document.getElementById("lamoffset").value;
			
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				
			
			var jmlset = 1;
			var lbrf1= 1;		var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;		var tgf6 = 1;
			var lbrf7= 1;		var tgf7 = 1;
			var lbrf8= 1;		var tgf8 = 1;
			var lbrf9= 1;		var tgf9 = 1;
			var lbrf10= 1;		var tgf10 = 1;
			var finishing1 = 0;
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = 0;		
			var finishing7 = 0;		
			var finishing8 = 0;		
			var finishing9 = 0;		
			var finishing10 = 0;		
			
			var modul="offset";
			var insheet="1";
			var jml_satuan=1;
			var cetak_bagi="Y";
			var ket = document.getElementById("ketoffset").value;
			var ket_satuan = "pcs";
			var rim = 500;
			var ongpot = 'Y';
			var kethitung = 'Offset';
			var idmesin = $("#idmesin").val();
			var j_mesin = $("#idmesin").val();;
			var idkertas = $("#idkertas").val();
			
			
			//SpotUV
			if(document.getElementById("spotuvoffset").checked == true ){
				finishing1 = '19';
				lbrf1= document.getElementById("lbrspotuvoffset").value;
				tgf1 = document.getElementById("tgspotuvoffset").value;
			}
			//poly
			if(document.getElementById("polyoffset").checked == true ){ 
				lbrpolyoffset = document.getElementById("lbrpolyoffset").value;
				tgpolyoffset = document.getElementById("tgpolyoffset").value;
				finishing2 = '10'; //Press Poly
				lbrf2= lbrpolyoffset;
				tgf2 = tgpolyoffset;			
				finishing3 = '11'; //Plat Poly
				lbrf3= lbrpolyoffset/jmlcetak;
				tgf3 = tgpolyoffset;
				
			}
			
			//embos
			if(document.getElementById("embosoffset").checked == true ){ 
				lbrembosoffset = document.getElementById("lbrembosoffset").value;
				tgembosoffset = document.getElementById("tgembosoffset").value;
				finishing4 = '14'; //Press embos
				lbrf4= lbrembosoffset;
				tgf4 = tgembosoffset;			
				finishing5 = '15'; //Plat embos
				lbrf5= lbrembosoffset/jmlcetak;
				tgf5 = tgembosoffset;
			}				
			//Pond
			if(document.getElementById("pondoffset").checked == true ){ 
				lbrpondoffset = document.getElementById("lbrpondoffset").value;
				tgpondoffset = document.getElementById("tgpondoffset").value;
				finishing6 = '12'; //Press pond
				lbrf6= lbrpondoffset/jmlcetak;
				tgf6 = tgpondoffset;			
				finishing7 = '13'; //Plat pond
				lbrf7= lbrpondoffset/jmlcetak;
				tgf7 = tgpondoffset;
				ongpot = 'N';
			}
			
			//Porporasi
			if(document.getElementById("porporasioffset").checked == true ){ 
				jml = document.getElementById("jmlporporasioffset").value;
				finishing8 = '21'; //Press porporasi
				lbrf8 = parseFloat(jml)/500;
			}
			//Nomorator
			if(document.getElementById("nomoratoroffset").checked == true ){ 
				jml = document.getElementById("jmlnomoratoroffset").value;
				finishing9 = '22'; //Press nomorator
				lbrf9 = jml;
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
					myArr = JSON.parse(xmlhttp.responseText);				
					move("Y");
					//var data = myArr[0];
					//$('#ketoffset').val(JSON.stringify(formatMoney(data['total_jual'])));
					data = myArr;
					if( $('#tabloffset').length ){
						$('#tabloffset tr:gt(0)').remove();	
						var table = $('#tabloffset').children();					
						var i;
						var x;
						var ongkos_potong = 0;
						for (i = 0; i < data.length; i++) {
							
							if (data[i]['ongpot'] == 'Y' ){
								ongkos_potong = data[i]['ongkos_potong'];
							}						
							total = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6'])+ parseInt(data[i]['finishing7'])+ parseInt(data[i]['finishing8'])+ parseInt(data[i]['finishing9'])+ parseInt(data[i]['finishing10']);
							
							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
							
							profit = data[i]['persen'];
							jual = (parseInt(total) * profit / 100) + parseInt(total);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan *  rim;
							
							
							x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm hint--top-left' aria-label='Klik Detail data' style='color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";
							
						}
						table.append(x);
						
						}else{
						
						
						$('#tableoffset').append("<div  class='small'><table id='tabloffset' class='table table-striped' ><thead ><tr style='background-color:<?=$warnabar;?>;color:white' ><th  class='text-left' style='width:30%'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");
						
						var table = $('#tabloffset').children();
						var i;
						var x;
						var ongkos_potong = 0;
						for (i = 0; i < data.length; i++) {
							
							if (data[i]['ongpot'] == 'Y' ){
								ongkos_potong = data[i]['ongkos_potong'];
							}						
							total =  parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6'])+ parseInt(data[i]['finishing7'])+ parseInt(data[i]['finishing8'])+ parseInt(data[i]['finishing9'])+ parseInt(data[i]['finishing10']);
							
							
							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
							profit = data[i]['persen'];
							jual = (parseInt(total) * profit / 100) + parseInt(total);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan *  rim;
							
							
							x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm hint--top-left' aria-label='Klik Detail data' style='color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";
						}
						
						table.append(x);
					}		
					
				}
				
				
			}
			
			var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&finishing7="+finishing7+"&finishing8="+finishing8+"&finishing9="+finishing9+"&finishing10="+finishing10+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&lbrf7="+lbrf7+"&tgf7="+tgf7+"&lbrf8="+lbrf8+"&tgf8="+tgf8+"&lbrf9="+lbrf9+"&tgf9="+tgf9+"&lbrf10="+lbrf10+"&tgf10="+tgf10+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung=" + kethitung + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			
			var url = host+'/sandboxm/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);	
		}
		
		$("#cekukuran").click(function() {
			var jmlcetak = $('#jmlcetakoffset').val();
			var bahan = $('#bahanoffset').val();
			var	idmesin = $("#idmesin").val();
			
			if (jmlcetak == '') {
				salert('warning', 'Oopss...', iMsg['J']);
				} else if (idmesin == 0) {
				salert('warning', 'Oopss...', iMsg['M']);
				} else if (bahan == 0) {
				salert('warning', 'Oopss...', iMsg['B']);
				} else {
				var bleed = $('#bleedoffset').val();
				var lbrcetak = parseFloat($('#lbrcetakoffset').val()) + (2 * parseFloat(bleed));
				var tgcetak = parseFloat($('#tgcetakoffset').val()) + (2 * parseFloat(bleed));
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
							salert('warning', 'Oopss...', iMsg['U'] +'<br>Ukuran cetak - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+res[1]+' - '+ res[2] +'x'+res[3]+' cm');
							move(res[0].toString());
							} else {
							move(res[0].toString());
							hitungoffset();
							counter('Hitung Offset');
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