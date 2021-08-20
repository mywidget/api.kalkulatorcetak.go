<?php
if (!empty($_POST['link'])){
?>
<script type="text/javascript">
function move(a) {
				var elem = document.getElementById("myBar");
				var width = 1;
				var id = setInterval(frame, 10);

				function frame() {
					if (width >= 100) {
						clearInterval(id);
						if(a=='Y'){
						$("#tablekn").show();
						}else{
						$("#tablekn").hide();
						}
						$("#myBar").hide();
					} else {
						width++;
						elem.style.width = width + '%';
						$("#tablekn").hide();
						$("#myBar").show();
					}
				}
			}
	$('#print_foot').hide();
     $('.btnon, .btnd, .btnp').prop('disabled',true);
	$('#jmlcetakkn').keypress(validateNumber);
    $('#ket'+mod).keyup(function(){
        $('.btnon').prop('disabled', this.value == "" ? true : false);     
    });

$('.modal').on('hidden.bs.modal', function(){
	$(this).removeData('bs.modal');
});

	$('#lbrcetakkn').val('5.5');
	$('#tgcetakkn').val('9');
	$('#bahankn').val('5');
	$('#bbkn').val('1');
	$('#boxkartunama').attr('checked', 'checked');
	$('.harga').hide();


	$('#finishing2kn').click(function(){	
	if($(this).is(":checked"))
        {
		$('#imag').attr('src','images/kartunama.jpg');
		}else{
		$('#imag').attr('src','images/kartunamaoval.jpg');
		}
	});
	
	$('#kn').click(function(){	
	if( $('#detailkn').length ){
		$('#detailkn').remove();
	}	
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
$("#bahankn").filter(function() {
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
			$("#bahankn").change(function() {
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
		function hitungkn() {
		$('.btnd, .btnp').prop('disabled', this.value == "" ? true : false);  	
		var lbrcetak = document.getElementById("lbrcetakkn").value;
		var tgcetak = document.getElementById("tgcetakkn").value;
		var jmlcetak = parseInt(document.getElementById("jmlcetakkn").value);
		var bahan = document.getElementById("bahankn").value;
		var bb = "";
		var jmlwarna = document.getElementById("jmlwarnakn").value;
		var jmlwarna2 = document.getElementById("jmlwarnakn2").value;

			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				
		var tarikan = 1;
		var lam = document.getElementById("lamkn").value;
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
		

		var cetak_bagi="Y";
		var modul="kartunama";
		var insheet="1";
		var jml_satuan=100;
		var ket = document.getElementById("ket"+mod).value;
		var ket_satuan = "box";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';		
		var idmesin = $('#idmesin').val();
		var idkertas = $('#idkertas').val();
		var j_mesin = '';

		if(document.getElementById("finishing1kn").checked == true ){
			finishing1 = '19';
			lbrf1= lbrcetak;
			tgf1 = tgcetak;
		}
		if(document.getElementById("boxkartunama").checked == true ){
			finishing3 = '77';
			 tgf3 = tgf3 / jml_satuan;
		}
		
		if(document.getElementById("finishing2kn").checked == true ){ //Poly
			lbrpolykop = document.getElementById("lbrpolykn").value;
			tgpolykop = document.getElementById("tgpolykn").value;
			finishing5 = '10'; //Press Poly
			lbrf5= lbrpolykop/jmlcetak;
			tgf5 = tgpolykop;			
			finishing4 = '11'; //Plat Poly
			lbrf4= lbrpolykop/jmlcetak;
			tgf4 = tgpolykop;

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
$('#tablekn').hide();
		var xmlhttp = new XMLHttpRequest();      
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		myArr = JSON.parse(xmlhttp.responseText);
				
				data = myArr;
				if( $('#tablkn').length ){
					$('#tablkn tr:gt(0)').remove();	
					var table = $('#tablkn').children();					
					var i;
					var no=1;
					var x;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						
						if (data[i]['ongpot'] == 'Y' ){
							ongkos_potong = data[i]['ongkos_potong'];
						}						
						totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
						
						profit = data[i]['persen'];
						jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
						satuan = jual / jmlcetak / jml_satuan;
						perrim = satuan *  box;
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/box <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";	
						
					}
					table.append(x);
					
					}else{
						
						$('#tablekn').append("<div id='detailkn' class='small'><table id='tablkn' class='table table-striped' ><thead ><tr style='background-color:<?=$warnabar;?>;color:white' ><th  class='text-left' style='width:30%'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");
							
					
					var table = $('#tablkn').children();
					var i;
					var no=1;
					var x;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						
						if (data[i]['ongpot'] == 'Y' ){
							ongkos_potong = data[i]['ongkos_potong'];
						}						
						totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
						
						profit = data[i]['persen'];
						jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
						satuan = jual / jmlcetak / jml_satuan;
						perrim = satuan *  box;
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/box <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";	
					}

					table.append(x);
					}
				
				}					
			
			}
			
			var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+ "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			
			var url = host + '/sandbox/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(isi);
		

		}

		function cekukurankn(){
			var lbrcetak = document.getElementById("lbrcetakkn").value;
			var tgcetak = document.getElementById("tgcetakkn").value;
			var idmesin = document.getElementById("idmesin").value;
			if (idmesin == 0) {
				salert('warning', 'Oops...', iMsg['M']);
			} else {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				if (myArr[0].toString()=='N'){
				salert('warning', 'Oops...', iMsg['U'] +'<br>Ukuran kebesaran - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+myArr[1]+' - '+ myArr[2] +'x'+myArr[3]+' cm');
				document.getElementById("tgcetakkn").value = '9';
				document.getElementById("lbrcetakkn").value = '5.5';
				}
			}
			}
			 var vals ="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&mesin="+idmesin+"&app_id="+app_id;
			  // xmlhttp.send();	
			var url = host+'/cek/cekukuran/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(vals);  
			}
		}
$("#cekukuran").click(function() {
			var jmlcetak = $('#jmlcetakkn').val();
			var ukuran = $('#ukurankn').val();
			var idmesin = $('#idmesin').val();
			var bahan = $('#bahankn').val();
			if (jmlcetak == '') {
				salert('warning', 'Oops...', iMsg['J']);
			} else if (ukuran == 0) {
				salert('warning', 'Oops...', iMsg['U']);
			} else if (idmesin == 0) {
				salert('warning', 'Oops...', iMsg['M']);
			} else if (bahan == 0) {
				salert('warning', 'Oops...', iMsg['B']);
			} else {
				var lbrcetak = $('#lbrcetakkn').val();
				var tgcetak = $('#tgcetakkn').val();
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
							salert('warning', 'Oops...', iMsg['U'] +'<br>Ukuran kebesaran - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+response[1]+' - '+ response[2] +'x'+response[3]+' cm');
							move(response[0].toString());
						} else {
							move('Y');
							hitungkn();
						}
					}
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