<?php
if (empty($_SESSION['g_level'])){
header("Content-Type: application/json");
echo json_encode(array(401 => "error login"));
}else{
if (($referer==$host OR $referer==$_POST['link'])) {
$warnabar = "#a56961";
?>


<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="bx6" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Box 6</h4>
</div>
<div id="printThis" class="modal-body">
                    <div class="row" >
					<div class="col-md-12"><div class="alert"></div></div>
                        <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Jumlah Cetak</span>
											  <input type="text" class="form-control" aria-label="" id="jmlcetakbox6" value="" autofocus>
											  <span class="input-group-addon">pcs</span>
											</div>
										</div>
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Lebar</span>
                                            <input type="text" class="form-control" id="lbrcetakbox6" placeholder="Lebar">
											<span class="input-group-addon">Panjang</span>
                                            <input type="text" class="form-control" id="pjcetakbox6" placeholder="Panjang">
                                        </div>
                                        </div>
									</div>

										<div class="col-md-6">	
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Tinggi Tutup Atas</span>
                                            <input type="text" class="form-control" id="tgtutupatasbox6">
											
										</div>
										</div>
										</div>
										<div class="col-md-6">	
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Tinggi Tutup Bawah</span>
                                            <input type="text" class="form-control" id="tgtutupbawahbox6" >
										</div>
										</div>
										</div>
										
										<div class="col-md-12">	
										<div class="form-group">
										<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="tutupboxbawahbox6" checked >
											  </span>
											  <Label class="form-control" >Tutup Bawah tidak di cetak hanya di pond</label>											 
										</div>
										</div>
										<div class="form-group">
										<div class="input-group gabungcetakbox6 ">
											  <span class="input-group-addon">
												<input type="checkbox" id="gabungcetakbox6" checked >
											  </span>
											  <Label class="form-control" >Box atas dan bawah digabung cetaknya</label>											 
										</div><!-- /input-group -->
										</div><!-- /input-group -->
										</div><!-- /input-group -->
										

										<div class="col-md-5">	
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jumlah Warna</span>
                                            <input type="text" class="form-control input" id="jmlwarnabox61" value="4" >
											<span class="input-group-addon">/</span>
                                            <input type="text" class="form-control input" id="jmlwarnabox62" value="0" >
                                            
                                        </div>
                                        </div>
                                        </div>
										<div class="col-md-7">	
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jenis Kertas</span>
<?php 
$arrays = ArrayKertas($_SESSION['g_id']);
echo pilihKertas($arrays,'box6','bahanbox6');
//pilihKertas('array','nama_modul','class_id_modul');
?>
                                        </div>
                                        </div>
                                        </div>
											
											<input type="hidden"  id="bbbox6" value="1">
										                                        
										<div class="col-md-7">	
										<div class="form-group">
										<select id="lambox6" class="selectpicker form-control" data-style="btn-warning">
											<option value="0" selected>Tanpa Laminasi</option>
											<option value="1">Varnish </option>
											<option value="3">Laminating Glosy </option>
											<option value="5">Laminating DOP </option>
										</select>
										</div>
										</div>
										<div class="col-md-5">
										<div class="form-group">
										<div class="input-group ">
										  <span class="input-group-addon">
											<input type="checkbox" id="finishing4box6">
										  </span>
										  <Label class="form-control" >SpotUV</label>											 
										</div><!-- /input-group -->
										</div><!-- /input-group -->

										</div>
										<div class="col-md-4">	
										<div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="finishing1box6">
											  </span>
											  <Label class="form-control" >Poly</label>											 
											</div><!-- /input-group -->
											</div>
											</div>
										<div class="col-md-8">	
										<div class="form-group">
                                           <div class="input-group">
											  <span class="input-group-addon">Lebar</span>
											  <input type="text" class="form-control" aria-label="" id="lbrpolybox6" value="1">
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgpolybox6" value="1">
											</div>
                                        </div>
                                        </div>
										
										<div class="col-md-12">	
										<div class="panel panel-default tutupbawah">
											<div class="panel-heading center"><strong>Tutup Bawah</strong>
											
											</div>
											<div class="panel-body">
											<div class="col-md-4">	
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon">Jml Warna</span>
													<input type="text" class="form-control input" aria-label="" id="jmlwarnabawahbox61" value="4">
													<span class="input-group-addon">/</span>
													<input type="text" class="form-control input" aria-label="" id="jmlwarnabawahbox62" value="0">
												</div>
											</div>
											</div>
											<div class="col-md-8">
											<div class="form-group">
													<select id="lambawahbox6" class="selectpicker form-control" data-style="btn-warning">
														<option value="0" selected>Tanpa Laminasi</option>
														<option value="1">Varnish Satu Muka</option>
														<option value="3">Laminating Glosy Satu Muka</option>
														<option value="5">Laminating DOP Satu Muka</option>
													</select>
											</div>
											</div>


 											<div class="col-md-8">
											<div class="form-group">
												<div class="input-group">
												<span class="input-group-addon">Kertas</span>
<?php 
echo pilihKertas($arrays,'box6','bahanbawahbox6');
//pilihKertas('array','nama_modul','class_id_modul');
?>
												</select>
												</div>
											</div>
											</div>
											<div class="col-md-4">
											<div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="finishing4bawahbox6">
											  </span>
											  <Label class="form-control" >SpotUV</label>											 
											</div><!-- /input-group -->
											</div>
											</div>

											<div class="col-md-4">
											<div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="finishing1bawahbox6">
											  </span>
											  <Label class="form-control" >Poly</label>											 
											</div><!-- /input-group -->
											</div>
											</div>
										<div class="col-md-8">	
										<div class="form-group">
                                           <div class="input-group">
											  <span class="input-group-addon">Lebar</span>
											  <input type="text" class="form-control" aria-label="" id="lbrpolybawahbox6" value="1">
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgpolybawahbox6" value="1">
											</div>
                                        </div>
                                        </div>
                                        </div>
												
											</div> 
										  </div> <!-- panel -->	
										
									
									
                                    <div class="col-md-8">	
                                        <div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">Keterangan</span>
										<input type="text" class="form-control" aria-label="" id="ketbox6"  placeholder="Isi dulu keterangannya">
										</div>
										</div>
									</div>	
                                    <div class="col-md-4">			
										<div class="form-group">
											<button  type="submit" class="btn btn-primary btnon" onclick="cekukuranbox6()">Hitung</button>
											<?php echo cNav('box6');?>
											<button type="button" class="btn btn-primary printpenawaran"><i class="fa fa-external-link" aria-hidden="true"></i></button>	
                                        </div>		
                                    </div>
	<div class="col-md-12">
	  <div class="w3-light-grey">
		<div id="myBar" class="w3-deep-orange" style="height:5px;width:0"></div>
	  </div>
	</div>
<div class="col-md-12">		
			<form action="detail-hitung/" method="post" target="_blank">
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
<div id="tablebox6"></div>
</form>
			</div>
		</div>	                                 
	</div>
</div>
<script>
$(document).ready(function(){
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
	$('#c-nav').hide();
    $('.btnon, .btnd, .btnp').prop('disabled',true);
	$('#jmlcetakbox6').keypress(validateNumber);
    $('#ketbox6').keyup(function(){
        $('.btn').prop('disabled', this.value == "" ? true : false);     
    })
}); 
$('.btnon, .btnd, .btnp').on('hidden.bs.modal', function(){
	$(this).removeData('bs.modal');
});

var inputWdithReturn = '100%';
var cekLebar = document.getElementById("jmlcetakbox6");
var widthx = cekLebar.clientWidth;
if(widthx < 50){
$('.input').focus(function() {$(this).animate({width: '60px'}, 500);});
}
$('.input').blur(function(){$(this).animate({width: inputWdithReturn}, 500);});

function move() {
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
	  $("#tablebox6").show();
	  $("#myBar").hide();
    } else {
      width++; 
      elem.style.width = width + '%'; 
	  // $("#hidemyBar").removeClass("display-hidden");
	  $("#tablebox6").hide();
	  $("#myBar").show();
    }
  }
}
$(document).ready(function(){
	$( "#profits"+modulhit).keyup(function() {
		profit = $('#profits'+modulhit).val();
		tot = angka($('#totdumy'+modulhit).val());
		jual = parseFloat(profit * tot/100) + parseInt(tot);
		satuan = jual / $('#jmlcetakbox6').val();
		perrim = satuan * 500;
		$('#satuan'+modulhit).val(formatMoney(satuan));
		$('#hargarim'+modulhit).val(formatMoney(perrim));
		$('#total'+modulhit).val(formatMoney(jual));
	})	
	$('#lbrcetakbox6').val('18');
	$('#tgtutupatasbox6').val('2');
	$('#tgtutupbawahbox6').val('8');
	$('#pjcetakbox6').val('18');
	$('#bbbox6').val('1');
	$('#lbrtutupbox6').val('1.5');
	$('#lbrdimensi4').val('0.5');
	$('.gabungcetakbox6').hide();
	$('.tutupbawah').hide();


	$('#bx6').click(function(){	
	if( $('#detailbox6').length ){
		$('#detailbox6').remove();
	}	
		
	});		
})


$('#tutupboxbawahbox6').click(function(){
	
	 if ( $('#tutupboxbawahbox6').attr('checked')) {
        $('#tutupboxbawahbox6').attr('checked', false);
			$('#gabungcetakbox6').prop('checked', true);
			
			$('.gabungcetakbox6').show();
    } else {
        $('#tutupboxbawahbox6').attr('checked', 'checked');
			$('.gabungcetakbox6').hide();
			$('.tutupbawah').hide();
			
    }
});

$('#gabungcetakbox6').click(function(){
	
	 if ( $('#gabungcetakbox6').attr('checked')) {
        $('#gabungcetakbox6').attr('checked', false);
			$('.tutupbawah').show();
    } else {
        $('#gabungcetakbox6').attr('checked', 'checked');
			$('.tutupbawah').hide();
    }
});	
function hitungbox6(l1,t1,l2,t2,bawah){
		lbrcetak 	= l1;
		tgcetak 	= t1;		
		lbrcetak2 	= l2;
		tgcetak2 	= t2;
		
		var jmlcetak = document.getElementById("jmlcetakbox6").value;
		var bahan = document.getElementById("bahanbox6").value;
		var bb = document.getElementById("bbbox6").value;
		var jmlwarna = document.getElementById("jmlwarnabox61").value;
		var jmlwarna2 = document.getElementById("jmlwarnabox62").value;
			if (jmlwarna=='Full Color'){
			jmlwarna=4;
			}
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				
			 
		var lam = document.getElementById("lambox6").value;
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
		
		var modul="box6";
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketbox6").value;
		var ket_satuan = "lbr";
		var rim = 500;
		var box = 100;
		var ongpot = 'N';
		var kethitung = "Box_Atas";
		var idmesin = $("#idmesin").val();
		var idkertas = $("#idkertas").val();
		var j_mesin = "";
			//Pond
			lbrf3= lbrcetak/jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
			tgf3 = tgcetak;
			finishing2 = '12'; //Biaya Pon
			finishing3 = '13'; // Pisau Pon		
		
		//SpotUV
		if(document.getElementById("finishing4box6").checked == true ){
			finishing4 = '19';
			lbrf4= lbrcetak;
			tgf4 = tgcetak;
		}
		
		if(document.getElementById("finishing1box6").checked == true ){ //Poly
			lbrpolykop = document.getElementById("lbrpolybox6").value;
			tgpolykop = document.getElementById("tgpolybox6").value;
			finishing5 = '10'; //Press Poly
			lbrf5= lbrpolykop;
			tgf5 = tgpolykop;			
			finishing1 = '11'; //Plat Poly
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
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);				
				
				
				data = myArr;
					if( level == 'admin' || level == 'member' ){
				//$('#ketbox6').val(JSON.stringify(data));
				if(bawah != 1 ){
				//	alert("atas");
				//	alert(data[0]['totcetak']);
					hitungkertasbox6bwh(data);
				}else{
					
					if( $('#tablbox6').length ){
					$('#tablbox6 tr:gt(0)').remove();	
					var table = $('#tablbox6').children();					
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
						perrim = satuan *  rim;
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						x +="<tr class='text-md-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";	
						
					}
					table.append(x);
					
					}else{
						
						$('#tablebox6').append("<div id='detailbox3' class='small'><table id='tablbox6' class='table table-striped' ><thead ><tr style='background-color:<?=$warnabar;?>;color:white' ><th  class='text-md-left' style='width:30%'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");
						
					var table = $('#tablbox6').children();
					var i;
					var no=1;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						
						if (data[i]['ongpot'] == 'Y' ){
							ongkos_potong = data[i]['ongkos_potong'];
						}						
						totalk = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
						
						profit = data[i]['persen'];
						jual = (parseInt(totalk) * profit / 100) + parseInt(totalk);
						satuan = jual / jmlcetak / jml_satuan;
						perrim = satuan *  rim;
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						x +="<tr class='text-md-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";
					}

					table.append(x);
					}		
				}
					}else{
						var ongkos_potong = 0;
							if (data[0]['ongpot'] == 'Y' ){ongkos_potong = data[0]['ongkos_potong'];}	
							total = parseInt(data[0]['totcetak']) + parseInt(data[0]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[0]['tot_ctp']) + parseInt(data[0]['totlaminating']) + parseInt(data[0]['finishing1']) + parseInt(data[0]['finishing2']) + parseInt(data[0]['finishing3']) + parseInt(data[0]['finishing4']) + parseInt(data[0]['finishing5']) + parseInt(data[0]['finishing6']);
							
							var arrStr = btoa(encodeURIComponent(JSON.stringify(data[0])));
							
							$('.harga').show();
							profit = data[0]['persen'];
							jual = (parseInt(total) * profit / 100) + parseInt(total);
							satuan = jual / jmlcetak / jml_satuan;
							perrim = satuan *  rim;
							
						//	alert(arrStr1);
							$('#satuan'+modulhit).val(formatMoney(satuan));
							$('#hargarim'+modulhit).val(formatMoney(perrim));
							$('#total'+modulhit).val(formatMoney(jual));
							$('#totdumy'+modulhit).val(formatMoney(jual));
							$('#data'+modulhit).val(arrStr);
							$('#modul').val(modul);
					}
			}
			}
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();			

		}
function cekukuranbox6(){
		move();
		$('.simpan').prop('disabled', this.value == "" ? true : false); 
		$('.simpan').html('Simpan');
		$("#profits"+modulhit).val('0');
			var lbr = document.getElementById("lbrcetakbox6").value;
			var tg = document.getElementById("tgtutupatasbox6").value;
			var tg2 = document.getElementById("tgtutupbawahbox6").value;
			var pj = document.getElementById("pjcetakbox6").value;
			
			if (lbr > pj){
				var lbr = document.getElementById("pjcetakbox6").value;
				var pj = document.getElementById("lbrcetakbox6").value;
			}
			
			//ukuran tutup atas
			lbrcetak 	= (2 * parseFloat(tg)) + parseFloat(lbr);
			tgcetak 	= (2 * parseFloat(tg)) + parseFloat(pj);
			//ukuran tutup bawah
			lbrcetak2 	= (2 * parseFloat(tg2)) + parseFloat(lbr);
			tgcetak2 	= (2 * parseFloat(tg2)) + parseFloat(pj);
	
			if(document.getElementById("tutupboxbawahbox6").checked == true ){
				bawah = 0;
			}else{
				if(document.getElementById("gabungcetakbox6").checked == true ){
					bawah = 1;

					if(tgcetak  > tgcetak2){
						tinggicetakan = tgcetak;
					}else{
						tinggicetakan = tgcetak2;
					}
						
					lebarcetakan = lbrcetak + lbrcetak2;
						
					lbrcetak = lebarcetakan;
					tgcetak = tinggicetakan;	
				}else{
					bawah = 0;
				}
				
			}	

		var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				if (myArr[0].toString()=='N'){
					alert('Ukuran Kebesaran' + lbrcetak + "x" + tgcetak);
					return;
				}else{				
					hitungbox6(lbrcetak,tgcetak,lbrcetak2,tgcetak2,bawah);
				
				}
			}
			}
			  xmlhttp.open("GET","function/cekukuran.php?lbrcetak="+lbrcetak+"&tgcetak="+tgcetak,true);
			  xmlhttp.send();	
}

function hitungkertasbox6bwh(x){
		var data = x;
			var lbr = document.getElementById("lbrcetakbox6").value;
			var tg = document.getElementById("tgtutupbawahbox6").value;
			var pj = document.getElementById("pjcetakbox6").value;
			
			//ukuran tutup bawah
			lbrcetak 	= (2 * parseFloat(tg)) + parseFloat(lbr);
			tgcetak 	= (2 * parseFloat(tg)) + parseFloat(pj);
		
		var jmlcetak = document.getElementById("jmlcetakbox6").value;
		var bahan = document.getElementById("bahanbawahbox6").value;
		var bb = document.getElementById("bbbox6").value;
		var jmlwarna = document.getElementById("jmlwarnabawahbox61").value;
		var jmlwarna2 = document.getElementById("jmlwarnabawahbox62").value;
			
		
		if(document.getElementById("tutupboxbawahbox6").checked == true ){
			jmlwarna =0;			
			jmlwarna2 =0;			
		}		

			 
		var lam = document.getElementById("lambawahbox6").value;
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
		
		var modul="box6";
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketbox6").value;
		var ket_satuan = "pcs";
		var rim = 500;
		var box = 100;
		var ongpot = 'N';
		var kethitung = "Box_Bawah";
		var idmesin = $("#idmesin").val();
		var idkertas = $("#idkertas").val();
		var j_mesin = "";
			
			//Pond
			lbrf3= lbrcetak/jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
			tgf3 = tgcetak;
			finishing2 = '12'; //Biaya Pon
			finishing3 = '13'; // Pisau Pon		
		
		//SpotUV
		if(document.getElementById("finishing4bawahbox6").checked == true ){
			finishing4 = '19';
			lbrf4= lbrcetak;
			tgf4 = tgcetak;
		}
		
		if(document.getElementById("finishing1bawahbox6").checked == true ){ //Poly
			lbrpolykop = document.getElementById("lbrpolybawahbox6").value;
			tgpolykop = document.getElementById("tgpolybawahbox6").value;
			finishing5 = '10'; //Press Poly
			lbrf5= lbrpolykop;
			tgf5 = tgpolykop;			
			finishing1 = '11'; //Plat Poly
			lbrf1= lbrpolykop/jmlcetak;
			tgf1 = tgpolykop;

		}
		
	//	alert(tgcetak);
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);				
				
				//kertas kosong
				var ongkos_potong = 0;
				var data2 = myArr;
				subtotal2 = parseInt(data2[0]['totcetak']) + parseInt(data2[0]['totbhn']) + parseInt(ongkos_potong) + parseInt(data2[0]['tot_ctp']) + parseInt(data2[0]['totlaminating']) + parseInt(data2[0]['finishing1']) + parseInt(data2[0]['finishing2']) + parseInt(data2[0]['finishing3']) + parseInt(data2[0]['finishing4']) + parseInt(data2[0]['finishing5']) + parseInt(data2[0]['finishing6']);
				var arrStr2 = btoa(encodeURIComponent(JSON.stringify(data2[0])));
				//alert(myArr[0]['totbhn']);
				
				if( $('#tablbox6').length ){
					$('#tablbox6 tr:gt(0)').remove();	
					var table = $('#tablbox6').children();					
					var i;
					var x;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						
						if (data[i]['ongpot'] == 'Y' ){
							ongkos_potong = data[i]['ongkos_potong'];
						}						
						subtotal1 = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						
						total = subtotal1 + subtotal2;
						profit = data[i]['persen'];
						jual = (parseInt(total) * profit / 100) + parseInt(total);
						satuan = jual / jmlcetak / jml_satuan;
						perrim = satuan *  rim;
						
						
						x +="<tr class='text-md-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /><input type='hidden' name='data2[]' value='"+arrStr2+"' /></td></tr>";		
						
					}
					table.append(x);
					}else{
						
						$('#tablebox6').append("<div id='detailbox3' class='small'><table id='tablbox6' class='table table-striped' ><thead ><tr style='background-color:<?=$warnabar;?>;color:white' ><th  class='text-md-left' style='width:30%'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");
						
					var table = $('#tablbox6').children();
					var i;
					var no=1;
					var ongkos_potong = 0;
					for (i = 0; i < data.length; i++) {
						
						if (data[i]['ongpot'] == 'Y' ){
							ongkos_potong = data[i]['ongkos_potong'];
						}						
						subtotal1 = parseInt(data[i]['totcetak']) + parseInt(data[i]['totbhn']) + parseInt(ongkos_potong) + parseInt(data[i]['tot_ctp']) + parseInt(data[i]['totlaminating']) + parseInt(data[i]['finishing1']) + parseInt(data[i]['finishing2']) + parseInt(data[i]['finishing3']) + parseInt(data[i]['finishing4']) + parseInt(data[i]['finishing5']) + parseInt(data[i]['finishing6']);
						
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						
						total = subtotal1 + subtotal2;
						profit = data[i]['persen'];
						jual = (parseInt(total) * profit / 100) + parseInt(total);
						satuan = jual / jmlcetak / jml_satuan;
						perrim = satuan *  rim;
						
						
						x +="<tr class='text-md-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /><input type='hidden' name='data2[]' value='"+arrStr2+"' /></td></tr>";	
					}

					table.append(x);
					}	
				}
			}
			
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&kethitung="+kethitung;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();		
}
// $('.printpenawaran').click(function() {
// var value = $("#token").val();
// var urlencode = btoa(value);
// window.open('/penawaran-harga/' + urlencode, '_blank');
// });
</script>      
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>