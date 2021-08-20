<?php
	if (!empty($_POST['link']) ) {
		
	?>
	<div class="modal-header" style="background-color:<?=$warna;?>;color:white;">
		<h4 class="modal-title text-white align-baseline">Potong Kertas</h4>
		<button type="button" class="close" id="pot" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		<div class="form-row">
			<div class="form-group col-md-12 bahan<?=$mod;?>">
				<div class="input-group">
					<span class="input-group-text" id="not4">Uk.plano</span>
					<select name="bahan<?=$mod;?>" id="bahan<?=$mod;?>" class="custom-select form-control" data-source="<?=$host;?>/api/<?=$app_id;?>/plano/<?=$mod;?>/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Lebar Bahan</span>
					<input type="text" class="form-control" aria-label="" id="lbrbh" >
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" aria-label="" id="tgbh" >
					<span class="input-group-text">cm</span>
				</div>
			</div>
			
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text bg-danger text-white">Ukuran potong</span>
					</div>
					<select name="ukuran" id="ukuran" class="custom-select form-control" required>
					</select>
				</div>
			</div>
			<div class="form-group col-md-12">
				<div class="input-group">
					<span class="input-group-text">Lebar Potong</span>
					<input type="text" class="form-control" aria-label="" id="lbrpot">
					<span class="input-group-text">Tinggi</span>
					<input type="text" class="form-control" aria-label="" id="tgpot" >
					<span class="input-group-text">cm</span>
				</div>
			</div>  
		</div>
		<div class="form-row">
			<div class="form-group col-md-12">
				<button  type="submit" class="btn btn-primary" onclick="potong()">Hitung</button>
			</div>                                        
		</div>
		<div class="form-row">
			<div class="col-md-12 mt-2">
				<div class="w3-light-grey">
					<div id="myBar" class="w3-green" style="height:5px;width:0"></div>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-12">
				<canvas class="photo" id="myCanvas" style="width:100%;border:2px solid #5B8C2A; background-color:#E7F6D9;">
				Your browser tidak support untuk menampilkan gambar</canvas>
			</div>
		</div>
		<div class="form-row muat">
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Hasil</span>
					<input type="text" class="form-control" aria-label="" id="muat" >
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<span class="input-group-text">Bahan Terbuang</span>
					<input type="text" class="form-control" aria-label="" id="sisa" >
				</div>
			</div>
		</div>
	</div>    
	<script type="text/javascript">
		function move(a) {
			var elem = document.getElementById("myBar");
			var width = 1;
			var id = setInterval(frame, 10);
			
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					if(a=='Y'){
						$("#myCanvas").show();
						$(".muat").show();
						}else{
						$("#myCanvas").hide();
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
			var lbrbh = document.getElementById("lbrbh").value;
			var tgbh = document.getElementById("tgbh").value;			
			var lbrpot = document.getElementById("lbrpot").value;
			var tgpot = document.getElementById("tgpot").value;
			
			lbrbh = lbrbh.replace(',', '.');
			tgbh = tgbh.replace(',', '.');
			lbrpot = lbrpot.replace(',', '.');
			tgpot = tgpot.replace(',', '.');
			
			if(Number(lbrbh) == 0 || Number(tgbh) == 0 || Number(lbrpot)==0 || Number(tgpot) == 0) {
				move('N');
				salert('warning', 'Oops...', 'Data harus diisi angka');
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
					ctx.fillText("www.kalkulatorcetak.com",10,100);
				}
			}
			var isi = "lbr_plano="+lbrbh+"&tinggi_plano="+tgbh+"&lbr_pot="+lbrpot+"&tinggi_pot="+tgpot+"&app_id="+app_id;
			var url = host+'/hitung/potongan/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);
		}
	</script>  
	<style>
		._flash {background-color: #fc1144 !important;}
	</style>    
	<?php
	}//end token
	else{
		// header("Content-Type: application/json");
		echo json_encode(array(404 => "error"));
	}
?>