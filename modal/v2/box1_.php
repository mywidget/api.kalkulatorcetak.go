<?php
if (empty($_SESSION['g_level'])){
echo json_encode(array(404 => "error"));
}else{
if (($referer==$host OR $referer==$host.'user/media.php?page=produk')) {
$warnabar = "#4fd132";

?>

<script>
$(document).ready(function(){
$('.harga').hide();
$('.printpenawaran').hide();
$(".alert").hide();
$('.btnon, .btnd, .btnp').prop('disabled',true);
$('#jmlcetakbox1').keypress(validateNumber);
$('#ketbox1').keyup(function(){
	$('.btnon').prop('disabled', this.value == "" ? true : false);     
})	
}); 
var inputWdithReturn = '100%';
var cekLebar = document.getElementById("lbrcetakbox1");
var widthx = cekLebar.clientWidth;
if(widthx < 50){
$('.input').focus(function() {$(this).animate({width: '60px'}, 500);});
}
$('.input').blur(function(){$(this).animate({width: inputWdithReturn}, 500);});
</script>

<div class="modal-header" style="background-color:<?=$warnabar;?>;color:white;">
	<button type="button" class="close" id="bx1" data-dismiss="modal" aria-hidden="true">&times;</button>
	<h4 class="modal-title">Cetak Box 1</h4>
</div>

<div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<div class="input-group">
											  <span class="input-group-addon">Jumlah Cetak</span>
											  <input type="text" class="form-control" aria-label="" id="jmlcetakbox1" value="" autofocus>
											  <span class="input-group-addon">pcs</span>
											</div>
										</div>
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Lebar</span>
                                            <input type="text" class="form-control input" id="lbrcetakbox1" placeholder="Lebar">
											<span class="input-group-addon">Panjang</span>
                                            <input type="text" class="form-control input" id="pjcetakbox1" placeholder="Panjang">
											<span class="input-group-addon">Tinggi</span>
                                            <input type="text" class="form-control input" id="tgcetakbox1" placeholder="Tinggi" >
                                        </div>
                                        </div>
                                    </div>
										<div class="col-md-7">
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jumlah Warna</span>
                                            <input type="text" class="form-control" id="jmlwarnabox1" value="4" >
											<span class="input-group-addon">/</span>
                                            <input type="text" class="form-control" id="jmlwarnabox2" value="0" >
                                            
                                        </div>
                                        </div>
                                        </div>
										<div class="col-md-5">	
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Lebar Tutup</span>
                                            <input type="text" class="form-control" id="lbrtutupbox1" placeholder="Lebar">
										</div>
										</div>
										</div>
										<!-- Tarikan -->
											<input type="hidden"  id="bbbox1" value="1">
										
										<div class="col-md-6">                                        
										<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon">Jenis</span>
 <select name="bahanbox1" id="bahanbox1" class="custom-select form-control" data-source="http://kalkulator.go/user/api/katbahan/box1" data-valueKey="id" data-displayKey="name" required>	 
</select>
<?php 
// $arrays = ArrayKertas($_SESSION['g_id']);
// echo pilihKertas($arrays['katbahan'],'box1','bahanbox1');
?>
											</select>	
                                        </div>
                                        </div>
                                        </div>
										<div class="col-md-6">	
										<div class="form-group">
										<select id="lambox1" class="custom-select form-control" data-style="btn-warning">
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
											<input type="checkbox" id="finishing4box1">
										  </span>
										  <Label class="form-control" >SpotUV</label>											 
										</div><!-- /input-group -->

										</div>
										
										</div>
                                    
										<div class="col-md-4">	
											<div class="input-group ">
											  <span class="input-group-addon">
												<input type="checkbox" id="finishing1box1">
											  </span>
											  <Label class="form-control" >Poly</label>											 
											</div><!-- /input-group -->
											</div>
										<div class="col-md-12">	
										<div class="form-group">
                                           <div class="input-group">
											  <span class="input-group-addon">Lebar</span>
											  <input type="text" class="form-control" aria-label="" id="lbrpolybox1" value="1">
											  <span class="input-group-addon">Tinggi</span>
											  <input type="text" class="form-control" aria-label="" id="tgpolybox1" value="1">
											</div>
                                        </div>
                                        </div>
		<div class="col-md-12">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon">Mesin</span>
<?php 
$arraym = ArrayMesinz($_SESSION['g_id']);
echo pilihJMesin($arraym['mesin'],'box1','idmesin');
?>
          </div>
        </div>
        </div>
									<div class="col-md-8">	
                                        <div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">Keterangan</span>
										<input type="text" class="form-control" aria-label="" id="ketbox1"  placeholder="Isi dulu keterangannya">
										</div>
										</div>
									</div>	
                                    <div class="col-sm-6 col-md-4">		
										<div class="form-group">
											<button  type="submit" class="btn btn-success btnon" id="cekukuranbox1">Hitung</button> <?php echo cNav('box1');?>
											<button type="button" class="btn btn-danger  hidden-md-up" data-dismiss="modal">Close</button>
										</div>
                                    </div>
	<div class="col-md-12">
	  <div class="w3-light-grey">
		<div id="myBar" class="w3-green" style="height:5px;width:0"></div>
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
         <button type="button" class="btn btn-info btn-sm simpan" onclick="simpan('<?=$modul;?>')" >Simpan</button>
        </div>
      </div>
      </div>
<div class="col-md-12">		
			<form action="detail-hitung/" method="post" target="_blank">
			<input type="hidden" id="token" name="token">
			<input type="hidden" id="user"  name="user">	
			<input type="hidden" id="modul" name="modul">
<div id="tablebox1"></div>
</form>
</div>
                             </div>
                        </div>
	</div>
			
<script>
$("#bahanbox1").filter(function() {
$('select[data-source]').each(function() {
  var $select = $(this);
  $select.append('<option value="0">Pilih jenis</option>');
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
function move() {
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 10);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
	  $("#tablebox1").show();
	  $("#myBar").hide();
    } else {
      width++; 
      elem.style.width = width + '%'; 
	  $("#tablebox1").hide();
	  $("#myBar").show();
    }
  }
}
$(document).ready(function(){
	$('#lbrcetakbox1').val('20');
	$('#tgcetakbox1').val('8');
	$('#pjcetakbox1').val('20');
	$('#bbbox1').val('1');
	$('#lbrtutupbox1').val('1.5');

		
})
	$( "#profits"+modulhit).keyup(function() {
		profit = $('#profits'+modulhit).val();
		tot = angka($('#totdumy'+modulhit).val());
		jual = parseFloat(profit * tot/100) + parseInt(tot);
		satuan = jual / $('#jmlcetakbox1').val();
		perrim = satuan * 500;
		$('#satuan'+modulhit).val(formatMoney(satuan));
		$('#hargarim'+modulhit).val(formatMoney(perrim));
		$('#total'+modulhit).val(formatMoney(jual));
	})	
function hitungbox1(){
		$('.btnon,.btnd,.btnp').prop('disabled', this.value == "" ? true : false);  
		var lbr = document.getElementById("lbrcetakbox1").value;
		var tg = document.getElementById("tgcetakbox1").value;
		var pj = document.getElementById("pjcetakbox1").value;
		var lebartutup = document.getElementById("lbrtutupbox1").value;
		
		lbrcetak 	= parseFloat(pj) + (2 * parseFloat(tg));
		tgcetak 	= (2 * parseFloat(tg)) + (2 * parseFloat(lbr)) + parseFloat(lebartutup);

		
		var jmlcetak = document.getElementById("jmlcetakbox1").value;
		var bahan = document.getElementById("bahanbox1").value;
		var bb = document.getElementById("bbbox1").value;
		var jmlwarna = document.getElementById("jmlwarnabox1").value;
		var jmlwarna2 = document.getElementById("jmlwarnabox2").value;
			if (jmlwarna=='Full Color'){
			jmlwarna=4;
			}
			if (jmlwarna != null && jmlwarna < 1){  
				alert("Jumlah Warna Minimal 1!!");
				return;
			}				
		var lam = document.getElementById("lambox1").value;
		var jmlset = 1;
		var lbrf1= 1;		var tgf1 = 1;		
		var lbrf2= 1;		var tgf2 = 1;		
		var lbrf3= 1;		var tgf3 = 1;		
		var lbrf4= 1;		var tgf4 = 1;		
		var lbrf5= 1;		var tgf5 = 1;
		var lbrf6= 1;		var tgf6 = 1;
		var finishing6 = '0';		
		var finishing1 = 0;
		var finishing2 = 0;
		var finishing3 = 0;
		var finishing4 = 0;
		var finishing5 = 0;
		
		
		
		var modul = 'box1';
		var insheet="1";
		var jml_satuan=1;
		var cetak_bagi="Y";	
		var ket = document.getElementById("ketbox1").value;
		var ket_satuan = "pcs";
		var rim = 500;
		var box = 100;
		var ongpot = 'N';
		var idmesin = $('#idmesin').val();
		
		//Pond
		lbrf3= lbrcetak/jmlcetak; //karena di fungsihitung dikalikan jumlah cetak
		tgf3 = tgcetak;
		finishing2 = '12'; //Biaya Pon
		finishing3 = '13'; // Pisau Pon		
		
		
		//SpotUV
		if(document.getElementById("finishing4box1").checked == true ){
			finishing4 = '19';
			lbrf4= lbrcetak;
			tgf4 = tgcetak;
		}
		
		if(document.getElementById("finishing1box1").checked == true ){ //Poly
			lbrpolykop = document.getElementById("lbrpolybox1").value;
			tgpolykop = document.getElementById("tgpolybox1").value;
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
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				myArr = JSON.parse(xmlhttp.responseText);
				
				data = myArr;
					if( level == 'admin' || level == 'member' ){
				if( $('#tablbox1').length ){
					$('#tablbox1 tr:gt(0)').remove();	
					var table = $('#tablbox1').children();					
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

						// alert(satuan);
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						x +="<tr class='text-md-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /><button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td></tr>";	
						
					}
					table.append(x);
					
					}else{
						
						$('#tablebox1').append("<div id='detailbox1' class='small'><table id='tablbox1' class='table table-striped mb-0' ><thead ><tr style='background-color:<?=$warnabar;?>;color:white' ><th  class='text-left'>Mesin</th><th class='text-md-right'>Harga</th></tr></thead></table></div>");
							
					
					var table = $('#tablbox1').children();
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
						// alert(jual);
						var arrStr = btoa(encodeURIComponent(JSON.stringify(data[i])));
						
						x +="<tr class='text-left'><td>"+data[i]['mesin']+"</td><td class='text-md-right' >Rp. "+formatMoney(satuan)+"/pcs - Rp. "+formatMoney(perrim)+"/rim <button type='submit' name='submit' value='"+[i]+"' class='btn btn-warning btn-sm' style='background-color:<?=$warnabar;?>;color:white;width:120px'>Rp."+formatMoney(jual)+"</button></td><input type='hidden' name='jumlahcetak' value='"+jmlcetak+"' /><input type='hidden' name='ket' value='"+ket+"' /><input type='hidden' name='data1[]' value='"+arrStr+"' /></tr>";	
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
							perrim = satuan *  rim;
							
							// alert(perrim);
							$('#satuan'+modulhit).val(formatMoney(satuan));
							$('#hargarim'+modulhit).val(formatMoney(perrim));
							$('#total'+modulhit).val(formatMoney(jual));
							$('#totdumy'+modulhit).val(formatMoney(jual));
							$('#data'+modulhit).val(arrStr);
							$('#modul').val(modul);
					}
			}
			}
			isi="lbrcetak="+lbrcetak+"&tgcetak="+tgcetak+"&jmlcetak="+jmlcetak+"&bahan="+bahan+"&bb="+bb+"&jmlwarna="+jmlwarna+"&jmlwarna2="+jmlwarna2+"&lam="+lam+"&finishing1="+finishing1+"&finishing2="+finishing2+"&finishing3="+finishing3+"&finishing4="+finishing4+"&finishing5="+finishing5+"&finishing6="+finishing6+"&lbrf1="+lbrf1+"&tgf1="+tgf1+"&lbrf2="+lbrf2+"&tgf2="+tgf2+"&lbrf3="+lbrf3+"&tgf3="+tgf3+"&lbrf4="+lbrf4+"&tgf4="+tgf4+"&lbrf5="+lbrf5+"&tgf5="+tgf5+"&lbrf6="+lbrf6+"&tgf6="+tgf6+"&jmlset="+jmlset+"&modul="+modul+"&insheet="+insheet+"&jml_satuan="+jml_satuan+"&cetak_bagi="+cetak_bagi+"&ket_satuan="+ket_satuan+"&ongpot="+ongpot+"&idmesin="+idmesin;
			
			isi=btoa(isi); //encode			
			xmlhttp.open("GET","wadah.php?isi="+isi,true);
			xmlhttp.send();			

		}
$("#cekukuranbox1").click(function(){
        var jmlcetak = $('#jmlcetakbox1').val();
        var idmesin = $('#idmesin').val();
		if(jmlcetak==''){
		alert('jumlah belum diisi');
		}else if(idmesin==0){
		alert('mesin belum dipilih');
		}else{
		var lbr = document.getElementById("lbrcetakbox1").value;
		var tg = document.getElementById("tgcetakbox1").value;
		var pj = document.getElementById("pjcetakbox1").value;
		var lebartutup = document.getElementById("lbrtutupbox1").value;
		
		lbrcetak 	= parseFloat(pj) + (2 * parseFloat(tg));
		tgcetak 	= (2 * parseFloat(tg)) + (2 * parseFloat(lbr)) + parseFloat(lebartutup);
        $.ajax({
            url: protocol + '://'+host+'/user/function/cekukuran.php',
            type: 'GET',
            data: {mesin:idmesin,lbrcetak:lbrcetak,tgcetak:tgcetak},
            dataType: 'json',
            success:function(response){
			if (response[0].toString()=='N'){
			alert('Ukuran Kebesaran');
			}else{
			move();
			hitungbox1();
			}
            }
        });
		}
});
</script>      

<?php
	}//end token
	else{
echo json_encode(array(401=> "error"));
	}
}
?>