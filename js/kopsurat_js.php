<?php
if (!empty($_POST['link'])){
$warnabar = "#40af26";
?>

<script>
$(document).ready(function() {
	$('.harga').hide();
	$('.printpenawaran').hide();
	$(".alert").hide();
	$('#print_foot').hide();
	$('.btnon, .btnd, .btnp').prop('disabled', true);
	$('#jmlcetakkop').keypress(validateNumber);
	$('#ketkopsurat').keyup(function() {
		$('.btnon').prop('disabled', this.value == "" ? true : false);
	})
});

$(document).ready(function(){
	$('#ukurankop').val('10');
	$('#lbrcetakkop').val('21');
	$('#tgcetakkop').val('29.7');
	$('#bahankop').val('9');
})

	$('#kop').click(function(){	
	if( $('#detailkop').length ){
		$('#detailkop').remove();
	}	
	});	

$("#ukurankop").filter(function() {
				var deptid = 10;
				$.ajax({
					url: host + "/api/"+app_id+"/ukuran/"+mod+"/10",
					type: 'GET',
					dataType: 'json',
					success: function(response) {
						var len = response.length;
						for (var i = 0; i < len; i++) {
							var id = response[i]['id'];
							var name = response[i]['name'];
							$("#ukurankop").append("<option value='" + id + "'>" + name + "</option>");
						}
					}
				});
			});
$("#ukurankop").change(function () {
    var ukuran = $(this).val();
    $.ajax({
        url: host + "/cek/cariukuran/",
        type: "POST",
        data: {ukuran: ukuran,app_id:app_id},
        dataType: "json",
        success: function (response) {
            if (response[0] == 0.0) {
                $("#lbrcetakkop,#tgcetakkop").attr("readonly", false);
                $("#lbrcetakkop").val(response[0]);
                $("#tgcetakkop").val(response[1]);
            } else {
                $("#lbrcetakkop,#tgcetakkop").attr("readonly", true);
                $("#lbrcetakkop").val(response[0]);
                $("#tgcetakkop").val(response[1]);
            }
        },
    });
});
$("#bahankop").change(function() {
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


		$("#bahankop").filter(function() {
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
						$("#tablekop").show();
						}else{
						$("#tablekop").hide();
						}
						$("#myBar").hide();
					} else {
						width++;
						elem.style.width = width + '%';
						$("#tablekop").hide();
						$("#myBar").show();
					}
				}
			}
function hitungkop() {
		var bleed = document.getElementById("bleedkop").value;
		var lbrcetak = parseFloat(document.getElementById("lbrcetakkop").value) + ( 2 * parseFloat(bleed));
		var tgcetak = parseFloat(document.getElementById("tgcetakkop").value) + ( 2 * parseFloat(bleed));
		
		
		
		var jmlcetak = document.getElementById("jmlcetakkop").value;
		var bahan = document.getElementById("bahankop").value;
		var bb = '1';
		var jmlwarna = document.getElementById("jmlwarnakop").value;
			if (jmlwarna=='Full Color'){
			jmlwarna=4;
			}
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}			

			
		var tarikan = 0;
		var lam = '0';
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
		
		var cetak_bagi='Y';
		var jml_satuan = 500;
		var modul = 'kopsurat';
		var insheet = "0";
		var ket = document.getElementById("ketkopsurat").value;
		var ket_satuan = "rim";
		var rim = 500;
		var ongpot = 'N';
		var idmesin = $('#idmesin').val();
			var idkertas = $('#idkertas').val();
			var j_mesin = '';
			var kethitung = '';

		if(document.getElementById("finishing2kop").checked == true ){
			lbrpolykop = document.getElementById("lbrpolykop").value;
			tgpolykop = document.getElementById("tgpolykop").value;
			finishing2 = '10';
			lbrf2= lbrpolykop;
			tgf2 = tgpolykop;			
			finishing1 = '11';
			lbrf1= lbrpolykop/jmlcetak;
			tgf1 = tgpolykop;
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
		 xmlhttp.addEventListener("progress", function (){
		 $(".progress-bar").css('width','100%');
		 $(".progress-bar").css('background','green');},false);
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);

					data = myArr;
					level = '<?=$level;?>';
					
										
					if( $('#tablkop').length ){
					$('#tablkop tr:gt(0)').remove();	
					var table = $('#tablkop').children();					
					var i;
					var x;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						
						if (data[i]['ongpot'] == 'Y' ){
							ongkos_potong = data[i]['ongkos_potong'];
						}						
						subtotal1 = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						
						total = subtotal1;
						profit = data[i]['persen'];
						jual = (parseInt(total) * profit / 100) + parseInt(total);
						satuan = parseInt(jual) / parseInt(jmlcetak) / parseInt(jml_satuan);
						perrim = satuan *  rim;
						
						
						x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn bg-success btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></td></tr>";		
						
					}
					table.append(x);
					
					}else{
						
						$('#tablekop').append("<div class='small table-responsive'><table id='tablkop' class='table table-striped' ><thead ><tr class='bg-success'><th  class='text-left' style='width:30%'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");

					var table = $('#tablkop').children();
					var i;
					var x;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						
						if (data[i]['ongpot'] == 'Y' ){
							ongkos_potong = data[i]['ongkos_potong'];
						}						
						subtotal1 = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						
						total = subtotal1;
						profit = data[i]['persen'];
						jual = (parseInt(total) * profit / 100) + parseInt(total);
						satuan = parseInt(jual) / parseInt(jmlcetak) / parseInt(jml_satuan);
						perrim = satuan *  rim;
						
						
						x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn bg-success btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></td></tr>";	
					}

					table.append(x);
					}		
					
					

				
			}
			}
			var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+0+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&j_mesin="+j_mesin+"&idmesin=" + idmesin + "&idkertas=" + idkertas+"&app_id="+app_id;
			
			var url = host+'/sandbox/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
			xmlhttp.send(isi);		

		}
		
		
		// function cariukurankop(){
			// var ukuran = document.getElementById("ukurankop").value;
			// var xmlhttp = new XMLHttpRequest();
			// xmlhttp.onreadystatechange = function() {
			// if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				// myArr = JSON.parse(xmlhttp.responseText);
				// document.getElementById("lbrcetakkop").value = myArr[0];
				// document.getElementById("tgcetakkop").value = myArr[1];
			// //alert(myArr[0].toString());
			// }
			// }
			  // xmlhttp.open("GET","function/cariukuran.php?ukuran="+ukuran,true);
			  // xmlhttp.send();	  
			  
		// }
		
		// function cekukurankop(){
			// var lbrcetak = document.getElementById("lbrcetakkop").value;
			// var tgcetak = document.getElementById("tgcetakkop").value;
			// var xmlhttp = new XMLHttpRequest();
			// xmlhttp.onreadystatechange = function() {
			// if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				// myArr = JSON.parse(xmlhttp.responseText);
				// if (myArr[0].toString()=='N'){
				// alert('Ukuran Kebesaran');
				// document.getElementById("tgcetakkop").value = '29.7';
				// document.getElementById("lbrcetakkop").value = '21';
				// }
			// }
			// }
			
			  // xmlhttp.open("GET","function/cekukuran.php?lbrcetak="+lbrcetak+"&tgcetak="+tgcetak,true);
			  // xmlhttp.send();	
		// }
		CustomStyle();
$("#cekukuran").click(function() {
			var jmlcetak = $('#jmlcetakkop').val();
			var ukuran = $('#ukurankop').val();
			var idmesin = $('#idmesin').val();
			var bahan = $('#bahankop').val();
			if (jmlcetak == '') {
				alert('jumlah belum diisi');
			} else if (ukuran == 0) {
				alert('ukuran belum dipilih');
			} else if (idmesin == 0) {
				alert('mesin belum dipilih');
			} else if (bahan == 0) {
				alert('bahan belum dipilih');
			} else {
				var lbrcetak = $('#lbrcetakkop').val();
				var tgcetak = $('#tgcetakkop').val();
				$.ajax({
					url: host+'/cek/cekukuran/',
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
					success: function(response) {
						if (response[0].toString() == 'N') {
							alert('Ukuran Kebesaran');
							document.getElementById("tgcetakkop").value = '29.7';
							document.getElementById("lbrcetakkop").value = '21';
							move('N');
						}else{
							move('Y');
						hitungkop();
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