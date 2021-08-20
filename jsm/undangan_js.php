<?php
	if (!empty($_POST['link'])){
		$warnabar = "#ed2300";
	?>
	<script>
		$('.harga').hide();
		$('.printpenawaran').hide();
		$(".alert").hide();
		$('.btnon, .btnd, .btnp').prop('disabled',true);
		$('#jmlcetakun').keypress(validateNumber);
		$('#ketundangan').keyup(function(){
			$('.btnon').prop('disabled', this.value == "" ? true : false);     
		})
		
		$('#lbrcetakund').val('22');
		$('#tgcetakund').val('28');
		$('#lbrcoverund').val('22');
		$('#tgcoverund').val('28');
		$('.kalkirund').hide();
		$('#warnaamplopund').val('0');
		$('.botund').hide();
		$('#lbrlemund').val('1.5');
		$('.lbrlemund').hide();
		$('.morecovund').hide();
		$('.moreisiund').hide();
		$('.pitaund').hide();
		$('.amplopund').hide();
		$('#tableundangan').hide();
		$('.ucapanund').hide();
		$('#bbisiund').val('2');
		$('.harga').hide();
		
		function move(a) {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);
			
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					if(a=='Y'){
						$("#tableundangan").show();
						}else{
						$("#tableundangan").hide();
					}
					$("#myBar").hide();
					} else {
					width++;
					elem.style.width = width + '%';
					$("#tableundangan").hide();
					$("#myBar").show();
				}
			}
		}
		CustomStyle();
		//mesin isi
		$("#j_mesin1").filter(function() {
			$('select[data-mesin]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih</option>');
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
		$("#j_mesin1").change(function() {
			var idmesin = $(this).val();
			if(idmesin >0){
				var lbrcetak = $('#lbrcetakund').val();
				var tgcetak = $('#tgcetakund').val();
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
		//mesin cover
		$("#j_mesincov").filter(function() {
			$('select[data-mesincover]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih</option>');
				$.ajax({
					url: $select.attr('data-mesincover'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#j_mesincov").change(function() {
			var idmesin = $(this).val();
			if(idmesin >0){
				var lbrcetak = $('#lbrcetakund').val();
				var tgcetak = $('#tgcetakund').val();
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
		//mesin amplop
		$("#j_mesinam").filter(function() {
			$('select[data-mesinam]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih</option>');
				$.ajax({
					url: $select.attr('data-mesinam'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#j_mesinam").change(function() {
			var idmesin = $(this).val();
			if(idmesin >0){
				var lbrcetak = $('#lbrcetakund').val();
				var tgcetak = $('#tgcetakund').val();
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
		//mesin kartu
		$("#j_mesinkartu").filter(function() {
			$('select[data-mesinkartu]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih</option>');
				$.ajax({
					url: $select.attr('data-mesinkartu'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#j_mesinkartu").change(function() {
			var idmesin = $(this).val();
			if(idmesin >0){
				var lbrcetak = $('#lbrcetakund').val();
				var tgcetak = $('#tgcetakund').val();
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
		$("#bahanisiund").filter(function() {
			$('select[data-bahanisi]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih</option>');
				$.ajax({
					url: $select.attr('data-bahanisi'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahanisiund").change(function () {
			var deptid = $(this).val();
			$.ajax({
				url: host+"/kertas/",
				type: "post",
				data: {depart: deptid,app_id:app_id},
				dataType: "json",
				success: function (response) {
					var len = response.length;
					$("#idkertasisi").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]["id"];
						var name = response[i]["name"];
						$("#idkertasisi").append("<option value='" + id + "'>" + name + "</option>");
					}
				},
			});
		});
		//
		///bahan cover
		$("#bahancovund").filter(function() {
			$('select[data-bahancover]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih</option>');
				$.ajax({
					url: $select.attr('data-bahancover'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahancovund").change(function () {
			var deptid = $(this).val();
			$.ajax({
				url: host+"/kertas/",
				type: "post",
				data: {depart: deptid,app_id:app_id},
				dataType: "json",
				success: function (response) {
					var len = response.length;
					$("#idkertascover").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]["id"];
						var name = response[i]["name"];
						$("#idkertascover").append("<option value='" + id + "'>" + name + "</option>");
					}
				},
			});
		});
		///bahan amplop
		$("#bahanamplopund").filter(function() {
			$('select[data-bahanam]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih</option>');
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
		$("#bahanamplopund").change(function () {
			var deptid = $(this).val();
			$.ajax({
				url: host+"/kertas/",
				type: "post",
				data: {depart: deptid,app_id:app_id},
				dataType: "json",
				success: function (response) {
					var len = response.length;
					$("#idkertasamplop").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]["id"];
						var name = response[i]["name"];
						$("#idkertasamplop").append("<option value='" + id + "'>" + name + "</option>");
					}
				},
			});
		});
		///bahan ucapan
		$("#bahankartuucapan").filter(function() {
			$('select[data-bahanakartu]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih</option>');
				$.ajax({
					url: $select.attr('data-bahanakartu'),
					}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
		$("#bahankartuucapan").change(function () {
			var deptid = $(this).val();
			$.ajax({
				url: host+"/kertas/",
				type: "post",
				data: {depart: deptid,app_id:app_id},
				dataType: "json",
				success: function (response) {
					var len = response.length;
					$("#idkertaskartu").empty();
					for (var i = 0; i < len; i++) {
						var id = response[i]["id"];
						var name = response[i]["name"];
						$("#idkertaskartu").append("<option value='" + id + "'>" + name + "</option>");
					}
				},
			});
		});
		////botund
		$("#botund").filter(function() {
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
						$("#botund").append("<option value='" + id + "'>" + name + "</option>");
					}
				}
			});
		});	
		$('#jenisjilidund').on('change', function() {
			if( this.value == '2'){
				$('.lbrlemund').show();
				$('.botund').show();
				$('#bbcovund').val('1');
				$('#bbcovund').hide();
				
				}else{
				$('.lbrlemund').hide();
				$('.botund').hide();
				$('#bbcovund').show();
			}
		})
		
		$('#lbrcetakund').on('change', function() {
			$('#lbrcoverund').val($('#lbrcetakund').val());
			$('#lbrpita').val($('#lbrcetakund').val());
		})	
		$('#tgcetakund').on('change', function() {
			$('#tgcoverund').val($('#tgcetakund').val());
		})
		
		$('#morecovund').click(function(){
			if($('.morecovund').is(":hidden")) 
			{
				$('.morecovund').show();
				$("#morecovund").removeClass("glyphicon glyphicon-chevron-down").addClass("glyphicon glyphicon-chevron-up");	
				}else{
				$('.morecovund').hide();
				$("#morecovund").removeClass("glyphicon glyphicon-chevron-up").addClass("glyphicon glyphicon-chevron-down");	
			}			
		});
		
		$('#kalkirund').click(function(){
			if($('.pitaund').is(":hidden")) {
				$(".pita").removeClass( "col-md-4" ).addClass( "col-md-3" );
				}else{
				$(".warnakalkir").removeClass( "col-md-8" ).addClass( "col-md-6" );
				$(".kalkir").removeClass( "col-md-4" ).addClass( "col-md-6" );
				$(".amplop").removeClass( "col-md-4" ).addClass( "col-md-6" );
			}
			if($('.kalkirund').is(":hidden")) {
				$('.kalkirund').show();
				$(".warnakalkir").removeClass( "col-md-8" ).addClass( "col-md-5" );
				$(".amplop").removeClass( "col-md-6" ).addClass( "col-md-4" );
				}else{
				$('.kalkirund').hide();
				$(".pita").removeClass( "col-md-3" ).addClass( "col-md-4" );
			}			
			
		});
		$('#pitaund').click(function(){
			if($('.kalkirund').is(":hidden")){
				$(".kalkir").removeClass( "col-md-4" ).addClass( "col-md-6" );
				$(".amplop").removeClass( "col-md-4" ).addClass( "col-md-6" );
				}else{
				$(".warnakalkir").removeClass( "col-md-6" ).addClass( "col-md-5" );
			}
			if($('.pitaund').is(":hidden")) {
				$('.pitaund').show();
				$(".pita").removeClass( "col-md-3" ).addClass( "col-md-4" );
				}else{
				$(".kalkir").removeClass( "col-md-6" ).addClass( "col-md-4" );
				$(".pita").removeClass( "col-md-4" ).addClass( "col-md-3" );
				$('.pitaund').hide();
			}
			
		});		
		
		$('#ucapanund').click(function(){
			if($('.ucapanund').is(":hidden")) 
			{
				$('.ucapanund').show();
				}else{
				$('.ucapanund').hide();
			}			
		});	
		
		$('#amplopund').click(function(){
			if($('.amplopund').is(":hidden")) 
			{
				$('.amplopund').show();
				}else{
				$('.amplopund').hide();
			}			
		});
		
		$('#moreisiund').click(function(){
			if($('.moreisiund').is(":hidden")) 
			{
				$('.moreisiund').show();
				$("#moreisiund").removeClass("glyphicon glyphicon-chevron-down").addClass("glyphicon glyphicon-chevron-up");	
				}else{
				$('.moreisiund').hide();
				$("#moreisiund").removeClass("glyphicon glyphicon-chevron-up").addClass("glyphicon glyphicon-chevron-down");	
			}			
		});
		
		
		
		
		$('#kalkirund').click(function() {
			if($(this).is(":checked"))
			{
				$('.kalkirund').show();
				$('#kalkirund').val('1');
				} else {
				$('.kalkirund').hide();
				$('#kalkirund').val('0');
			}
		});	
		
		$('#bahancovun').change(function() {
			$('#bahanisiun').val($('#bahancovun').val())  ;
			$('#bahanamplopun').val($('#bahancovun').val())  ;
		});	
		$('#jmlwarnacovun').change(function() {
			$('#jmlwarnaun2').val($('#jmlwarnacovun').val())  ;
		});		
		$('#bbcovun').change(function() {
			$('#bbun1').val($('#bbcovun').val())  ;
		});	
		
		
		
		function hitungisiundangan() {
			counter('Undangan');
			startTimer();
			move('N');
			var bleed = document.getElementById("bleedund").value;
			var lbrcetak = parseFloat(document.getElementById("lbrcetakund").value) + ( 2 * parseFloat(bleed));
			var tgcetak = parseFloat(document.getElementById("tgcetakund").value) + ( 2 * parseFloat(bleed));
			
			var jmlcetak = document.getElementById("jmlcetakund").value;
			var bahan = document.getElementById("bahanisiund").value;
			var bb = "";//document.getElementById("bbisiund").value;
			var jmlwarna = document.getElementById("jmlwarnaisiund").value;
			var jmlwarna2 = document.getElementById("jmlwarnaisiund2").value;
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}			
			var lam = document.getElementById("lamisiund").value;
			var lbrf1= 1;		var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;		var tgf6 = 1;
			var finishing1 = 4; //plastik undangan
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = 0;		
			
			var modul = 'undangan';
			var insheet="1";
			var jml_satuan=1;
			var cetak_bagi="Y";
			var ket = document.getElementById("ketundangan").value;
			var ket_satuan = "pcs";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			var kethitung = 'Isi_Undangan';
			var jmlset = 1;
			var j_mesin = '';
			var idmesin = $("#j_mesin1").val();
			var idkertas = $("#idkertasisi").val();
			
			
			//Poly
			if(document.getElementById("polyisiund").checked == true ){
				finishing2 = '10'; //poly
				lbrf2= (document.getElementById("jmlpolyisiund").value);
				tgf2 = 1;
				
				finishing5 = '11'; //plat
				lbrf5= parseFloat(document.getElementById("lbrpolyisiund").value) / jmlcetak;
				tgf5 = document.getElementById("tgpolyisiund").value;
				//alert("d");
			}
			//Embos		
			if(document.getElementById("embosisiund").checked == true ){
				finishing3 = '14';
				lbrf3= (document.getElementById("jmlembosisiund").value);
				tgf3 = 1;
				finishing6 = '15';
				lbrf6= document.getElementById("lbrembosisiund").value / jmlcetak;
				tgf6 = document.getElementById("tgembosisiund").value;
				
			}
			//Pita		
			if(document.getElementById("pitaund").checked == true ){
				finishing4 = '83';
				lbrf4= (document.getElementById("lbrpita").value);
				tgf4 = 1;
			}
			
			
			
			if (jmlcetak != null && jmlcetak < 1){  
				alert("Jumlah Cetakan Kosong!!");
				move('Y');
				return;
			}	
			if(lbrcetak != null && lbrcetak < 1){
				alert(" Lebar Cetakan Kosong!!");
				move('Y');
				return;
			}
			if (tgcetak != null && tgcetak < 1){
				alert("Tinggi Cetakan Kosong!!");
				move('Y');
				return;	
			}
			//alert(jmlcetak);
			//Hitung Isinya----------------------------------------	
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					
					//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
					myArr = JSON.parse(xmlhttp.responseText);	
					data = myArr[0];
					
					//$('#ketundangan').val(JSON.stringify(myArr));				
					
					hitungcoverund(data);
					
				}
			}	
			var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung+"&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			
			var url = host+'/sandbox/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
			
		}
		
		function hitungcoverund(x) {
			var data = x;
			//Isi Undangan
			var lbrcetak = document.getElementById("lbrcoverund").value;
			var tgcetak = document.getElementById("tgcoverund").value;
			var jmlcetak = document.getElementById("jmlcetakund").value;
			
			var bahan = document.getElementById("bahancovund").value;
			var bb = "";// document.getElementById("bbcovund").value;
			var jmlwarna = document.getElementById("jmlwarnacovund").value;
			var jmlwarna2 = document.getElementById("jmlwarnacovund2").value;
			
			var lam = document.getElementById("lamcovund").value;
			var lbrf1= 1;		var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;		var tgf6 = 1;
			var finishing1 = 0;
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = 0;	
			
			jenisjilidund = document.getElementById("jenisjilidund").value;
			if (jenisjilidund=='2'){
				
				if(parseFloat(lbrcetak) < parseFloat(tgcetak)){
					lbrcetak = (parseFloat(lbrcetak) * 2) + (parseFloat(document.getElementById("lbrlemund").value) * 2); 
					tgcetak = (parseFloat(tgcetak)) + (parseFloat(document.getElementById("lbrlemund").value) * 2); 
					}else{
					lbrcetak = (parseFloat(lbrcetak)) + (parseFloat(document.getElementById("lbrlemund").value) * 2); 
					tgcetak = (parseFloat(tgcetak)* 2) + (parseFloat(document.getElementById("lbrlemund").value) * 2); 
				}
				
				finishing1 = 54;
			}
			
			
			
			var modul = 'undangan';
			var insheet="1";
			var jml_satuan=1;
			var cetak_bagi="Y";
			var ket = document.getElementById("ketundangan").value;
			var ket_satuan = "pcs";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			var kethitung = 'Cover_Undangan';
			var jmlset = 1;
			var j_mesin = '';
			var idmesin = $("#j_mesincov").val();
			var idkertas = $("#idkertascover").val();
			
			//Poly
			if(document.getElementById("polycovund").checked == true ){
				finishing2 = '10'; //poly
				lbrf2= (document.getElementById("jmlpolycovund").value);
				tgf2 = 1;
				
				finishing5 = '11'; //plat
				lbrf5= parseFloat(document.getElementById("lbrpolycovund").value) / jmlcetak;
				tgf5 = document.getElementById("tgpolycovund").value;
				//alert("d");
			}
			//Embos		
			if(document.getElementById("emboscovund").checked == true ){
				finishing3 = '14';
				lbrf3= (document.getElementById("jmlemboscovund").value);
				tgf3 = 1;
				finishing6 = '15';
				lbrf6= document.getElementById("lbremboscovund").value / jmlcetak;
				tgf6 = document.getElementById("tgemboscovund").value;
				
			}
			
			//spot uv		
			if(document.getElementById("spotuvcovund").checked == true ){
				finishing4 = '19';
				lbrf4= lbrcetak / jmlcetak;
				tgf4 = tgcetak;
			}
			
			if(jmlwarna < 1 && jmlwarna != null){
				data2 = {};
				hitungbot(data,data2);
				}else{		
				
				//alert(jmlcetak);
				//Hitung Isinya----------------------------------------	
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						
						//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
						myArr = JSON.parse(xmlhttp.responseText);	
						data2 = myArr[0];
						//$('#ketundangan').val(JSON.stringify(myArr));				
						hitungbot(data,data2);
						
					}
				}	
				var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung+ "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
				
				var url = host+'/sandbox/get/';
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(isi);
				
			}	
		}	
		
		function hitungbot(x,y) {
			data1 = x; data2 = y;
			var jmlwarna = document.getElementById("jmlwarnacovund").value;
			
			jenisjilidund = document.getElementById("jenisjilidund").value;
			if (jenisjilidund=='2' &&  (jmlwarna < 1 || jmlwarna != null )){
				
				var lbrcetak = document.getElementById("lbrcoverund").value;
				var tgcetak = document.getElementById("tgcoverund").value;
				var jmlcetak = document.getElementById("jmlcetakund").value;
				
				var bahan = document.getElementById("botund").value;
				var bb = "";
				var jmlwarna = 0;		
				var lam = 0;
				var lbrf1= 1;		var tgf1 = 1;		
				var lbrf2= 1;		var tgf2 = 1;		
				var lbrf3= 1;		var tgf3 = 1;		
				var lbrf4= 1;		var tgf4 = 1;		
				var lbrf5= 1;		var tgf5 = 1;
				var lbrf6= 1;		var tgf6 = 1;
				var finishing1 = 0;
				var finishing2 = 0;
				var finishing3 = 0;
				var finishing4 = 0;
				var finishing5 = 0;
				var finishing6 = 0;	
				
				var modul = 'undangan';
				var insheet="1";
				var jml_satuan=1;
				var cetak_bagi="Y";
				var ket = document.getElementById("ketundangan").value;
				var ket_satuan = "pcs";
				var rim = 500;
				var box = 100;
				var ongpot = 'Y';
				var kethitung = 'Bot';
				var jmlset = 1;
				var j_mesin = '';
				var idmesin = $("#j_mesinam").val();
				var idkertas = $("#botund").val();
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						
						//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
						myArr = JSON.parse(xmlhttp.responseText);	
						data3 = myArr[0];
						//$('#ketundangan').val(JSON.stringify(myArr));				
						hitungkalkirun(data1,data2,data3);
						
					}
				}	
				var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung+ "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
				
				var url = host+'/sandbox/get/';
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(isi);
				}else{
				data3 = {};
				hitungkalkirun(data1,data2,data3);
				
			}	
			
			
		}
		function hitungkalkirun(x,y,z) {
			data1=x; data2=y; data3=z;
			
			if(document.getElementById("kalkirund").checked == true ){
				
				var lbrcetak = document.getElementById("lbrkalkir").value;
				var tgcetak = document.getElementById("tgkalkir").value;
				var jmlcetak = document.getElementById("jmlcetakund").value;
				
				var bahan = 41;
				var bb = "";
				var jmlwarna = document.getElementById("jmlwarnakalkir").value;		
				var lam = 0;
				var lbrf1= 1;		var tgf1 = 1;		
				var lbrf2= 1;		var tgf2 = 1;		
				var lbrf3= 1;		var tgf3 = 1;		
				var lbrf4= 1;		var tgf4 = 1;		
				var lbrf5= 1;		var tgf5 = 1;
				var lbrf6= 1;		var tgf6 = 1;
				var finishing1 = 0;
				var finishing2 = 0;
				var finishing3 = 0;
				var finishing4 = 0;
				var finishing5 = 0;
				var finishing6 = 0;	
				
				var modul = 'undangan';
				var insheet="1";
				var jml_satuan=1;
				var cetak_bagi="Y";
				var ket = document.getElementById("ketundangan").value;
				var ket_satuan = "pcs";
				var rim = 500;
				var box = 100;
				var ongpot = 'Y';
				var kethitung = 'Kalkir';
				var jmlset = 1;
				var j_mesin = '';
				var idmesin = $("#j_mesincov").val();
				var idkertas = $("#idkertascover").val();
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						
						//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
						myArr = JSON.parse(xmlhttp.responseText);	
						data4 = myArr[0];
						//$('#ketundangan').val(JSON.stringify(myArr));				
						hitungamplopund(data1,data2,data3,data4);
						
					}
				}	
				isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung+ "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
				
				var url = host+'/sandbox/get/';
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(isi);
				
				}else{
				var data4 = {};
				hitungamplopund(data1,data2,data3,data4);
				
			}
		}		
		
		
		
		function hitungamplopund(r,s,t,u){
			data1=r; data2=s; data3=t; data4=u;
			
			if(document.getElementById("amplopund").checked == true ){
				
				var lbrcetak = document.getElementById("lbramplopund").value;
				var tgcetak = document.getElementById("tgamplopund").value;
				var jmlcetak = document.getElementById("jmlcetakund").value;
				
				var bahan = document.getElementById("bahanamplopund").value;
				var bb = "";
				var jmlwarna = document.getElementById("jmlwarnaamplopund").value;		
				var lam =  document.getElementById("lamamplopund").value;		
				var lbrf1 = parseFloat(lbrcetak) / parseFloat(jmlcetak);
				var tgf1 = tgcetak; //Ukuran pisau Pond		
				var lbrf2= 1;		var tgf2 = 1;		
				var lbrf3= 1;		var tgf3 = 1;		
				var lbrf4= 1;		var tgf4 = 1;		
				var lbrf5= 1;		var tgf5 = 1;
				var lbrf6= 1;		var tgf6 = 1;
				var lbrf7= 1;		var tgf7 = 1;
				var lbrf8= 1;		var tgf8 = 1;
				var finishing1 = '13'; // Pisau Pon
				var finishing2 = '12'; //Biaya Pon
				var finishing3 = '50'; //Biaya Lem
				var finishing4 = 0;
				var finishing5 = 0;
				var finishing6 = 0;	
				var finishing7 = 0;	
				var finishing8 = 0;	
				
				
				if(document.getElementById("polyamplopund").checked == true ){
					finishing5 = '10'; //poly
					lbrf5= (document.getElementById("jmlpolyamplopund").value);
					tgf5 = 1;
					
					finishing6 = '11'; //plat
					lbrf6= parseFloat(document.getElementById("lbrpolyamplopund").value) / jmlcetak;
					tgf6 = document.getElementById("tgpolyamplopund").value;
					//alert("d");
				}
				//Embos		
				if(document.getElementById("embosamplopund").checked == true ){
					finishing7 = '14';
					lbrf7= (document.getElementById("jmlembosamplopund").value);
					tgf7 = 1;
					finishing8 = '15';
					lbrf8= document.getElementById("lbrembosamplopund").value / jmlcetak;
					tgf8 = document.getElementById("tgembosamplopund").value;
					
				}
				
				var modul = 'undangan';
				var insheet="1";
				var jml_satuan=1;
				var cetak_bagi="Y";
				var ket = document.getElementById("ketundangan").value;
				var ket_satuan = "pcs";
				var rim = 500;
				var box = 100;
				var ongpot = 'N';
				var kethitung = 'Amplop';
				var jmlset = 1;
				var j_mesin = '';
				var idmesin = $("#j_mesinam").val();
				var idkertas = $("#idkertasamplop").val();
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						
						//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
						myArr = JSON.parse(xmlhttp.responseText);	
						data5 = myArr[0];
						//$('#ketundangan').val(JSON.stringify(myArr));				
						hitungkartuucapan(data1,data2,data3,data4,data5);
						
					}
				}	
				isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&finishing7="+finishing7+"&finishing8="+finishing8+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&lbrf7="+lbrf7+"&tgf7="+tgf7+"&lbrf8="+lbrf8+"&tgf8="+tgf8+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung+ "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
				
				var url = host+'/sandbox/get/';
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(isi);
				
				}else{
				var data5 = {};
				hitungkartuucapan(data1,data2,data3,data4,data5);
				
			}
			
		}
		
		function hitungkartuucapan(r,s,t,u,v){
			
			data1=r; data2=s; data3=t; data4=u; data5=v;
			var lbrcetak = document.getElementById("lbrkartuucapan").value;
			var tgcetak = document.getElementById("tgkartuucapan").value;
			var jmlcetak = document.getElementById("jmlcetakund").value;
			
			var bahan = document.getElementById("bahankartuucapan").value;
			var bb = 1;
			var jmlwarna = document.getElementById("jmlwarnakartu").value;		
			var lam =  0;		
			var lbrf1= 1;		var tgf1 = 1;		
			var lbrf2= 1;		var tgf2 = 1;		
			var lbrf3= 1;		var tgf3 = 1;		
			var lbrf4= 1;		var tgf4 = 1;		
			var lbrf5= 1;		var tgf5 = 1;
			var lbrf6= 1;		var tgf6 = 1;
			var finishing1 = 0;
			var finishing2 = 0;
			var finishing3 = 0;
			var finishing4 = 0;
			var finishing5 = 0;
			var finishing6 = 0;	
			
			var modul = 'undangan';
			var insheet="1";
			var jml_satuan=1;
			var cetak_bagi="Y";
			var ket = document.getElementById("ketundangan").value;
			var ket_satuan = "pcs";
			var rim = 500;
			var box = 100;
			var ongpot = 'Y';
			var kethitung = 'Kartu_Ucapan';
			var jmlset = 1;
			var j_mesin = '';
			var idmesin = $("#j_mesinkartu").val();
			var idkertas = $("#idkertaskartu").val();
			
			if (data1['ongpot'] == 'Y' ){ ongkos_potong = data1['ongkos_potong'];} else{ ongkos_potong = 0; }				
			subtotal1 = parseInt(data1['totcetak']) + parseInt(data1['totbhn']) + parseInt(ongkos_potong) + parseInt(data1['tot_ctp']) + parseInt(data1['totlaminating']) + parseInt(data1['finishing1']) + parseInt(data1['finishing2']) + parseInt(data1['finishing3']) + parseInt(data1['finishing4']) + parseInt(data1['finishing5']) + parseInt(data1['finishing6']);
			var arrStr1 = btoa(encodeURIComponent(JSON.stringify(data1)));
			
			if(!!(data2['hrgbhn'])){ 				
				if (data2['ongpot'] == 'Y' ){ ongkos_potong = data2['ongkos_potong'];} else{ ongkos_potong = 0; }				
				
				subtotal2 = parseInt(data2['totcetak']) + parseInt(data2['totbhn']) + parseInt(ongkos_potong) + parseInt(data2['tot_ctp']) + parseInt(data2['totlaminating']) + parseInt(data2['finishing1']) + parseInt(data2['finishing2']) + parseInt(data2['finishing3']) + parseInt(data2['finishing4']) + parseInt(data2['finishing5']) + parseInt(data2['finishing6']);
				var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2)));
				}else{
				var subtotal2 = '0';
				var arrStr2 = '';
				//alert('a');
			}
			
			
			if(!!(data3['hrgbhn'])){ 				
				if (data3['ongpot'] == 'Y' ){ ongkos_potong = data3['ongkos_potong'];} else{ ongkos_potong = 0; }				
				subtotal3 = parseInt(data3['totcetak']) + parseInt(data3['totbhn']) + parseInt(ongkos_potong) + parseInt(data3['tot_ctp']) + parseInt(data3['totlaminating']) + parseInt(data3['finishing1']) + parseInt(data3['finishing2']) + parseInt(data3['finishing3']) + parseInt(data3['finishing4']) + parseInt(data3['finishing5']) + parseInt(data3['finishing6']);
				var arrStr3 = btoa(encodeURIComponent(JSON.stringify(data3)));		
			}else{subtotal3 = 0; var arrStr3 = ""; }		
			
			if(!!(data4['hrgbhn'])){ 	
				if (data4['ongpot'] == 'Y' ){ ongkos_potong = data4['ongkos_potong'];} else{ ongkos_potong = 0; }				
				subtotal4 = parseInt(data4['totcetak']) + parseInt(data4['totbhn']) + parseInt(ongkos_potong) + parseInt(data4['tot_ctp']) + parseInt(data4['totlaminating']) + parseInt(data4['finishing1']) + parseInt(data4['finishing2']) + parseInt(data4['finishing3']) + parseInt(data4['finishing4']) + parseInt(data4['finishing5']) + parseInt(data4['finishing6']);
				var arrStr4 = btoa(encodeURIComponent(JSON.stringify(data4)));
			}else{ subtotal4 = 0; var arrStr4 = ""; }
			
			if(!!(data5['hrgbhn'])){ 
				if (data5['ongpot'] == 'Y' ){ ongkos_potong = data5['ongkos_potong'];} else{ ongkos_potong = 0; }				
				subtotal5 = parseInt(data5['totcetak']) + parseInt(data5['totbhn']) + parseInt(ongkos_potong) + parseInt(data5['tot_ctp']) + parseInt(data5['totlaminating']) + parseInt(data5['finishing1']) + parseInt(data5['finishing2']) + parseInt(data5['finishing3']) + parseInt(data5['finishing4']) + parseInt(data5['finishing5']) + parseInt(data5['finishing6']);
				var arrStr5 = btoa(encodeURIComponent(JSON.stringify(data5)));
			}else{ subtotal5 = 0; var arrStr5 = ""; }
			
			
			if(document.getElementById("ucapanund").checked == true ){
				move('Y');
				//alert('ok');
				
				
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						
						//	setTimeout(function(){$(".progress-bar").css('width','20%'); }, 1000); 	
						myArr = JSON.parse(xmlhttp.responseText);	
						data6 = myArr[0];
						//$('#ketundangan').val(JSON.stringify(myArr));				
						//hitungkartuucapan(data1,data2,data3,data4,data5);
						
						
						if (data6['ongpot'] == 'Y' ){ ongkos_potong = data6['ongkos_potong'];} else{ ongkos_potong = 0; }				
						subtotal6 = parseInt(data6['totcetak']) + parseInt(data6['totbhn']) + parseInt(ongkos_potong) + parseInt(data6['tot_ctp']) + parseInt(data6['totlaminating']) + parseInt(data6['finishing1']) + parseInt(data6['finishing2']) + parseInt(data6['finishing3']) + parseInt(data6['finishing4']) + parseInt(data6['finishing5']) + parseInt(data6['finishing6']);
						var arrStr6 = btoa(encodeURIComponent(JSON.stringify(data6)));
						
						
						//$('#ketbuku').val(JSON.stringify(data));
						total  = parseInt(subtotal1) + parseInt(subtotal2) + parseInt(subtotal3) + parseInt(subtotal4) + parseInt(subtotal5) + parseInt(subtotal6) ; 
						profit = data1['persen'];
						jual = (parseInt(total) * parseInt(profit) / 100) + parseInt(total);
						satuan = jual / jmlcetak / jml_satuan;
						
						
						
						//	alert(arrStr1);
						$('#tableundangan').show();
						$('#dataund1').val(arrStr1);
						$('#dataund2').val(arrStr2);
						$('#dataund3').val(arrStr3);
						$('#dataund4').val(arrStr4);
						$('#dataund5').val(arrStr5);
						$('#dataund6').val(arrStr6);
						$('#jumlahcetakund').val(jmlcetak);
						// $('#dataund7').val(arrStr7);
						// $('#dataund8').val(arrStr8);
						$('#ketbk').val(ket);
						$('#totjualund').html("Rp. " + formatMoney(jual));
						$('#satuanund').html("Rp. " + formatMoney(satuan) + "/pcs");
						
					}
				}	
				isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&kethitung="+kethitung+ "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
				
				var url = host+'/sandbox/get/';
				xmlhttp.open('POST', url, true);
				xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
				xmlhttp.send(isi);
				
				}else{
				move('Y');
				total  = parseInt(subtotal1) + parseInt(subtotal2) + parseInt(subtotal3) + parseInt(subtotal4) + parseInt(subtotal5); 
				//alert ( parseInt(subtotal1) + " - " + parseInt(subtotal2) + " - " + parseInt(subtotal3) + " - " + parseInt(subtotal4) + " - " + parseInt(subtotal5))
				profit = data1['persen'];
				jual = (parseInt(total) * parseInt(profit) / 100) + parseInt(total);
				satuan = jual / jmlcetak / jml_satuan;
				//alert(total);
				
				
				$('#tableundangan').show();
				
				//	alert(arrStr1);
				$('#dataund1').val(arrStr1);
				$('#dataund2').val(arrStr2);
				$('#dataund3').val(arrStr3);
				$('#dataund4').val(arrStr4);
				$('#dataund5').val(arrStr5);
				$('#jumlahcetakund').val(jmlcetak);
				
				//$('#dataund6').val(arrStr6);
				// $('#dataund7').val(arrStr7);
				// $('#dataund8').val(arrStr8);
				$('#ketbk').val(ket);
				$('#totjualund').html("Rp. " + formatMoney(jual));
				$('#satuanund').html("Rp. " + formatMoney(satuan) + "/pcs");
				//	hitungkartuucapan(data1,data2,data3,data4,data5);
				
				
				
			}
		}
	</script>      
	
	<?php
	}//end token
	else{
		echo json_encode(array(404 => "error undangan"));
	}
?>