<?php
	if (!empty($_POST['link'])) 
	{		
	?>
	<div class="modal-header" style="background-color:<?=$warna;?>;color:white;">
		<h4 class="modal-title text-white align-baseline">Potong Kertas</h4>
		<button type="button" class="close" id="pot" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row">
			<div class="form-group col-md-12 bahan<?=$mod;?>">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="not4">Ukuran plano</span>
					</div>
					<select name="bahan<?=$mod;?>" id="bahan<?=$mod;?>" class="custom-select form-control" data-source="<?=$host;?>/api/<?=$app_id;?>/plano/<?=$mod;?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Lebar Bahan</span>
					</div>
					<input type="text" class="form-control" placeholder="0" id="lbrbh" readonly>
					<div class="input-group-prepend">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Tinggi Bahan</span>
					</div>
					<input type="text" class="form-control" placeholder="0" id="tgbh" readonly>
					<div class="input-group-prepend">
						<span class="input-group-text">cm</span>
					</div>
				</div>
			</div>
			
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text bg-default text-white">Ukuran potong</span>
					</div>
					<select name="ukuran" id="ukuran" class="custom-select form-control" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Lebar Potong</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="lbrpot" readonly>
					<div class="input-group-prepend">
						<span class="input-group-text">Tinggi Potong</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="tgpot" readonly>
					<div class="input-group-prepend">
						<span class="input-group-text">cm</span>
					</div>
					<div class="input-group-append">
						<button  type="button" class="btn btn-primary" id="hitung">Hitung</button>
					</div>
				</div>
			</div>  
		</div>
		
		
		<div class="form-row muat">
			<div class="input-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Hasil</span>
					<input type="text" class="form-control" aria-label="" id="muat" readonly>
					<span class="input-group-text">Lbr</span>
					<span class="input-group-text">Bahan Terbuang</span>
					<input type="text" class="form-control" aria-label="" id="sisa" readonly>
					<span class="input-group-text">%</span>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-12">
				<canvas class="myCanvas" id="myCanvas" style="width:100%;border:2px solid #000; background-color:#E7F6D9;">
				Your browser tidak support untuk menampilkan gambar</canvas>
				<a id="download" class="btn btn-success btn-sm btn-xs download">Download</a>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-12 mt-2">
				<div class="w3-light-grey">
					<div id="myBar" class="w3-green" style="height:5px;width:0"></div>
				</div>
			</div>
		</div>
	</div>    
	<div id="customstyle"></div>
	<style>
		.download{position:absolute;z-index:2;top:0}
		.download a{color:#fff!important}
		.btn{border-radius:0;}
	</style>
	<script type="text/javascript">
		CustomStyle();
		function move(a) {
			$('.myCanvas').css('display','none');
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);
			
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					if(a=='Y'){
						$("#myCanvas").show();
						$("#download").show();
						$(".muat").show();
						$('.myCanvas').css('display','block');
						}else{
						$("#myCanvas").hide();
						$("#download").hide();
						$(".muat").hide();	
					}
					$("#myBar").hide();
					} else {
					width++;
					elem.style.width = width + '%';
					$("#hidemyBar").removeClass("display-hidden");
					$("#myCanvas").hide();
					$(".muat").hide();
					$("#myBar").show();
					$("#download").hide();
				}
			}
		}
		$("#bahan"+mod).filter(function() {
			$('select[data-source]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih plano</option>');
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
		
		$("#ukuran").filter(function() {
			$("#ukuran").append("<option value='0'>Pilih ukuran</option>");
			var deptid = 10;
			$.ajax({
				url: host + "/api/"+app_id+"/ukuran/brosur/10",
				type: 'GET',
				dataType: 'json',
				success: function(response) {
					var len = response.length;
					for (var i = 0; i < len; i++) {
						var id = response[i]['id'];
						var name = response[i]['name'];
						$("#ukuran").append("<option value='" + id + "'>" + name + "</option>");
					}
				}
			});
		});
		$(document).ready(function(){
			$('#download').hide();
			$('#myCanvas').hide();
			$('.muat').hide();
			
		})
		$('.modal').on('hidden.bs.modal', function(){
			$(this).removeData('bs.modal');
		});
		
		$("#bahan"+mod).change(function() {
			var ukuran = $(this).val();
			$.ajax({
				url: host + '/cek/ukplano',
				type: 'POST',
				data: {ukuran: ukuran,app_id:app_id},
				dataType: 'json',
				success: function(response) {
					if (response[0] == 0.0) {
						$('#lbrbh,#tgbh').attr('readonly', false);
						$('#lbrbh').val(response[0]);
						$('#tgbh').val(response[1]);
						} else {
						$('#lbrbh,#tgbh').attr('readonly', true);
						$('#lbrbh').val(response[0]);
						$('#tgbh').val(response[1]);
					}
				}
			});
		});
		$("#ukuran").change(function() {
			var ukuran = $(this).val();
			$.ajax({
				url: host+'/cek/cariukuran/',
				type: 'POST',
				data: {ukuran: ukuran,app_id:app_id},
				dataType: 'json',
				success: function(response) {
					if (response[0] == 0.0) {
						$('#lbrpot,#tgpot').attr('readonly', false);
						$('#lbrpot').val(response[0]);
						$('#tgpot').val(response[1]);
						} else {
						$('#lbrpot,#tgpot').attr('readonly', true);
						$('#lbrpot').val(response[0]);
						$('#tgpot').val(response[1]);
					}
				}
			});
		});
		
		function potong(){
			move('N');
			var lbrbh  = document.getElementById("lbrbh").value;
			var tgbh   = document.getElementById("tgbh").value;			
			var lbrpot = document.getElementById("lbrpot").value;
			var tgpot  = document.getElementById("tgpot").value;
			
			lbrbh  = lbrbh.replace(',', '.');
			tgbh   = tgbh.replace(',', '.');
			lbrpot = lbrpot.replace(',', '.');
			tgpot  = tgpot.replace(',', '.');
			
			if(Number(lbrbh) == 0 || Number(tgbh) == 0 || Number(lbrpot)==0 || Number(tgpot) == 0) {
				move('N');
				salert('warning', 'Oops...', 'Data harus diisi angka');
				return;
			}
			
			if (parseFloat(lbrbh) < parseFloat(tgbh)){
				lbr   = lbrbh;
				tg    = tgbh;
				lbrbh = tg;
				tgbh  = lbr;
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
					
					document.getElementById("muat").value = jml;
					document.getElementById("sisa").value = parseFloat(persen).toFixed(2);
					
					var koor       = myArr[0]['koor'].toString();
					var koor_pisah = new Array();
					var koor_pisah = koor.split(',');
					
					var canvas = document.getElementById("myCanvas");
					
					
					
					var ctx = canvas.getContext("2d");
					var dpr = window.devicePixelRatio;
					
					canvas.width = (lbrbh * 10)/4;
					canvas.height = (tgbh * 10)/4;
					ctx.fillStyle = "#bfffcf";
					
					var fLen, i, text, x;
					fLen = koor_pisah.length;
					for (i = 0; i < fLen; i++) {
						
						var x = new Array();
						var x = koor_pisah[i].split('|');
						
						ctx.beginPath();
						ctx.lineWidth = "1";
						ctx.strokeStyle = "#000";
						ctx.rect((x[0]/4),(x[1]/4),(x[2]/4),(x[3]/4));  
						ctx.stroke();
					}
					var cw=canvas.width;
					var ch=canvas.height;
					drawText(ctx,'Ukuran Plano '+lbrbh+ ' x '+tgbh+' cm',canvas.width/2,20,14,'verdana');
					drawText(ctx,'Ukuran Potong '+lbrpot+ ' x '+tgpot+' cm',canvas.width/2,40,14,'verdana');
					drawText(ctx,'www.kalkulatorcetak.com',canvas.width/2,canvas.height-10,12,'Courier');
				}
			}
			var isi = "lbr_plano="+lbrbh+"&tinggi_plano="+tgbh+"&lbr_pot="+lbrpot+"&tinggi_pot="+tgpot+"&app_id="+app_id;
			var url = host+'/hitung/potongan/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
			}
			
			function drawText(ctx,text,centerX,centerY,fontsize,fontface){
				ctx.font        =fontsize+'px '+fontface;
				ctx.fillStyle   = "#ff0000";
				ctx.textAlign   ='center';
				ctx.textBaseline='middle';
				ctx.fillText(text,centerX,centerY);
			}
			function downloadCanvas(link, canvasId, filename) {
				link.href     = document.getElementById(canvasId).toDataURL();
				link.download = filename;
			}
			document.getElementById('download').addEventListener('click', function() {
				var lbrbh    = document.getElementById("lbrbh").value;
				var tgbh     = document.getElementById("tgbh").value;
				var lbrpot   = document.getElementById("lbrpot").value;
				var tgpot    = document.getElementById("tgpot").value;
				var filename = 'plano_'+lbrbh+'_x_'+tgbh+'_potong_'+lbrpot+'_x_'+tgpot+'.png';
				downloadCanvas(this, 'myCanvas', filename);
			}, false);
			
			$("#hitung").click(function () {
				var bahanpotong = $("#bahanpotong").val();
				var ukuran      = $("#ukuran").val();
				var lbrpot      = $("#lbrpot").val();
				var tgpot       = $("#tgpot").val();
				
				canvas = document.getElementById("myCanvas");
				context = canvas.getContext("2d");
				context.clearRect(0, 0, context.canvas.width, context.canvas.height);
				context.beginPath();
				
				if (bahanpotong == "" || bahanpotong == "0") {
					$(".jml").addClass("has-danger");
					salert('warning', 'Oops...', "Plano belum dipilih");
					} else if (ukuran == "" || ukuran == 0) {
					salert('warning', 'Oops...', iMsg['H']);
					} else if (lbrpot == "" || lbrpot == 0) {
					salert('warning', 'Oops...', iMsg['L']);
					} else if (tgpot == "" || tgpot == 0) {
					salert('warning', 'Oops...', iMsg['T']);
					} else {
					potong();
					counter('Potong Kertas');
				}
			});
		</script>  
		<?php
		}//end token
		else{
			echo json_encode(array(404 => "error"));
		}
	?>					