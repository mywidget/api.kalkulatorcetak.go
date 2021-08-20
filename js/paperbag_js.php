<?php
if (!empty($_POST['link'])) {
$warnabar = "#ed2300";
?>
<script>
$(document).ready(function(){
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
	$('#print_foot').hide();
   $('.btnon, .btnd, .btnp').prop('disabled',true);
	$('#jmlcetakpb').keypress(validateNumber);
    $('#ket'+mod).keyup(function(){
        $('.btnon').prop('disabled', this.value == "" ? true : false);     
    })
}); 

$(document).ready(function(){
	$('#ukuranpb').val('20');
	$('#lbrcetakpb').val('10');
	$('#tgcetakpb').val('30');
	$('#pjcetakpb').val('22');
	$('#bbpb').val('1');
	$('#kertasbawah').val('13');
	$('#bahanpb').val('3');

	$('#tablepb').hide();
	$('.harga').hide();
	
})

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
$("#bahanpb").filter(function() {
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
			$("#bahanpb").change(function() {
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
$("#kertasbawah").filter(function() {
			$('select[data-sourcebw]').each(function() {
				var $select = $(this);
				$select.append('<option value="0">Pilih bahan</option>');
				$.ajax({
					url: $select.attr('data-sourcebw'),
				}).then(function(options) {
					options.map(function(option) {
						var $option = $('<option>');
						$option.val(option[$select.attr('data-valueKey')]).text(option[$select.attr('data-displayKey')]);
						$select.append($option);
					});
				});
			});
		});
			$("#kertasbawah").change(function() {
				var deptid = $(this).val();

				$.ajax({
					url: host+'/kertas/',
					type: 'post',
					data: {depart: deptid,app_id:app_id},
					dataType: 'json',
					success: function(response) {
						var len = response.length;
						$("#idkertasbw").empty();
						for (var i = 0; i < len; i++) {
							var id = response[i]['id'];
							var name = response[i]['name'];
							$("#idkertasbw").append("<option value='" + id + "'>" + name + "</option>");
						}
					}
				});
			});
function hasilpaperbag(data1,data2){
	// alert(data1);
	// alert(data2);
		var ket = document.getElementById("ket"+mod).value;

		if (data1['ongpot'] == 'Y' ){ ongkos_potong = data1['ongkos_potong'];}else{ ongkos_potong = 0; }				
		subtotal1 = parseInt(data1['totcetak']) + parseInt(data1['totbhn']) + parseInt(ongkos_potong) + parseInt(data1['tot_ctp']) + parseInt(data1['totlaminating']) + parseInt(data1['finishing1']) + parseInt(data1['finishing2']) + parseInt(data1['finishing3']) + parseInt(data1['finishing4']) + parseInt(data1['finishing1']) + parseInt(data1['finishing6']);
		var arrStr1 = btoa(encodeURIComponent(JSON.stringify(data1)));
		
//data2
		if(!!(data2['hrgbhn'])){
				if (data2['ongpot'] == 'Y' ){ ongkos_potong = data2['ongkos_potong'];} else{ ongkos_potong = 0; }				
				subtotal2 = parseInt(data2['totcetak']) + parseInt(data2['totbhn']) + parseInt(ongkos_potong) + parseInt(data2['tot_ctp']) + parseInt(data2['totlaminating']) + parseInt(data2['finishing1']) + parseInt(data2['finishing2']) + parseInt(data2['finishing3']) + parseInt(data2['finishing4']) + parseInt(data2['finishing2']) + parseInt(data2['finishing6']);
				var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2)));
			}else{
				var subtotal2 = '0';
				var arrStr2 = '';
			}	
	
				total  = parseInt(subtotal1)+ parseInt(subtotal2);  		
				profit = data1['persen'];
				jual = (parseInt(total) * profit / 100) + parseInt(total);
				satuan = jual / parseInt($('#jmlcetakpb').val());
				perrim = satuan *  500;
		
				
			//	alert(arrStr1);
				$('#data1').val(arrStr1);
				$('#data2').val(arrStr2);
				$('#jumlahcetak').val($('#jmlcetakpb').val());
				$('#ket').val(ket);
				$('#totjual').html("Rp. " + formatMoney(jual));
				$('#satuan').html("Rp. " + formatMoney(satuan) + "/pcs");
				
				setTimeout(function(){ $('#tablepb').show(); }, 500); 
			
}	
function hitungkertaspb(x){
		var data1 = x;	
		var lbrcetak = parseFloat(document.getElementById("lbrcetakpb").value) - 1;
		var tgcetak = parseFloat(document.getElementById("pjcetakpb").value) - 1;
		var bahan = document.getElementById("kertasbawah").value;
		var jmlcetak = document.getElementById("jmlcetakpb").value;
		var bb = '1';
		var jmlwarna = 0;	
		var lam = 0;
		var jmlset = 1;

		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;						var tgf6 = 1;
		var finishing5 = '0';		
		var finishing1 = 0;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing6 = '0'; //Ongkos Lem
		
		var cetak_bagi='Y';
		var jml_satuan = 1;
		var modul = 'paperbag';
		var insheet = "1";
		var ket = document.getElementById("ket"+mod).value;
		var ket_satuan = "pcs";
		var rim = 500;
		var ongpot = 'Y';
		var j_mesin = '';
		var kethitung = 'Kertas Bawah';
		var idmesin = $('#idmesin').val();
		var idkertas = $('#idkertasbw').val();	
		//alert(lbrcetak);
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				data2 = myArr[0];
				hasilpaperbag(data1,data2);
				// //alert(JSON.stringify(data1));
				// $('#ketpb').val(JSON.stringify(myArr));
				}
			}
			
			var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2=0"+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung+ "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			
			var url = host + '/sandbox/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(isi);
		
}
function hitungpb(){	
		var lbr = document.getElementById("lbrcetakpb").value;
		var tg = document.getElementById("tgcetakpb").value;
		var pj = document.getElementById("pjcetakpb").value;
		var lebarlem = 1.5;
		var lebartutup = 3;
		
		if(document.getElementById("bagi2").checked == true ){
			var jmlset = 2;
			lbrcetak = (parseFloat(lbr)) + (parseFloat(pj)) + parseFloat(lebarlem);
			tgcetak = parseFloat(tg) + (1/2 * parseFloat(lbr)) + parseFloat(lebartutup) + parseFloat(lebarlem);			
		
		}else{
			var jmlset = 1;
			lbrcetak = (2 * parseFloat(lbr)) + (2 * parseFloat(pj)) + parseFloat(lebarlem);
			tgcetak = parseFloat(tg) + (1/2 * parseFloat(lbr)) + parseFloat(lebartutup) + parseFloat(lebarlem);			
		}

		var jmlcetak = document.getElementById("jmlcetakpb").value;
		var bahan = document.getElementById("bahanpb").value;
		var bb = '1';
		var jmlwarna = document.getElementById("jmlwarnapb").value;
			// if (jmlwarna=='Full Color'){
			// jmlwarna=4;
			// }
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				
		var lam = document.getElementById("lampb").value;
		
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;						var tgf6 = 1;
		var finishing5 = '0';		
		var finishing1 = 0;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing6 = '53'; //Ongkos Lem
		
		var cetak_bagi='Y';
		var jml_satuan = 1;
		var modul = 'paperbag';
		var insheet = "1";
		var ket = document.getElementById("ket"+mod).value;
		var ket_satuan = "pcs";
		var rim = 500;
		var ongpot = 'N';
		var j_mesin = '';
		var kethitung = 'Paperbag';
		var idmesin = $('#idmesin').val();
		var idkertas = $('#idkertas').val();	
			//Pond
			lbrf3= lbrcetak/jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
			tgf3 = tgcetak;
			finishing2 = '12'; //Biaya Pon
			finishing3 = '13'; // Pisau Pon		
		
		//alert (lbrcetak + "x" + tgcetak);
		//poly
		if(document.getElementById("finishingpb").checked == true ){
			lbrpolykop = document.getElementById("lbrpolypb").value;
			tgpolykop = document.getElementById("tgpolypb").value;
			finishing5 = '10';
			lbrf5= lbrpolykop;
			tgf5 = tgpolykop;	
			
			finishing4 = '11';
			lbrf4= lbrpolykop/jmlcetak;
			tgf4 = tgpolykop;
		}
		

		if(document.getElementById("finishing4pb").checked == true ){
			finishing1 = '19';
			lbrf1= lbrcetak;
			tgf1 = tgcetak;
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
				data1 = myArr[0];
				data2 = {};
				// hasilpaperbag(data1,data2);
				hitungkertaspb(data1);
				//alert(JSON.stringify(data1));
				//$('#ketpb').val(JSON.stringify(myArr));
				}
			}
			
			var isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2=0"+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung+ "&j_mesin=" + j_mesin + "&idmesin=" + idmesin + "&idkertas=" + idkertas + "&app_id=" + app_id;
			//alert (isi);
			var url = host + '/sandbox/get/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(isi);

}

		
		

function move(a) {
				var elem = document.getElementById("myBar");
				var width = 1;
				var id = setInterval(frame, 10);

				function frame() {
					if (width >= 100) {
						clearInterval(id);
						if(a=='Y'){
						$("#tablemap").show();
						}else{
						$("#tablemap").hide();
						}
						$("#myBar").hide();
					} else {
						width++;
						elem.style.width = width + '%';
						$("#tablemap").hide();
						$("#myBar").show();
					}
				}
			}
			CustomStyle();
$("#cekukuran").click(function() {
			CustomStyle();
			var jmlcetak = $('#jmlcetakpb').val();
			var idmesin = $('#idmesin').val();
			var bahana= $('#bahanpb').val();
			var bahanb= $('#kertasbawah').val();
			if(document.getElementById("bagi2").checked == false ){
			if (jmlcetak == '') {
				salert('warning', 'Oops...', iMsg['J']+' Cetakan Kosong!!');
			} else if (idmesin == 0) {
				salert('warning', 'Oops...', iMsg['M']+' belum dipilih!!');
			} else if (bahana == 0) {
				salert('warning', 'Oops...', iMsg['B']+' belum dipilih!!');
			} else if (bahanb == 0) {
				salert('warning', 'Oops...', iMsg['B']+' belum dipilih!!');
			} else {
		var lbr = document.getElementById("lbrcetakpb").value;
		var tg = document.getElementById("tgcetakpb").value;
		var pj = document.getElementById("pjcetakpb").value;
		var lebarlem = 1.5;
		var lebartutup = 3;
		lbrcetak = (2 * parseInt(lbr)) + (2 * parseInt(pj)) + parseInt(lebarlem);
		tgcetak = parseInt(tg) + (1/2 * parseInt(lbr)) + parseInt(lebartutup) + parseInt(lebarlem);			
				
				lbrcetak = (2* parseFloat(pj)) +  parseFloat(tg);
				tgcetak = parseFloat(tg) + parseFloat(lbr);
				$.ajax({
					url: host + "/cek/cekukuran/",
					type: 'POST',
					data: {
						mesin: idmesin,
						lbrcetak: lbrcetak,
						tgcetak: tgcetak,
						app_id: app_id
					},
					dataType: 'json',
					success: function(res) {
						if (res[0].toString() == 'N') {
							salert('warning', 'Oops...', iMsg['U'] +'<br>Ukuran cetak - '+lbrcetak+'x'+tgcetak+' cm<br>UK. '+res[1]+' - '+ res[2] +'x'+res[3]+' cm');
							move(res[0].toString());
						} else {
							move(res[0].toString());
							hitungpb();
						}
					}
				});
			}
			}else{
				move('Y');
				hitungpb();
			}
		});
		function cekukuranpb(){
	
	if(document.getElementById("bagi2").checked == false ){
		var lbr = document.getElementById("lbrcetakpb").value;
		var tg = document.getElementById("tgcetakpb").value;
		var pj = document.getElementById("pjcetakpb").value;
		var idmesin = document.getElementById("idmesin").value;
		var lebarlem = 1.5;
		var lebartutup = 3;
		lbrcetak = (2 * parseInt(lbr)) + (2 * parseInt(pj)) + parseInt(lebarlem);
		tgcetak = parseInt(tg) + (1/2 * parseInt(lbr)) + parseInt(lebartutup) + parseInt(lebarlem);			

			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				if (myArr[0].toString()=='N'){
				alert('Ukuran Kebesaran');
				document.getElementById("tgcetakpb").value = 0;
				document.getElementById("lbrcetakpb").value = 0;
				}
			}
			}
			  var vals ="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&mesin="+idmesin+"&app_id="+app_id;
			var url = host+'/cek/cekukuran/';
			xmlhttp.open('POST', url, true);
			xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xmlhttp.send(vals);  
	}
}
</script>      

<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
?>