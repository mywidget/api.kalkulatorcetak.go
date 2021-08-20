<?php
if (empty($_SESSION['g_level'])){
echo json_encode(array(404 => "error"));
}else{
if (($referer==$host OR $referer==$host.'user/media.php?page=produk')) {
$warnabar = "#ef8700";
?>
<script>
$(document).ready(function(){
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
   $('.btnon, .btnd, .btnp').prop('disabled',true);
	$('#jmlcetakp').keypress(validateNumber);
    $('#ketposter').keyup(function(){
        $('.btnon').prop('disabled', this.value == "" ? true : false);     
    })
}); 
$('.modal').on('hidden.bs.modal', function(){
	$(this).removeData('bs.modal');
});
</script>
<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="p" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Poster</h4>
</div>
<div class="modal-body">
<div class="col-md-12"><div class="alert"></div></div>
                    <div class="row" >
                       <div class="col-md-12">
	
                                    <div class="col-md-12">
                                        <div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jumlah Cetak</span>
											<input type="text" class="form-control" id="jmlcetakp" placeholder="Jumlah Cetak" autofocus>
                                            <p class="help-block text-danger"></p>
                                        </div>
                                        </div>
                                        </div>
										<div class="col-md-12">
                                        <div class="form-group ukuran">
										<div class="input-group">
											<span class="input-group-addon">Ukuran</span>

<?php 
$arrays = ArrayUKertas($_SESSION['g_id']);
echo pilihUKertas($arrays,'poster','ukuranp','cariukuranp()');
?>
                                        </div> 
                                        </div> 
                                        </div> 
										<div class="col-md-8">
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Lebar</span>
                                            <input type="text" class="form-control"  id="lbrcetakp" placeholder="Lebar">
											<span class="input-group-addon">Tinggi</span>
                                            <input type="text" class="form-control" onchange="cekukuranp()" id="tgcetakp" placeholder="Tinggi" >
											<span class="input-group-addon">cm</span>
                                        </div>  
                                        </div>  
                                        </div>  
										<div class="col-md-4">	
										<div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Bleed</span>
											  <input type="text" class="form-control" aria-label="" id="bleedp" value="0.4">
											</div>
										</div>
										</div>
										<div class="col-md-4">
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jumlah Warna</span>
                                            <input type="text" class="form-control" id="jmlwarnap" value="4" >
                                            
                                        </div>
                                        </div>
                                        </div>
										<!-- Tarikan -->
                                           
                                        <div class="col-md-8">
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jenis Kertas</span>
<?php 
$arrays = ArrayKertas($_SESSION['g_id']);
echo pilihKertas($arrays,'poster','bahanp');
?>	
                                        </div>
                                        </div>
                                        </div>
										<div class="col-md-6">
										<div class="form-group">
										<select id="lamp" class="selectpicker form-control" data-style="btn-warning">
											<option value="0" selected>Tanpa Laminasi</option>
											<option value="1">Varnish Satu Muka</option>
											<option value="3">Laminating Glosy Satu Muka</option>
											<option value="5">Laminating DOP Satu Muka</option>
										</select>
										</div>
									</div>
											 <div class="col-md-6">	
											 <div class="form-group">
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="finishing4p">
											  </span>
											  <Label class="form-control" >SpotUV</label>											 
											</div><!-- /input-group -->
											</div>
											</div>
									<div class="col-md-8">	
                                        <div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">Keterangan</span>
										<input type="text" class="form-control" aria-label="" id="ketposter"  placeholder="Isi dulu keterangannya">
										</div>
										</div>
										</div>	
                                    <div class="col-md-4">					
                                        <div class="form-group">
											<button  type="submit" class="btn btn-primary btnon" onclick="cekukuranp()">Hitung</button>
											<button type="button" class="btn btn-primary printpenawaran"><i class="fa fa-external-link" aria-hidden="true"></i></button>
                                        </div>                                        
                                    </div>
                                    <div class="col-md-12 text-center">
	<div class="col-md-12 display-hidden" id="hidemyBar">
	  <div class="w3-light-grey">
		<div id="myBar" class="w3-deep-orange" style="height:5px;width:0"></div>
	  </div>
	</div>
</div>
<div class="col-md-12">
	  <div class="col-md-6 harga">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Harga Satuan</span>
            <input type="text" class="form-control" aria-label="" id="satuan<?=$modul;?>"  value="">
          </div>
        </div>
      </div>	  
	  <div class="col-md-6 harga">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Harga PerRim</span>
            <input type="text" class="form-control" aria-label="" id="hargarim<?=$modul;?>"  value="">
          </div>
        </div>
      </div>
	  <div class="col-md-4 harga">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Profit
            </span>
            <input type="text" class="form-control" aria-label="" id="profits<?=$modul;?>"  value="0">
			<span class="input-group-addon">%
            </span>
          </div>
        </div>
      </div>
	  <div class="col-md-4 harga">	
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Total Jual</span>
            <input type="text" class="form-control" aria-label="" id="total<?=$modul;?>"  value="">
			<input type="hidden" id="totdumy<?=$modul;?>">
			<input type="hidden" id="data<?=$modul;?>">
          </div>
        </div>
      </div>
	   <div class="col-md-4 harga">	
        <div class="form-group">
         <button type="button" class="btn btn-info simpan" onclick="simpan('<?=$modul;?>')" >Simpan</button>	
        </div>
      </div>
      </div>
<div class="col-md-12 text-center">
<form action='detail-hitung/' method='post' target='_blank'>
<input type="hidden" id="token" name="token" value="<?=$ssid;?>">
<input type="hidden" id="user"  value="<?=$_SESSION['g_email'];?>">	
<input type="hidden" id="modul">
<div id="tableposter"></div>
</form>
                                    </div>
                    </div><!--col-md-12-->
         </div><!--end row-->
			

   </div><!--E:modal-body-->
<script>
function move() {
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
	  $("#tableposter").show();
	  $("#myBar").hide();
    } else {
      width++; 
      elem.style.width = width + '%'; 
	  $("#hidemyBar").removeClass("display-hidden");
	  $("#tableposter").hide();
	  $("#myBar").show();
    }
  }
}
$(document).ready(function(){
$( "#profits"+modulhit).keyup(function() {
	profit = $('#profits'+modulhit).val();
	tot = angka($('#totdumy'+modulhit).val());
	jual = parseFloat(profit * tot/100) + parseInt(tot);
	satuan = jual / $('#jmlcetakp').val();
	perrim = satuan * 500;
	$('#satuan'+modulhit).val(formatMoney(satuan));
	$('#hargarim'+modulhit).val(formatMoney(perrim));
	$('#total'+modulhit).val(formatMoney(jual));
})
	
	$('#ukuranp').val('10');
	$('#lbrcetakp').val('21');
	$('#tgcetakp').val('29.7');
	
	$('#p').click(function(){	
	if( $('#detailpos').length ){
		$('#detailpos').remove();
	}	
	});	
	
})

		function hitungp() {
			
		$('.btnd, .btnp').prop('disabled', this.value == "" ? true : false);
		
		var bleed = document.getElementById("bleedp").value;
		var lbrcetak = parseFloat(document.getElementById("lbrcetakp").value) + ( 2 * parseFloat(bleed));
		var tgcetak = parseFloat(document.getElementById("tgcetakp").value) + ( 2 * parseFloat(bleed));
		
		var jmlcetak = document.getElementById("jmlcetakp").value;
		var bahan = document.getElementById("bahanp").value;
		// alert(level);
		var bb = 1;
		var jmlwarna = document.getElementById("jmlwarnap").value;
			if (jmlwarna=='Full Color'){
			jmlwarna=4;
			}
			if (jmlwarna != null && jmlwarna < 1){
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				

		var lam = document.getElementById("lamp").value;
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
		var modul="poster";
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";
		var ket = document.getElementById("ketposter").value;
		var ket_satuan = "lbr";
		var rim = 500;
		var box = 100;
		var ongpot = 'Y';		
		

		if(document.getElementById("finishing4p").checked == true ){
			finishing4 = '19';
			lbrf4= lbrcetak;
			tgf4 = tgcetak;
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
		// alert(lbrcetak);
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				
				data = myArr;
					
				if( level == 'admin' || level == 'member' ){
				if( $('#tablpos').length ){
					$('#tablpos tr:gt(0)').remove();	
					var table = $('#tablpos').children();					
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
						
						$('#tableposter').append("<div id='detailpos' class='small'><table id='tablpos' class='table table-striped' ><thead ><tr style='background-color:<?=$warnabar;?>;color:white' ><th  class='text-left' style='width:30%'>Mesin</th><th class='text-right'>Harga</th></tr></thead></table></div>");
							
					
					var table = $('#tablpos').children();
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
							perrim = satuan * rim;
							
							alert(arrStr1);
							$('#satuan'+modulhit).val(formatMoney(satuan));
							$('#hargarim'+modulhit).val(formatMoney(perrim));
							$('#total'+modulhit).val(formatMoney(jual));
							$('#totdumy'+modulhit).val(formatMoney(jual));
							$('#data'+modulhit).val(arrStr);
							$('#modul').val(modul);
					}
			}
			}
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+0+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();	

		}
		
		
		function cariukuranp(){
			var ukuran = document.getElementById("ukuranp").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				document.getElementById("lbrcetakp").value = myArr[0];
				document.getElementById("tgcetakp").value = myArr[1];
			// alert(myArr[0].toString());
			}
			}
			  xmlhttp.open("GET","function/cariukuran.php?ukuran="+ukuran,true);
			  xmlhttp.send();	
		}
		
		function cekukuranp(){
		move();
		$("#profits"+modulhit).val('0');
		$('.simpan').prop('disabled', this.value == "" ? true : false); 
		$(".simpan").html('Simpan'); 
			var lbrcetak = document.getElementById("lbrcetakp").value;
			var tgcetak = document.getElementById("tgcetakp").value;
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				if (myArr[0].toString()=='N'){
				alert('Ukuran Kebesaran');
				document.getElementById("tgcetakp").value = 0;
				document.getElementById("lbrcetakp").value = 0;
				}else{
					hitungp();
					// alert(1);
				}
			}
			}
			  xmlhttp.open("GET","function/cekukuran.php?lbrcetak="+lbrcetak+"&tgcetak="+tgcetak,true);
			  xmlhttp.send();	
		}
	// $('.printpenawaran').click(function() {
		// var value = $("#token").val();
		// var urlencode = btoa(value);
		// window.open('/penawaran-harga/' + urlencode, '_blank');
	// });
</script>      
<style>
 th {
font-weight: bold;
text-align: center; }

.table > thead > tr > th {
    vertical-align: middle;
}

</style>
<?php
	}//end token
	else{
echo json_encode(array(404 => "error"));
	}
}
?>