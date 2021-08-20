<?php
	if (!empty($_POST['link'])){
		$warnabar = "#ed2300";
	?>
	<script>
		// $('.modal').on('hidden.bs.modal', function(){
		// $(this).removeData('bs.modal');
		// });
		function flashIt(element, times, klass, delay) {
			for (var i = 0; i < times; i++) {
				setTimeout(function () {
					$(element).toggleClass(klass);
				}, delay + (300 * i));
			};
		};
		$(document).ready(function(){
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
						
						var id = response.id;
						var name = response.name;
						var harga = response.harga;
						// console.log(id);
						$('#hargastiker').val(harga);
						
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
		
		function hitungstiker(){
			$("#detailstiker").show();
			var lbrbh = document.getElementById("lbrbh").value;
			var tgbh = document.getElementById("tgbh").value;			
			var jmlwarna = document.getElementById("jmlwarna").value;
			var hargastiker = document.getElementById("hargastiker").value;
			var jumlah = document.getElementById("jumlah").value;
			
			//	alert(hargastiker);
			
			if(lbrbh == "" || tgbh == "" || jmlwarna=="") {
				//alert("kosong");
				
				$('.alert2').html('Isi dulu datanya!');
				flashIt('.alert2', 10, '_flash', 500)
				$('.alert2').show('slow').delay(2000).hide('slow');
				// return;
			}
			
			//	alert("a");
			
			
			luastotal = parseFloat(lbrbh) * parseFloat(tgbh) * parseInt(jmlwarna);
			total = luastotal * hargastiker ;
			grantotal = total * jumlah;
			var x;
			$('#detailstiker').append("<div class='small table-responsive'> <table id='here_table' class='table' ><thead><tr style='color:#000;padding:0!important'><th class='text-md-left' style='width:30%!important'>Hasil</th><th class='text-md-left'>Satuan</th><th class='text-md-right'>Total Harga</th></tr></thead></table></div>");
			var table = $('#here_table').children();
			x += "<tr class='text-left'><td>" + lbrbh + " x " + tgbh + " x " + jmlwarna + " x " + hargastiker + "</td>";
			x += "<td class='text-left' >Rp. " + formatMoney(total)+ "</td>";
			x += "<td class='text-right'><button type='button' class='btn btn-warning btn-sm'>Rp.  " + formatMoney(grantotal)+"</button></td></tr>";
			table.append(x);
			// $('#hasilhitung').html("Hasil : " + lbrbh + " x " + tgbh + " x " + jmlwarna + " x " + hargastiker + "  = Rp. " + formatMoney(total)
			// + "</br>Rp. " + formatMoney(total) + " x " + jumlah + " = " + formatMoney(grantotal));		
		}
		function cekhitung()
		{
			$("#detailstiker").hide();
			$("#detailstiker").empty().append("");
			$("#here_table").empty().append("");
			if($("#jumlah").val()==''){
				salert('warning', 'Oopss...', iMsg['J']);
				return;
			}
			if($("#bahanstiker").val()==0){
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
			if($("#jmlwarna").val()==''){
				salert('warning', 'Oopss...', iMsg['JW']);
				return;
			}
			 counter('Stiker Cutting');
			hitungstiker();
		}
		CustomStyle();
	</script>
	<?php
	}//end token
	else{
		echo json_encode(array(404 => "error stiker"));
	}
?>