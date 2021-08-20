<?php
	if (!empty($_POST['link'])){
		$warnabar = "#ed2300";
	?>
	<script>
		function move(a) {
			$('#hasilhitung').css('display','none');
			$('.myCanvas').css('display','none');
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);
			
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					if(a=='Y'){
						$("#detail").show();
						$("#myCanvas").show();
						$("#download").show();
						$(".muat").show();
						$('#hasilhitung').css('display','block');
						$('.myCanvas').css('display','block');
						}else{
						$("#detail").hide();
						$("#myCanvas").hide();
						$("#download").hide();
						$(".muat").hide();	
					}
					$("#myBar").hide();
					} else {
					width++;
					elem.style.width = width + '%';
					$("#hidemyBar").removeClass("display-hidden");
					$("#detail").hide();
					$("#myCanvas").hide();
					$(".muat").hide();
					$("#myBar").show();
					$("#download").hide();
				}
			}
		}
		$(document).ready(function(){
			
			CustomStyle();
			$('#myCanvas').hide();
			$('.muat').hide();
			$('.alert2').hide();
			
			$("#bahanstiker").change(function () {
				var deptid = $(this).val();
				$.ajax({
					url: host+"/bahan/",
					type: "post",
					data: {depart: deptid,app_id:app_id},
					dataType: "json",
					success: function (response) {
						var len = response.length;
						$("#idkertas").empty();
						$('#lbrbh').val('32');
						$('#tgbh').val('48');
						// for (var i = 0; i < len; i++) {
						var id = response.id;
						var name = response.name;
						var harga = response.harga;
						// console.log(id);
						$('#hargastiker').val(harga);
						// $("#idkertas").append("<option value='" + id + "'>" + name + "</option>");
						// }
					},
				});
			});
			$("#bahanstiker").filter(function () {
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
		
		
		function potong(){
			move('N');
			startTimer();
			var lbrbh = document.getElementById("lbrbh").value;
			var tgbh = document.getElementById("tgbh").value;			
			var lbrpot = document.getElementById("lbrpot").value;
			var tgpot = document.getElementById("tgpot").value;
			
			if(lbrbh == "" || tgbh == "" || lbrpot=="" || tgpot == "") {
				//alert("kosong");
				
				$('.alert2').html('Isi dulu datanya!');
				// flashIt('.alert2', 10, '_flash', 500)
				$('.alert2').show('slow').delay(2000).hide('slow');
				return;
			}
			
			if (parseFloat(lbrbh) < parseFloat(tgbh)){
				lbr = lbrbh;
				tg = tgbh;
				lbrbh = tg;
				tgbh = lbr;
			}
			
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					move('Y');
					myArr = JSON.parse(xmlhttp.responseText);
					
					$('#myCanvas').show();
					$('.muat').show();
					jml = myArr[0]['jml'];
					
					luastotal = parseFloat(lbrbh) * parseFloat(tgbh);
					luasterpakai = jml * (parseFloat(lbrpot) * parseFloat(tgpot));
					sisa = luastotal - luasterpakai ;
					persen = sisa / luastotal * 100;
					
					var jumlah = document.getElementById("jumlah").value;
					
					var pembagian = Math.ceil(jumlah / jml);
					cariharga(pembagian);
					
					
					document.getElementById("pembagian").value =pembagian;
					document.getElementById("muat").value =jml;
					document.getElementById("sisa").value = parseFloat(persen).toFixed(2) +"%";
					
					var koor = myArr[0]['koor'].toString();
					var koor_pisah = new Array();
					var koor_pisah = koor.split(',');
					
					var canvas = document.getElementById("myCanvas");
					
					canvas.width = (lbrbh * 10)/4;
					canvas.height = (tgbh * 10)/4;
					var ctx = canvas.getContext("2d");
					ctx.fillStyle = "#FFFFF";
					
					var fLen, i, text, x;
					fLen = koor_pisah.length;
					for (i = 0; i < fLen; i++) {
						
						var x = new Array();
						var x = koor_pisah[i].split('|');
						
						// rectangle
						ctx.beginPath();
						ctx.lineWidth = "1";
						ctx.strokeStyle = "#5D6258";
						ctx.rect((x[0]/4),(x[1]/4),(x[2]/4),(x[3]/4));  
						ctx.stroke();
					}
					ctx.font='12px Arial';
					ctx.fillStyle = "#FFFFF";
					ctx.fillText("www.sayuti.com",10,100);
				}
			}
			var isi = "lbr_plano="+lbrbh+"&tinggi_plano="+tgbh+"&lbr_pot="+lbrpot+"&tinggi_pot="+tgpot+"&app_id="+app_id;
			var url = host+'/hitung/potongan/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
			
		}
		
		function roundToHalf(value) {
			var converted = parseFloat(value); // Make sure we have a number
			var decimal = (converted - parseInt(converted, 10));
			decimal = Math.round(decimal * 10);
			if(converted > 2 && converted < 3){
				return (parseInt(converted, 10)+1);
			}
			if(converted > 0 && converted < 1){
				return (1);
			}
			if (decimal == 5) { return (parseInt(converted, 10)+0.5); }
			if ( (decimal < 1) || (decimal > 5) ) {
				return Math.round(converted);
				} else {
				return (parseInt(converted, 10)+0.5);
			}
		} 	
		
		function cariharga(z){
			counter('Stiker');
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					myArr = JSON.parse(xmlhttp.responseText);
					
					var hargastiker = $('#hargastiker').val();
					var subtotal = parseInt(hargastiker) + parseInt(myArr[0]);
					var total = subtotal * z;
					// $('#hasilhitung').show();
					// $('#hasilhitung').html("Harga Rp. " + subtotal + " x " + x + " = Rp. " + formatMoney(total));	
					var x;
					$('#hasilhitung').append("<div class='small table-responsive'> <table id='here_table' class='table' ><thead><tr style='color:#000;padding:0!important'><th class='text-md-left' style='width:30%!important'>Hasil</th><th class='text-md-left'>Satuan</th><th class='text-md-right'>Total Harga</th></tr></thead></table></div>");
					var table = $('#here_table').children();
					x += "<tr class='text-left'><td>" + z + " Lbr</td>";
					x += "<td class='text-left' >Rp. " + formatMoney(subtotal)+ "</td>";
					x += "<td class='text-right'><button type='button' class='btn btn-warning btn-sm'>Rp.  " + formatMoney(total)+"</button></td></tr>";
					table.append(x);
				}
			}
			var idmesin = $("#idmesin").val();
			
			var isi = "mesin="+idmesin+"&jmlprint="+z+"&app_id="+app_id;
			var url = host+'/cari-harga/print/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
		}
		
	</script>      
	<?php
	}//end token
	else{
		echo json_encode(array(404 => "error stiker"));
	}
?>