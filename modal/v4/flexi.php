<?php 
	if (!empty($_POST['link'])){
	?>	
	<div class="modal-header" style="background-color:<?= $warna; ?>;color:white;">
		<h4 class="modal-title">Hitung <?= $namamod; ?></h4>
		<button type="button" class="close" id="bu" data-dismiss="modal" aria-hidden="true">&times;</button>
	</div>
	<div class="modal-body p-2">
		
		<div class="form-row">
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Jumlah Cetak</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="jumlah" value="">
					<div class="input-group-prepend">
						<span class="input-group-text">pcs</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-6">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Bahan</span>
					</div>
					<select name="bahanflexi" id="bahanflexi" class="custom-select form-control" data-source="<?= $host; ?>/api/<?= $app_id; ?>/katbahan/flexi/0" data-valueKey="id" data-displayKey="name" required>
					</select>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-4">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Lebar</span>
					</div>
					<input type="hidden" class="form-control" aria-label="" id="hargaflexi" readonly="readonly">
					<input type="text" class="form-control" aria-label="" id="lbrbh" >
					<div class="input-group-prepend">
						<span class="input-group-text">m</span>
					</div>
				</div>
			</div>
			<div class="form-group col-md-8">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text">Tinggi / Panjang</span>
					</div>
					<input type="text" class="form-control" aria-label="" id="tgbh"  >
					<div class="input-group-prepend">
						<span class="input-group-text">m</span>
					</div>
					<div class="input-group-prepend">
						<button  type="button" class="btn btn-primary" onclick="cekhitungflexi()">Hitung</button>
					</div>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-12 mt-2">
				<div class="w3-light-grey">
					<div id="myBar" class="w3-red" style="height:5px;width:0"></div>
				</div>
			</div>
		</div>
		<div class="form-row">
			<div class="col-md-12">
				<div id="detailflexi"></div>
			</div>		
		</div>	                                      
	</div>
	<script>
		function move(a) {
			$('#detailflexi').css('display','none');
			var elem = document.getElementById("myBar");
			var width = 10;
			var id = setInterval(frame,0);
			
			function frame() {
				if (width >= 100) {
					clearInterval(id);
					if(a=='Y'){
						$('#detailflexi').css('display','block');
						}else{
						$("#detailflexi").hide();
					}
					$("#myBar").hide();
					} else {
					width++;
					elem.style.width = width + '%';
					$("#hidemyBar").removeClass("display-hidden");
					$("#detailflexi").hide();
					$("#myBar").show();
				}
			}
		}
		$(document).ready(function() {
			// Configure/customize these variables.
			var showChar = 200;  // How many characters are shown by default
			var ellipsestext = "...";
			var moretext = "Show more >";
			var lesstext = "Show less";
			
			$('.more').each(function() {
				var content = $(this).html();
				if(content.length > showChar) {
					
					var c = content.substr(0, showChar);
					var h = content.substr(showChar, content.length - showChar);
					
					var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
					
					$(this).html(html);
				}
			});
			
			$(".morelink").click(function(){
				if($(this).hasClass("less")) {
					$(this).removeClass("less");
					$(this).html(moretext);
					} else {
					$(this).addClass("less");
					$(this).html(lesstext);
				}
				$(this).parent().prev().toggle();
				$(this).prev().toggle();
				return false;
			});
		});
		
		$(document).ready(function(){
			$('#myCanvas').hide();
			$('.muat').hide();
			$('.alert2').hide();
			
		});
		
		$("#bahanflexi").change(function () {
			var deptid = $(this).val();
			$.ajax({
				url: host+"/bahan/",
				type: "post",
				data: {depart: deptid,app_id:app_id},
				dataType: "json",
				success: function (response) {
					var len = response.length;
					$("#idkertas").empty();
					
					var id = response.id;
					var name = response.name;
					var harga = response.harga;
					// console.log(id);
					$('#hargaflexi').val(harga);
					
				},
			});
		});
		$("#bahanflexi").filter(function () {
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
		
		
		function hitflexi(){
			$("#detailflexi").empty().append("");
			$("#here_table").empty().append("");
			var jml = document.getElementById("jumlah").value;
			var l = document.getElementById("lbrbh").value;
			var p = document.getElementById("tgbh").value;	
			var h =  document.getElementById("hargaflexi").value;
			l = l.replace(',', '.');
			p = p.replace(',', '.');
			
			
			var hasil = (p) * roundToHalf(l);
			
			if(hasil<1){
				var totalharga  = 1 * (h) * jml;
				}else{
				var totalharga  = ((p) * (roundToHalf(l) * (h))) * jml;
			}
			move('Y');
			// $('#hasilhitung').html("Harga Rp. " + h + " x " + roundToHalf(l) + "x" + (p) + " x " + jml + " = Rp. " + formatMoney(totalharga));	
			var x;
			$('#detailflexi').append("<div class='small table-responsive'><table id='here_table' class='table'><thead><tr><th class='text-md-left' style='width:30%!important'>Hasil</th><th>Harga/m</th><th class='text-md-right'>Total Harga</th></tr></thead></table></div>");
			var table = $('#here_table').children();
			x += "<tr class='text-left'><td>" + roundToHalf(l) + "m x " + p + "m x " + jml + "pcs</td>";
			x += "<td class='text-left' >Rp. " + formatMoney(h)+ "</td>";
			x += "<td class='text-right'><button type='submit' class='btn btn-warning btn-sm'>Rp.  " + formatMoney(totalharga)+"</button></td></tr>";
			table.append(x);
			
		}
		
		function cekhitungflexi()
		{
			move('N');
			if($("#jumlah").val()==''){
				salert('warning', 'Oopss...', iMsg['J']);
				return;
			}
			if($("#bahanflexi").val()==0){
				salert('warning', 'Oopss...', iMsg['B']);
				return;
			}
			if($("#lbrbh").val()==''){
				salert('warning', 'Oopss...', iMsg['L']);
				return;
			}
			if($("#tgbh").val()==''){
				salert('warning', 'Oopss...', iMsg['T']);
				return;
			}
			
			hitflexi();
			counter('flexi');
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
			
		</script>  
		<?php
		} //end token
		else {
			echo json_encode(array(404 => "error"));
		}
	?>					